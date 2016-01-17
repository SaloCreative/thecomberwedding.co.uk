<div class="large-3 columns" data-equalizer-watch>
	<div class="panel" data-equalizer-watch>
		<h3>Sidebar</h3>
		<?php if ( is_active_sidebar( 'sidebar-primary' ) ) {
			dynamic_sidebar( 'sidebar-primary' );
		}; ?>
	</div>
</div>