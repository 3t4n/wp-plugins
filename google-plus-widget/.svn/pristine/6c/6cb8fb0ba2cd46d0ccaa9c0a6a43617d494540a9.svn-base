=== Google Plus Widget ===
Contributors: osp_wpfx
Tags: google, google plus, google+, google plugin, google profile, google +1, google plus one, google button
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 1.5

An easy-to-use plugin which allows you to add a Google Plus profile badge along with an optional Google +1 button and Google+ posts anywhere on your WordPress site.

== Description ==

**NEW WITH v1.5**  Inclusion of profile pictures of people in your circle.  Also fixes some minor bugs.  **PLEASE UPGRADE TO THIS VERSION**

The Google Plus Widget plugin adds a Google Plus profile widget to your WordPress site along with the option to include the Google +1 button. The plugin links to you Google+ profile and shows the number of followers in your circle as well as allowing users to add you to their Google+ circle. It will also display a custom plugin title and your Google profile picture.
<br><br>
This version of the Google Plus Widget plugin accounts for Google's recent changes in the structure of their Google+ profile pages. The Google Plus Widget plugin uses a simple cache state to store your Google Plus profile data and eliminate the need to request information from Google+ on every page load.  For the caching to work, write permissions need to be given to the /wp-content directory.  There are a lot of plugins which require this, so the directory may already have the necessary permissions. The cache file is located in /wp-content and is entitled, "plus_cards.txt."
<br><br>
If you like the Google Plus Widget (<a href="http://www.webpagefx.com" target="_blank">developed by WebpageFX</a>), please consider rating it on WordPress.org and leaving a review. We will be working toward adding additional functionality and value to this plugin in future releases and as quickly as possible. 

== Installation ==

<ol>
<li>Login to your WordPress site</li>
<li>Go to "Plugins -> Add New"</li>
<li>Click on the "Upload" link</li>
<li>Browse to where you downloaded the Google Plus Widget zip file and then click "Install Now"</li>
<li>Depending on your WordPress site configurations you may need to provide your FTP server credentials</li>
<li>Once the install has completed, Activate the plugin</li>
<li>Go to "Appearance -> Widgets"</li>
<li>Find the Google Plus Widget in your list of available widgets and drag it to where you would like it to appear on your site (NOTE: Google Plus Widget may be listed as "GoogleCard")</li>
<li>Provide a title for the plugin and your Google+ ID.  You can find your Google+ ID by going to your profile...it is the 21 digit number found in the URL. (e.g., plus.google.com/YOUR_ID_IS_HERE)
<li>click the "Save" button</li>
</ol>

That's it! Refresh your website and you should now see your very own Google Plus Widget being displayed.  Customize the look and feel of your Google Plus Widget as you see fit with the many provided options!

== Frequently Asked Questions ==

<b>Q: I get the error "Fatal error: Class 'SoapClient' not found in /*****/*****/public_html/blog/wp-content/plugins/googleCards.php on line 68"</b>

A: The php-soap package needs to be installed on the Web server hosting your blog.  See this link for an explanation of the error: http://www.electrictoolbox.com/class-soapclient-not-found/

<b>Q: I get the error "Parse error: syntax error, unexpected T_STRING, expecting T_OLD_FUNCTION or T_FUNCTION or T_VAR or '}' in plugins/google-plus-widget/googleCardClass.php on line 25"</b>

A: This is a problem with your PHP setup. You are almost certainly running PHP4. The plugin requires PHP5. WordPress requires PHP5 after version 3.2 too. Talk to your host about using PHP5.

<b>Q: I get the error "Warning: file_get_contents() [function.file-get-contents]: Filename cannot be empty in /*****/*****/public_html/blog/wp-content/plugins/google-plus-widget/googleCardClass.php on line 181"</b>

A: You probably have something other than your Google+ id in the Google+ id box. Make sure you just put in the numbers from the url of your Google+ profile and nothing else.

<b>Q: I get the error "Warning: file_get_contents(http://plus.google.com/*******... [function.file-get-contents]: failed to open stream: HTTP request failed! HTTP/1.0 403 Forbidden"</b>

A: This is a HTTP 403 error from Google+, it means they have banned your server's IP from making requests to their servers. This usually isn't anything to do with the plugin (it makes very few calls to Google's servers) and it is more likely that you are on shared hosting, and someone else who shares your IP has been scraping Google.

<b>Q: I get the error "file_get_contents(http://plus.google.com/... [function.file-get-contents]: failed to open stream: Unable to find the socket transport "ssl" - did you forget to enable it when you configured PHP?"</b>

A: Because Google+ is HTTPS, you need to get your host to enable openssl and configure it for PHP.

<b>Q: I get the error "Warning: file_get_contents() [function.file-get-contents]: URL file-access is disabled in the server configuration in /*****/*****/*****/*****/wp-content/plugins/google-plus-widget/googleCardClass.php on line 181." AND/OR I get the error "Warning: file_get_contents(http://plus.google.com/*******... [function.file-get-contents]: failed to open stream: no suitable wrapper could be found in /*****/*****/*****/*****/wp-content/plugins/google-plus-widget/googleCardClass.php on line 181"</b>

A: The plugin requires either CURL or file_get_contents() to be enabled on your server. If your host gives you access to your php.ini then you can change the 'allow_url_fopen' setting to "1" which will fix your problem. Otherwise speak to your host and ask them to enable CURL or allow_url_fopen for you.

== Screenshots ==

1. Front-end widget view
2. Front-end widget view (compact)
3. Admin settings
4. Front-end with circle profile images

== Changelog ==

= 1.5 =
Inclusion of profile pictures for people in your circles
Resolves minor bug issues

= 1.4 =
Resolves minor bug issues

= 1.3 =
Added option to display Google+ posts/updates
Resolves minor customization bugs

= 1.2.1 =
Resolves some minor styling issues

= 1.2.0 =
User can now choose between two different layout sizes
Resolves minor bug issues

= 1.1.0 =
Added an optional Google +1 button
Allow for a high level of customizable options
Fixed several issues with circle count and profile image display

= 1.0.2 =
Fixed minor layout and style sheet issues

= 1.0.1 =
Fixed minor interface issues

= 1.0.0 =
First stable release


== Upgrade Notice ==

Please upgrade to the latest stable version (v1.5)