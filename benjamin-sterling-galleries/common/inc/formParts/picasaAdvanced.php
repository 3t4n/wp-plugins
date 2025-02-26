<fieldset class="options picasaAdvanced" style="display:none;">
	<legend>Picasa Advanced</legend>
	<table width="100%" cellpadding="3" cellspacing="3" border="0">
		<tr>
			<td width="18%">Picasa User ID</td>
			<td width="235"><input type="text" size="30" value="" name="picasa_user_id" id="picasa_user_id"/></td>
			<td>if you provided one under "Picasa Params" then just select from the below dropdown.</td>
		</tr>
		<tr>
			<td width="18%">Picasa Stored User ID</td>
			<td width="235">
				<select name="picasa_user_id_dd" id="picasa_user_id_dd">
	<?php if(isset($options['picasa_user_id'])):?>
					<option selected="selected"></option>
	<?php 
	$picasa_user_id = explode(',', $options['picasa_user_id']);
	while(list($key,$value) = each($picasa_user_id)){?>
					<option value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
	<?php }?>
	<?php else:?>
					<option selected="selected">No User IDs stored</option>
	<?php endif;?>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<td width="18%">Picasa Album ID</td>
			<td width="235"><input type="text" size="30" value="" name="picasa_album_id" id="picasa_album_id"/></td>
			<td>You have three options here, you can enter the album name that comes after the user id in the url of your album (eg. /myid/ThisIsAAlbum == ThisIsAAlbum) or you can enter the number id that you can get from the rss feed itself, or you can hit "grab" just below and grab what you need from the dropdown.</td>
		</tr>
		<tr>
			<td width="18%" class="submit"><input type="submit" value="grab" id="bsg_picasa_grab"/></td>
			<td width="235">
				<select name="picasa_album_id_dd" id="picasa_album_id_dd">
					<option selected="selected"></option>
				</select>
			</td>
			<td id="bsg_picasa_grab_notice"></td>
		</tr>
	</table>
</fieldset>