<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

$plugin = EOS_DP_PLUGIN_BASE_NAME;
define( 'EOS_DP_DOCUMENTATION_URL','https://freesoul-deactivate-plugins.com/how-deactivate-plugiins-on-specific-pages/' );

if( eos_dp_is_fdp_page() ){
	add_action( 'current_screen','eos_dp_remove_help_tabs',999999);
	$dir = EOS_DP_PLUGIN_DIR.'/admin/templates/';
	require_once EOS_DP_PLUGIN_DIR.'/admin/abstracts/abstract-fdp-superclass.php';
	require_once EOS_DP_PLUGIN_DIR.'/admin/abstracts/abstract-matrix.php';
	require_once $dir.'partials/eos-dp-navigation.php';
	require_once $dir.'partials/eos-dp-table-head.php';
	require_once $dir.'partials/eos-dp-footer.php';
	foreach( array(
		array( array( 'eos_dp_home','eos_dp_menu' ),'pages/eos-dp-singles.php' ),
		array( array( 'eos_dp_by_post_type' ),'pages/eos-dp-post-type.php' ),
		array( array( 'eos_dp_by_archive' ),'pages/eos-dp-archive.php' ),
		array( array( 'eos_dp_by_term_archive' ),'pages/eos-dp-terms-archive.php' ),
		array( array( 'eos_dp_mobile' ),'pages/eos-dp-mobile.php' ),
		array( array( 'eos_dp_search' ),'pages/eos-dp-search.php' ),
		array( array( 'eos_dp_url' ),'pages/eos-dp-url.php' ),
		array( array( 'eos_dp_admin_url' ),'pages/eos-dp-backend-url.php' ),
		array( array( 'eos_dp_integration' ),'pages/eos-dp-integration.php' ),
		array( array( 'eos_dp_admin' ),'pages/eos-dp-backend.php' ),
		array( array( 'eos_dp_smoke_tests' ),'pages/eos-dp-smoke-tests.php' ),
		array( array( 'eos_dp_firing_order' ),'pages/eos-dp-firing-order.php' ),
		array( array( 'eos_dp_help' ),'pages/eos-dp-help.php' ),
		array( array( 'eos_dp_create_plugin' ),'pages/eos-dp-create-plugin.php' ),
		array( array( 'eos_dp_favorite_plugins' ),'pages/eos-dp-favorite-plugins.php' ),
		array( array( 'eos_dp_roles_manager' ),'pages/eos-dp-roles-manager.php' )
	) as $arr ){
		if( isset( $_GET['page'] ) && in_array( $_GET['page'],$arr[0] ) ){
			require_once $dir.$arr[1];
		}
	}
	add_filter( 'wpml_show_admin_language_switcher','__return_false' );
	add_filter( 'pll_admin_languages_filter','__return_empty_array' );
}

//Remove help tab in the settings pages
function eos_dp_remove_help_tabs(){
	$screen = get_current_screen();
	$screen->remove_help_tabs();
}
//It adds a settings link to the action links in the plugins page
add_filter( "plugin_action_links_$plugin", 'eos_dp_plugin_add_settings_link' );

//It redirects to the plugin settings page on successfully plugin activation
add_action( 'admin_init', 'eos_dp_redirect_to_settings' );

//It displays the admin notices
add_action( 'admin_notices','eos_dp_admin_notices',999999 );

//It adds the plugin setting page under plugins menu
add_action( 'admin_menu','eos_dp_options_page',999 );

