<?php
$highlightArtist        = $args['highlight_artists'];
$selectedDomesticArtist = $highlightArtist['domestic'] ?? null;
if ( ! empty( $selectedDomesticArtist ) ): ?>
    <div class="group-action-filter domestic-artist-list active" data-id="domestic-artist-list">
        <div class="artist-list-layout list-layout-warner-3">
			<?php
			foreach ( $selectedDomesticArtist as $item ):
				$artist = get_term( $item );
				$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id ); ?>
                <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                    <div class="content-box">
                        <div class="group-content">
                            <a class="link-box" href="<?= get_term_link( $artist->term_id, 'artist' ); ?>"></a>
                            <div class="image-feature"
                                 style="background-image: url('<?= $artistImage ? $artistImage['url'] : '' ?>')"></div>
                            <div class="name text-decoration-none"><?= $artist->name ?></div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php
$selectedInternationalArtistList = $highlightArtist['international'] ?? null;
if ( ! empty( $selectedInternationalArtistList ) ): ?>
    <div class="group-action-filter international-artist-list" data-id="international-artist-list">
        <div class="artist-list-layout list-layout-warner-3">
			<?php
			foreach ( $selectedInternationalArtistList as $item ):
				$artist = get_term( $item );
				$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id ); ?>
                <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                    <div class="content-box">
                        <div class="group-content">
                            <a class="link-box" href="<?= get_term_link( $artist->term_id, 'artist' ); ?>"></a>
                            <div class="image-feature"
                                 style="background-image: url('<?= $artistImage ? $artistImage['url'] : '' ?>')"></div>
                            <div class="name text-decoration-none"><?= $artist->name ?></div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>