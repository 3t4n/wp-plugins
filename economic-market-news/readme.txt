=== Economic & Market News ===
Contributors: stockdio  
Tags: economic news, economy news, business news, country news, stock market news, stock news, financial news, stocks, market, news, ticker, quote, finance, quotes, stock, financial, index, indices, list, currencies, commodities, forex
License: See www.stockdio.com/wordpress for details
Requires at least: 3.1
Tested up to: 6.7.1
Stable tag: 1.0.17
Displays a list of economic and general stock markets news, available in more than 20 languages and covering over 40 countries.


== Description ==

Stockdio's Economic & Market News contains a plugin and a widget that provide the means to display a list of economic and general stock market news, natively available in over 20 different languages. It also allows to display economic and business news for some specific countries (more than 40 countries are currently available).

If you're using the standard Gutenberg editor, the easiest way to include this plugin on your page is using the Economic & Market News block, which is included in the Stockdio Financial Visualizations category of the block library.

If you're using a different editor o prefer to use the shortcode, below is a sample to help you start. Please be aware that most of the parameters listed below are optional, and are also available through the plugin's settings page. Any parameter you include in the shortcode will overwrite the parameter used in the settings page.

`[economic-market-news language="english" width="100%"]`

If you want to display economic and business news for a particular country, use the following shortcode as a reference. Please review the documentation below for additional options.

`[economic-market-news language="english" country="uk" width="100%"]`

If you're looking for news of a particular company or index in the stock market, please use the Stock Market News plugin instead, available at:

