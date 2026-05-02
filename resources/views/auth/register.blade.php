{{-- <!DOCTYPE html>
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
                        <label for="registerLastName" class="form-label">Middle Name(optional)</label>
                        <input type="text" class="form-control" name="lastname" id="registerLastName" placeholder="Middle Name" >
                        @error('middlename')
                            <small class="text-danger fw-semibold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" mb-3">
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

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            font-size: 2px;
        }

        .signup-box {
            height: 85vh;

            width: 100%;
            max-width: 30%;
            background: white;
            /* padding-top: 5px; */
            padding-left: 10px;
            padding-right: 10px;

            border-radius: 15px;
            /* box-shadow: 0 10px 25px goldenrod   ; */
            border: solid 1px rgb(21, 119, 57);
        }

        .signup-title {
            text-align: center;
            font-weight: bold;
            color:rgb(21, 119, 57);
            margin-bottom: 2px;
        }

        .btn-login {
            background: rgb(21, 119, 57);
            color: white;
            font-weight: 600;

        }
.btn-login:hover{
            background: rgb(21, 119, 57);
            color: white;
            font-weight: 600;
}
        p.small {
            font-size: 14px;
            color: #000;
            /* border-bottom: 1px solid #0066c0; */

        }

        p.small a:hover {
            text-decoration: underline;
            /* border-bottom: 1px solid #0066c0; */

        }
    </style>

<body>



    <div class="signup-box m-3 mt-3 ">

        <h3 class="signup-title m-2" style="font-family:cursive; font-size:25px;">Sign Up</h3>

        {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif  --}}

        <form action="/register" method="POST">
            @csrf
            <div class="mb-2">
                <label style="">Your Name</label>

                <input type="name" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="mb-2">
                <label style="font-size: 8px;">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-2">
                <label style="font-size: 10px;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-2">
                <label style="font-size: 10px;">Confirm-Password</label>
                <input type="password" name="password" class="form-control" placeholder="Confirm-Password" required>
            </div>

            <button type="submit mt-2" class="btn btn-login w-100">Continue</button>
            <div class="mt-2 ps-5" style="font-size: 2px;">
                Already have an account?<a href="/login" style="text-decoration:rgb(21, 119, 57)"> <span class=""
                        style="color: rgb(21, 119, 57)">Log In</span></a>
            </div>

        </form>
            {{-- <br> --}}
            <hr>
            <p class="m-1 mt-0 text-start small">
                By continuing, you agree to Anese
                <a href="#" class="text-success ">
                    Conditions of Use
                </a>
                and
                <a href="#" class="text-success ">
                    Privacy Notice
                </a>.
            </p>

    </div>

</body>

</html>
