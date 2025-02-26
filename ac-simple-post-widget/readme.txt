=== AC Simple Post Widget ===
Contributors: aaron_carmen
Donate link: www.example.com
Tags: widget, shortocde, custom post type, featured image,
Requires at least: 3.0.1
Tested up to: 4.3.1
Stable tag: 4.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provide both widgets and shortcode to help you display your post on your website.

== Description ==

Easily configure this and you can choose what custom post type and amount of post you want to display intro widget area of your site.

A few notes about the sections above:

*   You can create custom titles
*   You can choose from what Custom Post Types to display
*   You can set how many posts you wish to display
*   You can choose whether or not to display the post title and the excerpt along with the feature image
*   You can choose from predefined image sizes, or set custom width and height
*   You can choose whether or not to link the post to new tab

    Plans for future releases prior to v1.1
    Please feel free to put some comments about the plugin, of what i missed, need to upgrade and bugs.

== Installation ==

So you want to feature some posts on your site, Awesome! Let's get it done!

= Upload Manually =

1. Download and unzip the plugin
2. Upload `AC Simple Post Widget` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

= Install Via Admin Area =

1. In the admin are go to Plugins > Add New and search for AC Simple Post Widget
2. Click Install and then Click Activate

= How to used the Widget =

1. Set up the plugin (refer to above)
2. Go to Appearance > Widgets and drag the AC Simple Post Widget to your sidebar
3. Enter the title to appear in front end. For default "AC Simple Post Widget"
4. Choose what custom post type you want to display. For default "post"
5. Set how many post you want to display. For default "4"
6. Check the box if you want to display the content and the excerpt along with the Feature Image. For default "checked"
7. Set the custom height and width for the featured image. For default "100 by 100"
8. Check the box if you want the post to open new tab. For default "checked"

= How to use shortcode =

1. Navigate to the post or page you would like to custom post type to display.
2. Enter shortcode [ac_spw]
3. Customize the type of posts displayed by adding parameter 'post_type' with the custom post type you want to display. [ac_spw post_type='post']. By default 'post' custom type to be display.
4. Customize the number of posts displayed by adding parameter 'num_post' with the number of posts you want to display. [ac_spw num_post='4']. By default '4' posts are display.
5. Customize whether the title and excerpt will be displayed along with the featured image by adding parameter 'num_post' with the with a value of 'on' and 'off' [ac_spw title_content='on']. By default the title and excerpt has an 'on' setting.
6. Customize the width the feature image by adding parameter 'width' for the width [ac_spw width='100']. By default the width was set by '100'.
7. Customize the height the feature image by adding parameter 'height' for the height [ac_spw height='100']. By default the height was set by '100'.
8. Customize whether the link will be open in a new tab by adding parameter 'new_Tab' with the with a value of 'on' and 'off' [ac_spw new_tab='on']. By default the setting is 'on'.
9. You can use all parameters together like so [ac_spw post_type='post' num_post='4' title_content='on' width='100' height='100' new_tab='on']

== Frequently Asked Questions ==

= Once I install and activate the plugin, How do I use it? =

This is a widget and shortcode, so you will need to drag and drop the widget into a sidebar or other widgetized area of your site before you can configure it to work and you can find the how the description works in description tab.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. A preview of the plugin displaying as a widget
2. A preview of the default post layout
3. A preview of the post and set to hide the title and the excerpt
4. A preview how shortcode insert on a post or page
5. A Preview where shortcode added to a page and the title and the excerpt set as off

== Changelog ==

= 1.0 =

* Initial launch of the plugin
* Can set title of the widget
* Option to choose custom post type to display
* Option to set how many posts you want to display
* Option to choose show the title and the excerpt along with the featured image
* Option to set width and height to the featured image
* Option to choose if you want to open the link in new tab

== Upgrade Notice ==

= 1.0 =

* This is the first version of the plugin. No update available yet