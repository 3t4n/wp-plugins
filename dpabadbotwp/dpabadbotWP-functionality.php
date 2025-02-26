<?php
/**
 * Plugin Name: dpaBadBotWP
 * Plugin URI: https://www.drpeterscode.com/bad-bot-exterminator-protects-wordpress-sites-from-hackers-cyber-ddos-dos-attacks.php
 * Description: dpaBadtBotWP is a plugin to be used with The Bad Bot Exterminator Pro, standalone firewall php program. The dpaBadBotWP plugin sends The Bad Bot Exterminator Pro your IP address automatically, so that you will not be blocked. You need to purchase the Bad Bot Exterminator Pro separately before using this plugin. The Bad Bot Extermnator Pro can lock up WordPress so that no one can login (stops hackers from logging in) and to track your visitors. By tracking visitors it blocks hackers, spiders, crawlers, scrappers, all of whom overload your server and hack your site. You can, in LENIENT mode manually block by IP address and by spider or bad bot name. Has multiuser tracking of IP addresses. And for safety sake, this plugin stops WordPress automatic core updates. Don't allow your server to automatically update WordPress as you need to UNLOCK WordPress and STOP TRACKING visitors, in the Bad Bot Exterminator Pro, before upgrading WordPress. You can now check your webpage speeds and generate simple sitemapsin the Bad Bot Extermnator Pro.
 * Version: 1.27 [20200927]
 * Author: Dr. Peter Achutha
 * Author URI: https://www.drpeterscode.com/
 * License: 
 
 */
 
defined('ABSPATH') or die("No script kiddies please!");

// Function to get the client ip address
function spmy_dpabadbot_get_client_ip() {
    $ipaddress = '';
    $ipaddress = getenv('REMOTE_ADDR');
/*
	if( $ipaddress == '' ){	
		$ipaddress = getenv('HTTP_CLIENT_IP');
		if( $ipaddress == '' ){	
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
			if( $ipaddress == '' ){	
				$ipaddress = getenv('HTTP_FORWARDED');
				if( $ipaddress == '' ){	
				$ipaddress = getenv('HTTP_X_FORWARDED');
				if( $ipaddress == '' ){	
					$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
					}
					else { 
						$ipaddress = 'UNKNOWN';
						}
				}
			}
		}
	}
*/
 return( trim( $ipaddress ) );
}


function spmy_dpabadbot_shutdowndpabadbot()
{
global $_SERVER;
    // This is our shutdown function, in 
    // here we can do any last operations
    // before the script is complete.
	$siteis = site_url().'/dpabadbot/';
	$path = __DIR__;
$lastpos = strrpos( $path, 'wp-content' );
$maindir = substr_replace( $path, 'dpabadbot/', $lastpos );	
$timecheckfile = $maindir.'config/speedtimer.txt';
$timecheckspeedfile = $maindir.'config/speedtimerok.txt';
	if( file_exists($timecheckspeedfile) ){
	$tmpx = spmy_dpabadbot_read_file( $timecheckspeedfile );
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$tmp = unserialize( $tmpx );	
	if( $tmp[0] == 'TEST' && $tmp[1] == $ipaddress ){
		if( file_exists($timecheckfile) ){
		$tmpb = spmy_dpabadbot_read_file( $timecheckfile );
		$tmpa = unserialize( $tmpb );
		$tmpa[1] = microtime(true);
		$tmpa[2] = $tmpa[1] - $tmpa[0];
		$tmpb = serialize( $tmpa );
		spmy_dpabadbot_write_file( $timecheckfile, $tmpb ) ;
		}
//	echo '<br>Start: '.$tmpa[0].' End: '.$tmpa[1].'<br>time taken: '.$tmpa[2].' for '.$tmpa[4]; 
	} //else { //echo '<br>$tmp'.$tmp; }
} //else { echo '<br>'.$timecheckspeedfile.' DOES NOT EXISTS'; }
} 


register_shutdown_function('spmy_dpabadbot_shutdowndpabadbot');

function spmy_dpabadbot_addform(){
include('spmy_dpabadbot_form.php');
}