add_filter( 'admin_title', 'eos_dp_admin_page_title',99, 2 );
//It set the browser tab title depending the options page
function eos_dp_admin_page_title( $title,$sep ){
	$labels = array(
		'scripts' => __( 'Scripts','eos-dp' ),
		'styles' => __( 'Styles','eos-dp' )
	);
	$titles = array(
		'common_issues' => __( 'Common issues','eos-dp' ),
		'shortcuts' => __( 'Shortcuts','eos-dp' ),
		'eos_dp_admin_url' => __( 'Backend URLs','eos-dp' ),
		'eos_dp_admin' => __( 'Backend','eos-dp' ),
		'eos_dp_ajax' => __( 'Custom actions','eos-dp' ),
		'eos_dp_by_archive' => __( 'Archives','eos-dp' ),
		'eos_dp_by_post_type' => __( 'Post Types','eos-dp' ),
		'eos_dp_by_term_archive' => __( 'Terms Archives','eos-dp' ),
		'eos_dp_create_plugin' => __( 'New Plugin','eos-dp' ),
		'eos_dp_documentation' => __( 'Documentation','eos-dp' ),
		'eos_dp_favorite_plugins' => __( 'Favorite Plugins','eos-dp' ),
		'eos_dp_firing_order' => __( 'Firing Order','eos-dp' ),
		'eos_dp_help' => __( 'Help','eos-dp' ),
		'eos_dp_menu' => __( 'Singles','eos-dp' ),
		'eos_dp_mobile' => __( 'Mobile','eos-dp' ),
		'eos_dp_desktop' => __( 'Desktop','eos-dp' ),
		'eos_dp_pro_bulk_actions' => __( 'Bulk Actions','eos-dp' ),
		'eos_dp_pro_general_bloat' => __( 'General bloat','eos-dp' ),
		'eos_dp_pro_import_export' => __( 'Settings Import/Export','eos-dp' ),
		'eos_dp_pro_hooks_recorder' => __( 'Hooks Recorder','eos-dp' ),
		'eos_dp_pro_plugins' => __( 'Plugin Settings','eos-dp' ),
		'eos_dp_pro_settings' => __( 'Events','eos-dp' ),
		'eos_dp_report' => __( 'Reports','eos-dp' ),
		'eos_dp_roles_manager' => __( 'Role Manager','eos-dp' ),
		'eos_dp_search' => __( 'Search','eos-dp' ),
		'eos_dp_smoke_tests' => __( 'Plugin Tests','eos-dp' ),
		'eos_dp_testing' => __( 'Testing Settings','eos-dp' ),
		'eos_dp_url' => __( 'Custom URLs','eos-dp' ),
		'flowchart' => __( 'Options priorities','eos-dp' )
	);
	if( isset( $_GET['asset_type'] ) && in_array( $_GET['asset_type'],array_keys( $labels ) ) ){
		$titles['eos_dp_pro_assets'] = sprintf( __( 'Assets | %s','eos-dp' ),esc_html( $labels[$_GET['asset_type']] ) );
	}
	if( isset( $_GET['page'] ) && in_array( $_GET['page'],array_keys( $titles ) ) ){
		if( isset( $_GET['eos_dp_home'] ) && 'true' === $_GET['eos_dp_home'] ) return '&#128268; '.__( 'Homepage','eos-dp' );
		if( isset( $_GET['tab'] ) ) return '&#128268; '.esc_html( sprintf( __( '%s | %s','eos-dp' ),$titles[$_GET['page']],$titles[$_GET['tab']] ) );
		return '&#128268; '.esc_html( $titles[$_GET['page']] );
	}
	if( isset( $_GET['eos_dp_info'] ) && 'true' == $_GET['eos_dp_info'] ){
		if( isset( $_GET['plugin'] ) ){
			return __( 'Plugin Details','eos-dp' );
		}
	}
	return $title;
}

//Remove other admin notices on the settings pages
function eos_dp_remove_other_admin_notices(){
	remove_all_actions( 'admin_notices' );
	remove_all_actions( 'network_admin_notices' );
	remove_all_actions( 'all_admin_notices' );
	remove_all_actions( 'user_admin_notices' );
	add_action( 'admin_notices','eos_dp_admin_notices' );
}

if( isset( $_GET['page'] ) && in_array( $_GET['page'],array( 'eos_dp_admin','eos_dp_ajax','eos_dp_integration' ) ) ){
	add_action( 'eos_dp_after_table_head_columns','eos_dp_add_theme_to_table_head' );
}
//It adds the theme column in the table header
function eos_dp_add_theme_to_table_head(){
	$theme = wp_get_theme();
	if( !is_object( $theme ) ) return;
	$theme_name = strtoupper( $theme->get( 'Name' ) );
	$theme_name_short = substr( $theme_name,0,28 );
	$theme_name_short = $theme_name === $theme_name_short ? $theme_name : strtoupper( $theme_name_short ).' ...';
	?>
	<th class="eos-dp-name-th eos-dp-name-th-theme">
		<div>
			<div id="eos-dp-theme-name" class="eos-dp-theme-name" data-theme="<?php echo esc_attr( $theme->get( 'TextDomain' ) ); ?>" title="<?php echo esc_attr( $theme_name ); ?>" data-path="<?php echo get_stylesheet_directory_uri(); ?>">
				<span><?php echo esc_html( $theme_name_short ); ?></span>
			</div>
			<div id="eos-dp-global-chk-col-wrp" class="eos-dp-global-chk-col-wrp">
				<div class="eos-dp-not-active-wrp"><input title="<?php printf( __( 'Activate/deactivate %s everywhere','eos-dp' ),esc_attr( $theme_name ) ); ?>" data-col="theme" class="eos-dp-global-chk-col" type="checkbox" /></div>
			</div>
			<div class="fdp-p-n">1</div>
		</div>
	</th>
	<?php
}

add_action( 'eos_dp_pre_table_head','eos_dp_pro_nonces' );
//It displays the auto settings button and related messages
function eos_dp_pro_nonces(){
	wp_nonce_field( 'eos_dp_pro_auto_settings', 'eos_dp_pro_auto_settings' );
	wp_nonce_field( 'eos_dp_plugins_contributions', 'eos_dp_plugins_contributions' );
	wp_nonce_field( 'eos_dp_pro_errors_check', 'eos_dp_pro_errors_check' );
	wp_nonce_field( 'eos_dp_pro_gt_metrix_test', 'eos_dp_pro_gt_metrix_test' );
	wp_nonce_field( 'eos_dp_pro_gpsi_test', 'eos_dp_pro_gpsi_test' );

}

