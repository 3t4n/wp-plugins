=== Inesta FAQ H2 ===
Contributors: roelv
Tags: yoast, faq, h2, seo, headings
Requires at least: 5.0
Tested up to: 6.7.1
Stable tag: 1.0.2
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Automatically change Yoast FAQ and Power Pack question labels to H2 elements for better SEO and accessibility.

== Description ==
**[Inesta FAQ H2](https://inesta.nl/tools-inesta-faq-h2/)** is a lightweight plugin designed to enhance your Yoast or Power Pack FAQ blocks by converting the default question labels from `<span>` elements to `<h2>` headings. This helps improve SEO by ensuring better use of semantic headings and can enhance accessibility for screen readers.

Built by the team at [Inesta](https://inesta.nl/).

### Key Features
* Converts Yoast and Power Pack FAQ question labels to H2 headings automatically.
* No configuration required — activate and the plugin works immediately.
* Improves SEO by providing proper heading structure within FAQ sections.
* Maintains compatibility with the native Yoast FAQ block.

### Use Cases
1. **SEO Enhancement**: Ensure that FAQ sections use semantic heading tags to boost search engine rankings.
2. **Accessibility Compliance**: Improve readability for screen readers by using appropriate HTML heading tags.
3. **Uniform Styling**: Consistent heading structure across FAQ sections.

### How It Works
Once activated, the plugin automatically hooks into the `the_content` filter and replaces all `<span>` elements with the `schema-faq-question` class inside Yoast FAQ blocks with `<h2>` tags. There are no additional settings required, making this a straightforward solution for improving your FAQ's structure.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/inesta-faq-h2` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. The plugin will automatically convert your Yoast FAQ question labels to H2 headings.

== Frequently Asked Questions ==

= Does this plugin require Yoast SEO? =
Yes, this plugin is specifically designed to work with the Yoast SEO FAQ block.

= Can I customize the heading level? =
Currently, the plugin defaults to H2 headings to maintain proper SEO structure. If you require different heading levels, a custom modification would be necessary.

= Will this affect the styling of my FAQs? =
No, the plugin only changes the HTML structure and does not modify the styling or classes associated with the headings.

== Changelog ==
= 1.0.2 =
* Added support for Turn Yoast SEO FAQ Block to Accordion

= 1.0.1 =
* Added support for Beaver Builder Power Pack FAQ block.

= 1.0 =
* Initial release of Inesta Yoast FAQ H2.

== Upgrade Notice ==
= 1.0 =
Initial release — no previous versions.
