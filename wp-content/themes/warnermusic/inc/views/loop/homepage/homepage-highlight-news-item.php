<?php
$selectedHighlightNews = get_field( 'homepage_highlight_news_list', $args['page_id'] );
for ( $i = 0; $i < 3; $i ++ ) {
	$news = $selectedHighlightNews[ $i ];
	?>
    <div class="highlights-news-item gird-item-square homepage-highlight-news-item-<?= $news->ID ?>">
        <div class="content-box">
            <div class="image-feature">
                <a href="#">
                    <img src="<?= get_the_post_thumbnail_url( $news->ID ) ?>" alt="<?= $news->post_title ?>">
                </a>
            </div>
            <div class="name" class="text-decoration-none">
				<a href="#"><?= $news->post_title ?></a>
			</div>
            <div class="description">
            Lorem Ipsum is simply dummy text of the printing.
            </div>
        </div>
    </div>
<?php }