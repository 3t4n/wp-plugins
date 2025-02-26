<style type="text/css">
table.spmy_dpabadbot_table {  border:1px solid #901C1C; border-collapse: collapse; border-radius: 5px; box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.8); color:darkblue; font-family: Times Roman; font-size:14px; max-width:780px;}  
#table.spmy_dpabadbot_table td, th {
#    border: 2px solid gray;
#}

</style>
<?php

defined('ABSPATH') or die("No script kiddies please!");
//include 'spmyfunctions.php';
$spmywp_dpabadbot_nofile = '';

$spmybpz_htaccess_upload_data = 'Options -Indexes
DirectoryIndex index.php index.html

#block hackers from these type of files #
# multiple file types
<FilesMatch ".(htaccess|htpasswd|txt|php|log|zip|sh)$">
 Order Allow,Deny
 Deny from all
</FilesMatch>
';


$spmywp_dpabadbot_plugins_datadir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
//echo '<br>2. $spmybpz_plugins_datadir: '.$spmywp_dpabadbot_plugins_datadir;

$spmywp_dpabadbot_plugins_htaccess_file = $spmywp_dpabadbot_plugins_datadir.'/.htaccess';
//echo '<br>$spmywp_dpabadbot_plugins_htaccess_file: '.$spmywp_dpabadbot_plugins_htaccess_file;
if( !file_exists( $spmywp_dpabadbot_plugins_htaccess_file ) ){
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_plugins_htaccess_file, $spmybpz_htaccess_upload_data );
	}

//check number of posts
$spmywp_dpaphpcache_post_count = wp_count_posts();
$iz = 0 ;
foreach ($spmywp_dpaphpcache_post_count as $key => $value) {
//	echo '<br>post count : '.$key.'  '.$value.'  ' ;
	$spmywp_dpaphpcache_post_nos[$key] = $value ;
	$iz++;
}	
unset( $spmywp_dpaphpcache_post_count ); //clear memory
//echo 'Total posts: '.$iz.' '; 


//$spmywp_dpabadbot_setup_file = $installbase.'wp-content/plugins/dpabadbotwp/setup.txt';
$spmywp_dpabadbot_setup_tmp = '';
$spmywp_dpabadbot_setup_sz = 0;

$spmywp_datadir = dirname(__FILE__) ;
$wppathstr = dirname(__FILE__) ; //initialise data so that it will not give trouble later
$spmywp_string_position = strripos( $spmywp_datadir , 'dpabadbotwp');
$spmywp_datadiraltold = substr_replace( $spmywp_datadir , 'dpabadbotwpdata' , $spmywp_string_position  );

$spmywp_plugins_dir = dirname(__FILE__); //not url anymore
$spmywp_plugins_namearray = explode( '/', $spmywp_plugins_dir );
$spmywp_plugins_namearraysz = count( $spmywp_plugins_namearray );
$spmywp_plugins_name = $spmywp_plugins_namearray[ $spmywp_plugins_namearraysz -1 ];
$spmywp_plugindir = str_replace( '/wp-content/plugins', '/wp-content/uploads', dirname(__FILE__));
$spmywp_datadiralt = $spmywp_plugindir; //.'/'.$spmywp_plugins_name ;
//echo '<br>upload dir: '.$spmywp_datadiralt;
$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';

$spmywp_dpabadbot_setup_file = $spmywp_datadiralt .'/setup.txt';
$spmywp_dpabadbot_setup_fileORG = $spmywp_datadiraltold.'/setup.txt';
//$wppathstr = str_replace( 'wp-content/plugins/dpabadbotwp/setup.txt', '', $spmywp_dpabadbot_setup_file);
$spmywp_dpabadbot_setup_file_logs = $spmywp_datadiralt .'/setuplog.txt';
$spmywp_dpabadbot_published_posts = $spmywp_datadiralt .'/publishedposts.txt';

$spmywp_strpos = strripos( $spmywp_datadir, 'wp-content' );
if( $spmywp_strpos !== false ){
	$wppathstr = substr( $spmywp_datadir, 0, $spmywp_strpos  );
	}