add_action( 'eos_dp_action_buttons','eos_dp_home_autosuggest_action_buttons',10 );

//It adds premium action buttons
function eos_dp_home_autosuggest_action_buttons(){
	if( isset( $_GET['eos_dp_home'] ) ) : ?>
	<a href="#" class="eos-dp-pro-autosettings" title="<?php _e( 'Suggest plugins','eos-dp' ); ?>"><span class="dashicons dashicons-plugins-checked"></span></a>
	<?php endif;
}

add_filter( 'admin_body_class', 'eos_dp_admin_body_class' );
// Adds the class to the body tag in the dashboard according the options page.
function eos_dp_admin_body_class( $classes ) {
	if( isset( $_GET['page'] ) && eos_dp_is_fdp_page() || isset( $_GET['fdp_add_favorites'] ) || ( isset( $_GET['page'] ) && 'eos_dp_code_browser' === $_GET['page'] ) ){
		global $fdp_plugins_count;
		$classes .= ' eos-dp-'.esc_attr( $_GET['page'] );
		$classes .= ' fdp';
		if( isset( $_GET['eos_dp_home'] ) && 'true' === $_GET['eos_dp_home'] ){
			$classes .= ' eos-dp-homepage';
		}
		if( ( isset( $_GET['full-screen'] ) && 'true' === $_GET['full-screen'] ) || ( isset( $_COOKIE['fdp-full-screen'] ) && 'true' === $_COOKIE['fdp-full-screen'] ) ){
			$classes .= ' fdp-full-screen';
		}
		if( $fdp_plugins_count > 15 ){
			$classes .= ' eos-dp-more-than-15-plugins';
			if( $fdp_plugins_count > 25 ){
				$classes .= ' fdp-more-than-25-plugins folded';
			}
		}
		else{
			$classes .= ' eos-dp-less-than-15-plugins';
		}
		$classes .= ' fdp-'.esc_attr( $_GET['page'] );
		if( in_array( $_GET['page'],array( 'eos_dp_mobile','eos_dp_desktop','eos_dp_search' ) ) ){
			$classes .= ' fdp-one-column';
		}
		$main_opts = eos_dp_get_option( 'eos_dp_pro_main' );
		$suff = substr( sanitize_key( md5( ABSPATH ) ),0,4 );
		if( $main_opts && isset( $main_opts['license_validity_'.$suff] ) && 'not_valid' === $main_opts['license_validity_'.$suff] ){
			$classes .= ' fdp-pro-unvalid-'.$suff;
		}
	}
	return $classes;
}

if( isset( $_GET['eos_dp_preview'] ) && isset( $_GET['js'] ) && 'off' === $_GET['js'] ){
	add_action( 'admin_head','eos_dp_disable_javascript',10 );
}

add_action( 'admin_init','eos_dp_redirect_home_settings' );
function eos_dp_redirect_home_settings(){
	//Redirect to homepage settings
	if( isset( $_GET['eos_dp_home'] ) && 'true' === $_GET['eos_dp_home'] ){
		$show_on_front = eos_dp_get_option( 'show_on_front' );
		if( isset( $_GET['page'] ) && 'eos_dp_menu' === $_GET['page'] && 'posts' === $show_on_front ){
			wp_safe_redirect( admin_url( 'admin.php?page=eos_dp_by_archive&eos_dp_home=true' ) );
			exit;
		}
		if( isset( $_GET['page'] ) && 'eos_dp_by_archive' === $_GET['page'] && 'page' === $show_on_front ){
			if( absint( eos_dp_get_option( 'page_on_front' ) ) > 0 ){
				wp_safe_redirect( admin_url( 'admin.php?page=eos_dp_menu&eos_dp_home=true' ) );
				exit;
			}
		}
	}
}

add_filter( 'bulk_actions-edit-post','eos_dp_my_bulk_actions' );
add_filter( 'bulk_actions-edit-page','eos_dp_my_bulk_actions' );
add_filter( 'bulk_actions-edit-product','eos_dp_my_bulk_actions' );
 //Add bulk action to disable unused plugins on posts, pages, and products if any
function eos_dp_my_bulk_actions( $actions ) {
	$actions['eos_dp_disable_plugins'] = __( 'Set unused plugins','eos-dp' );
	return $actions;

}

add_action( 'handle_bulk_actions-edit-post', 'eos_dp_bulk_action_handler',10,3 );
add_action( 'handle_bulk_actions-edit-page', 'eos_dp_bulk_action_handler',10,3 );
add_action( 'handle_bulk_actions-edit-product', 'eos_dp_bulk_action_handler',10,3 );
//Handle bulk action to disable plugins on posts, pages, and products if any
function eos_dp_bulk_action_handler( $redirect,$action,$ids ) {
	if ( 'eos_dp_disable_plugins' === $action && !empty( $ids ) ){
		$post_type = get_post_type( $ids[0] );
		$redirect = add_query_arg(
			array(
				'eos_dp_post_type' => $post_type,
				'eos_dp_post_in' => implode( '-',$ids ),
				'posts_per_page' => count( $ids )
			),
			admin_url( 'admin.php?page=eos_dp_menu' )
		);
		wp_redirect( $redirect );
		exit;
	}
	return $redirect;
}

