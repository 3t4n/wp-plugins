<?php
	
	$tabsData = array(
		'general_settings' => __( 'General Settings', 'landz' ),
		'internal_structure' => __( 'Internal Structure', 'landz' ),
		'property_details' => __( 'Property Details', 'landz' ),
		'property_video' => __( 'Video', 'landz' ),
	);

	$inputFields = array(

		array(
			'key' => 'property_price',
			'type' => 'number',
			'tab' => 'general_settings',
			'default' => '2000',
			'title' => __( 'Price', 'landz' ),
			'help' => __( 'Price of property', 'landz' ),
		),

		array(
			'key' => 'property_area',
			'type' => 'number',
			'tab' => 'general_settings',
			'default' => '200',
			'title' => __( 'Area', 'landz' ),
			'help' => __( 'Area of property (in Square Foot)', 'landz' ),
		),

		array(
			'key' => 'property_type',
			'type' => 'select',
			'tab' => 'general_settings',
			'default' => 'duplex',
			'title' => __( 'Property Type', 'landz' ),
			'help' => __( 'Type of Property', 'landz' ),
			'options' 	=> $this->get_all_property_types(),
		),

		array(
			'key' => 'property_address',
			'type' => 'text',
			'tab' => 'general_settings',
			'default' => 'Some Area, City',
			'title' => __( 'Address', 'landz' ),
			'help' => __( 'Address of property', 'landz' ),
		),

		array(
			'key' => 'property_latitude',
			'type' => 'text',
			'tab' => 'general_settings',
			'default' => '',
			'title' => __( 'Latitude', 'landz' ),
			'help' => __( 'Latitude of property, will use for map', 'landz' ),
		),

		array(
			'key' => 'property_longitude',
			'type' => 'text',
			'tab' => 'general_settings',
			'default' => '',
			'title' => __( 'Longitude', 'landz' ),
			'help' => __( 'Longitude of property, will use for map', 'landz' ),
		),

		array(
			'key' => 'property_city',
			'type' => 'text',
			'tab' => 'general_settings',
			'default' => '',
			'title' => __( 'City', 'landz' ),
			'help' => __( 'City Name of property', 'landz' ),
		),

		array(
			'key' => 'property_country',
			'type' => 'text',
			'tab' => 'general_settings',
			'default' => 'China',
			'title' => __( 'Country', 'landz' ),
			'help' => __( 'Country of property', 'landz' ),
		),

		array(
			'key' => 'property_purpose',
			'type' => 'select',
			'tab' => 'general_settings',
			'default' => '2000',
			'title' => __( 'Purpose', 'landz' ),
			'help' => __( 'Purpose of property', 'landz' ),
			'options' 	=> $this->get_all_property_purpose(),
		),

		array(
			'key' => 'property_status',
			'type' => 'select',
			'tab' => 'general_settings',
			'default' => 'normal',
			'title' => __( 'Status', 'landz' ),
			'help' => __( 'Status of property', 'landz' ),
			'options' 	=> $this->get_all_property_status(),
		),

		array(
			'key' => 'property_bedrooms',
			'type' => 'number',
			'tab' => 'internal_structure',
			'default' => '',
			'title' => __( 'Bedrooms', 'landz' ),
			'help' => __( 'Number of bedrooms', 'landz' ),
		),

		array(
			'key' => 'property_bathrooms',
			'type' => 'number',
			'tab' => 'internal_structure',
			'default' => '',
			'title' => __( 'Bathrooms', 'landz' ),
			'help' => __( 'Number of bathrooms', 'landz' ),
		),

		array(
			'key' => 'property_video',
			'type' => 'text',
			'tab' => 'property_video',
			'default' => '',
			'title' => __( 'Video URL', 'landz' ),
			'help' => __( 'Provide video URL', 'landz' ),
		),

	);

	$property_individual_cbs = $this->get_all_property_features();

	foreach ($property_individual_cbs as $cb) {
		$field_option = array(
			'key' => (str_replace(' ', '_', strtolower($cb))),
			'type' => 'checkbox',
			'tab' => 'property_details',
			'default' => '',
			'title' => __( $cb, 'landz' ),
			'help' => __( 'Check if property have this option', 'landz' ),
		);
		$inputFields[] = $field_option;
	}

    if(has_filter('landz_property_settings_fields')) {
        $inputFields = apply_filters('landz_property_settings_fields', $inputFields);
    }	

	function rem_render_field($field){
		global $post;
		$saved_value = get_post_meta( $post->ID, 'rem_'.$field['key'], true );

		$value = ($saved_value != '') ? $saved_value : $field['default'] ;

		if ($field['type'] == 'text' || $field['type'] == 'number') {

			echo '<input class="widefat" type="'.$field['type'].'" name="rem_property_data['.$field['key'].']" value="'.$value.'">';

		} elseif ($field['type'] == 'select') { ?>
			<select name="rem_property_data[<?php echo $field['key']; ?>]" class="widefat">
				<?php
					foreach ($field['options'] as $val => $name) {
						echo '<option value="'.$val.'" '.selected( $value, $val, false ).'>'.$name.'</option>';
					}
				?>
			</select>
		<?php } elseif ($field['type'] == 'widget') { ?>
			<select name="rem_property_data[<?php echo $field['key']; ?>]" class="widefat">
				<?php
					foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
						echo '<option value="'.$sidebar['id'].'" '.selected( $saved_m[$field['key']], $sidebar['id'], true ).'>'.$sidebar['name'].'</option>';
					}
				?>
			</select>
		<?php } elseif ($field['type'] == 'checkbox') {

			$saved_value = get_post_meta( $post->ID, 'rem_property_detail_cbs', true );
			$value = (isset($saved_value[$field['key']])) ? $saved_value[$field['key']] : $field['default'] ;

			echo '<input class="widefat" type="'.$field['type'].'" name="rem_property_data[property_detail_cbs]['.$field['key'].']" value="on" '.checked( $value, 'on', false).'>';
		}
	}
?>