<?php

return [
    'sanbox' => env('ATLAS_SANBOX', false),
    'api_key' =>  env('ATLAS_SANBOX') ? env('SANBOX_ATLAS_XCLIENTID', 'default'): env('ATLAS_XCLIENTID', 'default'),
    'client_id' =>  env('ATLAS_SANBOX') ? env('SANBOX_ATLAS_CLIENT_ID', 'default') : env('ATLAS_CLIENT_ID', 'default'),
    'client_secret' => env('ATLAS_SANBOX') ? env('SANBOX_ATLAS_SECRET', 'default') :  env('ATLAS_SECRET', 'default'),
    'grant_type' =>  env('ATLAS_SANBOX') ? env('SANBOX_ATLAS_GRANT_TYPE', '') : env('ATLAS_GRANT_TYPE', ''),
    'scopes' =>  env('ATLAS_SANBOX') ? env('SANBOX_ATLAS_SCOPES', '') : env('ATLAS_SCOPES', ''),
    'url' => env('ATLAS_SANBOX') ? env('ATLAS_URL_SANBOX', '') : env('ATLAS_URL', ''),
    'profile_questions' => [
        'firstname' => '',
        'lastname' => '',
        'company' => [],
        'jobtitle' => '',
        'phone' => '',
        'locale' => 'Es-MX',
        'categories_ids' => []
    ],
];
