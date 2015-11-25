<?php

//Shortcodes go here
add_filter('widget_text', 'do_shortcode');


//[custom_shortcode]

function custom_shortcode($params = array(), $content = null) {
	$content = do_shortcode($content);
	$custom_shortcode = '
		<div class="custom_shortcode">
		</div>';
	return $custom_shortcode;
}


add_shortcode('custom_shortcode', 'custom_shortcode');