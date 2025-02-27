=== Plugin Name ===
Contributors: gleap
Tags: bug-tracking, bug-reporting, user-feedback, support, feedback, customer-feedback, live-chat, chat
Requires at least: 5.0.0
Tested up to: 6.4.2
Stable tag: 13.0.3
License: Commercial
License URI: https://github.com/Gleap/Wordpress/blob/main/README.txt

All-in-one customer feedback tool for websites. Learn more at https://www.gleap.io

== Description ==

Gleap helps developers build the best software faster. It is your affordable in-app bug reporting tool for apps, websites and industrial applications.

No more wasting time trying to reproduce a bug. Gleap reports automatically contain a replay video, session data, logs and more. Even better: You can add custom data to your bug details.

== Installation ==

Let's get started with the Gleap plugin for WordPress

e.g.

1. Upload `gleap.zip` to the `/wp-content/plugins/` directory and extract it
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Screenshots ==

1. Gleap SDK for WordPress
2. Automated screenshots with every bug
3. 60 second video replay
4. Feature requests
5. Your own feature widget
6. User ratings
7. Customer surveys
8. Live chat

== Changelog ==

= 13.0.3 =
* New Build System *

= 13.0.2 =
* Added action to track events
e.g. do_action('gleap_send_custom_event', $event_data);

= 13.0.1 =
* Added filter to inject custom user data.

function add_custom_data_to_gleap_identify($data) {
    $user_group = \Groups_Helper::get_group_for_current_user();

    if($user_group) {
        $data['customData']['mandat'] = $user_group->ap_mandant;
    }

    return $data;
}
add_filter('gleap_identify_data', 'add_custom_data_to_gleap_identify');

= 13.0.0 =
* Updated dependencies and introduced WPML language detection.

= 11.0.1 =
* Updated dependencies to support WP 6.2 and newer.

= 11.0.0 =
* Added permission based widget toggle.

= 8.0.5 =
* Improved the settings menu.

= 8.0.4 =
* Fixed bug that causes a php undefined notice.

= 8.0.3 =
* Made identity verification secret optional

= 8.0.2 =
* Fixed some minor issues.

= 8.0.0 =
* Updated to Gleap Widget 8.0.0

= 7.0.0 =
* Updated to Gleap Widget 7.0.0

= 6.3.0 =
* Updated to Gleap Widget 6.3.0

= 6.0.0 =
* Updated to Gleap Widget 6.0.0

= 1.0 =
* Initial release for WordPress

= 1.1 =
* Added options for Replays, Network Logs, Crash Detector & "Logged in users only".