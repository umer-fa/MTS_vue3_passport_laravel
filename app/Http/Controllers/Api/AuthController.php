<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\bussiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function test(Request $request){
        return response([ 'status' => true, 'message' => 'User successfully register.' ], 200);
    }
    public function register(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'name' => 'required|max:55',
            'username' => 'required|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
            exit();
        }
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($requestData['password']);
        $user->phone = $request->phone;
        $user->save();
        if($user){
            $schemaName = $request->username;
            DB::statement('CREATE DATABASE '.$schemaName);
            if(! auth()->attempt($requestData)){
                return response()->json(['error' => 'UnAuthorised Access'], 401);
                exit();
            }
            app()->configPath('database.connections.tenant.database',$request->username);
            DB::purge('mysql');
            DB::setDefaultConnection('tenant');
            \config([
                'database.connections.tenant.database' => $request->username,
            ]);
            DB::reconnect();
            Artisan::call('migrate', array('--path' => 'database/migrations/users_migrations', '--database' => 'tenant', '--force' => true));
            DB::purge('tenant');
            DB::setDefaultConnection('mysql');
            config([
                'database.connections.mysql.database' => env('DB_DATABASE', 'vue3_jwt'),
            ]);
            DB::reconnect("mysql");
            DB::setDefaultConnection('mysql');
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            $cookie = $this->getCookieDetails($accessToken);
            return response()->json(['status' => true, 'message' => 'User successfully register.',"success"=>true,'user' => (array)auth()->user(), 'access_token' => true], 200)->cookie($cookie['name'], $cookie['value'],
                $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly'], $cookie['samesite']);
//            return response([ 'status' => true, 'message' => 'User successfully register.' ], 200);
        }else{
            return response([ 'status' => false, 'message' => 'SomeThing getting wrong.' ], 422);
        }

    }

    public function login(Request $request){
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); exit();
        }
        if(! auth()->attempt($requestData)){
            return response()->json(['error' => 'UnAuthorised Access'], 401);
            exit();
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $cookie = $this->getCookieDetails($accessToken);
        return response()->json(["success"=>true,'user' => auth()->user(), 'access_token' => true], 200)->cookie($cookie['name'], $cookie['value'],
            $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly'], $cookie['samesite']);
    }

    private function getCookieDetails($token)
    {
        return [
            'name' => '_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            // 'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'samesite' => true,
        ];
    }

    public function setup(Request $request){
        $validated = $request->validate([
            'address' => 'required|min:5',
            'mobile' => 'required|integer|min:10,numeric|unique:users,mobile,' . \Auth::id(),
            'image' => 'required',
            'country' => 'required',
            'zip' => 'required|min:3',
            'state' => 'required',
            'city' => 'required',
            'language' => 'required',
        ]);
        if($validated) {
            try {
                $user = User::find(Auth::id());
                $user->address = $request->address;
                $user->mobile = $request->mobile;
                $user->image = $request->image;
                $user->zip = $request->zip;
                $user->country = $request->country;
                $user->state = $request->state;
                $user->city = $request->city;
                $user->language = $request->language;
                $user->profile_done = 1;
                if ($user->save()) {
                    $success = true;
                    $message = "Save Info successfully";
                } else {
                    $success = false;
                    $message = "something went wrong";
                }
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }else{
            $success = false;
            $message = 'Something getting wrong in validate function';
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function biz_validate(Request $request){
        $validated = $request->validate([
            'bus_name' => 'required|max:15|min:5|unique:bussinesses,bus_name,' . \Auth::id(),
            'user_id' => 'unique:bussinesses',
            'package' => 'required',
            'billing_cycle' => 'required',
            'timezone' => 'required',
            'category' => 'required',
            'noofshop' => 'required'
        ]);
        if($validated) {
            try {
                $biz = new bussiness();
                $biz->user_id = Auth::id();
                $biz->bus_name = $request->bus_name;
                $biz->package = $request->package;
                $biz->billing_cycle = $request->billing_cycle;
                $biz->timezone = $request->timezone;
//                $biz->category = $request->category;
//                $biz->noofshop = $request->noofshop;
                if ($biz->save()) {
                    $user = User::find(Auth::id());
                    $user->profile_done = 2;
                    $user->bussiness_id = $biz->id;
                    $user->save();
                    $success = true;
                    $message = "Save Info successfully";
                } else {
                    $success = false;
                    $message = "something went wrong";
                }
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
            }
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }

    public function logout (Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
