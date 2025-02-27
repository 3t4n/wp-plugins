<?php
/*
Plugin Name: Cosmica Advance Sections
Description: Advance Sections For Cosmica Theme. Cosmica need this plugin to support Slider, projects, clients, client logo, services sections. link to Cosmica theme https://wordpress.org/themes/cosmica/
Author: kapilsharma12
Author URI: https://www.codeins.org/
Domain Path: /language/
Version: 2.0
Text Domain: cosmica-advance-sections

cosmica Advance Sections is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

cosmica Advance Sections is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with cosmica Advance Sections. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('cosmica_advanced_sections')) {
	function cosmica_advanced_sections() {

	}
}




function cosmica_advanced_sections_register($wp_customize){
	// customizer content here
	$wp_customize->add_section('cosmica_slider_section', array(
		'priority'    => 200,
		'capability'  => 'edit_theme_options',
		'title'       => __('Slider Settings', 'cosmica-advance-sections'),
		'description' => __('Customize Slider', 'cosmica-advance-sections'),
		'panel'       => 'cosmica_homepage_settings',
	));

	
	$wp_customize->add_setting('cosmica_hide_slider',
		array(
			'default'           => false,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'cosmica_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('cosmica_hide_slider', array(
		'type'     => 'checkbox',
		'priority' => 1,
		'section'  => 'cosmica_slider_section',
		'label'    => __('Hide Home Slider ', 'cosmica-advance-sections'),
	));

	for ($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting('cosmica_slider_heading' . $i, array(
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new Cosmica_Customize_Heading($wp_customize, 'cosmica_slider_heading' . $i, array(
			'settings' => 'cosmica_slider_heading' . $i,
			'section'  => 'cosmica_slider_section',
			'priority' => 1,
			'label'    => sprintf(__('Slide %s', 'cosmica-advance-sections') , $i),
		)));

		$wp_customize->add_setting('cosmica_slide_image' . $i, array(
			'default'           => esc_url(get_template_directory_uri() . '/images/slides/slide' . $i . '.jpg'),
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cosmica_slide_image' . $i, array(
			'label'    => __('Slide Image ', 'cosmica-advance-sections'),
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'settings' => 'cosmica_slide_image' . $i,
		)));

		$wp_customize->add_setting('cosmica_slide_' . $i . '_heading',
			array(
				'default'           => __('<span> COSMICA </span> Responsive Theme', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_html',
			)
		);

		$wp_customize->add_control('cosmica_slide_' . $i . '_heading', array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Heading', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmica_slide_' . $i . '_description',
			array(
				'default'           => __('Cosmica is Multipurpose Responsive WordPress theme for any business purpose.', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_html',
			));

		$wp_customize->add_control('cosmica_slide_' . $i . '_description', array(
			'type'     => 'textarea',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Description', 'cosmica-advance-sections'),
		));
		
		$wp_customize->add_setting('cosmica_slide_' . $i . '_bt_1_text',
			array(
				'default'           => __('Read More', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_text',
			));

		$wp_customize->add_control('cosmica_slide_' . $i . '_bt_1_text', array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Button 1 Text ', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmica_slide_' . $i . '_bt_1_link',
			array(
				'default'           => '#',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_url',
			));

		$wp_customize->add_control('cosmica_slide_' . $i . '_bt_1_link', array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Button 1 Link ', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmica_slide_' . $i . '_bt_2_text',
			array(
				'default'           => __('Buy Now', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_text',
			));

		$wp_customize->add_control('cosmica_slide_' . $i . '_bt_2_text', array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Button 2 Text ', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmica_slide_' . $i . '_bt_2_link',
			array(
				'default'           => '#',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_url',
			));

		$wp_customize->add_control('cosmica_slide_' . $i . '_bt_2_link', array(
			'type'     => 'text',
			'priority' => 1,
			'section'  => 'cosmica_slider_section',
			'label'    => __('Button 2 Link ', 'cosmica-advance-sections'),
		));
	}



	/** projects **/
	$wp_customize->add_section('cosmica_project_section', array(
		'priority'    => 200,
		'capability'  => 'edit_theme_options',
		'title'       => __('Project Settings', 'cosmica-advance-sections'),
		'description' => __('Customize Projects', 'cosmica-advance-sections'),
		'panel'      => 'cosmica_homepage_settings',
	));
	$wp_customize->add_setting('cosmca_project_heading',
		array(
			'default'           => __('Recent Works', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmca_project_heading', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_project_section',
		'label'    => __('Projects Heading', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_project_description',
		array(
			'default'           => __('Recent Project Description', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmca_project_description', array(
		'type'     => 'textarea',
		'priority' => 200,
		'section'  => 'cosmica_project_section',
		'label'    => __('Projects Description', 'cosmica-advance-sections'),
	));

	for ($i=1; $i <= 4; $i++) { 
		
		$wp_customize->add_setting('cosmca_project_heading_label' . $i, array(
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new Cosmica_Customize_Heading($wp_customize, 'cosmca_project_heading_label' . $i, array(
			'section'  => 'cosmica_project_section',
			'priority' => 200,
			'label'    => sprintf(__('Work %s', 'cosmica-advance-sections') , $i),
		)));

		$wp_customize->add_setting('cosmica_project_image' . $i, array(
			'default'           => esc_url(get_template_directory_uri() . '/images/projects/work-'.$i.'.jpg'),
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cosmica_project_image' . $i, array(
			'label'    => __('Project Image ', 'cosmica-advance-sections'),
			'priority' => 200,
			'section'  => 'cosmica_project_section',
		)));

		$wp_customize->add_setting('cosmca_project_title'. $i,
			array(
				'default'           => sprintf(__('Project %s', 'cosmica-advance-sections') , $i),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control('cosmca_project_title'. $i, array(
			'type'     => 'text',
			'priority' => 200,
			'section'  => 'cosmica_project_section',
			'label'    => __('Projects Title', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmca_project_link'. $i,
			array(
				'default'           => '#',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_url',
		));

		$wp_customize->add_control('cosmca_project_link'. $i, array(
			'type'     => 'text',
			'priority' => 200,
			'section'  => 'cosmica_project_section',
			'label'    => __('Projects Link', 'cosmica-advance-sections'),
		));

	}
/** projects **/

/** callout **/
	$wp_customize->add_section('cosmica_callout_section', array(
		'title'      => __('Callout Settings', 'cosmica-advance-sections'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
		'panel'		 => 'cosmica_homepage_settings',
	));

	$wp_customize->add_setting('cosmca_call_header_text',
		array(
			'default'           => __('Our Callout', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_header_text', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Call Out Heading', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_call_desc_text',
		array(
			'default'           => __('Callout Section Description', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_desc_text', array(
		'type'     => 'textarea',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Call Out Description', 'cosmica-advance-sections'),
	));

	
	$wp_customize->add_setting('cosmca_call_bt1_text',
		array(
			'default'           => __('Purchase Theme', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_bt1_text', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Button 1 Text', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_call_bt1_link',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_bt1_link', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Button 1 Link', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_call_bt2_text',
		array(
			'default'           => __('See Details', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_bt2_text', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Button 2 Text', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_call_bt2_link',
		array(
			'default'           => esc_url('#'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_call_bt2_link', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_callout_section',
		'label'    => __('Button 2 Link', 'cosmica-advance-sections'),
	));
/** callout **/


/** services **/
	$wp_customize->add_section('cosmica_service_section', array(
		'title'      => __('Services Settings', 'cosmica-advance-sections'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
		'panel'      => 'cosmica_homepage_settings',
	));

	$wp_customize->add_setting('cosmca_services_header_text',
		array(
			'default'           => __('Awesome Services', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control('cosmca_services_header_text', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmica_service_section',
		'label'    => __('Title Text', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_services_desc_text',
		array(
			'default'           => __('Services Section Description', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('cosmca_services_desc_text', array(
		'type'     => 'textarea',
		'priority' => 200,
		'section'  => 'cosmica_service_section',
		'label'    => __('Description Text', 'cosmica-advance-sections'),
	));

	for ($i=1; $i <= 6; $i++) { 
		
		$wp_customize->add_setting('cosmca_services_heading' . $i, array(
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new Cosmica_Customize_Heading($wp_customize, 'cosmca_services_heading' . $i, array(
			'section'  => 'cosmica_service_section',
			'priority' => 200,
			'label'    => sprintf(__('Service %s', 'cosmica-advance-sections') , $i),
		)));
		
		$wp_customize->add_setting('cosmica_service_icon' . $i, array(
			'default'           => 'fa fa-star',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new Cosmica_Fontawesome_Icon_Chooser($wp_customize, 'cosmica_service_icon' . $i, array(
			'settings' => 'cosmica_service_icon' . $i,
			'priority' => 200,
			'section'  => 'cosmica_service_section',
			'label'    => __('FontAwesome Icon', 'cosmica-advance-sections'),
		)));

		$wp_customize->add_setting('cosmca_services_'.$i.'_title',
			array(
				'default'           => __('Lorem ipsum', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control('cosmca_services_'.$i.'_title', array(
			'type'     => 'text',
			'priority' => 200,
			'section'  => 'cosmica_service_section',
			'label'    => __('Title', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmca_services_'.$i.'_desc',
			array(
				'default'           => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cosmica-advance-sections'),
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			));

		$wp_customize->add_control('cosmca_services_'.$i.'_desc', array(
			'type'     => 'textarea',
			'priority' => 200,
			'section'  => 'cosmica_service_section',
			'label'    => __('Description', 'cosmica-advance-sections'),
		));

		$wp_customize->add_setting('cosmca_services_link'. $i,
			array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'sanitize_callback' => 'cosmica_sanitize_url',
		));

		$wp_customize->add_control('cosmca_services_link'. $i, array(
			'type'     => 'text',
			'priority' => 200,
			'section'  => 'cosmica_service_section',
			'label'    => __('Service Link', 'cosmica-advance-sections'),
		));
	}
/** services **/


/*latest Posts*/
	$wp_customize->add_section('cosmca_latest_post_section', array(
		'priority'    => 200,
		'capability'  => 'edit_theme_options',
		'title'       => __('Latest Posts Settings', 'cosmica-advance-sections'),
		'description' => __('Customize Latest Posts', 'cosmica-advance-sections'),
		'panel'      => 'cosmica_homepage_settings',
	));
	$wp_customize->add_setting('cosmca_latest_post_heading',
		array(
			'default'           => __('Latest Posts', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmca_latest_post_heading', array(
		'type'     => 'text',
		'priority' => 200,
		'section'  => 'cosmca_latest_post_section',
		'label'    => __('Latest Posts Heading', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_latest_post_description',
		array(
			'default'           => __('Latest Posts Description', 'cosmica-advance-sections'),
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmca_latest_post_description', array(
		'type'     => 'textarea',
		'priority' => 200,
		'section'  => 'cosmca_latest_post_section',
		'label'    => __('Latest Posts Description', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmca_latest_post_count',
		array(
			'default'           => 9,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('cosmca_latest_post_count', array(
		'label'    => __('Number of latest posts', 'cosmica-advance-sections'),
		'type'     => 'number',
		'priority' => 200,
		'section'  => 'cosmca_latest_post_section',
	));
/*latest Posts*/

/*brand logo*/	

	$wp_customize->add_section('cosmica_clients_section', array(
		'title'      => __('Clients Logo Options', 'cosmica-advance-sections'),
		'capability' => 'edit_theme_options',
		'panel'		 => 'cosmica_homepage_settings',
		'priority'   => 200,
	));

	$wp_customize->add_setting('cosmica_clients_heading', array(
		'default'           => __('Clients Section Heading', 'cosmica-advance-sections'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmica_clients_heading', array(
		'type'     => 'text',
		'priority' => 10,
		'section'  => 'cosmica_clients_section',
		'label'    => __('Clients Heading', 'cosmica-advance-sections'),
	));

	$wp_customize->add_setting('cosmica_clients_description', array(
		'default'           => __('Clients Section  Description', 'cosmica-advance-sections'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cosmica_clients_description', array(
		'type'     => 'textarea',
		'priority' => 10,
		'section'  => 'cosmica_clients_section',
		'label'    => __('Clients Description', 'cosmica-advance-sections'),
	));

	for ($i = 1; $i <= 6; $i++) {

		$wp_customize->add_setting('cosmica_client_logo' . $i, array(
			'default'           => esc_url(get_template_directory_uri() . '/images/clients/client-logo-' . $i . '.jpg'),
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cosmica_client_logo' . $i, array(
			'label'    => __('Client Logo ', 'cosmica-advance-sections') . $i,
			'section'  => 'cosmica_clients_section',
			'settings' => 'cosmica_client_logo' . $i,
		)));
	}
/*brand logo */

}
add_action('customize_register', 'cosmica_advanced_sections_register');

function cosmica_advanced_sections_init() {
	load_plugin_textdomain('cosmica-advance-sections', false, dirname(plugin_basename(__FILE__)) . '/language');


	if (class_exists('WP_Customize_Control')) {
		if(!class_exists('Cosmica_Customize_Heading')){
		class Cosmica_Customize_Heading extends WP_Customize_Control {
			public $type = 'heading';

			public function render_content() {
				if (!empty($this->label)): ?>
				    <h3 class="cosmica-accordion-section-title"><?php echo esc_html($this->label); ?></h3>
				<?php endif;
				if ($this->description): ?>
		        <span class="description customize-control-description">
		        <?php echo wp_kses_post($this->description); ?>
		        </span>
	      		<?php endif;
			}
		}
		}

		if(!class_exists('Cosmica_Info_Text')){
		class Cosmica_Info_Text extends WP_Customize_Control {

			public function render_content() {
			?>
	        	<span class="customize-control-title">
	        		<?php echo esc_html($this->label); ?>
	      		</span>

		      <?php if ($this->description): ?>
		        <span class="description customize-control-description">
		        <?php echo wp_kses_post($this->description); ?>
		        </span>
		      <?php endif;
			}

		}
		}

		if(!class_exists('Cosmica_On_Off_Control')){
		class Cosmica_On_Off_Control extends WP_Customize_Control {
			public $type    = 'switch';
			public $options = array();

			public function __construct($manager, $id, $args = array()) {
				$this->options = isset($args['options']) ? $args['options'] : array('on' => 'ON', 'off' => 'OFF');
				parent::__construct($manager, $id, $args);
			}

			public function render_content() {
				?>
	            <label>
	                  <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	                  <?php if ($this->description): ?>
			            <span class="description customize-control-description">
			            <?php echo wp_kses_post($this->description); ?>
			            </span>
	          		<?php endif;?>
	          <?php
					$switch_class = ($this->value() == 'on') ? 'switch-on' : '';
					$options      = $this->options;
				?>
		        	<div class="onoffswitch <?php echo esc_attr($switch_class); ?>">
		            	<div class="onoffswitch-inner">
		            		<div class="onoffswitch-active">
		                		<div class="onoffswitch-switch"><?php echo esc_html($options['on']) ?></div>
		              		</div>
		              		<div class="onoffswitch-inactive">
		                		<div class="onoffswitch-switch"><?php echo esc_html($options['off']) ?></div>
		              		</div>
		           		</div>
		          	</div>
		            <input <?php $this->link();?> type="hidden" value="<?php echo esc_attr($this->value()); ?>" class="cosmica-switch">
		        </label>
	            <?php
			}
		}
		}

		if(!class_exists('Cosmica_Page_Dropdown_Control')){
		class Cosmica_Page_Dropdown_Control extends WP_Customize_Control {

			public function render_content() {
				$pages = get_pages(array('hide_empty' => false));
				if (!empty($pages)): ?>
	              <label>
	                  <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	                  <select <?php $this->link();?>>
		                  <option value="0"><?php esc_html_e('Select Page', 'cosmica');?></option>
		                  <?php
							foreach ($pages as $page):
							printf('<option value="%s" %s>%s</option>',
								$page->ID,
								selected($this->value(), $page->ID, false),
								$page->post_title
							);
							endforeach;
							?>
	                  </select>
	              </label>
	              <?php
				endif;
			}

		}
		}

		if (!function_exists('cosmica_font_awesome_icon_array')) {
		function cosmica_font_awesome_icon_array() {
			return array("fa fa-glass", "fa fa-music", "fa fa-search", "fa fa-envelope-o", "fa fa-heart", "fa fa-star", "fa fa-star-o", "fa fa-user", "fa fa-film", "fa fa-th-large", "fa fa-th", "fa fa-th-list", "fa fa-check", "fa fa-remove", "fa fa-close", "fa fa-times", "fa fa-search-plus", "fa fa-search-minus", "fa fa-power-off", "fa fa-signal", "fa fa-gear", "fa fa-cog", "fa fa-trash-o", "fa fa-home", "fa fa-file-o", "fa fa-clock-o", "fa fa-road", "fa fa-download", "fa fa-arrow-circle-o-down", "fa fa-arrow-circle-o-up", "fa fa-inbox", "fa fa-play-circle-o", "fa fa-rotate-right", "fa fa-repeat", "fa fa-refresh", "fa fa-list-alt", "fa fa-lock", "fa fa-flag", "fa fa-headphones", "fa fa-volume-off", "fa fa-volume-down", "fa fa-volume-up", "fa fa-qrcode", "fa fa-barcode", "fa fa-tag", "fa fa-tags", "fa fa-book", "fa fa-bookmark", "fa fa-print", "fa fa-camera", "fa fa-font", "fa fa-bold", "fa fa-italic", "fa fa-text-height", "fa fa-text-width", "fa fa-align-left", "fa fa-align-center", "fa fa-align-right", "fa fa-align-justify", "fa fa-list", "fa fa-dedent", "fa fa-outdent", "fa fa-indent", "fa fa-video-camera", "fa fa-photo", "fa fa-image", "fa fa-picture-o", "fa fa-pencil", "fa fa-map-marker", "fa fa-adjust", "fa fa-tint", "fa fa-edit", "fa fa-pencil-square-o", "fa fa-share-square-o", "fa fa-check-square-o", "fa fa-arrows", "fa fa-step-backward", "fa fa-fast-backward", "fa fa-backward", "fa fa-play", "fa fa-pause", "fa fa-stop", "fa fa-forward", "fa fa-fast-forward", "fa fa-step-forward", "fa fa-eject", "fa fa-chevron-left", "fa fa-chevron-right", "fa fa-plus-circle", "fa fa-minus-circle", "fa fa-times-circle", "fa fa-check-circle", "fa fa-question-circle", "fa fa-info-circle", "fa fa-crosshairs", "fa fa-times-circle-o", "fa fa-check-circle-o", "fa fa-ban", "fa fa-arrow-left", "fa fa-arrow-right", "fa fa-arrow-up", "fa fa-arrow-down", "fa fa-mail-forward", "fa fa-share", "fa fa-expand", "fa fa-compress", "fa fa-plus", "fa fa-minus", "fa fa-asterisk", "fa fa-exclamation-circle", "fa fa-gift", "fa fa-leaf", "fa fa-fire", "fa fa-eye", "fa fa-eye-slash", "fa fa-warning", "fa fa-exclamation-triangle", "fa fa-plane", "fa fa-calendar", "fa fa-random", "fa fa-comment", "fa fa-magnet", "fa fa-chevron-up", "fa fa-chevron-down", "fa fa-retweet", "fa fa-shopping-cart", "fa fa-folder", "fa fa-folder-open", "fa fa-arrows-v", "fa fa-arrows-h", "fa fa-bar-chart-o", "fa fa-bar-chart", "fa fa-twitter-square", "fa fa-facebook-square", "fa fa-camera-retro", "fa fa-key", "fa fa-gears", "fa fa-cogs", "fa fa-comments", "fa fa-thumbs-o-up", "fa fa-thumbs-o-down", "fa fa-star-half", "fa fa-heart-o", "fa fa-sign-out", "fa fa-linkedin-square", "fa fa-thumb-tack", "fa fa-external-link", "fa fa-sign-in", "fa fa-trophy", "fa fa-github-square", "fa fa-upload", "fa fa-lemon-o", "fa fa-phone", "fa fa-square-o", "fa fa-bookmark-o", "fa fa-phone-square", "fa fa-twitter", "fa fa-facebook-f", "fa fa-facebook", "fa fa-github", "fa fa-unlock", "fa fa-credit-card", "fa fa-feed", "fa fa-rss", "fa fa-hdd-o", "fa fa-bullhorn", "fa fa-bell", "fa fa-certificate", "fa fa-hand-o-right", "fa fa-hand-o-left", "fa fa-hand-o-up", "fa fa-hand-o-down", "fa fa-arrow-circle-left", "fa fa-arrow-circle-right", "fa fa-arrow-circle-up", "fa fa-arrow-circle-down", "fa fa-globe", "fa fa-wrench", "fa fa-tasks", "fa fa-filter", "fa fa-briefcase", "fa fa-arrows-alt", "fa fa-group", "fa fa-users", "fa fa-chain", "fa fa-link", "fa fa-cloud", "fa fa-flask", "fa fa-cut", "fa fa-scissors", "fa fa-copy", "fa fa-files-o", "fa fa-paperclip", "fa fa-save", "fa fa-floppy-o", "fa fa-square", "fa fa-navicon", "fa fa-reorder", "fa fa-bars", "fa fa-list-ul", "fa fa-list-ol", "fa fa-strikethrough", "fa fa-underline", "fa fa-table", "fa fa-magic", "fa fa-truck", "fa fa-pinterest", "fa fa-pinterest-square", "fa fa-google-plus-square", "fa fa-google-plus", "fa fa-money", "fa fa-caret-down", "fa fa-caret-up", "fa fa-caret-left", "fa fa-caret-right", "fa fa-columns", "fa fa-unsorted", "fa fa-sort", "fa fa-sort-down", "fa fa-sort-desc", "fa fa-sort-up", "fa fa-sort-asc", "fa fa-envelope", "fa fa-linkedin", "fa fa-rotate-left", "fa fa-undo", "fa fa-legal", "fa fa-gavel", "fa fa-dashboard", "fa fa-tachometer", "fa fa-comment-o", "fa fa-comments-o", "fa fa-flash", "fa fa-bolt", "fa fa-sitemap", "fa fa-umbrella", "fa fa-paste", "fa fa-clipboard", "fa fa-lightbulb-o", "fa fa-exchange", "fa fa-cloud-download", "fa fa-cloud-upload", "fa fa-user-md", "fa fa-stethoscope", "fa fa-suitcase", "fa fa-bell-o", "fa fa-coffee", "fa fa-cutlery", "fa fa-file-text-o", "fa fa-building-o", "fa fa-hospital-o", "fa fa-ambulance", "fa fa-medkit", "fa fa-fighter-jet", "fa fa-beer", "fa fa-h-square", "fa fa-plus-square", "fa fa-angle-double-left", "fa fa-angle-double-right", "fa fa-angle-double-up", "fa fa-angle-double-down", "fa fa-angle-left", "fa fa-angle-right", "fa fa-angle-up", "fa fa-angle-down", "fa fa-desktop", "fa fa-laptop", "fa fa-tablet", "fa fa-mobile-phone", "fa fa-mobile", "fa fa-circle-o", "fa fa-quote-left", "fa fa-quote-right", "fa fa-spinner", "fa fa-circle", "fa fa-mail-reply", "fa fa-reply", "fa fa-github-alt", "fa fa-folder-o", "fa fa-folder-open-o", "fa fa-smile-o", "fa fa-frown-o", "fa fa-meh-o", "fa fa-gamepad", "fa fa-keyboard-o", "fa fa-flag-o", "fa fa-flag-checkered", "fa fa-terminal", "fa fa-code", "fa fa-mail-reply-all", "fa fa-reply-all", "fa fa-star-half-empty", "fa fa-star-half-full", "fa fa-star-half-o", "fa fa-location-arrow", "fa fa-crop", "fa fa-code-fork", "fa fa-unlink", "fa fa-chain-broken", "fa fa-question", "fa fa-info", "fa fa-exclamation", "fa fa-superscript", "fa fa-subscript", "fa fa-eraser", "fa fa-puzzle-piece", "fa fa-microphone", "fa fa-microphone-slash", "fa fa-shield", "fa fa-calendar-o", "fa fa-fire-extinguisher", "fa fa-rocket", "fa fa-maxcdn", "fa fa-chevron-circle-left", "fa fa-chevron-circle-right", "fa fa-chevron-circle-up", "fa fa-chevron-circle-down", "fa fa-html5", "fa fa-css3", "fa fa-anchor", "fa fa-unlock-alt", "fa fa-bullseye", "fa fa-ellipsis-h", "fa fa-ellipsis-v", "fa fa-rss-square", "fa fa-play-circle", "fa fa-ticket", "fa fa-minus-square", "fa fa-minus-square-o", "fa fa-level-up", "fa fa-level-down", "fa fa-check-square", "fa fa-pencil-square", "fa fa-external-link-square", "fa fa-share-square", "fa fa-compass", "fa fa-toggle-down", "fa fa-caret-square-o-down", "fa fa-toggle-up", "fa fa-caret-square-o-up", "fa fa-toggle-right", "fa fa-caret-square-o-right", "fa fa-euro", "fa fa-eur", "fa fa-gbp", "fa fa-dollar", "fa fa-usd", "fa fa-rupee", "fa fa-inr", "fa fa-cny", "fa fa-rmb", "fa fa-yen", "fa fa-jpy", "fa fa-ruble", "fa fa-rouble", "fa fa-rub", "fa fa-won", "fa fa-krw", "fa fa-bitcoin", "fa fa-btc", "fa fa-file", "fa fa-file-text", "fa fa-sort-alpha-asc", "fa fa-sort-alpha-desc", "fa fa-sort-amount-asc", "fa fa-sort-amount-desc", "fa fa-sort-numeric-asc", "fa fa-sort-numeric-desc", "fa fa-thumbs-up", "fa fa-thumbs-down", "fa fa-youtube-square", "fa fa-youtube", "fa fa-xing", "fa fa-xing-square", "fa fa-youtube-play", "fa fa-dropbox", "fa fa-stack-overflow", "fa fa-instagram", "fa fa-flickr", "fa fa-adn", "fa fa-bitbucket", "fa fa-bitbucket-square", "fa fa-tumblr", "fa fa-tumblr-square", "fa fa-long-arrow-down", "fa fa-long-arrow-up", "fa fa-long-arrow-left", "fa fa-long-arrow-right", "fa fa-apple", "fa fa-windows", "fa fa-android", "fa fa-linux", "fa fa-dribbble", "fa fa-skype", "fa fa-foursquare", "fa fa-trello", "fa fa-female", "fa fa-male", "fa fa-gittip", "fa fa-gratipay", "fa fa-sun-o", "fa fa-moon-o", "fa fa-archive", "fa fa-bug", "fa fa-vk", "fa fa-weibo", "fa fa-renren", "fa fa-pagelines", "fa fa-stack-exchange", "fa fa-arrow-circle-o-right", "fa fa-arrow-circle-o-left", "fa fa-toggle-left", "fa fa-caret-square-o-left", "fa fa-dot-circle-o", "fa fa-wheelchair", "fa fa-vimeo-square", "fa fa-turkish-lira", "fa fa-try", "fa fa-plus-square-o", "fa fa-space-shuttle", "fa fa-slack", "fa fa-envelope-square", "fa fa-wordpress", "fa fa-openid", "fa fa-institution", "fa fa-bank", "fa fa-university", "fa fa-mortar-board", "fa fa-graduation-cap", "fa fa-yahoo", "fa fa-google", "fa fa-reddit", "fa fa-reddit-square", "fa fa-stumbleupon-circle", "fa fa-stumbleupon", "fa fa-delicious", "fa fa-digg", "fa fa-pied-piper-pp", "fa fa-pied-piper-alt", "fa fa-drupal", "fa fa-joomla", "fa fa-language", "fa fa-fax", "fa fa-building", "fa fa-child", "fa fa-paw", "fa fa-spoon", "fa fa-cube", "fa fa-cubes", "fa fa-behance", "fa fa-behance-square", "fa fa-steam", "fa fa-steam-square", "fa fa-recycle", "fa fa-automobile", "fa fa-car", "fa fa-cab", "fa fa-taxi", "fa fa-tree", "fa fa-spotify", "fa fa-deviantart", "fa fa-soundcloud", "fa fa-database", "fa fa-file-pdf-o", "fa fa-file-word-o", "fa fa-file-excel-o", "fa fa-file-powerpoint-o", "fa fa-file-photo-o", "fa fa-file-picture-o", "fa fa-file-image-o", "fa fa-file-zip-o", "fa fa-file-archive-o", "fa fa-file-sound-o", "fa fa-file-audio-o", "fa fa-file-movie-o", "fa fa-file-video-o", "fa fa-file-code-o", "fa fa-vine", "fa fa-codepen", "fa fa-jsfiddle", "fa fa-life-bouy", "fa fa-life-buoy", "fa fa-life-saver", "fa fa-support", "fa fa-life-ring", "fa fa-circle-o-notch", "fa fa-ra", "fa fa-resistance", "fa fa-rebel", "fa fa-ge", "fa fa-empire", "fa fa-git-square", "fa fa-git", "fa fa-y-combinator-square", "fa fa-yc-square", "fa fa-hacker-news", "fa fa-tencent-weibo", "fa fa-qq", "fa fa-wechat", "fa fa-weixin", "fa fa-send", "fa fa-paper-plane", "fa fa-send-o", "fa fa-paper-plane-o", "fa fa-history", "fa fa-circle-thin", "fa fa-header", "fa fa-paragraph", "fa fa-sliders", "fa fa-share-alt", "fa fa-share-alt-square", "fa fa-bomb", "fa fa-soccer-ball-o", "fa fa-futbol-o", "fa fa-tty", "fa fa-binoculars", "fa fa-plug", "fa fa-slideshare", "fa fa-twitch", "fa fa-yelp", "fa fa-newspaper-o", "fa fa-wifi", "fa fa-calculator", "fa fa-paypal", "fa fa-google-wallet", "fa fa-cc-visa", "fa fa-cc-mastercard", "fa fa-cc-discover", "fa fa-cc-amex", "fa fa-cc-paypal", "fa fa-cc-stripe", "fa fa-bell-slash", "fa fa-bell-slash-o", "fa fa-trash", "fa fa-copyright", "fa fa-at", "fa fa-eyedropper", "fa fa-paint-brush", "fa fa-birthday-cake", "fa fa-area-chart", "fa fa-pie-chart", "fa fa-line-chart", "fa fa-lastfm", "fa fa-lastfm-square", "fa fa-toggle-off", "fa fa-toggle-on", "fa fa-bicycle", "fa fa-bus", "fa fa-ioxhost", "fa fa-angellist", "fa fa-cc", "fa fa-shekel", "fa fa-sheqel", "fa fa-ils", "fa fa-meanpath", "fa fa-buysellads", "fa fa-connectdevelop", "fa fa-dashcube", "fa fa-forumbee", "fa fa-leanpub", "fa fa-sellsy", "fa fa-shirtsinbulk", "fa fa-simplybuilt", "fa fa-skyatlas", "fa fa-cart-plus", "fa fa-cart-arrow-down", "fa fa-diamond", "fa fa-ship", "fa fa-user-secret", "fa fa-motorcycle", "fa fa-street-view", "fa fa-heartbeat", "fa fa-venus", "fa fa-mars", "fa fa-mercury", "fa fa-intersex", "fa fa-transgender", "fa fa-transgender-alt", "fa fa-venus-double", "fa fa-mars-double", "fa fa-venus-mars", "fa fa-mars-stroke", "fa fa-mars-stroke-v", "fa fa-mars-stroke-h", "fa fa-neuter", "fa fa-genderless", "fa fa-facebook-official", "fa fa-pinterest-p", "fa fa-whatsapp", "fa fa-server", "fa fa-user-plus", "fa fa-user-times", "fa fa-hotel", "fa fa-bed", "fa fa-viacoin", "fa fa-train", "fa fa-subway", "fa fa-medium");
		}
		}

		if(!class_exists('Cosmica_Fontawesome_Icon_Chooser')){
		class Cosmica_Fontawesome_Icon_Chooser extends WP_Customize_Control {
			public $type = 'cosmica-icon';

			public function render_content() {
			?>
	        <label>
	            <span class="customize-control-title">
	            <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) {?>
	          	<span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	         	</span>
	          	<?php }?>
	            <div class="cosmica-selected-icon">
	              <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	              <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="cosmica-icon-list clearfix">
	                <?php
						$font_awesome_icon_array = cosmica_font_awesome_icon_array();
						foreach ($font_awesome_icon_array as $font_awesome_icon) {
							$icon_class = $this->value() == $font_awesome_icon ? 'icon-active' : '';
							echo '<li class=' . $icon_class . '><i class="' . $font_awesome_icon . '"></i></li>';
						}
					?>
	            </ul>
	            <input type="hidden" value="<?php $this->value();?>" <?php $this->link();?> />
	        </label>
		    <?php
			}
		}
		}
		
		if(!class_exists('Cosmica_Upsale_Section_Control')){
		class Cosmica_Upsale_Section_Control extends WP_Customize_Section {
			public $type = 'cosmica-upsell';
			public $pro_text = '';
			public $pro_url = '';
			public function render() {
				?>
			    <li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="accordion-section control-section cannot-expand <?php echo esc_attr('control-section-' . $this->type); ?>">
			        <h3 class="accordion-section-title cosmica-upsale">
			        	<?php echo esc_html($this->title); ?>
			        	<?php if($this->pro_text && $this->pro_url): ?>
			          	<a href="<?php echo esc_url($this->pro_url); ?>" target="_blank" class="theme-upsale-button button button-secondary alignright" id="cosmica-pro-button"><?php echo esc_html($this->pro_text); ?></a>
			          	<?php endif; ?>
			        </h3>
			    </li>
			    <?php
			}

		}
		}

		if(!class_exists('Cosmica_Pro_Customize_Control')){
		class Cosmica_Pro_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	              <a href="<?php echo esc_url('https://codeins.org/themes/cosmica-responsive-wordpress-theme/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-upgrade-pro"><?php _e('UPGRADE  TO PRO ', 'cosmica');?></a>
	            </div>
	            <div class="pro-vesrion">
	             <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better. ', 'cosmica');?>
	            </div>
	          <?php
			}
		}
		}

		if(!class_exists('Cosmica_Review_Customize_Control')){
		class Cosmica_Review_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	             	<a href="<?php echo esc_url('https://wordpress.org/support/theme/cosmica/reviews/?filter=5'); ?>" target="_blank" class="cdns-upgrade" id="cdns-reviwe"><?php _e('LIKE COSMICA..?  GIVE US 5 STAR', 'cosmica');?></a>
	            </div>

	          <?php
			}
		}
		}

		if(!class_exists('Cosmica_Docs_Customize_Control')){
		class Cosmica_Docs_Customize_Control extends WP_Customize_Control {

			public function render_content() {
				?>
	            <div class="cosmica-pro">
	              <a href="<?php echo esc_url('https://www.codeins.org/documentation/'); ?>" target="_blank" class="cdns-upgrade" id="cdns-docs"><?php _e('DOCUMENTATION', 'cosmica');?></a>
	            </div>
	          <?php
			}
		}
		}
	}
}
add_action('plugins_loaded', 'cosmica_advanced_sections_init');

function cosmica_advanced_sections_is_cosmica_active(){
	$theme = wp_get_theme();
	if (strtoupper($theme->name) === 'COSMICA' || strtoupper($theme->parent_theme) === 'COSMICA') {
		return true;	
	}
	return false;
}

function cosmica_advanced_sections_activation() {
	
	if (cosmica_advanced_sections_is_cosmica_active()) {

		$front_page = get_option('show_on_front');
		if ($front_page !== 'page') {

			$page_home    = get_page_by_path('home');
			$page_home_id = 0;
			if (empty($page_home)) {
				$page_home_id = wp_insert_post(array(
					'post_type'   => 'page',
					'post_title'  => esc_html__('Home', 'cosmica-advance-sections'),
					'post_status' => 'publish',
					'post_name'   => 'home',
				));
			} else if (absint($page_home->ID) > 0) {
				$page_home_id = $page_home->ID;
			}

			$page_blog    = get_page_by_path('blog');
			$page_blog_id = 0;
			if (empty($page_blog)) {
				$page_blog_id = wp_insert_post(array(
					'post_type'   => 'page',
					'post_title'  => esc_html__('Blog', 'cosmica-advance-sections'),
					'post_status' => 'publish',
					'post_name'   => 'blog',
				));
			} else if (absint($page_blog->ID) > 0) {
				$page_blog_id = $page_blog->ID;
			}

			if (absint($page_home_id) > 0 && absint($page_blog_id) > 0) {
				update_option('page_on_front', $page_home_id);
				update_option('page_for_posts', $page_blog_id);
				update_option('show_on_front', 'page');
			}
		}
	}
}
register_activation_hook( __FILE__, 'cosmica_advanced_sections_activation' );