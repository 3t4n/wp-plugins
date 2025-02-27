<?php
global $themetype;
// Design Section
		new \Kirki\Section(
			'design_section',
			[
				'title'       => esc_html__( 'Design', 'kirki' ),
				'panel'       => 'globly_theme_option',
				'priority'    => 160,
			]
		);

		if(isset($themetype['design_underline_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'design_underline_color',
					'label'       => __( 'Heding Underline Color', 'kirki' ),
					'section'     => 'design_section',
					'default'     => $themetype['design_underline_color'],
					// 'default'     => '#273641',
					'priority'	=> 5,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.'.$themetype['plugiformname'].'_title_underline h2:after, .'.$themetype['plugiformname'].'_about_main_title h2:after, .'.$themetype['plugiformname'].'_our_portfolio_main_title h2:after, .our_team_main_title h2:after, .our_testimonial_main_title h2:after, .our_services_title h2:after, .appointment_title h2:after, .our_sponsors_title h2:after, .featured-section_title h2:after, .blog_main_title h2:after, .restaurant_menu_main_title h2:after, .pricing_plan_title  h2:after, .heading_main_title h2::before',
							'property' => 'background-color',
							'suffix' => ' !important',
						),
					),
				]
			);
		}
?>