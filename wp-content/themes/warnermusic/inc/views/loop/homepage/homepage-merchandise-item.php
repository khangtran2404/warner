<?php
$merchandiseURl     = get_field( 'merchandise_see_more', $args['page_id'] );
$merchandiseBaseURl = get_field( 'merchandise_base_url', $args['page_id'] );
$ch                 = curl_init();
curl_setopt( $ch, CURLOPT_URL, $merchandiseURl );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ); // Trả về kết quả thay vì in ra
$html = curl_exec( $ch );
curl_close( $ch );
$html         = str_get_html( $html );
$baseUrl      = '' . $merchandiseBaseURl . '';
$items        = $html->find( '.item-inner' );

for ( $i = 0; $i < 4; $i ++ ):
	$item = $items[ $i ];
	$title    = $item->find( '.productname', 0 )->plaintext;
	$link     = $baseUrl . $item->find( '.thumb-wrapper a', 0 )->href;
	$category = $item->find( '.xx', 0 )->plaintext;
	$image    = 'https:' . $item->find( '.product-wrapper img', 0 )->src;
	$price    = $item->find( '.price', 0 )->plaintext;
	?>
    <div class="merchandise-item gird-item-no-square homepage-merchandise-item">
        <div class="content-box">
            <div class="group-content">
                <a class="link-box" href="<?= $link ?>" title="<?= $title; ?>(<?= $category; ?>)" target="_blank"></a>
                <!-- <div class="brand"><?= __( 'Brand: ' ); ?><span class="cate"><?= $category; ?></span></div> -->
                <div class="image-feature aspect-ratio-warner aspect-ratio-1-1"
                     style="background-image: url(<?= $image ?>)"></div>
                <!-- <div class="group-text">
					<div class="price"><?= $price ?></div>
					<div class="description"><?= $title ?></div>
				</div> -->
            </div>
        </div>
    </div>
<?php endfor;
$html->clear();