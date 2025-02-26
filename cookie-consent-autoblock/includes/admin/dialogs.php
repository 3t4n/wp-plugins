<?php

/**
 * WP-SpruceJoy Admin Functions
 *
 * Handles functions that output admin dialogs to adminstrative users.
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @author SpruceJoy
 * @copyright 2020-2021
 *
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}

/**
 * Assemble the side meta box.
 *
 *
 * @global object $wpsj
 */
function wpsprucejoy_a_meta_box()
{
	global $wpsj;
		?><div class="postbox" style="background-color: #EFEFEF;">
<div style="text-align: right;padding-top: 12px;padding-right: 18px;">
	<span style="font-size: 16px;letter-spacing: -0.408px;color: #59575C;vertical-align:middle;">By</span>
	<img style="-webkit-font-smoothing: antialiased;
vertical-align:middle;
text-rendering: optimizeLegibility;
text-size-adjust: 100%;
font-family: noto sans,BlinkMacSystemFont,-apple-system,segoe ui,roboto,oxygen,ubuntu,cantarell,fira sans,droid sans,helvetica neue,helvetica,arial,sans-serif;
font-size: 1em;
font-weight: 400;
line-height: 1.5;
color: #06c;
cursor: pointer;
box-sizing: inherit;
max-width: 100%;
width: 138px;
height: 25px;
object-fit: contain;" src="https://lapro.sfo2.cdn.digitaloceanspaces.com/sprucejoy/sprucejoy-circle-logo-with-text.png" alt="logo" loading="lazy" decoding="async">

</div>

<div class="inside">
	<p style="font-size: 16px;letter-spacing: -0.408px;padding-top:20px;">
		<strong>Resources</strong><br/><br/>
		<a target="_blank" href="https://sprucejoy.com/demo/"><?php _e('Live Example', 'wp-sprucejoy'); ?></a><br />
		<a target="_blank" href="https://sprucejoy.com/resources/cookie-consent-gdpr/"><?php _e('Help Documents', 'wp-sprucejoy'); ?></a><br />
		<a target="_blank" href="https://github.com/sprucejoy/cookie-consent/issues"><?php _e('Bug Report', 'wp-sprucejoy'); ?></a><br />
		<a target="_blank" href="https://github.com/sprucejoy/cookie-consent/discussions"><?php _e('Feature Request', 'wp-sprucejoy'); ?></a>
	</p>
	<p style="font-size: 16px;letter-spacing: -0.408px;padding-top:20px;">
		<strong>Like this plugin?</strong><br/><br/>
		If you find this plugin useful please show your support and rate it <a href="https://wordpress.org/support/plugin/cookie-consent-autoblock/reviews/#new-post" style="color:#FFC601;text-decoration: none;">★★★★★</a> on <a target="_blank" href="https://wordpress.org/support/plugin/cookie-consent-autoblock/reviews/#new-post"><?php _e('Wordpress.org', 'wp-sprucejoy'); ?></a> - much appreciated! :)
	</p>
</div>
</div><?php
}

// End of file.