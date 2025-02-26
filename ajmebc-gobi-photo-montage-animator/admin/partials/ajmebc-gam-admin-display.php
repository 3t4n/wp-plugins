<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since      1.0.0
 *
 * @package    ajmebc_gam
 * @subpackage ajmebc_gam/admin/partials
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 */
?>

<div id="ajmebc-gam-metabox-navigation">
	<h2 class="nav-tab-wrapper current ajmebc-gam">
		<ul>
			<li>
				<a class="nav-tab ajmebc-tabs nav-tab-active" href="javascript:;" data-panel-id="ajmebc-gam-metabox-gallery">Photo Gallery</a>
			</li>
			<li>
				<a class="nav-tab ajmebc-tabs" href="javascript:;" data-panel-id="ajmebc-gam-metabox-settings">Settings</a>
			</li>
		</ul>
	</h2>
  <?php include_once( 'ajmebc-gam-gallery-display.php' ); ?>
  <?php include_once( 'ajmebc-gam-admin-settings.php' ); ?>
</div>