* [Stockdio Market News](https://wordpress.org/plugins/stock-market-news/)

This plugin is part of the Stockdio Financial Widgets, which also includes the following plugins:

* [Stockdio Historical Chart](https://wordpress.org/plugins/stockdio-historical-chart/)
* [Stock Market Overview](https://wordpress.org/plugins/stock-market-overview/)
* [Stock Quotes List](https://wordpress.org/plugins/stock-quotes-list/)
* [Stock Market Ticker](https://wordpress.org/plugins/stock-market-ticker/)
* [Stockdio Market News](https://wordpress.org/plugins/stock-market-news/)

The following parameters are supported in the shortcode and also available through the plugin's settings page:

**language**: Specifies the native language for the news (optional, default is English). For a list of available languages please visit www.stockdio.com/news_languages.

**country**: If country is specified (optional), business and economic news for the specific country will be displayed, using the language selected. You must be aware that some combinations of language and country will not return any news. For example, you can select language English or Spanish for the United States, but for United Kingdom only English news will be displayed. For a list of countries for which we currently provide news please visit www.stockdio.com/news_countries.

**countryUsage**: Determines how to use country news when a country is specified. The values supported are: Only, Combined and Mixed. Only: displays only news for the specified country. Combined: displays a combination of country and general market news, prioritizing country news at the top. Mixed: displays a mix of country and general market news, sorted chronologically (optional, default is Combined).

**maxCountryNews**: If a country is specified and Country Usage is set to Combined, which shows a combination of country and market news, you can control the maximum number of country news to display at the top of the list, before showing general market news.

**width**: Width of the list in either px or % (default: 100%).

**height**: Height of the list in pixels (default: none). If not specified, the list height will be calculated automatically.

**title**: Allows to specify a title for the list, e.g. News (optional).

**includeImage**: Allows to include/exclude the news image, if available. Use includeImage=false to hide the image (optional).

**imageWidth**: Specify the image width in pixels (if available). The image may be partially clipped and centered, depending on the original image dimensions and specified height, to maintain the image's aspect ratio (optional).

**imageHeight**: Specify the image height in pixels (if available). The image may be partially clipped and centered, depending on the original image dimensions and specified width, to maintain the image's aspect ratio (optional).

**includeDescription**: Allows to include/exclude the news description, if available. Use includeImage=false to hide the description (optional).

**maxDescriptionSize**: Allows to set the maximum number of characters to display in the description, if available. By default, an estimate of the number of characters to display is calculated based on the image height and display width, but this may not be totally accurate, and a manual setting might be required (optional).

**maxItems**: Allows to set the maximum number of news items to be displayed (optional, default: 10).

**motif**: Design used to display the visualization with specific aesthetics, including borders and styles, among other elements (optional). For a list of available motifs please visit www.stockdio.com/motifs.

**palette**: Includes a set of consistent colors used for the visualization (optional). For a list of available palettes please visit www.stockdio.com/palettes.

**font**: Allows to specify the font that will be used to render the chart. Multiple fonts may be specified separated by comma, e.g. Lato,Helvetica,Arial (optional).

**filterSources**: Allows to filter news from a list of sources, separated by colon (;). For example, setting the value to Seeking Alpha;Yahoo Finance will only display news that come from any of these sources.

**ignoreSources**: Allows to ignore news coming from a list of sources, separated by colon (;). For example, setting the value to Seeking Alpha;Yahoo Finance will ignore news that come from any of these sources.

**ignoreItems**: Allows to ignore news items that start or contain the text specified in a list, separated by colon (;). If the text in the list starts with *, the news item will be ignored if it contains the text anywhere inside its title; otherwise, the news item will be ignored if it starts with the specified text. For example, setting the value to canada;*share price, will ignore any news whose title starts with the word Canada or contains the phrase share price. It is not case sensitive.

**loadDataWhenVisible**: Allows to fetch the data and display the visualization only when it becomes visible on the page, in order to avoid using calls (requests) when they are not needed. This is particularly useful when the visualization is not visible on the page by default, but it becomes visible as result of a user interaction (e.g. clicking on an element, etc.). It is also useful when using the same visualization multiple times on a page for different devices (e.g. using one instance of the plugin for mobile and another one for desktop). We recommend not using this by default but only on scenarios as those described above, as it may provide the end user with a small delay to display the visualization (optional).

== Installation ==

1. Upload the `StockdioPlugin` folder to your `/wp-content/plugins/` directory.

2. Activate the "Economic & Market News" plugin in your WordPress administration interface.

3. If you want to change the preset defaults, go to the Economic & Market News settings page.

4. If you're using the standard Gutenberg editor, add an Economic & Market News block from the Stockdio Financial Visualizations category and configure the news using the settings sidebar.

5. If you prefer to use the shortcode, insert the `[economic-market-news]` shortcode into your post content, customizing it with the appropriate parameters. You also have the option to use the Economic & Market News widget included when you install the plugin.

6. For ease of use, a Stockdio icon is available in the toolbar of the HTML editor for certain versions of WordPress (see screenshots for details).

== Frequently Asked Questions ==

= How do I integrate the Economic & Market News in my page? =

There are three options to integrate it: a. Using the Economic & Market News block, b. Using the short code, or c. Through the use of the widget in your sidebars.

= How do I know if the language I need is supported by Stockdio? =

Stockdio natively supports economic & market news in over 20 different languages. For a list of all languages currently supported in news, please visit [www.stockdio.com/news_languages](http://www.stockdio.com/news_languages). If the language you're looking for is not in the list, please contact us to info@stockdio.com. Once you have found in the list the language you need, you must pass the corresponding language name or code using the language parameter.

= Can I display economic and business news specific to my country? =

Yes, this plugin allows you to specify a country, which will be used to display economic and business specific to the country in the language you have selected (if available). Stockdio currently supports economic & business news for over 40 different countries. For a list of all countries currently supported in news, please visit [www.stockdio.com/news_countries](http://www.stockdio.com/news_countries). If the country you're looking for is not in the list, please contact us to info@stockdio.com. Once you have found in the list the country you need, you must pass the corresponding country name or code using the country parameter.

= Can I combine economic and business news specific to my country with general markets news? =

Yes, you can decide whether to display only the country news or combine it with general market news. See the documentation for details.

= Can I display news for a specific company or market index? =

Yes, but you will need a different plugin for that purpose. Please use the Stock Market News plugin available at [https://wordpress.org/plugins/stock-market-news/](https://wordpress.org/plugins/stock-market-news/).

= Can I specify my own colors for the news? =

Yes, this plugin is provided with a number of predefined color palettes, for ease of use. For a complete list of color palettes currently supported by Stockdio, please visit [www.stockdio.com/palettes](http://www.stockdio.com/palettes). However, if you need specific color customization, you can use the Company & Stock News block, or you can use the Stockdio iframe available at [http://services.stockdio.com](http://services.stockdio.com), which supports more options.

= Can I place more than one news plugin on the same page? =

Yes. By default, all news will use the values specified in the plugin settings page. However, any of these values can be overridden using the appropriate shortcode parameter. Each shortcode can be customized entirely independent.

= How can I contact Stockdio if something is not working as expected? =

Simply send an email to info@stockdio.com with your question and we will reply as soon as possible.

== Screenshots ==

1. Example of economic & market news with images and description, in English.

2. Example of economic & market news without images, in French.

3. Example of economic & market news without images or description, in Spanish.

4. Example of economic & market news with small images, in Italian.

5. Example of economic & market news with large images, in German.

6. Example of economic & market news with images and description, in Portuguese.

7. Stockdio Historical Chart is also available as a complement to the Economic & Market News.

8. Stockdio Stock Quotes List is also available as a complement to the Economic & Market News.

9. Stockdio Stock Market Overview is also available as a complement to the Economic & Market News.

10. Stockdio Stock Market Ticker List is also available as a complement to the Economic & Market News.

11. Stockdio Stock Market News is also available as a complement to the Economic & Market News.

12. Settings page.

13. Economic & Market News widget dialog.

14. Economic & Market News block as part of the Stockdio Financial Visualizations category.

15. Economic & Market News block sidebar settings.

== Changelog ==
= 1.10.17 =
Release date: Jan 29, 2025

* Fixes vulnerability issue.

= 1.10.16 =
Release date: November 18, 2024

* Compatibility with WordPress 6.7

= 1.10.15 =
Release date: July 18, 2024

* Fixes issue with block editor.

= 1.10.14 =
Release date: May 29, 2024

* Fixes stock search issues.

= 1.10.13 =
Release date: May 09, 2024

* Fixes issue with Stock Exchange in Settings page.

= 1.10.12 =
Release date: March 07, 2024

* Fixes vulnerability issue.

= 1.10.11 =
Release date: March 05, 2024

* Fixes vulnerability issue.

= 1.0.10 =
Release date: November 01, 2023

* Fixes vulnerability issue.

= 1.0.9 =
Release date: March 30, 2023

* Minor bug fixes.

= 1.0.7 =
Release date: May 24, 2022

* Minor bug fixes.

= 1.0.6 =
Release date: May 03, 2021

* Minor bug fixes.

= 1.0.5 =
Release date: May 03, 2021

* Minor bug fixes.

= 1.0.4 =
Release date: January 27, 2021

* Minor bug fixes to properly support compatibility with legacy versions of WordPress.

= 1.0.3 =
Release date: January 24, 2021

* Minor block bug fixes and enhancements.

= 1.0.2 =
Release date: January 19, 2021

* Minor block bug fixes and enhancements.

= 1.0.1 =
Release date: October 05, 2020

* Minor block bug fixes and enhancements.

= 1.0 =
* Initial version.

== Upgrade Notice ==
