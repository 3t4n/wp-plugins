<?php

// no direct access

if (!defined('ABSPATH')) { die; }

class HeartyPromoteLightSettingsPage {

    private $options;
    private $number_of_settings_instances;
    private $number_of_content_items;

    public function __construct() {

    	require_once('params.php');

		add_action('admin_menu', array($this,'add_plugin_page'));
		add_action('admin_init', array( $this, 'page_init'));

    }

    public function add_plugin_page() {

		add_options_page(
			'Hearty Promote Light Settings',
			'Hearty Promote Light',
			'manage_options',
			'heartypromotelight-setting-admin',
			array($this,'create_admin_page')
		);

    }

    public function create_admin_page() {

    ?>

        <div class="hearty-admin">
            <h1 class="hearty-admin-title">Hearty Promote Light | Settings</h1>
            <h5 class="hearty-admin-description"><a href="https://www.heartyplugins.com/wordpress-plugins/free-plugins/product/hearty-promote-light" target="_blank">See details and documentation</a></h5>
            <form method="post" action="options.php" class="hearty-admin-form" autocomplete="off">
                <?php
                    settings_fields('heartypromotelight_options_group');
                    do_settings_sections('heartypromotelight-setting-admin');
                    submit_button();
                ?>
            </form>
        </div>

    <?php

    }

    public function print_basic_section_info() { return false; }
    public function print_content_options_section_info() { return false; }
    public function print_global_settings_section_info() { return false; }

    public function page_init() {

        $this->options = get_option('heartypromotelight_options');
        $this->number_of_settings_instances = 1;
        $this->number_of_content_items = 4;

        register_setting(
            'heartypromotelight_options_group',
            'heartypromotelight_options',
            array($this, 'sanitize')
        );

        $this->generate_sections();

        HeartyPromoteLightParams::generate_fields($this, $this->number_of_settings_instances, $this->number_of_content_items);

    }

	public function generate_sections() {

        add_settings_section(
            'heartypromotelight_global_settings_section',
            '<a href="#"><i class="far fa-edit"></i>&nbsp; Global Settings <span class="hearty-admin-icon hrty-pull-right">[-]</span></a>',
            array($this,'print_global_settings_section_info'),
            'heartypromotelight-setting-admin'
        );

        add_settings_section(
            'heartypromotelight_basic_section',
            '<a href="#"><i class="far fa-check-square"></i>&nbsp; Basic Settings <span class="hearty-admin-icon hrty-pull-right">[+]</span></a>',
            array($this,'print_basic_section_info'),
            'heartypromotelight-setting-admin'
        );

		for ($i = 1; $i <= $this->number_of_content_items; $i++) {

			add_settings_section(
				'heartypromotelight_content_options_section_'.$i,
				'<a href="#"><i class="far fa-clone"></i>&nbsp; Content Item '.$i.' <span class="hearty-admin-icon hrty-pull-right">[+]</span></a>',
				array($this,'print_content_options_section_info'),
				'heartypromotelight-setting-admin'
			);

		}

	}

    public function fields_callback($args) {

    	$output = '';

        if ($args['type'] == "text") {

        	$output .= '<input type="text" class="'.$args["class"].'" id="'.$args["id"].'" name="heartypromotelight_options['.$args["id"].']" value="'.(isset($this->options[$args["id"]]) ? esc_attr($this->options[$args["id"]]) : $args["default"]).'" />';

        } else if ($args['type'] == "textarea") {

        	$output .= '<textarea id="'.$args["id"].'" name="heartypromotelight_options['.$args["id"].']">'.(isset($this->options[$args["id"]]) ? esc_attr($this->options[$args["id"]]) : $args["default"]).'</textarea>';

        } else if ($args['type'] == "select") {

        	$output .= '<select id="'.$args["id"].'" name="heartypromotelight_options['.$args["id"].']">';
            if (!isset($args["force"])) {
                $svalue = isset($this->options[$args["id"]]) ? esc_attr($this->options[$args["id"]]) : $args["default"];
            } else {
                $svalue = $args["default"];
            }

            foreach ($args['options'] as $k => $v) {

                $cselected = ($svalue == $k) ? ' selected' : '';
                $output .= '<option value="'.$k.'"'.$cselected.'>'.$v.'</option>';

            }

            $output .= '</select>';

        } else if ($args['type'] == "pills") {

        	$svalue = isset($this->options[$args["id"]]) ? esc_attr($this->options[$args["id"]]) : $args["default"];
        	$output .= '<input type="hidden" id="'.$args["id"].'" name="heartypromotelight_options['.$args["id"].']" value="'.$svalue.'" />';
            $output .= '<ul class="hrty-nav hrty-nav-pills">';

            for ($i = 1; $i <= $this->number_of_settings_instances; $i++) {

            	$active_cls = ($i == $svalue) ? ' hrty-active' : '';
            	$output .= '<li class="'.$active_cls.'"><a data-ivalue="'.$i.'" data-toggle="hrty-tab" href="#hrtyinst'.$i.'">Instance '.$i.'</a></li>';

            }

            $output .= '</ul>';

		}

       $output .= (!empty($args["description"])) ? '<p class="description">'.$args["description"].'</p>' : '';

       echo $output;

    }

    public function media_callback($args) {

    	$output = '';

        if ($args['type'] == "text") {

			$output .= '<input id="'.$args["id"].'" type="text" name="heartypromotelight_options['.$args["id"].']" value="'.(isset($this->options[$args["id"]]) ? esc_attr($this->options[$args["id"]]) : $args["default"]).'" />';
			$output .= '<input id="'.$args["id"].'_image_upload_button" class="button hrty-upload" type="button" value="Choose Image" />';

        }

        $output .= (!empty($args["description"])) ? '<p class="description">'.$args["description"].'</p>' : '';

        echo $output;

	}

    public function sanitize($input) {

        $new_input = array();

        foreach ($input as $k => $v) {
			$new_input[$k] = sanitize_textarea_field($v);
        }

        return $new_input;
    }

}