=== Add User Profile ===
Contributors: ebo
Donate link: http://665-667.com/2010/04/10/052103
Tags:  user, profile, author,
Requires at least: 2.9
Tested up to: 3.0
Stable tag: 1.0

Adds RSS, Twitter, Facebook, MySpace, mixi, Skype on your profiles.

== Description ==

Add RSS and Twitter and Facebook and MySpace and mixi and Skype profiles.

and unset Jabber, Yahoo IM, AIM.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `add-user-profile` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add the code to display the single.php.

<?php echo the_author_meta('twitter');?>

or

<?php if (get_the_author_meta('twitter')) { ?>< a href="<?php the_author_meta('twitter');?>">Twitter</ a><?php } else { _e('Twitter'); } ?>


== Frequently Asked Questions ==

= A question that someone might have =


= What about foo bar? =


== Screenshots ==

1. screenshot-1.png.

== Changelog ==
