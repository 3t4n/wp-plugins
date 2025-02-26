<?php

/******************************************************************
/* Inserting (or) Updating the DB Table when edited
******************************************************************/
if($_POST['edited'] == 'true' && check_admin_referer( 'appten_imagerotator-nonce')) {
	unset($_POST['group'], $_POST['edited'], $_POST['save'], $_POST['_wpnonce'], $_POST['_wp_http_referer']);
	
	$_POST['show'] = json_encode($_POST['show']);
	$_POST['preview'] = json_encode($_POST['preview']);
	$_POST['link'] = json_encode($_POST['link']);
	$_POST['w_type'] = json_encode($_POST['w_type']);
	$_POST['message'] = json_encode($_POST['message']);
	
	$format = array('%d','%d','%s','%d','%s','%d','%d','%d','%s','%s','%s','%s','%d','%d','%d','%d','%d','%d','%d','%d','%d','%s','%s','%s','%s');
	$wpdb->insert($table_name, $_POST,$format);
	echo '<script>window.location="?page=appten_imagerotator";</script>';
	
}

/******************************************************************
/* Getting Input from the DB Table
******************************************************************/
$data = $wpdb->get_row("SELECT * FROM $table_name WHERE id=1");

?>
<div class="wrap">
  <br />
  <?php _e( "Image Rotator is a graceful image gallery rotator for your WordPress Websites!. For More visit <a href='http://www.appten.net/wordpress/image-rotator.html'>Image Rotator</a>." ); ?>
  <br />
  <br />
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>" onsubmit="return appten_imagerotator_validate();" >
  	<?php wp_nonce_field('appten_imagerotator-nonce'); ?>
  	 <?php  echo "<h3>" . __( 'General Configuration' ) . "</h3>"; ?>
    <div style="float: left;">
    <table class="admintable1" cellpadding="0" cellspacing="10">
    <tr>
        <td width="30%"><?php _e("ImageRotator Size" ); ?></td>
        <td><?php _e("Width" ); ?>
          &nbsp;&nbsp;
          <input type="text" id="width" name="width" value="680" size="5" />
          &nbsp;&nbsp;
          <?php _e("Height" ); ?>
          &nbsp;&nbsp;
          <input type="text" id="height" name="height" value="340" size="5"/></td>
     </tr>
     <tr>
        <td>Background Music File</td>
        <td><input type="text" name="music" id="music" value="" /></td>
      </tr>
      <tr>
        <td>Music Volume Level</td>
        <td><input type="text" name="volumeLevel" id="volumeLevel"  value="50" /></td>
      </tr>
       <tr>   
      <td class="key"><?php _e("Transition Effects" ); ?></td>
      <td>   	
        <select id="transition" name="transition" >
        <option value="random">Random</option>
        <option value="fade">Fade</option>
         <option value="move">Move</option>
        <option value="fallingMask">Falling Mask</option>
         <option value="slidedMask">Slided Mask</option>
        <option value="boxedMask">Boxed Mask</option></select>
        </td>
	  </tr>  
      <tr>
        <td style="vertical-align:top;">Auto Rotate</td>
        <td ><input type="radio" name="autoRotate" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="autoRotate" value="0"/>No</div></td>
      </tr>
      <tr>
        <td>Transition Interval</td>
        <td><input type="text" name="interval" id="interval" value="10" /></td>
      </tr>
      <tr>
        <td>Banner Corner Radius</td>
        <td><input type="text" name="cornerRad" id="cornerRad" value="15" /></td>
      </tr>
      <tr>   
      <td class="key"><?php _e("Navigation Mode" ); ?></td>
      <td>   	
        <select id="navMode" name="navMode" >
        <option value="static">Static</option>
        <option value="float">Float</option></select>
        </td>
	  </tr>  
      <tr>   
      <td class="key"><?php _e("Navigation Type" ); ?></td>
      <td>   	
        <select id="navType" name="navType" >
        <option value="vertical">Vertical</option>
        <option value="horizontal">Horizontal</option></select>
        </td>
	  </tr>  
      <tr>
        <td>Navigation BG Color</td>
        <td><input type="text" name="navBgColor" id="navBgColor" value="0xFFFFFF" /></td>
      </tr>
     <tr>
        <td>Navigation Icon Color</td>
        <td><input type="text" name="navIcnColor"  id="navIcnColor" value="0x111111" /></td>
      </tr>
     <tr>
        <td>Navigation Corner Radius</td>
        <td><input type="text" name="navCornerRad" id="navCornerRad"  value="6" /></td>
      </tr>
      <tr>
        <td>Navigation Margin Right</td>
        <td><input type="text" name="navMarginRight" id="navMarginRight" value="20" /></td>
      </tr>
      <tr>
        <td>Navigation Margin Bottom</td>
        <td><input type="text" name="navMarginBottom" id="navMarginBottom" value="20" /></td>
      </tr>
      <tr>
        <td style="vertical-align:top;">Number Buttons</td>
        <td ><input type="radio" name="nbrButtons" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="nbrButtons" value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Back Button</td>
        <td ><input type="radio" name="backButton" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="backButton" value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Volume Button</td>
        <td ><input type="radio" name="volume" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="volume" value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">PlayPause Button</td>
        <td ><input type="radio" name="playPause" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="playPause" value="0" />No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Fullscreen Button</td>
        <td ><input type="radio" name="fullScreen" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="fullScreen" value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Timer Clock</td>
        <td ><input type="radio" name="timerClock" checked="checked" value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="timerClock" value="0"/>No</div></td>
      </tr> 
    </table>
    
   </div>
   
   <div style="float: left;">
    <table class="admintable2" cellpadding="0" cellspacing="15">
 	<?php  for($i=1;$i<=10;$i++) {?> 
     <tr><td>
      <div style="font-family:Arial; font-size:15px; color:#fff; padding:7px; margin:10px 0px; background:#777; width:60px;">Image <?php echo $i ?></div>
     </td></tr>
      <tr>
        <td style="vertical-align:top;">Show this Image</td>
        <td ><select id="show" name="show[]" >
        <option value="1">Yes</option>
        <option value="0">No</option></select></td>
      </tr>
       <tr>
        <td><?php _e("Image URL" ); ?></td>
        <td><input type="text" id="preview" name="preview[]" size="40"></td>
      </tr>
      <tr>
        <td><?php _e("Link URL" ); ?></td>
        <td><input type="text" id="link" name="link[]" size="40"></td>
      </tr>
      <tr>   
      <td class="key"><?php _e("Link Window" ); ?></td>
      <td>   	
        <select id="w_type" name="w_type[]" >
        <option value="_blank">Blank</option>
        <option value="_self">Self</option></select>
        </td>
	  </tr> 
	  <tr>
		<td>
		<label>Description</label></td>
		<td>
        <textarea id="message"  name="message[]" style="width: 290px;height: 70px;resize: none;max-width: 600px;max-height: 450px;" cols="50" rows="5" style="color: gray; border: 1px solid rgb(175, 175, 175); "></textarea>
         </td></tr>
       <?php } ?>
     </table>
    <input type="hidden" name="edited" value="true" />
    <input type="submit" class="button-primary" name="save" value="<?php _e("Save Options" ); ?>" />
    &nbsp; <a href="?page=appten_imagerotator" class="button-secondary" title="cancel">
    <?php _e("Cancel" ); ?>
    </a>
     </div>
  </form>
