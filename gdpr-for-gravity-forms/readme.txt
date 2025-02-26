=== Gravity Forms: GDPR Framework Add-On ===
Contributors: Data443
Tags: gdpr, gravity forms, privacy, compliance, security, ccpa
Requires at least: 4.7
Tested up to: 6.0
Requires PHP: 7.3
Stable tag: trunk
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

The easiest way to make your Gravity Forms GDPR-compliant. Fully documented, extendable and developer-friendly.

== Description ==

The easiest way to make your Gravity Forms GDPR compliant!

This plugin is a service of [Data443](https://data443.com).

Data443 is a Data Security and Compliance company traded on the OTCMarkets as [ATDS](https://www.otcmarkets.com/stock/ATDS/overview). We have been providing leading GDPR compliance products such as Global Privacy Manager ([Data443™ Global Privacy Manager](https://www.data443.com/global-privacy-manager/)), Blockchain privacy, and enterprise cloud eDiscovery tools.

This plugin adds new privacy features to Gravity Forms. Your visitors can download or delete their form submissions automatically or submit a request for the site admin to do so.

Until WordPress releases their own GDPR compliance update, this plugin requires [The GDPR Framework](https://wordpress.org/plugins/gdpr-framework/) to function (it's free!)

Make sure to also read the guide! You don't need to drown your customers in pointless acceptance checkboxes if you know what you're doing!

## Disclaimer
Using Gravity Forms: GDPR Add-On does NOT guarantee compliance to GDPR. This plugin gives you general information and tools, but is NOT meant to serve as complete compliance package. Compliance to GDPR is risk-based ongoing process that involves your whole business. Data443 is not eligible for any claim or action based on any information or functionality provided by this plugin.

### Documentation
How to use this plugin (practical guide): [Making your Gravity Forms GDPR-compliant](https://data443.atlassian.net/servicedesk/customer/portal/2/article/28246137)
How to use this plugin (the legal stuff explained): [Legal grounds for processing data](https://data443.atlassian.net/servicedesk/customer/portal/2/article/2079293576)
Full documentation: [The WordPress Site Owner's Guide to GDPR](https://data443.atlassian.net/servicedesk/customer/portal/2/article/2078998660)
For developers: [Developer Docs](https://data443.atlassian.net/servicedesk/customer/portal/2/article/2082439194)
Knowledge Base: [Knowledge Base](https://data443.atlassian.net/servicedesk/customer/portal/2/article/192708653)

### Features
&#9745; Allow both users and visitors without an account to view, export and delete their form submissions or request the site admin to do so;
&#9745; Configure forms to be excluded from viewing, exporting or deleting.
&#9745; Support for anonymization: allow admin to select which fields must be anonymized;
&#9745; Track, manage and withdraw consent.

== Installation ==

= Download and Activation =

1. Upload the plugin files to the /wp-content/plugins, or install the plugin through the WordPress plugins screen directly.
2. This is add-on Plugin so need ‘The GDPR Framework’ first installed.
3. Activate the plugin through the ‘Plugins’ screen in WordPress.

= Setup Guide =

Steps to add consent with Gravity Form are as follows:
1. First, create a custom consent type in "Tool > Data443 GDPR > Consent > Show Consent types > Add consent type".
2. Then note down the slug for example the slug is "contact_acceptance".
3. Then go to the Gravity form and open gravity form on which consent needs to be added.
4. Add the checkboxes to the form add label the checkbox. Remove any extra checkboxes.
5. Add a label for the checkbox choice. Click on the 'show values' checkbox. Add the value same as slug for example in our case slug is "contact_acceptance". 
    Make that checkbox required.
6. Then save the form to reflect changes.
7. Go to Settings > Privacy and select the primary email address field
8. Click on the "Save Settings" button (even if the correct field was already selected).

Steps to choose anonymized as follow:
1. when plugin is activated every field on gravity form will contain one checkbox "Anonymize"
2. for all field which container checked checkbox anonymize on Anonymize data of that email all fields will become blank.

== Change log ==
= 2.0.0 (3/3/2022) =

* FRAM-317 Update for GDPR Framework 2.0 compatibility

= 1.0.5 (11/24/2021) =
* FRAM-215 Update description and links in the readme
* FRAM-280 Update the namespace reference to the GDPR plugin

= 1.0.4 (08/14/2020) =
* add compatibility with WordPress 5.5

= 1.0.4 (06/26/2020) =
* add compatibility with WordPress 5.4.2

= 1.0.3 (11/26/2019) =
* add compatibility with WordPress 5.x

= 1.0.2 (02/20/2019) =
* Add feature of Anonymize Data.
* Add feature of consent track.

= 1.0.1 =
* Initial release
