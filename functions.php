<?php

// stop direct access
if ( !defined( 'ABSPATH' ) ) die( "No Direct access" );


/*
* Main function file of SEOPres theme
*/

	
/**
 * theme setup addition.
 */
require get_template_directory() . '/inc/vsblog-theme-setup.php';


/**
 * styles and scripts addition.
 */
require get_template_directory() . '/inc/vsblog-style-scripts.php';


/**
 * register sidebars addition.
 */
require get_template_directory() . '/inc/vsblog-register-sidebars.php';


/**
 * Customizer addition.
 */
require get_template_directory() . '/inc/vsblog-customizer.php';


/**
 * action and filter addition.
 */
require get_template_directory() . '/inc/vsblog-action-filters.php';

/**
 * individual functions addition.
 */
require get_template_directory() . '/inc/vsblog-individual-functions.php';

/**
 * navwalker.
 */
require get_template_directory() . '/inc/vsblog-navwalker.php';


