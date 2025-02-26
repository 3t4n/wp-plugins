=== GF Stripe Extensions ===
Contributors: jamesdlow
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=PGV92BZCFTDL4&item_name=Donation%20to%20jameslow%2ecom&currency_code=USD&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: gravity, forms, gravity forms, gforms, queries, transactions, stripe, paypal, recurring, payment, applepay
Requires at least: 4.0.1
Tested up to: 6.5.5
Stable tag: 2.6.7
License: MIT Licene
License URI: https://opensource.org/licenses/MIT

Add Stripe functions to Wordpress including ApplePay, analytics, query transactions, limit payments and payment recovery to Gravity Forms.

== Description ==

Add Stripe functions to Wordpress including ApplePay, analytics, query transactions, limit payments and payment recovery to Gravity Forms. Apple Pay buttons and JavaScript work without Gravity Forms.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/gf-stripe-extensions` directory, or install the plugin through the WordPress plugins screen directly.
2. Implement functionality:
	- Use [gf_stripe_applepay] function
	- Implement ApplePay JavaScript
	- Set the number of payments fo each feed in the form settings
	- Setup payment recovery


== Frequently Asked Questions ==

1. How do I enable Apple Pay logging:
	- Create form with standard fields
	- Add recurring / process payment checkboxes with value of 1
	- Add a stripe feeds for single and recurring payments and enable conditional logic for recurring / process payments checkboxes 

== Screenshots ==


== Changelog ==

= 2.6.7 =
* Fix more PHP 8 warnings

= 2.6.6 =
* Use PageApp shared libraries if avaliable

= 2.6.5 =
* Make customer and analytics search case insensitive

= 2.6.4 =
* Fix analytics day view for leap years

= 2.6.3 =
* Break down singly day by hours in analytics

= 2.6.2 =
* Show full path on entry list

= 2.6.1 =
* Add referrer URL to analytics

= 2.6.0 =
* Per form option for saving sent emails using WPO 365 plugin

= 2.5.9 =
* Add option to allow columns in form editor only in legacy markup forms

= 2.5.8 =
* Show hide $0 payments in analytics

= 2.5.7 =
* One more fix for limit payments

= 2.5.6 =
* Further fixes to intervals on limit payments

= 2.5.5 =
* Fix intervals on limit payments

= 2.5.4 =
* Fix create entries for PHP 8

= 2.5.3 =
* Add export list of recurring entries

= 2.5.2 =
* Add option for URL collapsing in analytics

= 2.5.1 =
* Switch limit payments to use stripes built in billing cancellation.
* This immediately stops the old method from working, so please do not upgrade if you have existing limit payment subscriptions.
* Fix Get Response email counts

= 2.5.0 =
* Upgrade UtilsLib

= 2.4.9 =
* Further Fixes for PHP 8

= 2.4.8 =
* Further Fixes for PHP 8

= 2.4.7 =
* Remove debug statements

= 2.4.6 =
* Further Fixes for PHP 8

= 2.4.5 =
* More PHP 8.0 updates

= 2.4.4 =
* Account for warnings in PHP 8.0

= 2.4.3 =
* Remove debug message

= 2.4.2 =
* Fix escaping from 2.4.1

= 2.4.1 =
* Escape strings for graphs

= 2.4.0 =
* Remove unused Campaigns and Tags views

= 2.3.9 =
* Improved reconcilation matching

= 2.3.8 =
* Improve +tel hyperlink

= 2.3.7 =
* Add global recentl calls list

= 2.3.6 =
* Fix months on reconciliation

= 2.3.5 =
* Add more details to call list

= 2.3.4 =
* Show recent voice calls from Microsoft Business Voice on customer view

= 2.3.3 =
* Only include stripe for payment recovery if another plugin hasn't first

= 2.3.2 =
* Improve projected recurring payments by accounting for billing cycle

= 2.3.1 =
* Add recent contact activities
* Fix filter searching

= 2.3.0 =
* Aggregate descriptions for trailing slashes

= 2.2.9 =
* Make customer is own view

= 2.2.8 =
* Ability to use select for analytics

= 2.2.7 =
* Tweak for timezone on analytics

= 2.2.6 =
* Fix for if GForms saves payment intend not charge id

= 2.2.6 =
* Add search for filtering

= 2.2.4 =
* Fix Total amount/number of payments count when filtering

= 2.2.3 =
* Small improvement to reconciliation

= 2.2.2 =
* Fix stripe link for customer gravity form entries
* Cache virtuous access token within session

= 2.2.1 =
* More reconciliation improvements

= 2.2.0 =
* Smarter matching on reconcile view

= 2.1.9 =
* Format number of payments on analaytics

= 2.1.8 =
* Add total to summary row

= 2.1.7 =
* Summary row on main table

= 2.1.6 =
* Allow transaction id to be only part of note in reconciliation

= 2.1.5 =
* Ignore case on payment method

= 2.1.4 =
* Fix edge conditions in month logic on reconcile tab

= 2.1.3 =
* Get entry by transaction over rest api
* Additional api keys

= 2.1.2 =
* Check last name on reconcile

= 2.1.1 =
* Trim reconcile .csv export

= 2.1.0 =
* Hide failed stripe payments in .csv export

= 2.0.9 =
* Month select for reconciliation

= 2.0.8 =
* Add entry/transaction to tables
* Search for customers by entry id or transaction id
* Fix tags .csv export

= 2.0.7 =
* Fix tags customer total

= 2.0.6 =
* Rename groups to tags
* Show unassigned gifts in tags

= 2.0.5 =
* Analytics only role, which only has analytics access, not CRM access

= 2.0.4 =
* Allow any emaill address in customers autocomplete box
* Include virtuous search in autocomplete box
* Don't round amounts in transactions tables

= 2.0.3 =
* Allow export to .csv for custom dates

= 2.0.2 =
* Better clear cache function

= 2.0.1 =
* Add on cancel to ApplePay

= 2.0.0 =
* Fix recurring bug with ApplePay

= 1.9.9 =
* Fix JavaScript bug with ApplePay

= 1.9.8 =
* Include version number when adding scripts
* Internal description for ApplePay payments

= 1.9.7 =
* Improve "Allow legacy stripe feeds" setting

= 1.9.6 =
* Fix single customer view

= 1.9.5 =
* Fix customer Filters
* Improved customer search
* Improved reconcile export

= 1.9.4 =
* Reconcile links to customers by email
* Show source or Url
* Link all Stripe to charge id as sometimes there isn't a payment intent
* Try and back populate metadata from Stripe

= 1.9.3 =
* Add customer search

= 1.9.2 =
* Fix reconciliation

= 1.9.1 =
* Add segment to reconciliation
* Add path to reconciliation
* PayPal reconcile
* Link to payment method / type

= 1.9.0 =
* Add default Campaigns report

= 1.8.9 =
* Button to go through each customer and check them
* Hide check column on single customer view

= 1.8.8 =
* Ability to recheck customers

= 1.8.7 =
* Don't link to # on customer check

= 1.8.6 =
* Add more columns to customer export
* Add checking for new customer in virtuous

= 1.8.5 =
* Add recurring total as well as count

= 1.8.4 =
* Fix caching

= 1.8.3 =
* Final fix for compare estimate

= 1.8.2 =
* Fix compare estimate

= 1.8.1 =
* Format recurring billing estimate

= 1.8.0 =
* Add role option for analytics viewing
* Show estimated monthly recurring donors
* Projected on full year version

= 1.7.9 =
* Remove debug statement

= 1.7.8 =
* Option to skip PayPal entry hash checking
* Option to enable/disable analytics caching
* Clear cache button

= 1.7.7 =
* Fix PayPal capture

= 1.7.6 =
* Fix one off donation sorting

= 1.7.5 =
* Fix date selection

= 1.7.4 =
* Shorten reconciliation period

= 1.7.3 =
* Fix projected for average amount

= 1.7.2 =
* Project forward recurring payments on Year view
* Tweak colors on main chart

= 1.7.1 =
* Minor efficiency tweak

= 1.7.0 =
* Setting to allow creation of Stripe feeds with legacy credit card fields

= 1.6.9 =
* Fix campaigns amount now that we're using a common caching funciton

= 1.6.8 =
* Switch cache to instance so it can be used in different plugins

= 1.6.7 =
* Transactions url without view=

= 1.6.6 =
* Fix select dialog now we've switched back to year as default

= 1.6.5 =
* Add caching for speed

= 1.6.4 =
* Improve virtuous reconciliation

= 1.6.3 =
* Fix customer linking

= 1.6.2 =
* Bug fix from last update

= 1.6.1 =
* Improve reconcile

= 1.6.0 =
* Put email under customer name on campaigns view
* Prototype virtuous / stripe reconcile

= 1.5.9 =
* Split out campaigns by customer

= 1.5.8 =
* Fix not getting complete comparison on month view
* Add email and donation amount to custom .csv export

= 1.5.7 =
* Change analytics viewing option to 'gravityforms_view_entries'

= 1.5.6 =
* Export campaigns to .csv

= 1.5.5 =
* Fix display of monthly group report

= 1.5.4 =
* Monthly and year view for groups report

= 1.5.3 =
* Hide export button if no group selected

= 1.5.2 =
* Export .csv for groups

= 1.5.1 =
* Sort campaigns / groups

= 1.5.0 =
* Fix virtuos tag totals

= 1.4.9 =
* Speed up virtuous tag loading

= 1.4.8 =
* Fix virtuous campaign total calculation
* Add virtuous tags
* Correctly sort virtuous donations

= 1.4.7 =
* Switch New Subscriptions and One Off pie charts to match graph and table
* Add virtuous Campaigns (optional)

= 1.4.6 =
* Ensure currency upper case when creating new stripe entries

= 1.4.5 =
* Add payment amount and currency to create entries code

= 1.4.4 =
* Fix displaying of customer when customer has no Gravity Forms entries

= 1.4.3 =
* Bug fix for correctly get description from line items creating missing entries from Stripe in 1.4.1

= 1.4.2 =
* More accounting for when Gravity Forms doesn't capture initial Stripe recurring payment

= 1.4.1 =
* Correctly get description from line items creating missing entries from Stripe

= 1.4.0 =
* Account for when Gravity Forms doesn't capture initial Stripe recurring payment
* Use gf_entry.transaction_type to determine recurring

= 1.3.9 =
* Don't create entries for missing payments if recent entry within last hour
* Fix payment method capture

= 1.3.8 =
* More timezone fixes

= 1.3.7 =
* Create entries for missing payments from PayPal
* Merge some common functions for PayPalExt and StripeExt
* StripeExt no longer checks for process_stripe as it should not be loaded at all unless it's true
* Use name from CRM if avaliable
* Use substitues when name not avaliable

= 1.3.6 =
* Create entries for missing payments from Stripe
* Display dates on analytics
* Use wordpress timezone in analaytics
* Analaytics date table is now clickable
* Bar chart groupings scale better with custom dates
* ApplePay shortcode gets default value from GForms

= 1.3.5 =
* Sorting for all tables

= 1.3.4 =
* Add year to date / liftime giving from Virtuous

= 1.3.3 =
* Bug fix for parsing Virtuous amounts
* Don't overwrite with blank Virtuous phone numbers
* Hyperlink phone number

= 1.3.2 =
* Import Virtuous CRM contact details

= 1.3.1 =
* Format customer columns

= 1.3.0 =
* Bug fix when no date set in settings

= 1.2.9 =
* Option to show Get Response email lists

= 1.2.8 =
* Filter by source
* Export contacts to CSV
* Add first year setting for analytics

= 1.2.7 =
* Fix linking to customer

= 1.2.6 =
* Filter by other state
* Customer view

= 1.2.5 =
* Fix historical comparison
* Filters on customer view

= 1.2.4 =
* Hide transaction list on year view again

= 1.2.3 =
* Tweak formatting of payment summary

= 1.2.2 =
* Swap recurring and one-off pie charts
* Show payment summary for current time period
* New date drop down UI

= 1.2.1 =
* Fix divide by 0 warnings

= 1.2.0 =
* Stripe payment recovery (Beta)

= 1.1.3 =
* List transactions by customer

= 1.1.2 =
* Year ago month comparison

= 1.1.1 =
* Fix dates to start midnight for month/week view

= 1.1.0 =
* Previous period shows till end of current month on year view
* Make sure today is included in week/month view

= 1.0.9 =
* Swap recurring and one off payments order in analytics UI

= 1.0.8 =
* Clicking past year on compare view takes you to previous years month
* Ctrl/Apple click opens links in new window

= 1.0.7 =
* Further fixes to missing payment types

= 1.0.6 =
* Filter by (Unknown) / Blank

= 1.0.5 =
* Option to change grouping number for (Other)
* Hide (Other) if grouping if blank

= 1.0.4 =
* Filter by payment_type and recurring status
* Get payment_type from form fields if not present on form entry

= 1.0.3 =
* Support recurring billing in Apple Pay short code without Gravity Forms

= 1.0.2 =
* Fix for some pie chart click events

= 1.0.1 =
* Add previous years comparison to analytics
* Add active vs. cancelled subscriptions

= 1.0.0 =
* Initial version of the plugin