<div class="item-slider banner-song-item-<?= get_the_ID() ?>">
    <?php
    $artist = wp_get_post_terms(get_the_ID(),'artist');
    ?>
    <div class="banner-image"><img src="<?= get_field('song_homepage_banner_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/></div>
    <div class="left-information hiden-on-mobile" data-animation-in="animate__fadeInLeft">
        <div class="content-group">
            <div class="content-box">
                <div class="artist"><?= ($artist[0]) ? $artist[0]->name : '' ?></div>
                <div class="square-image"><img src="<?= get_field('song_homepage_square_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/></div>
                <div class="sub-title" data-animation-in="animate__fadeInUp" data-delay-in="1.1"><?= __('Easy') ?></div>
                <div class="title" data-animation-in="animate__fadeInUp" data-delay-in="1.2"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></div>
            </div>
            <div class="listen-link" data-animation-in="animate__fadeInUp" data-delay-in="1.4">
                <a href="<?= get_field('song_homepage_url') ?? '#' ?>">
                    <?= __('Listen now') ?>
                    <span class="icon-play">
                        <img width="20" src="<?= DF_IMAGE .'/icon/icon-play.png';?>" alt="icon-play"/>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="left-information-mobile show-on-mobile" data-animation-in="animate__fadeInUp">
        <div class="content-group">
            <div class="col-infor-left">
                <div class="content-box">
                    <div class="artist"><?= ($artist[0]) ? $artist[0]->name : '' ?></div>
                    <div class="sub-title" data-animation-in="animate__fadeInUp" data-delay-in="1"><?= __('Easy') ?></div>
                    <div class="title" data-animation-in="animate__fadeInUp" data-delay-in="1.1"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></div>
                </div>
                <div class="listen-link" data-animation-in="animate__fadeInUp" data-delay-in="1.2">
                    <a href="<?= get_field('song_homepage_url') ?? '#' ?>">
                        <?= __('Listen now') ?>
                        <span class="icon-play">
                            <img width="20" src="<?= DF_IMAGE .'/icon/icon-play.png';?>" alt="icon-play"/>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-square-image">
                <div class="square-image" data-animation-in="animate__fadeIn" data-delay-in="1.3">
                    <img src="<?= get_field('song_homepage_square_image') ?? '' ?>" alt="<?= ($artist[0]) ? $artist[0]->name : '' ?>"/>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-releases">
        <div class="button-link-lastest-releases">
            <a data-animation-in="animate__fadeInRight" data-delay-in="2" href="<?= get_field('song_homepage_latest_releases') ?? '#' ?>">
            <?= __('Latest Releases') ?>
            <span class="icon-arrow-btn">
                <img width="20" src="<?= DF_IMAGE .'/icon/arrow-right-btn.png';?>" alt="icon-arrow-btn"/>
            </span>
            </a>
        </div>
    </div>
</div>