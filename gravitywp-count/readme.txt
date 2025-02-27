=== GravityWP - Count ===
Contributors: gravitywp
Donate link: https://gravitywp.com/about/
Tags: gravity forms, number field, count, form, forms, gravity form
Requires at least: 3.0.1
Tested up to: 6.7
Stable tag: 0.9.14
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Count, filter and display the number of Gravity Forms entries or the total of a number field for multiple entries.

== Description ==

Visit [GravityWP.com](https://gravitywp.com/docs/count/) for documentation.

Most simple version of the shortcode (Count and display the number of entries Gravity Forms for a form): 

`[gravitywp_count formid='']`

Or when you want the total of the values of a number field (display the sum of the values of a number field for all entries a specific Gravity Form):

`[gravitywp_count formid='' number_field='']`

The most extensive version of the shortcode (display the total value of a number field from multiple Gravity Forms entries with up to five filters and input for number of decimals, the decimal point notation and the thousand seperator, etc, etc):

`[gravitywp_count formid='' formstatus='' number_field='' filter_mode='' filter_field='' filter_operator='' filter_value='' filter_operator2='' filter_field2='' filter_value2='' filter_field3='' filter_operator3='' filter_value3='' filter_field4='' filter_operator4='' filter_value4='' filter_field4='' filter_operator4='' filter_value4='' decimals='' dec_point='' thousands_sep='' is_read='yes' is_approved='yes' is_starred='no' created_by='1' multiply='2' start_date='12/31/2016' end_date='12/31/2017' workflow_step='' workflow_step_status='complete' workflow_step_is_current='true']`

== Installation ==

Upload the plugin files to the `/wp-content/plugins/gravitywp-count` directory, or install the plugin through the WordPress plugins screen directly.

== Changelog ==

= 0.9.14 =
- Fix a bug introduced in 0.9.12, where the total entries of all forms wasn't counted anymore when the formid parameter is not present.

= 0.9.13 =
- Correct version number.

= 0.9.12 =
* Minor optimization: Validate form ids before running the query.

= 0.9.11 =
* Option to use form_id instead of formid as parameter.

= 0.9.10 =
* Fix for greater_than and less_than operators not working.

= 0.9.9 =
* PHP 8+ compatibility for calculations.

= 0.9.8 =
* Added the gwp_count_result filter to allow modification of the shortcode output.
* Improved documentation.

= 0.9.7 =
* Added the possibility to count entries from multiple forms.
* Added support for relative date filters.

= 0.9.6 =
* Adhere to WordPress coding standards.
* Tested with WP 5.8.
* Updated urls for the new https://gravitywp.com.

= 0.9.5 =
* **Important:** The page_size attribute is no longer supported to avoid confusion and unintended results. It now defaults to the total entry count. 
* Non-numeric values will be ignored when calculating the total of a field. This prevents a php warning message when a field is empty or contains a non-numeric value.
* Added support for translations.

= 0.9.4 =
* Change default page_size from 200 to 10000 for counting number fields
* Added information about page_size to readme.txt

= 0.9.3 =
* Added attribute for filtering on workflow steps in Gravity Flow (workflow_step="30" workflow_step_status="pending,complete" workflow_step_is_current="false"). Credits to Yoren Chang. 

= 0.9.2 =
* Added attribute for filtering on approval status in Gravityview (is_approved="yes" is_approved="no"). Thanx Gravityview for support!

= 0.9.1 =
* Checks first if Gravity Forms is active
* Added attribute for filtering with date range (start_date="" end_date=""). Add in Month/day/Year, eg 12/31/2017.

= 0.9 =
* Added attribute multiply (standard is 1, multiply="2" will double, multiply="0.5" will half, etc)
* Added a value to attribute created_by="current" (this will count only the entries or numberfields filled in by the current logged-in user)

= 0.8 =
* Added attribute page_size (standard is 500).
* Added attribute is_starred (yes to count only starred entries, no to count only not starred entries, empty to show all)
* Added attribute is_read (yes to count only read entries, no to count only not read entries, empty to show all)
* Added attribute created_by (to count only the entries from a specific user ID)
* Updated the Readme.txt and added information that this plugin won't work when Gravity Encryption is enabled

= 0.7 =
* Added attribute add_number="" to the shortcode. With this attribute you can add or subtract a number from the output. For example add_number="100" will add 100 to the output. For example add_number="-100" wil subtract 100 from the output.

= 0.6 =
* Added filter_operator (conditional logic) attributes for filtering to shortcode (default: is | other options: isnot, not_equal, greater_than, less_than, contains, starts_with, ends_with)
* Added formstatus attribute to shortcode (default: active | other options: spam, trash, all )
* Added filter mode options to attribute of the shortcode filter_mode (default: all | other options: any)
* Improved structure of the code for easier adding of extra possibilities
* Added 3 more filter options: filter_field3, filter_field4, filter_field5 (+ operators and values e.g. filter_operator3, filter_value5 etc)

= 0.5 =
* Cleaned up the code (removed the old shortcodes, so please update your shortcodes! No backward compability)
* Exclude entries that are in trash
* Set default formid to zero

= 0.4 =
* Make only 1 shortcode that automatically manages the input
* Updated readme.txt

= 0.3.1 =
* Set default values for decimal, dec_point and thousands_sep
* Cleaned up some code
* Updated the readme.txt

= 0.3 =
* Added shortcode for counting total number of entries
* Added shortcode for counting total number of entries with 1 filter
* Added shortcode for counting total number of entries with 2 filters
* Added shortcode for counting total number of entries which are starred
* Updated the readme.txt

= 0.2 =
* Added decimal and thousand seperator
* Added multiple shortcodes (for different filtering options)
* Updated the readme.txt

= 0.1 =
* Added only the function to count the total of a number field for multiple entries in Gravity Forms

== Frequently Asked Questions ==

= Does this plugin rely on anything? =
Yes, you need to install the [Gravity Forms Plugin](https://www.gravityforms.com/) for this plugin to work.

= Are there plugins doing the same as GravityWP Count? =
Yes, you can use GFCharts to make calculations instead. It's easy to make the same calculations with GFCharts and you can easily use JavaScript to change the output format or number value. <a href="https://gfchart.com/?ref=3" rel="friend">Download GFCharts here (affiliate link)</a>

= Is Gravityview approval status supported? =
Thanks to the wonderful support of <a href="https://gravityview.co/?ref=115" rel="friend">GravityView</a> (affiliate link) we also added a filter for approval status:

`[gravitywp_count formid="2" number_field="4" is_approved="yes"]`

**is_approved**: Do you want to count only for the approved entries in GravityView? Or only the entries that are not approved? Add is_approved="yes" or is_approved="no" to your shortcode attributes.

= Is Gravity Flow supported? =
Yes, <a href="https://gravityflow.io/?ref=2" rel="friend">Gravity Flow</a> (affiliate link) is also supported. To simply show the number of entries that are at a specific Gravity Flow step, use this shortcode:

`[gravitywp_count formid="2" workflow_step="5"]`

You have to use the workflow step ID to filter the number of entries that are currently pending on that step. You can use the <a href="https://wordpress.org/plugins/gravitywp-merge-tags/" target="_blank">GravityWP - Merge Tags</a> plugin to easily find the ID (or even the shortcode to use). The plugin will provide a page with all the details of Gravity Flow steps for every form, including the shortcode to use. 

Or, the more difficult variant, you can open the step you want to filter on and check the url. It will be something like this: 

`gravitywp.com/wp-admin/admin.php?page=gf_edit_forms&view=settings&subview=gravityflow&id=2&fid=5`

The last number in the url (the 'fid=5') shows the ID of the workflow step.

**workflow_step**: Fill in the workflow step ID here to use as a filter. 
**workflow_step_status**: This is a comma seperated string. You can use one or both of the following options: pending,complete. 
**workflow_step_is_current**: this can be set to true or false. If set to false, it will count everything that is in workflow steps after the selected workflow_step (including the selected workflow_step).

= Does GravityWP Count work with the Gravity Encryption plugin? =
GravityWP Count won't work without extra code when you use the Gravity Encryption plugin on your site

= How do I show only the count for the current logged-in user? =
If you only want to show the total entries or the count of a number field for the currently logged-in user, you can use 

`created_by="current"`

= How to use the shortcode for counting entries? =
Here you find the shortcodes to count the total of entries (with or without filters). You will notice that you don't have to fill in decimals or decimal points, because these shortcodes only count the total of entries (which is always a whole number). It is possible to define a thousand seperator.

`[gravitywp_count formid="2" thousands_sep=","]`

or use the default (thousand separator is a comma):

`[gravitywp_count formid="2"]`

**formid**: This is the id of the form you want to target your shortcode at. It’s in orange. This will also accept a comma-seperated array of form id's.
**thousands_sep**: The thousands seperator is to, what it says, the notation you use to seperate thousands. In the USA this is a comma, in Europa this is a point. For example a million in USA is: 1,000,000.00 and in Europe it is: 1.000.000,00. You can define the thousands seperator in the shortcode.

= How do I use values to filter the results? =
You can use filters to only show the calculations you want (based on fields in the form). To use one filter, use this shortcode:

`[gravitywp_count formid="2" filter_field="3" filter_value="IT developer" thousands_sep="," ]`

**filter_field**: this is the Field ID you want to use in your filter. Go to your Gravity Form, go to the Field (text, dropdown, radio button) you want to use as your filter and write down the Field ID number to use in filter_field in your shortcode.
**filter_value**: write here the exact value that is in your text, radio button or dropdown. If you clicked ‘show values’, use the text under **Value** (don't use the label).

**With 2 filters**

`[gravitywp_count formid="2" filter_field="3" filter_value="IT developer" filter_field2="5" filter_value2="41 and older" thousands_sep="," ]`

**filter_field2**: this is the Field ID you want to use in your second filter.
**filter_operator2**: an optional comparison operator, possible values: =, is, contains, is not, isnot, <>, like, not in, notin, or in. Defaults to =.
**filter_value2**: write here the exact value that is in your text, radio button or dropdown (for the second filter!). If you clicked ‘show values’, use the text under Value.

You can use up to 5 filters.

= How do I use the shortcode to get a sum of a number field for multiple entries? =
Here you find the shortcodes you can use to calculate the totals of number fields in multiple Gravity Forms entries.

Count and display a number field calculation (without filters):
If you want to retrieve the total sum of the values of a number field from multiple entries, use this shortcode:

`[gravitywp_count formid="2" number_field="4" decimals="2" dec_point="." thousands_sep="," ]`

or use the default shortcode (2 decimals, dec_point ="." and thousands_sep=","):

`[gravitywp_count formid="2" number_field="4"]`

**number_field**: This is the ID of the number field you want to target. Make sure this is a number field!
**decimals**: This is how many decimals you want to show (after the point (if you are in the US or England) or after the comma (if you are in Europe or the rest of the world)). You can type 0 (zero) if you only want to show whole numbers. You can type 1, 2, 3, 4 or 10 or more to show more decimal numbers.
**dec_point**: This is what decimal point you want to use. In the USA and England this is a point. In Europe, the comma is used to show the decimal point. For example: USA: 1.23 and Europe: 1,23.

= How to filter the sum of a number field for multiple entries? =
If you want to use the Count Plugin and filter on 1 field (text, dropdown, radio button), use this shortcode:

`[gravitywp_count formid="2" number_field="4" filter_field="3" filter_value="IT developer" decimals="2" dec_point="." thousands_sep="," ]`

Two filter fields:
If you want to use the Count Plugin and filter on 2 fields (text, dropdown, radio button), use this shortcode:

`[gravitywp_count formid="2" number_field="4" filter_field="3" filter_value="IT developer" filter_field2="5" filter_value2="41 and older" decimals="2" dec_point="." thousands_sep="," ]`

= How do I count the number of entries from multiple forms? =
You can pass in multiple form id's as an array, like so:
`[gravitywp_count formid="1,2,3"]`

It is also possible to apply filters to this.

= Is it possible to use a relative date as a parameter? =

Yes, this is possible. You can pass in a relative date in the parameters start_date and end_date.
Visit https://www.php.net/manual/en/datetime.formats.relative.php for a list of possible date formats.

= How can I count the number of entries with a certain product?
For Product Fields, we advice you to use 'contains' as a filter_operator. The reason is that the product name and the price are stored together in the database, seperated by a pipe symbol.
Eg. a field has a product name 'Produkt A' with a price of '$10'. This is stored as 'Produkt A|$10'. You have to enter the precise value to get the correct results.
With 'contains' you have the option to only enter (a part of) the product name, or the price as a value.

= Is there a filter to change the output?
Yes, you can use the following data to filter the results:

Filter hook is named 'gwp_count_result'. Followed by the callback function which holds 3 arguments:
1: $formatted_value, the default output value of the count.
2: $raw_value, the raw unformatted output value of the count.
3: $formids, an array with the ID's of the coounted forms.

Example: For form with ID 1, unformatted values are compared with the number 10. Values lower than 10 are returned as formatted and in a red styling. 
When the value is 10 or higher, the formatted value is returned without a styling.

	add_filter(
		'gwp_count_result',
		function( $formatted_value, $raw_value, $formids ) {
			
			if ( $raw_value < 10 && $formids['0'] === '1' ) {
				return '<span style="color:red;">' . $formatted_value . '</span>';
			} else {
				return $formatted_value;
			}
		},
		10,
		3
	);