function spmy_dpabadbot_actions() {
 
//$spmywp_dpabadbot_ip = spmy_dpabadbot_get_client_ip();

add_options_page("dpaBadBotWP", "DpaBadBotWPMenu", 'administrator', "dpaBadBotWP_Menu", "spmy_dpabadbot_addform"); 
}
 
function dpabadbotbottomofpagelink()
{
echo '<div style="text-align:center"><a target="_blank" href="https://drpeterscode.com/bad-bot-exterminator-protects-wordpress-sites-from-hackers-cyber-ddos-dos-attacks.php">Protected by the Bad Bot Exterminator Pro</a></div>';
}
 
 
function spmy_dpabadbot_post_numbers(){
global $wpdb,$post;
clearstatcache();
$spmywp_dpaphpcache_post_count = wp_count_posts();
foreach ($spmywp_dpaphpcache_post_count as $key => $value) {
	$spmywp_dpaphpcache_post_nos[$key] = $value ;
	}	
unset( $spmywp_dpaphpcache_post_count ); //clear memory
//echo 'Total posts: '.$iz.' '; 
$spmywp_datadir = dirname(__FILE__) ;
$wppathstr = dirname(__FILE__) ; //initialise data so that it will not give trouble later

$spmywp_plugins_dir = dirname(__FILE__); //not url anymore
$spmywp_plugindir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
$spmywp_datadiralt = $spmywp_plugindir; //.'/'.$spmywp_plugins_name ;

$spmywp_dpabadbot_setup_file = $spmywp_datadiralt .'/setup.txt';
$spmywp_strpos = strripos( $spmywp_datadir, 'wp-content' );
if( $spmywp_strpos !== false ){
	$wppathstr = substr( $spmywp_datadir, 0, $spmywp_strpos  );
	}
//echo '<br>functionality $wppathstr: '.$wppathstr.'  ';
$spmywp_dpabadbot_setup_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file );
$spmywp_dpabadbot_setup_data = unserialize( $spmywp_dpabadbot_setup_tmp );
$spmywp_dpabadbot_setup_sz = count( $spmywp_dpabadbot_setup_data );

if( strlen( $spmywp_dpabadbot_setup_tmp ) > 2 && $spmywp_dpabadbot_setup_sz > 0 ){
	if( $spmywp_dpabadbot_setup_data[0] != '' ){
		$spmywp_dpabadbot_path = $spmywp_dpabadbot_setup_data[0];
		$spmywp_dpabadbot_posts_file = $spmywp_dpabadbot_path.'config/wpposts.txt';
		spmy_dpabadbot_write_file( $spmywp_dpabadbot_posts_file, serialize( $spmywp_dpaphpcache_post_nos['publish'] ) );
		}
	}

//$spmy_dpabadbot_categories =  get_categories();
$spmy_dpabadbot_result = $wpdb->get_results("SELECT $wpdb->terms.*, $wpdb->term_taxonomy.* FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->term_taxonomy.taxonomy='category' AND $wpdb->term_taxonomy.term_id=$wpdb->terms.term_id");
//$spmy_dpabadbot_i = 0;

foreach($spmy_dpabadbot_result as $key => $post){
  $spmy_dpabadbot_categoriesy = $post->term_id ;// 20180912-1053 removed the '/' 
  $spmy_dpabadbot_categoriesx[$spmy_dpabadbot_categoriesy][0] = $post->slug ;// 20180912-1053 removed the '/' 
  $spmy_dpabadbot_categoriesx[$spmy_dpabadbot_categoriesy][1] = $post->parent ;// 20180912-1053 removed the '/' 

}
$spmy_dpabadbot_i = 0;
$spmy_dpabadbot_categoriesxsz = count( $spmy_dpabadbot_categoriesx );
foreach( $spmy_dpabadbot_categoriesx as $key => $value ){
if( $spmy_dpabadbot_categoriesx[$key][1] == 0 ){
$spmy_dpabadbot_tmpstr = '/category/'.$spmy_dpabadbot_categoriesx[$key][0].'/' ;
$spmy_dpabadbot_categories[$spmy_dpabadbot_i] = $spmy_dpabadbot_tmpstr;
$spmy_dpabadbot_categoriesn[$spmy_dpabadbot_tmpstr] = $spmy_dpabadbot_i;
} else {
$spmy_dpabadbot_tmpstr = '/category/'.$spmy_dpabadbot_categoriesx[$spmy_dpabadbot_categoriesx[$key][1]][0].'/'.$spmy_dpabadbot_categoriesx[$key][0].'/';
$spmy_dpabadbot_categories[$spmy_dpabadbot_i] = $spmy_dpabadbot_tmpstr ;
$spmy_dpabadbot_categoriesn[$spmy_dpabadbot_tmpstr] = $spmy_dpabadbot_i ;
}
$spmy_dpabadbot_i++;
}

