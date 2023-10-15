<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<?php
$searchQuery  = get_search_query();
$results      = get_posts();
$artist_terms = get_terms( array(
	'taxonomy'   => 'artist',
	'hide_empty' => false,
	'search'     => $searchQuery,
) );

if ( ! empty( $artist_terms ) && ! is_wp_error( $artist_terms ) ) {
	foreach ( $artist_terms as $term ) {
		if ( $term->parent !== 0 ) {
			array_unshift( $results, $term );
		}
	}
}

$partner_terms = get_terms( array(
	'taxonomy'   => 'partner',
	'hide_empty' => false,
	'search'     => $searchQuery,
) );

if ( ! empty( $partner_terms ) && ! is_wp_error( $partner_terms ) ) {
	foreach ( $partner_terms as $term ) {
		if ( $term->parent !== 0 ) {
			array_unshift( $results, $term );
		}
	}
}

?>
    <div id="site-about-page" class="site-about-page padding-page">
        <div class="container">
            <h1 class="main-title"><?= __( 'Search results' ) ?></h1>
            <div class="main-content">
				<?php
				echo 'We found <span class="color-main">'.count($results).'</span> ';
				printf(
				/* translators: %s: Search term. */
					esc_html__( 'results for "%s"', 'twentytwentyone' ),
					'<span class="page-description search-term color-main">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
                <div class="separator-left-warner"></div>
            </div>
            <div class="list-layout-warner-4-no-slider post-list-pagination" id="search-results">
		        <?php
		        if ( ! empty( $results ) ):
			        foreach ( $results as $item ):
				        if ( is_a( $item, 'WP_Post' ) ): ?>
                            <div class="search-item gird-item-no-square">
                                <div class="content-box">
                                    <div class="group-content">
                                        <a class="link-box" href="<?= get_the_permalink( $item->ID ) ?>"></a>
                                        <div class="image-feature aspect-ratio-warner aspect-ratio-3-4"
                                             style="background-image: url('<?= get_the_post_thumbnail_url( $item->ID ) ?>')"></div>
                                        <div class="name"><?= get_the_title( $item->ID ) ?></div>
                                    </div>
                                </div>
                            </div>
				        <?php endif;
				        if ( is_a( $item, 'WP_Term' ) ): ?>
                            <div class="search-item gird-item-no-square">
                                <div class="content-box">
                                    <div class="group-content">
                                        <a class="link-box"
                                           href="<?= get_term_link( $item->term_id, 'artist' ) ?>"></a>
                                        <div class="image-feature aspect-ratio-warner aspect-ratio-3-4"
                                             style="background-image: url('<?= get_field( 'artist_image', 'artist_' . $item->term_id ) ? get_field( 'artist_image', 'artist_' . $item->term_id )['url'] : DF_IMAGE.'/noimage.png' ?>')"></div>
                                        <div class="name"><?= $item->name ?></div>
                                    </div>
                                </div>
                            </div>
				        <?php endif;

			        endforeach;
		        endif;
		        ?>
            </div>
            <div id="pagination">
            </div>
        </div>
    </div>
<?php get_footer();
