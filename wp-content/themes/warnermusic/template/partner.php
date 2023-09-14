<?php
/**
 * Template name: Partner Page (Warnermusic)
 */

get_header();
?>
    <div id="site-artist-page" class="site-artist-page layout-filter-side-bar padding-page">
        <div class="container">
			<?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
            <div class="main-content"><?php the_content(); ?></div>
            <div class="row">
                <div class="col-lg-3 col-sticky">
                    <div class="col-sticky">
                        <div class="filter-section">
                            <ul class="filter-list list-filter-artist list-filter-group">
								<?php
								$partnerArtists    = get_posts( array(
									'post_type'   => 'partner_artist',
									'numberposts' => - 1,
								) );
								$partnerArtistsIds = wp_list_pluck( $partnerArtists, 'ID' );
								$partners          = get_terms( array(
									'taxonomy'   => 'partner',
									'object_ids' => $partnerArtistsIds
								) );
								if ( ! empty( $partners ) ):
									foreach ( $partners as $key => $partner ):?>
                                        <li class="<?= $partner->slug ?> <?= ($key === 0) ? 'active' : '' ?> item-filter"
                                            data-id="<?= $partner->slug ?>"><?= $partner->name ?></li>
									<?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="partner-artist-description">
						<?php
						if ( ! empty( $partners ) ):
							foreach ( $partners as $partner ):?>
                                <div class="desc-content filter-item term-<?= $partner->slug ?>">
                                    <?= $partner->description ?>
                                </div>
							<?php endforeach;
						endif; ?>
                    </div>
                    <div class="artist-list-section list-layout-warner-3-no-slider">
						<?php
						$args      = array(
							'post_status'    => 'publish',
							'post_type'      => 'partner_artist',
							'posts_per_page' => - 1,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();
								get_template_part( 'inc/views/loop/partner-artist/list', 'partner-artist-item' );
							endwhile;
							wp_reset_postdata();
						endif;
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