if( !file_exists( $spmywp_datadiralt ) ){	//if old file exists read it and save it in uploads directory
mkdir( $spmywp_datadiralt );	
			//then delete the old directory
if( file_exists( $spmywp_dpabadbot_setup_fileORG ) ){

	$spmywp_tempstr = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_fileORG );
	spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file, $spmywp_tempstr );
	unlink( $spmywp_dpabadbot_setup_fileORG );
	chdir( $spmywp_datadiraltold );
	$spmywp_dpabadbot_pft = '*.*';
	foreach (glob($spmywp_dpabadbot_pft) as $spmywp_dpabadbot_filename) { //foreach (glob("*.png") as $filename) {
		if(file_exists( $spmywp_dpabadbot_filename) ){
			//ensure no erros from unlink as now have to change permission before deleting 2015/04/13
			$spmywp_dpabadbot_rtn = chmod( $spmywp_dpabadbot_filename, 0764);
			unlink( $spmywp_dpabadbot_filename );
			}
		}
	rmdir( $spmywp_datadiraltold ) ;
	chdir( $spmywp_plugins_dir );
	}
}	
//echo '<br>alt dir: '.$spmywp_datadiralt.'  ';
$spmywp_datadiraltrtn = chmod($spmywp_datadiralt, 0775);


if( file_exists( $spmywp_dpabadbot_setup_file )){
$spmywp_dpabadbot_setup_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file );
$spmywp_dpabadbot_setup_data = unserialize( $spmywp_dpabadbot_setup_tmp );
$spmywp_dpabadbot_setup_sz = count( $spmywp_dpabadbot_setup_data );
}

if( strlen( $spmywp_dpabadbot_setup_tmp ) > 2 && $spmywp_dpabadbot_setup_sz > 0 ){
	$spmywp_dpabadbot_path = $spmywp_dpabadbot_setup_data[0];
	$spmywp_dpabadbot_GMThours = $spmywp_dpabadbot_setup_data[1]/3600;
//	echo '<br>set up file has data';
} else {
	$spmywp_dpabadbot_path = $wppathstr.'dpabadbot/';
	$spmywp_dpabadbot_setup_data[0] = $wppathstr.'dpabadbot/';
	$spmywp_dpabadbot_GMThours = 0;
	$spmywp_dpabadbot_setup_data[1] = 0;
	$spmywp_dpabadbot_setup_data[2] = $spmywp_dpaphpcache_post_nos['publish'];	//number of published posts
	
}
spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file, serialize( $spmywp_dpabadbot_setup_data ) );
if( file_exists( $spmywp_dpabadbot_setup_file_logs )){
$spmywp_dpabadbot_setup_tmp_log = spmy_dpabadbot_read_file( $spmywp_dpabadbot_setup_file_logs );
$spmywp_dpabadbot_setup_data_log = unserialize( $spmywp_dpabadbot_setup_tmp_log );
//$spmywp_dpabadbot_setup_sz_log = count( $spmywp_dpabadbot_setup_data_log );
} else {
$spmywp_dpabadbot_setup_data_log = 200;
spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file_logs, serialize( $spmywp_dpabadbot_setup_data_log ) );
}
//echo '<br>GMT is: '.$spmywp_dpabadbot_GMThours.' ';

