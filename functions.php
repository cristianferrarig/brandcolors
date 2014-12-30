<?php
/**
 * Functions
 */

/**
 * Enquque style and script assets.
 */
function bc_assets() {

  // Styles
  wp_enqueue_style( 'genericons',   get_template_directory_uri() . '/library/genericons/genericons/genericons.css' );
  wp_enqueue_style( 'brandcolors',  get_template_directory_uri() . '/assets/css/master.css' );

  // Scripts
  wp_enqueue_script( 'brandcolors', get_template_directory_uri() . '/assets/js/master.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'bc_assets' );