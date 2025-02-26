=== aati-wp-finetuning ===
Contributors: jseutens
Tags: aati finetuning fail2ban login logon security cronjob
Requires at least: 6.2.2
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 0.9.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Fine tuning a WP setup by removing or adding options , just for easy updating setting on all my personal sites. If useful for someone else , use it :-)

Add form submission IP's to fail2ban for Contact Form 7 and WS Form PRO.
Log unkown user logins and wrong logins to fail2ban.

Change the layout of the login form if you add a logo file , background file can be uploaded to but only is used when the special logo is uploaded.

== Installation ==
This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/aati-wp-finetuning` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. no settings to change , all is hardcoded

== Frequently Asked Questions ==

Upload loginlogo.png to /wp-content/uploads (montly upload folders are not supported) to change the wp logo and css 
Upload loginbackground.webp to /wp-content/uploads (montly upload folders are not supported) to activate the login background on the standard login page , only if you uploaded a logo

To change colors of the button : add folowing to Customizing Additional CSS 
.login .button-primary {background-color: #FF0000;}
.login .button-primary:hover {background-color: #00FF00;}
Add any other css from the login that you want to override , the Additional CSS is loaded last.
Get the values to change from these files
/wp-includes/css/dashicons.min.css
/wp-includes/css/buttons.min.css
/wp-admin/css/forms.min.css
/wp-admin/css/l10n.min.css
/wp-admin/css/login.min.css

What's up next
* adding an admin page with the used values and display handy information instead of admin notices.
* maybe having a whitelist ip addresses that have access to /wp-json/wp/v2/users/ so that the rest of the api still works but is blocked to see users except for local IP and the server IP's itself and others. Needs testing and research.


== Changelog ==
 = 0.9.2 = 
 * wp version changes , logon page css , setup svn
 = 0.9.1 = 
 * wp version changes 
 = 0.9.0 = 
 * php and wp version changes , typos 
 * debugging failure for wpmain to update the plugin
 * added forced gravatar disabling, so I don't need to set this and think about it
 = 0.8.9 = 
 * php and wp version changes
 = 0.8.8 = 
 * typos
 = 0.8.7 = 
* added screenshot placeholders   
 = 0.8.6 = 
* global $is_server_cron_active; was on wrong spot , again a bugfix
 = 0.8.5 = 
* removing REST-AI link and oEmbed REST API endpoint
 = 0.8.4 =
* cron check only runs for admins 
 = 0.8.3 =
* typos and moving cron file , added icons
 = 0.8.2 =
* add admin notice to add server side cronjob , if active change wp-settings page , if not possible make sure that admin notice is there with example. If to annoying probably will move it in the upcming admin page
 = 0.8.1 =
* Redirect author pages to root
 = 0.8.0 =
* added WS Form fail2ban , use wordpress action hook name : wsf_action_tag , works only on pro version.
 = 0.7.2 =
* bugfix languages
 = 0.7.1 =
* bugfix in CF7 syslog message
* back to 3 digit versioning 
 = 0.7.0.0 =
* https://chat.openai.com/ helped me to split the diffrent items in to different files for easier coding per item that i want to change
* added fail2ban jail for unknown users , 1 time and their IP is blocked 
 = 0.6.1.2 =
* finetuning code , now included the additiona css in the login page with a css file , not inline
 = 0.6.1.1 =
* finetuning code , only really needed css changed
= 0.6.1.0 =
* bugfix in log_failed_attempt
= 0.6.0.3 =
* Added login form customization 
= 0.6.0.2 =
* wp-version check and function
= 0.6.0.1 =
* bug fix for disabling major autoupdates
= 0.6.0 =
* remove the wp css colours inline
= 0.5.9 =
* sanitize_text_field and wp_unslash input fields
* close logfile in wrong login
= 0.5.8 =
* SYSLOG_FACILITY bug for php8.0 in line 110
= 0.5.7 =
* bug in servername 
= 0.5.6 =
* added the fail2ban config for wrong user
* added server_name to log
= 0.5.5 =
* disabled 0.5.4 update as this is needed for the business plugin
* added failed logon entries to syslog for fail2ban
= 0.5.4 =
* Removed dash icons for not logged in people
= 0.5.3 =
* BUG FIX loading file directly is now disabled
* added uninstall.php file for future use
* removed auto site maps , need to use a decent sitemap , not all exposed automatically
* BUG FIX changing add filters to correct syntax
= 0.5.2 =
* BUG FIX language files renamed to correct names
= 0.5.1 =
* BUG FIX: PHP Warning:  Use of undefined constant wpcf7log_filter_spam - assumed 'wpcf7log_filter_spam' (this will throw an Error in a future version of PHP) 
= 0.5.0 =
* added logging cf7 submissions for fail2ban (only usefull if fail2ban is active)
* added translations
* changed name of plugin.php to aati-wp-finetuning.php
= 0.4.0 =
Prepared for first svn publication on wp repository
= 0.3.0 =
* commented out the rest-api disabling , broke CF7
= 0.2.0 =
* updates for headers
= 0.1.0 =
* Initial release

== Upgrade Notice ==
upgrade as you please

== Screenshots ==

1. ![Screenshot 1](screenshots/screenshot-1.png)
   Description of the screenshot.

2. ![Screenshot 2](screenshots/screenshot-2.png)
   Description of the screenshot.