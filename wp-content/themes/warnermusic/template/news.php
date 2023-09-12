<?php
/**
 * Template name: News Page (Warnermusic)
 */

get_header();
?>
    <div>
        <div class="highlight-news">
			<?php
			$highlightNewsId  = get_field( 'highlight_news' );
			if ( $highlightNewsId ):
				$highlightPost = get_post( $highlightNewsId );
				$thumbnailUrl = get_the_post_thumbnail_url( $highlightNewsId );
				$postLink = get_post_permalink( $highlightNewsId ) ?: '#';
				?>
                <div class="information">
                    <div class="publish-date"><?= $highlightPost->post_date ?></div>
                    <div class="title">
                        <a href="<?= $postLink ?>">
                            <?= $highlightPost->post_title ?>
                        </a>
                    </div>
                </div>
                <a href="<?= $postLink ?>">
                    <img src="<?= $thumbnailUrl ?>" alt="highlight-news-thumbnail">
                </a>
			<?php endif;
			?>
        </div>
        <div class="news-list" id="news-list">
            <?php
            $args      = array(
	            'post_status'    => 'publish',
	            'post_type'      => 'post',
	            'posts_per_page' => -1,
	            'orderby' => 'date',
	            'order' => 'DESC',
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
	            while ( $the_query->have_posts() ) : $the_query->the_post();
		            get_template_part( 'inc/views/loop/news/list', 'news-item' );
	            endwhile;
	            wp_reset_postdata();
            endif;
            ?>
        </div>
        <div id="pagination"></div>
    </div>
<?php
get_footer();
