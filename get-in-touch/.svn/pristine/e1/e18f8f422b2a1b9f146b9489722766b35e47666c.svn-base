<div class="wrap t201plugin">
	<h2>
	Dashboard
	<a href="<?php print admin_url('admin.php?page=git-create-form'); ?>" class="add-new-h2">Create Form</a>
	</h2>

<?php

//Create a Object of Class to call method to insert data
$GetClass = new git\GetData();
$PostClass = new git\PostData();

//Calling Function Get All Form Data
$AllForms = $GetClass->get_all_forms_from_db();

//Get Action Value and ID to be action performed
if(isset($_GET['action']) && isset($_GET['id']))
{
	$action = $_GET['action'];
	$id = $_GET['id'];

	if($action === 'delete' && wp_verify_nonce( $_GET['_wpnonce'], 'delete_link' ))
	{
		$deleted_id = $PostClass->delete_form_from_db($id);
		
		if($deleted_id === true)
		{
			git\gitRedirectTo('admin.php?page=get-in-touch');
		}
	}

	if($action === 'edit' && wp_verify_nonce( $_GET['_wpnonce'], 'edit_link' ))
	{
		get_all_forms_data_for_update($id);
	}
	
	if($action === 'copy' && wp_verify_nonce( $_GET['_wpnonce'], 'copy_link' ))
	{
		$copy_id = $PostClass->create_copy_of_this_form($id);
		
		if($copy_id === true)
		{
			git\gitRedirectTo('admin.php?page=get-in-touch');
		}
	}
}
?>
	<div class="git-container">

		<div class="git-row">
			<div class="box">
				<div class="box-header well">
					<p style="color:#606060;">
						All Forms
					<a href="http://labs.think201.com/plugin/get-in-touch/" target="_blank" class="git-need-help">Need help?</a>
					</p>

				</div>
				<div class="box-content">
					<?php
					if(!empty($AllForms))
					{
						?>
						<table class="form-view-container">
							<tr class="forms-view-head">
								<td>No</td>
								<td>Title</td>
								<td>Form SortCode</td>
								<td>Map SortCode</td>
								<td>Form Function</td>
								<td>Map Function</td>
								<td>GIT Action</td>
							</tr>
							<?php
						}
						?>
						<?php
						$i = 1;
						foreach($AllForms as $Forms)
						{
							if(!empty($Forms->Form_Data))
							{
								$shortcodedetails = unserialize($Forms->Shortcode_Name);
								$functiondetails = unserialize($Forms->Function_Name);
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php if($Forms->Form_Label !== ''){ echo $Forms->Form_Label;}else {echo 'No Title';} ?></td>
									<?php
									if(!empty($shortcodedetails['FormSortcode']) && !empty($shortcodedetails['MapSortcode']) &&
										!empty($functiondetails['FormFunction']) && !empty($functiondetails['MapFunction']))
									{
										?>
										<td><input type="text" value='<?php echo $shortcodedetails['FormSortcode']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td><input type="text" value='<?php echo $shortcodedetails['MapSortcode']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td><input type="text" value='<?php echo $functiondetails['FormFunction']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td><input type="text" value='<?php echo $functiondetails['MapFunction']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<?php
									}
									if(!empty($shortcodedetails['FormSortcode']) && empty($shortcodedetails['MapSortcode']) &&
										!empty($functiondetails['FormFunction']) && empty($functiondetails['MapFunction']))
									{
										?>
										<td><input type="text" value='<?php echo $shortcodedetails['FormSortcode']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td>Map not added</td>
										<td><input type="text" value='<?php echo $functiondetails['FormFunction']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td>Map not added</td>
										<?php
									}
									if(empty($shortcodedetails['FormSortcode']) && !empty($shortcodedetails['MapSortcode']) &&
										empty($functiondetails['FormFunction']) && !empty($functiondetails['MapFunction']))
									{
										?>
										<td>Form not added</td>
										<td><input type="text" value='<?php echo $shortcodedetails['MapSortcode']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<td>Form not added</td>
										<td><input type="text" value='<?php echo $functiondetails['MapFunction']; ?>' readonly="readonly" onfocus="this.select();"></td>
										<?php
									}
									?>
									<td>
										<?php $EditUrl = 'admin.php?page=git-edit-form&action=edit&id='.$Forms->Form_Id;?>
										<?php $CopyUrl = 'admin.php?page=get-in-touch&action=copy&id='.$Forms->Form_Id;?>
										<?php $DeleteUrl = 'admin.php?page=get-in-touch&action=delete&id='.$Forms->Form_Id;?>
										<a id="copy" href="<?php echo wp_nonce_url($CopyUrl, 'copy_link' ); ?>">CLONE</a>
										<a id="edit" href="<?php echo wp_nonce_url($EditUrl, 'edit_link' ); ?>">EDIT</a>
										<a id="delete" href="<?php echo wp_nonce_url($DeleteUrl, 'delete_link' ); ?>">DELETE</a>
									</td>
								</tr>
								<?php
							}
							$i++;
						}
						?>
					</table>
				</div>
			</div>
		</div>

</div>