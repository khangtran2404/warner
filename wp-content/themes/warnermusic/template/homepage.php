<?php
/**
 * Template name: Home Page (Warnermusic)
 */

get_header();
?>
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

                $bannerSongGroup = get_field('homepage_banner_song_group');
                if ( !empty( $bannerSongGroup ) && !empty( $bannerSongGroup['highlight_songs'] ) ) {
                    $args['post__in'] = $bannerSongGroup['highlight_songs'];
                    $args['orderby'] = 'post__in';
                }

				if (!empty( $bannerSongGroup ) && !empty($bannerSongGroup['latest_release_link'])){
					$latestReleaseLink = $bannerSongGroup['latest_release_link'];
				}

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'inc/views/loop/homepage/homepage', 'banner-song-item',['latest_release_link' => $latestReleaseLink ?? '#'] );
					endwhile;
				endif;
				?>
            </div>
        </section>
        <section class="artists padding-top-section">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="artist-title title-warner-h2 wow fadeInLeft" data-wow-duration="1s"><?= __( 'Artist' ) ?></h2>
                    <div class="artists-see-more button-link-warner wow fadeInRight" data-wow-duration="1s"><a
                                href="<?= get_field( 'artist_see_more', get_the_ID() ); ?>"><?= __( "See more" ) ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <ul class="list-filter-artist">
                            <li data-id="domestic-artist-list"
                                class="domestic-artist-filter item-filter active wow fadeInUp" data-wow-delay="0.2s"><?= __( 'Domestic' ) ?></li>
                            <li data-id="international-artist-list"
                                class="international-artist-filter item-filter wow fadeInUp" data-wow-delay="0.4s"><?= __( 'International' ) ?></li>
                        </ul>
                    </div>
                    <div class="col-lg-10 col-md-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="col-group-action-filter">
							<?php
							$selectedSongs    = $the_query->get_posts();
							$highlightArtists = [];
							foreach ( $selectedSongs as $song ) {
								$terms = wp_get_post_terms( $song->ID, 'artist', array( 'fields' => 'ids' ) );
								if ( $terms ) {
									foreach ( $terms as $term ) {
										$artist = get_term( $term );
										if ( $artist && $artist->parent !== 0 ) {
											$artistParent = get_term( $artist->parent, 'artist' );
											if ( ! is_wp_error( $artistParent ) ) {
                                                if (isset($highlightArtists[$artistParent->slug][$artist->term_id])){
                                                    continue;
                                                }
												$highlightArtists[ $artistParent->slug ][$artist->term_id] = $artist;
											}
										}
									}
								}
							}
//                            var_dump($highlightArtists);
							get_template_part( 'inc/views/loop/homepage/homepage', 'artist-item', [ 'highlight_artists' => $highlightArtists ] );
							wp_reset_postdata();
							?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="news padding-top-section">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="news-title title-warner-h2 wow fadeInLeft" data-wow-duration="1s"><?= __( 'News' ) ?></h2>
                    <div class="news-see-more button-link-warner wow fadeInRight" data-wow-duration="1s"><a
                                href="<?= get_field( 'news_see_more', get_the_ID() ); ?>"><?= __( "See more" ) ?></a>
                    </div>
                </div>
                <div class="list-news list-layout-warner-4 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'highlight-news-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
        <section class="events padding-top-section">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="events-title title-warner-h2 wow fadeInLeft" data-wow-duration="1s"><?= __( 'Events' ) ?></h2>
                    <div class="events-see-more button-link-warner wow fadeInRight" data-wow-duration="1s"><a
                                href="<?= get_field( 'event_see_more', get_the_ID() ); ?>"><?= __( "See more" ) ?></a>
                    </div>
                </div>
				<?php get_template_part( 'inc/views/loop/homepage/homepage', 'event-item' ); ?>
            </div>
        </section>
        <section class="merchandise padding-top-section">
            <div class="container">
                <div class="group-title-button">
                    <h2 class="events-title title-warner-h2 wow fadeInLeft" data-wow-duration="1s"><?= __( 'Merchandise' ) ?></h2>
                    <div class="events-see-more button-link-warner wow fadeInRight" data-wow-duration="1s"><a
                                href="<?= get_field( 'merchandise_see_more', get_the_ID() ); ?>"
                                target="_blank"><?= __( "See more" ) ?></a></div>
                </div>
                <div class="list-merchandise list-layout-warner-4 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'merchandise-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
        <section class="playlists padding-top-section">
            <div class="container">
                <h2 class="title-warner-h2 margin-bottom wow fadeInLeft" data-wow-duration="1s">Playlists</h2>
                <div class="list-playlist wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1s">
					<?php
					get_template_part( 'inc/views/loop/homepage/homepage', 'playlist-item', [ 'page_id' => get_the_ID() ] );
					?>
                </div>
            </div>
        </section>
    </div>
<?php
get_footer();
