<div class="news-item gird-item-no-square">
	<div class="content-box">
		<div class="group-content">
			<div class="publish-date"><?= get_the_date('F d, Y') ?></div>
			<a class="link-box" href="<?= get_post_permalink() ?>"></a>
			<div class="image-feature"
				style="background-image: url('<?= get_the_post_thumbnail_url() ?>')"></div>
			<div class="name">
				<div class="title"><?= get_the_title() ?></div>
				<div class="excerpt"><?= get_the_excerpt() ?: wp_trim_words(get_the_excerpt(),20) ?></div>
			</div>
		</div>
	</div>
</div>