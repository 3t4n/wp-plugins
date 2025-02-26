<?php
/*
 * Plugin Name: Allegro - Pobieranie aukcji allegro
 * Version: 2.0
 * Description: Plugin pobiera dane z aukcji allegro, rządanie dodaje aukcje do sklepu WooCommerce.
 * Author: e-Strix Kamil Mucik
 * Author URI: http://www.e-strix.pl/
 * Text Domain: e-strix-allegro-symc
 * Domain Path: /
 */
 
/**
 * TODO:
 * 1. Przygotowanie Crona co 12h - odswierzanie klucza allegro
 * 4. generowanie CSV/XML
 */
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

define( 'e_strix_allegro_symc_VERSION', '2.0' );
define( 'e_strix_allegro_symc_PATH', plugin_dir_path( __FILE__ ) );
define( 'e_strix_allegro_symc_URL', plugin_dir_url(__FILE__));

if( ! class_exists( 'EStrixAllegroSymcSettings' ) ) {
    require_once e_strix_allegro_symc_PATH . 'model/models_include.php';
}
if( ! class_exists( 'EStrixAllegroWebAPI' ) ) {
    require_once e_strix_allegro_symc_PATH . 'lib/e_strix_allegro_api.php';
}
if( ! class_exists( 'EStrixAllegroRESTApi' ) ) {
    require_once e_strix_allegro_symc_PATH . 'lib/e_strix_allegro_rest_api.php';
}
if( ! class_exists( 'EStrixWooHelper' ) ) {
    require_once e_strix_allegro_symc_PATH . 'lib/e_strix_woo_helper.php';
}
if( ! class_exists( 'EStrixHelper' ) ) {
    require_once e_strix_allegro_symc_PATH . 'lib/e_strix_helper.php';
}


/**
 * Install tables to database for plugin 
 */
function srtx_allegro_symc_install() {	
	//$installed_ver = get_option( "allegro_sync_db_version" );
	$new_ver = '' . e_strix_allegro_symc_VERSION;
	
	$allegroSyncAuctions = new EStrixAllegroSymcAuctions();
	$allegroSyncAuctions->install();
	
	
	$allegroSyncAuctionImage = new EStrixAllegroSymcAuctionImage();
	$allegroSyncAuctionImage->install();

    $allegroSyncSettings = new EStrixAllegroSymcSettings();
    $allegroSyncSettings->install(e_strix_allegro_symc_VERSION);
}
register_activation_hook(__FILE__, 'srtx_allegro_symc_install');

function srtx_allegro_symc_override() {
    $new_ver = '' . e_strix_allegro_symc_VERSION;
	$installed_ver = get_option( "allegro_sync_db_version" );
	
    if ( $new_ver != $installed_ver ) {
		$allegroSyncSettings = new EStrixAllegroSymcSettings();
        $allegroSyncSettings->update_database(e_strix_allegro_symc_VERSION);
		
		update_option( "allegro_sync_db_version", $new_ver );
    }	
}
add_action( 'plugins_loaded', 'srtx_allegro_symc_override' );

 /**
 * Remove tables from database for plugin My auctions allegro
 */
function srtx_allegro_symc_uninstall() {
    $allegroSyncAuctions = new EStrixAllegroSymcAuctions();
    $allegroSyncAuctions->uninstall();
    
    $allegroSyncAuctionImage = new EStrixAllegroSymcAuctionImage();
    $allegroSyncAuctionImage->uninstall();    
	
    $allegroSyncSettings = new EStrixAllegroSymcSettings();
    $allegroSyncSettings->uninstall();
}

register_deactivation_hook(__FILE__, 'srtx_allegro_symc_uninstall');

/**
 * Add item to admin menu
 */
function srtx_allegro_symc_plugin_menu() {
    add_menu_page( __('Allegro','e-strix-allegro-symc'), __('Allegro','e-strix-allegro-symc'),'administrator', 'srtx_allegro_symc_auctions', 'srtx_allegro_symc_auctions');
	add_submenu_page( 'srtx_allegro_symc_auctions', __('Allegro','e-strix-allegro-symc'), __('Auctions','e-strix-allegro-symc'), 'administrator', 'srtx_allegro_symc_auctions', 'srtx_allegro_symc_auctions');
	add_submenu_page( 'srtx_allegro_symc_auctions', __('Settings','e-strix-allegro-symc'), __('Settings','e-strix-allegro-symc'), 'administrator', 'srtx_allegro_symc_settings', 'srtx_allegro_symc_settings');
}

