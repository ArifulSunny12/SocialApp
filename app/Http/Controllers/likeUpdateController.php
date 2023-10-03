<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;


class likeUpdateController extends Controller
{
    public function like(Request $request){
        $user_id=$request->input("user_id");
        $post_id=$request->input("post_id");

        $like_result= like::insert([
            "user_id"=>$user_id , 
            "post_id"=>$post_id
       ]);
       if($like_result==true){
        return redirect('home');
    }
    else{
        return 'faild!';
    }

    }


    public function dislike(Request $request){
        $user_id=$request->input("user_id");
        $post_id=$request->input("post_id");

        
       $like_id_result=like::select('id')->where('user_id', '=', $user_id)->where('post_id', '=', $post_id)->get();
       // return $like_id_result[0]->id;
       $dislike_result=like::where('id', $like_id_result[0]->id)->delete();
       if($dislike_result==true){
       
      //  return 'success!';
        return redirect('home');
    }
    else{
        return 'faild!';
    }
    }
}
