<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
       // $allposts=post::get();
       // $orders = DB::table('orders')->orderByRaw('created_at DESC')->get();
        $allposts = post::select('*')->orderByRaw('updated_at DESC')->get();
       // return $allposts;
       return view('home',['allposts' =>$allposts]);
    }

    public function joinpostuser()
    { 
     
       $posts=post::select('*')->orderByRaw('updated_at DESC')->with('user')->with('comment')->get();
       $users = User::with('post')->get();
       $comments = comment::with('post')->with('user')->get();
       $comments_user = comment::with('user')->get();
       $data= json_decode($comments_user);
       
      

     return view('home', compact('posts','users','comments','comments_user'));
     //return view('home',['allposts' =>$allposts]);
       //  return $data;
    }

    public function testview()
    { 

     return view('test');
     
    }
}
