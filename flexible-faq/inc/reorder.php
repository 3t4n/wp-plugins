<?php 
add_action( 'wp_ajax_simple_page_ordering', 'reorder_do_faq_ordering' );
function reorder_do_faq_ordering() {
	if ( !current_user_can('edit_others_pages') || !isset($_POST['id']) || empty($_POST['id']) || ( !isset($_POST['previd']) && !isset($_POST['nextid']) ) )
		die(-1);
	
	if ( !$post = get_post( $_POST['id'] ) )
		die(-1);
	
	$previd = isset($_POST['previd']) ? $_POST['previd'] : false;
	$nextid = isset($_POST['nextid']) ? $_POST['nextid'] : false;
    
	if ( $previd ) {
		$siblings = get_posts(array( 'depth' => 1, 'numberposts' => -1, 'post_type' => $post->post_type, 'post_status' => 'publish,pending,draft,future,private', 'post_parent' => $post->post_parent, 'orderby' => 'menu_order', 'order' => 'ASC', 'exclude' => $post->ID ));
		foreach( $siblings as $sibling ) :
			if ( $sibling->ID == $previd ) {
				$menu_order = $sibling->menu_order + 1;
				wp_update_post(array( 'ID' => $post->ID, 'menu_order' => $menu_order ));
				continue;
			}
			if ( isset($menu_order) && $menu_order < $sibling->menu_order )
				break;
			if ( isset($menu_order) ) {
				$menu_order++;
				wp_update_post(array( 'ID' => $sibling->ID, 'menu_order' => $menu_order ));
			}
		endforeach;
	}
	if ( !isset($menu_order) && $nextid ) {
		$siblings = get_posts(array( 'depth' => 1, 'numberposts' => -1, 'post_type' => $post->post_type, 'post_status' => 'publish,pending,draft,future,private', 'post_parent' => $post->post_parent, 'orderby' => 'menu_order', 'order' => 'DESC', 'exclude' => $post->ID ));
		foreach( $siblings as $sibling ) :
			if ( $sibling->ID == $nextid ) {
				$menu_order = $sibling->menu_order - 1;
				wp_update_post(array( 'ID' => $post->ID, 'menu_order' => $menu_order ));
				continue;
			}
			if ( isset($menu_order) && $menu_order > $sibling->menu_order )
				break;
			if ( isset($menu_order) ) {
				$menu_order--;
				wp_update_post(array( 'ID' => $sibling->ID, 'menu_order' => $menu_order ));
			}
		endforeach;
	}
	$children = get_posts(array( 'depth' => 1, 'numberposts' => 1, 'post_type' => $post->post_type, 'post_status' => 'publish,pending,draft,future,private', 'post_parent' => $post->ID ));
	if ( !empty($children) )
		die('children');
	die();
}