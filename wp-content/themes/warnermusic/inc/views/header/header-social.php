<?php
$group_social = get_field('header_warner','option');
$socials = $group_social['social_network'];
if($socials) {
    foreach($socials as $social) {
        $icon = $social['icon'];
        $link_icon = $social['link'];?>
        <a href="<?= $link_icon;?>" target="_blank"><?= $icon;?></a>
        <?php
    }
}
?>