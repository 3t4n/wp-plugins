<?php 

/*
Plugin Name: My Services
Plugin URI: https://aboutgaurishankar.wordpress.com/
Description: This is All in one Services Providing Plugin made for services Post. Simple but flexible.
Author: Gauri Shankar
Text Domain: my-services
Domain Path: /languages/
Version: 1.0.0
*/


if(!defined("ABSPATH"))
	exit();
if(!defined("MY_SERVICES_PLUGIN_DIR_PATH"))
define("MY_SERVICES_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
if(!defined("MY_SERVICES_PLUGIN_URL"))

//define("MY_SERVICES_PLUGIN_URL",plugins_url( 'my-aio-services',_FILE_));

define( 'MY_SERVICES_PLUGIN_URL', plugins_url('all-in-one-services') , true );

define ( 'MY_SERVICES_PLUGIN_VERSION', '1.0.0');


function my_services_plugin_menus(){	
	add_menu_page(
		'my-aio-services',//parent menu slug
		'My Services',//menu name
		'manage_options',//access perminition like admin can manage this
		'my-aio-services', //current menu Slug
		'my_services_view_services',//page slug
		'dashicons-share-alt',//icon for menu
		26 //possition of menu
	);

	add_submenu_page(
		'my-aio-services',// parent slug its in all sub menus
		'View Services',//menu name
		'View Services',//menu page name
		'manage_options',//manage option
		'my-aio-services',//sub menu page slug
		'my_services_view_services'//funtion name for this sub menu

	);

	add_submenu_page('my-aio-services','Add Services','Add Services','manage_options','add-services','my_services_add_services');

/*******Exctra Sub Menus***********/

	add_submenu_page('my-aio-services','Add Clients','Add Clients','manage_options','add-clients','my_services_add_client_function');
	add_submenu_page('my-aio-services','Manage Clients','Manage Clients','manage_options','manage-clients','my_services_manage_clients_function');
	add_submenu_page('my-aio-services','Add Access Users','Add Access Users','manage_options','add-access-users','my_services_add_access_users_function');
	add_submenu_page('my-aio-services','Manage Access Users','Manage Access Users','manage_options','manage-access-users','my_services_add_manage_access_users_function');
	add_submenu_page('my-aio-services','Service Tracker','Service Tracker','manage_options','service-tracker','my_services_add_service_tracker_function');


	add_submenu_page(
		'my-aio-services',
		'',
		'',
		'manage_options',
		'edit-services',
		'my_services_edit_services'

	);	

}
add_action('admin_menu','my_services_plugin_menus');


function my_services_add_client_function(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/add-client.php";

}

function my_services_manage_clients_function(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/manage-clients.php";

}

function my_services_add_access_users_function(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/add-access-users.php";

}

function my_services_add_manage_access_users_function(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/manage-access-users.php";

}

function my_services_add_service_tracker_function(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/service-tracker.php";

}

function my_services_view_services(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/view-services.php";

}

function my_services_add_services(){

	include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/add-services.php";

}

function my_services_edit_services(){

include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/edit-services.php";

}


add_filter("page_template","my_services_page_layout");

function my_services_page_layout($page_template){

	global $post;
	$post_slug = $post->post_name;
	if($post_slug=="my_gs_service"){

		$page_template = MY_SERVICES_PLUGIN_DIR_PATH."/views/fronend-services-list.php";
	}
	return $page_template;
}





/****************** Start  Code For including Style and script  ************************/

function my_services_custome_assets(){

	$slug = "";

	$page_include = array("frontendpage","my-aio-services","add-services","edit-services","add-clients","manage-clients","add-access-users","manage-access-users","service-tracker");
//sanitize_text_field page
	$currentpages = sanitize_text_field($_GET['page']);

	if(empty($currentpages)){

		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(preg_match("/my_gs_service/",$actual_link)){

			$currentpages = "frontendpage";
		} 


	}

	if(in_array($currentpages,$page_include)){

		wp_enqueue_style(
		"cutome_style_css",		
		MY_SERVICES_PLUGIN_URL."/assets/css/style.css",		
		"",		
		MY_SERVICES_PLUGIN_VERSION
	);

	wp_enqueue_style(
		"bootstrap_style",		
		MY_SERVICES_PLUGIN_URL."/assets/css/bootstrap.min.css",		
		"",		
		MY_SERVICES_PLUGIN_VERSION
	);

	wp_enqueue_style(
		"datatable_style",		
		MY_SERVICES_PLUGIN_URL."/assets/css/jquery.dataTables.min.css",		
		"",		
		MY_SERVICES_PLUGIN_VERSION
	);

	wp_enqueue_style(
		"nofificationbar_style",		
		MY_SERVICES_PLUGIN_URL."/assets/css/jquery.notifyBar.css",		
		"",		
		MY_SERVICES_PLUGIN_VERSION
	);

	wp_enqueue_style(
		"font_style",		
		MY_SERVICES_PLUGIN_URL."/assets/css/font-awesome.min.css",		
		"",		
		MY_SERVICES_PLUGIN_VERSION
	);

/********* START SCRIPT INCLUDE*******/
	
	wp_enqueue_script(
		"script.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/script.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);

	wp_enqueue_script(
		"bootstrap.min.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/bootstrap.min.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);

	wp_enqueue_script(
		"jquery.dataTables.min.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/jquery.dataTables.min.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);

	wp_enqueue_script(
		"jquery.notifyBar.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/jquery.notifyBar.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);

	wp_enqueue_script(
		"jquery.validate.min.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/jquery.validate.min.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);

	/*wp_enqueue_script(
		"tinymce.min.js",
		MY_SERVICES_PLUGIN_URL."/assets/js/tinymce.min.js",
		"",
		MY_SERVICES_PLUGIN_VERSION,
		true
	);*/


	}

	

wp_localize_script("script.js","myservicesajaxurl",admin_url("admin-ajax.php"));


/****** CLOSE SCRIPT INCLUDE********/
	
}
add_action("init","my_services_custome_assets");


/****************** Close  Code For including Style and script  ************************/


/***************  Code for the adding the tables into the database ****************/

function my_sercices_detaildata(){
 global $wpdb;

 return $wpdb->prefix."custom_my_services_data";

}


function my_services_custom_table(){

	global $wpdb;

	require_once(ABSPATH . "wp-admin/includes/upgrade.php");

		$custome_table_create_my_services = "CREATE TABLE `".my_sercices_detaildata()."` (
											 `id` int(10) NOT NULL AUTO_INCREMENT,
											 `name` varchar(500) NOT NULL,
											 `slug` varchar(500) NOT NULL,
											 `client_name` varchar(500) NOT NULL,
											 `description` varchar(2000) NOT NULL,
											 `serviceimage` varchar(500) NOT NULL,
											 `service_documnts` varchar(500) NOT NULL,
											 `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
											 `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
											 PRIMARY KEY (`id`)
											) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		dbDelta($custome_table_create_my_services);


$custome_table_create_my_services2 = "CREATE TABLE `".my_services_clientdetaildata()."` (
									 `id` int(50) NOT NULL AUTO_INCREMENT,
									 `name` varchar(200) NOT NULL,
									 `socila_link` varchar(1000) NOT NULL,
									 `about_client` varchar(1000) NOT NULL,
									 `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
									 `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
									 PRIMARY KEY (`id`)
									) ENGINE=InnoDB DEFAULT CHARSET=latin1
									";
		dbDelta($custome_table_create_my_services2);


$custome_table_create_my_services3 = "CREATE TABLE `".my_services_accessible_users()."` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `name` varchar(500) NOT NULL,
									 `email_id` varchar(500) NOT NULL,
									 `user_login_id` varchar(200) NOT NULL,
									 `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
									 `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
									 PRIMARY KEY (`id`)
									) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		dbDelta($custome_table_create_my_services3);		


$custome_table_create_my_services3 = "CREATE TABLE `".my_services_access_tracker()."` (
									 `id` int(11) NOT NULL AUTO_INCREMENT,
									 `serviceuser_id` int(11) NOT NULL,
									 `service_name` varchar(500) NOT NULL,
									 `service_id` int(11) NOT NULL,
									 `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
									 `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
									 PRIMARY KEY (`id`)
									) ENGINE=InnoDB DEFAULT CHARSET=latin1
									";
		dbDelta($custome_table_create_my_services3);

add_role("wp_gs_service_user_key", 'My Service User',array(

"read" =>true

));

/********** Dynamic page creation page**********/

				// Create post object
				$my_post = array(
				  'post_title'    => "My Services Page",
				  'post_content'  => "[my_service_list]",
				  'post_status'   => 'publish',
				  'post_type'     => 'page',
				  'post_name'    => 'my_gs_service'
				);
				 
				// Insert the post into the database
				$my_gs_servicedata = wp_insert_post($my_post);
				add_option("my_service_page_id", $my_gs_servicedata);

}

register_activation_hook(__FILE__,"my_services_custom_table");


function my_service_page_function(){
//echo "This is my Services page.";
include_once MY_SERVICES_PLUGIN_DIR_PATH."/views/my-services-list.php";

}

/*********** Service provider detail*************/


function my_services_client_detail($serviprovider_id){
	global $wpdb;
	$client_detail = $wpdb->get_row(
     $wpdb->prepare(

	"SELECT * FROM ".my_services_clientdetaildata()." WHERE id = %d ", $serviprovider_id),ARRAY_A
	);
	return $client_detail;
}

/*********** Service provider detail*************/

add_shortcode("my_service_list","my_service_page_function");


function my_services_clientdetaildata(){
 global $wpdb;
 return $wpdb->prefix."custom_my_serviceprivider_client";

}

function my_services_accessible_users(){
 global $wpdb;
 return $wpdb->prefix."custom_my_serviceaccessible_users";

}

function my_services_access_tracker(){
 global $wpdb;
 return $wpdb->prefix."custom_my_service_access";

}


/*****  Code for the deleting the tables from the database when deactivating the plugin ********/


function my_services_deactivate_table(){

	global $wpdb;
	$wpdb->query(" DROP TABLE IF EXISTS " . my_sercices_detaildata());

	$wpdb->query(" DROP TABLE IF EXISTS " . my_services_clientdetaildata());

	$wpdb->query(" DROP TABLE IF EXISTS " . my_services_accessible_users());

	$wpdb->query(" DROP TABLE IF EXISTS " . my_services_access_tracker());

/*********After deactivation removing the role*******/

if(get_role("wp_gs_service_user_key"))
{
	remove_role("wp_gs_service_user_key");
}

/*********After deactivation removing the role*******/

/*********Delete Auto created page********/

if(!empty(get_option("my_service_page_id"))){
	$servicepage_id = get_option("my_service_page_id");
	wp_delete_post($servicepage_id,true);
	delete_option("my_service_page_id");
}

/*********Delete Auto created page********/

}

register_deactivation_hook(__FILE__,"my_services_deactivate_table");

//register_uninstall_hook(__FILE__,"deactivate_table_my_services");

add_action('wp_ajax_myserviceslib','my_services_ajax_handler');


function my_services_ajax_handler(){

global $wpdb;


if(sanitize_text_field($_REQUEST['param'])=="save_accessuserdata"){
	//print_r($_REQUEST);,
	//username_exists($_REQUEST['username']) 

if(!username_exists(sanitize_text_field($_REQUEST['username'])) && !email_exists(sanitize_text_field($_REQUEST['email'])))

{

$useraccess_id = $accessuser_id = wp_create_user(sanitize_text_field($_REQUEST['username']),sanitize_text_field($_REQUEST['password']),sanitize_text_field($_REQUEST['email']));


$user =new WP_User($useraccess_id);

$user->set_role('wp_gs_service_user_key'); 

if(!empty($accessuser_id)) {

	$wpdb->insert(my_services_accessible_users(),array(
		"name"=>sanitize_text_field($_REQUEST['name']),
		"email_id"=> sanitize_text_field($_REQUEST['email']),
		"user_login_id"=> sanitize_text_field($accessuser_id)

	));
}
	echo json_encode(array("status"=>1,"message"=>"<h3>User Accesss Added Sucessfully !</h3>"));
 
}
else 

	echo json_encode(array("status"=>1,"message"=>"<h4>Username or Email id Already Exist Please try again!</h4>"));

} 

else

if(sanitize_text_field($_REQUEST['param'])=="delete_useraccessdata"){

	$wpdb->delete(my_services_accessible_users(),array(

		"user_login_id" => sanitize_text_field($_REQUEST['user_login_id'])

	));

	$udemsg = json_encode(array("status"=>1,"message"=>"<h3>Access User Deleted Sucessfully !</h3>"));
	echo $udemsg;

	if($udemsg=true){
$uiidd = sanitize_text_field($_REQUEST['user_login_id']);
$user = get_user_by( 'id', $uiidd );
if ( $user ) { // get_user_by can return false, if no such user exists
    wp_delete_user( $user->ID );

	}
}

} else


if(sanitize_text_field($_REQUEST['param'])=="save_clientdata"){
	//print_r($_REQUEST);
	$wpdb->insert(my_services_clientdetaildata(),array(
		"name"=>sanitize_text_field($_REQUEST['name']),
		"socila_link"=> sanitize_text_field($_REQUEST['socila_link']),
		"about_client"=>sanitize_text_field($_REQUEST['about_client'])

	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Client Added Sucessfully !</h3>"));
} 

else if(sanitize_text_field($_REQUEST['param'])=="delete_clientdata"){
	//print_r($_REQUEST);

	$wpdb->delete(my_services_clientdetaildata(),array(

		"id" => sanitize_text_field($_REQUEST['id'])

	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Client Deleted Sucessfully !</h3>"));

}

else

if(sanitize_text_field($_REQUEST['param'])=="save_servicedata"){
	//print_r($_FILE);
	//die();


$url['docfille_name']=sanitize_text_field($_REQUEST['docfille_name']).'';
$url['docfille_name1']=sanitize_text_field($_REQUEST['docfille_name1']);
$url['docfille_name2']=sanitize_text_field($_REQUEST['docfille_name2']);
$url['docfille_name3']=sanitize_text_field($_REQUEST['docfille_name3']);
$url['docfille_name4']=sanitize_text_field($_REQUEST['docfille_name4']);

	$wpdb->insert(my_sercices_detaildata(),array(

		"name"=>sanitize_text_field($_REQUEST['name']),
		"slug"=> sanitize_text_field(sanitize_title($_REQUEST['name'])),
		"client_name"=> sanitize_text_field($_REQUEST['client_name']),
		"description"=>sanitize_text_field($_REQUEST['description']),
		"serviceimage"=>sanitize_text_field($_REQUEST['image_name']),
		
//storage and retrieval methods 
'service_documnts' => serialize($url)

		
	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Services Added Sucessfully !</h3>"));
} 
else if(sanitize_text_field($_REQUEST['param'])=="edit_servicedata"){
	//print_r($_REQUEST);

$url['docfille_name']=sanitize_text_field($_REQUEST['docfille_name']).'';
$url['docfille_name1']=sanitize_text_field($_REQUEST['docfille_name1']);
$url['docfille_name2']=sanitize_text_field($_REQUEST['docfille_name2']);
$url['docfille_name3']=sanitize_text_field($_REQUEST['docfille_name3']);
$url['docfille_name4']=sanitize_text_field($_REQUEST['docfille_name4']);

	$wpdb->update(my_sercices_detaildata(),array(

		"name"=>sanitize_text_field($_REQUEST['name']),
		"slug"=> sanitize_text_field(sanitize_title($_REQUEST['name'])),
		"client_name"=> sanitize_text_field($_REQUEST['client_name']),
		"description"=>sanitize_text_field($_REQUEST['description']),
		"serviceimage"=>sanitize_text_field($_REQUEST['image_name']),

'service_documnts' => serialize($url)

	),array(
		"id"=>sanitize_text_field($_REQUEST['service_id'])

	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Services Updated Sucessfully !</h3>"));

} else if(sanitize_text_field($_REQUEST['param'])=="delete_servicedata"){
	//print_r($_REQUEST);

	$wpdb->delete(my_sercices_detaildata(),array(

		"id" => sanitize_text_field($_REQUEST['id'])

	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Services Deleted Sucessfully !</h3>"));

}

else if(sanitize_text_field($_REQUEST['param'])=="save_entollment"){
	//print_r($_REQUEST);
$accestabledata = my_services_access_tracker();
$PL_part_ID= sanitize_text_field($_REQUEST['service_id']);
$userdataassesid = new WP_User(get_current_user_id());

$accsserservs_id = $wpdb->get_results( "SELECT * FROM $accestabledata WHERE serviceuser_id = '$userdataassesid->ID' AND service_id = '$PL_part_ID'",OBJECT);

if (is_array($accsserservs_id) && !empty($accsserservs_id)) { 

	echo json_encode(array("status"=>2,"message"=>"<h3>You are Allready Enrolled!</h3>"));
 } else {

	$wpdb->insert(my_services_access_tracker(),array(

		"serviceuser_id"=>sanitize_text_field($_REQUEST['user_id']),
		"service_name" =>sanitize_text_field($_REQUEST['service_name']),
		"service_id"=>sanitize_text_field($_REQUEST['service_id'])

	));

	echo json_encode(array("status"=>1,"message"=>"<h3>You are Sucessfully Enrolled!</h3>"));
} }

else

if(sanitize_text_field($_REQUEST['param'])=="delete_serviceaccessdata"){
	//print_r($_REQUEST);

	$wpdb->delete(my_services_access_tracker(),array(

		"id" => sanitize_text_field($_REQUEST['id'])

	));
	echo json_encode(array("status"=>1,"message"=>"<h3>Track Detail Deleted Sucessfully !</h3>"));

}

wp_die();
}


// register our form css
function my_services_register_css() {
	wp_register_style('pippin-form-css', plugin_dir_url( __FILE__ ) . '/assets/css/style.css');
}
add_action('init', 'my_services_register_css');


// load our form css
function my_services_print_css() {
	global $pippin_load_css;
 
	// this variable is set to TRUE if the short code is used on a page/post
	if ( ! $pippin_load_css )
		return; // this means that neither short code is present, so we get out of here
 
	wp_print_styles('pippin-form-css');
}
add_action('wp_footer', 'my_services_print_css');


// user login form
function my_services_login_form() {
 
	if(!is_user_logged_in()) {
 
		global $my_services_print_css;
 
		// set this to true so the CSS is loaded
		$my_services_print_css = true;
 
		$output = my_services_form_fields();
	} else {
		// could show some logged in user info here
		// $output = 'user info here';
	}
	return $output;
}
add_shortcode('login_form', 'my_services_login_form');


// used for tracking error messages
function my_services_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function my_services_error_messages() {
	if($codes = my_services_errors()->get_error_codes()) {
		echo '<div class="my_services_errors">';
		    // Loop error codes and display errors
		   foreach($codes as $code){
		        $message = my_services_errors()->get_error_message($code);
		        echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
		    }
		echo '</div>';
	}	
}



// login form fields
function my_services_form_fields() {
 
	ob_start(); ?>
		<h3 class="pippin_header"><?php _e('Login Here'); ?></h3>
 
		<?php
		// show any error messages after form submission
		my_services_error_messages(); ?>
 
<form id="my_services_login_form"  class="pippin_form form-horizontal" action="" method="post">
			
<div class="form-group">    
    <label class="control-label" for="pippin_user_login">Username:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="pippin_user_login" name="pippin_user_login" required="">
    </div>
  </div>

  <div class="form-group">    
    <label class="control-label" for="pippin_user_pass">Password:</label>
    <div class="col-sm-12">
      <input type="password" class="form-control" id="pippin_user_pass" name="pippin_user_pass" required="">
    </div>
  </div>

<div class="form-group">
    <input type="hidden" name="pippin_login_nonce" value="<?php echo wp_create_nonce('pippin-login-nonce'); ?>"/>
	<input class="btn btn-default loginserbtn" id="pippin_login_submit" type="submit" value="Login"/>
  </div>
			
		</form>
	<?php
	return ob_get_clean();
}



// logs a member in after submitting a form
function my_services_login_member() {

	if(isset($_POST['pippin_user_login']) && wp_verify_nonce($_POST['pippin_login_nonce'], 'pippin-login-nonce')) {

		// Acccess global properties
		global $wpdb, $wp_hasher;

 
		// this returns the user ID and other info from the user name
		$user = get_userdatabylogin(sanitize_text_field($_POST['pippin_user_login']));
		
		//print_r($user);
		//die();

		 if(!$user){
        $error = new WP_Error();
        
        my_services_errors()->add('empty_username', __('Invalid username or password'));

        return $error;
    }
		
 
		if(!isset($_POST['pippin_user_pass']) || $_POST['pippin_user_pass'] == '') {
			// if no password was entered
			my_services_errors()->add('empty_password', __('Please enter a password'));
		}
 
		// check the user's login with their password
		if(!wp_check_password(sanitize_text_field($_POST['pippin_user_pass']), $user->user_pass, $user->ID)) {
			// if the password is incorrect for the specified user
			my_services_errors()->add('empty_password', __('Incorrect password'));
		}
 
		// retrieve all error messages
		$errors = my_services_errors()->get_error_messages();
 
		// only log the user in if there are no errors
		if(empty($errors)) {
 
			wp_setcookie(sanitize_text_field($_POST['pippin_user_login']), sanitize_text_field($_POST['pippin_user_pass']), true);
			wp_set_current_user($user->ID, sanitize_text_field($_POST['pippin_user_login']));	
			do_action('wp_login', sanitize_text_field($_POST['pippin_user_login']));
 
			//wp_redirect(home_url()); exit;
			if(isset($user->roles) && is_array($user->roles)){
			if(in_array("wp_gs_service_user_key", $user->roles)){
		
			return $redirect_to = site_url()."/my_gs_service/";

			exit;

		}}

		}
	}
}
add_action('init', 'my_services_login_member');



/********** Disaabled Admin bar ************/


add_action('after_setup_theme', 'my_services_remove_admin_bar');
 
function my_services_remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}



/********* Disaabled Admin bar ********/

add_action( 'profile_update', 'my_services_profile_redirect', 12 );
function my_services_profile_redirect() {
    if (current_user_can( 'wp_gs_service_user_key' ) ) {
        wp_redirect( trailingslashit( home_url('/my_gs_service/') ) );
        //return $redirect_to = site_url()."/my_gs_service/";
        exit;
    }
}