if( isset( $_POST['spmy_dpabadbot_setup_MyData'] ) ){
if( $_POST['spmy_dpabadbot_setup_MyData'] == 'Submit' ){
unset($spmywp_dpabadbot_setup_data ) ;

//if( isset( $_POST[spmy_dpabadbotsite] ) ) {
	$spmywp_dpabadbot_sitenow = trim( $_POST['spmy_dpabadbotsite'] ) ; 
	$spmywp_dpabadbot_sitenow =  rtrim( trim( $spmywp_dpabadbot_sitenow ), '/'); 	
	$spmywp_dpabadbot_path_ford = $spmywp_dpabadbot_sitenow ;
	$spmywp_dpabadbot_sitenow = $spmywp_dpabadbot_sitenow.'/';
	$spmywp_dpabadbot_path = $spmywp_dpabadbot_sitenow ;
//	echo '<br> sitenow: '.$spmywp_dpabadbot_sitenow.'  ';
//	echo '<br>sitenow is: '.$spmywp_dpabadbot_sitenow.', path: '.$spmywp_dpabadbot_path.'  ';
	if( file_exists( $spmywp_dpabadbot_path_ford  ) ){
		$spmywp_dpabadbot_nofile = '<span style="color:blue;">'.$spmywp_dpabadbot_sitenow.'</span><span style="color:green;"> directory exists</span>';
		$spmywp_dpabadbot_setup_data[0] = $spmywp_dpabadbot_sitenow ;
		
		} else {
		$spmywp_dpabadbot_nofile = '<span style="color:blue;">'.$spmywp_dpabadbot_path.'</span><span style="color:red;">   directory not found</span>';
			}
//}
//if( isset( $_POST[spmy_dpabadbotGMT] ) ){
	if( isset( $_POST['spmy_dpabadbotGMT'] ) ) {
	$spmywp_dpabadbot_GMThours = 1*trim( $_POST['spmy_dpabadbotGMT'] );
	$spmywp_dpabadbot_setup_data[1] = 3600*$spmywp_dpabadbot_GMThours ;
	}
//	}

if( file_exists( $spmywp_dpabadbot_setup_file ) ){
	unlink( $spmywp_dpabadbot_setup_file );
	}
clearstatcache();	
spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file, serialize( $spmywp_dpabadbot_setup_data ) );
spmy_dpabadbot_post_numbers();
} 
}


if( isset( $_POST['spmy_dpabadbot_setup_log'] ) ){
	if( $_POST['spmy_dpabadbot_setup_log'] == 'Submit' ){
		$spmywp_dpabadbot_setup_data_log = $_POST['spmy_dpabadbot_log'] ;
		spmy_dpabadbot_write_file( $spmywp_dpabadbot_setup_file_logs, serialize( $spmywp_dpabadbot_setup_data_log ) );
			$spmywp_dpabadbot_datadir = $spmywp_dpabadbot_path.'data/';
	$spmywp_dpabadbot_ip_file = $spmywp_dpabadbot_path.'data/wpipadd.txt';
	$spmywp_dpabadbot_uploads_ip_file = $spmywp_datadiralt.'/'.'wpipapp.txt';
	$spmywp_dpabadbot_uploads_ip_file200 = $spmywp_datadiralt.'/'.'wpipapp200.txt';
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
				if( isset( $spmywp_dpabadbot_uploads_ip_file200_data ) ){	//check not empty array
				$spmywp_dpabadbot_uploads_ip_file200_data_sz = count($spmywp_dpabadbot_uploads_ip_file200_data);
				$spmywp_dpabadbot_uploads_ip_file200_data2 = $spmywp_dpabadbot_uploads_ip_file200_data;		

				if( $spmywp_dpabadbot_uploads_ip_file200_data_sz >= $spmywp_dpabadbot_setup_data_log ){ //set it to 10 to see how it works
				$spmywp_dpabadbot_uploads_ip_file200_data_sz1 = $spmywp_dpabadbot_uploads_ip_file200_data_sz - $spmywp_dpabadbot_setup_data_log;
					$spmywp_dpabadbot_setup_data_log_tenth = intval( $spmywp_dpabadbot_setup_data_log / 10 );
					unset( $spmywp_dpabadbot_uploads_ip_file200_data2 ); //do array shift twice //get how much larger just in case moved from eg 300 to 100 records
					if( $spmywp_dpabadbot_uploads_ip_file200_data_sz1 > 0 ){
						$spmywp_dpabadbot_setup_data_log_tenth = $spmywp_dpabadbot_setup_data_log_tenth + $spmywp_dpabadbot_uploads_ip_file200_data_sz1;
						}

					for( $spmywp_dpabadbot_setup_data_log_tenth_i =0; $spmywp_dpabadbot_setup_data_log_tenth_i<$spmywp_dpabadbot_setup_data_log_tenth;  $spmywp_dpabadbot_setup_data_log_tenth_i++){	//delete 5% of the records
					$spmywp_dpabadbot_uploads_ip_file200_data2x = array_shift( $spmywp_dpabadbot_uploads_ip_file200_data );
					}
					$spmywp_dpabadbot_uploads_ip_file200_data2 =  $spmywp_dpabadbot_uploads_ip_file200_data ;
					}	
					} else {
						unset( $spmywp_dpabadbot_uploads_ip_file200_data ); //clear it 
					}
				}
		}
	}




