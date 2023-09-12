<?php
$url = 'https://lpclub.vn/collections/all/chillies';
$baseUrl = 'https://lpclub.vn';
$html = file_get_html($url);
$items = $html->find('.item-inner');

for ($i = 0; $i < 4; $i++):
	$item = $items[$i];
	$title = $item->find('.productname', 0)->plaintext;
    $link = $baseUrl . $item->find('.thumb-wrapper a',0)->href;
	$category = $item->find('.xx', 0)->plaintext;
	$image = 'https:' . $item->find('.product-wrapper img',0)->src;
	$price = $item->find('.price', 0)->plaintext;
	?>
	<div class="merchandise-item gird-item-no-square homepage-merchandise-item">
		<div class="content-box">
			<div class="group-content">
                <a class="link-box" href="<?= $link ?>" title="<?= $title ?>" target="_blank"></a>
                <div class="brand"><?=__( 'Brand: ' );?><span class="cate"><?= $category;?></span></div>
				<div class="image-feature" style="background-image: url(<?= $image ?>)"></div>
				<div class="group-text">
					<div class="price"><?= $price ?></div>
					<div class="description"><?= $title ?></div>
				</div>
			</div>
		</div>
	</div>
<?php endfor;
$html->clear();