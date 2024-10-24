<?php
/*
Plugin Name: Custom Dashboard Panel
Description: A custom admin panel built with React.
Version: 1.0
Author: Niloy
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include necessary files.
require_once plugin_dir_path(__FILE__) . 'includes/AdminPage.php';
require_once plugin_dir_path(__FILE__) . 'includes/SettingsAPI.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-api-endpoints.php';

// Enqueue the React app.
function cdp_enqueue_assets()
{
    $manifest_path = plugin_dir_path(__FILE__) . 'assets/.vite/manifest.json';
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        $file_name = $manifest['src/main.jsx']['file']; // Adjust the key if different
        $react_app_url = plugin_dir_url(__FILE__) . 'assets/' . $file_name;

        wp_enqueue_script('cdp-react-app', $react_app_url, ['wp-element'], time(), true);
        wp_localize_script('cdp-react-app', 'CDP_SETTINGS', [
            'apiUrl' => esc_url_raw(rest_url('cdp/v1/')),
            'nonce' => wp_create_nonce('wp_rest')
        ]);
    }
}
add_action('admin_enqueue_scripts', 'cdp_enqueue_assets');



// Register the admin page.
add_action('admin_menu', 'cdp_register_admin_page');
function cdp_register_admin_page()
{
    add_menu_page(
        'Custom Dashboard Panel',
        'Custom Dashboard',
        'manage_options',
        'custom-dashboard-panel',
        'cdp_render_admin_page',
        'dashicons-admin-generic',
        20
    );
}

// Render the admin page content.
function cdp_render_admin_page()
{
    echo '<div id="cdp-admin-panel"></div>';
}
