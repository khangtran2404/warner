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
        <div class="container">
            <div class="heading-group-link">
                <?php
                    if(get_field('back_to_the_parent_page','option')) {
                        echo '<div class="back-to-parent"><a href="' . esc_url(get_field('back_to_the_parent_page','option')) . '">'. __('BACK').'</a></div>';
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
            <div class="information-section">
                <div class="type"><?= get_field( 'job_type' ) ?></div>
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
    <div class="modal fade " id="applyJobModal" tabindex="-1" aria-labelledby="applyJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 style="color: black !important"><?= get_the_title() ?></h1>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Fullname" aria-label="Fullname">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" aria-label="Email">
                        <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">CV</label>
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Online profile and portfolio" aria-label="Online profile and portfolio">
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Message" aria-label="Message"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= __('Cancel') ?></button>
                    <button type="button" class="btn btn-primary"><?= __('Submit') ?></button>
                </div>
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