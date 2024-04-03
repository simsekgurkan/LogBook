@extends('admin.layouts.master')
@section('content')

     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Article</h1>
            </div>
         @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                     {{$error}}
                 </div>
             @endforeach
         @endif

         <form class="" action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
             @method('PUT')
             @csrf
             <div class="form-group">
                 <label for="">Article Title</label>
                 <input type="text" name="title" class="form-control" value="{{$post->title}}" required>
             </div>
             <div class="form-group">
                 <label for="">Article Category</label>
                 <select class="form-control" name="category" required>
                     <option selected disabled> Select One </option>
                     @foreach ($categories as $category)
                         <option @if ($post->category_id==$category->id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                     @endforeach

                 </select>
             </div>
             <div class="form-group">
                 <label for="">Uplaod A Photo</label>
                 <img src="{{asset($post->image)}}" class="img-fluid img-thumbnail rounded mx-auto d-block" width="300 "alt="">
                 <br>
                 <input type="file" name="image"  class="form-control">
             </div>
             <div class="form-group">
                 <label for="">Content</label>
                 <textarea name="content" id="summernote" class="form-control" required>{{$post->text}}</textarea>
             </div>
             <div class="form-group m-4">
                 <button type="submit" name="button" class="btn btn-success btn-block">Update</button>
             </div>
         </form>

        </main>
@endsection
