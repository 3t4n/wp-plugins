<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


//Adds a Wordpress Pages menu to adminbar if setting is turned on.
$apspider_which_option_is_selected = get_option('apspider_radio_editmenu');
if ($apspider_which_option_is_selected && $apspider_which_option_is_selected[0] == 'option1') { //option1=display
	add_action( 'admin_bar_menu', 'apspider_edit_wp_pg', 998 );
	add_action('apspider_extra_styles', 'apspider_extra_styles', 10);
}

//Adds a Wordpress Pages menu to Gutenberg if setting is turned on.
$apspider_which_option_is_selected = get_option('apspider_gutenberg_radio_editmenu');
if ($apspider_which_option_is_selected && $apspider_which_option_is_selected[0] == 'option1') { //option1=display
	add_action('admin_head', 'apspider_in_gutenberg', 11);
}

function apspider_edit_wp_pg( $wp_admin_bar ) {

	if (!isset($page_list)){
		global $page_list;
		global $newquery;
			$page_list = apspider_get_list_of_pages(
							$post_type_slug = 'page',
							$order_by = 'post_parent ASC, menu_order',
							$sort = 'ASC');
			$newquery = null;
	}



	global $admin_url;
	if (aps_plugin_is_active('classic-editor', 'classic-editor')){
		$suffix = "classic-editor";
	}
	else {
		$suffix = "";
	}
	apspider_create_menu(
		$wp_admin_bar,
		$page_list,
		$menu_name = 'Edit Page',
		$menu_href = $admin_url . 'post.php?post=adminpagespiderID&action=edit',
		$menu_hover = __('Edit Current Page', 'admin_page_spider'),

		$view_all_item_name = __( 'View All Pages' , 'admin-page-spider' ),
		$view_all_item_href = $admin_url . 'edit.php?post_type=page',

		$unique_slug = 'edit_wp_pg',
		$option_name = 'apspider_editmenu_name',

		$post_title_suffix = null,
		$post_href_uselinktype = null,
		$post_href_beforeid = null,
		$post_href_afterid = $admin_url . 'post.php?post=' . 'adminpgspiderID' .'&action=edit&'. $suffix
		);

	//Since the option is turned on to show the page, then we can delete the default edit link.
	add_action( 'wp_before_admin_bar_render', 'apspider_admin_bar_removal', 99);

} // End of "Edit Pages" Menu Bar creation

// Remove the 'redundant' Edit node from the admin bar that is no longer needed
function apspider_admin_bar_removal() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('edit');
}

function apspider_in_gutenberg()
{
        echo '<script type="text/javascript" class="apsgutenberg">';
        include_once 'apspider-wordpresspages-editor-js.php';
        echo '<' . '/script>';
}


//Adds an edit pencil to the Edit Page menu item
function apspider_extra_styles(){
	echo '#wp-admin-bar-apspider_edit_wp_pg>a:before,
	#wp-admin-bar-apspider_edit_wp_pg>div.ab-empty-item:before{content: "\f105"; top: 2px;}' ;
}