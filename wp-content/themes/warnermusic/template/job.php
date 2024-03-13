<?php
/**
 * Template name: Job Page (Warnermusic)
 */

get_header();
?>
    <div id="site-partners-page" class="site-partners-page layout-filter-side-bar padding-page">
        <div class="container">
			<?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
            <div class="main-content"><?php the_content(); ?></div>
            <div class="row">
                <div class="col-lg-3 col-sticky">
                    <div class="col-sticky">
                        <div class="filter-section">
                            <ul class="filter-list list-filter-job list-filter-group">
								<?php
								$jobs    = get_posts( array(
									'post_type'   => 'jobs',
									'numberposts' => - 1,
								) );
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="job-list-section list-layout-warner-3-no-slider">
						<?php
						$args      = array(
							'post_status'    => 'publish',
							'post_type'      => 'jobs',
							'posts_per_page' => - 1,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();
								get_template_part( 'inc/views/loop/job/list', 'jobs-item' );
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
