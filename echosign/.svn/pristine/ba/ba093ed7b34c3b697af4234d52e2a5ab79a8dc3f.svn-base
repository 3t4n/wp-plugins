<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

$action = sanitize_title($_REQUEST['action']);
$doc_info = array();
if($action == 'edit')	{
	$id = sanitize_title($_REQUEST['id']);
	$hr_forms = get_option('_eor_echosign_template_info');
	$doc_info = $hr_forms[$id];
}
$user_data = array('' => '-- Select --','first_name'=>'First Name','last_name' => 'Last Name','billing_address_1' => 'Address1','billing_address_2' => 'Address2','billing_city' => 'City','billing_postcode' => 'Postcode','billing_country' => 'Country','billing_state' => 'State','billing_phone' => 'Phone','user_email' => 'Email');
?>
<style>
	.form-horizontal .form-group	{
		padding: 10px;


	}
	.hide {
		display:none !important;
	}

	.show {
		display:block !important;
	}
</style>
<div class="echosign_container" style = 'margin-top: 20px;'>
	<div class="col-md-10 col-md-offset-1" style="padding: 25px 0; text-align: center;">
		<div class="well">
			<form class="form-horizontal" action=" <?php if($action == 'edit') { echo '?page=wp-echosign-templates&action=update'; }  else { echo '?page=wp-echosign-templates';  }?>" method="post" data-toggle="validator" enctype= "multipart/form-data">
				<input type = 'hidden' name = 'id'  value = '<?php echo sanitize_text_field($_REQUEST['id']); ?>'>
				<input type = 'hidden' name = 'action' value = '<?php if($action == 'edit') { echo 'update';  } else { echo 'save';  } ?>' >
				<legend class="text-center" style = 'padding: 10px;'> <?php if($action == 'edit') { echo 'Edit Template'; } else { echo 'Add New Template'; } ?> <a href = '<?php echo esc_url('?page=wp-echosign-templates'); ?>' class = 'pull-right'> Back  </a> </legend>
				<div class="form-group">
					<label class="col-md-4 control-label" for="name">Document Name </label>
					<div class="col-md-6">
						<input id="document_name" name="document_name" type="text" placeholder="Document Name" class="form-control" required value = "<?php if(isset($doc_info['document_name'])) { echo $doc_info['document_name']; }?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="document">Upload Document (PDF)</label>
					<div class="col-md-6">
						<input type = 'file' name = 'document' id = 'document' <?php if($action != 'edit') { echo 'required'; } ?> accept="application/pdf">
						<span> <i> <?php if(isset($doc_info['document_info']['name'])) { echo $doc_info['document_info']['name']; } ?> </i> </span>
					</div>
				</div>
				<div class="row ">
					<div class="">
						<table class="table" id = "templateTable">
							<tbody>
							<?php
							$row_no = 1;
							if($action  == 'edit')  {
								foreach($doc_info['merge_fields'] as $key => $value) {
									if(empty($doc_info['merge_fields'][$key]) && (empty($doc_info['merge_values']) ||  empty($doc_info['cf_merge_values']))  )
										continue;
									if(is_array($doc_info['cf_merge_values']) && array_key_exists($key, $doc_info['cf_merge_values']) && $doc_info['cf_merge_values'][$key] != null) {
										$mf = 'hide'; $cmf = 'show';
									}
									if(array_key_exists($key,$doc_info['merge_values']) && $doc_info['merge_values'][$key] != null) {
										$mf = 'show'; $cmf = 'hide';
									}
									?>

									<tr id = "row-<?php echo $row_no;?>" class = "">
										<td data-name="merge_fields[<?php echo $row_no; ?>]">
											<input type="text" name='merge_fields[<?php echo $row_no; ?>]'  placeholder='Enter value' class="form-control" required  value = "<?php echo $doc_info['merge_fields'][$key] ?>" />
										</td>
										<td data-name="merge_values[<?php echo $row_no; ?>]" class = "<?php echo $mf;?>" >
											<select name="merge_values[<?php echo $row_no; ?>]" class = "form-control" required>
												<?php
												foreach($user_data as $ukey => $uval ) {
													$selected = '';
													if( $ukey == $doc_info['merge_values'][$key])
														$selected = 'selected';  ?>
													<option value = "<?php echo $ukey?>" <?php echo $selected ?> >  <?php echo $uval ?> </option>
												<?php }?>
											</select>
										</td>
										<td data-name="cf_merge_values[<?php echo $row_no; ?>]" class = "<?php echo $cmf; ?>" />
										<input type="text" name='cf_merge_values[<?php echo $row_no; ?>]'  placeholder='Enter value' class="form-control" required  value = "<?php echo $doc_info['cf_merge_values'][$key] ?>" />
										</td>
										<td data-name="del">
											<button name ="del0" id ="del-<?php echo $row_no;?>"  class='btn btn-danger fa fa-times fa-1x row-remove' onclick= "echosign_removeRow(this.id);"></button>
										</td>
									</tr>
								<?php
									$row_no++;
								}
							} else { ?>
								<tr id="row-0" class = "">
									<td data-name="merge_fields[<?php echo $row_no; ?>]" class = "">
										<input type="text" name='merge_fields[<?php echo $row_no; ?>]'  placeholder='Enter value' class="form-control" required  value = "" />
									</td>
									<td data-name="merge_values[<?php echo $row_no; ?>]" class = "">
										<select name="merge_values[<?php echo $row_no; ?>]" class = "form-control" required>
											<?php
											foreach($user_data as $ukey => $uval ) { ?>
												<option value = "<?php echo $ukey?>"  >  <?php echo $uval ?> </option>
											<?php }?>
										</select>
									</td>
									<td data-name="cf_merge_values[<?php echo $row_no; ?>]" class = "hide">
										<input type="text" name='cf_merge_values[<?php echo $row_no; ?>]'  placeholder='Enter value' class="form-control" required  value = "" />
									</td>
									<td data-name="del">
										<button name = "del0" id = "del-<?php echo $row_no;?>" class='btn btn-danger fa fa-times fa-1x row-remove' onclick = "echosign_removeRow(this.id);"></button>
									</td>
								</tr>
							<?php
								$row_no++;
							} ?>
							</tbody>
						</table>
					</div>
				</div>
				<input type = "hidden" id = "rowcount" value = "<?php echo $row_no;?>" />
				<a id="add_row"  class="btn btn-default pull-right">Add New</a>

				<a id="add_custom_row" class="btn btn-default pull-right">Add Custom field</a>
				<div class="form-group">
					<div class = "col-md-4"> </div>
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class = "clear"> </div>
</div>
