<?php
$playlistItems = get_field('homepage_playlist_item_group',$args['page_id']);
if ($playlistItems){
	foreach ($playlistItems as $playlistItem){
		?>
		<div class="playlist-item">
			<div class="content-box">
				<?php
				echo $playlistItem;
				?>
			</div>
		</div>
		<?php
	}
}