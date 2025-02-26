<?php
class Formataway_Admin {
    private static $initiated = false;

    public static function init() {
        if( !self::$initiated ) {
            self::init_hooks();
        }
    }

    public static function init_hooks() {
        self::$initiated = true;

        add_action( 'admin_init', array( 'Formataway_Admin', 'admin_init' ) );
    }

    public static function admin_init() {
        load_plugin_textdomain( 'formataway' );

        self::init_settings_api();
    }
	
    // This needs to be public because it's being provided as a callback to the
    // best that is WordPress and will be called from outside of our class.
    public static function init_settings_api() {
        // http://codex.wordpress.org/Settings_API
        // Kudos to tutsplus for: http://code.tutsplus.com/tutorials/the-complete-guide-to-the-wordpress-settings-api-part-2-sections-fields-and-settings--wp-24619

        // The tutorial says to put register_setting after adding fields and sections,
        // however the codex says to put it before. I'll listen to the codex.

        // We'll be sanitising the values before we send them to the database
        // Remember, everybody's a hacker!
        register_setting( 'reading', 'formataway_formats', array( 'Formataway_Util', 'sanitise_string_array' ) );

        // First, we register a section. We can use this to add a nice and clear description of Formataway.
        add_settings_section(
            'formataway_settings_section',                                  // ID used to identify this section and with which to register options
            _x( 'Formataway', 'Settings section title', 'formataway' ),       // Title to be displayed on the administration page
            array( 'Formataway_Admin', 'render_settings_section' ),           // Callback used to render the description of the section
            'reading'                                                       // Page on which to add this section of options
        );

        // Next, we will introduce the fields for toggling the visibility of content elements.
        add_settings_field( 
            'formataway_formats',                                           // ID used to identify the field throughout the theme
            _x( 'Formats', 'Settings field title', 'formataway' ),            // The label to the left of the option interface element
            array( 'Formataway_Admin', 'render_settings_field_formats' ),     // The name of the function responsible for rendering the option interface
            'reading',                                                      // The page on which this option will be displayed
            'formataway_settings_section'                                   // The name of the section to which this field belongs
                                                                            // You can also provide arguments, but none are used here
        );
    }

    /*
    Settings > Reading rendering
    Mentioned in self::init_settings_api()
     */
    /**
     * Renders the description of purpose and usage of Formataway beneath the section title.
     */
    public static function render_settings_section() {
        echo '<p>' . __( 'Select any post formats you\'d like to exclude from your post index page\'s main query.', 'formataway' ) . '</p>';
    }

    /**
     * Renders the "formataway_formats" option field under the section title and description.
     */
    public static function render_settings_field_formats( $args ) {
        // Fetch the currently set value so we can prefil the generated markup.
        $old_values = get_option( 'formataway_formats', array() );

        // Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field.
        ?>
        <select multiple id="formataway_formats" name="formataway_formats[]">
            <?php foreach( Formataway_Util::get_formats() as $k => $v ) {
                // Safety first children
                $k = esc_attr( $k );
                $v = esc_html( $v );

                echo "<option value=\"$k\" " . selected( in_array( $k, $old_values ), true, false ) . ">" . $v . "</option>";
            } ?>
        </select>
        <?php
    }
}
