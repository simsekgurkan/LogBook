@extends('front.layouts.master')

@section('content')

    <section class="section">
        <div class="container">
            <article class="row mb-4">
                <div class="col-lg-10 mx-auto mb-4">
                    <h1 class="h2 mb-3">{{$post->title}}</h1>
                    <ul class="list-inline post-meta mb-3">
                        <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{$post->getUser->name}}</a>
                        </li>
                        <li class="list-inline-item">Date : {{$post->created_at}}</li>
                        <li class="list-inline-item">Categories : <a href="#!" class="ml-1">{{$post->getCategory->name}} </a>
                        </li>
                        <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mb-3">
                    <div class="post-slider">
                        <img src="../{{$post->image}}" class="img-fluid" alt="post-thumb">
                    </div>
                </div>
                <div class="col-lg-10 mx-auto">
                    <div class="content">
                        <p>{!!$post->text!!}</p>
                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection
