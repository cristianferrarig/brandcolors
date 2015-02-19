<header id="site-header" class="site-header">
  <h1 class="logo">Brand<strong>Colors</strong></h1>
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
      'icon'  => 'google-plus',
      'url'   => 'http://plus.google.com/'
    )
  );

  // Turn the buttons array into an object for cleaner templating
  $btns = json_decode( json_encode( $btns ), false );

  echo '<div class="share-btns">';

  foreach ( $btns as $btn ) {
    echo "<a href='$btn->url' class='share-btn $btn->class btn' target='_blank'><i class='fa fa-$btn->icon'></i></a>";
  }

  echo '</div>';

  ?>
</header>