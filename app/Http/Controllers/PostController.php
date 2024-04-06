<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin == 1){
            $posts = Post::all();
        }
        else{$posts = Post::where('user_id', Auth::user()->id)->get();}

       return view('admin.posts',compact('posts'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function trashed(){

        if (Auth::user()->isAdmin == 1){
            $trashed = Post::onlyTrashed()->get();
        }
        else{
            $trashed = Post::onlyTrashed()->where('user_id', Auth::user()->id)->get();
            }


        return view('admin.trashed_posts', compact('trashed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,jpg,png'
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->text = $request->content;
        $post->slug = Str::slug($request->title);
        $post->user_id = Auth::user()->id;

        if ($request->hasfile('image')) {
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $post->image = 'uploads/'.$imageName;
        }
        $post->save();
        return redirect()->route('posts.index')->with('success','Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $post = Post::findorfail($id);
        return view('admin.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,jpg,png'
        ]);

        $post = Post::findorfail($id);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->text = $request->content;
        $post->slug = Str::slug($request->title);

        if ($request->hasfile('image')) {
            $imageName = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $post->image = 'uploads/'.$imageName;
        }
        $post->save();
        return redirect()->route('posts.index')->with('success','Item successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Post::find($id)->delete();
        return redirect()->route('posts.index')->with('success','Data is deleted');
    }

    public function forceDelete($id)
    {
        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->route('posts.trashed')->with('success','Data is deleted permanently');
    }

    public function recover($id)
    {
        Post::withTrashed()->find($id)->restore();
        return redirect()->route('posts.trashed')->with('success','Data is recovered');
    }

}
