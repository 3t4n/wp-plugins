<?php 

add_action( 'admin_init', 'aw_schema_settings_api_init');

function aw_schema_settings_api_init() {
	$settings_group = 'aw-schema';
	$basic_settings_section = "aw-basic-settings";
	$geo_settings_section = "aw-geo-settings";

	/* ------------------------- Create the basic settings section and fields ------------------------- */

	add_settings_section(
		$basic_settings_section,
		'Basic Info',
		'aw_schema_basic_settings_callback_function',
		$settings_group
	);

	/* Enabled */	
/*
	add_settings_field('aw_schema_setting_enabled', 'Schema Enabled', 'aw_schema_setting_enabled_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_enabled' );
*/

	/* ID */	
	add_settings_field('aw_schema_setting_id', 'Business ID', 'aw_schema_setting_id_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_id', 'sanitize_and_validate_text' );

	/* Name */	
	add_settings_field('aw_schema_setting_name', 'Business Name', 'aw_schema_setting_name_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_name', 'sanitize_and_validate_text' );

	/* Description */	
	add_settings_field('aw_schema_setting_description', 'Description', 'aw_schema_setting_description_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_description', 'sanitize_and_validate_text' );

	/* Address */	
	add_settings_field('aw_schema_setting_address', 'Address', 'aw_schema_setting_address_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_address', 'sanitize_and_validate_text' );

	/* City */	
	add_settings_field('aw_schema_setting_city', 'City', 'aw_schema_setting_city_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_city', 'sanitize_and_validate_text' );

	/* State */	
	add_settings_field('aw_schema_setting_state', 'State', 'aw_schema_setting_state_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_state', 'sanitize_and_validate_state' );

	/* Zip */	
	add_settings_field('aw_schema_setting_zip', 'Zip', 'aw_schema_setting_zip_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_zip', 'sanitize_and_validate_zip' );

	/* Country */	
	add_settings_field('aw_schema_setting_country', 'Country', 'aw_schema_setting_country_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_country', 'sanitize_and_validate_country' );

	/* Telephone */	
	add_settings_field('aw_schema_setting_phone', 'Telephone', 'aw_schema_setting_phone_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_phone', 'sanitize_and_validate_text' );

	/* Logo */	
	add_settings_field('aw_schema_setting_logo', 'Logo URL', 'aw_schema_setting_logo_callback_function', $settings_group, $basic_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_logo', 'sanitize_and_validate_url' );


	/* ------------------------- Create the social media settings section and fields ------------------------- */

	add_settings_section(
		$social_settings_section,
		'Social Media Info',
		'aw_schema_social_settings_callback_function',
		$settings_group
	);

	/* Twitter */	
	add_settings_field('aw_schema_setting_twitter', 'Twitter URL', 'aw_schema_setting_twitter_callback_function', $settings_group, $social_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_twitter', 'sanitize_and_validate_url' );

	/* Facebook */	
	add_settings_field('aw_schema_setting_facebook', 'Facebook URL', 'aw_schema_setting_facebook_callback_function', $settings_group, $social_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_facebook', 'sanitize_and_validate_url' );

	/* LinkedIn */	
	add_settings_field('aw_schema_setting_linkedin', 'LinkedIn URL', 'aw_schema_setting_linkedin_callback_function', $settings_group, $social_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_linkedin', 'sanitize_and_validate_url' );

	/* Google+ */	
	add_settings_field('aw_schema_setting_googleplus', 'Google+ URL', 'aw_schema_setting_googleplus_callback_function', $settings_group, $social_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_googleplus', 'sanitize_and_validate_url' );

	/* Instagram */	
	add_settings_field('aw_schema_setting_instagram', 'Instagram URL', 'aw_schema_setting_instagram_callback_function', $settings_group, $social_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_instagram', 'sanitize_and_validate_url' );


	/* ------------------------- Create the geo settings section and fields ------------------------- */

	add_settings_section(
		$geo_settings_section,
		'Geo-Location Info',
		'aw_schema_geo_settings_callback_function',
		$settings_group
	);

	/* Longitude */	
	add_settings_field('aw_schema_setting_longitude', 'Longitude', 'aw_schema_setting_longitude_callback_function', $settings_group, $geo_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_longitude', 'sanitize_and_validate_longitude' );

	/* Latitude */	
	add_settings_field('aw_schema_setting_latitude', 'Latitude', 'aw_schema_setting_latitude_callback_function', $settings_group, $geo_settings_section);
	register_setting( $settings_group, 'aw_schema_setting_latitude', 'sanitize_and_validate_latitude' );


	/* ------------------------- Load the admin form style ------------------------- */

	wp_register_style( 'aw-schema-style', plugins_url('/style.css', __FILE__));
	wp_enqueue_style( 'aw-schema-style');

	wp_register_script( 'aw-schema-script', plugins_url('/aw-schema.js', __FILE__ ));
	wp_enqueue_script( 'aw-schema-script' );

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' ); 
}


/* ------------------------- Create the call back functions to output the fields' HTML ------------------------- */

function aw_schema_basic_settings_callback_function() {
	echo '<p>This area defines business information that will be added to page schema for SEO</p>';
	echo '<p>Test your site here: <a href="https://developers.google.com/structured-data/testing-tool/?url=' . urlencode_deep(site_url()) . '" >https://developers.google.com/structured-data/testing-tool/?url=' . urlencode_deep(site_url()) . '</a></p>';
}

/*
function aw_schema_setting_enabled_callback_function() {
	echo '<input type="checkbox" name="aw_schema_setting_enabled" id="aw_schema_setting_enabled" class="code" value="true" ' . checked( get_option('aw_schema_setting_enabled'), true, false) . ' />';
}
*/

function aw_schema_setting_id_callback_function() {

	$GUID_value = get_option('aw_schema_setting_id');
	$new_GUID = false;

	if($GUID_value == "") {
		if (function_exists('com_create_guid') === true) {
			$GUID_value = trim(com_create_guid(), '{}');
		} else {
			$GUID_value = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
		}

		$new_GUID - true;
	}

	echo '<input name="aw_schema_setting_id" id="aw_schema_setting_id" class="code aw_schema_setting_large_text_input" type="text" placeholder="acme-inc-springfield-555-123-4567" value="' . $GUID_value . '" /><br />';
	echo '<p class="description">A static, unique ID representing an individual business location. Once the site is live, avoid changing to prevent losing gains from previous SEO efforts.</p>';
}

function aw_schema_setting_name_callback_function() {
	echo '<input name="aw_schema_setting_name" id="aw_schema_setting_name" class="code aw_schema_setting_large_text_input" type="text" placeholder="Big Green Statue, Inc." value="' . get_option('aw_schema_setting_name') . '" />';
}

function aw_schema_setting_description_callback_function() {
	echo '<input name="aw_schema_setting_description" id="aw_schema_setting_description" class="code aw_schema_setting_large_text_input" type="text" placeholder="Welcoming your tired, your poor, and your huddled masses since 1886." value="' . get_option('aw_schema_setting_description') . '" />';
}

function aw_schema_setting_address_callback_function() {
	echo '<input name="aw_schema_setting_address" id="aw_schema_setting_address" class="code aw_schema_setting_large_text_input" type="text" placeholder="Statue of Liberty National Monument" value="' . get_option('aw_schema_setting_address') . '" />';
}

function aw_schema_setting_city_callback_function() {
	echo '<input name="aw_schema_setting_city" id="aw_schema_setting_city" class="code aw_schema_setting_large_text_input" type="text" placeholder="New York" value="' . get_option('aw_schema_setting_city') . '" />';
}

function aw_schema_setting_state_callback_function() {
	echo '<select name="aw_schema_setting_state" id="aw_schema_setting_state" class="code aw_schema_setting_medium_text_input ">' .
	'<option ' . selected( get_option('aw_schema_setting_state'), '', false) . ' value=""></option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'AL', false) . ' value="AL">Alabama</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'AK', false) . ' value="AK">Alaska</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'AZ', false) . ' value="AZ">Arizona</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'AR', false) . ' value="AR">Arkansas</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'CA', false) . ' value="CA">California</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'CO', false) . ' value="CO">Colorado</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'CT', false) . ' value="CT">Connecticut</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'DE', false) . ' value="DE">Delaware</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'DC', false) . ' value="DC">District Of Columbia</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'FL', false) . ' value="FL">Florida</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'GA', false) . ' value="GA">Georgia</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'HI', false) . ' value="HI">Hawaii</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'ID', false) . ' value="ID">Idaho</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'IL', false) . ' value="IL">Illinois</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'IN', false) . ' value="IN">Indiana</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'IA', false) . ' value="IA">Iowa</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'KS', false) . ' value="KS">Kansas</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'KY', false) . ' value="KY">Kentucky</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'LA', false) . ' value="LA">Louisiana</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'ME', false) . ' value="ME">Maine</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MD', false) . ' value="MD">Maryland</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MA', false) . ' value="MA">Massachusetts</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MI', false) . ' value="MI">Michigan</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MN', false) . ' value="MN">Minnesota</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MS', false) . ' value="MS">Mississippi</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MO', false) . ' value="MO">Missouri</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'MT', false) . ' value="MT">Montana</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NE', false) . ' value="NE">Nebraska</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NV', false) . ' value="NV">Nevada</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NH', false) . ' value="NH">New Hampshire</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NJ', false) . ' value="NJ">New Jersey</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NM', false) . ' value="NM">New Mexico</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NY', false) . ' value="NY">New York</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'NC', false) . ' value="NC">North Carolina</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'ND', false) . ' value="ND">North Dakota</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'OH', false) . ' value="OH">Ohio</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'OK', false) . ' value="OK">Oklahoma</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'OR', false) . ' value="OR">Oregon</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'PA', false) . ' value="PA">Pennsylvania</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'RI', false) . ' value="RI">Rhode Island</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'SC', false) . ' value="SC">South Carolina</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'SD', false) . ' value="SD">South Dakota</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'TN', false) . ' value="TN">Tennessee</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'TX', false) . ' value="TX">Texas</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'UT', false) . ' value="UT">Utah</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'VT', false) . ' value="VT">Vermont</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'VA', false) . ' value="VA">Virginia</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'WA', false) . ' value="WA">Washington</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'WV', false) . ' value="WV">West Virginia</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'WI', false) . ' value="WI">Wisconsin</option>' .
	'<option ' . selected( get_option('aw_schema_setting_state'), 'WY', false) . ' value="WY">Wyoming</option>' .
	'</select>';
}

