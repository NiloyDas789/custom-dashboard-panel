<?php

if (!defined('ABSPATH')) {
    exit;
}

class SettingsAPI
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes()
    {
        register_rest_route('cdp/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [$this, 'get_settings'],
            'permission_callback' => [$this, 'permissions_check'],
        ]);
        register_rest_route('cdp/v1', '/settings', [
            'methods' => 'POST',
            'callback' => [$this, 'update_settings'],
            'permission_callback' => [$this, 'permissions_check'],
        ]);
    }

    public function get_settings()
    {
        return get_option('cdp_settings', []);
    }

    public function update_settings(WP_REST_Request $request)
    {
        update_option('cdp_settings', $request->get_json_params());
        return rest_ensure_response(['status' => 'success']);
    }

    public function permissions_check()
    {
        return current_user_can('manage_options');
    }
}

new SettingsAPI();
