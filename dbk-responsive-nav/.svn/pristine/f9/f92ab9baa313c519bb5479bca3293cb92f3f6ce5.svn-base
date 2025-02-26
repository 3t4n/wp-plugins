<?php
	/*
	Plugin Name: Bitkatapult Mobile-friendly Responsive Navigation Menu
	Plugin URI: http://www.dbk.at/wp/plugin/dbk-responsive-nav/
	Description: Creates a responsive navigation on devices with small screen width. Generally this Plugin is a GUI to the (modified) Slicknav jQuery Plugin (http://slicknav.com/) by Josh Cope with all options. Furthermore you can set the screenwidth below the mobile nav is shown, fixed positioning, The Menu Selector and so on, all over a nice admin-page.
	Version: 1.0
	Author: Bernhard Nepelius
	Text Domain: dbk-responsive-nav
	Author URI: http://www.dbk.at
	License: GPLv2
	*/
	defined('ABSPATH') or die("Direct access not allowed");
	load_plugin_textdomain('dbk-responsive-nav', false, basename( dirname( __FILE__ ) ) . '/languages' );
	
	define("DBK_RESPONSIVE_NAV_SELECTOR", 					"dbk_responsive_menu_selector");
	define("DBK_RESPONSIVE_NAV_LABEL", 						"dbk_responsive_menu_label");
	define("DBK_RESPONSIVE_NAV_DUPLICATE", 					"dbk_responsive_menu_duplicate");
	define("DBK_RESPONSIVE_NAV_DURATION", 					"dbk_responsive_menu_duration");
	define("DBK_RESPONSIVE_NAV_EASING_OPEN", 				"dbk_responsive_menu_easingOpen");
	define("DBK_RESPONSIVE_NAV_EASING_CLOSE", 				"dbk_responsive_menu_easingClose");
	define("DBK_RESPONSIVE_NAV_EASING_CLOSED_SYMBOL", 		"dbk_responsive_menu_closedSymbol");
	define("DBK_RESPONSIVE_NAV_EASING_OPENED_SYMBOL", 		"dbk_responsive_menu_openedSymbol");
	define("DBK_RESPONSIVE_NAV_PREPEND_TO", 				"dbk_responsive_menu_prependTo");
	define("DBK_RESPONSIVE_NAV_PARENT_TAG", 				"dbk_responsive_menu_parentTag");
	define("DBK_RESPONSIVE_NAV_CLOSE_ON_CLICK",				"dbk_responsive_menu_closeOnClick");
	define("DBK_RESPONSIVE_NAV_ALLOW_PARENT_LINKS", 		"dbk_responsive_menu_allowParentLinks");
	define("DBK_RESPONSIVE_NAV_AUTO_EXPAND", 				"dbk_responsive_menu_autoExpand");
	

	add_action('init', 'dbk_responsive_nav_init');
	function dbk_responsive_nav_init() {

		wp_enqueue_script('jquery');	

		wp_register_style('dbk_responsive_menu_slicknav_css', plugins_url().'/dbk-responsive-nav/css/slicknav.css', '', '1.0');
		wp_enqueue_style('dbk_responsive_menu_slicknav_css');
		
		wp_register_script('dbk_responsive_menu_slicknav_js', plugins_url().'/dbk-responsive-nav/js/jquery.slicknav.dbk.min.js', array( 'jquery' ), '1.0');
		wp_enqueue_script('dbk_responsive_menu_slicknav_js');
		
	}
	
	function dbk_responsive_nav_styles(){
		$dbk_responsive_menu_selector			= get_option(DBK_RESPONSIVE_NAV_SELECTOR)				? get_option(DBK_RESPONSIVE_NAV_SELECTOR)				: "nav>div.nav>ul";
		$dbk_responsive_menu_maxScreenwidth		= get_option(DBK_RESPONSIVE_NAV_MAX_SCREENWIDTH)		? get_option(DBK_RESPONSIVE_NAV_MAX_SCREENWIDTH)		: "768px";
		$dbk_responsive_menu_prependTo			= get_option(DBK_RESPONSIVE_NAV_PREPEND_TO)				? get_option(DBK_RESPONSIVE_NAV_PREPEND_TO) 			: "body";
		$dbk_responsive_menu_bg 				= get_option(DBK_RESPONSIVE_NAV_BG)						? get_option(DBK_RESPONSIVE_NAV_BG)						: "rgba(56, 56, 56, 0.8)";
		$dbk_responsive_menu_fixed 				= get_option(DBK_RESPONSIVE_NAV_FIXED)					? true													: false;

		$sel = $dbk_responsive_menu_prependTo == "body" ?  '.slicknav_menu' : $dbk_responsive_menu_prependTo;
		$st = "
		<style type=\"text/css\" media=\"screen\">
			.slicknav_menu {
				background-color: ".$dbk_responsive_menu_bg.";
			}
			".$sel." {
				display:none;
			}
			@media screen and (max-width: ".$dbk_responsive_menu_maxScreenwidth.") {
				 ".$dbk_responsive_menu_selector." {
					display:none;
				}
				".$sel." {
					display:block;";
				if($dbk_responsive_menu_fixed){
					$st .= "
						position: fixed;
						width: 100%;
						z-index: 1000;
					";
				}
				$st .="
				}
			}
		</style>
		";
		echo $st;
	}
	add_action('wp_head', 'dbk_responsive_nav_styles',100);

	function dbk_responsive_nav_js_init(){
		$dbk_responsive_menu_selector			= get_option(DBK_RESPONSIVE_NAV_SELECTOR)				? get_option(DBK_RESPONSIVE_NAV_SELECTOR)				: "nav>div.nav>ul";
		$dbk_responsive_menu_label 				= get_option(DBK_RESPONSIVE_NAV_LABEL)					? get_option(DBK_RESPONSIVE_NAV_LABEL)					: "Menu";
		$dbk_responsive_menu_duplicate			= get_option(DBK_RESPONSIVE_NAV_DUPLICATE) 				? "true" 												: "false";
		$dbk_responsive_menu_duration			= get_option(DBK_RESPONSIVE_NAV_DURATION) 				? get_option(DBK_RESPONSIVE_NAV_DURATION) 				: 200;
		$dbk_responsive_menu_easingOpen			= get_option(DBK_RESPONSIVE_NAV_EASING_OPEN) 			? get_option(DBK_RESPONSIVE_NAV_EASING_OPEN) 			:"swing";
		$dbk_responsive_menu_easingClose 		= get_option(DBK_RESPONSIVE_NAV_EASING_CLOSE)			? get_option(DBK_RESPONSIVE_NAV_EASING_CLOSE)			:"swing";
		$dbk_responsive_menu_closedSymbol		= get_option(DBK_RESPONSIVE_NAV_CLOSED_SYMBOL)			? get_option(DBK_RESPONSIVE_NAV_CLOSED_SYMBOL)			: "&#9658;";
		$dbk_responsive_menu_openedSymbol		= get_option(DBK_RESPONSIVE_NAV_OPENED_SYMBOL)			? get_option(DBK_RESPONSIVE_NAV_OPENED_SYMBOL)			: "&#9660;";
		$dbk_responsive_menu_prependTo			= get_option(DBK_RESPONSIVE_NAV_PREPEND_TO)				? get_option(DBK_RESPONSIVE_NAV_PREPEND_TO) 			: "body";
		$dbk_responsive_menu_parentTag			= get_option(DBK_RESPONSIVE_NAV_PARENT_TAG)				? get_option(DBK_RESPONSIVE_NAV_PARENT_TAG) 			: "a";
		$dbk_responsive_menu_closeOnClick		= get_option(DBK_RESPONSIVE_NAV_CLOSE_ON_CLICK)			? "true"												: "false";
		$dbk_responsive_menu_allowParentLinks	= get_option(DBK_RESPONSIVE_NAV_ALLOW_PARENT_LINKS)		? "true"												: "false";
		$dbk_responsive_menu_autoExpand 		= get_option(DBK_RESPONSIVE_NAV_AUTO_EXPAND)			? "true"												: "false";

		$dr = "
			<script>
			var $1 = jQuery.noConflict();
			$1(function(){
				jQuery('".$dbk_responsive_menu_selector."').slicknav({
					label: '".$dbk_responsive_menu_label."',
					duplicate: ".$dbk_responsive_menu_duplicate.", 
					duration: ".$dbk_responsive_menu_duration.",
					easingOpen: '".$dbk_responsive_menu_easingOpen."',
					easingClose: '".$dbk_responsive_menu_easingClose."',
					closedSymbol: '".$dbk_responsive_menu_closedSymbol."',
					openedSymbol: '".$dbk_responsive_menu_openedSymbol."',
					prependTo: '".$dbk_responsive_menu_prependTo."',
					parentTag: '".$dbk_responsive_menu_parentTag."',
					closeOnClick: ".$dbk_responsive_menu_closeOnClick.",
					allowParentLinks: ".$dbk_responsive_menu_allowParentLinks.",
					showChildren: ".$dbk_responsive_menu_autoExpand.",
				});
			});
			</script>
		";
		echo $dr;
	}
	add_action('wp_footer', 'dbk_responsive_nav_js_init',100);



	/* Administration */
	add_action('admin_menu', 'dbk_responsive_nav_admin_menu');
	function dbk_responsive_nav_admin_menu(){
			add_options_page('DBK Responsive Navigation Settings', 'Resonsive Nav', 'manage_options', 'dbk-responsive-nav', 'dbk_responsive_nav_settings_page');
	}
	// Render settings page
	function dbk_responsive_nav_settings_page(){
		if (!current_user_can('manage_options')){
			wp_die( __('Sie haben keine Rechte diese Seite aufzurufen') );
		}
	
		$optionsSaved = false;
	
		if(isset($_POST['save_settings']) && !empty( $_POST['save_settings'] )){

			update_option(DBK_RESPONSIVE_NAV_SELECTOR, $_POST['dbk_responsive_menu_selector'] );
			update_option(DBK_RESPONSIVE_NAV_MAX_SCREENWIDTH, $_POST['dbk_responsive_menu_maxScreenwidth'] );
			update_option(DBK_RESPONSIVE_NAV_LABEL, $_POST['dbk_responsive_menu_label'] );
			update_option(DBK_RESPONSIVE_NAV_DUPLICATE, $_POST['dbk_responsive_menu_duplicate'] );
			update_option(DBK_RESPONSIVE_NAV_DURATION, $_POST['dbk_responsive_menu_duration'] );
			update_option(DBK_RESPONSIVE_NAV_EASING_OPEN, $_POST['dbk_responsive_menu_easingOpen'] );
			update_option(DBK_RESPONSIVE_NAV_EASING_CLOSE, $_POST['dbk_responsive_menu_easingClose'] );
			update_option(DBK_RESPONSIVE_NAV_CLOSED_SYMBOL, $_POST['dbk_responsive_menu_closedSymbol'] );
			update_option(DBK_RESPONSIVE_NAV_OPENED_SYMBOL, $_POST['dbk_responsive_menu_openedSymbol'] );
			update_option(DBK_RESPONSIVE_NAV_PREPEND_TO, $_POST['dbk_responsive_menu_prependTo'] );
			update_option(DBK_RESPONSIVE_NAV_CLOSE_ON_CLICK, $_POST['dbk_responsive_menu_closeOnClick'] );
			update_option(DBK_RESPONSIVE_NAV_PARENT_TAG, $_POST['dbk_responsive_menu_parentTag'] );
			update_option(DBK_RESPONSIVE_NAV_ALLOW_PARENT_LINKS, $_POST['dbk_responsive_menu_allowParentLinks'] );
			update_option(DBK_RESPONSIVE_NAV_BG, $_POST['dbk_responsive_menu_bg'] );
			update_option(DBK_RESPONSIVE_NAV_FIXED, $_POST['dbk_responsive_menu_fixed'] );
			update_option(DBK_RESPONSIVE_NAV_AUTO_EXPAND, $_POST['dbk_responsive_menu_autoExpand'] );

			$optionsSaved = true;
		}

		$dbk_responsive_menu_selector			= get_option(DBK_RESPONSIVE_NAV_SELECTOR)				? get_option(DBK_RESPONSIVE_NAV_SELECTOR)				: "nav>div.nav>ul";
		$dbk_responsive_menu_maxScreenwidth		= get_option(DBK_RESPONSIVE_NAV_MAX_SCREENWIDTH)		? get_option(DBK_RESPONSIVE_NAV_MAX_SCREENWIDTH)		: "768px";
		$dbk_responsive_menu_label 				= get_option(DBK_RESPONSIVE_NAV_LABEL)					? get_option(DBK_RESPONSIVE_NAV_LABEL)					: "Menu";
		$dbk_responsive_menu_duplicate			= get_option(DBK_RESPONSIVE_NAV_DUPLICATE) 				? get_option(DBK_RESPONSIVE_NAV_DUPLICATE) 				: 1;
		$dbk_responsive_menu_duration			= get_option(DBK_RESPONSIVE_NAV_DURATION) 				? get_option(DBK_RESPONSIVE_NAV_DURATION) 				: 200;
		$dbk_responsive_menu_easingOpen			= get_option(DBK_RESPONSIVE_NAV_EASING_OPEN) 			? get_option(DBK_RESPONSIVE_NAV_EASING_OPEN) 			:"swing";
		$dbk_responsive_menu_easingClose 		= get_option(DBK_RESPONSIVE_NAV_EASING_CLOSE)			? get_option(DBK_RESPONSIVE_NAV_EASING_CLOSE)			:"swing";
		$dbk_responsive_menu_closedSymbol		= get_option(DBK_RESPONSIVE_NAV_CLOSED_SYMBOL)			? get_option(DBK_RESPONSIVE_NAV_CLOSED_SYMBOL)			: "&#9658;";
		$dbk_responsive_menu_openedSymbol		= get_option(DBK_RESPONSIVE_NAV_OPENED_SYMBOL)			? get_option(DBK_RESPONSIVE_NAV_OPENED_SYMBOL)			: "&#9660;";
		$dbk_responsive_menu_prependTo			= get_option(DBK_RESPONSIVE_NAV_PREPEND_TO)				? get_option(DBK_RESPONSIVE_NAV_PREPEND_TO) 			: "body";
		$dbk_responsive_menu_parentTag			= get_option(DBK_RESPONSIVE_NAV_PARENT_TAG)				? get_option(DBK_RESPONSIVE_NAV_PARENT_TAG) 			: "a";
		$dbk_responsive_menu_closeOnClick		= get_option(DBK_RESPONSIVE_NAV_CLOSE_ON_CLICK)			? get_option(DBK_RESPONSIVE_NAV_CLOSE_ON_CLICK)			: 0;
		$dbk_responsive_menu_allowParentLinks	= get_option(DBK_RESPONSIVE_NAV_ALLOW_PARENT_LINKS)		? get_option(DBK_RESPONSIVE_NAV_ALLOW_PARENT_LINKS)		: 0;
		$dbk_responsive_menu_bg 				= get_option(DBK_RESPONSIVE_NAV_BG)						? get_option(DBK_RESPONSIVE_NAV_BG)						: "rgba(56, 56, 56, 0.8)";
		$dbk_responsive_menu_fixed 				= get_option(DBK_RESPONSIVE_NAV_FIXED)					? get_option(DBK_RESPONSIVE_NAV_FIXED)					: 1;
		$dbk_responsive_menu_autoExpand 		= get_option(DBK_RESPONSIVE_NAV_AUTO_EXPAND)			? 1														: 0;
	
		
		?>
		<div class="wrap">
		<table width="100%" border="0"><tr><td><h2><?php _e("DBK Responsive Navigation Options","dbk-responsive-nav"); ?></h2></td></tr></table>
		<?php 
		if($optionsSaved){
		?><div class="updated"><p><strong><?php _e("Options saved","dbk-responsive-nav"); ?></strong></p></div><?php 	
		}
		?>
		<h3><?php _e("Generic Options","dbk-responsive-nav")?></h3>
		<form name="sexmag_adfecther_form" method="post" action="">
			<table class="form-table" style="width:auto;">
				<tr>
					<th><?php _e("CSS Selector to be handled","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_selector" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_selector ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("The CSS selector to the navigation UL element","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Maximum screenwidth","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_maxScreenwidth" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_maxScreenwidth ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("The maximum width of users screen at which the small navigation should be shown. CSS valide values here (768px or 40em)","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Tack mobile navigation on top of page?","dbk-responsive-nav");?></th>
					<td valign="top"><input type="checkbox" name="dbk_responsive_menu_fixed" value="1" <?php if($dbk_responsive_menu_fixed == 1) echo ' checked'; ?>/></td>
					<td valign="top"><span class="description"><?php _e("If true, the mobile navigation will be positioned fixed, get a width of 100% and a z-index of 1000","dbk-responsive-nav");?></span></td>
				</tr>
				<tr>
					<th><?php _e("Auto expand childs?","dbk-responsive-nav");?></th>
					<td valign="top"><input type="checkbox" name="dbk_responsive_menu_autoExpand" value="1" <?php if($dbk_responsive_menu_autoExpand == 1) echo ' checked'; ?>/></td>
					<td valign="top"><span class="description"><?php _e("If true, all child items will expand.","dbk-responsive-nav");?></span></td>
				</tr>
				<tr>
					<th><?php _e("Backgroundcolor","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_bg" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_bg ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("The background-color. CSS valide values here.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Label","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_label" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_label ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Label for menu button. Use an empty string for no label","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Duplicate?","dbk-responsive-nav");?></th>
					<td valign="top"><input type="checkbox" name="dbk_responsive_menu_duplicate" value="1" <?php if($dbk_responsive_menu_duplicate == 1) echo ' checked'; ?>/></td>
					<td valign="top"><span class="description"><?php _e("If true, a copy of the menu element is made for the mobile menu. This allows for separate functionality for both mobile and non-mobile versions.","dbk-responsive-nav");?></span></td>
				</tr>
				<tr>
					<th><?php _e("Duration","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_duration" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_duration ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("The duration of the sliding animation.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Easing open","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_easingOpen" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_easingOpen ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Easing used for open animations. \"Swing\" and \"Linear\" are available with jQuery. More easing functions are available with the use of plug-ins, such as <a target=\"_blank\" href=\"http://jqueryui.com/\">jQuery UI</a>.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Easing close","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_easingClose" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_easingClose ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Easing used for open animations. \"Swing\" and \"Linear\" are available with jQuery. More easing functions are available with the use of plug-ins, such as <a target=\"_blank\" href=\"http://jqueryui.com/\">jQuery UI</a>.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Opened Symbol","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_openedSymbol" style="width:240px;" value="<?php echo  $dbk_responsive_menu_openedSymbol ; ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Character after collapsed parents.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Closed Symbol","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_closedSymbol" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_closedSymbol ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Character after expanded parents.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Prepend to","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_prependTo" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_prependTo ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Element, jQuery object, or jQuery selector string for the element to prepend the mobile menu to.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Parent Tag","dbk-responsive-nav");?></th>
					<td valign="top"><input type="text" name="dbk_responsive_menu_parentTag" style="width:240px;" value="<?php echo esc_attr( $dbk_responsive_menu_parentTag ); ?>" /></td>
					<td valign="top"><span class="description"> <?php _e("Element type for parent menu items. Anchor tag is recommended for accessibility.","dbk-responsive-nav");?> </span></td>
				</tr>
				<tr>
					<th><?php _e("Close Menu on Click?","dbk-responsive-nav");?></th>
					<td valign="top"><input type="checkbox" name="dbk_responsive_menu_closeOnClick" value="1" <?php if($dbk_responsive_menu_closeOnClick == 1) echo ' checked'; ?>/></td>
					<td valign="top"><span class="description"><?php _e("Close menu when a link is clicked. Useful when navigating within a single page.","dbk-responsive-nav");?></span></td>
				</tr>
				<tr>
					<th><?php _e("Allow parent Links?","dbk-responsive-nav");?></th>
					<td valign="top"><input type="checkbox" name="dbk_responsive_menu_allowParentLinks" value="1" <?php if($dbk_responsive_menu_allowParentLinks == 1) echo ' checked'; ?>/></td>
					<td valign="top"><span class="description"><?php _e("Allow clickable links as parent elements.","dbk-responsive-nav");?></span></td>
				</tr>
			</table>
			<p class="submit"><input type="submit" name="save_settings" class="button-primary" value="<?php esc_attr_e('Save Changes',"dbk-responsive-nav") ?>" /></p>
		</form>
	<?php
	}
	?>