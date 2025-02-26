<?php
/**
 * Custom Hologram setup settings
 */
function appear2mee_settings_init() {
    // Register a new setting for "appear2mee" page.
    register_setting( 'appear2mee', 'appear2mee_options' );
    // Register a new section in the "appear2mee" page.
    add_settings_section(
            'appear2mee_section_developers',
            __( 'Worlds only human hologram messaging platform.', 'appear2mee' ), 'appear2mee_section_developers_callback', 'appear2mee'
            );
    
    add_settings_field(
            'appear2mee_field_id', 
            // Use $args' label_for to populate the id inside the callback.
            __( 'Web Id', 'appear2mee' ),
            'appear2mee_field_id_cb',
            'appear2mee',
            'appear2mee_section_developers',
            array(
                    'label_for'         => 'appear2mee_field_id',
                    'class'             => 'appear2mee_row_id',
                    'custom_data'       => 'appear2mee_custom_id',
            )
            );
    
    
    add_settings_field(
            'appear2mee_field_position', 
            // Use $args' label_for to populate the id inside the callback.
            __( 'Hologram Placement', 'appear2mee' ),
            'appear2mee_field_position_cb',
            'appear2mee',
            'appear2mee_section_developers',
            array(
                    'label_for'         => 'appear2mee_field_position',
                    'class'             => 'appear2mee_row_position',
                    'custom_data'       => 'appear2mee_custom_position',
            )
            );
}

/**
 * Register our appear2mee_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'appear2mee_settings_init' );


/**
 * Custom option and settings:
 *  - callback functions
 */

/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function appear2mee_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'To link your 2mee human hologram exchange account, please provide the details below.', 'appear2mee' ); ?></p>
    <?php
}
 
/**
 * Id field callback function.
 *
 * @param array $args
 */
function appear2mee_field_id_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'appear2mee_options' );
    ?>
    <input type='text' name="appear2mee_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
        id="<?php echo esc_attr( $args['label_for'] ); ?>" 
        value="<?php echo isset( $options[ $args['label_for'] ] ) ? $options[ $args['label_for'] ] :  '' ; ?>"
        placeholdertext="web id" size="100">
    <p class="description">
        <?php esc_html_e( 'You will get this value from your 2mee account\'s wordpress setting.', 'appear2mee' ); ?>
    </p>
    <?php
}


/**
 * Poistion field callback function valid values are:
 *  'top' | 'top-start' | 'top-end' | 'top-left' | 'top-right' | 'center' | 'center-start' | 'center-end' | 'center-left' | 'center-right' | 'bottom' | 
 *  'bottom-start' | 'bottom-end' | 'bottom-left' | 'bottom-right' 
 * 
 *
 * @args
 */
function appear2mee_field_position_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'appear2mee_options' );
    ?>
    <select
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['custom_data'] ); ?>"
            name="appear2mee_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
        <option value="top" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'top', 'appear2mee' ); ?>
        </option>
        <option value="top-start" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top-start', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'top-start', 'appear2mee' ); ?>
        </option> 
        <option value="top-end" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top-end', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'top-end', 'appear2mee' ); ?>
        </option>
        <option value="top-left" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top-left', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'top-left', 'appear2mee' ); ?>
        </option>
        <option value="top-right" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'top-right', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'top-right', 'appear2mee' ); ?>
        </option>
        <option value="center" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'center', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'center', 'appear2mee' ); ?>
        </option>
        <option value="center-start" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'center-start', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'center-start', 'appear2mee' ); ?>
        </option>
        <option value="center-end" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'center-end', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'center-end', 'appear2mee' ); ?>
        </option>
        <option value="center-left" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'center-left', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'center-left', 'appear2mee' ); ?>
        </option>
        <option value="center-right" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'center-right', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'center-right', 'appear2mee' ); ?>
        </option>
        <option value="bottom" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'bottom', 'appear2mee' ); ?>
        </option>
        <option value="bottom-start" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom-start', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'bottom-start', 'appear2mee' ); ?>
        </option>
        <option value="bottom-end" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom-end', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'bottom-end', 'appear2mee' ); ?>
        </option>
        <option value="bottom-left" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom-left', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'bottom-left', 'appear2mee' ); ?>
        </option>
        <option value="bottom-right" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'bottom-right', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'bottom-right', 'appear2mee' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'Select the position of 2mee Hologram placement on the webpage.', 'appear2mee' ); ?>
    </p>
    <?php
}

/**
 * Add the top level menu page.
 */
function appear2mee_options_page() {
    add_menu_page(
        '2mee Human Hologram',
        '2mee Settings',
        'manage_options',
        '2mee Human Hologram',
        'appear2mee_options_page_html'
    );
}
 
 
/**
 * Register our appear2mee_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'appear2mee_options_page' );
 
 
/**
 * Top level menu callback function
 */
function appear2mee_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
 
    // add error/update messages
 
    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'appear2mee_messages', 'appear2mee_message', __( 'Settings Saved', 'appear2mee' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'appear2mee_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "appear2mee"
            settings_fields( 'appear2mee' );
            // output setting sections and their fields
            // (sections are registered for "appear2mee", each field is registered to a specific section)
            do_settings_sections( 'appear2mee' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}
