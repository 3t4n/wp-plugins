<?php

/**

 *
 * @link              http://codingclown.com
 * @since             1.0.0
 * @package           API_for_Car_Trawler
 *
 * @wordpress-plugin
 * Plugin Name:       API for Car Trawler
 * Plugin URI:        #
 * Description:       A booking engine in the form of a widget that makes it possible for your visitors to rent a car at over 30,000 locations worldwide.
 * Version:           1.0.0
 * Author:            Rahul Thakur
 * Author URI:        https://profiles.wordpress.org/thakurrahul317/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       api-for-car-trawler
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'API_for_Car_Trawler_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-api-for-car-trawler-activator.php
 */
function activate_API_for_Car_Trawler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-api-for-car-trawler-activator.php';
	API_for_Car_Trawler_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-api-for-car-trawler-deactivator.php
 */
function deactivate_API_for_Car_Trawler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-api-for-car-trawler-deactivator.php';
	API_for_Car_Trawler_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_API_for_Car_Trawler' );
register_deactivation_hook( __FILE__, 'deactivate_API_for_Car_Trawler' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-api-for-car-trawler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_API_for_Car_Trawler() {

	$plugin = new API_for_Car_Trawler();
	$plugin->run();

}
run_API_for_Car_Trawler();
// Add Shortcode
function APIforCarTrawler_searchfrom( $atts ) {
	if(is_page()){ 
    // Attributes
	$pre_atts =array(
			'redirect' => false,
			'redirect-deeplinkurl' => '',
			'color-primary' => get_option('cartrawler_primary'),
			'color-secondary' => get_option('cartrawler_secondary'),
			'color-complimentary' =>get_option('cartrawler_complimentary'), 
			'version' =>get_option('cartrawler_version'), 
			'clientid' =>get_option('cartrawler_clientid'), 
		);
		$atts_merge= 	array_merge($atts,$pre_atts); 
			$atts = shortcode_atts($atts_merge
		, $atts ,'cartrawler-form');
	
 $bttoncolor =get_option('cartrawler_primary');
 $formbgcolor =get_option('cartrawler_secondary');
 $labelcolor =get_option('cartrawler_complimentary');
 $formtitle =get_option('cartrawler_title');
 $mainColor =get_option('cartrawler_theme');
	?>
	<style>
 
  .ct-modal-container  ,.ct-navigation-arrows li, .ct-navigation-arrows .ct-navigation-arrows_item {
	   color: <?=$mainColor;?> !important;
  }
 .ct-navigation-arrows li.ct-active, .ct-navigation-arrows .ct-navigation-arrows_item.ct-active {
    background: <?=$mainColor;?>;
    color: white !important;
}
  .ct-navigation-arrows li.ct-active:after, .ct-navigation-arrows .ct-navigation-arrows_item.ct-active:after {
    border-left: 15px solid <?=$mainColor;?>;
} 
.ct-palette-p-bg-color ,.ct-btn-p  {
    background-color: <?=$mainColor;?> !important;
}
[data-step-name*="searchcars"] .ct-palette-p-bg-color , [data-step-name*="searchcars"] .ct-btn-p  {
    background-color: <?=$bttoncolor;?> !important;
}
[data-step-name*="searchcars"] .ct-grid {
	 background-color: <?=$formbgcolor;?> !important;
}
 .ct-grid label    {
	 color: <?=$labelcolor;?> !important;
}
 .ct-grid h2{
	color: <?=$formtitle;?> !important;
}
[data-step-name="details-with-payment"] .ct-grid label  {
	 color: black !important;
}
.ct-grid-unit-12-16.ct-body-content ,.ct-grid-unit-4-16.ct-context-content.ct-grid-unit-alpha.ct-context-content__filter-bar-feature {
    background: white !important;
}
  </style>
<div ct-app><noscript>YOUR BROWSER DOES NOT SUPPORT JAVASCRIPT</noscript></div>
	<script>
	var redirect =  <?=$atts['redirect'];?> ;
	/*console.log(redirect);*/
	 var CT ='';
	if(redirect){
     CT = {
		ABE: {
			Settings: {
			  clientID: '<?=$atts['clientid'];?>',   
				 step1: {
				deeplinkURL: "<?=$atts['redirect-deeplinkurl'];?>",
			 		strings: {
headingText: 'Best Car Rental Deals', labelSearch: 'airport, city, hotel name, address', labelPickup: 'Pick-up location', labelDropoff: 'Return location', labelPickupDate: 'Pick-up date', labelDropoffDate: 'Return date', placeholderPickup: 'airport, city, hotel name, address', placeholderDropoff: 'airport, city, hotel name, address',
}
			 },
				templateLayout: {
        breadcrumbs: true
      }
	
			},
			theme:  {
		    primary: '<?=$atts['color-primary'];?>',
			secondary: '<?=$atts['color-secondary'];?>',
			complimentary: '<?=$atts['color-complimentary'];?>'		
			}
		  }
		};
	}
	else {
		   CT = {
		ABE: {
			Settings: {
			  clientID: '<?=$atts['clientid'];?>',  
			},
			theme:  {
		     primary: '<?=$atts['color-primary'];?>',
			secondary: '<?=$atts['color-secondary'];?>',
			complimentary: '<?=$atts['color-complimentary'];?>'		
			}
		  }
		};
	}
   (function() {
		CT.ABE.Settings.version = '<?=$atts['version'];?>';
		var cts = document.createElement('script'); cts.type = 'text/javascript'; cts.async = true;
		cts.src = '//ajaxgeo.cartrawler.com/abe' + CT.ABE.Settings.version + '/ct_loader.js?' + new Date().getTime();
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(cts, s);
		//$(".ct-banner-red.ct-banner-no-fade-out").text("Hello world!");
	})();
 	
</script>
<?php
	}
}
add_shortcode( 'api-for-cartrawler-form', 'APIforCarTrawler_searchfrom' );

function APIforCarTrawler_settings_page() {
    add_submenu_page(
        'options-general.php', // top level menu page
        'Cartrawler Settings', // title of the settings page
        'Cartrawler Settings', // title of the submenu
        'manage_options', // capability of the user to see this page
        'cartrawler-settings', // slug of the settings page
        'APIforCarTrawler_page_html' // callback function when rendering the page
    );
    add_action('admin_init', 'APIforCarTrawler_settings_init');
}
add_action('admin_menu', 'APIforCarTrawler_settings_page');

function APIforCarTrawler_settings_init() {
    add_settings_section(
        'APIforCarTrawlerSetting-section', // id of the section
        'Cartrawler Settings', // title to be displayed
        '', // callback function to be called when opening section
        'APIforCarTrawlerSetting-page' // page on which to display the section, this should be the same as the slug used in add_submenu_page()
    );

  
 register_setting(
    'APIforCarTrawlerSetting-page', // option group
	
    'cartrawler_title_text'
);
add_settings_field(
    'titletxt', // id of the settings field
    'Form Title Text', // title
    'APIforCarTrawler_title_text_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
); 
 register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_clientid'
);
add_settings_field(
    'clientid', // id of the settings field
    'Client Id', // title
    'APIforCarTrawler_clientid_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_version'
);	 add_settings_field(
    'version', // id of the settings field
    'Version', // title
    'APIforCarTrawler_version_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_theme'
);	 
add_settings_field(
    'theme', // id of the settings field
    'Theme Color', // title
    'APIforCarTrawler_bg_theme_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_primary'
);	 
add_settings_field(
    'primary', // id of the settings field
    'Form Button Color', // title
    'APIforCarTrawler_bg_primary_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_secondary'
);	 
	add_settings_field(
    'secondary', // id of the settings field
    'Form Background Color', // title
    'APIforCarTrawler_bg_secondary_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_complimentary'
);
add_settings_field(
    'complimentary', // id of the settings field
    'Label Color', // title
    'APIforCarTrawler_bg_complimentary_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
register_setting(
    'APIforCarTrawlerSetting-page', // option group
    'cartrawler_title'
);
add_settings_field(
    'title', // id of the settings field
    'From title Color', // title
    'APIforCarTrawler_title_settings_field', // callback function
    'APIforCarTrawlerSetting-page', // page on which settings display
    'APIforCarTrawlerSetting-section' // section on which to show settings
);
}
function APIforCarTrawler_render_text() {
    $first_text = esc_attr(get_option('my_first_text', ''));

 echo '<h1>' . $first_text . '</h1>';
 

}
add_shortcode('APIforCarTrawlerSetting', 'APIforCarTrawler_render_text');
 

	
function APIforCarTrawler_title_text_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_title_text'));
		echo '<input type="text" name="cartrawler_title_text" value="' . $val . '" />';
	}
	
