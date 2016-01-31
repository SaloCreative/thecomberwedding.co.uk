<nav id="navigation">
	<?php
	if ( has_nav_menu( 'primary-menu' ) ) {
		wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'container'       => '',
				'items_wrap'      => '<ul class="main-navigation">%3$s</ul>',
				'walker' => new My_Walker_Nav_Menu()
		) );
	} ?>
</nav>