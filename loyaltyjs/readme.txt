=== Loyalty.js ===
Contributors: eisenivan
Donate link: https://github.com/eisenivan/loyalty
Tags: customer loyalty, jquery, loyalty, user rewards, business logic, view count
Requires at least: 3.0.1
Tested up to: 4.1
Stable tag: 2.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Loyalty.js tracks visitor page views and helps you to serve content dynamically based on visitor loyalty.

== Description ==

<strong>What is Loyalty.js?</strong>

Loyalty js is a lightweight jQuery plugin that keeps track of how many times a user has come to your web property and allows you to craft a different experience based on that count. You can control the behavior by adding data-attribute tags to your DOM elements. Now, rather than having content rotate for every user at the same time, you will be able to "tell a story" that always starts at the beginning and progresses as a user becomes more engaged.

<strong>What does that mean?</strong>

Imagine you are a technology company with multiple project case studies on your site. As it stands now you can either...

<strong>1)</strong> Show your best case study first. This is great because people will see it first, but people that are returning to your site for the 3rd, 8th, 12th time still see it. Sure, you have calls to action that allow them to dig deeper and explore your content, but in essence, your landing page is no longer relevant to them. It is a wasted opportunity.

This leads people to...

<strong>2)</strong> Change up their content. They want to keep it "fresh". The problem here is that a lot of people will come to your site that may never discover your favorite piece. Every user, regardless of how many times they have come see the same content. This feels like the equivilant of reading a story and forcing people that arrive late to join in the middle. What is "newest" is not always the most relevant way to introduce a first time visitor to your brand.

With loyalty.js you can dictate an experience that is based on how many times the user has visited your site, not an artificial timeline driven by "SEO Friendly Content Updates".

<strong>Wordpress Usage</strong>

This wordpress plugin comes complete with a shortcode that allows you to use loyalty.js tags in your content editor code. The shortcode is an enclosing tag.

[loyalty min="3" max="4"]Your Content[/loyalty]

The plugin will honor min and max first. If you want the content to display at one specific view count, use ONLY the exact parameter.

[loyalty exact="6"]This content will show on visit #6[/loyalty]

There is also a shortcode that allows you to print the number of views to the page. Simply add [loyalty_count] to your post content and Loyalty.js will render in a span tag with the css class of 'loyaltyjs_count' and the data-attribut 'data-loyalty-count'. When it runs the plugin will fill in the integer value.

<strong>Advanced Implementation</strong>

If you would like to roll up your sleeves a little farther you can manually add data-attribute tage into your code. Please read the documentation on the GitHub page. https://github.com/eisenivan/loyalty


== Installation ==

1. Upload `loyaltyjs` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the loyalty.js in the admin console. Settings -> Loyalty.js
1. Use the shortcode or add the data-attributes directly to your DOM elements to unleash the goodness.

== Frequently Asked Questions ==

= Why is this cool? =

This plugin is designed to make "storytelling" easier. The web is often boring, and each site offers the exact same experience to every user ever time. With this plugin you can define a different story for a user based on how many times they have visited. Maybe you want to show your "like us on facebook" call to action to users that have been to your site less than 10 times. After 10 visits though, they probably would have liked your page if they wanted to, so you can easily use that space to give them more useful information.


== Changelog ==

= 2.0.2 =
* Added 'settings' link to the Loyalty.js entry on the Admin plugins page

= 2.0.1 =
* Fixed bug that casued a JS error when using the $ jQuery namespace

= 2.0.0 =
* Updated to new version of Loyalty.js script. This fixes the issue of the loyalty count shortcode not rendering if there are no loyalty shortcode tags on the page.
* Updated version a whole point in an effort to fix the versioning in the Wordpress plugin distribution system. Fingers crossed...

= 1.1.0.0 =
* Added shortcode to display the current number of loyalty views

= 1.0.0.0 =
* Hello world!!! The initial release

== Upgrade Notice ==

= 2.0.2 =
* Added 'settings' link to the Loyalty.js entry on the Admin plugins page

= 2.0.1 =
* Fixed bug that casued a JS error when using the $ jQuery namespace
