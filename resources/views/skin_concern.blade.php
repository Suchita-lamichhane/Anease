@extends('main')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 shadow border-0 rounded-4">
                    <h4 class="text-center mb-4"><i>Skincare Recommendation</i></h4>

                    <!-- Questions Row (Top) -->
                    <div>
                        <!-- Skin Type (Always Visible) -->
                        <select id="skinType" class="form-select mb-3 rounded-pill bg-light border-secondary"
                            onchange="checkSkinType()">
                            <option value="">Select Your Skin Type to Begin</option>
                            <option>Dry</option>
                            <option>Oily</option>
                            <option>Normal</option>
                            <option>Sensitive</option>
                        </select>

                        <!-- Additional Questions (Hidden Initially) -->
                        <div id="additional-questions" style="display: none;">
                            <!-- Main Concern -->
                            <select id="concern" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Main Concern</option>
                                <option>Acne</option>
                                <option>Pigmentation</option>
                                <option>Wrinkles</option>
                                <option>Dullness</option>
                            </select>

                            <!-- Severity -->
                            <select id="severity" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Severity</option>
                                <option>Mild</option>
                                <option>Moderate</option>
                                <option>Severe</option>
                            </select>

                            <!-- Sensitivity -->
                            <select id="sensitivity" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Sensitivity</option>
                                <option>Not sensitive</option>
                                <option>Slightly sensitive</option>
                                <option>Very sensitive</option>
                            </select>

                            <select id="breakouts" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Breakouts Frequency</option>
                                <option>Rarely</option>
                                <option>Sometimes</option>
                                <option>Frequently</option>
                            </select>

                            <select id="spots" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Dark Spots</option>
                                <option>No</option>
                                <option>Slight</option>
                                <option>Very noticeable</option>
                            </select>

                            <select id="afterWash" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">After Washing Skin Feels</option>
                                <option>Dry</option>
                                <option>Normal</option>
                                <option>Oily</option>
                            </select>

                            <select id="sunscreen" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Use Sunscreen?</option>
                                <option>Yes</option>
                                <option>Sometimes</option>
                                <option>No</option>
                            </select>

                            <select id="goal" class="form-select mb-3 rounded-pill bg-light border-secondary">
                                <option value="">Main Goal</option>
                                <option>Clear acne</option>
                                <option>Brighten skin</option>
                                <option>Anti-aging</option>
                                <option>Hydration</option>
                            </select>

                            <button class="btn btn-primary w-100 theme-btn py-2 mt-3" onclick="getRecommendation()">Get
                                Recommendation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommendations Row (Bottom) -->
        <div class="row justify-content-center mt-5" id="recommendation-results-row" style="display: none;">
            <div class="col-md-10">
                <div class="card p-4 shadow border-0 rounded-4">
                    <div id="concern-result" class="text-center  fst-italic text-dark fs-5 mb-4 px-md-4"></div>

                    <div id="recommended-products-container" style="display: none;">
                        <h5 class="fw-bold mb-4 text-center text-uppercase" style="letter-spacing: 1.5px;">Recommended For
                            You</h5>
                        <div class="row g-4 justify-content-center" id="recommended-products">
                            <!-- Products will be injected here -->
                        </div>
                    </div>

                    <div id="concern-action-container" class="mt-4 text-center" style="display: none;">
                        <a href="/product" class="btn btn-outline-danger theme-btn px-4 py-2">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms for adding to cart/wishlist directly from recommendations -->
    <form id="recWishlistForm" method="POST" action="/wishlist/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="rec_wl_name">
        <input type="hidden" name="product_photo" id="rec_wl_photo">
        <input type="hidden" name="product_price" id="rec_wl_price">
        <input type="hidden" name="description" id="rec_wl_desc">
    </form>

    <form id="recCartForm" method="POST" action="/cart/add" class="d-none">
        @csrf
        <input type="hidden" name="product_name" id="rec_cart_name">
        <input type="hidden" name="product_photo" id="rec_cart_photo">
        <input type="hidden" name="product_price" id="rec_cart_price">
        <input type="hidden" name="description" id="rec_cart_desc">
    </form>

    <script>
        const allProducts = @json($products ?? []);

        function checkSkinType() {
            let skinType = document.getElementById("skinType").value;
            let additionalQuestions = document.getElementById("additional-questions");
            if (skinType !== "") {
                additionalQuestions.style.display = "block";
                // Smooth reveal effect could go here
                additionalQuestions.style.opacity = 0;
                setTimeout(() => {
                    additionalQuestions.style.transition = "opacity 0.5s";
                    additionalQuestions.style.opacity = 1;
                }, 50);
            } else {
                additionalQuestions.style.display = "none";
            }
        }

        function triggerRecCart(name, photo, desc, price) {
            document.getElementById('rec_cart_name').value = name;
            document.getElementById('rec_cart_photo').value = photo;
            document.getElementById('rec_cart_price').value = price;
            document.getElementById('rec_cart_desc').value = desc;
            document.getElementById('recCartForm').submit();
        }

        function triggerRecWishlist(name, photo, desc, price) {
            document.getElementById('rec_wl_name').value = name;
            document.getElementById('rec_wl_photo').value = photo;
            document.getElementById('rec_wl_price').value = price;
            document.getElementById('rec_wl_desc').value = desc;
            document.getElementById('recWishlistForm').submit();
        }

        function getRecommendation() {

            let skinType = document.getElementById("skinType").value;
            let concern = document.getElementById("concern").value;
            let severity = document.getElementById("severity").value;
            let sensitivity = document.getElementById("sensitivity").value;
            let breakouts = document.getElementById("breakouts").value;
            let spots = document.getElementById("spots").value;
            let sunscreen = document.getElementById("sunscreen").value;
            let goal = document.getElementById("goal").value;

            let resultText = "";
            let recommendationKeywords = [];

            // Base recommendation rules combining skin type and concern
            if (concern === "Acne" || breakouts === "Frequently") {
                if (skinType === "Oily") {
                    resultText = "Use a gentle foaming cleanser, oil-control treatments (like salicylic acid and niacinamide) to reduce acne and marks, a light oil-free moisturizer, and daily sunscreen to prevent pigmentation from worsening.";
                } else if (skinType === "Dry") {
                    resultText = "Use a gentle hydrating cleanser, a targeted treatment for acne and pigmentation (like salicylic acid or niacinamide), a nourishing moisturizer, and sunscreen daily to heal dryness, control breakouts, and fade dark spots.";
                } else {
                    // For Normal or Sensitive skin
                    resultText = "Use a mild cleanser, targeted treatments (like salicylic acid) for breakouts, a balanced moisturizer, and daily sunscreen to ensure clear skin without irritation.";
                }
                recommendationKeywords.push("oil cleanser", "gel-based moisturizer", "acne", "Niacinamide", "cleanser");
            } else if (concern === "Pigmentation" || spots === "Very noticeable") {
                if (skinType === "Oily") {
                    resultText = "Use a gentle foaming cleanser, oil-control and brightening ingredients like niacinamide or vitamin C to reduce pigmentation, a light oil-free moisturizer, and daily gel-based sunscreen to prevent dark spots from worsening.";
                } else if (skinType === "Dry") {
                    resultText = "Use a gentle hydrating cleanser, rich moisturizer, brightening ingredients like vitamin C or niacinamide to reduce pigmentation, and daily cream-based sunscreen to protect and even out skin tone.";
                } else {
                    resultText = "Prioritize daily SPF protection to prevent darkening, and use brightening serums to even out skin tone.";
                }
                recommendationKeywords.push("sunscreen", "spf", "brightening", "serum", "vitamin c");
            } else if (concern === "Wrinkles" || goal === "Anti-aging") {
                resultText =
                    "Incorporate retinal serum at night for cellular turnover, keeping the delicate eye area deeply hydrated with an eye cream.";
                recommendationKeywords.push("retinal", "serum", "eye cream", "anti-aging");
            } else if (concern === "Dullness" || goal === "Brighten skin") {
                resultText =
                    "Focus on deep hydration to plump the skin and restore its natural glow, sealing it with a good moisturizer.";
                recommendationKeywords.push("hyaluronic serum", "moisturizer", "brighten");
            } else {
                // Fallback
                resultText = "Consistency is key! Keep your skin hydrated and protected every day.";
                recommendationKeywords.push("moisturizer", "sunscreen");
            }

            // Additional advice
            if (goal === "Hydration") {
                resultText +=
                    "<br/><br/><span class='text-primary'>💡 Tip: Apply hyaluronic serum on slightly damp skin.</span>";
                recommendationKeywords.push("hyaluronic");
            }

            if (sunscreen === "No") {
                resultText +=
                    "<br/><br/><span class='text-danger'>⚠ Warning: You must start wearing sunscreen daily regardless of your routine.</span>";
                if (!recommendationKeywords.includes("sunscreen")) recommendationKeywords.push("sunscreen");
            }

            if (sensitivity === "Very sensitive") {
                resultText +=
                    "<br/><br/><i>Since your skin is sensitive, introduce new products slowly and patch test first.</i>";
            }

            if (severity === "Severe") {
                resultText +=
                    "<br/><br/><span class='text-danger fw-bold'>Consider consulting a dermatologist for persistent severe issues.</span>";
            }

            let showActionBtn = true;
            if (!resultText || concern === "") {
                resultText = "<span class='text-danger'>⚠ Please select your main concern and goal.</span>";
                showActionBtn = false;
            }

            document.getElementById("concern-result").innerHTML = resultText;
            document.getElementById("concern-action-container").style.display = showActionBtn ? "block" : "none";
            document.getElementById("recommendation-results-row").style.display = "flex";

            // Filter Products
            let matchedProducts = [];
            if (showActionBtn && allProducts && allProducts.length > 0) {
                matchedProducts = allProducts.filter(product => {
                    let textToSearch = (product.name + " " + product.description + " " + (product.category || "")).toLowerCase();
                    return recommendationKeywords.some(keyword => textToSearch.includes(keyword.toLowerCase()));
                });

                // If nothing matched exactly, show some popular defaults
                if (matchedProducts.length === 0) {
                    matchedProducts = allProducts.slice(0, 4);
                } else {
                    // Ensure unique items
                    matchedProducts = [...new Map(matchedProducts.map(item => [item['id'], item])).values()];
                }

                // Render matched products
                let productsHtml = "";
                matchedProducts.forEach(product => {
                    productsHtml += `
                <div class="col-6 col-md-4 col-lg-3 p-2">
                    <div class="card h-100 shadow-sm border-0 rounded product-card">
                        <img src="${product.photo}" class="card-img-top rounded-top" style="width: 100%; aspect-ratio: 3/2; object-fit: cover;">
                        <div class="card-body p-2 text-center d-flex flex-column">
                            <h6 class="card-title text-dark fw-bold mb-1" style="font-size: 14px;">${product.name}</h6>
                            <p class="fw-bold mb-1" style="color: var(--primary-pink); font-size: 13px;">$${product.price}</p>
                            <p class="card-text text-muted mb-2" style="font-size: 11px;">${product.description}</p>
                            <div class="mt-auto d-flex flex-column gap-1">
                                <button onclick="event.preventDefault(); triggerRecCart('${product.name}', '${product.photo}', '${product.description}', '${product.price}')" class="btn btn-primary theme-btn w-100" style="font-size: 11px; padding: 4px;"><i class="bi bi-bag me-1"></i> Cart</button>
                                <button onclick="event.preventDefault(); triggerRecWishlist('${product.name}', '${product.photo}', '${product.description}', '${product.price}')" class="btn btn-outline-danger theme-btn w-100" style="font-size: 11px; padding: 4px;"><i class="bi bi-heart me-1"></i> Wish</button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                });

                document.getElementById("recommended-products").innerHTML = productsHtml;
                document.getElementById("recommended-products-container").style.display = "block";

                // Smoothly scroll down to recommendations
                setTimeout(() => {
                    document.getElementById("recommendation-results-row").scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            } else {
                document.getElementById("recommended-products-container").style.display = "none";
            }
        }
    </script>
@endsection
