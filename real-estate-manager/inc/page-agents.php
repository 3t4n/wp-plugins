<?php
	$pending_agents = get_option( 'rem_pending_users' );
	$args = array(
		'role'         => 'rem_property_agent',
	); 
	$registered_agents = get_users( $args );	
?>
<div class="wrap">
	<h1><?php _e( 'Pending Agents', 'wcp-rem' ); ?> - <?php echo (!empty($pending_agents)) ? count($pending_agents) : '0' ; ?></h1>	
	
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th><?php _e( 'Username', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Email', 'wcp-rem' ); ?></th>
				<th><?php _e( 'First Name', 'wcp-rem' ) ?></th>
				<th><?php _e( 'Last Name', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Date of Registration', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Action', 'wcp-rem' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if (is_array($pending_agents)) {
				foreach ($pending_agents as $index => $agent) { ?>
					<tr>
						<td><?php echo $agent['username'] ?></td>
						<td><?php echo $agent['useremail'] ?></td>
						<td><?php echo $agent['firstname'] ?></td>
						<td><?php echo $agent['lastname'] ?></td>
						<td><?php echo $agent['time'] ?></td>
						<td>
							<button class="button button-secondary deny-user" data-userindex="<?php echo $index; ?>"><?php _e( 'Deny', 'wcp-rem' ); ?></button>
							<button class="button button-primary approve-user" data-userindex="<?php echo $index; ?>"><?php _e( 'Approve', 'wcp-rem' ); ?></button>
						</td>
					</tr>
				<?php }
			} ?>
		</tbody>
	</table>

	<h1><?php _e( 'Registered Agents', 'wcp-rem' ); ?> - <?php echo count($registered_agents); ?></h1>
	
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th><?php _e( 'Username', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Email', 'wcp-rem' ); ?></th>
				<th><?php _e( 'First Name', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Last Name', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Properties', 'wcp-rem' ); ?></th>
				<th><?php _e( 'Profile', 'wcp-rem' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if (is_array($registered_agents)) {
				foreach ($registered_agents as $agent) {
					$agent_info = get_userdata($agent->ID); ?>
					<tr>
						<td><?php echo $agent_info->user_login; ?></td>
						<td><?php echo $agent_info->user_email; ?></td>
						<td><?php echo get_user_meta( $agent->ID, 'first_name', true ); ?></td>
						<td><?php echo get_user_meta( $agent->ID, 'last_name', true ); ?></td>
						<td><?php echo count_user_posts( $agent->ID, 'property' ); ?></td>
						<td><a class="button" target="_blank" href="<?php echo get_author_posts_url( $agent->ID ); ?>"><?php _e( 'View Profile', 'wcp-rem' ); ?></a></td>
					</tr>
				<?php }
			} ?>
		</tbody>
	</table>

</div>