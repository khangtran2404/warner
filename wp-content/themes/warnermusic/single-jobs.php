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
    <div class="single-post-template single-job-template padding-page">
        <div class="hero-heading">
            <div class="container">
                <div class="heading-group-link">
                    <?php
                        if(get_field('details_job','option')['back_to_the_parent_page']) {
                            echo '<div class="back-to-parent"><a href="' . esc_url(get_field('details_job','option')['back_to_the_parent_page']) . '">'. __('BACK').'</a></div>';
                        }
                    ?>
                    <h1 class="primary-title"><?= get_the_title() ?></h1>
                </div>
                <div class="apply-job-section">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyJobModal">
                        <?= __( "Apply" ) ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="information-section">
                <div class="type"><?= get_field( 'job_type' )['label'] ?></div>
                <div class="date-period"><?= calculatePeriodTime( get_the_date() ) ?></div>
                <div class="location"><?= get_field( 'job_location' ) ?></div>
                <div class="expire-date"><?= __("Expiry date: ");?><?= get_field( 'job_expire_date' ) ?></div>
            </div>
            <div class="content-section main-content">
                <?php the_content() ;?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-apply-job" id="applyJobModal" tabindex="-1" aria-labelledby="applyJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="primary-title sync-name-job-cf7"><?= get_the_title() ?></h1>
                </div>
                <!-- details \wp-content\themes\warnermusic\inc\views\wpcf7-soure\apply-job -->
                <?php
                    // includes modal body + footer
                    $applyForm = get_field('details_job','option')['apply_form_shortcode'];
                    if ($applyForm){
                        echo do_shortcode($applyForm);
                    }
                ?>
                <script>
                    jQuery(document).ready(function() {
                        let titleJob = jQuery(".sync-name-job-cf7").html();
                        let valueCf7 = jQuery("#apply-job-sync");
                    
                        valueCf7.val(titleJob);
                    });
                </script>
            </div>
        </div>
    </div>
<?php endwhile; // End of the loop.

get_footer();

function calculatePeriodTime( $time ): string {
	$period_text = '';
	if ( $time ) {
		$modified_time = strtotime( $time );
		$current_time  = current_time( 'timestamp' );
		$time_diff     = $current_time - $modified_time;

		if ( $time_diff < 3600 ) {
			$period_text = floor( $time_diff / 60 ) . " minutes ago";
		} elseif ( $time_diff < 86400 ) {
			$period_text = floor( $time_diff / 3600 ) . " hours ago";
		} elseif ( $time_diff < 2592000 ) {
			$period_text = floor( $time_diff / 86400 ) . " days ago";
		} else {
			$period_text = floor( $time_diff / 2592000 ) . " months agao";
		}
	}

	return $period_text;
}