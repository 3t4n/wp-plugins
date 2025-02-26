<?php
/*
Plugin Name: CF7 Required custom field
Description: Required custom field for CF7.
Author: Alex Shevchenko
Text Domain: cf7-required-custom-field
Domain Path: /languages
Version: 1.1
License: GPLv2 or later
*/

/*  Copyright 2018 Alex Shevchenko  (email: alexdoc1985@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (in_array('contact-form-7/wp-contact-form-7.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    define('ECRMT_REQUIRED_CUSTOM_FIELD_DIR', __DIR__);
    define('ECRMT_REQUIRED_CUSTOM_FIELD_URL', plugin_dir_url(__FILE__));
    define('ECRMT_REQUIRED_CUSTOM_FIELD_SLUG', 'ecrmt_error_message');

    // admin only includes
    if (is_admin()) {
        require_once(ECRMT_REQUIRED_CUSTOM_FIELD_DIR . '/App/ECRMT_SetupWizard.php');
        new ECRMT_SetupWizard();
    }
    require_once(ECRMT_REQUIRED_CUSTOM_FIELD_DIR . '/App/ECRMT_ValidateInputHooks.php');
    new ECRMT_ValidateInputHooks();

}
