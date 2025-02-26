<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Emb3D_Model_Viewer
 * @subpackage Emb3D_Model_Viewer/public
 * @author     Netfarm S.r.l. <info@emb3d.com>
 */
class Emb3D_Model_Viewer_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name The ID of this plugin.
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
     * @param    string    $plugin_name The name of the plugin.
     * @param    string    $version     The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the scripts and stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        // load script as module
        add_filter('script_loader_tag', [$this, 'add_type_to_script'], 1, 3);

        wp_enqueue_script(
            Emb3D::SCRIPT_ELEMENT,
            plugin_dir_url(__FILE__) . 'js/libs/emb3d-viewer.js',
            [],
            $this->version
        );

        remove_filter('script_loader_tag', [$this, 'add_type_to_script']);

        wp_enqueue_style(
            Emb3D::STYLE_PUBLIC,
            plugin_dir_url(__FILE__) . 'css/emb3d-model-viewer-public.css',
            [],
            $this->version,
            'all'
        );

        if (!is_singular('product') || !($post_id = get_the_ID())) {
            return;
        }

        if (!isset($GLOBALS[Emb3D::META_BOX_MODEL_ID])) {
            $GLOBALS[Emb3D::META_BOX_MODEL_ID] = get_post_meta($post_id, Emb3D::META_BOX_MODEL_ID, true);
        }

        if (empty($GLOBALS[Emb3D::META_BOX_MODEL_ID])) {
            return;
        }

        if (!isset($GLOBALS[Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE])) {
            $GLOBALS[Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE] = intval(get_post_meta($post_id, Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE, true));
        }

        if (!$GLOBALS[Emb3D::META_BOX_MODEL_REPLACE_PRODUCT_IMAGE]) {
            // we need jQuery Dialog for standalone display when not replacing product image
            wp_enqueue_script('jquery-ui-dialog');
            wp_enqueue_style('wp-jquery-ui-dialog');
        }

        if (!isset($GLOBALS[Emb3D::META_BOX_MODEL_BACKGROUND_COLOR])) {
            $GLOBALS[Emb3D::META_BOX_MODEL_BACKGROUND_COLOR] = get_post_meta($post_id, Emb3D::META_BOX_MODEL_BACKGROUND_COLOR, true);
        }

        if (!isset($GLOBALS[Emb3D::META_BOX_MODEL_PROGRESS_COLOR])) {
            $GLOBALS[Emb3D::META_BOX_MODEL_PROGRESS_COLOR] = get_post_meta($post_id, Emb3D::META_BOX_MODEL_PROGRESS_COLOR, true);
        }

        // Hook wp_footer for WooCommerce ;(
        add_action('wp_footer', [$this, 'wp_footer_hook']);
    }

    public function add_type_to_script($tag, $handle, $src)
    {
        if ($handle === Emb3D::SCRIPT_ELEMENT)
            $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
        return $tag;
    }

    // for WooCommerce
    public function wp_footer_hook()
    {
        if (!($model_url = wp_get_attachment_url($GLOBALS[Emb3D::META_BOX_MODEL_ID]))) {
            return;
        }

        $background_color = $GLOBALS[Emb3D::META_BOX_MODEL_BACKGROUND_COLOR];
        $progress_color = $GLOBALS[Emb3D::META_BOX_MODEL_PROGRESS_COLOR];

        $registration_key = get_option(Emb3D::REGISTRATION_KEY);
        include_once(plugin_dir_path(__FILE__) . 'partials/emb3d-model-viewer-woo.php');
    }

    /**
     * Register widgets for Elementor
     *
     * @since    1.0.0
     */
    public function register_elementor_widgets($widgets_manager)
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-emb3d-model-viewer-widget.php';
        $widgets_manager->register(new \Emb3D_Model_Viewer_Widget());
    }

    public function register_elementor_editor_scripts()
    {
        wp_enqueue_style(
            Emb3D::STYLE_ELEMENTOR_EDITOR,
            plugin_dir_url(__FILE__) . 'css/emb3d-model-viewer-elementor.css',
            [],
            $this->version,
            'all'
        );
    }

    function add_models_mimes($mimes)
    {
        return array_merge($mimes, Emb3D::SUPPORTED_EXTENSIONS);
    }

    function check_filetype_and_ext_filter($data, $file, $filename)
    {
        $path_parts = pathinfo($filename);
        $ext = $path_parts['extension'];

        if (!array_key_exists($ext, Emb3D::SUPPORTED_EXTENSIONS))
            return $data;

        $type = Emb3D::SUPPORTED_EXTENSIONS[$ext];

        return compact('ext', 'type', 'proper_filename');
    }

    function add_ext2type($ext2type)
    {
        $ext2type['model'] = array_keys(Emb3D::SUPPORTED_EXTENSIONS);
        return $ext2type;
    }

    function add_icon_dirs($icon_dirs)
    {
        $icon_dir = plugin_dir_path(__FILE__) . 'images/media';
        $icon_dir_uri = plugins_url('images/media', __FILE__);
        $icon_dirs[$icon_dir] = $icon_dir_uri;
        return $icon_dirs;
    }
}
