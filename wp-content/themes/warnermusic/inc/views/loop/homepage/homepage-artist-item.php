<?php
$selectedArtistList = get_field('artist_homepage_list',$args['page_id']);
for ($i = 0; $i < 3; $i++){
	$artist = get_term($selectedArtistList[$i]);
	$artistImage = get_field( 'artist_image', 'artist_' . $artist->term_id );
	?>
	<div class="artist-item gird-item-no-square homepage-artist-item-<?= $artist->term_id ?>">
		<div class="content-box">
			<div class="cont-feature-icon">
				<div class="image-feature">
					<img src="<?= $artistImage ? $artistImage['url'] : ''?>" alt="<?= $artist->name ?>">
				</div>
				
				<a href="#" class="triangle-right">
					<img style="width: 24px !important; height: auto !important;" src="<?= DF_IMAGE .'/icon/arrow-right-btn.png';?>" alt="icon-arrow"/>
				</a>
			</div>
			<div class="name text-decoration-none">
				<a href="#"><?= $artist->name ?></a>
			</div>
		</div>
	</div>
<?php }