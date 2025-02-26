<?php
/**
 * The file that defines the bulk qrc_download admin area
 *
 * -facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/master-qr-generator/
 * @since      2.0.4
 *
 * @package    masterqr
 * @subpackage masterqr/admin
 */

class MASTER_lite_logo_Generator
{

    public function __construct()
    {

        add_action('admin_init', array(
            $this,
            'masterqr_link_generator_page'
        ));

    }
    public function masterqr_link_generator_page()
    {
        include MASTER_QR_LITE_PATH . '/admin/extra/logoGeneretorRegiser.php';

    }
    /**
     * This function is a callback function of  add seeting section
     */

    public function Mastersettting_log_sec_func(){ ?>

<div class="qrc-box-header" >
            <h3 class="sui-box-title"><?php echo esc_html__('QR codes for various components', 'master-qr-generator') ?>
</h3>
<p class="vrcomponents"><?php echo esc_html__('Basically,it generates QR codes for the following elements. which are displayed on the frontend through shortcodes. Most interestingly, you can also generate this QR code using ', 'master-qr-generator') ?></p>

        </div>
        <?php
}

    

    /**
     * This function is a callback function of  add seeting field
     */

    public function qr_code_maps_text()
    {

        $options = get_option('masterqr_link_generator');
        $qr_code_maps_text = isset($options['qr_code_maps_text']) ? $options['qr_code_maps_text'] : '';
        $qr_code_lati_type = isset($options['qr_code_lati_type']) ? $options['qr_code_lati_type'] : '';
        $qr_code_longitude = isset($options['qr_code_longitude']) ? $options['qr_code_longitude'] : '';

    printf('<p><label for="qrc_wifi" class="qrc_label wifi">Latitude</label>
        <input type="text" name="masterqr_link_generator[qr_code_lati_type]"   value="%s" placeholder="Enter map latitude" id="qrc_wifi" style="min-width:300px"></p><p>
        <label for="qrc_wifi_t"  class="qrc_label wifi">Longitude</label> 
            <input type="text"  name="masterqr_link_generator[qr_code_longitude]"   value="%s" placeholder="Enter map longitude" id="qrc_wifi_t" style="min-width:300px"></p><p>  
            <label for="qrc_wifi_p"  class="qrc_label wifi">Query</label>   
            <input type="text"  name="masterqr_link_generator[qr_code_maps_text]"   value="%s" placeholder="Write Maps Query" id="qrc_wifi_p" style="min-width:300px"></p>
            <p class="qrcshortvar">
            <input id="qmaps" type="text" class="shortcodereadoly" value="[masterqr_maps]" readonly >
            <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qmaps" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button></p>', esc_attr($qr_code_lati_type), esc_attr($qr_code_longitude), esc_attr($qr_code_maps_text));

    }

    /**
     * This function is a callback function of  add seeting field
     */

    public function master_qr_vcard()
    {

        $options = get_option('masterqr_link_generator');

        $mastervcard_name = isset($options['mastervcard_name']) ? $options['mastervcard_name'] : '';
        $mastervcard_company = isset($options['mastervcard_company']) ? $options['mastervcard_company'] : '';
        $mastervcard_subtitle = isset($options['mastervcard_subtitle']) ? $options['mastervcard_subtitle'] : '';
        $mastervcard_mbunber = isset($options['mastervcard_mbunber']) ? $options['mastervcard_mbunber'] : '';
        $mastervcard_pbunber = isset($options['mastervcard_pbunber']) ? $options['mastervcard_pbunber'] : '';
        $mastervcard_email = isset($options['mastervcard_email']) ? $options['mastervcard_email'] : '';
        $mastervcard_address = isset($options['mastervcard_address']) ? $options['mastervcard_address'] : '';
        $mastervcard_note = isset($options['mastervcard_note']) ? $options['mastervcard_note'] : '';
        $mastervcard_website = isset($options['mastervcard_website']) ? $options['mastervcard_website'] : '';

        printf('<label class="mastqrQRBaleb">Name:</label>
        <input type="text" name="masterqr_link_generator[mastervcard_name]"   value="%s" placeholder="Enter Name" id="mastqrwifi_p">
        <label  class="mastqrQRBaleb">Company / Title:</label> 
            <input type="text"  name="masterqr_link_generator[mastervcard_company]"   value="%s" placeholder="Enter Title" id="mastqrwifi_p" > 
            <label  class="mastqrQRBaleb">Sub Title:</label>    
            <input type="text"  name="masterqr_link_generator[mastervcard_subtitle]"   value="%s" placeholder="Enter Subtitle" id="mastqrwifi_p"> 
            <label class="mastqrQRBaleb">Mobile Number:</label>    
            <input type="text"  name="masterqr_link_generator[mastervcard_mbunber]"   value="%s" placeholder="Enter Mobile Number" id="mastqrwifi_p" > 
            <label  class="mastqrQRBaleb">Phone Number:</label>    
            <input type="text"  name="masterqr_link_generator[mastervcard_pbunber]"   value="%s" placeholder="Enter Phone Number" id="mastqrwifi_p" >
            <label class="mastqrQRBaleb">Email:</label>    
            <input type="text"  name="masterqr_link_generator[mastervcard_email]"   value="%s" placeholder="Enter email" id="mastqrwifi_p" >
            <label class="mastqrQRBaleb">Website:</label>    
            <input type="text"  name="masterqr_link_generator[mastervcard_website]"   value="%s" placeholder="Enter website" id="mastqrwifi_p" >
            <label class="mastqrQRBaleb">Address:</label>   
           <textarea name="masterqr_link_generator[mastervcard_address]" placeholder="Enter Addess" id="mastqrwifi_p" >%s</textarea>
            <label class="mastqrQRBaleb">Note:</label>   
           <textarea name="masterqr_link_generator[mastervcard_note]" placeholder="Enter Note" id="mastqrwifi_p" >%s</textarea>
            
            <p class="qrcshortvar">
            <input id="mvacrd" type="text" class="shortcodereadoly" value="[masterqr_vcard]" readonly >
            <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#mvacrd" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button></p>', esc_attr($mastervcard_name), esc_attr($mastervcard_company), esc_attr($mastervcard_subtitle), esc_attr($mastervcard_mbunber), esc_attr($mastervcard_pbunber), esc_attr($mastervcard_email), esc_attr($mastervcard_website), esc_attr($mastervcard_address), esc_attr($mastervcard_note));

    }
    /**
     * This function is a callback function of  add seeting field
     */

    public function qr_code_wifi_text()
    {

        $options = get_option('masterqr_link_generator');
        $qr_code_wifi_name = isset($options['qr_code_wifi_name']) ? $options['qr_code_wifi_name'] : '';
        $qr_code_wifi_type = isset($options['qr_code_wifi_type']) ? $options['qr_code_wifi_type'] : '';
        $qr_code_wifi_password = isset($options['qr_code_wifi_password']) ? $options['qr_code_wifi_password'] : '';


        printf('<p><label for="qrc_wifi" class="qrc_label wifi">Wifi Name</label>
        <input type="text" name="masterqr_link_generator[qr_code_wifi_name]"   value="%s" placeholder="Write wifi name" id="qrc_wifi" style="min-width:300px"></p><p>
        <label for="qrc_wifi_t"  class="qrc_label wifi">Wifi Type</label> 
            <input type="text"  name="masterqr_link_generator[qr_code_wifi_type]"   value="%s" placeholder="Write wifi type" id="qrc_wifi_t" style="min-width:300px"> </p><p>
            <label for="qrc_wifi_p"  class="qrc_label wifi">Wifi Password   </label>    
            <input type="text"  name="masterqr_link_generator[qr_code_wifi_password]"   value="%s" placeholder="Write wifi password" id="qrc_wifi_p" style="min-width:300px"></p> 
            <p class="qrcshortvar">
            <input id="wifiexre" type="text" class="shortcodereadoly" value="[masterqr_wifi]" readonly >
            <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#wifiexre" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button></p>', esc_attr($qr_code_wifi_name), esc_attr($qr_code_wifi_type), esc_attr($qr_code_wifi_password));
    }
    /**
     * This function is a callback function of  add seeting field
     */

    public function qr_code_mail_text()
    {

        $options = get_option('masterqr_link_generator');
        $options_value = isset($options['qr_code_mail_text']) ? $options['qr_code_mail_text'] : '';
        $placeholder = esc_html('Input WhatsApp numer with Country Code', 'master-qr-generator');

    printf('<p><input type="text" id="qr_code_mail_text" name="masterqr_link_generator[qr_code_mail_text]"   value="%s" placeholder="'.esc_attr($placeholder).'" style="min-width:300px"></p><p class="qrcshortvar">
            <input id="qr_whaappxre" type="text" class="shortcodereadoly" value="[masterqr_whatsapp]" readonly >
            <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_whaappxre" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button></p>
            ', esc_attr($options_value));



    }


    public function qr_code_custom_text()
    {

        $options = get_option('masterqr_link_generator');
        $options_value = isset($options['qr_code_custom_text']) ? $options['qr_code_custom_text'] : '';
        $placeholder = esc_html('Enter a text or link', 'master-qr-generator');

    printf('<p><input style="width:300px" type="text" id="qr_code_custom_text" name="masterqr_link_generator[qr_code_custom_text]"   value="%s" placeholder="'.esc_attr($placeholder).'"></p><p class="qrcshortvar">
            <input id="qr_linkexre" type="text" class="shortcodereadoly" value="[masterqr_link]" readonly >
            <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_linkexre" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button></p>',esc_attr($options_value));
    }

    public function qr_log_option_page_sanitize($input)
    {
        include MASTER_QR_LITE_PATH . '/admin/extra/logoGenratorValuesave.php';

        return $sanitary_values;
    }

}