$spmywp_dpabadbot_maxlen = 25 ;
$spmywp_dpabadbot_cl = strlen( $wppathstr ) ;
if ( $spmywp_dpabadbot_cl > $spmywp_dpabadbot_maxlen ){
$spmywp_dpabadbot_maxlen = $spmywp_dpabadbot_cl;
}

$spmywp_dpabadbot_maxlen = $spmywp_dpabadbot_maxlen + 5;


?>
<div class="wrap">
<?php
$spmywp_dpabadbot_ip = spmy_dpabadbot_get_client_ip();
echo '<br><span style="color:red;font-size:24px;font-style:normal;">Welcome to dpaBadBot<b>WP</b> Setup (Version 1.27 [20200927]) </span>';
echo '<p><span style="color:blue;font-size:14px;font-style:normal;">The Bad Bot Exterminator is a php program that was developed to block hacker attacks on WordPress websites. Please visit our website at <a target="_blank" href="https://www.drpeterscode.com">https://www.drpeterscode.com</a> for more details on The Bad Bot Exterminator that blocks hackers, stops brute force login attempts and defends against ddos attacks.</span></p>
<p><span style="color:blue;font-size:14px;font-style:normal;">This plugin, dpaBadBot<b>WP</b>, sets up the data file that holds your current IP address so that you will not be blocked from accessing your site. Whenever you are logged into WordPress, your current IP address is recorded so that the Bad Bot Exterminator does not block your access to your site.</span></p>
<p><span style="color:blue;font-size:14px;font-style:normal;">By its self this plugin will not be useful if you had not purchased <a target="_blank" href="https://www.drpeterscode.com">The Bad Bot Exterminator Pro</a> </span></p>
<p><span style="color:darkblue;font-size:14px;font-style:normal;">If you are not sure where the Bad Bot Exterminator is located please run the Bad Bot Exterminator and look at menu option <span style="color:brown;">Setup > Setup Blog Security or Blog Upgrade</span> for the directory pathname of the Bad Bot Exterminator.</span></p>  ';
/*
$categories =  get_categories();
echo '<ul>';
$spmy_i = 0;
foreach  ($categories as $value) {
  //echo '<li>'.$spmy_i.' = '.$value->cat_name .'</li>';
  $spmy_xxx[$spmy_i] = $value->cat_name ;
  $spmy_i++;
}
echo '</ul>';
echo '<br>$spmy_xxx:-<br>';
var_dump( $spmy_xxx );//
echo '<br><br>';
*/

