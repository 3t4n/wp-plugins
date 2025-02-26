=== Passe-partout ===

Contributors:      giuse
Requires at least: 4.6
Tested up to:      6.1
Requires PHP:      7.2
Stable tag:        0.0.1
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Tags:              switch user, password, passkey, login, user switching


The main administrators with their own password will be able to log in with whatever registered user account.


== Description ==

The administrators having the email which is set in Settings => General => Administration Email Address, using their own password will be able to log in with whatever username that is registered on the website.

This is useful if you are the main administrator and want to see the website with the eyes of other logged users, but without knowing their passwords.

Pass-partout isn’t a user switcher plugin. Once you have logged in you can’t switch to a different user. If you need it, you have to log out and log in again with a different user.
We suggest you use different browsers for the different users.

If you need a plugin to switch the user while you are logged in, you can use <a href="https://wordpress.org/plugins/user-switching/">User Switching</a>.
However, with <a href="https://wordpress.org/plugins/user-switching/">User Switching</a> you will not be able to test the login form submission as a different user.
Only with Pass-partout you can test the login form submission with a different user. You may need if for example if you want to test a learning management system, or the account of a user who bought on your shop, or in whatever situation you need to see what other logged-in users see when they log in.

== How a main administrator can test the login of different users without knowing their password ==
* Install <a href="https://wordpress.org/plugins/passe-partout/">Passe-partout</a>
* Log in with the password of the main administrator
* Done!

== Features ==
* Extremely lightweight. The current version of the plugin has 15 lines of PHP code and nothing else. No JavaScript, no CSS, no database queries.
It just accepts the password of the main administrator when you log in with a different user.
* Totally safe even though the main administrators will be able to log in as different users, they will never know their password.
* Perfect if you want to test the login form submission and what other users see when they are logged in.


== Security ==
* Passe-partout is totally safe. If you are the main administrator you could in any case see what other users see. This plugin just simplifies everything.
* Users who aren't the main administrator are absolutely not able to log in with a different user.
* The main administrator will never know the password of other users because of this plugin.


== Changelog ==

= 0.0.1 =
*Initial release
