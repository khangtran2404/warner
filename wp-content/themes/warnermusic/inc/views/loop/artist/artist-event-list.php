<div class="event-artist event-artist-id<?= $args['artist_id'] ?>-list">
    <?php $args = array(
        'post_type' => 'event',
        'tax_query' => array(
            array(
                'taxonomy' => 'artist',
                'field'    => 'term_id',
                'terms'    => $args['artist_id'],
            ),
        ),
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_type' => 'DATETIME',
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



