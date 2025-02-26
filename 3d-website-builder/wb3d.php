<?php

/*
 * Plugin Name:       3D Website Builder
 * Author URI:        https://3dwebsitebuilder.com/
 * Description:       The new generation of plugins(More than a WordPress PageBuilder/Slider)
 * Version:           2.0.1
 * Requires at least: 4.9
 * Requires PHP:      7.2
 * Author:            3dwebsitebuilder
 * License:           GPL v3
 * Text Domain:       wb3d
 * Domain Path:       /languages
 */

if(!defined('ABSPATH')) exit();

global $wb3d_cunter0;
global $wb3d_php_id;
global $wb3d_php_ids;
global $wb3d_php_id_num;
global $wb3d_version;

global $wb3d_page;
global $wb3d_id;
global $wb3d_name;
global $wpdb;
global $wb3d_pro;
$wpdb->wb3d_setting=$wpdb->prefix.'wb3d_setting';
$wpdb->wb3d_slides=$wpdb->prefix.'wb3d_slides';

$wb3d_cunter0=0;
$wb3d_php_id_num=0;
$wb3d_version='2.0.1';
    
Define('wb3d_DIR', plugin_dir_path( __FILE__ ) );
define('wb3d_DIR_Pro',(explode("3d-website-builder",wb3d_DIR)[0]).'3d-website-builder-pro/' );
define('wb3d_BASE_URL', get_bloginfo('url'));
if (!defined('wb3d_plagin_images_URL')) {
	Define('wb3d_plagin_images_URL', plugins_url( 'images/',__FILE__ ) );
}
Define('wb3d_plagin_URL', plugins_url( '/',__FILE__ ) );
if (!defined('wb3d_plagin_Pro_URL')) {
	Define('wb3d_plagin_Pro_URL', (explode("3d-website-builder",wb3d_plagin_URL)[0]).'3d-website-builder-pro/' );
}


if ( isset( $_SERVER['REQUEST_URI'] )) {
	$REQUEST_URI1=sanitize_url($_SERVER['REQUEST_URI']);
}
if ( isset( $_SERVER['HTTP_HOST'] )  ) {
	$HTTP_HOST1=sanitize_url($_SERVER['HTTP_HOST']);
}

if(is_admin()){

	if(isset(explode("page=",$REQUEST_URI1)[1])){
		$wb3d_page=explode("page=",$REQUEST_URI1)[1] ; 
		$wb3d_page=explode("&",$wb3d_page)[0] ; 
	}
	else{
		$wb3d_page="";
	}
	 

	if(isset(explode("id=",$REQUEST_URI1)[1])){
		$wb3d_id= explode("id=",$REQUEST_URI1)[1] ;  
		$wb3d_id=explode("&",$wb3d_id)[0] ; 
	}
	else{
		$wb3d_id="";
	}

	if(isset(explode("name=",$REQUEST_URI1)[1])){
		$wb3d_name=explode("name=",$REQUEST_URI1)[1] ;  
		$wb3d_name=explode("&",$wb3d_name)[0] ; 
	}
	else{
		$wb3d_name="";
	}

}

$wb3d_URL=$HTTP_HOST1.$REQUEST_URI1;

$wb3d_URL_demo=str_replace("wb3d_main","wb3d_demo",$wb3d_URL);

Define('wb3d_URL',$wb3d_URL_demo  );
Define('wb3d_ADMIN_URL', wb3d_BASE_URL.'/wp-admin/' );

