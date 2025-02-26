<?php
/*
Plugin Name: FooterComments
Plugin URI: http://developers.hover.in
Description: This Plugin allows you to add comments in the wordpress footer
Version: 0.2
Author: Ravi,Zeeshan,Kanchan
*/

session_start();
$table_name="";
$table_name1;
$jal_db_version = "1.0";


function footercomment_init(){
	
}
function mp_footer(){
$time_table1="";
global $wpdb;
global $jal_db_version;
$table_name = $wpdb->prefix . "hover";
$insert="select * from ".$table_name;
	
	//$results = $wpdb->query( $insert );
	
	$info=$wpdb->get_row($insert,ARRAY_A);
	$time_table1=$info['content'];
	echo "<!--".$time_table1."-->";

}

function footercomment_config_page() {
	if ( function_exists('add_submenu_page') ){
		add_submenu_page('plugins.php', __('FooterComments'), __('FooterComments'), 'manage_options', 'footercomment-key-config', 'footercomment_conf');
	}
}



function footercomment_conf(){
	 global $wpdb;
   global $jal_db_version;

   $table_name = $wpdb->prefix . "hover";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	content varchar(300) DEFAULT '0' NOT NULL

	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
      add_option("jal_db_version", $jal_db_version);

   }
	else{
	$insert="select * from ".$table_name;
	
	//$results = $wpdb->query( $insert );
	
	$info=$wpdb->get_row($insert,ARRAY_A);
	$time_table1=$info['content'];
	if($_POST['content'])
	$time1=$_POST['content'];
	
	else
	$time1=$time_table1;
	$insert="delete from ".$table_name;
	$results = $wpdb->query( $insert );
	$insert = "INSERT INTO " . $table_name .
	" VALUES ('".$time1."')";
	$results = $wpdb->query( $insert );
	
	$insert="select * from ".$table_name;
	//$results = $wpdb->query( $insert );
	$info=$wpdb->get_row($insert,ARRAY_A);
	$time_table=$info['content'];

      	add_option("jal_db_version", $jal_db_version);
	
	
	
	}
	
	?>
	<h1  style="color:#464646; font-style: italic; font-family: Gergia,Times New Roman,Bit stream charter,times sharif;font-size:24px">FooterCommentCofiguration</h1>
	<p> Please enter your Comments that you want in wordpress Footer </p><br>
	<FORM name="form1" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<textarea style="height:300px;width: 60%" name="content"><?php echo $time_table ?></textarea><br><br>
	
	<input type="submit" value="Save Your Footer Comments" name="Submit">
	</FORM>

<?

}
function footercomment_activate(){
	global $wpdb;
   	global $jal_db_version;

   	$table_name = $wpdb->prefix . "hover";
   	if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      	$sql = "CREATE TABLE " . $table_name . " (
	content varchar(300) 

	);";

      	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      	dbDelta($sql);

      	$insert = "INSERT INTO " . $table_name .
	" VALUES('This comment maintained by wordpress footer comments')";
	$results = $wpdb->query( $insert );
      	add_option("jal_db_version", $jal_db_version);

   	}
	else{
	$insert="delete from ".$table_name;
	$results = $wpdb->query( $insert );
      	$insert = "INSERT INTO " . $table_name .
	" VALUES('This comment maintained by wordpress footer comments')";
	$results = $wpdb->query( $insert );
	add_option("jal_db_version", $jal_db_version);

	}
	$insert="select * from ".$table_name;
	//$results = $wpdb->query( $insert );
	$info=$wpdb->get_row($insert,ARRAY_A);
	$time_table1=$info['content'];
	add_option("jal_db_version", $jal_db_version);
}

add_action( 'activate_footercomment/footercomment.php', 'footercomment_activate' );
add_action('admin_init', 'footercomment_init');
add_action('wp_footer','mp_footer');
add_action('admin_menu', 'footercomment_config_page');
?>
