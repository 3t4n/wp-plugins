<?php

/**
 * @package admin-bar-plus
 * @version 1.0
 */
/*
Plugin Name: Front-end Toolbar
Plugin URI: https://wordpress.org/plugins/admin-bar-plus/
Description: This plugin adds the WordPress menu from the admin sidebar under the {site-name} menu on the front-end WordPress toolbar.
Author: Kostas Vrouvas
Version: 1.1
Author URI: https://kosvrouvas.com/
*/

defined('ABSPATH') or die('No script kiddies please!');

add_action('admin_bar_menu', 'admin_bar_plus', 1000);

function admin_bar_plus()
{
	global $wp_admin_bar;
	if (is_admin()) {
		//Empty, we don't need the options on the admin side ;)
	} else {
		// We're on the front end
		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'posts',
			'title'  => __('Posts'),
			'href'   => admin_url('edit.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'posts',
			'id'     => 'posts-all',
			'title'  => __('All Posts'),
			'href'   => admin_url('edit.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'posts',
			'id'     => 'posts-new',
			'title'  => __('Add New'),
			'href'   => admin_url('post-new.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'posts',
			'id'     => 'posts-categories',
			'title'  => __('Categories'),
			'href'   => admin_url('edit-tags.php?taxonomy=category'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'posts',
			'id'     => 'posts-tags',
			'title'  => __('Tags'),
			'href'   => admin_url('edit-tags.php?taxonomy=post_tag'),
		));

		//Media
		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'media',
			'title'  => __('Media'),
			'href'   => admin_url('upload.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'media',
			'id'     => 'media-library',
			'title'  => __('Library'),
			'href'   => admin_url('upload.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'media',
			'id'     => 'media-new',
			'title'  => __('Add New'),
			'href'   => admin_url('media-new.php'),
		));


		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'pages',
			'title'  => __('Pages'),
			'href'   => admin_url('edit.php?post_type=page'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'pages',
			'id'     => 'pages-all',
			'title'  => __('All Pages'),
			'href'   => admin_url('edit.php?post_type=page'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'pages',
			'id'     => 'pages-new',
			'title'  => __('Add New'),
			'href'   => admin_url('post-new.php?post_type=page'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'plugins',
			'title'  => __('Plugins'),
			'href'   => admin_url('plugins.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'plugins',
			'id'     => 'plugins-installed',
			'title'  => __('Installed Plugins'),
			'href'   => admin_url('plugins.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'plugins',
			'id'     => 'plugins-new',
			'title'  => __('Add New'),
			'href'   => admin_url('plugin-install.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'plugins',
			'id'     => 'plugins-editor',
			'title'  => __('Editor'),
			'href'   => admin_url('plugin-editor.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'users',
			'title'  => __('Users'),
			'href'   => admin_url('users.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'users',
			'id'     => 'users-all',
			'title'  => __('All Users'),
			'href'   => admin_url('users.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'users',
			'id'     => 'users-profile',
			'title'  => __('Your Profile'),
			'href'   => admin_url('profile.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'users',
			'id'     => 'users-new',
			'title'  => __('Add New'),
			'href'   => admin_url('user-new.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'site-name',
			'id'     => 'options',
			'title'  => __('Settings'),
			'href'   => admin_url('options-general.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-general',
			'title'  => __('Settings'),
			'href'   => admin_url('options-general.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-writing',
			'title'  => __('Writing'),
			'href'   => admin_url('options-writing.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-writing',
			'title'  => __('Writing'),
			'href'   => admin_url('options-writing.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-reading',
			'title'  => __('Reading'),
			'href'   => admin_url('options-reading.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-discussion',
			'title'  => __('Discussion'),
			'href'   => admin_url('options-discussion.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-media',
			'title'  => __('Media'),
			'href'   => admin_url('options-media.php'),
		));

		$wp_admin_bar->add_menu(array(
			'parent' => 'options',
			'id'     => 'options-permalink',
			'title'  => __('Permalink'),
			'href'   => admin_url('options-permalink.php'),
		));

		/**
		 * Add third party plugin support
		 *
		 * @since 1.0.1
		 */
		//Check for third party plugins
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');

		// check for RevSlider
		if (is_plugin_active('revslider/revslider.php')) {
			//If plugin is activated then
			$wp_admin_bar->add_menu(array(
				'parent' => 'site-name',
				'id'     => 'revslider',
				'title'  => __('Revolution Slider'),
				'href'   => admin_url('admin.php?page=revslider'),
			));
		}

		//Check for WooCommerce
		if (is_plugin_active('woocommerce/woocommerce.php')) {
			//If plugin is activated then
			$wp_admin_bar->add_menu(array(
				'parent' => 'site-name',
				'id'     => 'woocomm',
				'title'  => __('WooCommerce'),
				'href'   => admin_url('edit.php?post_type=shop_order'),
			));
			//WooCommerce Products 
			$wp_admin_bar->add_menu(array(
				'parent' => 'woocomm',
				'id'     => 'woocomm-products',
				'title'  => __('Products'),
				'href'   => admin_url('edit.php?post_type=product'),
			));
		}
	}
}
