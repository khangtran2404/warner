<?php
add_action('init','create_service_post_type');

function create_service_post_type() {
    $post_type_args = array(
        'post_type' => 'cpt-service',
        'name'      => __('Services', 'storefront'),
        'single'    => __('service', 'storefront'),
        'slug'      => 'cpt-service',
        'menu_icon' => DF_IMAGE.'/logo/service-dashboard.png'
    );
    constructor_cpt_have_permalink($post_type_args);

    $taxonomy_args = array(
        'post_type' => 'cpt-service',
        'name'      => __('Categories service', 'storefront'),
        'slug'      => 'category-service',
        'singular_name' => __('Category','storefront')
    );
    constructor_custom_taxonomy_create($taxonomy_args);
}
