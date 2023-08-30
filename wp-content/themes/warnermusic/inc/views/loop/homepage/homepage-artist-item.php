<?php
$selectedArtistList = get_field('artist_homepage_list',$args['page_id']);
for ($i = 0; $i < 3; $i++){
	$artist = get_term($selectedArtistList[$i]);
	$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );
	?>
	<div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
		<div class="content-box">
			<div class="image-feature">
				<a href="#">
					<img src="<?= $artistImage ? $artistImage['url'] : ''?>" alt="<?= $artist->name ?>">
				</a>
			</div>
			<div class="name" class="text-decoration-none">
				<a href="#"><?= $artist->name ?></a>
			</div>
		</div>
	</div>
<?php }