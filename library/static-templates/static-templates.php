<?php
/**
 * Plugin Name: Static Templates
 *
 * If most of your site content is in .php template files, and you're tired of
 * creating new pages, assigning them page templates, creating page templates
 * then doing it all over again on production, this plugin is for you.
 *
 * Examples:
 *
 * - /foo/          => /wp-content/themes/twentyten/static-templates/foo.php
 * - /foo/bar/      => /wp-content/themes/twentyten/static-templates/foo-bar.php
 * - /foo/bar/baz/  => /wp-content/themes/twentyten/static-templates/foo-bar-baz.php
 *
 * You're welcome.
 */

add_filter( 'template_include', function( $template ) {
  $url = parse_url( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
  $home = parse_url( home_url( '/' ) );
  $request = trim( preg_replace( '#^' . preg_quote( $home['path'] ) . '#i', '', $url['path'] ), '/' );

  if ( ! is_404() || empty( $request ) )
    return $template;

  // Loop throuh parts and makes ure they're sane.
  $parts = explode( '/', $request );
  foreach ( $parts as $part )
    if ( ! preg_match( '#^[a-z0-9-]+$#i', $part ) )
      return $template;

  // Using stylesheet directory so parent/child themes don't share static pages.
  $template_name = implode( '-', $parts );
  $template_path = get_stylesheet_directory() . sprintf( '/static-templates/%s.php', $template_name );

  if ( file_exists( $template_path ) ) {
    $template = $template_path;

    // We want trailing slashes, this is our last chance for a redirect.
    if ( trailingslashit( $url['path'] ) != $url['path'] ) {
      $url['path'] = trailingslashit( $url['path'] );
      $redirect = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $url['path'] );
      if ( ! empty( $url['query'] ) )
        $redirect .= '?' . $url['query'];

      wp_safe_redirect( esc_url_raw( $redirect ) );
      die();
    }

    // We're hi-jacking 404s.
    status_header( 200 );
  }

  return $template;
});

add_action( 'template_redirect', function() {
  // Core will redirect /dashboard/ to /wp-admin/, we don't want that. Unless you do.
  remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
});