<?php
	function aidc_link_menu(){
		add_menu_page( __('AI Disable Settings', 'ai-disable-comments'), __('AIDC Settings', 'ai-disable-comments'), 'manage_options', 'ai-disable-comments', 'aidc_settings_page', plugins_url( 'ai-disable-comments/images/icon.png' ), 99 );
	}

	function aidc_settings_page(){
		global $wpdb;
		if (current_user_can('manage_options')) {
		?>
		<div class='wrap'>

			<div id="icon-options-general" class="icon32"></div> <h2><?php _e( 'Settings page', 'ai-disable-comments' ) ?></h2>
			<p>With this plugin you can Disable commenting on all your posts only with one click. Also can delete approved, pending and spam comments.</p>

		<?php
		if($_POST['aidc_submit']){

			$disablec = $_POST['comments'];
			$disablet = $_POST['trackbacks'];

			$deletea = $_POST['approved'];
			$deletep = $_POST['pending'];
			$deletes = $_POST['spam'];

			if(!isset($disablec) && !isset($disablet) && !isset($deletea) && !isset($deletep)){
				echo '<div class="error" style="padding:5px;">';
				_e( 'To disable or delete comments must choose one of the options below.' );
				echo '</div>';
			}

			if($disablec){
				$wpdb->query(
					$wpdb->prepare("UPDATE $wpdb->posts SET comment_status = 'closed' WHERE comment_status = 'open';")
				);

				echo '<div class="updated" style="padding:5px;">';
				_e( 'All comments are disabled.' );
				echo '</div>';
			}

			if($disablet){
				$wpdb->query(
					$wpdb->prepare("UPDATE $wpdb->posts SET ping_status = 'closed' WHERE ping_status = 'open';")
				);

				echo '<div class="updated" style="padding:5px;">';
				_e( 'All trackbacks are disabled.' );
				echo '</div>';
			}

			if($deletea){
				$wpdb->query( 
					$wpdb->prepare( "DELETE FROM $wpdb->comments WHERE comment_approved = 1" )
				);

				echo '<div class="updated" style="padding:5px;">';
				_e( 'All approved comments are deleted.' );
				echo '</div>';
			}

			if($deletep){
				$wpdb->query( 
					$wpdb->prepare( "DELETE FROM $wpdb->comments WHERE comment_approved = 0" )
				);

				echo '<div class="updated" style="padding:5px;">';
				_e( 'All pending and spam comments are deleted.' );
				echo '</div>';
			}

		}
		?>
			<form method="POST" action="">
				<h3 class="title"> <?php _e('Disable Options', 'ai-disable-comments') ?></h3>
				<p style="margin-bottom: 30px;">
					<input type="checkbox" name="comments"> <?php _e('Disable all comments', 'ai-disable-comments' ) ?> <br />
					<input type="checkbox" name="trackbacks"> <?php _e('Disable all trackbacks', 'ai-disable-comments' ) ?> <br />
				</p>
					
				<h3 class="title"><?php _e('Delete Options', 'ai-disable-comments' ) ?></h3>
				<p>
					<input type="checkbox" name="approved"> <?php _e('Delete all approved comments', 'ai-disable-comments' ) ?> <br />
					<input type="checkbox" name="pending"> <?php _e('Delete all pending and spam comments', 'ai-disable-comments' ) ?> <br />
				</p>

				<p class="description">
					<span style="color:red;">* <?php _e('Please be careful, because some of actions are irreversible.', 'ai-disable-comments' ) ?></span>
				</p>

				<?php function_exists( 'wp_nonce_field' ) ? wp_nonce_field( 'ai-disable-comments' ) : null; ?>
				<p class="submit">
						<input type="submit" name="aidc_submit" class="button-primary" value="<?php _e( 'Save changes', 'ai-disable-comments' ) ?>">
				</p>
			</form>

		</div>
		<?php
	}
}

?>