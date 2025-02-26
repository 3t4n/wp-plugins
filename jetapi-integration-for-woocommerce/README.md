# JetAPI Integration for WooCommerce

This plugin seamlessly integrates the JetAPI service with WooCommerce, enabling you to send notifications about customized events to users via WhatsApp, Telegram, and SMS messengers. It features a robust queue-based message sending system that supports bulk messaging and campaign management, with different sending rates based on user plans.

## Features

- Seamless integration of JetAPI service with WooCommerce
- Support for three communication channels: WhatsApp, Telegram, and SMS
- Configurable cascade sending for prioritizing communication channels
- Customizable sender name for notifications
- Automated notifications for new orders, order status changes, and new customer accounts
- Advanced bulk messaging functionality with queue-based sending
- Comprehensive campaign management and history tracking
- Intelligent message queue system based on user plans (Basic and Advanced)
- Full compatibility with the production JetAPI
- Dedicated message history page for easy tracking and management
- Flexible option to select WooCommerce customers for bulk messaging
- User-friendly dashboard for quick overview and access to key features
- Robust error handling and logging for improved reliability

## Requirements

- WordPress 6.7 or higher
- WooCommerce 3.0 or higher
- PHP 7.2 or higher

## Installation

Installation from within WordPress:

1. Visit Plugins > Add New
2. Search for "JetAPI"
3. Install and activate the JetAPI Integration for WooCommerce plugin

Manual installation:

1. Upload the `jetapi-integration-for-woocommerce` folder to the `/wp-content/plugins/` directory
2. Visit Plugins
3. Activate JetAPI Integration for WooCommerce plugin

## Configuration

1. Obtain a Bearer Token from JetAPI (https://jetapi.io/integrations/wordpress)
2. In your WordPress admin panel, go to WooCommerce > Settings > Integrations
3. Click on "JetAPI Integration"
4. Enter your Bearer Token in the "Bearer Token" field
5. Set your preferred sender name in the "Sender Name" field
6. Configure the cascade sending by selecting and ordering the channels (WhatsApp, Telegram, SMS)
7. Select the notification triggers you want to enable using the provided checkboxes
8. Choose your user plan (Basic or Advanced)
9. Save the settings

## Usage

### Dashboard

The JetAPI Integration Dashboard provides a quick overview of your integration status and key metrics. To access the dashboard:

1. Go to the "JetAPI" menu in the WordPress admin sidebar
2. Click on "Dashboard"

Here you can view:
- Integration status
- Recent message statistics
- Quick links to other plugin features

### Automatic Notifications

Once configured, the plugin will automatically send notifications for the events you've selected in the settings:

- New order placed
- Order status changed
- New customer account created

The plugin uses the cascade sending configuration you've set to send notifications through the selected channels in the specified order.

### Bulk Messaging

To send bulk messages:

1. Go to the "JetAPI" menu in the WordPress admin sidebar
2. Click on "Bulk Messaging"
3. Fill out the bulk messaging form:
   - Enter a campaign name
   - Compose your message
   - Select the channel you want to use for sending
   - Choose to enter recipients manually or select from WooCommerce customers
4. Click "Send Bulk Message"

The messages will be added to a queue and sent according to your user plan:
- Basic Plan: 50 messages every 25 minutes (1 message per 30 seconds)
- Advanced Plan: 5000 messages every 24 hours (1 message per ~17 seconds)

### Campaign Management

You can view and manage your messaging campaigns:

1. Go to the "JetAPI" menu
2. Click on "Campaigns"

Here you can:
- View all past and ongoing campaigns
- Check the status of each campaign
- See detailed statistics for each campaign
- Pause or resume ongoing campaigns

### Message History

The plugin stores and displays the history of sent messages on a dedicated "Message History" page. To access:

1. Go to the "JetAPI" menu
2. Click on "Message History"

The history includes:
- Date and time of sending
- Recipient's phone number or Telegram username
- Message text
- Successful delivery channel
- Final status

You can search through the message history, filter by date or status, and adjust the number of messages displayed per page.

## Advanced Usage

### Custom Notifications

You can programmatically send custom notifications using the plugin's API. Here's a basic example:

```php
$notification = new JETI_Notification_Sender();
$notification->send_message($phone_number, $message, $channel);
```

### Hooks and Filters

The plugin provides several hooks and filters for developers to extend its functionality:

- `jeti_before_send_notification`: Fires before sending a notification
- `jeti_after_send_notification`: Fires after sending a notification
- `jeti_modify_message`: Allows modification of the message before sending

## Troubleshooting

If you encounter issues:

1. Check the plugin's error log (WooCommerce > Status > Logs)
2. Verify your Bearer Token is correct and active
3. Ensure your server meets the minimum requirements
4. Check your WordPress and WooCommerce versions are compatible

## Support

If you encounter any issues or have questions, please contact our support team at support@jetapi.io or visit our website at https://jetapi.io.

## Changelog

### 1.8.1
- Updated rest of functions prefixes for better compatibility

### 1.8.0
- Updated all function, class, and option prefixes for better compatibility
- Improved code organization and structure
- Enhanced security with better data sanitization
- Updated documentation with new function and class names

### 1.7.0
- Added HPOS (High-Performance Order Storage) compatibility
- Improved database operations efficiency
- Enhanced error handling and logging capabilities
- Updated compatibility with latest WooCommerce version

### 1.6.0
- Added new dashboard feature for quick overview and access to key functionalities
- Implemented advanced campaign management system
- Enhanced message history with improved filtering and search capabilities
- Optimized database queries for better performance with large datasets
- Added new hooks and filters for developers to extend plugin functionality
- Improved error handling and added detailed logging for troubleshooting

### 1.5.0
- Removed API Key requirement, now using only Bearer Token for authentication
- Implemented ordered cascade sending configuration
- Replaced multiselects with checkboxes for Notification Triggers
- Added separate pages for Message History and Bulk Messaging
- Implemented pagination and search functionality for Message History
- Added option to select WooCommerce customers for bulk messaging
- Improved database structure for better performance with large datasets
- Updated admin interface for easier navigation and use

### 1.4.0
- Implemented queue-based message sending system
- Added support for different sending rates based on user plans (Basic and Advanced)
- Improved message history tracking and display

### 1.3.0
- Added bulk messaging functionality
- Implemented campaign management and history
- Added authentication using Bearer Token
- Improved admin interface for managing JetAPI integration

### 1.2.0
- Updated to work with production JetAPI
- Added configurable sender name
- Replaced cascading order with configurable dispatch routing
- Improved error handling and logging

### 1.1.0
- Initial release

## License

This plugin is released under the GPLv2 or later license. See the LICENSE file for details.
