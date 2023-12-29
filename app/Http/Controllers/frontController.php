<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function category($slug){
       $category = Category::whereSlug($slug)->Where('status','1')->first() ?? abort(403,'Lost');
        $data['posts'] = Post::Where('category_id',$category->id)->get();
        return view('front.index',$data);
    }
    public function contact(){
        return view('front.contact');
    }

    public function contactform(Request $request){
       $rules = [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'message'=>'required|min:20'
           ];
       $validate = $this->validate($request,$rules);

       $form = new Message;
       $form->name = $request->name;
       $form->email = $request->email;
       $form->message = $request->message;
       $form->save();
       Mail::to('gurkan.simsek@hotmail.com')->send(new ContactForm($form));
       Mail::to($form->email)->send(new ContactForm($form));
       return redirect()->route('front.contact')->with('success','Your message has been sent');
    }
    public function about(){
        return view('front.about');
    }
}



