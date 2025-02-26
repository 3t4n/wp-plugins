<?PHP
// get plugin funcs
require_once(dirname(__FILE__).'/../plugin_info.php');

// check dependecies
require_once(dirname(__FILE__).'/requirements.php');
if($error) {
	return ;
}

//see if form has been submitted
$MSG = '';
if (isset($_POST['pform_data'])){
	if(isset($_POST['Reset'])) {
		update_option('afc_gmap_options', afc_gmap_get_options(1) );
		$MSG = '<div class="updated"><p><strong>Default values have been restored.</strong></p></div>';
	}else {
		update_option('afc_gmap_options', $_POST['pform_data']);
		$MSG = '<div class="updated"><p><strong>Options saved.</strong></p></div>';
	}
}

//get options
$o = afc_gmap_get_options();
?>
<br clear="all" />
<div class="wrap">
	<h2>AFC Google Map Options</h2>
	<?php echo $MSG?>
	<form name="plugin_html_form" method="post" action="admin.php?page=/afc-google-map/menu_pages/index.php">
	<fieldset class="options">
		<legend>Required settings</legend>
		<table class="optiontable"> 
			<tbody>
			<tr valign="top"> 
				<th scope="row">Component Location (URL):</th> 
				<td>
					<input name="pform_data[component_uri]" value="<?php echo $o['component_uri']?>" size="70" class="code" type="text"><br>
					Setup path to <a href="http://www.afcomponents.com/components/g_map/">AFC G Map</a> component. <br>This path must be provided and be valid (by default it's available as /wp-content/plugins/afc-google-map/component.swf).
				</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">File Base Location (URL):</th> 
				<td>
					<input name="pform_data[base_uri]" value="<?php echo $o['base_uri']?>" size="70" class="code" type="text"><br>
					Saves you couple of clicks by opening Remote Browser in that directory.
				</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Component's Tag:</th> 
				<td>
					<input type="text" value="<?php echo $o['comp_tag']?>" name="pform_data[comp_tag]" size="70" class="code" maxlength="15" /><br>
					In most cases, default value would be good enough. Sometimes, however, default tag might be used by other previously installed plugin - this option allows you to resolve such conflicts.
				</td>
			</tr> 
			<tbody>
		</table>
	</fieldset>
	<br />

	<fieldset class="options">
		<legend>Additional Settings</legend>
		<table class="optiontable" border="0"> 
			<tbody>
			<tr valign="top"> 
				<th scope="row">Enable Quick-Tag:</th> 
				<td colspan="2">
					<input type="radio" value="1" name="pform_data[quicktag]" <?php echo ($o['quicktag'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[quicktag]" <?php echo (!$o['quicktag'] ? 'checked="checked"': '') ?> /> no
				</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Map Type:</th> 
				<td style="width:70px;">
					<input type="radio" value="map" name="pform_data[mapType]" <?php echo ($o['mapType'] == 'map' ? 'checked="checked"' : '') ?> /> Map<br />
					<input type="radio" value="satellite" name="pform_data[mapType]" <?php echo ($o['mapType'] == 'satellite'? 'checked="checked"' : '') ?> /> Satellite<br />
					<input type="radio" value="hybrid" name="pform_data[mapType]" <?php echo ($o['mapType'] == 'hybrid'? 'checked="checked"': '') ?> /> Hybrid
				</td>
				<td style="padding:10px;">Defines displayed map type.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Default Map Dimensions:</th> 
				<td colspan="2">
					<input type="text" value="<?php echo $o['width']?>" name="pform_data[width]" size="3" maxlength="4" /> x
					<input type="text" value="<?php echo $o['height']?>" name="pform_data[height]" size="3" maxlength="4" />
				</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Display Zoom Controls:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[zoomControl]" <?php echo ($o['zoomControl'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[zoomControl]" <?php echo (!$o['zoomControl'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Defines whether zoom controls are displayed on map.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Display Map Type Controls:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[typeControl]" <?php echo ($o['typeControl'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[typeControl]" <?php echo (!$o['typeControl'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Defines whether map type controls are displayed on map.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Display Navigator Controls:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[navigatorControl]" <?php echo ($o['navigatorControl'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[navigatorControl]" <?php echo (!$o['navigatorControl'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Defines whether map navigator is displayed on map.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Display Position Controls:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[positionControl]" <?php echo ($o['positionControl'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[positionControl]" <?php echo (!$o['positionControl'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Defines whether position controls are displayed on map.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Center Cross:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[centerCross]" <?php echo ($o['centerCross'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[centerCross]" <?php echo (!$o['centerCross'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Defines whether the cross is displayed in the center of the map.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Center Cross Color:</th> 
				<td colspan="2">
					<input type="text" value="<?php echo $o['centerCrossColor']?>" name="pform_data[centerCrossColor]" size="8" maxlength="8" /><br>
				</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Pan Animation:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[animatePan]" <?php echo ($o['animatePan'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[animatePan]" <?php echo (!$o['animatePan'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Determines whether pan is animated or not.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Zoom Animation:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[animateZoom]" <?php echo ($o['animateZoom'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[animateZoom]" <?php echo (!$o['animateZoom'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Determines whether zoom is animated or not.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Keyboard Control:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[controlByKeyboard]" <?php echo ($o['controlByKeyboard'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[controlByKeyboard]" <?php echo (!$o['controlByKeyboard'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Enables zoom and control with the keyboard.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Mouse Control:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[controlByMouse]" <?php echo ($o['controlByMouse'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[controlByMouse]" <?php echo (!$o['controlByMouse'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Enables zoom and control with the mouse.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Mousewheel Control:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[controlByMouseWheel]" <?php echo ($o['controlByMouseWheel'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[controlByMouseWheel]" <?php echo (!$o['controlByMouseWheel'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Enables mouse wheel zooming. Please note that Mouse Control above has to be enabled.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Double Click Action:</th> 
				<td style="width:70px;">
					<input type="radio" value="none" name="pform_data[doubleClickMode]" <?php echo ($o['doubleClickMode'] == 'none' ? 'checked="checked"' : '') ?> /> None<br />
					<input type="radio" value="pan" name="pform_data[doubleClickMode]" <?php echo ($o['doubleClickMode'] == 'pan'? 'checked="checked"' : '') ?> /> Pan<br />
					<input type="radio" value="zoom" name="pform_data[doubleClickMode]" <?php echo ($o['doubleClickMode'] == 'zoom'? 'checked="checked"': '') ?> /> Zoom
				</td>
				<td style="padding:10px;">Defines map behavior on Mouse Double Click event.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Pan Speed:</th> 
				<td style="width:70px;">
					<input type="text" value="<?php echo $o['panSpeed']?>" name="pform_data[panSpeed]" size="1" maxlength="1" /><br>
				</td>
				<td style="padding:10px;">Defines the pan speed. Range: 2-9.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Enable Zoom at Pointer:</th> 
				<td style="width:70px;">
					<input type="radio" value="1" name="pform_data[zoomAtPointer]" <?php echo ($o['zoomAtPointer'] ? 'checked="checked"' : '') ?> /> yes<br />
					<input type="radio" value="0" name="pform_data[zoomAtPointer]" <?php echo (!$o['zoomAtPointer'] ? 'checked="checked"': '') ?> /> no
				</td>
				<td style="padding:10px;">Determines whether the map zooms to the location pointed by the mouse.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Latitude:</th> 
				<td style="width:70px;">
					<input type="text" value="<?php echo $o['latitude']?>" name="pform_data[latitude]" size="8" maxlength="8" /><br>
				</td>
				<td style="padding:10px;">Defines initial latitude.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Longitude:</th> 
				<td style="width:70px;">
					<input type="text" value="<?php echo $o['longitude']?>" name="pform_data[longitude]" size="8" maxlength="8" /><br>
				</td>
				<td style="padding:10px;">Defines initial longitude.</td>
			</tr> 
			<tr valign="top"> 
				<th scope="row">Zoom:</th> 
				<td style="width:70px;">
					<input type="text" value="<?php echo $o['zoomLevel']?>" name="pform_data[zoomLevel]" size="3" maxlength="3" /><br>
				</td>
				<td style="padding:10px;">Defines initial zoom level.</td>
			</tr> 
			<tbody>
		</table>
	</fieldset>

	<p class="submit">
		<input type="submit" name="Submit" value="Update Options &raquo;" />
		<input type="submit" name="Reset" value="Reset Options &raquo;" />
	</p>
	</form>
</div>
