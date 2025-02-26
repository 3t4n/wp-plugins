<?php

namespace ExactLinks\App\Http\Policies;

use ExactLinks\Framework\Request\Request;

/**
 *  SettingsPolicy - REST API Permission Policy
 *
 * @package ExactLinks\App\Http
 *
 * @version 3.0.7
 */
class AdminPolicy extends BasePolicy
{
    /**
     * Check user permission for any method
     * @param \ExactLinks\Framework\Request\Request $request
     * @return Boolean
     */
    public function verifyRequest(Request $request)
    {
        return true;
        return $this->currentUserCan('manage_options');
    }
}
