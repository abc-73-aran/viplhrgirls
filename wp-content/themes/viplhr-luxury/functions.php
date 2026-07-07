<?php
/**
 * VIPLHR Luxury Theme functions and definitions
 */

function viplhr_luxury_enqueue_styles() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), $version );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ), $version );
}
add_action( 'wp_enqueue_scripts', 'viplhr_luxury_enqueue_styles' );

// Add support for custom logo
add_theme_support( 'custom-logo' );

// Remove version strings from scripts/styles for security
function remove_wp_version_strings( $src ) {
    $query_string = parse_url( $src, PHP_URL_QUERY );
    if ( empty( $query_string ) ) {
        return $src;
    }
    parse_str( $query_string, $query );
    if ( ! empty( $query['ver'] ) && $query['ver'] === $GLOBALS['wp_version'] ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'remove_wp_version_strings' );
add_filter( 'style_loader_src', 'remove_wp_version_strings' );
