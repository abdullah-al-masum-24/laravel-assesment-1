<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("/") }}css/all.css">
    <link rel="stylesheet" href="{{ asset("/") }}css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset("/") }}css/lara-commerce.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand  shadow-lg">
        <div class="container">
            <a href="" class="navbar-brand">LARA COMMERCE</a>
            <ul class="navbar-nav">
                <li><a href="{{ route("home") }}" class="nav-link">Home</a></li>

                @if(isset(Auth::user()->name))
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-target="#laraDropdown" data-bs-toggle="dropdown">Product</a>
                        <ul class="dropdown-menu" id="laraDropdown">
                            <li><a href="{{ route("add.product") }}" class="dropdown-item">Add Product</a></li>
                            <li><a href="{{ route("manage.product") }}" class="dropdown-item">Manage Product</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-target="#laraDropdown" data-bs-toggle="dropdown">Category</a>
                        <ul class="dropdown-menu" id="laraDropdown">
                            <li><a href="{{ route("add.category") }}" class="dropdown-item">Add Category</a></li>
                            <li><a href="{{ route("manage.category") }}" class="dropdown-item">Manage Category</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-target="#laraDropdown" data-bs-toggle="dropdown">Brand</a>
                        <ul class="dropdown-menu" id="laraDropdown">
                            <li><a href="{{ route("add.brand") }}" class="dropdown-item">Add Brand</a></li>
                            <li><a href="{{ route("manage.brand") }}" class="dropdown-item">Manage Brand</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-target="#laraDropdown" data-bs-toggle="dropdown">Comment</a>
                        <ul class="dropdown-menu" id="laraDropdown">
                            <li><a href="{{ route("comment.manage") }}" class="dropdown-item">Manage</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-target="#laraDropdown" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" id="laraDropdown">
                            <li><a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">LogOut</a></li>
                            <form action="{{ route("logout") }}" method="post" id="logout">
                                @csrf
                            </form>
                        </ul>
                    </li>

                @else
                    <li><a href="{{ route("login") }}" class="nav-link">login</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>

@yield("main-content")

<script src="{{ asset("/") }}js/jquery-3.6.1.js"></script>
<script src="{{ asset("/") }}js/bootstrap.bundle.js"></script>
</body>
</html>
