=== Advanced Social Media Icons ===
Contributors: riotweb
Tags: Social media, icons, shortcode, facebook, twitter, soundcloud, instagram, linkedin, googleplus, dribble, youtube
Requires at least: 4.0
Tested up to: 4.6
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Advanced Social Media Icons is a Wordpress plugin made for showing social media icons.

== Description ==
**Advanced Social Media Icons**

This plugin shows a social media icon when you display a shortcode. The icon is clickable and fully customizable.

**Attributes**

You can customize the plugin with attributes:

1. url - Links the icon to a url when pressed, use http:// 
2. src - Which social platform you want to use
3. id - There are 3 types of icons for every social media platform. The standard square icon doesn't need an id but for the round icon use id=1 and hex icon use id=2 .
4. height - Enter the amount of pixels of height, standard is 55px
5. width - Enter the amount of pixels of width, standard is 55px
6. align - Align the icon on the right position
7. alt - Give alt text with ur icon, good for SEO

**Types**

There are three types of icons. Square, round and hexagon.
To display round icons use id=1 and for hexagon use id=2 .

**Shortcode**

The plugin uses shortcodes to display the icons. For example [social url=http://twitter.com src=twitter] .
Other example are:

1. [social url=http://www.facebook.com src=facebook height=50px width=60px]
2. [social url=http://www.instagram.com/user src=instagram align=middle]
3. [social url=http://www.linkedin.com src=linkedin id=1]

== Installation ==

Upload the .zip file with a FTP program in the folder wp-content/plugins or upload via Worpress backend.

== Frequently Asked Questions ==
**How to display icons?**

To use the icons write a shortcode example [social url=http://twitter.com src=twitter align=right]

**Is there another icon for the same social media platform?**

Yes there is, use the id attribute like so [social url=http://twitter.com src=twitter id=1 align=right]

**The plugin is not working on my website how come?**

1. Check if your adblock is on.
2. Check if you run the latest version of Wordpress.

== Changelog ==

= 1.2 =
* Added hexagon icons. To use these icons use id=2.

= 1.1 =
* Now compatible with websites that use HTTPS / SSl.
