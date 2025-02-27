				<tr>
					<th scope="row" colspan="2"><h3><?php _e('OpenCart database parameters', 'fg-opencart-to-woocommerce'); ?></h3></th>
				</tr>
				<tr>
					<th scope="row"><label for="hostname"><?php _e('Hostname', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="hostname" name="hostname" type="text" size="50" value="<?php echo esc_attr($data['hostname']); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="port"><?php _e('Port', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="port" name="port" type="text" size="50" value="<?php echo esc_attr($data['port']); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="database"><?php _e('Database', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="database" name="database" type="text" size="50" value="<?php echo esc_attr($data['database']); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="username"><?php _e('Username', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="username" name="username" type="text" size="50" value="<?php echo esc_attr($data['username']); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="password"><?php _e('Password', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="password" name="password" type="password" size="50" value="<?php echo esc_attr($data['password']); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="prefix"><?php _e('OpenCart Table Prefix', 'fg-opencart-to-woocommerce'); ?></label></th>
					<td><input id="prefix" name="prefix" type="text" size="50" value="<?php echo esc_attr($data['prefix']); ?>" /></td>
				</tr>
