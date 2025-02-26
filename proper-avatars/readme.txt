=== Proper Custom Avatars ===
Contributors: rockdio
Donate link: http://rockdio.org/ayudatech/wordpress-3-4-and-higher-custom-avatars-the-proper-way/
Tags: avatars, comment, custom Avatar, default avatar, disable gravatar, gravatar, mistery man
Requires at least: 3.0.x
Tested up to: 3.5.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Proper Custom Avatars.

== Description ==

WordPress does not have an option to remove calls to gravatar.com, nor to set default site avatars or add custom user avatars outside gravatar.com
Many people claims that calls to gravatar.com slow down the sites and some are just bored of the silly default mystery man or the monsters.
You can disable Avatars completely but this plugin adds functionality to set your custom avatar and the site default one.

**PLEASE upgrade to this version as the previous one had very poor sanitation of the user input ** 

**This plugin adds the following functionality:**

1. Show Avatars
1. Remove calls to gravatar.com
1. Use local default Avatar
1. Add custom avatar for the blog users
1. Display Custom avatar for blog users
1. Display default avatar for unregistered commenter
1. Display custom avatar for comment replies

== ChangeLog ==

Version 0.1
* Plugin created

Version 0.1.3
* Updated the path to the default image to make it compliant with WP 3.5.1

Version 0.1.4
* Added folder /img inside "/wp-contents/plugins/proper-avatars" 
  the plugin will look for "default.jpg" in there to show it.
  This was done to fix a hardcoded call to my own site i forgot to remove while testing the custom funtionality

Version 1.0.0

**SECURITY UPDATE !!!!**

* WOW, lots done, I don't know where to start:

	1. Added SANITATION to the input to avoid code Injections!!! **(very important)**
	1. Added the hability to change the Custom Avatar from the backend, (Uses a row on wp_options table)
	1. Completely filtered out unneeded calls to gravatars.com from the get_avatar function in WP
	1. Solved a bug that scrambled the gravatars in 3.42 and 3.51 (just unset the default Avatars array)
	1. Added a link for support on the backend (please keep it and feel free to post a thanks it feeds my ego)
	1. Got rid of the original code for setting the default site wide avatar that was basically a copy paste 
	1. Optimized the filter to get_avatar function to simplify the ifs loop (it is a headache)
	1. The way the code for the Deafult image is inserted in WP will allow to use the PG settings if you desire
	1. No more editing the plugin or dropping files to define the avatars
	1. Solved a bug where the custom Avatar for users was not showing in the backend
	1. Drank about 3 liters of coffee

That's all for now. (oh yes, better instructions for installation and setup in this read me)

Version 1.0.1

* Forgot to add the /img folder to svn (Linus Torwalds is right, SVN is a pain in the)

== Installation ==

1. Extract the download on your computer and upload the proper-avatars folder to wp-content/plugins/.
1. Enable the plugin from the 'Plugins' page.


1. Go to settings -> discussion; Scroll down to the option to set the site wide default avatar
1. type or Paste the URL of the Avatar image you would like to use in the field 


1. Go to your user profile and add the url to your avatar (Every user can do that)
1. type or Paste the URL of the Avatar image you would like to use in the field 


== Submit a Problem or Feature Request ==

If you have spotted a problem with the plugin or have an idea for a new feature, then please let us know in
[Comments](http://rockdio.org/ayudatech/wordpress-3-4-and-higher-custom-avatars-the-proper-way/ "Comments") posting a comment in the web site.
Do not forget to include as much information as possible and check whether someone else has submitted the same issue before you post.

**If you want to donate please feel free buy me a beer from the donation link on the plugin page on my site.**

== Frequently Asked Questions ==
1. Nothing yet

== Upgrade Notice ==
1. Nothing yet

== Screenshots ==
1. Nothing yet