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
	wp_reset_postdata();

	return $url;
}

function custom_search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( '' ) );
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

function getYoutubeVideoId($url) {
	if (strpos($url, '?v=') !== false) {
		$videoId = explode('?v=', $url);
		if (isset($videoId[1])) {
			return $videoId[1];
		}
	}
	elseif (strpos($url, '/embed/') !== false) {
		$videoId = explode('/embed/', $url);
		if (isset($videoId[1])) {
			$result = $videoId[1];
		}
	}
	else {
		$parts = explode('/', $url);
		$result = end($parts);
	}

	$startIndex = strpos($result, '?si');

	if ($startIndex !== false) {
		return substr($result, 0, $startIndex);
	}

	return null;
}

function custom_admin_css() {
	$taxonomy = isset($_GET['taxonomy']) ? $_GET['taxonomy'] : '';
	if ($taxonomy === 'artist'){
		echo '<style>
        #parent{
        	.level-1{
        		display: none;
        	}
        }
    </style>';
	}
}
add_action('admin_head', 'custom_admin_css');

function searchStringToReplace($url)
{
    $start_str = 'https://lpclub.vn/';
    $end_str = '?q=';

    $start_pos = strpos($url, $start_str);
    $end_pos = strpos($url, $end_str);

    if ($start_pos !== false && $end_pos !== false) {
        $start_pos += strlen($start_str);
        return str_replace(substr($url, $start_pos, $end_pos - $start_pos), 'search', $url);
    }
}