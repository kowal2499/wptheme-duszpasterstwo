<?php

function erla_owlcarousel_admin_enq() {

	// STYLES

	wp_enqueue_style("erla-list-style", plugins_url() . '/erla-owlcarousel/admin/css/style.css');

	// SCRIPTS

	wp_enqueue_script('erla-list', plugins_url() . '/erla-owlcarousel/admin/js/list.js', array(), "1.0", true);
	wp_enqueue_media();
}


// frontend styles & scripts
function erla_owlcarousel_enq() {
	wp_enqueue_style("eoc-owl", plugins_url() . '/erla-owlcarousel/css/owl.carousel.min.css');
	wp_enqueue_style("eoc-owl-theme", plugins_url() . '/erla-owlcarousel/css/owl.theme.default.min.css');
	wp_enqueue_style("eoc-main", plugins_url() . '/erla-owlcarousel/css/eoc.css');

	wp_enqueue_script('eoc-owl-js', plugins_url() . '/erla-owlcarousel/js/owl.carousel.min.js', array('jquery'), "2.2.1", true);
	
}