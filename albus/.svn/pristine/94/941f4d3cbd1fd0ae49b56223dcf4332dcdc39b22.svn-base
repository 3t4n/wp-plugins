=== Albus ===
Contributors: edvind
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EXQYJ7PM2R9RU
Tags: minecraft, whitelist, albus, bukkit
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 0.3

Enables the use of Albus whitelisting plugin for Bukkit (Minecraft) on WordPress installations

== Description ==

Enables the use of Albus whitelisting plugin for Bukkit (Minecraft) on WordPress installations. It requires the Bukkit plugin Albus to work: http://forums.bukkit.org/threads/admn-albus-v3-0-use-forum-grouping-to-control-whitelist-via-mysql-499.3110/



This WP plugin adds the additional field "Whitelisted" to the users list on the administration panel where you can whitelist registered users to your Minecraft server.

Note that the original Albus plugin for Bukkit is required to make it work. Read the Installation section for instructions on how to set it up. However, with the database field there the plugin may work with other bukkit-whitelisting-plugins.


Bug reports, feedback and feature requests is thankfully received!

== Installation ==


= Minecraft =

1. Install the Albus plugin to your craftbukkit installation (You can find it in this forum thread: http://forums.bukkit.org/threads/admn-albus-v3-0-use-forum-grouping-to-control-whitelist-via-mysql-499.3110/ )
2. Start and shut down your server in order to generate a settings file.
3. Open up the albus.properties found in /your-craftbukkit-base-folder/plugins/Albus/
4. You are required to enter the following:

* group-field=whitelist
* username-field=user_login
* mysql-table=wp_users
* allowed-group-ids=1

* mysql-db and mysql-host has to be the same that WordPress uses.

Alongside with your personal mysql connection settings of course. If you have a custom table prefix in your WordPress installation, replace wp_ with your custom prefix.


= WordPress =

1. Upload the `albus` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Log in as an administrator and whitelist users on the "Users" page

== Frequently Asked Questions ==

= What is Albus? =

Originally a plugin for Bukkit that enables you to whitelist players depending on their forum grouping on websites. You can get more information in the forum thread on the Bukkit forums: http://forums.bukkit.org/threads/admn-albus-v3-0-use-forum-grouping-to-control-whitelist-via-mysql-499.3110/

This plugin, also named Albus, is just a framework to get the Bukkit Albus plugin to work on WordPress installations.

= Are you the developer of the Albus plugin for Bukkit? =

No, but it's a damn good plugin.

== Screenshots ==

No screenshots yet.

== Changelog ==

= 0.3 =
* Fixed a bug with the Pending field being shown

= 0.2 =
* Sends a mail to user when whitelisted
* Admin account cannot be whitelisted
* Pending accounts (with the user activation feature in Theme My Login-plugin) cannot be whitelisted

= 0.1 =
* Initial release with basic functionality

== Upgrade Notice ==

= 0.1 =
Initial release with basic functionality