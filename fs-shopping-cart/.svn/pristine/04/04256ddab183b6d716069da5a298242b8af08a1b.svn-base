<?php
require("../../../wp-config.php"); 

//  SPAM CHECK
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }

if(isset($_GET['pid'])){
	if (is_numeric($_GET['pid'])) {
		if ($_GET['ar'] == 'add') {
			$_SESSION[$_GET['var']] .= $_GET['pid'].', ';	
		} else {
			$_SESSION[$_GET['var']] = str_replace($_GET['pid'].', ','',$_SESSION[$_GET['var']]);	
		}
	}
}

?>