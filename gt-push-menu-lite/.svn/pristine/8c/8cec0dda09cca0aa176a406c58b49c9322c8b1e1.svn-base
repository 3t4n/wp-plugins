<?php

require_once(__DIR__.DIRECTORY_SEPARATOR.'class.options.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'ajaxbackend.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'Mobile_Detect.php');
global $gtpm_error_message;
global $gtpm_success_message; 

function gtpm_loadstring() {
	// The "plugin_locale" filter is also used in load_plugin_textdomain()
	$domain = GTPM;
	$loc = apply_filters('plugin_locale', get_locale(), $domain);

	load_textdomain($domain, WP_LANG_DIR.'/gt-push-menu/'.$domain.'-'.$loc.'.mo');
	load_plugin_textdomain($domain, FALSE, dirname(plugin_basename(GTPM_PLUGIN_MAINFILE)).'/languages/');	
}
add_action('plugins_loaded', 'gtpm_loadstring');

if ( function_exists('mb_internal_encoding') ) {
	mb_internal_encoding("UTF-8");
}

class GTPM {

	var $pluginName = 'GT PUSH MENU';
	var $version = GTPM_VERSION;

	var $options;
	var $activation = false;

	var $menuCreated = false;

	// singleton instance 
	private static $instance; 

	// getInstance method 
	public static function getInstance() { 
		if ( !self::$instance ) { 
			self::$instance = new self();			
		} 
		return self::$instance; 
	} 

	public function __construct() {

		$gtpm_error_message = '';
		$gtpm_success_message = '';

		add_action('init', array($this, 'onInit'));

		add_action('admin_head', array($this, 'onAdminHead'));

		$this->options = gtpmOptions::getInstance();

		$detect = new Mobile_Detect();
		
		if ( $detect->isMobile() || $this->options->get('alwaysShow') ) {
			define('GTPM_SHOW_MENU', true);
		}				

	}

	// ------------------------------------------------

	private function redirect($link){
		wp_redirect($link);
		echo " ";
		exit();
	}

	public function install() {

		gtpm_loadstring();

		$options = array(
			'showSearchBox' => true,
			'menuBarStyle' => 'fixed', // hide, bar, fixed, square-left, square-right
			'fixedEls' => '',
			'overlapMode' => false,
			'showHomeLevel' => false,
			'extraMenuTrigger' => '',
			'menuId' => 0
		);	

		$locations = get_nav_menu_locations();
		if ( isset($locations['primary']) ) {
			$options['menuId'] = $locations['primary'];
		}
		
		$this->options->load($options);
	}

	public function uninstall() {
		global $wpdb;

		delete_option('gtpm_options');
		delete_option('gtpm_version');
		delete_option('GTPM_DOING_UPDATE');
	}

