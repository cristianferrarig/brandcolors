<?php

get_header();

// Include color search box
locate_template( 'partials/color-search.php', true );

// Include collection toolbar
locate_template( 'partials/collection-toolbar.php', true );

// Load the phpColor library
locate_template( 'library/phpColors/src/Mexitek/PHPColors/Color.php', true );
use Mexitek\PHPColors\Color;



$args = array(
  'posts_per_page' => -1,
  'orderby'        => 'title',
  'order'          => 'ASC',
  'post_type'      => 'brand'
);

$posts = get_posts( $args );

if ( $posts ) : foreach ( $posts as $post ) : setup_postdata( $post );

  $colors      = get_post_meta( $post->ID, '_brand_colors', true );
  $colors      = explode( ',', $colors );

  $color_count = count( $colors );

  $brand_url   = get_post_meta( $post->ID, '_brand_url', true );

  $source_url  = get_post_meta( $post->ID, '_source_url', true );

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

<?php get_footer();