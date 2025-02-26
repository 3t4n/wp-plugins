<?php

register_deactivation_hook ( $ajax_read_more_cfg['id'], 'ajax_read_more_deactivation');
function ajax_read_more_deactivation() {
	global $ajax_read_more_cfg;
	unregister_setting(
		$ajax_read_more_cfg['namespace'],
		$ajax_read_more_cfg['options_id']
	);
};

register_uninstall_hook ( $ajax_read_more_cfg['id'], 'ajax_read_more_uninstall');
function ajax_read_more_uninstall() {
	global $ajax_read_more_cfg;
	delete_option(
		$ajax_read_more_cfg['options_id']
	);
};

require_once('options-script-position/options-script-position.php');

add_action ('init', 'ajax_read_more_init2');
function ajax_read_more_init2() {
	global $ajax_read_more_cfg;

	$ajax_read_more_cfg['options'] = ajax_read_more_validate_options(
		get_option($ajax_read_more_cfg['options_id'])
	);

	add_action('admin_init', 'ajax_read_more_admin_init');
	add_action('admin_menu', 'ajax_read_more_admin_menu');
};

function ajax_read_more_admin_init() {
	global $ajax_read_more_cfg;

	load_plugin_textdomain(
		$ajax_read_more_cfg['domain'],
		false,
		dirname(plugin_basename(__FILE__)) . '/languages/'
	);
	$ajax_read_more_cfg['name'] = __($ajax_read_more_cfg['name'], $ajax_read_more_cfg['domain']);

	register_setting(
		$ajax_read_more_cfg['namespace'],
		$ajax_read_more_cfg['options_id'],
		'ajax_read_more_validate_options'
	);

	add_settings_section(
		$ajax_read_more_cfg['namespace'] . '_introduction',
		__('Information', $ajax_read_more_cfg['domain']),
		'ajax_read_more_introduction',
		$ajax_read_more_cfg['options_page_id']
	);
	
	options_script_position_add_settings_section($ajax_read_more_cfg['options_page_id']);

	add_settings_section(
		$ajax_read_more_cfg['namespace'] . '_animation_options',
		__('Animation Settings', $ajax_read_more_cfg['domain']),
		'ajax_read_more_animation_options',
		$ajax_read_more_cfg['options_page_id']
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_scroll',
		__('Scroll page to the article header', $ajax_read_more_cfg['domain']),
		'ajax_read_more_scroll',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_scroll_low_bound',
		__('Low bound for scrolling', $ajax_read_more_cfg['domain']),
		'ajax_read_more_scroll_low_bound',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_loading_class',
		__('.more-link container - loading', $ajax_read_more_cfg['domain']),
		'ajax_read_more_loading_class',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_error_message',
		__('AJAX error message', $ajax_read_more_cfg['domain']),
		'ajax_read_more_error_message',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_error_class',
		__('.more-link container - error', $ajax_read_more_cfg['domain']),
		'ajax_read_more_error_class',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_animate_speed',
		__('Animation duration', $ajax_read_more_cfg['domain']),
		'ajax_read_more_animate_speed',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_scroll_to_selector',
		__('"scroll to" selector', $ajax_read_more_cfg['domain']),
		'ajax_read_more_scroll_to_selector',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
	add_settings_field(
		$ajax_read_more_cfg['namespace'] . '_parent_scrollable_el',
		__('"scrollable window" container', $ajax_read_more_cfg['domain']),
		'ajax_read_more_parent_scrollable_el',
		$ajax_read_more_cfg['options_page_id'],
		$ajax_read_more_cfg['namespace'] . '_animation_options'
	);
};

function ajax_read_more_introduction() {
	global $ajax_read_more_cfg;
	?>
	<p>
		<?php _e('Please, read about theme requirements - vizit the <a href="http://sergey-s-betke.blogs.novgaro.ru/category/web/wordpress/read-more/">Sergey S. Betke blog</a>.', $ajax_read_more_cfg['domain']); ?>
	</p>
	<?php
};

function ajax_read_more_animation_options() {
	global $ajax_read_more_cfg;
	?>
	<p>
		<?php _e('Please, select Your animation options (animation on content loading).', $ajax_read_more_cfg['domain']); ?>
	</p>
	<?php
};

function ajax_read_more_scroll() {
	global $ajax_read_more_cfg;
	?>
		<div>
			<label>
				<input
					type="radio"
					name="<?php echo $ajax_read_more_cfg['options_id'] . '[scroll]' ?>"
					value="enable"
					<?php checked( isset($ajax_read_more_cfg['options']['scroll']), false ); ?> 
				/>
				<?php _e('enabled (default and recommended)', $ajax_read_more_cfg['domain']) ?>
			</label>
		</div>
		<div>
			<label>
				<input
					type="radio"
					name="<?php echo $ajax_read_more_cfg['options_id'] . '[scroll]' ?>"
					value="disable"
					<?php checked( isset($ajax_read_more_cfg['options']['scroll']), true ); ?> 
				/>
				<?php _e('disabled', $ajax_read_more_cfg['domain']) ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_scroll_low_bound() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[scrollLowBound]' ?>"
				type="text"
				maxlength="4"
				style="width: 6em; text-align: right;"
				value="<?php echo (int)$ajax_read_more_cfg['options']['scrollLowBound']; ?>"
			/>&nbsp;px
			<br/><?php _e('Default and recommended - <strong>0</strong>. If, after loading the content of article need to be scrolled fewer pixels than shown here, the page will not be scrolled.', $ajax_read_more_cfg['domain']); ?>
		</label>
	<?php
};

function ajax_read_more_loading_class() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="loadingClassInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[loadingClass]' ?>" 
				type="text"
				style="width: 100%;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['loadingClass']) ?
					$ajax_read_more_cfg['options']['loadingClass'] :
					'loading'
				; ?>"
				onkeyup="jQuery('#loadingClassCustom').attr('checked', 'checked');"
				onchange="jQuery('#loadingClassCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('Class for the .more-link container. Is added at AJAX request`s run-time. By default - "loading".', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="loadingClassDefault"
					type="radio"
					name="loadingClassMode"
					value="default"
					<?php checked( isset($ajax_read_more_cfg['options']['loadingClass']), false ); ?>
					onclick="jQuery('#loadingClassInput').val('loading');"
				/>
				<?php _e('Default.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="loadingClassCustom"
					type="radio"
					name="loadingClassMode"
					value="custom"
					<?php checked( isset($ajax_read_more_cfg['options']['loadingClass']), true ); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_error_message() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="errorMessageInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[errorMessage]' ?>" 
				type="text"
				style="width: 100%;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['errorMessage']) ?
					$ajax_read_more_cfg['options']['errorMessage'] :
					__('Post loading error. Please, try later.', $ajax_read_more_cfg['domain'])
				; ?>"
				onkeyup="jQuery('#errorMessageCustom').attr('checked', 'checked');"
				onchange="jQuery('#errorMessageCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('Please, set custom error message for AJAX errors. Or leave this option empty - for default error message.', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="errorMessageDefault"
					name="<?php echo $ajax_read_more_cfg['options_id'] . '[errorMessageMode]' ?>" 
					type="radio"
					value="default"
					<?php checked( isset($ajax_read_more_cfg['options']['errorMessage']), false ); ?>
					onclick="jQuery('#errorMessageInput').val('<?php _e('Post loading error. Please, try later.', $ajax_read_more_cfg['domain']); ?>');"
				/>
				<?php _e('Default.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="errorMessageCustom"
					name="<?php echo $ajax_read_more_cfg['options_id'] . '[errorMessageMode]' ?>" 
					type="radio"
					value="custom"
					<?php checked( isset($ajax_read_more_cfg['options']['errorMessage']), true ); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_error_class() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="errorClassInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[errorClass]' ?>" 
				type="text"
				style="width: 100%;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['errorClass']) ?
					$ajax_read_more_cfg['options']['errorClass'] :
					'loading-error'
				; ?>"
				onkeyup="jQuery('#errorClassCustom').attr('checked', 'checked');"
				onchange="jQuery('#errorClassCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('Class for the .more-link container. Is added when AJAX request`s run-time error detected. By default - "loading-error".', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="errorClassDefault"
					type="radio"
					name="errorClassMode"
					value="default"
					<?php checked( isset($ajax_read_more_cfg['options']['errorClass']), false ); ?>
					onclick="jQuery('#errorClassInput').val('loading-error');"
				/>
				<?php _e('Default.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="errorClassCustom"
					type="radio"
					name="errorClassMode"
					value="custom"
					<?php checked( isset($ajax_read_more_cfg['options']['errorClass']), true ); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_animate_speed() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="animateSpeedInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[animateSpeed]' ?>" 
				type="text"
				style="width: 4em;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['animateSpeed']) ?
					$ajax_read_more_cfg['options']['animateSpeed'] :
					'slow'
				; ?>"
				onkeyup="jQuery('#animateSpeedCustom').attr('checked', 'checked');"
				onchange="jQuery('#animateSpeedCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('Animation duration (in ms). Or "slow", or "fast". By default - "slow".', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="animateSpeedDefault"
					type="radio"
					name="animateSpeedMode"
					value="slow"
					<?php checked( isset($ajax_read_more_cfg['options']['animateSpeed']), false ); ?>
					onclick="jQuery('#animateSpeedInput').val('slow');"
				/>
				<?php _e('slow (800 ms, <strong>by default</strong>).', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="animateSpeedFast"
					type="radio"
					name="animateSpeedMode"
					value="fast"
					<?php checked( $ajax_read_more_cfg['options']['animateSpeed'], 'fast' ); ?>
					onclick="jQuery('#animateSpeedInput').val('fast');"
				/>
				<?php _e('fast (200 ms).', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="animateSpeedCustom"
					type="radio"
					name="animateSpeedMode"
					value="custom"
					<?php checked( isset($ajax_read_more_cfg['options']['animateSpeed']) and ($ajax_read_more_cfg['options']['animateSpeed'] != 'fast'), true ); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_scroll_to_selector() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="scrollToSelectorInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[scrollToSelector]' ?>" 
				type="text"
				style="width: 100%;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['scrollToSelector']) ?
					$ajax_read_more_cfg['options']['scrollToSelector'] :
					'.entry-header'
				; ?>"
				onkeyup="jQuery('#scrollToSelectorCustom').attr('checked', 'checked');"
				onchange="jQuery('#scrollToSelectorCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('jQuery selector for element,  to which page will be scrolled. By default - ".entry-header" (to post header, <strong>check Your theme!</strong>).', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="scrollToSelectorDefault"
					type="radio"
					name="scrollToSelectorMode"
					value="header"
					<?php checked( isset($ajax_read_more_cfg['options']['scrollToSelector']), false ); ?>
					onclick="jQuery('#scrollToSelectorInput').val('.entry-header');"
				/>
				<?php _e('scroll to post header (".entry-header", <strong>by default</strong>, but check Your theme).', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="scrollToSelectorSequel"
					type="radio"
					name="scrollToSelectorMode"
					value="sequel"
					<?php checked( $ajax_read_more_cfg['options']['scrollToSelector'], '.entry-part:last' ); ?>
					onclick="jQuery('#scrollToSelectorInput').val('.entry-part:last');"
				/>
				<?php _e('scroll to post sequel (content loaded by AJAX) (".entry-part:last").', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="scrollToSelectorCustom"
					type="radio"
					name="scrollToSelectorMode"
					value="custom"
					<?php checked( 
						isset($ajax_read_more_cfg['options']['scrollToSelector'])
						and ($ajax_read_more_cfg['options']['scrollToSelector'] != '.entry-part:last')
						, true
					); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_parent_scrollable_el() {
	global $ajax_read_more_cfg;
	?>
		<label>
			<input
				id="parentScrollableElInput"
				name="<?php echo $ajax_read_more_cfg['options_id'] . '[parentScrollableEl]' ?>" 
				type="text"
				style="width: 100%;"
				value="<?php echo
					isset($ajax_read_more_cfg['options']['parentScrollableEl']) ?
					$ajax_read_more_cfg['options']['parentScrollableEl'] :
					'html,body'
				; ?>"
				onkeyup="jQuery('#parentScrollableElCustom').attr('checked', 'checked');"
				onchange="jQuery('#parentScrollableElCustom').attr('checked', 'checked');"
			/>
			<br/><?php _e('jQuery selector for parent scrollable element. By default - "html,body".', $ajax_read_more_cfg['domain']); ?>
		</label>
		<div>
			<label>
				<input
					id="parentScrollableElDefault"
					type="radio"
					name="parentScrollableElMode"
					value="body"
					<?php checked( isset($ajax_read_more_cfg['options']['parentScrollableEl']), false ); ?>
					onclick="jQuery('#parentScrollableElInput').val('html,body');"
				/>
				<?php _e('page ("html,body", <strong>by default</strong>, but check Your theme).', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
		<div>
			<label>
				<input
					id="parentScrollableElCustom"
					type="radio"
					name="parentScrollableElMode"
					value="custom"
					<?php checked( 
						isset($ajax_read_more_cfg['options']['parentScrollableEl'])
						, true
					); ?> 
				/>
				<?php _e('Custom.', $ajax_read_more_cfg['domain']); ?>
			</label>
		</div>
	<?php
};

function ajax_read_more_admin_menu() {
	global $ajax_read_more_cfg;
	add_options_page(
		$ajax_read_more_cfg['name']
		, $ajax_read_more_cfg['name']
		, 'manage_options'
		, $ajax_read_more_cfg['options_page_id']
		, 'ajax_read_more_options_page'
	);
};

function ajax_read_more_options_page() {
	global $ajax_read_more_cfg;
	global $options_script_position_cfg;
	?>
	<div class="wrap">
		<?php screen_icon('options-general'); ?>
		<h2><?php echo $ajax_read_more_cfg['name']; ?></h2>
		<form method="post" action="options.php">
			<input type="hidden" name="page_options" value="<?php
				echo implode(',', array(
					$ajax_read_more_cfg['options_id'],
					$options_script_position_cfg['options_id']
				)); 
			?>" />
			<input type="hidden" name="action" value="update" />
			<?php
				wp_nonce_field('update-options');
//				settings_fields($ajax_read_more_cfg['namespace']); // от этого варианта приходится отказаться из-за нескольких "групп" параметров
				do_settings_sections($ajax_read_more_cfg['options_page_id']);
			?>
			<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php
};

?>