add_action('admin_menu', 'srtx_allegro_symc_plugin_menu');

/**
 * Translate for plugin
 */
function srtx_allegro_symc_translate(){
	load_plugin_textdomain(
		'e-strix-allegro-symc',
		false,
		dirname(plugin_basename(__FILE__))
	);
}

add_action('init','srtx_allegro_symc_translate');

/**
 * function to import scripts for plugin
 * @param string $hook
 */
function srtx_allegro_symc_add_import_script( $hook ) {
    switch($hook){
		default: 
			return;
	}
}
add_action('admin_enqueue_scripts', 'srtx_allegro_symc_add_import_script');

// create a scheduled event (if it does not exist already)
function cronstarter_activation() {
    if( !wp_next_scheduled( 'e_strix_allegro_symc_cronjob' ) ) {
        wp_schedule_event( time(), 'daily', 'e_strix_allegro_symc_cronjob' );
    }
}
// and make sure it's called whenever WordPress loads
add_action('wp', 'cronstarter_activation');

// unschedule event upon plugin deactivation
function cronstarter_deactivate() {
    // find out when the last event was scheduled
    $timestamp = wp_next_scheduled ('e_strix_allegro_symc_cronjob');
    // unschedule previous event if any
    wp_unschedule_event ($timestamp, 'e_strix_allegro_symc_cronjob');
}
register_deactivation_hook (__FILE__, 'cronstarter_deactivate');

function srtx_allegro_symc_settings(){
	global $title;
	$html .= '<h1>'.$title.'</h1>';	
	if( current_user_can( 'administrator' ) ){		
		$models = array('allegro_settings'=> new EStrixAllegroSymcSettings(),'my_auctions_allegro'=>new AllegroSyncFieldsSettingsForm());
		if(!empty($_POST)){
			$result = $models['allegro_settings']->save($_POST);
			if($result)
				$html .= srtx_show_success_result(__('Settings was updated','e-strix-allegro-symc'));
			else
				$html .= srtx_show_fault_result(__('Settings was not updated','e-strix-allegro-symc'));
		}	
		$fieldsModel = new AllegroSyncFieldsSettingsForm($models);
		$html .= $fieldsModel->show_settings_form();		
	} else {
		$html .= srtx_show_fault_result(__('Access denied.','e-strix-allegro-symc'));
	}
	srtx_show_container($html);
}

