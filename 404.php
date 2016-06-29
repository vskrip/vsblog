<?php get_header(); ?>
<div class="col-md-8">
	<div class="left-content" >
		<div class="<?php echo vsblog_dynamic_panel(); ?>">
			<div class="panel-heading">
				<h1 class="panel-title"><?php esc_attr_e( 'Oops! That page can not be found.', 'vsblog' ); ?></h1>
			</div>
			
			<div class="panel-body">
				<p><?php esc_attr_e( 'It looks like nothing was found at this location. Maybe try a search?', 'vsblog' ); ?></p>
				<br />
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>				