$spmywp_tempstr_categories = serialize( $spmy_dpabadbot_categories );
$spmywp_tempstr_categoriesn = serialize( $spmy_dpabadbot_categoriesn );

//20180921 get guid setting
$spmy_dpabadbot_result = $wpdb->get_results("SELECT $wpdb->posts.*  FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' OR post_type = 'page' ");
$spmy_dpabadbot_i = 0;
foreach($spmy_dpabadbot_result as $key => $post){
  $spmy_dpabadbot_id[$spmy_dpabadbot_i] = $post->ID ;// 20180912-1053 removed the '/'  
    $spmy_dpabadbot_idx[$post->ID] = $post->post_name ;// 20180912-1053 removed the '/' 
	$spmy_dpabadbot_idy[$post->post_name] = $post->ID ;// 20180912-1053 removed the '/'
	$spmy_dpabadbot_idtmp = $post->post_date ;// 20180912-1053 removed the '/'
	$spmy_dpabadbot_idtmp = substr( $spmy_dpabadbot_idtmp, 0, 10);
	$spmy_dpabadbot_idtmp = '/'.substr( $spmy_dpabadbot_idtmp, 0, 4).'/'.substr( $spmy_dpabadbot_idtmp, 5, 2).'/';
	$spmy_dpabadbot_idz[$spmy_dpabadbot_idtmp] = $spmy_dpabadbot_idtmp;
	$spmy_dpabadbot_idb[$spmy_dpabadbot_i] = array( $post->ID, $post->post_type, $post->post_name, date( 'Y-m-d', strtotime( $post->post_date ) ));
	$spmy_dpabadbot_i++;
}

$spmywp_tempstr_id = serialize( $spmy_dpabadbot_id );
$spmywp_tempstr_idx = serialize( $spmy_dpabadbot_idx );
$spmywp_tempstr_idy = serialize( $spmy_dpabadbot_idy );
$spmywp_tempstr_idz = serialize( $spmy_dpabadbot_idz );
$spmywp_tempstr_idb = serialize( $spmy_dpabadbot_idb );

if( !empty($spmywp_dpabadbot_setup_data[0]) ){
	if( file_exists( $spmywp_dpabadbot_setup_data[0] ) ){
	if( file_exists( $spmywp_dpabadbot_setup_data[0].'config' ) ){

	$spmywp_dpabadbot_categories_file = $spmywp_dpabadbot_setup_data[0].'config/categorieslist.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_categories_file, $spmywp_tempstr_categories );	
	$spmywp_dpabadbot_categoriesn_file = $spmywp_dpabadbot_setup_data[0].'config/categoriesname.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_categoriesn_file, $spmywp_tempstr_categoriesn );		
	$spmywp_dpabadbot_id_file = $spmywp_dpabadbot_setup_data[0].'config/postpageid.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_id_file, $spmywp_tempstr_id );	
	$spmywp_dpabadbot_idx_file = $spmywp_dpabadbot_setup_data[0].'config/idpostname.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_idx_file, $spmywp_tempstr_idx );		
	$spmywp_dpabadbot_idy_file = $spmywp_dpabadbot_setup_data[0].'config/postnameid.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_idy_file, $spmywp_tempstr_idy );
	$spmywp_dpabadbot_idz_file = $spmywp_dpabadbot_setup_data[0].'config/archivename.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_idz_file, $spmywp_tempstr_idz );	
	$spmywp_dpabadbot_idb_file = $spmywp_dpabadbot_setup_data[0].'config/wppostpageinfo.txt';
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_idb_file, $spmywp_tempstr_idb );	
		}
	  }
	}

	
}

