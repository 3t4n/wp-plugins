=== Actirise ===
Contributors: Actirise
Donate link: 
Tags: ads, analytics, cmp, ads.txt, monetization
Requires at least: 4.5
Tested up to: 6.7.1
Stable tag: 2.6.6
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Double your existing advertising revenue with Actirise all-in-one Wordpress plugin, high-performance monetization and real-time audience analytics.

== description ==

### Take your website monetization to the next level with Actirise

Our powerful and intuitive real-time auction solution gives you complete control over pricing and performance optimization. We use AI to optimize ad pressure, formats, price floors, and CTR, ensuring high-growth revenue and improving overall ad performance.

### 🗝️ Key features

Harness the power of Actirise's comprehensive feature set without writing a line of code, thanks to our Wordpress plugin.

* **No Code Plugin**: Experience seamless installation with our no-code plugin, designed for speed and simplicity.
* **Ads.txt manager**: Automatically keep your ads.txt file updated, ensuring you're always at the forefront of the advertising ecosystem.
* **Flashbid**: Supercharge your revenues with Flashbid, leveraging top-tier ad mediation technology and AI Optimization for maximum revenue generation.
* **Actirise analytics**: Enable Actirise Analytics instantly for your website, and gain deep, real-time insights into your audience's behavior.
* **Core Web Vitals optimizer**: Enhance your Core Web Vitals and preserve your score with Actirise, minimizing any impact when integrating our ad solution.
(*Note: We recommend that you **activate the Tidy PHP extension**.*)
* **Free CMP**: Improve your business operations with Fastcmp, our Consent Management Platform, specifically designed for publishers.

### ⏩ Third-Party Service Usage Disclosure

Our plugin may utilize third-party services under certain circumstances to enhance functionality. It is crucial for us to maintain transparency regarding the use of these services to ensure user awareness and legal compliance. Below are the details regarding third-party service usage:

1. **FlashBid (Actirise Advertisement System)**
*Service Description*: FlashBid, also known as Actirise Advertisement System, is utilized for specific advertising functionalities within the plugin.
*Service Link*: [Actirise](https://www.actirise.com/)
*Terms of Use and Privacy Policy*: [Actirise Privacy Policy](https://sparteo.com/privacy-policy/)

1. **FastCMP (Consent Management Platform)**
*Service Description*: FastCMP is utilized for managing consent and preferences regarding cookies and tracking scripts.
*Service Link*: [FastCMP](https://corporate.fastcmp.com/)
*Terms of Use and Privacy Policy*: [FastCMP Privacy Policy](https://sparteo.com/privacy-policy/)

It's imperative for us to make you aware of our reliance on these third-party services and to provide access to their terms of use and privacy policies. This ensures that your usage of our plugin remains in compliance with legal requirements.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/actirise` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. You can now freely configure your Actirise plugin via the available menu item.

== Frequently Asked Questions ==

= What is Actirise? =

Actirise is a monetization platform for publishers, providing a comprehensive suite of tools to maximize your revenue.

= How do I get started? =

Simply install our plugin, and you'll be up and running in no time.

= How can I use the custom filter hooks provided by the plugin? =

Starting from version 2.6.4, our plugin includes a set of custom filter hooks that allow developers to extend its functionality by adding their own logic. These hooks leverage WordPress’s filter system, making it easy to dynamically modify certain internal data.

Each filter is sanitized and secured to ensure only plain text values are processed, guaranteeing safe and reliable integration.

Here is the list of available filters you can use:

- actirise_custom1_value
- actirise_custom2_value
- actirise_custom3_value
- actirise_custom4_value
- actirise_custom5_value

To implement a filter, you can add custom code to your WordPress theme’s functions.php file or a custom plugin. For example:

`
add_filter('actirise_custom1_value', function($value) {
  return 'My Custom Text'; // Replace with your desired value
});
`

This makes it simple to customize the plugin’s behavior while ensuring security and compatibility.

= How do I contact support? =

You can contact us at [https://sparteo.com/contact](https://sparteo.com/contact)

== Changelog ==

### Version 2.6.6  - *2025-01-22*
- **[FIXED]** Fixed an issue where our script was being injected into the `<body>` instead of the `<head>` for WordPress versions earlier than 6.3.
- **[FIXED]** Fixed an issue where some plugins could modify the double quotes in our script tag to single quotes.

### Version 2.6.5  - *2025-01-13* 
- **[FIXED]** Resolved an issue where presized divs were displayed incorrectly in certain configurations
- **[FIXED]** Support for UTM variables in presized divs

### Version 2.6.4  - *2024-12-17* 
- **[ADDED]** Implemented apply_filters to make hooks available at the custom_vars level for enhanced customization.
- **[ADDED]** FastCMP now supports custom CSS injection for better integration with WordPress.

- **[FIXED]** Resolved an issue where the NoPub feature was not returning the correct URL.
- **[FIXED]** Adjusted get_privacy_policy_url for compatibility with WordPress versions prior to 4.9.6, ensuring compatibility up to version 4.5.
- **[FIXED]** Resolved a compatibility issue affecting the administration panel display versions prior to 5.0, ensuring compatibility up to version 4.5.

### Version 2.6.3  - *2024-12-09* 
- **[FIXED]** Resolved an issue where custom variables were not saving properly.

### Version 2.6.2  - *2024-12-06*
- **[FIXED]** Ensure full compatibility with older WordPress versions.

### Version 2.6.1  - *2024-12-05*
- **[FIXED]** Bug fixes and security updates.

### Version 2.6.0  - *2024-12-04*  
- **[ADDED]** Introduced a dedicated SQL table for managing plugin configurations, enabling more efficient data handling and custom queries.
- **[ADDED]** Implemented a badge management system for the administration panel, enhancing user interface and navigation.
- **[ADDED]** Added advanced logging for the no-pub mode to identify and resolve URL-related issues.

- **[CHANGED]** Improved fallback mechanism by utilizing transients when cron jobs are disabled.
- **[CHANGED]** Streamlined plugin initialization process during the first-time setup for better performance.
- **[CHANGED]** Standardized PHP variables and methods to follow the snake_case naming convention.
- **[CHANGED]** Activated debug mode by default for new installations to aid troubleshooting.

- **[FIXED]** Resolved an issue causing improper injection of presized div elements.

### Version 2.5.8  - *2024-11-18*
- **[FIXED]** Resolved an issue where, in rare cases, JavaScript scripts could be injected incorrectly.

### Version 2.5.7  - *2024-11-14*
- **[FIXED]** Improve code and security updates.

### Version 2.5.6  - *2024-11-06*
- **[FIXED]** Fixed an issue that could prevent the `ads.txt` file from updating on certain WordPress configurations.

### Version 2.5.5  - *2024-10-30*
- **[FIXED]** Improve diagnostic feature to make sure it's working in every environment.

Full changelog available [ at changelog.txt](https://plugins.svn.wordpress.org/actirise/trunk/changelog.txt)