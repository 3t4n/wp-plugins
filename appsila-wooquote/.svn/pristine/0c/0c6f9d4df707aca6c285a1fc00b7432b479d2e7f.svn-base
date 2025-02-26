<!DOCTYPE html>
<html lang="en">
<head>
<!-- If process is succesful this code is executed.-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div id="popup9myModal" class="modal-son">
  <?php
  $infomsg = sanitize_text_field($_POST['msg']);
    $durum=sanitize_text_field($_POST['durum']);
    $my_plugin_appsila=plugins_url('images/info_appsila.png', __FILE__);// Takes info image from file index.

    ?>
  <!-- Modal content -->
  <div class="modal-content-son" onclick="appsila_wqt_popup9()">
      <center><img  class="appsila_image" src="<?PHP echo $my_plugin_appsila;?>" ></center>
	 <center><h2 > <?PHP echo $infomsg;?></h2> </center><?PHP echo "<br>"?><!-- Printing the success message -->
   <center>  <td><input type="submit" value="CLOSE" name="product_transfer_type_button" onclick="appsila_wqt_popup9Close()" id="close" class="button-primary" ></td> <!-- Close button -->
   </center>
    <p></p>


    </div>
  </div>
</html>
