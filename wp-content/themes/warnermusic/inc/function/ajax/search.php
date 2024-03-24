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
		's' => sanitize_text_field($searchValue),
	);

	$postQuery = new WP_Query($args);

	if ($postQuery->have_posts()) {
		while ($postQuery->have_posts()) {
			$postQuery->the_post();
			$searchResult[] = [
				'post_id' => get_the_ID(),
				'title' => get_the_title(),
				'url' => get_the_permalink()
			];
		}
	}
	echo json_encode( $searchResult, JSON_THROW_ON_ERROR );
	wp_reset_postdata();
	wp_die();
}
