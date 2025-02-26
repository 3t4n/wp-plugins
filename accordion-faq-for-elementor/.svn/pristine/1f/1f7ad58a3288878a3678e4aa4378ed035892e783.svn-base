<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="afaq-6310">
   <h1>Plugin License Activation</h1>
   <?php
      if(isset($_GET['status'])) {
         echo "<p class='afaq_6310_success-message'>Congratulations! Your license key activated successfully.</p>";
      } else{
   ?>
   <p>Activate your copy to get direct plugin updates and official support.</p>
   <?php
      if (!empty($_POST['save'])) {
         $nonce = $_REQUEST['_wpnonce'];
         if (!wp_verify_nonce($nonce, 'afaq-6310-nonce-field-license')) {
            die('You do not have sufficient permissions to access this page.');
         } else {
            afaq_6310_check_license(sanitize_text_field( $_POST['license'] ));
         }
      }
   ?>
   <form action="" method="post" style="width: 600px">
   <?php
        echo wp_nonce_field("afaq-6310-nonce-field-license"); 
   ?>
      <table>
         <tr>
            <td>License Key:</td>
            <td>
               <input type="text" name="license"  class="afaq-6310-form-input" >
            </td>
         </tr>
         <tr>
            <td></td>
            <td>
               <br />
               <input type="submit" name="save" class="afaq-6310-btn-primary">
            </td>
         </tr>
      </table>
   </form>
   <?php
      }
   ?>
</div>