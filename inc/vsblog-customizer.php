<?php
// @ Panel > section > setting & control


//Manage WordPress Customizer
if ( ! function_exists( 'vsblog_theme_customizer' ) ):
function vsblog_theme_customizer( $wp_customize ) {
	
//load font name from google-fonts.json file in $vsblog_fontsarr array
include_once( get_template_directory() . "/json/google-fonts.php" );
$vsblog_json = json_decode($vsblog_fonts, true);

$vsblog_fontsarr = array(
				'0' => __( 'Disable', 'vsblog' )
				);

for ( $i=0; $i < count( $vsblog_json['items'] ); $i++ )
{
	$familyname = $vsblog_json['items'][$i]["family"];
	
	$vsblog_fontsarr[$familyname] = $familyname;
}

				
//Start vsblog_options_panel
	/*
	* @ https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
	* @ https://developer.wordpress.org/themes/advanced-topics/customizer-api/#panels
	*/
	$wp_customize->add_panel( 'vsblog_options_panel', array(
	'title'          => __( 'VSblog Options', 'vsblog' ),
    'description'    => __( 'VSblog Theme Options', 'vsblog' ),
    'priority'       => 30, // display this panel after title_tagline section
	) );
//End vsblog_options_panel


// Start menu style
	//we will use this section for all menu settings and control
	$wp_customize->add_section( 'vsblog_color_section' , array(
    'title'			=> __( 'Manage Colors', 'vsblog' ),
    'panel' => 'vsblog_options_panel',
	) );

	
	//Start Menu background color
	$wp_customize->add_setting( 'vsblog_menubg_setting', array(
        'default'        => '#337ab7',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_menubg_setting', array(
				'label'    => __( 'Menu Background Color', 'vsblog' ),
				'description' => __( 'Set menu background color.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End Menu background color
	
	//Start Menu hover active background color
	$wp_customize->add_setting( 'vsblog_menu_hover_active_bg_setting', array(
        'default'        => '#e7e7e7',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_menu_hover_active_bg_setting', array(
				'label'    => __( 'Menu Active Hover Background Color', 'vsblog' ),
				'description' => __( 'Set active, mouse over menu item background color.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End Menu hover active background color
	
	//Start Menu item text color
	$wp_customize->add_setting( 'vsblog_menu_text_color_setting', array(
        'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_menu_text_color_setting', array(
				'label'    => __( 'Menu Item Text Color', 'vsblog' ),
				'description' => __( 'Set color to menu items.', 'vsblog' ),
				'section'  => 'vsblog_color_section', 
				)
		) );
	//End Menu item text color
	
	
	//Start Menu item hover active text color
	$wp_customize->add_setting( 'vsblog_menu_hover_active_text_color_setting', array(
        'default'        => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_menu_hover_active_text_color_setting', array(
				'label'    => __( 'Menu Active, Hover Text Color', 'vsblog' ),
				'description' => __( 'Set active, mouse over menu text color.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End Menu item hover active text color

	//Start front entry content background colors
	$wp_customize->add_setting( 'vsblog_front_entry_content_background_color_setting', array(
        'default'        => '#03354e',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_front_entry_content_background_color_setting', array(
				'label'    => __( 'Front Entry Content Background Color', 'vsblog' ),
				'description' => __( 'Front left content background color. It can override by WordPress Visual editor.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End front entry content bacgkground colors

	//Start front entry content colors
	$wp_customize->add_setting( 'vsblog_front_entry_content_color_setting', array(
        'default'        => '#fdfffa',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_front_entry_content_color_setting', array(
				'label'    => __( 'Front Entry Content Color', 'vsblog' ),
				'description' => __( 'Front left content color. It can override by WordPress Visual editor.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End front entry content paragraph colors

	//Start entry content background colors
	$wp_customize->add_setting( 'vsblog_entry_content_background_color_setting', array(
        'default'        => '#03354e',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_entry_content_background_color_setting', array(
				'label'    => __( 'Entry Content Background Color', 'vsblog' ),
				'description' => __( 'Left content background color. It can override by WordPress Visual editor.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End entry content bacgkground colors

	//Start entry content headline colors
	$wp_customize->add_setting( 'vsblog_entry_content_headline_color_setting', array(
        'default'        => '#fdfffa',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_entry_content_headline_color_setting', array(
				'label'    => __( 'Entry Content Headline Color', 'vsblog' ),
				'description' => __( 'Left content headline(h1-h6) color. It can override by WordPress Visual editor.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End entry content headline colors
	
	//Start entry content paragraph colors
	$wp_customize->add_setting( 'vsblog_entry_content_paragraph_color_setting', array(
        'default'        => '#fdfffa',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_entry_content_paragraph_color_setting', array(
				'label'    => __( 'Entry Content Paragraph Color', 'vsblog' ),
				'description' => __( 'Left content paragraph(p) color. It can override by WordPress Visual editor.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End entry content paragraph colors
	
	
	//Start default link colors
	$wp_customize->add_setting( 'vsblog_links_color_setting', array(
        'default'        => '#337ab7',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_links_color_setting', array(
				'label'    => __( 'Default Links Color', 'vsblog' ),
				'description' => __( 'Set entire page links color (Except Top Main Menu).', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End default link colors
	
	
	//Start footer bg n border
	$wp_customize->add_setting( 'vsblog_footer_bg', array(
        'default'        => '#ebebeb',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_footer_bg', array(
				'label'    => __( 'Footer Background Color', 'vsblog' ),
				'description' => __( 'Background color of footer.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	
	$wp_customize->add_setting( 'vsblog_footer_top_order', array(
        'default'        => '#337ab7',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vsblog_footer_top_order', array(
				'label'    => __( 'Footer Top Border Color', 'vsblog' ),
				'description' => __( 'Top border color of footer.', 'vsblog' ),
				'section'  => 'vsblog_color_section',
				)
		) );
	//End footer bg n border
	
	
	
	//Start panel colors
	$wp_customize->add_setting( 'vsblog_panel_color_setting', array(
        'default'        => 'primary',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	

	$wp_customize->add_control( 'vsblog_panel_color_setting', array(
			'label'    => __( 'Content Panel Color Scheme', 'vsblog' ),
			'description' => __( 'Choose color scheme for content panels. <br /> (NOTE: Sidebar color may not reflect in customizer, so save and reload customizer).', 'vsblog' ),
			'section'  => 'vsblog_color_section',
			'type'     => 'select',
			'choices' => array(
					'default'  => __( 'Default', 'vsblog' ),
					'primary'  => __( 'Primary', 'vsblog' ),
					'success'  => __( 'Success', 'vsblog' ),
					'info'  => __( 'Info', 'vsblog' ),
					'warning'  => __( 'Warning', 'vsblog' ),
					'danger'  => __( 'Danger', 'vsblog' ),
					)
			)
	);
	//End panel link colors
	
	
	

// End menu style	

// Start font size
	$wp_customize->add_section( 'vsblog_font_size_section' , array(
    'title'       => __( 'Manage Font Size', 'vsblog' ),
	'panel' => 'vsblog_options_panel',
	) );
	
	
	$wp_customize->add_setting( 'vsblog_menu_font_size_setting', array(
        'default'        => '19',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_menu_font_size_setting', array(
				'label'    => __( 'Menu Font Size', 'vsblog' ),
				'description' => __( 'Font size of menu text like:19 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_breadcrumb_font_size_setting', array(
        'default'        => '12',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_breadcrumb_font_size_setting', array(
				'label'    => __( 'Breadcrumb Font Size', 'vsblog' ),
				'description' => __( 'Font size of breadcrumb text like:12 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h1_size_setting', array(
        'default'        => '22',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h1_size_setting', array(
				'label'    => __( 'Headline H1 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline one H1 like:22 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h2_size_setting', array(
        'default'        => '21',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h2_size_setting', array(
				'label'    => __( 'Headline H2 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline two H2 like:21 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h3_size_setting', array(
        'default'        => '20',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h3_size_setting', array(
				'label'    => __( 'Headline H3 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline three H3 like:20 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h4_size_setting', array(
        'default'        => '18',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h4_size_setting', array(
				'label'    => __( 'Headline H4 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline four H4 like:18 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h5_size_setting', array(
        'default'        => '16',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h5_size_setting', array(
				'label'    => __( 'Headline H5 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline five H5 like:16 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_h6_size_setting', array(
        'default'        => '14',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_h6_size_setting', array(
				'label'    => __( 'Headline H6 Font Size', 'vsblog' ),
				'description' => __( 'Font size of headline six H6 like:14 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_paragraph_size_setting', array(
        'default'        => '16',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_paragraph_size_setting', array(
				'label'    => __( 'Paragraph Font Size', 'vsblog' ),
				'description' => __( 'Font size of paragraph p like:16 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_list_item_size_setting', array(
        'default'        => '15',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_list_item_size_setting', array(
				'label'    => __( 'Sidebar List Items Font Size', 'vsblog' ),
				'description' => __( 'Font size of sidebar list items ol, ul like:15 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_left_list_item_size_setting', array(
        'default'        => '16',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_list_item_size_setting', array(
				'label'    => __( 'Left Content List Items Font Size', 'vsblog' ),
				'description' => __( 'Font size of left content list items ol, ul like:16 (without px).', 'vsblog' ),
				'section'  => 'vsblog_font_size_section',
				'type'     => 'number',
				)
	);


// End font size


//Start Manage Fonts
	$wp_customize->add_section( 'vsblog_fonts_section' , array(
    'title'       => __( 'Manage Fonts', 'vsblog' ),
	'panel' => 'vsblog_options_panel',
	) );
	
	$wp_customize->add_setting( 'vsblog_body_fonts_setting', array(
        'default'        => '0',
		'sanitize_callback' => 'wp_kses',
    ) );
			
	$wp_customize->add_control( 'vsblog_body_fonts_setting', array(
			'label'    => __( 'Page Body Font', 'vsblog' ),
			'description' => __( 'Disable or set a font to body.', 'vsblog' ),
			'section'  => 'vsblog_fonts_section',
			'type'     => 'select',
			'choices'  => $vsblog_fontsarr,
			)
	);
	
	
	$wp_customize->add_setting( 'vsblog_menu_fonts_setting', array(
        'default'        => '0',
		'sanitize_callback' => 'wp_kses',
    ) );
			
	$wp_customize->add_control( 'vsblog_menu_fonts_setting', array(
			'label'    => __( 'Menu Font', 'vsblog' ),
			'description' => __( 'Disable or set a font to top main menu.', 'vsblog' ),
			'section'  => 'vsblog_fonts_section',
			'type'     => 'select',
			'choices'  => $vsblog_fontsarr,
			)
	);
	
	
	$wp_customize->add_setting( 'vsblog_headline_fonts_setting', array(
        'default'        => '0',
		'sanitize_callback' => 'wp_kses',
    ) );
			
	$wp_customize->add_control( 'vsblog_headline_fonts_setting', array(
			'label'    => __( 'Headline Font', 'vsblog' ),
			'description' => __( 'Disable or set a font to all headline.', 'vsblog' ),
			'section'  => 'vsblog_fonts_section',
			'type'     => 'select',
			'choices'  => $vsblog_fontsarr,
			)
	);
	
	
	$wp_customize->add_setting( 'vsblog_paragraph_fonts_setting', array(
        'default'        => '0',
		'sanitize_callback' => 'wp_kses',
    ) );
			
	$wp_customize->add_control( 'vsblog_paragraph_fonts_setting', array(
			'label'    => __( 'Paragraph Font', 'vsblog' ),
			'description' => __( 'Disable or set a font to paragraph.', 'vsblog' ),
			'section'  => 'vsblog_fonts_section',
			'type'     => 'select',
			'choices'  => $vsblog_fontsarr,
			)
	);
	
	
// End Manage Fonts


// Start spacing
	$wp_customize->add_section( 'vsblog_spacing_section' , array(
    'title'       => __( 'Manage Spacing', 'vsblog' ),
	'panel' => 'vsblog_options_panel',
	) );
	
	// breadcrumb spacing
	$wp_customize->add_setting( 'vsblog_breadcrumb_letter_spacing', array(
        'default'        => '0.5',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_breadcrumb_letter_spacing', array(
				'label'    => __( 'Breadcrumb Letter Spacing', 'vsblog' ),
				'description' => __( 'Letter spacing for breadcrumb like:0.5 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_breadcrumb_word_spacing', array(
        'default'        => '0.3',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_breadcrumb_word_spacing', array(
				'label'    => __( 'Breadcrumb Word Spacing', 'vsblog' ),
				'description' => __( 'Word spacing for breadcrumb like:0.3 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_breadcrumb_line_height', array(
        'default'        => '17',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_breadcrumb_line_height', array(
				'label'    => __( 'Breadcrumb Line Height', 'vsblog' ),
				'description' => __( 'Line height for breadcrumb like:17 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	// headline spacing
	$wp_customize->add_setting( 'vsblog_left_h_letter_spacing', array(
        'default'        => '1',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_h_letter_spacing', array(
				'label'    => __( 'Headline Letter Spacing', 'vsblog' ),
				'description' => __( 'Letter spacing of headline h1-h6 like:1 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_h_word_spacing', array(
        'default'        => '0.5',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_h_word_spacing', array(
				'label'    => __( 'Headline Word Spacing', 'vsblog' ),
				'description' => __( 'Word spacing of headline h1-h6 like:0.5 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_h_line_height', array(
        'default'        => '25',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_h_line_height', array(
				'label'    => __( 'Headline Line Height', 'vsblog' ),
				'description' => __( 'Line height of headline h1-h6 like:25 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	// paragraph spacing
	$wp_customize->add_setting( 'vsblog_left_p_letter_spacing', array(
        'default'        => '0.5',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_p_letter_spacing', array(
				'label'    => __( 'Paragraph Letter Spacing', 'vsblog' ),
				'description' => __( 'Letter spacing of paragraph p like:0.5 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_p_word_spacing', array(
        'default'        => '0.5',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_p_word_spacing', array(
				'label'    => __( 'Paragraph Word Spacing', 'vsblog' ),
				'description' => __( 'Word spacing of paragraph p like:0.5 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_p_line_height', array(
        'default'        => '25',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_p_line_height', array(
				'label'    => __( 'Paragraph Line Height', 'vsblog' ),
				'description' => __( 'Line height of paragraph p like:25 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	// left ol ul spacing
	$wp_customize->add_setting( 'vsblog_left_ol_li_letter_spacing', array(
        'default'        => '0.3',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_ol_li_letter_spacing', array(
				'label'    => __( 'Main Content List Letter Spacing', 'vsblog' ),
				'description' => __( 'Letter spacing of ordered, unordered list in left content like:0.3 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_ol_li_word_spacing', array(
        'default'        => '0.3',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_ol_li_word_spacing', array(
				'label'    => __( 'Main Content List Word Spacing', 'vsblog' ),
				'description' => __( 'Word spacing of ordered, unordered list in left content like:0.3 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_left_ol_li_line_height', array(
        'default'        => '23',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_left_ol_li_line_height', array(
				'label'    => __( 'Main Content List Line Height', 'vsblog' ),
				'description' => __( 'Line Height of ordered, unordered list in left content like:23 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	//right or widget side ol ul spacing
	$wp_customize->add_setting( 'vsblog_right_ol_li_letter_spacing', array(
        'default'        => '0.1',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_right_ol_li_letter_spacing', array(
				'label'    => __( 'Right Content List Letter Spacing', 'vsblog' ),
				'description' => __( 'Letter spacing of ordered, unordered list in sidebar like:0.1 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_right_ol_li_word_spacing', array(
        'default'        => '0.3',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_right_ol_li_word_spacing', array(
				'label'    => __( 'Right Content List Word Spacing', 'vsblog' ),
				'description' => __( 'Word spacing of ordered, unordered list in sidebar like:0.3 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_right_ol_li_line_height', array(
        'default'        => '20',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_right_ol_li_line_height', array(
				'label'    => __( 'Right Content List Line Height', 'vsblog' ),
				'description' => __( 'Line Height of ordered, unordered list in sidebar like:20 (without px).', 'vsblog' ),
				'section'  => 'vsblog_spacing_section',
				'type'     => 'number',
				)
	);
	
	
	
	
// Start spacing end



// Start footer option
	$wp_customize->add_section( 'vsblog_footer_section' , array(
    'title'       => __( 'Footer Options', 'vsblog' ),
	'panel' => 'vsblog_options_panel',
	) );
	
	$wp_customize->add_setting( 'vsblog_left_footer_setting', array(
        'default'        => __( 'Some right reserved.', 'vsblog' ),
		'sanitize_callback' => 'wp_filter_post_kses',
    ) );
	
	$wp_customize->add_control( 'vsblog_left_footer_setting', array(
				'label'    => __( 'Footer Left Text', 'vsblog' ),
				'description' => __( 'Enter footer left text (HTML allow).', 'vsblog' ),
				'section'  => 'vsblog_footer_section',
				'type'     => 'textarea',
				)
	);
	
	$wp_customize->add_setting( 'vsblog_center_footer_setting', array(
        'default'        => __( 'Terms of Use - Privacy Policy', 'vsblog' ),
		'sanitize_callback' => 'wp_filter_post_kses',
    ) );
	
	$wp_customize->add_control( 'vsblog_center_footer_setting', array(
				'label'    => __( 'Footer Centre Text', 'vsblog' ),
				'description' => __( 'Enter footer centre text (HTML allow).', 'vsblog' ),
				'section'  => 'vsblog_footer_section',
				'type'     => 'textarea',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_right_footer_setting', array(
        'default'        => __( 'vsblog WordPress Theme', 'vsblog' ),
		'sanitize_callback' => 'wp_filter_post_kses',
    ) );
	
	$wp_customize->add_control( 'vsblog_right_footer_setting', array(
				'label'    => __( 'Footer Right Text', 'vsblog' ),
				'description' => __( 'Enter footer right text (HTML allow).', 'vsblog' ),
				'section'  => 'vsblog_footer_section',
				'type'     => 'textarea',
				)
	);


// End footer option

// Start Misc options
	$wp_customize->add_section( 'vsblog_misc_options_section' , array(
    'title'       => __( 'Misc Options', 'vsblog' ),
	'panel' => 'vsblog_options_panel',
	) );
	
	// Start Sticky menu
	$wp_customize->add_setting( 'vsblog_stickymenu_setting', array(
        'default'        => '1',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	
	$wp_customize->add_control( 'vsblog_stickymenu_setting', array(
				'label'    => __( 'Sticky Menu', 'vsblog' ),
				'description' => __( 'Enable or Disable sticky effect of main menu.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'select',
				'choices'  => array(
					'1'  => __( 'Enable', 'vsblog' ),
					'0' => __( 'Disable', 'vsblog' ),
					),
				)
		);
	// End Sticky menu
	
	// Start breadcrumb option
	$wp_customize->add_setting( 'vsblog_breadcrumbx_setting', array(
        'default'        => '1',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	
	$wp_customize->add_control( 'vsblog_breadcrumbx_setting', array(
				'label'    => __( 'Breadcrumb option', 'vsblog' ),
				'description' => __( 'Enable or Disable breadcrumb.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'select',
				'choices'  => array(
					'1'  => __( 'Enable', 'vsblog' ),
					'0' => __( 'Disable', 'vsblog' ),
					),
				)
		);
	// End breadcrumb option

	
	$wp_customize->add_setting( 'vsblog_meta_page_setting', array(
        'default'        => '0',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	
	$wp_customize->add_control( 'vsblog_meta_page_setting', array(
				'label'    => __( 'Meta Data in Page', 'vsblog' ),
				'description' => __( 'Enable or disable meta data in page.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'select',
				'choices'  => array(
					'1'  => __( 'Enable', 'vsblog' ),
					'0' => __( 'Disable', 'vsblog' ),
					),
				)
		);
		
		
	$wp_customize->add_setting( 'vsblog_archive_post_thumbnail', array(
        'default'        => '0',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	
	$wp_customize->add_control( 'vsblog_archive_post_thumbnail', array(
				'label'    => __( 'Post Thumbnail in Archive', 'vsblog' ),
				'description' => __( 'Enable or Disable post thumbnail (featured image) in archive pages.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'select',
				'choices'  => array(
					'1'  => __( 'Enable', 'vsblog' ),
					'0' => __( 'Disable', 'vsblog' ),
					),
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_single_post_thumbnail', array(
        'default'        => '0',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	
	$wp_customize->add_control( 'vsblog_single_post_thumbnail', array(
				'label'    => __( 'Post Thumbnail in Single Post', 'vsblog' ),
				'description' => __( 'Enable or Disable post thumbnail (featured image) from single post.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'select',
				'choices'  => array(
					'1'  => __( 'Enable', 'vsblog' ),
					'0' => __( 'Disable', 'vsblog' ),
					),
				)
	);
	
	
	
	$wp_customize->add_setting( 'vsblog_comment_panel_title', array(
        'default'        => __( 'Have any Question or Comment?', 'vsblog' ),
		'sanitize_callback' => 'wp_filter_post_kses',
    ) );
	
	$wp_customize->add_control( 'vsblog_comment_panel_title', array(
				'label'    => __( 'Single Post Comment Panel Headline', 'vsblog' ),
				'description' => __( 'Headline of single post comment section.', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'textarea',
				)
	);
	
	
	$wp_customize->add_setting( 'vsblog_excerpt_length', array(
        'default'        => '40',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

	$wp_customize->add_control( 'vsblog_excerpt_length', array(
				'label'    => __( 'Excerpt Length on Archive', 'vsblog' ),
				'description' => __( 'How much words you want to display on Archive page? like:40 (Default 40 Words).', 'vsblog' ),
				'section'  => 'vsblog_misc_options_section',
				'type'     => 'number',
				)
	);
		
		

// End Misc options
}
endif;
add_action( 'customize_register', 'vsblog_theme_customizer' );
