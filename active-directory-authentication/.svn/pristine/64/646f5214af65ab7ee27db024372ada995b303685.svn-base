=== Active Directory Authentication ===
Contributors: jbearak, ktdreyer
Tags: authentication, active directory, ldap
Requires at least: 2.5.1
Tested up to: 3.0.4
Stable tag: 1.1

Authenticates users through Active Directory.

== Description ==

This plugin allows WordPress to authenticate users against an Active Directory domain.

It is very easy to set up. Just activate the plugin, type in a domain controller, and you're done.

You can use this plugin in a few different ways.

(a) You can create WordPress accounts which match the names of your AD accounts, and create these users from within the WordPress Users panel. Only the users you create in WordPress will be able to log in.

(b) You can tick a checkbox so that anyone who can authenticate via AD can log on. A WordPress account will be automatically created for the user if one does not already exist, with the default user role.

(c) You can list the names of Active Directory groups who you want to allow to log on to WordPress. For each group in Active Directory, you can specify a corresponding WordPress user role. (I find this to be very useful along with the "Role Management" plugin.)

You can also combine the above however you like.

I wrote this plugin because, first of all, I was surprised that there does not seem to be a working Active Directory authentication plugin for WordPress. I was especially surprised after writing this plugin, for, as someone relatively new to WordPress, I was shocked to see how easy this was to write. More seriously, though, I am a student at Queens College (http://qc.cuny.edu) and I also work in the Sociology department, and thought this would be a good idea to have a single-sign-on system for editing the department's website.

"Active Directory Authentication" is based upon Daniel Westermann-Clark's "HTTP Authentication" plugin (http://wordpress.org/extend/plugins/http-authentication/) and Scott Barnett's "adLDAP", a very useful PHP class (http://adldap.sourceforge.net/). WordPress documentation was not particularly helpful in writing this, and Westerman-Clark's plugin was an invaluable starting point. Barnett's adLDAP is something I've used over and over again. Both deserve thanks for their work, without which I do not know if I would have been able to write this.

== Installation ==

1. Login as an existing user, such as admin.
2. Upload the folder named `ad-auth` to your plugins folder, usually `wp-content/plugins`.
3. Activate the plugin on the Plugins screen.
6. Enable the "Admin SSL" plugin (or anything that redirects the logon page to an SSL connection) so that your passwords are not sent in cleartext.  

Note: This plugin has only been tested with WordPress 2.5.1 and above, and I do not think it will work on older versions of WordPress.
