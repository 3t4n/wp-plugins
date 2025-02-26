=== SecSign ===
Contributors: SecSign
Tags: two-factor authentication, two-factor, authentication, 2 factor authentication, login, sign in, single sign-on, challenge response, rsa, password, mobile, iphone, android, security, authenticator, authenticate, two step authentication, 2fa, tfa
Requires at least: 3.0.1
Tested up to: 6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The SecSign ID two-factor authentication WordPress Plugin will be discontinued.

== Description ==

We regret to inform you that due to low demand, we have made the difficult decision to discontinue development of our WordPress plugin. We appreciate the trust you’ve placed in us and are grateful for your continued support.

Please note that while our servers will continue to operate, supporting the SecSign App, we will no longer maintain or update the WordPress plugin. You can still use the existing version, but we won’t be releasing any further updates.

As a precaution, we recommend exploring alternative solutions to ensure compatibility with future WordPress updates, as the plugin may cease to function properly.

Unfortunately, due to the unique nature of our plugin and its integration with the SecSign App, we are unable to recommend an alternative solution that can provide the same level of functionality and security.

We apologize for any inconvenience this may cause and appreciate your understanding in this matter.

Once again, thank you for your loyalty and understanding.

Best regards,

The SecSign Team

== Installation ==

= Install the Plugin =

* Login into WordPress as admin, go to the plugins screen and select the "Add New" submenu.
* Search for "SecSign" and click "Install Now" or click on "Upload" and select the downloaded zip archive.
* Activate the plugin in the "Installed Plugins" list.

= Note =

