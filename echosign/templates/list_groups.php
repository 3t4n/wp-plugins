<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

$groups = get_option('_eor_hr_forms_group_name') ; ?>
<script type = 'text/javascript'>
$(function() {
    $( "#sortable" ).sortable({
      revert: true
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
});

function editHRGroups()	{
	var group_id = $('#group_id').val();
	var group_name = $('#edit_group_name').val();
	$btn = $('#edit_hr_group_hr_form');
        $btn.button('loading');
	jQuery.ajax({
                type: 'post',
                url: ajaxurl,
                data: {
                        'action'     : 'eor_add_new_group_hr_forms',
                        'group_id'   : group_id,
			'group_name' : group_name,
                        'eor_action' : 'edit',
                },
                success:function(data) {
                        $btn.button('reset');
                        if(data.result == 'fail')       {
                                $('#hr-forms-error-notification').html('<div class = "alert alert-danger"> '+data.msg+' </div>');
                        }
                        else    {
                                window.location.href = "<?php echo esc_url('?page=eor_hr_forms&action=list_groups&msg=3'); ?>";
                        }
                }
        });
}

function removeGroup(group_id)	{
	var confirm_delete = confirm('Are you sure you want to delete this group ?');
	if(confirm)	{
	$btn = $('#add_hr_group_hr_form');
        $btn.button('loading');
        jQuery.ajax({
                type: 'post',
                url: ajaxurl,
                data: {
                        'action'     : 'eor_add_new_group_hr_forms',
                        'group_id'   : group_id,
			'eor_action' : 'delete',
                },
                success:function(data) {
                        $btn.button('reset');
                        if(data.result == 'fail')       {
                                $('#hr-forms-error-notification').html('<div class = "alert alert-danger"> '+data.msg+' </div>');
                        }
                        else    {
                        	window.location.href = "<?php echo esc_url('?page=eor_hr_forms&action=list_groups&msg=2'); ?>";
                        }
                }
        });
	}
}

function editGroup(group_id, group_name)	{
	$('#edit_group_name').val(group_name);
	$('#group_id').val(group_id);
	$('#eor_edit_group_modal').modal('show');
}

</script>
<div class="container">
        <h3> </h3>
    	<div class="row">
	<div class="col-md-9 col-md-offset-1">
	<div class="well well-sm">
	<fieldset>
        <legend class="text-center" style = 'padding: 10px;'> Groups <button class = 'btn btn-primary' data-target="#eor_group_modal" data-toggle="modal"> Add New Group </button> <a href = "<?php echo esc_url('?page=eor_hr_forms'); ?>" class = 'pull-right'> Back to HR Forms </a> </legend>
	<?php if(sanitize_text_field($_REQUEST['msg']) == 3) { ?> <div class = 'alert alert-success'> Group updated successfully </div> <?php } ?>
	<?php if(sanitize_text_field($_REQUEST['msg']) == 2) { ?> <div class = 'alert alert-success'> Group deleted successfully </div> <?php } ?>
	<?php if(sanitize_title($_REQUEST['msg']) == 1) { ?> <div class = 'alert alert-success'> Group added successfully </div> <?php } ?>
        <form class="form-horizontal" role="form" method = "post" action = "#" style = 'margin-left: 15%;'>
        	<div class="form-group form-group-options col-xs-8">
            		<ul id = "sortable">
         		<?php
                   	if(!empty($groups)) {
                     		foreach($groups as $group_id => $single_group) { ?>
               				<li class = "ui-sortable-handle">
                				<div class="input-group input-group-option col-xs-12">
							<span class="input-group-addon input-group-addon-remove">
                                                                <span class="fa fa-arrows"> </span>
                                                        </span>
                        				<input type="text" disabled id = 'groups' name="groups[]" class="form-control" placeholder="Enter Group Name" value = "<?php echo $single_group; ?>">
                        				<span class="input-group-addon input-group-addon-remove">
								<i class="fa fa-pencil-square-o" onclick = 'editGroup(<?php echo $group_id; ?>, "<?php echo $single_group ?>")'></i>
                        				</span>
                        				<span class="input-group-addon input-group-addon-remove" onclick = 'removeGroup(<?php echo $group_id; ?>)'>
                                				<span class="icon-remove-circle"> </span>
                        				</span>
                				</div>
                			</li>
            			<?php } ?>
			<?php }
			else	{ ?>
				<span class = 'alert alert-warning'> No groups added yet. Please create new group </span>
			<?php } ?>
        	</div>
     	</form>
	</fieldset>
	</div>
	</div>
    	</div>
</div>

<div class="modal fade" id="eor_edit_group_modal" tabindex="-1" role="dialog" aria-labelledby="Group">
        <div class="modal-dialog" role="document">
                <div class="modal-content" style = 'margin-top: 50px;'>
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> Edit Group </h4>
                        </div>
                        <div class="modal-body">
                                <div class = 'container-fluid'>
                                <div id = 'hr-forms-error-notification'> </div>
				<input type = 'hidden' name = 'group_id' id = 'group_id' value = ''>
                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="name"> Group Name </label>
                                        <div class="col-md-5">
                                                <input id="edit_group_name" name="edit_group_name" type="text" placeholder="Group Name" class="form-control" >
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class = "col-md-4"> </div>
                                        <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-primary" onclick = 'editHRGroups()' id = 'edit_hr_group_hr_form' data-loading-text='Processing'>Submit</button>
                                        </div>
                                </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

<div class="modal fade" id="eor_group_modal" tabindex="-1" role="dialog" aria-labelledby="Group">
        <div class="modal-dialog" role="document">
                <div class="modal-content" style = 'margin-top: 50px;'>
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> Add New Group </h4>
                        </div>
                        <div class="modal-body">
                                <div class = 'container-fluid'>
                                <div id = 'hr-forms-error-notification'> </div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="name"> Group Name </label>
                                        <div class="col-md-5">
                                                <input id="group_name" name="group_name" type="text" placeholder="Group Name" class="form-control" >
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class = "col-md-4"> </div>
                                        <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-primary" onclick = 'addHRGroups("new")' id = 'add_hr_group_hr_form' data-loading-text='Processing'>Submit</button>
                                        </div>
                                </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
