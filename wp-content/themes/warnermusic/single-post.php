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
	<div class="single-post-template padding-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-12 col-12">
					<article class="main-single-post">
						<div class="float-right main-image main-image-desktop image-no-spuare-4-3">
							<img src="<?= get_the_post_thumbnail_url() ?>" alt="news-thumbnail">
						</div>
						<h1 class="font-global main-title-small"><?= get_the_title() ?></h1><br>
						<p class="publish-date"><?= get_the_date( 'd/m/Y' ) ?></p>
						<p class="hiden-on-mobile "></p>
						<div class="float-right main-image main-image-mobile image-no-spuare-4-3">
							<img src="<?= get_the_post_thumbnail_url() ?>" alt="news-thumbnail">
						</div>
						<div class="main-content">
							<?php the_content() ;?>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-5 col-sm-12 col-12 col-sticky">
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

								if ( $related_posts->have_posts() ) {?>
                                    <h2 class="small-title font-global"><?= __('Related News');?></h2>
									<div class="list-related">
									<?php while ( $related_posts->have_posts() ) :
										$related_posts->the_post(); ?>
										<div class="related-news-item related-item">
											<a href="<?= get_the_permalink();?>">
												<div class="thumbnail image-no-spuare-3-4">
													<img src="<?= get_the_post_thumbnail_url() ?>" alt="related-news-item">
												</div>
												<div class="group-cont-text">
													<div class="title"><?= get_the_title() ?></div>
													<div class="publish-date"><?= get_the_date( 'd/m/Y' ) ?></div>
												</div>
											</a>
										</div>
									<?php endwhile;
									wp_reset_postdata();?>
									</div><?php
								}
							}
							?>
						</div>
						<div class="related-artists">
							<?php
							if ( $terms ) {
                                $termPool = [];
                                ?>
                                <h2 class="small-title font-global"><?= __('Related Artists');?></h2>
								<div class="list-related">
								<?php foreach ( $terms as $term ) {
									$parentTerm = wp_get_term_taxonomy_parent_id( $term, 'artist' );
									$childTerms = get_term_children( $parentTerm, 'artist' );
									if ( $childTerms ) {
										foreach ( $childTerms as $childTerm ):
                                            if ( in_array( $childTerm, $termPool, true ) ){
                                                continue;
                                            }
											$termPool[] = $childTerm;
											$childTermData = get_term( $childTerm );
											$artistUrl = get_term_link($childTerm,'artist');
											$artistImageUrl = get_field( 'artist_image', 'artist_' . $childTerm );
											$artistParentSlug = get_term($childTerm)->slug;
											?>
											<div class="related-artist-item related-item">
												<a href="<?= $artistUrl ?>">
													<div class="thumbnail image-no-spuare-3-4">
														<img src="<?= $artistImageUrl['url'] ?>" alt="related-artist-item">
													</div>
													<div class="name-related">
														<?= $childTermData->name ?>
													</div>
												</a>
											</div>
										<?php endforeach;
									}
								}
								?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
<?php endwhile; // End of the loop.

get_footer();
