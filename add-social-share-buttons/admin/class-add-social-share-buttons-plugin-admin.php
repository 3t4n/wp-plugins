<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Add_Social_Share_Buttons_Plugin
 * @subpackage Add_Social_Share_Buttons_Plugin/admin
 * @author     Multidots <inquiry@multidots.in>
 */
class Add_Social_Share_Buttons_Plugin_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
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
     *
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        if (isset($_GET['page']) && !empty($_GET['page']) && ($_GET['page'] == 'add_social_share_buttons')) {
            wp_enqueue_style('wp-pointer');
            wp_enqueue_style('add-social-share-buttons-plugin-admin', plugin_dir_url(__FILE__) . 'css/add-social-share-buttons-plugin-admin.css', array('wp-jquery-ui-dialog'), $this->version, 'all');
            wp_enqueue_style('chosen-css', plugin_dir_url(__FILE__) . 'css/chosen.css', array(), $this->version, 'all');
            wp_enqueue_script('wp-pointer');
        }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Add_Social_Share_Buttons_Plugin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Add_Social_Share_Buttons_Plugin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        if (isset($_GET['page']) && !empty($_GET['page']) && ($_GET['page'] == 'add_social_share_buttons')) {
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('add-social-share-buttons-plugin-admin', plugin_dir_url(__FILE__) . 'js/add-social-share-buttons-plugin-admin.js', array('jquery', 'jquery-ui-dialog'), $this->version, false);
            wp_localize_script('add-social-share-buttons-plugin-admin', 'pagevisit', array('ajaxurl' => admin_url('admin-ajax.php')));
            //get settings option
            $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
            $get_share_settings = maybe_unserialize($get_share_settings);
            if (!empty($get_share_settings['share_posttype']) || $get_share_settings['share_posttype'] != "") {
                $options = !empty($get_share_settings['share_posttype']) ? $get_share_settings['share_posttype'] : json_encode(array());
                if (!empty($options) || $options != "") {
                    wp_localize_script('add-social-share-buttons-plugin-admin', 'get_post_option_share', array('optionsarray' => json_encode($options)));
                } else {
                    wp_localize_script('add-social-share-buttons-plugin-admin', 'get_post_option_share', array('optionsarray' => ''));
                }
            } else {
                $post_types = get_post_types();
                wp_localize_script('add-social-share-buttons-plugin-admin', 'get_post_option_share', array('optionsarray' => '')); //json_encode($post_types))
            }
            wp_enqueue_script('jquery-validate-min', plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', $this->version, false);
            wp_enqueue_script('chosen-jquery-js', plugin_dir_url(__FILE__) . 'js/chosen.jquery.js', '4.5.2');
        }
    }

    /**
     * add plugin main menu in admin menu
     *
     */
    public function whatsapp_sharing_custom_menu() {

        //add admin main Crea plugins menu

        add_submenu_page('options-general.php', ADSSB_PLUGIN_PAGE_MENU_TITLE, __(ADSSB_PLUGIN_NAME, 'add-social-share-buttons-plugin'), 'manage_options', ADSSB_PLUGIN_PAGE_MENU_SLUG, 'custom_whatsapp_sharing_setting_html');

        /**
         * function for plugin admin menu callback html function
         */
        function custom_whatsapp_sharing_setting_html() {
            //get settings option
            $get_share_settings = get_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY);
            $get_share_settings = maybe_unserialize($get_share_settings);

            $get_services = get_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY);
            $get_services = maybe_unserialize($get_services);

            $sharesmallimagearray = array();

            $sharesmallimagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_small.png';
            $sharesmallimagearray['Viber'] = ASSB_PATH . '/images/viber_small.png';
            $sharesmallimagearray['Facebook'] = ASSB_PATH . '/images/facebook_small.png';
            $sharesmallimagearray['Twitter'] = ASSB_PATH . '/images/twitter_small.png';
            $sharesmallimagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_small.png';
            $sharesmallimagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_small.png';

            $sharemediumimagearray = array();
            $sharemediumimagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_medium.png';
            $sharemediumimagearray['Viber'] = ASSB_PATH . '/images/viber_medium.png';
            $sharemediumimagearray['Facebook'] = ASSB_PATH . '/images/facebook_medium.png';
            $sharemediumimagearray['Twitter'] = ASSB_PATH . '/images/twitter_medium.png';
            $sharemediumimagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_medium.png';
            $sharemediumimagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_medium.png';

            $sharelargeagearray = array();
            $sharelargeagearray['Whatsapp'] = ASSB_PATH . '/images/whatsapp_large.png';
            $sharelargeagearray['Viber'] = ASSB_PATH . '/images/viber_large.png';
            $sharelargeagearray['Facebook'] = ASSB_PATH . '/images/facebook_large.png';
            $sharelargeagearray['Twitter'] = ASSB_PATH . '/images/twitter_large.png';
            $sharelargeagearray['Google_plus'] = ASSB_PATH . '/images/googleplus_large.png';
            $sharelargeagearray['Linkedin'] = ASSB_PATH . '/images/linkedin_large.png';
            ?>

            <!--create share settings html-->	
            <div class="whatsapp-share-containar">
                <fieldset class="fs_global">
                    <legend><div class="whatsapp-share-header"><h2><?php echo __(ADSSB_PLUGIN_HEADER_NAME, 'add-social-share-buttons-plugin'); ?></h2></div></legend>
                    <div class="whatsapp-share-contain">

                        <form id="whatsapp_share_plugin_form_id" method="post" action="<?php echo esc_url(get_admin_url() . 'admin-post.php'); ?>" enctype="multipart/form-data" novalidate="novalidate">
                            <?php wp_nonce_field(basename(__FILE__), 'add_social_share_buttons_nonce'); ?>

                            <input type='hidden' name='action' value='submit-form' />
                            <input type='hidden' name='action-which' value='add' />

                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_ICON_SIZE, 'add-social-share-buttons-plugin'); ?></th>
                                        <td>
                                            <select class="check_button_size" name="share_icon_size" id="share_icon_size">
                                                <?php if ($get_share_settings['share_button_size'] != '' && !empty($get_share_settings['share_button_size'])) { ?>
                                                    <option <?php
                                                    if ($get_share_settings['share_button_size'] == "small") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="small"><?php _e('small', 'add-social-share-buttons'); ?></option>
                                                    <option <?php
                                                    if ($get_share_settings['share_button_size'] == "medium") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="medium"><?php _e('medium', 'add-social-share-buttons'); ?></option>
                                                    <option <?php
                                                    if ($get_share_settings['share_button_size'] == "large") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="large"><?php _e('large', 'add-social-share-buttons'); ?></option>
                                                    <?php } else { ?>
                                                    <option value="small"><?php _e('small', 'add-social-share-buttons'); ?></option>
                                                    <option value="medium"><?php _e('medium', 'add-social-share-buttons'); ?></option>
                                                    <option value="large"><?php _e('large', 'add-social-share-buttons'); ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label for="pluginname"><?php echo __(ADSSB_PLUGIN_SHARE_BTN, 'add-social-share-buttons-plugin'); ?></label></th>
                                        <td>
                                            <input type="button" id="add_share_service" class="button button-primary" value="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_BTN, 'add-social-share-buttons-plugin'); ?>">
                                            <?php if (!empty($get_services['share_button']) && $get_services['share_button'] != '') { ?>
                                                <?php
                                                $buttonCount = count($get_services['share_button']);
                                                if ($buttonCount > 1) {
                                                    ?>
                                                    <input type="button" id="reorder_share_service" class="button button-primary" value="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_BTN, 'add-social-share-buttons-plugin'); ?>">
                                                <?php } ?>
                                            <?php } ?>
                                            <div class="display_added_services">
                                                <?php
                                                if (!empty($get_services) && $get_services != '') {
                                                    if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                                        foreach ($get_services['share_button'] as $key => $values) {

                                                            if ($get_share_settings['share_button_size'] != '' && !empty($get_share_settings['share_button_size'])) {

                                                                if ($get_share_settings['share_button_size'] == 'small') {
                                                                    ?><img src="<?php echo esc_url($sharesmallimagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                                                } elseif ($get_share_settings['share_button_size'] == 'medium') {
                                                                    ?><img src="<?php echo esc_url($sharemediumimagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                                                } elseif ($get_share_settings['share_button_size'] == 'large') {
                                                                    ?><img src="<?php echo esc_url($sharelargeagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                                                }
                                                            } else {
                                                                ?><img src="<?php echo esc_url($sharesmallimagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_INCLUDE_POST, 'add-social-share-buttons-plugin'); ?></th>
                                        <td class="set_fonts">
                                            <?php
                                            $post_types = get_post_types();
                                            $html = '';
                                            $html .='<select id="post_type" data-placeholder="Add Page/Post Type" name="show_posttype[]" multiple="true" class="chosen-select-post category-select chosen-rtl validate_field1">
					    <option value=""></option>';
                                            if (isset($post_types) && !empty($post_types)) {
                                                foreach ($post_types as $cpost) {
                                                    if ($cpost != "attachment" && $cpost != "revision" && $cpost != "nav_menu_item" && $cpost != "product_variation" && $cpost != "shop_order" && $cpost != "shop_order_refund" && $cpost != "shop_coupon" && $cpost != "shop_webhook" && $cpost != "scheduled-action" && $cpost != "shop_subscription" && $cpost != "wpcf7_contact_form" && $cpost != "mc4wp-form") {
                                                        $html .='<option value="' . esc_attr($cpost) . '">' . esc_html($cpost) . '</option>';
                                                    }
                                                }
                                            }
                                            $html .='</select><span class="add_posttype_note">( ' . __(ADSSB_PLUGIN_POSTTYPE_NOTE, 'add-social-share-buttons-plugin') . ' )</span>';
                                            echo $html;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __(ADSSB_PLUGIN_SERVICE_PLACEMENT, 'add-social-share-buttons-plugin'); ?></th>
                                        <td>
                                            <select name="share_buttom_place" id="chosen_button_place">
                                                <?php if ($get_share_settings['button_placement'] != '' && !empty($get_share_settings['button_placement'])) { ?>
                                                    <option <?php
                                                    if ('bottom' == $get_share_settings['button_placement']) {
                                                        echo 'selected';
                                                    }
                                                    ?>  value="bottom"><?php _e('Bottom', 'add-social-share-buttons'); ?></option>
                                                    <option <?php
                                                    if ('top' == $get_share_settings['button_placement']) {
                                                        echo 'selected';
                                                    }
                                                    ?> value="top"><?php _e('Top', 'add-social-share-buttons'); ?></option>
                                                    <option <?php
                                                    if ('topbottom' == $get_share_settings['button_placement']) {
                                                        echo 'selected';
                                                    }
                                                    ?> value="topbottom"><?php _e('Top & Bottom', 'add-social-share-buttons'); ?></option>
                                                    <?php } else { ?>
                                                    <option value="bottom"><?php _e('Bottom', 'add-social-share-buttons'); ?></option>
                                                    <option value="top"><?php _e('Top', 'add-social-share-buttons'); ?></option>
                                                    <option value="topbottom"><?php _e('Top & Bottom', 'add-social-share-buttons'); ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><label  for="pluginname"><?php echo __(ADSSB_PLUGIN_INCLUDE_LISTING_PAGE, 'add-social-share-buttons-plugin'); ?></label></th>
                                        <td><input <?php
                                            if ('1' == $get_share_settings['include_pro_listing_page']) {
                                                echo 'checked';
                                            }
                                            ?> type="checkbox" name="include_listing_page" value="1" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label  for="pluginname"><?php echo __(ADSSB_PLUGIN_ADDITIONAL_STYLE_TITLE, 'add-social-share-buttons-plugin'); ?></label></th>
                                        <td><textarea name="add_custom_service_style" id="add_custom_service_style" class="code" style="width: 50%; font-size: 12px;" rows="6" cols="50"><?php echo isset($get_share_settings['include_custom_styles']) ? wp_kses_post($get_share_settings['include_custom_styles']) : ''; ?></textarea></td>
                                    </tr>							
                                </tbody>
                            </table>

                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_OPTION_SAVE_BTN, 'add-social-share-buttons-plugin'); ?>" class="button button-primary" id="submit_plugin" name="submit_plugin"></p>
                        </form>
                    </div>

                    <div id="display_all_services" title="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_HEADER_TITLE, 'add-social-share-buttons-plugin'); ?>" style="display:none;">
                        <form id="add_share_button_plugin_form_id" method="post" action="<?php echo esc_url(get_admin_url() . 'admin-post.php'); ?>" enctype="multipart/form-data" novalidate="novalidate">
                            <?php wp_nonce_field(basename(__FILE__), 'submit_add_share_btn_nonce'); ?>
                            <input type='hidden' name='action' value='add-service-form' />
                            <input type='hidden' name='action-which' value='add' />
                            <ul class="new_services">
                                <?php if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) { ?>
                                    <li><input <?php
                                        if (in_array('Whatsapp', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" name="sharebutton[]" value="Whatsapp"><img src="<?php echo esc_url(ASSB_PATH . '/images/whatsapp_large.png'); ?>" alt="Whatsapp"></li>
                                    <li><input <?php
                                        if (in_array('Viber', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" name="sharebutton[]" value="Viber"><img src="<?php echo esc_url(ASSB_PATH . '/images/viber_large.png'); ?>" alt="Viber"></li>
                                    <li><input <?php
                                        if (in_array('Facebook', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" id="facebbok_checked" name="sharebutton[]" value="Facebook"><img src="<?php echo esc_url(ASSB_PATH . '/images/facebook_large.png'); ?>" alt="Facebook"></li>
                                    <li><input <?php
                                        if (in_array('Twitter', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" name="sharebutton[]" value="Twitter"><img src="<?php echo esc_url(ASSB_PATH . '/images/twitter_large.png'); ?>" alt="Twitter"></li>
                                    <li><input <?php
                                        if (in_array('Google_plus', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" name="sharebutton[]" value="Google_plus"><img src="<?php echo esc_url(ASSB_PATH . '/images/googleplus_large.png'); ?>" alt="Google_plus"></li>
                                    <li><input <?php
                                        if (in_array('Linkedin', $get_services['share_button'])) {
                                            echo 'checked';
                                        }
                                        ?> type="checkbox" name="sharebutton[]" value="Linkedin"><img src="<?php echo esc_url(ASSB_PATH . '/images/linkedin_large.png'); ?>" alt="linkedin"></li>
                                    <?php } else { ?>
                                    <li><input type="checkbox" name="sharebutton[]" value="Whatsapp"><img src="<?php echo esc_url(ASSB_PATH . '/images/whatsapp_large.png'); ?>" alt="Whatsapp"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Viber"><img src="<?php echo esc_url(ASSB_PATH . '/images/viber_large.png'); ?>" alt="Viber"></li>
                                    <li><input type="checkbox" id="facebbok_checked" name="sharebutton[]" value="Facebook"><img src="<?php echo esc_url(ASSB_PATH . '/images/facebook_large.png'); ?>" alt="Facebook"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Twitter"><img src="<?php echo esc_url(ASSB_PATH . '/images/twitter_large.png'); ?>" alt="Twitter"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Google_plus"><img src="<?php echo esc_url(ASSB_PATH . '/images/googleplus_large.png'); ?>" alt="Google_plus"></li>
                                    <li><input type="checkbox" name="sharebutton[]" value="Linkedin"><img src="<?php echo esc_url(ASSB_PATH . '/images/linkedin_large.png'); ?>" alt="Linkedin"></li>
                                <?php } ?>
                            </ul>
                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_ADD_SERVICE_POPUP_BTN, 'add-social-share-buttons-plugin'); ?>" class="button button-primary" id="submit_add_share_btn" name="submit_add_share_btn"></p>
                        </form>
                    </div>

                    <div id="reorder_all_services" title="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_HEADER_TITLE, 'add-social-share-buttons-plugin'); ?>" style="display:none;">
                        <div class="reorder_note"><?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_POPUP_NOTE, 'add-social-share-buttons-plugin'); ?></div>
                        <form id="submit_services_reorder_button_form_id" method="post" action="<?php echo esc_url(get_admin_url() . 'admin-post.php'); ?>" enctype="multipart/form-data" novalidate="novalidate">
                            <?php wp_nonce_field(basename(__FILE__), 'submit_service_nonce'); ?>
                            <input type='hidden' name='action' value='reorder-service-form' />
                            <input type='hidden' name='action-which' value='add' />

                            <?php if (!empty($get_services) && $get_services != '') { ?>
                                <?php if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) { ?>
                                    <ul id="sortable">

                                        <?php foreach ($get_services['share_button'] as $key => $values) { ?>
                                            <li><input type="hidden" name="sharebutton[]" value="<?php echo esc_attr($values); ?>"><img src="<?php echo esc_url($sharelargeagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"></li>
                                        <?php } ?>

                                    </ul>
                                <?php } ?>

                            <?php } ?>
                            <p class="submit"><input type="submit" value="<?php echo __(ADSSB_PLUGIN_REORDER_SERVICE_POPUP_BTN, 'add-social-share-buttons-plugin'); ?>" class="button button-primary" id="submit_services_reorder" name="submit_services_reorder"></p>
                        </form>
                    </div>

                    <div class="button_small_icon_html" style="display:none;">

                        <?php
                        if (!empty($get_services) && $get_services != '') {
                            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {
                                foreach ($get_services['share_button'] as $key => $values) {
                                    ?><img src="<?php echo esc_url($sharesmallimagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="button_medium_icon_html" style="display:none;">
                        <?php
                        if (!empty($get_services) && $get_services != '') {
                            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                foreach ($get_services['share_button'] as $key => $values) {
                                    ?><img src="<?php echo esc_url($sharemediumimagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="button_large_icon_html" style="display:none;">
                        <?php
                        if (!empty($get_services) && $get_services != '') {
                            if ($get_services['share_button'] != '' && !empty($get_services['share_button'])) {

                                foreach ($get_services['share_button'] as $key => $values) {
                                    ?><img src="<?php echo esc_url($sharelargeagearray[$values]); ?>" alt="<?php echo esc_attr($values); ?>"><?php
                                }
                            }
                        }
                        ?>
                    </div>
                </fieldset>	
                <?php
            }

        }

        /**
         * function for add or update share amin settings
         *
         */
        public function whatsapp_share_setting_add_update() {
//            global $wpdb, $wp, $post; unused variables

            if (isset($_POST['submit_plugin'])) {
                if (!isset($_POST['add_social_share_buttons_nonce']) || !wp_verify_nonce($_POST['add_social_share_buttons_nonce'], basename(__FILE__))) {
                    die('Failed security check');
                }

                //get action
                $submitAction = isset($_POST['action']) ? sanitize_text_field($_POST['action']) : '';
                $submitFormAction = isset($_POST['action-which']) ? sanitize_text_field($_POST['action-which']) : '';

                //get settings valus
                $showPosttype = isset($_POST['show_posttype']) ? array_map('sanitize_text_field', wp_unslash($_POST['show_posttype'])) : '';
                $buttonPlacement = isset($_POST['share_buttom_place']) ? sanitize_text_field(wp_unslash($_POST['share_buttom_place'])) : '';
                $facebookApiKey = isset($_POST['facebook_api_key']) ? sanitize_text_field(wp_unslash($_POST['facebook_api_key'])) : '';
                $shareIconSize = isset($_POST['share_icon_size']) ? sanitize_text_field(wp_unslash($_POST['share_icon_size'])) : '';
                $includeListingPage = isset($_POST['include_listing_page']) ? intval($_POST['include_listing_page']) : '0';
                $addCustomServiceStyle = isset($_POST['add_custom_service_style']) ? sanitize_textarea_field($_POST['add_custom_service_style']) : '';

                $ShareSettingArray = array();

                //check action 
                if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'submit-form') {

                    //create share settings array
                    $ShareSettingArray['share_posttype'] = $showPosttype;
                    $ShareSettingArray['button_placement'] = $buttonPlacement;
                    $ShareSettingArray['facebook_apikey'] = $facebookApiKey;
                    $ShareSettingArray['share_button_size'] = $shareIconSize;
                    $ShareSettingArray['include_pro_listing_page'] = $includeListingPage;
                    $ShareSettingArray['include_custom_styles'] = $addCustomServiceStyle;

                    //serialize share settings array
                    $ShareSettingArray = maybe_serialize($ShareSettingArray);

                    //update share setting array
                    update_option(ADSSB_PLUGIN_GLOBAL_SETTING_KEY, $ShareSettingArray);
                }
                //redirect whatsapp share page
                wp_safe_redirect(esc_url(home_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG)));
                exit();
            }
        }

        /**
         * function for whatsapp share button add or remove
         *
         */
        public function whatsapp_share_add_remove_services() {
//            global $wpdb, $wp, $post; unused variable
            //get action
            if (isset($_POST['submit_add_share_btn'])) {

                if (!isset($_POST['submit_add_share_btn_nonce']) || !wp_verify_nonce($_POST['submit_add_share_btn_nonce'], basename(__FILE__))) {
                    die('Failed security check');
                }

                $submitAction = isset($_POST['action']) ? sanitize_text_field($_POST['action']) : '';

                //get action type
                $submitFormAction = isset($_POST['action-which']) ? sanitize_text_field($_POST['action-which']) : '';

                //get share button array

                $shareButton = isset($_POST['sharebutton']) ? array_map('sanitize_text_field', wp_unslash($_POST['sharebutton'])) : '';
                $ShareServicesArray = array();

                //check action type is add  and action is add-service-form
                if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'add-service-form') {

                    //create share button array
                    $ShareServicesArray['share_button'] = $shareButton;

                    //share button array serialize
                    $ShareServicesArray = maybe_serialize($ShareServicesArray);

                    //update share button array
                    update_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY, $ShareServicesArray);
                }

                //redirect whatsapp share page
                wp_safe_redirect(esc_url(home_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG)));

                exit();
            }
        }

        public function whatsapp_share_reorder_services() {
//            global $wpdb, $wp, $post; unused variable
            //get action
            if (isset($_POST['submit_services_reorder'])) {
                if (!isset($_POST['submit_service_nonce']) || !wp_verify_nonce($_POST['submit_service_nonce'], basename(__FILE__))) {
                    die('Failed security check');
                }

                $submitAction = isset($_POST['action']) ? sanitize_text_field($_POST['action']) : '';

                //get action type
                $submitFormAction = isset($_POST['action-which']) ? sanitize_text_field($_POST['action-which']) : '';

                $shareButton = isset($_POST['sharebutton']) ? array_map('sanitize_text_field', wp_unslash($_POST['sharebutton'])) : '';
                $ShareServicesArray = array();

                //check action type is add  and action is add-service-form
                if ($submitFormAction == 'add' && !empty($submitFormAction) && $submitFormAction != '' && $submitAction == 'reorder-service-form') {

                    //create share button array
                    $ShareServicesArray['share_button'] = $shareButton;

                    //share button array serialize
                    $ShareServicesArray = maybe_serialize($ShareServicesArray);

                    //update share button array
                    update_option(ADSSB_PLUGIN_ADD_SOCIAL_BUTTIN_KEY, $ShareServicesArray);
                }

                //redirect whatsapp share page
                wp_safe_redirect(esc_url(site_url("/wp-admin/admin.php?page=" . ADSSB_PLUGIN_PAGE_MENU_SLUG)));

                exit();
            }
        }

        public function custom_assb_pointers_footer() {
            $admin_pointers = custom_assb_pointers_admin_pointers();
            ?>
            <script type="text/javascript">
                /* <![CDATA[ */
                (function($) {
        <?php
        foreach ($admin_pointers as $pointer => $array) {
            if ($array['active']) {
                ?>
                            $('<?php echo $array['anchor_id']; ?>').pointer({
                                content: '<?php echo $array['content']; ?>',
                                position: {
                                    edge: '<?php echo $array['edge']; ?>',
                                    align: '<?php echo $array['align']; ?>'
                                },
                                close: function() {
                                    $.post(ajaxurl, {
                                        pointer: '<?php echo esc_attr($pointer); ?>',
                                        action: 'dismiss-wp-pointer'
                                    });
                                }
                            }).pointer('open');
                <?php
            }
        }
        ?>
                })(jQuery);
                /* ]]> */
            </script>
            <?php
        }

        // Function For Welcome page to plugin 

        public function welcome_assb_screen_do_activation_redirect() {

            if (!get_transient('_welcome_screen_assb_activation_redirect_data')) {
                return;
            }

            // Delete the redirect transient
            delete_transient('_welcome_screen_assb_activation_redirect_data');

            // if activating from network, or bulk
            if (is_network_admin() || isset($_GET['activate-multi'])) {
                return;
            }
            // Redirect to extra cost welcome  page
            wp_safe_redirect(add_query_arg(array('page' => 'wp-add-social-share-buttons&tab=about'), admin_url('index.php')));
        }

        public function welcome_pages_screen_assb() {
            add_dashboard_page(
                    'Add Social Share Buttons Plugin Dashboard', 'Add Social Share Buttons Plugin Dashboard', 'read', 'wp-add-social-share-buttons', array(&$this, 'welcome_screen_content_assb')
            );
        }

        public function welcome_screen_content_assb() {
            ?>

            <div class="wrap about-wrap">
                <h1 style="font-size: 2.1em;"><?php printf(__('Welcome to Add Social Share Messenger Buttons Whatsapp and Viber', 'add-social-share-buttons')); ?></h1>

                <div class="about-text woocommerce-about-text">
                    <?php
                    $message = '';
                    printf(__('%s Easy to Add Social Share Buttons in Custom Post, Page and Product page.  Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.', 'add-social-share-buttons'), $message, $this->version);
                    ?>
                    <img class="version_logo_img" src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'images/assb.png'); ?>" style="width: auto;">
                </div>

                <?php
                $setting_tabs_wc = apply_filters('woo_assb_setting_tab', array("about" => "Overview", "other_plugins" => "Checkout our other plugins"));
                $current_tab_wc = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'general';
//                $aboutpage = isset($_GET['page']) unused variable
                ?>
                <h2 id="woo-extra-cost-tab-wrapper" class="nav-tab-wrapper">
                    <?php
                    foreach ($setting_tabs_wc as $name => $label) {
                        echo '<a  href="' . esc_url(home_url('wp-admin/index.php?page=wp-add-social-share-buttons&tab=' . esc_attr($name))) . '" class="nav-tab ' . ( $current_tab_wc == $name ? 'nav-tab-active' : '' ) . '">' . esc_attr($label) . '</a>';
                    }
                    ?>
                </h2>

                <?php
                foreach ($setting_tabs_wc as $setting_tabkey_wc => $setting_tabvalue) {
                    switch ($setting_tabkey_wc) {
                        case $current_tab_wc:
                            do_action('woocommerce_assb_' . $current_tab_wc);
                            break;
                    }
                }
                ?>
                <hr />
                <div class="return-to-dashboard">
                    <a href="<?php echo esc_url(home_url('/wp-admin/options-general.php?page=add_social_share_buttons')); ?>"><?php _e('Go to Add Social Share Messenger Buttons Whatsapp and Viber Settings', 'add-social-share-buttons'); ?></a>
                </div>
            </div>


            <?php
        }

        /**
         * About tab content of Add social share button about
         *
         */
        public function woocommerce_assb_about() {
            //do_action('my_own');
//        $current_user = wp_get_current_user(); unused variable
            ?>
            <div class="changelog">
                </br>
                <style type="text/css">
                    p.assb_overview {max-width: 100% !important;margin-left: auto;margin-right: auto;font-size: 15px;line-height: 1.5;}
                    .assb_ul ul li {margin-left: 3%;list-style: initial;line-height: 23px;}
                </style>  
                <div class="changelog about-integrations">
                    <div class="wc-feature feature-section col three-col">
                        <div>

                            <p class="assb_overview"><?php _e('Easily add social sharing buttons to your page, posts and products page.', 'add-social-share-buttons'); ?></p>
                            <p class="assb_overview"><?php _e('Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.', 'add-social-share-buttons'); ?></p>

                            <p class="assb_overview"><strong><?php _e('Plugin Functionality:', 'add-social-share-buttons'); ?></strong></p>
                            <div class="assb_ul">
                                <ul>
                                    <li><?php _e('Easy setup no specialization required to use', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Add social share button with different size (Small, Medium, Large)', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Add social share buttons in Products page and Blog page.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('You can reorder social share buttons as per your choice.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('You can set social share button (top, bottom) of page, post and product.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('You can apply custom CSS as per your requirement.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('User-friendly settings interface.', 'add-social-share-buttons'); ?></li>

                                </ul>
                            </div>

                            <p class="assb_overview"><strong><?php _e('Plugin Supports:', 'add-social-share-buttons'); ?> </strong></p>
                            <div class="assb_ul">
                                <ul>
                                    <li><?php _e('Share with Whatsapp', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Share with Facebook.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Share with Twitter.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Share with LinkedIn.', 'add-social-share-buttons') ?></li>
                                    <li><?php _e('Share with Google Plus.', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Share with Pinterest', 'add-social-share-buttons'); ?></li>
                                    <li><?php _e('Share with Viber', 'add-social-share-buttons'); ?></li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <?php
        }

        public function adjust_the_wp_menu_assb() {
            remove_submenu_page('index.php', 'wp-add-social-share-buttons');
        }

    }

    function custom_assb_pointers_admin_pointers() {

        $dismissed = explode(',', (string) get_user_meta(get_current_user_id(), 'dismissed_wp_pointers', true));
        $version = '1_0'; // replace all periods in 1.0 with an underscore
        $prefix = 'custom_assb_pointers' . $version . '_';

        $new_pointer_content = '<h3>' . __('Welcome to Add Social Share Messenger Buttons Whatsapp and Viber', 'add-social-share-buttons') . '</h3>';
        $new_pointer_content .= '<p>' . __('Easy to Add Social Share Buttons in Custom Post, Page and Product page.  Add social buttons to share your posts for Whatsapp Facebook, Twitter, Google+, Pinterest, and Linkedin. Automatically display buttons on page, post and product page.', 'add-social-share-buttons') . '</p>';

        return array(
            $prefix . 'assb_notice_view' => array(
                'content' => $new_pointer_content,
                'anchor_id' => '#adminmenu',
                'edge' => 'left',
                'align' => 'left',
                'active' => (!in_array($prefix . 'assb_notice_view', $dismissed) )
            )
        );
    }
    