<?php
/*
Plugin Name: Fanpage Connect 2 FREE
Plugin URI: http://www.fanpageconnect.com
Version: v2.0
Author: Pat Friedl, Chris Friedl, Bryan Batson
Description: Fanpage Connect is the Ultimate Facebook plugin for WordPress plugin that allows you to create an administer your Facebook fan pages directly from WordPress. <strong>NOTE:</strong> This plugin should not be used with the original <a href="http://www.fanpageconnect.com" target="_blank">Fanpage Connect</a> - Activate one or the other, but not both!

Copyright 2013  FanpageConnect.com  email: support@fanpageconnect.com
*/
if(!class_exists("FanpageConnect2FREE")){

	class FanpageConnect2FREE {

		/***********************************************************/
		/* Variables
		/***********************************************************/
		// dashboard widget
		var $dash_feed_url, $dash_site_url, $dash_site_name, $dash_error_title, $dash_no_items_text,
			$dash_num_items, $dash_widget_name, $dash_widget_title, $dash_footer, $dash_fb_link, $dash_refresh_time;

		var $plugin_activated = false;
		var $plugin_type = 'free';
		var $old_pro_db_option = 'fpc_pro_options';
		var $old_free_db_option = 'fpc_options';
		var $fpc1_options;
		var $fpc2_db_option = 'fpc2_options';
		var $fpc2_options;

		var $reg_form_id = 1397961035;
		var $reg_form_redir = 'http://www.fanpageconnect.com/fpc2-register-redirect.php';
		var $reg_form_tracker = 'https://forms.aweber.com/form/displays.htm?id=jMyc7JxsjAzMrA==';
		var $reg_form_name = 'Fanpage_Connect_Registration';
		var $reg_list_name = 'fanpageconnect';

		// variables sent from facebook
		var $page_id;
		var $page_liked;
		var $page_admin;
		var $user_country;
		var $user_locale;
		var $user_id;
		var $app_data;
		var $algorithm;
		var $expires;
		var $issued_at;
		var $oauth_token;

		// global counters for incrementing names in RSS, like buttons, etc
		var $rss_num = 0;
		var $tweet_num = 0;
		var $karma_num = 0;

		// global level variables for pages
		var $added_like = false;
		var $domain;
		var $fb_error;
		var $parm_prefix;

		function __construct() { // class constructor

			/***********************************************************/
			/* Plugin setup actions
			/***********************************************************/

			// define the plugin URL so we can add the CSS
			if (!defined('FPC_THEME_DIR'))
				define('FPC_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());

			if (!defined('FPC_PLUGIN_NAME'))
				define('FPC_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

			if (!defined('FPC_PLUGIN_DIR'))
				define('FPC_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . FPC_PLUGIN_NAME);

			if (!defined('FPC_SITE_URL'))
				define('FPC_SITE_URL', get_option('siteurl'));

			if (!defined('FPC_PLUGIN_URL'))
				define('FPC_PLUGIN_URL', WP_PLUGIN_URL . '/' . FPC_PLUGIN_NAME);

			if (!defined('FPC_TEMPLATE_URL'))
				define('FPC_TEMPLATE_URL', FPC_PLUGIN_URL . '/template');

			if (!defined('FPC_TEMPLATES_URL'))
				define('FPC_TEMPLATES_URL', FPC_PLUGIN_URL . '/templates');

			if (!defined('FPC_PLUGIN_VERSION'))
				define('FPC_PLUGIN_VERSION','2.0');

			if (!defined('FPC_PLUGIN_TYPE'))
				define('FPC_PLUGIN_TYPE','free');

			global $post;

			/***********************************************************/
			/* Actions
			/***********************************************************/
			add_action('init', array(&$this, 'register_post_types'));
			add_action('init',array(&$this,'register_sidebars'));
			add_action('template_redirect', array(&$this, 'get_template'));
			add_action('admin_menu', array(&$this, 'add_plugin_menu'));
			add_action('wp_dashboard_setup', array(&$this, 'add_dashboard_widget'));
			add_action('admin_head', array(&$this,'add_admin_header_scripts'));
			add_action('admin_enqueue_scripts', array(&$this, 'enqueue_admin_header_scripts'));
			add_action('admin_footer',array(&$this, 'add_admin_footer_scripts'));
			add_action('wp_enqueue_scripts',array(&$this, 'enqueue_scripts'));
			add_action('media_buttons', array(&$this, 'add_shortcode_button'),100);
			add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
			add_action('save_post', array(&$this, 'save_meta'));
			add_action('wp_ajax_get_app_sidebars', array(&$this, 'get_app_sidebars'));

			/***********************************************************/
			/* FREE Shortcodes
			/***********************************************************/
			// define plugin shortcodes
			add_shortcode('fbliked', array(&$this, 'fpc_liked'));
			add_shortcode('fbnotliked', array(&$this, 'fpc_not_liked'));
			add_shortcode('fbadmin', array(&$this, 'fpc_admin'));
			add_shortcode('fbposts', array(&$this, 'fpc_posts'));
			add_shortcode('font', array(&$this, 'fpc_font'));

			/***********************************************************/
			/* Variables
			/***********************************************************/
			$this->dash_feed_url = 'http://www.fanpageconnect.com/feed/';
			$this->dash_site_url = 'http://www.fanpageconnect.com';
			$this->dash_fb_link = 'http://www.facebook.com/FanpageConnect/app_136008969801589';
			$this->dash_site_name = 'FanpageConnect.com';
			$this->dash_error_title = 'RSS Error';
			$this->dash_no_items_text = '<p>Huh, no updates from the blog yet, but you can visit <a href="'.$this->dash_site_url.'" target="_blank">';
			$this->dash_no_items_text .= $this->dash_site_name.'</a> for other info...</p>';
			$this->dash_num_items = 3;
			$this->dash_widget_name = 'fanpageconnect_dashboard_widget';
	 		$this->dash_widget_title = 'Recent News from FanpageConnect.com';
	 		$this->dash_footer = '<b>Get more at <a href="'.$this->dash_site_url.'" target="_blank">'.$this->dash_site_name.'</a> ';
			$this->dash_footer .= 'or check us out on Facebook: ';
			$this->dash_footer .= '<a href="'.$this->dash_fb_link.'" target="_blank">fb.com/FanpageConnect</a></b>';
			$this->dash_refresh_time = 60 * 60 * 3; // 3 hours

			$this->fpc1_options = $this->get_old_options();
			$this->fpc2_options = $this->get_options();
			$this->plugin_activated = $this->fpc2_options['activated'];
			$this->plugin_type = $this->fpc2_options['plugin_type'];

			$this->domain = $this->get_domain();

		} // end constructor FanpageConnect2FREE
		/***********************************************************/
		/* END FanpageConnect2FREE CONSTRUCTOR
		/***********************************************************/

		// initial functions
		// create fanpage and app post types
		function register_post_types(){
			$post_type = 'fpc-fanpage';
			$supports = array('title','editor','comments','custom-fields','revisions');
			$labels = array(
				'name' => 'FPC Pages',
				'singular_name' => 'FPC Page',
				'menu_name' => 'FPC Pages',
				'all_items' => 'All FPC pages',
				'add_new' => 'Add New FPC Page',
				'add_new_item' => 'Add New Fanpage Connect Page',
				'edit_item' => 'Edit FPC Page',
				'new_item' => 'New FPC Page',
				'view_item' => 'View FPC Page',
				'search_items' => 'Search FPC Pages',
				'not_found' => 'No Fanpage Connect Pages found',
				'not_found_in_trash' => 'No FPC Pages found in trash',
				'parent_item_colon' => ''
				);
			$args = array(
				'public' => true,
				'show_ui' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_in_nav_menus' => true,
				'show_in_menu' => true,
				'show_in_admin_bar' => false,
				'menu_position' => 25,
				'supports' => $supports,
				'labels' => $labels,
				'description' => 'FPC Pages (Fanpage Connect Pages) power your Facebook fanpage',
				'has_archive' => false,
				'rewrite' => array('slug' => 'fpc-fanpage'),
				'query_var' => true
				);
			register_post_type($post_type,$args);

			/* app post type */
			$post_type = 'fpc-app';
			$supports = array('title','revisions');
			$labels = array(
				'name' => 'Fanpage Connect Facebook Apps',
				'singular_name' => 'Fanpage Connect Facebook App',
				'menu_name' => 'Fanpage Connect Facebook Apps',
				'all_items' => 'Apps',
				'add_new' => 'Add New App',
				'add_new_item' => 'New Fanpage Connect Facebook App',
				'edit_item' => 'Edit Fanpage Connect Facebook App',
				'new_item' => 'New Fanpage Connect Facebook App',
				'view_item' => 'View Fanpage Connect Facebook App',
				'search_items' => 'Search Apps',
				'not_found' => 'No Facebook Apps found',
				'not_found_in_trash' => 'No Facebook Apps found in trash',
				'parent_item_colon' => ''
				);
			$args = array(
				'public' => false,
				'show_ui' => true,
				'publicly_queryable' => false,
				'exclude_from_search' => false,
				'show_in_nav_menus' => false,
				'show_in_menu' => true,
				'show_in_admin_bar' => false,
				'menu_position' => 100.1,
				'supports' => $supports,
				'labels' => $labels,
				'description' => 'Facebook Apps Connect your Fanpage Connect pages to your Facebook fanpage',
				'has_archive' => false,
				'rewrite' => array('slug' => 'fpc-app'),
				'query_var' => true
				);
			register_post_type($post_type,$args);
			// with the new custom post types, flush rewrite rules
			flush_rewrite_rules();
		} // end register_post_type

		// get number of apps
		function num_apps(){
			global $wpdb;
			$querystr = "SELECT count(post_type)
			             FROM wp_posts
			             WHERE post_type='fpc-app' and post_status in('publish','pending','draft','future','private','inherit','trash')";
			$query_result = $wpdb->get_var($querystr);
			return intval($query_result);
		}

		// get number of fanpages
		function num_pages(){
			global $wpdb;
			$querystr = "SELECT count(post_type)
			             FROM wp_posts
			             WHERE post_type='fpc-fanpage' and post_status in('publish','pending','draft','future','private','inherit','trash')";
			$query_result = $wpdb->get_var($querystr);
			return intval($query_result);
		}

		// create the FPC sidebars
		function register_sidebars(){
			if($this->plugin_activated){
				$args = array(
				    'post_type' => 'fpc-app',
				    'nopaging'  => true
				);
				$query = new WP_Query( $args );
				if($query->have_posts()) {
					while ( $query->have_posts() ) {
						$query->the_post();
						$meta = get_post_meta($query->post->ID, '_fpcapp', true);
						if($meta['num_widgets'] > 0 && isset($meta['widget_name'])){
							for($i = 1; $i < $meta['num_widgets']+1; $i++){
								$sidebar_num = ($i<10)? '0' . $i : $i;
								$sidebar_name = $meta['widget_name'].' '.$sidebar_num;
								$args = array(
									'name' => $sidebar_name,
									'id' => 'fpc-'.$meta['widget_base'].'-'.$sidebar_num,
									'class' => 'fpc-sidebar',
									'before_widget' => '<li id="%1$s" class="widget %2$s">',
									'after_widget' => '</li>'."\n",
									'before_title' => '<h2 class="widgettitle fpc-sidebar-title">',
									'after_title' => '</h2>'."\n"
									);
								register_sidebar($args);
							}
						}
					}
				}
				wp_reset_postdata();
			} // end if plugin_activated
		} // end register sidebars

		// get the meta for any FPC App
		function get_app_meta($id){
			global $post;
			$dummy_meta = array(
					'header_filters' => array(),
					'content_filters' => array(),
					'footer_filters' => array(),
					'appid' => '',
					'appsecret' => '',
					'lang' => '',
					'pageurl' => '',
					'admins' => '',
					'use_menu' => '',
					'menu' => '',
					'menu_display' => '',
					'link_luv' => '',
					'cbid' => '',
					'gplus' => '',
					'debug' => '',
					'num_widgets' => '',
					'widget_name' => '',
					'widget_base' => ''
					);
			if(intval($id)){
				$app_post = get_post($id);
				$app_meta = get_post_meta($app_post->ID, '_fpcapp', true);
				if(isset($app_meta['appid'])){
					return $app_meta;
				} else {
					return $dummy_meta;
				}
			} else {
				return $dummy_meta;
			}
		} // end get_app_meta

		// get the sidebar info from an app ID
		function get_app_sidebars(){
			$json_test = array(']','}');
			$meta = $this->get_app_meta($_REQUEST['post_id']);
			$result['widgetNum'] = $meta['num_widgets'];
			$result['widgetName'] = $meta['widget_name'];
			$result['widgetBase'] = 'fpc-'.$meta['widget_base'];
			$result = json_encode($result);
			echo $result;
			die();
		} // end get_app_sidebars

		function build_app_sidebar_select($id){
			$app_post = get_post($id);
			$app_meta = $this->get_app_meta($id);
			$select = '<option value="">None</option>';
			if($app_meta['num_widgets'] > 0 && isset($app_meta['widget_name']) && $app_post->post_status == 'publish'){
				for($i = 1; $i < $app_meta['num_widgets']+1; $i++){
					$sidebar_num = ($i<10)? '0' . $i : $i;
					$sidebar_name = $app_meta['widget_name'].' '.$sidebar_num;
					$sidebar_base = 'fpc-'.$app_meta['widget_base'].'-'.$sidebar_num;
					$select .= '<option value="'.$sidebar_base.'">'.$sidebar_name.'</option>';
				}
			}
			return $select;
		}

		function add_admin_header_scripts(){

		} // end add_admin_header_scripts

		// add FPC related scripts to admin
		function enqueue_admin_header_scripts(){
			//global $pagenow;
			if(isset($_GET['page']) && ($_GET['page'] == 'fpc-main' || $_GET['page'] == 'fpc-help')){
				wp_register_style('fpc-admin-ui-style','http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
				wp_enqueue_style('fpc-admin-ui-style');
				wp_enqueue_script('jquery');
				wp_enqueue_script('jquery-ui-core');
				wp_enqueue_script('jquery-ui-widget');
				wp_enqueue_script('jquery-ui-accordion');
				wp_enqueue_script('jquery-ui-tabs');
			}
			wp_register_script('fpc-admin', FPC_PLUGIN_URL.'/js/fpc-admin.js');
			$apps_created = array('numApps'=>$this->num_apps(),'maxApps'=>1,'numPages'=>$this->num_pages(),'maxPages'=>5);
			wp_localize_script('fpc-admin','appsCreated',$apps_created);
			wp_enqueue_script('fpc-admin');
		} // end enqueue_admin_header_scripts

		function add_admin_footer_scripts(){
		} // end add_admin_footer_scripts

		function enqueue_scripts(){
			global $pagenow;
			if (!is_admin()) { wp_enqueue_script('jquery'); }
		} // end enqueue_scripts

		// add the fpc menu
		function add_plugin_menu() {
			$capability = 'moderate_comments';
			$icon = plugins_url('img/fpc-icon-small.png', __FILE__);
			add_menu_page('Fanpage Connect 2', 'FPC 2', $capability, 'fpc-main', array(&$this, 'fpc_main_menu'), plugins_url('img/fpc-icon-small.png', __FILE__),100.5);
			add_submenu_page('fpc-main', 'Main', 'Fanpage Connect 2', $capability, 'fpc-main', array(&$this, 'fpc_main_menu'));
			add_submenu_page('fpc-main', 'Apps', 'Apps', $capability, 'edit.php?post_type=fpc-app', null);
			add_submenu_page('fpc-main', 'New App', 'New App', $capability, 'post-new.php?post_type=fpc-app', null);
			add_submenu_page('fpc-main', 'FPC Widgets', 'FPC Widgets', $capability, 'widgets.php?widgets=fpc', null);
			add_submenu_page('fpc-main', 'Help', 'Help', $capability, 'fpc-help', array(&$this, 'fpc_help_page'));
		}

		function fpc_main_menu(){
			global $reg_form_id, $reg_form_redir, $reg_form_tracker, $reg_form_name, $reg_list_name;
			$reg_form_id  = $this->reg_form_id;
			$reg_form_redir = $this->reg_form_redir;
			$reg_form_tracker = $this->reg_form_tracker;
			$reg_form_name = $this->reg_form_name;
			$reg_list_name = $this->reg_list_name;
			include(FPC_PLUGIN_DIR.'/util/fanpage-connect-reg.php');
			include(FPC_PLUGIN_DIR.'/util/fanpage-connect-main.php');
		}

		function fpc_help_page(){
			include(FPC_PLUGIN_DIR.'/util/fanpage-connect-help.php');
		}

		// add dashboard widget
		function add_dashboard_widget() {
		     wp_add_dashboard_widget($this->dash_widget_name, $this->dash_widget_title, array(&$this, 'dashboard_widget_callback'));
		}

		// dashboard widget display of RSS feed
		function dashboard_widget_callback() {
			if($this->dash_refresh_time > 0) { add_filter('wp_feed_cache_transient_lifetime', array(&$this, 'return_feed_time')); }
			$rss = fetch_feed($this->dash_feed_url);
			if($this->dash_refresh_time > 0) { remove_filter('wp_feed_cache_transient_lifetime', array(&$this, 'return_feed_time')); }
			$rss = fetch_feed($this->dash_feed_url);
			if(is_wp_error($rss)){
				if(is_admin() || current_user_can('manage_options')) {
					echo "<p>";
					printf(__('<strong>'.$this->dash_error_title.'</strong>: %s'), $rss->get_error_message());
					echo "</p>";
				}
				return;
			}
			if (!$rss->get_item_quantity()) {
				echo $this->dash_no_items_text;
				$rss->__destruct();
				unset($rss);
				return;
			}
			echo "<div class='rss-widget'>\n<ul>\n";
			$items = ($rss->get_item_quantity() > $this->dash_num_items)? $this->dash_num_items : $rss->get_item_quantity();
			if($items){

				foreach($rss->get_items(0, $items) as $item) {
					$publisher = '';
					$site_link = '';
					$link = '';
					$content = '';
					$date = esc_html(strip_tags($item->get_date()));
					$date = strtotime( $date );
					$date = gmdate(get_option('date_format'), $date);
					$link = esc_url(strip_tags($item->get_link()));
					$title = esc_html($item->get_title());
					$content = $item->get_content();
					$content = wp_html_excerpt($content, 250) . ' ...';
					echo "<li>";
					echo "<a class='rsswidget' href='$link' target='_blank'>$title</a> ";
					echo "<span class='rss-date'>$date</span>\n";
					echo "<div class='rssSummary'>$content</div>\n";
					echo "</li>";
				}
			}
			echo "</ul>\n</div>\n";
			if(isset($this->dash_footer)) { echo "$this->dash_footer\n"; }
			$rss->__destruct();
			unset($rss);
		}
		// set refresh time for your feed
		function return_feed_time($seconds){
			return $this->dash_refresh_time;
		} // end return_feed_time

		function is_old_fanpage($m){
			if(!empty($m['isfanpage'])){
				return($m['isfanpage'] === 'true');
			} else {
				return false;
			}
		}

		function add_shortcode_button($page = null, $target = null) {
			global $typenow;
			global $pagenow;
			global $post;
			$meta = array();
			$pages = array('post.php','post-new.php');
			if($post->ID){ $meta = get_post_meta($post->ID, '_fbfp', true); }
			if(!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
				return;
			}
			if (empty($typenow) && !empty($_GET['post'])){
				$post = get_post($_GET['post']);
				$typenow = $post->post_type;
				$meta = get_post_meta($post->ID, '_fbfp', true);
			} elseif(empty($typenow) && !empty($_GET['post_type'])){
				$typenow = $_GET['post_type'];
			}
			if(in_array($pagenow, $pages) && get_user_option('rich_editing') == 'true'){
				if ($typenow == "fpc-fanpage" || $this->is_old_fanpage($meta)){
					add_thickbox();
					$tb_height = 600;
					$the_link = '<a href="#" id="fpc-shortcodes"';
					$the_link .= 'alt="Add Fanpage Shortcodes" class="button insert-media add_media">';
					$the_link .= '<span class="fpc-button-icon"></span>FPC Codes</a>';
					$the_link .= '<script>';
					$the_link .= 'jQuery(document).ready(function(){';
					$the_link .= 'jQuery("#fpc-shortcodes").on("click",function(){';
					$the_link .= 'tb_show("Add Fanpage Shortcodes","'.FPC_PLUGIN_URL.'/util/fanpage-connect-shortcodes.php?height='.$tb_height.'&width='.$tb_width.'&TB_iframe=true");';
					$the_link .= 'jQuery("#TB_window").height('.$tb_height.');';
					$the_link .= 'jQuery("#TB_iframeContent").height('.$tb_height.'-jQuery("#TB_title").height());';
					$the_link .= 'if(jQuery("#TB_window>div").length > 1){jQuery("#TB_window>div:eq(1)").remove();}';
					$the_link .= 'return false;';
					$the_link .= '});';
					$the_link .= '});';
					$the_link .= '</script>';
					echo $the_link;
				}
			}
		} // end add_shortcode_button

		// add meta box to page editor
		function add_meta_boxes() {
			global $post;
			$old_meta = get_post_meta($post->ID, '_fbfp', true);
			if ($post->post_type == 'fpc-fanpage') {
				wp_enqueue_style('fpc_meta_css', FPC_PLUGIN_URL . '/css/fpc-admin.css');
				$box_id = 'fpc-fanpage2.x-page-meta-box';
				$box_title = 'Fanpage Connect Settings';
				$box_callback = array(&$this, 'render_meta_boxes');
				$box_type = 'fpc-fanpage';
				$box_context = 'normal';
				$box_priority = 'high';
				add_meta_box($box_id, $box_title, $box_callback, $box_type, $box_context, $box_priority);
			} elseif ($post->post_type == 'fpc-app') {
				wp_enqueue_style('fpc_meta_css', FPC_PLUGIN_URL . '/css/fpc-admin.css');
				$box_id = 'fpc-fanpage2.x-app-meta-box';
				$box_title = 'Fanpage Connect App Settings';
				$box_callback = array(&$this, 'render_meta_boxes');
				$box_type = 'fpc-app';
				$box_context = 'normal';
				$box_priority = 'high';
				add_meta_box($box_id, $box_title, $box_callback, $box_type, $box_context, $box_priority);
			} elseif ($this->is_old_fanpage($old_meta)) {
				wp_enqueue_style('fpc_meta_css', FPC_PLUGIN_URL . '/css/fpc-admin.css');
				$box_id = 'fpc-fanpage1.x-page-meta-box';
				$box_title = 'Fanpage Connect Settings';
				$box_callback = array(&$this, 'render_meta_boxes');
				$box_type = 'page';
				$box_context = 'normal';
				$box_priority = 'high';
				add_meta_box($box_id, $box_title, $box_callback, $box_type, $box_context, $box_priority);
			}
		} // end add_meta_boxes

		// show the meta box on the page editor
		function render_meta_boxes() {
			global $post;
			if ($post->post_type == 'fpc-fanpage') {
				$meta = get_post_meta($post->ID, '_fpcpage', true);
				if(!is_array($meta)){ $meta = array(); }
				include(FPC_PLUGIN_DIR . '/util/fanpage-connect-2.x-page-meta.php');
				echo '<input type="hidden" id="fpc_nonce" name="fpc_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
			} elseif ($post->post_type == 'fpc-app') {
				//something eff'd up here - meta was returning an empty array for some reason!
				$meta = get_post_meta($post->ID, '_fpcapp', true);
				if(!is_array($meta)){ $meta = array(); }
				include(FPC_PLUGIN_DIR . '/util/fanpage-connect-2.x-app-meta.php');
				echo '<input type="hidden" id="fpc_nonce" name="fpc_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
			} else {
				$meta = get_post_meta($post->ID, '_fbfp', true);
				if(!is_array($meta)){ $meta = array(); }
				if($this->is_old_fanpage($meta)){
					// show the page
					include(FPC_PLUGIN_DIR . '/util/fanpage-connect-1.x-page-meta.php');
					echo '<input type="hidden" id="fpc_nonce" name="fpc_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
				}
			}
		} // end render_meta_boxes

		// save meta for pages
		function save_meta($post_id) {
			global $post;
			$old_meta = array();
			$new_meta = array();
			$meta_id = '';
			$meta_post = array();
			$fpc1_meta = get_post_meta($post->ID, '_fbfp', true);
			// verify post data
			if (!wp_verify_nonce($_POST['fpc_nonce'],basename(__FILE__))) {
				return $post_id;
			}
			// check autosave
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			  return $post_id;
			}
			// check user permissions
			if ('page' == $_POST['post_type']) {
				if (!current_user_can('edit_page', $post_id)) {
					return $post_id;
				}
			} elseif (!current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
			// end security and permissions
			// begin saving meta data!
			if ($post->post_type == 'fpc-fanpage') { // we're custom post type: fan-page
				$meta_id = '_fpcpage';
				// get old meta if it exists
				$old_meta = get_post_meta($post_id, $meta_id, true);
			} elseif ($post->post_type == 'fpc-app') { // we're custom post type: fpc-appp
				$meta_id = '_fpcapp';
				// get old meta if it exists
				$old_meta = get_post_meta($post_id, $meta_id, true);
				// get the header/content/footer filters for apps
				if ($_POST['_header_filters']) {
					$new_meta['header_filters'] = $_POST['_header_filters'];
				}
				if ($_POST['_content_filters']) {
					$new_meta['content_filters'] = $_POST['_content_filters'];
				}
				if ($_POST['_footer_filters']) {
					$new_meta['footer_filters'] = $_POST['_footer_filters'];
				}
			} elseif($this->is_old_fanpage($fpc1_meta)){ // we're a legacy fpc 1.x page
				$meta_id = '_fbfp';
				// get old meta if it exists
				$old_meta = $fpc1_meta;
			}
			// general function for saving all our meta
			if(isset($meta_id)){
				// assign the new meta
				if ($_POST[$meta_id]) {
					foreach ($_POST[$meta_id] as $key => $value) {
						$new_meta[$key] = trim($value);
					}
				}
				// check for google fonts
				$new_meta['google_fonts'] = $this->setup_google_fonts($post_id);
				$new_meta['google_plus'] = $this->setup_google_plus($post_id);
				// save, update or delete the meta
				if ($new_meta && $new_meta != $old_meta) {
					update_post_meta($post_id, $meta_id, $new_meta);
				} elseif ('' == $new_meta && $old_meta) {
					delete_post_meta($post_id, $meta_id);
				}
			}
			return $post_id;
		} // end save_meta

		// process post and add google fonts
		function setup_google_fonts($postID) {
			$fonts_to_include = '';
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return $postID;
			} else {
				$the_post = get_post($postID);
				if($the_post){
					$the_content = $the_post->post_content;
					$pattern = '/\\[font[^\\"\\\'\\]]+face=["\\\']([^"\']+)["\\\']/i';
					preg_match_all($pattern, $the_content, $matches);
					if(is_array($matches)){
						$fonts_to_include = str_replace(" ","+",join("|", array_unique($matches[1])));
					}
				}
			}
			return $fonts_to_include;
		} // end setup_google_fonts

		// process post and add google plug one script
		function setup_google_plus($postID){
			$has_plus_on_tag = 0;
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return $has_plus_on_tag;
			} else {
				$the_post = get_post($postID);
				if($the_post){
					$the_content = $the_post->post_content;
					$pattern = '/\\[googleplus1/i';
					preg_match($pattern, $the_content, $matches);
					if(count($matches) > 0){
						$has_plus_on_tag = 1;
					}
				}
			}
			return $has_plus_on_tag;
		} // end setup_google_plus

		function get_old_options(){
			// default values
			// get ver 1.x options
			$saved_1x_free = get_option($this->old_free_db_option);
			$saved_1x_pro = get_option($this->old_pro_db_option);
			if(!empty($saved_1x_pro)){
				$saved_1x_pro['plugin_type'] = 'pro';
			} elseif(!empty($saved_1x_free)){
				$saved_1x_free['plugin_type'] = 'free';
				return $saved_1x_free;
			}
			return $saved_1x_pro;
		} // end get_old_options

		function get_options()
		{
			// default values
			$options = array(
				'activated' => false,
				'plugin_type' => 'free',
				'name' => '',
				'email' => '',
				'upgraded' => false
			);
			// get saved options
			$saved = get_option($this->fpc2_db_option);
			// should just run once if we have previous versions of FPC ($saved_2x should only be empty once!)
			if(empty($saved) && !empty($this->fpc1_options)){
				$saved['activated'] = $this->fpc1_options['activated'];
				$saved['plugin_type'] = $this->fpc1_options['plugin_type'];
				$saved['name'] = $this->fpc1_options['name'];
				$saved['email'] = $this->fpc1_options['email'];
				$saved['upgraded'] = true;
				update_option($this->fpc2_db_option,$saved);
			}
			// assign options
			if(!empty($saved))
			{
				foreach($saved as $key => $option)
				{
					$options[$key] = $option;
				}
			}
			//update options if necessary
			if($saved != $options)
			{
				update_option($this->fpc2_db_option,$options);
			}

			// return the options
			return $options;

		} // end get_options

		// return a select list of installed templates
		function get_custom_templates($t,$mi) {
			$out = '';
			$has_dirs = false;
			$dir_list = scandir(FPC_PLUGIN_DIR."/templates");
			foreach($dir_list as $i){
				if(is_dir(FPC_PLUGIN_DIR."/templates/".$i) && (!in_array($i,array('.','..')))) {
					$has_dirs = true;
					break;
				}
			}
			if($has_dirs)
			{
				$out .= '<select id="'.$mi.'_template" name="_'.$mi.'[template]">';
				if($t == ''){
					$out .= '<option value="" selected="selected"></option>';
				} else {
					$out .= '<option value=""></option>';
				}
				foreach($dir_list as $i){
				  if(is_dir(FPC_PLUGIN_DIR."/templates/".$i) && (!in_array($i,array('.','..')))){
				  	if($t == $i){
			      	$out .= '<option value="'.$i.'" selected="selected">'.$i.'</option>';
			    	} else {
			    		$out .= '<option value="'.$i.'">'.$i.'</option>';
			    	}
				  }
				}
				$out .= '</select>';
				$out .= '<button id="template_preview">Preview</button>';
				$out .= '<p>';
				$out .= '<div class="desc">';
				$out .= 'If you select a custom template, it will override all other CSS settings.<br />';
				$out .= 'Make sure your template directory contains the file "default.css"!<br />';
				$out .= '</div>';
				$out .= '</p>';
			} else {
				$out .= '<p>';
				$out .= '<div class="desc">';
				$out .= 'There are no custom templates loaded.';
				$out .= '</div>';
				$out .= '</p>';
				$out .= '<input type="hidden" id="fbfp_template" name="'.$mi.'[template]" value="">';
			}
			return $out;
		} // end get_custom_templates

		// get base domain for cookies
		function get_domain()
		{
			$base_domain = '';
			$G_TLD = array(
				'biz','com','edu','gov','info','int','mil','name','net','org',
				'aero','asia','cat','coop','jobs','mobi','museum','pro','tel','travel',
				'arpa','root','berlin','bzh','cym','gal','geo','kid','kids','lat','mail',
				'nyc','post','sco','web','xxx','nato','example','invalid','localhost','test',
				'bitnet','csnet','ip','local','onion','uucp','co'
			);
			$C_TLD = array(
			'ac','ad','ae','af','ag','ai','al','am','an','ao','aq','ar','as','at','au','aw','ax','az',
			'ba','bb','bd','be','bf','bg','bh','bi','bj','bm','bn','bo','br','bs','bt','bw','by','bz',
			'ca','cc','cd','cf','cg','ch','ci','ck','cl','cm','cn','co','cr','cu','cv','cx','cy','cz',
			'de','dj','dk','dm','do','dz','ec','ee','eg','er','es','et','eu','fi','fj','fk','fm','fo',
			'fr','ga','gd','ge','gf','gg','gh','gi','gl','gm','gn','gp','gq','gr','gs','gt','gu','gw',
			'gy','hk','hm','hn','hr','ht','hu','id','ie','il','im','in','io','iq','ir','is','it','je',
			'jm','jo','jp','ke','kg','kh','ki','km','kn','kr','kw','ky','kz','la','lb','lc','li','lk',
			'lr','ls','lt','lu','lv','ly','ma','mc','md','mg','mh','mk','ml','mm','mn','mo','mp','mq',
			'mr','ms','mt','mu','mv','mw','mx','my','mz','na','nc','ne','nf','ng','ni','nl','no','np',
			'nr','nu','nz','om','pa','pe','pf','pg','ph','pk','pl','pn','pr','ps','pt','pw','py','qa',
			're','ro','ru','rw','sa','sb','sc','sd','se','sg','sh','si','sk','sl','sm','sn','sr','st',
			'sv','sy','sz','tc','td','tf','tg','th','tj','tk','tl','tm','tn','to','tr','tt','tv','tw',
			'tz','ua','ug','uk','us','uy','uz','va','vc','ve','vg','vi','vn','vu','wf','ws','ye','yu',
			'za','zm','zw',
			'eh','kp','me','rs','um','bv','gb','pm','sj','so','yt','su','tp','bu','cs','dd','zr'
			);
			// get our wordpress site url
			$the_domain = parse_url(home_url());
			if(empty($the_domain) || empty($the_domain['host']))
			{
				$full_domain = '';
			} else {
				$full_domain = $the_domain['host'];
			}
			$DOMAIN = explode('.', $full_domain);
			$DOMAIN = array_reverse($DOMAIN);
			if ( count($DOMAIN) == 4 && is_numeric($DOMAIN[0]) && is_numeric($DOMAIN[3]) ) { return $full_domain; }
			if ( count($DOMAIN) <= 2 ) return $full_domain;
			if ( in_array($DOMAIN[0], $C_TLD) && in_array($DOMAIN[1], $G_TLD) && $DOMAIN[2] != 'www' )
			{
				$full_domain = $DOMAIN[2] . '.' . $DOMAIN[1] . '.' . $DOMAIN[0];
			} else {
				$full_domain = $DOMAIN[1] . '.' . $DOMAIN[0];;
			}
			return "." . $full_domain;
		} // end get_domain

		// register the template
		function get_template() {
			global $post;
			if($this->plugin_activated){
				$meta = get_post_meta($post->ID, '_fbfp', true); // old legacy page?
				if ($post->post_type == 'fpc-fanpage') {
					include (dirname( __FILE__ ) . '/template/single-fpc2.x-fanpage.php');
	        		exit;
				} elseif ($this->is_old_fanpage($meta)) {
					include (dirname( __FILE__ ) . '/template/single-fpc1.x-fanpage.php');
	        		exit;
				}
			}
		} // end get_template


		// make sure plugin settings match the domain we're logged in to.
		function strip_protocol($url){
			$new_url = str_replace("https:", "", $url);
			$new_url = str_replace("http:", "", $new_url);
			return $new_url;
		}

		// uninstall
		function uninstall(){
			flush_rewrite_rules();
		}

		/*
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		BEGIN FREE SHORTCODES
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		*/

		// display content if page not liked
		function fpc_liked($atts, $content = null) {
			if($this->page_liked){
				return do_shortcode(shortcode_unautop($content));
			}
		} // end fpc_liked

		// display content if page not liked
		function fpc_not_liked($atts, $content = null) {
			if(!$this->page_liked){
				return do_shortcode(shortcode_unautop($content));
			}
		} // end fpc_not_liked

		// display a list of posts
		function fpc_posts($atts, $content = null) {
			global $post;
			extract(shortcode_atts(array('num' => 10,'cat' => '','type' => '','excerpts'=>0,'showdate'=>0,'showauthor'=>0),$atts));
			$num = (is_numeric($num))? $num : 10;
			$showdate = (is_numeric($showdate))? $showdate : 0;
			$showauthor = (is_numeric($showauthor))? $showauthor : 0;
			$excerpts = (is_numeric($excerpts))? $excerpts : 0;
			$postype = '';
			$catname = '';
			$post_list = '';
			if($type != ''){
				$postype = '&post_type='.$type;
			} elseif($cat != '') {
				$catname = '&category_name='.$cat;
			}
			$args = 'orderby=date&order=DESC&posts_per_page='.$num.$postype.$catname;
			$the_query = new WP_Query($args);
			if($the_query->have_posts()){
				$post_list = '<ul class="fpc-posts">';
				while ($the_query->have_posts()) : $the_query->the_post();
					$post_list .= '<li class="fpc-blog-post">';
					$post_list .= '<a href="'.get_permalink($post->ID).'" target="_blank" alt="'.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a>';
					if($showdate || $showauthor){
						$post_list .= '<br /><span class="fpc-post-info">';
						$post_list .= ($showdate == 1)? 'Posted on: ' . the_date('','',' ',FALSE) : '';
						$post_list .= ($showauthor == 1)? 'by: ' . get_the_author() : '';
						$post_list .= '</span>';
					}
					if($excerpts){
						$tmp_excerpt = get_the_excerpt();
						$post_list .= '<br /><span class="fpc-post-excerpt">';
						$post_list .= $this->trim_excerpt(get_the_excerpt(),$post->ID);
						$post_list .= '</span>';
					}
					$post_list .= '</li>';
				endwhile;
				$post_list .= '</ul>';
			} else {
				$post_list = '<ul class="fpc-posts"><li class="fpc-blog-post">No Posts Found</li></ul>';
			}
			wp_reset_postdata();
			return $post_list;
		} // end fpc_posts

		// helper function - trim excerpt to 140 characters
		function trim_excerpt($excerpt,$pid) {
			$charlength = 140;
			$excerpt_out = '';
			if(strlen($excerpt) > $charlength) {
				$subex = substr($excerpt,0,$charlength-5);
				$exwords = explode(" ",$subex);
				$excut = -(strlen($exwords[count($exwords)-1]));
				if($excut < 0) {
			    $excerpt_out .= substr($subex,0,$excut);
				} else {
			    $excerpt_out .= $subex;
				}
				$excerpt_out .= '<a href="'.get_permalink($pid).'" target="_blank" alt="'.get_the_title($pid).'">[...]</a>';
			} else {
				$excerpt_out .= $excerpt;
			}
			return $excerpt_out;
		} // end trim_excerpt

		// display content if user is page admin
		function fpc_admin($atts, $content = null) {
			if($this->page_admin){
				return do_shortcode(shortcode_unautop($content));
			}
		} // end fpc_admin

		// add google font capability
		function fpc_font($atts, $content = null) {
			extract(shortcode_atts(array('size'=>'', 'lineheight'=>'', 'color'=>'', 'face'=>'', 'class'=>''),$atts));
			$fbf = '<span';
			$fbf .= ($class != '')? ' class="' . $class . '" ' : '';
			$fbf .= ' style="';
			$fbf .= ($face != '')? 'font-family:\'' . $face . '\' !important;' : '';
			$fbf .= ($size != '')? 'font-size:' . $size . ' !important;' : '';
			$fbf .= ($lineheight != '')? 'line-height:' . $size . ' !important;' : '';
			$fbf .= ($color != '')? 'color:' . $color . ' !important;' : '';
			$fbf .= '">';
			$fbf .= do_shortcode($content);
			$fbf .= '</span>';
			return $fbf;
		} // end fpc_font
		/*
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		END FREE SHORTCODES
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		*/

	} // end class FanpageConnect2FREE

} // end if class exists

// initialize the FanpageConnect2FREE class
if (class_exists("FanpageConnect2FREE")) {
	$wp_fpc2free = new FanpageConnect2FREE();
}

// set up actions and filters - N/A
if (isset($wp_fpc2free)) {
	/*
	if (function_exists('register_activation_hook'))
	{
		register_activation_hook(__FILE__, array(&$wp_fpc2free, 'install'));
	}
	*/
	if (function_exists('register_uninstall_hook'))
	{
		register_uninstall_hook(__FILE__, array(&$wp_fpc2free, 'uninstall'));
	}
}
?>