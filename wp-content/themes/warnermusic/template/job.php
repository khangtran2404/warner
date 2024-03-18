<?php
/**
 * Template name: Job Page (Warnermusic)
 */

get_header();
?>

<?php
$queryJobArgs = array(
	'post_status'    => 'publish',
	'post_type'      => 'jobs',
	'posts_per_page' => - 1,
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$jobsList     = new WP_Query( $queryJobArgs );
$jobTeams     = get_terms( 'job-team', [ 'hide_empty' => false ] );
$jobTypes     = get_field_object( 'field_65f6cd346cdfd' );
?>
    <div id="site-job-page" class="site-job-page layout-filter-side-bar padding-page">
        <div class="container">
            <h1 class="primary-title">
                <span><?php echo get_the_title(); ?></span>
                <span class="count-job">( <?= $jobsList->post_count ?> )</span>
            </h1>
            <div class="main-content"><?php the_content(); ?></div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12 col-sticky">
                    <div class="col-sticky">
                        <div class="search-section">
                            <label for="search-job-opening">
                                <input id="search-job-opening" type="search"
                                       placeholder="What job are you looking for ?">
                            </label>
                        </div>
                        <div class="filter-section">
                            <div class="dropdown-multi-checkbox">
                                <button class="dropdown-toggle" type="button" id="dropdownFilterCheckbox_0">
									<?= __( 'By Team' ) ?>
                                </button>
                                <div class="dropdown-menu filter-job-team" aria-labelledby="dropdownFilterCheckbox_0">
                                    <form class="dropdown-form">
										<?php
										if ( $jobTeams ): foreach ( $jobTeams as $team ): ?>
                                            <div class="checkbox">
                                                <input type="checkbox" id="<?= $team->term_id ?>"
                                                       name="<?= $team->term_id ?>">
                                                <label for="<?= $team->term_id ?>"><?= $team->name ?></label>
                                            </div>
										<?php endforeach; endif; ?>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown-multi-checkbox">
                                <button class="dropdown-toggle" type="button" id="dropdownFilterCheckbox_0">
									<?= __( 'By Type' ) ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownFilterCheckbox_0">
                                    <form class="dropdown-form">
										<?php
										if ( isset( $jobTypes['choices'] ) ): foreach ( $jobTypes['choices'] as $key => $typeLabel ): ?>
                                            <div class="checkbox">
                                                <input type="checkbox" id="<?= $key ?>" name="<?= $key ?>">
                                                <label for="<?= $key ?>"><?= $typeLabel ?></label>
                                            </div>
										<?php endforeach; endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="group-checkbox-tags">
                        <div class="checkbox-tags">
                            <!-- Tags will be dynamically added here -->
                        </div>
                        <button class="clear-checkbox-tags">Clear all tags</button>
                    </div>
                    <div class="job-list-section list-layout-block-card">
						<?php
						if ( $jobsList->have_posts() ) :
                            $countIndex = 0;
							while ( $jobsList->have_posts() ) : $jobsList->the_post();
                                $countIndex ++;
								get_template_part( 'inc/views/loop/job/list', 'jobs-item', array('counter-index' => $countIndex ));
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
