<?php

function erla_owlcarousel_admin_enq() {
	wp_enqueue_script('erla-list', plugins_url() . '/erla-owlcarousel/admin/js/list.js');
}