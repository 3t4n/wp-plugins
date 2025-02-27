=== AC's Loan Calculator ===
Contributors: accuratecalculators
Donate link: N/A
Tags: loan calculator, amortization, payment calculator, mortgage, finance
Requires at least: 5.8
Tested up to: 6.7
Stable tag: 2.0
License: GNU General Public License
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

A versatile loan calculator with a date-based amortization schedule and charts. Rebrandable. Supports 90 currencies, 6 date formats, and 15 languages.


== Description ==

The **[AC Loan Calculator Plugin (try it now!)](https://AccurateCalculators.com/calculator-plugins/loan-plugin)** is a versatile loan calculator that creates date-based amortization schedules, and interactive charts.

**Supports 90 currencies, six date formats, and 15 languages.** 

Now highly customizable via extensive configuration options.

Choose from four predefined sizes or customize via the configuration options. Fully responsive with touch support.

**Rebranding with your site's name is supported and encouraged.** 

The plugin works via:  
(a) *Shortcode* in posts/pages  
(b) *Widget area*  
(c) *Template file*  

See **usage** under installation for details.  

__NEW:__ Upgrade to the free [AC Loan Calculator Plus](https://accuratecalculators.com/calculator-plugins/loan-plus-plugin) v2.0 for a printable schedul.


== Installation ==

You can either (a) upload the *fc-loan-calculator* folder with all its files to the */wp-content/plugins/* directory, or (b) unzip the plugin's zip file directly into the */wp-content/plugins/* directory.

Activate the plugin through the *Plugins -> Installed Plugins* menu in the WordPress admin dashboard.

*Upgrading*

Release 2.0 is a major update. Please test before upgrading.

*Usage*

There are 3 mutually exclusive ways you can deploy the calculator to an individual page (though you can use all three methods on different pages within a site):

1. Add the shortcode **[fcloanplugin]** in the content area of your page or post and optionally configure the shortcode parameters. WordPress v5.8 introduced the block editor. To install this plugin as a widget in WordPress v5.8 or later, first install the widget shortcode block and then copy this plugin's shortcode into it.
1. Add the following code **<?php show_fcloan_plugin(); ?>** to your template where you want the calculator to appear. See below for options.
1. If your theme supports widgets, add the plugin to a widget area through the *Appearance -> Widgets* menu in WordPress.


__Shortcode parameters__

"|" means or, thus "tiny" | "small" | "medium" | "large" means pick one (include the quote marks!). Example: sc_size="medium"  Do NOT put spaces around the equal sign.

	* sc_size= "tiny" | "small" | "medium" | "large"
	* sc_custom_style= "No" | "Yes"
	* sc_add_link= "No" | "Yes"
	* sc_brand_name=""
	* sc_hide_resize= "No" | "Yes"
	* sc_loan_amt="32500.0"
	* sc_n_months="48"
	* sc_rate="5.5"
	* sc_currency=   (see: the file currency_and_date_conventions.txt)
	* sc_date_mask=   (see: the file currency_and_date_conventions.txt)
	* sc_theme_base_font_size="16px"
	* sc_theme_primary_color="#28a745"
	* sc_theme_primary_color_hover="#218838"
	* sc_theme_primary_color_light="#30c853"
	* sc_theme_primary_color_text="#fff"
	* sc_theme_primary_color_text_inverse="#fff"
	* sc_theme_background_muted="#f7f7f7"
	* sc_theme_background_color_disabled="#efefef"
	* sc_theme_background_calculator_color="#fff"
	* sc_theme_background_modal_color="#fff"
	* sc_theme_border_color="#dee2e6"
	* sc_theme_text_color="#333333"
	* sc_theme_tooltip_text_color="#fff"
	* sc_theme_shadow_color="rgba(0, 0, 0, 0.1)"
	* sc_theme_primary_font_family_stack="Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif"
	* sc_theme_mono_font_family_stack="'Roboto Mono', 'Source Code Pro', ui-monospace, monospace"
	* sc_calculator_min_width_tiny="150px"
	* sc_calculator_max_width_tiny="250px"
	* sc_calculator_min_width_small="200px"
	* sc_calculator_max_width_small="300px"
	* sc_calculator_min_width_medium="200px"
	* sc_calculator_max_width_medium="400px"
	* sc_calculator_min_width_large="200px"
	* sc_calculator_max_width_large="370px"
	* sc_hide_intl_conventions= "No" | "Yes"
	* sc_hide_payment_method= "No" | "Yes"


Examples (First includes all options with their defaults):

`[fcloanplugin sc_size=null sc_custom_style="No" sc_add_link="No" sc_brand_name="" sc_hide_resize="No" sc_loan_amt="32500.0" sc_n_months="48" sc_rate="5.5" sc_currency=null sc_date_mask=null sc_theme_base_font_size="16px" sc_theme_primary_color="#28a745" sc_theme_primary_color_hover="#218838" sc_theme_primary_color_light="#30c853" sc_theme_primary_color_text="#fff" sc_theme_primary_color_text_inverse="#fff" sc_theme_background_muted="#f7f7f7" sc_theme_background_color_disabled="#efefef" sc_theme_background_calculator_color="#fff" sc_theme_background_modal_color="#fff" sc_theme_border_color="#dee2e6" sc_theme_text_color="#333333" sc_theme_tooltip_text_color="#fff" sc_theme_shadow_color="rgba(0, 0, 0, 0.1)" sc_theme_primary_font_family_stack="Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif" sc_theme_mono_font_family_stack="'Roboto Mono', 'Source Code Pro', ui-monospace, monospace" sc_calculator_min_width_tiny="150px" sc_calculator_max_width_tiny="250px" sc_calculator_min_width_small="200px" sc_calculator_max_width_small="300px" sc_calculator_min_width_medium="200px" sc_calculator_max_width_medium="400px" sc_calculator_min_width_large="200px" sc_calculator_max_width_large="370px" sc_hide_intl_conventions="no" sc_hide_payment_method="no"]`

`[fcloanplugin sc_size="small" sc_custom_style="Yes" sc_hide_resize="Yes" sc_currency="83" sc_date_mask="2"]`

`[fcloanplugin sc_custom_style="No" sc_add_link="Yes" sc_brand_name="Friendly Mortgage" sc_hide_resize="Yes" sc_loan_amt="30000" sc_n_months="60" sc_rate="5.5"]`

**NOTE:** You only need to include with the shortcode the options you want to change.


__Optional array parameter passed to *show_fcloan_plugin()*__

The values available for template options are the same as the shortcodes above except you must change "sc_" to "op_". Some examples:

	<?php show_fcloan_plugin(array('op_size' => "medium",
			'op_custom_style' => "No",
			'op_add_link' => "Yes",
			'op_brand_name' => "Karl's",
			'op_hide_resize' => "No",
			'op_loan_amt' => "32500.0",
			'op_n_months' => "48",
			'op_rate' => "5.5",
			'op_currency' => "999",
			'op_date_mask' => "999"
			)); ?>

*Notes:*

1. If you want to add your brand to the calculator, the *_add_link option must be set to "Yes" (i.e. create a subtle follow link to AccurateCalculators.com). 
1. When branding, the brand name will be added before "Loan Calculator".
1. If _custom_style is set to "Yes", the plugin will load css/accurate-calculators-custom.css located in the plugin's CSS folder. You can modify the styles as needed. I suggest that you only include CSS selectors in this file that you actually change.
1. The plugin is built and tested on HTML5/CSS3 pages.
1. size (min-width): tiny: 150px, small: 200px, medium: 200px, large: 200px
1. size (max-width): tiny: 250px, small: 300px, medium: 400px, large: 440px
1. The modals used to show the schedule, currency select, help, etc are Bootstrap 5 modals. If your site uses an earlier Bootstrap version, you may have issues. Please contact me.
1. Website developers can set a default currency sign and preferred date format by setting <op/sc>_currency and <op/sc>_date_mask respectively. Set one or both to an integer value. For the list of integers to support 90 plus currency symbols and 6 date format options, see the file __currency_and_date_conventions.txt__ in the plugin's root folder. (example: India, Indian Rupee: ₹1,23,45,678.99 = 83)

*Enhanced Internationalization*

Supports **90+ currency symbols** (with proper number formatting) and **6 date formats** (e.g., mm/dd/yyyy, dd/mm/yyyy, yyyy.mm.dd). If no selection is made by the website developer or user, the calculator automatically detects and applies the browser's default currency and date format.  

For example, a visitor from Japan accessing a website hosted in France will initially see amounts in Japanese yen. However, website developers can override this behavior using shortcodes or function options. If enabled, users can also manually select their preferred currency and date format.  

*How the plugin determines the currency symbol and date format:*
1. If **user selection** is allowed and made, the plugin applies the user's choice.  
2. Otherwise, if the **website developer has set a default currency** (≠ 999), that selection is used.  
3. Otherwise, the plugin **reads the browser's default currency** and applies it.  
4. If none of the above apply, the plugin defaults to **'$'**.  

*Language Translations*

As of v1.5, the plugin supports **14 languages** in addition to English.

Each language below links to a page where you can test all seven plugins in that language—no installation needed.

**Supported Languages:**
- **[da – Dansk](https://accuratecalculators.com/da/lommeregner-plugins/alle-plugins)** – Danish
- **[de – Deutsch](https://accuratecalculators.com/de/rechner-plugins/alle-plugins)** – German
- **[es - Español](https://accuratecalculators.com/es/plugins-de-calculadora/todos-los-plugins)** – Spanish
- **[fi – Suomalainen](https://accuratecalculators.com/fi/laskurilisäosat/kaikki-lisäosat)** – Finnish
- **[fr – Français](https://accuratecalculators.com/fr/plugins-de-calculatrice/tous-les-plugins)** – French
- **[hu - Magyar](https://accuratecalculators.com/hu/kalkulátor-bővítmények/minden-bővítmények)** – Hungarian
- **[it - Italiano](https://accuratecalculators.com/it/plugin-calcolatrice/tutti-i-plugin)** – Italian
- **[lt - Lietuvių](https://accuratecalculators.com/lt/skaičiuoklės-įskiepiai/visi-įskiepiai)** – Lithuanian
- **[nl – Nederlands](https://accuratecalculators.com/nl/rekenmachine-plugins/alle-plugins)** – Dutch
- **[pl - Polski](https://accuratecalculators.com/pl/wtyczki-kalkulatorów/wszystkie-wtyczki)** – Polish
- **[pt - Português](https://accuratecalculators.com/pt/plugins-de-calculadora/todos-os-plugins)** – Portuguese
- **[ro - Românesc](https://accuratecalculators.com/ro/pluginuri-de-calculator/toate-pluginurile)** – Romanian
- **[ru - Русский](https://accuratecalculators.com/ru/плагины-калькулятора/все-плагины)** – Russian
- **[sv - Svenska](https://accuratecalculators.com/sv/kalkylator-plugins/alla-plugins)** – Swedish 

*Notes:*
1. The plugin automatically displays in the correct language based on the site's **"Site Language"** setting in WordPress. If necessary, language files in the **languages** folder can be renamed.  
   - Example: The default **Portuguese** translation uses `pt_PT` (Portugal). If your site is set to use the Brazilian Portuguese locale, rename the file `pt_PT.mo` to `pt_BR.mo`.  

2. A translation template file (`.POT`) is included in the **languages** folder. Website owners can use a **POT/PO file editor** to translate the plugin into any WordPress-supported language. A fluent speaker can also edit an included `.PO` file and regenerate the `.MO` file to alter a current translation.

3. **Contribute Your Edits!**  
   - If you enhance a translation and would like to share it, I will regenerate the `.MO` and, if needed, the `.JSON` files for you.  

*Support*

I'm happy to provide support for all my plugins! If you have a question or run into an issue, please visit the WordPress plugin's [support forum](https://wordpress.org/support/plugin/fc-loan-calculator/) and post your question.  

When submitting a request, please:  
- Specify whether you're using the original plugin or the **"Plus"** version.  
- Provide a link to the page where the plugin is installed.  

Including a direct link to the affected page can help me diagnose and resolve the issue more quickly.

__Other Calculators__

As of now, **AccurateCalculators.com** offers **seven plugins** in the **WordPress Plugin Directory**, with additional plugins available on the website. All plugins share a consistent feature set, styling, and functionality, ensuring a **seamless look and feel** across your site.  

Below are links to each plugin’s page in the **WordPress Plugin Directory**.

1. [Auto Loan Calculator](https://wordpress.org/plugins/fc-auto-loan-calculator/) - solves for several unknowns and creates a payment schedule.
1. [Loan Calculator](https://wordpress.org/plugins/fc-loan-calculator/) - a general purpose loan calculator with amortization schedule and charts.
1. [Mortgage Calculator](https://wordpress.org/plugins/fc-mortgage-calculator/) - optionally incorporates points and insurance and creates a payment schedule
1. [Retirement Age Calculator](https://wordpress.org/plugins/fc-retirement-age-calculator/) - answers, at what age will I be able to retire given my investment plan?
1. [Retirement Nest Egg Calculator](https://wordpress.org/plugins/fc-retirement-nest-egg-calculator/) - answers, what will be the value of my retirement fund when I retire?
1. [Retirement Savings Calculator](https://wordpress.org/plugins/fc-retirement-savings-calculator/) - how much do I have to invest periodically to reach my retirement goal?
1. [Savings Calculator](https://wordpress.org/plugins/fc-savings-calculator/) - calculates the results of regular savings and investing


**Also**

[New seven, free, *Plus* plugins with printable schedules](https://accuratecalculators.com/calculator-plugins).

== Frequently Asked Questions ==

__Can the Loan Calculator plugin be used on a commercial website?__

Yes. Your use is appreciated.

If you’re a financial blogger, consider adding a "Calculators" or "Tools" section to your site and including all my calculators. More content equals more opportunity.

__Does your plugin have any embed advertising?__

Absolutely not.

__Is your plugin self-contained?__

Yes. 100% of the plugin is installed on your server. There are no external dependencies.

__Does the plugin include any backlinks?__

No, not by default. If you decide to brand the calculator with your brand and / or set the *add_link* option to *Yes*, one discreet link is added to my site. (User will not know there is a link unless their mouse passes over it.) The link is around the copyright in the lower left. ☺

__Is the calculator plugin responsive?__

Yes. In fact, I use it on a Bootstrap v5.x responsive site.

__Does the calculator support touch devices?__

Yes. Users use the calculator with all types of devices.

__What are the differences between the "Plus" version of your plugins and the "Non-Plus" versions?__

1. The "Plus" versions allows the schedule to be printed.
1. The "Plus" version has improved numeric editing. Thousand separators are inserted as your user types which makes it easier to enter large numbers.
1. The "Plus" version includes all PHP and CSS source code, but not the JavaScript source code.
1. The "Plus" version sends to my site the domain name you install it on. I may link to your site to provide an example of the plugin's use. (The plugin collects no other information.)

== Screenshots ==

1. The AC Loan Calculator's front end showing 2 of the 4 configurable sizes with different color settings.
2. Loan payment schedule showing payment due dates and a detailed loan summary.
3. Creates three interactive charts for visualization.
4. A portion of the plugin's settings dialogue, as seen under *Appearance* -> *Widgets* page in WordPress's administration area.
5. All options showing (left) and with sc_hide_payment_method, sc_hide_resize, and sc_hide_intl_conventions set to "Yes."

== Changelog ==
= 2.0 =
* Improved design responsiveness, particularly at smaller screen sizes.
* Added dozens of easily configurable display and style options. No programming required.
* Added support to hide the "payment method" via an option setting.
* Many technical changes (dropped jQuery, Featherlight, updated to Bootstrap 5).
* Improved the overall quality of all the language translations.

Supported and updated continuously since 2016. See: changelog.txt

== Upgrade Notice ==
Added new configuration options so you can easily match your site's color choices.
Added ability for site owner to hide the "payment method" via an easy configuration option.
Improved responsiveness.
Improved translations.
Removed obsolete technology making for better long term reliability.
