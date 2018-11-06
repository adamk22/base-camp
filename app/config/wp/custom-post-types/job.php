<?php

// function custom_post_type_job()
// {
//     // Set UI labels for Custom Post Type
//     $labels = [
//         'name'               => _x('Jobs', 'Post Type General Name', 'base-camp'),
//         'singular_name'      => _x('Job', 'Post Type Singular Name', 'base-camp'),
//         'menu_name'          => __('Jobs', 'base-camp'),
//         'parent_item_colon'  => __('Parent Job', 'base-camp'),
//         'all_items'          => __('All Jobs', 'base-camp'),
//         'view_item'          => __('View Job', 'base-camp'),
//         'add_new_item'       => __('Add New Job', 'base-camp'),
//         'add_new'            => __('Add New', 'base-camp'),
//         'edit_item'          => __('Edit Job', 'base-camp'),
//         'update_item'        => __('Update Job', 'base-camp'),
//         'search_items'       => __('Search Job', 'base-camp'),
//         'not_found'          => __('Not Found', 'base-camp'),
//         'not_found_in_trash' => __('Not found in Trash', 'base-camp'),
//     ];

//     // Set other options for Custom Post Type
//     $args = [
//         'label'               => __('jobs', 'base-camp'),
//         'description'         => __('Job', 'base-camp'),
//         'labels'              => $labels,
//         // Features this CPT supports in Post Editor
//         'supports'            => [
//             'title',
//             'editor',
//             'excerpt',
//             'author',
//             'thumbnail',
//             'comments',
//             'revisions',
//             'custom-fields',
//         ],
//         // You can associate this CPT with a taxonomy or custom taxonomy.
//         'taxonomies'          => [''],
//         /* A hierarchical CPT is like Pages and can have
//         * Parent and child items. A non-hierarchical CPT
//         * is like Posts.
//         */
//         'hierarchical'        => false,
//         'public'              => true,
//         'show_ui'             => true,
//         'show_in_menu'        => true,
//         'show_in_nav_menus'   => true,
//         'show_in_admin_bar'   => true,
//         'menu_position'       => 5,
//         'menu_icon'           => null, // https://developer.wordpress.org/resource/dashicons
//         'can_export'          => true,
//         'has_archive'         => true,
//         'exclude_from_search' => false,
//         'publicly_queryable'  => true,
//         'capability_type'     => 'page',
//     ];

//     // Registering your Custom Post Type
//     register_post_type('job', $args);
// }

// add_action('init', 'custom_post_type_job', 0);
