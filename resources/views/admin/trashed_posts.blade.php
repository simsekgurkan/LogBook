@extends('admin.layouts.master')
@section('content')
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Articles</h1>
            </div>
         @if(session()->has('success'))

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Success!! </strong> {!! session('success') !!}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
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
                 @foreach($trashed as $trash)
                 <tr>
                     <th scope="row">{{$trash->id}}</th>
                     <td>{{$trash->title}}</td>
                     <td>{{$trash->getUser->name}}</td>
                     <td>{{$trash->getCategory->name}}</td>
                     <td>
                         <a href="{{route('posts.recover',$trash->id)}}"> <i class="fa-solid fa-recycle"></i></a>
                         <a href="{{route('posts.delete',$trash->id)}}"><i class="fa-solid fa-trash"></i></a>
                     </td>
                 </tr>
                 @endforeach
                 </tbody>
             </table>








        </main>
@endsection
