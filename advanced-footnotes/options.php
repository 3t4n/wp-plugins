<?php
	function advanced_footnotes_optsmenu() {
		add_options_page(
			__('Advanced Footnotes Options', 'advanced_footnotes'),
			__('Advanced Footnotes', 'advanced_footnotes'),
			'manage_options',
			'advanced_footnotes',
			'advanced_footnotes_optionspage'
		);
	}

	function advanced_footnotes_optionspage() {
		if (!current_user_can( 'manage_options')){
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		include(plugin_dir_path( __FILE__ ).'options-page.php');
	}

	function advanced_footnotes_registersettings() {

		register_setting( 'afn_opts', 'afn_opts', 'advanced_footnotes_settings_validatefield');
		
		/// Scripts & Styling
		add_settings_section(
			'afn_files',
			'Scripts &amp; Styling',
			'advanced_footnotes_settings_section',
			'advanced_footnotes'
		);

		add_settings_field(
			'include_css',
			__('Include Plugin CSS'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_files',
			array(
				'type'      => 'check',
				'id'        => 'include_css',
				'name'      => 'include_css',
				'desc'      => __('Check this to include the plugin CSS file.'),
				'std'       => '',
				'label_for' => 'include_css',
				'class'     => '',
			)
		);

		add_settings_field(
			'customcss',
			__('Custom CSS'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_files',
			array(
				'type'      => 'textarea',
				'id'        => 'customcss',
				'name'      => 'customcss',
				'desc'      => __('Use this field to use additional CSS styling on the plugin (see documentation for used classes).'),
				'std'       => '',
				'label_for' => 'customcss',
				'class'     => '',
			)
		);

		add_settings_field(
			'include_js',
			__('Include Plugin JS'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_files',
			array(
				'type'      => 'check',
				'id'        => 'include_js',
				'name'      => 'include_js',
				'desc'      => __('Check this to include the plugin javascript file.'),
				'std'       => '',
				'label_for' => 'include_js',
				'class'     => '',
				'enable'	=> 'var_disablejsopts,var_scrollgap,var_scrollspeed'
			)
		);

		/// Text Variables
		add_settings_section(
			'afn_strings',
			'Strings & Variables',
			'advanced_footnotes_settings_section',
			'advanced_footnotes'
		);

		add_settings_field(
			'var_reftitle',
			__('Default Title for Footnotes'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_strings',
			array(
				'type'      => 'text',
				'id'        => 'var_reftitle',
				'name'      => 'var_reftitle',
				'desc'      => __('Default title used in the footnotes shortcut.'),
				'std'       => '',
				'label_for' => 'var_reftitle',
				'class'     => '',
				'default'	=> __('References'),
			)
		);

		add_settings_field(
			'var_footnotesymbol',
			__('Footnote Symbol'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_strings',
			array(
				'type'      => 'text',
				'id'        => 'var_footnotesymbol',
				'name'      => 'var_footnotesymbol',
				'desc'      => __('Symbol used for non-numeric footnotes.'),
				'std'       => '',
				'label_for' => 'var_footnotesymbol',
				'class'     => '',
				'default'	=> '*',
			)
		);

		add_settings_field(
			'var_disablejsopts',
			__('Disable JS Options'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_strings',
			array(
				'type'      		=> 	'check',
				'id'        		=> 	'var_disablejsopts',
				'name'      		=> 	'var_disablejsopts',
				'desc'      		=> 	__('Use this to disable altering the theme\'s javascript options (options below).<br>Recommended if you want to set plugin options through your theme\'s javascript code.<br>Note: Plugin JS must be enabled for this feature to work.'),
				'std'       		=> 	'',
				'label_for' 		=> 	'var_disablejsopts',
				'class'     		=> 	'',
				'disable'	=> 'var_scrollgap,var_scrollspeed'
			)
		);

		add_settings_field(
			'var_scrollgap',
			__('Footnotes Scroll Gap'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_strings',
			array(
				'type'      => 'number',
				'id'        => 'var_scrollgap',
				'name'      => 'var_scrollgap',
				'desc'      => __('Use this if you have a fixed component on top of the viewport of your site. This can be dynamically set (see documentation).<br>Note: Plugin JS must be enabled for this feature to work.'),
				'std'       => '',
				'label_for' => 'var_scrollgap',
				'class'     => '',
				'default'	=> 0,
			)
		);

		add_settings_field(
			'var_scrollspeed',
			__('Footnotes Scroll Speed'),
			'advanced_footnotes_settings_showfield',
			'advanced_footnotes',
			'afn_strings',
			array(
				'type'      => 'number',
				'id'        => 'var_scrollspeed',
				'name'      => 'var_scrollspeed',
				'desc'      => __('Adjusts the scroll animation speed when a footnote is clicked. (0 For no animation)<br>Note: Plugin JS must be enabled for this feature to work.'),
				'std'       => '',
				'label_for' => 'var_scrollspeed',
				'class'     => '',
				'default'	=> 350,
			)
		);
	}

	function advanced_footnotes_settings_section(){}
	function advanced_footnotes_settings_showfield($args){
		extract( $args );
		$option_name = 'afn_opts';
	
		$options = get_option( $option_name );

		$option_value = $options[$id];

		if(
			($type != 'check') &&
			(
				!$default ||
				$default === 0
			) &&
			(
				$options[$id] === "" ||
				$options[$id] === null
			)
		){
			$option_value = $default;
		}
	
		switch ( $type ) {  
			case 'text': 
				if(isset($options[$id]))
				{ 
				  $options[$id] = stripslashes($options[$id]);  
				  $options[$id] = esc_attr( $options[$id]); 
				}else{ $options[$id] = ""; }
				  echo "<input class='regular-text $class' type='text' id='$id' name='" . $option_name . "[$id]' value='$option_value' />";  
				  echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
			break;
			case 'textarea': 
				if(isset($options[$id]))
				{ 
				  $options[$id] = stripslashes($options[$id]);  
				  $options[$id] = esc_attr( $options[$id]); 
				}else{ $options[$id] = ""; }
				  echo "<textarea class='regular-text $class' cols='44' rows='5' id='$id' name='" . $option_name . "[$id]'>$option_value</textarea>";  
				  echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
			break;    
			case 'number':  
			  	if(isset($options[$id]) && is_numeric($options[$id]))
				{
				  $options[$id] = stripslashes($options[$id]);  
				  $options[$id] = esc_attr( $options[$id]);  
				}else{ $options[$id] = "0"; }
				echo "<input class='regular-text $class' type='number' id='$id' name='" . $option_name . "[$id]' value='$option_value' />";  
				echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
			break; 
			case 'check':  
			  	if(isset($options[$id]))
				{
				  $options[$id] = true;
				}else{ $options[$id] = false; }
				$toggle = "";
				if(isset($disable)){
					$toggle .= ' toggle-disable="'.$disable.'"';
				}
				if(isset($enable)){
					$toggle .= ' toggle-enable="'.$enable.'"';
				}

				$checked = ""; if($options[$id]){$checked = " checked='checked'";}
				echo "<input class='$class' type='checkbox' id='$id' name='" . $option_name . "[$id]'".$checked.$toggle."  />";  
				echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
			break; 
		}
	}
	function advanced_footnotes_settings_validatefield($input){
		$newinput = array();
		if(isset($input)){
			foreach($input as $k => $v)
			{
				$repl = "text";
				
				switch($repl)
				{
					case "address": $newinput[$k] = str_replace('"',"'",trim($v)); break;
					case "number":
						if(is_numeric($v)){ $newinput[$k] = $v; }
						else{ $newinput[$k] = "0"; }
					break;
					default:
						$newinput[$k] = strip_tags(str_replace('"',"'",trim($v))); break;
						//$newinput[$k] = trim($v);if(!preg_match('/[^\p{L}\p{N} _]/i', $v)) { $newinput[$k] = ''; }
					break;
				}
				
			}
		}
		return $newinput;
	}

	if (is_admin()){
		add_action( 'admin_menu', 'advanced_footnotes_optsmenu' );
		add_action( 'admin_init', 'advanced_footnotes_registersettings' );
	}
?>