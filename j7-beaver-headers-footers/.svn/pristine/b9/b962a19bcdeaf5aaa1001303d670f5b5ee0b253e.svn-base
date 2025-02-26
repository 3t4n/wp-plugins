<?php


function j7hftcustom_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_panel( 'bbp_hftcustom-media', array(
	 'priority'       => 4,
	 'title'          => __('Header Footer Templates', 'j7digital'),
	  'description'    => __( '
		<b>Tips & Advice</b>
				<ol>
					<li>Create a template for your header or footer and Save As in the page builder.</li>
					<li>Remember to set the width, the background colour & opacity on the row settings of the template.</li>
					<li>Select the Template you wish to insert & the location with the settings below.</li>
					<li>Hide the header/footer by changing the page template to "No Header/Footer".</li>
					<li>Use custom CSS to change font colors.</li>
				</ol>
				<br>
				', 'j7digital' )
	) );

	include('j7-headers-footers-customizer-header.php');

	include('j7-headers-footers-customizer-footer.php');

	include('j7-headers-footers-customizer-content.php');
}

add_action( 'customize_register', 'j7hftcustom_register_theme_customizer' );