=== Easy Review Reminders ===
Contributors: jkohlbach, RymeraWebCo, rymera01
Donate link:
Tags: woocommerce review reminder, woocommerce reviews, review reminder woocommerce, woocommerce review email, review email reminder
Requires at least: 3.4
Tested up to: 4.8.0
Stable tag: 1.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automates the process of prompting customers for a review in WooCommerce.

== DESCRIPTION ==

**VISIT OUR WEBSITE:** [WooCommerce Coupon Plugin](https://advancedcouponsplugin.com/?utm_source=WordPressOrg&utm_medium=ERRPlugin&utm_campaign=PluginListing)

**FREE VERSION:**

Easy Review Reminders automates asking customers for a review of the products they purchased on your WooCommerce store. It is hands down the fastest way to build positive social proof and encourage future customers to buy.

1. Set an automated message to your customers on a time after order that you choose
1. The system emails your customers and presents a list of links based on what they purchased
1. They click the link and leave a review on your Product page (you get to moderate each review, just as normal in WooCommerce)
1. New customers see the reviews and are more likely to purchase knowing that someone has bought before them and had a positive experience!

Some features at a glance:

**TIME WHEN TO SEND YOUR REVIEW REMINDER**

Decide exactly when the system should email your customer based on a timing setting that you define.

Time your review reminder email so they receive it right after they're likely to receive their products.

You can even time it with the typical lifecycle of your goods, so they get reminded about your store just as they're running out of product and come back to get more.

**CUSTOMIZE EMAIL CONTENT**

Customize the exact messaging of your review reminder emails to suit your store via the simple WYSIWYG editor.

**FULLY AUTOMATED**

Uses the existing infrastructure of reviews in WooCommerce and bolts on the missing ingredient - automatic reminders for customers to come back and fill in the review.

New product reviews will go into your comment moderation queue as per usual in WooCommerce, so a quick check of new reviews is all that is required on your part.

**HANDLES UNSUBSCRIBES & CAN-SPAM COMPLIANCE**

The plugin comes complete with unsubscribing/opt-out functionality so your customers can tailor their communication preferences how they like.

**WORKS OUT OF THE BOX**

No funny scripts or templates to setup. It just works straight out of the box with WooCommerce and will work with most themes.

We're also constantly testing new themes and plugin combinations to ensure maximum compatibility.

**PREMIUM ADD-ON**

Click here for information about the Easy Review Reminders Premium add-on:
https://marketingsuiteplugin.com/product/easy-review-reminders/

Some premium features at a glance:

1. Not everyone responds on the first email, so Premium lets you add multiple reminders to go out over time on a schedule that you decide
1. Exclude certain user roles from receiving email review reminders
1. New in-depth reporting section under WooCommerce reports so you can see how well your review reminders are performing

We also have a whole bundle of marketing automation plugins available at:
https://marketingsuiteplugin.com

== Installation ==

1. Upload the `easy-review-reminders/` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Setup your settings under WooCommerce->Settings, Review Reminders tab
1. When you complete a customer Order, a new Review Reminder will be created under WooCommerce->Easy Review Reminders
1. ... Profit!

== Frequently asked questions ==

We'll be publishing a list of frequently asked questions in our knowledge base soon.

== Screenshots ==

Plenty of amazing screenshots for this plugin and more over at:
https://marketingsuiteplugin.com/product/easy-review-reminders/

== Changelog ==

= 1.2.4 =
* Bug Fix: Variation products produce an error message on the edit screen of Review Reminders
* Bug Fix: Link on product list on variable products was not pointing at parent product
* Bug Fix: {product_list} template tag doesn't show images correctly in some email clients

= 1.2.3 =
* Improvement: Add user_email on scheduled email template tags
* Improvement: Tidy up and improve codebase
* Bug Fix: Notice: Undefined variable: order

= 1.2.2 =
* Improvement: Add compatibility with upcoming WooCommerce version 3.0.0
* Bug Fix: Wrong text domain used found in html-order-item.php
* Bug Fix: Notices on debug.log

= 1.2.1 =
* Improvement: Adjust hover help and settings description for Days Considered "Not Reviewed" setting
* Improvement: Add extra spacing on some template tags
* Improvement: Add powered by to bottom of emails
* Improvement: Add help link in plugin listing
* Bug Fix: Prevent emails sending out with one product that has already been reviewed
* Bug Fix: Fix error with multisite compatibility
* Bug Fix: Tweak activation code to ensure it is executed only once
* Bug Fix: Remove add new button when activated via multisite
* Bug Fix: Save the date properly in the database during unsubscribe

= 1.2.0 =
* Feature: Add opt-out date time to the black list table
* Feature: If the customer already reviewed a product before, mark the text on the email as "Reviewed" with no link rather than "Review Product"
* Feature: Multi site compatibility
* Feature: Add new column "Order #" on ERR listings
* Feature: Display admin notice if woocommerce is not installed on plugin activation
* Feature: Product Bundles integration update (min required 5.0.1)
* Feature: Composite Products integration update (min required 3.7.1)
* Bug Fix: When updating an email, content is not recognized by validator when wysiwyg is in text mode
* Bug Fix: Fatal error on deactivating woocommerce while ERR is active

= 1.1.0 =
* Feature: WooCommerce Product Bundles plugin compatibility
* Feature: WooCommerce Composite Products plugin compatibility
* Improvement: Improvement: Tweak email validator
* Bug Fix: If a user is deleted, delete also any entries associated with it to avoid issues
* Bug Fix: Tidy up error message when adding already blacklisted email
* Bug Fix: When editing or adding new Email Schedules heading text is saved even when Wrap WC headers is unchecked.
* Bug Fix: When "Wrap emails with WooCommerce email header and footer?" is checked, "Heading Text" should be required.
* Bug Fix: Bug on adding editing "Email Schedules"
* Bug Fix: Possibility for a trashed order to have a review

= 1.0.1 =
* Improvement: Improve errSendEmail function to allow AJAX request
* Improvement: Add title attribute to email action buttons
* Improvement: Add hooks in email schedules so we can create new feature for ERRP
* Improvement: Update uninstallation codes
* Bug Fix: Check first if $errEmailSchedules is an array
* Bug Fix: Unhide "Save Changes" button under help settings
* Bug Fix: Fatal error: Call to undefined function wc_reminder_totals_coupon_label()

= 1.0.0 =
* Initial version

== Upgrade notice ==

There is a new version of Easy Review Reminders available.
