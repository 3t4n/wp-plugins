=== Age Okay ===
Contributors: codealtdel
Donate link: https://paypal.me/codealtdel
Tags: age okay, age verification, age verifier, age verify, age gate, age restrict, age checker, check age, age validate, mature content, adults only, age
Requires at least: 3.6
Tested up to: 6.4
Requires PHP: 5.0
Stable tag: trunk

== Description ==

Age Okay is a highly customisable age verification plugin for WordPress.

On the pages you choose, it will cover the content of your website with a customisable age verification form. This form will continue to show to a user until they have verified their age, at which point their verification will be saved in a cookie for the length of time set by the admin. This length of time can be from only as long as the browser is open, to multiple years.

There are 3 important pages which can be found in the WordPress admin navigation under 'Age Okay':
1. Editor - This page allows an admin to customise every aspect of the look of the age verification form.
2. Settings - This page allows an admin to set which pages the age verification form should we shown on.
3. Translations - This page is unlocked in the pro version; it allows an admin to provide multilingual versions of the text content of the form.

The goal of this plugin is ease of use, and has been built so that a website owner will not need any coding experience to customise the plugin to do exactly what they need. However, in the PRO version there is some functionality that can be added using additional coding, more information can be found in the Age Okay documentation.

Please be aware, this plugin will not stop a user from viewing the content of your website if they so wish, and so should not be used as a substitute for proper securing of any sensitive content.

== Installation ==

There are three methods for installing this plugin:

WordPress 1:
1. Login to your website's admin panel by typing in the URL + /wp-admin
2. Go to the 'Plugins' page.
3. Click 'Add New'.
4. Find the 'Search plugins' input box and type in 'age okay'.
5. Find the Age Okay plugin once the resuls have loaded, and click 'Install Now' and wait.
6. Once it has installed, click 'Active Now', or go to the main 'Plugins' page.

WordPress 2:
1. Make sure the Age Okay plugin files are in a .zip format.
1a. To zip a file, right-click (or press and hold) the file you want to zip, and then select Send to > Compressed (zipped) folder.
2. Login to your Wordpress admin panel.
3. Go to the 'Plugins' page.
4. Click 'Add New'.
5. On the 'Add Plugins' page is an 'Upload Plugin' button, click this.
6. Upload the .zip file of the Age Okay plugin.
7. After uploading, active Age Okay through the 'Plugins' page.

FTP/File Manager:
1. If the Age Okay plugin files are in a .zip format then unzip them. 
1a. To unzip an entire folder, right-click (or press and hold) it, select Extract All, and then follow the instructions.
1b. To unzip a single file or folder, double-click the zipped folder to open it. Then, drag or copy the item from the zipped folder to a new location.
2. Connect to your website using a FTP program such as FileZilla, or using a File Manager, such as the one provided in cPanel.
2a. There are also plugins for WordPress that provide File Manager type functionality.
3. Navigate to the '/wp-content/plugins/' directory.
4. Upload the Age Okay folder and all of its contents to the plugins directory.
5. Login to your Wordpress admin panel.
6. Go to the 'Plugins' page and active Age Okay.

== Frequently Asked Questions ==

Q. How does Age Okay stand out from other age verification plugins?

A. Age Okay is highly customisable, allowing you to choose whatever background, colours and text content you want. Some plugins do not allow such flexibility and provide the user simply with templates that they can choose from. However, there are some plugins that have a similar level of customisablilty, but not in such a user friendly way, or not free. Age Okay requires no coding experience for a user to change almost everything about the look of the age verification screen. It also provides a live view so you can see how it will work before enabling it, and a preview option so you can see how changes will look without having to save them. Age Okay also provides a huge amount of control over where to display the verification screen. And if you need more control or more features, you can purchase the PRO version.

Q. What is different in the PRO version?

Age Okay Pro adds some additional features that other age verification plugins do not have or are not common and not all found in just one plugin:
1. Display by ID/URL - On the settings page, you will be able to use the ID of a page/post/CPT to choose where to display the verification screen, to accurately pinpoint specific pages or posts. You can also use URL matching for a huge amount of control, for example, if you have a shop, and you wanted to target any pages where women's handbags were sold, you could use '/women/handbags/' to target all pages and posts that match this.
2. Shortcodes - Age Okay has a settings page which allows the admin to decide which pages to show the age verification screen on. However, Age Okay also provides 2 shortcodes that can be added to a page, post, or CPT that will force the age verification screen to be shown, or to never show. `[age_okay]` `[age_okay hide=true]`
3. Filter - Similary to the shortcodes, Age Okay provides a filter that allows the admin to overwrite the internal logic of the Age Okay plugin on where the age verification screen should be shown. If the admin has additional checks they want to use before allowing Age Okay to use its own logic, then they can do so through the filter: `add_filter( 'age_okay_filter', function(){ return null;} );`
return values: true to show, false to hide, null to use Age Okay settings
4. Multilingual - Age Okay provides an interface where the admin can set other language versions of the text content of the age verification screen. If the website has multilingual functionality added, for example, through a plugin like Polylang, then it is very easy to create a multilingual version of the age verification screen. So if you have an English website, but a French page with the url http://example.com/fr/my-page, then Age Okay will check the locale of your page and display the appropriate text content.
5. 3 Load Types - Some age verification plugins suffer from a delay in showing the age verification screen because they rely on AJAX to load it after the page content has finished loading. This is needed because of cache plugins that would display the wrong content if AJAX was not used. However, this means that websites without a cache plugin suffer needlessly. It also means that websites using a cache plugin but that have explicit content may show that explicit content to underage visitors. Age Okay provides 3 load types to fix this problem: a cache version as standard, a non cache version, and a cache version that blurs the page content until the age verification is loaded or the user has been verified.

== Changelog ==

= 1.0.3 =
* Ajax errors more information available

= 1.0.2 =
* Styling fix for checkbox submit

= 1.0.1 =
* Improved JavaScript error handling
* New wp-admin design
* Minor fixes/changes

= 1.0.0 =
* Plugin released

== Upgrade Notice ==

= 1.0.3 =
* Extra data to be displayed to console for ajax errors during initialisation and verification, for debugging purposes

= 1.0.2 =
* Updated CSS to resolve checkbox clicked state not displaying correctly

= 1.0.1 =
* Updated JavaScript to report on specific errors and to stop users being locked out if not working correctly
