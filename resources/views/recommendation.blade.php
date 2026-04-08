@extends('main')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow p-4 border-0 rounded-4">
                <h4 class="text-center mb-4 "><i>Find Your Skin Type</i></h4>
                <form id="skinForm">

                    <div class="mb-4">
                        <label class="form-label fw-bold">1. How does your skin feel after washing?</label>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="radio" class="btn-check" name="q1" id="q1_dry" value="dry" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q1_dry">Tight and dry</label>

                            <input type="radio" class="btn-check" name="q1" id="q1_oily" value="oily" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q1_oily">Greasy</label>

                            <input type="radio" class="btn-check" name="q1" id="q1_normal" value="normal" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q1_normal">Comfortable</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">2. How often does your face get shiny?</label>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="radio" class="btn-check" name="q2" id="q2_oily" value="oily" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q2_oily">Very often</label>

                            <input type="radio" class="btn-check" name="q2" id="q2_combo" value="combo" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q2_combo">Only T-zone</label>

                            <input type="radio" class="btn-check" name="q2" id="q2_normal" value="normal" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q2_normal">Rarely</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">3. Do you experience irritation or redness?</label>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="radio" class="btn-check" name="q3" id="q3_sensitive" value="sensitive" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q3_sensitive">Often</label>

                            <input type="radio" class="btn-check" name="q3" id="q3_normal" value="normal" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q3_normal">Rarely</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">4. How visible are your pores?</label>
                        <div class="d-flex flex-wrap gap-2">
                            <input type="radio" class="btn-check" name="q4" id="q4_oily" value="oily" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q4_oily">Large and visible</label>

                            <input type="radio" class="btn-check" name="q4" id="q4_normal" value="normal" autocomplete="off">
                            <label class="btn btn-outline-secondary rounded-pill" for="q4_normal">Small or invisible</label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100 theme-btn py-2 mt-3" onclick="checkSkin()">Check Result</button>
                </form>

                <div class="mt-4 text-center">
                    <h5 id="result" class="fw-bold text-dark"></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkSkin() {
        const form = document.forms["skinForm"];

        let q1 = form.querySelector('input[name="q1"]:checked');
        let q2 = form.querySelector('input[name="q2"]:checked');
        let q3 = form.querySelector('input[name="q3"]:checked');
        let q4 = form.querySelector('input[name="q4"]:checked');

        if (!q1 || !q2 || !q3 || !q4) {
            alert("Please answer all questions.");
            return;
        }

        let answers = [q1.value, q2.value, q3.value, q4.value];

        let score = {
            oily: 0,
            dry: 0,
            combo: 0,
            sensitive: 0,
            normal: 0
        };

        answers.forEach(ans => {
            if (ans && score[ans] !== undefined) score[ans]++;
        });

        let result = Object.keys(score).reduce((a, b) => score[a] > score[b] ? a : b);

        let message = "";

        switch (result) {
            case "oily":
                message = "You have Oily Skin 💧";
                break;
            case "dry":
                message = "You have Dry Skin 🌵";
                break;
            case "combo":
                message = "You have Combination Skin 🔄";
                break;
            case "sensitive":
                message = "You have Sensitive Skin ⚠️";
                break;
            default:
                message = "You have Normal Skin 🙂";
        }

        document.getElementById("result").innerText = message;
    }
</script>
@endsection
