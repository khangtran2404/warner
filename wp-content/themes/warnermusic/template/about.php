<?php
/**
 * Template name: About Us Page (Warnermusic)
 */

get_header();
?>
<div id="site-about-page" class="site-about-page padding-page">
    <div class="container">
        <?php the_title( '<h1 class="main-title">', '</h1>' );?>
        <div class="main-content"><?php the_content();?></div>
        <div class="group-list-gallery">
            <div class="about-gallery-list list-layout-warner-1">
                <?php
                $gallerys = get_field( 'list_gallery_image' );
                if ( $gallerys ) {
                    foreach ( $gallerys as $gallery ): ?>
                        <div class="about-gallery-item gird-item-no-square">
                            <div class="content-box">
                                <div class="group-content">
                                    <div class="image-feature no-scale"
                                        style="background-image: url('<?= $gallery ? $gallery['url'] : '' ?>')"></div>
                                    <div class="name padding-20"><?= $gallery['title'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                } ?>
            </div>
        </div>
        <div class="main-content-after"><?= get_field('section_content_after_gallery')?></div>
    </div>
</div>



        <!--<div class="page-title">
            <h1><?= get_the_title() ?></h1>
        </div>
        <div class="page-content">
			
        </div>
        <div class="contact-form-section">
            <?php
            $contactForm = get_field('contact_form_shortcode');
            if ($contactForm){
                echo do_shortcode($contactForm);
            }
            ?>
        </div>-->
<?php
get_footer();
