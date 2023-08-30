<?php
/**
 * Template name: Home Page (Warnermusic)
 */

get_header(); ?>
    <div id="site-home-page" class="site-home-page">
        <div class="container">
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
            <hr>
            <section class="artists">
                <div class="list-artist">
                    <div class="title">
                        <a href="#">
                            <span><?= __( 'Intl & Local' ) ?></span>
                            <span><?= __( 'Artists' ) ?></span>
                        </a>
                    </div>
                    <div class="see-more">
                        <a href="#">
                            <button><?= __( 'See more' ) ?></button>
                        </a>
                    </div>
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'artist-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </section>
            <hr>
            <section class="news">
                <div class="list-news">
                    <div class="title">
                        <a href="#">
                            <span><?= __( 'Highlight' ) ?></span>
                            <span><?= __( 'News' ) ?></span>
                        </a>
                    </div>
                    <div class="see-more">
                        <a href="#">
                            <button><?= __( 'See more' ) ?></button>
                        </a>
                    </div>
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'highlight-news-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </section>
            <hr>
            <section class="events">
                <div class="list-event">
                    <div class="title">
                        <a href="#">
                            <span><?= __( 'Event' ) ?></span>
                            <span><?= __( 'Schedule' ) ?></span>
                        </a>
                    </div>
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'event-item' );
					?>
                </div>
            </section>
            <hr>
            <section class="playlists">
                <div class="list-playlist">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'playlist-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </section>
        </div>
    </div>
<?php
get_footer();