add_filter( 'eos_dp_user_can_metabox','eos_dp_pro_can_metabox' );
//Return if current user can see the FDP section in single post_status
function eos_dp_pro_can_metabox( $can ){
	$fdp_caps = eos_dp_user_capabilities();
	if( $fdp_caps && is_array( $fdp_caps ) && in_array( 'single_settings',array_keys( $fdp_caps ) ) && !$fdp_caps['single_settings'] ){
		return false;
	}
	return $can;
}

add_action( 'admin_menu','eos_dp_pro_admin_menu_filters' );
//Fire filters in admmin_menu actions
function eos_dp_pro_admin_menu_filters(){
	add_filter( 'eos_dp_user_can_settings','eos_dp_pro_can_settings' );
}

//Return if current user can see the FDP settings
function eos_dp_pro_can_settings( $can ){
	$fdp_caps = eos_dp_user_capabilities();
	if( $fdp_caps && is_array( $fdp_caps ) && in_array( 'global_settings',$fdp_caps ) && !$fdp_caps['global_settings'] ){
		return false;
	}
	return $can;
}

add_filter( 'all_plugins','eos_dp_plugins_in_list' );
//Remove plugins from plugins table in the page wp-admin/plugins.php according to the FDP Settings
function eos_dp_plugins_in_list( $plugins ){
	$fdp_caps = eos_dp_user_capabilities();
	if( $fdp_caps && is_array( $fdp_caps ) && in_array( 'see_plugin',$fdp_caps ) && !$fdp_caps['see_plugin'] ){
		if( in_array( EOS_DP_PLUGIN_BASE_NAME,array_keys( $plugins ) ) ){
			unset( $plugins[EOS_DP_PLUGIN_BASE_NAME] );
		}
		if( in_array( EOS_DP_PRO_PLUGIN_BASE_NAME,array_keys( $plugins ) ) ){
			unset( $plugins[EOS_DP_PRO_PLUGIN_BASE_NAME] );
		}
	}
	return $plugins;
}

add_action( 'admin_menu','eos_dp_remove_menu_items' );
//Remove menu items for the Plugins manager
function eos_dp_remove_menu_items(){
	$current_user = wp_get_current_user();
	if( in_array( 'fdp_plugins_manager',array_keys( $current_user->caps ) ) ){
		remove_menu_page( 'plugins.php' );
		remove_menu_page( 'options-general.php' );
		if( ( isset( $GLOBALS['pagenow'] ) && 'plugins.php' === $GLOBALS['pagenow'] ) || ( isset( $_GET['page'] ) && 'eos_dp_create_plugin' === $_GET['page'] ) ){
			wp_redirect( admin_url( 'admin.php?page=eos_dp_by_post_type' ) );
			exit;
		}
	}
}