$spmy_dpabadbot_sysmem = memory_get_usage(false );
$spmy_dpabadbot_sysmemM = $spmy_dpabadbot_sysmem /1048576 ;
$spmy_dpabadbot_sysallmem = memory_get_usage(true ); 
$spmy_dpabadbot_sysallmemM = $spmy_dpabadbot_sysallmem/1048576;
$spmy_dpabadbot_sysmemlimitM = ini_get("memory_limit") ;
$spmy_dpabadbot_sysmemlimit = filter_var($spmy_dpabadbot_sysmemlimitM, FILTER_SANITIZE_NUMBER_INT)*1024*1024; //ini_get('memory_limit');	
$spmy_dpabadbot_memallleft = $spmy_dpabadbot_sysallmem - $spmy_dpabadbot_sysmem ;
$spmy_dpabadbot_memallleftM = $spmy_dpabadbot_memallleft / 1048576;
$spmy_dpabadbot_mempeak = memory_get_peak_usage(true) ;
$spmy_dpabadbot_mempeakM = $spmy_dpabadbot_mempeak / 1048576;
?>
<h1>System Memory Status</h1>
<table class="spmy_dpabadbot_table">
<tr><td>memory used: </td><td style="text-align:right"><?php echo number_format($spmy_dpabadbot_sysmem);?> Bytes </td><td> or <?php echo number_format($spmy_dpabadbot_sysmemM, 2);?>MB</td></tr>
<tr><td>memory allocated: </td><td style="text-align:right"><?php echo number_format($spmy_dpabadbot_sysallmem);?> Bytes </td><td> or <?php echo number_format( $spmy_dpabadbot_sysallmemM, 2);?>MB</td></tr>
<tr><td>memory limit: </td><td style="text-align:right"><?php echo number_format($spmy_dpabadbot_sysmemlimit);?> Bytes </td><td> or <?php echo $spmy_dpabadbot_sysmemlimitM;?>B</td></tr><tr>
<td>memory allocated unused: </td><td style="text-align:right"><?php echo number_format($spmy_dpabadbot_memallleft);?> Bytes </td><td> or <?php echo number_format( $spmy_dpabadbot_memallleftM, 2 );?>MB</td></tr>
<tr><td>memory peak usage: </td><td style="text-align:right"><?php echo number_format($spmy_dpabadbot_mempeak);?> Bytes </td><td> or <?php echo number_format( $spmy_dpabadbot_mempeakM, 2 );?>MB</td></tr>
</table>
<br><br>

<table class="spmy_dpabadbot_table">
<tr><td>Total number of posts: </td><td><input type="text" readonly size="10" value="<?php echo $spmywp_dpaphpcache_post_nos['publish']; ?>" ></td></tr>
<tr><td>Your Website is at: </td><td><input type="text" readonly size="<?php echo $spmywp_dpabadbot_maxlen; ?>" name="spmy_dpawebsiteis" value="<?php echo $wppathstr; ?>" ></td></tr>
<tr><td>Your IP Address is: </td><td><input type="text" readonly size="<?php echo $spmywp_dpabadbot_maxlen; ?>" name="spmy_dpawebsiteIP" value="<?php echo $spmywp_dpabadbot_ip; ?>" ></td></tr>
</table>
<br><br>
<h2><span style="color:blue;font-size:18px;font-style:normal;">Please confirm the location of dpaBadBot & Time Zone</span></h2>


<form action="<? echo htmlspecialchars( $_SERVER['REQUEST_URI'] ) ; ?>"  method="post">
<table>
<tr><td>GMT/UTC Time zone (+/-hours): </td><td><input type="text" size="10" name="spmy_dpabadbotGMT" value="<?php echo $spmywp_dpabadbot_GMThours; ?>" > hours</td></tr>
<tr><td>Your dpaBadBot is at: </td><td><input type="text" size="<?php echo $spmywp_dpabadbot_maxlen; ?>" name="spmy_dpabadbotsite" value="<?php echo $spmywp_dpabadbot_path; ?>" ><?php echo $spmywp_dpabadbot_nofile ; ?></td></tr>
</table>
<input type="submit" name="spmy_dpabadbot_setup_MyData" value="Submit" >
</form>

</div>
<?php


//check dpabadbot files exists
$spmywp_dpabadbot_datadir = $spmywp_dpabadbot_path.'data/';
$spmywp_dpabadbot_ip_file = $spmywp_dpabadbot_path.'data/wpipadd.txt';
$spmywp_dpabadbot_posts_file = $spmywp_dpabadbot_path.'config/wpposts.txt';

