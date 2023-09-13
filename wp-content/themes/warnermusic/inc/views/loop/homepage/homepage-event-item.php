<?php
$artists = get_terms( array(
	'taxonomy'   => 'artist',
	'hide_empty' => false,
));
if ( ! empty( $artists ) && ! is_wp_error( $artists ) ):?>
	<div class="list-nav-artist-img">
		<?php
		foreach ( $artists as $key=>$artist ):
            if ($artist->parent == 0){
                continue;
            }
			if($key > 3) {
				break;
			}
			$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );?>
			<div class="data-image" type="hidden" hidden="hidden" data-img="<?= $artistImage['url'] ?>"></div>
			<img src="<?= $artistImage['url'] ?>" alt="">
		<?php endforeach;?>
	</div>
	<div class="list-event">
		<?php
		foreach ( $artists as $key=>$artist ):
			if ($artist->parent == 0){
				continue;
			}
			if($key > 3) {
				break;
			}?>
			<div class="group-events-item">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 col-12">
						<div class="group-col">
							<div class="name text-decoration-none"><a href="#"><?= $artist->name ?></a></div>
						</div>
					</div>
					<div class="col-lg-8 col-md-12 col-sm-12 col-12">
						<div class="event-artist event-artist-id<?= $artist->term_id ?>-list">
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
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>



