<?php 

return [
    'prod' => [
        'url' => env('SFORCE_URL', null),  
        'client_id' => env('SFORCE_CLIENT', null), 
        'client_secret' => env('SFORCE_SECRET', null), 
        'username' => env('SFORCE_USERNAME', null), 
        'password' => env('SFORCE_PASSWORD', null), 
        'grant_type' => env('SFORCE_GRANT', null) 
    ],
    'pardot' => [
        'business_id' => env('PARDOT_BUSINESS_ID', null)
    ],
    'sandbox' => [
        'url' => env('SFORCE_URL_SANDBOX', null),  
        'client_id' => env('SFORCE_CLIENT_SANDBOX', null), 
        'client_secret' => env('SFORCE_SECRET_SANDBOX', null), 
        'username' => env('SFORCE_USERNAME_SANDBOX', null), 
        'password' => env('SFORCE_PASSWORD_SANDBOX', null), 
        'grant_type' => env('SFORCE_GRANT_SANDBOX', null) 
    ]
]

?>