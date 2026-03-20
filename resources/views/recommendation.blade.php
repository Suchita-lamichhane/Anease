<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Skin Type Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #loginBtn {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        #loginBtn:hover {
            transform: scale(1.05);
        }
    </style>

</head>

<body class="bg-light d-flex align-items-center" style="min-height:100vh;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4">
                    <h4 class="text-center mb-4">Find Your Skin Type</h4>
                    <form id="skinForm">

                        <div class="mb-3"><label class="form-label">1. How does your skin feel after
                                washing?</label><select class="form-select" name="q1">
                                <option value="">Select</option>
                                <option value="dry">Tight and dry</option>
                                <option value="oily">Greasy</option>
                                <option value="normal">Comfortable</option>
                            </select></div>

                        <div class="mb-3"><label class="form-label">2. How often does your face get
                                shiny?</label><select class="form-select" name="q2">
                                <option value="">Select</option>
                                <option value="oily">Very often</option>
                                <option value="combo">Only T-zone</option>
                                <option value="normal">Rarely</option>
                            </select></div>

                        <div class="mb-3"><label class="form-label">3. Do you experience irritation or
                                redness?</label><select class="form-select" name="q3">
                                <option value="">Select</option>
                                <option value="sensitive">Often</option>
                                <option value="normal">Rarely</option>
                            </select></div>

                        <div class="mb-3"><label class="form-label">4. How visible are your
                                pores?</label><select class="form-select" name="q4">
                                <option value="">Select</option>
                                <option value="oily">Large and visible</option>
                                <option value="normal">Small or invisible</option>
                            </select></div>
                        <button type="button" class="btn btn-success w-100" onclick="checkSkin()">Check Result
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <h5 id="result"></h5>
                    </div>
                    <div class="mt-3 text-center"><button id="loginBtn" class="btn btn-success d-none ">
                            <a href="/login"  class="text-decoration-none text-white">Login to Continue</a></button></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkSkin() {
            const form = document.forms["skinForm"];

            let answers = [
                form["q1"].value,
                form["q2"].value,
                form["q3"].value,
                form["q4"].value
            ];

            let score = {
                oily: 0,
                dry: 0,
                combo: 0,
                sensitive: 0,
                normal: 0
            };

            answers.forEach(ans => {
                if (ans) score[ans]++;
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
            document.getElementById("loginBtn").classList.remove("d-none");

        }
    </script>
</body>

</html>
