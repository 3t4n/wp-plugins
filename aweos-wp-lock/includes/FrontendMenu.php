<?php

//use Carbon\Carbon;

class FrontendMenu {
	public static function create() {
		add_menu_page('WP Lock', 'WP Lock', 'manage_options', 'wp-lock', array('FrontendMenu', 'display'));
		
		// Nur noch unser natives JavaScript einbinden
		add_action('admin_enqueue_scripts', function($hook) {
			if($hook != 'toplevel_page_wp-lock') {
				return;
			}
			
			wp_enqueue_script(
				'wplock-admin', 
				plugins_url('js/admin.js', dirname(__FILE__)), 
				array(), // Keine Abhängigkeiten mehr!
				'1.0.0', 
				true
			);
		});
	}

	public static function getOptions() {
		$mode = get_option('wpLockMode');
		return array(
			'mode' => $mode,
			'lastUpdated' => get_option('wpLockUpdated'),
			'eUntil' => ($mode == 4) ? get_option('wpLockUntil') : '',
			'dUntil' => ($mode == 2) ? get_option('wpLockUntil') : '',
			'eFor' => get_option('wpLockEnableFor'),
			'eForI' => get_option('wpLockEnableForI'),
			'dFor' => get_option('wpLockDisableFor'),
			'dForI' => get_option('wpLockDisableForI'),
			'dFrom' => get_option('wpLockUnlockFrom', '') ?: '',
			'dTo' => get_option('wpLockUnlockTo', '') ?: '',
			'eFrom' => get_option('wpLockLockFrom', '') ?: '',
			'eTo' => get_option('wpLockLockTo', '') ?: '',
			'logo' => get_option('wpLockLogo'),
			'message' => get_option('wpLockMessage'),
			'allowedRoles' => get_option('wpLockAllowedRoles', array('administrator'))
		);
	}

