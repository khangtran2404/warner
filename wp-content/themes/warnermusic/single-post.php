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
    <article>
        <h1><?= get_the_title() ?></h1>
        <div class="publish-date">
			<?= get_the_date( 'd/m/Y' ) ?>
        </div>
        <div class="thumbnail">
            <img src="<?= get_the_post_thumbnail_url() ?>" alt="news-thumbnail">
        </div>
        <div class="main-content">
			<?= get_the_content() ?>
        </div>
    </article>
    <div class="sidebar">
        <div class="related-news">
			<?php
			$terms = wp_get_post_terms( get_the_ID(), 'artist', array( 'fields' => 'ids' ) );
			if ( ! empty( $terms ) ) {
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 5,
					'tax_query'      => array(
						array(
							'taxonomy' => 'artist',
							'field'    => 'id',
							'terms'    => $terms,
						),
					),
					'post__not_in'   => array( get_the_ID() ),
				);

				$related_posts = new WP_Query( $args );

				if ( $related_posts->have_posts() ) {
					while ( $related_posts->have_posts() ) :
						$related_posts->the_post(); ?>
                        <a href="<?= get_the_permalink() ?>">
                            <div class="related-news-item">
                                <img class="thumbnail" src="<?= get_the_post_thumbnail_url() ?>"
                                     alt="related-news-item">
                                <div class="title"><?= get_the_title() ?></div>
                                <div class="publish-date"><?= get_the_date( 'd/m/Y' ) ?></div>
                            </div>
                        </a>
					<?php endwhile;
					wp_reset_postdata();
				}
			}
			?>
        </div>
        <div class="related-artists">
			<?php
			if ( $terms ) {
				foreach ( $terms as $term ) {
					$parentTerm = wp_get_term_taxonomy_parent_id( $term, 'artist' );
					$childTerms = get_term_children( $parentTerm, 'artist' );
					if ( $childTerms ) {
						foreach ( $childTerms as $childTerm ):
							$childTermData = get_term( $childTerm );
							$artistUrl = get_term_link($childTerm,'artist');
							$artistImageUrl = get_field( 'artist_image', 'artist_' . $childTerm );
							$artistParentSlug = get_term($childTerm)->slug;
							?>
                            <a href="<?= $artistUrl ?>">
                                <div class="related-artist-item">
                                    <img src="<?= $artistImageUrl ?>" alt="related-artist-item">
                                    <div class="title"><?= $childTermData->name ?></div>
                                </div>
                            </a>
						<?php endforeach;
					}
				}
			}
			?>
        </div>
    </div>
<?php endwhile; // End of the loop.

get_footer();