The SecSign ID WordPress plugin uses the [SecSign ID API](https://github.com/SecSign/secsign-php-api). The API requests from the SecSign ID server a so-called access pass (a session and a pass icon) which must be confirmed on the smartphone. In order to enable the plugin to establish a connection to the SecSign ID server, the curl packet (http://php.net/manual/en/book.curl.php) must be installed for PHP, and the web server on which the WordPress site is running must be able to reach the SecSign ID server under https://httpapi.secsign.com. Otherwise, you have to make changes in the settings for firewall and/or proxy.

= Add the Login Widget =

* You can add the SecSignID login widget to your site to allow the login on, for example, the side menu.
* Go to the "Appearance" screen and click on the "Widgets" submenu.
* Drag and drop the "SecSign ID Login" widget to, for example, the "Main Sidebar"

= General Configuration =

* Go to the "Settings" screen and select the "SecSign ID Login" submenu.
* Change the service address which will be shown to the user in the smartphone app. This should match the URL the users will see, when visiting your site.

= Co-worker Configuration =

* You can integrate the SecSign ID login on the wp-login.php page. This is done by default.
* Optionally, you can assign SecSign IDs to the WordPress users of your co-workers (admins, editors, authors and contributors). The users themselves can also assign a SecSign ID in their profile.
* You can also deactivate the normal password-based login for the users, so they can only login using the SecSign ID. It’s recommended that you deactivate the password login for all co-workers, so your site is secured against brute force attacks. You should only allow the password-based login for your own admin account, in case you lose your phone, and of course for all co-workers without smartphones. These accounts should be secured using a very strong password.

= User Configuration =

* Optionally, you can assign SecSign IDs to the WordPress users of your website users (subscribers). The users themselves can also assign a SecSign ID in their profile.
* It’s also possible to activate and deactivate the password-based login for your users.

= Fast Registration =

* In order not to have to create new user accounts yourself you can allow your co-workers or web site users to create user accounts themselves by logging in with their SecSign ID via wp-login.php or the login widget. You can allow them to create a new wordpress user or assign an existing one. After they created an wordpress account, you can assign wordpress roles to your co-workers via the user administration.

[youtube http://www.youtube.com/watch?v=utphj_m6jd4]

= Tutorial =

See (https://www.secsign.com/wordpress-tutorial/)

== Frequently Asked Questions ==

= How can users assign a SecSign ID to their WordPress account? =

You can just sign in with your SecSign ID. You will then be shown a dialog, where you can create a new user or assign your SecSign ID to an existing WordPress user.

Alternatively, you can go to your profile page to assign a SecSign ID.

= Is this service for free? =

Yes, it's free for the user and the WordPress admin - no matter how many users the site has. It's also free of advertising.

= How to restore your SecSign ID on a new smartphone? =

In the event that you lose your phone or want to switch to a new one, you should write down the restoration code for your SecSign ID. You can find the code in the app: Click on Edit on the main screen, select your SecSign ID and click on Restoration settings.

You can restore your ID on a new phone by going to More -> Restore Identity.

= I enabled the SecSign ID Plugin and locked myself out =

Do the following steps in order to disable the SecSign ID WordPress login:

1. Open your WordPress directory via (S)FTP and rename the folder wp-content/plugins/secsign to secsign1.
2. Reload the backend login page and login with your WordPress username and password.
3. Important: Immediately rename the folder back to secsign.
4. The SecSign ID WordPress Plugin is now deactivated. Click on "Plugins" in the main menu, look for "SecSign" and activate it.
5. Adjust options in the SecSign ID settings.

= I get the error: The authentication server sent no response or you are not connected to the internet.

The plugin needs to make a connection to https://httpapi.secsign.com to work correctly. This error means it can't connect to our server. There are some possible reasons for this:

1. Please check if you have a firewall or router that might block the connection to httpapi.secsign.com on port 443.
2. Please check that the curl packet (http://php.net/manual/en/book.curl.php) is installed in your PHP installation. If this is not the case you should see a curl error about this in your webserver logs.
3. Please check if you have another wordpress plugin which might block the connection to our server. There are several wordpress security plugins doing this.

Please contact us at support@secsign.com if this doesn't help.

== Screenshots ==

1. This is the login form in which you enter your SecSign ID shown in the smartphone app.
2. The access pass is requested.
3. You will be shown an access pass. Tab on the matching one on your phone.
4. The push notification for the login request at your phone
5. The Touch ID authentication to get the access passes
6. The access passes where you have to choose the correct one to login
7. If your SecSign ID is not associated with a WordPress username, you can assign the SecSign ID to an existing user.
8. Or you can create a new account in Wordpress which is associated with your SecSign ID.
9. The options for the SecSign ID plugin. You can choose a service name which is shown to a user on his or her smartphone and the assignments between a wordpress user and a SecSign ID.
10. The options for self enrollment whether a user can assign his or her SecSign ID by him- or herself and whether a user can create a new account.

== Changelog ==
= 1.8.1 =
* Tested WP compatibility for Wordpress 6.1

= 1.8.0 =
* Bugfix for PHP 8.

= 1.7.20 =
* Tested WP compatibility for Wordpress 5.8.2

= 1.7.19 =
* Tested WP compatibility for Wordpress 5.7.2

= 1.7.18 =
* Tested WP compatibility for Wordpress 5.4.1

= 1.7.17 =
* Fixed Password Login Problems on Wordpress 5.3
* Added new JS API
* Tested WP compatibility for Wordpress 5.3

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.16 =
* Added new PHP API
* Added new JS API
* Added new FAQ entry for connection problems
* Tested WP compatibility for Wordpress 5.1.1

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.15 =
* Removed WP_DEBUG Notices
* Added new PHP API
* Added new JS API
* Tested WP compatibility for Wordpress 4.9.8

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.14 =
* Added workaround for port issue on misconfigured apache server
* Added new PHP API
* Added new JS API
* Tested WP compatibility for Wordpress 4.9.6

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.13 =
* Added links to SecSign plugin website on Wordpress.org in plugin listing
* Added new PHP API
* Tested WP compatibility for Wordpress 4.9.1

= 1.7.12 =
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api)
* Tested WP compatibility for Wordpress 4.7

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.11 =
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api)
* Accepted authentication sessions are handled by server. No need to release them manually
* Minor CSS changes
* Tested WP compatibility for Wordpress 4.6

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.10 =
* Show server errors to user rather than a nondescriptive default error message.
* Check given SecSign ID if it is syntactically correct before sending it
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api)
* Tested WP compatibility for Wordpress 4.5.1

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.9 =
* Fixed form switching bug
* Improved error handling
* Tested WP compatibility for Wordpress 4.5

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.8 =
* Turned off autocapitalizing and autocorrection for username input fields
* Fixed error if an authentication session is canceled
* Fixed layout error when an authentication is requested. Reset all fields before showing access pass or activity indicator
* Added index.php to all subfolders to prevent directory parsing
* Check that service name and service address dont exceed length limit
* Tested WP compatibility for Wordpress 4.4.2

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.7 =
* Added check for already loaded jQuery
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api)
* Minor changes in description
* Tested WP compatibility for Wordpress 4.4

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.6 =
* Renamed function to fit naming conventions
* Fixed missing plugin name in javascript function
* Using new PHP5 constructors
* CSS fix
* Fixed Widget on WordPress 4.3
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api) and [SecSignIDApi.php](https://github.com/SecSign/secsign-php-api) to be aible to login with your SecSign ID priority code
* Minor changes in readme and new screenshots for the wordpress.org website

Note: Due to changes at the javascript files, please flush the page cache or any other cache you are using to have the updated files within the browser.

= 1.7.5 =
* New version of [SecSignIDApi.js](https://github.com/SecSign/secsign-js-api) and [SecSignIDApi.php](https://github.com/SecSign/secsign-php-api)
* Fixed error which could interfere with some rules in Apache .htaccess
* Tested WP compatibility for Wordpress 4.2.2

Note: After the update, please flush the page cache. Or any other cache e.g. if you are using Wordpress plugins like 'W3 Total Cache' or 'Better WordPress Minify'.

= 1.7.4 =
* Fixed javascript error that affects websites which use the SecSign ID plugin only at the admin backend
* Tested WP compatibility for Wordpress 4.2.1

= 1.7.3 =
* Fixed issue with js queue and improved css styles for specific templates
* Added noscript message
* Fixed issue with CSS for button to create a new account
* Solved conflict with jQuery: do not use $ as jQuery object wrapper
* Use built-in function plugin_dir_path() rather than constant WP_PLUGIN_DIR

= 1.7.2 = 
* Tested WP compatibility for Wordpress 4.2
* Fixed issue with the site url which is displayed in the app.
* Each section of the user configuration options now has a 'save changes' button
* Fixed issue with html code fragments when user configuration options are shown

= 1.7.1 = 
* Brute force prevention at fast registration form 
* Added warning for interfering admin plugin setting
* New version of SecSignIDApi.js (see [GitHub](https://github.com/SecSign/secsign-js-api) )
* Improved error messages and properly clear javascript timer intervals
* Bug fixed: disable submit button as long as username and password field is empty.
* Bug fixed: adapt regexes in php and javascript to accept SecSign IDs with a dot
* Bug fixed: if login fails refer to page where user tried to login with its SecSign ID

= 1.7 = 
* Improved plugin design with more use of javascript and SecSign Javascript Api to prevent page reloads and increase speed 
* New version of SecSignIDApi.js (see [GitHub](https://github.com/SecSign/secsign-js-api) )
* Updated user configuration options 
* Bugfixes and path changes 
* Layout and plugin structure updates

= 1.6 =
* Show messages at backend login page e.g. when the authentication session is still pending
* Bug fixed: use the existing div #login_error to display errors at backend login page

= 1.5 =
* Use brand color for buttons.
* The button color can be adjusted in options page.
* Scroll page to shown access pass in case the plugin is embedded at the end of a page.
* Bug fixed: corrected error messages sent by SecSign ID Server.
* CSS corrections.

= 1.4.1 =
* Bug fixed when SecSign ID is checked whether it is null or not. The login form should not be submitted if the user hasn't entered a SecSign ID.

= 1.4 =
* When login is started buttons are disabled and the login form is submitted programmatically to prevent multiple submits (in safari and Chrome).
* When checking the authentication session the buttons are disabled to prevent multiple submits.
* When printing the html code the heredoc notation is used for better readability.
* Added new version of SecSign ID PHP API [GitHub](https://github.com/SecSign/secsign-php-api)

= 1.3 =
* Differ between error message and user formatted message in function print_error(...)
* Added info about installations prerequisites in wordpress readme.txt

= 1.2 =
* Fixed compatibility issue with WordPress Download Manager Plugin 2.6.96 and newer.

= 1.1 =
* Responsive Design
* Code Review

= 1.0.8 =
* Added descriptions.

= 1.0.7 =
* When SecSign ID plugin is enabled the focus is set to SecSign ID input field at wp-login.php.
* CSS corrections.
* Added new screenshots for the description.

= 1.0.6 =
* Fixed a problem with some redirect urls
* Use of SecSign ID JS API [GitHub](https://github.com/SecSign/secsign-js-api) - to login an user automatically 
* The login will now automatically continue after you selected the access pass on your smartphone. No need to click the OK button.
* Added new installer icons
* Fixed a problem on multisites which could allow a password-based login, although the password-based login was deactivated for this user.

= 1.0.5 =
* Integration in wp-login.php page
* Possibility to deactivate the normal password-based login
* Layout fixes

= 1.0.4 =
* Allowing wordpress installations on nonstandard ports
* Added new version of SecSign ID PHP API [GitHub](https://github.com/SecSign/secsign-php-api)

= 1.0.3 =
* Added new version of SecSign ID PHP API [GitHub](https://github.com/SecSign/secsign-php-api)
* Fixed wpdb::prepare() warning

= 1.0.2 =
* Changed color of errors

= 1.0.1 =
* Bug fixes

= 1.0 =
* Initial release

