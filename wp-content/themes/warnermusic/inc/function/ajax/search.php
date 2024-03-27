<?php
// Xử lý ajax filter
add_action('wp_ajax_custom_search', 'custom_search_callback');
add_action('wp_ajax_nopriv_custom_search', 'custom_search_callback');
/**
 * @throws JsonException
 */
function custom_search_callback() {
	$postTypeValue = isset($_POST['post_type']) ? $_POST['post_type'] : '';
	$searchValue = isset($_POST['search_value']) ? $_POST['search_value'] : '';
	$searchResult = [];

	$args = array(
		'post_type' => $postTypeValue,
	);

	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			if (strstr(mb_strtolower(get_the_title()),mb_strtolower($searchValue))){
				$searchResult[] = [
					'post_id' => get_the_ID(),
					'title' => get_the_title(),
					'url' => get_the_permalink()
				];
			}
		}
	}

	if (empty($searchResult)){
		$searchResult[] = [
			'post_id' => 0,
			'title' => 'No result',
			'url' => '#'
		];
	}
	echo json_encode( $searchResult, JSON_THROW_ON_ERROR );
	wp_reset_postdata();
	wp_die();
}
