<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - News Narayanganj</title>
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1da255 0%, #008854 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background: #1da255;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .login-header h2 {
            margin: 0;
            font-weight: 300;
        }
        .login-header .fa {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .login-body {
            padding: 40px 30px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-control {
            height: 50px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 16px;
            padding: 0 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #1da255;
            box-shadow: 0 0 0 0.2rem rgba(29, 162, 85, 0.25);
        }
        .btn-login {
            background: #1da255;
            border: none;
            height: 50px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: #008854;
            transform: translateY(-2px);
        }
        .alert {
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .demo-credentials {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            font-size: 14px;
        }
        .demo-credentials h6 {
            color: #495057;
            margin-bottom: 10px;
        }
        .demo-credentials code {
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fa fa-newspaper-o"></i>
            <h2>Admin Panel</h2>
            <p class="mb-0">News Narayanganj</p>
        </div>
        
        <div class="login-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->has('credentials'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('credentials') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" 
                           id="username" name="username" value="{{ old('username') }}" 
                           placeholder="Enter username or email" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" 
                           placeholder="Enter your password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-login btn-block">
                    <i class="fa fa-sign-in"></i> Login to Admin Panel
                </button>
            </form>

            <div class="demo-credentials">
                <h6><i class="fa fa-info-circle"></i> Available Login Options</h6>
                
                <div class="mb-2">
                    <strong>Option 1 - Quick Demo:</strong><br>
                    <small>Username: <code>admin</code> | Password: <code>admin123</code></small>
                </div>
                
                <div class="mb-2">
                    <strong>Option 2 - Admin User:</strong><br>
                    <small>Email: <code>admin@newsnarayanganj.com</code> | Password: <code>admin123</code></small>
                </div>
                
                <div class="mb-0">
                    <strong>Option 3 - Editor User:</strong><br>
                    <small>Email: <code>editor@newsnarayanganj.com</code> | Password: <code>editor123</code></small>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('home') }}" class="text-muted">
                    <i class="fa fa-arrow-left"></i> Back to Website
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('asset/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
</body>
</html>