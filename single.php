<?php get_header(); ?>
<?php
if ( get_theme_mod ( 'vsblog_breadcrumbx_setting', '1' ) == '1' ) :
	get_template_part ( 'single', 'breadcrumb' );
endif;
?>

<div class="col-md-8">
	<div class="left-content" >
		
		<?php if ( is_active_sidebar( 'left_top' ) ) : ?>
		<div class="<?php echo vsblog_dynamic_panel(); ?>">
			<div class="panel-body"><?php dynamic_sidebar( 'left_top' ); ?></div>	
		</div>
		<?php endif; ?>


		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div <?php post_class('clearfix'); ?>>
			<div class="<?php echo vsblog_dynamic_panel(); ?>">
				<div class="panel-heading">
				<h1 class="panel-title entry-title" id="post-<?php the_ID(); ?>" ><?php the_title(); ?></h1>
				</div>
				
				<div class="panel-body">
					<?php vsblog_entry_meta(); ?>

					<?php if ( is_active_sidebar( 'left_top_below_title' ) ) : ?>
					<br />
					<?php dynamic_sidebar( 'left_top_below_title' ); ?>	
					<br />
					<?php endif; ?>
		
					<div class="entry-content">
					
					<?php
					if( get_theme_mod ( 'vsblog_single_post_thumbnail', '0' ) == '1' ) :
						vsblog_post_thumbnail();
					endif;
					?>
					
					<?php the_content(); ?>
					
					<div class="clearfix"></div>
						<div class="singletags"> <?php esc_attr_e( "Tagged with: ", "vsblog" ); the_tags( '', ' ', '' ); ?>
					</div>
					
					<?php wp_link_pages(); ?>
					
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif;  ?> 
		
		
		<!-- wd content bottom -->
		<?php if ( is_active_sidebar( 'left_bottom' ) ) : ?>
		<div class="<?php echo vsblog_dynamic_panel(); ?>">
			<div class="panel-body"><?php dynamic_sidebar( 'left_bottom' ); ?></div>	
		</div>
		<?php endif; ?>
		<!-- wd content bottom end -->


		<?php comments_template(); ?> 

		<?php if( get_next_post_link() || get_previous_post_link() ) : ?>
		<div class="<?php echo vsblog_dynamic_panel(); ?>">
			<div class="panel-footer">
				<nav>
				  <ul class="pager">
					<?php next_post_link( '<li class="previous"> %link </li>', '&larr; %title' ); ?>
					<?php previous_post_link( '<li class="next"> %link </li>', '%title &rarr;' ); ?>
				  </ul>
				</nav>	
			</div>
		</div>
		<?php endif; ?>
		
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>