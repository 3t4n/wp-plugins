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
class MASTERLite_QR_shortcodeDOcs
{

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'MASTERLite_QR_shortcode_docs_page'
        ));

    }

    function MASTERLite_QR_shortcode_docs_page()
    {

        register_setting("MASTERLite_QR_shortcode_docs", "MASTERLite_QR_shortcode_docs", ''); // sanitize_callback);
        

        add_settings_section("mqr_shrtcode_docs_section", "Shortcode Documentation", array(
            $this,
            'settting_docs_sec_func'
        ) , 'mqr_docs_admin_shortcode');

        add_settings_field("qr_code_custom_text_docs", esc_html__("Custom Link/Text", "master-qr-generator") , array(
            $this,
            "qr_code_custom_text_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");
        add_settings_field("qr_code_whatapp_docs", esc_html__("QR for WhatsApp", "master-qr-generator") , array(
            $this,
            "qr_code_whatapp_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");
        add_settings_field("qr_code_wifi_docs", esc_html__("QR for Wifi", "master-qr-generator") , array(
            $this,
            "qr_code_wifi_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");

        add_settings_field("qr_code_maps_docs", esc_html__("QR for Maps", "master-qr-generator") , array(
            $this,
            "qr_code_maps_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");

        add_settings_field("qr_code_vcard_docs", esc_html__("QR for Vcard(Contact info)", "master-qr-generator") , array(
            $this,
            "qr_code_vcard_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");

        add_settings_field("qr_code_posttype_docs", esc_html__("Display QR list by post type", "master-qr-generator") , array(
            $this,
            "qr_code_posttype_docs"
        ) , 'mqr_docs_admin_shortcode', "mqr_shrtcode_docs_section");
    }
    /**
     * This function is a callback function of  add seeting section
     */

    function settting_docs_sec_func()
    {

        echo "<div class='masterprofe'>This is Premium Feature</div>";
    }

    /**
     * This function is a callback function of  add seeting field
     */

    function qr_code_whatapp_docs()
    { ?>

    <input type="text" value='[masterqr_whatsapp whatsapp="+15623526019" size="254" logo="" print_hide="no" download_hide="no"]' style="width:87%" id="qr_whatappdocs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_whatappdocs"><span class="dashicons dashicons-admin-page"></span></button>

     <ul class="duydjkhfdh">
         <li><em> *whatsapp</em> = "Write Whatsapp numer with Country Code" ,</li>
         <li><em>*size </em>= "Numeric value" ,</li>
         <li><em>*logo </em>= "image url" ,</li>
         <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>

     </ul>
    <?php
    }

    function qr_code_custom_text_docs()
    { ?>

    <input type="text" value='[masterqr_link link="Hello developer " size="254" logo="" print_hide="no" download_hide="no"]' style="width:87%" id="qr_cust_tx_docs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_cust_tx_docs"><span class="dashicons dashicons-admin-page"></span></button>'
     <ul class="duydjkhfdh">
         <li><em> *link</em> = "Write Text, Url, Number" ,</li>
         <li><em>*size </em>= "Numeric value" ,</li>
         <li><em>*logo </em>= "image url" ,</li>
         <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>         
     </ul>
    <?php
    }
    function qr_code_wifi_docs()
    { ?>

    <input type="text" value='[masterqr_wifi wifi_name="Your-Wifi" wifi_type="WPA" wifi_password="1234" size="254" logo="" print_hide="no" download_hide="no"]' style="width:87%" id="qr_wifi_docs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_wifi_docs"><span class="dashicons dashicons-admin-page"></span></button>'
     <ul class="duydjkhfdh">
         <li><em> *wifi_name</em> = "String" ,</li>
         <li><em> *wifi_type</em> = "String" ,</li>
         <li><em> *wifi_password</em> = "String/numeric" ,</li>
         <li><em>*size </em>= "Numeric value" ,</li>
         <li><em>*logo </em>= "Image url" ,</li>
          <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>        
     </ul>
    <?php
    }
    function qr_code_maps_docs()
    { ?>

    <input type="text" value='[masterqr_maps query="Sharabindu Bakshi" longitude="24.2015042" latitude="88.9968031" size="254" logo="" print_hide="no" download_hide="no"]' style="width:87%" id="qr_maps_docs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_maps_docs"><span class="dashicons dashicons-admin-page"></span></button>'
     <ul class="duydjkhfdh">
         <li><em> *query</em> = "String" ,</li>
         <li><em> *longitude</em> = "numeric" ,</li>
         <li><em> *latitude</em> = "numeric" ,</li>
         <li><em>*size </em>= "Numeric value" ,</li>
         <li><em>*logo </em>= "Image url" ,</li>
         <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>
     </ul>
    <?php
    }
    function qr_code_vcard_docs()
    { ?>
    <input type="text" value='[masterqr_vcard name="Sharabindu" company="Plugin House" subtitle="Creating innovative" mobile="+15623526019" phone="+102194434" email="sharabindu86@gmail.com" website="https://sharabindu.com/plugins/master-qr-generator/" address ="70A Boat Quay,Singapore" note ="This is a software Company" print_hide="no" download_hide="no"]' style="width:87%" id="qr_vcard_docs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_vcard_docs"><span class="dashicons dashicons-admin-page"></span></button>'
     <ul class="duydjkhfdh">

         <li><em> *name</em> = "String" ,</li>
         <li><em> *company</em> = "String" ,</li>
         <li><em> *subtitle</em> = "String" ,</li>
         <li><em> *mobile</em> = "numeric" ,</li>
         <li><em> *email</em> = "String" ,</li>
         <li><em> *phone</em> = "numeric" ,</li>
         <li><em> *website</em> = "String" ,</li>
         <li><em> *address</em> = "String" ,</li>
         <li><em> *note</em> = "String" ,</li>
         <li><em>*size </em>= "Numeric value" ,</li>
         <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>         
        <strong>*Logo not allowed * </strong>
     </ul>
    <?php
    }
    function qr_code_posttype_docs()
    { ?>
    <input type="text" value='[mqr-type-post type="product" title="true" taxonomy="product_cat" category="tshirts,decor" print_hide="no" download_hide="no"]' style="width:87%" id="qr_posttype_docs">
    <button type="button" class="masterqr_qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_posttype_docs"><span class="dashicons dashicons-admin-page"></span></button>'
     <ul class="duydjkhfdh">

         <li><em> *type</em> = "String", Post type name e.g: post,page,product,custom post ,</li>
         <li><em> *title</em> = Boolean ,display the title of the post</li>
         <li><em>* taxonomy (Optional)</em> = "String" ,taxonomy name of the post type, e.g; category,tag,product_cat</li>
         <li><em> *category (Optional)</em> = "numeric" ,Name of the categories under taxonomy</li>
        <li><em>* id (Optional)</em> = "numeric" " , Display item by the post id, e.g: id="24,25"</li>
         <li><em> *limit</em> = "numeric" , Display item number</li>
         <li><em>*print_hide </em>= "no" ,</li>
         <li><em>*download_hide </em>= "no" ,</li>
     </ul>
    <?php
    }
}

