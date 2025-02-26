<?php
global $wpdb;
$s_tables_manager_fields = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[s-emailnospam-tables-manager-fields]'" );
if (!$s_tables_manager_fields) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' => 'Manager Fields',
'post_name' => 'manager-list',
'post_content' => '[login-logout-shortcode-simple][s-emailnospam-tables-manager-fields]',
'post_status' => 'private',
'comment_status' => 'closed',   
'ping_status' => 'closed',      
));

if ($post_id) {
add_post_meta($post_id, '[s-emailnospam-tables-manager-fields]', 'Manager Fields');
}
}


// Menu start

$menu_ens = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE post_name = 'm-emailnospam-tables-manager-fields'" );
if (!$menu_ens) {
// menu na tabela Post
$post_id_m = wp_insert_post(array (
'post_type' => 'nav_menu_item',
'post_title' => 'Manager Fields',
'post_content' => '',
'post_name' => 'm-emailnospam-tables-manager-fields',
'post_status' => 'private',
'menu_order' => 10,
'comment_status' => 'closed',   
'ping_status' => 'closed',   
'post_author'   => 1,   
));

// insert post meta
add_post_meta($post_id_m, '_menu_item_type', 'post_type');
add_post_meta($post_id_m, '_menu_item_menu_item_parent', '0');
add_post_meta($post_id_m, '_menu_item_object_id', $post_id);
add_post_meta($post_id_m, '_menu_item_object', 'page');
add_post_meta($post_id_m, '_menu_item_target', '');
add_post_meta($post_id_m, '_menu_item_classes', 'a:1:{i:0;s:0:"";}');
add_post_meta($post_id_m, '_menu_item_xfn', '');
add_post_meta($post_id_m, '_menu_item_url', '');

$term_id = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE slug = 'emailnospam-menu'" );
$term_taxonomy_id = $wpdb->get_var( "SELECT term_taxonomy_id FROM $wpdb->term_taxonomy WHERE term_id = $term_id" );

// tabela term_relationships
$table_name = $wpdb->prefix . 'term_relationships';
$insert="INSERT INTO $table_name
		(
		object_id, term_taxonomy_id, term_order
		)
		VALUES
		(
		$post_id_m, $term_taxonomy_id, 0
		)
		";
$wpdb->query($insert);

}
//// menu end


echo '&nbsp;<span class="fa fa-check"></span>&nbsp;'.esc_html( __('Pagina criada', 'emails-no-spam')).' - '.$post_id.'<br>';
?>