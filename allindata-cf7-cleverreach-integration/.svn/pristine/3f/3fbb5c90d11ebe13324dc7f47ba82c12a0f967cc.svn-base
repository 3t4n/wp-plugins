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

namespace AllInData\CF7CRIntegration\Block\Admin;

use AllInData\CF7CRIntegration\Controller\Admin\UpdateSettingsApiController;
use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\CF7CRIntegration\Controller\Admin\UpdateApiTokenController;
use AllInData\CF7CRIntegration\Helper\CleverReach\ApiHandler;
use AllInData\CF7CRIntegration\Module\Admin\MenuModule;
use AllInData\Micro\Core\Block\AbstractBlock;

/**
 * Class SettingsApiBlock
 * @package AllInData\CF7CRIntegration\Block\Admin
 */
class SettingsApiBlock extends AbstractBlock
{
    /**
     * @var ConfigOptionHandler
     */
    private $configHandler;
    /**
     * @var ApiHandler
     */
    private $apiHandler;

    /**
     * SettingsApiBlock constructor.
     * @param ConfigOptionHandler $configHandler
     * @param ApiHandler $apiHandler
     */
    public function __construct(ConfigOptionHandler $configHandler, ApiHandler $apiHandler)
    {
        $this->configHandler = $configHandler;
        $this->apiHandler = $apiHandler;
    }

    /**
     * @return string|null
     */
    public function getApiToken()
    {
        return $this->configHandler->getApiToken()->getAccessToken();
    }

    /**
     * @return string|null
     */
    public function getApiClientId()
    {
        return $this->configHandler->getApiClientId();
    }

    /**
     * @return string|null
     */
    public function getApiClientSecret()
    {
        return $this->configHandler->getApiClientSecret();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getApiTokenExpiryDate()
    {
        $expiryDate = $this->configHandler->getApiTokenExpiry();
        if (!$expiryDate) {
            return '';
        }

        return date_i18n(get_option( 'date_format' ), (new \DateTime($expiryDate))->getTimestamp());
    }

    /**
     * @return string
     */
    public function getFormSubmitUrl()
    {
        return esc_url(admin_url('admin-post.php'));
    }

    /**
     * @return string
     */
    public function getFormRedirectTarget()
    {
        return esc_url('options-general.php?page='.MenuModule::MENU_SLUG);
    }

    /**
     * @return string
     */
    public function getTokenRefreshRedirectTarget()
    {
        return esc_url(admin_url('admin-post.php?action=' . UpdateApiTokenController::ACTION_SLUG));
    }

    /**
     * @return string
     */
    public function getApiTokenRefreshUrl()
    {
        return $this->apiHandler->getAuthenticationUrl($this->getTokenRefreshRedirectTarget());
    }

    /**
     * @return string
     */
    public function getActionSlug(): string
    {
        return UpdateSettingsApiController::ACTION_SLUG;
    }
}
