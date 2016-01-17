<?php


// This code anbles Shortcodes in WordPress Text Widget
add_filter('widget_text', 'do_shortcode');

//[row]

function row($params = array(), $content = null) {
	extract(shortcode_atts(array(
		'style' => 'default',
		'equalize' => 'n',
	), $params));
	$content = do_shortcode($content);
	$dataEqualize = $equalize == 'y' ? 'data-equalizer' :'';
	$row = '<div class="row '.$style.'" '.$dataEqualize.'>'.$content.'</div>';
	return $row;
}

//[column]

function column($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'style' => 'large-12',
		'equalize' => 'n',
	), $params));
	$dataEqualize = $equalize == 'y' ? 'data-equalizer-watch' :'';
	$column = '<div class="columns '.$style.'" '.$dataEqualize.'>
	'.$content.'
	</div>';
	return $column;
}

//[column_panelled]

function column_panelled($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'style' => 'large-12',
		'panel' => 'default',
		'equalize' => 'n',
	), $params));
	$dataEqualize = $equalize == 'y' ? 'data-equalizer-watch' :'';
	$column_panelled = '<div class="columns '.$style.'" '.$dataEqualize.'>
		<div class="panel '.$panel.'" '.$dataEqualize.'>
			'.$content.'
		</div>
	</div>';
	return $column_panelled;
}

//[button]

function button($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'text' => 'Link Text',
		'link' => '#',
		'style'=> 'small',
	), $params));
	$button = '<a class="button '.$style.'" href="'.$link.'" title="'.$text.'">'.$text.'</a>';
	return $button;
}

//[tooltip]

function tooltip($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'text' => 'tooltip text',
	), $params));
	$tooltip = '<span data-tooltip aria-haspopup="true" class="has-tip" title="'.$text.'">'.$content.'</span>';
	return $tooltip;
}

//[accordion]

function accordion($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'class' => '',
	), $params));
	$accordion = '<ul class="accordion '.$class.'" data-accordion>'.$content.'</ul>';
	return $accordion;
}

//[accordion_item]

function accordion_item($params = array(), $content = null) {
	
	$content = do_shortcode($content);
	extract(shortcode_atts(array(
		'class' => '',
		'id' => '',
		'label' => 'Accordian Label',
	), $params));
	$accordion_item = '
		<li class="accordion-navigation '.$class.'">
			<a href="#panel'.$id.'">'.$label.'</a>
			<div id="panel'.$id.'" class="content '.$class.'">
				'.$content.'
    		</div>
		</li>';
	return $accordion_item;
}

//[tabs]

// this variable will hold your divs
$tabs_divs = '';

function tabs( $atts, $content = null ) {
    global $tabs_divs;

    // reset divs
    $tabs_divs = '';

    extract(shortcode_atts(array(  
        'id' => '',
        'class' => ''
    ), $atts));  

    $output = '<ul class="tabs '.$class.'" data-tab';

    $output.='>'.do_shortcode($content).'</ul>';
    $output.= '<div class="tabs-content">'.$tabs_divs.'</div>';

    return $output;  
}  


function tab($atts, $content = null) {  
    global $tabs_divs;

    extract(shortcode_atts(array(  
        'id' => '',
        'title' => '',
        'active'=>'n' 
    ), $atts));  

    if(empty($id))
        $id = rand(100,999);

    $activeClass = $active == 'y' ? 'active' :'';
    $output = '
        <li class="tab-title '.$activeClass.'">
            <a href="#panel'.$id.'">'.$title.'</a>
        </li>
    ';

    $tabs_divs.= '<div class="content '.$activeClass.'" id="panel'.$id.'">'.$content.'</div>';

    return $output;
}

add_shortcode('tabs', 'tabs');
add_shortcode('tab', 'tab');
add_shortcode('accordion_item', 'accordion_item');
add_shortcode('accordion', 'accordion');
add_shortcode('tooltip', 'tooltip');
add_shortcode('button', 'button');
add_shortcode('row', 'row');
add_shortcode('column_panelled', 'column_panelled');
add_shortcode('column', 'column');


add_filter("the_content", "the_content_filter");

function the_content_filter($content) {
 
	// array of custom shortcodes requiring the fix 
	$block = join("|",array("row", "column", "button", "tooltip", "accordion", "accordion_item", "tabs", "tab", "column_panelled"));
 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;
}