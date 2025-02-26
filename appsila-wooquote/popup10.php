
<!-- The Modal -->
<div id="popup10myModal"  class="modal-son">
  <?php
    
  //When error occurs this code is executed.It pops up an error message.
    
  //$my_plugin=WP_PLUGIN_DIR .'/osmanplugin';
  $errormsg = sanitize_text_field($_POST['msg']);
  $durum=sanitize_text_field($_POST['durum']);
  //$my_plugin=WP_PLUGIN_DIR . 'osmanplugin/images/info-low-part.png';
   
   
    $my_plugin_appsila=plugins_url('images/error-appsila.png', __FILE__);//Takes error image from file index.

    ?>
  <!-- Modal content -->
  <div class="modal-content-son" onclick="appsila_wqt_popup10()">
      <center><img  class="appsila_image" src="<?PHP echo $my_plugin_appsila;?>" >,</center>
	 <center><h2 ><?PHP echo $errormsg;?></h2> </center><?PHP echo "<br>"?> <!--Printing the error message.--> 
   <center>  <td><input type="submit" value="CLOSE" name="product_transfer_type_button" id="close" onclick="appsila_wqt_popup10Close()" class="button-primary" ></td><!-- Close button -->
  </center>
    <p></p>
	   <div class="woocommerce-billing-fields">
      </div>
    </div>
  </div>
