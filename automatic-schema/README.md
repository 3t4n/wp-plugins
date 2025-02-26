=== Plugin Name ===
Contributors: digitalstartup
Donate link: https://wordpress.org/plugins/automatic-schema
Tags: article, bing, google, microdata, microformat, people, product, rdfa, rich snippet, schema, schema.org, serp
Requires at least: 4.6
Tested up to: 4.9
Stable tag: 1.0.8
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin will automatically insert http://schema.org/BlogPosting Microdata in your blog pages. You don't have to pre-fill any more information

== Description ==

**What is Microdata?**

The job of microdata, is to hold the hand of a search engine, and take it directly to the data that you need it to find. This helps search engines understand what it is crawling and minimise mistakes.

Major search engines, like Google, now support something called the [schema.org](http://schema.org/) vocabulary for structured data. In English, it is a universal template for structuring data. Essentially this makes it easier for search engines to crawl your pages. As a human being, we are able to fill in the blanks when we view information, but software like search engines require a helping hand.

One of the ways the schema.org vocabulary can be embedded within a page, is by using microdata. There are different sets for whatever your page is referring to. In the case of selling products, you would use the [Product Schema](http://schema.org/Product). If you are familiar with metadata, then think of it like that. In the HTML of your page code, you wrap the text in the same way.

**What does this plugin do?**

This plugin allows you to embed Schema.org Microdata for PostingBlog. But rather than pre-fill this information using other plugins, it automatically pulls the information from your Article and your Wordpress Settings so that you don't have to do anything.

The microdata won't be shown on the page, but instead just within the footer using meta tags. This means that the page will be optimised for search engines without having to add text to the page.

**Supported Schema.org**

This plugin is currently limited to PostingBlog Schema.

**Would you like to contribute?**
You may now contribute to the plugin on Github: [Automatic Schema](https://github.com/DigitalStartupUK/DS-Schema.org) by [Digital Startup](https://digitalstartup.co.uk/) on Github

== Installation ==

**Using the Dashboard**

Go to Plugins -> Add New -> Search for "All in One Schema.org Rich Snippets" Or Upload the plugins zip file

**Using FTP**

 1. Upload the plugin into wp-content/plugins directory
 2. Activate the plugin through the 'Plugins' menu in WordPress
 3. Go to Settings > Automatic Schema
 4. Add a 300 x 300px company/business/website logo and Save
 5. Your article pages will now automatically include the PostingBlog Microdata

To verify that your Schema.org Microdata is working correctly, please visit [Google Structured Data Testing Tool](https://search.google.com/structured-data/testing-tool) for verification. Simply copy the URL of one of your Blog Articles into the prompt.


== Frequently Asked Questions ==

**The microdata does not show**

 - Microdata only shows on article pages
 - Clear your Wordpress Cache
   (e.g. W3-Total-Cache)

**There are Errors in Google Structured Testing Tool**

Check which errors are highlighted, and ensure that the settings for the fields are correct. For example, if the Image URL for the article is missing in the report - then ensure you have attached a Featured Image to your article.

== Screenshots ==

1. Part 1 of the Settings Screen

2. Part 2 of the Settings Screen

3. How Google Structured Data Testing Tools sees the Microdata

== Changelog ==

= 1.0.8 =
* Audited for compatibility of Wordpress 4.9

= 1.0.7 =
* Fixed issue where articleBody would show in Footer

= 1.0.6 =
* Fixed typos in Settings Page
* Updated layout of Settings Page

= 1.0.5 =
* Made visual improvements to the settings page
* Added function to allow upload of Company Image for Microdata

== Arbitrary section ==
