<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getOne(Request $request){
        $data = [];
        try {
            $cat = category::find($request->id);
            if ($cat) {
                $success = true;
                $message = "";
                $data = $cat;
            } else {
                $success = false;
                $message = "This ID is not Exist";
            }
        }catch (QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $data=["success"=>$success,"message"=>$message,"data"=>$data];
        return response()->json($data);
    }
    public function updateCat(Request $request){
        try{
            if(isset($request->name) && !empty($request->name)){
                if(!empty($request->file)){
                    $upload_path = public_path('upload');
                    $file_name = time() . '.' . $request->file->getClientOriginalExtension();
                    $request->file->move($upload_path, $file_name);
                }else{
                    $file_name = false;
                }
                $cat = category::find($request->id);
                $cat->name = $request->name;
                $cat->parent_id = $request->parent_id;
                if($file_name){
                    $cat->image = $file_name;
                }
                $cat->save();
                $success = true;
                $message = "Update Successfully";
            }else{
                $success = false;
                $message = "Category Name Require and Not empty";
            }
        }
        catch (QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $data=["success"=>$success,"message"=>$message];
        return response()->json($data);
    }
    public function category(){
        try{
            if(isset($request->search)){
                if(isset($request->cat_id) && !empty($request->cat_id))
                    $cat = category::find($request->cat_id);
                elseif (isset($request->name) && !empty($request->name)){
                    $cat = category::where('name',$request->name)->get();
                }
            }else{
                $cat = category::all();
                $parent_names = [];
                foreach ($cat as $ct){
                    if($ct['parent_id']==0){
                        $parent_names[$ct['id']]=$ct['name'];
                    }
                }
            }
            $success = true;
            $message = $cat;
        }catch (QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $data=["success"=>$success,"data"=>$message,"parents"=>$parent_names];
        return response()->json($data);
    }
    public function get_parent(){
        try{
            $cat = category::where('parent_id',0)->get();
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
            if(isset($request->name) && !empty($request->name)){
                if(!empty($request->file)){
                    $upload_path = public_path('upload');
                    $file_name = time() . '.' . $request->file->getClientOriginalExtension();
                    $request->file->move($upload_path, $file_name);
                }else{
                    $file_name = false;
                }
                $cat = new category();
                $cat->name = $request->name;
                $cat->parent_id = $request->parent_id;
                if($file_name){
                    $cat->image = $file_name;
                }
                $cat->save();
                $success = true;
                $message = "Save Successfully";
            }else{
                $success = false;
                $message = "Category Name Require and Not empty";
            }
        }
        catch (QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }
        $data=["success"=>$success,"message"=>$message];
        return response()->json($data);
    }
}
