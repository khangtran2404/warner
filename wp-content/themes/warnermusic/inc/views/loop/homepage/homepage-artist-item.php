<?php $selectedDomesticArtist = get_field( 'homepage_domestic_artist_list', $args['page_id'] );
if ( ! empty( $selectedDomesticArtist ) ): ?>
    <div class="domestic-artist-list">
		<?php
		for ( $i = 0; $i < 3; $i ++ ):
			$artist = get_term( $selectedDomesticArtist[ $i ] );
			$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );
			?>
            <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                <div class="content-box">
                    <div class="cont-feature-icon">
                        <div class="image-feature">
                            <img src="<?= $artistImage ? $artistImage['url'] : '' ?>" alt="<?= $artist->name ?>">
                        </div>

                        <a href="#" class="triangle-right">
                            <img style="width: 24px !important; height: auto !important;"
                                 src="<?= DF_IMAGE . '/icon/arrow-right-btn.png'; ?>" alt="icon-arrow"/>
                        </a>
                    </div>
                    <div class="name text-decoration-none">
                        <a href="#"><?= $artist->name ?></a>
                    </div>
                </div>
            </div>
		<?php endfor; ?>
        <div class="domestic-artist-label"><?= __('Domestic') ?></div>
    </div>
<?php endif; ?>

<?php $selectedInternationalArtistList = get_field( 'homepage_international_artist_list', $args['page_id'] );
if ( ! empty( $selectedInternationalArtistList ) ): ?>
    <div class="international-artist-list">
        <div class="international-artist-label"><?= __('International') ?></div>
		<?php
		for ( $i = 0; $i < 3; $i ++ ):
			$artist = get_term( $selectedInternationalArtistList[ $i ] );
			$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );
			?>
            <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                <div class="content-box">
                    <div class="cont-feature-icon">
                        <div class="image-feature">
                            <img src="<?= $artistImage ? $artistImage['url'] : '' ?>" alt="<?= $artist->name ?>">
                        </div>

                        <a href="#" class="triangle-right">
                            <img style="width: 24px !important; height: auto !important;"
                                 src="<?= DF_IMAGE . '/icon/arrow-right-btn.png'; ?>" alt="icon-arrow"/>
                        </a>
                    </div>
                    <div class="name text-decoration-none">
                        <a href="#"><?= $artist->name ?></a>
                    </div>
                </div>
            </div>
		<?php endfor;
		?>
    </div>
<?php endif; ?>