function aw_schema_setting_zip_callback_function() {
	echo '<input name="aw_schema_setting_zip" id="aw_schema_setting_zip" class="code aw_schema_setting_small_text_input" type="text" placeholder="10004" value="' . get_option('aw_schema_setting_zip') . '" />';
}

function aw_schema_setting_country_callback_function() {
	echo '<select name="aw_schema_setting_country" id="aw_schema_setting_country" class="code aw_schema_setting_medium_text_input">' .
	'<option ' . selected( get_option('aw_schema_setting_country'), '', false) . ' value=""></option>' .
	'<option ' . selected( get_option('aw_schema_setting_country'), 'US', false) . ' value="US">USA</option>' .
	'</select>';
}

function aw_schema_setting_phone_callback_function() {
	echo '<input name="aw_schema_setting_phone" id="aw_schema_setting_phone" class="code aw_schema_setting_medium_text_input" type="text" placeholder="555-123-4567" value="' . get_option('aw_schema_setting_phone') . '" />';
}



function aw_schema_social_settings_callback_function() {
	echo '<p>This area defines the social media URLs that should be associated with this business</p>';
}

function aw_schema_setting_twitter_callback_function() {
	echo '<input name="aw_schema_setting_twitter" id="aw_schema_setting_twitter" class="code aw_schema_setting_xl_text_input" type="text" placeholder="" value="' . get_option('aw_schema_setting_twitter') . '" />';
}

