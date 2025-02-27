<?php
add_action( 'admin_menu', 'emi_calculator_generator_admin_menu' );
add_action( 'admin_init', 'emi_calculator_generator_settings' );

function emi_calculator_generator_admin_menu() {
    add_menu_page(
        'Emi Calculator', // page <title>Title</title>
        'Emi Calculator', // menu link text
        'manage_options', // capability to access the page
        'emi_calculator_generator', // page URL slug
        'emi_calculator_generator_page', // callback function /w content
        'dashicons-calculator', // menu icon
        14
    );
}

function emi_calculator_generator_page() {
    ?>
    <div class="wrap">
        <h1>EMI Calculator Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'emi_calculator_generator' );
            do_settings_sections( 'emi_calculator_generator' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings and fields
function emi_calculator_generator_settings() {
    // Register the settings
    register_setting( 'emi_calculator_generator', 'emi_body_back_color' );
    register_setting( 'emi_calculator_generator', 'emi_from_back_color' );
    register_setting( 'emi_calculator_generator', 'emi_result_back_color' );
    register_setting( 'emi_calculator_generator', 'emi_int_symb_back_color' );
    register_setting( 'emi_calculator_generator', 'emi_intf_border_color' );
    register_setting( 'emi_calculator_generator', 'emi_chart_type' );
    register_setting( 'emi_calculator_generator', 'emi_principal_amount_color' );
    register_setting( 'emi_calculator_generator', 'emi_intereset_amount_color' );
    register_setting( 'emi_calculator_generator', 'emi_slider_activ_color' );
    register_setting( 'emi_calculator_generator', 'emi_slider_progress_color' );
    register_setting( 'emi_calculator_generator', 'emi_slider_thumb_color' );
    register_setting( 'emi_calculator_generator', 'emi_enable_chart' );
    register_setting( 'emi_calculator_generator', 'loan_emi_text' );
    register_setting( 'emi_calculator_generator', 'total_intereset_text' );
    register_setting( 'emi_calculator_generator', 'total_payment_text' );
    register_setting( 'emi_calculator_generator', 'principal_amou_text' );
    register_setting( 'emi_calculator_generator', 'interest_amou_text' );
    register_setting( 'emi_calculator_generator', 'min_loan_amount' );
    register_setting( 'emi_calculator_generator', 'max_loan_amount' );
    register_setting( 'emi_calculator_generator', 'min_interest_rate' );
    register_setting( 'emi_calculator_generator', 'max_interest_rate' );
    register_setting( 'emi_calculator_generator', 'min_year_loan_term' );
    register_setting( 'emi_calculator_generator', 'max_year_loan_term' );
    register_setting( 'emi_calculator_generator', 'min_month_loan_term' );
    register_setting( 'emi_calculator_generator', 'max_month_loan_term' );

    // Add settings sections and fields
    add_settings_section( 'emi_calculator_general_section', 'General Settings', null, 'emi_calculator_generator' );
    
    // Body Background Color
    add_settings_field( 'emi_body_back_color', 'Body Background Color', 'emi_body_back_color_field', 'emi_calculator_generator', 'emi_calculator_general_section' );
    // Form Background Color
    add_settings_field( 'emi_from_back_color', 'Form Background Color', 'emi_from_back_color_field', 'emi_calculator_generator', 'emi_calculator_general_section' );
    // Result Background Color
    add_settings_field( 'emi_result_back_color', 'Result Background Color', 'emi_result_back_color_field', 'emi_calculator_generator', 'emi_calculator_general_section' );
    // Input Field Symbol Background Color
    add_settings_field( 'emi_int_symb_back_color', 'Input Field Symbol Background Color', 'emi_int_symb_back_color_field', 'emi_calculator_generator', 'emi_calculator_general_section' );
    // Input Field Border Color
    add_settings_field( 'emi_intf_border_color', 'Input Field Border Color', 'emi_intf_border_color_field', 'emi_calculator_generator', 'emi_calculator_general_section' );
    
    // Chart Style
    add_settings_section( 'emi_calculator_chart_section', 'Chart Style', null, 'emi_calculator_generator' );
    add_settings_field( 'emi_chart_type', 'Select Chart Type', 'emi_chart_type_field', 'emi_calculator_generator', 'emi_calculator_chart_section' );
    add_settings_field( 'emi_principal_amount_color', 'Principal Amount Color', 'emi_principal_amount_color_field', 'emi_calculator_generator', 'emi_calculator_chart_section' );
    add_settings_field( 'emi_intereset_amount_color', 'Interest Amount Color', 'emi_intereset_amount_color_field', 'emi_calculator_generator', 'emi_calculator_chart_section' );

    // Slider Style
    add_settings_section( 'emi_calculator_slider_section', 'Slider Style', null, 'emi_calculator_generator' );
    add_settings_field( 'emi_slider_activ_color', 'Slider Active Color', 'emi_slider_activ_color_field', 'emi_calculator_generator', 'emi_calculator_slider_section' );
    add_settings_field( 'emi_slider_progress_color', 'Slider Progress Color', 'emi_slider_progress_color_field', 'emi_calculator_generator', 'emi_calculator_slider_section' );
    add_settings_field( 'emi_slider_thumb_color', 'Slider Thumb Color', 'emi_slider_thumb_color_field', 'emi_calculator_generator', 'emi_calculator_slider_section' );

    // Result Display Options
    add_settings_section( 'emi_calculator_result_section', 'Result Display Options', null, 'emi_calculator_generator' );
    add_settings_field( 'emi_enable_chart', 'Display Result with Chart', 'emi_enable_chart_field', 'emi_calculator_generator', 'emi_calculator_result_section' );

    // Text Settings
    add_settings_section( 'emi_calculator_text_section', 'Text Settings', null, 'emi_calculator_generator' );
    add_settings_field( 'loan_emi_text', 'Loan EMI Text', 'loan_emi_text_field', 'emi_calculator_generator', 'emi_calculator_text_section' );
    add_settings_field( 'total_intereset_text', 'Total Interest Text', 'total_intereset_text_field', 'emi_calculator_generator', 'emi_calculator_text_section' );
    add_settings_field( 'total_payment_text', 'Total Payment Text', 'total_payment_text_field', 'emi_calculator_generator', 'emi_calculator_text_section' );
    add_settings_field( 'principal_amou_text', 'Principal Amount Text', 'principal_amou_text_field', 'emi_calculator_generator', 'emi_calculator_text_section' );
    add_settings_field( 'interest_amou_text', 'Interest Amount Text', 'interest_amou_text_field', 'emi_calculator_generator', 'emi_calculator_text_section' );

    // Form Settings
    add_settings_section( 'emi_calculator_form_section', 'Form Settings', null, 'emi_calculator_generator' );
    add_settings_field( 'min_loan_amount', 'Minimum Loan Amount', 'min_loan_amount_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'max_loan_amount', 'Maximum Loan Amount', 'max_loan_amount_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'min_interest_rate', 'Minimum Interest Rate', 'min_interest_rate_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'max_interest_rate', 'Maximum Interest Rate', 'max_interest_rate_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'min_year_loan_term', 'Minimum Year Loan Term', 'min_year_loan_term_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'max_year_loan_term', 'Maximum Year Loan Term', 'max_year_loan_term_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'min_month_loan_term', 'Minimum Month Loan Term', 'min_month_loan_term_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
    add_settings_field( 'max_month_loan_term', 'Maximum Month Loan Term', 'max_month_loan_term_field', 'emi_calculator_generator', 'emi_calculator_form_section' );
}

// Define the field display functions
function emi_body_back_color_field() {
    $value = get_option( 'emi_body_back_color', '#ffffff' );
    echo '<input type="text" name="emi_body_back_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ffffff" data-alpha-enabled="true">';
}

function emi_from_back_color_field() {
    $value = get_option( 'emi_from_back_color', '#ffffff' );
    echo '<input type="text" name="emi_from_back_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ffffff" data-alpha-enabled="true">';
}

function emi_result_back_color_field() {
    $value = get_option( 'emi_result_back_color', '#ffffff' );
    echo '<input type="text" name="emi_result_back_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ffffff" data-alpha-enabled="true">';
}

function emi_int_symb_back_color_field() {
    $value = get_option( 'emi_int_symb_back_color', '#ffffff' );
    echo '<input type="text" name="emi_int_symb_back_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ffffff" data-alpha-enabled="true">';
}

function emi_intf_border_color_field() {
    $value = get_option( 'emi_intf_border_color', '#000000' );
    echo '<input type="text" name="emi_intf_border_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#000000" data-alpha-enabled="true">';
}

// Define chart type radio buttons
function emi_chart_type_field() {
    $value = get_option( 'emi_chart_type', 'doughnut_chart' );
    echo '<input type="radio" name="emi_chart_type" value="doughnut_chart" ' . checked( 'doughnut_chart', $value, false ) . '> Doughnut ';
    echo '<input type="radio" name="emi_chart_type" value="bar_chart" ' . checked( 'bar_chart', $value, false ) . '> Bar ';
    echo '<input type="radio" name="emi_chart_type" value="pie_chart" ' . checked( 'pie_chart', $value, false ) . '> Pie ';
    echo '<input type="radio" name="emi_chart_type" value="polar_area_chart" ' . checked( 'polar_area_chart', $value, false ) . '> Polar Area ';
}

function emi_principal_amount_color_field() {
    $value = get_option( 'emi_principal_amount_color', '#00ff00' );
    echo '<input type="text" name="emi_principal_amount_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#00ff00" data-alpha-enabled="true">';
}

function emi_intereset_amount_color_field() {
    $value = get_option( 'emi_intereset_amount_color', '#ff0000' );
    echo '<input type="text" name="emi_intereset_amount_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ff0000" data-alpha-enabled="true">';
}

function emi_slider_activ_color_field() {
    $value = get_option( 'emi_slider_activ_color', '#0000ff' );
    echo '<input type="text" name="emi_slider_activ_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#0000ff" data-alpha-enabled="true">';
}

function emi_slider_progress_color_field() {
    $value = get_option( 'emi_slider_progress_color', '#00ff00' );
    echo '<input type="text" name="emi_slider_progress_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#00ff00" data-alpha-enabled="true">';
}

function emi_slider_thumb_color_field() {
    $value = get_option( 'emi_slider_thumb_color', '#ff00ff' );
    echo '<input type="text" name="emi_slider_thumb_color" value="' . esc_attr( $value ) . '" class="color-picker" data-default-color="#ff00ff" data-alpha-enabled="true">';
}

function emi_enable_chart_field() {
    $value = get_option( 'emi_enable_chart', 'yes' );
    echo '<input type="checkbox" name="emi_enable_chart" value="yes" ' . checked( 'yes', $value, false ) . '> Enable Chart ';
}

function loan_emi_text_field() {
    $value = get_option( 'loan_emi_text', 'Loan EMI' );
    echo '<input type="text" name="loan_emi_text" value="' . esc_attr( $value ) . '">';
}

function total_intereset_text_field() {
    $value = get_option( 'total_intereset_text', 'Total Interest' );
    echo '<input type="text" name="total_intereset_text" value="' . esc_attr( $value ) . '">';
}

function total_payment_text_field() {
    $value = get_option( 'total_payment_text', 'Total Payment' );
    echo '<input type="text" name="total_payment_text" value="' . esc_attr( $value ) . '">';
}

function principal_amou_text_field() {
    $value = get_option( 'principal_amou_text', 'Principal Amount' );
    echo '<input type="text" name="principal_amou_text" value="' . esc_attr( $value ) . '">';
}

function interest_amou_text_field() {
    $value = get_option( 'interest_amou_text', 'Interest Amount' );
    echo '<input type="text" name="interest_amou_text" value="' . esc_attr( $value ) . '">';
}

function min_loan_amount_field() {
    $value = get_option( 'min_loan_amount', '5000' );
    echo '<input type="number" name="min_loan_amount" value="' . esc_attr( $value ) . '">';
}

function max_loan_amount_field() {
    $value = get_option( 'max_loan_amount', '1000000' );
    echo '<input type="number" name="max_loan_amount" value="' . esc_attr( $value ) . '">';
}

function min_interest_rate_field() {
    $value = get_option( 'min_interest_rate', '1' );
    echo '<input type="number" name="min_interest_rate" value="' . esc_attr( $value ) . '" step="0.1">';
}

function max_interest_rate_field() {
    $value = get_option( 'max_interest_rate', '30' );
    echo '<input type="number" name="max_interest_rate" value="' . esc_attr( $value ) . '" step="0.1">';
}

function min_year_loan_term_field() {
    $value = get_option( 'min_year_loan_term', '1' );
    echo '<input type="number" name="min_year_loan_term" value="' . esc_attr( $value ) . '">';
}

function max_year_loan_term_field() {
    $value = get_option( 'max_year_loan_term', '30' );
    echo '<input type="number" name="max_year_loan_term" value="' . esc_attr( $value ) . '">';
}

function min_month_loan_term_field() {
    $value = get_option( 'min_month_loan_term', '12' );
    echo '<input type="number" name="min_month_loan_term" value="' . esc_attr( $value ) . '">';
}

function max_month_loan_term_field() {
    $value = get_option( 'max_month_loan_term', '360' );
    echo '<input type="number" name="max_month_loan_term" value="' . esc_attr( $value ) . '">';
}
