<div class="event-item">
    
    <?php
    $originalDate = get_field( 'event_date' );
    $dateTime = DateTime::createFromFormat('j F', $originalDate);
    if ($dateTime) {
        $shortDate = strftime('%e %b', $dateTime->getTimestamp());
        echo '<div class="date">'.$shortDate.'</div>';
    }
    ?>
    <div class="location"><?= get_field( 'event_position' ) ?></div>
    <div class="learn-more button-link-warner radius-none">
        <a href="#"><?= __( 'Learn more' ) ?></a>
    </div>
</div>