	public static function display() {
		$options = self::getOptions();
		$all_roles = wp_roles()->roles;
		
		// Definiere deutsche Übersetzungen für die Standardrollen
		$role_translations = array(
			'administrator' => 'Administrator',
			'editor' => 'Redakteur (Editor)'
		);
?>
		<div style="text-align:left;" class="wrap">
			<h1>AWEOS WP Lock</h1>
			<p>Lock your Website from external access. With AWEOS WP Lock you can block acess for non-registered users.<br>You can also define a specific timespan to lock or unlock your website.<br>
				This plugin was developed by the advertising agency <a href="https://aweos.de" target="_blank">AWEOS</a>.</p>
				<form method="post" action="<?php echo admin_url('admin-post.php?action=update_wplock_settings'); ?>">
				<div style="display: none;" id="wplock-mode"><?php echo $options['mode']; ?></div>
				<div style="display: none;" id="wplock-eFor"><?php echo $options['eFor']; ?></div>
				<div style="display: none;" id="wplock-eForI"><?php echo $options['eForI']; ?></div>
				<div style="display: none;" id="wplock-dFor"><?php echo $options['dFor']; ?></div>
				<div style="display: none;" id="wplock-dForI"><?php echo $options['dForI']; ?></div>
				<div style="display: none;" id="wplock-eFrom"><?php echo $options['eFrom']; ?></div>
				<div style="display: none;" id="wplock-eTo"><?php echo $options['eTo']; ?></div>
				<div style="display: none;" id="wplock-dFrom"><?php echo $options['dFrom']; ?></div>
				<div style="display: none;" id="wplock-dTo"><?php echo $options['dTo']; ?></div>
				<div style="display: none;" id="wplock-lastUpdated"><?php echo $options['lastUpdated']; ?></div>
				<table class="wp-list-table widefat fixed posts right_margin" id="vuewplockroot">
					<thead>
						<tr>
							<th>
							<button type="submit" class="button button-primary"><span class="save_button_span">Save Changes</span></button>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<table class="form-table lock-table">
									<div v-show="option == 0" style="display: none;" class="warning-permanently">
										<p class="warning-message">
											<strong>Warning!</strong> We highly recommend to disable WP-Lock only on live sites.
											<br>
											<div class="warning-controls">
												<p @click="unlockFor2Hours" class="warning-button start">Unlock for 2 hours</p>
												<p @click="unlockFor4Hours" class="warning-button">Unlock for 4 hours</p>
											</div>
										</p>
									</div>
									<tr>
										<td>
											<label>Unlock site permanently</label>
										</td>
										<td v-bind:class="{'active': option == 0, 'inactive': option != 0}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												class="wplock-status" 
												value=0 
												<?php echo ($options['mode'] == 0) ? 'checked' : ''; ?>
												v-model="option">&nbsp;
										</td>
									</tr>
									<tr>
										<td>
											<label>Lock site permanently</label>
										</td>
										<td v-bind:class="{'active': option == 1, 'inactive': option != 1}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												value=1 
												<?php echo ($options['mode'] == 1) ? 'checked' : ''; ?>
												class="wplock-status" 
												v-model="option">&nbsp;
										</td>
									</tr>
									<tr>
										<td>
											<label>Unlock site for</label>
										</td>
										<td v-bind:class="{'active': option == 2, 'inactive': option != 2}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												value=2 
												class="wplock-status" 
												<?php echo ($options['mode'] == 2) ? 'checked' : ''; ?>
												v-model="option">&nbsp;
											<input type="number" 
												name="wplock-disable-for" 
												class="wplock-value" 
												v-bind:disabled="option != 2"
												value="<?php echo esc_attr($options['dFor']); ?>">
											<select name="wplock-disable-for-i" 
												class="wplock-value" 
												v-bind:disabled="option != 2">
												<option value="0" <?php selected($options['dForI'], '0'); ?>>Minutes</option>
												<option value="1" <?php selected($options['dForI'], '1'); ?>>Hours</option>
												<option value="2" <?php selected($options['dForI'], '2'); ?>>Days</option>
												<option value="3" <?php selected($options['dForI'], '3'); ?>>Weeks</option>
											</select>
											&nbsp; then lock
										</td>
									</tr>
									<tr>
										<td>
											<label>Lock site for</label>
										</td>
										<td v-bind:class="{'active': option == 3, 'inactive': option != 3}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												value=3 
												class="wplock-status" 
												<?php echo ($options['mode'] == 3) ? 'checked' : ''; ?>
												v-model="option">&nbsp;
											<input type="number" 
												name="wplock-enable-for" 
												class="wplock-value" 
												v-bind:disabled="option != 3"
												value="<?php echo esc_attr($options['eFor']); ?>">
											<select name="wplock-enable-for-i" 
												class="wplock-value" 
												v-bind:disabled="option != 3">
												<option value="0" <?php selected($options['eForI'], '0'); ?>>Minutes</option>
												<option value="1" <?php selected($options['eForI'], '1'); ?>>Hours</option>
												<option value="2" <?php selected($options['eForI'], '2'); ?>>Days</option>
												<option value="3" <?php selected($options['eForI'], '3'); ?>>Weeks</option>
											</select>
											&nbsp; then unlock
										</td>
									</tr>
									<tr>
										<td>
											<label>Unlock site from...to</label>
										</td>
										<td v-bind:class="{'active': option == 4, 'inactive': option != 4}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												value=4 
												class="wplock-status" 
												<?php echo ($options['mode'] == 4) ? 'checked' : ''; ?>
												v-model="option">&nbsp;
											<input type="datetime-local" 
												name="wplock-from" 
												class="wplock-value" 
												v-bind:disabled="option != 4"
												value="<?php echo esc_attr($options['dFrom']); ?>">
											<input type="datetime-local" 
												name="wplock-to" 
												class="wplock-value" 
												v-bind:disabled="option != 4"
												value="<?php echo esc_attr($options['dTo']); ?>">
											&nbsp; then lock
										</td>
									</tr>
									<tr>
										<td>
											<label>Lock site from...to</label>
										</td>
										<td v-bind:class="{'active': option == 5, 'inactive': option != 5}">
											<input type="radio" 
												name="wplock-plugin-mode" 
												value=5 
												class="wplock-status" 
												<?php echo ($options['mode'] == 5) ? 'checked' : ''; ?>
												v-model="option">&nbsp;
											<input type="datetime-local" 
												name="wplock-from" 
												class="wplock-value" 
												v-bind:disabled="option != 5"
												value="<?php echo esc_attr($options['eFrom']); ?>">
											<input type="datetime-local" 
												name="wplock-to" 
												class="wplock-value" 
												v-bind:disabled="option != 5"
												value="<?php echo esc_attr($options['eTo']); ?>">
											&nbsp; then unlock
										</td>
									</tr>
									<tr>
										<td>
											<label>Display text</label>
										</td>
										<td>
											<?php wp_editor($options['message'], 'wplock-message', array('name' => 'wplock-message')); ?>
										</td>
									</tr>
									<tr>
										<td>
											<label>Image</label>
										</td>
										<td>
									        <input type="text" name="wpLockLogo" value="<?php echo $options['logo'] ?>">
										</td>
									</tr>
									<tr>
										<td>
											<label>Access Control</label>
										</td>
										<td>
											<label>
												<input type="checkbox" 
													name="wplock-allowed-roles[]" 
													value="editor"
													<?php checked(in_array('editor', $options['allowedRoles'])); ?>>
												Enable access for Editor (Redakteur)
											</label>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>
							<button type="submit" class="button button-primary"><span class="save_button_span">Save Changes</span></button>
							</th>
						</tr>
					</tfoot>
				</table>
				<?php wp_nonce_field('wplock_options_nonce','wplock_options_nonce'); ?>
			</form>
		</div>
		<?php
	}

