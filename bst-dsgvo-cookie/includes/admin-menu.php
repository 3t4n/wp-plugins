<?php
// add_submenu_page('parent slug', 'page title', 'menu title', 'capabilty', 'slug url', 'output funtion');
function bst_add_options_menu() {
	add_submenu_page('options-general.php', __('BST DSGVO Cookie', 'bst-dsgvo-cookie'), 'BST DSGVO Cookie', 'manage_options', 'bst-settings', 'bst_options_page');
}
add_action('admin_menu', 'bst_add_options_menu');
?>