<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BrandColors</title>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5459192310816305"></script>
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
      <div class="search">
        <input type="search" id="search-input" class="search-input" placeholder="Search&hellip;" autofocus>
      </div>

      <div class="collections">Collections</div>

      <?php

      require_once get_template_directory() . '/library/phpColors/src/Mexitek/PHPColors/Color.php';
      use Mexitek\PHPColors\Color;

      $args = array(
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'post_type'      => 'brand'
      );

      $posts = get_posts( $args );

      if ( $posts ) : foreach ( $posts as $post ) : setup_postdata( $post );

        $brand_id    = get_the_id();

        $colors      = get_post_meta( $brand_id, '_brand_colors', true );
        $colors      = explode( ',', $colors );

        $color_count = count( $colors );

        $brand_url   = get_post_meta( $brand_id, '_brand_url', true );

        $source_url  = get_post_meta( $brand_id, '_source_url', true );

      ?>
        <article class="brand cf" data-brand-id="<?php the_id(); ?>" data-brand-name="<?php the_title_attribute(); ?>">
          <header class="brand-header">
            <h1 class="brand-title">
              <?php if ( ! empty( $brand_url ) ) echo "<a href='$brand_url' target='_blank'>"; ?>
                <?php the_title(); ?>
              <?php if ( ! empty( $brand_url ) ) echo '</a>'; ?>
            </h1>
          </header>

          <div class="brand-colors cf">
            <?php

            foreach ( $colors as $color ) :

              $color     = new Color( $color );

              $shade     = ( $color->isDark( $color->darken( 30 ) ) ? 'dark' : 'light' );

              $hex       = $color->getHex();
              $rgb       = '';
              $hsl       = '';

              $i         = 1;
              $rgb_array = $color->getRgb();
              foreach ( $rgb_array as $val ) {
                $rgb .= $val;

                if ( $i != 3 ) $rgb .= ', ';

                $i++;
              }

              $i         = 1;
              $hsl_array = $color->getHsl();
              foreach ( $hsl_array as $val ) {
                $hsl .= $val;

                if ( $i == 1 ) {
                  $hsl .= '°';
                } else {
                  $hsl .= '%';
                }

                if ( $i != 3 ) $hsl .= ' ';

                $i++;
              }

            ?>
              <div class="color-container" style="width: <?php echo 100 / $color_count; ?>%;">
                <div class="color <?php echo $shade; ?>" style="background-color: #<?php echo $hex; ?>" data-color-hex="<?php echo $hex; ?>" data-color-rgb="<?php echo $rgb; ?>" data-color-hsl="<?php echo $hsl; ?>">
                  <input type="text" class="color-code" size="6" value="<?php echo $hex; ?>" readonly>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </article>
      <?php endforeach; endif; ?>
    </main>

    <?php wp_footer(); ?>
  </body>
</html>