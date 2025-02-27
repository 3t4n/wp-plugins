<?php
if (!defined('ABSPATH'))
   exit;
?>
<div class="imh-6310">
   <h1>Plugin Settings</h1>
   <?php

   wp_enqueue_media();

  
   $font_awesome = imh_6310_get_option('imh_6310_font_awesome_status');
   $imh_6310_selected_server = imh_6310_get_option('imh_6310_selected_server');

   if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'imh-6310-nonce-update')) {
       die('You do not have sufficient permissions to access this page.');
    } else {    

        //fontawesome Font Start
        if($font_awesome != ''){
        $wpdb->query("UPDATE {$wpdb->prefix}options set 
        option_value='". $_POST['font_awesome'] ."' 
        where option_name = 'imh_6310_font_awesome_status'");
        }
        else{
        $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_font_awesome_status'");
        $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_font_awesome_status', '". $_POST['font_awesome'] ."')");
        }
        $font_awesome = $_POST['font_awesome'];

        //server activation
        if(!$imh_6310_selected_server){
            $wpdb->query("DELETE FROM {$wpdb->prefix}options where option_name='imh_6310_selected_server'");
            $wpdb->query("INSERT INTO {$wpdb->prefix}options(option_name, option_value) VALUES ('imh_6310_selected_server', '". $_POST['imh_6310_selected_server'] ."')");
         }
         else{
            $wpdb->query("UPDATE {$wpdb->prefix}options set 
                        option_value='". $_POST['imh_6310_selected_server'] ."' 
                        where option_name = 'imh_6310_selected_server'");
         }
         $imh_6310_selected_server =  $_POST['imh_6310_selected_server'];
    }
 }
?>
 <form action="" method="post">
 <?php wp_nonce_field("imh-6310-nonce-update") ?>
 <div class="imh-6310-modal-body-form">
    <table width="100%" cellpadding="10" cellspacing="0">         
       <tr>
          <td width="250px">
             <b>Font Awesome Activation: </b><span class="imh-6310-pro">(Pro)</span><br />
            
          </td>
          <td width="500px" colspan="2">
             <input type="radio" name="font_awesome" value="2" checked> Active &nbsp;&nbsp;&nbsp;
             <input type="radio" name="font_awesome" value="1" <?php echo ($font_awesome == 1) ? ' checked':'' ?>> Inactive
          </td>
       </tr>
       <tr>
         <td width="200px">
            <b>Activation Server:</b><br />
            <small>If you fetch license key activation error, please change server</small>
         </td>
         <td width="500px" colspan="2">
            <input type="radio" name="imh_6310_selected_server" value="1"  <?php echo ($imh_6310_selected_server != 2) ? ' checked':'' ?>> Server 1 &nbsp;&nbsp;&nbsp;
            <input type="radio" name="imh_6310_selected_server" value="2" <?php echo ($imh_6310_selected_server == 2) ? ' checked':'' ?>> Server 2
         </td>
      </tr>
       <tr>
          <td colspan="3">
             <input type="submit" name="update" class="imh-6310-btn-primary imh-margin-right-10" value="Update" />
          </td>
       </tr>
    </table>
 </div>
 <br class="imh-6310-clear" />
</form>