</div>
<script type="text/javascript">
	var $jq = jQuery.noConflict();
	$jq(document).ready(function(){
	  $jq('#list_type').change(function(){
			var list_type_id= $jq('#list_type').val();
			changeType(list_type_id);	    
	  });
	});

	function appten_imagerotator_validate() {	
		
		if(document.getElementById('bgcolor').value == '' ){
			alert("Warning! You have not added bgcolor to the Player.");
			return false;
		}
		if(document.getElementById('bordercolor').value == '' ){
			alert("Warning! You have not added bordercolor to the Player.");
			return false;
		}
		if(document.getElementById('overlaycolor').value == '' ){
			alert("Warning! You have not added overlaycolor to the Player.");
			return false;
		}
		if(document.getElementById('overlayalpha').value == '' ){
			alert("Warning! You have not added overlayalpha to the Player.");
			return false;
		}
		if(document.getElementById('iconcolor').value == '' ){
			alert("Warning! You have not added iconcolor to the Player.");
			return false;
		}
		if(document.getElementById('sliderbgcolor').value == '' ){
			alert("Warning! You have not added sliderbgcolor to the Player.");
			return false;
		}
		if(document.getElementById('slidercolor').value == '' ){
			alert("Warning! You have not added slidercolor to the Player.");
			return false;
		}
		
		if(document.getElementById('dis_limit').value == '' ){
			alert("Warning! You have not added Limit to the Playlist.");
			return false;
		}
		return true;
	}
</script>