function spmy_dpabadbot_read_file( $f ){
$tmpstr = '';
if( file_exists( $f ) ){
	$fh = fopen( $f, 'r');
	$tmpstr = fread( $fh, filesize( $f ) );
	fclose( $fh );
	} else {
//	echo '<br>File Does Not Exists: '.$f.'<br> ';
	}
return( $tmpstr );
}

function spmy_dpabadbot_write_file( $f, $d ){
$fh = fopen( $f, 'w' );
fwrite( $fh, $d, strlen( $d ) );
fflush( $fh );
fclose( $fh );
}

function spmy_dpabadbot_append_file( $f, $d ){
$fh = fopen( $f, 'a' );
fwrite( $fh, $d, strlen( $d ) );
fflush( $fh );
fclose( $fh );
}


$spmywp_datadirp = dirname(__FILE__) ;
$spmywp_string_positionp = strripos( $spmywp_datadirp , 'wp-content');
$spmywp_datadiraltp = substr_replace( $spmywp_datadirp , 'wp-includes' , $spmywp_string_positionp  );
$spmywp_dpabadbot_pluggable_file = $spmywp_datadiraltp .'/pluggable.php';
$spmywp_dpabadbot_pluggable_fileup = $spmywp_datadiraltp .'/update.php';
//echo '<br>$spmywp_dpabadbot_pluggable_file: '.$spmywp_dpabadbot_pluggable_file.'  ';
include_once( $spmywp_dpabadbot_pluggable_fileup ); //include this one first as it is called in pluggable.php
include_once( $spmywp_dpabadbot_pluggable_file );


$spmywp_datadir = dirname(__FILE__) ;
$wppathstr = dirname(__FILE__) ; //initialise data so that it will not give trouble later
$spmywp_plugins_dir = dirname(__FILE__); //not url anymore
$spmywp_plugindir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
$spmywp_datadiralt = $spmywp_plugindir; //.'/'.$spmywp_plugins_name ;
$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';

$spmywp_dpabadbot_setup_file = $spmywp_datadiralt .'/setup.txt';

$spmywp_dpabadbot_setup_tmp ='';
$spmywp_dpabadbot_setup_sz = 0;
if( file_exists( $spmywp_dpabadbot_setup_file )){
$spmywp_dpabadbot_setup_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file );
$spmywp_dpabadbot_setup_data = unserialize( $spmywp_dpabadbot_setup_tmp );
$spmywp_dpabadbot_setup_sz = count( $spmywp_dpabadbot_setup_data );
}
if( strlen( $spmywp_dpabadbot_setup_tmp ) > 2 && $spmywp_dpabadbot_setup_sz > 0 ){
	$spmywp_dpabadbot_path = $spmywp_dpabadbot_setup_data[0];
} else {
$spmywp_dpabadbot_path = $spmywp_datadiralt; //wrong path but atleast it is set to a value
}


//check dpabadbot files exists
$spmywp_dpabadbot_datadir = $spmywp_dpabadbot_path.'data/';
$spmywp_dpabadbot_ip_file = $spmywp_dpabadbot_path.'data/wpipadd.txt';
//$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';

