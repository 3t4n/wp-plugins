<?php 

include('../../../wp-config.php');
$connection = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
mysql_select_db($DB_NAME);

global $wpdb;
$table_name = $wpdb->prefix . 'cp_newsletter_table';
get_header();
?>
<div style="text-align: center; margin-top: 5%; margin-bottom: 5%;font-weight: bold;">
<?php

 if(isset($_GET['email'])){
     //echo $_GET['email'];
     $email = base64_decode( urldecode( $_GET['email'] ) );
     if(email_exists($email)){
          
          $wpdb->query( 
                $wpdb->prepare( 
                    "DELETE FROM $table_name
                       WHERE email = %s
                    ",$email)
          );
          echo "You have successfully unsubscribed. To get new post update emails please subscribe again.";
          //wp_redirect(site_url());
      }else{
          echo "This Email is not subscribed.";
      }
 }
?>
</div>   
<?php 
 get_footer();
?>