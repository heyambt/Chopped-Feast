<?php
function md_register_custom_post_types() {
    
    
    //register Testimonials CPT

    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name'),
        'menu_name'          => _x( 'Testimonials', 'admin menu' ),
        'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Testimonials' ),
        'add_new_item'       => __( 'Add New Testimonials' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial' ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No Testimonial found.' ),
        'not_found_in_trash' => __( 'No Testimonial found in Trash.' ),
        'archives'           => __( 'Testimonials Archives'),
        'insert_into_item'   => __( 'Insert into Testimonial'),
        'uploaded_to_this_item' => __( 'Uploaded to this Testimonial'),
        'filter_item_list'   => __( 'Filter Testimonial list'),
        'items_list_navigation' => __( 'Testimonials list navigation'),
        'items_list'         => __( 'Testimonials list'),
        'featured_image'     => __( 'Testimonials feature image'),
        'set_featured_image' => __( 'Set Testimonials feature image'),
        'remove_featured_image' => __( 'Remove Testimonials feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( 'core/quotes' ),
        'template_lock'      => 'all',
    );

    register_post_type( 'abc-testimonials', $args );
    
// register recipes cpt

    $labels = array(
        'name'               => _x( 'Recipes', 'post type general name' ),
        'singular_name'      => _x( 'Recipe', 'post type singular name'),
        'menu_name'          => _x( 'Recipes', 'admin menu' ),
        'name_admin_bar'     => _x( 'Recipes', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Recipes' ),
        'add_new_item'       => __( 'Add New Recipe' ),
        'new_item'           => __( 'New Recipe' ),
        'edit_item'          => __( 'Edit Recipe' ),
        'view_item'          => __( 'View Recipe' ),
        'all_items'          => __( 'All Recipes' ),
        'search_items'       => __( 'Search Recipes' ),
        'parent_item_colon'  => __( 'Parent Recipe:' ),
        'not_found'          => __( 'No Recipe found.' ),
        'not_found_in_trash' => __( 'No Recipe found in Trash.' ),
        'archives'           => __( 'Recipes Archives'),
        'insert_into_item'   => __( 'Insert into Recipe'),
        'uploaded_to_this_item' => __( 'Uploaded to this Recipe'),
        'filter_item_list'   => __( 'Filter Recipe list'),
        'items_list_navigation' => __( 'Recipes list navigation'),
        'items_list'         => __( 'Recipes list'),
        'featured_image'     => __( 'Recipes feature image'),
        'set_featured_image' => __( 'Set Recipes feature image'),
        'remove_featured_image' => __( 'Remove Recipes feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'recipes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'template'           => array( array( 'core/image' ), array( 'core/paragraph' )),
        'template_lock'      => 'all',
    );

    register_post_type( 'abc-recipes', $args );

}
add_action( 'init', 'md_register_custom_post_types' );

//register taxonomies
function md_register_taxonomies() {
    // register Special Diet taxonomy
    $labels = array(
        'name'              => _x( 'Special Diets', 'taxonomy general name' ),
        'singular_name'     => _x( 'Special Diet', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Special Diets' ),
        'all_items'         => __( 'All Special Diets' ),
        'parent_item'       => __( 'Parent Special Diet' ),
        'parent_item_colon' => __( 'Parent Special Diet:' ),
        'edit_item'         => __( 'Edit Special Diet' ),
        'view_item'         => __( 'Vview Special Diet' ),
        'update_item'       => __( 'Update Special Diet' ),
        'add_new_item'      => __( 'Add New Special Diet' ),
        'new_item_name'     => __( 'New Special Diet Name' ),
        'menu_name'         => __( 'Special Diets' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'special-diets' ),
    );
    register_taxonomy( 'special-diets', array( 'abc-recipes' ), $args );

     


    //register Weekly Recipes taxonomy

$labels = array(
    'name'              => _x( 'Weekly Recipes', 'taxonomy general name' ),
    'singular_name'     => _x( 'Weekly Recipe', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Weekly Recipes' ),
    'all_items'         => __( 'All Weekly Recipes' ),
    'parent_item'       => __( 'Parent Weekly Recipe' ),
    'parent_item_colon' => __( 'Parent Weekly Recipe:' ),
    'edit_item'         => __( 'Edit Weekly Recipe' ),
    'update_item'       => __( 'Update Weekly Recipe' ),
    'add_new_item'      => __( 'Add New Weekly Recipe' ),
    'new_item_name'     => __( 'New Weekly Recipe Name' ),
    'menu_name'         => __( 'Weekly Recipes' ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'weekly-recipes' ),
);

register_taxonomy( 'weekly-recipes', array( 'abc-recipes' ), $args );
}
add_action( 'init', 'md_register_taxonomies');




//this flushes rewrites after enabling the theme
// we still have to save changes on permalinks while developing
function md_rewrite_flush() {
    md_register_custom_post_types();
    md_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'md_rewrite_flush' );