=== Advanced Custom Fields: Bootstrap Button ===
Contributors: teakor
Tags: acf, advanced custom fields, fields, button, bootstrap
Requires at least: 4.5.0
Tested up to: 4.9.5
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds a field for creating a Bootstrap 3 or 4 button for the popular plugin Advanced Custom Fields. In addition to supporting all Bootstrap 3 or 4 options, you can insert an internal or external link with the link picker.

== Description ==

This plugin adds a field for creating a Bootstrap 3 or 4 button for the popular plugin Advanced Custom Fields. In addition to supporting all Bootstrap 3 or 4 options, you can insert an internal or external link with the link picker.

= General Configuration Options: =
    1.	Text button.
    2.	HTML tags (a, button, input, submit).
    3.	Block Level Buttons
    4.	Active or disabled button status.
    5.	Additional CSS class (For any customizations).
    6.	Internal or external link with link picker.
    7.	Rel attribute for links (Alternate, Author, Bookmark, External, Help, License, Next, Nofollow, Noreferrer, Noopener, Prev, Search, Tag)

= Bootstrap 3 Configuration Options: =
    1.	Button Style (Default, Primary, Success, Information, Warning, Danger, Link).
    2.	Button Size (Default, Large, Small, Extra Small).

= Bootstrap 4 Configuration Options: =
    1.	Button Style (Primary, Secondary, Success, Danger, Warning, Info, Light, Dark, Link).
    2. 	Button without background color
    3.	Button Size (Default, Large, Small).

Points from 1 to 6 in **General Configuration Options** and Points from 1 to 3 in **Bootstrap 3** or **4 Configuration Options** can be configured with default values and you can choose whether or not to display these options on the page or post, where this custom field was added.

For more information on points from 2 to 4 in General Configuration Options and for **Bootstrap 3** or **4 Configuration Options** refer to the Bootstrap documentation 3.3.7[https://getbootstrap.com/docs/3.3/css/#buttons] or Bootstrap 4.1[https://getbootstrap.com/docs/4.1/components/buttons/].

= How to use it =
  The plugin does not include the Bootstrap 3 css in the theme in order to be able to display it correctly, it is necessary to insert the Bootstrap 3 css in the theme, following the guidelines of Wordpress: Including CSS & JavaScript.

  To view the button in the front end, a function has been implemented, which will facilitate the operation. This function will only read the values of the button and return the correct HTML.

`//With echo
 acf_bbutton_render(get_field('my-bbutton'));

 //Without echo. Returns only the button's string
 acf_bbutton_render(get_field('my-bbutton'), false);`

= Compatibility =

This ACF field type is compatible with:
* ACF 4
* ACF 5
* Bootstrap 3.3.7
* Bootstrap 4.+

== Installation ==

1. Copy the `acf-bootstrap-button` folder into your `wp-content/plugins` folder
2. Activate the Advanced Custom Fields: Bootstrap Button plugin via the plugins admin page
3. Create a new field via ACF and select the Button type
4. Please refer to the plugin description for more info regarding the field type settings

== Screenshots ==
1. Configuration Options Bootstrap 3
2. Configuration Options Bootstrap 4
3. Example settings in the post with Bootstrap 3
4. Example settings in the post with Bootstrap 4
5. Link Picker
6. Example with a tag other than "a"

== Changelog ==
= 1.1.0 =
* Added only for the tag "a" the attribute rel
* Added block level buttons
* Added compatibility to bootstrap 4
* Added option for outline button of bootstrap 4
* Minor Bug Fix

= 1.0.7 =
* Bug Fix ACF directives

= 1.0.6 =
* Bug Fix

= 1.0.5 =
* Added ACF 5 compatibility
* Code alignment with ACF directives

= 1.0.4 =
* Added Tag reset

= 1.0.3 =
* Fix bug language

= 1.0.2 =
* Changed some variable names to make them more similar to Bootstrap values
* Added language basic file,  for any translations

= 1.0.1 =
* Fix Bug Insert Link.
* Various Fix.
* Added the text of the button in "Allow Advanced Options".
* When setting a Tag other than "a", the link settings are hidden.
* Added function for creating the button in the front end.

= 1.0.0 =
* Initial Release.

== Upgrade Notice ==
= 1.1.0 =
* Added only for the tag "a" the attribute rel
* Added block level buttons
* Added compatibility to bootstrap 4
* Added option for outline button of bootstrap 4
* Minor Bug Fix

= 1.0.7 =
* Bug Fix ACF directives

= 1.0.6 =
* Bug Fix

= 1.0.5 =
* Added ACF 5 compatibility
* Code alignment with ACF directives

= 1.0.4 =
* Added Tag reset

= 1.0.3 =
* Fix bug language

= 1.0.2 =
* Changed some variable names to make them more similar to Bootstrap values
* Added language basic file,  for any translations

= 1.0.1 =
* Fix Bug Insert Link.
* Various Fix.
* Added the text of the button in "Allow Advanced Options".
* When setting a Tag other than "a", the link settings are hidden.
* Added function for creating the button in the front end.

= 1.0.0 =
* Initial Release.