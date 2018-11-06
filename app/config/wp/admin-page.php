<?php

/**
 * Add favicon to Admin Page
 */
add_action('admin_head', function () {
    echo '<link rel="shortcut icon" href="' . images_path('favicon.png') . '" />';
});

 /* Clean up Admin from unwanted menu items and metaboxes
   ========================================================================== */

  // Remove welcome widget
remove_action('welcome_panel', 'wp_welcome_panel');

function toto_clean_admin()
{

    // Remove parent menu items
    remove_menu_page('edit-comments.php');
    // remove_menu_page('edit.php');

    // Remove submenu items
    remove_submenu_page('options-general.php', 'options-discussion.php');
}
add_action('admin_menu', 'toto_clean_admin');

  // Remove meta boxes
function toto_remove_meta_boxes()
{
    // Remove metaboxes,
    $post_types = array(
        'events',
        'stories',
        'page'
    );

    foreach ($post_types as $post_type) {
        remove_meta_box('commentstatusdiv', $post_type, 'normal');
        remove_meta_box('commentsdiv', $post_type, 'normal');
    }

    remove_meta_box('postimagediv', 'page', 'side');
}
add_action('add_meta_boxes', 'toto_remove_meta_boxes');

/* Remove unwanted dashboard widgets
   ========================================================================== */

function toto_remove_dashboard_widgets()
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['tribe_dashboard_widget']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'toto_remove_dashboard_widgets');


/* Add Custom Post Types to 'At a Glance' widget
   ========================================================================== */

function toto_at_glance_content()
{
    $args = array(
        'public' => true,
        '_builtin' => false
    );

    $output = 'object';
    $operator = 'and';
    $post_types = get_post_types($args, $output, $operator);

    foreach ($post_types as $post_type) {
        $num_posts = wp_count_posts($post_type->name);
        $num = number_format_i18n($num_posts->publish);
        $text = _n($post_type->labels->singular_name, $post_type->labels->name, intval($num_posts->publish));

        if (current_user_can('edit_posts')) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
        }
    }
}
add_action('dashboard_glance_items', 'toto_at_glance_content');
