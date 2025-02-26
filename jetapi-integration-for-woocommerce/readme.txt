=== JetAPI Integration for WooCommerce ===
Contributors: jetapi
Tags: whatsapp, telegram, notifications, woocommerce, bulk-messaging
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.2
Stable tag: 1.8.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A third-party integration to seamlessly connect JetAPI service with WooCommerce for sending notifications via WhatsApp, Telegram, and SMS.

== Description ==

JetAPI Integration for WooCommerce is a third-party plugin that seamlessly integrates the JetAPI service with WooCommerce, enabling you to send notifications about customized events to users via WhatsApp, Telegram, and SMS messengers. It features a robust queue-based message sending system that supports bulk messaging and campaign management, with different sending rates based on user plans.

This plugin is not developed by or affiliated with WooCommerce or Automattic. It is an independent integration created to work alongside WooCommerce.

To use this plugin, you'll need an active JetAPI account. JetAPI is a separate service that provides APIs for sending messages through various channels. You can sign up for a JetAPI account at https://jetapi.io.

Features:

* Seamless integration of JetAPI service with WooCommerce
* Support for three communication channels: WhatsApp, Telegram, and SMS
* Configurable cascade sending for prioritizing communication channels
* Automated notifications for new orders, order status changes, and new customer accounts
* Advanced bulk messaging functionality with queue-based sending
* Comprehensive campaign management and history tracking
* Intelligent message queue system based on user plans (Basic and Advanced)
* Full compatibility with the production JetAPI
* Dedicated message history page for easy tracking and management
* Flexible option to select WooCommerce customers for bulk messaging
* User-friendly dashboard for quick overview and access to key features
* Robust error handling and logging for improved reliability
* Compatible with WooCommerce High-Performance Order Storage (HPOS)

== Installation ==

Installation from within WordPress:

1. Visit Plugins > Add New
2. Search for "JetAPI"
3. Install and activate the JetAPI Integration for WooCommerce plugin

Manual installation:

1. Upload the `jetapi-integration-for-woocommerce` folder to the `/wp-content/plugins/` directory
2. Visit Plugins
3. Activate JetAPI Integration for WooCommerce plugin

Configuration:

1. Obtain a Bearer Token from JetAPI (https://jetapi.io/integrations/wordpress)
2. In your WordPress admin panel, go to WooCommerce > Settings > Integrations
3. Click on "JetAPI Integration"
4. Enter your Bearer Token in the "Bearer Token" field
5. Set your preferred sender name in the "Sender Name" field
6. Configure the cascade sending by selecting and ordering the channels (WhatsApp, Telegram, SMS)
7. Select the notification triggers you want to enable using the provided checkboxes
8. Choose your user plan (Basic or Advanced)
9. Save the settings

== Frequently Asked Questions ==

= What are the system requirements for this plugin? =

The plugin requires WordPress 5.0 or higher, WooCommerce 3.0 or higher, and PHP 7.2 or higher.

= Is this plugin compatible with WooCommerce High-Performance Order Storage (HPOS)? =

Yes, this plugin is fully compatible with WooCommerce High-Performance Order Storage (HPOS).

= Do I need a JetAPI account to use this plugin? =

Yes, you need an active JetAPI account to use this plugin. You can sign up for an account at https://jetapi.io.

= How do I send bulk messages? =

To send bulk messages:
1. Go to the "JetAPI" menu in the WordPress admin sidebar
2. Click on "Bulk Messaging"
3. Fill out the bulk messaging form
4. Click "Send Bulk Message"

= How can I view the message history? =

To access the message history:
1. Go to the "JetAPI" menu
2. Click on "Message History"

= What should I do if I encounter issues? =

If you encounter issues:
1. Check the plugin's error log (WooCommerce > Status > Logs)
2. Verify your Bearer Token is correct and active
3. Ensure your server meets the minimum requirements
4. Check your WordPress and WooCommerce versions are compatible

If issues persist, contact our support team at support@jetapi.io.

== Screenshots ==

1. JetAPI Integration Dashboard
2. Bulk Messaging Interface
3. Message History Page
4. Plugin Settings Page

== Privacy ==

This plugin integrates with the JetAPI service to send messages via WhatsApp, Telegram, and SMS. It collects and processes the following data:

1. Customer phone numbers and/or Telegram usernames (for sending notifications)
2. Order information (for order-related notifications)
3. Message content and delivery status

This data is sent to JetAPI for processing and message delivery. Please refer to JetAPI's privacy policy (https://jetapi.io/privacy) for information on how they handle this data.

The plugin stores message history and campaign data in your WordPress database. This information is used for tracking and reporting purposes and is not shared with third parties.

== Changelog ==

= 1.8.1 =
* Updated rest of functions prefixes for better compatibility

= 1.8.0 =
* Updated all function, class, and option prefixes for better compatibility
* Improved code organization and structure
* Enhanced security with better data sanitization
* Updated documentation with new function and class names

= 1.7.0 =
* Added compatibility with WooCommerce High-Performance Order Storage (HPOS)
* Updated compatibility functions to support both HPOS and legacy order storage
* Improved error handling and compatibility checks
* Updated WooCommerce tested up to version 8.2

= 1.6.0 =
* Added new dashboard feature for quick overview and access to key functionalities
* Implemented advanced campaign management system
* Enhanced message history with improved filtering and search capabilities
* Optimized database queries for better performance with large datasets
* Added new hooks and filters for developers to extend plugin functionality
* Improved error handling and added detailed logging for troubleshooting

= 1.5.0 =
* Removed API Key requirement, now using only Bearer Token for authentication
* Implemented ordered cascade sending configuration
* Replaced multiselects with checkboxes for Notification Triggers
* Added separate pages for Message History and Bulk Messaging
* Implemented pagination and search functionality for Message History
* Added option to select WooCommerce customers for bulk messaging
* Improved database structure for better performance with large datasets
* Updated admin interface for easier navigation and use

= 1.4.0 =
* Implemented queue-based message sending system
* Added support for different sending rates based on user plans (Basic and Advanced)
* Improved message history tracking and display

= 1.3.0 =
* Added bulk messaging functionality
* Implemented campaign management and history
* Added authentication using Bearer Token
* Improved admin interface for managing JetAPI integration

= 1.2.0 =
* Updated to work with production JetAPI
* Added configurable sender name
* Replaced cascading order with configurable dispatch routing
* Improved error handling and logging

= 1.1.0 =
* Initial release
