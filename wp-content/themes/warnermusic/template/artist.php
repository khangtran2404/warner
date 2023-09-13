<?php
/**
 * Template name: Artist Page (Warnermusic)
 */

get_header();
?>
    <div>
        <div class="filter-section">
            <ul class="filter-list">
                <li class="all active" data-id="all"><?= __( 'All Artist' ) ?></li>
                <li class="international" data-id="international"><?= __( 'Intl Artists' ) ?></li>
                <li class="domestic" data-id="domestic"><?= __( 'Domestic Artists' ) ?></li>
                <li class="domestic-exclusive"
                    data-id="domestic-exclusive"><?= __( 'Domestic Exclusive Distribution' ) ?></li>
            </ul>
        </div>
        <div class="artist-list-section">
			<?php
			$artists = get_terms( array(
				'taxonomy'   => 'artist',
				'hide_empty' => false,
			) );
			foreach ( $artists as $artist ):
                if (empty($artist->parent)) continue;
                $artistUrl = get_term_link($artist->term_id,'artist');
				$artistImageUrl = get_field( 'artist_image', 'artist_' . $artist->term_id );
                $artistParentSlug = get_term($artist->parent)->slug;
				?>
                <div class="artist-item artist-parent-<?= $artistParentSlug ?> artist-item-<?= $artist->term_id ?>">
                    <a href="<?= $artistUrl ?: '#' ?>">
                        <img src="<?= $artistImageUrl ?: '' ?>" alt="artist-image">
                        <div class="artist-title"><?= $artist->name ?></div>
                    </a>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
<?php
get_footer();
