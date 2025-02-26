Active Directory SSO
======

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