<?php

//fix HTML validition without title for sidebar widget
if ( ! function_exists( 'vsblog_widget_title_filter' ) ):
function vsblog_widget_title_filter( $title ) {
    $title = $title ? '<div class="panel-heading"><h3 class="panel-title">' . $title . '</h3></div>' : '';
    $title .= '<div class="panel-body">';
    return $title;
}
endif;


if ( ! function_exists( 'vsblog_entry_meta' ) ):
function vsblog_entry_meta() {
?>
<span>
	<span class="glyphicon glyphicon-user"></span>
	<span class="vcard author">
    	<span class="fn">
    	<a class="url" rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
        </span>
    </span>
	&nbsp;&nbsp;
	<?php if( has_category() ) { ?>
	<span class="glyphicon glyphicon-th-large"></span>
	<span><?php the_category(', '); ?></span>
	&nbsp;&nbsp;
	<?php } ?>
	<span class="glyphicon glyphicon-time"></span>
	<span class="post-date updated"><?php the_modified_date(); ?></span>
	<?php edit_post_link( __( 'Edit', 'vsblog' ), '&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span> <span>', '</span>' ); ?>
</span>
<hr />
<?php
}
endif;


if ( ! function_exists( 'vsblog_entry_meta_page' ) ):
function vsblog_entry_meta_page() {
?>
<span>
	<span class="glyphicon glyphicon-user"></span>
	<span class="vcard author"><span class="fn"> <a class="url" rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span></span>
	&nbsp;&nbsp;
	<span class="glyphicon glyphicon-time"></span>
	<span class="post-date updated"><?php the_modified_date(); ?></span>
	<?php edit_post_link( __( 'Edit', 'vsblog' ), '&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span> <span>', '</span>' ); ?>
</span>
<hr />
<?php
}
endif;


if ( ! function_exists( 'vsblog_post_thumbnail' ) ):
function vsblog_post_thumbnail() {
	
	if ( has_post_thumbnail() ) :
	?>
		<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
		</div>
	<?php
	endif;
}
endif;


if ( ! function_exists( 'vsblog_dynamic_panel' ) ):
function vsblog_dynamic_panel() {
	$panel = "panel panel-";
	return $panel . esc_attr( get_theme_mod( 'vsblog_panel_color_setting', 'primary' ) );
}
endif;


if ( ! function_exists( 'vsblog_comment_panel_headline' ) ):
function vsblog_comment_panel_headline() {
	return esc_attr( get_theme_mod( 'vsblog_comment_panel_title', __( 'Have any Question or Comment?', 'vsblog' ) ) );
}
endif;


function vsblog_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<div <?php comment_class(); ?>>
		<div class="comment-author vcard">
			<div class="media" id="comment-<?php comment_ID(); ?>">
				<div class="media-left">
                	<div class="comment-info">
						<?php echo get_avatar( $comment, 60 ); ?>
						<?php printf( __( '<h4 class="media-heading fn">%s</h4>', 'vsblog' ), get_comment_author() ); ?>
						<small><?php _e( 'On ', 'vsblog' ); comment_date(); ?></small>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="alert alert-info" ><?php _e( 'Your comment is awaiting approval.', 'vsblog' ); ?></p>
					<?php endif; ?>
					
					<?php comment_text(); ?>
					
					<p class="comment-footer">
					<?php comment_reply_link( array_merge( $args,
						array( 
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text' => __( 'Reply', 'vsblog' ),
							'before' => '<i class="glyphicon glyphicon-share-alt"></i> ',
							'after' => ' '
							)
					) );
					?>
					
					<?php edit_comment_link( __( 'Edit', 'vsblog' ), '&nbsp;<i class="glyphicon glyphicon-edit"></i> ','' ) ?>
					</p>
					
				</div>
			</div>
		</div>
<!--</div> is added by wordpress automatically -->
<?php
}
