<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;

use Cf7subanimsinc\Base\BaseController;

class Activate extends BaseController
{
    public static function activate()
    {
        // echo "Activated";
        flush_rewrite_rules();

        if (!get_option('cf7_submit_animations')) {
            update_option('cf7_submit_animations', array(
                'enable' => 'true'
            ));
        }
    }
}
