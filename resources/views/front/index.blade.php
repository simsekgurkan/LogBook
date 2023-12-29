@extends('front.layouts.master')

@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8  mb-5 mb-lg-0">

                @foreach($posts as $post) \
                <article class="row mb-5">
                    <div class="col-12">
                        <div class="post-slider">
                            <img loading="lazy" @if(Request::segment(1))src="../{{$post->image}}  @else src="{{$post->image}}@endif" class="img-fluid" alt="post-thumb">
                            <img loading="lazy" @if(Request::segment(1))src="../{{$post->image}}  @else src="{{$post->image}}@endif" class="img-fluid" alt="post-thumb">
                            <img loading="lazy" @if(Request::segment(1))src="../{{$post->image}}  @else src="{{$post->image}}@endif" class="img-fluid" alt="post-thumb">
                        </div>
                    </div>
                    <div class="col-12 mx-auto">
                        <h3><a class="post-title" href="{{route('front.post',[$post->slug])}}">{{$post->title}}</a></h3>
                        <ul class="list-inline post-meta mb-4">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i>
                                <a href="{{route('front.author',[$post->getUser->slug])}}">{{$post->getUser->name}}</a>
                            </li>
                            <li class="list-inline-item">Date : {{$post->created_at}}</li>
                            <li class="list-inline-item">Categories : <a href="{{route('front.category',$post->getCategory->slug)}}" class="ml-1">{{$post->getCategory->name}} </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>{{ \Illuminate\Support\Str::limit($post->text, 200) }}</p>
                        <a href="{{route('front.post',[$post->slug])}}" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                @endforeach
            </div>
            <aside class="col-lg-4">
                <!-- Search -->
                <div class="widget">
                    <h5 class="widget-title"><span>Search</span></h5>
                    <form action="/logbook-hugo/search" class="widget-search">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                        <button type="submit"><i class="ti-search"></i>
                        </button>
                    </form>
                </div>
                <!-- categories -->
                <div class="widget">
                    <h5 class="widget-title"><span>Categories</span></h5>
                    <ul class="list-unstyled widget-list">
                        @foreach($categories as $category)

                            <li><a href="{{route('front.category',$category->slug)}}" class="d-flex">{{$category->name}}
                                    <small class="ml-auto">({{$category->postCount()}})</small></a>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <!-- tags -->
                <div class="widget">
                    <h5 class="widget-title"><span>Tags</span></h5>
                    <ul class="list-inline widget-list-inline">
                        <li class="list-inline-item"><a href="#!">Booth</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">City</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Image</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">New</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Photo</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Seasone</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Video</a>
                        </li>
                    </ul>
                </div>
                <!-- latest post -->
                <div class="widget">
                    <h5 class="widget-title"><span>Latest Article</span></h5>
                    <!-- post-item -->
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-elements.html">
                                <img loading="lazy" class="mr-3" src="{{asset('theme/')}}/images/post/post-6.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-elements.html">Elements That You Can Use To Create A New Post On
                                        This Template.</a></h5>
                                <small>March 15, 2020</small>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-1.html">
                                <img loading="lazy" class="mr-3" src="{{asset('theme/')}}/images/post/post-1.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-1.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-2.html">
                                <img loading="lazy" class="mr-3" src="{{asset('theme/')}}/images/post/post-2.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-2.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
