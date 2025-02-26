=== Dynamic Donations ===
Contributors: pluginswithpurpose
Tags: donate, donations, stripe, payments, recurring, recurring donations, one time, amounts
Requires at least: 4.2
Tested up to: 6.3
Stable tag: 1.2.3
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easy and powerful WordPress plugin for donations or fundraising management.

== Description ==
# The Best Fundraising WordPress Plugin
## Easy and powerful WordPress plugin for donations or fundraising management.
- Integrates with Stripe, WooCommerce and more.
- Recurring and One-Time Donations.
- Donations Report.
- Totally Customizable.

# Plugin functions:

1. General Settings (capture1.jpg) => In this section you can configure the plugin:

Woo - Product ID: You must select the Product ID corresponding to Donation.

Description: You have the option to show or not the description in the payment method, adding the text of your preference.

Types of donations: Allows you to enable if you want to show customers the \"One time\" and / or \"Recurring\" options when making their payment. It is important that when enabling \"Recurring Donation\" Stripe is enabled and the keys configured.

Register Page: Select the page that will redirect the plugin when clicking on \"Register\" for clients.

Theme: Select the theme that the payment method will show. It can be the default or custom theme, to customize the CSS.

2. Stripe (capture2.jpg) => Stripe keys configuration to integrate recurring donations with subscriptions.

Stripe - Publishable key: Enter the public key corresponding to your Stripe account.

Stripe - Secret key: Enter the secret key corresponding to your Stripe account.

3. Amounts (capture3.jpg) => Configuration of the standard amounts to be paid through the public modal. 5 fixed items are shown, which you can enable / disable, select one to be marked by default and what the amounts will be for each one.



# Payment Method (Clients)

(capture5.jpg) You can see the modal to select the type of donation you want to make.

(capture6.jpg) Selecting \"Make a one time donation\" indicates the Donation Amount that will be paid among the previously configured options or enter another personalized amount. By clicking on \"Add Donations\" the plugin redirects to the Woocommerce Cart and in this way the customer already makes the payment from Woocomerce

(capture7.jpg) Selecting \"Make a recurring donation\" displays the option to select the payment frequency (Day - Week - Month - Semester - Year - Custom). Custom, the customer configures the interval of their preference. It also indicates the amount to be paid.

(capture8.jpg) After selecting the investment and payment amount. The login form is displayed (If you have not logged in) and the option to register (Redirection to the Register Page configured in the plugin).

(capture9.jpg) If you are already logged in, it shows the option to select a payment method or add a new one (Credit Card)

Finally, this registers a new subscription for this customer in Stripe.

(capture10.jpg) On the page \"My account\", slug \"my-account\" the payments made by the customer are shown, with the option to cancel the recurring ones.


== Installation ==
# Plugin location: (capture.jpg)

Once the plugin is active, go to \"Settings\" and then \"Dynamic Donations\"

# Add the plugin (capture4.jpg)

To add the button to your site, you just have to paste the following shortcode:

[dydo_button]

== Frequently Asked Questions ==
Why use this plugin?
Include in your website a plugin to make payments, donations, collaborations in a simple way.

= What donations gateway are available? =

By the moment, you can receive donations through Woocommerce and Stripe.

= What donations type are available? =

You can offer one time donations or recurring donations with multiple time intervals.

= Which time intervals are available for recurring donations? =

You can do daily, weekly, monthly, yearly donations and custom intervals of days, weeks and months.

== Screenshots ==
1. capture1.jpg
2. capture2.jpg
3. capture3.jpg
4. capture4.jpg
5. capture5.jpg
6. capture6.jpg
7. capture7.jpg
8. capture8.jpg
9. capture9.jpg
10. captur10.jpg

== Upgrade Notice ==
= 1.2.3 =
Release version
