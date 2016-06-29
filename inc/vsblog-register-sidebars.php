<?php


//4 widgets support
if ( ! function_exists( 'vsblog_widgets_init' ) ):
function vsblog_widgets_init(){
	
	/* register widgets / sidebar
	* @ https://codex.wordpress.org/Function_Reference/register_sidebar
	* Usages register_sidebar( $args );
	*/
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'vsblog' ),
		'id' => 'sidebar_main',
		'description' => __( 'Widgets for sidebar', 'vsblog' ),
		'before_widget' => '<div id="%1$s" class=" '. vsblog_dynamic_panel() . ' widget_sidebar_main clearfix %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Single Post above Title', 'vsblog' ),
		'id' => 'left_top',
		'description' => __( 'Widgets for Single Post above Title', 'vsblog' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
		
	register_sidebar( array(
		'name' => __( 'Single Post below Title', 'vsblog' ),
		'id' => 'left_top_below_title',
		'description' => __( 'Widgets for Single Post below Title', 'vsblog' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Single Post below Content', 'vsblog' ),
		'id' => 'left_bottom',
		'description' => __( 'Widgets for Single Post below Content', 'vsblog' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Top Header Centre', 'vsblog' ),
		'id' => 'sidebar_header',
		'description' => __( 'Widgets for top header centre', 'vsblog' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

}
endif;
add_action( 'widgets_init', 'vsblog_widgets_init' );