//declare the function
if( !function_exists( 'spmy_dpabadbot_deleteipadd' )){
function spmy_dpabadbot_deleteipadd(){
global $spmywp_datadir, $spmywp_plugins_dir, $spmywp_plugindir, $spmywp_datadiralt, $spmywp_dpabadbot_uploads_ip_file, $spmywp_dpabadbot_uploads_ip_file200, $spmywp_dpabadbot_datadir, $spmywp_dpabadbot_ip_file;
//$spmywp_datadir = dirname(__FILE__) ;
//$spmywp_plugins_dir = dirname(__FILE__); //not url anymore
//$spmywp_plugindir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
//$spmywp_datadiralt = $spmywp_plugindir; 
//$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
//$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';

$spmywp_dpabadbot_setup_file = $spmywp_datadiralt .'/setup.txt';
$spmywp_dpabadbot_setup_tmp ='';
$spmywp_dpabadbot_setup_sz = 0;
if( file_exists( $spmywp_dpabadbot_setup_file ) ){
$spmywp_dpabadbot_setup_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file );
$spmywp_dpabadbot_setup_data = unserialize( $spmywp_dpabadbot_setup_tmp );
$spmywp_dpabadbot_setup_sz = count( $spmywp_dpabadbot_setup_data );
}

if( strlen( $spmywp_dpabadbot_setup_tmp ) > 2 && $spmywp_dpabadbot_setup_sz > 0 ){
	$spmywp_dpabadbot_path = $spmywp_dpabadbot_setup_data[0];
	//check dpabadbot files exists
	//$spmywp_dpabadbot_datadir = $spmywp_dpabadbot_path.'data/';
	//$spmywp_dpabadbot_ip_file = $spmywp_dpabadbot_path.'data/wpipadd.txt';
	//$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
	//$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';
	
	if( file_exists( $spmywp_dpabadbot_datadir ) ){
		if( file_exists( $spmywp_dpabadbot_uploads_ip_file ) ){

			$spmywp_dpabadbot_ip_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_uploads_ip_file ) ;
			if( strlen( $spmywp_dpabadbot_ip_tmp ) > 6 ){//find all ip addresses older than 2 days and delete
			$spmywp_dpabadbot_ip_addrs = unserialize( $spmywp_dpabadbot_ip_tmp );
			$spmywp_dpabadbot_ip_time = (time()- 86400) ;
			foreach( $spmywp_dpabadbot_ip_addrs as $mykey => $myvalue){
				if( $spmywp_dpabadbot_ip_addrs[$mykey][1] < $spmywp_dpabadbot_ip_time ){
					unset( $spmywp_dpabadbot_ip_addrs[$mykey] );
					}	
				}
			spmy_dpabadbot_write_file( $spmywp_dpabadbot_uploads_ip_file, serialize( $spmywp_dpabadbot_ip_addrs) );	
			foreach( $spmywp_dpabadbot_ip_addrs as $mykey => $myvalue){
				if( $spmywp_dpabadbot_ip_addrs[$mykey][3] > 0 ){
				$spmywp_dpabadbot_ip_addrs_tmp[$mykey] = $spmywp_dpabadbot_ip_addrs[$mykey];
				//echo '<br>1. key '.$mykey;
					//unset( $spmywp_dpabadbot_ip_addrs[$mykey] );
					}	
				}
				spmy_dpabadbot_write_file( $spmywp_dpabadbot_ip_file, serialize( $spmywp_dpabadbot_ip_addrs_tmp) );	
			}
	
			$spmywp_dpabadbot_ip = spmy_dpabadbot_get_client_ip();	//get ip address
			$spmywp_dpabadbot_ip_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_uploads_ip_file );
			if( strlen( $spmywp_dpabadbot_ip_tmp ) > 6 ){
				$spmywp_dpabadbot_ip_addrs = unserialize( $spmywp_dpabadbot_ip_tmp );
				}
				if( !isset( $spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip] ) ){
				$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][0] = $spmywp_dpabadbot_ip ;
				$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][1] = time() ;	
				$spmywp_dpabadbot_current_user = wp_get_current_user();
				$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][2] = $spmywp_dpabadbot_current_user->user_login;
				$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][3] = $spmywp_dpabadbot_current_user->ID;
				$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][4] = $_SERVER['REQUEST_URI'];
				spmy_dpabadbot_write_file( $spmywp_dpabadbot_uploads_ip_file, serialize( $spmywp_dpabadbot_ip_addrs) );
				if( $spmywp_dpabadbot_current_user->ID > 0 ){
				foreach( $spmywp_dpabadbot_ip_addrs as $mykey => $myvalue){
				if( $spmywp_dpabadbot_ip_addrs[$mykey][3] > 0 ){
				$spmywp_dpabadbot_ip_addrs_tmp[$mykey]  = $spmywp_dpabadbot_ip_addrs[$mykey];
				//echo '<br>2. key '.$mykey;
					//unset( $spmywp_dpabadbot_ip_addrs[$mykey] );
					}	
				}
				spmy_dpabadbot_write_file( $spmywp_dpabadbot_ip_file, serialize( $spmywp_dpabadbot_ip_addrs_tmp) );
				}
				}
			}

		}
	}
}
}


