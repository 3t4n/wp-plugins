<?php
/*
 * WPGear. New Users Monitor
 * widgets.php
 */
	
	/* Create New-Users DashboardWidget
	----------------------------------------------------------------- */	
	add_action( 'wp_dashboard_setup', 'NUM_Dashboard_Widgets_NewUsers' );
	function NUM_Dashboard_Widgets_NewUsers() {
		if (current_user_can( 'edit_dashboard' )) {
			global $wp_meta_boxes;
			
			wp_add_dashboard_widget( 'num_newuser_widget', 'New Users Monitor', 'NUM_Dashboard_NewUsers' );			
		}
	}	
	
	/* New-Users DashboardWidget
	----------------------------------------------------------------- */	
	function NUM_Dashboard_NewUsers() {
		global $wpdb;
		global $NUM_Dashboard_NewUsers;
		
		$num_users_table = $wpdb->prefix .'users';

		$Query = "
			SELECT * FROM $num_users_table 
			WHERE user_status = 0 
			ORDER BY ID DESC LIMIT %d";
			
		$users = $wpdb->get_results ($wpdb->prepare ($Query, $NUM_Dashboard_NewUsers));

		?>
		<table style="width: 100%">
			<tbody style="text-align: left;">
				<th><h3>Date reg.</h3></th>
				<th><h3>Login</h3></th>
				<th><h3>Email</h3></th>
				<th><h3>Role</h3></th>
				<?php 
				
				foreach ($users as $user) {
					$User_ID 	= $user->ID;
					$reg_date 	= $user->user_registered;
					$nicename	= $user->user_nicename;
					$user_email	= $user->user_email;
					
					$user_info 	= get_userdata($User_ID); 
					$roles		= $user_info->roles;					
					
					// Проверка подтверждения Нового Пользователя.
					$meta_key = 'num_confirm';
					$NUM_Confirm = get_user_meta( $User_ID, $meta_key, true );
					
					if ($NUM_Confirm == '') {
						// Если у Пользователя еще нет метаполей (Пользователь появился до следующего запуска сканирования), то формируем поле со значением ' '
						$meta_value = ' ';
						update_user_meta( $User_ID, $meta_key, $meta_value );						
					}
					?>
					<tr <?php if ($NUM_Confirm !== '1') {echo 'style="color: red; cursor: alias;" title="' .__('Unconfirmed User!', 'new-users-monitor') .'"';} ?>>
						<td>
							<?php  echo date('Y-m-d H:i', strtotime($reg_date));?>
						</td>
						
						<td>
							<a href="<?php echo get_edit_user_link( $User_ID ); ?>"><?php echo $nicename; ?></a>
						</td>
						
						<td>
							<?php echo $user_email; ?>
						</td>
						
						<td>
							<?php echo  implode(', ', $roles)?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<script>
			var NUM_Widget = document.getElementById("num_newuser_widget");
			var NUM_Widget_Header = NUM_Widget.getElementsByTagName("h2")[0];
			
			var NUM_Widget_Title = "<?php echo __('Click to open Setup-Option Page!', 'new-users-monitor'); ?>";			
			var NUM_Widget_LinkCaption = "<?php echo __('New Users Monitor', 'new-users-monitor'); ?>";
			
			NUM_Widget_Header.innerHTML = '<span title="' + NUM_Widget_Title + '"><a href="/wp-admin/users.php?page=new-users-monitor/includes/options.php" class="ulm_dashboard_widget_header">' + NUM_Widget_LinkCaption + '</a></span>';
		</script>		
	<?php }	