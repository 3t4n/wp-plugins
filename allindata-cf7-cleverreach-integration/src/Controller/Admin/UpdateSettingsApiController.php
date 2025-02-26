<?php

declare(strict_types=1);

/*
Copyright (C) 2020 All.In Data GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace AllInData\CF7CRIntegration\Controller\Admin;


use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\Micro\Core\Controller\AbstractAdminController;
use AllInData\Micro\Core\Controller\PluginControllerInterface;

/**
 * Class UpdateSettingsApiController
 * @package AllInData\CF7CRIntegration\Admin\Controller
 */
class UpdateSettingsApiController extends AbstractAdminController implements PluginControllerInterface
{
    const ACTION_SLUG = \AllInDataContactForm7CleverReachIntegration::SLUG . '_admin_settings_api_update';

    /**
     * @var ConfigOptionHandler
     */
    private $configHandler;

    /**
     * UpdateSettingsApiController constructor.
     * @param ConfigOptionHandler $configHandler
     */
    public function __construct(ConfigOptionHandler $configHandler)
    {
        $this->configHandler = $configHandler;
    }

    /**
     * @inheritdoc
     */
    protected function doExecute()
    {
        $apiClientId = $this->getParam('aid-cf7cr-api-client-id');
        $apiClientSecret = $this->getParam('aid-cf7cr-api-client-secret');
        $apiToken = $this->getParam('aid-cf7cr-api-token');
        $redirectionTarget = $this->getParam('target');

        $token = $this->configHandler->getApiToken();
        $token->setAccessToken($apiToken);

        $this->configHandler->setApiClientId($apiClientId);
        $this->configHandler->setApiClientSecret($apiClientSecret);
        $this->configHandler->setApiToken($token);

        wp_safe_redirect(admin_url($redirectionTarget));
        exit();
    }
}