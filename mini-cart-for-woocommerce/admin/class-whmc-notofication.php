<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/admin
 */

class WHMC_Notifationlight
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.7
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'whmc_notification_settings_page'
        ));

    }

    public function whmc_notification_settings_page()
    {

        register_setting("whmc_notification", "whmc_notification");
        

        add_settings_section("notification_section_setting", " ", array(
            $this,
            'whmccartnotification'
        ) , 'whmc_admin_sec_notification');

        add_settings_field("notification_enabes_whmc", esc_html__("Disable Notification Box?", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_enabes_whmc"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_designs", esc_html__("Notification Design", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_designs"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_position", esc_html__("Box Position", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_position"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));


        add_settings_field("wmhc_notification_added_text", esc_html__("Text after product name", "mini-cart-for-woocommerce") , array(
            $this,
            "wmhc_notification_added_text"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_title_color", esc_html__("Text Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_title_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_background_color", esc_html__("Box Background", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_background_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_boxshadow", esc_html__("Box Shadow Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_boxshadow"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));

        add_settings_field("notification_imageremove", esc_html__("Remove Image?", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_imageremove"
        ) , 'whmc_admin_sec_notification', "notification_section_setting");

        add_settings_field("notification_timing", esc_html__("Display Time", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_timing"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));

        add_settings_field("suceess_icon_color", esc_html__("Icon Color", "mini-cart-for-woocommerce") , array(
            $this,
            "suceess_icon_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));

        add_settings_field("notification_progress_bar_color", esc_html__("Progress Bar Color", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_progress_bar_color"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));

        add_settings_field("notification_round_bar", esc_html__("Round Box Design", "mini-cart-for-woocommerce") , array(
            $this,
            "notification_round_bar"
        ) , 'whmc_admin_sec_notification', "notification_section_setting", array('class'=>'whmcnoti_pro'));

    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function whmccartnotification()
    {

       echo "<p class='whmccartnotify'>This notification box will appear after a product is successfully carted</p>";
    }
    public function settting_sec_func_header()
    {

        return true;
    }

    public function wmhc_notification_added_text()
    {

        $notifications = get_option('whmc_notification');;
        $notifications_rang_value = isset($notifications['wmhc_notification_added_text']) ? $notifications['wmhc_notification_added_text'] : 'added successfully';

        printf('<input type="text" name="whmc_notification[wmhc_notification_added_text]" value="%s" id="wmhc_notification_added_text">', esc_attr($notifications_rang_value));

    }
 /**
     * This function is a callback function of  add seeting field
     */

    public function notification_position()
    {

    ?>
        
    <select class="notification_position" id="notification_position">
                

            <option value="top-start"><?php
        esc_html_e('Top Left', 'mini-cart-for-woocommerce');?></option>
            <option value="top"><?php
        esc_html_e('Top Center', 'mini-cart-for-woocommerce');?></option>

            <option value="top-end"><?php
        esc_html_e('Top Right', 'mini-cart-for-woocommerce');?></option>

            <option value="center-start"><?php
        esc_html_e('Center Left', 'mini-cart-for-woocommerce');?></option>

            <option value="center"><?php
        esc_html_e('Center Center', 'mini-cart-for-woocommerce');?></option>


            <option value="center-end"><?php
        esc_html_e('Center Right', 'mini-cart-for-woocommerce');?></option>
        <option value="bottom-start"><?php
        esc_html_e('Bottom Left', 'mini-cart-for-woocommerce');?></option>
            <option value="bottom"><?php
        esc_html_e('Bottom Center', 'mini-cart-for-woocommerce');?></option>
            <option value="bottom-end"><?php
        esc_html_e('Bottom Right', 'mini-cart-for-woocommerce');?></option>
            </select>

        <?php

    }
    public function notification_title_color()
    {

        $notifications = get_option('whmc_notification');
        $notifications_rang_value = isset($notifications['notification_title_color']) ? $notifications['notification_title_color'] : '#4c4c4c';

        printf('<input type="text" name="whmc_notification[notification_title_color]" value="%s"  class="notification_title_color" id="notification_title_color">', esc_attr($notifications_rang_value));

    }

    public function notification_background_color()
    {
        $notifications = get_option('whmc_notification');;
        $notifications_rang_value = isset($notifications['notification_background_color']) ? $notifications['notification_background_color'] : '#b3ffb6';

        printf('<input type="text" name="whmc_notification[notification_background_color]" value="%s"  class="notification_bg_color" id="notification_background_color">', esc_attr($notifications_rang_value));

    }
    public function notification_boxshadow()
    {
        $notifications_rang_value = '#fff';

        printf('<input type="text" value="%s"  class="notification_bg_color" id="notification_boxshadow">', esc_attr($notifications_rang_value));

    }

    public function notification_progress_bar_color()
    {

        $notifications_rang_value = '#dd0f0f';

        printf('<input type="text" value="%s"  class="progressbar_color" id="notification_progress_bar_color">', esc_attr($notifications_rang_value));

    }
    public function suceess_icon_color()
    {

        $suceess_icon_color = '#fff';

        printf('<input type="text" value="%s"  class="progressbar_color" id="suceess_icon_color">', esc_attr($suceess_icon_color));

    }


    public function notification_timing()
    {

        $notifications = get_option('whmc_notification');
        $notification_timing = isset($notifications['notification_timing']) ? $notifications['notification_timing'] : '3000';?>
        
            <select name="whmc_notification[notification_timing]" class="whmc_slect_class">
                
            <option value="1500" ><?php
        esc_html_e('1.5s', 'mini-cart-for-woocommerce');?></option>
            <option value="2000"><?php
        esc_html_e('2s', 'mini-cart-for-woocommerce');?></option>
            <option value="3000"><?php
        esc_html_e('3s', 'mini-cart-for-woocommerce');?></option>
    
            <option value="4000"><?php
        esc_html_e('4s', 'mini-cart-for-woocommerce');?></option>
            <option value="5000"><?php
        esc_html_e('5s', 'mini-cart-for-woocommerce');?></option>
            <option value="6000"><?php
        esc_html_e('6s', 'mini-cart-for-woocommerce');?></option>
            <option value="7000"><?php
        esc_html_e('7s', 'mini-cart-for-woocommerce');?></option>
            <option value="8000"><?php
        esc_html_e('8s', 'mini-cart-for-woocommerce');?></option>
            <option value="9000"><?php
        esc_html_e('9s', 'mini-cart-for-woocommerce');?></option>
            <option value="10000"><?php
        esc_html_e('10s', 'mini-cart-for-woocommerce');?></option>
            </select>
            <p class="whmc_description" ><?php echo esc_html__('Notification box persistence time (Seconds)', 'mini-cart-for-woocommerce') ?></p>

        <?php

    }

    public function notification_enabes_whmc(){

        $option = get_option('whmc_notification');
        $notification_enabes_whmc = isset($option['notification_enabes_whmc']) ? $option['notification_enabes_whmc'] : 'no';?>
    
        <select name="whmc_notification[notification_enabes_whmc]" class="notification_enabes_whmc">
            
        <option value="no" <?php
        echo esc_attr($notification_enabes_whmc) == 'no' ? 'selected' : '';?>><?php
        esc_html_e('No', 'mini-cart-for-woocommerce');?></option>
        <option value="yes" <?php
        echo esc_attr($notification_enabes_whmc) == 'yes' ? 'selected' : '';?>><?php
        esc_html_e('Yes', 'mini-cart-for-woocommerce');?></option>
    
        </select>
        <p class="whmc_description" ><?php echo esc_html__('Turn off/ Turn On the cart notification feature', 'mini-cart-for-woocommerce') ?></p>

    <?php

    }
    public function notification_designs(){

        $option = get_option('whmc_notification');
        $notification_designs = isset($option['notification_designs']) ? $option['notification_designs'] : 'minimals';?>
    
        <select name="whmc_notification[notification_designs]" class="notification_designs">
            
        <option value="minimals" <?php
        echo esc_attr($notification_designs) == 'minimals' ? 'selected' : '';?>><?php
        esc_html_e('Minimal Message', 'mini-cart-for-woocommerce');?></option>
        <option value="advanced"><?php
        esc_html_e('Sweet Message (Pro)', 'mini-cart-for-woocommerce');?></option>
    
        </select>

    <?php

    }

    public function notification_imageremove()
    {

        $notifications = get_option('whmc_notification');

        printf('<input type="checkbox" name="whmc_notification[notification_imageremove]" class="whmc_apple-switch"  value="notification_imageremove" %s id="notification_imageremove"><p class="whmc_description" >'.esc_html__("Click to make the round box shape", "mini-cart-for-woocommerce").'</p>', (isset($notifications['notification_imageremove']) && $notifications['notification_imageremove'] === 'notification_imageremove') ? 'checked' : '');

    }
    public function notification_round_bar()
    {

        printf('<input type="checkbox" class="whmc_apple-switch" id="notification_round_bar"><p class="whmc_description" checked>');

    }


}

if(class_exists('WHMC_Notifationlight')){

    new WHMC_Notifationlight;
}