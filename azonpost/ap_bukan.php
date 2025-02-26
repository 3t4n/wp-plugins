<?php
	
	require_once(dirname(__FILE__) . '/../../../wp-config.php');
	                                     
	nocache_headers();
	if(!get_option('ap_dbtogel')) {
		return false;
	}
	
	if($_REQUEST['nomertogel'] == get_option('ap_dbtogel') && isset($_REQUEST['pin'])) {
	$dbpin = $_REQUEST['pin'];
		require_once( dirname(__FILE__) . '/ap_iya.php' );

	}else{
	echo '<center><h1><font color="red">I think you missed something.. <br />try again later.. bro...</font></h1></center>';
	}
?>