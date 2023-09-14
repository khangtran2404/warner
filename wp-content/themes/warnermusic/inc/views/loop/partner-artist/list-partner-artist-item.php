<?php
$terms = wp_get_post_terms(get_the_ID(),'partner');
$parentClass = '';
foreach ($terms as $term){
    $termSlug = $term->slug;
    $parentClass .= ' term-'.$termSlug;
}
?>
<div class="artist-item gird-item-no-square filter-item <?= $parentClass ?> artist-item-<?= get_the_ID() ?>">
    <div class="content-box">
        <div class="group-content">
            <a class="link-box" href="<?= get_the_permalink() ?: '#' ?>"></a>
            <div class="image-feature"
                 style="background-image: url('<?= get_the_post_thumbnail_url() ?>')"></div>
            <div class="name text-decoration-none"><?= get_the_title() ?></div>
        </div>
    </div>
</div>
