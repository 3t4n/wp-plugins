<?php
/**
 * Plugin Name: Amoratis CHMOD
 * Plugin URI: http://chmod.jackamoratis.com
 * Description: A Linux CHMOD converter widget for your sidebar. Once you install this plugin, click Appearance -> Widgets. Then drag the Amoratis CHMOD widget into the sidebar widgets area. When you visit the front page of your website, there will be a CHMOD converter in your sidebar.
 * Version: 1.1
 * Author: Jack Amoratis
 * Author URI: http://jackamoratis.com
 * License: GPL3
 */

/*  Copyright 2014  Jack Amoratis  (email : jackamoratis@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    or obtain it at: http://www.gnu.org/licenses


    The program relies on Knockout JS 3.2.0 which is included with the plugin.
    Knockout JS is free software that has been released under the MIT license
    which is:
    The MIT License (MIT) - http://www.opensource.org/licenses/mit-license.php

	Copyright (c) Steven Sanderson, the Knockout.js team, and other contributors
	http://knockoutjs.com/

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

if( ! array_key_exists( 'amoratis_chmod', $GLOBALS ) ) { 
 
    class amoratis_chmod {
           
        function __construct() {
             add_action( 'wp_enqueue_scripts', array( $this, 'amo_chmod_scripts' ) );
             add_action( 'wp_enqueue_scripts', array($this, 'amo_chmod_styles'));
             register_sidebar_widget('Amoratis CHMOD Converter', array($this,'widget_amoratis_chmod_converter'));
        }
       
       function widget_amoratis_chmod_converter($args) {
                extract($args);
                echo $before_widget; ?>
                            <?php echo $before_title
                                . 'CHMOD Converter'
                                . $after_title; ?>
                    <table id="permissions_table" class="sidebar"> </table>
                        <?php echo $after_widget; 
        }

        function amo_chmod_scripts()
        {
                //This puppy relies on data-binding with Knockout JS
                wp_enqueue_script( 'amoratis_chmod_knockout', plugins_url() . '/amoratis-chmod/knockout-3.2.0.js');
                wp_enqueue_script( 'amoratis_chmod_main', plugins_url() . '/amoratis-chmod/amoratis-chmod-main.js');
        } 

        function amo_chmod_styles()
        {
            wp_enqueue_style( 'amoratis_chmod_style', plugins_url() . '/amoratis-chmod/amoratis-chmod-main.css');
        }

    }
     
    $GLOBALS['amoratis_chmod'] = new amoratis_chmod();

}
?>
