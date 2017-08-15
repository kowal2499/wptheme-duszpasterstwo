<?php

	/*
	Plugin Name: erla OWLCarousel
	owlCarousel based slider
	Version: 1.0
	Author: Roman Kowalski
	Text Domain: erla-owlcarousel
	*/


class Erla_OWLCarousel extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('erla-owlcarousel', 'erla OWLCarousel', array(
			'description' => 'owlCarousel based slider'
		));
	}
 
	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		$title = apply_filters('widget_title', $instance['title']);
		echo $args['before_title'] . $title . $args['after_title'];
		echo $args['after_widget'];
	}
 
	public function form($instance)
	{
		$defaults = array(
			'title' => 'Events'
		);
		$instance = wp_parse_args((array)$instance, $defaults);
   ?>
 
      <p>
        <label for="title">Tytuł</label>
        <input type="text" id="<?php
      		echo $this->get_field_id('title'); ?>" name="<?php
      		echo $this->get_field_name('title'); ?>" value="<?php
      		echo $instance['title']; ?>"/>
      </p>
 
  <?php
	}
 
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}

// #########


require_once(plugin_dir_path(__FILE__) . '/includes/enqueue.php');

add_action('admin_enqueue_scripts', 'erla_owlcarousel_admin_enq');


function erla_owlcarousel_load_widget()
{
	register_widget('Erla_OWLCarousel');
}
 
add_action('widgets_init', 'erla_owlcarousel_load_widget');