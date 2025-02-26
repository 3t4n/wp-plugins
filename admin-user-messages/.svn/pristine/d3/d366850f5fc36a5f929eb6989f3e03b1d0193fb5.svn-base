<?php

    function admin_user_messages_search($content) {
    
        global $wpdb;
        global $current_user;
        //get_currentuserinfo();
     
    include('admin_user_messages_settings.php');
     
    $table_name = $wpdb->prefix . 'admin_user_message';
	$table_users = $wpdb->prefix . 'users';      
    
    //$searchParam = "Ich";

    
    if(isset($_POST['searchParam'])) {
        $searchParam = $_POST['searchParam'];  
        $sqlSearchText = "SELECT * FROM $table_name WHERE message LIKE '%$searchParam%' OR subject LIKE '%$searchParam%'";
        //echo $sqlSearchText;
	
	$result = mysql_query($sqlSearchText);
    	$num_rows = mysql_num_rows($result);
        //$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\$num_rows\n<br>"; 
        //echo $error;
        
        
    
    
    }
?>




	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		
		<tr>
			<td><a href="<?php echo 'http://' . $aum_btn_back_to_inbox; ?>"><?php echo $aum_term_link_inbox; ?></a> | <a href="<?php echo 'http://' . $aum_btn_post_message; ?>"><?php echo $aum_term_link_post_a_message; ?></a> | <a href="<?php echo 'http://' . $aum_btn_back_to_send_msg; ?>"><?php echo $aum_term_link_sent_messages; ?></a> | <?php echo $aum_term_search_button; ?></span></td>
			
		</tr>
        </table>	
    
    	<script>
		
		function showMessage (x) {
			document.getElementById("messageId").value = x;
			document.showMessage.submit();
		}
		
	</script>
        
        <form name="showMessage" method="post" action='http://<?php echo $aum_btn_read_message ?>'>
		<input type="hidden" name="messageId" id="messageId" value="">
		<input type="hidden" name="submitted" id="submitted" value="true">
	</form>
    
    
    
	<form name="searchMask" method="post" action='<?php the_permalink(); ?>'>
		<?php echo $aum_term_search_string; ?>&nbsp;<input class="aum_text" type="text" name="searchParam" id="searchParam" value="">
		<input class="aum_button" type="submit" name="submit" id="submit" value="<?php echo $aum_term_search_button ?>">
	</form>
        
<?php        

        if ($num_rows >= '1') {
            
                echo $aum_term_quantity_message . ": " . $num_rows;
                echo "<br />";	    
            while($row = mysql_fetch_row($result)) {
                




                echo "<br />";
                echo $aum_term_subject . ": <a style='font-weight:bold' href='javascript:showMessage(" . $row[0] . ")'>" . $row[7] . "</a> ";
                

                $querySender = "SELECT user_nicename FROM $table_users WHERE ID = '$row[1]'";
                $resultSender = mysql_query($querySender);
                    while($rowSender = mysql_fetch_row($resultSender)) {
                            echo $aum_term_msg_from . ": ";
                            echo $rowSender[0];
                    }                
                
                echo "<br />";
                
                echo substr ( $row[5] , 0, 300 ) . "...<br />";
                //echo "<a style='font-weight:bold' href='javascript:showMessage(" . $row[0] . ")'>Read more";
                
                

                echo "<br />";
            }
        } else {
            if(isset($_POST['searchParam'])) {            
                echo $aum_term_quantity_message . ": 0";
            }
        }








    }
    
    add_shortcode( 'admin_user_messages_search', 'admin_user_messages_search' );
?>