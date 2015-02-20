<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <?php wp_head(); ?>
</head>

<body>
  <header class="site-header">
    <h1 class="logo"><a href="<?php echo home_url( '/' ); ?>">Brand<strong>Colors</strong></a></h1>
    <h2 class="description"><?php bloginfo( 'description', 'display' ); ?></h2>

    <p class="contribute"><a href="http://github.com/brandcolors/feedback" target="_blank"><i class="fa fa-plus"></i> Contribute</a></p>

    <div class="share-btns">
      <a href="#" class="share-btn twitter btn" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="#" class="share-btn facebook btn" target="_blank"><i class="fa fa-facebook"></i></a>
      <a href="#" class="share-btn google-plus btn" target="_blank"><i class="fa fa-google-plus"></i></a>
    </div>
  </header>

  <div class="access">
    <div class="collection-tools">
      <div class="download">
        <div class="download-label"><i class="fa fa-download"></i> Collection</div>

        <select id="download-collection" class="download-select">
          <option value="none">Select a format &hellip;</option>
          <option value="ase">ASE (Adobe)</option>
          <option value="css">CSS</option>
          <option value="scss">Sass</option>
          <option value="less">LESS</option>
          <option value="styl">Stylus</option>
        </select>
      </div>

      <a href="#" id="share-collection" class="collection-icon"><i class="fa fa-link"></i></a>
      <a href="#" id="clear-collection" class="collection-icon"><i class="fa fa-times"></i></a>

      <div class="collection-label"></div>
    </div>

    <div class="other-tools">
      <div class="search">
        <i class="search-icon fa fa-search"></i>
        <input id="search" class="search-input" type="search" placeholder="Search brands &hellip;" autofocus>
      </div>

      <div class="download">
        <div class="download-label"><i class="fa fa-download"></i> All</div>

        <select id="download-all" class="download-select">
          <option value="none">Select a format &hellip;</option>
          <option value="ase">ASE (Adobe)</option>
          <option value="css">CSS</option>
          <option value="scss">Sass</option>
          <option value="less">LESS</option>
          <option value="styl">Stylus</option>
        </select>
      </div>
    </div>
  </div>

  <div class="brands">
    <?php

    $brands = bcs_get_brands( ( isset( $_GET['brands'] ) ? explode( ',', $_GET['brands'] ) : null ) );

    if ( $brands->have_posts() ) {
      while ( $brands->have_posts() ) {
        $brands->the_post();

        $colors = bcs_get_colors();
        $color_count = count( $colors );

        ?>
          <article id="brand-<?php the_id(); ?>" class="brand cf" data-brand-id="<?php the_id(); ?>" data-brand-name="<?php the_title_attribute(); ?>">
            <header class="brand-header">
              <h1 class="brand-title"><?php the_title(); ?></h1>
              <span class="brand-dot"></span>
            </header>

            <div class="brand-colors cf">
              <?php foreach ( $colors as $color ) : ?>
                <div class="color" style="width: <?php echo 100 / $color_count; ?>%;">
                  <div class="color-inner" style="background-color: #<?php echo $color; ?>" data-color-hex="<?php echo $color; ?>">
                    <input type="text" class="color-code" size="6" value="<?php echo $color; ?>" readonly>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </article>
        <?php

      }
    }

    ?>
  </div>

  <?php wp_footer(); ?>
</body>
</html>