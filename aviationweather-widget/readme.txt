=== aviationweather-widget ===
Contributors: alessiobravi
Author URL: http://blog.bravi.org/
Plugin URL: http://wordpress.org/extend/plugins/aviationweather-widget/
Donate link: http://blog.bravi.org/
Tags: Widget, METAR, TAF, Aviation, Aviation Weather, Weather, ICAO Code
Requires at least: 3.4
Tested up to: 3.5
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A simple widget to display current METAR and TAF for the chosen ICAO Station.


== Description ==

aviationweather-widget will display in the site the RAW METAR and TAF weather bulletin for the ICAO station selected in the widget administration panel.
The METAR and TAF data used is provided by AviationWeather.org


== Installation ==

1. Unzip aviationweather-widget.zip
2. Upload the `aviationweather-widget` folder into the `/wp-content/plugins/` directory on server
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Place the aviationweather-widget in the wordpress widget admin interface
5. Enter an ICAO code for the respective location (Ex. LIRZ for Perugia, Italy)

It is also possible to install the plugin via WordPress Plugin Repository by searching 'aviationweather-widget' as plugin name. (From "Admin Panel" -> "Plugins" -> "Add New")

This plugin is provided "AS-IS" without warranty of any kind, expressed or implied.
We shall not be liable for any damages, including but not limited to, direct, indirect, special, incidental or consequential damages or losses that occur out of the use or inability to use ithis plugin.


== Frequently Asked Questions ==

= What is an ICAO Identifier ? =
ICAO codes are used by air traffic control and airline operations such as flight planning.
They differ from IATA codes, which are generally used for airline timetables, reservations, and baggage tags.
For example, the IATA code for London's Heathrow Airport is LHR and its ICAO code is EGLL.
Most travelers usually see the IATA code on baggage tags and tickets and the ICAO code on flight-tracking services such as FlightAware.
In general IATA codes are usually derived from the name of the airport or the city it serves, while ICAO codes are distributed by region and country.
ICAO codes are also used to identify other aviation facilities such as weather stations, International Flight Service Stations or Area Control Centers, whether or not they are located at airports.

= What is METAR ? =
METAR is a format for reporting weather information.
A METAR weather report is predominantly used by pilots in fulfillment of a part of a pre-flight weather briefing, and by meteorologists, who use aggregated METAR information to assist in weather forecasting.
RAW METAR is the most popular format in the world for the transmission of weather data.
It is highly standardized through International Civil Aviation Organization (ICAO), which allows it to be understood throughout most of the world.

= What is TAF ? =
In meteorology and aviation, TAF is a format for reporting weather forecast information, particularly as it relates to aviation. "TAF" is an acronym of terminal aerodrome forecast or, in some countries, terminal area forecast.
TAFs apply to approximately five statute miles (about 4.3 nautical mails or 8km) radius from the center of the airport runway complex.
Generally, TAFs apply to a 24-hour period; and, as of November 5, 2008, TAFs for many major airports cover 30-hour periods.
The date/time group reflects the new 24 or 30 hour period in Coordinated Universal Time (UTC), as always.



== Screenshots ==
1. ScreenShot of placed aviationweather-widget on a WordPress powered WebSite. (Widget Output.jpg)
2. ScreenShot of the admin configuration panel. (Admin Panel.jpg)



== Changelog ==

= 0.01 - 12122012 =
Initial version.

= 0.02 - 12132012 =
Fix: Format of different METARs and TAFs (initial string recognition and handling).

= 0.10 - 12132012 =
Fix: Capitalised and Truncated ICAO Identifier to 4 Characters.

= 0.11 - 12132012 =
Added Feature: Separation of 'FM' 'BECMG' and 'TEMPO' tags with an HTML Break.

= 1.0 - 12132012 =
Added Feature: Custom Title on Widget Admin page.
Added Feature: CSS div identification for every bulletin (class="aviationweather-widget" id="[widget_id]-bulletin").
Change: "__construct" data.
Fix: Source Code Design and indentation.

= 1.1 - 12142012 =
Added Feature: Option to print link to AviationWeather.org RAW Bulletin in Widget Title.



== Upgrade Notice ==

1.1 - Added option to print link to AviationWeather.org RAW Bulletin in Widget Title.