function aw_schema_setting_facebook_callback_function() {
	echo '<input name="aw_schema_setting_facebook" id="aw_schema_setting_facebook" class="code aw_schema_setting_xl_text_input" type="text" placeholder="" value="' . get_option('aw_schema_setting_facebook') . '" />';
}

function aw_schema_setting_linkedin_callback_function() {
	echo '<input name="aw_schema_setting_linkedin" id="aw_schema_setting_linkedin" class="code aw_schema_setting_xl_text_input" type="text" placeholder="" value="' . get_option('aw_schema_setting_linkedin') . '" />';
}

function aw_schema_setting_googleplus_callback_function() {
	echo '<input name="aw_schema_setting_googleplus" id="aw_schema_setting_googleplus" class="code aw_schema_setting_xl_text_input" type="text" placeholder="" value="' . get_option('aw_schema_setting_googleplus') . '" />';
}

function aw_schema_setting_instagram_callback_function() {
	echo '<input name="aw_schema_setting_instagram" id="aw_schema_setting_instagram" class="code aw_schema_setting_xl_text_input" type="text" placeholder="" value="' . get_option('aw_schema_setting_instagram') . '" />';
}



function aw_schema_geo_settings_callback_function() {
	echo '<p>This area defines the map coordinates for the business location</p>';
}

function aw_schema_setting_longitude_callback_function() {
	echo '<input name="aw_schema_setting_longitude" id="aw_schema_setting_longitude" class="code aw_schema_setting_medium_text_input" type="text" placeholder="-74.044502" value="' . get_option('aw_schema_setting_longitude') . '" />';
	echo '<p class="description">The decimal representation of longitude.  It is recommended that at least six decimal places are used.</p>';
}

