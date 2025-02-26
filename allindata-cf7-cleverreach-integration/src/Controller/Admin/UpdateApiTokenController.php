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

use AllInData\CF7CRIntegration\Helper\CleverReach\ApiHandler;
use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\CF7CRIntegration\Module\Admin\MenuModule;
use AllInData\Micro\Core\Controller\AbstractAdminController;
use AllInData\Micro\Core\Controller\PluginControllerInterface;

/**
 * Class UpdateApiTokenController
 * @package AllInData\CF7CRIntegration\Controller\Admin
 */
class UpdateApiTokenController extends AbstractAdminController implements PluginControllerInterface
{
    const ACTION_SLUG = \AllInDataContactForm7CleverReachIntegration::SLUG  . '_admin_settings_api_token_update';

    /**
     * @var ApiHandler
     */
    private $apiHandler;
    /**
     * @var ConfigOptionHandler
     */
    private $configHandler;

    /**
     * UpdateApiTokenController constructor.
     * @param ApiHandler $apiHandler
     * @param ConfigOptionHandler $configHandler
     */
    public function __construct(ApiHandler $apiHandler, ConfigOptionHandler $configHandler)
    {
        $this->apiHandler = $apiHandler;
        $this->configHandler = $configHandler;
    }

    /**
     * @inheritdoc
     */
    protected function beforeExecute()
    {
        if (!$this->isAllowed()) {
            $this->throwErrorMessage(__('Insufficient permissions', \AllInDataContactForm7CleverReachIntegration::load()->getTextdomain()));
        }
    }

    /**
     * @inheritdoc
     */
    protected function doExecute()
    {
        $code = $this->getParam('code');
        $redirectionTarget = $this->getRedirectUrl();
        $apiToken = $this->apiHandler->getApiToken($code, $redirectionTarget);
        if (is_string($apiToken)) {
            $this->throwErrorMessage(
                sprintf(
                    __('Failed to fetch api token: "%s"',
                        \AllInDataContactForm7CleverReachIntegration::load()->getTextdomain()),
                    $apiToken
                )
            );
        }

        try {
            $date = new \DateTime();
            $date->add((new \DateInterval('PT'.$apiToken->getExpiresIn().'S')));
        } catch (\Exception $e) {
            $this->throwErrorMessage(
                sprintf(
                    __('Failed to process date with expiration interval: "%s"', \AllInDataContactForm7CleverReachIntegration::load()->getTextdomain()),
                    $apiToken->getExpiresIn()
                )
            );
        }
        $this->configHandler->setApiToken($apiToken);
        $this->configHandler->setApiTokenExpiry($date->format('Y-m-d H:i:s'));

        wp_safe_redirect($this->getTargetUrl());
        exit();
    }

    /**
     * @return string
     */
    private function getRedirectUrl()
    {
        return esc_url(admin_url('admin-post.php?action=' . UpdateApiTokenController::ACTION_SLUG));
    }

    /**
     * @return string
     */
    private function getTargetUrl()
    {
        return esc_url('options-general.php?page='.MenuModule::MENU_SLUG);
    }
}