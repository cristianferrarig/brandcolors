<div class="brands">

<?php

$brand_ids = ( isset( $_GET['brands'] ) ? explode( ',', $_GET['brands'] ) : '' );

$brands = bcs_get_brands( $brand_ids );

if ( $brands->have_posts() ) {
  while ( $brands->have_posts() ) {
    $brands->the_post();
    get_template_part( 'components/brand' );
  }
}

?>

</div>