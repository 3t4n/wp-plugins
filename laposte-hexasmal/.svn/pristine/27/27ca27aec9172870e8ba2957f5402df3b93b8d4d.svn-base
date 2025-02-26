<?php
add_shortcode( 'hexasmal_verification','hexasmal_cp_form_verification');
function hexasmal_cp_form_verification($attrs) {

	$defaults = array(
		'uniqid' 			=> uniqid('hexasmal_form'),
		'add_styles' 		=> true,
		'code_postal_name' 	=> 'calc_shipping_postcode',
		'commune_name' 		=> 'calc_shipping_city',
		//'country_name' 		=> 'calc_shipping_country',
		'country_name' 		=> 'FR',

		'create_form' 		=> false,
		'create_inputs' 	=> false,
	);
	$attrs = shortcode_atts($defaults, $attrs, 'hexasmal_verification');

	foreach( $attrs as $key => $value ) {
		$value = str_replace('{', '[', $value );
		$value = str_replace('}', ']', $value );
		$value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
		$value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
		$attrs[$key] = $value;
	}
	
	extract($attrs);
/*
	if($create_form) {
		$create_inputs = true;
	}
	if($create_inputs) {
		hexasmal_create_inputs(
			$create_form,
			$uniqid,
			$code_postal_name,
			$commune_name,
			$country_name
		);
	}
	*/


	if( !is_admin()) {
		hexasmal_generate_javascript(
		$uniqid,
		$add_styles,
		$code_postal_name,
		$commune_name,
		$country_name
	);
	}
}
/*
function hexasmal_create_inputs(
			$create_form,
			$uniqid,
			$code_postal_name,
			$commune_name,
			$country_name
			) {
	$code_postal_id_string = false;
	$code_postal_class_string = false;
	if(substr($code_postal_identifier,0,1) == '#') {
		$code_postal_id_string = ' id="' . substr($code_postal_identifier,1) .'"';
	}
	elseif(substr($code_postal_identifier,0,1) == '.') {
		$code_postal_class_string = ' class="' . substr($code_postal_identifier,1) . '"';
	}
	$commune_id_string = false;
	$commune_class_string = false;
	if(substr($commune_identifier,0,1) == '#') {
		$commune_id_string = ' id="' . substr($commune_identifier,1) . '"';
	}
	elseif(substr($commune_identifier,0,1) == '.') {
		$commune_class_string = ' class="' . substr($commune_identifier,1) . '"';
	}
	if($create_form)  :?>
		<div class="hexasmal_form">
			<form id="<?php echo $uniqid; ?>">
		<?php
	else:
		 ?>
		<div id="<?php echo $uniqid; ?>" class="hexasmal_form">
		 <?php
	endif;
		  ?>
		<input type="hidden" name="code_postal_valide" value="0">
		<input type="hidden" name="hexasmal_codepostal_demande" value="">
		<input type="hidden" name="hexasmal_response" value="">
		<fieldset>
			<legend><?php _e('Votre adresse','hexasmal_cp'); ?></legend>
			<div class="hexasmal_form_code_postal">
				<label for="<?php echo $code_postal_name; ?>"><?php _e('Code Postal','hexasmal_cp'); ?></label>
				<input type="text" <?php echo $code_postal_id_string; echo $code_postal_class_string; ?> name="<?php echo $code_postal_name; ?>" list="communes">
				<div class="hexasmal_response_select"></div>
			</div>
			<div class="hexasmal_form_commune">
				<label for="<?php echo $commune_name; ?>"><?php _e('Commune','hexasmal_cp'); ?></label>
				<input type="text" <?php echo $commune_id_string; echo $commune_class_string; ?>name="commune">
			</div>
			<div class="hexasmal_extra_results" style="display: none;"></div>
			<div class="spinner" style="display: none;"><img src="<?php echo includes_url('js/thickbox/loadingAnimation.gif'); ?>"></div>
		</fieldset>
		<?php
	if($create_form)  :?>
			</form>
		</div>
		<?php
	else:
		 ?>
		</div>
		 <?php
	endif;
}
*/