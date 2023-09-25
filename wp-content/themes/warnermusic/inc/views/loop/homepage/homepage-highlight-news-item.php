

<?php
$args = array(
	'post_status'    => 'publish',
	'post_type'      => 'post',
	'posts_per_page' => 7,
	'orderby' => 'date',
	'order' => 'DESC',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$news = get_post(); ?>
        <div class="latest-news-item gird-item-no-square homepage-latest-news-item-<?= $news->ID ?>">
            <div class="content-box">
                <div class="group-content">
                    <a class="link-box" href="#"></a>
                    <div class="image-feature" style="background-image: url('<?= get_the_post_thumbnail_url($news->ID) ?>')"></div>
                    <div class="name text-decoration-none">
                        <a href="#"><?= $news->post_title ?></a>
                    </div>
                    <div class="description">
                        <p><?= $news->post_excerpt ?: wp_trim_words($news->post_content,20) ?></p>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile;
	wp_reset_postdata();
endif;
?>