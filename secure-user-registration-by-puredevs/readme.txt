=== Secure User Registration by PureDevs ===
Contributors: puredevs, ympervej86
Tags: user registration, security, anti-spam, captcha, csrf
Requires at least: 3.5
Tested up to: 6.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The plugin enhances site security by implementing layers of protection to user registration forms, safeguarding the site from attacks like CSRF and automated bot registrations.

== Description ==
Do you need a secure layer over your registration process to prevent malicious site interactions? Secure User Registration is a reliable security solution designed to protect both standard and WooCommerce user registrations against CSRF attacks and bot registrations. It includes advanced features such as custom nonce implementation, email or domain blocking, and Google reCAPTCHA integration.

**Features include:**
- CSRF protection for user and WooCommerce registration forms.
- Enable or disable custom nonce fields for registration forms.
- Block specific emails or domains using a comma-separated list.
- Integrate Google reCAPTCHA to mitigate bot registrations.
- Customize error messages for invalid nonce, email/domain blocklist, and captcha errors.

== External Services ==
This plugin integrates with [Google reCAPTCHA](https://www.google.com/recaptcha/about/) to protect your site from spam and abuse.

**What the service is and what it is used for:**
Google reCAPTCHA is a free service that helps protect websites from spam and abuse by using advanced risk analysis techniques to tell humans and bots apart.

**What data is sent and when:**
When a user interacts with the registration form where reCAPTCHA is enabled, the following data is collected and sent to Google:

- User's IP address
- Browser and device information
- Cookies
- Mouse movements and keystrokes while interacting with the reCAPTCHA widget

This data is collected by Google when the reCAPTCHA challenge is displayed or solved, to determine whether the user is a human or a bot.

**Links to terms of service and privacy policy:**
- [Google reCAPTCHA Terms of Service](https://policies.google.com/terms)
- [Google Privacy Policy](https://policies.google.com/privacy)

Please review these policies to understand how Google processes this data.

== Installation ==
Manual installation is straightforward and takes only a few minutes:

1. Download the plugin from wordpress.org, unpack it, and upload the `secure-user-registration-by-puredevs` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==
**Q. Can Secure User Registration be used with WooCommerce?**

A: Absolutely! Our plugin is fully compatible with WooCommerce and provides dedicated CSRF protection for WooCommerce registration forms.

**Q. Is there support for blocking specific emails or domains?**

A: Yes, you can block specific emails or domains from registering by adding them to a blocklist in the plugin settings.

**Q. How does the Google reCAPTCHA integration work?**

A: Google reCAPTCHA can be enabled via the plugin settings to add an additional layer of security against bots during the registration process. Users will be required to complete a reCAPTCHA challenge to verify they are human.

== Screenshots ==
1. Plugin settings page where you can configure nonces, email/domain blocklist, and reCAPTCHA.
2. Example of a registration form with Google reCAPTCHA enabled.
3. Example of a WooCommerce registration form with Google reCAPTCHA enabled.
4. Custom error message display on a registration form.

== Changelog ==
= 1.0.0 =
- Initial release: Added CSRF protection for standard and WooCommerce registration forms, custom nonce field toggling, email/domain blocking, Google reCAPTCHA integration, and customizable error messages.
