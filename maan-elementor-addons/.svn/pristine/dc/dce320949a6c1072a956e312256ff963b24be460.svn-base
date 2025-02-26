<?php


namespace Maantheme\Addons\Elementor;
/**
 * The Elementor init handler class
 */
class Init
{
    /**
     * Constructor
     *
     * Perform some compatibility checks to make sure basic requirements are meet.
     * If all compatibility checks pass, initialize the functionality.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
        // Add Plugin actions
        add_action('elementor/frontend/after_register_scripts', [$this, 'register_frontend_scripts'], 20);
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'register_frontend_styles'], 20);
        add_action('elementor/editor/before_enqueue_scripts', [$this, 'register_elementor_editor_css'], 20);
        add_action('elementor/widgets/register', [$this, 'register_widgets' ]);
        add_action('elementor/init', [$this, 'add_elementor_category'], 20);
    }

    public function add_elementor_category() {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'maan-elementor-addons',
            array(
                'title' => __('Maan Addons', 'maan-elementor-addons'),
                'icon' => 'fa fa-plug',
            ),
            1);
    }

    /**
     * Register Widgets
     *
     * Load widgets files and register new Elementor widgets.
     *
     * Fired by `elementor/widgets/register` action hook.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets( $widgets_manager ) {
        $widgets[] = '';
        foreach( glob( MAAN_ELEMENTOR_ADDONS_ELEMENTOR_DIR. 'widgets/*' ) as $file ) {
            $widgets[] = substr($file, strrpos($file, '/') + 1);
        }
        if (is_array($widgets)){
            $widgets = array_filter($widgets);
            foreach ($widgets as $key => $value){
                if (!empty($value)) {
                    require_once MAAN_ELEMENTOR_ADDONS_ELEMENTOR_DIR . 'widgets/'.$value.'/index.php';
                }
            }
        }
    }

    /**
     * Load Frontend Scripts
     *
     */
    public function register_frontend_scripts() {
        foreach( glob( MAAN_ELEMENTOR_ADDONS_DIR. 'assets/js/*.js' ) as $file ) {
            $filename = substr($file, strrpos($file, '/') + 1);
            wp_enqueue_script( $filename, MAAN_ELEMENTOR_ADDONS_ASSETS . 'js/'.$filename, array('jquery'), MAAN_ELEMENTOR_ADDONS_VERSION, true);
        }
    }

    public function register_elementor_editor_css() {
        wp_enqueue_style( 'elementor-custom-editor', MAAN_ELEMENTOR_ADDONS_ASSETS . 'css/editor.css');
    }

    public function register_frontend_styles() {
        foreach( glob( MAAN_ELEMENTOR_ADDONS_DIR. 'assets/css/*.css' ) as $file ) {
            $filename = substr($file, strrpos($file, '/') + 1);
            wp_enqueue_style( $filename, MAAN_ELEMENTOR_ADDONS_ASSETS . 'css/'.$filename, array(), filemtime(MAAN_ELEMENTOR_ADDONS_DIR . 'assets/css/' . $filename), 'all');
        }
    }
}