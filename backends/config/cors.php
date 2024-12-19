<?php

return [
    /*
     * You can enable CORS for 1 or multiple paths.
     * Example: ['api/*']
     */
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout', 'register'], // Ensure you include all paths you need

    /*
     * Matches the request origin. You can specify multiple allowed origins.
     */
    'allowed_origins' => ['http://localhost:5173','http://localhost:5173/api/ibans/check'],

    /*
     * Matches the request method. Use ['*'] for all methods.
     */
    'allowed_methods' => ['*'],

    /*
     * Matches the request headers. Use ['*'] for all possible headers.
     */
    'allowed_headers' => ['*'],

    /*
     * Sets whether or not the response to the request can be exposed when credentials are present.
     */
    'supports_credentials' => true,

    /*
     * Sets the Access-Control-Max-Age response header when appropriate.
     */
    'max_age' => 0,

    /*
     * Sets the Access-Control-Expose-Headers response header with these headers.
     */
    'exposed_headers' => [],
];
