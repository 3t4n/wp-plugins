<fieldset class="options picasaBasic picasaAdvanced" style="display:none;">
	<legend>Picasa Thumbnail Size</legend>
	<table width="100%" cellpadding="3" cellspacing="3" border="0">
		<tr class="">
			<td width="18%">Select a thumbnail size for Picasa</td>
			<td width="235">
				<select name="bsg_picasa_thumbnailSelect">
					<option value="0">Small (72 width)</option>
					<option value="1">Medium (144 width)</option>
					<option value="2">Large (288 width)</option>
				</select>
			</td>
			<td>
				Select the size of the thumbnail you want to display below.  This thumbnail size will also be used for the gallery you will choose.
			</td>
		</tr>
		<tr class="">
			<td width="18%">Select a full size for Picasa</td>
			<td width="235">
				<select name="bsg_picasa_fullSizeSelect">
					<option value="512">512 width</option>
					<option value="576">576 width</option>
					<option value="640">640 width</option>
					<option value="720">720 width</option>
					<option value="800" selected="selected">800 width</option>
				</select>
			</td>
			<td>
				Select the size of the full size image you want to display in the plugin.
			</td>
		</tr>
	</table>
</fieldset>
<!-- start: picasa basic -->
<fieldset class="options picasaBasic" style="display:none;">
	<legend>Picasa Basic</legend>
	<table width="100%" cellpadding="3" cellspacing="3" border="0">
		<tr>
			<td width="18%">Your Picasa Album URL</td>
			<td width="235"><input type="text" size="30" value="" name="bsg_server"/></td>
			<td>Input the URL for the RSS feed for your Picasa</td>
		</tr>
	</table>
</fieldset>
<!-- end: picasa basic -->