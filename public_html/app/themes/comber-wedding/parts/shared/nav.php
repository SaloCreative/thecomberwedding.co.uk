<nav id="navigation">
	<ul class="main-navigation">
		<?php
		if ( has_nav_menu( 'primary-menu' ) ) {
			wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'container'       => '',
					'items_wrap'      => '%3$s',
					'walker' => new My_Walker_Nav_Menu()
			) );
		} ?>
		<li class="logout"><a href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout">Logout</a></li>
	</ul>
</nav>