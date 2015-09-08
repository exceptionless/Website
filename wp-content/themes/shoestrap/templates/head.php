<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo( 'name' ); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,300,400,600" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/wp-content/themes/shoestrap/favicon.ico" />
</head>