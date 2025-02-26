<?php
    /**
     * @package 99minutos.com
     */

    /*
    Plugin Name: 99 minutos
    Plugin URI: https://www.99minutos.com
    Description: Envíos con 99 minutos para WooCommerce
    Version: 1.0.0
    Author: Oscar Pérez Pérez
    License: GPLv2 or later
    */ 

    /*
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

if(!defined('ABSPATH')){
    die;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{
    require_once plugin_dir_path( __FILE__ ) . '/controller/styles.php';

    require_once plugin_dir_path( __FILE__ ) . '/controller/installSchema.php';

    register_activation_hook( __FILE__, 'minutos_installSchema');

    require_once plugin_dir_path( __FILE__ ) . '/controller/adminMenu.php';

    require_once plugin_dir_path(__FILE__) . '/controller/shippingMethodInit.php';

    require_once plugin_dir_path(__FILE__) . '/controller/orderCreation.php';

    require_once plugin_dir_path(__FILE__) . '/controller/generateOrderCheckout.php';
}