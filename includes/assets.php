<?php
/**
 * Assets
 */

/**
 * Enquque style and script assets.
 */
function bc_assets() {

  // Stylesheets
  wp_enqueue_style( 'bc-app',         get_template_directory_uri() . '/assets/css/app.css' );
  wp_enqueue_style( 'bc-genericons', get_template_directory_uri() . '/library/genericons/genericons/genericons.css' );

  // Scripts
  wp_enqueue_script( 'bc-app', get_template_directory_uri() . '/assets/js/src/app.js', array( 'jquery' ) );
  wp_enqueue_script( 'bc-addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5459192310816305' );

}
add_action( 'wp_enqueue_scripts', 'bc_assets' );