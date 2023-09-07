<?php
/**
 * Template name: Home Page (Warnermusic)
 */

get_header(); ?>
    <div id="site-home-page" class="site-home-page">
        <h1 class="SEO-score" type="hidden" hidden="hidden" style="display:none;">FOR SEO</h1>
        <section class="banner-slider">
            <div class="list-banner-slider">
				<?php
				$args      = array(
					'post_status'    => 'publish',
					'post_type'      => 'song',
					'posts_per_page' => 10,
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'inc/views/loop/homepage/homepage', 'banner-song-item' );
					endwhile;
					wp_reset_postdata();
				endif;
				?>
            </div>
        </section>
        <section class="artists">
            <div class="container">
                <div class="artist-title"><a href="#"><?= __( 'Artist' ) ?></a></div>
                <div class="list-artist">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'artist-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="container">
                <div class="news-title"><a href="#"><?= __( 'News' ) ?></a></div>
                <div class="news-see-more"><a href="#"><?= __("See more") ?></a></div>
                <div class="list-news">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'highlight-news-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
        <section class="events">
            <div class="list-event">
				<?php
				get_template_part( 'inc/views/loop/homepage/homepage', 'event-item' );
				?>
            </div>
        </section>
        <section class="playlists">
            <div class="bg-playlists"></div>
            <div class="container">
                <div class="bg-over">
                    <div class="title-playlist">Playlists</div>
                    <div class="list-playlist">
						<?php
						get_template_part( 'inc/views/loop/homepage/homepage', 'playlist-item', [ 'page_id' => get_the_ID() ] );
						?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();
