

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
		$news = get_post();?>
        <div class="latest-news-item gird-item-no-square homepage-latest-news-item-<?= $news->ID ?>">
            <div class="content-box">
                <div class="group-content">
                    <a class="link-box" href="<?= get_post_permalink();?>"></a>
                    <div class="image-feature" style="background-image: url('<?= get_the_post_thumbnail_url($news->ID) ?>')"></div>
                    <div class="name text-decoration-none">
                        <div class="title"><?= $news->post_title ?></div>
                        <?php if($news->post_excerpt || $news->post_content):?>
                        <div class="excerpt"><?= $news->post_excerpt ?: wp_trim_words($news->post_content,20) ?></div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile;
	wp_reset_postdata();
endif;
?>