if( !function_exists( 'dpabadbotendofpage' )){
	function dpabadbotendofpage(){
global $_SERVER, $spmy_dpabadbot_installbase, $spmy_dpabadbot_filebase;

$timecheckfile1 = $spmy_dpabadbot_installbase.'config/speedtimer1.txt';
$timecheckspeedfile = $spmy_dpabadbot_installbase.'config/speedtimerok.txt';
	if( file_exists($timecheckspeedfile) ){
	$tmpx = spmy_dpabadbot_read_file( $timecheckspeedfile );
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$tmp = unserialize( $tmpx );
	if(  $tmp[0] == 'TEST' && $tmp[1] == $ipaddress ){
		if( file_exists($timecheckfile1) ){
		$endofbrowsertime = $spmy_dpabadbot_filebase.'pgf/endoftime.php';
		echo "<script type='text/javascript'>window.top.location='".$endofbrowsertime."';</script>";
		}
	} //else { //echo '<br>$tmp'.$tmp; }
	} 
}
}

if( !function_exists( 'spmy_dpabadbot_login_hook' )){
function spmy_dpabadbot_login_hook(){
global $spmywp_datadir, $spmywp_plugins_dir, $spmywp_plugindir, $spmywp_datadiralt, $spmywp_dpabadbot_uploads_ip_file, $spmywp_dpabadbot_uploads_ip_file200, $spmywp_dpabadbot_datadir, $spmywp_dpabadbot_ip_file;

//$spmywp_datadir = dirname(__FILE__) ;

//$spmywp_plugins_dir = dirname(__FILE__); //not url anymore
//$spmywp_plugindir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
//$spmywp_datadiralt = $spmywp_plugindir; //.'/'.$spmywp_plugins_name ;
//$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
//$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';

$spmywp_dpabadbot_setup_file = $spmywp_datadiralt .'/setup.txt';
$spmywp_dpabadbot_setup_tmp ='';
$spmywp_dpabadbot_setup_sz = 0;
//echo '<br>        session: '.$_SESSION['spmy_dpabadbot_mysession'].'  isset: '.isset( $_SESSION['spmy_dpabadbot_mysession']);
//if( !isset( $_SESSION['spmy_dpabadbot_mysession']) ) {
if( is_user_logged_in() ){
if( file_exists( $spmywp_dpabadbot_setup_file ) ){
$spmywp_dpabadbot_setup_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file );
$spmywp_dpabadbot_setup_data = unserialize( $spmywp_dpabadbot_setup_tmp );
$spmywp_dpabadbot_setup_sz = count( $spmywp_dpabadbot_setup_data );
}

if( strlen( $spmywp_dpabadbot_setup_tmp ) > 2 && $spmywp_dpabadbot_setup_sz > 0 ){
	$spmywp_dpabadbot_path = $spmywp_dpabadbot_setup_data[0];
	//check dpabadbot files exists
//	$spmywp_dpabadbot_datadir = $spmywp_dpabadbot_path.'data/';
//	$spmywp_dpabadbot_ip_file = $spmywp_dpabadbot_path.'data/wpipadd.txt';
//	$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
//	$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';
	$spmywp_dpabadbot_setup_file_logs = $spmywp_datadiralt .'/setuplog.txt';
	if( file_exists( $spmywp_dpabadbot_setup_file_logs )){
		$spmywp_dpabadbot_setup_tmp_log = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file_logs );
		$spmywp_dpabadbot_setup_data_log = unserialize( $spmywp_dpabadbot_setup_tmp_log );
		} else {
		$spmywp_dpabadbot_setup_data_log = 200;
		spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file_logs, serialize( $spmywp_dpabadbot_setup_data_log ) );
		}		
//echo '<br>Entered. file is: '.$spmywp_dpabadbot_uploads_ip_file200.'  ';
			unset( $spmywp_dpabadbot_uploads_ip_file200_data2 ); //clear it
			unset( $spmywp_dpabadbot_uploads_ip_file200_data ); //clear it 	
			unset( $spmywp_dpabadbot_uploads_ip_file200_datae ); //clear it 
			if( file_exists( $spmywp_dpabadbot_uploads_ip_file200 ) ){ //check if last 200 login attempts file exists then go add data to them
				$spmywp_dpabadbot_uploads_ip_file200_data = unserialize( spmy_dpabadbot_read_file(  $spmywp_dpabadbot_uploads_ip_file200  ));

//				if( isset( $spmywp_dpabadbot_uploads_ip_file200_data ) ){	//check not empty array
			if( !empty($spmywp_dpabadbot_uploads_ip_file200_data) ){	//check not empty array			
				$spmywp_dpabadbot_uploads_ip_file200_data_sz = count($spmywp_dpabadbot_uploads_ip_file200_data);
				$spmywp_dpabadbot_uploads_ip_file200_data2 = $spmywp_dpabadbot_uploads_ip_file200_data;		
				//echo '<br>2nd dump';
				//var_dump( $spmywp_dpabadbot_uploads_ip_file200_data );
				if( $spmywp_dpabadbot_uploads_ip_file200_data_sz >= $spmywp_dpabadbot_setup_data_log ){ //set it to 10 to see how it works
				$spmywp_dpabadbot_uploads_ip_file200_data_sz1 = $spmywp_dpabadbot_uploads_ip_file200_data_sz - $spmywp_dpabadbot_setup_data_log;
				//echo '<br>difference: '.$spmywp_dpabadbot_uploads_ip_file200_data_sz1.'  ';
					$spmywp_dpabadbot_setup_data_log_tenth = intval( $spmywp_dpabadbot_setup_data_log / 10 );
					unset( $spmywp_dpabadbot_uploads_ip_file200_data2 ); //do array shift twice //get how much larger just in case moved from eg 300 to 100 records
					if( $spmywp_dpabadbot_uploads_ip_file200_data_sz1 > 0 ){
						$spmywp_dpabadbot_setup_data_log_tenth = $spmywp_dpabadbot_setup_data_log_tenth + $spmywp_dpabadbot_uploads_ip_file200_data_sz1;
						}
					//echo '<br>tenth: '.$spmywp_dpabadbot_setup_data_log_tenth.'  ';	
					for( $spmywp_dpabadbot_setup_data_log_tenth_i =0; $spmywp_dpabadbot_setup_data_log_tenth_i<$spmywp_dpabadbot_setup_data_log_tenth;  $spmywp_dpabadbot_setup_data_log_tenth_i++){	//delete 5% of the records
					$spmywp_dpabadbot_uploads_ip_file200_data2x = array_shift( $spmywp_dpabadbot_uploads_ip_file200_data );
					}
					$spmywp_dpabadbot_uploads_ip_file200_data2 =  $spmywp_dpabadbot_uploads_ip_file200_data ;

					}	
					} else {
						unset( $spmywp_dpabadbot_uploads_ip_file200_data ); //clear it 
					}
				}
			$spmywp_dpabadbot_ip = spmy_dpabadbot_get_client_ip();	//get ip address	
			$spmywp_dpabadbot_current_user = wp_get_current_user();	
			$spmywp_dpabadbot_current_user_time = time();
			$spmywp_dpabadbot_uploads_ip_file200_datae = array( $spmywp_dpabadbot_current_user_time, $spmywp_dpabadbot_ip, $spmywp_dpabadbot_current_user->user_login, $spmywp_dpabadbot_current_user->ID, $_SERVER['REQUEST_URI']);
if( !empty($spmywp_dpabadbot_uploads_ip_file200_data) ){
			$spmywp_dpabadbot_uploads_ip_file200_data_sz = count($spmywp_dpabadbot_uploads_ip_file200_data);
			} else {
			$spmywp_dpabadbot_uploads_ip_file200_data_sz = 0;
			}
/* 
			echo '<br>size is: '.$spmywp_dpabadbot_uploads_ip_file200_data_sz; //<--- 20200927 debug
			echo '<br>var dump<br>';
			var_dump( $spmywp_dpabadbot_uploads_ip_file200_data );
			echo '<br>end of var_dump<br>';

			if( !empty($spmywp_dpabadbot_uploads_ip_file200_data) ){
			echo '<br there is something there';
			} else {
			echo '<br>nothing there';
			}
			echo '<pre />';//<--- 20200927 debug
		    print_r( $spmywp_dpabadbot_uploads_ip_file200_data );//<--- 20200927 debug
			echo '<br>********';
*/
//			if( $spmywp_dpabadbot_uploads_ip_file200_data_sz > 0){
			if( !empty($spmywp_dpabadbot_uploads_ip_file200_data) ){
			array_push( $spmywp_dpabadbot_uploads_ip_file200_data2, $spmywp_dpabadbot_uploads_ip_file200_datae);
			} else {
			 $spmywp_dpabadbot_uploads_ip_file200_data2[0] = $spmywp_dpabadbot_uploads_ip_file200_datae;
			}
//				echo '<br>Cth dump';
//				var_dump( $spmywp_dpabadbot_uploads_ip_file200_data2 );			
			spmy_dpabadbot_write_file( $spmywp_dpabadbot_uploads_ip_file200, serialize( $spmywp_dpabadbot_uploads_ip_file200_data2) );
			if( $spmywp_dpabadbot_current_user->ID == 0 && is_user_logged_in()){
				exit;
				}
			}	
