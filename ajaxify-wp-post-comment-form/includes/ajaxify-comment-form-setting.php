<?php 
defined( 'ABSPATH' ) || exit;	
global $wpdb; 
$displayCommentInfo = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}ajaxify_wp_post_comments_form WHERE id = 1" );	
?>
<form action="" method="post">
	<div class="ajaxify-comment-container">
		<div class="ajaxify-comment-row">
			<h2>Ajaxify WP Post Comment Form</h2>
			<div class="ajaxify-comment-col-6">
				<div class="ajaxify-enable-checkbox ajaxify-content">
					<form method="POST">
						<div class="col-full">
							<div class="label">
								<label for="comment_enable">Enable:</label>
							</div>
							<div class="divInput">
								<input type="checkbox" name="comment_enable" value="Yes" <?php if(!empty($displayCommentInfo->ajaxify_enable)) { echo "checked"; } ?>>Yes
							</div>	
						</div>
						<div class="col-full">
							<div class="label">
								<label for="comment_id">Comment form id:</label>
							</div>
							<div class="divInput">
								<input type="text" name="comment_id" value="<?php if(!empty($displayCommentInfo->ajaxify_main_container)) { echo $displayCommentInfo->ajaxify_main_container; } ?>" >
								<span class="readonly">Add comment form id for Eg: #commentform</span>
							</div>
						</div>
						<input type="submit" value="Submit">
					</form>
			</div>
		</div>	
		<div class="ajaxify-comment-col-6">
			<p class="example_screenshot">
				<strong>Hello User,</strong><br>
				Below is the Default Form Screenshot for more clarification.<br>
				Please check.
			</p>
			<?php echo '<img src="' . plugin_dir_url( __DIR__ ) .'/images/common-post-form.png"/>'; ?>
		</div>
	</div>
</form>