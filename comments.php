<?php
if( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
{
	 die( 'Please do not load this page directly. Thanks!' );
}
?>

<?php if( post_password_required() )
{
?>
	<div class="alert alert-info"><?php esc_attr_e( 'Password protected. Enter the password to view Comments.', 'vsblog' ); ?> </div>
<?php
return;
}
?>


<div class="<?php echo vsblog_dynamic_panel(); ?>" id="commentcount">
	
	<div class="panel-heading"><h3 class="panel-title"><?php echo vsblog_comment_panel_headline(); ?></h3></div>
	
	<div class="panel-body">
		<div id="comments" class="comments-area">

			<?php if ( have_comments() ) : ?>
				<h4 class="comments-title">
					<?php
						printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'vsblog' ),
							number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
					?>
				</h4>

				
				<?php
				wp_list_comments( array(
					'style'       => 'div',
					'type'  => 'all',
					'callback' => 'vsblog_comments',
				) );
				?>
				
				

			
				<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
				<nav>
				  <ul class="pager">
					<li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vsblog' ) ); ?></li>
					<li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vsblog' ) ); ?></li>
				  </ul>
				</nav>
				<!-- .comment-navigation -->
				<?php endif; // Check for comment navigation ?>

			<?php endif; // have_comments() end displaying comments ?>

			<?php if ( ! comments_open() ) : ?>
				<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'vsblog' ); ?></p>
			<?php else : ?>
			<?php comment_form(); ?>
			<?php endif; ?>

		</div><!-- #comments -->
	</div>
</div>