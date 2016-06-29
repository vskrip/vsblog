<?php get_header(); ?>
<div class="col-md-8">
	<div class="left-content" >
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class('clearfix'); ?>>
			<div class="<?php echo vsblog_dynamic_panel(); ?>">
				<div class="panel-heading">
					<h2 class="panel-title">
                    	<a class="entry-title" 
                           rel="bookmark" 
                           id="post-<?php the_ID(); ?>" 
                           href="<?php the_permalink(); ?>" 
                           title="<?php the_title(); ?>" 
                        >
							<?php the_title(); ?>
                        </a>
                    </h2>
				</div>
				
				<div class="panel-body">
					<?php vsblog_entry_meta(); ?>
					
					<div class="entry-content" >
					
					<?php
					if( get_theme_mod( 'vsblog_archive_post_thumbnail', '0' ) == '1' ) :
						vsblog_post_thumbnail();
					endif;
					?>
					
					<?php the_excerpt(); ?>
					</div>
					
				</div>
				
				<div class="panel-footer">
					<nav>
						<ul class="pager pagercon">
						<li class="previous"><a href="<?php the_permalink() ?>"> <?php the_title(); ?> <span aria-hidden="true">&rarr;</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	
		<?php if( get_previous_posts_link() || get_next_posts_link() ) : ?>
		<div class="<?php echo vsblog_dynamic_panel(); ?>">
			<div class="panel-footer">
				<nav>
					<ul class="pager">
					
						<?php if( get_previous_posts_link() ) : ?>
						<li class="previous"><?php previous_posts_link( __( '&larr; Newer Entries', 'vsblog' ) ); ?></li>
						<?php endif; ?>
						
						<?php if( get_next_posts_link() ) : ?>
						<li class="next"><?php next_posts_link( __( 'Older Entries &rarr;', 'vsblog' ) ); ?></li>
						<?php endif; ?>
						
					</ul>
				</nav>
			</div>	
		</div>
		<?php endif; ?>

	<?php else: ?>

	
	<div class="<?php echo vsblog_dynamic_panel(); ?>">
		<div class="panel-heading">
			<h2 class="panel-title"><?php esc_attr_e( 'Posts Not Found', 'vsblog' ); ?></h2>
		</div>
		<div class="panel-body">
		
			<p><?php esc_attr_e( 'It looks like nothing was found at this location.', 'vsblog' ); ?></p>
			
			<p><?php get_search_form(); ?></p>
			
			<?php if( current_user_can( 'edit_published_posts' ) ) : ?>
			<p><a target="_blank" href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">
			<?php esc_attr_e( 'Add New Post', 'vsblog' ); ?>
			</a></p>
			<?php endif; ?>
		</div>	
	</div>

	<?php endif; ?>

	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>