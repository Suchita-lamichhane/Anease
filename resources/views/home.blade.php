@extends('main')

@section('content')

 <div class="glow-box ">
            <div class="glow-box-bg">
                <div class="container pt-3 ">
                    <div class="col-12 bg-light rounded">
                        <img id="bannerImage" src="/images/wmremove-transformed.jpeg" class="rounded"
                            style="width: 100%; aspect-ratio: 7/2; object-fit: cover;">
                        <div
                            class="d-none d-md-flex text-dark justify-content-around py-3 fw-bold my-0 align-items-center gap-2 flex-column flex-md-row">
                            <span class="image-card" onclick="changePicture('/images/1.jpg')">~100%vegan</span>
                            <span class="image-card" onclick="changePicture('/images/2.jpg')">~Cruetly free</span>
                            <span class="image-card" onclick="changePicture('/images/9.avif')">~Acne safe</span>
                            <span class="image-card" onclick="changePicture('/images/6.avif')">~Fragrance-free</span>
                            <span class="image-card" onclick="changePicture('/images/7.avif')">~Non-comedogenic</span>
                        </div>


                    </div>
                    <!--  -->
                    <div class="row m-0 p-0">
                        <div class="col-6 col-md-3 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card " style="backdrop-filter: blur(50px);">
                                <img src="/images/image.png" class="rounded"
                                    style="width: 100%; aspect-ratio: 3/2 ; object-fit: cover;"
                                    alt="">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                                    Moisturizer </h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">Rice water
                                    with Niacinamide</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card " style="backdrop-filter: blur(50px);">
                                <img src="/images/image copy.png" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                                    Hyaluronic
                                    Serum</h4>
                                <p class="d-flex dark justify-content-center my-0 align-items-center">dewy and plumpy
                                    skin</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card ">
                                <img src="/images/image copy 2.png" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                                    Sunscreen
                                </h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">spf50 and
                                    pa++++</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card">
                                <img src="/images/25.avif" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">Oil
                                    cleanser</h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">lightweight
                                    and non-comodegenic</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- CONTINUE HERE -->
                    <div class="row m-0 p-0">
                        <div class="col-6 col-md-3 p-md-4 d-flex  align-items-end flex-column">
                            <img src="/images/giphy.gif" class="trailer">
                            <div
                                class="col-12 p-0 shadow rounded d-flex align-items-center flex-column flex-md-row  product-memo ">

                                <i class="bi bi-qr-code fs-1 px-2"></i>
                                <div class=" m-0 ">
                                    <p class=" d-md-flex  justify-content-center px-md-5 my-0 align-items-end mt-2">
                                        Enjoy Convinient
                                    </p>
                                    <p
                                        class="d-md-flex  text-dark justify-content-center px-md-4 my-0 align-items-end ">
                                        Order Tracking
                                    </p>
                                </div>

                            </div>
                        </div>
                        <!-- <h2> Trending item</h2> -->
                        <div class="col-6 col-md-3 mt-2 p-md-4">
                            <h4 class="memo"> Trending item</h4>
                            <div class="col-12 shadow rounded p-0 product-card">
                                <img src="/images/1.png" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">Eye
                                    cream</h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">reduce
                                    puffiness and dark circle</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mt-5 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card">
                                <img src="/images/8.jpg" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                                    Sunscreen
                                </h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">gel based
                                    spf50</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mt-5 p-md-4">
                            <div class="col-12 shadow rounded p-0 product-card">
                                <img src="/images/2.png" class="rounded"
                                    style="width: 100%;  aspect-ratio: 3/2 ; object-fit: cover;">
                                <h4 class=" d-flex text-dark justify-content-center my-0 align-items-center mt-2">
                                    Retinal serum
                                </h4>
                                <p class="d-flex text-dark justify-content-center my-0 align-items-center">for
                                    anti-aging and brightening</p>
                                <div class="d-md-flex justify-content-between p-3">
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-bag"></i>
                                        Checkout</button>
                                    <button class="btn btn-primary theme-btn"><i class="bi bi-heart"></i>
                                        Wishlist</button>
                                </div>
                            </div>
                        </div>



                    </div>
       @endsection
