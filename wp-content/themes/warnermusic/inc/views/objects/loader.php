<div id="overlayer">
    <?php
        $globalLoader = get_field('global_loader','option');
        $selectLoader = $globalLoader['choose_type_loader'];
        $urlMp4 = $globalLoader['loader_video_mp4'];
        if($selectLoader === '0'):?>
            <div class="loader">
                <div class="r1"></div>
                <div class="r2"></div>
                <div class="r3"></div>
                <div class="r4"></div>
                <div class="r5"></div>
            </div>
        <?php else :?>
            <div class="loader loader-video">
                <video loop="true" preload="auto" autoplay="autoplay" muted="muted" playsinline>
                <source src="<?= $urlMp4 ? $urlMp4 : DF_VIDEO.'/wanerlogo_animated.mp4';?>" type="video/mp4">
                Your browser does not support HTML5 video.
                </video>
            </div>
        <?php endif;
    ?>
</div>