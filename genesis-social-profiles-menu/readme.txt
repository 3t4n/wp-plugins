=== Genesis Social Profiles Menu ===
Contributors: daveshine, deckerweb
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, social media, social networking, social profiles, social, icons, twitter, facebook, google plus, deckerweb
Requires at least: 3.2
Tested up to: 3.4.1
Stable tag: 1.2

This plugin adds a stylesheet for social profile icons for the WordPress custom menu - recommended for the use with Genesis Framework child themes.

== Description ==
This small and leightweight plugin is intended for the use with the popular Genesis Framework. It adds a special stylesheet for social profile icons for the WordPress custom menu system. The menu system is connected with the (Genesis) menu locations and also with widget areas because WordPress comes with a built-in custom menu widget. This way you can assign social profiles to a lot of locations on your site and easily add your own links, change sorting, change size, tooltips and opening in a new window/tab. So you have a lot of advantages over lots of other social profiles widget plugins around... As soon as you're figured out to add the CSS classes it's really easy, fast and flexible :-). For most use cases and regular Genesis Child Themes this should work really fine. Additional CSS styling/adjusting via child theme is possible of course :).

Please note: The plugin requires the Genesis Theme Framework

= Icon Sizes & Networks/Services for Paul Robert Lloyd Icon Set (PRL) =
* 3 Sizes included: 16px / 24px / 32px
* 12 Networks/Services included: Email / RSS Feed / Facebook / Twitter / Google Plus / Flickr / Pinterest / Slideshare / YouTube / LinkedIn / Xing / GitHub

= Icon Sizes & Networks/Services for StudioPress Icon Set (SP) =
* 3 Sizes included: 24px / 32px / 48px
* 6 Networks/Services included: RSS Feed / Facebook / Twitter / Google Plus / Pinterest / LinkedIn

= Possible Locations / Areas for the Icons - For Both Icon Sets! =
* Main Navigation - Primary Nav
* Subnavigation - Secondary Nav
* Header Right
* Sidebar (Primary)
* Sidebar Alt (Secondary)
* Footer Widgets

= Localization =
* English (default) - always included
* German - always included
* Italian - user-submitted, thanks to [Marco Rosselli](http://www.prenotazionetraghetti.com/)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

= Paul Robert Lloyd (PRL) Icons License =
Licensed under an Attribution-Share Alike 2.0 UK: England & Wales License. We claim no right of ownership to the company logos used in these icons. Provision of these icons does not reflect endorsement of individual services. // To view a copy of this license, visit: http://creativecommons.org/licenses/by-sa/2.0/uk/ // Icon set by Paul Robert Lloyd, http://paulrobertlloyd.com/2009/06/social_media_icons/

= StudioPress (SP) Icons License =
Licensed under the GNU General Public License v2.0. If you alter, transform, or build upon this work, you may distribute the resulting work only under the same or similar license to this one. (We believe in Karma. If you use any of these graphics for your own projects, a linkback to us will go a long way.) // To view a copy of this license, visit: http://www.opensource.org/licenses/gpl-license.php // Icon set by StudioPress, http://www.studiopress.com/graphics/social-media-icons

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= More =
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/users/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)

