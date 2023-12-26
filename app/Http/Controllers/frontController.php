<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function __construct(){
        view()->share('categories',Category::inRandomOrder()->Where('status','1')->get());
        view()->share('authors',User::orderBy('name')->Where('status','1')->get());
    }
    public function index(){
        $data['posts'] = Post::all();
        return view('front.index',$data);
    }

    public function post($slug){
        $data['post'] = Post::whereSlug($slug)->Where('status','1')->first() ?? abort(403,'Lost');
        return view('front.post',$data);
    }
    public function author($slug){
        $user = User::whereSlug($slug)->first();
        $data['user'] = User::whereSlug($slug)->Where('status','1')->first() ?? abort(403,'Lost');
        $data['posts'] = Post::Where('user_id',$user->id)->get();
        return view('front.author',$data);
    }
    public function contact(){
        return view('front.contact');
    }
    public function about(){
        return view('front.about');
    }
}



