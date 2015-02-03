<header id="site-header" class="site-header">
  <a href="<?php echo home_url( '/' ); ?>" class="logo">
    <?php locate_template( 'assets/img/logo.svg', 'true' ); ?>
  </a>

  <h2 class="description"><?php bloginfo( 'description', 'display' ); ?></h2>

  <input id="search" class="search" type="search" placeholder="Search brands &hellip;">

  <?php

  $btns = array(
    array(
      'label' => 'Tweet',
      'class' => 'twitter',
      'icon'  => 'twitter',
      'url'   => 'http://twitter.com/'
    ),
    array(
      'label' => 'Like',
      'class' => 'facebook',
      'icon'  => 'facebook-alt',
      'url'   => 'http://facebook.com/'
    ),
    array(
      'label' => 'Share',
      'class' => 'googleplus',
      'icon'  => 'googleplus-alt',
      'url'   => 'http://plus.google.com/'
    )
  );

  // Turn the buttons array into an object for cleaner templating
  $btns = json_decode( json_encode( $btns ), false );

  echo '<div class="share-btns">';

  foreach ( $btns as $btn ) {

    echo "<a href='$btn->url' class='share-btn $btn->class' target='_blank'><i class='genericon genericon-$btn->icon'></i><span class='label'>$btn->label</span></a>";

  }

  echo '</div>';

  ?>
</header>