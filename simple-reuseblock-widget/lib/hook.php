<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// 管理画面にブロックメニューを追加する!
if ( ! function_exists( 'srbw_add_reusebrock_menu' ) ) {
	add_action( 'admin_menu', 'srbw_add_reusebrock_menu' );
	function srbw_add_reusebrock_menu() {
		add_menu_page(
			'ブロックの管理',
			'ブロックの管理',
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-admin-post',
			21
		);
	}
}

// ウィジェット表示制御!
if ( ! function_exists( 'srbw_remove_specific_widget' ) ) {
	add_filter( 'sidebars_widgets', 'srbw_remove_specific_widget', 11 );
	function srbw_remove_specific_widget( $sidebars_widgets ) {
		$srbw_widgets = get_option( 'srbw_widgets' );
		if ( $srbw_widgets ) {
			foreach ( $sidebars_widgets as $widget_area => $widget_list ) {
				foreach ( $widget_list as $pos => $widget_id ) {
					if ( $srbw_widgets[ $widget_id ] ?? false ) {
						$showtype = $srbw_widgets[ $widget_id ]['showtype'] ? implode( ',', $srbw_widgets[ $widget_id ]['showtype'] ) : '';
						if ( ! srbw_is_show( $showtype, $srbw_widgets[ $widget_id ]['postid'] ?? '', $srbw_widgets[ $widget_id ]['pageid'] ?? '', $srbw_widgets[ $widget_id ]['customtype'] ?? '' )
						&& ! is_admin()
						|| ( $srbw_widgets[ $widget_id ]['displaytype'] === 'mobile' && ! wp_is_mobile() )
						|| ( $srbw_widgets[ $widget_id ]['displaytype'] === 'pc' && wp_is_mobile() )
						|| ( $srbw_widgets[ $widget_id ]['logintype'] === 'login' && ! is_user_logged_in() )
						|| ( $srbw_widgets[ $widget_id ]['logintype'] === 'logout' && is_user_logged_in() )
						|| ( strpos( $showtype, 'first' ) !== false && is_paged() )
						) {
							unset( $sidebars_widgets[ $widget_area ][ $pos ] );
						}
					}
				}
			}
		}
		return $sidebars_widgets;
	}
}

// add_filter('widget_title', function ($widget_title, $instance, $widget_id) {
// $srbw_widgets = get_option('srbw_widgets');
// if (isset($srbw_widgets[$widget_id])) {
// return;
// } else {
// return ($widget_title);
// }
// },10,3);
