=== Plugin Name ===
Random Numbers Generator

Contributors:      Codecide
Plugin Name:       Random Numbers Generator
Plugin URI:        https://plugins.codecide.net/rann
Tags:              shortcode, testing, numbers, random number, random numbers
Author URI:        https://plugins.codecide.net
Author:            Codecide
Donate link:       https://www.redcross.com/donate
Requires PHP:      7.1
Requires at least: 5.0.0
Tested up to:      5.3.2
Stable tag:        1.0
Version:           1.0.0

== Description ==
This plugin allows you to display pre-formatted random numbers for testing or demonstration purposes. 

Attributes:
range: Two numbers separated by a comma. The output will contain a number between the mininum and maximum value, in that order. 
format: Any string containing at least the # character. The # character is a placeholder for the generated number. If a single digit integer follows the #, the number will be formatted with the amount of decimals it specifies. By default, the output will be the nubmer by itself. Any other string specified in the format declaration will be echoed as is.
use: The name of a register. When "use" is specified, the first instance of the random number will be registered for reuse.

Examples:
[rann range=1,100]: Outputs a integer between 1 and 100.
[rann range=0.25,2.5 format=#2]: Outputs a float between 0.25 and 2.50
[rann range=-100,100 format=$#]: Outputs a signed integer between -100 and 100, preceded by the dollar sign.
[rann range=1,10 use=mytoken format=$#.95]: Outputs an integer between 1 and 10 preceded by a dollar sign and followed by ".95"; registers the result for later use.
[rann use=mytoken]: Outputs the raw integer registered in the previous example. 

== Installation ==
Install and activate the plugin from your WordPress dashboard. 

General information about installing WordPress plugins can be found [here](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Upgrade Notice ==
= 1.0.0 =
Initial release

== Changelog ==
= 1.0.0 =
* Initial release.

== Frequently Asked Questions ==
= What is the default value? =
The default value is 0 -- meaning that the shortcode will echo "0" if no range is specified.

== Donations ==
None needed.