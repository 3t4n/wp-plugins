<?php
/*
Plugin Name: Calconic
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Calconic integration for Wordpress
Version:     1.0.1
Author:      Calconic (Lumifish Labs)
Author URI:  https://calconic.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages

Calconic is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Calconic is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Calconic. If not, see {License URI}.
*/

include 'calconic.install.php';
include 'calconic.api.php';

function calconic_InitPlugin() {
  calconic_CreateOption();
}

function calconic_UninitPlugin() {
  calconic_DeregisterScript();
  calconic_DeregisterShortCodes();
  calconic_DeregisterPluginPage();
}

function calconic_ActivationHook() {
  register_activation_hook(__FILE__, 'calconic_InitPlugin');
}

function calconic_DeactivationHook() {
  register_deactivation_hook(__FILE__, 'calconic_UninitPlugin');
}

function calconic_Initialize() {
  calconic_ActivationHook();
  calconic_RegisterScripts();
  calconic_RegisterXHR();
  calconic_DeactivationHook();
  calconic_RegisterPluginPage();
  calconic_RegisterShortcodes();
}

calconic_Initialize();
