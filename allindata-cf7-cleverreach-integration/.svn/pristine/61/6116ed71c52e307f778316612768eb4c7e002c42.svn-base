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

namespace AllInData\CF7CRIntegration\Module\Admin;

use AllInData\CF7CRIntegration\ShortCode\Admin\SettingsApiShortCode;
use AllInData\Micro\Core\Module\PluginModuleInterface;

/**
 * Class MenuModule
 * @package AllInData\CF7CRIntegration\Module\Admin
 */
class MenuModule implements PluginModuleInterface
{
    const MENU_SLUG = \AllInDataContactForm7CleverReachIntegration::SLUG  . '-configuration';

    /**
     * @inheritdoc
     */
    public function init()
    {
        add_action('admin_menu', [$this, 'addAdminMenuEntry']);
    }

    /**
     * Add admin menu entry
     */
    public function addAdminMenuEntry()
    {
        add_options_page(
            __('CleverReach API Settings', \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()),
            __('All.In Data - Contact Form 7 CleverReach Integration', \AllInDataContactForm7CleverReachIntegration::load()->getTextDomain()),
            'manage_options',
            self::MENU_SLUG,
            [$this, 'addOptionPage']
        );
    }

    /**
     * Add admin page for configuration
     */
    public function addOptionPage()
    {
        echo do_shortcode(sprintf('[%s]', SettingsApiShortCode::SHORTCODE_NAME));
    }
}