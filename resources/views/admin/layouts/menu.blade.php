<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(2)=='dashboard') active @endif" aria-current="page" href="{{route('admin.dashboard')}}">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(2)=='posts') active @endif" href="{{route('posts.index')}}">
                            <span data-feather="file"></span>
                            Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(3)=='create') active @endif" href="{{route('posts.create')}}">
                            <span data-feather="shopping-cart"></span>
                            Create New Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(3)=='trashed-posts') active @endif" href="{{route('posts.trashed')}}">
                            <span data-feather="shopping-cart"></span>
                           Trashed
                        </a>
                    </li>

                </ul>

{{--                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
{{--                    <span>Saved reports</span>--}}
{{--                    <a class="link-secondary" href="#" aria-label="Add a new report">--}}
{{--                        <span data-feather="plus-circle"></span>--}}
{{--                    </a>--}}
{{--                </h6>--}}
{{--                <ul class="nav flex-column mb-2">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="file-text"></span>--}}
{{--                            Current month--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="file-text"></span>--}}
{{--                            Last quarter--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="file-text"></span>--}}
{{--                            Social engagement--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="file-text"></span>--}}
{{--                            Year-end sale--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </nav>