if( isset( $_GET['fdp_add_favorites'] ) && 'true' ===  $_GET['fdp_add_favorites'] ){
	//Actions and filters to clean the page of plugins
	add_filter( 'admin_body_class','eos_dp_favorite_plugins_add_admin_body_class' );
	add_action( 'admin_menu','eos_dp_clean_plugins_page',99999999 );
	add_action( 'admin_bar_menu','eos_dp_clean_top_bar',999999);
	add_action( 'install_plugins_pre_upload','eos_dp_favorite_plugins' );
}
if( isset( $_GET['page'] ) && 'eos_dp_firing_order' ===  $_GET['page'] ){
	//Inline style for the firing order page
	add_action( 'admin_head','eos_dp_firing_order_inline' );
}
if( isset( $_GET['page'] ) && false !== strpos( $_GET['page'],'eos_dp_' ) || ( isset( $_GET['fdp_add_favorites'] ) ) ){
	//Clean FDP backend pages and add inline style
	add_action( 'admin_print_scripts',function(){
		remove_all_actions( 'admin_head' );
		do_action( 'fdp_after_admin_head_removed' );
		remove_all_actions( 'admin_footer' );
		do_action( 'fdp_after_admin_footer_removed' );
		if( isset( $_GET['fdp_add_favorites'] ) && 'true' ===  $_GET['fdp_add_favorites'] ){
			add_action( 'admin_head','eos_dp_favorite_plugins_inline' );
		}
		add_action( 'admin_head','eos_dp_general_inline_style' );
	} );
}
//General inline style for the backend
function eos_dp_general_inline_style(){
	?>
	<style id="fdp-inline-backend" type="text/css">
	.fdp-top-bar-open #fdp-visit-site{display:none}
	html.wp-toolbar{padding-top:0}
	body.fdp #wpwrap #wpcontent #wpbody #wpbody-content .update-nag,#wpwrap #wpcontent #wpbody #wpbody-content .update,#wpwrap #wpcontent #wpbody #wpbody-content .updated,#wpwrap #wpcontent #wpbody #wpbody-content .notice:not(.eos-dp-notice)<?php echo 'eos_dp_code_browser' === $_GET['page'] ? ',#wpwrap #wpcontent #wpbody #wpbody-content div:not(.CodeMirror,.CodeMirror div)' : ''; ?>{display:none !important}
	body.fdp .update-nag,body.fdp .update,body.fdp .updated,body.fdp .notice:not(.eos-dp-notice),.fdp #wpadminbar .wp-ui-notification{display:none !important}
	body.fdp div#wpbody-content{display:block !important}
	body.fdp #adminmenu .menu-top:hover .wp-submenu{top:-1px}
	#eos-dp-pre-nav .dashicons{height:20px}
	#adminmenu img{max-width:20px}
	#eos-dp-menu-section #eos-dp-setts td:first-child{width:350px;max-width:350px}
	.eos-dp-post-name-wrp{min-width:200px}
	#eos-dp-menu-section .eos-dp-title{max-width:275px;overflow-x:hidden;display:inline-block}
	.wp-toolbar .fdp #wpadminbar{
    top: -40px !important;
		transition: top 0.5s linear
	}
	.wp-toolbar .fdp-top-bar-open #wpadminbar{
    top: 0 !important
	}
	.wp-toolbar .fdp-top-bar-open #wpwrap #wpcontent {
    margin-top: 32px !important;
    transition: margin-top 0.5s linear;
	}
	#fdp-toggle-top-bar-wrp{
		top:0
	}
	.fdp-top-bar-open #fdp-toggle-top-bar-wrp{
		top: 42px
	}
	.fdp-top-bar-open #fdp-toggle-top-bar-wrp span:before{
			content: "\f142";
	}
	.fdp .menu-top img {
	    max-height: 32px;
	}
	<?php do_action( 'fdp_after_general_inline_style' ); ?>
	</style>
	<?php
}
//Inline style for the firing order page
function eos_dp_firing_order_inline(){
	?>
	<style id="fdp-firing-order" type="text/css">.eos-dp-firing-order .eos-dp-plugin{height:32px;padding:6px 0;border:none;margin:3px 0;max-width:600px}</style>
	<?php
}
//Add inline style in the page of plugins
function eos_dp_favorite_plugins(){
	wp_create_nonce( 'eos_dp_export_favorites_list','eos_dp_export_favorites_list' );
	?>
	<input type="hidden" id="fdp_favorites_list" name="fdp_favorites_list" />
	<?php
}
function eos_dp_favorite_plugins_inline(){
	wp_enqueue_script( 'fdp-favorite-plugins',EOS_DP_PLUGIN_URL.'/admin/js/fdp-favorites.js',array( 'jquery' ),EOS_DP_VERSION,true );
	$extra_style = '';
	$active_plugins = eos_dp_active_plugins();
	foreach( $active_plugins as $plugin ){
		$extra_style .= '.fdp-favorite-plugins .plugin-card-'.esc_attr( dirname( $plugin ) ).',';
	}
	$extra_style = rtrim( $extra_style,',' );
	if( '' !== $extra_style ){
		$extra_style .= '{opacity:0.3;pointer-events:none}';
	}
	?>
	<style id="fdp-favorite-plugins-css" type="text/css">
	.fdp-favorite-plugins .plugin-card,.fdp-favorite-plugins .plugin-card.fdp-added-to-favorites:hover{cursor:pointer;opacity:0.4}
	.fdp-favorite-plugins .plugin-card a{pointer-events:none;font-size:14px}
	.fdp-favorite-plugins .plugin-card:hover,.fdp-favorite-plugins .fdp-added-to-favorites{opacity:1}
	.fdp-favorite-plugins h1.wp-heading-inline,.fdp-favorite-plugins .filter-links,.fdp-favorite-plugins .tablenav,.fdp-favorite-plugins .desc p:not(.authors),.fdp-favorite-plugins .action-links,.fdp-favorite-plugins .plugin-card-bottom,.fdp-favorite-plugins #wpfooter,.fdp-favorite-plugins .upload-view-toggle,.fdp-favorite-plugins #contextual-help-link,.fdp-favorite-plugins #wpadminbar,.fdp-favorite-plugins #adminmenumain,.fdp-favorite-plugins #wpadminbar{display:none !important}
	.fdp-favorite-plugins .plugin-icon{position:absolute;display:block;width:64px;height:64px;margin: auto auto;left: 50%;margin-left:-32px;bottom:0}
	.fdp-favorite-plugins .plugin-card .name,.fdp-favorite-plugins .plugin-card .desc{margin-left:0;margin-right:0}
	.fdp-favorite-plugins .plugin-card{width:24%}
	.fdp-favorite-plugins .plugin-card-top{min-height:180px}
	.fdp-favorite-plugins .plugin-card{clear:none !important}
	.fdp-favorite-plugins p.authors, .fdp-favorite-plugins p.authors a{font-size:10px}
	.fdp-favorite-plugins .plugin-card h3{min-height:150px}
	.fdp-favorite-plugins form#plugin-filter{margin-top:16px}
	.fdp-favorite-plugins #wpcontent{margin-left: auto}
	.fdp-favorite-plugins .wp-filter{position:fixed;z-index:999999;margin-top:0}
	.fdp-favorite-plugins #the-list{margin-top:75px;text-align:center}
	<?php
	echo $extra_style;
	?>
	</style>
	<?php
}
// Add download link to admin top  bar
function eos_dp_clean_top_bar( $wp_admin_bar ){
	$all_toolbar_nodes = $wp_admin_bar->get_nodes();
  foreach ( $all_toolbar_nodes as $node ) {
    $wp_admin_bar->remove_node( $node->id );
  }
	return $wp_admin_bar;
}

