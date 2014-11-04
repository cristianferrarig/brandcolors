<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <title>BrandColors</title>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="site-header">
      <div class="widget widget-title">
        <h1 class="site-title">BrandColors</h1>
      </div>

      <div class="widget widget-nav">
        <ul>
          <li><a href="<?php echo site_url( '/about/' ); ?>">About</a></li>
          <li><a href="<?php echo site_url( '/contribute/' ); ?>">Contribute</a></li>
          <li><a href="https://twitter.com/brandcolorsnet" target="_blank">@brandcolorsnet</a></li>
        </ul>
      </div>

      <div class="widget widget-sharing">
        <div class="addthis_native_toolbox"></div>
      </div>
    </header>

    <main class="site-main">