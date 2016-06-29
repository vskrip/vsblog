<?php get_header(); ?>
<div class="col-md-8">
	<div class="left-content" >
	<?php if (have_posts() && ! is_front_page()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class('clearfix'); ?>>
			<div class="<?php echo vsblog_dynamic_panel(); ?>">
				<div class="panel-heading">
					<h1 class="panel-title entry-title" id="post-<?php the_ID(); ?>" ><?php the_title(); ?></h1>
				</div>
				
				<div class="panel-body">
				
					<?php
					if ( get_theme_mod( 'vsblog_meta_page_setting', '0' ) != '0' ) :
						vsblog_entry_meta_page();
					endif;
					?>

					<div class="entry-content">
					<?php the_content(); ?>
					</div>
					
					<?php wp_link_pages(); ?>
					
				</div>
				
				<?php edit_post_link( 'Edit', '<div class="panel-footer"><nav><ul class="pager pagercon"><li class="previous">', '</li></ul></nav></div>' ); ?>
				
			</div>
		</div>
	<?php endwhile; endif;  ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>