//		}
		}
	}
}


if ( is_admin() ){
//echo '<br>at admin        session: '.$_SESSION['spmy_dpabadbot_mysession'].'  isset: '.isset( $_SESSION['spmy_dpabadbot_mysession']);
	if( function_exists( 'spmy_dpabadbot_actions')) {
		add_action('admin_menu', 'spmy_dpabadbot_actions');	
		add_action( 'save_post', 'spmy_dpabadbot_post_numbers' );	//update & preview = /../../autosave
		add_action( 'post_updated', 'spmy_dpabadbot_post_numbers' ); //preview changes	& update posts	
		add_action( 'edit_post', 'spmy_dpabadbot_post_numbers' );	//preview changes
		add_action( 'publish_post', 'spmy_dpabadbot_post_numbers' );	//update post
//		add_action('wp_login', 'spmy_dpabadbot_post_numbers');

	if( file_exists( $spmywp_dpabadbot_datadir ) ){
		if( file_exists( $spmywp_dpabadbot_uploads_ip_file ) ){ 
			$spmywp_dpabadbot_ip_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_uploads_ip_file );
			if( strlen( $spmywp_dpabadbot_ip_tmp ) > 2 ){
				$spmywp_dpabadbot_ip_addrs = unserialize( $spmywp_dpabadbot_ip_tmp );
				}
			}
	$spmywp_dpabadbot_ip = spmy_dpabadbot_get_client_ip();

	if( is_user_logged_in() ){ //check if user is logged in otherwise everyone who access wp-admin.php will be recorded - 20150409-1145
		if( !isset( $spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip])) {
			$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][0] = $spmywp_dpabadbot_ip;
			$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][1] = time();
			$spmywp_dpabadbot_current_user = wp_get_current_user();
			$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][2] = $spmywp_dpabadbot_current_user->user_login;
			$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][3] = $spmywp_dpabadbot_current_user->ID;
			$spmywp_dpabadbot_ip_addrs[$spmywp_dpabadbot_ip][4] = $_SERVER['REQUEST_URI'];
			spmy_dpabadbot_write_file( $spmywp_dpabadbot_uploads_ip_file, serialize( $spmywp_dpabadbot_ip_addrs) );
			foreach( $spmywp_dpabadbot_ip_addrs as $mykey => $myvalue){
				if( $spmywp_dpabadbot_ip_addrs[$mykey][3] > 0 ){
				$spmywp_dpabadbot_ip_addrs_tmp[$mykey] = $spmywp_dpabadbot_ip_addrs[$mykey];
				//echo '<br>3. key '.$mykey;
					//unset( $spmywp_dpabadbot_ip_addrs[$mykey] );
					}	
				}
			spmy_dpabadbot_write_file( $spmywp_dpabadbot_ip_file, serialize( $spmywp_dpabadbot_ip_addrs_tmp) );
			}
//spmy_dpabadbot_login_hook();
		}
	}

	if( function_exists( 'spmy_dpabadbot_deleteipadd')) {
		spmy_dpabadbot_deleteipadd();
		}
	}
}
add_action('wp_logout', 'spmy_dpabadbot_post_numbers');
add_action( 'init', 'spmy_dpabadbot_login_hook' );
add_filter( 'auto_update_core', '__return_false' );
add_action( 'wp_footer', 'dpabadbotbottomofpagelink', 300);
add_action( 'wp_footer', 'dpabadbotendofpage', 10000 );


?>