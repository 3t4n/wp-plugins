<?php

/*
+----------------------------------------------------------------+
+	tdPix-tinymce V1.60 3D Pix Button in Wordpress Editor
+	by Tony Asch
+   required for 3D Pix and WordPress 2.6+
+----------------------------------------------------------------+
*/

// look up for the path
require_once( dirname( dirname(__FILE__) ) .'/tdPix-config.php');

global $wpdb;

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>3D Pix</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	
	function inserttdPixLink() {
		
		var tagtext;
		
		var tdPhoto = document.getElementById('tdPix_panel');
		
		
		// who is active ?
		if (tdPhoto.className.indexOf('current') != -1) {
			var tdPhotoid = document.getElementById('tdPixtag').value;
			var tdWidthid = document.getElementById('tdWidtag').value;
			var tdHeightid = document.getElementById('tdHitetag').value;
			var tdModeid = document.getElementById('tdModetag').value;

			if (tdWidthid != '' )
				tdWidthid = " width=" + tdWidthid;

			if (tdHeightid != '' )
				tdHeightid = " height=" + tdHeightid;				
			
			if (tdModeid != '' )
				tdModeid = " mode=" + tdModeid;				
			
			if (tdPhotoid != '' )
				tagtext = "[3dpix id=" + tdPhotoid + tdWidthid + tdHeightid + tdModeid + "]";
			else
				tinyMCEPopup.close();
		}
	
		
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
</head>

<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('tdPixtag').focus();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->

	<form name="tdPix" action="#">
	<div class="tabs">
		<ul>
			<li id="tdPhoto_tab" class="current"><span><a href="javascript:mcTabs.displayTab('tdPhoto_tab','tdPix_panel');" onmousedown="return false;"><?php _e("Insert 3D Photo", '3dpix'); ?></a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
		<!-- td Pix panel -->
		<div id="tdPix_panel" class="panel current">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="tdPixtag"><?php _e("Enter Phereo Image Number", '3dpix'); ?></label></td>
            <td><input type="text" id="tdPixtag" name="tdPixtag" style="width: 100px" />
            </td>
          </tr>

		<tr>
            <td nowrap="nowrap"><label for="tdWidtag"><?php _e("Enter Width In Pixels", '3dpix'); ?></label></td>
            <td><input type="text" id="tdWidtag" name="tdWidtag" style="width: 100px" />
            </td>
          </tr>
		  
		<tr>
            <td nowrap="nowrap"><label for="tdHitetag"><?php _e("Enter Width In Pixels", '3dpix'); ?></label></td>
            <td><input type="text" id="tdHitetag" name="tdHitetag" style="width: 100px" />
            </td>
          </tr>
		<tr>
            <td nowrap="nowrap"><label for="tdModetag"><?php _e("3D Display Mode", '3dpix'); ?></label></td>
				<td><select id="tdModetag" name="tdModetag">
					<option value="">(default)</option>
					<option value="anaglyph">Anaglyph</option>
					<option value="parallel">Parallel</option>
					<option value="crossed">Crossed</option>
					<option value="vinterlaced">Vertical Interlaced</option>
					<option value="hinterlaced">Horizontal Interlaced</option>
					<option value="chinterlaced">Checkerboard</option>
					<option value="animated">Wiggle</option>
					<option value="nvidia">Nvidia 3D Vision</option>
				</select>
			</td></tr>

  
        </table>
		</div>
		<!-- end 3D Pix panel -->


	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", '3dpix'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", '3dpix'); ?>" onclick="inserttdPixLink();" />
		</div>
	</div>
</form>
</body>
</html>
<?php

?>

