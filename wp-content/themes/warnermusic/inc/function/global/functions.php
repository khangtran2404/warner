<?php

function get_page_link_by_template_name( $templateName ): string {
	$url = '#';
	if ( $templateName ) {
		$args          = array(
			'post_type'      => 'page',
			'meta_key'       => '_wp_page_template',
			'meta_value'     => 'template/' . $templateName . '.php',
			'posts_per_page' => - 1,
		);
		$templateQuery = new WP_Query( $args );
		if ( $templateQuery->have_posts() ) {
			while ( $templateQuery->have_posts() ) {
				$templateQuery->the_post();
				$url = get_permalink();
			}
		}
	}

	return $url;
}

function custom_search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'event', 'song', 'post', 'partner_artist' ) );
	}
	return $query;
}

add_filter( 'pre_get_posts', 'custom_search_filter' );

function include_custom_taxonomy_term_in_search( $posts, $query ) {
	if ( ! $query->is_main_query() ) {
		return $posts;
	}
	return $posts;
}

add_filter( 'posts_results', 'include_custom_taxonomy_term_in_search', 10, 2 );

function custom_taxonomy_template_include($template) {
	if (is_tax('artist') || is_tax('partner')) {
		$template_path = THEME_DIR . '/custom-taxonomy-templates/';
		$template_slug = 'taxonomy-' . get_query_var('taxonomy') . '.php';
		$template_file = $template_path . $template_slug;
		if (file_exists($template_file)) {
			return $template_file;
		}
	}
	return $template;
}
add_filter('template_include', 'custom_taxonomy_template_include');