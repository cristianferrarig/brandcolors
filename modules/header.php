<header id="site-header" class="site-header">
  <a href="<?php echo home_url( '/' ); ?>" class="logo">
    <?php locate_template( 'assets/img/logo.svg', 'true' ); ?>
  </a>

  <h2 class="description"><?php bloginfo( 'description', 'display' ); ?></h2>

  <input id="search" class="search" type="search" placeholder="Search brands &hellip;">

  <?php

  $btns = array(
    array(
      'class' => 'twitter',
      'icon'  => 'twitter',
      'url'   => 'http://twitter.com/'
    ),
    array(
      'class' => 'facebook',
      'icon'  => 'facebook',
      'url'   => 'http://facebook.com/'
    ),
    array(
      'class' => 'googleplus',
      'icon'  => 'googleplus',
      'url'   => 'http://plus.google.com/'
    )
  );

  // Turn the buttons array into an object for cleaner templating
  $btns = json_decode( json_encode( $btns ), false );

  echo '<div class="share-btns btn-group">';

  foreach ( $btns as $btn ) {
    echo "<a href='$btn->url' class='share-btn $btn->class btn' target='_blank'><i class='bci bci-$btn->icon'></i></a>";
  }

  echo '</div>';

  ?>
</header>