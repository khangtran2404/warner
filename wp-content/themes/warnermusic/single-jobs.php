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
                    <button type="button" class="btn-apply-job" data-bs-toggle="modal" data-bs-target="#applyJobModal">
                        <?= __( "Apply" ) ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="group-main-content">
                <div class="information-section">
                    <div class="col-left col-cont">
                        <div class="type group-text-icon">
                            <img width="22" src="<?= DF_IMAGE . '/icon/icon-bag.png'; ?>" alt="icon-type">
                            <span><?= get_field( 'job_type' )['label'] ?></span>
                        </div>
                        <div class="location group-text-icon">
                            <img width="22" src="<?= DF_IMAGE . '/icon/icon-location-white.png'; ?>" alt="icon-location">
                            <span><?= get_field( 'job_location' ) ?></span>
                        </div>
                    </div>
                    <div class="col-right col-cont">
                        <div class="date-period group-text-icon">
                            <img width="22" src="<?= DF_IMAGE . '/icon/icon-time.png'; ?>" alt="icon-time">
                            <span><?= calculatePeriodTime( get_the_date() ) ?></span>
                        </div>
                        <div class="expire-date group-text-icon">
                            <img width="22" src="<?= DF_IMAGE . '/icon/icon-calendar.png'; ?>" alt="icon-calendar">
                            <span><?= __("Expiry date: ");?><?= get_field( 'job_expire_date' ) ?></span>
                        </div>
                    </div>
                </div>
                <div class="content-section main-content">
                    <?php the_content() ;?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-apply-job" id="applyJobModal" tabindex="-1" aria-labelledby="applyJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="primary-title sync-name-job-cf7"><?= get_the_title() ?></h1>
                    <div type="button" class="close-modal" data-bs-dismiss="modal"><i class="fa fa-times"></i></div>        
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
                        let inputFile = jQuery(".input-group-modal-file input[type='file']");
                        let contValueFile = jQuery(".input-group-modal-file .support-format-and-value .support-cont");
                        let btnUpload = jQuery(".input-group-modal-file .btn-upload-file");

                        valueCf7.val(titleJob);
                        inputFile.on("change", function(e) {
                            let uploadedFile = e.target.files[0];
                            if(uploadedFile) {
                                contValueFile.hide();
                                contValueFile.after('<span class="name-file">'+uploadedFile.name+'</span');
                                btnUpload.html("Reupload");
                                jQuery('.custom-error-input-file').remove();
                            } else {
                                btnUpload.html("Upload");
                                contValueFile.show();
                                jQuery(".input-group-modal-file .name-file").remove();
                            }
                        });

                        function checkAndMoveErrorMessage() {
                            var errorMessage = jQuery('.input-group-modal-file .wpcf7-not-valid-tip').text();
                            if (errorMessage === 'The uploaded file is too large.') {
                                let label = jQuery('.input-group-modal-file label');
                                let errorMessageElement = jQuery('.input-group-modal-file .wpcf7-form-control-wrap').find('.wpcf7-not-valid-tip'); // Find the error message element
                                jQuery('.custom-error-input-file').remove();
                                label.after(`<span class="custom-error-input-file">Please upload files smaller than or equal to 3 MB.</span>`); 
                            } else {
                                let label = jQuery('.input-group-modal-file label');
                                let errorMessageElement = jQuery('.input-group-modal-file .wpcf7-form-control-wrap').find('.wpcf7-not-valid-tip'); // Find the error message element
                                jQuery('.custom-error-input-file').remove();
                                label.after(`<span class="custom-error-input-file">${errorMessage}</span>`); 
                            }
                        }

                        // Check for the error message when the page loads
                        checkAndMoveErrorMessage();

                        // Use MutationObserver to monitor changes in the DOM
                        var observer = new MutationObserver(function(mutationsList) {
                            mutationsList.forEach(function(mutation) {
                                if (mutation.addedNodes.length > 0 && mutation.addedNodes[0].className === 'wpcf7-not-valid-tip') {
                                    checkAndMoveErrorMessage();
                                }
                            });
                        });

                        // Start observing changes in the parent span element
                        var targetNode = document.querySelector('.input-group-modal-file .wpcf7-form-control-wrap');
                        observer.observe(targetNode, { childList: true });

                        clearOutPutWpcf7();
                        function clearOutPutWpcf7() {
                            document.addEventListener('wpcf7mailsent', function(event) {
                                jQuery(".input-group-modal-file input[type='file']").val("");
                                jQuery(".input-group-modal-file .btn-upload-file").html("Upload");
                                jQuery(".input-group-modal-file .support-format-and-value .support-cont").show();
                                jQuery(".input-group-modal-file .name-file").remove();
                                jQuery('.custom-error-input-file').remove();
                            }, false );
                            
                            document.addEventListener('wpcf7mailfailed', function(event) {
                                jQuery(".input-group-modal-file input[type='file']").val("");
                                jQuery(".input-group-modal-file .btn-upload-file").html("Upload");
                                jQuery(".input-group-modal-file .support-format-and-value .support-cont").show();
                                jQuery(".input-group-modal-file .name-file").remove();
                                jQuery('.custom-error-input-file').remove();
                            }, false );
                        }
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