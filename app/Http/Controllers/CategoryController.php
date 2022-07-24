<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_parent(){
        try{
            $cat = \App\Models\category::where('parent_id',0)->get();
            $success = 1;
            $message = '';
            $data = $cat;
        }catch (\Illuminate\Database\QueryException $ex) {
            $data = [];
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response);
    }
    public function add_new(Request $request){
        try{
            $cat = new \App\Models\category();
            $cat->name = $request->name;
            $cat->is_active = $request->is_active;
            $cat->image = 1;
            $cat->parent_id = $request->parent_id;
            $cat->bus_id = 1;
            $cat->localtion_id = 1;
            if($cat->save()){
                $success = 1;
                $message = "Category Save Successfully";
            }else{
                $success = false;
                $message = "Somthing went Wrong";
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }
}
