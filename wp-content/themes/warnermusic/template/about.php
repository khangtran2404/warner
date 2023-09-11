<?php
/**
 * Template name: About Us Page (Warnermusic)
 */

get_header();
?>
    <div>
        <div class="page-title">
            <h1><?= get_the_title() ?></h1>
        </div>
        <div class="page-content">
			<?php
			$contentList = get_field( 'content_section' );
			if ( $contentList ) {
				foreach ( $contentList as $content ): ?>
                    <div class="content-item">
                        <h2 class="title"><?= $content['label'] ?: '' ?></h2>
                        <div class="information"><?= $content['content'] ?></div>
						<?php
						if ( $content['gallery'] ) : ?>
							<div class="gallery-list gallery-slider">
								<?php foreach ( $content['gallery'] as $image ):
                                    ?>
                                    <img class="gallery-slider-item" src="<?= $image['url'] ?>" alt="<?= $image['filename'] ?>">
								<?php endforeach; ?>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endforeach;
			} ?>
        </div>
        <div class="contact-form-section">
            <?php
            $contactForm = get_field('contact_form_shortcode');
            if ($contactForm){
                echo do_shortcode($contactForm);
            }
            ?>
        </div>
    </div>
<?php
get_footer();
