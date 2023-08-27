<?php

add_filter('acf/settings/save_json', 'auto_save_acf');

function auto_save_acf( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf_sync';
    // return
    return $path;
}

add_filter('acf/settings/load_json', 'auto_load_acf');

function auto_load_acf($paths)
{
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf_sync';
    // return
    return $paths;
}
?>