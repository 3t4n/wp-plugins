<?php

function trgb_admin_menu() {
    global $trgb_settings_page;
    $trgb_settings_page = add_submenu_page(
                            'learndash-lms', //The slug name for the parent menu
                            __( 'Grid Button', 'trgb-grid-button' ), //Page title
                            __( 'Grid Button', 'trgb-grid-button' ), //Menu title
                            'manage_options', //capability
                            'learndash-trgb-grid-button', //menu slug 
                            'trgb_admin_page' //function to output the content
                        );
}
add_action( 'admin_menu', 'trgb_admin_menu' );

function trgb_register_plugin_settings() {
    //texts
    register_setting( 'trgb-settings-group', 'trgb_open_non_logged_text' );
    register_setting( 'trgb-settings-group', 'trgb_open_enrolled_text' );
    register_setting( 'trgb-settings-group', 'trgb_open_completed_text' );
    register_setting( 'trgb-settings-group', 'trgb_open_non_enrolled_text' );

    register_setting( 'trgb-settings-group', 'trgb_free_non_logged_text' );
    register_setting( 'trgb-settings-group', 'trgb_free_enrolled_text' );
    register_setting( 'trgb-settings-group', 'trgb_free_completed_text' );
    register_setting( 'trgb-settings-group', 'trgb_free_non_enrolled_text' );

    register_setting( 'trgb-settings-group', 'trgb_paynow_non_logged_text' );
    register_setting( 'trgb-settings-group', 'trgb_paynow_enrolled_text' );
    register_setting( 'trgb-settings-group', 'trgb_paynow_completed_text' );
    register_setting( 'trgb-settings-group', 'trgb_paynow_non_enrolled_text' );

    register_setting( 'trgb-settings-group', 'trgb_recurring_non_logged_text' );
    register_setting( 'trgb-settings-group', 'trgb_recurring_enrolled_text' );
    register_setting( 'trgb-settings-group', 'trgb_recurring_completed_text' );
    register_setting( 'trgb-settings-group', 'trgb_recurring_non_enrolled_text' );

    register_setting( 'trgb-settings-group', 'trgb_closed_non_logged_text' );
    register_setting( 'trgb-settings-group', 'trgb_closed_enrolled_text' );
    register_setting( 'trgb-settings-group', 'trgb_closed_completed_text' );
    register_setting( 'trgb-settings-group', 'trgb_closed_non_enrolled_text' );

    //styles
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_background_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_font_size' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_uppercase' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_border_radius' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_logged_border_color' );

    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_background_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_font_size' );
    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_uppercase' );
    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_border_radius' );
    register_setting( 'trgb-settings-group', 'trgb_all_enrolled_border_color' );

    register_setting( 'trgb-settings-group', 'trgb_all_completed_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_completed_background_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_completed_font_size' );
    register_setting( 'trgb-settings-group', 'trgb_all_completed_uppercase' );
    register_setting( 'trgb-settings-group', 'trgb_all_completed_border_radius' );
    register_setting( 'trgb-settings-group', 'trgb_all_completed_border_color' );

    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_background_color' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_font_size' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_uppercase' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_border_radius' );
    register_setting( 'trgb-settings-group', 'trgb_all_non_enrolled_border_color' );
}
//call register settings function
add_action( 'admin_init', 'trgb_register_plugin_settings' );

