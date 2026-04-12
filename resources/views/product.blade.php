@extends('main')


@section('content')
    <section class="container py-4">
        <div class="text-center mb-3">
            <h2 class="fw-bold font-family-sans-serif">Our Products</h2>
            <p class="text-muted">Trusted skincare made with love by Anease</p>
        </div>
        <div class="col-12  rounded">
            <img id="bannerImage" src="/assets/43.jpg" class="rounded"
                style="width: 100%; aspect-ratio: 7/2; object-fit: contain;">
            <div
                class="d-none d-md-flex text-dark justify-content-around py-3 fw-bold my-0 align-items-center gap-2 flex-column flex-md-row">
                <span class="image-card" onclick="changePicture('/assets/44.jpg')"></span>
                <span class="image-card" onclick="changePicture('/assets/40.jpg')"></span>
                <span class="image-card" onclick="changePicture('/assets/41.jpg')"></span>
                <span class="image-card" onclick="changePicture('/assets/32.jpg')"></span>
                <span class="image-card" onclick="changePicture('/assets/37.jpg')"></span>
            </div>


        </div>


    </section>
    <div class="row m-0 p-0 justify-content-center g-3">
        <div class="text-center mb-3">
            <h6 class="text-uppercase text-muted mb-2" style="font-size: 11px; letter-spacing: 2px;">Featured</h6>
            <h2 class="text-dark fw-normal" style="font-family: serif; font-size: 2.5rem;">Best Sellers</h2>
        </div>
        <!-- Moisturizer -->
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/assets/33.jpg" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Moisturizer</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">Rice water with Niacinamide</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Moisturizer', '/assets/33.jpg', 'Rice water with Niacinamide')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i class="bi bi-bag me-1"></i>
                            Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Moisturizer', '/assets/33.jpg', 'Rice water with Niacinamide')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hyaluronic Serum -->
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/assets/35.jpg" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Hyaluronic Serum</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">dewy and plumpy skin</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Hyaluronic Serum', '/assets/35.jpg', 'dewy and plumpy skin')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i class="bi bi-bag me-1"></i>
                            Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Hyaluronic Serum', '/assets/35.jpg', 'dewy and plumpy skin')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sunscreen -->
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/assets/23.jpg" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Sunscreen</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">spf50 and pa++++</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Sunscreen', '/assets/23.jpg', 'spf50 and pa++++')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i class="bi bi-bag me-1"></i>
                            Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Sunscreen', '/assets/23.jpg', 'spf50 and pa++++')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Oil cleanser -->
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/images/25.avif" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Oil cleanser</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">lightweight and non-comodegenic</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Oil cleanser', '/images/25.avif', 'lightweight and non-comodegenic')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Oil cleanser', '/images/25.avif', 'lightweight and non-comodegenic')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0 justify-content-center g-3 mt-4">
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3 d-flex align-items-stretch">
            <div class="card w-100 border-0 shadow-sm rounded overflow-hidden">
                <img src="/images/giphy.gif" class="card-img-top w-100" style="object-fit: cover; aspect-ratio: 16/9;">
                <div class="card-body p-0 d-flex align-items-center justify-content-center flex-column product-memo bg-light text-center h-100"
                    style="min-height: 120px;">
                    <i class="bi bi-qr-code fs-1 text-primary"></i>
                    <p class="mb-0 fw-bold mt-2" style="font-size: 14px;">Enjoy Convenient</p>
                    <p class="mb-0 text-muted" style="font-size: 13px;">Order Tracking</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <div class="position-absolute top-0 start-0 m-2">
                    <span class="badge bg-danger rounded-pill memo" style="font-size: 10px;">Trending</span>
                </div>
                <img src="/images/1.png" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Eye cream</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">reduce puffiness and dark circle</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/assets/21.jpg" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Sunscreen</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">gel based spf50</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Sunscreen', '/assets/21.jpg', 'gel based spf50')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Sunscreen', '/assets/21.jpg', 'gel based spf50')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/images/2.png" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Retinal serum</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">for anti-aging and brightening</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Retinal serum', '/images/2.png', 'for anti-aging and brightening')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Retinal serum', '/images/2.png', 'for anti-aging and brightening')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0 justify-content-center g-3 mt-4">
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <div class="position-absolute top-0 start-0 m-2">
                    <span class="badge bg-danger rounded-pill memo" style="font-size: 10px;">Trending</span>
                </div>
                <img src="/images/1.png" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Eye cream</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">reduce puffiness and dark circle</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <div class="position-absolute top-0 start-0 m-2">
                    <span class="badge bg-danger rounded-pill memo" style="font-size: 10px;">Trending</span>
                </div>
                <img src="/images/1.png" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Eye cream</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">reduce puffiness and dark circle</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Eye cream', '/images/1.png', 'reduce puffiness and dark circle')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/assets/21.jpg" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Sunscreen</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">gel based spf50</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Sunscreen', '/assets/21.jpg', 'gel based spf50')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Sunscreen', '/assets/21.jpg', 'gel based spf50')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 col-xl-2 p-1 p-md-3">
            <div class="card h-100 shadow-sm border-0 rounded product-card">
                <img src="/images/2.png" class="card-img-top rounded-top"
                    style="width: 100%; aspect-ratio: 3/2; object-fit: cover;" alt="">
                <div class="card-body d-flex flex-column p-3 text-center">
                    <h5 class="card-title text-dark fw-bold mb-1" style="font-size: 16px;">Retinal serum</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 13px;">for anti-aging and brightening</p>
                    <div class="mt-auto d-flex flex-column flex-xl-row justify-content-between gap-2">
                        <a href="#"
                            onclick="event.preventDefault(); triggerCart('Retinal serum', '/images/2.png', 'for anti-aging and brightening')"
                            class="btn btn-primary theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-bag me-1"></i> Cart</a>
                        <a href="#"
                            onclick="event.preventDefault(); triggerWishlist('Retinal serum', '/images/2.png', 'for anti-aging and brightening')"
                            class="btn btn-outline-danger theme-btn w-100" style="font-size: 13px;"><i
                                class="bi bi-heart me-1"></i> Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="wishlistForm" method="POST" action="/wishlist/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="wl_name">
        <input type="hidden" name="product_photo" id="wl_photo">
        <input type="hidden" name="description" id="wl_desc">
    </form>
    <script>
        function triggerWishlist(name, photo, desc) {
            document.getElementById('wl_name').value = name;
            document.getElementById('wl_photo').value = photo;
            document.getElementById('wl_desc').value = desc;
            document.getElementById('wishlistForm').submit();
        }
    </script>


    <form id="cartForm" method="POST" action="/cart/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="cart_name">
        <input type="hidden" name="product_photo" id="cart_photo">
        <input type="hidden" name="description" id="cart_desc">
    </form>
    <script>
        function triggerCart(name, photo, desc) {
            document.getElementById('cart_name').value = name;
            document.getElementById('cart_photo').value = photo;
            document.getElementById('cart_desc').value = desc;
            document.getElementById('cartForm').submit();
        }
    </script>
@endsection

@section('script')
    <script>
        const productImages = [
            "/assets/43.jpg",
            "/assets/44.jpg",
            "/assets/40.jpg",
            "/assets/41.jpg",
            "/assets/32.jpg",
            "/assets/37.jpg"
        ];
        let productIndex = 0;

        function autoSlideProduct() {
            productIndex = (productIndex + 1) % productImages.length;
            let img = document.getElementById("bannerImage");
            if (img) img.src = productImages[productIndex];
        }
        setInterval(autoSlideProduct, 3000);
    </script>
@endsection
