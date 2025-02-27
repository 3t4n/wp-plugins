<?php
/*
Plugin Name: Click & Pledge Connect
Plugin URI: https://manual.clickandpledge.com/
Description: The Click & Pledge CONNECT plugin provides a flexible and easy to add process for adding CONNECT forms to any WordPress template.
Version: 2.24120000-WP6.7.1
Author: Click & Pledge
Author URI: https://www.clickandpledge.com
*/

error_reporting(E_ALL);
global 	$cnp_table_name;
global  $wpdb;
global 	$cnp_formtable_name;
global  $cnpCampaignUrl;
global  $cnp_settingtable_name;
global  $cnp_channelgrptable_name;
global  $cnp_channeltable_name;
$blogtime      = current_time( 'timestamp', false );
$wp_dateformat = get_option('date_format');
$wp_timeformat = get_option('time_format');
$cnp_table_name              = $wpdb->prefix . "cnp_forminfo";
$cnp_formtable_name          = $wpdb->prefix . "cnp_formsdtl";
$cnp_settingtable_name       = $wpdb->prefix . "cnp_settingsdtl";
$cnp_channelgrptable_name    = $wpdb->prefix . "cnp_channelgrp";
$cnp_channeltable_name       = $wpdb->prefix . "cnp_channeldtl";
define('CFCNP_PLUGIN_CURRENTDATETIMEFORMATPHP',$wp_dateformat." ".$wp_timeformat);
/**
 * The Clickandpledge version string
 *
 * @global string $wpcnp_version
 */
ob_start();ob_get_clean();
function cnpconnect_update_notice() {
	if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$wpcnp_version = '2.24120000-WP6.7.1';
$all_plugins = get_plugins();

foreach ( array_keys( $all_plugins ) as $plugin_candidate ) { 
			if ( $plugin_candidate === "click-pledge-connect/clickandpledge_form.php" ) {
				
				if($wpcnp_version < $all_plugins[$plugin_candidate]['Version']) {
					$alertvar = "CRITICAL UPDATE: There is a new version of <strong>Click & Pledge Connect</strong> plugin.  Please <a href='plugins.php'>Update Now<a>";
    ?>
    <div class="error notice">
        <p><?php _e( $alertvar, 'my_plugin_textdomain'); ?></p>
    </div>
    <?php }
				break;
			}
}
}
add_action( 'admin_notices', 'cnpconnect_update_notice' );
function dateformatphptojs( $sFormat ) {
    switch( $sFormat ) {
        case 'F j, Y':
            return( 'MMMM DD, YYYY' );
            break;
        case 'Y/m/d':
            return( 'YYYY/MM/DD' );
            break;
        case 'm/d/Y':
            return( 'MM/DD/YYYY' );
            break;
        case 'd/m/Y':
            return( 'DD/MM/YYYY' );
            break;
		 case 'Y-m-d':
            return( 'YYYY-MM-DD' );
            break;
        case 'm-d-Y':
            return( 'MM-DD-YYYY' );
            break;
		case 'd-m-Y':
            return( 'DD-MM-YYYY' );
            break;
        case 'M j, Y':
            return( 'MMM dd,YYYY' );
            break;
		case 'l, F jS, Y':
			return( 'dddd, MMMM Do, YYYY' );
            break;
    }
}
$wp_dateformat = dateformatphptojs($wp_dateformat);
$wp_timeformat = str_replace("g","h",$wp_timeformat);
$wp_timeformat = str_replace("i","mm",$wp_timeformat);
$wp_timeformat = str_replace("H","HH",$wp_timeformat);

define( 'CNP_CF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CNP_CF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CFCNP_PLUGIN_NAME', basename(dirname(__FILE__)) );
define( 'CFCNP_PLUGIN_CURRENTTIME',date("Y-m-d H:i:00",$blogtime));
define( 'CFCNP_PLUGIN_CURRENTDATETIMEFORMAT',$wp_dateformat." ".$wp_timeformat);

/* When plugin is activated */
register_activation_hook(__FILE__,'Install_CNP_DB');


/* When plugin is deactivation*/

