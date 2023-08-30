<?php
$artists = get_terms( 'artist' );
if ( ! empty( $artists ) && ! is_wp_error( $artists ) ) {
	foreach ( $artists as $artist ) {
		$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id ); ?>
        <div class="event-artist event-artist-id-<?= $artist->term_id ?>">
            <a href="#">
                <div class="image"><img src="<?= $artistImage ?>" alt="<?= $artist->name ?>"></div>
                <div class="name"><?= $artist->name ?></div>
            </a>
        </div>
        <div class="event-list event-artist-id<?= $artist->term_id ?>-list">
			<?php $args = array(
				'post_type' => 'event',
				'tax_query' => array(
					array(
						'taxonomy' => 'artist',
						'field'    => 'slug',
						'terms'    => $artist->slug,
					),
				),
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'inc/views/loop/homepage/event/event', 'item' );
				}
				wp_reset_postdata();
			} ?>
        </div>
	<?php }
}



