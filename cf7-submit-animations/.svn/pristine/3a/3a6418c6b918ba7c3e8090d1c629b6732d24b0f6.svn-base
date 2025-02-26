<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;

use Cf7subanimsinc\Base\BaseController;

class SetCookies extends BaseController
{

    function register()
    {
        add_action('init', array($this, 'setCookie'));
    }
    function setCookie()
    {
        $options = get_option('cf7_submit_animations');
        if ($options) {
            foreach ($options as $key => $value) {
                setcookie($key, $value, time() + 3600, '/');
            }
        }
    }
}
