=== Advanced Facebook Wall Shortcode ===

Plugin URI: http://www.connexapps.com
Author Name : Ted Lowe
Author URL : http://www.connexapps.com
Tags: advanced facebook, facebook wall, custom facebook wall, facebook wall shortcode, wordpress, facebook wall for wordpress, custom facebook wordpress, wordpress plugin, facebook wordpress shortcode, facebook wordpress plugin, facebook, facebook post feed, facebook feed, facebook feed shortcode, facebook feed for wordpress
Requires at least: 3.0.1
Tested up to: 4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Advanced Facebook Wall Shortcode - Displays feeds from Facebook Page Only. (It won't work with facebook group)

== Description ==
Advanced Facebook Wall Shortcode is a Wordpress Shortcode Plugin which displays Facebook Latest Post Feeds from any Facebook Fan Page.

This use Facebook Opengraph API so its highly customizable and you can style the feeds the way you like.

We have 24/7 Active Support so you can let us know if you are having any kind of issue with configuring our extension.

DEMO - http://www.connexapps.com/demo/advanced-facebook-wall-shortcode/

== Installation ==

Thanks for installing our Wordpress Plugin. In this article we will describe how you can use our PLUGIN perfectly.

We are open with suggestions & questions. So for anything please email us at - admin@connexapps.com

After Installing/ Uploading the Plugin First you have to do is Enabling the Plugin.

Now You can display our shortcode on any place of your wordpress site using our shortcode.

Our Shortcode : [ca_facebook]

This will display the facebook feed with all default values. To change the default values/ Attributes in wordpress you have to set your own values.

1. Facebook ID: It can be your Short URL of facebook page like

Example: https://www.facebook.com/smashmag

Here Facebook ID is - smashmag

If your Facebook Page URL is long then you can find your Facebook page Numeric ID.

go here - http://findmyfacebookid.com/

Submit your Page URL. Then you will find a numeric ID. Copy it; This is your Facebook Unique Id

So to put that on shortcode follow this -:

[ca_facebook facebook_id="YOUR_FACEBOOK_UNIQUE_ID"]

2. Facebook APP ID & Secret:

You have to create account in Facebook Developers site to obtain the keys. You can use the default values, But to its always better you use your own keys.

First Make sure you are login to Facebook

https://developers.facebook.com/

go here and create new app

The a window will popup

Give it a name and choose category. And then click "Create App" Button at bottom.

If Captcha Require. Fill it.

That's it. And you will find your APP Id & APP Secret

In default it will work with default APP ID and APP Secret values from facebook but if you like to put yours then

[ca_facebook facebook_id="samsung" app_id="1438026419800246" app_secret="78f65b8644632e0c2d98e053ed39668f"]

3. Width: Width of your Module in pixel.

[ca_facebook facebook_id="samsung" width="YOUR_PREFERRED_NUMERIC_VALUE"]

4. Post Limit: Limit of the numbers of Post you like to display.
[ca_facebook facebook_id="samsung" post_limit="5"]

5. Link Target Attributes: Link Target - Open in New Window or Same Window or Top Window
[ca_facebook facebook_id="samsung" post_link_target="_blank"]
Can put - "_self" - to load in same page.
More values from here:
http://www.w3schools.com/tags/att_a_target.asp

6. Display Attachment: Yes or No.

True - Yes / False - No
[ca_facebook facebook_id="samsung" display_attachment="true"]

== Frequently Asked Questions ==
 Contact us for any kind of support - admin@connexapps.com

== Screenshots ==

1. Screenshot of Shortcode Plugin

== Changelog ==

= 0.1 =
Stable version release