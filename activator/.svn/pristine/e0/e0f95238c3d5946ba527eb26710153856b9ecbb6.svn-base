<?php
function activator_option_page(){
	?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Activator Shortcode Maker</h2>
	<script type="text/javascript" src="<?php echo plugins_url().'/'.'activator'. '/'.'back.js' ?>">
	</script>
	<p>
	Welcome to Activator plugin. Here you can generate shortcode for the plugin to include in pages,post according to your needs.
	</p>
	<table>
	<tr>
	<td>
	<label for="conttype">
	Select content type:</label>
	</td>
	<td>
	<select id="conttype" name="conttype" style="width: 200px">
	<option value="script" selected>Script</option>
	<!--  <option value="css">Css</option> -->  
	</select>
	</td>
	<td>
	The plugin works only with scripts at this time.
	</td>
	</tr>
	<tr>
	<td>
	Name:
	</td>
	<td>
	<input type="text" name="name"  id="name" style="width: 200px"/>
	</td>
	<td>
	This will be the handle of the script.(do not use special characters)
	</td>
	</tr>
	<tr>
	<td>
	File name:
	</td>
	<td>
	<input type="text" name="url" id="url" style="width: 200px" />
	</td>
	<td>
	The scriptfile must be in the plugins folder.
	</td>
	</tr>
	<tr>
	<td>
	<label for="dependencies">
	Dependencies: 
	</label>
	</td>
	<td>
	<select id="dependencies" name="dependencies" style="width: 200px">
	<?php 
	$scr_handle = array("scriptaculous-root","scriptaculous-builder","scriptaculous-dragdrop","scriptaculous-effects","scriptaculous-slider","scriptaculous-sound","scriptaculous-controls","scriptaculous","Image cropper","Image copper","swfobject","swfupload","swfupload-degrade","swfupload-queue","swfupload-handlers","jquery","jquery-form","jquery-color","jquery-ui-core","jquery-ui-tabs","jquery-ui-sortable","jquery-ui-draggable","jquery-ui-droppable","jquery-ui-selectable","jquery-ui-resizable","jquery-ui-dialog","schedule","suggest","thickbox","jquery-hotkeys","sack","quicktags","farbtastic","colorpicker","tiny_mce","prototype","autosave","wp-ajax-response","wp-lists","common","editor","editor-functions","ajaxcat","admin-categories","admin-tags","admin-custom-fields","password-strength-meter","admin-comments","admin-users","admin-forms","xfn","upload","postbox","slug","post","page","link","comment","admin-gallery","media-upload","admin-widgets","word-count","theme-preview","json2");
	$scr_name = array("Scriptaculous Root","Scriptaculous Builder","Scriptaculous Drag & Drop","Scriptaculous Effects","Scriptaculous Slider","Scriptaculous Sound","Scriptaculous Controls","Scriptaculous","Image Cropper","Jcrop","SWFObject","SWFUpload","SWFUpload Degarade","SWFUpload Queue","SWFUpload Handlers","jQuery","jQuery Form","jQuery Color","jQuery UI Core","jQuery UI Tabs","jQuery UI Sortable","jQuery UI Draggable","jQuery UI Droppable","jQuery UI Selectable","jQuery UI Resizable","jQuery UI Dialog","jQuery Schedule","jQuery Suggest","ThickBox","jQuery Hotkeys","Simple AJAX Code-Kit","QuickTags","Farbtastic (color picker)","ColorPicker (deprecated)","Tiny MCE","Prototype Framework","Autosave","WordPress AJAX Response","List Manipulation","WP Common","WP Editor","WP Editor Functions","AJAX Cat","Admin Categories","Admin Tags","Admin custom fields","Password Strength Meter","Admin Comments","Admin Users","Admin Forms","XFN","Upload","PostBox","Slug","Post","Page","Link","Comment","Admin Gallery","Media Upload","Admin widgets","Word Count","Theme Preview","JSON for JS");
	for($i=0;$i<count($scr_handle);$i++){
		echo "<option value='{$scr_handle[$i]}'";
		echo $x=($scr_handle[$i] == "jquery") ? " SELECTED " : "";
		echo ">{$scr_name[$i]}</option>";
	}
	?>
	</select>
	</td>
	</tr>
	<tr>
	<td>
	</td>
	<td>
	&nbsp;
	</td>
	<td>
	</td>
	</tr>
	<tr>
	<td>
	</td>
	<td>
	<INPUT TYPE="button" VALUE="Generate shortcode" id="generator" style="width: 200px">
	</td>
	<td>
	</td>
	</tr>
	</table>
	<br />
	Shortcode:
	<br /><br />
	<span id="display" style="background-color:yellow"></span>
	<br />
	<p>
	Copy and paste the shortcode in your page, post or widget.
	</p>
	<br />
	<br />
	<p>
	If you can't get this work, push <INPUT TYPE="button" VALUE="this button" id="demo" style="width: 150px"> then copy and past the code with yellow background to a page or post and view it in your browser.
	</p> 
	</div>
	<?php
}

function activator_plugin_menu(){
	add_options_page('Activator Plugin Shortcode Maker', 'Activator Settings', 'manage_options', 'activator_plugin','activator_option_page');
}
add_action('admin_menu','activator_plugin_menu');