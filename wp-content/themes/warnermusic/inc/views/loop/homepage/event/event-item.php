<div class="event-item">
    <div class="group-text">
        <?php
        $originalDate = get_field( 'event_date' );
        $eventLink = get_field('event_link');
        $dateTime = strtotime($originalDate);
        if ($dateTime) {
            $shortDate = date('d M', $dateTime);
            echo '<div class="date">'.$shortDate.'</div>';
        }
        ?>
        <div class="location"><?= get_field( 'event_position' ) ?></div>
    </div>
    <div class="learn-more button-link-warner">
        <a href="<?= $eventLink ?: '#' ?>" target="_blank"><?= __( 'Learn more' ) ?></a>
    </div>
</div>