register_deactivation_hook(__FILE__, function() {
    // No specific logic here.
});
 function cnpconnectplugin_update_db_check() {
    global $wpdb;
    global $cnp_channelgrptable_name, $cnp_channeltable_name, $cnp_formtable_name, $cnp_table_name, $cnp_settingtable_name;

  
    $check_column = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = %s AND COLUMN_NAME = %s",
            $cnp_formtable_name,
            'cnpform_urlparameters'
        )
    );

    if ((int) $check_column === 0) {
        $wpdb->query(
            "ALTER TABLE $cnp_formtable_name ADD COLUMN `cnpform_urlparameters` TEXT NOT NULL"
        );
    }

  
    if ($wpdb->get_var("SHOW TABLES LIKE '{$cnp_channelgrptable_name}'") != $cnp_channelgrptable_name) {
        $sql = "CREATE TABLE $cnp_channelgrptable_name (
            cnpchannelgrp_ID INT(9) NOT NULL AUTO_INCREMENT,
            cnpchannelgrp_groupname VARCHAR(250) NOT NULL,
            cnpchannelgrp_cnpstngs_ID INT(15) NOT NULL,
            cnpchannelgrp_shortcode TEXT,
            cnpchannelgrp_custommsg VARCHAR(250) NOT NULL,
            cnpchannelgrp_channel_StartDate DATETIME NOT NULL,
            cnpchannelgrp_channel_EndDate DATETIME NOT NULL,
            cnpchannelgrp_status CHAR(1) DEFAULT 'a',
            cnpchannelgrp_Date_Created DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            cnpchannelgrp_Date_Modified DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (cnpchannelgrp_ID),
            KEY cnpfrm_id (cnpchannelgrp_ID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

  
    if ($wpdb->get_var("SHOW TABLES LIKE '{$cnp_channeltable_name}'") != $cnp_channeltable_name) {
        $sql = "CREATE TABLE $cnp_channeltable_name (
            cnpchannel_id INT(15) NOT NULL AUTO_INCREMENT,
            cnpchannel_cnpchannelgrp_ID INT(15) NOT NULL,
            cnpchannel_channelName VARCHAR(250) NOT NULL,
            cnpchannel_channelStartDate DATETIME NOT NULL,
            cnpchannel_channelEndDate DATETIME NOT NULL,
            cnpchannel_channelStatus CHAR(1) NOT NULL DEFAULT 'a',
            cnpchannel_DateCreated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            cnpchannel_DateModified DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (cnpchannel_id),
            KEY cnpfrm_id (cnpchannel_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

   
    if ($wpdb->get_var("SHOW TABLES LIKE '{$cnp_formtable_name}'") != $cnp_formtable_name) {
        $sql = "CREATE TABLE $cnp_formtable_name (
            cnpform_id INT(15) NOT NULL AUTO_INCREMENT,
            cnpform_cnpform_ID INT(15) NOT NULL,
            cnpform_CampaignName VARCHAR(250) NOT NULL,
            cnpform_FormName VARCHAR(250) NOT NULL,
            cnpform_GUID VARCHAR(250) NOT NULL,
            cnpform_FormStartDate DATETIME NOT NULL,
            cnpform_FormEndDate DATETIME NOT NULL,
            cnpform_FormStatus CHAR(1) NOT NULL DEFAULT 'a',
            cnpform_DateCreated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            cnpform_DateModified DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (cnpform_id),
            KEY cnpfrm_id (cnpform_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

   
    if ($wpdb->get_var("SHOW TABLES LIKE '{$cnp_table_name}'") != $cnp_table_name) {
        $sql = "CREATE TABLE $cnp_table_name (
            cnpform_ID INT(9) NOT NULL AUTO_INCREMENT,
            cnpform_groupname VARCHAR(250) NOT NULL,
            cnpform_cnpstngs_ID INT(15) NOT NULL,
            cnpform_AccountNumber VARCHAR(250) NOT NULL,
            cnpform_guid TEXT NOT NULL,
            cnpform_type TEXT NOT NULL,
            cnpform_ptype TEXT NOT NULL,
            cnpform_text VARCHAR(250) NOT NULL,
            cnpform_img BLOB NOT NULL,
            cnpform_shortcode TEXT,
            cnpform_custommsg VARCHAR(250) NOT NULL,
            cnpform_Form_StartDate DATETIME NOT NULL,
            cnpform_Form_EndDate DATETIME NOT NULL,
            cnpform_status CHAR(1) DEFAULT 'a',
            cnpform_Date_Created DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            cnpform_Date_Modified DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (cnpform_ID),
            KEY cnpfrm_id (cnpform_ID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

   
    if ($wpdb->get_var("SHOW TABLES LIKE '{$cnp_settingtable_name}'") != $cnp_settingtable_name) {
        $sql = "CREATE TABLE $cnp_settingtable_name (
            cnpstngs_ID INT(9) NOT NULL AUTO_INCREMENT,
            cnpstngs_frndlyname VARCHAR(250) NOT NULL,
            cnpstngs_AccountNumber VARCHAR(250) NOT NULL,
            cnpstngs_guid TEXT NOT NULL,
            cnpstngs_status CHAR(1) DEFAULT 'a',
            cnpstngs_Date_Created DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            cnpstngs_Date_Modified DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
            PRIMARY KEY (cnpstngs_ID),
            KEY cnpstngs_id (cnpstngs_ID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}

add_action( 'plugins_loaded', 'cnpconnectplugin_update_db_check' );

/* Creates the admin menu for the  plugin */
if ( is_admin() ){
	add_action('wp_default_scripts', function ($scripts) {
		if (!empty($scripts->registered['jquery'])) {
			$scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
		}
	});
	add_action('admin_menu', 'CNP_Plugin_Menu');
	add_filter('nav_menu_css_class', 'custom_active_item_classes', 10, 2 );
	add_action('admin_init', 'Add_CNP_Scripts');
  
	add_action( 'wp_ajax_getCnPUserChannelList', 'cnp_getCnPUserChannelList');
	add_action( 'wp_ajax_nopriv_getCnPUserChannelList', 'cnp_getCnPUserChannelList');
	
	
}
function cnp_getCnPUserChannelList($cnpacid) {
	
if (isset($_POST['cnpacid'])) {
    $cnpcnntaccountid = explode("~", sanitize_text_field($_POST['cnpacid']));
    
    if (count($cnpcnntaccountid) === 2) {
        $cnpcntaccountid = $cnpcnntaccountid[0];
        $cnpaccountGUID = $cnpcnntaccountid[1];
    } else {
        die('Invalid input format.');
    }

    $cnpUID = "14059359-D8E8-41C3-B628-E7E030537905";
    $cnpKey = "5DC1B75A-7EFA-4C01-BDCD-E02C536313A3";
    $connect = array('soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => true);

    try {
      
        $client = new SoapClient(CNP_CF_PLUGIN_PATH . 'Auth2.wsdl', $connect);

        if (!empty($cnpcntaccountid) && !empty($cnpaccountGUID)) {
          
            $xmlr = new SimpleXMLElement("<GetPledgeTVChannelList></GetPledgeTVChannelList>");
            $xmlr->addChild('accountId', htmlspecialchars($cnpcntaccountid));
            $xmlr->addChild('AccountGUID', htmlspecialchars($cnpaccountGUID));
            $xmlr->addChild('username', htmlspecialchars($cnpUID));
            $xmlr->addChild('password', htmlspecialchars($cnpKey));

            $response = $client->GetPledgeTVChannelList($xmlr);

            if (isset($response->GetPledgeTVChannelListResult->PledgeTVChannel)) {
                $responsearr = $response->GetPledgeTVChannelListResult->PledgeTVChannel;

                $cnptblresltdsply = '';

                if (is_array($responsearr)) {
                    foreach ($responsearr as $channel) {
                        $cnptblresltdsply .= '<tr>
                            <td>' . htmlspecialchars($channel->ChannelURLID) . '</td>
                            <td>' . htmlspecialchars($channel->ChannelName) . '</td>
                            <td>' . htmlspecialchars($channel->CreatedDate) . '</td>
                            <td>[CnP.pledgeTV ' . htmlspecialchars($channel->ChannelURLID) . ']</td>
                        </tr>';
                    }
                } else { 
                    $cnptblresltdsply .= '<tr>
                        <td>' . htmlspecialchars($responsearr->ChannelURLID) . '</td>
                        <td>' . htmlspecialchars($responsearr->ChannelName) . '</td>
                        <td>' . htmlspecialchars($responsearr->CreatedDate) . '</td>
                        <td>[CnP.pledgeTV ' . htmlspecialchars($responsearr->ChannelURLID) . ']</td>
                    </tr>';
                }
                
                echo $cnptblresltdsply;
            } else {
                echo '<tr><td colspan="4">No channels found.</td></tr>';
            }
        }
    } catch (Exception $e) {
        // Log error and output a friendly error message
        error_log('SOAP Error: ' . $e->getMessage());
        echo '<tr><td colspan="4">An error occurred while fetching data. Please try again later.</td></tr>';
    }
} else {
    echo '<tr><td colspan="4">Invalid request.</td></tr>';
}

die();

	}
/* Admin Page setup */
function CNP_Plugin_Menu() {
	global $CNP_Menu_page;
	$CNP_Menu_page =  add_menu_page(__('Click & Pledge'),'Click & Pledge', 8,'cnpcf_formshelp', 'cnpcf_formshelp');
	
	$cnpsettingscount = CNPCF_getAccountNumbersCount();
	if($cnpsettingscount > 0){
		 $CNP_Menu_page =  add_submenu_page('cnpcf_formshelp','CONNECT Forms','Form', 8,'CNP_formsdetails', 'CNP_formsdetails');
		 add_submenu_page('null', 'Form Groups', 'Form Groups', 8, 'cnp_formsdetails', 'CNP_formsdetails');
		 add_submenu_page('admin.php', 'Add Form Group', 'Add Form Group', 8, 'cnpforms_add', 'CNPS_addform');
		 add_submenu_page(null, 'View Form', 'View Form', 8, 'cnp_formdetails', 'cnp_formdetails');
	 
	$CNP_Menu_page =  add_submenu_page('cnpcf_formshelp','pledgeTV<sup class="cnpc-regsymbol">&reg;</sup>','pledgeTV<sup class="cnpc-regsymbol">&reg;</sup>', 8,'cnp_pledgetvchannelsdetails', 'cnp_pledgetvchannelsdetails'); 
	add_submenu_page('cnp_pledgetvchannelsdetails', 'Add Channel Group', 'Add Channel Group', 8, 'cnps_addchannel', 'CNPS_addchannel');
	add_submenu_page(null, 'View Channel', 'View Channel', 8, 'cnp_channeldetails', 'cnp_channeldetails');	
			}
	  

$CNP_Menu_page =  add_submenu_page('cnpcf_formshelp','Settings','Settings', 8,'cnp_formssettings', 'cnp_formssettings');
		 add_action("load-$CNP_Menu_page", "CNP_Screen_Options");
		 add_action( 'view_formsdetails', 'cnpcf_getselactivecampaigns' );
		 add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );
		// wp_enqueue_script('jquery-ui-datepicker');

		 wp_enqueue_style('jquery-ui-css',plugins_url(CFCNP_PLUGIN_NAME."/css/jquery-ui.css"));
}
function custom_active_item_classes($classes = array(), $menu_item = false){            
        global $post;
        $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
        return $classes;
    }

function CNP_Screen_Options() {
	global $CNP_Menu_page;

	$screen = get_current_screen();

	// get out of here if we are not on our settings page
	if(!is_object($screen) || $screen->id != $CNP_Menu_page)
		return;

	$args = array(
		'label' => __('Products per page', 'UPCP'),
		'default' => 20,
		'option' => 'cnp_products_per_page'
	);

	$screen->add_option( 'per_page', $args );
}
function enqueue_date_picker(){
                wp_enqueue_script(
			'field-date-js',
			'Field_Date.js',
			array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
			time(),
			true
		);

		wp_enqueue_style( 'jquery-ui-datepicker' );
}
function CNP_Set_Screen_Options($status, $option, $value) {
	if ('cnp_products_per_page' == $option) return $value;
}

add_filter('set-screen-option', 'cnp_products_per_page', 10, 3);
add_filter( 'sgs_whitelist_wp_content' , 'whitelist_file_in_wp_content' );
function whitelist_file_in_wp_content( $whitelist ) {
    $whitelist[] = 'cnpSettingmsgs.php';
    $whitelist[] = 'getcnpactivecampaigns.php';
$whitelist[] = 'getcnpditactivecampaigns.php';
    return $whitelist;
}
function Add_CNP_Scripts() {
	

		if (isset($_GET['page'])  && ($_GET['page'] == 'cnpform_add' || $_GET['page'] == 'cnps_addchannel' || $_GET['page'] == 'cnpforms_add' || $_GET['page'] == 'cnp_formssettings') )
		{
			$jsurl = plugins_url(CFCNP_PLUGIN_NAME."/js/Admin.js");
			wp_enqueue_script('Page-Builder', $jsurl, array('jquery'));

		if($_GET['page'] == 'cnpforms_add' || $_GET['page'] == 'cnps_addchannel')
		{
			$datamomentjsurl = plugins_url(CFCNP_PLUGIN_NAME."/js/moment.js");
		    wp_enqueue_script('Page-Moment', $datamomentjsurl);
			$bootstrapminurl = plugins_url(CFCNP_PLUGIN_NAME."/js/bootstrap.min.js");

			wp_enqueue_script('Page-Calendar', $bootstrapminurl, array('jquery'));
			

			$bootstrapdtpkrminurl = plugins_url(CFCNP_PLUGIN_NAME."/js/bootstrap-datetimepicker.min.js");
			wp_enqueue_script('Page-DatePickermin', $bootstrapdtpkrminurl, array('jquery'));

			$databtstrapmincssurl = plugins_url(CFCNP_PLUGIN_NAME."/css/bootstrap.min.css");
			wp_enqueue_style('Page-calcss', $databtstrapmincssurl);


			$datadtpkrmincssurl = plugins_url(CFCNP_PLUGIN_NAME."/css/bootstrap-datetimepicker.min.css");
			wp_enqueue_style('Page-dtpkrmincss', $datadtpkrmincssurl);

			$datadtpkrstandalonecssurl = plugins_url(CFCNP_PLUGIN_NAME."/css/bootstrap-datetimepicker-standalone.css");
			wp_enqueue_style('Page-standalonecss', $datadtpkrstandalonecssurl);
		 }
		}

		$datatableurl = plugins_url(CFCNP_PLUGIN_NAME."/js/jquery.dataTables.min.js");
		wp_enqueue_script('Page-Table', $datatableurl, array('jquery'));
		/*$datadialougeurl = plugins_url(CFCNP_PLUGIN_NAME."/js/jquery-ui.js");
		wp_enqueue_script('Page-dialoge', $datadialougeurl, array('jquery'));*/
		$datatablecssurl = plugins_url(CFCNP_PLUGIN_NAME."/css/cnptable.css");
		wp_enqueue_style('Page-Tablecss', $datatablecssurl);
	    $datatabledcssurl = plugins_url(CFCNP_PLUGIN_NAME."/css/jquery.dataTables.min.css");
		wp_enqueue_style('Page-Tablescss', $datatabledcssurl);

	    $datatablefontcssurl = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
		wp_enqueue_style('Page-Fontcss', $datatablefontcssurl);
	
		if (isset($_GET['page'])  && ($_GET['page'] == 'cnp_formsdetails') )
		{
			wp_add_inline_script( 'jquery-migrate', 'jQuery(document).ready(function(){
			jQuery("#cnpformslist").dataTable();
			jQuery("tr:even").css("background-color", "#f1f1f1");

		});
		');}
		if (isset($_GET['page'])  && ($_GET['page'] == 'cnpforms_add' || $_GET['page'] == 'cnps_addchannel') && ($_GET['act'] == 'add' || $_GET['act'] == 'edit'|| !isset($_GET['act']) ))
			{
				if($_GET['act'] == 'add' || !isset($_GET['act'])){

				

					
					
		}
			elseif($_GET['act'] == 'edit'){
		
	}
				}

}

require(dirname(__FILE__) . '/Functions/Install_CNP.php');
require(dirname(__FILE__) . '/Functions/functionscnp.php');
require(dirname(__FILE__) . '/cnpSettings.php');
require(dirname(__FILE__) . '/cnpFormDetails.php');
require(dirname(__FILE__) . '/FormDetails.php');
require(dirname(__FILE__) . '/FormAdd.php');
require(dirname(__FILE__) . '/cnphelpmanual.php');
require(dirname(__FILE__) . '/cnpPledgeTVDetails.php');
require(dirname(__FILE__) . '/cnptvchannelsDetails.php');
require(dirname(__FILE__) . '/channelAdd.php');
require(dirname(__FILE__) . '/ChannelDetails.php');
function CNPCF_friendlyname() {
global $wpdb, $cnp_settingtable_name;

$param = sanitize_text_field($_POST['param']);

$scnpSQL = $wpdb->prepare(
    "SELECT * FROM {$cnp_settingtable_name} WHERE cnpstngs_frndlyname = %s",
    $param
);

$cnpresults = $wpdb->get_results($scnpSQL);
$cnpformrows = count($cnpresults);

if ($cnpformrows > 0) {
    echo "Friendly Name already exists.";
    wp_die();
}


}
function CNPCF_cnpchnlgroupname() {
global $wpdb;	global $cnp_channelgrptable_name;

$param = sanitize_text_field($_POST['param']);

$scnpSQL = $wpdb->prepare(
    "SELECT * FROM {$cnp_channelgrptable_name} WHERE cnpchannelgrp_groupname = %s",
    $param
);
$cnpresults = $wpdb->get_results($scnpSQL);
$cnpformrows = count($cnpresults);

if ($cnpformrows > 0) {
    echo "Channel group name already exists.";
    wp_die();
}


}
function CNPCF_cnpgroupname() {
global $wpdb, $cnp_table_name;

$param = sanitize_text_field($_POST['param']);

$scnpSQL = $wpdb->prepare(
    "SELECT * FROM {$cnp_table_name} WHERE cnpform_groupname = %s",
    $param
);
$cnpresults = $wpdb->get_results($scnpSQL);
$cnpformrows = count($cnpresults);

if ($cnpformrows > 0) {
    echo "Form group name already exists.";
    wp_die();
}

}
function CNPCF_cnpaccountid() {
global $wpdb, $cnp_settingtable_name;

$param = sanitize_text_field($_POST['param']);

$scnpSQL = $wpdb->prepare(
    "SELECT * FROM {$cnp_settingtable_name} WHERE cnpstngs_AccountNumber = %s",
    $param
);

$cnpresults = $wpdb->get_results($scnpSQL);
$cnpformrows = count($cnpresults);

if ($cnpformrows > 0) {
    echo "Account already exists.";
    wp_die();
}

}
add_action('wp_ajax_CNPCF_friendlyname', 'CNPCF_friendlyname');
add_action('wp_ajax_nopriv_CNPCF_friendlyname', 'CNPCF_friendlyname');
add_action('wp_ajax_CNPCF_cnpaccountid', 'CNPCF_cnpaccountid');
add_action('wp_ajax_nopriv_CNPCF_cnpaccountid', 'CNPCF_cnpaccountid');
add_action('wp_ajax_CNPCF_cnpgroupname', 'CNPCF_cnpgroupname');
add_action('wp_ajax_nopriv_CNPCF_cnpgroupname', 'CNPCF_cnpgroupname');
add_action('wp_ajax_CNPCF_cnpchnlgroupname', 'CNPCF_cnpchnlgroupname');
add_action('wp_ajax_nopriv_CNPCF_cnpchnlgroupname', 'CNPCF_cnpchnlgroupname');
function load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
       //Enqueue
        wp_enqueue_script( 'jquery' );
	}
	wp_localize_script( 'ajax-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'load_jquery' );
function isexistpledgetvchannel($cnpaccid, $cnpaccguid, $channelid)
{
    $cnpUID = "14059359-D8E8-41C3-B628-E7E030537905";
    $cnpKey = "5DC1B75A-7EFA-4C01-BDCD-E02C536313A3";
    $connect = ['soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 0];

    try {
       
        $wsdlPath = CNP_CF_PLUGIN_PATH . 'Auth2.wsdl';
        if (!file_exists($wsdlPath)) {
            throw new Exception("WSDL file not found: $wsdlPath");
        }

      
        $client = new SoapClient($wsdlPath, $connect);

        if (!empty($cnpaccid) && !empty($cnpaccguid)) {
           
            $xmlRequest = new SimpleXMLElement("<GetPledgeTVChannelList></GetPledgeTVChannelList>");
            $xmlRequest->addChild('accountId', $cnpaccid);
            $xmlRequest->addChild('AccountGUID', $cnpaccguid);
            $xmlRequest->addChild('username', $cnpUID);
            $xmlRequest->addChild('password', $cnpKey);

            
            $response = $client->GetPledgeTVChannelList($xmlRequest);

          
            $channels = $response->GetPledgeTVChannelListResult->PledgeTVChannel ?? null;
            $channelFound = "no";

            if ($channels) {
               
                if (is_array($channels)) {
                    foreach ($channels as $channel) {
                        if ($channelid == $channel->ChannelURLID) {
                            $channelFound = "yes~" . $channel->ChannelName;
                            break;
                        }
                    }
                }
               
                elseif ($channelid == $channels->ChannelURLID) {
                    $channelFound = "yes~" . $channels->ChannelName;
                }
            }
        }
    } catch (Exception $e) {
      
        error_log("SOAP Error: " . $e->getMessage());
        return "An error occurred. Please try again later.";
    }

    return $channelFound;
}

function cnpform_GetShortCode($frmid){

global $wpdb;
global $cnp_table_name;
global $rtrnstr;


$chkshortcodexit = CNPCF_isExistShortcode($frmid[0]);

if ($chkshortcodexit) {
 
    add_action('wp_footer', 'cnphook_js');

   
    $cnpgrpnm = str_replace('-', ' ', $frmid[0]);
    $formid = CNPCF_getformsofGroup($cnpgrpnm);
    $formtyp = CNPCF_getFormType($cnpgrpnm);

    if (count($formid) >= 1) {
        $rtrnstrarr = '';

        for ($frminc = 0; $frminc < count($formid); $frminc++) {
            $attrs = ['data-guid' => $formid[$frminc]];
            $attrs_string = '';

            foreach ($attrs as $key => $value) {
                $attrs_string .= "$key='" . esc_attr($value) . "' ";
            }
            $attrs_string = ltrim($attrs_string);

            $cnpshortcodearray = explode("--", $formtyp);

            if ($cnpshortcodearray[0] === 'inline') {
                $rtrnstrarr .= '<div class="CnP_inlineform" ' . $attrs_string . '></div>';
            } elseif ($cnpshortcodearray[0] === 'popup') {
                if ($cnpshortcodearray[1] === 'text') {
                    $cnpGetImagesql = $cnpshortcodearray[2];
                    $rtrnstrarr .= '<a class="CnP_formlink" data-guid="' . $formid[$frminc] . '">' . $cnpGetImagesql . '</a>';
                } elseif ($cnpshortcodearray[1] === 'button') {
                    $cnpGetbuttontext = $cnpshortcodearray[2];
                    $cnpcurdatetim = "";

                    $rtrnstrarr .= '<div class="wp-block-buttons">
                        <div class="wp-block-button">
                            <a href="javascript:void(0);" class="wp-block-button__link CnP_formlink" data-guid="' . $formid[$frminc] . $cnpcurdatetim . '" style="cursor: pointer;">' . $cnpGetbuttontext . '</a>
                        </div>
                    </div>';
                } elseif ($cnpshortcodearray[1] === 'image') {
                    $cnpGetImage = $cnpshortcodearray[3];
                    $rtrnstrarr .= '<img class="CnP_formlink" src="data:image/jpeg;base64,' . base64_encode($cnpGetImage) . '" data-guid="' . $formid[$frminc] . '" style="cursor: pointer;">';
                }
            }
        }

        return $rtrnstrarr;
    } else {
        $rtrnstr = CNPCF_getGroupCustomerrmsg($frmid[0]);
        return $rtrnstr;
    }
} else {
    $rtrnstr = CNPCF_getGroupCustomerrmsg($frmid[0]);
    return $rtrnstr;
}

}
function cnpform_GetPledgeTVChannelsShortCode($chnlid){

global $wpdb;
global $cnp_table_name;
global $rtrnstr;

$chkshortcodexit = CNPCF_isExistchannelShortcode($chnlid[0]);

if ($chkshortcodexit) {
    $cnpgrpnm = str_replace('-', ' ', $chnlid[0]);
    $channelid = CNPCF_getchannelsofGroup($cnpgrpnm);

    if (count($channelid) >= 1) {
        $rtrnstrarr = "";

        for ($frminc = 0; $frminc < count($channelid); $frminc++) {
            $attrs = [
                'class' => 'cnp_pledgetv_wrapper',
                'data-channel' => $channelid[$frminc],
                'data-iframe-width' => '100%',
                'data-iframe-height' => '315'
            ];

            $attrs_string = '';
            foreach ($attrs as $key => $value) {
                $attrs_string .= "$key='" . esc_attr($value) . "' ";
            }

            $attrs_string = ltrim($attrs_string);

            $tvrtrnstr = "<script>
                var list = document.getElementsByTagName('script');
                var i = list.length, flag = false;
                while (i--) { 
                    if (list[i].src === 'https://pledge.tv/library/js/pledgetv.js') {
                        flag = true;
                        break;
                    }
                }

                if (!flag) {
                    var tag = document.createElement('script');
                    tag.src = 'https://pledge.tv/library/js/pledgetv.js';
                    document.getElementsByTagName('body')[0].appendChild(tag);
                }
            </script>";

            $tvrtrnstr .= '<div ' . $attrs_string . '></div>';
        }

        return $tvrtrnstr;
    } else {
        $rtrnstr = CNPCF_getGroupchnlCustomerrmsg($chnlid[0]);
        return $rtrnstr;
    }
} else {
    $rtrnstr = CNPCF_getGroupchnlCustomerrmsg($chnlid[0]);
    return $rtrnstr;
}

}
function cnpform_GetPledgeTVChannelShortCode($chanelid){

	global $wpdb;
	global $cnp_table_name;
	

	$attrs = array('class' => 'cnp_pledgetv_wrapper', 'data-channel' => $chanelid[0],'data-iframe-width'=>'100%','data-iframe-height'=>'315') ;
		$attrs_string = '';
		if(!empty( $attrs ) ) {

			foreach ( $attrs as $key => $value ) {
				$attrs_string .= "$key='" . esc_attr( $value ) . "' ";
			}
			$attrs = ltrim( $attrs_string );

	  	 }
	$tvrtrnstr ="<script>
	var list = document.getElementsByTagName('script');
				var i = list.length, flag = false;
				while (i--) { 
					if (list[i].src === 'https://pledge.tv/library/js/pledgetv.js') {
						flag = true;
						break;
					}
				}

				if (!flag) {
					var tag = document.createElement('script');
					tag.src = 'https://pledge.tv/library/js/pledgetv.js';
					document.getElementsByTagName('body')[0].appendChild(tag);
				}
				</script>";
	
	$tvrtrnstr.='<div '.$attrs .'></div>';
	return $tvrtrnstr;
}
add_shortcode('CnPConnect','cnpform_GetShortCode');
add_shortcode('CnP.Form','cnpform_GetShortCode');
add_shortcode('CnP.pledgeTV','cnpform_GetPledgeTVChannelsShortCode');
function cnpadddatetimepicker(){
	if (isset($_GET['page'])  && ($_GET['page'] == 'cnpforms_add' || $_GET['page'] == 'cnps_addchannel') && ($_GET['act'] == 'add' || $_GET['act'] == 'edit'|| !isset($_GET['act']) ))
	{
		if($_GET['act'] == 'add' || !isset($_GET['act'])){
	?>
			<script>
			jQuery(function () {
			
			jQuery("#txtcnpformstrtdt").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>',defaultDate:new Date()});
			jQuery("#txtcnpformenddt").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			jQuery("#txtcnpformstrtdt1").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			jQuery("#txtcnpformenddt1").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			
			jQuery("#txtcnpchnlstrtdt").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>',defaultDate:new Date()});
			jQuery("#txtcnpchnlenddt").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			jQuery("#txtcnpchnlstrtdt1").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			jQuery("#txtcnpchnlenddt1").datetimepicker({format: '<?php echo CFCNP_PLUGIN_CURRENTDATETIMEFORMAT; ?>'});
			
			});
			</script>
		<?php
		}}
	}
	
	 
	
	add_action('admin_footer', 'cnpadddatetimepicker',1000);

	function cnphook_js() {
		echo '<div style="display:none;"><input type="hidden" name="cnpversion" id="cnpversion" value="2.24120000-WP6.7.1" /></div>';
		?>
			
				<script>
			 
			 var list = document.getElementsByTagName('script');
				var i = list.length, flag = false;
				while (i--) { 
					if (list[i].src === 'https://resources.connect.clickandpledge.com/Library/iframe-1.0.0.min.js') {
						flag = true;
						break;
					}
				}

				if (!flag) {
					var tag = document.createElement('script');
					
					tag.class ='CnP_formloader';
					tag.src = 'https://resources.connect.clickandpledge.com/Library/iframe-1.0.0.min.js';
					document.getElementsByTagName('body')[0].appendChild(tag);
				}
			
			</script>
		<?php
	}
	
?>