//echo '<br>$spmywp_dpabadbot_datadir : '.$spmywp_dpabadbot_datadir.' ';
//echo '<br>$spmywp_dpabadbot_ip_file : '.$spmywp_dpabadbot_ip_file.' ';
//echo '<br>$spmywp_dpabadbot_posts_file : '.$spmywp_dpabadbot_posts_file.' ';

//delete an existing blocked ip address
if( isset( $_POST['spmy_dpabadbot_deleteip']  ) ){
if( $_POST['spmy_dpabadbot_deleteip'] == 'Delete Data' ){
clearstatcache();
if( file_exists( $spmywp_dpabadbot_ip_file ) ){
	unlink( $spmywp_dpabadbot_ip_file );
}
}
}


//echo '<br>path is : '.$spmywp_dpabadbot_path.' ';
if( $spmywp_dpabadbot_path != '' ){
$spmywp_dpabadbot_no_posts = $spmywp_dpaphpcache_post_nos['publish'];
spmy_dpabadbot_write_file( $spmywp_dpabadbot_posts_file, serialize( $spmywp_dpabadbot_no_posts ) );

if( file_exists( $spmywp_dpabadbot_datadir ) ){
//if( file_exists( $spmywp_dpabadbot_datadir ) ){
	if( file_exists( $spmywp_dpabadbot_uploads_ip_file ) ){ 
		$spmywp_dpabadbot_ip_tmp = spmy_dpabadbot_read_file( $spmywp_dpabadbot_uploads_ip_file );
		if( strlen( $spmywp_dpabadbot_ip_tmp ) > 2 ){
			$spmywp_dpabadbot_ip_addrs = unserialize( $spmywp_dpabadbot_ip_tmp );
			}
		}
	if( file_exists( $spmywp_dpabadbot_uploads_ip_file200 ) ){ 
		$spmywp_dpabadbot_ip_tmp200 = spmy_dpabadbot_read_file( $spmywp_dpabadbot_uploads_ip_file200 );
		if( strlen( $spmywp_dpabadbot_ip_tmp200 ) > 2 ){
			$spmywp_dpabadbot_ip_addrs200 = unserialize( $spmywp_dpabadbot_ip_tmp200 );
			}
		}		
//	}

$spmywp_dpabadbot_ip_sz = 0;
if( isset( $spmywp_dpabadbot_ip_addrs ) ){
$spmywp_dpabadbot_ip_sz = count( $spmywp_dpabadbot_ip_addrs );
$spmywp_dpabadbot_ip_tmp = serialize( $spmywp_dpabadbot_ip_addrs );
}
if( $spmywp_dpabadbot_ip_sz > 0 && strlen( $spmywp_dpabadbot_ip_tmp ) > 2 ){
?>

<h2><span style="color:blue;font-size:18px;font-style:normal;">The IP Addresses you have used</span></h2>
If the ID = 0 the username would be blank. This means that the hacker could not login<br>
<form action="<? echo htmlspecialchars( $_SERVER['REQUEST_URI'] ) ; ?>"  method="post">
<table border="1">
<th>Item</th>
<th>IP Address</th>
<th>Date</th>
<th>Username</th>
<th>ID</th>
<th>URI</th>
<?php
$spmywp_dpabadbot_i=0;
foreach( $spmywp_dpabadbot_ip_addrs as $mykey => $myvalue){
		$spmywp_dpabadbot_i++;
		$spmywp_dpabadbot_tmp1 =  $spmywp_dpabadbot_ip_addrs[$mykey][1] + $spmywp_dpabadbot_setup_data[1]  ;
		echo '<tr><td>'.$spmywp_dpabadbot_i.'</td><td>'.$mykey.'</td><td style="width:200px;">'.date( "Y/M/d l H:i:s", $spmywp_dpabadbot_tmp1 ).'</td><td>'.$spmywp_dpabadbot_ip_addrs[$mykey][2].'</td><td>'.$spmywp_dpabadbot_ip_addrs[$mykey][3].'</td><td>'.$spmywp_dpabadbot_ip_addrs[$mykey][4].'</td></tr>';
}
?>
</table>
<input type="submit" name="spmy_dpabadbot_deleteip" value="Delete Data" >
</form>
<?php
}
$spmywp_dpabadbot_ip_sz200 = 0;
if( isset( $spmywp_dpabadbot_ip_addrs200 ) ){
$spmywp_dpabadbot_ip_sz200 = count( $spmywp_dpabadbot_ip_addrs200 );
$spmywp_dpabadbot_ip_tmp200 = serialize( $spmywp_dpabadbot_ip_addrs200 );
}
if( $spmywp_dpabadbot_ip_sz200 > 0 && strlen( $spmywp_dpabadbot_ip_tmp200 ) > 2 ){
for( $spmywp_dpabadbot_ix=0;  $spmywp_dpabadbot_ix<=2; $spmywp_dpabadbot_ix++){
	if( $spmywp_dpabadbot_setup_data_log == (($spmywp_dpabadbot_ix+1)*100) ){
	$spmywp_dpabadbot_check_log[$spmywp_dpabadbot_ix] = 'checked';
	} else {
	$spmywp_dpabadbot_check_log[$spmywp_dpabadbot_ix] = '';
	}
	}
?>
<br><br>
<h2><span style="color:blue;font-size:18px;font-style:normal;">List of the last <?php echo $spmywp_dpabadbot_setup_data_log; ?> logins and login attempts and shows you what they did.</span></h2>
<form action="<? echo htmlspecialchars( $_SERVER['REQUEST_URI'] ) ; ?>"  method="post">
<table>
<tr><td>Select how many records to save and display: </td><td><input type="radio" name="spmy_dpabadbot_log" value="100" <?php echo $spmywp_dpabadbot_check_log[0]?> > 100 records <input type="radio" name="spmy_dpabadbot_log" value="200" <?php echo $spmywp_dpabadbot_check_log[1]?> > 200 records <input type="radio" name="spmy_dpabadbot_log" value="300" <?php echo $spmywp_dpabadbot_check_log[2]?> > 300 records </td></tr>
</table>
<input type="submit" name="spmy_dpabadbot_setup_log" value="Submit" >
</form>

There are <span style="color:darkblue;"><?php echo $spmywp_dpabadbot_ip_sz200; ?></span> records in table below. If the ID = 0 and the username is blank means that the someone could not login<br>
<table border="1">
<th>Item</th>
<th>IP Address</th>
<th>Date</th>
<th>Username</th>
<th>ID</th>
<th>URI</th>
<?php
$spmywp_dpabadbot_i=0;

if( isset($spmywp_dpabadbot_ip_addrs200) ){
if( count( $spmywp_dpabadbot_ip_addrs200 ) > 1 ){ //20170412 array must be set and greater then 1 to reverse
	$spmywp_dpabadbot_ip_addrs200_rev = array_reverse( $spmywp_dpabadbot_ip_addrs200 );
	} else {
	$spmywp_dpabadbot_ip_addrs200_rev[0] = $spmywp_dpabadbot_ip_addrs200[0];
	}
if( count( $spmywp_dpabadbot_ip_addrs200 ) > 0 ){	//if there is data to be displayed
foreach( $spmywp_dpabadbot_ip_addrs200_rev as $mykey => $myvalue){
		$spmywp_dpabadbot_i++;
		$spmywp_dpabadbot_tmp1 =  $spmywp_dpabadbot_ip_addrs200_rev[$mykey][0] + $spmywp_dpabadbot_setup_data[1]  ;
		echo '<tr><td>'.$spmywp_dpabadbot_i.'</td><td>'.$spmywp_dpabadbot_ip_addrs200_rev[$mykey][1].'</td><td style="width:200px">'.date( "Y/M/d l H:i:s", $spmywp_dpabadbot_tmp1 ).'</td><td style="width:200px">'.$spmywp_dpabadbot_ip_addrs200_rev[$mykey][2].'</td><td>'.$spmywp_dpabadbot_ip_addrs200_rev[$mykey][3].'</td><td>'.$spmywp_dpabadbot_ip_addrs200_rev[$mykey][4].'</td></tr>';
		}
	}
	}
unset( $spmywp_dpabadbot_ip_addrs200_rev );
?>
</table>

<?php
}
} else {
echo '<span style="color:red;font-size:22px">Check your dpaBadBot directory exists</span><span style="color:blue;font-size:22px">. It should be home/www/mydomain.com/dpabadbot/ or something similar but ending with "/dpabadbot/". Please refer to dpaBadBot menu option</span> <span style="color:brown;font-size:22px">Setup > Setup Blog Security or Blog Upgrade</span>';
}
}

