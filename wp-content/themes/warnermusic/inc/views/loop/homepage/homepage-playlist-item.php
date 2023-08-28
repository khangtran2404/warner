<?php
$playlistItems = get_field('homepage_playlist_item_group',$args['page_id']);
if ($playlistItems){
	foreach ($playlistItems as $playlistItem){
		echo $playlistItem;
	}
}