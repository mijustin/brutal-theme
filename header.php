<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
	<?php if (is_home () ) { bloginfo('name'); echo ' | '; bloginfo('description'); } elseif ( is_category() ) { single_cat_title();  } elseif (is_single() ) { single_post_title(); } elseif (is_page() ) { single_post_title(); } else { wp_title('',true); } ?>
	</title>
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/style.css" rel="stylesheet">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo_rss('name'); ?>" href="<?php bloginfo_rss('atom_url') ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,700,700italic,100,100italic,300,300italic,500,400italic,500italic' rel='stylesheet' type='text/css'>
	<?php wp_head();?>

	<body <?php body_class(); ?>>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
	<header id="top" class="clearfix">
	<?php if ( !(is_single() || is_page()) ) { ?>
	  <h1>
	    <?php bloginfo('name'); ?>
	  </h1>
  <?php } ?>
	</header>