	public static function updateValues() {
		if (!wp_verify_nonce($_POST['wplock_options_nonce'], 'wplock_options_nonce')) {
			die('Security check failed!');
		}

		$oldMode = get_option('wpLockMode');
		$newMode = $_POST['wplock-plugin-mode'];

		// Grundeinstellungen aktualisieren
		update_option('wpLockMessage', $_POST['wplock-message']);
		update_option('wpLockLogo', $_POST['wpLockLogo']);

		// Aktualisiere 'wpLockUpdated' nur, wenn sich der Modus ändert
		if ($oldMode != $newMode) {
			update_option('wpLockMode', $newMode);
			update_option('wpLockUpdated', current_time('mysql')); // Update nur wenn Modus sich ändert
		}

		// Speichere die Zeitwerte nur für den aktiven Modus
		if ($newMode === '2') {
			update_option('wpLockDisableFor', $_POST['wplock-disable-for']);
			update_option('wpLockDisableForI', $_POST['wplock-disable-for-i']);
			// Andere Modi zurücksetzen
			update_option('wpLockEnableFor', '');
			update_option('wpLockEnableForI', '');
		} else if ($newMode === '3') {
			update_option('wpLockEnableFor', $_POST['wplock-enable-for']);
			update_option('wpLockEnableForI', $_POST['wplock-enable-for-i']);
			// Andere Modi zurücksetzen
			update_option('wpLockDisableFor', '');
			update_option('wpLockDisableForI', '');
		}

		// NEU: Speichere die From/To Werte für Modi 4 und 5
		if ($newMode == '4') {
			update_option('wpLockUnlockFrom', $_POST['wplock-from']);
			update_option('wpLockUnlockTo', $_POST['wplock-to']);
		}
		if ($newMode == '5') {
			update_option('wpLockLockFrom', $_POST['wplock-from']);
			update_option('wpLockLockTo', $_POST['wplock-to']);
		}

		// Löse das Event aus, wenn sich der Status geändert hat
		if ($oldMode != $newMode) {
			do_action('wplock_status_changed');
		}

		// Rollenberechtigungen aktualisieren
		$allowed_roles = array('administrator'); // Administrator immer dabei
		if (isset($_POST['wplock-allowed-roles']) && is_array($_POST['wplock-allowed-roles'])) {
			if (in_array('editor', $_POST['wplock-allowed-roles'])) {
				$allowed_roles[] = 'editor';
			}
		}

		// Debug-Logging
		error_log('WP Lock - Updating Allowed Roles: ' . print_r($allowed_roles, true));

		update_option('wpLockAllowedRoles', $allowed_roles);

		wp_redirect(home_url('/wp-admin/admin.php?page=wp-lock'));
	}

	public static function enablePermanently() {
		self::resetValues();
		update_option('wpLockMode', 1);
	}

	public static function disablePermanently() {
		self::resetValues();
		update_option('wpLockMode', 0);
	}

	private static function resetValues() {
		// Setze alle Werte zurück, wenn der entsprechende Modus nicht aktiv ist
		$mode = get_option('wpLockMode');
		
		// For-Werte zurücksetzen wenn nicht Modus 2 oder 3
		if ($mode != '2' && $mode != '3') {
			update_option('wpLockFor', '');
			update_option('wpLockForI', '');
		}
		
		// Unlock from/to zurücksetzen wenn nicht Modus 4
		if ($mode != '4') {
			update_option('wpLockUnlockFrom', '');
			update_option('wpLockUnlockTo', '');
		}
		
		// Lock from/to zurücksetzen wenn nicht Modus 5
		if ($mode != '5') {
			update_option('wpLockLockFrom', '');
			update_option('wpLockLockTo', '');
		}
		
		// Until-Wert immer zurücksetzen
		update_option('wpLockUntil', '');
	}
}
