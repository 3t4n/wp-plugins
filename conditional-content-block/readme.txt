=== Conditional Content Block ===
Contributors: aion11
Donate link: https://mkaion.com
Tags: conditional content, visibility, user roles, device detection, scheduling
Requires at least: 5.8
Tested up to: 6.7
Stable tag: 1.3.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Show/hide content based on multiple conditions including user roles, device type, login status, and date/time schedules.

== Description ==

Advanced conditional content block that lets you control content visibility with precision. Perfect for creating personalized user experiences.

**Features:**
- User role-based visibility (with role selector)
- Device type detection (Mobile/Tablet/Desktop)
- Date/time scheduling (start and end dates)
- Login status control (logged-in/logged-out)
- Smart fallback content system
- Real-time block editor preview
- Timezone-aware scheduling
- Administrator testing mode

== Installation ==

1. Upload the `conditional-content-block` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the "Conditional Content" block using the block editor
4. Configure visibility settings in the block sidebar

== Frequently Asked Questions ==

= How do I test visibility rules as an admin? =
Admins now follow the same visibility rules as other users. To test admin-specific content:
1. Select 'Administrator' in the user roles selector
2. Ensure you're logged in when testing

= How accurate is the device detection? =
Device detection uses WordPress mobile detection combined with user agent analysis. Tablet detection looks for common tablet identifiers in the user agent string.

= Can I combine multiple conditions? =
Yes! All conditions work together using AND logic. Content will only show when all selected conditions are met.

= How does timezone handling work? =
All scheduling uses your WordPress site's timezone (set in Settings > General).

= What happens when multiple roles are selected? =
Users only need one matching role to see the content (OR logic between roles).

== Screenshots ==

1. Block settings panel showing visibility controls
2. Date/time picker interface in the editor
3. Frontend view of fallback content

== Changelog ==

= 1.3.1 (2025-01-31) =
* Corrected CSS handling
* Prefixed function names
* wp_head removed
* Improved security

= 1.3 (2025-01-20) =
* Added date/time scheduling feature
* Implemented conditional role disabling
* Improved admin testing workflow
* Added WordPress timezone support

= 1.2 (2024-12-18) =
* Added tablet detection
* Implemented device type selector
* Fixed role selection logic
* Improved mobile detection accuracy

= 1.1 (2024-05-15) =
* Added user role system
* Implemented admin visibility override
* Enhanced device detection
* Improved block UI organization

= 1.0 (2024-03-10) =
* Initial release
* Basic login status detection
* Mobile device detection
* Fallback content system

== Upgrade Notice ==

= 1.3 =
Major update introducing date/time scheduling and improved condition handling. Test visibility rules thoroughly before deploying to production.

= 1.2 =
Added tablet detection and device type selector. Update recommended for sites needing precise device targeting.

== Support ==

For support, please use the [WordPress support forums](https://wordpress.org/support/plugin/conditional-content-block).

== Copyright ==

Conditional Content Block is released under the GPLv2 or later.  
This plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.