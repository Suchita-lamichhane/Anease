<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKIN CARE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .font-family-sans-serif {
            font-family: "Playwrite AU QLD", cursive !important;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            background-color: rgb(241, 187, 187);
            border-radius: 10px;
            padding: 0px 10px;
        }

        .skincare {
            background-color: transparent;
            border: none;
            margin: 0px;
            padding: 0px;
            color: white;
            color: black;
        }

        .skincare option {
            color: black !important;
        }

        .skincare:hover {
            background-color: rgb(241, 187, 187);
            border-radius: 10px;


        }

        .btn-primary {
            background-color: rgb(211, 104, 86) !important;
            border: none;
        }

        .theme-btn {
            border-radius: 500px !important;

        }

        .navbar {
            height: 100px;
            padding: 0 !important;
            display: flex;
            align-items: center;

        }

        .navbar-brand {
            padding: 0 !important;
            margin:0;


            
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100px; /* Fits exactly within navbar */
            width: 240px; /* Explicitly reserve space so it doesn't overlap adjacent links */
            overflow: hidden; /* Clip anything that scales outside this box */
        }

        .logo-image {
            max-height: 100px; 
            height: auto;
            width: 100%;
            object-fit: contain;
            transform: scale(2.8); /* Restored the large size! */
            transform-origin: center center; /* Scale uniformly from center */
            transition: all 0.3s ease;
        }

        /* Make it responsive on smaller screens */
        @media (max-width: 768px) {
            .logo-container {
                width: 150px;
            }
            .logo-image {
                transform: scale(2.2);
            }
        }

        .glow-box {
            background: url(/image.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* height: 100vh; */

        }

        .glow-box-bg {
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px);
        }

        .product-card:hover {
            /* box-shadow: 0px 0px 10px 10px rgba(0, 0, 0, 0.229) !important; */
            scale: 1.02 !important;
            transition-duration: .2s;
            cursor: pointer;

        }

        .image-card:hover {
            scale: 1.02 !important;
            transition-duration: .2s;
            cursor: pointer;
        }

        .product-detail {
            background-color: white;
            height: 150px;
            padding: 0px;
        }

        .product-memo {
            background: rgba(247, 245, 245, 0.586);

        }

        .memo {
            font-style: italic;
        }

        .demo {
            background-color: white;
            height: 250px;
        }

        .btn {
            /* color: rgba(220, 70, 150, 0.859); */
        }

        .trailer {
            width: 100%;
            border-radius: 10px;
        }

        #bannerImage {
            transition: opacity 0.8s ease-in-out;
        }
    </style>
    @yield('style')

</head>

