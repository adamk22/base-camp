<?php

/* ==========================================================================
1. Edit Alt. Admin role capabilities (All admins except DWVD Admin account)
========================================================================== */

add_action('admin_menu', 'toto_edit_alt_admins_capabilities');
function toto_edit_alt_admins_capabilities()
{
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
		if ($current_user->data->ID !== "1") {
			remove_menu_page('edit.php?post_type=acf-field-group'); // Hide ACF Fields
			remove_menu_page('plugins.php'); // Hide Plugins
		}
	}
}
