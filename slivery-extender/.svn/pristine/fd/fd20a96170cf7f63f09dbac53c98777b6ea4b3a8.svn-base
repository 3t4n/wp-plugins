<?php
global $themetype;
// Book an Appointment Section
	new \Kirki\Section(
		'book_an_appoinment_section',
		[
			'title'       => esc_html__( 'Book an Appointment', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_main_title',
			'label'    => esc_html__( 'Book an Appointment Title', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( 'Book an Appointment', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_book_an_appoinment_main_title' => [
					'selector'        => '.appointment_title',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_name_ph',
			'label'    => esc_html__( 'Name Place-Holder', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( 'Enter Your Name', 'kirki' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_email_ph',
			'label'    => esc_html__( 'Email Place-Holder', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( 'Enter Your Email', 'kirki' ),
			'priority' => 15,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_number_ph',
			'label'    => esc_html__( 'Number Place-Holder', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( '23 Hours Services', 'kirki' ),
			'priority' => 20,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_query_ph',
			'label'    => esc_html__( 'Your Query Place-Holder', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( 'Your Query', 'kirki' ),
			'priority' => 25,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_admin_email',
			'label'    => esc_html__( 'Enter Your Email', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( '', 'kirki' ),
			'priority' => 30,
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => $themetype['plugiformname'].'_book_an_appointment_section_image',
			'label'       => esc_html__( 'Image', 'kirki' ),
			'section'     => 'book_an_appoinment_section',
			'default'     => '',
			'priority' => 35,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_book_an_appoinment_btn_text',
			'label'    => esc_html__( 'Button Text', 'kirki' ),
			'section'  => 'book_an_appoinment_section',
			'default'  => esc_html__( 'Submit', 'kirki' ),
			'priority' => 40,
		]
	);

	if(isset($themetype['_book_an_appointment_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings' => $themetype['plugiformname'].'_book_an_appointment_bg_color',
				'label'    => esc_html__( 'Background color', 'goldy-fitness' ),
				'section'  => 'book_an_appoinment_section',
				'default'  => $themetype['_book_an_appointment_bg_color'],
				// 'default'  => '#f1f5fe',
				'priority' => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.appointment_section_info',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['_book_an_appointment_title_color'])){
		new \Kirki\Field\Color(
			[
				'settings' => $themetype['plugiformname'].'_book_an_appointment_title_color',
				'label'    => esc_html__( 'Title color', 'goldy-fitness' ),
				'section'  => 'book_an_appoinment_section',
				'default'  => $themetype['_book_an_appointment_title_color'],
				'priority' => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.appointment_title h2',
						'property' => 'color',
					),
				),
			]
		);
	}
?>