<?php
/*
Plugin Name: CPS网盟自动链接
Plugin URI: http://labs.gokesoft.com
Description: 当用户点击您博客内的新蛋、卓越亚马逊、京东、一号店、凡客诚品等商品链接时，此插件将在链接跳转到商家时自动加上您在后台设置的对应网站联盟ID，进而为您网站带来收益!
Version: 1.0.0
Author: gokesoft
Author URI: http://labs.gokesoft.com
*/
/*  Copyright 2012  gokesoft  (email : gokesoft@gmail.com)

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

add_option( 'amazon_cn' );
add_option( 'newegg_com_cn' );
add_option( '360buy_com' );
add_option( 'yihaodian_com' );
add_option( 'vancl_com' );

add_action( 'admin_menu', 'union_admin_menu');
add_action( 'wp_head', 'union_add_js' );

/**
 * add MENU
 */
function union_admin_menu() {
  add_options_page('进行CPS网盟自动链接设置', 'CPS网盟自动链接设置', 8, 'union_affiliate_link_localiser', 'union_admin_options');
}

/**
 * OPTIONS page
 */
function union_admin_options() {

	echo "
	<style type=\"text/css\">
		.confirm {
			color: #090;
			font-weight: bold;
		}
	</style>
	<h2>CPS网盟自动链接插件</h2>";

	if ( $_POST['_wpnonce'] ) {
			update_option( 'amazon_cn', $_POST['amazon_cn'] );
			update_option( 'newegg_com_cn', $_POST['newegg_com_cn'] );
			update_option( '360buy_com', $_POST['360buy_com'] );
			update_option( 'yihaodian_com', $_POST['yihaodian_com'] );
			update_option( 'vancl_com', $_POST['vancl_com'] );
			echo "<p class=\"confirm\">联盟ID修改成功</p>";
	}

	echo "
	<div class=\"wrap\">
		<form name=\"form1\" method=\"post\" action=\"" . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . "\">
			" . wp_nonce_field('update-options') . "
			<p>设置您的网站联盟ID,对于您没有注册的联盟,请留空.</p>
			<table class=\"form-table\">
				<tr valign=\"top\">
					<th scope=\"row\">卓越亚马逊(amazon.cn)联盟ID</th>
					<td><input type=\"text\" name=\"amazon_cn\" value=\"" . get_option('amazon_cn') . "\" /></td>
					<td><a target='_blank' href=\"http://labs.gokesoft.com/amazon\">如何获取设置卓越亚马逊联盟ID?</a></td>
				</tr>
				<tr>
					<th scope=\"row\">新蛋网(newegg.com.cn)联盟ID</th>
					<td><input type=\"text\" name=\"newegg_com_cn\" value=\"" . get_option('newegg_com_cn') . "\" /></td>
					<td><a target='_blank' href=\"http://labs.gokesoft.com/newegg\">如何获取设置新蛋网联盟ID?</a></td>
				</tr>
				<tr>
					<th scope=\"row\">京东商城(360buy.com)联盟ID</th>
					<td><input type=\"text\" name=\"360buy_com\" value=\"" . get_option('360buy_com') . "\" /></td>
					<td><a target='_blank' href=\"http://labs.gokesoft.com/360buy\">如何获取设置京东联盟ID?</a></td>
				</tr>
				<tr>
					<th scope=\"row\">凡客(vancl.com)联盟ID</th>
					<td><input type=\"text\" name=\"vancl_com\" value=\"" . get_option('vancl_com') . "\" /></td>
					<td><a target='_blank' href=\"http://labs.gokesoft.com/vancl\">如何获取设置凡客联盟ID?</a></td>
				</tr>
				<tr>
					<th scope=\"row\">一号店(yihaodian.com)联盟ID</th>
					<td><input type=\"text\" name=\"yihaodian_com\" value=\"" . get_option('yihaodian_com') . "\" /></td>
					<td><a target='_blank' href=\"http://labs.gokesoft.com/yihaodian\">如何获取设置一号店联盟ID?</a></td>
				</tr>
			</table>

			<p class=\"submit\">
			<input type=\"submit\" name=\"Submit\" value=\"更新\" />
			</p>

		</div>
	</form>

	<p>如果觉得插件对您有帮助，欢迎在您的博客加上我们的友情链接。http://labs.gokesoft.com</p>";

}

/**
 * generate required JAVASCRIPT
 */
function union_add_js() {
	// does not use wp_enqueue_script because we need to ensure linked scripts go above the embedded one
	echo "
	<script type=\"text/javascript\">
		var afs = {
			'amazon_cn'   : '". get_option( 'amazon_cn' ) . "',
			'newegg_com_cn'	: '" . get_option( 'newegg_com_cn' ) . "',
			'360buy_com'	: '" . get_option( '360buy_com' ) . "',
			'yihaodian_com'	: '" . get_option( 'yihaodian_com' ) . "',
			'vancl_com'	: '" . get_option( 'vancl_com' ) . "',
		};
	</script>";
	wp_register_script( 'union_wp', 'http://labs.gokesoft.com/js/wp_site_union.js?f='.$_SERVER['SERVER_NAME']);
	wp_enqueue_script('union_wp');
}