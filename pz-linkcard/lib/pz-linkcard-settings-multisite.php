<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-multisite">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Multi Site Information', TEXT_DOMAIN ).$help_open.'multisite'.$help_close; ?></h2>
	<div class="pz-multi-notice"><?php echo __('*** Cannot be changed ***', TEXT_DOMAIN ); ?></div>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Multi Site', TEXT_DOMAIN ); ?></th>
			<td>
				<select>
					<option value="" <?php selected(!$is_multisite ); disabled( $is_multisite ); ?>><?php _e('Disabled',			TEXT_DOMAIN ); ?></option>
					<option value="1" <?php selected( $is_multisite ); disabled(!$is_multisite ); ?>><?php _e('Enabled',			TEXT_DOMAIN ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Type', TEXT_DOMAIN ); ?></th>
			<td>
				<select <?php disabled(!$is_multisite ); ?>>
					<option value="" <?php selected(!$is_subdomain ); disabled( $is_subdomain ); ?>><?php _e('Subdirectories',	TEXT_DOMAIN ); ?></option>
					<option value="1" <?php selected( $is_subdomain ); disabled(!$is_subdomain ); ?>><?php _e('Subdomains',		TEXT_DOMAIN ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Current Blog ID', TEXT_DOMAIN ); ?></th>
			<td>
				<input name="properties[multi-myid]" type="text" size="8" value="<?php echo	esc_attr($multi_myid ); ?>" readonly="readonly" />
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Number of Sites', TEXT_DOMAIN ); ?></th>
			<td>
				<input name="properties[multi-count]" type="text" size="8" value="<?php echo	esc_attr($multi_count ); ?>" readonly="readonly" />
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Table Name', TEXT_DOMAIN ); ?></th>
			<td><input type="text" size="40" value="<?php echo esc_html($this->db_name ); ?>" readonly="readonly" /></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Link to SubSite', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="checkbox" value="1" checked="checked" readonly="readonly" />
					<?php _e('Treat links to subsites as external links.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Site List', TEXT_DOMAIN ).$help_open.'multisite'.$help_close; ?></h2>
	<div class="pz-multi-notice"><?php echo __('*** Cannot be changed ***', TEXT_DOMAIN ); ?></div>
	<table class="form-table pz-multi-list widefat striped">
		<thead>
			<tr>
				<th scope="col" class="pz-multi-head-current"><?php _e('Current', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-multi-head-blog-id"><?php _e('Blog ID', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-multi-head-site-name"><?php _e('Site Name', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-multi-head-url"><?php _e('URL', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-multi-head-domain"><?php _e('Domain', TEXT_DOMAIN ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i = 1; $i <= $multi_count; $i++) { ?>
			<tr>
				<th class="pz-multi-body-current" scope="row">
					<input type="hidden"   name="" value="" />
					<input type="checkbox" name="" value="1" <?php checked($multi[$i]['id'] == $multi_myid ); ?> readonly="readonly" />
				</th>
				<td class="pz-multi-body-blog-id"><input name="properties[multi-<?php echo	$i; ?>-id]"     type="hidden" value="<?php echo	$multi[$i]['id'];     ?>" /><?php echo	$multi[$i]['id'];     ?></td>
				<td class="pz-multi-body-site-name"><input name="properties[multi-<?php echo	$i; ?>-name]"   type="hidden" value="<?php echo	$multi[$i]['name'];   ?>" /><?php echo	$multi[$i]['name'];   ?></td>
				<td class="pz-multi-body-url"><input name="properties[multi-<?php echo	$i; ?>-url]"    type="hidden" value="<?php echo	$multi[$i]['url'];    ?>" /><?php echo	$multi[$i]['url'];    ?></td>
				<td class="pz-multi-body-domain"><input name="properties[multi-<?php echo	$i; ?>-domain]" type="hidden" value="<?php echo	$multi[$i]['domain']; ?>" /><?php echo	$multi[$i]['domain']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php submit_button(); ?>
</div>