function wb3d_set_style_list() {
	global $wb3d_version;
	// wp_deregister_style('wp-admin');
	wp_enqueue_style( 'wb3d-liststyle',wb3d_plagin_URL.'css/list_style.css',false,$wb3d_version);
}
function wb3d_set_style_main() {
	global $wb3d_version;
	// wp_deregister_style('wp-admin');

	if(is_rtl()){
		wp_enqueue_style( 'wb3d-style2rtl', wb3d_plagin_URL.'css/style2rtl.css',false,$wb3d_version);
	}
	else{
		wp_enqueue_style( 'wb3d-style2', wb3d_plagin_URL.'css/style2.css',false,$wb3d_version);
	}
}
function wb3d_set_style_license(){
	global $wb3d_version;
	wp_enqueue_style( 'wb3d-style3', wb3d_plagin_URL.'css/style3.css',false,$wb3d_version);	
}
function wb3d_set_style_demo() {
	global $wb3d_version;
	// wp_deregister_style('wp-admin');
	if(is_rtl()){
		wp_enqueue_style( 'wb3d-style2rtl', wb3d_plagin_URL.'css/style2rtl.css',false,$wb3d_version);
	}
	else{
		wp_enqueue_style( 'wb3d-style2', wb3d_plagin_URL.'css/style2.css',false,$wb3d_version);
	}
}
function wb3d_set_style_view() {
	global $wb3d_version;
	wp_enqueue_style( 'wb3d-style', wb3d_plagin_URL.'css/style.css?',false,$wb3d_version);
}

$pluginList = get_option( 'active_plugins' );
$plugin = '3d-website-builder-pro/wb3d-pro.php'; 
if ( !in_array( $plugin , $pluginList ) ) {
	$wb3d_pro=0;
}
else{
	$wb3d_pro=1;	
}

require_once( ABSPATH . 'wp-includes/pluggable.php' );
if(is_admin()){
	add_action( 'init', 'wb3d_load_textdomain' );
	
	if($wb3d_page!=""){
		if($wb3d_page=="wb3d_main"){
			add_action( 'init', 'wb3d_set_style_main' );
		}
		else if(!is_numeric($wb3d_id)&&$wb3d_page=="wb3d_demo"){
			add_action( 'init', 'wb3d_set_style_list' );
		}
		else if($wb3d_page=="wb3d_demo"){
			add_action( 'init', 'wb3d_set_style_demo' );
		}
		else if($wb3d_page=="wb3d_demo_license"){
			add_action( 'init', 'wb3d_set_style_license' );
		}
	}
}
else{
	add_action( 'init', 'wb3d_set_style_view' );
}

function wb3d_load_textdomain() {
	// load_textdomain( 'wb3d',  plugin_dir_path( __FILE__ ).'/languages/'.get_locale().'.' );
	load_plugin_textdomain( 'wb3d', false ,basename( dirname( __FILE__ ) ) . '/languages' );
	// load_plugin_textdomain( 'wb3dpro', false ,'3d-website-builder-pro/languages' );
}
register_activation_hook(__FILE__,'wb3d_activate');
register_deactivation_hook(__FILE__,'wb3d_deactivate');

function wb3d_activate(){
      require wb3d_DIR.'admin/sql/create_database.php';
      wb3d_create_database();
}
function wb3d_deactivate(){
}

require wb3d_DIR.'template/page-template.class.php';


function wb3d_hall_register_block() {
	global $wb3d_version;
	if ( function_exists( 'register_block_type' ) ){

		wp_enqueue_script('wb3d_blocks', wb3d_plagin_URL. 'admin/js/add_block.min.js?',
			array( 'wp-i18n', 'wp-blocks', 'wp-block-editor' ,'wp-components','wp-element'),
			$wb3d_version,false
		);


		wp_localize_script('wb3d_blocks','wb3d_blocks',array(
			'wb3d_plagin_images_URL' =>wb3d_plagin_images_URL,
			'wb3d_plagin_URL' =>wb3d_plagin_URL,
			'wb3d_ADMIN_URL' =>wb3d_ADMIN_URL,
			'wb3d_BASE_URL' =>wb3d_BASE_URL,
			'wb3d_nonce' =>wp_create_nonce('wb3d_nonce'),
		));



		register_block_type( 'hall/block-server-side-render', array(
			'render_callback' => 'hall_render_inner_content',
			'attributes'      => array(
			'innerContent' => array(
			'type'    => 'array',
			// You should set a default value:
			'default' => array(), // if the attribute is an array
			//              'default' => '',      // if the attribute is a string
			),
			),
			// Here, your code is missing the block's script:
			'editor_script'   => 'hall-block-server-side-render',
		) );
	}
}


