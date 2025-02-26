=== Ad Blocking Advisor ===
Contributors: obrienlabs
Donate link: http://obrienlabs.net/donate/
Tags: ad, blocking, advert, adblock, adblocker, plus, alert, alerter, detect, detector, notice, banner, bar, notification, admin, google, adsense, save, pro, easylist, ublock, whitelist
Requires at least: 2.8
Tested up to: 4.9.1
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a simple and elegant banner that will display to visitors who have ad blocking software installed, advising them to white list your site.

== Description ==

Ad Blocking Advisor adds a simple and elegant notification bar to your website that only displays to those visitors who are using ad blocking software with their browsers. The purpose of the notification is to ask (or advise) your visitors to whitelist your website. Whitelisting means your ads are displayed, and that's more revenue to keep you motivated to create more content!

What makes Ad Blocking Advisor different is that it is not limited to just one popular ad provider. In fact, the plugin uses a JavaScript file names ads.js which is popular among ad-blocking software to block! The ads.js inserts a hidden DIV in the footer of your site - you'll never see it! If the div does not load because it is being blocked then the plugin will display the banner asking (advising) your visitor to whitelist your site!

Features: 

*   Quickly change the text that's displayed in the notification banner. 
*   Easily change the location on your site that the banner is displayed.
*   Easily change the background color.
*   Easily change the font color.
*   Easily change the font size.
*   Allow or disallow setting a cookie.
*   Allow or disallow visitors to dismiss the banner by showing an (X) close icon.
*   When the visitor clicks the close (X) icon to close your banner, if cookies are allowed, then the banner will remain hidden until the cookie expires.
*   Easily change the cookie expiration date.
*   Anti-caching in place with ads.js so that the banner will display more reliably.
*   Uninstalling the plugin will clean up all data it has stored in the WordPress database.

== Installation ==

**Install**

Installing Ad Blocking Advisor can be done from inside your WordPress admin panel by going to Plugins > Add New and searching for "Ad Blocking Advisor". 

1. You can also manually install it by downloading the plugin from wordpress.org/plugins
1. Upload the entire `ad-blocking-advisor` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Customize the plugin from the menu by selecting Settings > Ad Blocking Advisor Settings. 

**Uninstall**

1. Deactivate the plugin from the Plugins menu
1. Select "Ad Blocking Advisor" from the list and select "Delete"
1. This will delete all files from the server and all settings from the WordPress database.

== Frequently Asked Questions ==

= How do I change the message, font size, font color or background color on the notification? =

It's easy. Just go into the plugin settings. Most of the settings are there for you to customize. 

= Can I add my own custom CSS? =

Sure can! Just add your CSS changes to your theme's CSS file, this way it doesn't get overwritten on plugin upgrades.

== Screenshots ==

1. Ad Blocking Advisor notification banner on a sample main page.
2. Ad Blocking Advisor settings.

== Changelog ==

= 2.0 =
* Changed the way ad blockers are detected by using an external JS file instead of the 1px image. In testing and beta this has shown to be a more effective way to catch those who are using ad blockers.

= 1.4 =
* I've removed the timer function in 1.3 because I've changed the ad block detection method. The new method runs after all page elements, content and images are done loading. This makes the timer function not necessary. Feedback is welcomed though! The preferred method to leave feedback is on the plugin homepage at https://obrienlabs.net/ad-blocking-advisor-a-wordpress-plugin/

= 1.3 =
* Adds the ability to enable/disable/change the delay in seconds on running the ad blocking detection. This is useful in two ways. 
* 1) some browsers run the ad blocking detection test before all images have been loaded, which means the detection method isn't running accurately. 
* 2) Some users are seeing the banner even though they don't have ad block software enabled. 
* Again it seems as though this is because of images and their loading times compared to the detection test being executed. 
* The potential fix: Having a delay will wait for the browsers to finish loading images, then run our detection method. 
* **Note:** If you enable the timer delay, **it is up to the site owner to find the best delay time** that works for their website so that the users can see the banner.

= 1.2 =
* Added the ability to show or hide the banner for logged in users.

= 1.1 =
* Ok, so I thought WordPress would keep frontend_custom.css in your plugin folder, even after plugin upgrades. Allowing you to keep custom CSS through upgrades. I was wrong. On every plugin upgrade WordPress deletes this file. So 1.1 removes the frontend_custom.css. I suggest adding your custom CSS for Ad Blocking Advisor to your theme's CSS file instead. Sorry about that!

= 1.0.7 =
* Fixed a bug with trying to load frontend_custom.css if it didn't exist, resulting in a 404 error

= 1.0.6 = 
* Updated a typo in the plugin version check

= 1.0.5 =
* **POTENTIAL BREAKING CHANGES IN THIS UPGRADE**: Due to some ad blockers blocking the Ad Blocking Advisor banner, some CSS name changes had to be made. If you created custom CSS for the plugin, you will **need to update any custom CSS to reflect these new CSS class names**
* ad-blocking-advisor-wrapper **renamed to special-message-wrapper**
* aba-content **renamed to special-message-content**
* aba-left **renamed to special-message-left**
* aba-right **renamed to special-message-right**
* New option to enable or disable the X icon which allows visitors the ability to dismiss the banner
* Updated some default CSS options. To override, please see the FAQ on creating frontend_custom.css

= 1.0.4 =
* Fixed a typo for the General Settings function

= 1.0.3 =
* Added ability the disable the notification bar without disabling the plugin

= 1.0.2 =
* Forgot to include the text domain path in the plugin. 

= 1.0.1 =
* Added internationalization options for the text fields. Interested in translating this plugin? Let me know!

= 1.0 =
* Initial release

== Upgrade Notice ==

= 2.0 =
* Changed the way ad blockers are detected by using an external JS file instead of the 1px image. In testing and beta this has shown to be a more effective way to catch those who are using ad blockers.

= 1.4 =
* Removes the timer introduced in 1.3 due to a new ad block detection method that runs after all page elements, content and images are done loading. 

= 1.3 =
* Adds the ability to enable/disable/change the delay in seconds on running the ad blocking detection.

= 1.2 =
Added the ability to show or hide the banner for logged in users.

= 1.1 =
Removed frontend_custom.css since WordPress doesn't keep it on plugin upgrades anyways. See changelog for apology and next steps <3

= 1.0.7 =
Fixed a bug with trying to load frontend_custom.css if it didn't exist, resulting in a 404 error

= 1.0.6 = 
Updated a typo in the plugin version check

= 1.0.5 =
POTENTIAL BREAKING CHANGES IN THIS UPGRADE: PLEASE READ! Due to some ad blockers blocking the Ad Blocking Advisor banner, some CSS name changes had to be made. Please update your custom CSS! Also added new option to enable/disable the X close icon. Full details in changelog.

= 1.0.4 =
Fixed a typo for the General Settings function

= 1.0.3 =
Added ability the disable the notification bar without disabling the plugin

= 1.0.2 =
Forgot to include the text domain path in the plugin. 

= 1.0.1 =
Added internationalization options for the text fields. Interested in translating this plugin? Let me know!

= 1.0 =
Initial. 
