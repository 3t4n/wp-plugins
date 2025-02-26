<?php
namespace EAddonsForElementor\Modules\Heading;

use EAddonsForElementor\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Hide extenstion
 *
 * @since 1.0.1
 */
class Heading extends Module_Base {

    public function __construct() {
            parent::__construct();
            
            add_action('elementor/frontend/after_register_scripts', [$this, 'register_libs_script']);
            add_action('elementor/frontend/before_enqueue_styles', [$this, 'register_libs_style']);
    }

    /**
     * Add Actions
     *
     * @since 0.0.1
     *
     * @access private
     */
    public function register_libs_style() {
        $this->register_style( 'splitting', 'assets/lib/splitting/splitting.css', [], '3.6.2' );
    }
    public function register_libs_script() {
        $this->register_script( 'splitting', 'assets/lib/splitting/splitting.min.js', [], '3.6.2' );
        $this->register_script( 'waypoints-inview', 'assets/lib/waypoints/inview.min.js', [], '4.0.1' );
    }
}
