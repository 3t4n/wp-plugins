<?php
global $themetype;
// Home Page Ordering Section
	new \Kirki\Section(
		'global_ordering_section',
		[
			'title'       => esc_html__( 'Home Page Ordering Section', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);
	$choicarraly =   [
		$themetype['plugiformname'].'_featuredimage_slider' => esc_html__( 'Featured Slider', 'kirki' ),
		$themetype['plugiformname'].'_our_portfolio_section' => esc_html__( 'Our Portfolio', 'kirki' ),
		$themetype['plugiformname'].'_about_section' => esc_html__( 'About Section', 'kirki' ),
		$themetype['plugiformname'].'_featured_section' => esc_html__( 'Featured Section', 'kirki' ),
		$themetype['plugiformname'].'_appointment_section' => esc_html__( 'Book an Appointment', 'kirki' ),
		$themetype['plugiformname'].'_our_team_section' => esc_html__( 'Our Team', 'kirki' ),
		$themetype['plugiformname'].'_our_testimonial_section' => esc_html__( 'Our Testimonial', 'kirki' ),
		$themetype['plugiformname'].'_our_sponsors_section' => esc_html__( 'Our Sponsors', 'kirki' ),
		$themetype['plugiformname'].'_services_section' => esc_html__( 'Our Services', 'kirki' ),
	];
	$orderarr = apply_filters('goldy_mex_global_ordering_action', $choicarraly);
	
	if(isset($themetype['global_ordering_default'])){
		new \Kirki\Field\Sortable(
			[
				'settings' => 'global_ordering',
				'label'    => __( 'Drag & Drop Sections to re-arrange the order', 'kirki' ),
				'section'  => 'global_ordering_section',
				'default'  => $themetype['global_ordering_default'], 
				'priority' => 10,
				'choices'  =>$orderarr,
			]
		);
	}

	Kirki::add_field( 'global_ordering_section', [
		'type'      => 'hidden',
		'settings'  => 'globalddd_ordering',
		'section'   => 'global_ordering_section',
	] );

	Kirki::add_field( 'global_ordering_section', [
		'type'      => 'hidden',
		'settings'  => $themetype['plugiformname'].'_diseble',
		'section'   => 'global_ordering_section',
	] );
?>