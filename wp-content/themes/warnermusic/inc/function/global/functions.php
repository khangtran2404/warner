<?php

function get_page_link_by_template_name($templateName): string
{
	$url = '#';
	if ($templateName){
		$args = array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $templateName . '.php',
			'posts_per_page' => -1,
		);
		$templateQuery = new WP_Query($args);
		if ($templateQuery->have_posts()){
			var_dump($templateQuery);
		}
	}
	return $url;
}