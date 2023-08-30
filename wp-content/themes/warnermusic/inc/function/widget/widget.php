<?php
//=========== Registaion widget area =============//
function registaion_area_widget()
{
    register_sidebar(
        array(
            'name' => __('Warner Music - Footer column 1', 'warnermusic'),
            'id' => 'footer_column_1',
            'description' => __('Warner Music - Footer column 1', 'warnermusic'),
            'before_widget' => '<div id="%1$s" class="widget footer-column-%2$s">',
            'after_widget' => '</div>',
            'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Warner Music - Footer column 2', 'warnermusic'),
            'id' => 'footer_column_2',
            'description' => __('Warner Music - Footer column 2', 'warnermusic'),
            'before_widget' => '<div id="%1$s" class="widget footer-column-%2$s">',
            'after_widget' => '</div>',
            'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Warner Music - Footer column 3', 'warnermusic'),
            'id' => 'footer_column_3',
            'description' => __('Warner Music - Footer column 3', 'warnermusic'),
            'before_widget' => '<div id="%1$s" class="widget footer-column-%2$s">',
            'after_widget' => '</div>',
            'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Warner Music - Footer column 4', 'warnermusic'),
            'id' => 'footer_column_4',
            'description' => __('Warner Music - Footer column 4', 'warnermusic'),
            'before_widget' => '<div id="%1$s" class="widget footer-column-%2$s">',
            'after_widget' => '</div>',
            'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Warner Music - Footer column 5', 'warnermusic'),
            'id' => 'footer_column_5',
            'description' => __('Warner Music - Footer column 5', 'warnermusic'),
            'before_widget' => '<div id="%1$s" class="widget footer-column-%2$s">',
            'after_widget' => '</div>',
            'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
        )
    );
}

add_action('widgets_init', 'registaion_area_widget');
?>