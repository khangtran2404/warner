<?php
/**
 * Template name: Page with contact form (Warnermusic)
 */

get_header();
?>
<div id="site-page-with-form" class="site-page-with-form padding-page">
    <div class="container">
        <?php the_title( '<h1 class="main-title">', '</h1>' );?>
        <div class="separator-left-warner"></div>
        <div class="main-content"><?php the_content();?></div>
        <div class="contact-us">
            <div class="main-content-after">
                <?= get_field('get_in_touch','option')['section_content_contact'];?>
            </div>
            <div class="contact-form-section">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-left">
                        <?php
                            $contactForm = get_field('get_in_touch','option')['contact_form_shortcode'];
                            if ($contactForm){
                                echo do_shortcode($contactForm);
                            }
                        ?>
                    </div>
                    <div class="col-lg-4 col-right">
                        <div class="contact-sidebar">
                            <?= get_field('get_in_touch','option')['sidebar_contact'];?>
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