function APIforCarTrawler_clientid_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_clientid'));
		echo '<input type="text" name="cartrawler_clientid" value="' . $val . '" />';
	}

 

	  function APIforCarTrawler_version_settings_field() { 
		 
		$val =esc_attr(get_option('cartrawler_version'));
		echo '<input type="text" name="cartrawler_version" value="' . $val . '" />';
	}  

 function APIforCarTrawler_bg_theme_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_theme'));
		echo '<input type="text" name="cartrawler_theme" value="' . $val . '" class="cartrawler-color-picker" >';
		 
	}
 function APIforCarTrawler_bg_primary_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_primary'));
		echo '<input type="text" name="cartrawler_primary" value="' . $val . '" class="cartrawler-color-picker" >';
		 
	}


 function APIforCarTrawler_bg_secondary_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_secondary'));
		echo '<input type="text" name="cartrawler_secondary" value="' . $val . '" class="cartrawler-color-picker" >';
		 
	}

 

	  function APIforCarTrawler_bg_complimentary_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_complimentary'));
		echo '<input type="text" name="cartrawler_complimentary" value="' . $val . '" class="cartrawler-color-picker" >';
	
	  }

	  function APIforCarTrawler_title_settings_field() { 
		 
		$val = esc_attr(get_option('cartrawler_title'));
		echo '<input type="text" name="cartrawler_title" value="' . $val . '" class="cartrawler-color-picker" >';
	
	  }
function APIforCarTrawler_page_html() {
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>

 <div class="wrap">
    <?php settings_errors();?>
    <form method="POST" action="options.php">
        <?php settings_fields('APIforCarTrawlerSetting-page');?>
        <?php do_settings_sections('APIforCarTrawlerSetting-page')?>
        <?php submit_button();?>
    </form>
</div>
<?php
 

}
 