

<?php
$args      = array(
	'post_status'    => 'publish',
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'orderby' => 'date',
	'order' => 'DESC',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$news = get_post(); ?>
        <div class="latest-news-item gird-item-square homepage-latest-news-item-<?= $news->ID ?>">
            <div class="content-box">
                <div class="image-feature">
                    <a href="#">
                        <img src="<?= get_the_post_thumbnail_url($news->ID) ?>" alt="<?= $news->post_title ?>">
                    </a>
                </div>
                <div class="name text-decoration-none">
                    <a href="#"><?= $news->post_title ?></a>
                </div>
                <div class="description">
					<?= $news->post_excerpt ?: wp_trim_words(apply_filters('the_content', $news->post_content)) ?>
                </div>
            </div>
        </div>
	<?php endwhile;
	wp_reset_postdata();
endif;
?>