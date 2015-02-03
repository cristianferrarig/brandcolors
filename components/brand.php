<?php

use Mexitek\PHPColors\Color;

$colors = bcs_get_colors();
$color_count = count( $colors );

?>

<article id="brand-<?php the_id(); ?>" class="brand cf" data-brand-id="<?php the_id(); ?>" data-brand-name="<?php the_title_attribute(); ?>">
  <header class="brand-header">
    <h1 class="brand-title"><?php the_title(); ?></h1>
    <span class="brand-check"></span>
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
      <div class="color" style="width: <?php echo 100 / $color_count; ?>%;">
        <div class="color-inner <?php echo $shade; ?>" style="background-color: #<?php echo $hex; ?>" data-color-hex="<?php echo $hex; ?>" data-color-rgb="<?php echo $rgb; ?>" data-color-hsl="<?php echo $hsl; ?>">
          <input type="text" class="color-code" size="6" value="<?php echo $hex; ?>" readonly>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</article>