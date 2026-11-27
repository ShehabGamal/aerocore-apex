<?php
/**
 * AeroCore Apex DTC — Theme Setup & Asset Enqueue
 */
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function (): void {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'elementor' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
} );

// Register Elementor Theme Builder locations (Header, Footer, Single, Archive)
add_action( 'elementor/theme/register_locations', function ( $elementor_theme_manager ): void {
    $elementor_theme_manager->register_all_core_location();
} );

add_action( 'wp_enqueue_scripts', function (): void {
    wp_enqueue_style(
        'aerocore-apex-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'aerocore-apex-main',
        get_stylesheet_directory_uri() . '/assets/styles.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'aerocore-apex-app',
        get_stylesheet_directory_uri() . '/assets/app.js',
        [],
        '1.0.0',
        true
    );
}, 15 );

// Load WooCommerce conversion hooks only when WooCommerce is active
if ( class_exists( 'WooCommerce' ) && file_exists( get_stylesheet_directory() . '/woocommerce/functions.php' ) ) {
    require_once get_stylesheet_directory() . '/woocommerce/functions.php';
}

add_action( 'after_setup_theme', function (): void {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
} );

