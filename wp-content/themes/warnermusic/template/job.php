<?php
/**
 * Template name: Job Page (Warnermusic)
 */

get_header();
?>
    <div id="site-job-page" class="site-job-page layout-filter-side-bar padding-page">
        <div class="container">
			<h1 class="primary-title">
				<span><?php echo get_the_title(); ?></span>
				<span class="count-job">(20)</span>
			</h1>
            <div class="main-content"><?php the_content(); ?></div>
            <div class="row">
                <div class="col-lg-4 col-sticky">
                    <div class="col-sticky">
						<div class="search-section">
							<label for="search-job-opening">
								<input id="search-job-opening" type="search" placeholder="What job are you looking for ?">
							</label>
						</div>
                        <div class="filter-section">
                            <!-- <ul class="filter-list list-filter-job list-filter-group">
								<?php
								$jobs    = get_posts( array(
									'post_type'   => 'jobs',
									'numberposts' => - 1,
								) );
                                ?>
                            </ul> -->
							<div class="dropdown-multi-checkbox">
								<button class="dropdown-toggle" type="button" id="dropdownFilterCheckbox_0">
									Select options
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownFilterCheckbox_0">
									<form class="dropdown-form">
									<div class="checkbox">
										<input type="checkbox" id="option1" name="option1">
										<label for="option1">Option 1</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="option2" name="option2">
										<label for="option2">Option 2</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="option3" name="option3">
										<label for="option3">Option 3</label>
									</div>
									<div class="checkbox">
										<input type="checkbox" id="option4" name="option4">
										<label for="option4">Option 4</label>
									</div>
									</form>
								</div>
							</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
					<div class="group-checkbox-tags">
						<div class="checkbox-tags">
							  <!-- Tags will be dynamically added here -->
						</div>
						<button class="clear-checkbox-tags">Clear all tags</button>
					</div>
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