	public function loadScrtipsAndStyles() {

		global $wp_version;

		$GTPM_PAGE = false;

		if ( isset( $_REQUEST['page'] ) ) {
			$GTPM_PAGE = strpos($_REQUEST['page'], 'gtpushmenu') !== false;
		} else {
			$GTPM_PAGE = strpos($_SERVER['REQUEST_URI'], 'nav-menus.php') !== false;
		}

		if ( defined('WP_ADMIN') ) {		
			global $wp_scripts;

			wp_enqueue_style('gt-st-colorpicker', GTPM_PLUGIN_URL.'/css/colpick.css', array(), GTPM_VERSION);
			wp_enqueue_script('gt-js-colorpicker', GTPM_PLUGIN_URL.'/js/colpick.js', array(), GTPM_VERSION);

			wp_enqueue_script('gt-js-color', GTPM_PLUGIN_URL.'/js/pusher.color.min.js', array(), GTPM_VERSION);

			wp_enqueue_style( 'media-views' );

			wp_enqueue_script('gt-admin', GTPM_PLUGIN_URL.'/js/admin.js', array('jquery', 'jquery-ui-widget', 'gt-js-color'), GTPM_VERSION);
			wp_enqueue_style('gt-st-admin', GTPM_PLUGIN_URL.'/css/admin.css', array(), GTPM_VERSION);

		} else if ( defined('GTPM_SHOW_MENU') ) {			
			wp_enqueue_script('gtpm', GTPM_PLUGIN_URL.'/js/gtpm.js', array('jquery'), GTPM_VERSION);
			wp_enqueue_script('gtpm-modernizr', GTPM_PLUGIN_URL.'/js/modernizr.custom.js', array(), GTPM_VERSION);				
			wp_enqueue_script('gtpm-nicescroll', GTPM_PLUGIN_URL.'/js/jquery.nicescroll.js', array('jquery'), GTPM_VERSION);
		}

		if ( (defined('WP_ADMIN') && $GTPM_PAGE) || ( !defined('WP_ADMIN') && defined('GTPM_SHOW_MENU')) ) {
			wp_enqueue_style('gt-push-menu', GTPM_PLUGIN_URL.'/css/gt-push-menu.css?ts='.time(), array(), GTPM_VERSION);

			wp_enqueue_style('gt-push-menu-icons-base', GTPM_PLUGIN_URL.'/css/gt-push-menu-icons.css', array(), GTPM_VERSION);

			$cf = $this->options->get('customFont');
			if ( !$cf ) {
				// default font
				wp_enqueue_style('gt-push-menu-iconfont', GTPM_PLUGIN_URL.'/css/style.css', array(), GTPM_VERSION);	
			} else {
				wp_enqueue_style('gt-push-menu-iconfont', self::getCustomFontURL($cf), array(), GTPM_VERSION);	
			}
			

			wp_enqueue_script('gt-push-menu-jq-tap', GTPM_PLUGIN_URL.'/js/jquery.tap.min.js?ts='.time(), array('jquery'), GTPM_VERSION);
		}
	}

	public function onActivate() {
		$this->activation = true;

		$this->install();

		// adding capability
		$role = get_role('administrator');
		if ( $role ) {
			$role->add_cap('gtpm_admin');
		}

		$this->onInit(true);
	}

	public function onDeactivate() {
		// removing capability
		$role = get_role('administrator');
		if ( $role ) {
			$role->remove_cap('gtpm_admin');
		}
	}

	public function onInit($activation = false) {
		new gtpmAJAX();

		// these line should stay last 
		$this->loadScrtipsAndStyles();

		add_action('wp_head', array($this, 'onWPHead'));

		register_sidebar( array(
		    'name'         => __( 'GT Push Menu Right Sidebar' ),
		    'id'           => 'gtpm-sidebar',
		    'description'  => __( 'Widgets in this area will be shown on the right-hand side in the extra menu.' ),
		    'before_title' => '<h2>',
		    'after_title'  => '</h2>',
		) );					

		if ( defined('GTPM_SHOW_MENU') ) {
			add_filter('wp_nav_menu', array($this, 'onWpNavMenu'), PHP_INT_MAX, 2);



			add_action('wp_footer', array($this, 'onFooter'));
		}		
	}

	// --

	public function onWPHead() {
		$bgColor = $this->options->get('menuColor');
		$borderColor = $this->options->get('borderColor');
		$textColor = $this->options->get('textColor');
		$headerTextColor = $this->options->get('headerTextColor');
		$width = $this->options->get('menuWidth');
		$extraMenuLinkColor = $this->options->get('extraMenuLinkColor');
		echo "<style>			
			.gtpm-level,
			.gtpm-extra-menu { background: $bgColor !important; }

			.gtpm-menu .gtpm-level > .gtpm-list-wrap > ul > li > span > a.link-icon,
			.gtpm-overlap .gtpm-level.gtpm-level-open,
			.gtpm-menu .gtpm-back,
			.gtpm-menu h2,
			.gtpm-menu ul li,			
			.gtpm-menu .gtpm-search,
			.gtpm-menu ul li:first-child,
			.gtpm-menu .gtpm-level.gtpm-level-overlay,
			.gtpm-menu .gtpm-level,
			.gtpm-extra-menu {
				border-color: $borderColor;
			}			

			.gtpm-menu ul li.gtpmb-icon-angle-left::before,
			.gtpm-menu a.gtpm-back::after {
				color: $headerTextColor;
			}

			.gtpm-menu a,
			.gtpm-menu a:hover,
			.gtpm-menu span,
			.gtpmb-icon-search:before,
			.gtpm-menu .gtpm-search input,
			#gtpm-sidebar-wrap .widget {
				color: $textColor;
			}

