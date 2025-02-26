<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Add any update or error notices to the top of the admin page */
function EWD_UAR_Error_Notices(){
    global $ewd_uar_message;
		if (isset($ewd_uar_message)) {
			if (isset($ewd_uar_message['Message_Type']) and $ewd_uar_message['Message_Type'] == "Update") {echo "<div class='updated'><p>" . $ewd_uar_message['Message'] . "</p></div>";}
			if (isset($ewd_uar_message['Message_Type']) and $ewd_uar_message['Message_Type'] == "Error") {echo "<div class='error'><p>" . $ewd_uar_message['Message'] . "</p></div>";}
		}
}

?>