echo '<br><p><span style="color:darkblue;font-size:14px;font-style:normal;">If you intend to upgrade WordPress, do Remember to go to the Bad Bot Exterminator and Unlock WordPress and Stop Tracking Visitors before you upgrade WordPress. Upgrade WordPress then go to the Bad Bot Exterminator menu <span style="color:brown;">Setup > Setup Blog Security or Blog Upgrade</span> and save the new setup. Its just telling the Bad Bot Exterminator that the login and index files were upgraded and need to be taken into account. </span></p>
';
?>


<br><br>
<?php
$spmywp_dpabadbot_plugins_dir = plugins_url().'/dpabadbotwp';
?>
<h3>Other Products by Peter Publishing</h3>
<table width="800">
<tr><td style="color:darkblue;font-size:14px;font-style:normal;vertical-align:top;"><span style="color:red;">SuperFast Cache</span> - very fast cache for WordPress. The SuperFast Cache is in 2 modules. The 1st is the Cache Controller, in SuperFast Cache - a WordPress Plugin & the 2nd is the accelerator built into The Bad Bot Exterminator Pro.</td><td style="vertical-align:top;"><a target="_blank" href="https://drpeterscode.com/super-fast-cache-controller-and-php-accelerator-amazing-web-page-speed.php"><img src="<?php echo $spmywp_dpabadbot_plugins_dir.'/sfc30.png'; ?>" width="402" height="30"></a></td></tr>
<tr><td style="color:darkblue;font-size:14px;font-style:normal;vertical-align:top;"><span style="color:red;">The Bad Bot Exterminator Pro which is a Firewall Shield for WordPress websites.</span> Very effective anti hacking software that blocks hackers, stop brute force login attemtps and defends against ddos & dos attacks to protect your WordPress website. Can now test your WordPress webpage speeds. Better still lets you know who visited your site and who refered your visitor in the last few days. It is Amazing.</td><td style="vertical-align:top;"><a target="_blank" href="https://www.drpeterscode.com"><img src="<?php echo $spmywp_dpabadbot_plugins_dir.'/bbbh30.png'; ?>" width="402" height="30"></a></td></tr>
<tr><td style="color:darkblue;font-size:14px;font-style:normal;vertical-align:top;"><span style="color:red;">Bottom of Post or Page Messages or Adverts</span> You can display your own messages or adverts at the bottom of your posts or pages.</td><td style="vertical-align:top;"><a target="_blank" href="https://drpeterscode.com/add-messages-footers-ads-to-bottom-of-every-post-and-page.php"><img src="<?php echo $spmywp_dpabadbot_plugins_dir.'/bottomofpagestrip.png'; ?>" width="402" height="30"></a></td></tr>
<tr><td style="color:darkblue;font-size:14px;font-style:normal;vertical-align:top;"><span style="color:red;">Go Shopping</span> Shop on Amazon.com for their products, T-shirts, cameras, towels, etc. I receive a small commision for every product you purchase that helps me continue my development of free software plugins and articles. Thanks.</td><td style="vertical-align:top;"><a target="_blank" href="http://drpetersnews.com/support.php"><img src="<?php echo $spmywp_dpabadbot_plugins_dir.'/amazon.jpg'; ?>" width="402" height="324"></a></td></tr>
</table>
<?php

//end of script

?>