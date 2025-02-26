<?php
/*
+----------------------------------------------------------------+
+	minecraftblock-tinymce V1.00
+	by Drew Gourley
+   required for minecraftblock and WordPress 2.5
+----------------------------------------------------------------+
*/
// look up for the path
require_once( dirname( dirname(__FILE__) ) .'/minecraft-config.php');
global $wpdb;
// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Minecraft Block</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	function insertminecraftblock() {	
		var tagtext;
		var block = document.getElementById('block-panel');
		// who is active ?
		if (block.className.indexOf('current') != -1) {
			var texture = document.getElementById('block-texture').value;
			var blockid = document.getElementById('block-id').value;
			var classes = document.getElementById('block-class').value;
			var blockurl = document.getElementById('block-url').value;
			if ( classes !== '' )
				classes = " class='" + classes + "'";
			if ( blockurl !== '' )
				blockurl = " url='" + blockurl + "'";
			if (blockid !== '' )
				tagtext = "[minecraft texture='" + texture + "' id='" + blockid + "'" + classes + blockurl + "]";
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
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('block-id').focus();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="minecraftblock" action="#">
	<div class="tabs">
		<ul>
			<li id="block_tab" class="current"><span><a href="javascript:mcTabs.displayTab('block_tab','block_panel');" onmousedown="return false;"><?php _e("Minecraft Block", 'minecraftblock'); ?></a></span></li>
		</ul>
	</div>
	<div class="panel_wrapper">
		<div id="block-panel" class="panel current">
		<br />
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td>
            	<label for="block-id"><?php _e("Unique Block ID (required):", 'minecraftblock'); ?></label>
            </td>
			<td>
				<input type="text" id="block-id" name="block-id" style="width:128px" />
			</td>
          </tr>
         <tr>
            <td>
            	<label for="block-texture"><?php _e("Block texture:", 'minecraftblock'); ?></label>
            </td>
            <td>
            	<select id="block-texture" name="block-texture" style="width:128px" class="texture" />
					<option value="grass">Grass</option>
					<option value="dirt">Dirt</option>
					<option value="gravel">Gravel</option>
					<option value="sand">Sand</option>
					<option value="sandstone">Sandstone</option>
					<option value="mossy">Mossy Cobblestone</option>
					<option value="cobblestone">Cobblestone</option>
					<option value="stone">Stone</option>
					<option value="coal">Coal</option>
					<option value="lapis">Lapis Lazuli</option>
					<option value="iron">Iron</option>
					<option value="redstone">Redstone</option>
					<option value="gold">Gold</option>
					<option value="diamond">Diamond</option>
					<option value="obsidian">Obsidian</option>
					<option value="bedrock">Bedrock</option>
					<option value="wood">Wood</option>
					<option value="plank">Plank</option>
					<option value="brick">Brick</option>
					<option value="glass">Glass</option>
					<option value="tnt">TNT</option>
					<option value="table">Crafting Table</option>
					<option value="chest">Chest</option>
					<option value="bookshelf">Bookshelf</option>
					<option value="creeper">Creeper</option>
					<option value="pig">Pig</option>
					<option value="skeleton">Skeleton</option>
					<option value="player">Player</option>
				</select>
            </td>
          </tr>
         <tr>
            <td>
            	<label for="block-class"><?php _e("CSS Classes (optional):", 'minecraftblock'); ?></label>
            </td>
			<td>
				<input type="text" id="block-class" name="block-class" style="width:128px" />
			</td>
          </tr>
         <tr>
            <td>
            	<label for="block-url"><?php _e("Block Link (optional):", 'minecraftblock'); ?></label>
            </td>
			<td>
				<input type="text" id="block-url" name="block-url" style="width:128px" />
			</td>
          </tr>
        </table>
		</div>
	</div>
	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'minecraftblock'); ?>" onclick="tinyMCEPopup.close();" />
		</div>
		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'minecraftblock'); ?>" onclick="insertminecraftblock();" />
		</div>
	</div>
</form>
</body>
</html>
<?php
?>