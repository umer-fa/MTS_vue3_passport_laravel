<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            $cookie = $this->getCookieDetails($accessToken);
            return response()->json(['status' => true, 'message' => 'User successfully register.',"success"=>true,'user' => auth()->user(), 'access_token' => true], 200)->cookie($cookie['name'], $cookie['value'],
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

    public function me(Request $request)
    {
//        echo DB::connection()->getDatabaseName();
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
