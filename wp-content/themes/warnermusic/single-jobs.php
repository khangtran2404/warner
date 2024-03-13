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
    <div class="taxonomy-singer-template single-job-post-template">
        <div class="title">
            <h1><?= get_the_title() ?></h1>
        </div>
        <div class="apply-job-section">
            <button><?= "Apply" ?></button>
        </div>
        <div class="information-section">
            <div class="type"><?= "fulltime" ?></div>
            <div class="date-period"><?= "posted yesterday" ?></div>
            <div class="location"><?= "GBR-27 WrightsLan - London" ?></div>
            <div class="expire-date"><?= "Expiry date: 30 April 2024" ?></div>
        </div>
        <div class="content-section">
            <div class="title">
                <h3>
					<?= "Job Description" ?>
                </h3>
            </div>
            <div class="content"><?= get_the_content() ?></div>
        </div>
    </div>
<?php endwhile; // End of the loop.

get_footer();