if(is_admin()){
	if ( function_exists( 'register_block_type' ) ){
		add_action( 'init', 'wb3d_hall_register_block' );
	}
	else{
		// init process for registering our button
		 add_action('init', 'wb3d_shortcode_button_init');
	}
}


 function wb3d_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true'){
           return;
      }

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "wb3d_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'wb3d_add_tinymce_button');
}


//This callback registers our plug-in
function wb3d_register_tinymce_plugin($plugin_array) {

	wp_enqueue_script('wb3d_tinymce', wb3d_plagin_URL. 'admin/js/tinymce.min.js', array(),$wb3d_version,false);

	wp_localize_script('wb3d_tinymce','wb3d_tinymce',array(
		'wb3d_plagin_images_URL' =>wb3d_plagin_images_URL,
		'wb3d_plagin_URL' =>wb3d_plagin_URL,
		'wb3d_ADMIN_URL' =>wb3d_ADMIN_URL,
		'wb3d_BASE_URL' =>wb3d_BASE_URL,
		'wb3d_nonce' =>wp_create_nonce('wb3d_nonce'),
	));

	$plugin_array['wb3d_button'] = wb3d_plagin_URL.'admin/js/tinymce.min.js';
	return $plugin_array;
}

//This callback adds our button to the toolbar
function wb3d_add_tinymce_button($buttons) {
	//Add the button ID to the $button array
	$buttons[] = "wb3d_button";
	return $buttons;
}
 
require wb3d_DIR.'admin/ajax/ajax-function.php';
require wb3d_DIR.'list_objects/list_objects_functions.php';

global $wb3d_addons;
global $wb3d_open_addons_A;
global $wb3d_pro;



$index=0;

require wb3d_DIR.'includes/img/admin/ajax.php';


$index++;

$scanned_directory = array_diff(scandir(wb3d_DIR.'modules/'), array('..', '.'));

for ($i=2;$i<count($scanned_directory)+2;$i++) {

	if ((is_dir(wb3d_DIR.'modules/'.$scanned_directory[$i])&&$scanned_directory[$i]!="")){ 
		$v=$scanned_directory[$i];
	if (file_exists(wb3d_DIR.'modules/'.$v.'/admin/ajax.php')) {
		require wb3d_DIR.'modules/'.$v.'/admin/ajax.php';
	}
	$index++;
	}
}

///////////////////////////////////////////////Pro version/////////////////////////////
$index=0;

if($wb3d_pro==1){

	$scanned_directory_pro = array_diff(scandir(wb3d_DIR_Pro.'modules/'), array('..', '.'));

	for ($i=2;$i<count($scanned_directory_pro)+2;$i++) {

		if ((is_dir(wb3d_DIR_Pro.'modules/'.$scanned_directory_pro[$i])&&$scanned_directory_pro[$i]!=""&&$wb3d_pro==1)){ 
			$v=$scanned_directory_pro[$i];
		if (file_exists(wb3d_DIR_Pro.'modules/'.$v.'/admin/ajax.php')) {
			require wb3d_DIR_Pro.'modules/'.$v.'/admin/ajax.php';
		}
		$index++;
		}
	}
}

//////////////////////////////////////////////////////////////////////////


add_action( 'admin_init','wb3d_css');

function wb3d_css() {
	global $wb3d_version;
	wp_enqueue_style( 'wb3d-style-menu-sidebar', wb3d_plagin_URL.'css/style-menu-sidebar.css',false,$wb3d_version);
}

global $plugin_page;

if(!is_admin()){
	require wb3d_DIR.'/shortcode/wb3d_shortcode.php';
}
if(is_admin()!=true&&$wb3d_cunter0==0){
	add_shortcode('wb3d_object', 'wb3d_add_shortcode');    
}
 



add_action('admin_menu', 'wb3d_admin_menu_bar');

function wb3d_demo_license(){
    require wb3d_DIR.'admin/html/pro.html';;
}

