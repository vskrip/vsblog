<?php

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'vsblog_scripts' ) ) :
function vsblog_scripts() {
	
	// add google font css for body
	if ( get_theme_mod( 'vsblog_body_fonts_setting', '0' ) != '0' ) :
		$vsblog_font_name = esc_attr( get_theme_mod( 'vsblog_body_fonts_setting' ) );
		$vsblog_font_name_plus = trim( str_replace( ' ', '+', $vsblog_font_name ) );
		//add font file in head
		wp_enqueue_style( 'vsblog-fonts-body', '//fonts.googleapis.com/css?family=' . $vsblog_font_name_plus, '', null, 'all' );
	endif;
	
	// add google font css for menu
	if ( get_theme_mod( 'vsblog_menu_fonts_setting', '0' ) != '0' ) :
		$vsblog_font_name = esc_attr( get_theme_mod( 'vsblog_menu_fonts_setting' ) );
		$vsblog_font_name_plus = trim( str_replace( ' ', '+', $vsblog_font_name ) );
		//add font file in head
		wp_enqueue_style( 'vsblog-fonts-menu', '//fonts.googleapis.com/css?family=' . $vsblog_font_name_plus, '', null, 'all'  );
	endif;
	
	
	// add google font css for headline
	if ( get_theme_mod( 'vsblog_headline_fonts_setting', '0' ) != '0' ) :
		$vsblog_font_name = esc_attr( get_theme_mod( 'vsblog_headline_fonts_setting' ) );
		$vsblog_font_name_plus = trim( str_replace( ' ', '+', $vsblog_font_name ) );
		//add font file in head
		wp_enqueue_style( 'vsblog-fonts-headline', '//fonts.googleapis.com/css?family=' . $vsblog_font_name_plus, '', null, 'all'  );
	endif;
	
	
	// add google font css for paragraph
	if ( get_theme_mod( 'vsblog_paragraph_fonts_setting', '0' ) != '0' ) :
		$vsblog_font_name = esc_attr( get_theme_mod( 'vsblog_paragraph_fonts_setting' ) );
		$vsblog_font_name_plus = trim( str_replace( ' ', '+', $vsblog_font_name ) );
		//add font file in head
		wp_enqueue_style( 'vsblog-fonts-paragraph', '//fonts.googleapis.com/css?family=' . $vsblog_font_name_plus, 'all', null, ''  );
	endif;
	
	// Load main css
	wp_enqueue_style( 'vsblog-style', get_stylesheet_uri() );
	
	
	/* Load scripts
	* @ https://codex.wordpress.org/Function_Reference/wp_enqueue_script
	* Usages wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	*/
	
	// Load bootstrap js
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '', 'true' );
	
	wp_enqueue_script( 'responsive-img', get_template_directory_uri() . '/js/responsive-img.js', array( 'jquery' ), '', 'true' );

	wp_enqueue_script( 'vsblog-html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '', false );
	wp_script_add_data( 'vsblog-html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'vsblog-respond', get_template_directory_uri() . '/js/respond.js', array(), '', false );
	wp_script_add_data( 'vsblog-respond', 'conditional', 'lt IE 9' );
	
	//load comment-reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}
	
	
	// Load stickymenu js depends on jquery if enable by customizer
	if ( get_theme_mod( 'vsblog_stickymenu_setting', '0' ) == 1 )
	{
		wp_enqueue_script( 'vsblog-stickymenu', get_template_directory_uri() . '/js/stickymenu.js', array( 'jquery' ), '', 'true' );
	}
	
}
endif;
add_action( 'wp_enqueue_scripts', 'vsblog_scripts' );



/*
* add custom css set by customizer
* @ https://codex.wordpress.org/Function_Reference/get_theme_mod
* @ get_theme_mod( $name, $default );
* like: h1 { color:<?php echo get_theme_mod('menu-bg-color', '#000000'); ?>; }
*/
if ( ! function_exists( 'vsblog_customize_css' ) ) :
function vsblog_customize_css()
{
?>
	<style type="text/css">
	<?php if ( get_theme_mod( 'vsblog_body_fonts_setting', '0' ) != '0' ) :
	$vsblog_font_name = get_theme_mod( 'vsblog_body_fonts_setting' );
	?>
		body { font-family: '<?php echo $vsblog_font_name; ?>', sans-serif !important; }
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'vsblog_menu_fonts_setting', '0' ) != '0' ) :
	$vsblog_font_name = get_theme_mod( 'vsblog_menu_fonts_setting' );
	?>
		#navbar ul li a { font-family: '<?php echo $vsblog_font_name; ?>', sans-serif !important; }
	<?php endif; ?>
	
	
	<?php if ( get_theme_mod( 'vsblog_headline_fonts_setting', '0' ) != '0' ) :
	$vsblog_font_name = get_theme_mod( 'vsblog_headline_fonts_setting' );
	?>
		body h1, body h2, body h3, body h4, body h5, body h6 { font-family: '<?php echo $vsblog_font_name; ?>', sans-serif !important; }
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'vsblog_paragraph_fonts_setting', '0' ) != '0' ) :
	$vsblog_font_name = get_theme_mod( 'vsblog_paragraph_fonts_setting' );
	?>
		body p { font-family: '<?php echo $vsblog_font_name; ?>', sans-serif !important; }
	<?php endif; ?>
	
	#navbar
	{
		background-color: <?php echo get_theme_mod( 'vsblog_menubg_setting', '#337ab7' ); ?>;
		border: 1px solid  <?php echo get_theme_mod( 'vsblog_menubg_setting', '#337ab7' ); ?>;
	}
	
	#navbar ul.dropdown-menu {
		background-color: <?php echo get_theme_mod( 'vsblog_menubg_setting', '#337ab7' ); ?>;
	}
	
	
	.current-menu-item, .menu-item-type-custom:hover, .menu-item-type-post_type:hover, .menu-item-type-taxonomy:hover
	{
		background-color: <?php echo get_theme_mod( 'vsblog_menu_hover_active_bg_setting', '#e7e7e7' ); ?>
	}
	
		
	#navbar ul li a
	{
		color: <?php echo get_theme_mod( 'vsblog_menu_text_color_setting', '#ffffff' ); ?>
	}
	
	
	#navbar ul.dropdown-menu li a {
		color: <?php echo get_theme_mod( 'vsblog_menu_text_color_setting', '#ffffff' ); ?> !important;
	}

	#navbar ul.dropdown-menu li:hover a {
		color: <?php echo get_theme_mod( 'vsblog_menu_hover_active_text_color_setting', '#000000' ); ?> !important;
		background-color: <?php echo get_theme_mod( 'vsblog_menu_hover_active_bg_setting', '#e7e7e7' ); ?>
	}
	
	#navbar ul li:hover a
	{
		color: <?php echo get_theme_mod( 'vsblog_menu_hover_active_text_color_setting', '#000000' ); ?>;
	}
	
	.current-menu-item a, .current_page_item a
	{
		color: <?php echo get_theme_mod( 'vsblog_menu_hover_active_text_color_setting', '#000000' ); ?> !important;
	}

	.front-left-content .panel
	{
		background-color:<?php echo get_theme_mod( 'vsblog_front_entry_content_background_color_setting', '#03354e' ); ?>;
	}
	
	.front-left-content .panel {
		color:<?php echo get_theme_mod( 'vsblog_front_entry_content_color_setting', '#fdfffa' ); ?>;
	}
	
	.left-content
	{
		background-color:<?php echo get_theme_mod( 'vsblog_entry_content_background_color_setting', 'none' ); ?>;
	}
	
	.left-content .panel-body h1, .left-content .panel-body h2, .left-content .panel-body h3, .left-content .panel-body h4, .left-content .panel-body h5, .left-content .panel-body h6
	{
		color:<?php echo get_theme_mod( 'vsblog_entry_content_headline_color_setting', '#fff' ); ?>;
	}
	
	.left-content .panel-body p {
		color:<?php echo get_theme_mod( 'vsblog_entry_content_paragraph_color_setting', '#fff' ); ?>;
	}
	
	body {
		color:<?php echo get_theme_mod( 'vsblog_links_color_setting', '#b5b5b5' ); ?>;
	}
	
	body a {
		color:<?php echo get_theme_mod( 'vsblog_links_color_setting', '#2f688b' ); ?>;
	}
	
	.footer-bg
	{
		color:<?php echo get_theme_mod( 'vsblog_footer_bg', '#456f7f' ); ?>;
		background-color:<?php echo get_theme_mod( 'vsblog_footer_bg', '#0c2635' ); ?>;
	}
	.footer-bg
	{
		border-top:3px solid <?php echo get_theme_mod( 'vsblog_footer_top_order', '#337ab7' ); ?>;
	}
	
	#navbar ul li a
	{
		font-size: <?php echo get_theme_mod( 'vsblog_menu_font_size_setting', '19' ); ?>px;
	}
	
	.breadcrumb
	{
		font-size: <?php echo get_theme_mod( 'vsblog_breadcrumb_font_size_setting', '12' ); ?>px;
	}
	
	.panel
	{
		background-color:<?php echo get_theme_mod( 'vsblog_panel_bg', 'none' ); ?>;
	}

	body h1
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h1_size_setting', '22' ); ?>px !important;
	}
	
	body h2
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h2_size_setting', '21' ); ?>px !important;
	}
	
	body h3
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h3_size_setting', '20' ); ?>px !important;
	}
	
	body h4
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h4_size_setting', '18' ); ?>px !important;
	}
	
	body h5
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h5_size_setting', '16' ); ?>px !important;
	}
	
	body h6
	{
		font-size: <?php echo get_theme_mod( 'vsblog_h6_size_setting', '14' ); ?>px !important;
	}
	
	body p
	{
		font-size: <?php echo get_theme_mod( 'vsblog_paragraph_size_setting', '16' ); ?>px !important;
	}
	
	.widget_sidebar_main ul li, .widget_sidebar_main ol li
	{
		font-size: <?php echo get_theme_mod( 'vsblog_list_item_size_setting', '15' ); ?>px;
	}
	
	.left-content .panel-body ul li, .left-content .panel-body ol li
	{
		font-size: <?php echo get_theme_mod( 'vsblog_left_list_item_size_setting', '16' ); ?>px;
	}
	
	.breadcrumb
	{
		letter-spacing: <?php echo get_theme_mod( 'vsblog_breadcrumb_letter_spacing', '0.5' ); ?>px;
	}
	
	.breadcrumb
	{
		word-spacing: <?php echo get_theme_mod( 'vsblog_breadcrumb_word_spacing', '0.3' ); ?>px;
	}
	
	.breadcrumb
	{
		line-height: <?php echo get_theme_mod( 'vsblog_breadcrumb_line_height', '17' ); ?>px;
	}
	
	body h1, body h2, body h3, body h4, body h5, .body h6
	{
		letter-spacing: <?php echo get_theme_mod( 'vsblog_left_h_letter_spacing', '1' ); ?>px !important;
	}
	
	body h1, body h2, body h3, body h4, body h5, .body h6
	{
		word-spacing: <?php echo get_theme_mod( 'vsblog_left_h_word_spacing', '0.5' ); ?>px !important;
	}
	
	body h1, body h2, body h3, body h4, body h5, .body h6
	{
		line-height: <?php echo get_theme_mod( 'vsblog_left_h_line_height', '25' ); ?>px !important;
	}
	
	body p
	{
		letter-spacing: <?php echo get_theme_mod( 'vsblog_left_p_letter_spacing', '0.5' ); ?>px !important;
	}
	
	body p
	{
		word-spacing: <?php echo get_theme_mod( 'vsblog_left_p_word_spacing', '0.5' ); ?>px !important;
	}
	
	body p
	{
		line-height: <?php echo get_theme_mod( 'vsblog_left_p_line_height', '25' ); ?>px !important;
	}
	
	.left-content .panel-body ul li, .left-content .panel-body ol li
	{
	  letter-spacing: <?php echo get_theme_mod( 'vsblog_left_ol_li_letter_spacing', '0.3' ); ?>px;
	}

	.left-content .panel-body ul li, .left-content .panel-body ol li
	{
	  word-spacing: <?php echo get_theme_mod( 'vsblog_left_ol_li_word_spacing', '0.3' ); ?>px;
	}

	.left-content .panel-body ul li, .left-content .panel-body ol li
	{
	  line-height: <?php echo get_theme_mod( 'vsblog_left_ol_li_line_height', '23' ); ?>px;
	}
	
	
	.widget_sidebar_main ul li, .widget_sidebar_main ol li
	{
	  letter-spacing: <?php echo get_theme_mod( 'vsblog_right_ol_li_letter_spacing', '0.1' ); ?>px;
	}

	.widget_sidebar_main ul li, .widget_sidebar_main ol li
	{
	  word-spacing: <?php echo get_theme_mod( 'vsblog_right_ol_li_word_spacing', '0.3' ); ?>px;
	}

	.widget_sidebar_main ul li, .widget_sidebar_main ol li
	{
	  line-height: <?php echo get_theme_mod( 'vsblog_right_ol_li_line_height', '20' ); ?>px;
	}


	</style>
<?php
}
endif;
add_action( 'wp_head', 'vsblog_customize_css' );

