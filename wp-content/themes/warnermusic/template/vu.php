<?php
/**
 * Template name: Vũ Page Template (Warnermusic)
 */

get_header();
?>
<div class="overlay-landing-page"></div>
<div id="site-vu-page" class="site-vu-page">
    <div class="banner-section">
        <?php
        $bannerGroup = get_field('banner');
        if ($bannerGroup):
            $bannerImageUrl    = $bannerGroup['banner_image'];
            $bannerButtonLabel = $bannerGroup['banner_button_label'] ?: __('View More');
            $bannerButtonUrl   = $bannerGroup['banner_button_url'] ?: "#"; ?>
            <?php
            if (!empty($bannerImageUrl)): ?>
                <img class="banner-image" src="<?= $bannerImageUrl;?>" alt="banner-image">
            <?php endif;
            if ($bannerButtonUrl != '#'): ?>
            <a class="button-landing" href="<?= $bannerButtonUrl;?>" target="_blank">
                <?= $bannerButtonLabel ;?>
            </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="ticket-box-section flex-wn flex-wn--col2">
            <?php
            $ticketBoxGroup = get_field('ticket_box');
            if ($ticketBoxGroup):
                $ticketBoxItems = $ticketBoxGroup['ticket_box_repeater'] ?: [];
                $count = 0;
                foreach ($ticketBoxItems as $ticketBoxItem):
                    $place       = $ticketBoxItem['place'] ?: '';
                    $date        = $ticketBoxItem['date'] ?: '';
                    $description = $ticketBoxItem['description'] ?: '';
                    $thumbnail   = $ticketBoxItem['thumbnail'] ?: '';
                    $buttonLabel = $ticketBoxItem['button_label'] ?: __('View More');
                    $buttonUrl   = $ticketBoxItem['button_link'] ?: '#';
                    $count++; ?>
                    <div class="col-wn ticket-box-item-<?= $count ?>">
                        <h2 class="place title-landing title-h2 text-align-center"><?= $place ?></h2>
                        <div class="date sub-title-landing text-align-center"><?= $date ?></div>
                        <div class="description text-align-center"><?= $description ?></div>
                        <div class="content-image-padding">
                            <div class="ratio-cont-img ratio-cont-img--square">
                                <img class="thumbnail" src="<?= $thumbnail ?>" alt="ticket-box-thumbnail">
                            </div>
                        </div>
                        <a class="button-landing buy-ticket-link" href="<?= $buttonUrl ?>" target="_blank">
                            <?= $buttonLabel ?>
                        </a>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
        <div class="video-slider-section section-padding">
            <?php
            $videoSliderGroup = get_field('video_slider');
            if ($videoSliderGroup):
                $videoSliderLabel = $videoSliderGroup['video_slider_label'] ?: __('Videos');
                $videoSliderList = $videoSliderGroup['video_list'] ?: []; ?>
                <?php
                if (!empty($videoSliderList)): ?>
                    <h2 class="title-landing title-h2">
                        <small><strong><?= $videoSliderLabel ?></strong></small>
                    </h2>
                    <div class="list-video-youtube list-layout-warner-4">
                    <?php
                    foreach ($videoSliderList as $item):
                        $youtubeLink = $item['youtube_link'] ?: '#';
                        $videoId = getYoutubeVideoId($youtubeLink);
                        $videoThumbnail = '';
                        if ($videoId != '#') {
                            $videoThumbnail = 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';
                        }
                        ?>
                        <div class="youtube-video-item">
                            <a target="_blank" href="<?= $youtubeLink ?>">
                                <img src="<?= $videoThumbnail ?>" alt="youtube-video-thumbnail">
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif;
            ?>
        </div>
        <div class="contact-form-section">
            <?php
            $contactFormGroup = get_field('contact_form');
            if ($contactFormGroup):
                $contactFormLabel = $contactFormGroup['label'] ?: __('Contact');
                $contactFormDes = $contactFormGroup['description'];
                $contactFormShortCode = $contactFormGroup['shortcode'] ?: ''; ?>
                <?php
                if (!empty($contactFormShortCode)): ?>
                    <h2 class="title-landing title-h2">
                        <small><strong><?= $contactFormLabel ?></strong></small>
                    </h2>
                    <?php if(!empty($contactFormDes)): ?>
                    <div class="description-from"><?= $contactFormDes;?></div>
                    <?php endif;?>
                    <div class="contact-form-content"><?= do_shortcode($contactFormShortCode) ?></div>
                <?php endif;
                ?>
            <?php endif;
            ?>
        </div>
        <div class="coming-soon-section section-padding">
            <?php
            $comingSoonGroup = get_field('coming_soon');
            if ($comingSoonGroup):
                $comingSoonLabel = $comingSoonGroup['label'] ?: __("Coming Soon");
                $comingSoonEmbedLink = $comingSoonGroup['image_link'] ?: '#';
                $comingSoonImage = $comingSoonGroup['thumbnail']; ?>
                <?php
                if ($comingSoonEmbedLink != '#'): ?>
                    <h2 class="title-landing title-h2 text-align-center">
                        <strong><?= $comingSoonLabel ?></strong>
                    </h2>
                    <div class="coming-soon-link text-align-center">
                        <a href="<?= $comingSoonEmbedLink ?>" target="_blank">
                            <img class="img-coming-soon" src="<?= $comingSoonImage ?>" alt="coming-soon-image">
                        </a>
                    </div>
                <?php endif;
                ?>
            <?php endif;
            ?>
        </div>

        <?php
        $merchandiseGroup = get_field('merchandise');
        if ($merchandiseGroup) {
            $mainUrl = $merchandiseGroup['artist_merchandise_url'] ?: 'https://lpclub.vn/warner-music-vietnam?q=collections:3002213%20AND%20vendor:(V%C5%A9.)';
             $merchandiseURl = searchStringToReplace($mainUrl);
//            $merchandiseURl = "https://lpclub.vn/warner-music-vietnam?q=collections:3002213%20AND%20vendor:(V%C5%A9.)";
            $merchandiseBaseURl = $merchandiseGroup['artist_merchandise_base'] ?: 'https://lpclub.vn';
            ?>
            <?php if ($merchandiseURl && $merchandiseBaseURl): ?>
            <div class="section-merchandise-vu section-padding">
                <div class="group-artist-merchandise merchandise">
                    <div class="group-title-button">
                        <h2 class="small-title font-global" style="margin-bottom: 0;"><?= __('CD Album & Merchandise') ?></h2>
                        <div class="button-link-warner">
                            <a class="button-landing"
                                href="https://lpclub.vn/warner-music-vietnam?q=collections:3002213%20AND%20vendor:(V%C5%A9.)"
                                target="_blank"><?= __( "Xem thêm" ) ?>
                            </a>
                        </div>
                    </div>
                    <div class="list-merchandise list-layout-warner-4">
                        <?php if ($merchandiseBaseURl && $merchandiseURl) {
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $merchandiseURl);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $html = curl_exec($ch);
                            curl_close($ch);
                            $html = str_get_html($html);
                            $baseUrl = '' . $merchandiseBaseURl . '';
                            $items = $html->find('.item-inner');
                            if (!empty($items)):
                                for ($i = 0; $i < 4; $i++):
                                    if (isset($items[$i])):
                                        $item = $items[$i];
                                        $title = $item->find('.productname', 0)->plaintext;
                                        $link = $baseUrl . $item->find('.thumb-wrapper a', 0)->href;
                                        $category = $item->find('.xx', 0)->plaintext;
                                        $image = 'https:' . $item->find('.product-wrapper img', 0)->src;
                                        $price = $item->find('.price', 0)->plaintext;
                                        ?>
                                        <div class="merchandise-item gird-item-no-square">
                                            <div class="content-box">
                                                <div class="group-content">
                                                    <a class="link-box" href="<?= $link ?>"
                                                       title="<?= $title; ?>(<?= $category; ?>)"
                                                       target="_blank"></a>
                                                    <div class="image-feature"><img src="<?= $image ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: break; endif; endfor;
                            endif;
                            $html->clear();
                        } ?>
                    </div>
                </div>
            </div>
            <?php endif;
        }
        ?>

        <?php
        $playlistGroup = get_field('playlist');
        if ($comingSoonGroup):?>
            <div class="section-play-list playlists section-padding" style="margin-bottom: 0; padding-bottom:30px;">
                <h2 class="small-title font-global">
                   <?= __("Playlist"); ?>
                </h2>
                <div class="list-playlist">
                <?php
                    for ($i = 1; $i <= 6; $i++) {
                        $embedCodeStr = $playlistGroup['playlist_embed_code_' . $i];
                        if(isset($embedCodeStr) && $embedCodeStr !== '') {
                            ?>
                                <div class="playlist-item">
                                    <div class="content-box">
                                        <?php echo $playlistGroup['playlist_embed_code_' . $i];?>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                ?>
                </div>
            </div>
        <?php endif;?>

        <div class="support-section section-padding">
            <?php
            $supportGroup = get_field('support');
            if ($supportGroup):
                $supportLabel = $supportGroup['label'] ?: __('Support');
                $supportItems = $supportGroup['support_item_repeater'] ?: []; ?>
                <?php
                if (!empty($supportItems)): ?>
                    <h2 class="title-landing title-h2 small-title">
                        <?= $supportLabel ?>
                    </h2>
                    <div class="list-item-support">
                    <?php foreach ($supportItems as $supportItem):
                        $label = $supportItem['label'];
                        $icon = $supportItem['icon'];
                        $url = $supportItem['url'] ?: '#'; ?>
                        <div class="support-item">
                            <a href="<?= $url ?>" target="_blank">
                                <img src="<?= $icon ?>" alt="<?= $label ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif;
                ?>
            <?php endif;
            ?>
        </div>
    </div>
</div>
<style>
<?php
$global_background = get_field("global_background_page");
if($global_background):
    $global_background_img     = $global_background["background_image_global"];
    $global_background_color   = $global_background["background_color"];
    $global_background_opacity = str_replace(",",".",$global_background["opacity_overlay"]);?>
    <?php if($global_background_img):?>
        .page-template-vu {
            position: relative;
            width: 100%;
            height: 100%;
            background: url('<?php echo esc_attr($global_background_img );?>') no-repeat center center fixed;
            background-size: cover;
        }
        .page-template-vu .overlay-landing-page {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: <?php echo esc_attr($global_background_color );?>;
            opacity: <?php echo esc_attr($global_background_opacity );?>;
        }
    <?php else:?>
        .page-template-vu {
            background-color: <?php echo esc_attr($global_background_color );?> !important;
        }
    <?php endif;?>
<?php endif;?>
</style>
<?php
get_footer();
