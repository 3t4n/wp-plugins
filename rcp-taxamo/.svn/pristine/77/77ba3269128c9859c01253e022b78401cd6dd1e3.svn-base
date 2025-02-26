=== Restrict Content Pro - Taxamo Integration ===
Contributors: danieliser, mordauk
Tags: Restrict Content Pro, Taxamo, VAT Taxes
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This adds Taxamo VAT Tax integration to your existing Restrict Content Pro site.

== Description ==

This adds Taxamo VAT Tax integration to your existing Restrict Content Pro site.

Includes full support for all future subscriptions using Paypal. Stripe Integration is available but requires modifying RCP or waiting for the next update.

What It Does

* Updates prices automatically during checkout to show taxes if they choose a country that VAT applies to.
* Stores a unique Taxamo transaction for each subscription that includes all required VAT information.
* Recurring future payments will be added to that same transaction.

Important Notes

* Paypal Standard does not allow a fluctuating tax. The subscription price is set to include the tax rate at time of subscription and the rate may change in the future. In this case any additional tax will come from the price of the subscription. EX. $10 Subscription at 20% tax is $12/cycle. If the rate goes to 22% then tax will be $2.20, thus $0.20 additional of the $10 would be considered tax.
* Stripe allows monthly adjustment to the tax and this will be calculated every month.
* Currently setup fees are not taxed. This will be resolved shortly.

Setup Guide

1. If you haven't already sign up for [Taxamo](http://www.taxamo.com/).
2. If your taxamo email doesn't match your sites domain then you need to do this.
 1. In your Taxamo Dashboard, Navigate to Integrate -> JavaScript API
 2. Add your sites domain to the Currently configured additional domains under WEB API Referers.
3. In your Taxamo Dashboard, Navigate to Integrate -> API Tokens
4. Once signed in navigate to Integrate -> API Tokens
 1. If you are testing, you need the Test access tokens.
 2. If not, provide your business details and activate your account, then copy the production access tokens.
5. In your RCP Sites Admin Dashboard, Nagivate to Restrict -> Settings.
6. Enter both your Public and Private token. Enter test tokens to test, production for live sites.
7. Choose whether tax is included or added for new purchases.

Currently VAT Tax will only apply to new subscribers. We are trying to determine the best way to implement this for existing subscriptions but this requires determining there billing location and verifying it. This may require users to at a minimum update their profiles with their billing country. 

Options for this include forcing tax included for all paypal payments. Stripe allows adding tax to any new invoice so it won't be an issue. Paypal will likely require users to modify their subscription in order to add tax.

If you want to help, we welcome pull requests. [RCP - Taxamo On Github](https://github.com/danieliser/rcp-taxamo)

== Installation ==

1. Upload the `rcp-taxamo` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add your Taxamo API information to the RCP Settings Page.
4. On your Taxamo Dashboard, under APIs, click the Javascript Tab, and add your domain to the list of allowed domains.

== Changelog ==

= 1.0 =
* Initial Release.