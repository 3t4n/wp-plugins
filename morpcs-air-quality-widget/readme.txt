=== MORPC's Air Quality Widget  ===
Contributors: morpc,clratliff
Tags: air quality,aqi,morpc,airnow
Requires at least: 3.0.1
Tested up to: 5.9
Requires PHP: 5.6
Stable tag: trunk
License: MIT
License URI: https://opensource.org/licenses/MIT

Based on a zip code for a reporting area, MORPC the Air Quality Widget displays the current air quality.

== Description ==
Based on a zip code for a reporting area, the Air Quality Widget displays the current air quality. The forecast is available if configured to be displayed. This widget is provided by the Mid-Ohio Regional Planning Commission (MORPC) & the U.S. EPA AirNow program.

MORPC is an association of cities, villages, townships, counties and regional organizations serving Central Ohio. We take pride in bringing communities of all sizes and interests together to collaborate on best practices and plan for the future of our growing region. We do this through a variety of programs, services, projects and initiatives – all with the goal of improving the lives of our residents and making Central Ohio stand out on the world stage.

The U.S. EPA AirNow program protects public health by providing forecast and real-time observed air quality information across the United States, Canada, and Mexico. AirNow receives real-time air quality observations from over 2,000 monitoring stations and collects forecasts for more than 300 cities.

== Installation ==
1. Install the plugin through the WordPress 'Plugins' menu OR upload and unzip to wp-content/plugins.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Access the Air Quality Widget settings by clicking the Air Quality menu item in your main administration menu.
4. View the plugin's setting page for more information and to configure the widget.

== You Should Know ==
* AirNow limits 500 api calls per key, per hour. To help mitigate this limitation, the first time a user accesses a page where the widget is present, the data is stored locally on the user's machine and is reused each time the page is accessed until an hour has passed. After an hour, the data is refreshed.
* Limited support will be provided through the plugin's forum. Because every environment is different and you don't want to give access to your system to complete strangers, MORPC is unable to provide installation support.
* Your feedback is appreciated. Please let us know if you have any suggestions for improvements.

== Frequently Asked Questions ==
= I keep seeing *AQI Unavailable. Try refreshing.*. I try refreshing but nothing changes! What can I do? =
This message is received if there is an issue contacting AirNow through the proxy service. Try once more after 15 minutes. If the problem persists, post your issue on the plugin's forum.

== Changelog ==
= 1.2.0 =
* Removed custom Heroku CORS proxy services due to reaching monthly limits for the free tier.
* Added cors.bridged.cc as the CORS proxy service, which allows a generous 10k requests per hour. This should be sufficient for the time being.

= 1.1.0 =
* Added functionality to randomly use one of three default proxy services instead of through admin configuration.
* Removed configuration of the CORS proxy service from admin.
* Removed CORS proxy information from the readme and the plugin admin page.
* Made a few cosmetic changes.

= 1.0.2 =
* Updated list of available CORS proxies.

= 1.0.1 =
* Modified the forecast output to display the highest given AQI for a day in the event that multiple designations for the same date is given.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==
= 1.1.0 =
* This upgrade removes configuration of the CORS proxy service from admin and now internally uses proxy services provided by MORC/Gohio

= 1.0.2 =
* This update modifies the list of available CORS proxies. cors.io is no longer in service.

= 1.0.1 =
* Modified the forecast output to display the highest given AQI for a day in the event that multiple designations for the same date is given.

= 1.0.0 =
* Initial release.
