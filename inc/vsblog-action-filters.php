<?php

/* Display a notice that can be dismissed */

// display notice and link for dismiss, if not pressed dismiss
if ( ! function_exists( 'vsblog_admin_notice' ) ) :
function vsblog_admin_notice() {
	global $current_user ;
	$user_id = $current_user->ID;
	
	/* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'vsblog_ignore_notice') )
	{
        echo '<div class="updated"><p>';
		
        printf( __( 'Thank you for activating SEO Press theme. Let start form <a target="_blank" href="%2$s">Online Documentation</a> | <a href="%1$s">Hide This Notice</a>', 'vsblog' ), '?vsblog_notics_ignore=0', 'http://reesu.in/vsblog/category/documentation/' );
		
        echo "</p></div>";
	}
}
endif;
add_action( 'admin_notices', 'vsblog_admin_notice' );


// if link of ignore notice clicked, store user meta
if ( ! function_exists( 'vsblog_handle_notic' ) ) :
function vsblog_handle_notic()
{
	global $current_user;
	$user_id = $current_user->ID;
	if ( isset( $_GET['vsblog_notics_ignore']) && '0' == $_GET['vsblog_notics_ignore'] )
	{
		add_user_meta( $user_id, 'vsblog_ignore_notice', 'true', true );
	}
}
endif;
add_action( 'admin_init', 'vsblog_handle_notic' );

//delete vsblog_handle_notic user meta data on theme switch
if ( ! function_exists( 'vsblog_delete_user_meta_ignore_notice' ) ) :
function vsblog_delete_user_meta_ignore_notice()
{
	global $current_user;
	$user_id = $current_user->ID;
	if ( get_user_meta( $user_id, 'vsblog_ignore_notice' ) )
	{
		delete_user_meta( $user_id, 'vsblog_ignore_notice' );
	}
}
endif;
add_action('switch_theme', 'vsblog_delete_user_meta_ignore_notice');


/* Display a notice that can be dismissed END */

//custom excerpt length
if ( ! function_exists( 'vsblog_custom_excerpt_length' ) ):
function vsblog_custom_excerpt_length( $length )
{
	return absint( get_theme_mod( 'vsblog_excerpt_length', '40' ) );
}
endif;
add_filter( 'excerpt_length', 'vsblog_custom_excerpt_length', 999 );


//custom excerpt last ...... replace
if ( ! function_exists( 'vsblog_excerpt_more' ) ):
function vsblog_excerpt_more( $more )
{
	return '&#8230;';
}
endif;
add_filter( 'excerpt_more', 'vsblog_excerpt_more' );


//add filter to next link
if ( ! function_exists( 'vsblog_next_post_attr' ) ):
function vsblog_next_post_attr()
{
    return 'rel="prev"';
}
endif;
add_filter( 'next_posts_link_attributes', 'vsblog_next_post_attr' );


//add filter to prev link
if ( ! function_exists( 'vsblog_prev_post_attr' ) ):
function vsblog_prev_post_attr()
{
    return 'rel="next"';
}
endif;
add_filter( 'previous_posts_link_attributes', 'vsblog_prev_post_attr' );

//add class="table table-bordered" to default calendar
if ( ! function_exists( 'vsblog_calendar_modify' ) ):
function vsblog_calendar_modify( $html )
{
	return str_replace( 'id="wp-calendar"', 'id="wp-calendar" class="table table-bordered"', $html );
}
endif;
add_filter( 'get_calendar', 'vsblog_calendar_modify' );



if ( ! function_exists( 'vsblog_comment_form_fields' ) ) :
function vsblog_comment_form_fields( $fields )
{
	$commenter = wp_get_current_commenter();
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
        
	$fields   =  array(

		'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'vsblog' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your name', 'vsblog' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'vsblog' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your email', 'vsblog' ) . '" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'vsblog' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your website', 'vsblog' ) . '" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'   
		
        );
return $fields;
}
endif;
add_filter( 'comment_form_default_fields', 'vsblog_comment_form_fields' );


if ( ! function_exists( 'vsblog_comment_form' ) ) :
function vsblog_comment_form( $args )
{
	$args['comment_field'] = '<div class="form-group comment-form-comment">
	<label for="comment">' . _x( 'Comment', 'noun' , 'vsblog' ) . '<span class="required"> *</span></label> 
	<textarea class="form-control" placeholder="' . __( 'Your comment', 'vsblog' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
	</div>';
	$args['class_submit'] = 'btn btn-'.get_theme_mod( 'vsblog_panel_color_setting', 'primary' ); // since WP 4.1
return $args;
}
endif;
add_filter( 'comment_form_defaults', 'vsblog_comment_form' );
	

/*
* Add SEO Press Options menu
* @ add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
*/
if ( ! function_exists ( 'vsblog_theme_options' ) ) :
function vsblog_theme_options()
{
	add_theme_page( __( 'VSblog Options', 'vsblog') , __( 'VSblog Options', 'vsblog') , 'edit_theme_options', 'customize.php?autofocus[panel]=vsblog_options_panel', '' );
}
endif;
add_action( 'admin_menu', 'vsblog_theme_options' );

