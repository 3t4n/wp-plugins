<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	switch	($action) {
	case	'run-'.self::CRON_CHECK:
		wp_clear_scheduled_hook(self::CRON_CHECK );
		$cron_log		=	'* execute: '.self::CRON_CHECK.PHP_EOL.PHP_EOL;
		$cron_log		.=	$this->schedule_hook_check();
		if ($prop['sns-position'] && !wp_next_scheduled(self::CRON_CHECK ) ) {
			wp_schedule_event(time() + HOUR_IN_SECONDS, 'hourly', self::CRON_CHECK );
		}
		break;
	case	'run-'.self::CRON_ALIVE:
		wp_clear_scheduled_hook(self::CRON_ALIVE );
		$cron_log		=	'* execute: '.self::CRON_ALIVE.PHP_EOL.PHP_EOL;
		$cron_log		.=	$this->schedule_hook_alive();
		if ($prop['flg-alive'] && !wp_next_scheduled(self::CRON_ALIVE ) ) {
			wp_schedule_event(time() + DAY_IN_SECONDS, 'daily', self::CRON_ALIVE );
		}
		break;
	}

	// WP-Cron の実行結果
	if (isset($cron_log ) ) {
		$cron_log			=	esc_attr(esc_html($cron_log ) );
		$cron_log			=	str_replace(PHP_EOL, '<br />', $cron_log );
	}

	// WP-Cronスケジュールを取得
	$cron_schedule	=	_get_cron_array();
	$schedules		=	wp_get_schedules();		// タイミングの定数（604800→週1回 など）
	foreach			($cron_schedule	as $timestamp	=> $cronhooks ) {
		foreach		($cronhooks		as $hook		=> $dings ) {
			foreach	($dings			as $signature	=> $data ) {
				if	(($hook == self::CRON_ALIVE ) || ($hook == self::CRON_CHECK ) ) {
					$myjob		=	true;
					$button		=	'class="pz-button-sure" value="run-'.$hook.'"';
					$display	=	'class="pz-cron-list-lkc"';
				} else {
					$myjob		=	false;
					$button		=	'class="pz-button-disabled" disabled="disabled"';
					$display	=	'class="pz-cron-list-other"';
				}
				$schedule		=	isset($schedules[$data['schedule']]['display'] ) ? $schedules[$data['schedule']]['display'] : $data['schedule'] ;
				$interval		=	isset($data['interval'] ) ? $data['interval'].' '.__('Sec.', TEXT_DOMAIN ) : null ;
				$cron_list[]	=	array(
					//'key'			=>	($myjob ? '1' : '2' ).$hook,
					'key'			=>	$timestamp,
					'hook'			=>	$hook,
					'myjob'			=>	$myjob,
					'next_time'		=>	esc_html(get_date_from_gmt( date( 'Y-m-d H:i:s', $timestamp ), DATETIME_FORMAT ) ),
					'schedule'		=>	$schedule,
					'interval'		=>	$interval,
					'button'		=>	'<button type="submit" name="action" '.$button.' onclick="return confirm(\''.__('Are you sure?', TEXT_DOMAIN ).'\' );">'.__('Run Now', TEXT_DOMAIN ).'</button>',
					'display'		=>	$display
					);
			}
		}
	}
	asort($cron_list );

