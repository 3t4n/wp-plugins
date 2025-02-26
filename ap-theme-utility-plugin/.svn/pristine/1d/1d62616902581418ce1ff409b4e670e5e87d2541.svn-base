=== AP Theme Utility Plugin ===
Contributors: Access Keys
Tags: import, content, demo, theme options, customizer options, widgets
Donate link: http://accesspressthemes.com/donation/
Requires at least: 4.0
Tested up to: 5.1.1
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin to import your demo content, widgets, theme settings and cusomizer settings with one click.

== Description ==
[Support](https://accesspressthemes.com/support)

Tested with WordPress 5.1.1

<strong>Instant Demo Importer</strong> is a <strong>Free WordPress plugin</strong> to import the demo contents, widgets, theme settings and customizer settings with one click in your website!

You just need to create a new instance for the plugin class somewhere in your theme and define the path for the demo content, widgets, theme option settings and customizer settings and the path for the demo folder location.

== Installation ==
1. Upload `instant-demo-imporder` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create an object instance for the `APTU_Class` class within your theme file.
4. Place `&lt;?php do_action('APTU_Class'); ?&gt;` in your templates this will provide you with the default demo for the ScrollMe theme by AccessPress to install.
5. You may replace these default demo by adding your own demo content files to the theme folder and setting the demo file path location to the `APTU_Class` object.

for e.g.
`&lt;?php
	if(class_exists('APTU_Class')) :

		$demos = array(
			'test-demo' => array(
				'title' => __('Test Demo', 'parallaxsome-pro'),
				'name' => 'test-demo',
				'screenshot' => get_template_directory_uri().'/path/to/test-demo/screen.png',
				'home_page' => 'front-page',
				'menus' => array(
					'Main Menu' => 'primary',
					'Footer Menu' => 'footer-menu',
				)
			),
		);

		$demoimporter = new APTU_Class( $demos, $demo_dir='path\to\demo\directory' );
	endif;
?&gt;`

= Available Languages =
* English

= Features =
* <strong>Import all the contents of theme's demo.</strong>
* <strong>Import all widgets data.</strong>
* <strong>Import all menu, customizer settings and other themes settings.</strong>
* <strong>Import posts, pages, images, categories, custom post.</strong>

= Some Useful Links =
* <strong>Support Forum Link</strong>: http://accesspressthemes.com/support/
* <strong>Website Link</strong>: http://accesspressthemes.com/
* <strong>Youtube channel link</strong>: https://www.youtube.com/watch?v=TjZNcVG3fDE
* <strong>Facebook link</strong>: https://www.facebook.com/AccessPressThemes

== Frequently Asked Questions ==
= What does this plugin do? =
This plugin provides the ability to to import the demo contents, widgets, theme option settings and customizer settings in your site.

= Is this plugin compatible with all AccessPress Themes ?
Yes, this plugin is compatible with all the free version of Accesspress themes.

= How do I use the AP Theme Utility?
[View Documentation](https://github.com/binaccess/ap-theme-utility-plugin) for all the information you need on configuring the AP Theme Utility in your theme.

== Screenshots ==
1. Backend Demo Installation Option.

== Changelog ==
= 1.0.5 =
* Added support for Smart Slider

= 1.0.4 =
* Added option to set blog page

= 1.0.3 =
* Added preview link option

= 1.0.2 =
* Added the option to configure the demo import settings.

= 1.0.0 =
* Plugin submitted to http://wordpress.org for review and approval

== Upgrade Notice ==
There is an update available for the AP Theme Utility plugin .Please update to recieve new updates and bug fixes.