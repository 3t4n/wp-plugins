<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly




// Create admin settings page and settings fields
add_action( 'admin_menu', 'apspider_plugin_settings_page' );


//Create Admin Page
function apspider_plugin_settings_page()
{
	$page_title = esc_html__( 'Admin Page Spider' , 'admin-page-spider' );
	$menu_title = esc_html__( 'Admin Page Spider Free' , 'admin-page-spider' );
	$capability = 'manage_options';
	$slug = 'apspider_fields';
	$callback = 'apspider_plugin_settings_page_content';
	add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $slug, $callback);
}


// Create the layout of the settings page
function apspider_plugin_settings_page_content() {
  ?>
  <style type="text/css">form h2 {	background-color: lightblue ; padding: 20px} </style>
  <div class="wrap" style="width: 60%;">
      <h1><?php echo esc_html__('Admin Page Spider FREE'); ?></h1>
      <form method="post" action="options.php">
          <?php
          settings_fields('apspider_fields');
          do_settings_sections('apspider_fields');
          submit_button();
          ?>
      </form>

      <div style="padding: 30px; background-color: lightblue; margin: 50px 0; text-align: center;">
          <h1><span style="color: purple; font-weight:bold;">Heard about Admin Page Spider Pro?</span></h1>
          <br>
          <h3><?php echo esc_html__('Click below to learn about how it can save you more time'); ?></h3>
          <br/>
          <a target="_blank" href="https://adminpagespider.com/?ref=wpplugin" style="text-decoration: none;"><h3
                      style="background-color: darkslateblue; color: white; max-width: 300px; text-decoration: none; margin: auto; padding: 10px 20px; border-radius: 50px;"><?php echo esc_html__('Learn More'); ?></h3></a>
      </div>

  </div>
  <?php
}


//Run the setup fields after the section has been created
		add_action( 'admin_init', 'apspider_setup_fields' );






// Create a 'section' for the settings page (Called by each post type)
		function apspider_setup_sections($section_id, $section_title, $section_callback)
		{
			require_once( ABSPATH . 'wp-admin/includes/template.php' );
			add_settings_section( $section_id, $section_title, $section_callback, 'apspider_fields' );

		}


		function apspider_sanitize_field( $input ) {
			// If $input is an array, sanitize each element recursively
			if ( is_array( $input ) ) {
		
					foreach ( $input as $key => $value ) {
							$input[ $key ] = apspider_sanitize_field( $value );
					}
					return $input;
			}
		
			// For checkboxes, return '1' if checked, otherwise ''
			if ( is_bool( $input ) ) {
							
							return $input ? '1' : '0';
						}
		
						
			// For text fields and other input types, sanitize with WordPress sanitize_text_field function
			return sanitize_text_field( $input );
		}
		
		

// Callback for a list of 'settings' for the sections
		function apspider_setup_fields()
		{
			global $fields;
			include_once('apspider-adminfieldsarray.php');

		// Cycle through the settings, create the field and register the setting
			foreach( $fields as $field ){
				add_settings_field( $field['uid'], $field['label'], 'apspider_field_callback', 'apspider_fields', $field['section'], $field );
				register_setting( 'apspider_fields', $field['uid'], 'apspider_sanitize_field');


				$uid = $field['uid'];
				$value = get_option($uid);
				if ( $value === false){
					update_option($field['uid'], $field['default']);
				}
			}
		}

// Callback to handle each scenario of each settings field created and passed to it.
		function apspider_field_callback( $arguments )
		{
			$value = get_option( $arguments['uid'] );

			if( ! $value ) {
				$value = $arguments['default'];
			}

			if ( ! empty ( $arguments['placeholder'] )){
				$placeholder = esc_attr($arguments['placeholder']);
			} else {
				$placeholder = false ;
			}

			printf('<div style="background-color: #DFDFDF; padding: 5px;">');


			switch( $arguments['type'] ){
				case 'text':
					printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', esc_attr($arguments['uid']), esc_attr($arguments['type']), esc_attr($placeholder), esc_attr($value) );
					break;
				case 'password':
				//
					break;
				case 'number':
					//
					break;
				case 'textarea':
					printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', esc_attr($arguments['uid']), esc_attr($placeholder), esc_attr($value) );
					break;
				case 'select':
					break;
				case 'multiselect':
					break;
				case 'radio':
				case 'checkbox':
				if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
					$options_markup = '';
					$iterator = 0;
					foreach( $arguments['options'] as $key => $label ){
						$iterator++;
						$options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', esc_attr($arguments['uid']), esc_attr($arguments['type']), esc_attr($key), checked( $value[ array_search( $key, $value, true ) ], $key, false ), esc_attr($label), $iterator );
					}

					$allowed_html = array(
						'fieldset' => array(),
						'legend' => array(),
						'p' => array(),
						'br' => array(),
						'label' => array(
							'for' => array(),
						),
						'form' => array(
								'action' => array(),
								'method' => array(),
								'id' => array(),
								'name' => array(),
						),
						'input' => array(
								'type' => array(),
								'name' => array(),
								'value' => array(),
								'id' => array(),
								'class' => array(),
								'placeholder' => array(),
								'checked' => array(),
								'disabled' => array(),
								'readonly' => array(),
								'required' => array(),
						),
						'textarea' => array(
								'name' => array(),
								'id' => array(),
								'class' => array(),
								'placeholder' => array(),
								'cols' => array(),
								'rows' => array(),
								'readonly' => array(),
								'disabled' => array(),
								'required' => array(),
						),
						'select' => array(
								'name' => array(),
								'id' => array(),
								'class' => array(),
								'disabled' => array(),
								'required' => array(),
						),
						'option' => array(
								'value' => array(),
								'selected' => array(),
								'disabled' => array(),
						),
						// Add other allowed tags and attributes here as needed
				);

					printf( '<fieldset>%s</fieldset>', wp_kses($options_markup, $allowed_html ));
					// printf( '<fieldset>%s</fieldset>', $options_markup);
				}

				break;
			}

			if( ! empty ( $arguments['helper'] )) {
				printf( '<span class="helper"> %s</span>', esc_attr($arguments['helper']) );
			}

		// Add a supplemental text field if you ever want to display an additional field
			if( ! empty ( $arguments['supplemental'] )) {
				printf( '<p class="description">%s</p>', esc_attr($arguments['supplemental'] ));
			}

			printf('</div>');

		}

