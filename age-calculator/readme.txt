=== Plugin Name ===

Contributors: joshcook
Donate link: http://www.joshcook.net/
Tags: age, calculator, current age, old, age calculator
Requires at least: 2.7
Tested up to: 4.8
Stable tag: trunk

== Description ==

A quicktag that will calculate the current age of a person/animal/whatever based on it's birthdate. Supports changing the verbiage for year(s) and month(s) plus has a multiplier for animals (such as "in dog years").

Using the quicktag [agecalc birthdate="1978-01-30] will display "31 years" using the default settings.

Visit [www.joshcook.net](http://www.joshcook.net/ "www.joshcook.net") for update information or to submit feature and support requests.

== Installation ==

1. Upload the 'age-calculator' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' section within WordPress
3. Configure Dashboard Links from the 'Settings -> Age Calculator' menu option

== Configuration ==

**Using the Quicktag**

The Age Calculator quicktag can be used in any post or page using the following format:

[agecalc *birthdate="1978-01-30"* year="" years="" multipliery="" month="" months="" multiplierm=""]

The following attributes can be used within the quicktag. Default values can be configured on the Age Calculator's settings page.

_birthdate_

The birthdate attribute is the only manditory attribute, which has to be entered Year, Month and then Day.  You can use either a . (period), a `/` (forward slash) or a - (hyphen) as the seperator.

Here are a few valid and invalid birthdate entries:

* 1978-01-30 - Valid
* 1978`/`01/`/`30 - Valid
* 1978.01.30 - Valid
* 01-30-1978 - Invalid
* 30.01.1978 - Invalid

_year_

Sets the text that is returned when the age is 1 *year*.

_years_

Sets the text that is returned when the age is more than 1 year.  For example, 15 *years*.

_multipliery_

Used as the multiplier for the year value. For example, if you had a pet web site you could multiply the age by 7 for "dog years". I giggle every time I say "miltipliery"

_month_

Sets the text that is returned when the age is 1 *month*.

_months_

Sets the text that is returned when the age is more than 1 month.  For example, 5 *months*.

_multiplierm_

Used as the multiplier for the month value.

**Age Calculator options page**

Configure the default text used when the plugin returns the current age. All values can be overridden within the quicktag.

== Frequently Asked Questions ==

= Why was Age Calculator created? =

I got tired of having to change pages that included age on them every year. Wanted to set it once and forget!

= Why did you choice the date format of YEAR-MONTH-Day =

Don't really know, but that's what I decided on. I guess I like that one the best. Who knows!?!?

= Where can I get support for this plugin? =

I provide support via my [web site](http://www.joshcook.net "www.joshcook.net"), although just because you post a request for help doesn't mean I will have time to answer your question. This is a free plugin and as such, you aren't guaranteed support. Then again, I'll help as much as I can and have time for.

= Your plugin rocks!  Can I donate? =

Absolutely!!!  Visit [www.joshcook.net](http://www.joshcook.net/ "www.joshcook.net") for more information!

= Development Notes =

*	I didn't see the reason for creating an object for such a simple plugin. In theory it would have taken more processor power on the server than needed.  So simple functions it is.

== Screenshots == 

None

== Changelog ==

= 0.81 =
* Added support for the changelog section

= 0.80 =
* Corrected problem with any age under six months.  Thanks to Kjell Harald Andersen!

= 0.79 =
* Corrected problem with the blankspace being used - seems I forgot to add the ;.  Thanks to James Turner!

= 0.78 =
* First Public Release