@extends('admin.layouts.master')
@section('content')
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Articles - {{Auth::user()->name}}</h1>
            </div>
         @if(session()->has('success'))

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Success!! </strong> {!! session('success') !!}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
         @endif
         @if ($errors->any())
             @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                     {{$error}}
                 </div>
             @endforeach
         @endif
             <table class="table">
                 <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Title</th>
                     <th scope="col">Author</th>
                     <th scope="col">Category</th>
                     <th scope="col">Action</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($posts as $post)
                 <tr>
                     <th scope="row">{{$post->id}}</th>
                     <td>{{$post->title}}</td>
                     <td>{{$post->getUser->name}}</td>
                     <td>{{$post->getCategory->name}}</td>
                     <td>
                         <a href="{{route('front.post',$post->slug)}}" target="_blank"><i class="fa-solid fa-eye"></i></a>
                         <a href="{{route('posts.edit',$post->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                         <a href="{{route('posts.soft-delete',$post->id)}}"><i class="fa-solid fa-trash"></i></a>
                     </td>
                 </tr>
                 @endforeach
                 </tbody>
             </table>



         {{ $posts->links('pagination::bootstrap-5') }}




        </main>
@endsection
