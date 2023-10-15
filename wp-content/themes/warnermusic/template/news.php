<?php
/**
 * Template name: News Page (Warnermusic)
 */

get_header();
?>
    <div id="site-news-page" class="site-news-page padding-page">
        <div class="container">
            <div class="highlight-news">
				<?php
				$highlightNewsId  = get_field( 'highlight_news' );
				if ( $highlightNewsId ):
					$highlightPost = get_post( $highlightNewsId );
					$thumbnailUrl = get_the_post_thumbnail_url( $highlightNewsId );
					$postLink     = get_post_permalink( $highlightNewsId ) ?: '#';
                    $publishDate = date("F d, Y", strtotime($highlightPost->post_date));
					?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="information">
                                <div class="group-content">
                                    <div class="publish-date"><?= $publishDate ?></div>
                                    <div class="title">
                                        <a href="<?= $postLink ?>">
											<?= $highlightPost->post_title; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="image-square aspect-ratio-warner aspect-ratio-1-1">
                                <a href="<?= $postLink ?>">
                                    <img src="<?= $thumbnailUrl ?>" alt="highlight-news-thumbnail">
                                </a>
                            </div>
                        </div>
                    </div>
				<?php endif;
				?>
            </div>
            <div class="news-list post-list-pagination list-layout-warner-3-no-slider" id="news-list">
				<?php
				$args      = array(
					'post_status'    => 'publish',
					'post_type'      => 'post',
					'posts_per_page' => - 1,
					'orderby'        => 'date',
					'order'          => 'DESC',
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
            <div id="pagination">
            </div>
        </div>
    </div>
<?php
get_footer();
