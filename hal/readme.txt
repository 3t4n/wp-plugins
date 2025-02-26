=== HAL ===
Contributors: CCSD
Tags: HAL, open archive, open science
Requires at least: 5.0
Tested up to: 6.6.1
PHP Version: 7.0 or higher
Stable tag: 2.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily retrieve publications associated with authors and other entities (structures, collections, research projects).

== Description ==

This is the first (and as of today the only) WordPress plugin for the open archive HAL.

It will allow you to display on your blog publications associated with authors and other entities (structures, collections, research projects).

All data is fetched from the [HAL's website](https://hal.archives-ouvertes.fr).

== Installation ==

= Requirements: =
* PHP 7.0 or higher
* WordPress 5.0 or higher
* cURL extension in php.ini

= Installation/update procedure: =

1. Desactivate the plugin if you have a previous version installed.
2. Unzip the archive and put all files into a specific older in the directory **/wp-content/plugins/**, e.g. **/wp-content/plugins/hal**.
3. Activate the plugin via **Appearance/Plugins** menu in WordPress admin panel.

= Pages: =

1. In WordPress admin dashboard, go to **HAL** and modify global parameters for retrieving publications on your blog page.
2. Create your page and add the shortcode **[cv-hal]** to fetch data based on the criteria specified in the first step.

NB: you can directly add parameters to your shortcode, e.g. **[cv-hal id=2497 type=structId_i]**.
For more information, please check the FAQ, our [generic documentation](https://doc.archives-ouvertes.fr/afficher-une-liste-de-publications-dans-wordpress) as well as our [documentation on HAL's API](https://api.archives-ouvertes.fr/docs/search).

= Widget: =

In WordPress admin dashboard, go to **Appearance/Plugins** to configure the widget.

== Frequently Asked Questions ==

= How can I contact the support team? =

You can contact the support team at the following email address: [hal.support[at]ccsd.cnrs.fr](mailto:hal.support@ccsd.cnrs.fr).

= How to insert data into my page? =

Just create a page and put the shortcode **[cv-hal]** in your content. As simple as that.

= What can I do to customize the content from within the shortcode? =

You can add parameters to your shortcode, e.g. **[cv-hal id=184 type=structId_i]**.

Supported identifiers:

* **IdHAL (sequence of characters)** = authIdHal_s
* **Structure identifier (numeric)** = structId_i
* **Collection identifier (sequence of characters)** = collCode_s
* **ANR Project identifier (numeric)** = anrProjectId_i
* **European Project identifier (numeric)** = europeanProjectId_i

To retrieve contact information, add to the shortcode **[cv-hal]** the parameter **contact** taking the values **yes** and **no, e.g. **[cv-hal contact=yes]**.

To display the number of documents, use the shortcode **[nb-doc]**.

= cURL =

* You need to enable the **php_curl** extension. Navigate to **Apache/bin** directory, open the **php.ini** file and uncomment **;extension=php_curl.dll**.

== Screenshots ==

1. Global parameters for retrieving publications
2. Widget settings
3. Example of a page using a shortcode

== Changelog ==

2.5
*Release Date - Sep 2024

* handle API errors
* avoid warning when updating array
* test compatibility with WP 6.6.1

= 2.4.2 =
*Release Date - Mar 2023

* update menu choice label and translation
* added option to show only authors affiliated to organisation(when struct id provided)

= 2.4.1 =
*Release Date - Feb 2023*

* update domain to hal.science
* use citationFull_s instead of citationRef_s for the widget
* fix english translation


= 2.4 =
*Release Date - Nov 2022*

* authStructId_i is deprecated
* build facet query according to the chosen options
* update translation for new typology

= 2.3 =
*Release Date - July 2022*

* update hal logo
* AuthorID (authId_i) is not supported anymore (use idHal)
* bug when using different permalink

= 2.2.1 =
*Release Date - March 2022*

* href pagination using query strings
* readme.txt updated
* comments in constantes.php updated

= 2.2 =
*Release Date - October 2021*

* menu displayed only when its items are selected
* sanitizer added to the global settings form
* strings escaped when echoing
* constants, functions and classes renamed to avoid conflicts

= 2.1.1 =
*Release Date - March 2021*

* translation corrected for some document types
* research teams full list displaying fixed
* unnecessary pagination button not displayed when the current page is the first or last one
* checks added to avoid PHP notices
* WP HTTP API used for HTTP requests

= 2.1.0 =
*Release Date - December 2020*

* compatibility with WordPress 5.6 RC tested
* support for PHP 8.0 added
* API call data caching using https://developer.wordpress.org/apis/handbook/transients/ added
* default type/id not mandatory when shortcode parameters indicated
* documentation explaining the usage of [cv-hal] shortcode with parameters updated

= 2.0.10 =
*Release Date - May 2020*

* Pagination patch works, thanks to @yoannspace

= 2.0.9 =
*Release Date - 6 December 2019*

* WP_PROXY* options can be used, all cURL calls now made in a sub
* Warnings fixed
* Some HTML code fixed
* Other code reformatted

= 2.0.8 =
*Release Date - 25 March 2019*

Code:

* Warning fixed for PHP 7.3

= 2.0.7 =
*Release Date - 11 January 2019*

* More precise date filter for last publications

= 2.0.6 =
*Release Date - 28 September 2018*

* Identifier authId_i added

= 2.0.5 =
*Release Date - 14 February 2017*

Code:

* Some code updated

= 2.0.4 =
*Release Date - 3 February 2017*

Pages:

* Identifier types updated: structId_i for structures and authStructId_i for authors associated with a specific structure identifier

= 2.0.3 =
*Release Date - 24 January 2017*

Pages:

* CSS updated

= 2.0.2 =
*Release Date - 07 December 2016*

Pages:

* Libraries jQplot and PieRenderer loaded for the metadata Disciplines

= 2.0.1 =
*Release Date - 28 July 2016*

General:

* Minor bugs fixed

= 2.0 =
*Release Date - 23 March 2016*

* Shortcode [nb-doc] for displaying the number of documents added
* Possibility to display contact information for a researcher with an IdHAL

= 1.4.4 =
*Release Date - 18 March 2016*

* Bug fix for publications having a DocType
* Each DocType block has a CSS class, e.g. grp-div-ART

= 1.4.3 =
*Release Date - 16 March 2016*

* Bug fix for metadata syncing with HAL
* Bug fix for buttons using the theme Twenty Sixteen (CSS)

= 1.4.2 =
*Release Date - 7 March 2016*

* cURL API request removed for DocType
* New JSON repository with DocType created => performance improved

= 1.4.1 =
*Release Date - 17 February 2016*

Pages:

* Citation Full changed to Citation Ref (shorter)

Widget:

* You can now add parameters to the shortcode [cv-hal] (e.g. [cv-hal id=184 type=authStructId_i]), which will give you the possibility to retrieve different data on different pages. If no parameters given, global settings will be used
* Bug fix for URL links in Metadata tabs
* Performance improved

= 1.4 =
*Release Date - 9 February 2016*

Pages:

* Verification for cURL extension added to PHP config
* Minor front-end updates for Publications
* Translation added for DocType
* DocType sorted alphabetically (e.g. ART, COMM, etc.)
* Each item has a class or an identifier
* You can add a stylesheet called cvhal.css to the CSS directory to override the plugin styles

Widget:

* Verification for cURL extension added to PHP config
* New interface to personalize your widget: number of documents to show, display type (title or citation)
* Multiple identifiers separated by commas allowed

= 1.3 =
*Release Date - 21 January 2016*

* USER_AGENT set for cURL
* Conditions added for calling the HAL's API

= 1.2 =
*Release Date - 15 January 2016*

* Some bug fixes

= 1.1 =
*Release Date - 7 September 2015*

* Bootstrap deleted
* New appearance for the plugin

== Upgrade Notice ==

Nothing for the moment...
