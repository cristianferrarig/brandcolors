<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name', 'display' ); ?> &rsaquo; <?php bloginfo( 'description', 'display' ); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php get_template_part( 'modules/header' ); ?>

    <section class="main">