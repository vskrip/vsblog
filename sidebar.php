<div class="col-md-4">
	<?php if ( is_front_page() ) : ?>
		<div class="front-right-content" >
    <?php else : ?>
		<div class="right-content" >    
    <?php endif; ?>
		<?php
		if ( is_active_sidebar( 'sidebar_main' ) ) :
			add_filter( 'widget_title', 'vsblog_widget_title_filter' );
			dynamic_sidebar( 'sidebar_main' );
			remove_filter( 'widget_title', 'vsblog_widget_title_filter' );
		endif;
		?>
	</div>
</div>