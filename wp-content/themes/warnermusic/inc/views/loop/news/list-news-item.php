<div class="news-item gird-item-no-square">
	<div class="content-box">
		<div class="group-content">
			<div class="publish-date"><?= get_the_date(); ?></div>
			<a class="link-box" href="<?= get_post_permalink() ?>"></a>
			<div class="image-feature"
				style="background-image: url('<?= get_the_post_thumbnail_url() ?>')"></div>
			<div class="name"><?= get_the_title() ?></div>
		</div>
	</div>
</div>