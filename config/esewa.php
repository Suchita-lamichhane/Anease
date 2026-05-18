<?php

return [
    'merchant_code' => env('ESEWA_MERCHANT_CODE', 'EPAYTEST'),
    'secret_key'    => env('ESEWA_SECRET_KEY', '8gBm/:&EnhH.1/q'),
    'form_url'      => env('ESEWA_FORM_URL', 'https://rc-epay.esewa.com.np/api/epay/main/v2/form'),
    'status_url'    => env('ESEWA_STATUS_URL', 'https://rc.esewa.com.np/api/epay/transaction/status/'),
];