//Clean page of plugins
function eos_dp_clean_plugins_page(){
	remove_all_actions( 'admin_menu' );
	remove_all_actions( 'admin_notices' );
	remove_all_actions( 'network_admin_notices' );
	remove_all_actions( 'all_admin_notices' );
	remove_all_actions( 'user_admin_notices' );
	remove_all_actions( 'admin_footer' );
}

//Add admin body class in the page of plugins
function eos_dp_favorite_plugins_add_admin_body_class( $classes ) {
	$classes .= ' fdp-favorite-plugins';
	return $classes;
}

//Return iframe to search plugins
function eos_dp_get_plugins_iframe(){
	return '<iframe style="width:100%;min-height:800px" src="'.admin_url( 'plugin-install.php?tab=search&type=term&fdp_add_favorites=true' ).'"></iframe>';
}

add_filter( 'plugin_install_action_links','eos_dp_plugin_action_links',10,2 );
//Add useful links in the plugins pages
function eos_dp_plugin_action_links( $action_links, $plugin ){
	$action_links[] = '<a href="'.add_query_arg( 'text',$plugin['slug'],'https://wpscan.com/search' ).'" target="_blank" rel="noopener">'.__( 'Vulnerabilities','eos-dp' ).'</a>';
	$action_links[] = '<a href="https://plugintests.com/plugins/wporg/'.$plugin['slug'].'/latest" target="_blank" rel="noopener">'.__( 'Smoke tests','eos-dp' ).'</a>';
	return $action_links;
}

add_action( 'plugins_loaded',function(){
	//Prevent that the theme is disabled in the FDP settings pages (e.g. Oxygen)
	if( !eos_dp_is_fdp_page() ) return;
	remove_all_filters( 'template_directory' );
	remove_all_filters( 'stylesheet_directory' );
	remove_all_filters( 'template' );
	remove_all_filters( 'template_include' );
} );

add_action( 'admin_init','eos_dp_clean_settings_pages' );
//Clean FDP settings pages
function eos_dp_clean_settings_pages() {
	if( !eos_dp_is_fdp_page() ) return;
	remove_all_actions( 'current_screen' );

  // wp_deregister_script('admin-bar');
  // wp_deregister_style('admin-bar');
  // remove_action('admin_init', '_wp_admin_bar_init');
  // remove_action('in_admin_header', 'wp_admin_bar_render', 0);
}

add_filter( 'update_footer','eos_dp_admin_footer',20 );
//Add plugin name and version to admin footer
function eos_dp_admin_footer( $text ){
	if( eos_dp_is_fdp_page() ) return;
	return $text;
}

add_action( 'admin_init', function(){
//Send headers to preload assets
	if( eos_dp_is_fdp_page() ){
		$rtl = is_rtl() ? '-rtl' : '';
		$urls = array(
			EOS_DP_PLUGIN_URL.'/img/wordpress-deactivate-plugins.png'
		);
		if( isset( $_GET['page'] ) && 'eos_dp_menu' === $_GET['page'] ){
			$urls[] = EOS_DP_PLUGIN_URL.'/img/switch.svg';
		}
		$headers = '';
		foreach( $urls as $url ){
			$headers .= 'Link: <'.esc_url( $url ).'> rel=preload as=image;';
		}
		$urls = array(
			EOS_DP_MAIN_STYLESHEET.$rtl.'.css'
		);
		foreach( $urls as $url ){
			$headers .= 'Link: <'.esc_url( $url ).'> rel=preload as=style;';
		}
		header( apply_filters( 'fdp_admin_headers',$headers ) );
		add_filter( 'admin_footer_text','__return_false' );
	}
}, 100 );

