<?php

/**
 * Register scripts and styles and enqueue them
 */
function toto_scripts_and_styles()
{
    // Register styles
	wp_register_style('base-camp-styles', assets('app.css'), [], '', 'all');

    // Register scripts
	wp_register_script('base-camp-vendor', assets('vendor.js'), [], '', true);
	wp_register_script('base-camp-scripts', assets('app.js'), ['base-camp-vendor'], '', true);

    // Enqueue scripts and styles
	wp_enqueue_script('base-camp-scripts');
	wp_enqueue_script('base-camp-vendor');
	wp_enqueue_style('base-camp-styles');

    // comment reply script for threaded comments
	if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
		wp_enqueue_script('comment-reply');
	}

	// Register ajax
	$ajaxurl = '';
	if (in_array('sitepress-multilingual-cms/sitepress.php', get_option('active_plugins'))) {
		$ajaxurl .= admin_url('admin-ajax.php?lang=' . ICL_LANGUAGE_CODE);
	} else {
		$ajaxurl .= admin_url('admin-ajax.php');
	}

	wp_localize_script('theme-scripts', 'themeajax', array(
		'ajaxurl' => $ajaxurl,
		'noposts' => esc_html__('No items found', 'theme-name'),
		'loadmore' => esc_html__('Load more', 'theme-name'),
		'loading' => esc_html__('Loading...', 'theme-name')
	));
}

add_action('wp_enqueue_scripts', 'toto_scripts_and_styles', 999);

/**
 * Register Login Page scripts and styles and enqueue them
 */
function toto_login_scripts_and_styles()
{
    // Register styles
	wp_register_style('base-camp-login-styles', assets('login.css'), [], '', 'all');

    // Enqueue scripts and styles
	wp_enqueue_style('base-camp-login-styles');
}

add_action('login_enqueue_scripts', 'toto_login_scripts_and_styles', 999);

/**
 * Register Admin Page scripts and styles and enqueue them
 */
function toto_admin_scripts_and_styles()
{
    // Register styles
	wp_register_style('base-camp-admin-styles', assets('admin.css'), [], '', 'all');

    // Enqueue scripts and styles
	wp_enqueue_style('base-camp-admin-styles');
}

add_action('admin_enqueue_scripts', 'toto_admin_scripts_and_styles', 999);
