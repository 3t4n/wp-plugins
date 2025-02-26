<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 *
 * Plugin Name: FireStudio - Build, Create, & Make on Wordpress
 * Plugin URI: https://ua1.us/projects/firestudio/
 * Description: App/Feature Development Framework For Wordpress.
 * Version: 1.2.1
 * Requires PHP: 7.1
 * Author: UA1 Labs
 * Author URI: https://ua1.us
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: firestudio
 *
 * LICENSE DETAILS
 *
 * FireStudio is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.

 * FireStudio is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with FireStudio. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// wordpress dependencies
require_once(ABSPATH . 'wp-includes/pluggable.php');

// include vendor dependencies from composer
require_once(__DIR__ . '/dependencies.php');

// include shared functionality
require_once(__DIR__ . '/shared/autoload.php');

// initialize firestudio
$firestudio = firestudio();
$firestudio->loadFeature(\UA1Labs\Fire\Studio\Feature\FireStudio::class);
$firestudio->loadFeature(\UA1Labs\Fire\Studio\Feature\AdminModal::class);
$firestudio->loadFeature(\UA1Labs\Fire\Studio\Feature\Debug::class);
$firestudio->init();