?>
<div class="pz-page pz-page-admin" id="pz-admin">
	<div class="pz-admin-notice"><?php _e('Do not use normally as it can be set to incapacitate.', TEXT_DOMAIN ); ?></div>
	<div class="pz-submit-float"><?php submit_button(); ?></div>

	<h2><?php _e('Information', TEXT_DOMAIN ); ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('WordPress Version', TEXT_DOMAIN ); ?></th>
			<td><input type="text" size="20" value="<?php echo bloginfo('version' ); ?>" readonly="readonly" ?></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('PHP Version', TEXT_DOMAIN ); ?></th>
			<td><input type="text" size="20" value="<?php echo phpversion(); ?>" readonly="readonly" ?></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('DBMS Version', TEXT_DOMAIN ); ?></th>
			<td><input type="text" size="20" value="<?php global $wpdb; echo $wpdb->db_version(); ?>" readonly="readonly" ?></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Table Name', TEXT_DOMAIN ); ?></th>
			<td><input type="text" size="40" value="<?php echo esc_html($this->db_name ); ?>" readonly="readonly" /></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Plugin Version', TEXT_DOMAIN ); ?></th>
			<td>
				<input type="text" name="properties[plugin-version]" value="<?php echo esc_html(PLUGIN_VERSION ); ?>" size="10" readonly="readonly" <?php if ($prop['admin-mode'] ) { echo	'ondblclick="this.readOnly=false;" '; }?>/>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Plugin DB Version', TEXT_DOMAIN ); ?></th>
			<td>
				<input type="text" name="properties[db-version]"     value="<?php echo esc_attr($prop['db-version'] ); ?>"     size="40" readonly="readonly" <?php if ($prop['admin-mode'] ) { echo	'ondblclick="this.readOnly=false;" '; }?>/>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php _e('for Debug', TEXT_DOMAIN ); ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Reboot This Plugin', TEXT_DOMAIN ); ?></th>
			<td>
				<button type="submit" name="action" value="init-plugin" class="pz-button-sure" onclick="return confirm('<?php _e('Are you sure?', TEXT_DOMAIN ); ?>');"><?php _e('Run', TEXT_DOMAIN ); ?></button>
				&ensp;<span><?php echo	__('Perform initial setup.', TEXT_DOMAIN ).'&nbsp;'.__('"Settings" will not be initialized.', TEXT_DOMAIN ); ?></span>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('DB Update Mode', TEXT_DOMAIN ); ?></span></th>
			<td>
				<label>
					<input type="hidden"   name="properties[debug-nocache]" value="" />
					<input type="checkbox" name="properties[debug-nocache]" value="1" <?php checked($prop['debug-nocache'] ); ?> class="pz-tab-show" />
					<?php _e('Forced access to links even if they are recorded in DB.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php _e('Error Settings', TEXT_DOMAIN ); ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Error Conditions', TEXT_DOMAIN ); ?></th>
			<td>
				<label>
					<input type="hidden"   name="properties[error-mode]" value="" />
					<input type="checkbox" name="properties[error-mode]" value="1" <?php checked($prop['error-mode'] ); ?> />
					<?php _e('Check to enable error conditions.', TEXT_DOMAIN ); ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Post URL', TEXT_DOMAIN ); ?></th>
			<td><input name="properties[error-url]" type="url" size="80" value="<?php echo esc_attr($prop['error-url'] ); ?>" /></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('Occurrence Time', TEXT_DOMAIN ); ?></th>
			<td>
				<input type="text" size="40" value="<?php echo is_numeric($prop['error-time'] ) ? $this->pz_Date(DATETIME_FORMAT, $prop['error-time'] ) : $prop['error-time']; ?>" readonly="readonly" />
				<input name="properties[error-time]" type="text" value="<?php echo $prop['error-time']; ?>" class="pz-ad______min-only" />
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<?php if (isset($cron_log ) ) { ?>
		<h2><?php _e('Execution Result', TEXT_DOMAIN ); ?></h2>
		<div>
			<?php _e('Execution Result', TEXT_DOMAIN ); ?>
		</div>
		<div class="pz-cron-log">
			<?php echo $cron_log; ?>
		</div>
	<?php } ?>

	<h2><?php _e('WP-Cron Information', TEXT_DOMAIN ); ?></h2>
	<div class="pz-cron-margin">
		<label>
			<input type="checkbox" value="1" class="pz-cron-all" />
			<?php _e('View all schedules.', TEXT_DOMAIN ); ?>
		</label>
	</div>
	<table class="pz-cron-list widefat striped">
		<thead>
			<tr>
				<th scope="col" class="pz-cron-head-run"><?php _e('Run', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-cron-head-hook"><?php _e('Hook', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-cron-head-next-time"><?php echo __('Next Time', TEXT_DOMAIN ).__('▼', TEXT_DOMAIN ); ?></th>
				<th scope="col" class="pz-cron-head-schedule"><?php _e('Schedule', TEXT_DOMAIN ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($cron_list as $key => $cron ) { ?>
				<tr <?php echo $cron['display']; ?>>
					<td class="pz-cron-body-run"><?php echo $cron['button']; ?></td>
					<td class="pz-cron-body-hook"><?php echo $cron['hook']; ?></td>
					<td class="pz-cron-body-next-time"><?php echo $cron['next_time']; ?></td>
					<td class="pz-cron-body-schedule"><?php echo $cron['schedule']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php submit_button(); ?>
</div>
