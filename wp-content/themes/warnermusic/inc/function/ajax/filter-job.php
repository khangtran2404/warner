<?php
// Xử lý ajax filter
add_action('wp_ajax_filter_jobs', 'filter_jobs_callback');
add_action('wp_ajax_nopriv_filter_jobs', 'filter_jobs_callback');
function filter_jobs_callback() {
	$teamValues = isset($_POST['team_filter']) ? $_POST['team_filter'] : array();
	$typeValues = isset($_POST['type_filter']) ? $_POST['type_filter'] : array();

	$args = array(
		'post_type' => 'jobs',
		'posts_per_page' => -1,
	);

	if (!empty($teamValues)) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'job-team',
				'field' => 'term_id',
				'terms' => array_values($teamValues),
			)
		);
	}

	if (!empty($typeValues)) {
		$args['meta_query'] = array(
			array(
				'taxonomy' => 'job_type',
				'value'     => array_values($typeValues),
				'compare'   => 'IN',
			)
		);
	}

	$jobs_query = new WP_Query($args);

	if ($jobs_query->have_posts()) {
		$countIndex = 0;
		while ($jobs_query->have_posts()) {
			$jobs_query->the_post();
			$countIndex ++;
			echo get_template_part( 'inc/views/loop/job/list', 'jobs-item', array('counter-index' => $countIndex ));
		}
	} else {
		echo '<div class="no-data">Post not found</div>';
	}
	wp_reset_postdata();
	wp_die();
}
