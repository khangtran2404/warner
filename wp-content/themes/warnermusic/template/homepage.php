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
                <div class="list-artist">
                    <div class="artist-item artist-item-title">
                        <div class="content-box">
                            <a href="#" class="text-decoration-none">
                                <span><?= __( 'Intl' ) ?><br/><?= __( '& Local' ) ?><br/>
                                <span class="color-main"><?= __( 'Artists' ) ?></span>
                            </a>
                        </div>
                    </div>
                    <?php
                    get_template_part( 'inc/views/loop/homepage/homepage', 'artist-item', [ 'page_id' => get_the_ID() ] );
                    ?>
                </div>
                <div class="see-more button-link-warner">
                    <a href="#"><?= __( 'See more' ) ;?></a>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="container">
                <div class="list-news">
                    <div class="highlights-news-item highlights-news-item-title">
                        <div class="content-box">
                            <a href="#" class="text-decoration-none">
                                <span><?= __( 'Highlight' ) ?></span><br/>
                                <span class="color-main"><?= __( 'News' ) ?></span>
                            </a>
                        </div>
                    </div>
                    <?php
                        get_template_part( 'inc/views/loop/homepage/homepage', 'highlight-news-item', [ 'page_id' => get_the_ID() ] );
                    ?>
                </div>
                <div class="see-more button-link-warner">
                    <a href="#"><?= __( 'See more' ) ;?></a>
                </div>
            </div>
        </section>
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
        <section class="playlists">
            <div class="list-playlist">
                <?php
                //get_template_part( 'inc/views/loop/homepage/homepage', 'playlist-item', [ 'page_id' => get_the_ID() ] );
                ?>
            </div>
        </section>
    </div>
<?php
get_footer();
