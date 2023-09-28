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
	the_post();
	$socialLinks = get_field( 'song_media_links', get_the_ID() );
	$thumbnail   = get_the_post_thumbnail_url();
	$title       = get_the_title();
	$artists     = wp_get_post_terms( get_the_ID(), 'artist', array( 'fields' => 'ids' ) );
	if ( isset( $artists ) ) {
		$artistId    = $artists[0];
		$artistLabel = get_term( $artistId )->name;
		$artistUrl   = get_term_link( $artistId, 'artist' );
	}

	?>
    <article>
		<?php if ( $socialLinks ) {
			foreach ( $socialLinks as $key => $socialLink ): if ( ! empty( $socialLink ) ):
				$pattern = '/song_(.*)_link/';
				preg_match( $pattern, $key, $matches )
				?>
                <div class="social-link-item <?= $matches[1] ?>">
                    <a href="<?= $socialLink ?>">
                        <button><i class="fa-brands fa-apple"></i><?= $matches[1] ?></button>
                    </a>
                </div>
			<?php endif; endforeach;
		} ?>
        <div class="song-thumbnail"><img src="<?= $thumbnail ?>" alt="song-detail-thumbnail"></div>
        <div class="title"><?= $title; ?></div>
        <div class="artist">
			<?php
			if ( isset( $artistId ) ):?>
                <a href="<?= $artistUrl ?>"><?= $artistLabel ?></a>
			<?php endif; ?>
        </div>
    </article>
<?php endwhile; // End of the loop.

get_footer();
