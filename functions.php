<?php

function bc_assets() {

  wp_enqueue_style( 'genericons', get_template_directory_uri() . '/library/genericons/genericons/genericons.css' );

  wp_enqueue_style( 'bc-reset', get_template_directory_uri() . '/assets/css/src/reset.css' );
  wp_enqueue_style( 'bc', get_template_directory_uri() . '/assets/css/src/style.css' );

  wp_enqueue_script( 'bc', get_template_directory_uri() . '/assets/js/src/app.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'bc_assets' );