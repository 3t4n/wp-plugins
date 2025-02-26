<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sharabindu.com/plugins/master-qr-generator/
 * @since      2.0.4
 *
 * @package    masterqr
 * @subpackage masterqr/admin
 */
class MASTER_QR_Lite_Admin
{

    /**
     * The option page variable of this plugin.
     *
     * @since    2.0.4
     * @access   private
     * @var      string
     $qrc_option_page_options     option name.
     */
    private $qrc_option_page_options;

    /**
     * The ID of this plugin.
     *
     * @since    2.0.4
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.4
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.4
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        define('MasterQRLite_ID', 'master-qr-generator');

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_masterqr-generator.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_masterqr_shortcode_admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_masterqr_logo_setting.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_masterqr_shortodedocs.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-masterqr-metavlue.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-masterqr-redirect.php';

        $plugin_name = new MASTER_lite_logo_Generator();
        $plugin_name = new MASTER_LiteQR_Generator();
        $plugin_name = new MASTERLite_QR_shortcodeDOcs();


    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    2.0.4
     */
    public function enqueue_styles()
    {
        $nonce = wp_create_nonce( 'mqr-nonce' );
        if ( ! wp_verify_nonce( $nonce, 'mqr-nonce' ) ) return;
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), MasterQRLite_ID) !== false) {


        wp_enqueue_style('wp-color-picker');
    }
        wp_enqueue_style($this->plugin_name, MASTER_QR_LITE_URL . 'admin/css/masterqr-admin.css', array() , $this->version, 'all');


    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    2.0.4
     */
    public function enqueue_scripts()
    {

        $nonce = wp_create_nonce( 'mqr-nonce' );
        if ( ! wp_verify_nonce( $nonce, 'mqr-nonce' ) ) return;
        wp_enqueue_script('easy-qrcode', MASTER_QR_LITE_URL . 'admin/js/easy.qrcode.min.js', array(
            'jquery'
        ) , $this->version, true);
        wp_enqueue_script('printJsd', MASTER_QR_LITE_URL . 'admin/js/jQuery.print.js', array('jquery') , $this->version, true);

    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), MasterQRLite_ID) !== false) {

        wp_enqueue_script('wp-color-picker');

        wp_enqueue_script('clipboard', MASTER_QR_LITE_URL . 'admin/js/clipboard.min.js', array('jquery'
        ) , $this->version, true);
        wp_enqueue_script('clipbord-script', MASTER_QR_LITE_URL . 'admin/js/clipbord-script.js', array(
            'clipboard'
        ) , $this->version, true);

    wp_enqueue_script('custom-script-handle', MASTER_QR_LITE_URL . 'admin/js/custom.js', array(
            'jquery','wp-color-picker'), $this->version ,true);

        wp_enqueue_media();
        wp_enqueue_script('media-upload');

        wp_enqueue_script('custom-media-handle', MASTER_QR_LITE_URL . 'admin/js/media.js', array('jquery') ,$this->version, true);
}
    wp_enqueue_script('master_qr', MASTER_QR_LITE_URL . 'public/js/custom.js', array(
            'jquery',
        ) ,time(), true);

        global $wp;
        $current_id_link = home_url(add_query_arg(array() , $wp->request));

        $options = get_option('masterqr_settings');   
        $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;
        $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.5; 
        include MASTER_QR_LITE_PATH . '/admin/extra/optionValue.php';
            $data = array(
            "linksas"=> $current_id_link,
            "scale"=> $dot_scale,
            "size"=> $qrc_size,
            "bgcolor"=> $qrc_bgcolor,
            "qrcolor"=> $qrc_color,
        );


        wp_localize_script( 'master_qr', 'datas', $data );    

    }

    /**
     * Setting link.
     *
     * @since    2.0.4
     */

    public function plugin_settings_link($links)
    {
        if (is_admin())
        {

            return array_merge(array(
                '<a href="' . admin_url('admin.php?page=masterqr') . '">' . esc_html__('Settings', 'master-qr-generator') . '</a>',
            ) , $links);
        }
    }



}

