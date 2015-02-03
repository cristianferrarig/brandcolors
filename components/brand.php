<?php

$colors = bcs_get_colors();
$color_count = count( $colors );

?>

<article id="brand-<?php the_id(); ?>" class="brand cf" data-brand-id="<?php the_id(); ?>" data-brand-name="<?php the_title_attribute(); ?>">
  <header class="brand-header">
    <h1 class="brand-title"><?php the_title(); ?></h1>
    <span class="brand-check"></span>
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