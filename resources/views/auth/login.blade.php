
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-container {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .auth-header {
            background: #000;
            text-align: center;
            padding: 40px 20px;
        }

        .auth-header img {
            width: 50px;
            height: 50px;
        }

        .auth-form {
            padding: 30px 20px;
        }

        .btn-dark {
            width: 100%;
            border-radius: 10px;
            padding: 10px;
        }

        .auth-footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        .auth-footer a {
            color: #000;
            font-weight: 500;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- LOGIN -->
    <div class="auth-container">
        <div class="auth-header">
            Login
        </div>
        <form class="" action="/login" method="POST">
            @csrf
            <div class="auth-form">
                <h4 class="text-center mb-4">Login</h4>
                @foreach ($errors as $error)
                    {{ $error }}
                @endforeach

                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Enter your email">
                    @error('email')
                        <small class="text-danger fw-semibold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Enter your password">
                     @error('password')
                        <small class="text-danger fw-semibold">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark">Login</button>
        </form>
    </div>
    <div class="auth-footer">
        Don’t have an account? <a href="/register">Sign Up</a>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




