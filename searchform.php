<form class="form-inline" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<div class="form-group search-group">
		<input type="text" name="s" class="form-control" id="terms" placeholder="<?php esc_attr_e( 'Keywords', 'vsblog');  ?>" />
		<button type="submit" class="btn btn-default"><?php esc_attr_e( 'Search &raquo;', 'vsblog');  ?></button>
	</div>
</form>