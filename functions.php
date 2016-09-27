<?php

remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head','jetpack_og_tags');
if ( ! isset( $content_width ) ) $content_width = 600;


add_theme_support('automatic-feed-links');
add_filter('show_admin_bar', '__return_false');




function theme_styles() {
  wp_register_style( 'normalize-style', get_template_directory_uri() . '/normalize.css', array(), '20130425', 'all' );
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', array(), '20130425', 'all' );

  wp_enqueue_style( 'normalize-style' );
  wp_enqueue_style( 'main-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

// MENU OPTIONS

function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'Header Menu' ),
'footer-menu' => __( 'Footer Menu' ))
);
}

add_action( 'init', 'register_my_menus' );


// FEATURE IMAGE SUPPORT

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) ); //


// THEME OPTIONS

add_action('after_setup_theme','ttext_setup');
function ttext_setup() {
}

add_action ('admin_menu', 'ttext_admin');

function ttext_admin() {
	add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}


add_action('customize_register', 'ttext_customize');
function ttext_customize ($wp_customize) {

	$wp_customize->add_section( 'ttext_settings', array(
		'title'          => 'Justin Blog Theme Customizations',
		'priority'       => 5,
	) );

	$wp_customize->add_setting( 'back_setting', array( 'default' => 'Return to List' ) );
	$wp_customize->add_control( 'back_setting', array(
		'label'   => 'Back Text',
		'section' => 'ttext_settings',
		'type'    => 'text'
	) );

	$wp_customize->add_setting( 'ga_setting', array( 'default' => 'UA-36474980-1' ) );
	$wp_customize->add_control( 'ga_setting', array(
		'label'   => 'Google Analytics ID',
		'section' => 'ttext_settings',
		'type'    => 'text'
	) );

return $wp_customize;

}




function colorize_save_post() {
	global $colourvar;
	$colourvar++;
}
add_action( 'save_post', 'colorize_save_post' );




function filter_handler( $data , $postarr ) {
	$colorCode = get_post_meta($postarr['ID'],'colorCode');
	if($colorCode || $data['post_status'] == 'draft') {
		return $data;
	}

	$myposts = get_posts('numberposts=1&orderby=date&order=DESC');

	foreach($myposts as $post) {
		if ($post->ID == $postarr['ID']) {
		} else {
			$colorCode = get_post_meta($post->ID, 'colorCode');
			if (!$colorCode) {
				$colorCode = 0;
			} else {
				$colorCode = $colorCode[0];
			}
		}
	}

	$colorCodeNums = array(3, 5, 7, 11, 13);
	$nextColorCode = 3;
	$iterator = 0;

	foreach($colorCodeNums as $colorCodeNum) {
		$iterator++;
		if ($colorCodeNum == $colorCode) {

			if ($iterator == count($colorCodeNums)) {
				$iterator = 0;
			}
			$nextColorCode = $colorCodeNums[$iterator];
			break;
		}
	}

	$colorCode = get_post_meta($postarr['ID'],'colorCode');
	if(!$colorCode) {
		add_post_meta($postarr['ID'], 'colorCode', $nextColorCode);
	}

	return $data;
}
add_filter( 'wp_insert_post_data', 'filter_handler', '99', 2 );


?>
