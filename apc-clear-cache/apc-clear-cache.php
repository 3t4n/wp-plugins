<?php
/**
 * Plugin Name: APC Clear Cache
 * Plugin URI: https://github.com/mdobydullah/apc-clear-cache
 * Description: A very simple and single purpose plugin to completely clear the APC cache. To use, go to Tools and click APC Clear Cache.
 * Author:  Md Obydullah
 * Author URI: https://obydul.me
 * Version: 1.2.1
 * License: GPLv2 or later
 * Text Domain: apc-clear-cache
 */

/*
Copyright (C) 2020 Md Obydullah

APC Clear Cache is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
APC Clear Cache is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

/*
    Include required files
 */
require_once 'acc-mo-plugin.php';

// check apc and clear
function mo_apc_cache() {
    if (function_exists('apcu_clear_cache')) {
        return apcu_clear_cache();
    }
    else if (function_exists('apc_clear_cache')) {
        return apc_clear_cache();
    }
    else {
        return false;
    }
}

// check apc and show notice
function mo_php_apc_options() {
    if (mo_apc_cache()) {
        print '<p>Cache Cleared..!</p>';
    }
    else {
        print '<p>Clearing Failed..!</p>';
        if (function_exists('apc_clear_cache')) {
            print '<pre>'; print_r(apc_cache_info()); print '</pre>';
        }
        else if (function_exists('apcu_clear_cache')) {
            print '<pre>'; print_r(apcu_cache_info()); print '</pre>';
        }
        else {
            print '<p>APCu/APC not installed on this system.</p>';
            print '<p>More info: <a target="_blank" href="https://github.com/mdobydullah/apc-clear-cache">APC Clear Cache Project</a></p><br>';
        }
    }
}