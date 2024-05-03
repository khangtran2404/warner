<?php
get_header();
?>

<?php
$termData = get_queried_object();
$name = $termData->name;
$mainImg = get_field('artist_image', 'artist_' . $termData->term_id);
?>
    <div class="taxonomy-singer-template">
        <div class="container">
            <div class="main-taxt-content margin-bottom-section">
                <h1 class="title-tax font-global"><?= $termData->name ?></h1>
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 col-sticky">
                        <div class="col-content-image aspect-ratio-warner aspect-ratio-16-9">
                            <?php if ($mainImg): ?>
                                <img src="<?= $mainImg['url'] ?>" alt="artist-main-image">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="col-main-content">
                            <div class="listent-on">
                                <h2 class="small-title font-global"><?= __('Listen on') ?></h2>
                                <div class="listen-on-icons">
                                    <ul class="list-media-icons">
                                        <?php
                                        $mediaLinks = get_field('artist_media_links', 'artist_' . $termData->term_id);
                                        if ($mediaLinks) {
                                            $links_media = $mediaLinks['artist_media_link_repeater'];
                                            if ($links_media) {
                                                foreach ($links_media as $link_media):
                                                    $icon_med = $link_media['media_icon'];
                                                    $link_med = $link_media['media_link']; ?>
                                                    <li class="media-link-item">
                                                        <a href="<?= $link_med ?: '#' ?>"><img src="<?= $icon_med; ?>"
                                                                                               alt="media-icon"></a>
                                                    </li>
                                                <?php endforeach;
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="connect-with-singer">
                                <h2 class="small-title font-global"><?= __('Connect with ') . $termData->name ?></h2>
                                <div class="social-icons">
                                    <ul class="list-social-icons">
                                        <?php
                                        $socialLinks = get_field('artist_social_links', 'artist_' . $termData->term_id);
                                        if ($socialLinks) {
                                            $links_social = $socialLinks['artist_social_link_repeater'];
                                            if ($links_social) {
                                                foreach ($links_social as $link_social):
                                                    $icon_so = $link_social['social_icon'];
                                                    $link_so = $link_social['social_link']; ?>
                                                    <li class="social-link-item">
                                                        <a href="<?= $link_so ?: '#' ?>"><img src="<?= $icon_so ?>"
                                                                                              alt="social-icon"></a>
                                                    </li>
                                                <?php endforeach;
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="biography">
                                <h2 class="small-title font-global"><?= __('Biography') ?></h2>
                                <div class="main-content-singer">
                                    <?= nl2br($termData->description) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $artistEmbedLinkData = get_field('artist_embed_link','artist_' . $termData->term_id);
            if ($artistEmbedLinkData): ?>
                <div class="group-artist-embed-link margin-bottom-section">
                    <h2 class="small-title font-global"><?= $artistEmbedLinkData['header_title'] ?: '' ?></h2>
                    <a href="<?= $artistEmbedLinkData['embed_href'] ?: ''?>">
                        <img src="<?= $artistEmbedLinkData['thumbnail'] ?: '' ?>" alt="artist-embed-link-thumbnail">
                        <div class="title"><?= $artistEmbedLinkData['title'] ?: ''?></div>
                    </a>
                </div>
            <?php endif ?>
            <div class="group-artist-playlists playlists margin-bottom-section">
                <h2 class="small-title font-global"><?= __('Playlists') ?></h2>
                <div class="list-playlist">
                    <?php
                    $args = array(
                        'post_type' => 'playlist',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'artist',
                                'field' => 'ID',
                                'terms' => $termData->term_id,
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="playlist-item">
                                <div class="content-box">
                                    <?= get_field('playlist_embed_code', get_the_ID()) ?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="group-artist-videos margin-bottom-section">
                <h2 class="small-title font-global"><?= __('Videos') ?></h2>
                <div class="list-videos">
                    <?php
                    $args = array(
                        'post_type' => 'song',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'artist',
                                'field' => 'ID',
                                'terms' => $termData->term_id,
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $videoUrl = get_field('song_video_url');
                            $videoLabel = get_field('song_video_label');
                            $videoReleaseDate = get_field('song_video_release_date');
                            if ($videoUrl):
                                $videoId = getYoutubeVideoId($videoUrl);
                                if ($videoId != null) {
                                    $videoThumbnail = 'https://img.youtube.com/vi/' . $videoId . '/0.jpg';
                                }

                                ?>
                                <div class="video-item">
                                    <div data-id="<?= $videoUrl ?>" class="content-box">
                                        <div class="thumbnail aspect-ratio-warner aspect-ratio-2-3-video">
                                            <img src="<?= $videoThumbnail ?? '' ?>"
                                                 alt="video-thumbnail">
                                        </div>
                                        <div class="content-text">
                                            <div class="name"><?= $videoLabel ?: '' ?></div>
                                            <div class="release-date"><?= $videoReleaseDate ?: '' ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
            $mainUrl = get_field('artist_merchandise_url', 'artist_' . $termData->term_id);
            $merchandiseURl = searchStringToReplace($mainUrl);
            $merchandiseBaseURl = get_field('artist_merchandise_base', 'artist_' . $termData->term_id); ?>
            <?php if ($merchandiseURl && $merchandiseBaseURl): ?>
                <div class="group-artist-merchandise merchandise margin-bottom-section">
                    <h2 class="small-title font-global"><a target="_blank"
                                                           href="<?= $mainUrl ?>"><?= __('Merchandise') ?></a></h2>
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
                                                       title="<?= $title; ?>(<?= $category; ?>)" target="_blank"></a>
                                                    <div class="image-feature"><img src="<?= $image ?>" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: break; endif; endfor;
                            endif;
                            $html->clear();
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
            <?= get_template_part('inc/views/loop/artist/artist', 'event-list', ['artist_id' => $termData->term_id]); ?>
        </div>
    </div>
<?php
function searchStringToReplace($url)
{
    $start_str = 'https://lpclub.vn/';
    $end_str = '?q=';

    $start_pos = strpos($url, $start_str);
    $end_pos = strpos($url, $end_str);

    if ($start_pos !== false && $end_pos !== false) {
        $start_pos += strlen($start_str);
        return str_replace(substr($url, $start_pos, $end_pos - $start_pos), 'search', $url);
    }
}

get_footer();
