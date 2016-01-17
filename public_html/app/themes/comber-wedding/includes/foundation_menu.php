<?php
if ( ! function_exists ( 'register_my_menus' ) ) {
	function register_my_menus() {
	  register_nav_menus(
		array(
		  'primary-menu' => __( 'Primary Menu' ),
		  'secondary-menu' => __( 'Secondary Menu' )
		)
	  );
	}
	add_action( 'init', 'register_my_menus' );
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown\">\n";
  }
}

add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
	
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'has-dropdown'; 
		}
	}
	
	return $items;    
}