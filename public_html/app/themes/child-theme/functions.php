<?php

/* custom PHP functions below this line */

require_once('includes/custom_shortcode.php');



//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------

if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'full-landings', 1600, 595, true); 
add_image_size( 'full-blog', 760, 420, true);


//Widget Areas

/*add_action( 'after_setup_theme', 'child_theme_setup' );

if ( !function_exists( 'child_theme_setup' ) ):
function child_theme_setup() {

	register_sidebar( array(
		'name' => __( 'Sidebar Name', 'twentyfourteen' ),
		'id' => 'sidebar-id',
		'description' => __( 'Sidebar Description', 'twentyfourteen' ),
	) );
	
	

}
endif;*/

