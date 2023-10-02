<?php
get_header();
?>

<?php
$termData = get_queried_object();
$name     = $termData->name;
$mainImg  = get_field( 'artist_image', 'artist_' . $termData->term_id );
?>
<div class="taxonomy-singer-template">
	<div class="container">
		<div class="main-taxt-content margin-bottom-section">
			<h1 class="title-tax font-global"><?= $termData->name ?></h1>
			<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-12 col-12 col-sticky">
					<div class="col-content-image image-no-square">
						<?php if ( $mainImg ): ?>
							<img src="<?= $mainImg['url'] ?>" alt="artist-main-image">
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-8 col-md-7 col-sm-12 col-12">
					<div class="col-main-content">
						<div class="listent-on">
							<h2 class="small-title font-global"><?= __( 'Listen on' ) ?></h2>
							<div class="social-icons">
								<ul class="list-social-icons">
									<?php
									$socialLinks = get_field( 'artist_social_links', 'artist_' . $termData->term_id );
									if ( $socialLinks ) {
										$links        = $socialLinks['artist_social_link_repeater'];
										if ( $links ) {
											foreach ( $links as $link ):
												$icon = $link['social_icon'];
												$link = $link['social_link']; ?>
												<li class="social-link-item">
													<a href="<?= $link ?: '#' ?>"><img src="<?= $icon ?>" alt="social-icon"></a>
												</li>
											<?php endforeach;
										}
									}
									?>
								</ul>
							</div>
						</div>
						<div class="connect-with-singer">
							<h2 class="small-title font-global"><?= __( 'Connect with ' ) . $termData->name ?></h2>
							<div class="listen-on-icons">
								<ul class="list-media-icons">
									<?php
									$mediaLinks = get_field( 'artist_media_links', 'artist_' . $termData->term_id );
									if ( $mediaLinks ) {
										$links        = $mediaLinks['artist_media_link_repeater'];
										if ( $links ) {
											foreach ( $links as $link ):
												$icon = $link['media_icon'];
												$link = $link['media_link']; ?>
												<li class="media-link-item">
													<a href="<?= $link ?: '#' ?>"><img src="<?= $icon ?>" alt="media-icon"></a>
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
								<?= $termData->description ?>
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
				$args  = array(
					'post_type' => 'playlist',
					'tax_query' => array(
						array(
							'taxonomy' => 'artist',
							'field'    => 'ID',
							'terms'    => $termData->term_id,
						),
					),
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="playlist-item">
							<div class="content-box">
								<?= get_field( 'playlist_embed_code', get_the_ID() ) ?>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
        </div>
        <div class="group-artist-videos">
			<h2 class="small-title font-global"><?= __( 'Videos' ) ?></h2>
			<div class="list-videos">
				<?php
				$args  = array(
					'post_type' => 'song',
					'tax_query' => array(
						array(
							'taxonomy' => 'artist',
							'field'    => 'ID',
							'terms'    => $termData->term_id,
						),
					),
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$videoUrl         = get_field( 'song_video_url' );
						$videoLabel       = get_field( 'song_video_label' );
						$videoReleaseDate = get_field( 'song_video_release_date' );
						if ( $videoUrl ):
							?>
							<div class="video-item">
								<div data-id="<?= $videoUrl ?>" class="content-box">
									<div class="thumbnail image-no-spuare-4-2">
                                        <img src="<?= get_the_post_thumbnail_url() ?>"
                                             alt="video-thumbnail">
									</div>
									<div class="content-text">
										<div class="name"><?= $videoLabel ?: '' ?></div>
										<div class="release-date"><?= $videoReleaseDate ?: '' ?></div>
									</div>
								</div>
							</div>
						<?php endif; endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
        </div>
    </div>
    <div class="song-video-popup hidden">
        <i class="fa fa-window-close close-popup-btn" aria-hidden="true"></i>
        <iframe src="#" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>
<?php
get_footer();
