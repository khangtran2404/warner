<?php
/**
 * Template name: Event Page (Warnermusic)
 */

get_header();
?>
<div id="site-events-page" class="site-events-page padding-page">
	<div class="container">
		<?php the_title( '<h1 class="main-title">', '</h1>' );?>
		<div class="main-content"><?php the_content();?></div>
		<div class="events-page">
			<?php
			$events = get_posts(array(
				'post_type' => 'event',
				'numberposts' => -1,
			));
			$event_ids = wp_list_pluck($events, 'ID');
			$artists = get_terms( array(
				'taxonomy'   => 'artist',
				'object_ids' => $event_ids
			));
			if ( ! empty( $artists ) && ! is_wp_error( $artists ) ):?>
				<div class="list-nav-artist-img 
					<?php if(count($events) > 4) {
						echo 'list-nav-sliderSyncing-infinity';
					} else {
						echo 'list-nav-sliderSyncing';
					};?>
				">
					<?php
					foreach ( $artists as $key=>$artist ):
						if ($artist->parent == 0){
							continue;
						}
						$artistImage = get_field( 'artist_event_image', 'artist_' . $artist->term_id );?>
						<div class="list-nav-item-artist gird-item-three-per-two">
							<div class="content-box">
								<div class="group-content">
									<div class="image-feature aspect-ratio-warner aspect-ratio-2-3"
										style="background-image: url('<?= $artistImage ?: '' ?>')"></div>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				</div>
				<div class="list-event <?php if(count($events) > 4) {
						echo 'list-main-sliderSyncing-infinity';
					} else {
						echo 'list-main-sliderSyncing';
					};?>
				">
					<?php
					foreach ( $artists as $key=>$artist ):
						if ($artist->parent == 0){
							continue;
						}?>
						<div class="group-events-item">
							<div class="row">
								<div class="col-lg-4 col-md-12 col-sm-12 col-12">
									<div class="group-col">
										<div class="name text-decoration-none"><?= $artist->name ?></div>
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
								</div>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<?php
get_footer();
