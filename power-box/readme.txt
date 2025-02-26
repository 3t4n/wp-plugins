=== Power Box ===

Contributors: pbimal
Donate link: http://bimal.org.np/
Tags: box, content, hosted, power, power box, remote, url, widget
Requires at least: 4.5
Tested up to: 4.5
Stable tag: 1.0.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html


Displays a Widget Box with user configured custom content.


== Description ==

Display contents in Sidebar Widgets, beyond your imagination. Examples: Quote|Joke|Photo of the Day, Advertisements, Twitter Feeds, Forex Rates, anything else. All at your own configuration.

== Installation ==

Follow the installation methods below. 

After installation, configure the Power Box in WP Admin > Appearance > Widgets. Drag a Power Box widget and configure what to show.

You can use several power-box windows at once.

[Learn more about how to create your own conent hosting](https://github.com/bimalpoudel/power-box/blob/master/documentation/setting-your-own-host.md).


= Method #1 =

 * Go to your WP Admin > Plugins > Add New page.
 * Search for "Power Box".
 * Click install. Click activate.


= Method #2 =

 * Download this plugin as a .zip file.
 * Go to WP Admin > Plugins > Add new > Upload Plugin.
 * Upload the .zip file and activate the plugin.


= Method #3 =

 * Download the file power-box.zip.
 * Unzip the file on your computer.
 * Upload folder power-box (you just unziped) to /wp-content/plugins/ directory.
 * Activate the plugin through the WP Admin > Plugins menu.


== Frequently Asked Questions ==

= How many Power Boxes can I use? =

You may use multiple power boxes at once. But too many boxes may slow down because WP has to be busy fetching all the remote URLs.

= Is it safe to embed third party contents? =

As a matter of rule, do not point to untrusted source.

= What are the possible implementations? =

Quotation of the day is a very generic example. You can link it to third party notices, advertisements, Twitter feeds, Forex Rates, Pictures, ... and almost anything else.

= Do I need to create my Content Server? =

If the existing services and available APIs do not work, you should. It is actually very simple. A dedicated url that servers a tiny piece of HTML/Javascript/CSS output is enough. Do not limit your imaginations.

= How can I create my own Micro Content Server? =

[Details here](https://github.com/bimalpoudel/power-box/blob/master/documentation/setting-your-own-host.md)

= Can I customize the output? =

You can pass parameters as GET in the URL. And, your content server should respond accordingly. Take care of customization while creating your micro content server.

= Why should I create my micro content server? =

Shortly, to design the contents yourself. If you can use the public content APIs, ok.


== Screenshots ==

1. Drag power-box from Configuration Window in WP Admin > Appearance > Widgets.

2. Output in your blog's side bar.


== Changelog ==

= 1.0.0 =
* Tested with micro-service url.


== Upgrade Notice ==

No special instructions.
