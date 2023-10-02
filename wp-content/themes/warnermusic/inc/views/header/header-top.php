<?php 
$group_setting_marquee = get_field('header_warner','option')['marquee_advertising'];
$switch =  $group_setting_marquee['disable_or_enable_advertising'];
$content_marquee = $group_setting_marquee['content'];
$img_marquee = $group_setting_marquee['icon_image'];
$url_marquee = $group_setting_marquee['url_for_content'];
if($switch === '1'):?>
    <div class="header-top">
        <div class="marquee">
            <div class="list-link-marquee">
                <div class="item-left">
                    <?php if($url_marquee != ''):
                        for($j = 0; $j < 11; $j++):?>
                            <a href="<?=$url_marquee;?>" target="_blank">
                                <?= $content_marquee;?>
                                <?php if($img_marquee):?>
                                    <img height="24" src="<?= $img_marquee;?>" alt="icon-addvertising">
                                <?php endif;?>
                            </a>
                        <?php endfor;?>
                    <?php else:
                        for($j = 0; $j < 11; $j++):?>
                            <span>
                                <?= $content_marquee;?>
                                <?php if($img_marquee):?>
                                    <img height="24" src="<?= $img_marquee;?>" alt="icon-addvertising">
                                <?php endif;?>
                            </span>
                        <?php endfor;?>
                    <?php endif;?>
                </div>
                <div class="item-right">
                    <?php if($url_marquee != ''):
                        for($j = 0; $j < 11; $j++):?>
                            <a href="<?=$url_marquee;?>" target="_blank">
                                <?= $content_marquee;?>
                                <?php if($img_marquee):?>
                                    <img height="24" src="<?= $img_marquee;?>" alt="icon-addvertising">
                                <?php endif;?>
                            </a>
                        <?php endfor;?>
                    <?php else:
                        for($j = 0; $j < 11; $j++):?>
                            <span>
                                <?= $content_marquee;?>
                                <?php if($img_marquee):?>
                                    <img height="24" src="<?= $img_marquee;?>" alt="icon-addvertising">
                                <?php endif;?>
                            </span>
                        <?php endfor;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>