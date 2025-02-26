<?php

define('AWAR_ENQUEUE_CACHE', '1.3'); // file suffix
define('AWAR_ENQUEUE_DEV_MODE', true); // expect css/js to be minified

function awar_sanitize_resource($in) {
	$out = $in;
	$out = str_replace('.css', '', $out);
	$out = str_replace('.js', '', $out);
	$out = str_replace('/', '-', $out);
	$out = str_replace('.', '-', $out);
	$out = str_replace('_', '-', $out);

	return 'awar-auto-' . sanitize_file_name($out);
}

function awar_auto_enqueue($file_type, $arr) {
	if ($file_type == 'css') {
		foreach ($arr as $path) {
			$name = awar_sanitize_resource($path);
			wp_enqueue_style( $name, plugin_dir_url( __FILE__ ) . $path, [], AWAR_ENQUEUE_CACHE );
		}
	} else {
		foreach ($arr as $path) {
			$name = awar_sanitize_resource($path);
			wp_enqueue_script( $name, plugin_dir_url( __FILE__ ) . $path, NULL, AWAR_ENQUEUE_CACHE, true );
		}
	}
}

// database helper

function awar_database_default_values($configuration) {
    $awar_database_default_values = [];

    foreach (AWAR_DB_CONFIGURATION as $default => $description) {
        $options_and_names = explode(' ', $default);

        $options = array_filter($options_and_names, function ($in) {
            return $in[0] == '@';
        });
        
        $name = array_values(
            array_filter($options_and_names, function ($in) { 
                return $in[0] != '@'; 
            })
        )[0];

        array_push($awar_database_default_values, $name);
        $awar_database_default_values[$name] = $description;
    }

	return $awar_database_default_values;
}

function awar_settings($operation) {
    $awar_db_default_values = awar_database_default_values(AWAR_DB_CONFIGURATION);

	foreach ($awar_db_default_values as $option => $value) {
		if ($operation == "delete") {
			delete_option($option, $value);
		} else if ($operation == "update") {
			update_option($option, $value);
		} else if ($operation == 'add') {
			add_option($option, $value);
		} else {
			echo('ERROR: Use only "delete", "update" or "add" for awar_settings($operation)');
		}
	}
}


function awar_admin_menu_register_settings() {
	foreach (AWAR_DB_ADMIN_MENU as $id => $config) {
		register_setting('awar-number-group', $id );
	}
}

function awar_admin_menu_print_headlines() {
	if (isset(AWAR_DB_ADMIN_MENU['@headlines'][0])) {
		echo '<h1>' . AWAR_DB_ADMIN_MENU['@headlines'][0] . '</h1>';
	}
	if (isset(AWAR_DB_ADMIN_MENU['@headlines'][1])) {
		echo '<p>' . AWAR_DB_ADMIN_MENU['@headlines'][1] . '</p>';
	}
}

function awar_admin_menu_print_options() {
	foreach (AWAR_DB_ADMIN_MENU as $id => $config): ?>
		<tr class="awar-translations">
			<td scope="row">
				<?php if (isset($config['title'])) echo '<label>' . $config['title'] . '</label>'?>
				<?php if ($config['type'] == 'text-field'): ?>
					<input 
						type="text"
						class="<?php echo $id ?>" 
						name="<?php echo $id ?>"
						value="<?php echo get_option($id) ?>"
					/>
				<?php endif ?>
				<?php if ($config['type'] == 'color-picker'): ?>
					<input 
						type="text" 
						class="<?php echo $config['js-target-class'] ?>" 
						name="<?php echo $id ?>"
						value="<?php echo get_option($id) ?>"
					/>
				<?php endif ?>
				<?php if ($config['type'] == 'option'): ?>
					<br><?php // for labels ?>
					<?php foreach ($config['options'] as $option): ?>
						<input type="radio" name="<?php echo $id ?>" value="<?php echo $option ?>"
						<?php echo get_option($id) == $option ? 'checked' : '' ?> /> <?php echo $option ?> <br>
					<?php endforeach ?>
				<?php endif ?>
			</td>
		</tr>
	<?php endforeach;
}