<?php
/*
AI Mortgage Calculator
Website: https://aimortgagecalculator.com
Author: Choice Home Mortgage
Author URI: http://choicehm.com
*/

if ( ! defined( 'ABSPATH' ) ) die;
if ( ! class_exists( 'AIMC_Refinance_Settings' ) ) die;

class AIMC_Refinance_Settings {

	public function __construct() {
		$this->globals = AI_Mortgage_Calculator::instance();
        $this->options = get_option( $this->globals['settings_options_key'] );

		add_action( 'admin_init', array( $this, 'settings_init' ), 10 );
	}


    public function settings_init() {
        register_setting(
            'aimc_refinance_config_group',
            $this->globals['settings_options_key'],
            [$this, 'sanitize']
        );
        
        add_settings_section(
            'general_section',
            'Refinance Calculator Settings',
            [$this, 'general_section_info'],
            'aimc_refinance_config'
        );

        add_settings_field(
            'title',
            'Title',
            [$this, 'title_callback'],
            'aimc_refinance_config',
            'general_section'
        );

        add_settings_field(
            'description',
            'Description',
            [$this, 'description_callback'],
            'aimc_refinance_config',
            'general_section'
        );


        add_settings_section(
            'default_values_section',
            'Default Values',
            [$this, 'default_values_section_info'],
            'aimc_refinance_config'
        );

        add_settings_field(
            'current_loan_amount',
            'Current Loan Amount',
            [$this, 'current_loan_amount_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'current_interest_rate',
            'Current Interest Rate',
            [$this, 'current_interest_rate_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'current_loan_term',
            'Current Loan Term',
            [$this, 'current_loan_term_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'new_loan_amount',
            'New Loan Amount',
            [$this, 'new_loan_amount_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'new_interest_rate',
            'New Interest Rate',
            [$this, 'new_interest_rate_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'new_loan_term',
            'New Loan Term',
            [$this, 'new_loan_term_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

        add_settings_field(
            'extra_principal_payment',
            'Extra Principal Payment',
            [$this, 'extra_principal_payment_callback'],
            'aimc_refinance_config',
            'default_values_section'
        );

    }

    public function general_section_info() {
        echo 'Use the following shortcode <code>[aimc calculator="refinance"]</code> to add our refinance calculator to any posts or pages <br /><br />';
    }

    public function default_values_section_info() {
        echo 'Configure the default values for the calculator form.';
    }

    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['refinance']['title'] ) )
            $new_input['refinance']['title'] = sanitize_text_field( $input['refinance']['title'] );

        if( isset( $input['refinance']['description'] ) )
            $new_input['refinance']['description'] = sanitize_text_field( $input['refinance']['description'] );

        if( isset( $input['refinance']['current_loan_amount'] ) )
            $new_input['refinance']['current_loan_amount'] = sanitize_text_field( $input['refinance']['current_loan_amount'] );

        if( isset( $input['refinance']['new_loan_amount'] ) )
            $new_input['refinance']['new_loan_amount'] = sanitize_text_field( $input['refinance']['new_loan_amount'] );

        if( isset( $input['refinance']['current_interest_rate'] ) )
            $new_input['refinance']['current_interest_rate'] = sanitize_text_field( $input['refinance']['current_interest_rate'] );

        if( isset( $input['refinance']['new_interest_rate'] ) )
            $new_input['refinance']['new_interest_rate'] = sanitize_text_field( $input['refinance']['new_interest_rate'] );

        if( isset( $input['refinance']['current_loan_term'] ) )
            $new_input['refinance']['current_loan_term'] = sanitize_text_field( $input['refinance']['current_loan_term'] );

        if( isset( $input['refinance']['new_loan_term'] ) )
            $new_input['refinance']['new_loan_term'] = sanitize_text_field( $input['refinance']['new_loan_term'] );

        if( isset( $input['refinance']['extra_principal_payment'] ) )
            $new_input['refinance']['extra_principal_payment'] = sanitize_text_field( $input['refinance']['extra_principal_payment'] );

        return $new_input;
    }

    public function title_callback() {
        printf(
            '<input type="text" class="regular-text" name="'.$this->globals['settings_options_key'].'[refinance][title]" value="%s" />',
            isset( $this->options['refinance']['title']) ? esc_attr( $this->options['refinance']['title']) : ''
        );
    }

    public function description_callback() {
        printf(
            '<textarea rows="3" class="regular-text" name="'.$this->globals['settings_options_key'].'[refinance][description]">%s</textarea>',
            isset( $this->options['refinance']['description']) ? esc_attr( $this->options['refinance']['description']) : ''
        );
    }

    public function current_loan_amount_callback() {
        printf(
            '$ <input type="text" name="'.$this->globals['settings_options_key'].'[refinance][current_loan_amount]" value="%s" />',
            isset( $this->options['refinance']['current_loan_amount']) ? esc_attr( $this->options['refinance']['current_loan_amount']) : ''
        );
    }

    public function new_loan_amount_callback() {
        printf(
            '$ <input type="text" name="'.$this->globals['settings_options_key'].'[refinance][new_loan_amount]" value="%s" />',
            isset( $this->options['refinance']['new_loan_amount']) ? esc_attr( $this->options['refinance']['new_loan_amount']) : ''
        );
    }

    public function current_interest_rate_callback() {
        printf(
            '<input type="text" name="'.$this->globals['settings_options_key'].'[refinance][current_interest_rate]" value="%s" /> %%',
            isset( $this->options['refinance']['current_interest_rate']) ? esc_attr( $this->options['refinance']['current_interest_rate']) : ''
        );
    }

    public function new_interest_rate_callback() {
        printf(
            '<input type="text" name="'.$this->globals['settings_options_key'].'[refinance][new_interest_rate]" value="%s" /> %%',
            isset( $this->options['refinance']['new_interest_rate']) ? esc_attr( $this->options['refinance']['new_interest_rate']) : ''
        );
    }

    public function current_loan_term_callback() {
        printf(
            '<input type="text" name="'.$this->globals['settings_options_key'].'[refinance][current_loan_term]" value="%s" /> Years',
            isset( $this->options['refinance']['current_loan_term']) ? esc_attr( $this->options['refinance']['current_loan_term']) : ''
        );
    }

    public function new_loan_term_callback() {
        printf(
            '<input type="text" name="'.$this->globals['settings_options_key'].'[refinance][new_loan_term]" value="%s" /> Years',
            isset( $this->options['refinance']['new_loan_term']) ? esc_attr( $this->options['refinance']['new_loan_term']) : ''
        );
    }

    public function extra_principal_payment_callback() {
        printf(
            '$ <input type="text" name="'.$this->globals['settings_options_key'].'[refinance][extra_principal_payment]" value="%s" />',
            isset( $this->options['refinance']['extra_principal_payment']) ? esc_attr( $this->options['refinance']['extra_principal_payment']) : ''
        );
    }
}

new AIMC_Refinance_Settings();