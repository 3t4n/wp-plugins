=== Advanced Members for ACF ===
Tags: acf, advanced custom fields, members, registration, account
Stable tag: 0.9.6
Requires at least: 5.8
Tested up to: 6.6.1
Requires PHP: 7.0
Contributors: danbilabs
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A Lightweight & Powerful Membership Plugin for ACF Users.

== Description ==

Advanced Members for ACF is a a lightweight, powerful membership plugin with a modern interface, designed for Advanced Custom Fields (ACF) users.

- This plugin requires ACF 6.2 or higher.

**Edit Membership Forms with ACF**

Forget complex integrations. Advanced Members for ACF is a simple add-on that works harmoniously with ACF:

- Edit registration, login, and account forms using ACF field groups
- Utilize additional membership fields for registration and account forms (user email, name, password, bio, and more)
- Combine various ACF native and add-on fields in your membership forms
- Customize UI easily with ACF presentation settings, no CSS required

**Lightweight and Fast**

Built as an ACF add-on with a modern, modular design, Advanced Members for ACF keeps your site speedy without unnecessary bloat.

= Comprehensive Membership Management

Enhance your membership site with these extra features:

- **Custom Emails:** Tailor email templates for user events, with the flexibility to activate or deactivate each type
- **Menu Item Visibility:** Control menu item display based on user login status and roles
- **Smart Redirects:** Guide users to specific pages or URLs after registration, login, and logout, customizable by user role
- **Admin Bar Control:** Disable the admin bar for selected user roles

= Future Development

We're committed to continually improving Advanced Members for ACF. Stay tuned for updates and new features to further enhance your membership management experience.

= Useful Links

[Official Site](https://advanced-members.com) | [Documentation](https://advanced-members.com/docs/getting-started/) | [Support Forum](https://wordpress.org/support/plugin/advanced-members/)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/advanced-members` directory, or install the plugin through the WordPress plugins screen directly.
2. Make sure ACF v6.2 is installed and activated.
3. Activate the plugin through the 'Plugins' screen in WordPress.

== Frequently Asked Questions ==

= Q: Does this plugin only work with ACF v6.2 or later? =

Yes. Versions lower 6.2 of ACF are not supported.

== Screenshots ==

1. Edit Membership Forms with ACF
2. Extra Fields for Membership
3. Emails
4. Redirects
5. Menu Visibility
6. Modulized feature control

== Changelog ==

= 0.9.3 =
- Intitial Release

= 0.9.4 =
- Fix: not follow redirect_to query string
- Fix: login button kses stripped
- Fix: uppercase constant names, lowercase function names
- New: Support email field on login form

= 0.9.5 =
- Mod: Renamed page state title
- New: Warning message for non default account form when render form
- Mod: Improved form settings fields
- Mod: Merged predefined forms and general forms in block

= 0.9.6 =
- Fix: Rmoved debug code
- Mod: Changed $post to get_the_ID()

== Upgrade Notice ==

None
