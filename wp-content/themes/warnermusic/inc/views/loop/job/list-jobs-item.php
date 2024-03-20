<?php
$jobClassStr = '';
$jobTeams    = get_the_terms( get_the_ID(), 'job-team' );
$teamIds     = [];
$typeLabel   = '';
if ( $jobTeams ) {
	foreach ( $jobTeams as $term ) {
		$teamIds[] = 'term-' . $term->term_id;
	}
}
$jobTeams = implode( ' ', $teamIds );
if ( $jobTeams ) {
	$jobClassStr .= $jobTeams;
}
if ( isset( get_field( 'job_type' )['value'] ) ) {
	$jobClassStr .= ' type-' . get_field( 'job_type' )['value'];
	$typeLabel   = get_field( 'job_type' )['value'];
}
if ( $args['counter-index'] <= 3 ) {
	$jobClassStr .= ' new';
}
?>

<div class="jobs-item gird-item-no-square <?= $jobClassStr ?>">
    <div class="content-box">
        <a href="<?= get_permalink() ?>">
            <div class="group-content">
                <div class="location"><?= get_field( 'job_location' ) ?></div>
                <div class="type"><?= $typeLabel ?></div>
                <div class="title"><?= get_the_title() ?></div>
                <div class="excerpt"><?= get_the_excerpt() ?>
                </div>
            </div>
            <div class="jobs-item block-card-item <?= $jobClassStr ?> mb-3 wow fadeIn" data-wow-delay="0.5s">
                <a class="link-overlay" href="<?= get_permalink() ?>" title="<?= get_the_title() ?>"></a>
				<?php if ( $args['counter-index'] <= 3 ): ?>
                    <div class="tag-new"><?= __( 'NEW' ) ?></div>
				<?php endif; ?>
                <div class="group-location-type">
                    <div class="type group-item"><?= $typeLabel ?></div>
                    <div class="location group-item d-flex align-items-center">
                        <img width="20" src="<?= DF_IMAGE . '/icon/icon-location-black.png'; ?>" alt="location warner">
                        <span class="pl-1"><?= get_field( 'job_location' ) ?></span>
                    </div>
                </div>
                <div class="title-link">
                    <a href="<?= get_permalink() ?>" title="<?= get_the_title() ?>">
						<?= get_the_title() ?>
                    </a>
                </div>
                <div class="excerpt"><?= get_the_excerpt() ?></div>
            </div>
        </a>
    </div>
</div>