== Installation ==
1. Upload `genesis-social-profiles-menu` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set up a custom menu in WordPress: Appearance > Menu -- or: edit/enhance an existing menu -- just add custom links to your desired services
4. Add the proper CSS classes to these custom links (before this: activate the check boxes for "Custom Links", "Link Target" and "CSS Classes" via the"Screen Options" tab in right top corner below toolbar! [direct link to large view screenshot...](http://s.wordpress.org/extend/plugins/genesis-social-profiles-menu/screenshot-1.png))
5. Save menu to the desired menu location or use the WordPress widget for custom menu to place your profiles in any menu location or widget area

= Scheme for the CSS Classes =
It always goes like this: (service)-(iconset)-(size)

** 1st Example: `twitter-prl-s16` **

* you could also add the suffix "-s24" for 24px size or "-s32" for 32px size
* change `twitter` to one of the 12 included services for this icon set
* "prl" stands for the used icon set - at the moment, there's only two sets, maybe more sets following in the future...

** 2nd Example: `pinterest-sp-s32 gspm-sp` **

* you could also add the suffix "-s24" for 24px size or "-s48" for 48px size
* change `pinterest` to one of the 6 included services for this icon set
* `gspm-sp` is the additional helper class to help you style the background colors, hover effects and rounded corners etc. via your child theme
* *note:* this helper class is required for using in the sidebars and footer widgets, otherwise your icons/styles will "crash"...
* "sp" stands for the used icon set - at the moment, there's only two sets, maybe more sets following in the future...

= Available CSS Classes for PRL Icon Set =
* Email: email-prl-s16 / email-prl-s24 / email-prl-s32
* Feed: feed-prl-s16 / feed-prl-s24 / feed-prl-s32
* Twitter: twitter-prl-s16 / twitter-prl-s24 / twitter-prl-s32
* Facebook: facebook-prl-s16 / facebook-prl-s24 / facebook-prl-s32
* Flickr: flickr-prl-s16 / flickr-prl-s24 / flickr-prl-s32
* Google Plus, black version: google-prl-s16 / google-prl-s24 / google-prl-s32
* Google Plus, red version: google2-prl-s16 / google2-prl-s24 / google2-prl-s32
* Pinterest: pinterest-prl-s16 / pinterest-prl-s24 / pinterest-prl-s32
* Slideshare: slideshare-prl-s16 / slideshare-prl-s24 / slideshare-prl-s32
* LinkedIn: linkedin-prl-s16 / linkedin-prl-s24 / linkedin-prl-s32
* Xing: xing-prl-s16 / xing-prl-s24 / xing-prl-s32
* YouTube: youtube-prl-s16 / youtube-prl-s24 / youtube-prl-s32
* GitHub: github-prl-s16 / github-prl-s24 / github-prl-s32

= Available CSS Classes for SP Icon Set =
* Feed: feed-sp-s24 / feed-sp-s32 / feed-sp-s48
* Facebook: facebook-sp-s24 / facebook-sp-s32 / facebook-sp-s48
* Google Plus: google-sp-s24 / google-sp-s32 / google-sp-s48
* LinkedIn: linkedin-sp-s24 / linkedin-sp-s32 / linkedin-sp-s48
* Pinterest: pinterest-sp-s24 / pinterest-sp-s32 / pinterest-sp-s38
* Twitter: twitter-sp-s24 / twitter-sp-s32 / twitter-sp-s48

*Please consider adding the SP helper class `gspm-sp` to the menu items:* this way you can style the background-color, the background hover color and also decide wheter to use rounded corners or any other style... -- all done via your child theme, you might add the following example code to your `style.css` of your child theme:
`
/* Genesis Social Profiles Menu Plugin: Custom Styles
------------------------------------------------------------ */

/* Background Color + Border Radius etc. */
.gspm-sp {
	background: #b22222 !important;
	border-radius: 25px;
	-moz-border-radius: 25px;
	-webkit-border-radius: 25px;
}

/* Hover Color/ Effects */
.gspm-sp:hover {
	background: #ed702b !important;
}
`
* This will display round icons with red background, with orange background on hover.
* Remember, you may have to add `!important` to some rules to see the custom changes...

= Helper CSS Classes to Add Some More Space :) =
There are also four helper classes included: `space-left` and `space-right` plus `space-top` and `space-bottom` -- when using social items as an addition in a regular menu you might want to add some more space to have a better looking menu. Just an example, your menu goes like this:

Home Blog About [Twitter Icon] [Facebook Icon]

-> You might add the space class to the [Twitter Icon] like so: `twitter-prl-s24 space-left` -- *please note:* no dots and no commas are used here, only the classes separated by one space!

Left & Right classes add 20px space each and Top & Bottom classes 7px each -- *please note:* these values could all be overwritten via your style.css of the child theme when you add `!important` to the css rule.

== Frequently Asked Questions ==
= How Do I Actually Add These Special CSS Classes and Where? =
Just go to the "Menus" settings page in WordPress, then click the "Sreen Options" tab in the top right corner (below the toolbar) and there just activate the check boxes for "Custom Links", "Link Target" and "CSS Classes". After that you have access to the appropriate fields/drop downs for each and every menu items you'll add or edit. (This is then for ALL menu items not only for the social ones you might add... :)
-> Just see the first sreenshot at the ["Screenshots"](http://wordpress.org/extend/plugins/genesis-social-profiles-menu/screenshots/) page here -- [direct link to large view screenshot...](http://s.wordpress.org/extend/plugins/genesis-social-profiles-menu/screenshot-1.png)

= Could I use this plugin also with another theme/framework? =
Good question but unfortunately this is no possible and not recommended. I've built in a theme check function so it's only useable with the Genesis Framework and its child themes. The reason for that is simple because the icons stylesheet references a lot of unique Genesis CSS IDs and classes so it will be nearly unuseable with other themes. However, you might have a look at the included stylesheet and maybe got inspired for your own stylesheet for your custom theme or even doing your own plugin with this...

== Screenshots ==
1. Activate the check boxes for "Link Target" and "CSS Classes" via the "Screen Options" tab on the "Menus" settings page in WordPress.
2. Contextual help tab open - section added to bottom of existing help area
3. Creating a new menu in WordPress
4. Adding CSS class to social profile menu item
5. The custom menu with PRL icons added to Secondary Menu location in Genesis (shown here with [free Autobahn child theme](http://genesisthemes.de/en/genesis-child-themes/autobahn/))
6. The custom menu with PRL icons added to Header Widget Right - as a custom menu widget - shown here with [free Autobahn child theme](http://genesisthemes.de/en/genesis-child-themes/autobahn/)
7. A custom menu with SP icons and using default plugin style added to Header Widget Right - as a custom menu widget - shown here with the "eleven40" theme (mouse hovering over "Google Plus" icon)
8. A custom menu with SP icons and using custom CSS styles added to Header Widget Right - as a custom menu widget - shown here with the "eleven40" theme (mouse hovering over "Pinterest" icon)

== Changelog ==

= 1.2 =
* Added new StudioPress Icon Set (SP), with 6 services and 3 sizes
* PRL Icon Set: Added new services: "Pinterest" and "Slideshare"
* PRL Icon Set: Added second version of existing service: "Google Plus" now with additional red style buttons
* PRL Icon Set: Fixed all GitHub styles
* PRL Icon Set: Slightly changed opacity value from 0.7 to 0.77 in default status (this could still be overwritten via child theme, see FAQ!)
* Improved: All images are now using css image sprites per button size - optimized loading!
* Minor code improvement: hooked loading call for textdomain into init hook for fullfilling standard
* Updated readme.txt file documentation
* Added new Italian translation by [Marco Rosselli](http://www.prenotazionetraghetti.com/)
* Updated German translations and also the .pot file for all translators!
* Added banner image on WordPress.org for better plugin branding :)

= 1.1 =
* Fixed possible enqueue issue with stylesheet: replaced deprecated hook with new standard.
* Added two more helper classes for more space if needed: `space-top` and `space-bottom` - by user request :)
* Updated readme.txt file documentation and screenshots.
* Updated German translations and also the .pot file for all translators!
* Tested & proved compatibility with WordPress 3.3 final release :-)

= 1.0 =
* Initial release

== Upgrade Notice ==
= 1.2 =
Major changes and improvements - Added new StudioPress Icon Set (SP). Added "Pinterest" and "Slideshare" services, added additional "Google Plus" (red) button to existing PRL Icon Set. Changed all button images to use CSS sprites for optimized loading. Minor code tweaks and improvements. Added Italian translation. Also updated documentation in readme.txt file, German translations and .pot file for translators.

= 1.1 =
Important change: improved compatibility with WordPress 3.3+. Added two new helper classes for more space on the top or bottom if needed. Also updated readme.txt file, screenshots, German translations and .pot file for translators.

= 1.0 =
Just released into the wild.

== Translations ==
* English - default, always included
* German: Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-social-profiles-menu)
* Italian: Italiano - user-submitted by [Marco Rosselli](http://www.prenotazionetraghetti.com/)

*Note:* All my plugins are localized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/).

== Icon Sizes: PRL Icon Set ==
* 16px
* 24px
* 32px

== Networks/Services: PRL Icon Set ==
* E-Mail (letter icon)
* RSS Feed (orange feed icon)
* Social: Facebook / Twitter / Google Plus / Flickr / YouTube
* Special interest: Pinterest / Slideshare
* Business networks: LinkedIn / Xing
* Developer/Coding: GitHub

== Icon Sizes: SP Icon Set ==
* 24px
* 32px
* 48px

== Networks/Services: SP Icon Set ==
* RSS Feed (feed icon)
* Social: Facebook / Twitter / Google Plus
* Special interest: Pinterest
* Business networks: LinkedIn

== Possible Locations / Areas for the Icons - For Both Icon Sets! ==
* Main Navigation - Primary Nav
* Subnavigation - Secondary Nav
* Header Right
* Sidebar (Primary)
* Sidebar Alt (Secondary)
* Footer Widgets

== Idea Behind / Philosophy ==
Really, nothing spectacular. At the moment, this plugin is really useable but more of an experiment. I really like other plugins like the popular "Social Profiles Widget" but wanted something a bit more flexible and with another approach. I've released this as a plugin for other users to check it out so I could improve it. It's also intended for users who are no "ccs-coders at heart", so just activate and use :).
