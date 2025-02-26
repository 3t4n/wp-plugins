=== Axle Demo Importer ===
Contributors: axlethemes
Donate link: https://axlethemes.com
Tags: demo, importer
Requires at least: 4.6
Requires PHP: 5.2
Tested up to: 4.8.1
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Import demo content in a click.

== Description ==

Import demo content in a click. You can import Customizer settings, widgets and contents easily. Upload zip file containing XML, WIE and DAT files and click Import button. Rest will be done by the plugin.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for `axle-demo-importer`
3. Click `Install Now`
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `axle-demo-importer.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `axle-demo-importer.zip`
2. Extract the `axle-demo-importer` directory to your computer
3. Upload the `axle-demo-importer` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

== Frequently Asked Questions ==

= Where is importer page in admin? =

Go to `Appearance` -> `Axle Demo Importer`.

= What files should be there in the zip file? =

Three files should be there in the zip: XML file (data), WIE file (widget) and DAT file (Customizer).

= What configuration options are available? =

In your theme you can declare support for the importer with available parameters.
```
$importer_content = array(
	'zip_file'          => get_template_directory() . '/demo/demo.zip', // Demo zip file full path.
	'static_front_page' => true, // Whether to set static front page or not.
	'static_page'       => 'front-page', // Slug of front page.
	'posts_page'        => 'blog', // Slug of posts page.
	'menu_locations'    => array(
		'primary' => 'main-menu', // Key value pair of location and menu slug.
		),
	);
add_theme_support( 'axle-demo-importer', $importer_content );
```

== Screenshots ==

1. Importer page

== Changelog ==

= 1.0.3 - Sep 20 2017 =
* Fix PHP notice
* Minor bug fixes

= 1.0.2 - Sep 15 2017 =
* Support remote URL
* Minor bug fixes

= 1.0.1 - Sep 10 2017 =
* Minor bug fixes

= 1.0.0 - Sep 9 2017 =
* Initial release

== Upgrade Notice ==
Axle Demo Importer
