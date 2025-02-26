<?php
namespace EAddonsForElementor\Modules\Shortcode\Tags;

//use Elementor\Core\DynamicTags\Tag;
use \Elementor\Controls_Manager;
use EAddonsForElementor\Core\Utils;
use Elementor\Modules\DynamicTags\Module;
use EAddonsForElementor\Base\Base_Tag;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Shortcode extends Base_Tag {

    public function get_name() {
        return 'e-tag-shortcode';
    }

    public function get_title() {
        return __('Shortcode', 'dynamic-content-for-elementor');
    }

    public function get_icon() {
        return 'eadd-dynamic-tag-token';
    }
    
    public function get_pid() {
        return 5228;
    }

    /**
     * Register Controls
     *
     * Registers the Dynamic tag controls
     *
     * @since 2.0.0
     * @access protected
     *
     * @return void
     */
    protected function _register_controls() {

        $this->add_control(
                'e_shortcode',
                [
                    'label' => __('Shortcode', 'e-addons-for-elementor'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
        );
        
        $this->add_control(
                'e_shortcode_help', [
            'type' => \Elementor\Controls_Manager::RAW_HTML,
            'raw' => '<div id="elementor-panel__editor__help" class="p-0"><a id="elementor-panel__editor__help__link" href="' . $this->get_docs() . '" target="_blank">' . __('Need Help', 'elementor') . ' <i class="eicon-help-o"></i></a></div>',
            'separator' => 'before',
                ]
        );
    }

    public function render() {
        $settings = $this->get_settings_for_display(); //null, true);
        if (empty($settings))
            return;
        
        $value = do_shortcode($settings['e_shortcode']);
        //var_dump($value); die();
       
        echo $value;
    }

}
