<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php get_template_part( 'modules/header' ); ?>

    <section class="main">