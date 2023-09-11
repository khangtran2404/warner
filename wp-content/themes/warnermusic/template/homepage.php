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
        <!--<section class="artists">
            <div class="container">
                <div class="artist-title"><a href="#"><?= __( 'Artist' ) ?></a></div>
                <div class="list-artist">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'artist-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>-->
        <section class="news">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="news-title title-warner-h2"><?= __( 'News' ) ?></h2>
                    <div class="news-see-more button-link-warner"><a href="#"><?= __("See more") ?></a></div>
                </div>    
                <div class="list-news list-layout-warner-4">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'highlight-news-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
        <section class="events">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="events-title title-warner-h2"><?= __( 'Events' ) ?></h2>
                    <div class="events-see-more button-link-warner"><a href="#"><?= __("See more") ?></a></div>
                </div>  
                <div class="list-event">
                    <?php
                    get_template_part( 'inc/views/loop/homepage/homepage', 'event-item' );
                    ?>
                </div>
            </div>
        </section>
        <section class="playlists">
            <div class="container">
                <h2 class="title-warner-h2">Playlists</h2>
                <div class="list-playlist">
                    <?php
                    get_template_part( 'inc/views/loop/homepage/homepage', 'playlist-item', [ 'page_id' => get_the_ID() ] );
                    ?>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();
