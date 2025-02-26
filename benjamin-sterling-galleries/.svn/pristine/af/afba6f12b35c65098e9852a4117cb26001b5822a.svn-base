<!-- start: flickr advanced -->
<fieldset class="options flickrQuickAdvanced" style="display:none;">
	<legend>Flickr Quick advanced</legend>
	<table width="100%" cellpadding="3" cellspacing="3" border="0">
		<tr>
			<td width="18%">API URL</td>
			<td width="235"><input type="text" size="30" value="" name="flickr_api_url" id="flickr_api_url"/></td>
			<td>If you already have the full api url that you can get from <a href="http://www.flickr.com/services/api/explore/?method=flickr.photos.search" target="_blank">here</a>, just grab it and put it in here and there is no need to add anything to the following form elements</td>
		</tr>
	</table>
</fieldset>

<fieldset class="options flickrAdvancedPhotoset flickrAdvancedSearch" style="display:none;">
	<legend>Flickr API KEY</legend>
	<table width="100%" cellpadding="3" cellspacing="3" border="0">
		<tr>
			<td width="18%">Flickr API Key</td>
			<td width="235"><input type="text" size="30" value="" name="flickr_api_key" id="flickr_api_key"/></td>
			<td>Get your <a href="http://www.flickr.com/services/api/keys/apply/" target="_blank">Flickr Services API Key</a>; if you provided one under "Flickr Params" then just select from the below dropdown.</td>
		</tr>
		<tr>
			<td width="18%">Flickr Stored API Keys</td>
			<td width="235">
				<select name="flickr_api_key_dd" id="flickr_api_key_dd">
	<?php if(isset($options['flickr_api_key'])):?>
					<option selected="selected"></option>
	<?php 
	$flickr_api_key = explode(',', $options['flickr_api_key']);
	while(list($key,$value) = each($flickr_api_key)){?>
					<option value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
	<?php }?>
	<?php else:?>
					<option selected="selected">No API Keys stored</option>
	<?php endif;?>
				</select>
			</td>
			<td></td>
		</tr>
	</table>
</fieldset>

<fieldset class="options flickrAdvancedPhotoset" style="display:none;">
	<legend>Flickr Photoset</legend>
<table width="100%" cellpadding="3" cellspacing="3" border="0">
	<tr>
		<td width="18%">Flickr Photoset ID</td>
		<td width="235"><input type="text" size="30" value="" name="flickr_photoset_id" id="flickr_photoset_id"/></td>
		<td>The photoset id for the Flickr set you want to pull from; if you provided one under "Flickr Params" then just select from the below dropdown</td>
	</tr>
	<tr>
		<td width="18%">Flickr Stored Photoset ID</td>
		<td width="235">
			<select name="flickr_photoset_id_dd" id="flickr_photoset_id_dd">
<?php if(isset($options['flickr_photoset_id'])):?>
				<option selected="selected"></option>
<?php
	$flickr_photoset_id = explode(',', $options['flickr_photoset_id']); 
	while(list($key,$value) = each($flickr_photoset_id)){?>
				<option value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
<?php }?>
<?php else:?>
				<option selected="selected">No Photoset ID stored</option>
<?php endif;?>
			</select>
		</td>
		<td></td>
	</tr>
</table>
</fieldset>

<fieldset class="options flickrAdvancedSearch" style="display:none;">
	<legend>Flickr Search</legend>
<table width="100%" cellpadding="3" cellspacing="3" border="0">
	<tr>
		<td width="18%">Flickr User ID</td>
		<td width="235"><input type="text" size="30" value="" name="flickr_user_id" id="flickr_user_id"/></td>
		<td>The userid for the Flickr account you want to pull from; if you provided one under "Flickr Params" then just select from the below dropdown</td>
	</tr>
	<tr>
		<td width="18%">Flickr Stored User ID</td>
		<td width="235">
			<select name="flickr_user_id_dd" id="flickr_user_id_dd">
<?php if(isset($options['flickr_user_id'])):?>
				<option selected="selected"></option>
<?php
	$flickr_user_id = explode(',', $options['flickr_user_id']); 
	while(list($key,$value) = each($flickr_user_id)){?>
				<option value="<?php echo trim($value);?>"><?php echo trim($value);?></option>
<?php }?>
<?php else:?>
				<option selected="selected">No User ID stored</option>
<?php endif;?>
			</select>
		</td>
		<td></td>
	</tr>

	<tr>
		<td width="18%">Flickr Group ID</td>
		<td width="235"><input type="text" size="30" value="" name="flickr_group_id" id="flickr_group_id"/></td>
		<td></td>
	</tr>

	<tr>
		<td width="18%">Flickr Tags</td>
		<td width="235"><input type="text" size="30" value="" name="flickr_tags" id="flickr_tags"/></td>
		<td>Comma separated tag list</td>
	</tr>

	<tr>
		<td width="18%">Flickr Tag Mode</td>
		<td width="235">
			<select name="flickr_tag_mode" id="flickr_tag_mode">
				<option value="" selected="selected"></option>
				<option value="any">Any (or)</option>
				<option value="all">All (and)</option>
			</select>
		</td>
		<td></td>
	</tr>

	<tr>
		<td width="18%">Flickr Sort Option</td>
		<td width="235">
			<select name="flickr_sort" id="flickr_sort">
				<option value="" selected="selected"></option>
				<option value="date-posted-asc">Date Posted Ascending</option>
				<option value="date-posted-desc">Date Posted Descending</option>
				<option value="date-taken-asc">Date Taken Ascending</option>
				<option value="date-taken-desc">Date Taken Descending</option>
				<option value="interestingness-asc">Interestingness Ascending</option>
				<option value="interestingness-desc"> Interestingness Descending</option>
				<option value="relevance">Relevance</option>
			</select>
		</td>
		<td></td>
	</tr>
</table>
</fieldset>
<!-- end: flickr advanced -->