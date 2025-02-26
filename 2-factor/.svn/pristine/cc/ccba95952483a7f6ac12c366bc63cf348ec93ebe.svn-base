===Matoma Two-Factor Authentication===
Contributors: matomagmbh
Tags: authentication, login, two factor, security, SMS
Requires at least: 5.5
Tested up to: 5.7
Requires PHP: 7.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
Two-Factor Authentication with SMS and E-Mail.
 
== Description ==
 
Matoma Two-Factor Authentication is a plugin that makes WordPress login more secure.
WordPress by default requires only a password and a user name. Brute force attacks and other vulnerabilities could cause the login to be compromised.

Matoma Two-Factor Authentication extends the login process by a 2nd factor to achieve increased security.
After the user name and password are requested, a random 8-digit code is generated and sent depending on the selected method. 
The user receives his one-time password either via e-mail or SMS (ClickSend.com account required).
 
== Installation ==

This section describes how to install and run the plugin.

1. Find the plugin in your WordPress Admin Panel. "Plugins" -> "install"
2. activate the plugin via the menu "Plugins" in WordPress
3. enter your ClickSend.com API credentials under "Settings" -> "Matoma 2FA
4. set the message for the passkey in "Settings" -> "Matoma 2FA Maximum 120 characters (wildcard is replaced by values)

 
== Frequently Asked Questions ==

= Where do I get my ClickSend.com API login information?  =
 
Go to [ClickSend.com dashboard](https://dashboard.clicksend.com/#/account/subaccount "API Login Information Dashboard") and copy the user name and API key.

= Can I use Authenticator apps such as "Google Authenticator"? =

Not at present.
It is planned to implement these functions in a future version.

= Which 2-factor authentication methods can be used? =
e-mail
SMS (ClickSend.com account required)

= Why passkey can not be send? =
Check if you set the Passkey Message in "Settings" -> "Matoma 2FA".
 
== Screenshots ==
 
1. settings
2. login mask
 
== Changelog ==
= 1.0.3 =
Add IP whitelist

= 1.0.2 =
security fix

= 1.0.1 =
security fix

= 1.0.0 =
Basic Plugin structure
Hook into WP-login Process
Generate 2FA-passkey
Send 2FA-passkey (E-Mail, ClickSend.com)
API connect to ClickSend.com
 
== Upgrade Notice ==
= 1.0.3 =
Add IP whitelist

= 1.0.2 =
security fix

= 1.0.1 =
security fix

= 1.0.0 =
First release!