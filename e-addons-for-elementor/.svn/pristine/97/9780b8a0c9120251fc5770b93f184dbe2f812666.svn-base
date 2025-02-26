<?php
namespace EAddonsForElementor\Modules\Mask;

use EAddonsForElementor\Base\Module_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Hide extenstion
 *
 * @since 1.0.1
 */
class Mask extends Module_Base {

    public function __construct() {
            parent::__construct();
            
            add_action('elementor/frontend/before_enqueue_styles', [$this, 'register_libs']);
    }

    /**
     * Add Actions
     *
     * @since 0.0.1
     *
     * @access private
     */
    public function register_libs() {
        //$this->register_script( 'xxx', 'assets/lib/xxx.min.js', [], '1.12.1' );
    }
}
