<?php 
	
	$afterRead_file_to_write = $_POST["afterRead_suggestion_new_php"];
	$afterRead_name_to_write = 'suggestions/'.$_POST["afterRead_suggestion_new_name"].'.php';
	$afterRead_secure = $_POST["afterRead_secure"];
	//This is a crude atempt at security
	//it uses a random number number generated at activation that is saved to the database, then the admin settigns page will send this random number as a pregenerated password which this file will then check
	include 'afterRead_key_store.php';
	$afterRead_key = afterRead_print_key();
	if ($afterRead_secure === $afterRead_key) {
		//This checks to make sure that the new suggestion will not overwrite the default suggestion.
		if ($_POST["afterRead_suggestion_new_name"] != 'default') {
			$fh = fopen($afterRead_name_to_write, 'w') or die("Can't open ".$afterRead_name_to_write);
			fwrite($fh, $afterRead_file_to_write);
			fclose($fh);
		}
	}
	//This tells the web browser not to load this page, thus the user stays on the options page
	header('HTTP/1.0 204 No Content');
?>