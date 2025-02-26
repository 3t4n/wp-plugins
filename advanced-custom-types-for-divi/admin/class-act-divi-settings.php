<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.advancedcustomtypes.io
 * @since      1.0.1
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/admin
 * @author     Pablo Capello <hola@capellopablo.com>
 */
class ACT_Divi_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ACT_Divi    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ACT_Divi       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	


    function actd_register_general_settings() {
        add_settings_section(
            'actd_settings_general_section',
            __( "", 'act-divi' ),
            array($this, 'actd_settings_general_callback'),
            'actd_general_settings'
        );

        add_settings_field(
            'actd_settings_sample_data',
            __( "Sample data: ", 'act-divi' ),
            array($this, 'actd_settings_sample_data_callback'),
            'actd_general_settings',
            'actd_settings_general_section'
        );


        add_settings_section(
            'actd_settings_post_type_section',
            __( "", 'act-divi' ),
            array($this, 'actd_settings_post_type_callback'),
            'actd_post_type_settings'
        );

        add_settings_field(
            'actd_settings_enable_post_type',
            __( "Sample data: ", 'act-divi' ),
            array($this, 'actd_settings_enable_post_type_callback'),
            'actd_post_type_settings',
            'actd_settings_post_type_section'
        );

        register_setting( 'actd_general_settings_group', 'actd-general-settings', 'actd_sanitize_general_settings' );
        register_setting( 'actd_post_type_settings_group', 'actd-post-type-settings', 'actd_sanitize_post_type_settings' );
    }

    /**
     * Print HTML for General settings section.
     *
     * @since 1.0
     *
     * @see actd_register_general_settings()
     */
    function actd_settings_general_callback() {
        return;

    }

    /**
     * Print HTML for General settings section.
     *
     * @since 1.0
     *
     * @see actd_register_general_settings()
     */
    function actd_settings_post_type_callback() {
        return;

    }

    /**
     * Print HTML for load sample data.
     *
     * @since 1.0
     *
     * @see actd_register_receipt_settings()
     */
    function actd_settings_sample_data_callback() {
        $settings = get_option( 'actd-general-settings');
        $license = isset($settings['license']) ? $settings['license'] : false;
        ?>


        <?php
        /*

        <div class="et-epanel-box">
            <div class="et-box-title">
                <h3>Logo</h3>
                <div class="et-box-descr">
                    <p>If you would like to use your own custom logo image click the Upload Image button.</p>
                </div> <!-- end et-box-desc-content div -->
            </div> <!-- end div et-box-title -->

            <div class="et-box-content">
                <input id="divi_logo" class="et-upload-field" type="text" size="90" name="divi_logo" value="">
                <div class="et-upload-buttons">
                    <span class="et-upload-image-reset">Reset</span>
                    <input class="et-upload-image-button" type="button" data-button_text="Set As Logo" value="Upload">
                </div>
                <div class="clear"></div>
            </div> <!-- end et-box-content div -->
            <span class="et-box-description"></span>
        </div> <!-- end et-epanel-box div -->





        <div class="et-epanel-box et-epanel-box-small-1">
            <div class="et-box-title"><h3>Fixed Navigation Bar</h3>
                <div class="et-box-descr">
                    <p>By default the navigation bar stays on top of the screen at all times. We suggest to disable this option, if you need to use a logo taller than the default one.</p>
                </div> <!-- end et-box-desc-content div -->
            </div> <!-- end div et-box-title -->
            <div class="et-box-content">
                <input type="checkbox" class="et-checkbox yes_no_button" name="divi_fixed_nav" id="divi_fixed_nav" checked="checked" style="display: none;"><div class="et_pb_yes_no_button et_pb_on_state"><!-- .et_pb_on_state || .et_pb_off_state -->
                    <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                    <span class="et_pb_button_slider"></span>
                    <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                </div>
            </div> <!-- end et-box-content div -->
            <span class="et-box-description"></span>
        </div> <!-- end epanel-box-small div -->

        <div class="et-clearfix"></div>

        <div class="et-epanel-box">
            <div class="et-box-title">
                <h3>Shop Page &amp; Category Page Layout for WooCommerce</h3>
                <div class="et-box-descr">
                    <p>Here you can choose Shop Page &amp; Category Page Layout for WooCommerce.</p>
                </div> <!-- end et-box-desc-content div -->
            </div> <!-- end div et-box-title -->
            <div class="et-box-content">
                <select name="divi_shop_page_sidebar" id="divi_shop_page_sidebar">
                    <option value="et_right_sidebar" selected="selected">Right Sidebar</option>
                    <option value="et_left_sidebar">Left Sidebar</option>
                    <option value="et_full_width_page">Fullwidth</option>
                </select>
            </div> <!-- end et-box-content div -->
            <span class="et-box-description"></span>
        </div> <!-- end et-epanel-box div -->
 */
        ?>

        <div class="et-epanel-box">
            <div class="et-box-title">
                <h3>ACT For Divi License</h3>
                <div class="et-box-descr">
                    <p>The Maps module uses the Google Maps API and requires a valid Google API Key to function. Before using the map module, please make sure you have added your API key here. Learn more about how to create your Google API Key <a target="_blank" href="http://www.elegantthemes.com/gallery/divi/documentation/map/">here</a>.</p>
                </div> <!-- end et-box-desc-content div -->
            </div> <!-- end div et-box-title -->
            <div class="et-box-content">
                <input type="text" name="actd-general-settings[license]" id="actd_settings_general_license" value="<?php echo $license ?>">
            </div> <!-- end et-box-content div -->
            <span class="et-box-description"></span>
        </div> <!-- end et-epanel-box div -->

        <?php
    }


    /**
     * Print HTML for load sample data.
     *
     * @since 1.0
     *
     * @see actd_register_receipt_settings()
     */
    function actd_settings_enable_post_type_callback() {
        $settings = get_option( 'actd-post-type-settings');
        ?>
        <div class="et-epanel-box et-epanel-box__checkbox-list">
            <div class="et-box-title">
                <h3>Enable Post Types</h3>
                <div class="et-box-descr">
                    <p>
                        <?php _e('Section description', 'act-divi');?>
                    </p>
                </div> <!-- end et-box-descr div -->
            </div> <!-- end div et-box-title -->
            <div class="et-box-content et-epanel-box-small-2">
                <div class="et-box-content--list">

                    <div class="et-box-content">
					    <span class="et-panel-box__checkbox-list-label">Posts</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_post]" id="actd_settings_post_type_enable_post"  style="display: none;"
                            <?php if (isset($settings['enable_post'])) {
                                actd_check_checked($settings['enable_post']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php actd_divi_checkbox_state($settings['enable_post']); ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Pages</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_page]" id="actd_settings_post_type_enable_page"  style="display: none;"
                            <?php if (isset($settings['enable_page'])) {
                                actd_check_checked($settings['enable_page']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_page'])) {
                            actd_divi_checkbox_state($settings['enable_page']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Movies</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_movie]" id="actd_settings_post_type_enable_movie" style="display: none;"
                            <?php if (isset($settings['enable_movie'])) {
                                actd_check_checked($settings['enable_movie']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_movie'])) {
                            actd_divi_checkbox_state($settings['enable_movie']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Members</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_member]" id="actd_settings_post_type_enable_member" style="display: none;"
                            <?php if (isset($settings['enable_member'])) {
                                actd_check_checked($settings['enable_member']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_member'])) {
                            actd_divi_checkbox_state($settings['enable_member']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Milestones</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_milestone]" id="actd_settings_post_type_enable_milestone" style="display: none;"
                            <?php if (isset($settings['enable_milestone'])) {
                                actd_check_checked($settings['enable_milestone']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_milestone'])) {
                            actd_divi_checkbox_state($settings['enable_milestone']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Services</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_service]" id="actd_settings_post_type_enable_service" style="display: none;"
                            <?php if (isset($settings['enable_service'])) {
                                actd_check_checked($settings['enable_service']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_service'])) {
                            actd_divi_checkbox_state($settings['enable_service']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Properties</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_property]" id="actd_settings_post_type_enable_property" style="display: none;"
                            <?php if (isset($settings['enable_property'])) {
                                actd_check_checked($settings['enable_property']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_property'])) {
                            actd_divi_checkbox_state($settings['enable_property']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Locations</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_location]" id="actd_settings_post_type_enable_location" style="display: none;"
                            <?php if (isset($settings['enable_location'])) {
                                actd_check_checked($settings['enable_location']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_location'])) {
                            actd_divi_checkbox_state($settings['enable_location']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Listings</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_listing]" id="actd_settings_post_type_enable_listing" style="display: none;"
                            <?php if (isset($settings['enable_listing'])) {
                                actd_check_checked($settings['enable_listing']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_listing'])) {
                            actd_divi_checkbox_state($settings['enable_listing']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Shops</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_shop]" id="actd_settings_post_type_enable_shop" style="display: none;"
                            <?php if (isset($settings['enable_shop'])) {
                                actd_check_checked($settings['enable_shop']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_shop'])) {
                            actd_divi_checkbox_state($settings['enable_shop']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Features</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_feature]" id="actd_settings_post_type_enable_feature" style="display: none;"
                            <?php if (isset($settings['enable_feature'])) {
                                actd_check_checked($settings['enable_feature']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_feature'])) {
                            actd_divi_checkbox_state($settings['enable_feature']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Testimonials</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_tesyimonial]" id="actd_settings_post_type_enable_tesyimonial" style="display: none;"
                            <?php if (isset($settings['enable_testimonial'])) {
                                actd_check_checked($settings['enable_testimonial']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_testimonial'])) {
                            actd_divi_checkbox_state($settings['enable_testimonial']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Courses</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_course]" id="actd_settings_post_type_enable_course" style="display: none;"
                            <?php if (isset($settings['enable_course'])) {
                                actd_check_checked($settings['enable_course']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_course'])) {
                            actd_divi_checkbox_state($settings['enable_course']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Products</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_product]" id="actd_settings_post_type_enable_product" style="display: none;"
                            <?php if (isset($settings['enable_product'])) {
                                actd_check_checked($settings['enable_product']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_product'])) {
                            actd_divi_checkbox_state($settings['enable_product']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Offices</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_office]" id="actd_settings_post_type_enable_office" style="display: none;"
                            <?php if (isset($settings['enable_office'])) {
                                actd_check_checked($settings['enable_office']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_office'])) {
                            actd_divi_checkbox_state($settings['enable_office']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

                    <div class="et-box-content">
                        <span class="et-panel-box__checkbox-list-label">Events</span>
                        <input type="checkbox" class="et-checkbox yes_no_button" name="actd-post-type-settings[enable_event]" id="actd_settings_post_type_enable_event" style="display: none;"
                            <?php if (isset($settings['enable_event'])) {
                                actd_check_checked($settings['enable_event']);
                            } ?>>
                        <div class="et_pb_yes_no_button <?php if (isset($settings['enable_event'])) {
                            actd_divi_checkbox_state($settings['enable_event']);
                        } ?>"><!-- .et_pb_on_state || .et_pb_off_state -->
                            <span class="et_pb_value_text et_pb_on_value">Enabled</span>
                            <span class="et_pb_button_slider"></span>
                            <span class="et_pb_value_text et_pb_off_value">Disabled</span>
                        </div>
                    </div> <!-- end et-box-content div -->

    </div>
</div>
<span class="et-box-description"></span>
</div> <!-- end epanel-box-small div -->
<?php
}


/**
* Sanitize input data.
*
* @since  1.0.1
*
* @see    actd_sanitize_general_settings()
*
* @param  array $data
*
* @return mixed
*/
    function actd_sanitize_general_settings( $data ) {

        return $data;
    }

    /**
     * Sanitize input data.
     *
     * @since  1.0.1
     *
     * @see    actd_sanitize_general_settings()
     *
     * @param  array $data
     *
     * @return mixed
     */
    function actd_sanitize_post_type_settings( $data ) {

        return $data;
    }

}
