<div class="item-slider banner-song-item-<?= get_the_ID() ?>">
    <?php
    $artist = wp_get_post_terms(get_the_ID(),'artist');
    ?>
    <div class="banner-image"><img src="<?= get_field('song_homepage_banner_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/></div>
    <div class="left-information hiden-on-mobile" data-animation-in="animate__fadeInLeft"  data-duration-in="0.5">
        <div class="content-group">
            <div class="content-box">
                <div class="artist"><?= ($artist[0]) ? $artist[0]->name : '' ?></div>
                <div class="square-image"><img src="<?= get_field('song_homepage_square_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/></div>
                <div class="title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></div>
            </div>
            <div class="listen-link">
                <a href="<?= get_field('song_homepage_url') ?? '#' ?>">
                    <?= __('Listen now') ?>
                    <span class="icon-play">
                        <img width="20" src="<?= DF_IMAGE .'/icon/icon-play.png';?>" alt="icon-play"/>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="left-information-mobile show-on-mobile">
        <div class="content-group">
            <div class="col-infor-left">
                <div class="content-box">
                    <div class="artist"><?= ($artist[0]) ? $artist[0]->name : '' ?></div>
                    <div class="title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></div>
                </div>
                <div class="listen-link">
                    <a href="<?= get_field('song_homepage_url') ?? '#' ?>">
                        <?= __('Listen now') ?>
                        <span class="icon-play">
                            <img width="20" src="<?= DF_IMAGE .'/icon/icon-play.png';?>" alt="icon-play"/>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-square-image">
                <div class="square-image">
                    <img src="<?= get_field('song_homepage_square_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-releases">
        <div class="button-link-lastest-releases">
            <a href="<?= get_field('song_homepage_latest_releases') ?? '#' ?>">
            <?= __('Latest Releases') ?>
            <span class="icon-arrow-btn">
                <img width="20" src="<?= DF_IMAGE .'/icon/arrow-right-btn.png';?>" alt="icon-arrow-btn"/>
            </span>
            </a>
        </div>
    </div>
</div>