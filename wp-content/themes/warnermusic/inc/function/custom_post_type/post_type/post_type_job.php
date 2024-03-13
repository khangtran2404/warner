<?php
add_action('init','create_job_post_type');

function create_job_post_type() {
    $post_type_args = array(
        'post_type' => 'jobs',
        'name'      => __('Jobs', 'storefront'),
        'single'    => __('job', 'storefront'),
        'slug'      => 'jobs',
        'menu_icon' => DF_IMAGE.'/logo/service-dashboard.png'
    );
    constructor_cpt_have_permalink($post_type_args);
}
