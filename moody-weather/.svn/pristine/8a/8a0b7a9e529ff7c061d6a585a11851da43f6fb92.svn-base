=== Moody Weather ===
Contributors: devifypro
Tags: weather, mood, forecast, openweathermap
Requires at least: 5.7
Tested up to: 6.7
Stable tag: 1.4.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Displays a mood and icon based on the current weather conditions using data from OpenWeatherMap.

== Description ==

Moody Weather is a plugin that displays the current weather conditions, including temperature and a mood-based description, for a specified city. It uses the OpenWeatherMap API to fetch weather data.

== Third-Party Services ==

This plugin relies on the following third-party/external services:

### OpenWeatherMap API

- **What is it?**  
  OpenWeatherMap is a weather data provider that offers real-time and forecast weather information via an API.

- **What is it used for?**  
  The plugin uses the OpenWeatherMap API to fetch current weather data (e.g., temperature, weather conditions) for the specified city.

- **What data is sent and when?**  
  When the plugin is used, it sends the following data to OpenWeatherMap:
  - The city name (provided by the user or set as the default city in the plugin settings).
  - The OpenWeatherMap API key (provided by the user in the plugin settings).

  This data is sent only when the plugin needs to fetch weather information (e.g., when a shortcode is displayed on a page or when the weather data cache expires).

- **Links to OpenWeatherMap's policies:**
  - [OpenWeatherMap Terms of Service](https://openweather.co.uk/storage/app/media/Terms/Openweather_standard_terms_and_conditions.pdf)
  - [OpenWeatherMap Privacy Policy](https://openweather.co.uk/privacy-policy)

### Spectrum Color Picker

- **What is it?**  
  Spectrum is a JavaScript color picker library that allows users to select colors in a user-friendly way.

- **What is it used for?**  
  The plugin uses Spectrum to provide a color picker interface in the plugin's settings page, allowing users to customize the background color, text color, accent color, and icon color.

- **What data is sent and when?**  
  Spectrum is a client-side library and does not send any data to external servers. It is used solely for color selection within the plugin's settings page.

- **Links to Spectrum's policies:**
  - [Spectrum GitHub Repository](https://github.com/bgrins/spectrum)
  - [Spectrum License (MIT)](https://github.com/bgrins/spectrum/blob/master/LICENSE)

== Installation ==

1. Upload the `moody-weather` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the plugin's settings page (Settings > Moody Weather) and enter your OpenWeatherMap API key.
4. Use the `[moody_weather]` shortcode to display the weather on any page or post.

== Frequently Asked Questions ==

= Where do I get an OpenWeatherMap API key? =

You can sign up for a free API key at [OpenWeatherMap](https://openweathermap.org/api). Once you have your API key, enter it in the plugin's settings page.

= What data is sent to OpenWeatherMap? =

The plugin sends the city name and your OpenWeatherMap API key to fetch weather data. No other data is shared.

= Does this plugin use any third-party libraries? =

Yes, this plugin uses the following third-party libraries:
- **OpenWeatherMap API**: For fetching weather data.
- **Spectrum Color Picker**: For providing a color picker interface in the plugin's settings page.

== Changelog ==

= 1.3.0 =
* Initial release.

== Upgrade Notice ==

= 1.4.0 =
Removed direct access to file.