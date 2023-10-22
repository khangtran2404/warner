<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>
    <div class="taxonomy-singer-template">
        <div class="container">
            <div class="main-taxt-content margin-bottom-section">
                <h1 class="title-tax font-global"><?= get_the_title() ?></h1>
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 col-sticky">
                        <div class="col-content-image aspect-ratio-warner aspect-ratio-16-9">
							<?php if ( get_the_post_thumbnail_url() ): ?>
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="artist-main-image">
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="col-main-content">
                            <div class="listent-on">
                                <h2 class="small-title font-global"><?= __( 'Listen on' ) ?></h2>
                                <div class="listen-on-icons">
                                    <ul class="list-media-icons">
										<?php
										$mediaLinks = get_field( 'artist_media_links' );
										if ( $mediaLinks ) {
											$links_media      = $mediaLinks['artist_media_link_repeater'];
											if ( $links_media ) {
												foreach ( $links_media as $link_media ):
													$icon_med = $link_media['media_icon'];
													$link_med = $link_media['media_link']; ?>
                                                    <li class="media-link-item">
                                                        <a href="<?= $link_med ?: '#' ?>"><img src="<?= $icon_med; ?>"
                                                                                               alt="media-icon"></a>
                                                    </li>
												<?php endforeach;
											}
										}
										?>
                                    </ul>
                                </div>
                            </div>
                            <div class="connect-with-singer">
                                <h2 class="small-title font-global"><?= __( 'Connect with ' ) . get_the_title() ?></h2>
                                <div class="social-icons">
                                    <ul class="list-social-icons">
										<?php
										$socialLinks = get_field( 'artist_social_links' );
										if ( $socialLinks ) {
											$links_social    = $socialLinks['artist_social_link_repeater'];
											if ( $links_social ) {
												foreach ( $links_social as $link_social ):
													$icon_so = $link_social['social_icon'];
													$link_so = $link_social['social_link']; ?>
                                                    <li class="social-link-item">
                                                        <a href="<?= $link_so ?: '#' ?>"><img src="<?= $icon_so ?>"
                                                                                              alt="social-icon"></a>
                                                    </li>
												<?php endforeach;
											}
										}
										?>
                                    </ul>
                                </div>
                            </div>
                            <div class="biography">
                                <h2 class="small-title font-global"><?= __( 'Biography' ) ?></h2>
                                <div class="main-content-singer">
									<?= get_the_content() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group-artist-playlists playlists margin-bottom-section">
                <h2 class="small-title font-global"><?= __( 'Playlist' ) ?></h2>
                <div class="list-playlist">
					<?php
					$playlists = get_field( 'partner_artist_playlist' );
					if ( ! empty( $playlists ) ) :
						foreach ( $playlists as $playlist ): ?>
                            <div class="playlist-item">
                                <div class="content-box">
									<?= $playlist['playlist_embed_link'] ?>
                                </div>
                            </div>
						<?php endforeach;
					endif; ?>
                </div>
            </div>
            <div class="group-artist-videos">
                <h2 class="small-title font-global"><?= __( 'Videos' ) ?></h2>
                <div class="list-videos">
					<?php
					$videos = get_field('partner_artist_videos');
					if ( !empty($videos) ) :
						foreach ($videos as $videoData ):
							$videoData = $videoData['video_group'];
							$videoUrl         = $videoData['video_embed_link'];
							$videoLabel       = $videoData['video_label'];
							$videoReleaseDate = $videoData['video_release_date'];
							if ( $videoUrl ):
								$videoId = getYoutubeVideoId( $videoUrl );
								if ( $videoId != null ) {
									$videoThumbnail = 'https://img.youtube.com/vi/' . $videoId . '/0.jpg';
								}

								?>
                                <div class="video-item">
                                    <div data-id="<?= $videoUrl ?>" class="content-box">
                                        <div class="thumbnail aspect-ratio-warner aspect-ratio-2-3-video">
                                            <img src="<?= $videoThumbnail ?? '' ?>"
                                                 alt="video-thumbnail">
                                        </div>
                                        <div class="content-text">
                                            <div class="name"><?= $videoLabel ?: '' ?></div>
                                            <div class="release-date"><?= $videoReleaseDate ?: '' ?></div>
                                        </div>
                                    </div>
                                </div>
							<?php endif; endforeach;
					endif;
					wp_reset_postdata();
					?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; // End of the loop.

get_footer();
