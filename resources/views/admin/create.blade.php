@extends('admin.layouts.master')
@section('content')






     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Create New Article</h1>
            </div>
         @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                     {{$error}}
                 </div>
             @endforeach
         @endif

         <form class="" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
                 <label for="">Article Title</label>
                 <input type="text" name="title" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="">Article Category</label>
                 <select class="form-control" name="category" required>
                     <option selected disabled> Select One </option>
                     @foreach ($categories as $category)
                         <option value="{{$category->id}}"> {{$category->name}} </option>
                     @endforeach

                 </select>
             </div>
             <div class="form-group">
                 <label for="">Uplaod A Photo</label>
                 <input type="file" name="image"  class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="">Content</label>
                 <textarea name="content" id="summernote" class="form-control" required> </textarea>
             </div>
             <div class="form-group m-4">
                 <button type="submit" name="button" class="btn btn-success btn-block">Save</button>
             </div>
         </form>

        </main>
@endsection