function trgb_admin_page() {
    //basic variables
    $obs = 'When field is left blank, default ("See more...") or Custom Button Text, if defined on the course edit page, will be displayed.';
    $obs_completed = "If user has COMPLETED the course (if blank, text for enrolled user will be shown):";
    $submit_button_text = __( 'Save Text and Style', 'trgb-grid-button' );
?>

<div class="trgb-head-panel">
    <h1><?php esc_html_e( 'Grid Button for Learndash', 'trgb-grid-button' ); ?></h1>
    <p><?php esc_html_e( 'Custom Text and Style for LearnDash Course Grid Button', 'trgb-grid-button' ); ?></p>
</div>

<div class="wrap trgb-wrap-grid">


    <form method="post" action="options.php">

        <?php settings_fields( 'trgb-settings-group' ); ?>
        <?php do_settings_sections( 'trgb-settings-group' ); ?>

        <!-- <div class="trgb-form-fields">
            <span>* <?php //esc_html_e( $obs, 'trgb-grid-button' ); ?></span>
        </div> -->

        <div class="trgb-section-buttons">
            <button class="button-secondary button-secondary-active trgb-section-buttons" 
                    id="trgb-text-section-btn"
                    type="button"
                    onclick="displayTextSections(this.id)"
                    >
                <?php esc_html_e( 'Custom Text', 'trgb-grid-button' ); ?>
            </button>
            
            <button class="button-secondary trgb-section-buttons" 
                    id="trgb-style-section-btn"
                    type="button"
                    onclick="displayStyleSections(this.id)"
                    >
                <?php esc_html_e( 'Custom Style', 'trgb-grid-button' ); ?>
            </button>
        </div>

        <!-- ALL FORM FIELDS -->
        <div class="trgb-form-fields">

            <!-- TEXT SECTION - TEXT SECTION - TEXT SECTION - TEXT SECTION -->
            <div id="trgb-text-section">

                <div class="trgb-section-title" id="trgb-text-section-title">
                    <?php esc_html_e( 'CUSTOM TEXT', 'trgb-grid-button' ); ?>
                </div>

                <div class="trgb-open-fields trgb-apply-all-base-text">

                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'Course Access Mode OPEN', 'trgb-grid-button' ); ?>
                    </div>

                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                        </div>
                        <input  type="text" 
                                value="<?php echo esc_attr( get_option('trgb_open_non_logged_text') ); ?>"
                                name="<?php echo esc_attr( 'trgb_open_non_logged_text' ); ?>"
                        >
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for LOGGED user', 'trgb-grid-button' ); ?>
                        </div>
                        <span>
                            <?php esc_html_e( 'If user is ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                value="<?php echo esc_attr( get_option('trgb_open_enrolled_text') ); ?>"
                                name="<?php echo esc_attr( 'trgb_open_enrolled_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( $obs_completed, 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                value="<?php echo esc_attr( get_option('trgb_open_completed_text') ); ?>"
                                name="<?php echo esc_attr( 'trgb_open_completed_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( 'If user is NOT ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                value="<?php echo esc_attr( get_option('trgb_open_non_enrolled_text') ); ?>"
                                name="<?php echo esc_attr( 'trgb_open_non_enrolled_text' ); ?>"
                        >
                    </div>
                    <!-- APPLY TO ALL TEXT CHECKBOX -->
                    <div class="trgb-form-fields-group trgb-form-fields-group-apply-all">
                        <div class="trgb-form-div-text checkbox">
                            <label>
                                <span class="trgb-form-fields-text-label" id="apply-all-label-text">
                                    Apply to all below          
                                </span>
                                <input  class="trgb-checkbox" 
                                        type="checkbox" 
                                        id="trgb-checkbox-text-apply-all"
                                        onclick="clickApplyAll(this.id, 'text');"
                                >
                            </label>
                        </div>
                    </div>
                    <!-- END APPLY TO ALL TEXT CHECKBOX -->
                
                </div> <!-- end OPEN mode -->
                <hr>

                <div class="trgb-free-fields">
                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'Course Access Mode FREE', 'trgb-grid-button' ); ?>
                    </div>
                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                        </div>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_free_non_logged_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_free_non_logged_text' ); ?>"
                        >
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for LOGGED user', 'trgb-grid-button' ); ?>
                        </div>
                        <span>
                            <?php esc_html_e( 'If user is ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_free_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_free_enrolled_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( $obs_completed, 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_free_completed_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_free_completed_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( 'If user is NOT ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_free_non_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_free_non_enrolled_text' ); ?>"
                        >
                    </div>
                </div> <!-- end FREE mode -->
                <hr>

                <div class="trgb-paynow-fields">
                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'Course Access Mode PAYNOW', 'trgb-grid-button' ); ?>
                    </div>
                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                        </div>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_paynow_non_logged_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_paynow_non_logged_text' ); ?>"
                        >
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for LOGGED user', 'trgb-grid-button' ); ?>
                        </div>
                        <span>
                            <?php esc_html_e( 'If user is ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_paynow_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_paynow_enrolled_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( $obs_completed, 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_paynow_completed_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_paynow_completed_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( 'If user is NOT ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_paynow_non_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_paynow_non_enrolled_text' ); ?>"
                        >
                    </div>
                </div> <!-- end PAYNOW mode -->
                <hr>

                <div class="trgb-recurring-fields">
                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'Course Access Mode RECURRING', 'trgb-grid-button' ); ?>
                    </div>
                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                        </div>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_recurring_non_logged_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_recurring_non_logged_text' ); ?>"
                        >
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for LOGGED user', 'trgb-grid-button' ); ?>
                        </div>
                        <span>
                            <?php esc_html_e( 'If user is ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_recurring_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_recurring_enrolled_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( $obs_completed, 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_recurring_completed_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_recurring_completed_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( 'If user is NOT ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_recurring_non_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_recurring_non_enrolled_text' ); ?>"
                        >
                    </div>
                </div> <!-- end RECURRING mode -->
                <hr>

                <div class="trgb-closed-fields">
                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'Course Access Mode CLOSED', 'trgb-grid-button' ); ?>
                    </div>
                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                        </div>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_closed_non_logged_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_closed_non_logged_text' ); ?>"
                        >
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Text for LOGGED user', 'trgb-grid-button' ); ?>
                        </div>
                        <span>
                            <?php esc_html_e( 'If user is ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_closed_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_closed_enrolled_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( $obs_completed, 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_closed_completed_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_closed_completed_text' ); ?>"
                        >
                        <span>
                            <?php esc_html_e( 'If user is NOT ENROLLED in the course:', 'trgb-grid-button' ); ?>
                        </span>
                        <input  type="text" 
                                    value="<?php echo esc_attr( get_option('trgb_closed_non_enrolled_text') ); ?>"
                                    name="<?php echo esc_attr( 'trgb_closed_non_enrolled_text' ); ?>"
                        >
                    </div>
                </div> <!-- end CLOSED fields -->
            
            </div> 
            <!-- end TEXT SECTION - TEXT SECTION - TEXT SECTION - TEXT SECTION -->



            <!-- STYLE SECTION - STYLE SECTION - STYLE SECTION - STYLE SECTION -->
            <div id="trgb-style-section" style="display:none">

                <div class="trgb-section-title" id="trgb-style-section-title">
                    <?php esc_html_e( 'CUSTOM STYLE', 'trgb-grid-button' ); ?>
                </div>
                <!-- all courses styles fields -->
                <div class="trgb-all-courses-fields">
                    <div class="trgb-settings-title">
                        <?php esc_html_e( 'All Courses', 'trgb-grid-button' ); ?>
                    </div>

                    <div class="trgb-apply-all-base-style">
                        <div class="trgb-form-fields-group">
                            <div class="trgb-form-fields-label">    
                                <?php esc_html_e( 'Grid Button Style for NON-LOGGED (visitor)', 'trgb-grid-button' ); ?>
                            </div>

                            <div class="trgb-form-style-fields">

                                <div>
                                    <div class="trgb-form-fields-style-label">    
                                        <?php esc_html_e( 'Text color (CSS)', 'trgb-grid-button' ); ?>
                                    </div>
                                    <div class="trgb-form-fields-group">
                                        <input  type="text" 
                                                value="<?php echo esc_attr( get_option('trgb_all_non_logged_color') ); ?>"
                                                name="<?php echo esc_attr( 'trgb_all_non_logged_color' ); ?>"
                                                data-property="<?php echo esc_attr( 'color' ); ?>"
                                                >
                                        <span>Example: #fff</span>
                                    </div>
                                </div>

                                <div>
                                    <div class="trgb-form-fields-style-label">
                                        <?php esc_html_e( 'Background color (CSS)', 'trgb-grid-button' ); ?>
                                    </div>
                                    <div class="trgb-form-fields-group">
                                        <input  type="text" 
                                                value="<?php echo esc_attr( get_option('trgb_all_non_logged_background_color') ); ?>"
                                                name="<?php echo esc_attr( 'trgb_all_non_logged_background_color' ); ?>"
                                                data-property="<?php echo esc_attr( 'background_color' ); ?>"
                                                >
                                        <span>Example: #428BCA</span>
                                    </div>    
                                </div>

                                <div>
                                    <div class="trgb-form-fields-style-label">
                                        <?php esc_html_e( 'Font size (CSS)', 'trgb-grid-button' ); ?>
                                    </div>
                                    <div class="trgb-form-fields-group">
                                        <input  type="text" 
                                                value="<?php echo esc_attr( get_option('trgb_all_non_logged_font_size') ); ?>"
                                                name="<?php echo esc_attr( 'trgb_all_non_logged_font_size' ); ?>"
                                                data-property="<?php echo esc_attr( 'font_size' ); ?>"
                                                >
                                        <span>Example: 13px</span>
                                    </div>    
                                </div>

                                <div>
                                    <div class="trgb-form-fields-style-label">
                                        <?php esc_html_e( 'Border Color (CSS)', 'trgb-grid-button' ); ?>
                                    </div>
                                    <div class="trgb-form-fields-group">
                                        <input  type="text" 
                                                value="<?php echo esc_attr( get_option('trgb_all_non_logged_border_color') ); ?>"
                                                name="<?php echo esc_attr( 'trgb_all_non_logged_border_color' ); ?>"
                                                data-property="<?php echo esc_attr( 'border_color' ); ?>"
                                                >
                                        <span>Example: #357ebd</span>
                                    </div>    
                                </div>

                                <div>
                                    <div class="trgb-form-fields-style-label">
                                        <?php esc_html_e( 'Border Radius (CSS)', 'trgb-grid-button' ); ?>
                                    </div>
                                    <div class="trgb-form-fields-group">
                                        <input  type="text" 
                                                value="<?php echo esc_attr( get_option('trgb_all_non_logged_border_radius') ); ?>"
                                                name="<?php echo esc_attr( 'trgb_all_non_logged_border_radius' ); ?>"
                                                data-property="<?php echo esc_attr( 'border_radius' ); ?>"
                                                >
                                        <span>Examples: 8px or 15%</span>
                                    </div>    
                                </div>

                                <div>
                                    <div class="trgb-form-fields-group">
                                        <div class="trgb-form-div-checkbox">
                                            <label>
                                                <input  class="trgb-checkbox" 
                                                        type="checkbox" 
                                                        name="<?php echo esc_attr( 'trgb_all_non_logged_uppercase' ); ?>"
                                                        value="1"
                                                        data-property="<?php echo esc_attr( 'uppercase' ); ?>" 
                                                        <?php checked(1, get_option('trgb_all_non_logged_uppercase'), true); ?> 
                                                        >
                                                <span class="trgb-form-fields-style-label">
                                                    <?php esc_html_e( 'Uppercase', 'trgb-grid-button' ); ?>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- APPLY TO ALL STYLE CHECKBOX -->
                        <div class="trgb-form-fields-group trgb-form-fields-group-apply-all">
                            <div class="trgb-form-div-style checkbox">
                                <label>
                                    <span class="trgb-form-fields-style-label" id="apply-all-label-style">
                                        Apply to all below          
                                    </span>
                                    <input  class="trgb-checkbox" 
                                            type="checkbox" 
                                            id="trgb-checkbox-style-apply-all" 
                                            onclick="clickApplyAll(this.id, 'style');"
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- END APPLY TO ALL STYLE CHECKBOX -->
                    <hr>

                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Style for user LOGGED and ENROLLED in the course', 'trgb-grid-button' ); ?>
                        </div>

                        <div class="trgb-form-style-fields">

                            <div>
                                <div class="trgb-form-fields-style-label">    
                                    <?php esc_html_e( 'Text color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_enrolled_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_enrolled_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'color' ); ?>"
                                            >
                                    <span>Example: #fff</span>
                                </div>
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Background color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_enrolled_background_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_enrolled_background_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'background_color' ); ?>"
                                            >
                                    <span>Example: #428BCA</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Font size (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_enrolled_font_size') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_enrolled_font_size' ); ?>"
                                            data-property="<?php echo esc_attr( 'font_size' ); ?>"
                                            >
                                    <span>Example: 13px</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_enrolled_border_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_enrolled_border_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_color' ); ?>"
                                            >
                                    <span>Example: #357ebd</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Radius (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_enrolled_border_radius') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_enrolled_border_radius' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_radius' ); ?>"
                                            >
                                    <span>Examples: 8px or 15%</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-group">
                                    <div class="trgb-form-div-checkbox">
                                        <label>
                                            <input  class="trgb-checkbox" 
                                                    type="checkbox" 
                                                    name="<?php echo esc_attr( 'trgb_all_enrolled_uppercase' ); ?>"
                                                    value="1" 
                                                    data-property="<?php echo esc_attr( 'uppercase' ); ?>"
                                                    <?php checked(1, get_option('trgb_all_enrolled_uppercase'), true); ?> 
                                                    >
                                            <span class="trgb-form-fields-style-label">
                                                <?php esc_html_e( 'Uppercase', 'trgb-grid-button' ); ?>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Style for user LOGGED, ENROLLED, and that HAS COMPLETED the course', 'trgb-grid-button' ); ?>
                            <span>* blank field will attract the corresponding style value for enrolled user (above)</span>
                        </div>

                        <div class="trgb-form-style-fields">

                            <div>
                                <div class="trgb-form-fields-style-label">    
                                    <?php esc_html_e( 'Text color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_completed_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_completed_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'color' ); ?>"
                                            >
                                    <span>Example: #fff</span>
                                </div>
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Background color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_completed_background_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_completed_background_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'background_color' ); ?>"
                                            >
                                    <span>Example: #428BCA</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Font size (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_completed_font_size') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_completed_font_size' ); ?>"
                                            data-property="<?php echo esc_attr( 'font_size' ); ?>" 
                                            >
                                    <span>Example: 13px</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_completed_border_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_completed_border_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_color' ); ?>"
                                            >
                                    <span>Example: #357ebd</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Radius (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_completed_border_radius') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_completed_border_radius' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_radius' ); ?>" 
                                            >
                                    <span>Examples: 8px or 15%</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-group">
                                    <div class="trgb-form-div-checkbox">
                                        <label>
                                            <input  class="trgb-checkbox" 
                                                    type="checkbox" 
                                                    name="<?php echo esc_attr( 'trgb_all_completed_uppercase' ); ?>"
                                                    value="1" 
                                                    data-property="<?php echo esc_attr( 'uppercase' ); ?>" 
                                                    <?php checked(1, get_option('trgb_all_completed_uppercase'), true); ?> 
                                                    >
                                            <span class="trgb-form-fields-style-label">
                                                <?php esc_html_e( 'Uppercase', 'trgb-grid-button' ); ?>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    <div class="trgb-form-fields-group">
                        <div class="trgb-form-fields-label">    
                            <?php esc_html_e( 'Grid Button Style for user LOGGED, but NOT ENROLLED in the course', 'trgb-grid-button' ); ?>
                        </div>

                        <div class="trgb-form-style-fields">

                            <div>
                                <div class="trgb-form-fields-style-label">    
                                    <?php esc_html_e( 'Text color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_non_enrolled_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_non_enrolled_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'color' ); ?>"
                                            >
                                    <span>Example: #fff</span>
                                </div>
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Background color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_non_enrolled_background_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_non_enrolled_background_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'background_color' ); ?>"
                                            >
                                    <span>Example: #428BCA</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Font size (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_non_enrolled_font_size') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_non_enrolled_font_size' ); ?>"
                                            data-property="<?php echo esc_attr( 'font_size' ); ?>" 
                                            >
                                    <span>Example: 13px</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Color (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_non_enrolled_border_color') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_non_enrolled_border_color' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_color' ); ?>"
                                            >
                                    <span>Example: #357ebd</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-style-label">
                                    <?php esc_html_e( 'Border Radius (CSS)', 'trgb-grid-button' ); ?>
                                </div>
                                <div class="trgb-form-fields-group">
                                    <input  type="text" 
                                            value="<?php echo esc_attr( get_option('trgb_all_non_enrolled_border_radius') ); ?>"
                                            name="<?php echo esc_attr( 'trgb_all_non_enrolled_border_radius' ); ?>"
                                            data-property="<?php echo esc_attr( 'border_radius' ); ?>" 
                                            >
                                    <span>Examples: 8px or 15%</span>
                                </div>    
                            </div>

                            <div>
                                <div class="trgb-form-fields-group">
                                    <div class="trgb-form-div-checkbox">
                                        <label>
                                            <input  class="trgb-checkbox" 
                                                    type="checkbox" 
                                                    name="<?php echo esc_attr( 'trgb_all_non_enrolled_uppercase' ); ?>"
                                                    value="1" 
                                                    data-property="<?php echo esc_attr( 'uppercase' ); ?>" 
                                                    <?php checked(1, get_option('trgb_all_non_enrolled_uppercase'), true); ?> 
                                                    >
                                            <span class="trgb-form-fields-style-label">
                                                <?php esc_html_e( 'Uppercase', 'trgb-grid-button' ); ?>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div> 
                <!-- END all courses styles fileds -->
            
            </div> <!-- end STYLE SECTION - STYLE SECTION - STYLE SECTION - STYLE SECTION -->

        </div>  <!-- end end ALL FORM FIELDS -->


            <?php submit_button($submit_button_text) ?>

            <div style="float:right; margin-bottom:20px">
              Contact Luis Rock, the author, at 
              <a href="mailto:lurockwp@gmail.com">
                lurockwp@gmail.com
              </a>
            </div>

        
    </form>
    <!-- </div>  -->
</div> <!-- end trgb-wrap-grid -->
<?php }