function srtx_allegro_symc_auctions() {
	global $title;
	$html = '';
	$action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : 'view';
	$paged = isset($_GET['paged']) ? intval($_GET['paged']) : 0;
	switch($action):		
		case 'edit':
			$html .= '<h1>'.$title.'</h1>';
			
			$fieldsModel = new AllegroSyncFieldsSettingsForm(array(new EStrixAllegroSymcSettings()));

			$html .= $fieldsModel->showAuctionSettingsForm($id);
			srtx_show_container($html);
			
			break;
		case 'download':
			$auctions = new EStrixAllegroSymcAuctions();
			$auctions -> delete_all();
			
			$auctionImagess = new EStrixAllegroSymcAuctionImage();
			$auctionImagess -> delete_all();
								
			$settings = new EStrixAllegroSymcSettings();
			$setParam = $settings->get_settings();
											
			$allegroApi = new EStrixAllegroRESTApi($setParam['allegro_client_id'],$setParam['allegro_client_secret'],$setParam['allegro_client_id'],$setParam['woocommerce_url'],$setParam['access_token']);
			
			$data = json_decode($allegroApi->getListingOffers($setParam['allegro_seller_id']), TRUE);			
			$result = true;
			
			foreach($data as $key => $value) {
			    if ($key == "items"){
			        foreach($value as $keyItem => $valueItem) {			            
			            if ($keyItem == "promoted"){
			                foreach($valueItem as $keyRegular => $valueRegular) {			                    
			                    $offer_data = json_decode($allegroApi->getOfferDetails($valueRegular['id']), TRUE);
			                    
			                    $auctions_last_id = $auctions -> add_auction(
			                        $valueRegular['id'],//auction_id
			                        $valueRegular['name'],//auction_title
			                        $valueRegular['images'][0]['url'].".jpg",//auction_img_1_url
			                        $valueRegular['sellingMode']['price']['amount'],//
			                        $valueRegular['stock']['available'],
			                        $offer_data['description']['sections'][0]['items'][0]['content']
		                        );
			                    
			                    foreach($valueRegular['images'] as $keyRegularImg => $valueRegularImg) {
			                        $auctionImagess->add_auction($auctions_last_id, $valueRegularImg['url'].".jpg");
			                    }
			                }
			            }
			            if ($keyItem == "regular"){
			                foreach($valueItem as $keyRegular => $valueRegular) {
			                    $offer_data = json_decode($allegroApi->getOfferDetails($valueRegular['id']), TRUE);
			                    
			                    $auctions_last_id = $auctions -> add_auction(
			                        $valueRegular['id'],//auction_id
			                        $valueRegular['name'],//auction_title
			                        $valueRegular['images'][0]['url'].".jpg",//auction_img_1_url
			                        $valueRegular['sellingMode']['price']['amount'],//
			                        $valueRegular['stock']['available'],
			                        $offer_data['description']['sections'][0]['items'][0]['content']
        			             );

			                    foreach($valueRegular['images'] as $keyRegularImg => $valueRegularImg) {
		                            $auctionImagess->add_auction($auctions_last_id, $valueRegularImg['url'].".jpg");
		                        }
			                }
			            }			            
			        }
			    }
			}	
			if($result) {
				echo srtx_show_success_result(__("Auctions was downloaded",'e-strix-allegro-symc'));
			}
			
			srtx_show_front_page($paged);
			break;
		case 'synchronize':
			$id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
			$aid = isset($_GET['aid']) ? intval($_GET['aid']) : 0;
			
			$auctions = new EStrixAllegroSymcAuctions();
			$item = $auctions -> get($id)[0];
			
			$settings = new EStrixAllegroSymcSettings();
			$setParam = $settings->get_settings();
			$result = true;
						
			$auctionImagess = new EStrixAllegroSymcAuctionImage();
			$img_arr = $auctionImagess->get_by_auction($id);
			
			$image_arr = array();
			foreach($img_arr['items'] as $keyRegularImg => $valueRegularImg) {
			    array_push($image_arr, array('src' =>$valueRegularImg['auction_img_url'] , 'position' =>$keyRegularImg ));	
			}
			
			$data = [
				'product' => [
					'title' => $item->{'auction_title'}, 
					'type' => 'simple', 
					'status' => 'pending', 
					'regular_price' => $item->{'auction_price'},
					'description' => $item->{'auction_description'},
					'images' => $image_arr
				]
			];
			
			try {
				$woo_helper = new EStrixWooHelper($setParam['woocommerce_url'],$setParam['woocommerce_ck'],$setParam['woocommerce_cs']);				
				$generated_url = $woo_helper -> generate_safe_url($data);
								
				$api_response = wp_remote_post( $generated_url['url'], $generated_url['request']);
				$body = json_decode( $api_response['body'] );
				
				if( wp_remote_retrieve_response_message( $api_response ) === 'Created' ) {
					$auctions -> set_woo_commerce_id($id,$body->product->id);
				}
			} catch(Exception $e) {
				$result = false;
				echo srtx_show_fault_result($e->getMessage());
			}
			if($result)
				echo srtx_show_success_result(__("Product was imported to store",'e-strix-allegro-symc'));
			else
				echo srtx_show_fault_result(__("Product was not imported to store",'e-strix-allegro-symc'));
			
		case 'view':
		default:
			srtx_show_front_page($paged);
	endswitch;
}

function srtx_show_front_page($paged){
	
	echo '<div class="wrap"><h1>' . $title . '<a class="page-title-action" href="'.admin_url('admin.php?page=srtx_allegro_symc_auctions&action=download').'">'. __("Download",'e-strix-allegro-symc') .'</a></h1>';
	$slt = new AllegroSyncAuctionWPTable();
	$slt->prepare_items($paged);
	echo '<form method="post"><input type="hidden" name="page" value="allegro" />';
	$slt->display();
	echo '</form></div>';
}

function srtx_show_container($html){
	echo '<div class="wrap" id="main-section">'.$html.'</div>';
}

function srtx_show_success_result($message = 'Ok'){
	return '<div class="updated notice"><p>'.$message.'!</p></div>';
}

function srtx_show_fault_result($message = 'Not ok'){
	return '<div class="error notice"><p>'.__('Something went wrong','e-strix-allegro-symc').'! '.$message.'.</p></div>';
}

function strx_get_attribute($array = array(), $param = '') {
	if( array_key_exists( $param ,$array) ) {
		return $array[$param];
	}
		
	
	return "";
}