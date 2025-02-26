<?php
/*
Plugin Name: Kwm Info Basic
Description: Criado com a intenção de ajudar na criação de sites com informações basicas como telefones, endereços etc...
Version: 1.0
Author: Kelvin W. Mariano
License: GPL
Copyright: K. W. M.
*/
/*

 *      Copyright 2015 Digimeta <kelvin-mariano@outlook.com>

 *

 *      This program is free software; you can redistribute it and/or modify

 *      it under the terms of the GNU General Public License as published by

 *      the Free Software Foundation; either version 3 of the License, or

 *      (at your option) any later version.

 *

 *      This program is distributed in the hope that it will be useful,

 *      but WITHOUT ANY WARRANTY; without even the implied warranty of

 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

 *      GNU General Public License for more details.

 */

if(!defined('KWM_PLUGIN_DIR')){
	define('KWM_PLUGIN_DIR', untrailingslashit(dirname(__FILE__)));
}

if(!defined('KWM_PLUGIN_URL')){
	define('KWM_PLUGIN_URL', untrailingslashit(plugins_url('', __FILE__)));
}

load_textdomain('kwm_info_basic', KWM_PLUGIN_DIR . '/lang/' . get_locale() . '.mo');

include(plugin_dir_path(__FILE__).'install.php');

register_activation_hook( __FILE__ , 'kwm_info_basic_install_hook');

require_once KWM_PLUGIN_DIR . '/install.php';


require_once KWM_PLUGIN_DIR . '/functions.php';
?>