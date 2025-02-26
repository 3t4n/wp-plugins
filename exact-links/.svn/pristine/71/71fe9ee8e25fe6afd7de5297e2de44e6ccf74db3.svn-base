<?php

namespace ExactLinks\App\Http\Policies;

use ExactLinks\Framework\Foundation\Policy;

/**
 *  BasePolicy - REST API Permission Policy
 *
 * @package ExactLinks\App\Http
 *
 * @version 3.0.7
 */
class BasePolicy extends Policy
{
    public function currentUserCan($permission)
    {
        return current_user_can($permission);
    }
}
