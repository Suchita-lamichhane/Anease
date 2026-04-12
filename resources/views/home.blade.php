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
                     <!-- Popular Categories Section -->
                    <div class="col-12 my-5 py-5 rounded" style="background-color: #F7F5F2;">
                        <div class="text-center mb-5">
                            <h6 class="text-uppercase text-muted mb-2" style="font-size: 11px; letter-spacing: 2px;">Shop by Categories</h6>
                            <h2 class="text-dark fw-normal" style="font-family: serif; font-size: 2.5rem;">Popular Categories</h2>
                        </div>
                        
                        <div class="row m-0 justify-content-center text-center">
                            <div class="col-6 col-md-3 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <div style="border: 1px dashed #bdaea0; border-radius: 150px; padding: 8px; width: 140px; height: 210px;" class="mb-3">
                                    <img src="/assets/20.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 140px;" alt="Bio-Herbal">
                                </div>
                                <h6 class="mb-1 text-dark" style="font-weight: 600;">Oily-skin</h6>
                                <small class="text-muted" style="font-size: 11px;">3 items</small>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <div style="border: 1px dashed #bdaea0; border-radius: 150px; padding: 8px; width: 140px; height: 210px;" class="mb-3">
                                    <img src="/assets/18.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 140px;" alt="Body-Lotion">
                                </div>
                                <h6 class="mb-1 text-dark" style="font-weight: 600;">Dry-skin</h6>
                                <small class="text-muted" style="font-size: 11px;">4 items</small>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <div style="border: 1px dashed #bdaea0; border-radius: 150px; padding: 8px; width: 140px; height: 210px;" class="mb-3">
                                    <img src="/assets/24.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 140px;" alt="Candle-Spa">
                                </div>
                                <h6 class="mb-1 text-dark" style="font-weight: 600;">Sensitive-skin</h6>
                                <small class="text-muted" style="font-size: 11px;">2 items</small>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <div style="border: 1px dashed #bdaea0; border-radius: 150px; padding: 8px; width: 140px; height: 210px;" class="mb-3">
                                    <img src="/assets/29.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 140px;" alt="Skin-Care">
                                </div>
                                <h6 class="mb-1 text-dark" style="font-weight: 600;">Normal-skin</h6>
                                <small class="text-muted" style="font-size: 11px;">4 items</small>
                            </div>
                        </div>
                    </div>
                   
                    

                    <!-- Best of Collection Section -->
                    <div class="row m-0 my-5 bg-white shadow-sm rounded overflow-hidden align-items-stretch">
                        <!-- Left Small Image -->
                        <div class="col-12 col-md-3 p-4 d-flex justify-content-center align-items-center" style="background-color: #fdfdfd;">
                            <img src="/assets/15.jpg" alt="Skincare routine" class="rounded shadow-sm" style="width: 140px; height: 210px; object-fit: cover;">
                        </div>
                        
                        <!-- Middle Column: Text Box -->
                        <div class="col-12 col-md-5 p-4 d-flex flex-column justify-content-center text-center text-md-start position-relative" style="background-color: #F8F6F0;">
                            <h6 class="text-uppercase text-muted mb-2" style="font-size: 10px; letter-spacing: 2px;">Best by Collection 2026</h6>
                            <h2 class="text-dark fw-normal mb-3" style="font-family: serif; font-size: 1.8rem; line-height: 1.2;">Discover your true skin<br>care for all skin types</h2>
                            <p class="text-muted mb-4" style="font-size: 11px; line-height: 1.6;">Our exclusive assortment is rich organically and beautifully. To embrace our dedication to fostering glowing skin of vitality.</p>
                            <div>
                                <a href="/product" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase" style="font-size: 10px; letter-spacing: 1px;">Shop Now</a>
                            </div>
                            
                            <!-- Decorator Badge -->
                            <div class="position-absolute bg-white rounded-circle d-none d-lg-flex align-items-center justify-content-center shadow-sm" style="width: 70px; height: 70px; top: 50%; right: -35px; transform: translateY(-50%); z-index: 10;">
                                <div class="text-center text-uppercase" style="font-size: 7px; letter-spacing: 1px; color: #7b7167; padding: 5px; border: 1px dashed #bdaea0; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">100%<br>Herbal</div>
                            </div>
                        </div>
                        
                        <!-- Right Column: Images Side-by-Side -->
                        <div class="col-12 col-md-4 p-4 d-flex flex-row flex-wrap justify-content-center align-items-center gap-2">
                            <img src="/assets/22.jpg" alt="Herbal Product" class="rounded shadow-sm" style="width: 140px; height: 210px; object-fit: cover;">
                            <img src="/assets/2.png" alt="Hand holding product" class="rounded shadow-sm d-none d-xl-block" style="width: 140px; height: 210px; object-fit: cover;">
                        </div>
                        
                        <!-- Full Width Bottom Text -->
                        <div class="col-12 d-flex flex-column align-items-center justify-content-center p-3 border-top" style="background-color: #F8F6F0;">
                            <h6 class="text-uppercase text-muted mb-2" style="font-size: 9px; letter-spacing: 3px;">Treasure Products</h6>
                            <p class="text-center text-dark m-0" style="font-family: serif; font-size: 1rem; max-width: 400px; line-height: 1.4;">Having a place set aside for an activity you love makes it more likely you'll do it.</p>
                        </div>
                    </div>
                    

@endsection

@section('script')
<script>
    const homeImages = [
        "/images/1.jpg",
        "/images/2.jpg", 
        "/images/9.avif",
        "/images/6.avif",
        "/images/7.avif"
    ];
    let homeIndex = 0;

    function autoSlideHome() {
        homeIndex = (homeIndex + 1) % homeImages.length;
        let img = document.getElementById("bannerImage");
        if(img) img.src = homeImages[homeIndex];
    }
    setInterval(autoSlideHome, 3000);
</script>
@endsection
