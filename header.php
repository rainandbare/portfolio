<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
	<meta property="og:url"           content="<?php echo home_url(); ?>" />
	<meta property="og:type"          content="portfolio" />
	<meta property="og:image"         content="<?php echo site_icon_url(); ?>" />
	<meta property="og:image:width"         content="270px" />
	<meta property="og:image:height"         content="270px" />

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div id="noScroll">



