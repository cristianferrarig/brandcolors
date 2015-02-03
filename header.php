<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo( 'name', 'display' ); ?> &rsaquo; <?php bloginfo( 'description', 'display' ); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php get_template_part( 'modules/header' ); ?>

    <section class="main">