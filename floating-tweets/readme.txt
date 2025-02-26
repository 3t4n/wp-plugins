=== Floating Tweets ===
Contributors: remix4
Donate link: http://www.designchemical.com/blog/index.php/wordpress-plugins/wordpress-plugin-floating-tweets/#form-donate
Tags: jquery, flyout, drop down, floating, sliding, twitter, tweets, api, vertical, animated, widget
Requires at least: 3.0
Tested up to: 3.13
Stable tag: 1.0.1

Floating Tweets allows you to quickly and easily add a floating widget, which displays the latest tweets from any twitter feed.

== Description ==

The Floating Tweets plugin adds a floating, slide out tab containing the latest tweets from any twitter account. The widget is easily set up via any widget panel and can handle multiple twitter feeds per page.

The widget control panel includes many options to customise position and features. The plugin also includes shortcodes for adding external text links, which can open/close the floating panel.

= Menu Options - Twitter Feed =

* Twitter Username - Enter the user name for the twitter account.
* Number of Tweets - Enter the number of tweets to be shown in the floating panel
* Show Replies - If checked the tweet list will also includes replies
* Open Links In New Window - Check to open tweet links in a new browser window.
* Add Follow Link - Check the box to add a link at the bottom of the panel, which links back to the username's account.
* Link Text - The text for the follow link

= Menu Options - Floating Panel =

* Event - Open/Close the panel using either 'hover' or 'click'.
* Width - Set the width of the panel
* Tab Text - Enter the text that you would like to use for the floating tab.
* Location & Aligment - Position can be set using a combination of location (Top or Bottom) and aligment (left or right). For each one you can also add the offset (in pixels) from the edge of the browser window.
The slide out animation depends on the tab location:
** Top Left or Top Right - panel slides down
** Bottom Left or Bottom Right - panel slides up
* Floating Speed - The speed for the floating animation
* Sliding Speed - The speed at which the panel will open/close
* Auto-Close Tab - If checked, the tab will automatically slide closed when the user clicks anywhere in the browser
* Keep Open - If checked the tab content will remain open
* Skin - 8 different sample skins are currently available for styling floating tweets. Since there are no essential styles required to create the floating tab, these can easily be used to create your own custom menu theme.

= Shortcodes =

The plugin includes the feature to add text links within your site content that will open/close the floating tab.

1. [dcflt-link] - default link, which will toggle the panel open/closed with the link text "Click Here".
2. [dcflt-link text="Floating Tweets"] - toggle the panel open/closed with the link text "Floating Tweets".
3. [dcflt-link action="open"] - open the floating tab with the default link text.
4. [dcflt-link action="close"] - close the floating tab with the default link text.

[__See demo__](http://www.designchemical.com/lab/demo-wordpress-floating-tweets-plugin/)

[__More information__](http://www.designchemical.com/blog/index.php/wordpress-plugins/wordpress-plugin-floating-tweets/)

== Installation ==

1. Upload the plugin through `Plugins > Add New > Upload` interface or upload `floating-tweets` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In the widgets section, select the Floating Menu widget and add to one of your widget areas
4. Select one of the WP menus, set the required settings and save your widget

== Frequently Asked Questions ==

= The floating tab appears on the page but does not work. Why? =

One main reason for this is that the plugin adds the required jQuery code to your template footer. Make sure that your template files contain the wp_footer() function.

Another likely cause is due to other non-functioning plugins, which may have errors and cause the plugin javascript to not load. Remove any unwanted plugins and try again. Checking with Firebug will show where these error are occuring.
== Screenshots ==

1. Floating Tweets widget in edit mode
2. Sample of floating tweets panel

== Changelog ==

= 1.0 = 
* First release

== Upgrade Notice ==
