<?php

	/*
	Plugin Name: erla OWLCarousel
	owlCarousel based slider
	Version: 1.0
	Author: Roman Kowalski
	Text Domain: erla-owlcarousel
	*/

// #########

require_once(plugin_dir_path(__FILE__) . '/includes/enqueue.php');
add_action('admin_enqueue_scripts', 'erla_owlcarousel_admin_enq');
add_action('wp_enqueue_scripts', 'erla_owlcarousel_enq');


require_once(plugin_dir_path(__FILE__) . '/includes/widget_class.php');

function erla_owlcarousel_load_widget()
{
	register_widget('Erla_OWLCarousel');
}
 
add_action('widgets_init', 'erla_owlcarousel_load_widget');

// ####################################
// ##
// ## Register shortcode
// ##
// ####################################

function eoc_func($atts) {

	global $wp_registered_widgets;

	// process attributes

	extract(shortcode_atts(array('id' => '1'), $atts));
	$instance = $id;
	$id = 'erla-owlcarousel-' . $id;

	// echo widget

	if (!isset($wp_registered_widgets[$id])) {
		return;
	}

	$widget = $wp_registered_widgets[$id];
	$widget_instances = get_option( $widget['callback'][0]->option_name );
	$widget_instance = $widget_instances[ $instance ];

	the_widget("Erla_OWLCarousel", $widget_instance);
}

add_shortcode('eoc','eoc_func');