<div class="item-slider banner-song-item-<?= get_the_ID() ?>">
    <?php
    $artist = wp_get_post_terms(get_the_ID(),'artist');
    ?>
    <div class="banner-image" style="background-image: <?= get_field('song_homepage_banner_image') ?? '' ?>"></div>
    <div class="left-information">
        <div class="artist"><?= ($artist[0]) ? $artist[0]->name : '' ?></div>
        <div class="square-image" style="background-image: <?= get_field('song_homepage_square_image') ?? '' ?>"></div>
        <div class="sub-title"><?= __('Easy') ?></div>
        <div class="title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></div>
        <div class="listen-link">
            <a href="<?= get_field('song_homepage_url') ?? '#' ?>">
                <button><?= __('Listen now') ?></button>
            </a>
        </div>
    </div>
    <div class="latest-releases"><a href="<?= get_field('song_homepage_latest_releases') ?? '#' ?>"><button><?= __('Latest Releases') ?></button></a></div>
</div>