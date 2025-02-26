=== Foxlis Geo ===
Contributors: foxlis
Donate link: https://foxlis.com/geo/prices
Tags: geo, location, ip-location, foxlis, city, country, continent, developing, redirect
Requires at least: 5.6
Tested up to: 5.7
Stable tag: 2.8.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Free! Get visitor's geo-location by ip-address. Redirect visitor by his city or country with smart options.

== Description ==

This free plug-in allows you to get your website visitor's geo-location by an ip-address.
If you need to redirect your visitor based on his city or country you can do that by using simple interface.
Also you can ask is visitor's city or country like detected and forward him to specific page or add query params.

Advantages:

* Multi-language result
  * English
  * Chinese
  * French
  * Russian
  * German
  * Spanish
  * Japanese
  * Portuguese
* High speed getting location (~20 ms)
* Redirect by PHP or JavaScript
* Save geo-location results to visitor session
* Simple code usage
* Developer mode with fake ip-address
* Bots filter
* JSON API for independent developing

* Unlimited redirect settings
  * Option: Ask a question for redirect
  * Option: Redirect only one time per session
  * Option: Redirect always

Simple backend usage:

* Get city `<?php foxlis_geo()->getCity(); ?>`
* Get country `<?php foxlis_geo()->getCountry(); ?>`
* Get continent `<?php foxlis_geo()->getContinent(); ?>`
* Get subdivisions `<?php foxlis_geo()->getSubdivisions(); ?>`
* Get accuracy radius `<?php $locationEntity = foxlis_geo()->getLocation(); $accuracyRadius = $locationEntity->getAccuracyRadius(); ?>`
* Get latitude `<?php $locationEntity = foxlis_geo()->getLocation(); $latitude = $locationEntity->getLatitude(); ?>`
* Get longitude `<?php $locationEntity = foxlis_geo()->getLocation(); $longitude = $locationEntity->getLongitude(); ?>`
* Get time zone `<?php $locationEntity = foxlis_geo()->getLocation(); $timeZone = $locationEntity->getTimeZone(); ?>`

Get visitor location by JSON API using URL-path: `/wp-json/foxlis-geo/v1/data/`

Redirect By Geo Location Video Tutorial:

[youtube https://youtu.be/_NuST3qwwBY]

== Screenshots ==

1. Settings
2. Redirect
3. Development
4. About
5. Aks a question for redirect
6. Set question for redirect in options
7. Filter API requests

== Changelog ==

= 2.8.0 =
* Improve JS, fix js script scope

= 2.7.6 =
* Redirect engine warning notice

= 2.7.5 =
* Drop redirect js file cache

= 2.7.4 =
* Fix bug with empty redirect options

= 2.7.3 =
* Fix bug with empty ignore agents list and empty ignore ips list

= 2.7.2 =
* Verify SSL

= 2.7.1 =
* Fix bug when link was displayed at the plugins menu

= 2.7.0 =
* Add settings link to the plugins menu

= 2.6.1 =
* Fix redirect options link

= 2.6.0 =
* Add filter options, remove deactivation hook

= 2.5.0 =
* Improve https requests and api requests with account key

= 2.4.5 =
* Fix api permission notice

= 2.4.4 =
* Fix include_once warning on bootstrap

= 2.4.3 =
* More flexible css for external changes

= 2.4.2 =
* Add language option description

= 2.4.1 =
* Fix bug for once redirect in frontend

= 2.4.0 =
* Add frontend redirect engine
* Add api
* Bug fixes

= 2.3.0 =
* Add possibility to ask question for redirect
* Add maximum request time delay
* Bug fixes

= 2.2.2 =
* Code optimize, improve redirect stability

= 2.2.1 =
* Fix matching from slashes

= 2.2 =
* Fix bug with empty from condition

= 2.1 =
* Fix bug with from condition

= 2.0 =
* Refactoring redirect
* Add once redirect option
* Redirect speed improve

= 1.6 =
* Redirect once option

= 1.5 =
* Redirect value case insensitive

= 1.4 =
* Improve stability

= 1.3 =
* Add api requests cache and icon

= 1.2 =
* Fix when redirect prevent login

= 1.1 =
* Improve opportunities for redirects

= 1.0 =
* First stable version

== Credits ==
* This plug-in use Foxlis Geo API [Foxlis Geo API](https://foxlis.com/geo)