=== AI Review Scanner ===

Contributors: ebuz
Tags: AI, product review, scan, approval
Requires at least: 6.0
Tested up to: 6.5.2
Requires PHP: 7.0.0
Stable tag: 1.0.0
WC requires at least: 7.0
WC tested up to: 8.9
License: GPL-3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A simple plugin to Scan Product Review using AI.

== Description ==

The "AI Review Scanner" plugin is a powerful tool designed to
Keep your customer reviews fresh and accurate with the AI Review Scanner Plugin. This easy-to-use tool ensures that your
website always shows the latest and most reliable reviews. It works automatically, so you can stay focused on your
business, knowing that your reviews are up-to-date.

== Third-Party Service: Review Scanner API ==

The AI Review Scanner Plugin leverages the Review Scanner API to seamlessly fetch and display the latest customer
reviews from various sources directly on your WordPress site. By activating and using this plugin, you agree to send
requests to the relevant Review Scanner API to retrieve up-to-date feedback, ensuring your website always showcases the
most
current and reliable reviews. This tool works automatically in the background, allowing you to focus on your business
while it maintains the freshness and authenticity of your customer testimonials.

Please review Terms of Service and Privacy Policy to ensure compliance with the data usage policies:

[Terms of Service](https://review-scanner.ebuz.xyz/terms-policy)

== Installation ==

= INSTALL AI Review Scanner WITHIN WORDPRESS =

* Visit the Plugins page within your dashboard and select ‘Add New’;
* Search for ‘AI Review Scanner’;
* Activate AI Review Scanner from your Plugins page;

= INSTALL AI Review Scanner MANUALLY =

* Upload the ‘ai-review-scanner’ folder to the /wp-content/plugins/ directory;
* Activate the plugin through the ‘Plugins’ menu in WordPress;
* Setup API from Settings > AI Review;

== Plugin Configuration ==

= "AI Review Scanner API Auth Token is Required to use this plugin" =

* First of all, you need to create an API for your plugin [Here](https://review-scanner.ebuz.xyz), (No need to
  create if you already have).

* The AI Review Scanner Plugin enhances the review management process by automatically approving reviews based on
  specified criteria related to the API response rating, known here as the "Threshold." This feature ensures that only
  reviews meeting your quality standards are displayed, helping maintain the credibility and reliability of user
  feedback on your site.

Introduction:
The AI Review Scanner Plugin enhances the review management process by automatically approving reviews based on
specified criteria related to the API response rating, known here as the "Threshold." This feature ensures that only
reviews meeting your quality standards are displayed, helping maintain the credibility and reliability of user feedback
on your site.

Configuration:
To configure the automatic approval settings, navigate to the AI Review Scanner section in your WordPress dashboard settings.
Here, you will find options to set the Threshold and select the rule that best suits your needs.

Rules for Automatic Review Approval:

    Equal to Threshold
        Description: Approves reviews that have a rating exactly equal to the specified Threshold.
        Use Case: Use this rule to approve reviews that match a specific rating value, ensuring consistency in the displayed reviews.

    Above or Equal to Threshold
        Description: Approves reviews with a rating equal to or higher than the Threshold.
        Use Case: Ideal for accepting all high-quality reviews that meet or exceed your expected standards.

    Below Threshold
        Description: Approves reviews that have a rating below the specified Threshold.
        Use Case: Useful for scenarios where lower ratings are expected or acceptable, possibly for more critical feedback.

    Below or Equal to Threshold
        Description: Approves reviews with a rating equal to or less than the Threshold.
        Use Case: Allows for a broader range of reviews, including those that meet the exact Threshold or are below it.

Detailed Instructions

AI Review Column:

    Using the Scan Button:
        Locate the 'AI Review' column in the Woocommerce Product Reviews table.
        Click the 'Scan' button next to any review to initiate the scanning process for that specific review.
        A notification or indicator will show the scanning result or status.

Bulk Scanning of Reviews:

    Selecting Multiple Reviews:
        In the Reviews section, use the checkboxes to select multiple reviews you wish to scan.

    Applying Bulk Action:
        Find the 'Bulk Actions' dropdown menu.
        Select 'AI Scan' from the dropdown options.
        Click the 'Apply' button to start the bulk scanning process.
        A notification will display the status of the bulk scan.

== Screenshots ==

1. This screenshot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
   the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the
   /assets
   directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
   (or jpg, jpeg, gif).
2. This is the second screenshot

== Changelog ==

= 1.0.0 =

* First release version.

== Frequently Asked Questions ==

coming soon.

== Upgrade Notice ==

coming soon.