			.gtpm-menu h2 {
				color: $headerTextColor;
			}
			
			.gtpm-lining,
			.gtpm-menu .gtpm-level,
			.gtpm-menu-bar {
				background: $bgColor;
			}

			.gtpm-menu .gtpm-level.gtpm-level-overlay a,
			.gtpm-menu .gtpm-level.gtpm-level-overlay span {
				color: $bgColor;
			}

			.gtpm-icon.gtpm-menu-icon,
			.gtpm-menu-bar {
				color: $textColor;
			}

			.gtpm-extra-menu a {
				color: $extraMenuLinkColor;
			}

			.gtpm-pusher .gtpm-lining,
			.gtpm-menu {
				width: ".$width."px;
			}
			</style>";
		echo "<script>GTPM_OPTIONS = ".json_encode($this->options->opts)."</script>";
	}

	private function gtpmFindChildren($menu, $menu_items) {
		foreach ($menu as $mti) {
			foreach ($menu_items as $mi) {
				if ( isset($mi->processed) ) { continue; }
				if ( $mti->ID == $mi->menu_item_parent ) {
					if ( !isset($mti->children) ) {  $mti->children = array(); }

					$mti->children[] = $mi;

					$mi->processed = true;
					//$toProcess -= 1;
				}
			}
			if ( isset($mti->children) ) {
				$this->gtpmFindChildren($mti->children, $menu_items);
			}
		}			
	}

	private function gtpmBuildMenuLevel($title, $iconStr, $menuItems, $icons, $level = 0, $parentId = 0) {
		$html = '';

		$childLevels = array();

		$html .= '<div class="gtpm-level" id="gtpm-menu-level-'.$parentId.'">';
		$html .= '<h2 class="gtpm-icon '.$iconStr.'">'.$title.'</h2>';

		if ( !$parentId && $this->options->get('showSearchBox') ) {
			$html .= '<div class="gtpm-search">
						<form role="search" method="get" action="'.home_url('/').'">
							<input type="text" value="" name="s" placeholder="Search...">
							<button type="submit"><i class="gtpmb-icon gtpmb-icon-search"></i></button>
						</form>
					</div>';
		}


		if ( $parentId ) { $html .= '<a class="gtpm-back" href="#">back</a>'; }
		$html .= '<div class="gtpm-list-wrap"><ul>';

		foreach ($menuItems as $mi) {
			$itmId = $mi->ID;
			$iconClass = isset($icons[$itmId]) ? $icons[$itmId] : '';

			$liClass = isset($mi->children) ? 'class="gtpmb-icon gtpmb-icon-angle-left icon-2x"' : '';
			$link = $mi->url !== '#' ? ' <a href="'.$mi->url.'" class="gtpmb-icon link-icon gtpmb-icon-link"></a>' : '';
			$html .= '<li '.$liClass.'>';

			if ( isset($mi->children) ) {
				$hasLinkClass = !!$link ? ' gtpm-has-link' : '';
				$html .='<span class="gtpm-icon '.$iconClass.$hasLinkClass.'" id="gtpm-menu-item-'.$mi->ID.'">'.$mi->title.$link.'</span>';
				$childLevels[] = $this->gtpmBuildMenuLevel($mi->title, $iconClass, $mi->children, $icons, ++$level, $mi->ID);
			} else {
				$html .='<a class="gtpm-icon '.$iconClass.'" href="'.$mi->url.'">'.$mi->title.'</a>';
			}
			$html .= '</li>';
		}

		$html .= '</ul></div>';
		$html .= '</div>';

		$html .= implode('', $childLevels);

		return $html;
	}

	private function gtpmBuildMenuFlat($menu, &$html, $icons) {
		$menu = $menu[0];
		$html .= '<nav id="gtpm-menu" style="display: none;" class="gtpm-menu gtpm-overlap">';
		$html .= $this->gtpmBuildMenuLevel($menu->title, $menu->icon, $menu->children, $icons);
		$html .= '</nav>';
	}

	public function onWpNavMenu($html, $args) {

		if ( $this->menuCreated ) {
			return $html;
		}

		$menuTitle = $this->options->get('menuTitle');
		$menuIcon = $this->options->get('menuIcon');

		// Get the nav menu based on the requested menu
		$menu = wp_get_nav_menu_object( $args->menu );

		// Get the nav menu based on the theme_location
		if ( ! $menu && $args->theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $args->theme_location ] ) )
			$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );

		// get the first menu that has items if we still can't find a menu
		if ( ! $menu && !$args->theme_location ) {
			$menus = wp_get_nav_menus();
			foreach ( $menus as $menu_maybe ) {
				if ( $menu_items = wp_get_nav_menu_items( $menu_maybe->term_id, array( 'update_post_term_cache' => false ) ) ) {
					$menu = $menu_maybe;
					break;
				}
			}
		}

		if ( $menu && $menu->term_id != $this->options->get('menuId') ) {
			return $html;
		}

		$hideOrigMenu = $this->options->get('hideOrigMenu');
		if ( $hideOrigMenu ) {
			$html = '';	
		}				

		// If the menu exists, get its items.
		if ( $menu && ! is_wp_error($menu) && !isset($menu_items) )
			$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );

		$menuTree = array();
		$menuTreeFlatLinks = array(); // for search

		$menuTree = array( (object) array( 'ID' => 0, 'icon' => $menuIcon, 'tag' => 'nav', 'id' => 'gtpm-menu', 'class' => 'gtpm-menu', 'title' => $menuTitle ) );

		$this->gtpmFindChildren($menuTree, $menu_items);

		$o = gtpmOptions::getInstance();

		$icons = array();
		$map = $o->get('iconsMap');		
		$mid = $menu->term_id;

		if ( $map && isset($map[$mid]) ) {
			$icons = $map[$mid];
		}

		$this->gtpmBuildMenuFlat($menuTree, $html, $icons);
		$this->menuCreated = true;

		return $html;
	}

	public function onAdminHead() {
		echo '<script>
			GTPM_PLUGIN_URL = "'.GTPM_PLUGIN_URL.'";
			</script>';
	}

	public function onFooter() {
		echo '<ul id="gtpm-sidebar-wrap">';
		dynamic_sidebar('gtpm-sidebar');
		echo '</ul>';
	}

	static function getCustomFontURL($fontName) {
		$dirs = wp_upload_dir();		
		$url = $dirs['baseurl'].'/gt-push-menu/font/'.str_replace(' ', '%20', $fontName).'/style.css?ts='.time();
		return $url;
	}

	static function getCustomFontStylePath($fontName) {
		$dirs = wp_upload_dir();		
		$url = $dirs['basedir'].DIRECTORY_SEPARATOR.'gt-push-menu'.DIRECTORY_SEPARATOR.'font'.DIRECTORY_SEPARATOR.$fontName.DIRECTORY_SEPARATOR.'style.css';
		return $url;
	}	

	static function ensureUploadDir($subdir = false) {
		$dirs = wp_upload_dir();
		$ud = $dirs['basedir'].DIRECTORY_SEPARATOR.'gt-push-menu';

		if ( $subdir ) {
			$ud .= DIRECTORY_SEPARATOR.$subdir;
		}

		if ( !is_dir($ud) ) {
			mkdir($ud, 0777, true);
		}
		return $ud;
	}

}