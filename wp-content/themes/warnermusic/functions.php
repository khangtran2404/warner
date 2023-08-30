<?php
// Name define
define('THEME_URI',  get_stylesheet_directory_uri());
define('THEME_DIR', get_stylesheet_directory());
define('DF_IMAGE', THEME_URI. '/assets/images');


function warnermusic() {
    $date = date('l jS \of F Y h:i:s A');
    
    // Add Library CSS
    wp_enqueue_style( 'parent-style', THEME_URI. '/style.css' );
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/lib/bootstrap/bootstrap.min.css');
    wp_enqueue_style('slick', THEME_URI. '/assets/css/lib/slick/slick.css');
    wp_enqueue_style('wow-animation', THEME_URI. '/assets/css/lib/animate/animate.min.css');

    // Add Library JS
    wp_enqueue_script('jquery', THEME_URI. '/assets/js/lib/jquery.min.js', '','' , true);
    wp_enqueue_script('slick', THEME_URI. '/assets/js/lib/slick.min.js', '','' , true);
    wp_enqueue_script( 'Wow-animation', THEME_URI. '/assets/js/lib/WOW.js', '','' , true);

    // Add Main CSS
    wp_enqueue_style('main-style', THEME_URI. '/assets/css/main.css');

    // Add Main JS
    wp_enqueue_script('main-script', THEME_URI. '/assets/js/main.js?'.$date, '','' , true);
}
add_action( 'wp_enqueue_scripts', 'warnermusic');

function disable_editor_on_selected_templates() {
    // Get the current post ID
    $post_id = $_GET['post'] ?? $_POST['post_ID'] ?? false;

    if (!$post_id) {
        return;
    }

    // Get the page template file name
    $template = get_post_meta($post_id, '_wp_page_template', true);

    // List of templates to disable the editor for
    $disabled_templates = array(
        'homepage.php', // Replace with actual template file names
        // Add more template file names as needed
    );

    if (in_array($template, $disabled_templates)) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'disable_editor_on_selected_templates');


// Register an menu custom for Header
register_nav_menus(
    array(
        'main-menu'  => __( 'Main menu' )
    )
);

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

// Includes file functions
include THEME_DIR. '/inc/function.php';