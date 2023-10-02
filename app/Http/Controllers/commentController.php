<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class commentController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function postComment(Request $request)
    {
        $post_id=$request->input("post_id");
        $user_id=$request->input("user_id");
        $comment=$request->input("comment");

            if($request->has('comment')){
                $comment_result= comment::insert([
                    "post_id"=>$post_id ,
                    "user_id"=>$user_id , 
                    "content"=>$comment
               ]);
               if($comment_result==true){
                return redirect('home');
            }
            else{
                return 'Comment fail';
            }
               
            }
            else{
                return view('home');
            }
        
       
        
    }
    
}
