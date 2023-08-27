<?php
// Acf_add_options_page('Theme Options');
if( function_exists('acf_add_options_page') ) {
    $parent = acf_add_options_page(array(
        'page_title'    => 'Warner Music Setting',
        'menu_title'    => 'Warner settings',
        'menu_slug'     => 'warner-setting',
        'parent_slug'   => '',
        'redirect'      => false,
        'position'      => 15,
        // 'icon_url'   => DF_IMAGE.'/logo/logo-dashboard.png',
        'icon_url'      => 'dashicons-screenoptions'
    ));
};