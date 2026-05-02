<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>goJim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
</head>
<style>
    body {
    background-color: rgb(14, 131, 14);
        font-family: 'Inter', sans-serif;
    }
.navbar {
    padding: 0.3rem 1rem;
}

.navbar-brand {
    font-size: 1rem;
    color: #f97f05;

    /* color: rgb(2, 68, 8); */
}

.nav-link {
    color: green;
    padding: 0.25rem 0.75rem;
}

    .logo-box {
        background: #f4a261;
        padding: 6px 8px;
        border-radius: 6px;
        margin-right: 6px;
    }
    .parent {
    position: relative;
    height: 100vh;     /* full screen height */
    background: white;
}
.mother{
    position: absolute;
    top: 40%;
    left: 45%;
}
.child {
    position: absolute;
    top: 70%;
    left: 50%;

    transform: translate(-50%, -50%);

    background: limegreen;
    padding: 10px 20px;
    /* color: red; */
}


    /* Hero Section */
.hero-section {
    height: calc(100vh - 70px);
    /* background: #0f9d58 */
    background: green;
    /* background: radial-gradient(circle at center, #1ecf75 0%, #0f9d58 60%, #0b6e3e 100%); */
    /* background-color:#0f9d58; */

    /* background: radial-gradient(circle at center, rgb(14, 131, 14)); */
    color: white;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
}

.hero-title span {
    color: #bdbdbd;
}

.hero-subtitle {
    color: #c3c0c0;
    margin: 20px 0 35px;
    font-size: 1.1rem;
}
.request{
    background-color: white;
    color:green;
}
.request:hover{
    background-color:whitesmoke;
    color:green;
}

.signup{
    color: green;
}
.signup:hover{
        background-color: green;
color: whitesmoke;
}
.login{
    color: green;
}
.login:hover{
            background-color: green;
color: whitesmoke;

}
    
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 mx-3 rounded-4 mt-2">
        <a class="navbar-brand fw-bold" href="#">
            <span class="logo-box">💪</span> Anese
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="color: red"></span>
        </button>

      

        <div class=" d-flex ms-auto gap-2 justify-content-end align-items-center">
            <a href="/login" class="btn btn-outline-success login">Login</a>
            <a href="/register" class="btn btn-outline-success signup">Sign Up</a>
        </div>
    </nav>


    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center text-center">
    <div class="container">
        <h1 class="hero-title">
            Simplify Your <br>
            <span> Skin care routine</span>
        </h1>

        <p class="hero-subtitle">
     Upgrade your Glow and Confident with us.<br>
            all-in-one Anese Skin Care.
        </p>

      <a href="/main">
            <button type="submit" class=" request btn btn-lg  px-5">
                Start
            </button>
            </a>
       
    </div>
</section>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
