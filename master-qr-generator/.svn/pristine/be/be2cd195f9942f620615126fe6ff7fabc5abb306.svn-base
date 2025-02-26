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

class MasterQRlite_logo_postype
{

    public function __construct()
    {

        add_action('admin_init', array(
            $this,
            'masterqr_logo_posttype_page'
        ));

    }
    public function masterqr_logo_posttype_page()
    {
        include MASTER_QR_LITE_PATH . '/admin/extra/logoSettingRegiser.php';

    }
    /**
     * This function is a callback function of  add seeting section
     */

    public function Mastersettting_log_sec_func()
    {

        echo "<div class='masterprofe'>This is Premium Feature</div>";
    }


    public function qrc_log_image_upload()
    {

    $args = array(
        'public' => true,
    );

        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template','wp_template_part','wp_navigation','wp_global_styles');

        $types = get_post_types( $args);
        $post_types = array_diff($types, $excluded_posttypes);

        foreach ($post_types as $post_type)
        {
        $post_type_title = get_post_type_object($post_type);
        $options = get_option('masterqr_logo_posttype');
        $vlues = isset($options[$post_type]) ? $options[$post_type] : '';
        $sdfsdsd = 'uyiroiuiu_'.$post_type;

        printf('<p class="masterLogoSlide"><label for ="bgimageid_%s" style="display:inline-block"><strong>' . esc_attr($post_type_title->labels->name) . ' :</strong></label>

        <input class="master_widefat" id="bgimageid_%s" type="text" name="masterqr_logo_posttype[%s]" />
        <input id="uploadimageid_%s" type="button" class="button button-primary" value="Insert Image" />
        </p>

        <script>

        function Logos_'.esc_js($post_type).'(){

        var MediaUploderIdPostype;
        jQuery("#uploadimageid_'.esc_js($post_type).'").click(function(e) {
        e.preventDefault();
        if (MediaUploderIdPostype) {
        MediaUploderIdPostype.open();
        return;
        }
        MediaUploderIdPostype = wp.media.frames.file_frame = wp.media({
        title: "Choose Image",
        button: {
        text: "Choose Image"
        },
        multiple: false
        });
        MediaUploderIdPostype.on("select", function() {
        var attachment = MediaUploderIdPostype.state().get("selection").first().toJSON();
        jQuery("#bgimageid_'.esc_js($post_type).'").val(attachment.url);
        });
        MediaUploderIdPostype.open();
        });
        }Logos_'.esc_js($post_type).'();
        </script> ', esc_attr($post_type), esc_attr($post_type), esc_attr($post_type),esc_attr($post_type));

        }


    echo "<em> ".esc_html("If the image field is blank for a post type, then the logo image will be active from the 'Current Page QR' logo image settings","master-qr-generator")."</em>";

        }



    public function qr_log_option_page_sanitize($input)
    {
        include MASTER_QR_LITE_PATH . '/admin/extra/logoPosttypeValuesave.php';

        return $sanitary_values;
    }

}if(class_exists("MasterQRlite_logo_postype")){

    new MasterQRlite_logo_postype();
}

