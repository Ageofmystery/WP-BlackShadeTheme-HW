<?php

function loadResources() {
	//style
	wp_enqueue_style( 'bootstrap' , get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css');
	wp_enqueue_style( 'flexboxgrid' , get_template_directory_uri() . '/bower_components/flexboxgrid/dist/flexboxgrid.min.css');
	wp_enqueue_style( 'fontawesome' , get_template_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style( 'style', get_stylesheet_uri());
	//scripts
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js','','',true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js','','',true);
	wp_enqueue_script( 'prime-script', get_template_directory_uri() . '/js/theme-function.js','','',true);
}
add_action('wp_enqueue_scripts', 'loadResources');

//enable img-thumb
if (function_exists('add_theme_support')) add_theme_support('post-thumbnails');
add_image_size( 'mini-thumb', 720, 500, true );

//register menus
register_nav_menus([
	'primary' => 'Header',
	'secondary' => 'Subheader',
	'last' => 'Footer'
]);

//limiting words in content
function new_excerpt_length($length) {
	return 75;
}
add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', function($more) {
	return '...';
});

//widget social ico
register_sidebar([
	'id' => 'widget-zone',
	'name' => 'Зона соц. иконок',
	'description' => 'Иконки фонтавесоме',
	'class' => '',
	'before_widget' => '<div class="sc-block">',
	'after_widget' => "</div>\n",
]);

//reorder formsubmit
function reorderFormFields( $fields ){
	$new_fields = array();
	$myorder = array('author','email','comment');
	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}
	return $new_fields;
}
add_filter('comment_form_fields', 'reorderFormFields' );

//pagination changes
function my_navigation_template( $template, $class ){
	return '<nav class="navigation row center-xs %1$s" role="navigation"><div class="nav-links">%3$s</div></nav>';
}
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );