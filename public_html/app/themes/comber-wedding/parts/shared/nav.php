<div id="navigation" class="contain-to-grid sticky">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
			 
			</li>
			 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a><span>Menu</span></a></li>
	    </ul>
			<section class="top-bar-section">
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'container'       => '',
						'items_wrap'      => '<ul class="left">%3$s</ul>',
						'walker' => new My_Walker_Nav_Menu()
				) );
			} ?>
		
			</section>
		</div>
	</nav>
</div>