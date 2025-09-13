<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - News Narayanganj')</title>
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            background: #343a40;
            min-height: 100vh;
            padding: 20px 0;
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
            border-radius: 0;
        }
        .sidebar .nav-link:hover {
            background: #495057;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background: #007bff;
            color: #fff;
        }
        .main-content {
            padding: 20px;
        }
        .card {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h4 class="text-white text-center mb-4">Admin Panel</h4>
                <div class="text-center mb-3">
                    <small class="text-light">Welcome, {{ Session::get('admin_user', 'Admin') }}</small>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" href="{{ route('admin.articles.index') }}">
                        <i class="fa fa-newspaper-o"></i> Articles
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.photo-galleries.*') ? 'active' : '' }}" href="{{ route('admin.photo-galleries.index') }}">
                        <i class="fa fa-image"></i> Photo Gallery
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.video-galleries.*') ? 'active' : '' }}" href="{{ route('admin.video-galleries.index') }}">
                        <i class="fa fa-video-camera"></i> Video Gallery
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                        <i class="fa fa-file-text"></i> Pages
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                    <hr style="border-color: #495057;">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="fa fa-external-link"></i> View Site
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-left" style="color: #fff; border: none; background: none; width: 100%; padding: 10px 20px;">
                            <i class="fa fa-sign-out"></i> Logout
                        </button>
                    </form>
                </nav>
            </div>
            <div class="col-md-10 main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('asset/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>
</html>