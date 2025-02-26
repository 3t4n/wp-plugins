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

namespace AllInData\CF7CRIntegration;

use AllInData\CF7CRIntegration\Block\Admin\ContactForm7\CleverReachSettingsBlock;
use AllInData\CF7CRIntegration\Block\Admin\SettingsApiBlock;
use AllInData\CF7CRIntegration\Controller\Admin\UpdateApiTokenController;
use AllInData\CF7CRIntegration\Controller\Admin\UpdateSettingsApiController;
use AllInData\CF7CRIntegration\Helper\CleverReach\ApiHandler;
use AllInData\CF7CRIntegration\Helper\ConfigOptionHandler;
use AllInData\CF7CRIntegration\Helper\ContactForm7\ConfigHandler;
use AllInData\CF7CRIntegration\Module\Admin\ContactForm7\RegisterCleverReachSettingsBlock;
use AllInData\CF7CRIntegration\Module\Admin\ContactForm7\UpdateSettingsApiObserver;
use AllInData\CF7CRIntegration\Module\Admin\ContactForm7\ContactForm7EventObserver;
use AllInData\CF7CRIntegration\Module\Admin\MenuModule;
use AllInData\CF7CRIntegration\ShortCode\Admin\CleverReachSettingsShortCode;
use AllInData\CF7CRIntegration\ShortCode\Admin\SettingsApiShortCode;
use AllInData\Micro\Core\Controller\PluginControllerInterface;
use AllInData\Micro\Core\Module\PluginModuleInterface;
use AllInData\Micro\Core\Module\PluginUpdater;
use AllInData\Micro\Core\ShortCode\PluginShortCodeInterface;
use bitExpert\Disco\Annotations\Configuration;
use bitExpert\Disco\Annotations\Bean;
use GuzzleHttp\Client as HttpClient;

/**
 * Class PluginConfiguration
 * @package AllInData\CF7CRIntegration
 * @Configuration
 */
class PluginConfiguration
{
    /**
     * @Bean
     */
    public function PluginApp(): Plugin
    {
        return new Plugin(
            \AllInDataContactForm7CleverReachIntegration::load()->getTemplateDirectory(),
            $this->getPluginModules(),
            $this->getPluginControllers(),
            $this->getPluginShortCodes()
        );
    }

    /**
     * @return PluginModuleInterface[]
     */
    private function getPluginModules(): array
    {
        return [
            new PluginUpdater(
                \AllInDataContactForm7CleverReachIntegration::SLUG,
                'https://wpplugins.all-in-data.de/594899096b56e0343f2174912db5434d/deploy.json',
                \AllInDataContactForm7CleverReachIntegration::VERSION,
                dirname(\AllInDataContactForm7CleverReachIntegration::FILE)
            ),
            new MenuModule(),
            new ContactForm7EventObserver(
                $this->getConfigHandler(),
                $this->getApiHandler()
            ),
            new RegisterCleverReachSettingsBlock(),
            new UpdateSettingsApiObserver(
                $this->getConfigHandler()
            )
        ];
    }

    /**
     * @return PluginControllerInterface[]
     */
    private function getPluginControllers(): array
    {
        return [
            new UpdateApiTokenController(
                $this->getApiHandler(),
                $this->getConfigOptionHandler()
            ),
            new UpdateSettingsApiController(
                $this->getConfigOptionHandler()
            )
        ];
    }

    /**
     * @return PluginShortCodeInterface[]
     */
    private function getPluginShortCodes(): array
    {
        return [
            new SettingsApiShortCode(
                \AllInDataContactForm7CleverReachIntegration::load()->getTemplateDirectory(),
                new SettingsApiBlock(
                    $this->getConfigOptionHandler(),
                    $this->getApiHandler()
                )
            ),
            new CleverReachSettingsShortCode(
                \AllInDataContactForm7CleverReachIntegration::load()->getTemplateDirectory(),
                new CleverReachSettingsBlock(
                    $this->getConfigOptionHandler(),
                    $this->getConfigHandler(),
                    $this->getApiHandler()
                )
            )
        ];
    }

    /**
     * @return ConfigHandler
     */
    private function getConfigHandler(): ConfigHandler
    {
        return new ConfigHandler();
    }

    /**
     * @return ApiHandler
     */
    private function getApiHandler(): ApiHandler
    {
        return new ApiHandler(
            $this->getHttpClient(),
            $this->getConfigOptionHandler()
        );
    }

    /**
     * @return ConfigOptionHandler
     */
    private function getConfigOptionHandler(): ConfigOptionHandler
    {
        return new ConfigOptionHandler(
            'https://rest.cleverreach.com/v3/',
            'https://rest.cleverreach.com/oauth/token.php',
            'https://rest.cleverreach.com/oauth/authorize.php'
        );
    }

    /**
     * @return HttpClient
     */
    private function getHttpClient(): HttpClient
    {
        return new HttpClient();
    }
}
