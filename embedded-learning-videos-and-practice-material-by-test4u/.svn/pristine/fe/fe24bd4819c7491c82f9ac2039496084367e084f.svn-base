<div class="view_wrapper">
	<div class="clear_both"></div>
	<div class="title_line" style="margin-bottom:10px">
		<h1>User Submissions</span></h1>
		<?php 
			$roles = wp_get_current_user()->roles;
			if (in_array('subscriber', $roles) || in_array('contributor', $roles) || in_array('author', $roles)){ ?>
				<p>
					In this page, you can see the files that you have submitted to the course administrator.<br /><br />
					Once assessment is complete, <i>Status</i> will be updated.<br />
					To delete a file, click the <i>Delete</i> link in the <i>Actions</i> column. You can not delete a file that has been assessed.

				</p>
			<?php } else if (in_array('editor', $roles) || in_array('administrator', $roles)) { ?>
				<p>
				In this page, you can view, download, assess or delete the practice files that were submitted by your students.<br /><br />
				To download a file, click the <i>Download</i> link in the <i>File</i> column.<br />
				Download and review each file. Click the <i>Mark as correct</i> or the <i>Mark as wrong</i> link to mark it as correct or wrong respectively.<br />
				
				To delete a file, click the <i>Delete</i> link in the <i>Actions</i> column.
				</p>
		<?php } ?>

	</div>

	<form method='post'>

<?php
    $wp_list_table = new T4U_UserUploadTable();
    $wp_list_table->prepare_items();
    $wp_list_table->display();

?>
	</form>
</div>