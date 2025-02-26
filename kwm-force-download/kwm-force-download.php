<?php
/*
Plugin Name: KWM Force Download

Description: Plugin para forçar o download de imagens simples fácil e básico

Version: 1.1

Author: KWM

License: GPLv2

*/

/*

 *      Copyright 2015 KWM <kelvin-mariano@outlook.com>

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


if(!defined('KWMFD_PLUGIN_URL')){
	define('KWMFD_PLUGIN_URL', untrailingslashit(plugins_url('', __FILE__)));
}

if(!defined('KWMFD_PLUGIN_DIR')){
	define('KWMFD_PLUGIN_DIR', untrailingslashit(dirname(__FILE__)));
}

//Incluindo o arquivo de ativação

//Registra a função para ocorrer na ativação do plugin

include(plugin_dir_path(__FILE__).'install.php');

register_activation_hook( __FILE__ , 'KWM_force_download_intall_hook');


load_textdomain('kwm_force_download', KWMFD_PLUGIN_DIR . '/lang/' . get_locale() . '.mo');

if(is_admin()){
	require_once('admin/index.php');
}
require_once('frontend/download.php');
require_once('frontend/scripts.php');
?>