//Noice about the incoming PRO version
function eos_dp_pro_version_notice( $position = 'fixed' ){
	if( !defined( 'FDP_PRO_ACTIVE' ) ){
		$user_meta = get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true );
		if( is_array( $user_meta ) ){
			$dismissed = $user_meta;
		}
		elseif( is_string( $user_meta ) ){
			$dismissed = explode( ',',$user_meta );
		}
		else{
			$dismissed = array();
		}
		$installation_info = get_option( 'eos_dp_activation_info' );
		if( $installation_info && isset( $installation_info['time'] ) ){
			$start = '02 December 2021 00:00';
			$end = '12 December 2021 00:00';
			$from = strtotime( $start );
			$until = strtotime( $end );
			$now = current_time( 'timestamp' );
			if( $now >= $from && $now <= $until ){
				// $hours = ( time() - $installation_info['time'] )/( 60*60 );
				// if( hours > 24 && !in_array( $_GET['page'],array( 'eos_dp_menu' ) ) ){
				$dismissed = is_array( $user_meta ) ? $user_meta :  explode( ',',$user_meta );
				if( !in_array( 'fdp-pro-ready', $dismissed ) ){
				?>
				<div id="fdp-pro-ready" class="fdp-pro-notice" style="position:<?php echo 'fixed' === $position ? 'fixed;bottom:-100%;' : 'relative'; ?>;transition:bottom 2s linear;z-index:999999999;margin-left:0;margin-right:0;margin-top:32px;background-color:#3e6d7c;padding:20px;font-size:16px;display:inline-block !important;line-height:1.5">
					<a href="#" class="dashicons dashicons-no-alt" title="Close" style="cursor:pointer;position:absolute;top:2px;<?php echo is_rtl() ? 'left' : 'right'; ?>:8px;font-size:27px;color:#fff;text-decoration:none" onclick="fdp_notice = document.getElementById('fdp-pro-ready');fdp_notice.style.bottom = '-100%';fdp_notice.style.position='fixed';return false;"></a>
					<p style="color:#fff !important;font-size:18px">The PRO version is ready! Use the coupon code <strong>optimizelikeapro</strong> before December 12 to get access to the premium features with a 30% discount.</p>
					<p style="text-align:<?php echo is_rtl() ? 'left' : 'right'; ?>">
						<a class="button" style="background-color:#a28754;color:#fff;border-color:transparent;font-size:14px;text-transform:uppercase" href="https://shop.freesoul-deactivate-plugins.com" rel="noopener" target="_blank">Get the PRO version</a>
					</p>
					<p style="color:#fff !important" class="right">
						<a class="fdp-dismiss-pro-notice" title="Close and don't show it again" style="color:#fff" href="#" data-pointer-id="fdp-pro-ready">Don't show again</a>
					</p>
				</div>
				<?php if( 'fixed' === $position ){ ?>
				<script>setTimeout(function(){document.getElementById('fdp-pro-ready').style.bottom = '0';},6000);</script>
				<?php } ?>
				<?php
				}
			}
		}
	}
}

add_action( 'plugins_loaded',function(){
	if( defined( 'EOS_DP_PRO_PLUGIN_DIR' ) ){
		$main_opts = eos_dp_get_option( 'eos_dp_pro_main' );
		$licenseA = isset( $main_opts['eos_dp_license'] ) ? $main_opts['eos_dp_license'] : false;
		$licenseCode = $licenseA && isset( $licenseA['fdp-license-key'] ) ? esc_attr( $licenseA['fdp-license-key'] ) : '';
		$licenseEmail = $licenseA && isset( $licenseA['fdp-license-email'] ) ? sanitize_email( $licenseA['fdp-license-email'] ): '';
		if( '' !== $licenseCode && '' !== $licenseEmail && !wp_doing_ajax() ){
			require_once EOS_DP_PLUGIN_DIR.'/admin/class-fdp-license-manager.php';
			FDPProLicenseManager::addOnDelete( function(){
			   delete_option("FreesoulDeactivatePluginsPRO_lic_Key");
			} );
			if( FDPProLicenseManager::CheckWPPlugin( $licenseCode,$licenseEmail,$error,$responseObj,EOS_DP_PRO_PLUGIN_FILE ) ){
				if( !isset( $responseObj->is_valid ) || !$responseObj->is_valid ){
					add_action( 'admin_notices','eos_dp_license_not_valid' );
				}
				elseif( isset( $responseObj->is_valid ) && $responseObj->is_valid && isset( $responseObj->expire_date ) ){
					if( time() > strtotime( $responseObj->expire_date ) ){
						add_action( 'admin_notices','eos_dp_license_expired' );
					}
				}
				if( isset( $responseObj->is_valid ) && $responseObj->is_valid ){
					$suff = substr( sanitize_key( md5( ABSPATH ) ),0,4 );
					$main_opts['license_validity_'.$suff] = 'valid';
					eos_dp_update_option( 'eos_dp_pro_main',$main_opts );
				}
			}
		}
		else{
			add_action( 'admin_notices','eos_dp_license_not_valid' );
		}
	}
} );
//License not valid notifice
function eos_dp_license_not_valid(){
	$main_opts = eos_dp_get_option( 'eos_dp_pro_main' );
	$licenseA = isset( $main_opts['eos_dp_license'] ) ? $main_opts['eos_dp_license'] : false;
	$licenseCode = $licenseA && isset( $licenseA['fdp-license-key'] ) ? esc_attr( $licenseA['fdp-license-key'] ) : '';
	$orders_link = 'https://shop.freesoul-deactivate-plugins.com/my-account/orders/';
	$shop_link = 'https://shop.freesoul-deactivate-plugins.com/pricing/';
	$ksesArgs = array( 'a' => array( 'href' => array(),'class' => array(),'rel' => array(),'target' => array() ) );
	$lic_setts_url = admin_url( 'admin.php?page=eos_dp_pro_license' );
	?>
	<div class="notice notice-error">
		<?php if( $licenseCode && '' !== $licenseCode ){ ?>
		<p><?php esc_html_e( 'The license of Freesoul Deactivate Plugins PRO is not valid.','eos-dp-pro' ); ?></p>
		<p><a href="<?php echo $lic_setts_url; ?>"><?php esc_html_e( 'Check license settings','eos-dp-pro' ); ?></a></p>
		<?php }else{ ?>
			<p><?php echo wp_kses( sprintf( __( "To get full access to the premium features and updates of Freesoul Deactivate Plugins PRO you should %sactivate the license%s.",'eos-dp-pro' ),'<a href="'.$lic_setts_url.'">','</a>' ),$ksesArgs ); ?></p>
			<p><?php echo wp_kses( sprintf( __( 'If you have lost it, have a look at %syour orders%s.','eos-dp-pro' ),'<a href="'.$orders_link.'" target="_blank" rel="noopener">','</a>' ),$ksesArgs  ); ?></p>
		<?php
		$main_opts = eos_dp_get_option( 'eos_dp_pro_main' );
		$suff = substr( sanitize_key( md5( ABSPATH ) ),0,4 );
		$main_opts['license_validity_'.$suff] = 'not_valid';
		eos_dp_update_option( 'eos_dp_pro_main',$main_opts );
	}
	?>
	</div>
	<?php
}

