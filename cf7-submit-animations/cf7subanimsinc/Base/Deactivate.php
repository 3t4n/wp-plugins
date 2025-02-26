<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
