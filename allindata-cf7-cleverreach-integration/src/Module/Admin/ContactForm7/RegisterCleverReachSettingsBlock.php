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

use AllInData\CF7CRIntegration\ShortCode\Admin\CleverReachSettingsShortCode;
use AllInData\Micro\Core\Module\PluginModuleInterface;

/**
 * Class CleverReachSettingsBlock
 * @package AllInData\CF7CRIntegration\Admin\ContactForm7\Block
 */
class RegisterCleverReachSettingsBlock implements PluginModuleInterface
{
    const PANEL_ID = \AllInDataContactForm7CleverReachIntegration::SLUG . '-option-panel';

    /**
     * @inheritdoc
     */
    public function init()
    {
        add_filter('wpcf7_editor_panels', [$this, 'registerCleverReachOptionPanel'], 10, 1);
    }

    /**
     * @param array $panels
     * @return array
     */
    public function registerCleverReachOptionPanel($panels)
    {
        if (!$this->getContactForm()) {
            return $panels;
        }

        $panels[self::PANEL_ID] = [
            'title' => __('CleverReach Integration', \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()),
            'callback' => [$this, 'renderHtmlContent']
        ];

        return $panels;
    }

    /**
     * Load template
     */
    public function renderHtmlContent()
    {
        echo do_shortcode(sprintf('[%s]', CleverReachSettingsShortCode::SHORTCODE_NAME));
    }

    /**
     * @return \WPCF7_ContactForm|bool
     */
    private function getContactForm()
    {
        $form = \WPCF7_ContactForm::get_current();
        if (!$form) {
            return false;
        }

        return $form;
    }
}
