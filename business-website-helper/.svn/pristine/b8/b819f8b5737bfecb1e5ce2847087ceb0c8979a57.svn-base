<?php
/*
Plugin Name: Business Website Helper for WordPress
Version: 1.0.8
Plugin URI: https://justaddcontent.com/free-business-website-helper-plugin-wordpress/
Description: A helper to quickly get your business website up and running on any self-hosted WordPress install with the best in class plugins.
Author: Just Add Content, Gabriel Mays
Author URI: https://justaddcontent.com/
License: GPL v3

Business Website Helper for WordPress
Copyright (C) 2014, Just Add Content, Gabriel Mays - gabe@justaddcontent.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//* Add Add-Ons admin page
add_action( 'admin_menu', 'jac_website_helper' );
function jac_website_helper() {
	add_options_page( 'Business Website Helper for WordPress', 'Business Website', 'manage_options', 'business-website-setup', 'jac_website_setup' ); // Add Business Website Helper to Settings menu
}

//* Display the admin page
function jac_website_setup() {
?>
<div style="margin: 3%; font-weight: 16px; line-height: 1.5;">
<?php
echo '<a href="https://justaddcontent.com/" target="_blank" title="Just Add Content"><img src="' . plugins_url( 'images/justaddcontent.png' , __FILE__ ) . '" alt="Just Add Content" class="alignright"></a> ';
?>
<h2>WordPress Business Website Setup</h2>
This plugin will help you quickly get your business website up and running on any self-hosted WordPress installation with the best plugins in each category.  See the bottom of this page for additional help.

<h3 style="text-decoration: underline; font-weight: normal;">Plugin Statuses</h3>
	<ul>
		<li><strong>&middot;</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>: None of the recommended plugins are active, they may or may not be installed.</li>
		<li><strong>&middot;</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>: One of the recommended plugins is activated and installed.</li>
	</ul>

<h3 style="text-decoration: underline; font-weight: normal;">Recommended Plugin List</h3>
	<ul>
		<li><strong>&middot;</strong> <a href="#seo">Search Engine Optimization (SEO)</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) || is_plugin_active( 'all-in-one-seo-pack/all_in_one_seo_pack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#cdn">Content Delivery Network (CDN)</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#cache">Website Optimization (Caching)</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'w3-total-cache/w3-total-cache.php' ) || is_plugin_active( 'wp-super-cache/wp-cache.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#stats">Analytics &amp; Website Statistics</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'google-analytics-for-wordpress/googleanalytics.php' ) || is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} elseif ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#email">Email Address Protection</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'email-address-encoder/email-address-encoder.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#spell">Spelling &amp; Grammar</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#spam">Spam Prevention</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'akismet/akismet.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#social">Social &amp; Sharing</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
<li><strong>&middot;</strong> <a href="#form">Form Builder</a>:
	<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} elseif ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong>';
	} elseif ( is_plugin_active( 'ninja-forms/ninja-forms.php' ) ) {
		echo '<span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
	?></li>
	</ul>
<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the required feature (described below) is active.</em>

<div id="seo"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Search Engine Optimization (SEO)</h3>
<strong>Plugin:</strong> <a href="http://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> (free) or <a href="https://wordpress.org/plugins/all-in-one-seo-pack/" target="_blank">All in One SEO Pack</a> (free)</br>
<strong>Remarks:</strong> WordPress SEO by Yoast is free, but there are also paid features that integrate for <a href="https://yoast.com/wordpress/plugins/video-seo/" target="_blank">video SEO</a> and <a href="https://yoast.com/wordpress/plugins/local-seo/" target="_blank">local SEO</a>.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) || is_plugin_active( 'all-in-one-seo-pack/all_in_one_seo_pack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="cdn"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Content Delivery Network (CDN)</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack</a> (free)</br>
<strong>Remarks:</strong> This will speed up your website.  Photon is a free CDN that comes with the Jetpack plugin, so it's the most practical CDN option.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong><br>
		<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the <strong>Photon</strong> feature is active.</em>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="cache"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Website Optimization (Caching)</h3>
<strong>Plugin:</strong> <a href="http://wordpress.org/plugins/wp-super-cache/" target="_blank">WP Super Cache</a> (free) or <a href="http://wordpress.org/plugins/w3-total-cache/" target="_blank">W3 Total Cache</a> (free)</br>
<strong>Remarks:</strong> WP Super Cache is a good balance of simplicity and power while W3 Total Cache is more powerful and has more features.  <em>If you're using a specialty managed host like WP Engine where caching is handled automatically, <strong>you don't need this.</strong></em></br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'w3-total-cache/w3-total-cache.php' ) || is_plugin_active( 'wp-super-cache/wp-cache.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="stats"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Analytics &amp; Website Statistics</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack</a> (free) or <a href="http://wordpress.org/plugins/google-analytics-for-wordpress/" target="_blank">Google Analytics for WordPress</a> (free)</br>
<strong>Remarks:</strong> Jetpack has a built in website statistics feature called WordPress.com Stats that's very easy to use.  However, it's recommended that you eventually transition to <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a> (free) as a better long-term solution that works with any website.  Google Analytics for WordPress makes it easy to integrate Google Analytics with your website.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'google-analytics-for-wordpress/googleanalytics.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} elseif ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong><br>
		<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the <strong>WordPress.com Stats</strong> feature is active.</em>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="email"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Email Address Protection</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/email-address-encoder/" target="_blank">Email Address Encoder</a> (free)</br>
<strong>Remarks:</strong> Automatic email obfuscation prevents spammers and email harvesters from getting your email address.  No settings, just activate the plugin.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'email-address-encoder/email-address-encoder.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="spell"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Spelling &amp; Grammar</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack</a> (free)</br>
<strong>Remarks:</strong> Adds a spelling and grammar checker to the editor.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong><br>
		<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the <strong>Spelling and Grammar</strong> feature is active.</em>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="spam"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Spam Prevention</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/akismet/" target="_blank">Akismet</a> (free)</br>
<strong>Remarks:</strong> Akismet automatically checks your blog comments to keep out spammers.  It's not 100% (what is?), but it's the best thing around and it's free.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'akismet/akismet.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="social"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Social &amp; Sharing</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack</a> (free)</br>
<strong>Remarks:</strong> Adds social sharing buttons, Google+ integration, automatic posting to social profiles, and more.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong><br>
		<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the <strong>Publicize</strong>, <strong>Sharing</strong>, <strong>Google+ Profile</strong> and <strong>Enhanced Distribution</strong> features are active.</em>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<div id="form"></div>
<br>
<h3 style="text-decoration: underline; font-weight: normal;">Form Builder</h3>
<strong>Plugin:</strong> <a href="https://wordpress.org/plugins/jetpack/" target="_blank">Jetpack</a> (free), <a href="http://www.gravityforms.com" target="_blank">Gravity Forms</a> ($39+), or <a href="http://wordpress.org/plugins/ninja-forms/" target="_blank">Ninja Forms</a> (freemium)</br>
<strong>Remarks:</strong> Your website needs contact forms, so at the very least use the <strong>Contact Form</strong> feature in the Jetpack plugin (free).  However, we highly recommend you get Gravity Forms, especially if you need online quote forms, complex contact forms, etc.  Ninja Forms is freemium (core plugin is free, but add-ons cost money) forms plugin that's fairly new, but it looks promising.</br>
<?php
	//* Detect if plugin active, show status
	if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} elseif ( is_plugin_active( 'jetpack/jetpack.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span><strong>*</strong><br>
		<strong>*</strong><em>Jetpack is installed and activated, but check your <a href="/wp-admin/admin.php?page=jetpack" target="_blank">Jetpack settings</a> to make sure the <strong>Contact Form</strong> feature is active.</em>';
	} elseif ( is_plugin_active( 'ninja-forms/ninja-forms.php' ) ) {
		echo '<strong>Plugin Status:</strong> <span style="color: green; font-weight: bold;">&#x2713; Active</span>';
	} else {
		echo '<strong>Plugin Status:</strong> <span style="color: red; font-weight: bold;">&#x2717; Inactive</span>';
	}
?>

<h3 style="text-decoration: underline; font-weight: normal;">Protect Your Website</h3>
None of these website improvements matter if your website isn't secure.  The best way to keep your website secure is to <strong>keep WordPress and all of your plugins updated!</strong>

<h3 style="text-decoration: underline; font-weight: normal;">Want It All Done For You?</h3>
If this seems too time consuming or complicated and you'd rather have it all done for you, try our hosted website service.  It's a simplified version of WordPress built exclusively for small businesses that includes everything above and more.  Best of all, you never have to worry about themes, plugins, hosting, design or keeping your website secure.  Learn more at <a href="https://justaddcontent.com" target="_blank">https://justaddcontent.com</a>

<h3 style="text-decoration: underline; font-weight: normal;">Questions, Comments &amp; Suggestions</h3>
Have questions, comments, suggestions, or want a plugin added to the list?  Contact us through the <a href="https://justaddcontent.com/free-business-website-helper-plugin-wordpress/" target="_blank">plugin website page</a>.

</div>
<?php
}
