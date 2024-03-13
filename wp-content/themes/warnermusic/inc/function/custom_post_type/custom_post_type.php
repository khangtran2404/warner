<?php
//=========== Contructor Custom Post Type have PERMALINK=============//
function constructor_cpt_have_permalink($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];

    register_post_type($post_type, array(
        'labels' => array(
            'name'               => __($name),
            'singular_name'      => __($single),
            'add_new'            => __('Add new '.$single),
            'add_new_item'       => __('Add new '.$single),
            'edit_item'          => __('Edit '.$single),
            'new_item'           => __('New '.$single),
            'all_items'          => __('All '.$name),
            'view_item'          => __('View '.$single),
            'search_items'       => __('Search '.$name),
            'not_found'          => __('Not Found '.$single),
            'not_found_in_trash' => __('Not Found '.$single.' In Trash'),
            'parent_item_colon'  => '',
            'menu_name'          => __($name)
        ),

        'public'                => true,
        'menu_icon'             => $icon, // Add icon for custom post type
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'menu_position'         => 15,
        'has_archive'           => true,
        'rewrite'               => array('slug' => $slug,'with_front' => false),
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions'),
        'show_in_rest'          => true,
    ));
}

//=========== Controctor Custom post type no PERMALINK =============//
function constructor_cpt_no_permalink($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];
    $support = array( 'title',
        (!isset($args['hide_editor'])) ? 'editor' : '',
        (!isset($args['hide_author'])) ? 'author' : '',
        (!isset($args['hide_thumbnail'])) ? 'thumbnail' : '',
        (!isset($args['hide_excerpt'])) ? 'excerpt' : '',
        (!isset($args['hide_revisions'])) ? 'revisions' : '',
    );

    register_post_type($post_type, array(
        'labels' => array(
            'name'               => __($name),
            'singular_name'      => __($single),
            'add_new'            => __('Add New '.$single),
            'add_new_item'       => __('Add New '.$single),
            'edit_item'          => __('Edit '.$single),
            'new_item'           => __('New '.$single),
            'all_items'          => __('All '.$name),
            'view_item'          => __('View '.$single),
            'search_items'       => __('Search '.$name),
            'not_found'          => __('Not Found '.$single),
            'not_found_in_trash' => __('Not Found '.$single.' In Trash'),
            'parent_item_colon'  => '',
            'menu_name'          => __($name)
        ),

        'public'                => false,  // hide permarlink
        'publicly_queryable'    => false,  // button review change
        'show_ui'               => true, // need to true because public => false on head
        'menu_icon'             => $icon,// Add icon for custom post type
        'exclude_from_search'   => false,
        'menu_position'         => 15,
        'has_archive'           => true,
        'rewrite'               => array('slug' => $slug),
        'supports'              => $support,
    ));
}

function constructor_custom_taxonomy_create($args){
    if (!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['slug'] || !$args['singular_name']) return;
    $labels = array(
        'name' => _x( $args['name'], 'storefront' ),
        'singular_name' => _x( $args['singular_name'], 'storefront' ),
        'search_items' =>  __( 'Search '.$args['name'] ,'storefront' ),
        'all_items' => __( 'All '.$args['name'],'storefront' ),
        'parent_item' => __( 'Parent '.$args['singular_name'],'storefront' ),
        'edit_item' => __( 'Edit '.$args['singular_name'],'storefront' ),
        'update_item' => __( 'Update '.$args['singular_name'],'storefront' ),
        'add_new_item' => __( 'Add New '.$args['singular_name'],'storefront' ),
        'menu_name' => __( $args['name'],'storefront' ),
    );
    register_taxonomy(
        $args['slug'],
        $args['post_type'],
        array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_in_menu' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => true,
        )
    );
}

function constructor_custom_tag_create($args){
    if (!is_array($args) || !$args['post_type'] || !$args['slug']) return;
    register_taxonomy(
        $args['slug'], //tag
        $args['post_type'], //post-type
        array(
            'hierarchical'  => false,
            'label'         => __( 'Tags','storefront'),
            'singular_name' => __( 'Tag','storefront'),
            'edit_item' => __( 'Edit Tag','storefront' ),
            'update_item' => __( 'Update Tag','storefront' ),
            'add_new_item' => __( 'Add New Tag','storefront' ),
            'new_item_name' => __( 'New Tag Name','storefront' ),
            'separate_items_with_commas' => __( 'Separate tags with commas','storefront' ),
            'add_or_remove_items' => __( 'Add or remove tags','storefront' ),
            'choose_from_most_used' => __( 'Choose from the most used tags','storefront' ),
            'menu_name' => __( 'Tags','storefront' ),
            'rewrite' => array( 'slug' => 'tag','storefront' ),
            'update_count_callback' => '_update_post_term_count',
            'query_var'     => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        )
    );
}

//==== Call post type ====//
 require_once('post_type/post_type_job.php');

