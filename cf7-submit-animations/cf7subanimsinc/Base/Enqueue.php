<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;

use Cf7subanimsinc\Base\BaseController;

class Enqueue extends BaseController
{

    function register()
    {
        $options = get_option('cf7_submit_animations');
        if (isset($options['enable'])) {
            if ($options['enable'] == 'true') {
                add_action('wp_enqueue_scripts', array($this, 'enqueue'), 11);
            }
        }
    }
    function enqueue()
    {
        wp_enqueue_style('particles', $this->plugin_url . '/assets/particles.css');
        wp_enqueue_script('particlesjs', $this->plugin_url . '/assets/particles.js', array(), false, true);
        wp_enqueue_script('driver', $this->plugin_url . '/assets/driver.js', array('particlesjs'), false, true);
    }
}
