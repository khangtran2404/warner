<?php
get_header();
?>

<?php
$termData    = get_queried_object();
$name        = $termData->name;
$mainImg     = get_field( 'artist_image', 'artist_' . $termData->term_id );
$galleryImgs = get_field( 'artist_gallery', 'artist_' . $termData->term_id );
?>

    <div id="container">
        <h1 class="title"><?= $termData->name ?></h1>
        <div class="group-images">
			<?php if ( $mainImg ): ?>
                <img src="<?= $mainImg['url'] ?>" alt="artist-main-image">
			<?php endif; ?>
			<?php if ( $galleryImgs ):
				foreach ( $galleryImgs as $key => $gallery_img ):
					if ($key === 3) { break; }
					?>
                    <img src="<?= $gallery_img ?>" alt="artist-gallery-image">
				<?php endforeach; ?>
			<?php endif; ?>
        </div>
        <div class="group-information right-column">
            <div class="biography">
                <h2 class="title"><?= __('Biography') ?></h2>
                <div class="description">
					<?= $termData->description ?>
                </div>
            </div>
            <div class="gallery">
				<?php if ( $galleryImgs ):
					foreach ( $galleryImgs as $key => $gallery_img ): ?>
                        <img src="<?= $gallery_img ?>" alt="artist-gallery-image">
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
        </div>
        <div class="group-social-links left-column">
            <div class="connect-with">
				<?= __('Connect with ') . $termData->name ?>
                <div class="social-icons">
                    gắn dùm em cái đống icon ở đây rồi em đổ data sau
                </div>
            </div>

            <div class="listen-on">
				<?= __('Listen on')  ?>
                <div class="listen-on-icons">
                    này cũng vậy lun
                </div>
            </div>

        </div>
    </div>

<?php
get_footer();
