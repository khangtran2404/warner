<?php
$selectedArtistList = get_field('artist_homepage_list',$args['page_id']);
for ($i = 0; $i < 3; $i++){
	$artist = get_term($selectedArtistList[$i]);
	$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );
	?>
	<div class="artist-item homepage-artist-item-<?= $artist->term_id ?>">
		<a href="#">
			<div class="image"><img src="<?= $artistImage ? $artistImage['url'] : ''?>" alt="<?= $artist->name ?>"></div>
			<div class="name"><?= $artist->name ?></div>
		</a>
	</div>
<?php }