<body class="d-flex flex-column min-vh-100">
    <header class="sticky-top shadow-sm z-3 bg-white">
        <!-- from here navbar starts -->
        <section class="bg-danger d-flex align-items-center justify-content-center">
            <h8 class="text-white font-family-sans-serif py-1">~Glow with Glamorous~</h8>
        </section>

        <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand me-auto d-flex align-items-center" href="/home">
                    <div class="logo-container">
                        <img src="/assets/1.png" alt="Anease" class="logo-image">
                    </div>
                </a>

                <!-- Right side icons and Toggler container -->
                <div class="d-flex align-items-center gap-2 gap-md-3 gap-lg-4 order-lg-last">
                    <!-- Search Form (Desktop) -->
                    <form action="/search" method="GET" class="d-none d-md-flex align-items-center mb-0 position-relative">
                        <input type="search" name="query" class="form-control form-control-sm rounded-pill" placeholder="Search..." required style="width: 140px; padding-right: 30px;">
                        <button type="submit" class="btn text-dark p-0 position-absolute end-0 me-2 border-0 shadow-none"><i class="bi bi-search" style="font-size: 14px;"></i></button>
                    </form>

                    <!-- Wishlist Icon -->
                    <a href="/wishlist" class="text-dark position-relative">
                        <i class="bi bi-heart fs-5"></i>
                        @if (auth()->check() && \App\Models\Wishlist::where('user_id', auth()->id())->count() > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size: 9px; padding: 3px 6px;">
                                {{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}
                            </span>
                        @endif
                    </a>

                    <!-- Cart Icon -->
                    <a href="/checkout" class="text-dark position-relative">
                        <i class="bi bi-bag fs-5"></i>
                        @if (auth()->check() && \App\Models\Cart::where('user_id', auth()->id())->count() > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size: 9px; padding: 3px 6px;">
                                {{ \App\Models\Cart::where('user_id', auth()->id())->count() }}
                            </span>
                        @endif
                    </a>

                    <!-- Toggler -->
                    <button class="navbar-toggler border-0 shadow-none px-0 ms-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#navbarContent" aria-controls="navbarContent"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <!-- Navbar Links & Content -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarContent" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header border-bottom px-4 py-3">
                        <h5 class="offcanvas-title font-family-sans-serif text-danger" id="offcanvasNavbarLabel" style="font-size: 14px;">Anease Skincare</h5>
                        <button type="button" class="btn-close text-reset shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Center Links -->
                        <ul id="navLinksList" class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex gap-4 gap-lg-4 align-items-start align-items-lg-center mt-3 mt-lg-0 px-2 px-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-dark fw-bold text-uppercase d-flex align-items-center w-100"
                                    style="font-size: 13px; letter-spacing: 1px;" href="/home"><i class="bi bi-house me-3 fs-5 d-lg-none"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fw-bold text-uppercase d-flex align-items-center w-100"
                                    style="font-size: 13px; letter-spacing: 1px;" href="/about"><i class="bi bi-info-circle me-3 fs-5 d-lg-none"></i>About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fw-bold text-uppercase d-flex align-items-center w-100"
                                    style="font-size: 13px; letter-spacing: 1px;" href="/product"><i class="bi bi-grid me-3 fs-5 d-lg-none"></i>Products</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark fw-bold text-uppercase dropdown-toggle d-flex align-items-center w-100"
                                    style="font-size: 13px; letter-spacing: 1px;" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-stars me-3 fs-5 d-lg-none"></i>Recommendation
                                </a>
                                <ul class="dropdown-menu border-0 shadow-sm text-start mt-2">
                                    <li><a class="dropdown-item py-2" href="/recommendation">Skin Type Finder</a></li>
                                </ul>
                            </li>

                            <!-- Profile / Login Menu Item -->
                            @guest
                                <li class="nav-item mt-auto mt-lg-0 pt-4 pt-lg-0 border-top border-lg-0 w-100">
                                    <a class="nav-link text-dark fw-bold text-uppercase d-flex align-items-center w-100"
                                        style="font-size: 13px; letter-spacing: 1px;" href="/login"><i
                                            class="bi bi-box-arrow-in-right me-3 fs-5 d-lg-none"></i><i
                                            class="bi bi-person me-1 d-none d-lg-inline"></i>Login</a>
                                </li>
                            @else
                                <li class="nav-item dropdown mt-auto mt-lg-0 pt-4 pt-lg-0 border-top border-lg-0 w-100">
                                    <a class="nav-link text-dark fw-bold text-uppercase dropdown-toggle d-flex align-items-center w-100"
                                        style="font-size: 13px; letter-spacing: 1px;" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle me-3 fs-5 d-lg-none"></i><i class="bi bi-person-fill me-1 d-none d-lg-inline"></i>Profile
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow-sm text-start mt-2">
                                        <li><a class="dropdown-item text-danger py-2" href="/logout"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Search Form (Mobile) placed below nav within header -->
        <div class="container d-block d-md-none pb-2 px-3">
            <form action="/search" method="GET" class="d-flex align-items-center position-relative w-100">
                <input type="search" id="mobileSearchInput" name="query" class="form-control rounded-pill border-secondary bg-light" placeholder="Search for products..." required style="padding-right: 40px; width: 100%;">
                <button type="submit" class="btn text-dark p-0 position-absolute end-0 border-0 shadow-none" style="margin-right: 15px;"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </header>

    <main class="flex-grow-1">
        @yield('content')

        <!-- -->
        <div class="row m-0 p-0 ">
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3 d-flex flex-column align-items-center justify-content-center ">
                    <i class="bi bi-file-lock  fs-1 text-success"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2 text-center fs-5">
                        100% SECURE PAYMENTS
                    </h4>
                    <small class="text-center">Moving your card details to a much more secured place </small>
                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-shield-check  fs-1  text-primary"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2 text-center fs-5">
                        TRUSTPAY
                    </h4>
                    <small class="text-center">100% Payment Protection.Easy Return policy </small>
                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-headset  fs-1 text-danger"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2 text-center fs-5">
                        HELP CENTER
                    </h4>
                    <small class="text-center">Got a question? Look no further.Browser our FAQs or submit your query
                        here
                    </small>
                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-phone  fs-1 text-warning"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2 text-center fs-5">
                        SHOP ON THE GO
                    </h4>
                    <small class="text-center">Download the app and get the exciting app only offers at your fingertips
                    </small>
                </div>
            </div>
        </div>
    </main>

    <style>
        .footer-bg {
            background-color: #F7F5F2;
            /* Matches the beige/cream color from the image */
            color: #5c5650;
        }

        .footer-heading {
            font-size: 11px;
            letter-spacing: 1px;
            color: #4a443d;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-link {
            color: #857e77 !important;
            font-size: 13px;
            text-decoration: none !important;
            background-color: transparent !important;
            padding: 0 !important;
            transition: color 0.2s ease-in-out;
            border-radius: 0 !important;
        }

        .footer-link:hover {
            color: #4a443d !important;
            background-color: transparent !important;
            padding: 0 !important;
        }

        .footer-badge-text {
            color: #7b7167;
        }
    </style>

    <!-- footer -->
    <footer class="footer-bg pt-4 pb-2 mt-auto border-top">
        <div class="container py-3">
            <div class="row w-100 m-0">

                <!-- 1. SHOP -->
                <div class="col-6 col-lg-3 mb-4">
                    <h6 class="text-uppercase footer-heading">Shop</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                        <li><a href="#" class="footer-link">Cleansers</a></li>
                        <li><a href="#" class="footer-link">Mists</a></li>
                        <li><a href="#" class="footer-link">Serums</a></li>
                        <li><a href="#" class="footer-link">Water Creams</a></li>
                    </ul>
                </div>

                <!-- 2. ABOUT -->
                <div class="col-6 col-lg-3 mb-4">
                    <h6 class="text-uppercase footer-heading">About</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                        <li><a href="#" class="footer-link">Contact</a></li>
                        <li><a href="/about" class="footer-link">About Us</a></li>
                        <li><a href="#" class="footer-link">Journal</a></li>
                        <li><a href="#" class="footer-link">Our Values</a></li>
                    </ul>
                </div>

                <!-- 3. MORE -->
                <div class="col-6 col-lg-3 mb-4">
                    <h6 class="text-uppercase footer-heading">More</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                        <li><a href="#" class="footer-link">Pinterest</a></li>
                        <li><a href="#" class="footer-link">Instagram</a></li>
                        <li><a href="#" class="footer-link">Facebook</a></li>
                        <li><a href="#" class="footer-link">Twitter</a></li>
                    </ul>
                </div>

                <!-- 4. BADGE/LOGO -->
                <div class="col-6 col-lg-3 mb-4 d-flex align-items-start justify-content-lg-center">
                    <div class="text-center d-flex flex-column align-items-center footer-badge-text mt-lg-0 mt-2"
                        style="width:100%; max-width: 200px;">
                        <!-- Imitating the circular arched text of the reference image with horizontal clean typography -->
                        <div class="text-uppercase mb-1"
                            style="font-size: 11px; letter-spacing: 3px; font-weight: 500;">Anease Skincare</div>

                        <div class="d-flex align-items-center gap-2 mb-1 w-100 justify-content-center">
                            <span style="height: 1px; width: 15px; background-color: #aca298;"></span>
                            <span style="font-size: 9px; letter-spacing: 2px;">ESTD. 18</span>
                            <span style="height: 1px; width: 15px; background-color: #aca298;"></span>
                        </div>

                        <div class="text-uppercase mt-1"
                            style="font-size: 9px; letter-spacing: 1.5px; line-height: 1.5;">
                            Made With<br>Organic Ingredients
                        </div>
                    </div>
                </div>

            </div>

            <!-- Powered by / Copyright -->
            <div class="row m-0 mt-3 border-top pt-3">
                <div class="col-12 px-3 text-center">
                    <p class="mb-0 text-muted" style="font-size: 12px; color: #857e77 !important;">© 2025 Anease
                        Skincare. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous">
    </script>



    <script>
        function changePicture(name) {
            document.getElementById("bannerImage").src = name;
            // alert(name)
        }
    </script>
    <script>
        const images = ["/images/1.jpg",
            "/images/2.jpg", "/images/9.avif",
            "/images/6.avif",
            "/images/7.avif"
        ];
        let index = 0;

        function autoslide() {
            index = (index + 1) % images.length;
            console.log(index)
            document.getElementById("bannerImage").src = images[index];

        }
        setInterval(autoslide, 3000);
    </script>

</body>

</html>
