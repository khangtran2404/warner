<?php
/**
 * Template name: Artist Page (Warnermusic)
 */

get_header();
?>
    <div id="site-artist-page" class="site-artist-page layout-filter-side-bar padding-page">
        <div class="container">
            <?php the_title( '<h1 class="main-title">', '</h1>' );?>
            <div class="main-content"><?php the_content();?></div>
            <div class="row">
                <div class="col-lg-3 col-sticky">
                    <div class="col-sticky">
                        <div class="filter-section">
                            <ul class="filter-list list-filter-artist list-filter-group">
                                <li class="all item-filter active" data-id="all"><?= __( 'All Artist' ) ?></li>
                                <li class="international item-filter" data-id="international"><?= __( 'Intl Artists' ) ?></li>
                                <li class="domestic item-filter" data-id="domestic"><?= __( 'Domestic Artists' ) ?></li>
                                <li class="domestic-exclusive-distribution item-filter"
                                    data-id="domestic-exclusive-distribution"><?= __( 'Domestic Exclusive Distribution' ) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="artist-list-section list-layout-warner-3-no-slider">
                        <?php
                        $artists = get_terms( array(
                            'taxonomy'   => 'artist',
                        ) );
                        foreach ( $artists as $key=>$artist ):
                            if (empty($artist->parent)) continue;
                            $artistUrl = get_term_link($artist->term_id,'artist');
                            $artistImageUrl = get_field( 'artist_image', 'artist_' . $artist->term_id );
                            $artistParentSlug = get_term($artist->parent)->slug;
                            ?>
                            <div class="artist-item filter-item term-all gird-item-no-square term-<?= $artistParentSlug ?> artist-parent-<?= $artistParentSlug ?> artist-item-<?= $artist->term_id ?>">
                                <div class="content-box">
                                    <div class="group-content">
                                        <a class="link-box" href="<?= $artistUrl ?: '#' ?>"></a>
                                        <div class="image-feature aspect-ratio-warner aspect-ratio-3-4"
                                            style="background-image: url('<?= $artistImageUrl ? $artistImageUrl['url']: DF_IMAGE .'/noimage.png'; ?>')"></div>
                                        <div class="name text-decoration-none"><?= $artist->name ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
