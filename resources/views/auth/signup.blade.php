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

        <form action="/signup/store" method="POST">
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
                By continuing, you agree to Fit GYM
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
