<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class API_Endpoints
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes()
    {
        register_rest_route('cdp/v1', '/example', [
            'methods' => 'GET',
            'callback' => [$this, 'example_endpoint'],
            'permission_callback' => '__return_true'
        ]);
    }

    public function example_endpoint()
    {
        return rest_ensure_response(['message' => 'Hello from the custom endpoint!']);
    }
}

new API_Endpoints();
