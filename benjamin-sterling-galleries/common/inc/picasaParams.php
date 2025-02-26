<div class="wrap">
	<h2><?php _e('BSG Picasa Params'); ?></h2>
	<form action="" method="post" id="bsg-conf" style="margin: auto; width: 650px; ">
		<input type="hidden" name="picasaParamHidden" value="1"/>
		<table width="100%" cellpadding="3" cellspacing="3" border="0">
			<tr>
				<td width="18%">Picasa Userid</td>
				<td width="235"><input type="text" size="30" value="<?php echo $options['picasa_user_id'];?>" name="picasa_user_id" id="picasa_user_id"/></td>
				<td>The userid for the Picasa account you want to pull from; you can enter multiple USERIDes but they must be separated by a comma. (eg: userid#1, userid#2)</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="submitFlickrParams" value="<?php _e('Submit Changes'); ?>" />
		</p>
	</form>
</div>