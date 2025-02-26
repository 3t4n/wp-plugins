=== Archive NBP ===
 
Contributors: Igvar
Tags: NBP, kursy walut, exchange rates, Narodowy Bank Polski, Archive, Currency
Donate link: https://wpdv.eu
Requires at least: 6.0
Tested up to: 6.7.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress plugin to display Bank of Poland currencies rates. Allow to view rates as Gutenberg blocks, shortcodes or REST API endpoints from the DB.
 
== Description ==
 
This plugin collect and allow to view historical currency rates from Bank of Poland by using custom Gutenberg Blocks, shortcodes and REST API. 
The plugin use Narodowy Bank Polski public API for collecting the rates.
Endpoint: https://api.nbp.pl/api/exchangerates/tables/a
Bank of Poland API description and terms of use: https://api.nbp.pl/en.html
After plugin installation your site will provide Bank of Poland historical data using your local database and directly from your domain as REST API service (see FAQ about endpoints).
 
== Installation ==
 
1. Upload the plugin folder to your /wp-content/plugins/ folder.
2. Go to the **Plugins** page and activate the plugin.
 
== Frequently Asked Questions ==
 
= Which API endpoints can I use after installation =
1. List of currencies rates for available needed date and date before it. 
Example: https://your-domain-name.com/wp-json/archive-nbp/v1/date-rates/YYYY-MM-DD/AAA,BBB
Where: YYYY - year; MM-month; DD-day; AAA,BBB -  ISO 4217 currency codes, for example - USD,EUR 
2. List of rates for needed currency and dates range.
Example: https://your-domain-name.com/wp-json/archive-nbp/v1/currencies-period/YYYY-MM-DD/YYYY-MM-DD/AAA
Where: YYYY - year; MM-month; DD-day; AAA,BBB -  ISO 4217 currency code, for example - USD

= Which Gutenberg Blocks can I use after installation =
1. Currency Chart - show rates for needed currency and dates range as a chart. If you want to have the last available date on the chart always then set Date end parameter far in the future.
2. Last Rates - show rates for needed date. Set the date far in the future if you want to show last rates always.
3. Currency Converter - allow to calculate any amount in different currencies using last available rates in the table.

= Currency Chart shortcode using =
Currency Chart - show rates for needed currency and dates range as a chart. If you want to have the last available date on the chart always then set Date end parameter far in the future.
Allowed parameters:
- "date_begin" (YYYY-MM-DD).
- "date_end" (YYYY-MM-DD). If you want to have the last available date on the chart always then set this parameter far in the future.
- "currency" (3 symb ISO from the list - 'USD','EUR','AUD','HKD','CAD','NZD','SGD','HUF','CHF','GBP','UAH','JPY','CZK','DKK','ISK','NOK','SEK','RON','BGN','TRY','ILS','CLP','PHP','MXN','ZAR','BRL','MYR','IDR','THB','INR','KRW','CNY','XDR')

**Examples of use:**

**[anbp_currency_chart]** - Will show the whole available period chart for default currency - USD.
**[anbp_currency_chart date_begin="2024-01-01" date_end="2100-01-01" currency="EUR"]** - Will show the chart from 2024-01-01 till last available date for currency - EUR.

= Last Rates shortcode using =
Last Rates - show rates for needed date. Set the date far in the future if you want to show last rates always.
Allowed parameters:
- "currencies". The coma separated 3 symbols ISO list of currencies. Available currencies - ('USD','EUR','AUD','HKD','CAD','NZD','SGD','HUF','CHF','GBP','UAH','JPY','CZK','DKK','ISK','NOK','SEK','RON','BGN','TRY','ILS','CLP','PHP','MXN','ZAR','BRL','MYR','IDR','THB','INR','KRW','CNY','XDR').
- "date" (YYYY-MM-DD). Set this parameter far in the future if you want to have the last available date always.

**Examples of use:**

**[anbp_last_rates]** - Will show the table with list of all available in the plugin currencies for last available date in database. 
**[anbp_last_rates currencies="EUR, USD, GBP" date="2025-02-10"]** - Will show the table of rates for 3 currencies EUR, USD, GBP for 2025-02-10 or last available date in the DB.

= Currency Converter shortcode using =
Currency Converter - allow to calculate any amount in different currencies using last available rates in the table.
Allowed parameters:
- "currencies". The coma separated 3 symbols ISO list of currencies. Available currencies - ('USD','EUR','AUD','HKD','CAD','NZD','SGD','HUF','CHF','GBP','UAH','JPY','CZK','DKK','ISK','NOK','SEK','RON','BGN','TRY','ILS','CLP','PHP','MXN','ZAR','BRL','MYR','IDR','THB','INR','KRW','CNY','XDR').

**Examples of use:**

**[anbp_currency_converter]** - The calculation list will include all currencies available in the system.
**[anbp_currency_converter currencies="EUR, USD, GBP"]** - The calculation list will include only 3 currencies from the list EUR, USD, GBP and PLN as a base currency.

= Are any translation available for the plugin? =
Plugin support 2 languages: **English** and **Polish**.

= How to uninstall the plugin? =
Simply deactivate and delete the plugin. 
 
== Screenshots ==

1. List of available Gutenberg blocks.
2. Archive NBP Currency Chart Block (admin area).
3. Archive NBP Currency Chart Block (public area).
4. Archive NBP Currency Rates Block (admin area).
5. Archive NBP Currency Rates Block (public area).
6. Archive NBP Currency Converter Block (admin area).
7. Archive NBP Currency Converter Block (public area).
 
 
== Changelog ==
= 1.1 =
* Adding shortcodes for each blocks. 

= 1.0 =
* Plugin released.