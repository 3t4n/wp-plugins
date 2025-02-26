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
	$wpdb->update($table_name, $_POST, array('id' => $_GET['id']),$format,array('%d'));
	echo '<script>window.location="?page=appten_imagerotator";</script>';
}

/******************************************************************
/* Getting Input from the DB Table
******************************************************************/
$data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id=%d",$_GET['id']));
	
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
          <input type="text" id="width" name="width" value="<?php echo $data->width; ?>" size="5" />
          &nbsp;&nbsp;
          <?php _e("Height" ); ?>
          &nbsp;&nbsp;
          <input type="text" id="height" name="height" value="<?php echo $data->height; ?>" size="5"/></td>
     </tr>
     <tr>
        <td>Background Music File</td>
        <td><input type="text" name="music" id="music" value="<?php echo $data->music; ?>" /></td>
      </tr>
      <tr>
        <td>Music Volume Level</td>
        <td><input type="text" name="volumeLevel" id="volumeLevel"  value="<?php echo $data->volumeLevel; ?>" /></td>
      </tr>
       <tr>   
      <td class="key"><?php _e("Transition Effects" ); ?></td>
      <td>   	
        <select id="transition" name="transition" >
        <option <?php echo ($data->transition == "random")?"selected":"" ?> value="random">Random</option>
        <option <?php echo ($data->transition == "fade")?"selected":"" ?> value="fade">Fade</option>
         <option <?php echo ($data->transition == "move")?"selected":"" ?> value="move">Move</option>
        <option <?php echo ($data->transition == "fallingMask")?"selected":"" ?> value="fallingMask">Falling Mask</option>
         <option <?php echo ($data->transition == "slidedMask")?"selected":"" ?> value="slidedMask">Slided Mask</option>
        <option <?php echo ($data->transition == "boxedMask")?"selected":"" ?> value="boxedMask">Boxed Mask</option>
         </select>
        </td>
	  </tr>  
      <tr>
        <td style="vertical-align:top;">Auto Rotate</td>
        <td ><input type="radio" name="autoRotate" <?php if($data->autoRotate=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="autoRotate" <?php if($data->autoRotate=='0'){?>checked="checked"<?php }?> value="0"/>No</div></td>
      </tr>
      <tr>
        <td>Transition Interval</td>
        <td><input type="text" name="interval" id="interval" value="<?php echo $data->interval; ?>" /></td>
      </tr>
      <tr>
        <td>Banner Corner Radius</td>
        <td><input type="text" name="cornerRad" id="cornerRad" value="<?php echo $data->cornerRad; ?>" /></td>
      </tr>
      <tr>   
      <td class="key"><?php _e("Navigation Mode" ); ?></td>
      <td>   	
        <select id="navMode" name="navMode" >
        <option <?php echo ($data->navMode == "static")?"selected":"" ?> value="static">Static</option>
        <option <?php echo ($data->navMode == "float")?"selected":"" ?> value="float">Float</option>
        </select>
        </td>
	  </tr>  
      <tr>   
      <td class="key"><?php _e("Navigation Type" ); ?></td>
      <td>   	
        <select id="navType" name="navType" >
        <option <?php echo ($data->navType == "vertical")?"selected":"" ?> value="vertical">Vertical</option>
        <option <?php echo ($data->navType == "horizontal")?"selected":"" ?> value="horizontal">Horizontal</option>
        </select>
        </td>
	  </tr>  
      <tr>
        <td>Navigation BG Color</td>
        <td><input type="text" name="navBgColor" id="navBgColor" value="<?php echo $data->navBgColor; ?>" /></td>
      </tr>
     <tr>
        <td>Navigation Icon Color</td>
        <td><input type="text" name="navIcnColor"  id="navIcnColor" value="<?php echo $data->navIcnColor; ?>" /></td>
      </tr>
     <tr>
        <td>Navigation Corner Radius</td>
        <td><input type="text" name="navCornerRad" id="navCornerRad"  value="<?php echo $data->navCornerRad; ?>" /></td>
      </tr>
      <tr>
        <td>Navigation Margin Right</td>
        <td><input type="text" name="navMarginRight" id="navMarginRight" value="<?php echo $data->navMarginRight; ?>" /></td>
      </tr>
      <tr>
        <td>Navigation Margin Bottom</td>
        <td><input type="text" name="navMarginBottom" id="navMarginBottom" value="<?php echo $data->navMarginBottom; ?>" /></td>
      </tr>
      <tr>
        <td style="vertical-align:top;">Number Buttons</td>
        <td ><input type="radio" name="nbrButtons" <?php if($data->nbrButtons=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="nbrButtons" <?php if($data->nbrButtons=='0'){?>checked="checked"<?php }?> value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Back Button</td>
        <td ><input type="radio" name="backButton" <?php if($data->backButton=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="backButton" <?php if($data->backButton=='0'){?>checked="checked"<?php }?>value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Volume Button</td>
        <td ><input type="radio" name="volume" <?php if($data->volume=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="volume" <?php if($data->volume=='0'){?>checked="checked"<?php }?> value="0"/>No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">PlayPause Button</td>
        <td ><input type="radio" name="playPause" <?php if($data->playPause=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input type="radio" name="playPause" <?php if($data->playPause=='0'){?>checked="checked"<?php }?> value="0" />No</div></td>
      </tr>
      <tr></tr>
      <tr>
        <td style="vertical-align:top;">Fullscreen Button</td>
        <td ><input type="radio" name="fullScreen" <?php if($data->fullScreen=='1'){?>checked="checked"<?php }?> value="1"/>Yes<br><div style="margin-top:5px;"><input  type="radio" name="fullScreen" <?php if($data->fullScreen=='0'){?>checked="checked"<?php }?> value="0"/>No</div></td>
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
 	<?php  $prv = json_decode($data->preview); $shw = json_decode($data->show); $lnk = json_decode($data->link); $msg = json_decode($data->message); $typ = json_decode($data->w_type);
 		   for($i=0;$i<=9;$i++) {  ?> 
     <tr><td>
      <div style="font-family:Arial; font-size:15px; color:#fff; padding:7px; margin:10px 0px; background:#777; width:60px;">Image <?php echo $i+1; ?></div>
     </td></tr>
      <tr>
        <td style="vertical-align:top;">Show this Image</td>
        <td ><select id="show" name="show[]" >
        <option id="1_<?php echo $i; ?>" value="1">Yes</option>
        <option id="0_<?php echo $i; ?>" value="0">No</option>
        <?php  echo '<script>document.getElementById("'.$shw[$i].'_'.$i.'").selected="selected"</script>'; ?></select></td>
      </tr>
       <tr>
        <td><?php _e("Image URL" ); ?></td>
        <td><input type="text" id="preview" name="preview[]" size="40" value="<?php echo $prv[$i]; ?>"></td>
      </tr>
      <tr>
        <td><?php _e("Link URL" ); ?></td>
        <td><input type="text" id="link" name="link[]" size="40" value="<?php echo $lnk[$i]; ?>"></td>
      </tr>
      <tr>   
      <td class="key"><?php _e("Link Window" ); ?></td>
      <td>   	
        <select id="w_type" name="w_type[]" >
        <option id="_blank_<?php echo $i; ?>" value="_blank">Blank</option>
        <option id="_self_<?php echo $i; ?>" value="_self">Self</option>
         <?php echo '<script>document.getElementById("'.$typ[$i].'_'.$i.'").selected="selected"</script>'; ?></select>
        </td>
	  </tr> 
	  <tr>
		<td>
		<label>Description</label></td>
		<td>
        <textarea id="message"  name="message[]" style="width: 290px;height: 70px;resize: none;max-width: 600px;max-height: 450px;" cols="50" rows="5" style="color: gray; border: 1px solid rgb(175, 175, 175);" ><?php echo $msg[$i]; ?></textarea>
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
	  $jq('#effects').change(function(){
		var list_type_id= $jq('#effects').val();
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