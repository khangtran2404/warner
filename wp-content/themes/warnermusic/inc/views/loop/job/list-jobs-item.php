<?php
$jobClassStr = '';
$jobTeams    = get_the_terms( get_the_ID(), 'job-team' );
$teamIds     = [];
if ( $jobTeams ) {
	foreach ( $jobTeams as $term ) {
		$teamIds[] = 'term-' . $term->term_id;
	}
}
$jobTeams = implode( ' ', $teamIds );
if ( $jobTeams ) {
	$jobClassStr .= $jobTeams;
}
if ( get_field( 'job_type' ) ) {
	$jobClassStr .= ' type-' . get_field( 'job_type' );
}
?>
<div class="jobs-item gird-item-no-square <?= $jobClassStr ?>">
    <div class="content-box">
        <a href="<?= get_permalink() ?>">
            <div class="group-content">
                <div class="location"><?= get_field( 'job_location' ) ?></div>
                <div class="type"><?= get_field( 'job_type' ) ?></div>
                <div class="title"><?= get_the_title() ?></div>
                <div class="excerpt"><?= get_the_excerpt() ?>
                </div>
            </div>
        </a>
    </div>
</div>