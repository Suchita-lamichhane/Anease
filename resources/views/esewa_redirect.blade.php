<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to eSewa...</title>
</head>
<body onload="document.forms[0].submit()">
    <div style="text-align: center; margin-top: 50px;">
        <h2>Redirecting to eSewa Secure Payment Gateway...</h2>
        <p>Please do not refresh the page.</p>
    </div>
    
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        @foreach($formData as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <input value="Submit" type="submit" style="display:none;">
    </form>
</body>
</html>
