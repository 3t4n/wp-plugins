=== Active Directory SSO ===
Contributors: joeywohleb
Tags: active directory, ldap, sso
Requires at least: 3.6
Tested up to: 3.7.1
Stable tag: 0.2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wordpress plugin for implementing Single Sign On for Active Directory.

== Description ==

Wordpress plugin for implementing Single Sign On for Active Directory.

Required:

+ IIS 7+ with anonymous access disabled turned off, or one of the below plugins for Apache:

 - mod_auth_sspi for Apache on Windows: http://mod-auth-sspi.sourceforge.net/
 - mod_auth_kerb for Apache on Linux: http://modauthkerb.sourceforge.net/
 - mod_ntlm for Apache on Linux: http://modntlm.sourceforge.net/
 - mod_auth_ntlm_winbind for Apache on Linux: http://samba.org/ftp/unpacked/lorikeet/

+ php_ldap extension for PHP

For anyone that uses IIS7, for file uploads you'll need to give the actual users that will upload files
 access to read, write and modify ..\wp-content\uploads and PHP's temp upload directory.

== Installation ==

1. Upload files to the `/wp-content/plugins/` directory
1. Activate Active Directory Single Sign On through the 'Plugins' menu in WordPress
1. Go to settings page and set all options.

== Changelog ==

= 0.2.1 =
Fixed Wording

= 0.2 =
Changed name of application to match Wordpress plugin directory.

= 0.1 =
Initial release.