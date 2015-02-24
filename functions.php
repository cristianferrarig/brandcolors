<?php
/**
 * Functions
 */

/**
 * Disables WordPress admin bar.
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Enquque style and script assets.
 */
function bc_assets() {

  // Styles
  wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'brandcolors', get_template_directory_uri() . '/assets/css/brandcolors.css' );

  // Scripts
  wp_enqueue_script( 'typekit',     '//use.typekit.net/oif4irt.js' );
  wp_enqueue_script( 'color',       get_template_directory_uri() . '/assets/js/color.js' );
  wp_enqueue_script( 'brandcolors', get_template_directory_uri() . '/assets/js/brandcolors.js', array( 'jquery', 'color' ) );

}
add_action( 'wp_enqueue_scripts', 'bc_assets' );

/**
 * Add theme support for various WP features.
 */
function bc_support() {

  add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'bc_support' );