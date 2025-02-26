<div class="wrap ffwsecurity">

	<h2><?php echo esc_html( get_admin_page_title() ); ?> - Edit User Names</h2>

	<form method="post" action="<?php echo $action ?>" >
		<input type="hidden" id="id" name="id" value="<?php echo esc_attr($userId) ?>"/>
			
		<p>Login <strong>must be different</strong> from Nicename and Display name</p>
		<table class="form-table">
		    <tbody>
		        <tr>
				    <th scope="row">
						<label for="login">Login</label>
				    </th>
				 
				    <td>
						<input type="text" id="login" name="login" value="<?php echo esc_attr($userName) ?>"/>
				    </td>
				</tr>
		        <tr>
				    <th scope="row">
						<label for="nicename">Nicename (it is not Nickname)</label>
				    </th>
				 
				    <td>
						<input type="text" id="nicename" name="nicename" value="<?php echo esc_attr($userNiceName) ?>"/> 
				        <br>
				        <span class="description">Nicename is an author URL on the website</span>
				    </td>
				</tr>	
		        <tr>
				    <th scope="row">
						<label for="displayname">Display name</label>
				    </th>
				 
				    <td>
						<input type="text" id="displayname" name="displayname" value="<?php echo esc_attr($userDisplayName) ?>"/>
						<br/>
						<span class="description">Display Name is shown as author in the post</span> 
				    </td>
				</tr>																								
		    </tbody>
		</table>
		
		<p><?php echo get_submit_button('Save changes', 'primary', 'submit', false) ?>
			<input type="button" class="button button-secondary" value="Back" onclick="history.go(-1);"/>
		</p>
	</form>
	
</div>