//License not valid notifice
function eos_dp_license_expired(){
	$main_opts = eos_dp_get_option( 'eos_dp_pro_main' );
	$licenseA = $main_opts['eos_dp_license'];
	$licenseCode = $licenseA && isset( $licenseA['fdp-license-key'] ) ? esc_attr( $licenseA['fdp-license-key'] ) : '';
	$renew_link = add_query_arg( array(
			'lic' => esc_attr( $licenseCode ),
			'type' => 'l',
			'renew' => 'true'
		),
		'https://shop.freesoul-deactivate-plugins.com/'
	);
	?>
	<div class="notice notice-error">
		<p><?php esc_html_e( 'The license of Freesoul Deactivate Plugins PRO is expired.','eos-dp-pro' ); ?></p>
		<p><?php printf( esc_html__( 'For having access to the plugin updates you would need to renew the license. %sRenew now%s','eos-dp-pro' ),'<a class="button" href="'.$renew_link.'" target="_blank" rel="noopener">','</a>' ); ?></p>
	</div>
	<?php
}

if( defined( 'CODE_PROFILER_MU_ON' ) || defined( 'CODE_PROFILER_PRO_MU_ON' ) ){
	require EOS_DP_PLUGIN_DIR.'/integrations/code-profiler.php';
}

if( is_admin() && eos_dp_is_fdp_page() && false !== strpos( get_home_url(),'.wpdemo.org' ) ){
	$active_plugins = eos_dp_active_plugins();
	if( $active_plugins && 1 === count( $active_plugins ) ){
		add_filter( 'eos_dp_active_plugins','eos_dp_test_get_active_plugins_simulation' );
		add_filter( 'eos_dp_get_plugins','eos_dp_test_get_active_plugins_simulation' );
		add_filter( 'eos_dp_post_types_empty','eos_dp_test_get_active_plugins_simulation' );
		add_filter( 'eos_dp_get_updated_plugins_table','eos_dp_test_get_active_plugins_simulation' );
		function eos_dp_test_get_active_plugins_simulation( $plugins ){
	    $plugins = array();
	    for( $n = 1;$n < 26;++ $n ){
	      $plugins[] = 'dummy-plugin-'.$n.'/dummy-plugin-'.$n.'.php';
	    }
		  return $plugins;
		}
		add_filter( 'eos_dp_plugins_table',function( $plugins_table ){
			return eos_dp_post_types_empty();
		} );
	}
}

add_action( 'after_switch_theme','eos_dp_rebuild_rewrite_rules',PHP_INT_MAX );
add_action( 'activated_plugin','eos_dp_rebuild_rewrite_rules',PHP_INT_MAX );
add_action( 'deactivated_plugin','eos_dp_rebuild_rewrite_rules',PHP_INT_MAX );

//Check the rewrite rules. If empty remotely call the homepage loading all the plugins to rebuilt hhem without issues
function eos_dp_rebuild_rewrite_rules(){
  $rewrite_rules = eos_dp_get_option( 'rewrite_rules' );
  if( empty( $rewrite_rules ) ){
		//Prevent saving the rewrite rules with some deactivated plugins
    $response = wp_remote_get( add_query_arg( array( 'action' => 'deactivate','plugin' => 'none','t' => time() ),home_url() ),array( 'sslverify' => false ) );
  }
}
