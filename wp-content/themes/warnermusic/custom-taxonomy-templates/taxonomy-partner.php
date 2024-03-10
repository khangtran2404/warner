<?php
get_header();
?>

<?php
$termData = get_queried_object();
$name     = $termData->name;
$mainImg  = get_field( 'artist_image', 'artist_' . $termData->term_id );
?>
    <div id="container">
        <h1 class="title"><?= $termData->name ?></h1>
        <div class="group-images">
			<?php if ( $mainImg ): ?>
                <img src="<?= $mainImg['url'] ?>" alt="artist-main-image">
			<?php endif; ?>
        </div>
        <div class="group-social-links">
            <div class="listen-on">
				<?= __( 'Listen on' ) ?>
                <div class="listen-on-icons">
					<?php
					$mediaLinks = get_field( 'artist_media_links', 'artist_' . $termData->term_id );
					if ( $mediaLinks ) {
						$links        = $mediaLinks['artist_media_link_repeater'];
						if ( $links ) {
							foreach ( $links as $link ):
								$icon = $link['media_icon'];
								$link = $link['media_link']; ?>
                                <div class="media-link">
                                    <a href="<?= $link ?: '#' ?>"><img src="<?= $icon ?>" alt="media-icon"></a>
                                </div>
							<?php endforeach;
						}
					}
					?>
                </div>
            </div>
            <div class="connect-with">
				<?= __( 'Connect with ' ) . $termData->name ?>
                <div class="social-icons">
					<?php
					$socialLinks = get_field( 'artist_social_links', 'artist_' . $termData->term_id );
					if ( $socialLinks ) {
						$links        = $socialLinks['artist_social_link_repeater'];
						if ( $links ) {
							foreach ( $links as $link ):
								$icon = $link['social_icon'];
								$link = $link['social_link']; ?>
                                <div class="social-link">
                                    <a href="<?= $link ?: '#' ?>"><img src="<?= $icon ?>" alt="social-icon"></a>
                                </div>
							<?php endforeach;
						}
					}
					?>
                </div>
            </div>
        </div>
        <div class="group-information">
            <div class="biography">
                <h2 class="title"><?= __( 'Biography' ) ?></h2>
                <div class="description">
					<?= $termData->description ?>
                </div>
            </div>
        </div>
        <div class="group-artist-playlists">
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
						<?= get_field( 'playlist_embed_code', get_the_ID() ) ?>
                    </div>
				<?php endwhile;
			endif; ?>
        </div>
        <div class="group-artist-videos">
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
                            <div class="thumbnail"><img src="<?= get_the_post_thumbnail_url() ?>"
                                                        alt="video-thumbnail"></div>
                            <div class="name"><a href="#"><?= $videoLabel ?: '' ?></a></div>
                            <div class="release-date"><?= $videoReleaseDate ?: '' ?></div>
                        </div>
					<?php endif; endwhile;
			endif;
			wp_reset_postdata();
			?>
        </div>
    </div>

<?php
get_footer();
