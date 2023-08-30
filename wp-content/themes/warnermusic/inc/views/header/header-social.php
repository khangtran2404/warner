<?php
$group_social = get_field('header_warner','option');
$socials = $group_social['social_network'];
if(!is_null($socials)) {
    foreach($socials as $social) {
        $icon = $social['icon'];
        $link_icon = $social['link'];?>
        <li class="item-social"><a href="<?= $link_icon;?>" target="_blank"><?= $icon;?></a></li>
        <?php
    }
}
?>