<?php
function fcp_custom_js_css() {
		wp_enqueue_script( 'fcp-form-js', plugins_url('/js/fcp-custom.js', dirname(__FILE__)), array( 'jquery' ), '1.38' );
		
		wp_localize_script( 'fcp-form-js', 'fcp',
			array( 
				'heightCentimeter' => __( 'Centimeter', 'fitness-calculators'),
				'weightKilogram' => __( 'Kilogram', 'fitness-calculators'),
				'heightFeet' => __( 'Feet', 'fitness-calculators'),
				'weightPound' => __( 'Pound', 'fitness-calculators'),
				'unitLTR' => __( 'Ltr', 'fitness-calculators'),
				'unitOz' => __( 'Oz', 'fitness-calculators'),
				'unitLBS' => __( 'lbs', 'fitness-calculators'),
				'unitGram' => __( 'gram', 'fitness-calculators'),
				'bmiUnderweight' => __( 'Underweight', 'fitness-calculators'),
				'bmiNormalweight' => __( 'Normal Weight', 'fitness-calculators'),
				'bmiOverweight' => __( 'Overweight', 'fitness-calculators'),
				'bmiClass1' => __( '(Class I Obese)', 'fitness-calculators'),
				'bmiClass2' => __( '(Class II Obese)', 'fitness-calculators'),
				'bmiClass3' => __( '(Class III Obese)', 'fitness-calculators'),
				'requireField' => __( 'Required Fields', 'fitness-calculators'),
				'numberOnly' => __( 'Numbers Only', 'fitness-calculators'),
				'positiveNumberOnly' => __( 'Positive Numbers Only', 'fitness-calculators'),
				'nonNegativeNumberOnly' => __( 'Non Negative Numbers Only', 'fitness-calculators'),
				'integerOnly' => __( 'Integers Only', 'fitness-calculators'),
				'positiveIntegerOnly' => __( 'Positive Integers Only', 'fitness-calculators'),
				'nonNegativeIntegerOnly' => __( 'Non Negative Integres Only', 'fitness-calculators'),
			)
		);
		wp_enqueue_style( 'fcp-form-styles', plugins_url('/css/fcp-style.css',dirname(__FILE__)), array(), '1.40' );
}
add_action('wp_enqueue_scripts', 'fcp_custom_js_css');