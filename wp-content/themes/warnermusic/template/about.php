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
                                    <div class="image-feature no-scale aspect-ratio-warner aspect-ratio-2-3"
                                        style="background-image: url('<?= $gallery ? $gallery['url'] : DF_IMAGE .'/noimage.png'; ?>')"></div>
                                    <div class="name padding-20"><?= $gallery['title'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                } ?>
            </div>
        </div>
        <div class="main-content-after" style="padding-bottom: 30px"><?= get_field('section_content_after_gallery')?></div>
        <div class="contact-us">
            <div class="main-content-after">
                <?= get_field('section_content_contact');?>
            </div>
            <div class="contact-form-section">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-left">
                        <?php
                            $contactForm = get_field('contact_form_shortcode');
                            if ($contactForm){
                                echo do_shortcode($contactForm);
                            }
                        ?>
                    </div>
                    <div class="col-lg-4 col-right">
                        <div class="contact-sidebar">
                            <?= get_field('sidebar_contact');?>
                        </div>
                        <div class="col-social-icon">
                            <ul class="list-item-socials">
                                <?php get_template_part( '/inc/views/header/header-social' ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php
get_footer();
