<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Logbook - Homepage </title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="NoName Blog Page">
    <meta name="author" content="NoName">

    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
    <link rel="stylesheet" href="{{asset('theme')}}/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet" href="{{asset('theme')}}/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{asset('theme')}}/plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('theme')}}/css/style.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('theme')}}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{asset('theme')}}/images/favicon.png" type="image/x-icon">
</head>

<body>
<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand" href="{{route('front.index')}}">
                <img class="img-fluid" width="150px" src="{{asset('theme')}}/images/logo.png" alt="LogBook">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('front.index')}}">
                            Home
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.about')}}">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Authors <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($authors as $author)
                            <a class="dropdown-item" href="{{route('front.author',[$author->slug])}}">{{$author->name}} -  {{$author->postCount()}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.contact')}}">Contact</a>
                    </li>

                </ul>



                <!-- search -->
                <div class="search px-4">
                    <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                    <div class="search-wrapper">
                        <form action="javascript:void(0)" class="h-100">
                            <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                        </form>
                        <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                    </div>
                </div>

            </div>
        </nav>
    </div>
</header>
<!-- /navigation -->
