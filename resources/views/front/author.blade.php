@extends('front.layouts.master')

@section('content')

    <section class="section-sm border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-bordered mb-5 d-flex align-items-center">
                        <h1 class="h4">{{$user->name}}</h1>
                        <ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 text-center text-md-left">
                    <img loading="lazy" class="rounded-lg img-fluid" src="../{{$user->image}}">
                </div>
                <div class="col-lg-9 col-md-8 content text-center text-md-left">
                    {{$user->about}}
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title text-center">
                        <h2 class="mb-5">Posted by {{$user->name}}</h2>
                    </div>
                </div>
                @unless($posts->count()==0)
                @foreach($posts as $post)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <article class="mb-5">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="../{{$post->image}}" class="img-fluid" alt="post-thumb">
                            <img loading="lazy" src="../{{$post->image}}" class="img-fluid" alt="post-thumb">
                            <img loading="lazy" src="../{{$post->image}}" class="img-fluid" alt="post-thumb">
                        </div>
                        <h3 class="h5"><a class="post-title" href="">{{$post->title}}</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{$post->getUser->name}}</a>
                            </li>
                            <li class="list-inline-item">Date : {{$post->created_at}}</li>
                            <li class="list-inline-item">Category:	<a href="#!" class="ml-1">{{$post->getCategory->name}} </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="{{route('front.post',[$post->slug])}}" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>{{\Illuminate\Support\Str::limit($post->text,80)}}</p>	<a href="{{route('front.post',[$post->slug])}}" class="btn btn-outline-primary">Continue Reading</a>
                    </article>
                </div>
                @endforeach
                @else
                    <p>No Articles Yet</p>

                @endunless
            </div>
        </div>
    </section>

@endsection