function wb3d_admin_menu_bar() {
	require wb3d_DIR.'admin/sql/sql_admin.php';

	add_menu_page(
		'3DWebsiteBuilder',
		__('3DWebsiteBuilder', 'wb3d'),
		'manage_options',
		'wb3d_main',
		'wb3d_menu_function',
		plugins_url('/images/wb3d.png',__FILE__),
		25.031    
	);

	add_menu_page(
		'3DWebsiteBuilder',
		__('3DWebsiteBuilder', 'wb3d'),
		'manage_options',
		'wb3d_demo',
		'wb3d_demo_function',
		plugins_url('/images/wb3d.png',__FILE__),
		25.031    
	);

	// add_submenu_page('wb3d_demo', 'Pro', __('Pro', 'wb3d'), 'manage_options', 'wb3d_demo_license', 'wb3d_demo_license');

}

function wb3d_demo_function(){
	global $wb3d_version;
	global $wb3d_page;
	global $wb3d_id;
	global $wb3d_name;
	global $wb3d_pro;
	if(!is_numeric($wb3d_id)&&$wb3d_page=="wb3d_demo"){    
		wp_enqueue_script( 'wb3d',wb3d_plagin_URL.'/list_objects/list_objects.js?', array(),$wb3d_version, false);
		wp_enqueue_media();
		wp_localize_script('wb3d','wb3d',array(
			'wb3d_plagin_images_URL' =>wb3d_plagin_images_URL,
			'wb3d_plagin_URL' =>wb3d_plagin_URL,
			'wb3d_ADMIN_URL' =>wb3d_ADMIN_URL,
			'wb3d_BASE_URL' =>wb3d_BASE_URL,
			'wb3d_nonce' =>wp_create_nonce('wb3d_nonce'),
		));
		require wb3d_DIR.'list_objects/list_objects_html.php';
	}
	else{

		global $wb3d_addons;
		global $wb3d_open_addons_A;
		$index=0;
		$scanned_directory = array_diff(scandir(wb3d_DIR.'modules/'), array('..', '.'));
		$wb3d_addons[$index]='img';
		require wb3d_DIR.'includes/img/view/index.php';
		$index++;
		for ($i=2;$i<count($scanned_directory)+2;$i++) {
			if ((is_dir(wb3d_DIR.'modules/'.$scanned_directory[$i])&&$scanned_directory[$i]!="")){ 
			$wb3d_addons[$index]=$scanned_directory[$i];
			require wb3d_DIR.'modules/'.$wb3d_addons[$index].'/view/index.php';
			$index++;
			}
		}

		///////////////////////////////////////Pro version////////////////////////////
		if($wb3d_pro==1){
			// $index=0;
			$scanned_directory_pro = array_diff(scandir(wb3d_DIR_Pro.'modules/'), array('..', '.'));
			for ($i=2;$i<count($scanned_directory_pro)+2;$i++) {
				if (is_dir(wb3d_DIR_Pro.'modules/'.$scanned_directory_pro[$i])&&$scanned_directory_pro[$i]!=""){ 
				$wb3d_addons[$index]=$scanned_directory_pro[$i];
				require wb3d_DIR_Pro.'modules/'.$wb3d_addons[$index].'/view/index.php';
				$index++;
				}
			}
		}

		///////////////////////////////////////////////////////////////////////////////////////////
		$myParam = $wb3d_id;
		wb3d_get_sql_data("demo",$myParam,0);
		for ($i=0;$i<count(array($wb3d_addons));$i++) {
			$flag=0;
			if(count(array($scanned_directory))>1){
				for ($j=2;$j<count(array($scanned_directory))+2;$j++) {
					if($wb3d_addons[$i]==$scanned_directory[$j]||$wb3d_addons[$i]=="img"){
						$flag=1;
					}
				}
				/////////////////////////////////////////////////Pro//////////////////////
				if($wb3d_pro==1){
					if($flag==0){
						for ($j2=2;$j2<count(array($scanned_directory_pro))+2;$j2++) {
							if($wb3d_addons[$i]==$scanned_directory_pro[$j2]||$wb3d_addons[$i]=="img"){
								$flag=1;
							}
						}
					}
				}
				//////////////////////////////////////////////////////////////////////////
				if($flag==0){
					echo 'folder modules/'.esc_html($wb3d_addons[$i]).' not found';
					die();
				}
			}
		}
		$files[0]=wb3d_plagin_URL.'includes/img/view/index.min.js?';
		$files2[0]=wb3d_plagin_URL.'includes/img/view/style.css?';
		wb3d_enqueue_function("demo");
		global $wb3d_version;

		wp_enqueue_script('img-js',wb3d_plagin_URL.'includes/img/view/index.min.js?', array(), $wb3d_version, false);

		for ($i=0;$i<count($wb3d_open_addons_A[0]);$i++) {
			if($wb3d_open_addons_A[0][$i]!="img"){
				if (file_exists(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js')) {
					wp_enqueue_script( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-js',wb3d_plagin_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js?',array(),$wb3d_version, false);
				}
				else if (file_exists(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js')) {
					wp_enqueue_script( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-js',wb3d_plagin_Pro_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/index.min.js?',array(),$wb3d_version, false);
				}

				if (file_exists(wb3d_DIR.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css')) {
					if(is_rtl())
						wp_enqueue_style( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/rtl.css?', false,$wb3d_version);
					else
						wp_enqueue_style( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css?', false,$wb3d_version);
				}
				else 	if (file_exists(wb3d_DIR_Pro.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css')) {
					if(is_rtl())
						wp_enqueue_style( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_Pro_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/rtl.css?', false,$wb3d_version);
					else
						wp_enqueue_style( 'wb3d_'.$wb3d_open_addons_A[0][$i].'-style',wb3d_plagin_Pro_URL.'modules/'.$wb3d_open_addons_A[0][$i].'/view/style.css?', false,$wb3d_version);
				}
			}
			wp_localize_script('wb3d_'.$wb3d_open_addons_A[0][$i].'-js','wb3d_'.$wb3d_open_addons_A[0][$i],array(
				'wb3d_plagin_images_URL' =>wb3d_plagin_images_URL,
				'wb3d_ADMIN_URL' =>wb3d_ADMIN_URL,
			));
		}
		require wb3d_DIR.'admin/html/phpall2.php';        
	}
}

function wb3d_menu_function(){
	global $wb3d_page;
	global $wb3d_id;
	global $wb3d_name;
	global $wb3d_pro;

	if($wb3d_id==""&&$wb3d_page=="wb3d_main"){    
		require wb3d_DIR.'list_objects/list_objects_html.php';
	}
	else{
		global $wb3d_addons;
		global $wb3d_addons2;
		global $wb3d_open_addons_A;
		$index=0;
		$scanned_directory = array_diff(scandir(wb3d_DIR.'modules/'), array('..', '.'));
		require wb3d_DIR.'includes/img/admin/index.php';
		$wb3d_addons[$index]='img';
		$index++;

		for ($i=2;$i<count($scanned_directory)+2;$i++) {

		    if ((is_dir(wb3d_DIR.'modules/'.$scanned_directory[$i])&&$scanned_directory[$i]!="")){ 

		$wb3d_addons[$index]=$scanned_directory[$i];

		require wb3d_DIR.'modules/'.$wb3d_addons[$index].'/admin/index.php';
		$index++;
		    }
		}

		//////////////////////Pro/////////////////////////////////
		if($wb3d_pro==1){

			// $index=0;
			$scanned_directory_pro = array_diff(scandir(wb3d_DIR_Pro.'modules/'), array('..', '.'));
			// require wb3d_DIR.'includes/img/admin/index.php';
			// $wb3d_addons[$index]='img';
			// $index++;

			for ($i=2;$i<count($scanned_directory_pro)+2;$i++) {

			    if ((is_dir(wb3d_DIR_Pro.'modules/'.$scanned_directory_pro[$i])&&$scanned_directory_pro[$i]!="")&&$wb3d_pro==1){ 

			$wb3d_addons[$index]=$scanned_directory_pro[$i];

			require wb3d_DIR_Pro.'modules/'.$wb3d_addons[$index].'/admin/index.php';
			$index++;
			    }
			}
		}
		else{
			$index=0;
			
			$scanned_directory_pro2 = array_diff(scandir(wb3d_DIR.'demo/'), array('..', '.'));
			for ($i=2;$i<count($scanned_directory_pro2)+2;$i++) {
				if (is_dir(wb3d_DIR.'demo/'.$scanned_directory_pro2[$i])&&$scanned_directory_pro2[$i]!=""){ 
				$wb3d_addons2[$index]=$scanned_directory_pro2[$i];
				// echo wb3d_DIR.'demo/'.$wb3d_addons2[$index].'/admin/button1.php';
			// die();
				// require wb3d_DIR.'demo/'.$wb3d_addons2[$index].'/admin/button1.php';
				$index++;
				}
			}
		}
		////////////////////////////////////////

		require wb3d_DIR.'admin/html/editeffects2.php';

		$myParam = $wb3d_id;
		wb3d_get_sql_data("main",$myParam,0);
		wb3d_enqueue_function("main");

		global $wb3d_version;
		wp_enqueue_script('wb3d_img-js',wb3d_plagin_URL.'includes/img/admin/index.js?', array(),$wb3d_version, true);
		if(is_rtl())
			wp_enqueue_style('wb3d_img-style',wb3d_plagin_URL.'includes/img/admin/rtl.css',false,$wb3d_version);
		else
			wp_enqueue_style('wb3d_img-style',wb3d_plagin_URL.'includes/img/admin/style.css',false,$wb3d_version);

		for ($i=0;$i<count($wb3d_addons);$i++) {

			if($wb3d_addons[$i]!="img"){
				if (file_exists(wb3d_DIR.'modules/'.$wb3d_addons[$i].'/admin/index.js')) {
					wp_enqueue_script( 'wb3d_'.$wb3d_addons[$i].'-js',wb3d_plagin_URL.'modules/'.$wb3d_addons[$i].'/admin/index.js?', array(),$wb3d_version, true);
					if(is_rtl())
						wp_enqueue_style( 'wb3d_'.$wb3d_addons[$i].'-style',wb3d_plagin_URL.'modules/'.$wb3d_addons[$i].'/admin/rtl.css',false,$wb3d_version);
					else
						wp_enqueue_style( 'wb3d_'.$wb3d_addons[$i].'-style',wb3d_plagin_URL.'modules/'.$wb3d_addons[$i].'/admin/style.css',false,$wb3d_version);
				}
				else if (file_exists(wb3d_DIR_Pro.'modules/'.$wb3d_addons[$i].'/admin/index.js')) {
					wp_enqueue_script( 'wb3d_'.$wb3d_addons[$i].'-js',wb3d_plagin_Pro_URL.'modules/'.$wb3d_addons[$i].'/admin/index.js?', array(),$wb3d_version, true);

					if(is_rtl())
						wp_enqueue_style( 'wb3d_'.$wb3d_addons[$i].'-style',wb3d_plagin_Pro_URL.'modules/'.$wb3d_addons[$i].'/admin/rtl.css',false,$wb3d_version);
					else
						wp_enqueue_style( 'wb3d_'.$wb3d_addons[$i].'-style',wb3d_plagin_Pro_URL.'modules/'.$wb3d_addons[$i].'/admin/style.css',false,$wb3d_version);
				}
			}
		}
		require wb3d_DIR.'admin/html/phpall.php';           
	}

}



function wb3d_enqueue_function($flag){
	global $wb3d_php_id;
	global $wb3d_php_ids;
	global $wb3d_php_id_num;
	global $wb3d_version;
	global $wb3d_pro;





	if($flag!="view"){
		wp_enqueue_media();
		wp_enqueue_style('wp-jquery-ui-dialog');
		wp_enqueue_script(array('jquery', 'jquery-ui-core','jquery-ui-resize', 'jquery-ui-mouse', 'jquery-ui-accordion', 'jquery-ui-datepicker', 'jquery-ui-dialog', 'jquery-ui-slider', 'jquery-ui-autocomplete', 'jquery-ui-sortable', 'jquery-ui-droppable', 'jquery-ui-tabs', 'jquery-ui-widget', 'wp-color-picker1', 'wpdialogs', 'updates'));
	}

	if($flag=="view"){
		wp_enqueue_script( 'wb3d',wb3d_plagin_URL.'view/wb3d.min.js?', array(),$wb3d_version, false);	
	}
	if($flag!="view"){
		wp_enqueue_script( 'wb3d',wb3d_plagin_URL.'admin/js/wb3d.min.js?', array(),$wb3d_version, false);	
		wp_enqueue_script( 'wb3d-set_style',wb3d_plagin_URL.'admin/js/set_style.min.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-run_layers',wb3d_plagin_URL.'admin/js/run_layers.min.js?', array(),$wb3d_version, false);

		wp_enqueue_script( 'wb3d-balance',wb3d_plagin_URL.'admin/js/balance.min.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-event',wb3d_plagin_URL.'admin/js/event.min.js?', array(),$wb3d_version, false);

		wp_enqueue_script( 'wb3d-save_data',wb3d_plagin_URL.'admin/js/save_data.min.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-jszip',wb3d_plagin_URL.'admin/jszip/jszip.min.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-FileSaver',wb3d_plagin_URL.'admin/jszip/FileSaver.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-createlayerpanel',wb3d_plagin_URL.'admin/js/createlayerpanel.js?', array(),$wb3d_version, false);
		wp_enqueue_style( 'bygiro-style',wb3d_plagin_URL.'admin/colorpicker/jquery.colorpicker.bygiro.min.css?', array(),$wb3d_version,false);
		wp_enqueue_script( 'bygiro',wb3d_plagin_URL.'admin/colorpicker/jquery.colorpicker.bygiro.min.js?', array(),$wb3d_version, false);
		wp_enqueue_script( 'wb3d-start',wb3d_plagin_URL.'admin/js/start.min.js?', array(),$wb3d_version, false);
	}
	if(is_rtl())
		$rtl=1;
	else
		$rtl=0;
	wp_localize_script('wb3d','wb3d',array(
		'wb3d_time' =>time(),
		'flag' =>$flag,
		'wb3d_addons_0' =>wp_json_encode($GLOBALS['wb3d_addons']),
		'wb3d_php_id_0' =>wp_json_encode($GLOBALS['wb3d_php_id']),
		'wb3d_php_ids_0' =>wp_json_encode($GLOBALS['wb3d_php_ids']),
		'wb3d_php_id_num_0' =>wp_json_encode($GLOBALS['wb3d_php_id_num']),
		'wb3d_messages_0' =>wp_json_encode($GLOBALS['wb3d_js']),
		'wb3d_ADMIN_URL' =>wb3d_ADMIN_URL,
		'wb3d_nonce' =>wp_create_nonce('wb3d_nonce'),
		'wb3d_plagin_images_URL' =>wb3d_plagin_images_URL,
		'wb3d_BASE_URL' =>wb3d_BASE_URL,
		'wb3d_plagin_URL'=>wb3d_plagin_URL,
		'wb3d_plagin_Pro_URL'=>wb3d_plagin_Pro_URL,
		'wb3d_pro'=>$wb3d_pro,
		'rtl'=>$rtl,
	));


	if($flag=="demo"){
		wp_enqueue_style( 'wb3d-style', wb3d_plagin_URL.'css/style.css?',false,$wb3d_version);
		wp_enqueue_script( 'wb3d-functions2',wb3d_plagin_URL.'admin/js/functions2.min.js?', array(), $wb3d_version, false);
	}	
	else if($flag=="view"){
		wp_enqueue_style( 'wb3d-style', wb3d_plagin_URL.'css/style.css?',false,$wb3d_version);
	}
	else{
		wp_enqueue_script( 'wb3d-functions',wb3d_plagin_URL.'admin/js/functions.min.js?', array(), $wb3d_version, false);
	}
         
}
?>