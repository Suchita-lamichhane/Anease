<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-container {
            max-width: 450px;
            margin: 40px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .auth-header {
            background: #000;
            text-align: center;
            padding: 30px 20px;
            color: #fff;
        }

        .auth-form {
            padding: 30px 20px;
        }

        .btn-dark {
            width: 100%;
            border-radius: 10px;
            padding: 10px;
            background-color: #000;
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

    <div class="auth-container">
        <div class="auth-header">
            <h4 class="mb-0">Sign Up</h4>
        </div>
        <form action="/register" method="POST">
            @csrf
            <div class="auth-form">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="registerFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="registerFirstName" placeholder="First Name" value="{{ old('firstname') }}">
                        @error('firstname')
                            <small class="text-danger fw-semibold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="registerLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="registerLastName" placeholder="Last Name" value="{{ old('lastname') }}">
                        @error('lastname')
                            <small class="text-danger fw-semibold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="registerEmail" placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger fw-semibold">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="registerPassword" placeholder="Create a password">
                    @error('password')
                        <small class="text-danger fw-semibold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="registerPasswordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="registerPasswordConfirm" placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-dark mt-2">Sign Up</button>
            </div>
        </form>
        <div class="auth-footer">
            Already have an account? <a href="/login">Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
