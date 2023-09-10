<?php $selectedDomesticArtist = get_field( 'homepage_domestic_artist_list', $args['page_id'] );
if ( ! empty( $selectedDomesticArtist ) ): ?>
    <div class="domestic-artist-list active">
		<?php
        foreach ($selectedDomesticArtist as $item ):
	        $artist = get_term( $item );
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
        <?php endforeach; ?>
        <div class="domestic-artist-label"><?= __('Domestic') ?></div>
    </div>
<?php endif; ?>

<?php $selectedInternationalArtistList = get_field( 'homepage_international_artist_list', $args['page_id'] );
if ( ! empty( $selectedInternationalArtistList ) ): ?>
    <div class="international-artist-list">
        <div class="international-artist-label"><?= __('International') ?></div>
	    <?php
	    foreach ($selectedInternationalArtistList as $item ):
		    $artist = get_term( $item );
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
	    <?php endforeach; ?>
    </div>
<?php endif; ?>