<div class="view_wrapper">
	<div class="clear_both"></div>
	<div class="title_line" style="margin-bottom:10px">
		<h1>User Queries</span></h1>
		<?php 
			$roles = wp_get_current_user()->roles;
			if (in_array('subscriber', $roles) || in_array('contributor', $roles) || in_array('author', $roles)){ ?>
				<p>
					In this page, you can review the queries that you have submitted to the course administrator.<br /><br />
					To delete a query, click the <i>Delete</i> link in the <i>Actions</i> column. You can not delete an answered query.<br /><br />
					The answers for the queries will be also displayed under the respective course and will be viewable only by you.
				</p>
			<?php } else if (in_array('editor', $roles) || in_array('administrator', $roles)) { ?>
				<p>
					In this page, you can review the queries submitted by your students.<br /><br />
					To answer a query, click the <i>Answer</i> link in the <i>Actions</i> column.<br />
					To delete a query, click the <i>Delete</i> link in the <i>Actions</i> column. You can not delete an answered query.<br /><br />
					The answers of the queries will be shown under the respective course and will be viewable only by the student that asked them.
				</p>
		<?php } ?>
	</div>

<?php

	if (current_user_can('edit_courses')){
		if (isset($_REQUEST['replytoquery']) && isset($_POST['reply_query_id']) && isset($_POST['reply_to_query'])){
			$query_id=intval($_POST['reply_query_id']);
			$query_answer=sanitize_textarea_field($_POST['reply_to_query']);

			if ($query_id>0 && $query_answer != ''){
				global $wpdb;
				$table_name = $wpdb->prefix . 't4u_courses_user_queries';
				$sql = $wpdb->prepare("UPDATE ".$table_name." SET answer=%s, answer_date=NOW(), answer_user_id=%d WHERE id_query=%d",[$query_answer, get_current_user_id(), $query_id]);
				$wpdb->query($sql);
			}
		}
	}
?>
	<form method='post'>
	<?php
		$wp_list_table = new T4U_UserQueriesTable();
		$wp_list_table->prepare_items();
		$wp_list_table->display();

	?>
	</form>

<?php add_thickbox(); ?>
<div id="reply-to-query" style="display:none;">
	<form method='post' action='<?=get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE).'&page=user-queries&replytoquery=1';?>'>
		<p>
			Please write your reply in the box below and click the <b>Reply</b> button.
			
		</p>
		<textarea name='reply_to_query' style="width:99%;" rows='6'></textarea>
		
		<input type='hidden' id='reply_query_id' name='reply_query_id' value='0' />

		<div style='text-align:right; margin-top:20px;'>
			<input type='submit' name='submit' value='Reply' class='button'/>
		</div>
	</form>
</div>


</div>