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
            padding:0px 10px;
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
        #bannerImage{
            transition:opacity 0.8s ease-in-out;
        }
    </style>
    @yield('style')

</head>

<body>
    <!-- from here navbar starts -->
    <section class="bg-danger d-flex align-items-center justify-content-center">
        <h8 class="text-white font-family-sans-serif">~Glow with Glamorous~</h8>
    </section>

    <div class="row m-0">
        <div class="col-12  row m-0">
            <div class="col-6 col-md-1 d-flex  justify-content-between align-items-center">
                <h2 class="m-0 fs-5 ">Anease </h2>
            </div>
            <div class="col-4 d-none d-md-flex align-items-start">
                <div class=" d-flex bg-light rounded my-3  justify-content-start align-items-start gap-4 px-3">
                    <i class="bi bi-house-heart"></i>
                    <a class="fw-border text-dark" href="/home">Home</a>
                    <a class="fw-border text-dark" href="/about">About</a>
                    <a class="fw-border text-dark" href="/product">Products</a>
                    <a class="fw-border text-dark" href="/recommendation">Recommendation</a>



                </div>
            </div>
            <div class="col-4 d-none d-md-flex align-items-center">
                <input type="text" class="form-control" placeholder="search">

            </div>

            <div class="col-6 col-md-3 d-flex my-2 gap-2 justify-content-end align-items-end">
                <a href="/checkout" class="text-dark position-relative me-3">
                    <i class="bi bi-cart4 py-2 fs-5"></i>
                    @if(auth()->check() && \App\Models\Cart::where('user_id', auth()->id())->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ \App\Models\Cart::where('user_id', auth()->id())->count() }}
                        </span>
                    @endif
                </a>
                <a href="/wishlist" class="text-dark position-relative me-3">
                    <i class="bi bi-bag-heart-fill py-2 fs-5"></i>
                    @if(auth()->check() && \App\Models\Wishlist::where('user_id', auth()->id())->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}
                        </span>
                    @endif
                </a>
                <button class=" btn btn-primary theme-btn" data-bs-toggle="modal" data-bs-target="#qrModal">Get in
                    touch</button>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        {{-- <h1 class="modal-title fs-5" id="qrModalLabel">Modal title</h1> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <center>
                            <div class="mb-4">
                                <h3 class="fw-bold font-family-sans-serif ">Glow Starts Here</h3>
                                <small>scan this qr-code to get the link</small>
                            </div>

                            <img src="/images/22.png" alt="qr-code" style="width: 80%; height:auto;">
                            {{-- <img src="/assets/images/2.png" style="width: 80%; height:auto;"> --}}
                        </center>
                    </div>
                    {{-- <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
                </div>
            </div>
        </div>
        @yield('content')

        <!-- -->
        <div class="row m-0 p-0 ">
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3 d-flex flex-column align-items-center justify-content-center ">
                    <i class="bi bi-file-lock  fs-1 text-success"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                        100% SECURE PAYMENTS
                    </h4>
                    <small>Moving your card details to a much more secured place </small>
                    <!-- <p class="d-flex text-dark justify-content-center my-0 align-items-center">Moving your card details to a much more secured place</p> -->
                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-shield-check  fs-1  text-primary"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                        TRUSTPAY
                    </h4>
                    <small>100% Payment Protection.Easy Return policy </small>
                    <!-- <p class="d-flex text-dark justify-content-center my-0 align-items-center fs-6"></p> -->

                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-headset  fs-1 text-danger"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                        HELP CENTER
                    </h4>
                    <small>Got a question? Look no further.Browser our FAQs or submit your query here
                    </small>

                </div>
            </div>
            <div class="col-6 col-md-3 p-0">
                <div class="col-12 shadow  demo p-3  d-flex flex-column align-items-center justify-content-center">
                    <i class="bi bi-phone  fs-1 text-warning"></i>
                    <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                        SHOP ON THE GO
                    </h4>
                    <small>Download the app and get the exciting app only offers at your fingertips </small>
                </div>
            </div>


        </div>


    </div>
    </div>

    </div>

    </div>
    <!-- footer -->
    <footer class="bg-white p-md-5">
        <div class="container">
            <div class="row m-o">
                <div class="col-12 d-flex  flex-column text-dark justify-content-center my-0 align-items-center mt-2">
                    <h6 class="d-flex text-dark justify-content-center my-0 align-items-center memo"> ANEASE SKINCARE
                    </h6>
                    <p class="d-flex text-danger justify-content-center my-0 align-items-center">At Anease, we are more
                        than just a skincare brand- we are a commitment to gentle,effective, and conscious skin
                        wellness.</p>

                </div>
                <div class="col-12 p-2"></div>
                <hr>
                <div class="col-6 col-md-2">
                    <div
                        class="col-12  demo p-3  d-flex flex-column align-items-start justify-content-start px-4 gap-2">
                        <h6 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            ABOUT US
                        </h6>
                        <small> -Our Story</small>
                        <small> -Team</small>
                        <small> -Vision</small>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div
                        class="col-12  demo p-3  d-flex flex-column align-items-start justify-content-start px-md-4 gap-2">
                        <h6 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            CATEGORIES
                        </h6>
                        <small> -Moisturizer</small>
                        <small> -Cleanser</small>
                        <small> -Serum</small>
                        <small> -Sunscreen</small>
                        <small> -Eyecream</small>
                        <small> -Retinal</small>

                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div
                        class="col-12  demo p-3  d-flex flex-column align-items-start justify-content-start px-md-4 gap-2">
                        <h6 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            QUICK LINKS
                        </h6>
                        <small> -Home </small>
                        <small> -About US</small>
                        <small> -Products</small>
                        <small> -FAQs</small>
                        {{-- J HOS CODING GARNE STYLE MERAI JASTAI XAH HAHA --}}
                        {{--  wait , dashboard type chaiyo timlai???  wait I show u, how 2 do that  --}}
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div
                        class="col-12  demo p-3  d-flex flex-column align-items-start justify-content-start px-4 gap-2">
                        <h6 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            FOLLOW US
                        </h6>
                        <small> -Instagram </small>
                        <small> -Facebook</small>
                        <small> -Tiktok </small>
                        <small> -Twitter </small>

                        <div class="gap-2">
                            <i class="bi bi-instagram  fs-6 "></i>
                            <i class="bi bi-facebook  fs-6  text-primary"></i>
                            <i class="bi bi-tiktok fs-6 text-dark"></i>
                            <i class="bi bi-twitter-x fs-6 text-dark"></i>

                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="col-12  demo p-3  d-flex flex-column align-items-start justify-content-start px-4 gap-2"
                        style="height: auto;">
                        <h6 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            OFFICE ADDRESS
                        </h6>
                        <small>Anease Skincare Pvt.Ltd. </small>
                        <small>Ground Floor, Crystal Complex </small>
                        <small>Near Lions Chowk, Bharatpur-10 </small>
                        <small><i class="bi bi-telephone-fill"></i> +977-9865077399 </small>
                        <small><i class="bi bi-envelope-at"></i> info@anease.com.np </small>
                    </div>
                </div>
                <div class="col-12 p-2"></div>
                <hr>
                <div class="col-12 col-md-12">
                    <div class="col-12  p-3  d-flex  align-items-center justify-content-center px-4 gap-2">
                        <p class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                            ©️ 2025 Anease Skincare. All rights reserved.
                        </p>
                    </div>
                </div>
                <div class="col-12 p-2"></div>
                <hr>



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
