<?php

namespace WPT_Divi_Gravity_Modules\GravityFormModule;

/**
 * .
 */
class Fields {
    protected $container;

    protected $module;

    /**
     * Constructor.
     */
    public function __construct( $container ) {
        $this->container = $container;
    }

    /**
     * Set the module instance.
     */
    public function set_module( $module ) {
        $this->module = $module;
    }

    /**
     * Get selector
     */
    public function get_selector( $key ) {
        $selectors = $this->get_selectors();
        return $selectors[$key]['selector'];
    }

    /**
     * List of selectors
     */
    public function get_selectors() {
        return [
            'form_fields_container'                   => [
                'selector' => '%%order_class%% .gform_fields',
                'label'    => esc_html__( 'Form Fields Container', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'title'                                   => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper h3.gform_title, {$this->module->main_css_element} div.gform_wrapper .gform_heading h2.gform_title",
                'name'     => 'Title',
            ],
            'description'                             => [
                'selector' => '%%order_class%% div.gform_wrapper .gform_description',
                'name'     => 'Description',
            ],
            'field_container'                         => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield",
                'name'     => 'Field Container',
            ],
            'label'                                   => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper label.gfield_label, {$this->module->main_css_element} div.gform_wrapper legend.gfield_label",
                'name'     => 'Label',
            ],
            'sub_label'                               => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper li.gfield div.ginput_complex label:not([class^=gfield_label]), {$this->module->main_css_element} div.gform_wrapper  div.ginput_complex label:not([class^=gfield_label])",
                'name'     => 'Sub Label',
            ],
            'field_description'                       => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper li.gfield div.gfield_description:not([class*=\"gfield_consent_description\"]), {$this->module->main_css_element} div.gform_wrapper div.gfield_description:not([class*=\"gfield_consent_description\"])",
                'name'     => 'Field Description',
            ],
            'input_general'                           => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {$this->module->main_css_element} .gform_wrapper .gform_fields .gfield textarea, {$this->module->main_css_element} .gform_wrapper .gfield_checkbox label, {$this->module->main_css_element} .gform_wrapper .gfield_radio  label, {$this->module->main_css_element} .gform_wrapper .gfield select, {$this->module->main_css_element} .gform_wrapper .gfield select",
                'name'     => 'Input General',
            ],
            'placeholder'                             => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])::placeholder, {$this->module->main_css_element} .gform_wrapper .gform_fields .gfield textarea::placeholder, {$this->module->main_css_element} .gform_wrapper .gfield_checkbox label::placeholder, {$this->module->main_css_element} .gform_wrapper .gfield_radio label::placeholder, {$this->module->main_css_element} .gform_wrapper .gfield select::placeholder",
                'name'     => 'Input Placeholder',
            ],
            'checkbox_radio_text'                     => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper div.ginput_container_checkbox .gfield_checkbox label, {$this->module->main_css_element} .gform_wrapper div.ginput_container_radio .gfield_radio label",
                'name'     => 'Button',
            ],
            'checked_checkbox_option_text'            => [
                'selector' => '%%order_class%% .gform_wrapper div.ginput_container_checkbox .gfield-choice-input:checked + label',
                'label'    => esc_html__( 'Checked Checkbox Text', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'checked_radio_option_text'               => [
                'selector' => '%%order_class%% .gform_wrapper div.ginput_container_radio .gfield-choice-input:checked + label',
                'label'    => esc_html__( 'Checked Radio Text', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'checkbox_field'                          => [
                'selector' => '%%order_class%% .gform_wrapper input[type=checkbox]',
                'label'    => esc_html__( 'Checkbox Input', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'radio_field'                             => [
                'selector' => '%%order_class%% .gform_wrapper input[type=radio]',
                'label'    => esc_html__( 'Radio Input', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'checkbox_radio_input'                    => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper input[type=checkbox], {$this->module->main_css_element} .gform_wrapper input[type=radio]",
                'name'     => 'Checkbox Input',
            ],
            'checkbox_radio_option_container'         => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper div.ginput_container_checkbox .gfield_checkbox li label, {$this->module->main_css_element} .gform_wrapper div.ginput_container_radio .gfield_radio li label, {$this->module->main_css_element} .gform_wrapper div.ginput_container_checkbox .gfield_checkbox div, {$this->module->main_css_element} .gform_wrapper div.ginput_container_radio .gfield_radio div",
                'name'     => 'Checkbox/Radio Option Container',
            ],
            'consent_checkbox_label'                  => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gfield div.ginput_container_consent label",
                'name'     => 'Consent Checkbox Label',
            ],
            'consent_container'                       => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gform_fields .gfield div.ginput_container_consent",
                'name'     => 'Consent Container',
            ],
            'consent_description'                     => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield div.gfield_description.gfield_consent_description",
                'name'     => 'Consent Description',
            ],
            'validation_error_container'              => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper div.validation_error, {$this->module->main_css_element} div.gform_wrapper .gform_validation_errors",
                'name'     => 'Validation Error Container',
            ],
            'validation_error_heading'                => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper div.validation_error, {$this->module->main_css_element} div.gform_wrapper .gform_validation_errors h2",
                'name'     => 'Validation Error Heading',
            ],
            'field_validation_error'                  => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield.gfield_error div.gfield_description.validation_message",
                'name'     => 'Field Validation Error',
            ],
            'error_field_container'                   => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gfield.gfield_error, {$this->module->main_css_element} .gform_wrapper .gfield_validation_message, {$this->module->main_css_element}  .gform_wrapper .validation_message",
                'name'     => 'Error Field Container',
            ],
            'confirmation_message'                    => [
                'selector' => "{$this->module->main_css_element} div.gform_confirmation_wrapper div.gform_confirmation_message",
                'name'     => 'Confirmation Message',
            ],
            'confirmation_wrapper'                    => [
                'selector' => "{$this->module->main_css_element} div.gform_confirmation_wrapper",
                'name'     => 'Confirmation Wrapper',
            ],
            'progress_bar_title'                      => [
                'selector' => "{$this->module->main_css_element} .gf_progressbar_title,  {$this->module->main_css_element} .gf_progressbar_wrapper .gf_progressbar_title ",
                'name'     => 'Progress Bar Title',
            ],
            'progress_bar_percentage'                 => [
                'selector' => "{$this->module->main_css_element} div.gf_progressbar_wrapper div.gf_progressbar div.gf_progressbar_percentage",
                'name'     => 'Progress Bar Percentage',
            ],
            'section_field'                           => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield.gsection",
                'name'     => 'Section Field Wrapper',
            ],
            'section_field_title'                     => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield.gsection .gsection_title",
                'name'     => 'Section Field Title',
            ],
            'section_field_description'               => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper .gfield.gsection .gsection_description",
                'name'     => 'Section Field Description',
            ],
            'text_field'                              => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file])",
                'name'     => 'Text Field',
            ],
            'number_field'                            => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper input[type=number]",
                'name'     => 'Text Field',
            ],
            'textarea_field'                          => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gfield textarea",
                'name'     => 'TextArea Field',
            ],
            'select_field'                            => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper select",
                'name'     => 'Select Field',
            ],
            'button'                                  => [
                'selector' => '%%order_class%% .et_pb_button:not(.gform_save_link)',
                'name'     => 'Button',
            ],
            'button_hover'                            => [
                'selector' => "'%%order_class%% .et_pb_button:hover",
                'name'     => 'Button Hover',
            ],
            'next_button'                             => [
                'selector' => '%%order_class%% .gform_next_button.et_pb_button',
                'name'     => 'Next Button',
            ],
            'next_button_hover'                       => [
                'selector' => '%%order_class%% .gform_next_button.et_pb_button:hover',
                'name'     => 'Next Button Hover',
            ],
            'previous_button'                         => [
                'selector' => '%%order_class%% .gform_previous_button.et_pb_button',
                'name'     => 'Previous Button',
            ],
            'previous_button_hover'                   => [
                'selector' => '%%order_class%% .gform_previous_button.et_pb_button:hover',
                'name'     => 'Previous Button Hover',
            ],
            'save_and_continue_button'                => [
                'selector' => '%%order_class%% .gform_wrapper .gform_save_link',
                'name'     => 'Save And Continue Button',
            ],
            'save_and_continue_button_hover'          => [
                'selector' => '%%order_class%% .gform_wrapper .gform_save_link:hover',
                'name'     => 'Save And Continue Button Hover',
            ],
            'save_and_continue_button_svg'            => [
                'selector' => '%%order_class%% .gform_wrapper .gform_save_link svg',
                'name'     => 'SVG - Save And Continue Button',
            ],
            'save_and_continue_button_svg_path'       => [
                'selector' => '%%order_class%% .gform_wrapper .gform_save_link svg path',
                'name'     => 'SVG Path - Save And Continue Button',
            ],
            'save_and_continue_button_svg_path_hover' => [
                'selector' => '%%order_class%% .gform_wrapper .gform_save_link:hover svg path',
                'name'     => 'SVG Path - Save And Continue Button (Hover)',
            ],
            'send_link_button'                        => [
                'selector' => '%%order_class%% .gform_wrapper input[type="submit"][name="gform_send_resume_link_button"]',
                'name'     => 'Send Link Button (Save & Continue)',
            ],
            'send_link_button_hover'                  => [
                'selector' => '%%order_class%% .gform_wrapper input[type="submit"][name="gform_send_resume_link_button"]:hover',
                'name'     => 'Send Link Button (Save & Continue)',
            ],
            'footer'                                  => [
                'selector' => "{$this->module->main_css_element} .gform_page_footer, {$this->module->main_css_element} .gform_footer, {$this->module->main_css_element} div[data-field-class='gform_editor_submit_container']",
                'name'     => 'Footer',
            ],
            'gf_left_half'                            => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper li.gfield.gf_left_half",
                'name'     => 'CSS Ready Class - gf_left_half',
            ],
            'gf_left_third_gf_middle_third'           => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper li.gfield.gf_left_third, {$this->module->main_css_element} .gform_wrapper li.gfield.gf_middle_third",
                'name'     => 'CSS Ready Class - gf_left_third + gf_middle_third',
            ],
            'gf_date_dropdown_date_field'             => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_date_dropdown_day,{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_date_dropdown_month,{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_date_dropdown_year,{$this->module->main_css_element} div.gform_wrapper div.ginput_container.ginput_container_date",
                'name'     => 'Date Drop Down & Date Field',
            ],
            'ampm_dropdown_field'                     => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_time_ampm",
                'name'     => 'AM/PM Drop Down Field',
            ],
            'time_fields'                             => [
                'selector' => "{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_time_minute,{$this->module->main_css_element} div.gform_wrapper div.ginput_container.gfield_time_hour,section%%order_class%% div.gform_wrapper div.ginput_container.gfield_time_ampm",
                'name'     => 'HH/MM Field',
            ],
            'asterisk'                                => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gfield_required",
                'name'     => 'Asterisk (Legend & Field)',
            ],
            'field_asterisk'                          => [
                'selector' => "{$this->module->main_css_element} .gform_wrapper .gfield_label .gfield_required",
                'name'     => 'Asterisk (Field)',
            ],
            'asterisk_text_legend'                    => [
                'selector' => 'section%%order_class%% .gform_wrapper .gform_required_legend',
                'name'     => 'Asterisk Legend Text',
            ],
            'product_title'                           => [
                'selector' => 'section%%order_class%% div.gform_wrapper .gfield--type-product label.gfield_label',
                'label'    => esc_html__( 'Product Title', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'product_description'                     => [
                'selector' => 'section%%order_class%% div.gform_wrapper .gfield--type-product div.gfield_description',
                'label'    => esc_html__( 'Product Description', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'product_price_label'                     => [
                'selector' => 'section%%order_class%% div.gform_wrapper .gfield--type-product .ginput_product_price_label',
                'label'    => esc_html__( 'Product Price Label', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'product_calculated_price'                => [
                'selector' => 'section%%order_class%% div.gform_wrapper .gfield--type-product .ginput_product_price',
                'label'    => esc_html__( 'Product Calculated Price', 'wp-tools-gravity-forms-divi-module' ),
            ],
        ];
    }

    public function checkbox_radio_field_fields() {
        $fields = [];
        return $fields;
    }

    public function confirmation_message_fields() {
        $fields = [];
        return $fields;
    }

    public function consent_checkbox_fields() {
        $fields = [];
        return $fields;
    }

    public function consent_description_fields() {
        $fields = [];
        return $fields;
    }

    public function description_fields() {
        $fields = [];
        return $fields;
    }

    /**
     * Field container
     */
    public function field_container_fields() {
        $fields = [];
        return $fields;
    }

    public function field_description_fields() {
        $fields = [];
        return $fields;
    }

    public function field_validation_error_fields() {
        $fields = [];
        return $fields;
    }

    public function footer_fields() {
        $fields = [];
        return $fields;
    }

    /**
     * Get default for given keys
     */
    public function get_default( $key ) {
        $defaults = $this->get_defaults();
        return ( isset( $defaults[$key] ) ? $defaults[$key] : '' );
    }

    /**
     * Get defaults
     */
    public function get_defaults() {
        $defaults = [
            'gravityform_id' => 'gf-0',
            'title'          => 'on',
            'description'    => 'on',
            'ajax'           => 'off',
            'tabindex'       => '0',
            'field_values'   => '',
        ];
        return $defaults;
    }

    /**
     * Get module fields
     */
    public function get_fields() {
        $fields = [];
        $fields['admin_label'] = [
            'label'       => __( 'Admin Label', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'text',
            'description' => 'This will change the label of the module in the builder for easy identification.',
        ];
        return $fields + $this->get_gravityform_shortcode_param_fields() + $this->footer_fields() + $this->description_fields() + $this->field_container_fields() + $this->input_container_fields() + $this->consent_description_fields() + $this->consent_checkbox_fields() + $this->input_general_fields() + $this->text_input_fields() + $this->select_field_fields() + $this->checkbox_radio_field_fields() + $this->label_fields() + $this->sub_label_fields() + $this->field_description_fields() + $this->validation_error_heading_fields() + $this->field_validation_error_fields() + $this->confirmation_message_fields() + $this->progress_bar_title_fields() + $this->progress_bar_fields() + $this->section_field_title() + $this->section_field_description() + $this->section_field() + $this->gf_left_half_fields() + $this->gf_left_middle_third_fields() + $this->title_fields();
    }

    public function get_gravityform_shortcode_param_fields() {
        $fields = [];
        $fields['gravityform_id'] = [
            'label'       => esc_html__( 'Form ID', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'select',
            'options'     => $this->container['gravityform']->get_active_form_options(),
            'tab_slug'    => 'general',
            'toggle_slug' => 'main_content',
            'description' => esc_html__( 'Select the gravity form', 'wp-tools-gravity-forms-divi-module' ),
            'default'     => $this->get_default( 'gravityform_id' ),
        ];
        $fields['title'] = [
            'label'       => esc_html__( 'Show Title', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'yes_no_button',
            'options'     => [
                'off' => esc_html__( 'Off', 'wp-tools-gravity-forms-divi-module' ),
                'on'  => esc_html__( 'On', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'tab_slug'    => 'general',
            'toggle_slug' => 'main_content',
            'description' => esc_html__( 'Select `Yes` to show title', 'wp-tools-gravity-forms-divi-module' ),
            'default'     => $this->get_default( 'title' ),
        ];
        $fields['description'] = [
            'label'       => esc_html__( 'Show Description', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'yes_no_button',
            'options'     => [
                'off' => esc_html__( 'Off', 'wp-tools-gravity-forms-divi-module' ),
                'on'  => esc_html__( 'On', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'tab_slug'    => 'general',
            'toggle_slug' => 'main_content',
            'description' => esc_html__( 'Select `Yes` to show description', 'wp-tools-gravity-forms-divi-module' ),
            'default'     => $this->get_default( 'description' ),
        ];
        $fields['ajax'] = [
            'label'       => esc_html__( 'Enable Ajax', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'yes_no_button',
            'options'     => [
                'off' => esc_html__( 'Off', 'wp-tools-gravity-forms-divi-module' ),
                'on'  => esc_html__( 'On', 'wp-tools-gravity-forms-divi-module' ),
            ],
            'tab_slug'    => 'general',
            'toggle_slug' => 'main_content',
            'description' => esc_html__( 'Select `Yes` to submit form via ajax', 'wp-tools-gravity-forms-divi-module' ),
            'default'     => $this->get_default( 'ajax' ),
        ];
        $fields['tabindex'] = [
            'label'          => esc_html__( 'Tab Index', 'wp-tools-gravity-forms-divi-module' ),
            'type'           => 'range',
            'range_settings' => [
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ],
            'tab_slug'       => 'general',
            'toggle_slug'    => 'main_content',
            'description'    => esc_html__( 'Specify the starting tab index for the fields of this form.', 'wp-tools-gravity-forms-divi-module' ),
            'allowed_units'  => [''],
            'default_unit'   => '',
            'default'        => $this->get_default( 'tabindex' ),
        ];
        $fields['field_values'] = [
            'label'       => esc_html__( 'Field Values', 'wp-tools-gravity-forms-divi-module' ),
            'type'        => 'text',
            'tab_slug'    => 'general',
            'toggle_slug' => 'main_content',
            'description' => esc_html__( 'Specify the default field values. Example: field_values=’check=First Choice,Second Choice’.', 'wp-tools-gravity-forms-divi-module' ),
            'default'     => $this->get_default( 'field_values' ),
        ];
        return $fields;
    }

    /**
     * Input container
     */
    public function input_container_fields() {
        $fields = [];
        return $fields;
    }

    public function input_general_fields() {
        $fields = [];
        return $fields;
    }

    public function label_fields() {
        $fields = [];
        return $fields;
    }

    public function progress_bar_fields() {
        $fields = [];
        return $fields;
    }

    public function progress_bar_title_fields() {
        $fields = [];
        return $fields;
    }

    public function section_field() {
        $fields = [];
        return $fields;
    }

    public function section_field_description() {
        $fields = [];
        return $fields;
    }

    public function section_field_title() {
        $fields = [];
        return $fields;
    }

    public function select_field_fields() {
        $fields = [];
        return $fields;
    }

    public function sub_label_fields() {
        $fields = [];
        return $fields;
    }

    public function text_input_fields() {
        $fields = [];
        return $fields;
    }

    /**
     * Title fields
     */
    public function title_fields() {
        $fields = [];
        return $fields;
    }

    public function validation_error_heading_fields() {
        $fields = [];
        return $fields;
    }

    public function gf_left_half_fields() {
        $fields = [];
        return $fields;
    }

    public function gf_left_middle_third_fields() {
        $fields = [];
        return $fields;
    }

}
