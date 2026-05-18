<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to eSewa...</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #f8f9fa;
            color: #333;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 48px 40px;
            text-align: center;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            max-width: 400px;
            width: 90%;
        }
        .esewa-logo {
            width: 120px;
            margin-bottom: 24px;
        }
        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #e8e8e8;
            border-top-color: #60bb46;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 0 auto 20px;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        h2 { font-size: 1.25rem; margin: 0 0 8px; }
        p  { color: #888; font-size: 0.9rem; margin: 0; }
    </style>
</head>
<body onload="document.getElementById('esewa-form').submit()">
    <div class="card">
        <div class="spinner"></div>
        <h2>Redirecting to eSewa</h2>
        <p>Please do not close or refresh this page.</p>
    </div>

    <form id="esewa-form" action="{{ config('esewa.form_url', 'https://rc-epay.esewa.com.np/api/epay/main/v2/form') }}" method="POST">
        @foreach($formData as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
</body>
</html>
