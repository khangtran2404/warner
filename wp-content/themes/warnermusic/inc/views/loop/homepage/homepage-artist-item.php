<?php $selectedDomesticArtist = get_field( 'homepage_domestic_artist_list', $args['page_id'] );
if ( ! empty( $selectedDomesticArtist ) ): ?>
    <div class="group-action-filter domestic-artist-list active" data-id="domestic-artist-list">
        <div class="artist-list-layout list-layout-warner-3">
            <?php
            for ( $i = 0, $iMax = count( $selectedDomesticArtist ); $i < $iMax; $i ++ ):
                $artist = get_term( $selectedDomesticArtist[ $i ] );
                $artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id ); ?>
                <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                    <div class="content-box">
                        <div class="group-content">
                            <a class="link-box" href="<?= get_term_link($artist->term_id,'artist');?>"></a>
                            <div class="image-feature"
                                style="background-image: url('<?= $artistImage ? $artistImage['url'] : '' ?>')"></div>
                            <div class="name text-decoration-none"><?= $artist->name ?></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php endif; ?>

<?php $selectedInternationalArtistList = get_field( 'homepage_international_artist_list', $args['page_id'] );
if ( ! empty( $selectedInternationalArtistList ) ): ?>
    <div class="group-action-filter international-artist-list" data-id="international-artist-list">
        <div class="artist-list-layout list-layout-warner-3">
            <?php
            for ( $i = 0, $iMax = count( $selectedInternationalArtistList ); $i < $iMax; $i ++ ):
                $artist = get_term( $selectedInternationalArtistList[ $i ] );
                $artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id ); ?>
                <div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
                    <div class="content-box">
                        <div class="group-content">
                            <a class="link-box" href="<?= get_term_link($artist->term_id,'artist');?>"></a>
                            <div class="image-feature"
                                style="background-image: url('<?= $artistImage ? $artistImage['url'] : '' ?>')"></div>
                            <div class="name text-decoration-none"><?= $artist->name ?></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php endif; ?>