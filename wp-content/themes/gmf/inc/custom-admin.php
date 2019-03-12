<?php

/* Custom Functions for GMF
 * Requires: custom-settings.php
 *
 * By: Mark Caron (mark.caron@gmail.com)
 *
**/

add_action('after_setup_theme', 'client_setup');
function client_setup() {
	if( is_admin() ) {
		add_action('admin_menu', 'client_options'); /* from custom-settings.php */
	}
}

function client_options() {
	$icon_path = 'dashicons-vault';
	// add_menu_page(CLIENT_NAME . ' Settings', CLIENT_NAME, 'manage_options', 'custom-settings', 'custom_settings', $icon_path, 61); // below appearance. http://codex.wordpress.org/Function_Reference/register_post_type

	// add_submenu_page('custom-settings', 'Event Settings', 'Event Settings', 'manage_options', 'custom-event-settings', 'custom_event_settings');
}
