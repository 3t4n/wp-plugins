=== IGDB Game Releases Widget ===
Contributors: Eddie Stubbington, entertainment-group, zykros
Donate link: https://monzo.me/eddiestubbington
Tags: gaming,releases,igdb,games,calendar,game,upcoming,future,video games,ps4,xbox,xbox one,pc,linux,playstation
Requires at least: 3.0.1
Tested up to: 5.6.1
Stable tag: 5.5.1
Requires PHP: 5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A widget for IGDB to display game lists. To use the widget you need an API Key from the API.IGDB.com website. 

== Description ==

This plugin is used to display a list of game releases. It uses the IGDB.com API and has a variety of options to customize the way the list is displayed. The plugins aim is to remove the manual effort that most gaming media websites have when displaying upcoming releases based on the genre, franchise, game mode, game engine, publisher and lots more. 

== UPCOMING ==
Currently no releases are planned (The project is no longer maintained by Eddie, but is open source for those that wish to contribute)

== Known Issues ==
Franchise results only contain a limited selection of options (https://gitlab.com/edstub207/IGDB-Modern/issues/38)
Incorrect dates are displayed for game re-releases on other platforms (https://gitlab.com/edstub207/IGDB-Modern/-/issues/58)
Plugin doesn't work with the V4 API - Therefore, functionality will stop working on the 26th October 2020 (https://gitlab.com/edstub207/IGDB-Modern/-/issues/61)

== LATEST NEWS ==
We've squished quite a few bugs with this release, optimised the number of requests made and added a few cheeky new platforms! Read the patch notes for all the gossip. 

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Appearance > Customise > Widgets area to find and customise the plugin 
4. Go to API.igbd.com
5. Sign in/create an account
6. Select the Key 
7. Copy the API key
8. Paste API key into the API Field (On the widget settings area)
9. Save
10. Your setup and ready to go

== Frequently Asked Questions ==

= Why is this plugin no longer working/not being updated? =

Sadly in Sept 2020, IGDB announced major changes to the IGDB API as a part of the move to Twitch. The work required to move the plugin over and properly support the new API was substantial to keep the plugin working in a similar way as it has done previously.
Therefore, official support was dropped a day before the IGDB V4 API rolled out (25th October 2020), the code is open source on Gitlab, if the community decide to contribute further. 

= Why have loads of platforms gone missing/no longer work? =

If your seeing a large selection of platforms you need to install this plugin - https://wordpress.org/plugins/transients-manager/
Go to tools 
Select transients
And delete ts_platforms_list 

With the move to 3.0.2 we wanted to start to improve the visuals of the plugin, the change to icons meant we could no longer support older platforms. If you really need a specific platform get in touch and we can add it. Currently we support:
Oculus VR
PSVR
SteamVR
Linux
PC
Xbox One
Mac 
PS4
Android
IOS
Switch

With 3.0.3 we added support for the following platforms:
Google Stadia 
PlayStation 5 (Listed as PS5)
Xbox Series X (Listed as XSX)

= Is the API Free? =

Yes, but you need to register on the API.IGDB.com website. If you had a paid API Account before you should have been contacted about the recent merge of tiers. More info can be found here - https://api.igdb.com/

= Why are franchises missing? =

This is caused by a limitation we have on the API requests (So you don't go over the limits) we want to fix this at some point - By introducing a new filter similar to the way platforms work, or a cache.

= Why are publishers or studios missing/no longer working? =

If you are seeing a large selection of publishers/studios you need to install this plugin - https://wordpress.org/plugins/transients-manager/
Go to tools 
Select transients
And delete ts_companies_list

With the move to 3.0.3 we wanted to start optimising the number of requests we make. This meant we had to reduce the number of publishers/studios we display as filters on the backend. The studios & publishers we currently have selectable are:
CD Projekt Red
Activision Blizzard
Warner Bros Interactive Entertainment
Private Division
Xbox Game Studios (Titles prior to 2019)
Electronic Arts
Activision
Rockstar Games
Bandi Namco
Square Enix
2K Games
Microsoft Studios (Titles post 2019)
Ubisoft
Take Two Interactive
Nintendo
Capcom 
Sony Interactive Entertainment

If you want a Publisher/Studio added, please reach out to @edstub207 on Twitter.

= Why are game engines missing from selection? =

Similar case to the problem with publishers/studios missing, we wanted to reduce the number of requests we make. Therefore, we have hand picked Game Engines we see in regular use today. If you want an engine added please reach out and we can add them in a future update. Best to contact @edstub207 on Twitter.

= How regular will updates be? =

Updates to the plugin will be as frequent as possible. We intend on always adding new features and fixing bugs.

= Why are images missing? =

Typically, this is caused by the IGDB Database not having any images suitable for the plugin. If you see no images at all though please do contact us.

= I have found a bug =

Damn! Sorry about that. If you have a bug report it on https://gitlab.com/edstub207/IGDB-Modern/issues, we might already know about it :) 

If you don't have access get in contact with @edstub207 on Twitter.

= I want to help =

Awesome! Feel free to submit changes on the gitlab listed above :) 

If you don't have access get in contact with @edstub207 on Twitter.

= Why is the limit 50 games at once displayed =

We have recently increased this to 50 (Still 10 by standard). However, be warned this can result in a high number of requests, so could increase API requests. If you require more we can up the limit higher by request. However, we feel 50 is the max amount anyone would want to display.

= I want XYZ to be an option with the plugin =

We don't run IGDB as a website! So we are slightly limited in what we can do in terms of API Calls etc. However, we can send feedback to the IGDB Team if needed. We can add features to the plugin if we have the API call.

== Screenshots ==

1. A visual of the backend controls of the plugin. 
2. A visual of the widget setup to display releases with some options enabled

== Changelog ==
==3.1.1==
Updated readme with important notices about plugin no longer working. 

==3.1.0==
Added support for newer version of Font-Awesome
Added new "Game Modes" Feature, so you can filter based on that. 
A couple of low risk security fixes
A couple of backend upgrades
Abreviated Xbox Series X as XSX (To cleanup the UI)
Added filter based on the game engine

==3.0.7==
Cleared up version numbering system for future releases
Officially supported Wordpress 5.5.1
Made a major security fix, it is recommended you regen your API keys. 

==3.0.6==
Updated Project Scarlett to Xbox Series X 

==3.0.5==
A few minor behind the scenes upgrades 🙂
Added +60 and +90 day options as they are common filters
Updated branding for IGDB

==3.0.4==
Resolved exception causing the plugin failing to load results

==3.0.3==
Tested up until 5.3.1 release of WordPress
Fixed an issue where removing the default colour was set as red in some cases
Reduced the number of requests made for the genres filter
Improved error messages - More work needs to be done in this area
Resolved an issue where dates are wrong if filtered by multiple options at once
Resolved an issue where titles are displayed multiple times ifa filtered by options at once
Cleaned up the README.MD 
Re-enabled the Genres feature - They aren't displayed but can be used as a filter
Reduced the number of publishers/companies that are listed to optimise the number of requests made 
Added support for Stadia, PS5 and Xbox Project Scarlett 

==3.0.2==
Changed from Unirest to guzzle for HTTP Queries.
Changed from URL based requests to Body requests.
Changed platform names from being text based to icons and abreviations if icons aren't avaliable.
Filtered the list of platforms that can be selected to the 11 most common platforms. 
Removed the hide cover option whie still in a broken state
Reverted the hide rating option to a previous version while in a broken state
Improved the default colour scheme - Minor issues are still present around this area
Resolved multiple other minor & critical issues

== Upgrade Notice ==
With version 3.0.7 we made a large security fix, please ensure you update to the latest client and regen API Keys ASAP. 
