<?php

if ( ! function_exists( 'vsblog_setup' ) ) :
function vsblog_setup() {

	global $content_width;
	if ( ! isset( $content_width ) )
	{
		$content_width = 900;
	}
	
	load_theme_textdomain( 'vsblog', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 500, 300, true );
	
	register_nav_menus( array(
		'primary' => __( 'Top Main Menu', 'vsblog' ),
	) );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	add_theme_support( 'custom-background', array(
		'default-color'      => '#ffffff',
		'default-attachment' => 'fixed',
	) );


	add_theme_support( 'custom-header', array(
	'width'         => 1140,
	'height'        => 260,
	'flex-width'    => true,
	'flex-height'   => true,
	'uploads'       => true,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	) );

	
	add_theme_support( 'custom-logo', array(
		'height'		=> 100,
		'width'			=> 400,
		'flex-height'	=> true,
	) );
	
	
	add_editor_style( 'css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'vsblog_setup' );

