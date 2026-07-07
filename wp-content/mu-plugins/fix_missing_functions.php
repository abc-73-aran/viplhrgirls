<?php
/**
 * Plugin Name: Fix Missing Functions
 * Description: Safely provides is_plugin_active() for Elementor compatibility. Suppresses debug output on frontend.
 */

// Suppress ALL PHP error/warning/notice display on the browser frontend.
// Errors still get logged to server logs - this just prevents them showing to visitors.
@ini_set( 'display_errors', 0 );
@ini_set( 'display_startup_errors', 0 );
error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED );

// Load WordPress's official plugin functions if not already available.
// Using require_once means it will NEVER double-load or cause redeclare errors.
if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