function aw_schema_setting_latitude_callback_function() {
	echo '<input name="aw_schema_setting_latitude" id="aw_schema_setting_latitude" class="code aw_schema_setting_medium_text_input" type="text" placeholder="40.689247" value="' . get_option('aw_schema_setting_latitude') . '" />';
	echo '<p class="description">The decimal representation of latitude.  It is recommended that at least six decimal places are used.</p>';
}

function aw_schema_setting_logo_callback_function() {
	echo '<input type="text" name="aw_schema_setting_logo" id="aw_schema_setting_logo" class="code aw_schema_setting_xl_text_input" value="' . esc_attr( get_option('aw_schema_setting_logo')) . '" />';
	echo '<a class="button" onclick="upload_image(\'aw_schema_setting_logo\');">Browse Media</a>';
}

/* ------------------------- User input validation and sanitizing ------------------------- */

function sanitize_and_validate_text($option, $required = false) {
	if($option == "") {return "";}
	$option = sanitize_text_field($option);
	return $option;
}

function sanitize_and_validate_zip($option, $required = false) {
	if($option == "") {return "";}
	$validated = sanitize_text_field( $option );
	if ($validated !== $option || !preg_match('/^\d{5}(?:[-\s]\d{4})?$/', $option)) {
		$type = 'error';
		$message = __( 'Zip Code was invalid - Use format "12345" or "12345-6789")', 'aw-schema' );
		add_settings_error(
			'aw_schema_setting_zip',
			esc_attr( 'settings_updated' ),
			$message,
			$type
		);
	}
	return $validated;
}

function sanitize_and_validate_longitude($option, $required = false) {
	if($option == "") {return "";}
	$validated = sanitize_text_field( $option );
	if ($validated !== $option || !preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/', $option)) {
		$type = 'error';
		$message = __( 'Longitude was invalid - Must be a number in the range of -180.0 to +180.0', 'aw-schema' );
		add_settings_error(
			'aw_schema_setting_longitude',
			esc_attr( 'settings_updated' ),
			$message,
			$type
		);
	}
	return $validated;
}

function sanitize_and_validate_latitude($option, $required = false) {
	if($option == "") {return "";}
	$validated = sanitize_text_field( $option );
	if ($validated !== $option || !preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/', $option)) {
		$type = 'error';
		$message = __( 'Latitude was invalid - Must be a number in the range of -90.0 to +90.0', 'aw-schema' );
		add_settings_error(
			'aw_schema_setting_latitude',
			esc_attr( 'settings_updated' ),
			$message,
			$type
		);
	}
	return $validated;
}

function sanitize_and_validate_country($option) {
	if($option == "") {return "";}
	$validated = sanitize_text_field( $option );
	if ($validated !== $option || !preg_match('/^[A-Z]{2}$/', $option)) {
		$type = 'error';
		$message = __( 'Country was invalid - Are you messing with the dropdown values? -.-', 'aw-schema' );
		add_settings_error(
			'aw_schema_setting_country',
			esc_attr( 'settings_updated' ),
			$message,
			$type
		);
	}
	return $validated;
}

function sanitize_and_validate_state($option) {
	if($option == "") {return "";}
	$validated = sanitize_text_field( $option );
	if ($validated !== $option || !preg_match('/^[A-Z]{2}$/', $option)) {
		$type = 'error';
		$message = __( 'State was invalid - Are you messing with the dropdown values? -.-', 'aw-schema' );
		add_settings_error(
			'aw_schema_setting_state',
			esc_attr( 'settings_updated' ),
			$message,
			$type
		);
	}
	return $validated;
}

function sanitize_and_validate_url($option) {
	if($option == "") {return "";}
	$sanitized = esc_url_raw( $option );
	return $sanitized;
}


/* ------------------------- Create the options page ------------------------- */

add_action( 'admin_menu', 'aw_schema_admin_add_page' );
function aw_schema_admin_add_page() {
	add_options_page(
		'Business Schema Page',
		'Business Schema',
		'manage_options',
		'aw-schema',
		'aw_schema_options_page'
	);
}


function aw_schema_options_page() {
?>
<div class="wrap">
	<h2><?php _e( 'Business Schema', 'aw-schema' ) ?></h2>
	<form action="options.php" method="post">
		<?php settings_fields( 'aw-schema' ); ?>
		<?php do_settings_sections( 'aw-schema' ); ?>
		<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes', 'aw-schema' ); ?>" class="button button-primary" />
	</form>
</div>
<?php
}
