=== G-SMTP ===
Contributors: thegeneration
Tags: smtp
Donate link: https://thegeneration.se/
Tested up to: 6.5
Requires PHP: 8.0
License: Apache 2.0
License URI: https://www.apache.org/licenses/LICENSE-2.0
Stable tag: 1.1.4

Next Generation SMTP-plugin

== Description ==

G-SMTP is a next Generation SMTP-plugin built to last. This is a plugin that helps you send your e-mails via SMTP, and only that.

All the SMTP-details are setup as constants via wp-config.php, making it stable and does not have to rely on the database for the e-mails to be delivered.

== Installation ==

1. Install the plugin either through your web browser in the WordPress admin panel or manually through SFTP/FTP.
2. Activate the plugin
3. Setup the constants in `wp-config.php` as described below or use the configuration page at **Settings > G-SMTP > Config** to generate them
4. Test the settings by going to **Settings > G-SMTP** and sending a test e-mail

= Constants =

These are the base constants needed to make the plugin work:
`
define( 'G_SMTP_ENABLED', true );
define( 'G_SMTP_HOST', 'my-smtp-host.com' );
define( 'G_SMTP_PORT', 25 );
`

Below, you will find information regarding the different constants available:

**Activated/deactivated (mandatory)**
This sets if the SMTP-connection should be enabled or not. It can be used for debugging-purposes and should be left as true generally.
`
define( 'G_SMTP_ENABLED', true );
`

**Host (mandatory)**
Here you enter which domain/IP-address where the SMTP-service is hosted.
`
define( 'G_SMTP_HOST', 'my-smtp-host.com' );
`

**Port (mandatory)**
Here you enter what port the SMTP-service is hosted on. Generally the ports `25` (non encrypted), `465` (SSL) and `587` (TLS) are used.
`
define( 'G_SMTP_PORT', 25 );
`

**Encryption (optional)**
This defines if an encrypted connection should be used when connecting to the SMTP-service. Normally you should enter `ssl` if the port is `465`, `tls` if the port is `587` and leave it empty if the port is `25`.

`
// TLS connections (port 587)
define( 'G_SMTP_ENCRYPTION', 'tls' );

// SSL connections (port 465)
define( 'G_SMTP_ENCRYPTION', 'ssl' );
`

**Username and password (optional)**
If the SMTP-service requires authentication then you must enter username and password.

`
define( 'G_SMTP_USER', 'username' );
define( 'G_SMTP_PASSWORD', 'password123' );
`

**Sender, name and e-mail (optional)**
If you want to override the sender name and e-mail address you can enter these settings.

`
define( 'G_SMTP_FROM_NAME', 'Sender name' );
define( 'G_SMTP_FROM_ADDRESS', 'sender@sender.com' );
`

This overrides the **default settings**, if plugins have other settings then those will be used.

If you want name and e-mail address to always be overriden then you can use this setting:
`
define( 'G_SMTP_FORCE_FROM', true );
`

== Upgrade Notice ==

= 1.1.4 =
1.1.4 is a patch release.

= 1.1.3 =
1.1.3 is a patch release.

= 1.1.2 =
1.1.2 is a patch release.

= 1.1.1 =
1.1.1 is a patch release.

= 1.1.0 =
1.1.0 is a minor release.

= 1.0.0 =
1.0.0 is a major release.

== Changelog ==

= 1.1.2 =
* Tested with WordPress 6.0.

= 1.1.1 =
* Change to G_SMTP_USER from G_SMTP_USERNAME when generating config through the wizard

= 1.1.0 =
* Added ability to generate config for wp-config.php on the setting page.

= 1.0.0 =
* Initial release.

== Screenshots ==

1. Overview of settings page where you can verify the connection
2. Configuration page where you can generate constants to put in your wp-config.php