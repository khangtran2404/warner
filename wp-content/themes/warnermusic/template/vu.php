<?php
/**
 * Template name: Vũ Page Template (Warnermusic)
 */

get_header();
?>
    <div id="site-vu-page" class="site-vu-page layout-filter-side-bar padding-page">
        <div class="container">
            <div class="banner-section">
                <?php
                $bannerGroup = get_field('banner');
                if ($bannerGroup):
                    $bannerImageUrl = $bannerGroup['banner_image'];
                    $bannerButtonLabel = $bannerGroup['banner_button_label'] ?: __('View More');
                    $bannerButtonUrl = $bannerGroup['banner_button_url'] ?: "#"; ?>
                    <?php
                    if (!empty($bannerImageUrl)): ?>
                        <img class="banner-image" src="<?= $bannerImageUrl ?>" alt="banner-image">
                    <?php endif;
                    if ($bannerButtonUrl != '#'): ?>
                        <a href="<?= $bannerButtonUrl ?>">
                            <button class="banner-button"><?= $bannerButtonLabel ?></button>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="ticket-box-section">
                <?php
                $ticketBoxGroup = get_field('ticket_box');
                if ($ticketBoxGroup):
                    $ticketBoxItems = $ticketBoxGroup['ticket_box_repeater'] ?: [];
                    $count = 0;
                    foreach ($ticketBoxItems as $ticketBoxItem):
                        $place = $ticketBoxItem['place'] ?: '';
                        $date = $ticketBoxItem['date'] ?: '';
                        $description = $ticketBoxItem['description'] ?: '';
                        $thumbnail = $ticketBoxItem['thumbnail'] ?: '';
                        $buttonLabel = $ticketBoxItem['button_label'] ?: __('View More');
                        $buttonUrl = $ticketBoxItem['button_link'] ?: '#';
                        $count++; ?>
                        <div class="ticket-box-item-<?= $count ?>">
                            <div class="place"><?= $place ?></div>
                            <div class="date"><?= $date ?></div>
                            <div class="description"><?= $description ?></div>
                            <img class="thumbnail" src="<?= $thumbnail ?>" alt="ticket-box-thumbnail">
                            <a class="buy-ticket-link" href="<?= $buttonUrl ?>">
                                <button class="buy-ticket-button"><?= $buttonLabel ?></button>
                            </a>
                        </div>
                    <?php endforeach;
                endif;
                ?>
            </div>
            <div class="video-slider-section">
                <?php
                $videoSliderGroup = get_field('video_slider');
                if ($videoSliderGroup):
                    $videoSliderLabel = $videoSliderGroup['video_slider_label'] ?: __('Videos');
                    $videoSliderList = $videoSliderGroup['video_list'] ?: []; ?>
                    <?php
                    if (!empty($videoSliderList)): ?>
                        <div class="main-label"><h3><?= $videoSliderLabel ?></h3></div>
                        <?php
                        foreach ($videoSliderList as $item):
                            $youtubeLink = $item['youtube_link'] ?: '#';
                            $videoId = getYoutubeVideoId($youtubeLink);
                            $videoThumbnail = '';
                            if ($videoId != '#') {
                                $videoThumbnail = 'https://img.youtube.com/vi/' . $videoId . '/0.jpg';
                            }
                            ?>
                            <div class="youtube-video-item">
                                <a target="_blank" href="<?= $youtubeLink ?>">
                                    <img src="<?= $videoThumbnail ?>" alt="youtube-video-thumbnail">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif;
                ?>
            </div>
            <div class="contact-form-section">
                <?php
                $contactFormGroup = get_field('contact_form');
                if ($contactFormGroup):
                    $contactFormLabel = $contactFormGroup['label'] ?: __('Contact');
                    $contactFormShortCode = $contactFormGroup['shortcode'] ?: ''; ?>
                    <?php
                    if (!empty($contactFormShortCode)): ?>
                        <div class="contact-form-label"><h3><?= $contactFormLabel ?></h3></div>
                        <div class="contact-form-content"><?= do_shortcode($contactFormShortCode) ?></div>
                    <?php endif;
                    ?>
                <?php endif;
                ?>
            </div>
            <div class="coming-soon-section">
                <?php
                $comingSoonGroup = get_field('coming_soon');
                if ($comingSoonGroup):
                    $comingSoonLabel = $comingSoonGroup['label'] ?: __("Coming Soon");
                    $comingSoonEmbedLink = $comingSoonGroup['image_link'] ?: '#';
                    $comingSoonImage = $comingSoonGroup['thumbnail']; ?>
                    <?php
                    if ($comingSoonEmbedLink != '#'): ?>
                        <div class="coming-soon-label"><h3><?= $comingSoonLabel ?></h3></div>
                        <div class="coming-soon-link">
                            <a href="<?= $comingSoonEmbedLink ?>">
                                <img src="<?= $comingSoonImage ?>" alt="coming-soon-image">
                            </a>
                        </div>
                    <?php endif;
                    ?>
                <?php endif;
                ?>
            </div>
            <div class="support-section">
                <?php
                $supportGroup = get_field('support');
                if ($supportGroup):
                    $supportLabel = $supportGroup['label'] ?: __('Support');
                    $supportItems = $supportGroup['support_item_repeater'] ?: []; ?>
                    <?php
                    if (!empty($supportItems)): ?>
                        <div class="support-label"><h3><?= $supportLabel ?></h3></div>
                        <?php foreach ($supportItems as $supportItem):
                            $label = $supportItem['label'];
                            $icon = $supportItem['icon'];
                            $url = $supportItem['url'] ?: '#'; ?>
                            <div class="support-item">
                                <a href="<?= $url ?>">
                                    <img src="<?= $icon ?>" alt="<?= $label ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif;
                    ?>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();
