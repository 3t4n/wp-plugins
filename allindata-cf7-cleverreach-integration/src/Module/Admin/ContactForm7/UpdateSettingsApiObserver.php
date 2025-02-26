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

namespace AllInData\CF7CRIntegration\Module\Admin\ContactForm7;

use AllInData\CF7CRIntegration\Helper\ContactForm7\ConfigHandler as ConfigHandler;
use AllInData\Micro\Core\Helper\RequestUtil;
use AllInData\Micro\Core\Module\PluginModuleInterface;

/**
 * Class UpdateSettingsApiObserver
 * @package AllInData\CF7CRIntegration\Module\Admin\ContactForm7
 */
class UpdateSettingsApiObserver implements PluginModuleInterface
{
    /**
     * @var ConfigHandler
     */
    private $configHandler;

    /**
     * UpdateSettingsApiController constructor.
     * @param ConfigHandler $configHandler
     */
    public function __construct(ConfigHandler $configHandler)
    {
        $this->configHandler = $configHandler;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        add_action('wpcf7_save_contact_form', [$this, 'updateOptions'], 10, 1);
    }

    /**
     * @param \WPCF7_ContactForm $contactForm
     */
    public function updateOptions(\WPCF7_ContactForm $contactForm)
    {
        $enabled = RequestUtil::getParam('aid-cf7cr-form-settings-enabled');
        $enabled = $enabled === 'on' ? true : false;

        $groupId = RequestUtil::getParam('aid-cf7cr-form-settings-group');
        if (!$groupId) {
            $groupId = null;
        }

        $formId = RequestUtil::getParam('aid-cf7cr-form-settings-form');
        if (!$formId) {
            $formId = null;
        }

        $mapping = RequestUtil::getParamAsArray('aid-cf7cr-form-settings-mapping');
        if (!is_array($mapping)) {
            $mapping = [];
        }

        $this->configHandler->saveOptions($contactForm->id(), [
            'enabled' => $enabled,
            'group_id' => $groupId,
            'form_id' => $formId,
            'field_mappings' => $mapping
        ]);
    }
}