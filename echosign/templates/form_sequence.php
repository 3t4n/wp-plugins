<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

$groups = get_option('_eor_hr_forms_group_name');
$hr_forms = get_option('_eor_hr_forms');

// grouping the hr forms based on the group id
$forms = array();
foreach($hr_forms as $hr_form_id => $single_hr_form_data) {
        $group_id = $single_hr_form_data['document_group'];
        $forms[$group_id][$hr_form_id] = $single_hr_form_data;
}

foreach($forms as $group_id => $single_form_data)	{
	uasort($forms[$group_id], 'eor_format_array_based_on_sequence');
}

?>
<div class="container" style = 'padding-top: 25px; width: auto;'>
	<form class="form-horizontal" role="form" method = "post" action = "#" style = 'margin-left: 15%;'>
	<div class = 'col-sm-9' style = 'padding-bottom: 25px;'> 
		<a class = 'pull-left' href = "<?php echo esc_url('?page=eor_hr_forms'); ?>"> Back to HR Forms </a>
		<button type = 'submit' class = 'btn btn-primary pull-right' > Save Sequence </button> 
	</div>
	<input type = 'hidden' name = 'action' value = 'save_sequence'>
        <div class="row">
        <div class="col-md-9">
        <div class="well well-sm">
	<?php
	foreach($forms as $group_id => $single_form_data)       { 
		$form_name = $groups[$group_id];
	?>
		<script type = 'text/javascript'>
		$(function() {
	    		$( "#sortable<?php echo $group_id; ?>" ).sortable({
      				revert: true
    			});
		});
		</script>

		<fieldset>
        		<legend class="text-center" style = 'padding: 10px;'> <?php echo $form_name; ?> </legend>
			<div class="form-group form-group-options col-xs-8">
                        <ul id = "sortable<?php echo $group_id; ?>">
			<?php
                        foreach($single_form_data as $form_id => $form_data)    { ?>
				<li class = "ui-sortable-handle" id = "<?php echo $form_id ?>">
                                   	<div class="input-group input-group-option col-xs-12">
                                       		<span class="input-group-addon input-group-addon-remove">
                                                	<span class="fa fa-arrows"> </span>
                                                </span>
                                        	<input type="text" readonly name="id_<?php echo $group_id; ?>_<?php echo $form_id ?>" class="form-control" value = "<?php echo $form_data['document_name']; ?>">
                                     	</div>
                             	</li>
			<?php } ?>
			</ul>
			</div>
		</fieldset>
	<?php } ?>
	</div> 
	</div> 
	</div> 
	<div class = 'col-sm-9'> 
		<a class = 'pull-left' href = "<?php echo esc_url('?page=eor_hr_forms');?>"> Back to HR Forms </a>
		<button type = 'submit' class = 'btn btn-primary pull-right' > Save Sequence </button> 
	</div>
	</form> 
</div>
