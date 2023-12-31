<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\comment;



class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function profile(){
        $posts=post::select('*')->where('user_id', '=', Auth::user()->id)->orderByRaw('updated_at DESC')->with('user')->with('comment')->get();
        $users = User::with('post')->get();
        $comments = comment::with('post')->with('user')->get();
        $comments_user = comment::with('user')->get();
        $data= json_decode($comments_user);
        
       
 
      return view('profile', compact('posts','users','comments','comments_user'));
      //return view('home',['allposts' =>$allposts]);
        //  return $data;
    }

    function follower(){

        $allusers = User::get();

            return view('follower', compact('allusers'));
       //   return $allusers;
    }
    function following(){

        $allusers = User::get();

            return view('following', compact('allusers'));
       //   return $allusers;
    }

    function removefollower(){
            return redirect('follower');
       //   return $allusers;
    }
    function follow(){
        return redirect('following');
   //   return $allusers;
    }
    function unfollow(){
        return redirect('following');
   //   return $allusers;
    }

    function about(){
        return redirect('profile');
   //   return $allusers;
    }
    
}
