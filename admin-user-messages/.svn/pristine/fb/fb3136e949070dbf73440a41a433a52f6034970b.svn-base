<?php

 


	function get_user_role_aum() {
		global $current_user; 
	
		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);
	
		return $user_role;
	}

 


function admin_user_msg2() {
    global $wpdb;
 
    $table_name_settings = $wpdb->prefix . 'admin_user_message_settings';

    	if(isset($_POST['submit'])) {

            $table_color_header = $_POST['table_color_header'];
	    $term_quantity_message = $_POST['term_quantity_message'];
	    $term_page = $_POST['term_page'];
	    $term_From = $_POST['term_From'];
	    $term_subject = $_POST['term_subject'];
	    $term_received = $_POST['term_received'];
	    $term_time = $_POST['term_time'];
	    $term_msg_from = $_POST['term_msg_from'];
	    $term_msg = $_POST['term_msg'];
	    $term_msg_successfull_sent = $_POST['term_msg_successfull_sent'];
	    $term_sent_date = $_POST['term_sent_date'];
	    $term_to = $_POST['term_to'];
	   
	    $term_link_inbox = $_POST['term_link_inbox'];
	    $term_link_post_a_message = $_POST['term_link_post_a_message'];
	    $term_link_sent_messages = $_POST['term_link_sent_messages'];
 
	   //Buttons / http-paths
            $btn_back_to_inbox = $_POST['btn_back_to_inbox'];
	    $btn_back_to_send_msg =  $_POST['btn_back_to_send_msg'];
	    $btn_post_message = $_POST['btn_post_message'];
	    $btn_send_answer_text =  $_POST['btn_send_answer_text'];
	    $btn_send_msg_text =  $_POST['btn_send_msg_text'];
	    $btn_back_to_inbox_text =  $_POST['btn_back_to_inbox_text'];
	    $btn_read_message = $_POST['btn_read_message'];
	    $btn_answer_message = $_POST['btn_answer_message'];
	    $btn_search = $_POST['btn_search'];
	   
	    //Mail settings
            $mail_sender = $_POST['mail_sender'];
	    $mail_sender_mail = $_POST['mail_sender_mail'];	    
	    $mail_subject =  $_POST['mail_subject'];
	    $mail_message =  $_POST['mail_message'];
	    
	    //alert settings
	    $missing_subject = $_POST['missing_subject'];
	    $missing_receiver = $_POST['missing_receiver'];
	    $missing_message = $_POST['missing_message'];
	    
	    //search
	    $term_search_string = $_POST['term_search_string'];
	    $term_search_button = $_POST['term_search_button'];
	
	if ($table_color_header != '') {
	    $queryUpdateTableColor = "UPDATE $table_name_settings SET value='$table_color_header'  WHERE item='table_color_header'";
	    $resultUpdateTableColor = mysql_query($queryUpdateTableColor);			
	}
	
	
	if ($term_quantity_message != '') {
	    $queryUpdateTerm_quantity_message = "UPDATE $table_name_settings SET value='$term_quantity_message'  WHERE item='term_quantity_message'";
	    $resultUpdateTerm_quantity_message = mysql_query($queryUpdateTerm_quantity_message);	
	}
	    
	if ($term_page != '') {
	    $queryUpdateTerm_page = "UPDATE $table_name_settings SET value='$term_page'  WHERE item='term_page'";
	    $resultUpdateTerm_page = mysql_query($queryUpdateTerm_page);	
	}
	
	if ($term_From != '') {
	    $queryUpdateTerm_From = "UPDATE $table_name_settings SET value='$term_From'  WHERE item='term_From'";
	    $resultUpdateTerm_From = mysql_query($queryUpdateTerm_From);	
	}

	if ($term_subject != '') {	    
  	    $queryUpdateTerm_subject = "UPDATE $table_name_settings SET value='$term_subject'  WHERE item='term_subject'";
	    $resultUpdateTerm_subject = mysql_query($queryUpdateTerm_subject);
	}
	    
	if ($term_received != '') {
	    $queryUpdateTerm_received = "UPDATE $table_name_settings SET value='$term_received'  WHERE item='term_received'";
	    $resultUpdateTableColor = mysql_query($queryUpdateTerm_received);		
	}
	    
	if ($term_time != '') {
	    $queryUpdateTerm_time = "UPDATE $table_name_settings SET value='$term_time'  WHERE item='term_time'";
	    $resultUpdateTerm_time = mysql_query($queryUpdateTerm_time);	
	}
	  
 	if ($term_msg_from != '') {
	    $queryUpdateTerm_msg_from = "UPDATE $table_name_settings SET value='$term_msg_from'  WHERE item='term_msg_from'";
	    $resultUpdateTerm_msg_from = mysql_query($queryUpdateTerm_msg_from);	
	}
	    
 	if ($term_msg != '') {
	    $queryUpdateTerm_msg = "UPDATE $table_name_settings SET value='$term_msg'  WHERE item='term_msg'";
	    $resultUpdateTerm_msg = mysql_query($queryUpdateTerm_msg);	
	}
	    	    
	if ($term_msg_successfull_sent != '') {
	    $queryUpdateTerm_msg_successfull_sent = "UPDATE $table_name_settings SET value='$term_msg_successfull_sent'  WHERE item='term_msg_successfull_sent'";
	    $resultUpdateTerm_msg_successfull_sent = mysql_query($queryUpdateTerm_msg_successfull_sent);
	}
	
	if ($term_sent_date != '') {
	    $queryUpdateTerm_sent_date = "UPDATE $table_name_settings SET value='$term_sent_date' WHERE item='term_sent_date'";
	    $resultUpdateTerm_sent_date = mysql_query($queryUpdateTerm_sent_date);	    
	}
	
	if ($term_to != '') {
	    $queryUpdateTerm_to = "UPDATE $table_name_settings SET value='$term_to' WHERE item='term_to'";
	    $resultUpdateTerm_to = mysql_query($queryUpdateTerm_to);	    
	}
	
	if ($term_link_inbox != '') {
	    $queryUpdateTerm_link_inbox = "UPDATE $table_name_settings SET value='$term_link_inbox' WHERE item='term_link_inbox'";
	    $resultUpdateTerm_link_inbox = mysql_query($queryUpdateTerm_link_inbox);	    
	}
	
	if ($term_link_post_a_message != '') {
	    $queryUpdateTerm_link_post_a_message = "UPDATE $table_name_settings SET value='$term_link_post_a_message' WHERE item='term_link_post_a_message'";
	    $resultUpdateTerm_link_post_a_message = mysql_query($queryUpdateTerm_link_post_a_message);	    
	}
	
	if ($term_link_sent_messages != '') {
	    $queryUpdateTerm_link_sent_messages = "UPDATE $table_name_settings SET value='$term_link_sent_messages' WHERE item='term_link_sent_messages'";
	    $resultUpdateTerm_link_sent_messages = mysql_query($queryUpdateTerm_link_sent_messages);	    
	}	
	
	if ($btn_read_message != '') {
	    $queryUpdateBtn_read_message = "UPDATE $table_name_settings SET value='$btn_read_message' WHERE item='btn_read_message'";
	    $resultUpdateBtn_read_message = mysql_query($queryUpdateBtn_read_message);	    
	}

	if ($btn_answer_message != '') {
	    $queryUpdateBtn_answer_message = "UPDATE $table_name_settings SET value='$btn_answer_message' WHERE item='btn_answer_message'";
	    $resultUpdateBtn_answer_message = mysql_query($queryUpdateBtn_answer_message);	    
	}	
	
	
//Buttons / http-paths	
 
 	if ($btn_back_to_inbox != '') {
	    $queryUpdateBtn_back_to_inbox = "UPDATE $table_name_settings SET value='$btn_back_to_inbox' WHERE item='btn_back_to_inbox'";
	    $resultUpdateBtn_back_to_inbox = mysql_query($queryUpdateBtn_back_to_inbox);	    
	}
	
	if ($btn_back_to_send_msg != '') {
	    $queryUpdateBtn_back_to_send_msg = "UPDATE $table_name_settings SET value='$btn_back_to_send_msg' WHERE item='btn_back_to_send_msg'";
	    $resultUpdateBtn_back_to_send_msg = mysql_query($queryUpdateBtn_back_to_send_msg);	    
	}
	
	if ($btn_post_message != '') {
	    $queryUpdateBtn_post_message = "UPDATE $table_name_settings SET value='$btn_post_message' WHERE item='btn_post_message'";
	    $resultUpdateBtn_post_message = mysql_query($queryUpdateBtn_post_message);	    
	}
	
	if ($btn_send_answer_text != '') {
	    $queryUpdateBtn_send_answer_text = "UPDATE $table_name_settings SET value='$btn_send_answer_text' WHERE item='btn_send_answer_text'";
	    $resultUpdateBtn_send_answer_text = mysql_query($queryUpdateBtn_send_answer_text);	    
	}
	
	if ($btn_send_msg_text != '') {
	    $queryUpdateBtn_send_msg_text = "UPDATE $table_name_settings SET value='$btn_send_msg_text' WHERE item='btn_send_msg_text'";
	    $resultUpdateBtn_send_msg_text = mysql_query($queryUpdateBtn_send_msg_text);	    
	}
	
	if ($btn_back_to_inbox_text != '') {
	    $queryUpdateBtn_back_to_inbox_text = "UPDATE $table_name_settings SET value='$btn_back_to_inbox_text' WHERE item='btn_back_to_inbox_text'";
	    $resultUpdateBtn_back_to_inbox_text = mysql_query($queryUpdateBtn_back_to_inbox_text);	    
	}
	
	if ($btn_search != '') {
	    $queryUpdateSearch = "UPDATE $table_name_settings SET value='$btn_search' WHERE item='btn_search'";
	    $resultUpdateSearch = mysql_query($queryUpdateSearch);	    
	}	
	
 
//Mail settings
	    
	if ($mail_sender != '') {
	    $queryUpdateMail_sender = "UPDATE $table_name_settings SET value='$mail_sender' WHERE item='mail_sender'";
	    $resultUpdateMail_sender = mysql_query($queryUpdateMail_sender);	    
	}

	if ($mail_sender_mail != '') {
	    $queryUpdateMail_sender_mail = "UPDATE $table_name_settings SET value='$mail_sender_mail' WHERE item='mail_sender_mail'";
	    $resultUpdateMail_sender_mail = mysql_query($queryUpdateMail_sender_mail);	    
	}	
    
	if ($mail_subject != '') {
	    $queryUpdateMail_subject = "UPDATE $table_name_settings SET value='$mail_subject' WHERE item='mail_subject'";
	    $resultUpdateMail_subject = mysql_query($queryUpdateMail_subject);	    
	}
	
	if ($mail_message != '') {
	    $queryUpdateMail_message = "UPDATE $table_name_settings SET value='$mail_message' WHERE item='mail_message'";
	    $resultUpdateMail_message = mysql_query($queryUpdateMail_message);	    
	}	    	
	    
	    
	//alert settings
	if ($missing_subject != '') {
	    $queryUpdateMissingSubject = "UPDATE $table_name_settings SET value='$missing_subject' WHERE item='alert_missing_subject'";
	    $resultUpdateMissingSubject = mysql_query($queryUpdateMissingSubject);	    
	}

	if ($missing_receiver != '') {
	    $queryUpdateMissingReceiver = "UPDATE $table_name_settings SET value='$missing_receiver' WHERE item='alert_missing_receiver'";
	    $resultUpdateMissingReceiver = mysql_query($queryUpdateMissingReceiver);	    
	}
	
	if ($missing_message != '') {
	    $queryUpdateMissingMessage = "UPDATE $table_name_settings SET value='$missing_message' WHERE item='alert_missing_message'";
	    $resultUpdateMissingMessage = mysql_query($queryUpdateMissingMessage);	    
	}
	
//search

	if ($term_search_button != '') {
	    $queryUpdateSearchButton = "UPDATE $table_name_settings SET value='$term_search_button' WHERE item='term_search_button'";
	    $resultUpdateSearchButton = mysql_query($queryUpdateSearchButton);	    
	}
	
	if ($term_search_string != '') {
	    $queryUpdateSearchString = "UPDATE $table_name_settings SET value='$term_search_string' WHERE item='term_search_string'";
	    $resultUpdateSearchString = mysql_query($queryUpdateSearchString);	    
	}

}
    include('admin_user_messages_settings.php');  
?>


<div id="wrap_infoboxes">









<div style="float:left;">

	<form name="tableColor" action="<?php the_permalink(); ?>" method="post">
		<br />
		<span  style="font-weight:bold; font-size:16px">Here you can customize the settings of the "Admin-User-Messages"-Plugin.</span>
		<br /><br /><br />
		<label for="table_color_header" class="input_backend">Tablehead background-color:</label>
		<input type="text" name="table_color_header" id="table_color_header" value="<?php echo $aum_tablecolorheader ?>" class="input_backend">
		<br /><br /><br />

		<span  style="font-weight:bold; font-size:16px">Terms:</span>	
		<br /><br />
		<label for="term_quantity_message" class="input_backend">Term "Number of messages":</label>
		<input type="text" name="term_quantity_message" id="term_quantity_message" value="<?php echo $aum_term_quantity_message ?>" class="input_backend">
		<br /><br />
		
		<label for="term_page" class="input_backend">Term "Page":</label>
		<input type="text" name="term_page" id="term_page" value="<?php echo $aum_term_page ?>" class="input_backend">
		<br /><br />
		
		<label for="term_From" class="input_backend">Term "From":</label>
		<input type="text" name="term_From" id="term_From" value="<?php echo $aum_term_From ?>" class="input_backend">
		<br /><br />
		
		<label for="term_subject" class="input_backend">Term "Subject":</label>
		<input type="text" name="term_subject" id="term_subject" value="<?php echo $aum_term_subject ?>" class="input_backend">
		<br /><br />
		
		<label for="term_received" class="input_backend">Term "Received":</label>
		<input type="text" name="term_received" id="term_received" value="<?php echo $aum_term_received ?>" class="input_backend">
		<br /><br />
		
		<label for="term_time" class="input_backend">Term "Time of day":</label>
		<input type="text" name="term_time" id="term_time" value="<?php echo $aum_term_time ?>" class="input_backend">
		<br /><br />

		<label for="term_msg" class="input_backend">Term "Message":</label>
		<input type="text" name="term_msg" id="term_msg" value="<?php echo $aum_term_msg ?>" class="input_backend">
		<br /><br />
		
		<label for="term_msg_from" class="input_backend">Term "Message from":</label>
		<input type="text" name="term_msg_from" id="term_msg_from" value="<?php echo $aum_term_msg_from ?>" class="input_backend">
		<br /><br />
 		
		<label for="term_msg_successfull_sent" class="input_backend">Term "Message sent successfully":</label>
		<input type="text" name="term_msg_successfull_sent" id="term_msg_successfull_sent" value="<?php echo $aum_term_msg_successfull_sent ?>" class="input_backend">
		<br /><br />
		
		<label for="term_sent_date" class="input_backend">Term "Sent date"</label>
		<input type="text" name="term_sent_date" id="term_sent_date" value="<?php echo $aum_term_sent_date ?>" class="input_backend">
		<br /><br />

		<label for="term_to" class="input_backend">Term "to" Receiver</label>
		<input type="text" name="term_to" id="term_to" value="<?php echo $aum_term_to ?>" class="input_backend">
		<br /><br /><br />

		
<!-- Buttons -->
		<span  style="font-weight:bold; font-size:16px">Buttons and links:</span>
		<br /><br />
		
		<label for="term_link_inbox" class="input_backend">Linktext "Inbox"</label>
		<input type="text" name="term_link_inbox" id="term_link_inbox" value="<?php echo $aum_term_link_inbox ?>" class="input_backend">
		<br /><br /><br />
		
		<label for="term_link_post_a_message" class="input_backend">Linktext "Post a message"</label>
		<input type="text" name="term_link_post_a_message" id="term_link_post_a_message" value="<?php echo $aum_term_link_post_a_message ?>" class="input_backend">
		<br /><br /><br />
				
		<label for="term_link_sent_messages" class="input_backend">Linktext "Sent messages"</label>
		<input type="text" name="term_link_sent_messages" id="term_link_sent_messages" value="<?php echo $aum_term_link_sent_messages ?>" class="input_backend">
		<br /><br /><br />				


		<label for="btn_back_to_inbox" class="input_backend">http-Path to page Inbox</label>
		http://<input type="text" name="btn_back_to_inbox" id="btn_back_to_inbox" value="<?php echo $aum_btn_back_to_inbox ?>" class="input_backend">
		<br /><br />
		
		<label for="btn_back_to_send_msg" class="input_backend">http-Path to page "Sent Messages"</label>
		http://<input type="text" name="btn_back_to_send_msg" id="btn_back_to_send_msg" value="<?php echo $aum_btn_back_to_send_msg ?>" class="input_backend">
		<br /><br />		

		<label for="btn_post_message" class="input_backend">http-Path to page "Post a Message"</label>
		http://<input type="text" name="btn_post_message" id="btn_post_message" value="<?php echo $aum_btn_post_message ?>" class="input_backend">
		<br /><br />		
		
		<label for="btn_read_message" class="input_backend">http-Path to page "Read a Message":</label>
		http://<input type="text" name="btn_read_message" id="btn_read_message" value="<?php echo $aum_btn_read_message ?>" class="input_backend">
		<br /><br />		
		
		<label for="btn_answer_message" class="input_backend">http-Path to page "Answer a Message":</label>
		http://<input type="text" name="btn_answer_message" id="btn_answer_message" value="<?php echo $aum_btn_answer_message ?>" class="input_backend">
		<br /><br /><br />
		
		<label for="btn_send_answer_text" class="input_backend">Text for Button "Send Answer":</label>
		<input type="text" name="btn_send_answer_text" id="btn_send_answer_text" value="<?php echo $aum_btn_send_answer_text ?>" class="input_backend">
		<br /><br />
		
		<label for="btn_send_msg_text" class="input_backend">Text for Button "Post Message":</label>
		<input type="text" name="btn_send_msg_text" id="btn_send_msg_text" value="<?php echo $aum_btn_send_msg_text ?>" class="input_backend">
		<br /><br />
		
		<label for="btn_back_to_inbox_text" class="input_backend">Text for Button "Back to Inbox":</label>
		<input type="text" name="btn_back_to_inbox_text" id="btn_back_to_inbox_text" value="<?php echo $aum_btn_back_to_inbox_text ?>" class="input_backend">
		<br /><br /><br />
		
<!-- Search -->

		<span style="font-weight:bold; font-size:16px">Fulltext-Search over message and subject:</span>
		<br />
		<br />
		<label for="term_search_string" class="input_backend">Term for search label:</label>
		<input type="text" name="term_search_string" id="term_search_string" value="<?php echo $aum_term_search_string ?>" class="input_backend">
		<br /><br />
		
		<br />
		<label for="term_search_button" class="input_backend">Term for search button:</label>
		<input type="text" name="term_search_button" id="term_search_button" value="<?php echo $aum_term_search_button ?>" class="input_backend">
		<br /><br />
		
		<br />
		<label for="btn_search" class="input_backend">http-Path to page "Fulltext-Search-Page":</label>
		<input type="text" name="btn_search" id="btn_search" value="<?php echo $aum_btn_search ?>" class="input_backend">
		<br /><br />		
			
		
<!-- Mail -->

		<span style="font-weight:bold; font-size:16px">Notification Mail:</span>
		
		<br /><br />
		<label for="mail_sender" class="input_backend">Sender name:</label>
		<input type="text" name="mail_sender" id="mail_sender" value="<?php echo $aum_mail_sender ?>" class="input_backend">
		<br /><br />

		<br /><br />
		<label for="mail_sender_mail" class="input_backend">Sender mail address:</label>
		<input type="text" name="mail_sender_mail" id="mail_sender_mail" value="<?php echo $aum_mail_sender_mail ?>" class="input_backend">
		<br /><br />
		
		<br />
		<label for="mail_subject" class="input_backend">Subject for notification mail:</label>
		<input type="text" name="mail_subject" id="mail_subject" value="<?php echo $aum_mail_subject ?>" class="input_backend">
		<br /><br />	

		<label for="mail_message" class="input_backend">Message text for notification mail (the link to the site will be inserted automatically by the plugin):</label>
		<textarea name="mail_message" id="mail_message" cols="50" rows="10"><?php echo $aum_mail_message ?></textarea>
		<br /><br />
		
<!-- alert settings -->
		
		<br />
		<label for="missing_subject" class="input_backend">Alert for missing subject:</label>
		<input type="text" name="missing_subject" id="missing_subject" value="<?php echo $aum_msg_missing_subject ?>" class="input_backend">
		<br /><br />
		
		<br />
		<label for="missing_receiver" class="input_backend">Alert for missing receiver:</label>
		<input type="text" name="missing_receiver" id="missing_receiver" value="<?php echo $aum_msg_missing_receiver ?>" class="input_backend">
		<br /><br />		
		
		<br />
		<label for="missing_message" class="input_backend">Alert for empty message:</label>
		<input type="text" name="missing_message" id="missing_message" value="<?php echo $aum_msg_missing_message ?>" class="input_backend">
		<br /><br />		
		
	
		
		
		
		<input type="submit" name="submit" value="Speichern">
	</form>
 </div>

 
<div style="float: left; width:200px;">
<div id="latest_feature" style="border-style: solid;border-width:1px; padding:5px; background-color:#f9f9f9; margin:10px;">

<span style="font-weight:bold;">Latest Feature:</span> Simultaneously fulltext-search in messages and subjects, makes the daily work much easier.

</div>

<div id="donation_button" style="border-style: solid;border-width:1px; padding:5px;background-color:#f9f9f9; margin:10px;">
Do you like the plugin Admin User Messages? That is fine and makes me happy! How about a donation for this plugin? It motivates me to work on it in the future.

<div id="dbutton" style="text-align:center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="michael.karsten@michaelkarsten.de">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Karsten M. UG">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="EUR">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</div>
</div>	

<?PHP
}


?>