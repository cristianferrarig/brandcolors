<!DOCTYPE html>
<html>
  <head>
    <title>BrandColors</title>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="site-header">
      <h1 class="site-title">BrandColors</h1>
    </header>

    <main class="site-main">
      <div class="search">
        <input type="search" id="search-input" class="search-input" placeholder="Search&hellip;" autofocus>
      </div>

      <div class="collections">Collections</div>

      <?php

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
        <article class="brand cf" data-brand-name="<?php the_title_attribute(); ?>">
          <header class="brand-header">
            <h1 class="brand-title">
              <?php if ( ! empty( $brand_url ) ) echo "<a href='$brand_url' target='_blank'>"; ?>
                <?php the_title(); ?>
              <?php if ( ! empty( $brand_url ) ) echo '</a>'; ?>
            </h1>
          </header>

          <div class="brand-colors cf">
            <?php foreach ( $colors as $color ) : ?>
              <div class="color-container" style="width: <?php echo 100 / $color_count; ?>%;">
                <div class="color" style="background-color: #<?php echo $color; ?>">
                  <input type="text" class="color-code" size="6" value="<?php echo $color; ?>" readonly>
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