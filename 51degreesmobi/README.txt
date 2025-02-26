=== Mobile Device Detection by 51Degrees ===
Contributors: 51Degrees.mobi
Donate link: http://51Degrees.com
Tags: mobile, device, detection, optimisation, handset, browser, android, blackberry, windows phone, symbian, cellular, iphone, ipad, apple, mobile internet, mobile web, nokia, palm, pda, switcher, theme, wap, webkit, wireless
Requires at least: 2.7
Tested up to: 4.0
Stable tag: 3.1.5.2
License: MPLv2 or later (MPL)
License URI: http://www.mozilla.org/MPL/2.0/

The 51Degrees mobile device detection plugin mobilizes your site. Easy setup including mobile switcher, themes and administration tool.

== Description ==

The 51Degrees mobile device detection plugin is a complete pack to help mobilize your website and blog.

It includes a mobile device detector and switcher to select themes based on the type of device visiting your website, a selection of mobile themes and an administration tool to allow easy, quick implementation.   

Features include:

*  **Mobile detection and switcher** which automatically detects and switches between desktop / mobile theme, or the request can be redirected to another URL

*  **Easy to use administration tool** to set-up and define redirection rules. The plugin can be downloaded and working within minutes. Rules can be defined to treat small [screen mobile devices](http://51degrees.com/Resources/Property-Dictionary#IsSmallScreen), [smartphones](http://51degrees.com/Resources/Property-Dictionary#IsSmartPhone) and [tablets](http://51degrees.com/Resources/Property-Dictionary#IsTablet) differently.

*  **Selection of preinstalled mobile themes** designed by Wave Mobile  

*  **Detects over 150,000 mobile device** combinations and updated regularly.  No cloud services, PHP extensions or external components are required. Once installed the detected device properties are also available to theme developers.

*  **Developed and supported by 51Degrees** a leader in mobile device detection tools and used by 1.5 million websites. Additional detection capabilities including Tablet, Smartphone, Small Screen / Feature phones and additional themes are available from the 51Degrees website.

The plugin is provided for free to all WordPress users under the Mozilla Public Licence 2.  
For more information please visit our [website](http://51Degrees.mobi/purchase/wordpress.aspx).


== Installation ==


The plugin can be installed via the normal Wordpress method. However, if this is not available you can also these other methods:

If you have set up FTP access:

*  Go to Wordpress admin, mouse over plugins, click "Add new", then click "Upload" at the top of the screen.

*  Click "choose file", find the zip file, and click "install now", then follow the on-screen instructions.

If you have not set up FTP access, or if there are problems with the above unzip the plugin to /wp-content/plugins/

After installation, the plugin has several options you may wish to change:

*  Open the Wordpress admin dashboard.

*  Select Plugins > Installed Plugins

*  Underneath 51Degrees.com Device Detection, select 'Activate'

*  Select Settings > 51Degrees.mobi

*  Create rules to handle different types of mobile device. [See user guide for details](http://51degrees.com/Support/Documentation/PHP/Distributions/Wordpress.aspx "Wordpress User Guide").


**Theme Developers**

1. After selecting settings:

*  Go to your theme's folder ('twentyfourteen' by default)

*  Open the index.php file and within a php tag add:

` global $_51d;
 echo $_51d['IsMobile'];`

*  You should see the value as a string, 'True' or 'False'.

*  You can use var_dump($_51d) to see all the properties available, or check our [property guide] (http://51degrees.com/Resources/Property-Dictionary "Property dictionary").

*  You can use the session variable to prevent theme switching, useful for providing a 'view desktop button'.

` $_SESSION['NO_SWITCH'] = true;	// The user will no longer be switched. `


== Frequently Asked Questions ==
= When will the FAQs be added? =

The FAQ section will be updated as relevant questions are asked of us.

== Screenshots ==

1. Overview of basic properties available being used over multiple rule tabs.
2. How advanced properties are chosen.
3. Selecting different themes for a device.
4. The automatic update with a licence key feature.
5. The included Small Screen theme.
6. The included Smart Phone theme.
7. The included Tablet theme.

== Changelog ==
= 3.1.6.1 =
* Updated data file.

= 3.1.5.2 =
* Fixed error where advanced properties selections could not be saved.
* Fixed error that didn't show all options for advanced properties.

= 3.1.4.3 =
* Fixed bug where metadata caches would not be removed.
* Feature.js property names are now stripped of '/' characters so they
don't cause parser errors.
* Fixed bug where Feature Detection script would not be created in the core.js
  script.

= 3.1.3.1 =
* Removed usage of the method DirectoryIterator::getExtension() in
51Degrees_metadata.php as it is not available in PHP 5.3.5 and earlier.

= 3.1.2.1 =
* Updated the detection library to version 3.1 of the 51Degrees Detector. This
drastically improves detection speed and ease of use, as there is now only one
unified data file. See https://github.com/51Degreesmobi/51Degrees-PHP .

= 2.1.15.3 =
* Removed a dead link from the plugin and documentation.

= 2.1.15.2 =
* Updated data 10.10.2013

= 2.1.15.1 =
* Descriptions have been added to the plugin screens.
* Changed 'Show Advanced Properties' to be more visible.
* Added a section linking to documentation.

= 2.1.14.3 =
* Descriptions have been added to the plugin screens.
* Changed 'Show Advanced Properties' to be more visible.
* Added a section linking to documentation.

= 2.1.13.2 =
* Fixed issue where theme list wouldn't display properly.
* Added new 'Vanilla' theme for designed for desktop devices.

= 2.1.12.1 =
* The detector now uses a new data format that simplifies activation and should fix installation errors that occurs with some shared hosting.

= 2.1.11.11 =
* Plugin no longer in beta.
* Fixed bug where the theme switcher wasn't being properly disabled by setting $_SESSION['NO_SWITCH'] to true.

= 2.1.11.10 BETA =
* Themes in the plugin admin menu now appear alphabetically.

= 2.1.11.9 BETA =
* Plugin now includes 3 new themes.

* More reliable update process that handles failures gracefully with readable errors messages.

= 2.1.10.3 BETA =
*  Includes complete theme switcher and redirection administration user interface.

= 0.51 BETA =
*  Initial Release

== Upgrade Notice ==
= 2.1.10.3 BETA =
*  Current release. Upgrade to this to start receiving device detection data.

== Known issues ==
*  Update button may not work on some server configurations.