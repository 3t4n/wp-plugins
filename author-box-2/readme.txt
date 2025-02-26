=== Author Box Reloaded ===
Contributors: ipublicis
Plugin URI: http://wordpress.org/extend/plugins/author-box-2/
Author: Lopo Lencastre de Almeida - iPublicis.com
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
Tags: author, theme
Requires at least: 2.8.0
Tested up to: 3.9.1
Stable tag: 2.0.4.2

Adds an author box to your blog. Fast and easy and fully configurable.

== Description ==

Adds an author box below text when viewing a single article. Idea taken from a [Brian Gardner's](http://smsh.me/7ngf) article.

It allows also the author to define links to the external websites like Twitter, Identi.ca, Facebook, Netlog, LinkedIn, Drupal Association and Wordpress.Org (included in [Author Box Reloaded Pack](http://wordpress.org/extend/plugins/author-box-reloaded-pack/)) (<b>REQUIRED</b>). Those external websites are very simple plugins and you can check the them to see how to make your own. At the front-end those will appear as clickable icons.

Starting In version 2.0, theme developers or authors can selectively include Author Box Reloaded using either a Template Tag or a Content Shortcode or even a mix of all this together.

<strong>PLEASE READ CAREFULLY THE INSTALLATION SECTION HERE AND IN THE `readme.txt` INCLUDED.</strong>

<center>Check out the other [Wordpress plugins](http://profiles.wordpress.org/ipublicis) by the same author.</center>

== Installation ==

How to install the Wordpress Author Box Reloaded plugin and get it working in an handful of steps:

1. <b>BE SURE THAT</b> [Wordpress Plugin Framework Reloaded](http://wordpress.org/extend/plugins/wordpress-plugin-framework-reloaded/) <b>IS INSTALLED</b> and <b>active</b> or this plugin won't work.
2. Upload `/author-box-2/` folder and its files to the `/wp-content/plugins/` directory or just use the Wordpress admin interface to install it.
3. Activate the plugin through the 'Plugins' menu in WordPress (after WPFR is installed or you will get an error message).
	* Don't forget to also activate at least one `Author Box <something> Contact`. See image 8 in [Screenshots](http://wordpress.org/extend/plugins/author-box-2/screenshots/). <b>Should also install</b> the [Author Box Reloaded Pack](http://wordpress.org/extend/plugins/author-box-reloaded-pack/) with several ones already included. Those where previously included with ABR but now are a separated package. You can create your own <em>ABR Contacts</em> without too much work. Instructions are included.
4. Go to your Personal Profile and insert the user id for the social networks you want to have the link in Author Box Reloaded. For instance, if in Twitter your url is http://twitter.com/niceguy just use the "niceguy" part of it. It is the same procedure with the other social networks or external websites.
5. You have also a few display options available. At least one must be set to see something on your front end. So, from the following:
	* Set the first option in the "Options Page" (<b>Author Box R3</u> in `Users`) and Author Box Reloaded will appear automagically after author's articles in single view. <b>This is not set by default</b> so nothing will show in your front end if you don't do at least this.
	* Besides this you could go to "Options Page" and set `Auto Display Off` and use one of the following options:
		* Template tag: `<?php if (function_exists('wp_authorbox')) echo wp_authorbox(); ?>`
		* Shortcode: [author-box-2]
	* You could also change the CSS to a `Personal` one
	* You could even have the Author Box automatically in `Posts single view` and also use the other options in specific `Pages` or inserted in other `theme templates`, like an `author` theme page.

You should have at least your "Contact Info" Website and/or one of the Social Networks defined or, at least, a not so short "Biographical Info", or the CSS may be real messy. 

If you have [User Photo](http://wordpress.org/extend/plugins/user-photo/), 0.9.4 or greater, installed, a photo loaded and `Override Avatar with User Photo:` selected, it will automatically use that image instead of the Gravatar one.

You can also use [Simple Local Avatars](http://wordpress.org/extend/plugins/simple-local-avatars/), 1.3.1 or greater.

If you use Wordpress Mu and want to add this plugin to all blogs just install it in the mu-plugins directory instead or, in more modern versions, activate it globally.

== Translations ==

If you want to make a translation for your language, use the author-box-2.pot included and (if you want) send me the files (just the .po and .mo ones) to dev@ipublicis.com for inclusion in plugin's package. You'll be credited, of course.

= Credits for present translations =

* Dutch translation made by Theo van der Sluijs ([tvds](http://profiles.wordpress.org/tvds))
* German translation made by Sven Schneider ([permanentmedia](http://permanentmedia.de/author/Sven%20Schneider/))
* Persian translation made by Sourena Parham ([bluebird2](http://profiles.wordpress.org/bluebird2))
* Portuguese translation made by Lopo Lencastre de Almeida ([ipublicis](http://profiles.wordpress.org/ipublicis))
   	
== Frequently Asked Questions ==

= HOW TO CREATE A NEW EXTERNAL CONTACT PLUGIN =

For 2.0.3 or greater just go to `Author Box Realoaded Pack` are now [package as an external plugin](http://wordpress.org/extend/plugins/author-box-reloaded-pack/) and follow the instructions and FAQ.

For 2.0.2 just download `wordpress.php` from the [SVN repository](http://plugins.trac.wordpress.org/browser/author-box-reloaded-pack/tags/2.0.2/wordpress.php)

On the header area:

1. Change the "Wordpress.Org" text in Plugin Name and Description. 
2. Change Plugin URI, Version, Author, Author URI and Donate link.
3. Keep the rest AS IS.

On the code area:

1. Change the function name but keep the "_authorbox_add_sites" portion.
	* We usually use the name text for it, i.e. for "Wordpress.Org" you'll set "wordpress_org" or something like it.
2. Change the $known_sites key and the "favicon" and "url" variables. 
	* The key is used in the profile form so use the same text you used in the Plugin Name in header area.
	* Don't forget that the $known_site url must have the text "USERNAME" in it in order to work properly.
3. Change the add_filter() function to include your "_authorbox_add_sites" function.

To make it available to everyone follow the rules defined at [Wordpress.Org](http://http://wordpress.org/extend/plugins/about/) or send it to us and we will include it in the next release and in svn trunk.
These are just another Wordpress plugins that will made some data available for Author Box Reloaded.

Thank you for your help and contribution.

= Have more questions? =

Go to the [Wordpress' forum](http://wordpress.org/tags/author-box-2?forum_id=10#postform).

== Screenshots ==

1. The Author Box Reloaded in a blog using LTR language.
2. The Author Box Reloaded in a blog using RTL language (Persian).
3. The modified User Profile page with some social networks available.
4. Now Author Box Reloaded is at the user's panel and not on Settings panel. Makes much more sense to end user.
5. More options, more versatile.
6. Using Wordpress Plugin Framework Reloaded turns access to help and other stuff much easier and makes admin interface more usable.
7. Global view of the new admin interface.
8. `External Contacts`. Now moved to [Author Box Reloaded Pack](http://wordpress.org/extend/plugins/author-box-reloaded-pack/).

== Changelog ==

= 2.0.4.2 = 

* Added reference to [Simple Local Avatars](http://wordpress.org/extend/plugins/simple-local-avatars/) (thanks Rene M.)
* Tweakned again some odd effects on CSS

= 2.0.4.1 =

* Added missing "return" in dependencies check.

= 2.0.4 =

* Added a check to see if the [Wordpress Plugin Framework Reloaded](http://wordpress.org/extend/plugins/wordpress-plugin-framework-reloaded/) is active.

= 2.0.3 =

* Big change that requires EXTRA care on upgrade.
* Author Box Reloaded External Contacts are now [package as an external plugin](http://wordpress.org/extend/plugins/author-box-reloaded-pack/) for ease of use and upgrade. <b>IT IS ADVISABLE THAT YOU INSTALL IT</b>.
* Added German translation by Sven Schneider

= 2.0.2 =

* Solved problem with template tag not working outside the Loop
* Link to WPFR on installation section had a typo so pointed to nowhere
* It works nicely with [User Photo](http://wordpress.org/extend/plugins/user-photo/) 0.9.4 or greater.

= 2.0.1 =

* PLEASE, read the [installation](http://wordpress.org/extend/plugins/author-box-2/installation/) instructions FIRST. Many things changed from version 1.x to 2.x. Thank you very much!
* In some versions people installed the `External Contacts` plugins were missing and this was causing an error. This only serves to allow upgrading with all files included. 
* Still an UNSTABLE VERSION. Use at your own risk. We are working hard to clear all raised issues.

= 2.0 =

* UNSTABLE VERSION. Use at your own risk.
* Complete rewrite of the code.
* Settings link is on User section and not with the other plugins.
* New Admin Panel with more options and a more usable interface.
* Use of automatic inclusion on single posts or not.
* Use of Shortcode available.
* Use of Template tag available. 
* Author's photo image positioning can be reversed with a click.
* CSS style can be completely overidden by administrator without the need to access the server.
* Plugin developer credit links available on Admin Panel sidebar.
* Support and Bug report links available on Admin Panel sidebar.
* Translators credits available on Admin Panel sidebar. Translators are a huge part of Free Software exit and we thing they deserve as much credit as we can give them.
* Last plugin news available on Admin Panel sidebar.
* Now uses our Wordpress Plugin Framework Reloaded. WPFR was based on previous work and ideias from Aaron Campbell, Mark Waterous, Husterk, Leonardo Martinez, Joost De Valk, Ozh and so many other Wordpress developers. Thanks to you all.
* Translations updated. Portuguese, Persian and Dutch available.
* New screenshots with the correct version working. 
* All version 1.x will be deprecated soon.
* New name, again, Author Box Reloaded.

= 1.2 =

* Some plugin code cleaning.
* More changes in the RTL stylesheet.
* Translations updated. 
* New screenshots with the correct version working. 
* More info added to the readme.txt.

= 1.1 =

* Now working with Right-to-Left languages too.
* Bug with translations solved.
* Added Persian translation (by [bluebird2](http://sourena.net/)).
* Added Portuguese translation (by [ipublicis](http://wordpress.org/extend/plugins/profile/ipublicis)).
* Added and extended function from Simple Author Box code to include other external social sites. 
* Change external link to iconized links.
* Changed output HTML and CSS.
* Changed name from AuthorBox to Author Box Reloaded

= 1.0 =

* First version released.
