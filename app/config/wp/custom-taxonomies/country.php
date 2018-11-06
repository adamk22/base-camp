<?php

// function custom_taxonomy_country()
// {
//     // Set UI labels for Custom Taxonomy
//     $labels = [
//         'name'              => _x('Countries', 'Taxonomy general name', 'base-camp'),
//         'singular_name'     => _x('Country', 'Taxonomy singular name', 'base-camp'),
//         'search_items'      => __('Search Countries', 'base-camp'),
//         'all_items'         => __('All Countries', 'base-camp'),
//         'parent_item'       => __('Parent Country', 'base-camp'),
//         'parent_item_colon' => __('Parent Country:', 'base-camp'),
//         'edit_item'         => __('Edit Country', 'base-camp'),
//         'update_item'       => __('Update Country', 'base-camp'),
//         'add_new_item'      => __('Add New Country', 'base-camp'),
//         'new_item_name'     => __('New Country Name', 'base-camp'),
//         'menu_name'         => __('Country', 'base-camp'),
//     ];

//     // Set other options for Custom Taxonomy
//     // https://codex.wordpress.org/Function_Reference/register_taxonomy
//     $args = [
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//     ];

//     // Registering your Custom Taxonomy
//     register_taxonomy('country', ['post'], $args);
// }

// add_action('init', 'custom_taxonomy_country', 0);
