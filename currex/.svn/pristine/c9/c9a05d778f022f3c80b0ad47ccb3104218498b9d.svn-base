=== curreX ===
Contributors: miCRoSCoPiC_eaRthLinG
Donate link: http://chaos-laboratory.com/2007/03/01/currex-ajax-based-currency-converter-widget-for-wordpress/
Tags: realtime, rate, yahoo, AJAX, sidebar, widget, exchange, converter, currency, finance, curreX
Requires at least: 2.0.x
Tested up to: 2.5.1
Stable tag: 0.9

curreX is an AJAX powered Currency Conversion widget for WordPress sidebars.

== Description ==

curreX is an AJAX powered Currency Conversion widget which can be run in your WordPress sidebar(s). The widget is very simple and does exactly what it's supposed to do. It accepts a currency value (integer or decimal) and a source & destination currency and gives you the converted rate once you hit the Convert button.

== Installation ==

Installation couldn't get any easier. Once downloaded, simply...

1. Unzip the archive.
2. Copy the extracted folder named curreX into your WordPress plug-ins folder.
3. Activate the plug-in from the Plug-in Manager in WordPress.
4. Visit the Sidebar Widgets page under Presentation menu (for upto WordPress 2.3.x) OR the Widgets section under Design menu (for WordPress 2.5.x) to drag & drop the widget onto any sidebar you desire.
6. Configure the widget as you like (Source / Destination Currecy, Decimal Precision etc.) and Save changes.

== Frequently Asked Questions ==

= Does this plug-in work with a non widget enabled theme? =

As of version **0.7**, it does. One should place a call to the function `show_currex( default_from, default_to, decimal_places, (optional) type, (optional) title )` in an appropriate place in the file **sidebar.php** for the non widget enabled theme. 

The **default_from** and **default_to** here are 3 character shortened codes for the source and destination currencies. These 3 character codes can be found in the dropdown currency selection boxes of curreX, stated beside each currency.

**decimal_places** is an integer which denotes the precision (number of digits to display after the decimal point) of the conversion result.

**type** specifies which type of widget (Flash based or HTML/JavaScript based) to display. This feature is available ONLY from version 0.9. The possible values are, **flash** and **html**. This parameter is optional and if it's not specified, by default the HTML/JavaScript based widget will be shown.

**title** specifies the title to display **embedded in the Flash widget**. This parameter is optional too and if omitted, no title will be displayed in the widget. This parameter is directly related the the **type** of the widget, and if **flash** isn't the chosen type has no effect on the display anywhere. This feature is meant to act as a replacement for the default title field of a WordPress widget. I don't recommend using both together - as it'll be pointless and redundant.

A typical call to this function with source currency as US Dollars, destination currency as Thai Baht and precision set to 2 decimal places looks like,
`<? show_currex( "USD", "THB", 2 ); ?>`

OR

`<? show_currex( "USD", "THB", 2, 'flash', 'Currency Exchange' ); ?>`

**NOTE:** Any version prior to 0.7 works **only** with widget enabled themes.

== Screenshots ==

1. View of the curreX front-end, as it appears in your WordPress Sidebar.
2. The curreX widget configuration dialog, as it appears within WordPress Administration Interface.

== Features ==

1. It can convert between 144 world currency formats.
2. The conversion rates are fetched in real-time from Yahoo! Finance prior to every calculation.
3. It employs an AJAX back-end, i.e. the conversions are performed without having to refresh the whole page, making the tool really lightweight & fast. Looks cool too.
4. Performs client-side validation of the amount entered - thus cutting out chances of entering an erroneous value and crashing the calculator midway while performing a conversion.