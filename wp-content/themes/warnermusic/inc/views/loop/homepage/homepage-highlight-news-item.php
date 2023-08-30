<?php
$selectedHighlightNews = get_field( 'homepage_highlight_news_list', $args['page_id'] );
for ( $i = 0; $i < 3; $i ++ ) {
	$news = $selectedHighlightNews[ $i ];
	?>
    <div class="highlights-news-item homepage-highlight-news-item-<?= $news->ID ?>">
        <a href="#">
            <div class="image"><img src="<?= get_the_post_thumbnail_url( $news->ID ) ?>" alt="<?= $news->post_title ?>"></div>
            <div class="name"><?= $news->post_title ?></div>
        </a>
    </div>
<?php }