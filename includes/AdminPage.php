<?php

if (!defined('ABSPATH')) {
    exit;
}

class AdminPage
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function register_settings()
    {
        register_setting('cdp_settings_group', 'cdp_settings');
        add_settings_section('cdp_main_section', 'Main Settings', null, 'cdp_settings');
    }
}

new AdminPage();
