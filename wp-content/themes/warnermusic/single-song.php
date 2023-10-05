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
	$title = get_the_title();
	$artists = wp_get_post_terms( get_the_ID(), 'artist', array( 'fields' => 'ids' ) );
	if ( isset( $artists ) ) {
		$artistId    = $artists[0];
		$artistLabel = get_term( $artistId )->name;
		$artistUrl   = get_term_link( $artistId, 'artist' );
	} ?>
	<div class="song-detail-template">
		<div class="container">
			<div class="single-song-row">
				<div class="song-thumbnail">
					<img class="image-square" src="<?= $thumbnail ?>" alt="song-detail-thumbnail">
				</div>
				<div class="group-lists-social-link">
					<div class="infor-head">
						<h1 class="main-title"><?= $title;?></h1>
						<?php if ( isset( $artistId ) ):?>
							<a class="artist-link" href="<?= $artistUrl ?>"><?= $artistLabel ?></a>
						<?php endif; ?>
					</div>
					<div class="plataformas">
						<ul class="lists-social-link">
						<?php if ( $socialLinks ) {
							foreach ( $socialLinks as $key => $socialLink ): if ( ! empty( $socialLink ) ):
								$pattern = '/song_(.*)_link/';
								preg_match( $pattern, $key, $matches )
								?>
								<li class="social-link-item <?= $matches[1] ?>">
									<a class="btn-link-social btn-<?= $matches[1];?>" href="<?= $socialLink ?>" target="_blank"></a>
								</li>
							<?php endif; endforeach;
						} ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; // End of the loop.
get_footer();
