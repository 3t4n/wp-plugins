=== Author Box Reloaded  Pack ===
Contributors: ipublicis, Sven Schneider
Plugin URI: http://wordpress.org/extend/plugins/author-box-reloaded-pack/
Author: Lopo Lencastre de Almeida - iPublicis.com
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
Tags: user profile contacts, user, author, theme, plugin, extra, profile, social network profile
Requires at least: 2.8.0
Tested up to: 3.9.1
Stable tag: 1.1.2

Adds the Author Box Reloaded External Contact plugins. 
REQUIRES [Author Box Reloaded](http://wordpress.org/extend/plugins/author-box-2/) 2.0.3 or greater.

== Description ==

It allows the author to define links to the external websites like Twitter, Identi.ca, Facebook, Netlog, LinkedIn, Xing, Drupal Association, Vimeo, BranchOut, Youtube, Google+, Skype and Wordpress.Org (included) when using [Author Box Reloaded](http://wordpress.org/extend/plugins/author-box-2/). At the front-end those will appear as clickable icons.

Those external websites are very simple plugins and you can check the included ones to see how to make your owns. 
This was a needed move because it is more probable that we have more `ABR3 External Contact` plugins developed by third parties to be included than to have too much development on original Author Box Reloaded.

<center>Check out the other [Wordpress plugins](http://profiles.wordpress.org/users/ipublicis/) by the same author.</center>

== Installation ==

How to install the Wordpress Author Box Reloaded Pack plugin and get it working in an handful of steps:

1. <b>BE SURE THAT</b> [Author Box Reloaded](http://wordpress.org/extend/plugins/author-box-2/) <b>IS INSTALLED</b> and <b>active</b>.
2. Upload `/author-box-reloaded-pack/` folder and its files to the `/wp-content/plugins/` directory or just use the Wordpress admin interface to install it.
3. Activate only the plugins you will need through the 'Plugins' menu in WordPress (after Author Box R3 is installed or you will get an error message). See image in [Screenshots](http://wordpress.org/extend/plugins/author-box-reloaded-pack/screenshots/).
4. Go to your Personal Profile and insert the user id for the social networks you want to have the link in Author Box Reloaded. For instance, if in Twitter your url is http://twitter.com/niceguy just use the "niceguy" part of it. It is the same procedure with the other social networks or external websites.

You should have at least your "Contact Info" Website and/or one of the Social Networks defined or, at least, a not so short "Biographical Info", or the Author Box Reloaded CSS may be real messy. 

If you use Wordpress Mu and want to add this plugins to all blogs just install them in the mu-plugins directory instead or, in more modern versions, activate them globally.

== Frequently Asked Questions ==

= WHAT IS AUTHOR BOX RELOADED =

Please, check [Author Box Reloaded](http://wordpress.org/extend/plugins/author-box-2/) for more info on what it is and how it works.


= HOW TO CREATE A NEW EXTERNAL CONTACT PLUGIN =

Download `wordpress.php` from the [SVN repository](http://plugins.trac.wordpress.org/browser/author-box-reloaded-pack/trunk/wordpress.php) and...

On the header area:

1. Change the "Wordpress.Org" text in Plugin Name and Description. 
2. Change Plugin URI, Version, Author, Author URI and Donate link.
3. Keep the rest AS IS.

On the code area:

1. Change the function name but keep the "_authorbox_add_sites" suffix.
	* We usually use the name text for it, i.e. for "Wordpress.Org" you'll set "wordpress_org" or something like it.
2. Change the $known_sites key and the "favicon" and "url" variables. 
	* The key is used in the profile form so use the same text you used in the Plugin Name in header area.
	* Don't forget that the $known_site url must have the text "USERNAME" in it in order to work properly.
3. Change the add_filter() function to include your "_authorbox_add_sites" function.

To make it available to everyone follow the rules defined at [Wordpress.Org](http://http://wordpress.org/extend/plugins/about/) or send it to us and we will include it in the next release and in svn trunk.
These are just another Wordpress plugins that will made some data available for Author Box Reloaded.

Thank you for your help and contribution.

= Have more questions? =

Go to the [Author Box Reloaded's forum](http://wordpress.org/tags/author-box-2?forum_id=10#postform) or to the [Author Box Reloaded Pack's forum](http://wordpress.org/tags/author-box-reloaded-pack?forum_id=10#postform).

== Screenshots ==

1. The modified User Profile page with some social networks available.
2. Plugin list with `External Contact` addons visible.


== Changelog ==

= 1.1.2 =

* Added Skype callto://.

= 1.1.1 =

* Added Vimeo, BranchOut, Youtube and Google+.

= 1.1 = 

* Added several social networks. Now Facebook, Xing, Drupal Association Twitter, Wordpress.Org, Identi.ca and LinkedIn are available.

= 1.0 =

* First release as an independent pack.
* Now checks for Author Box Reloaded being installed and active.
