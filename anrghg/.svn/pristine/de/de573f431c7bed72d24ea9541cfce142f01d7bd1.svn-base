=== A.N.R.GHG Publishing Toolkit ===
Contributors: anrghg, martinneumannat, milindmore22, misfist, vyskoczilova, westonruter
Tags: AMP, security, metadata, reusable, table of contents, endnotes, complements, sources, references, modified date, published date, fields
Plugin Initialism: 'Act Now, Reduce GreenHouse Gasses'
Plugin URI: https://anrghg.sunsite.fr/publishing-toolkit
Requires at least: 5.5
Tested up to: 6.4
Requires PHP: 7.0
Tested PHP up to: 8.1
Package Version: 1.16.5.1
Version: 1.16.5
CAUTION: The following field is parsed in `trunk/` for release configuration:
Stable Tag: 1.16.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Among the Swiss Army knives completing WordPress, this one helps reduce GHG. AMP compatible. Table of contents, fragment IDs for paragraphs, notes and sources listed separately, templates reusable post-/site-wide, additional date information, & more.


== Description ==


An AMP compatible toolbox to help complete WordPress. Core features include:

* Security
* Thank You and other messages
* Date information: published, updated, first published, meta tags
* Paragraph links and list item links
* Heading links
* Table of contents
* Notes and sources in two lists
* Reference lists, bibliographies
* Templates for messages, notes, sources, references
* Webfont loading
* HTML partial including

*Notice about **Language support:** While American English is supported natively, British English support is at 100% (generated). French and Spanish with all sublocales supported by WordPress benefit from internal translation, currently at 18% and 6% respectively. About one in four string instances are in sync with WordPress Core.*

The A.N.R.GHG Publishing Toolkit can load and filter HTML partials from the file system, and it addresses the challenge to do by HTML and CSS things that used to be done by JavaScript, which was one reason the internet loaded slowly on mobiles and consumed more resources than with [AMP](https://wordpress.org/plugins/amp/) technology. So far, the A.N.R.GHG Publishing Toolkit is not yet up to its full design goal, but it already can:


= Security =

* Protect WordPress websites against password leak effectiveness, by hampering the login process depending on the value of a constant defined in a mini-plugin (editable on the hosting platform);
* Make that constant configurable so that in multisite networks, individual sites may be toggled independently;
* Extend authentication cookie lifespans to a configurable period of time, for example until the day after the next scheduled login rush;
* Display the login activation status with an icon in the Admin bar;
* Blank the login dialog out if it is convenient to access the WordPress Admin area through the hosting platform exclusively.
* CAUTION: Unless the hosting provider has set up VPS level security, shared hosting is prone to being hacked by web shell even if only a single one of the websites sharing the same server’s home directory is compromised. Therefore, the A.N.R.GHG Publishing Toolkit’s security feature is efficient only on websites hosted on a dedicated server, a Virtual Private Server (VPS), or shared hosting with VPS level security set up by the hosting provider.


= HTML partials =

* Include locally stored HTML partials directly from the file system;
* Replace optional placeholders with CSS classes and a configurable value;
* Enable updating the partials in bulk by FTP, rather than individual Custom HTML blocks or reusable blocks;
* Solve the issue of size, since posts containing too much code cannot be saved.


= Thank You message =

* Display a configurable message after posts and/or pages;
* Help with activating and configuring the message on a per-page basis in the Post Meta box;
* Make available a set of rich text messages configured in the Template editor;
* Provide a block to configure an unlimited number of messages right in the post or page.


= Date information =

* Display the last modified date at post/page start or end;
* Display the published date at the start or end of pages where WordPress does not display it natively;
* Optionally add a freely configurable field about where the post was first published;
* Add date meta tags (may be useful if not already added by an SEO plugin).


= Paragraph links =

* Add a fragment identifier in a configurable link prepended to every paragraph and list item;
* Use position independent identifiers derived from the content;
* Use the custom ‘HTML anchor’ for all paragraphs that it has been configured for, further improving identifier stability;
* Keep the identifiers fully localized also when using a non-Latin script, for legible display in the URL bar.


= Heading links =

* Add localized and optionally stable fragment identifiers and hyperlinks to headings.


= Table of contents =

* Number the headings by CSS in appended or prepended position with a backlink to the table of contents;
* Replace the appended number with a generic arrow if numbers are not desired next to headings;
* List the headings in a table of contents, that the heading numbers link back to;
* Optionally collapse and expand the table of contents from the label, also when JavaScript is off;
* Insert a table of contents automatically in all posts with a configurable minimum number of headings;
* Deactivate the table of contents for a particular post or page in the added Meta box;
* Add a table of contents if the Table of contents block is present;
* Use a configurable string as an alternative positioner in the Classic Editor to override the configured default position;
* Configure its label for all posts in the settings, and for a particular post in the Post Meta box or in the block, or by adding an argument in the code;


= Notes and sources =

* Parse inline notes and sources and display them either as descriptive endnotes or as bibliographic endnotes depending on their delimiters;
* Process sources nested in notes;
* Show notes and sources in responsive, adaptative and configurable rich tooltips when hovering their inline anchor;
* Support six numbering systems including Eastern Arabic digits to help distinguish notes from sources;
* Register notes and sources on the fly for reuse across a post or page;
* Store notes and sources as templates for reuse across the website;
* Display additional text around reused notes and sources;
* Handle multiple notes and/or sources reused in a single instance;
* Parse the notes and sources delimiters as freely configured also using non-Latin script or punctuation only;
* Support switching complement delimiters midway, parsing older posts for the previous ones while the current ones are processed in posts from a configurable ID on;
* Save the current delimiters with each post, so that delimiters may be reconfigured at any time and are valid in new posts;
* Parse post-specific sets of delimiters configured in the Post Meta box;
* Display complements in a number of columns (up to three) configurable for notes and sources separately, and responsively with respect to mobiles;
* List complements section-wise at each instance of the block in the Block Editor, or alternatively, of a configurable positioner code in the Classic Editor;
* Defer complement lists to the footer of a particular post, or do so for all posts unless specified otherwise;
* Post-process the web page to move complement lists from the built-in WordPress default position below the footer to within the footer;
* Specify the writing direction in complement lists and anchor tooltips for notes and for sources separately on a per-post basis in the added Post Meta box, or per instance in the block (Block Editor) or the positioner code (Classic Editor);
* Display a complement in a new tab or window using its URL even when lists are collapsed by default;
* Keep complement lists collapsed except for the target item after clicking an anchor, so as to not distract from the other features and information;
* Optionally expand the full list on clicking any anchor as it is useful for ibid notation;
* Combine identical complements to a single item, and enumerate the related anchors in a tooltip shown on hovering its number in the list;
* Display a warning if an opening delimiter is unbalanced, quoting the context for easy location.


= Reference lists =

* Display lists of references in the post or page;
* Optionally make them collapsible, and display them collapsed or expanded at page load;
* Help with configuring reference lists in the ‘Reference list’ block with settings for label, display and writing direction.


= Web fonts =

* Load web fonts with preconnect after pasting their URL into a text area in the settings;
* The Google Web Fonts repository is linked from the Settings page;
* One example URL is provided out of the box, but the switch is off by default.


= Category pages and taxonomies =

* Activate rich-text term descriptions.


= Data =

* Help with editing and storing templates that can be used as messages, as notes and as sources, and in reference lists;
* Export and import templates, settings, and freely defined options;
* Automatically back up templates and settings both at accessing and saving these pages.


= Anchors and slugs =

* Help with configuring the rules used to generate fragment identifiers, and optionally slugs, allowing for uppercase, custom conversions, configurable maximum length.


= Excerpts =

* Mitigate the effect of not using shortcodes, but versatile and internationalized delimiters instead.


= Interoperability =

* Integrate with Elementor;
* Integrate with Advanced Custom Fields.


= Character conversions =

* Optionally deactivate WordPress default behavior based on WPTexturize, so that ASCII quotation marks stay as-is also outside code areas.


= Scrolling =

* Use a configurable scroll offset and optional CSS smooth scrolling.


= CSS =

* Add the post or page slug as a class to the `body` element to ease customizing the aspect of specific pages.


= HTML =

* Clean up errand meta tags and remove stray meta elements on public pages.


= User interface =

* Provide 4 Gutenberg blocks to help with configuring messages, reference lists, note and source lists, and the table of contents;
* Add a configurable Post Meta box for a more fine-grained configuration of various features;
* Display settings in a single, fully searchable page with three levels of verbosity;
* Add optional Admin submenu or menu items;
* Provide an internal header menu.


= Planned features =

* A format converter for Markdown ➔ WordPress;
* A converter for .docx files;
* An accessible emoji feature.


= Concept =

The A.N.R.GHG Publishing Toolkit aims to be one more Swiss Army knife to help complete any WordPress installation while reducing greenhouse gas emissions in multiple ways:

* Thanks to [AMP](https://wordpress.org/plugins/amp/) compatibility for a faster, less resource consuming web;
* With streamlined processes at its end in a slim code base without external style sheets;
* Through its commitment to web hosting with renewable energy ever since the first months;
* By developing in a local WordPress stack on a laptop powered with 100% renewable energy from the local grid operator;
* Being developed by a vegetalian, because going vegan is the [single biggest way to reduce our impact on planet Earth](https://www.theguardian.com/environment/2018/may/31/avoiding-meat-and-dairy-is-single-biggest-way-to-reduce-your-impact-on-earth), per [Oxford University research](https://science.sciencemag.org/content/360/6392/987) and helps terminate animal torture.

Beyond being fully AMP compatible, the A.N.R.GHG Publishing Toolkit’s features for the public pages stay functional where JavaScript is turned off, with one limitation: Expanding the table of contents from a heading backlink requires one click more.


== Installation ==


= Security =

Unless the hosting provider has set up VPS level security, shared hosting is prone to being hacked by web shell even if only a single one of the websites sharing the same server’s home directory is compromised. Therefore, the A.N.R.GHG Publishing Toolkit’s security feature is efficient only on websites hosted on a dedicated server, a Virtual Private Server (VPS), or shared hosting with VPS level security set up by the hosting provider.

For an additional layer of security, it is recommended to deny access to the `wp-config.php` file, and to the `debug.log` file in case there is any. To achieve this, please add the code snippet provided for the purpose near the bottom of the `template-wp-config.php` file by copy-pasting it from this file in the `anrghg/` plugin folder to the `.htaccess` file in the WordPress base directory.


= Requirements =

Prior to installing the A.N.R.GHG Publishing Toolkit, please make sure that the PHP memory limit is configured appropriately in the web hosting. The large settings page requires more than 32MB. A too low memory limit results in the failure of important processes: theme updates, plugin updates, editing large posts and pages, and generally in a lot of malfunctioning and buggy behavior in WordPress and other systems.

Safe is to set the PHP memory limit to 256M as a rule of thumb, but many hosting providers throttle it down to 128M. If your plan includes cPanel, more options such as 512M may be available in the “MultiPHP INI Editor” under “Software” in the “Tools” menu on the cPanel home page in your hosting account.


= WordPress configuration =

The memory limit defaults to 40 megabytes for a single site, 64 MB for a multisite, so it may be necessary to increase this limit, although the A.N.R.GHG Publishing Toolkit [is not known](https://plugintests.com/plugins/wporg/anrghg/latest) for being particularly memory-intensive. Options include 64M, 128M, 192M, 256M, 368M and 512M as the value should match the memory limit set in the website’s hosting. The file `template-wp-config.php` includes a template for this.


= Install process =

* A. Standard process in the WordPress Admin area

1. In the Admin menu, navigate to Plugins > Add New;
2. In the search bar, type 'anrghg';
3. In the search results, spot the 'A.N.R.GHG Publishing Toolkit';
4. Click the 'Install Now' button next to it;
5. Eventually click the 'Activate' button showing after installation complete.


* B. Mixed process in the WordPress Admin area

1. Download 'A.N.R.GHG Publishing Toolkit' as a .zip file from the [WordPress Plugin Directory](https://wordpress.org/plugins/anrghg/);
2. In the Admin menu, navigate to Plugins > Add New;
3. Click the 'Upload Plugin' button next to the page heading;
4. Click the 'Choose File' button;
5. Choose the downloaded .zip file;
6. Click the 'Install Now' button;
7. Eventually click the 'Activate Plugin' button.


* C. By uploading via FTP

1. Download 'A.N.R.GHG Publishing Toolkit' as a .zip file from the [WordPress Plugin Directory](https://wordpress.org/plugins/anrghg/);
2. Uncompress the downloaded .zip file;
3. Switch to an FTP client;
4. Access the plugins directory;
5. Make sure the same plugin is not already there, else delete the old one;
6. Upload the folder `anrghg/` resulting from step 2;
7. Refresh the Plugins list;
8. Eventually click the 'Activate' action link of the 'A.N.R.GHG Publishing Toolkit'.


= Plugin configuration =

To activate the security feature, a constant needs to be defined in a mini-plugin. The code is already in the mini-plugin template `template-mini-plugin.php`. Please make sure this constant is always set to `false` unless somebody needs to log in. In that case, the constant needs to be set to `true`. But do not forget to set it back to `false` as soon as everybody is logged in.

Once the A.N.R.GHG Publishing Toolkit is installed, it needs to be configured:

1. Most features are deactivated by default and may be activated individually. To access the settings page, please click the `Settings` action link of the ‘A.N.R.GHG Publishing Toolkit’ entry in the Plugins list. No menu items and no Post Meta box are added by default. To activate any of these, or the ‘Thank You messages’ or ‘Reference lists’ block, please choose the desired UI elements in the ‘User interface’ section of the Settings page.
2. Even if the setting to turn a feature on uses the glide-switch design with ON and OFF button symbolic, please be still sure to save the form clicking the `Save Changes` button at the bottom of the window. Unlike the behavior specified in [Android Material Design](https://material.io/components/switches) and [SAP Fiori Design](https://experience.sap.com/fiori-design-web/switch/), changes require saving the form to become effective.
3. Several headings or labels may need to be configured to your locale. That may be done on the Settings page, or in the ‘String translation’ pane of a multilingual plugin after saving the Settings page at least once to the database, or using configuration filters as provided in the file `template-filter-config.php`.
4. The strings delimiting notes and sources are freely configurable and come also with two presets as suggestions. So do the inner delimiters. Codes needed to materialize positions are configurable too. Most of these configurations are versatile in that the plugin adapts to changes on the fly or mid-way.
5. In the optionally added Post Meta box, every single section can be deactivated individually. After activating the Meta box, it displays with all elements by default just to make selection easier. Please be sure to switch elements in and out individually as desired in the settings page under ‘User interface’.
6. Many features may be configured alternatively in a mini-plugin, easy to set up on the basis of the included template `template-mini-plugin.php`, or especially for theme-specific values, in your child theme’s `functions.php`, using configuration filters as documented in the file `template-filter-config.php`. That may be useful to help with adapting the configuration to theme-specific requirements while using multiple themes like in [AMP Reader mode](https://amp-wp.org/documentation/getting-started/reader/).
7. Configuration filters are currently the only means to configure some features, notably the previous complement delimiters, used in posts and pages with an ID that is less than a configurable number. These filters are documented in `template-filter-config.php` under ‘Previous delimiters’ and ‘Previous delimiters for tooltips’.
8. When using a translation manager with a String Translation pane, please be sure to save the Settings page at least once to your database, because translation filters require retrieving the strings in the database.
9. Adding more hooks is projected for the purpose of filtering the HTML output. Overriding the theme style rules by Custom CSS however is not supported, since in multisite networks, Custom CSS is prohibited by default. See more hints in the A.N.R.GHG Publishing Toolkit settings page Customization section.


= Register templates post-wide =

To reuse a complement already used in the same post, it may be given a name in the first instance like so: `[note]a_name[/name]The complement.[/note]`. In case of conflicts, post-wide names prevail over site-wide names.

The name start delimiter (`[name]`) is not used for new complements. Its sole purpose is to delimit names in arbitrary positions.


= Register templates site-wide =

Complements become reusable site-wide when registered with the ‘Template editor’.

The name of a template may be any Unicode string; the only constraint is to not contain ordinary space.

In the list, existing complements are displayed full height with formatting, and HTML markup may be added directly too if JavaScript is on. If JavaScript is turned off, the source code is displayed, and new complements need to be written in source code as well.

Changes to existing complements can be made directly by editing the list.

Alternatively, a complement may be moved into the editor by clicking the 'Move into editor' button next to it, but before doing so, please make sure that TinyMCE is in **Visual** mode (both methods to set the mode programmatically fail and the one to get/check the mode is missing), as else the `editor.setContent()` method fails, the content disappears, and the page will need to be refreshed to get the item back instantly.

The 'Move into editor' buttons are deactivated for safety when either TinyMCE or the new name text box is not empty.

To help with choosing unique names, the names already in use are displayed in alphabetical order below the new name text box. The data is validated server-side, and if a problem is detected with missing, duplicate or invalid names, a warning will display and the cursor will be set to fix it.

All templates are backed up in a time-stamped file on accessing the list and on saving the form, if this feature is not deactivated in the settings. The backups are located in a subfolder named `anrghg/` in the `uploads/` folder in your `wp-content/` directory.


= Reuse complements =

**Simple syntax:** To reuse an already registered complement, put its name as the first, last, or only word in a note or source.

To add more text like a page number, use a space as a separator between the complement name and the added text, like so, where `␣` stands for an ordinary space:

Before (the prepended space is kept): `[src]`According to the explanation set out on page 10 of␣name1`[/src]`

After (the appended space is skipped): `[src]`name1␣, page 10.`[/src]` or `[src]`name1␣␣explains it on page 10.`[/src]` (To have the source followed by a space, two spaces need to be typed.)

**Full syntax:** Beyond this simple syntax, the full syntax brings the opportunity to add more text on both sides, and to reuse multiple complements in a single instance.

Example: `[note]`See `[name]`reusable_one`[/name]`, page 31, and `[name]`reuse2`[/name]`, chapter 4.`[/note]`



== Frequently Asked Questions ==


= What does A.N.R.GHG stand for? =

A.N.R.GHG is the initialism of ‘Act now, reduce greenhouse gasses’.

The dots have been added to help screenreaders spell it as an initialism rather than as an acronym.

The climate crisis requires us to enroll all aspects of our work and lives so that our efforts converge towards addressing the crisis now as a top priority urgency.

The AMP technology contributes to streamlining processes and making the internet less energy-consuming.

Moreover, development and maintenance are powered with renewable energy as well since the developer subscribed to the green electricity option offered by the local grid operator to individual households at a monthly fee of about $2.

Most importantly, the developer is a vegetalian, as avoiding meat and dairy, eggs and fish helps making an end of animal torture and is the scientifically recommended [single biggest way](https://www.theguardian.com/environment/2018/may/31/avoiding-meat-and-dairy-is-single-biggest-way-to-reduce-your-impact-on-earth) to reduce our impact on planet Earth, an [Oxford University study](https://science.sciencemag.org/content/360/6392/987) assessed.


= Why are multiple features crammed into a single plugin? =

A number of features like heading links and table of contents, notes and sources or last modified date and published date of pages are interrelated, and solutions using one plugin per feature are suboptimal because of inconsistent identifiers or presentation.

Beyond consistency, among the reasons that further fueled the adoption of an “all”-in-one concept are efficiency and economies of scale, much like what [Jetpack](https://wordpress.org/plugins/jetpack/) is achieving at an incomparable magnitude.

As a result, making individual plugins out of some of the features is not required and would be inefficient. Keeping them all together seems like the best option.


= Why are all settings crammed together on a single page? =

This way, the settings can be searched using the browser search functionality (Control + F), and all occurrences can be accessed directly. That would not be the case if the settings were grouped by topic under a number of tabs.

The table of contents at the top of the settings page replaces the tab row or column, while allowing for longer, more explicit labels. It can be accessed by clicking the ‘Back to top’ button at the top of the window in a fixed position.

Likewise, the ‘Save settings’ button is constantly visible at the bottom of the window. Clicking it does not require scrolling down to the bottom of the page.


= Why do processes fail when this plugin is active? =

This issue depends on the PHP memory limit. The large settings page requires more than 32MB. Safe is to set the PHP memory limit to 256M as a rule of thumb, but many hosting providers throttle it down to 128M. If your plan includes cPanel, more options such as 512M may be available in the “MultiPHP INI Editor” under “Software” in the “Tools” menu on the cPanel home page in your hosting account.

The limitations involved by a low memory limit affect plugin updates, theme updates, as well as other actions performed by WordPress and its plugins, for example editing large posts in the Block Editor. Other content management systems are likewise impacted by low memory limits such as 32M, that may be the default settings value in shared hosting.


= How about using jQuery? =

As the jQuery JavaScript library is not fully AMP compatible, features like tooltips, expand/collapse and scrolling back and forth do not use jQuery. Another reason is that when using jQuery, and JavaScript is turned off in a browser, these features are broken in that browser. Yet another reason is bad user experience as links to end notes are either unavailable, or available hard links cannot be opened while the relevant list is collapsed. Moreover, using jQuery prevents from saving a fully functional copy of a page. These frustrating issues outweigh the benefits of using jQuery.

Regardless, for end notes there is another plugin out there that uses jQuery by default and [offers the ability to opt out](https://wordpress.org/support/topic/making-it-amp-compatible/): The [Footnotes](https://wordpress.org/plugins/footnotes/) plugin, although closed since 2022-11-14, is consistently [recommended](https://www.wpbeginner.com/plugins/how-to-add-simple-and-elegant-footnotes-in-your-wordpress-blog-posts/) in 2023, and it is [compatible](https://wordpress.org/support/topic/still-working-twenty-twenty-3/) with the Twenty Twenty-Three theme. It can be installed as a .zip file following [process B](https://wordpress.org/plugins/anrghg/#installation) after downloading its latest version directly [from the WordPress Plugin Directory](https://downloads.wordpress.org/plugin/footnotes.2.7.3.zip), as it is two or three times a day on average per current [stats](https://wordpress.org/plugins/footnotes/advanced/), or from the [latest backup](https://web.archive.org/web/20221015055810/https://wordpress.org/plugins/footnotes/) of its full Plugin Directory page in the Web Archive.

However, since the Footnotes plugin is unmaintained, it may basically become a target of exploiting security vulnerabilities. That is why reading the [abandonment statement](https://wordpress.org/support/topic/plugin-is-abandoned-3/) made by its last developer, or its [archived version](https://web.archive.org/web/20220819113359/https://wordpress.org/support/topic/plugin-is-abandoned-3/), is strongly recommended.


= Can I use various themes alongside? =

Yes, using configuration filters, that have precedence over settings values from the database, each theme can have specific settings values stored in its child theme’s `functions.php`, so that sensitive values may be fine-tuned in accordance with particular layout options, while values that are constant across themes may still be configured in the settings page and called from the database.

The A.N.R.GHG Publishing Toolkit includes a template file called `template-filter-config.php` documenting all filters available so far (while process filters are being added as documented in `template-filter-output.php`).


= How to keep configuration filters when switching themes? =

As a stable place to add configuration filters and process filters, a mini plugin is convenient. A mini plugin template is included in the plugin folder. To use it, please move it out of the folder, eventually rename it, optionally place it in a new folder, then make it a plugin by deleting the seven percent signs standing out in front of the `%%%%%%%Plugin Name:` field label, and activate it after refreshing the Plugins list.


= Why are the strings not in the translation pane? =

For multilingual plugins to show the strings in the translation pane and to work effectively, the translation keys must be present in the database. To achieve this, please access the plugin’s settings page and click the ‘Save Settings’ button at the bottom of the window.

After this, all translatable configuration values will show up in the translation pane, even those that are not yet configurable on the settings page.


= Are rich-text category pages supported? =

Yes, [category pages](https://docs.woocommerce.com/document/allow-html-in-term-category-tag-descriptions/) are supported through the `term_description` hook, so that all features are fully functional as configured.

When using the A.N.R.GHG Publishing Toolkit, category pages are unaffected by the filter that would usually delete HTML markup, and may be drafted like pages in the Block Editor, kept as drafts, and copy-pasted from the Code Editor to the term description window. Eventual leftover block markup is removed at runtime.


= Are custom post types supported? =

Yes, the A.N.R.GHG Publishing Toolkit supports all post types applying the filters hooked on the `the_content` hook; for example, custom post types of [WooCommerce](https://woocommerce.com) like product pages are supported through this hook. Additionally it supports popups from [Popup Maker (Code Atlantic)](https://wordpress.org/plugins/popup-maker) by hooking on `pum_popup_content`, and from [Popup Builder (Sygnoos)](https://wordpress.org/plugins/popup-builder) by hooking on `sgpbSubscriptionForm`.

Beyond, it processes a configurable list of additional hooks. The only requirement for a content type is to apply filters on the content, using whatever hook. The name of that hook needs to be filled in an input field on the settings page, or in the configuration filter found among the templates under “Support alternative content hooks.” Multiple hook names are comma-separated.

For convenience, a dedicated hook is also available, that the A.N.R.GHG Publishing Toolkit adds filters to for subsequent application to a given content by calling the WordPress `apply_filters()` function:

`$content = apply_filters( 'anrghg_content_filter_hook', $content );`


= Are custom fields supported? =

Wysiwyg fields added using [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) are optionally processed for inline complements and other features as well, and complement lists are appended at the bottom of each field. That can be deactivated so that these fields would be processed as part of the post content if displayed accordingly.

Alternatively, when the hook that the field applies filters to is known, its name may be added to the content hooks in the settings.

The A.N.R.GHG Publishing Toolkit also adds numerous fields, among which the ‘first published date’ that will be displayed if its prefill has been changed in the Post Meta box.


= Can I use shortcodes instead of blocks? =

Yes, sort of. The A.N.R.GHG Publishing Toolkit does not rely on the WordPress Shortcodes API, because Shortcodes cannot be used to reliably process notes and sources. For example, the scheme is disabled in forms set up using the [WPForms plugin](https://wordpress.org/plugins/wpforms-lite/). Also, available options are too restricted and may exclude your preferred ones; so, not being internationalized, the shortcode API fails on Non-Latin shortcodes; and not being versatile, it cannot process delimiters made of brackets, braces, parentheses or other punctuation characters only.

Additionally, registered shortcodes are removed from other usages such as schema and meta descriptions for SEO. That is appropriate for most shortcodes, but may not be desirable for sources: Stripping off these complements may convey a misconception of the content as containing unsourced statements, and thus harm the website’s reputation.

On the other hand, the A.N.R.GHG Publishing Toolkit is fully compatible with the Classic Editor relying on shortcodes: Instead of using the blocks, fully configurable strings like `[anrghg_toc]` and `[/anrghg_section]` may be manually inserted, both with optional arguments.


= Can the appended message be edited in rich text? =

Yes, by configuring it in the Template editor. Then insert its name in the input field on the settings page or as a return value in the configuration filter.


= Can I use the post title in the appended message? =

Yes, to insert the title of the current post or page, please insert the placeholder %s in the template text.


= Why does the link to a code block not show up on hovering the code? =

As the code block is scrollable, its overflow is hidden, so any protruding elements like the paragraph link are cut off. To work around the issue, code blocks are wrapped into a paragraph, but this paragraph becomes two paragraphs due to the block level code block, and the first paragraph stops before the code. That is why the link shows up only when hovering the area in the margin before the start of the code.


= Does adding a paragraph break links to other paragraphs? =

In most cases not, because the identifiers that the A.N.R.GHG Publishing Toolkit assigns are content-based, both for Latin and for non-Latin scripts. These are URL-encoded, much like WordPress derives slugs from titles.

The main case where numbering is added is to disambiguate identical headings.

As paragraphs are unlikely to have identical beginnings spanning over more than 200 characters—the length that fragment identifiers are shortened to before cleaning up truncated last words—, every paragraph has a unique stable identifier, unless the underlying text is modified, resulting in the need to fix the fragment identifier.

HTML anchors set in the WordPress block inspector’s “Advanced” section have precedence over content-derived anchors. Like these, they are prepended with the post number. The part after this and the separator may be copy-pasted into that field to make an existing paragraph link insensitive to further edits, provided that the resulting discrepancy is not an issue.


= How to edit headings or paragraph starts without breaking links? =

By giving them an “HTML anchor” in the Block Inspector. For each heading, paragraph or list item, the A.N.R.GHG Publishing Toolkit uses its existing “HTML anchor” in the first place. Only if none is configured, it proceeds to derive a fragment identifier from the content.

If a URL with a content-based fragment ID is in use prior to editing the underlying content, then the existing ID may be grabbed in preview mode and copy-pasted into the “HTML anchor” input field without the prepended post ID, as this number is always prepended automatically to any ID.

Prepending the post number helps ensure that each ID is unique across the website, in support of the infinite scroll (AJAX autoload) feature.


= How to position the table of contents without the block? =

That is done by typing `[anrghg_toc]` or any bracketed string that this code is configured to.

Arguments between the code name and the closing bracket are also supported, and both names and values are designed for ease of input. Argument names are preceded by a space and start with an underscore. Values are delimited by vertical bars. The equals sign may or may not be space-padded:

* `Label tailored to the instance: _1=|Contents of ‘%s’|`, where `%s` is replaced with the post title (for tables after the post);
* `Alignment: _2=|0|` or `_2=|center|`, or `_2=|-1|` or `|left|`, or `_2=|1|` or `|right|`;
* `Collapsing behavior: `_3=|-1|` for expanded (and collapsible), or `_3=|1|` for collapsed (and expandable), or `_3=|0|` for uncollapsible.


= Why are level 1 headings supported? =

Stray level 1 headings do indeed have a negative impact on search engine rankings. Using H1 outside the post title is strongly discouraged. Also the heading formatting defaults to H2 in the Block Editor, while in the Classic Editor the shortcut Shift + Alt + 1 is deactivated. We are warned.

Yet multiple level 1 headings are in current use outside the web, so the support for H1 is consistent with standard word processing user experience. And when the .docx or .odt formats are converted to WordPress, headings are usually not downgraded (despite they should be), to prevent H6 from being degraded to paragraph level, since custom H7 markup is not well supported by the web.

The A.N.R.GHG Publishing Toolkit supports level 1 headings if they are present in an article body, because H1 formatting is available in WordPress, that inherits it from TinyMCE where it makes actual sense, as TinyMCE is also used in systems that may not feature an extra field for the page title.


= Do the added fragment IDs interfere with my custom anchors? =

No, because the “HTML anchor” configured in the Block Inspector is added right inside the element’s start tag, while the A.N.R.GHG Publishing Toolkit adds its IDs in an extra span.


= Can I have heading anchors also in a linked PDF? =

Yes if they are built-in; but these fragment identifiers are like scroll instructions. More universally, using URL parameters, scroll instructions may apply to any PDF opened in a browser:

To scroll to the page, add a hash to the PDF’s file name in the URL, then `page=` and the page number:

`domain.tld/folder/your-file.pdf#page=123`

To scroll to a heading in the page, append an ampersand, then `zoom=` and three comma-separated numbers: first the zoom factor in per cent (a zero is interpreted as 100%), next the X offset in pixels, then the Y offset. Basically you only need the third number, a best-guess determined by trial-and-error or measuring pixels so that the target heading displays a little below the upper viewport edge:

`domain.tld/folder/your-file.pdf#page=123&zoom=0,0,700`


= How is the table of contents expanded? =

The A.N.R.GHG Publishing Toolkit’s table of contents features a CSS-only transition when expanding or collapsing.

For AMP compatibility, JavaScript is avoided on public pages when the same behavior is not implementable in the [AMP framework](https://amp.dev/).


= What is the lone heading after the table of contents label? =

That happens after clicking a heading number while JavaScript is turned off, because expanding the table of contents from heading numbers relies on JavaScript (either in AMP or Vanilla); else, the scrolling wouldn’t work. So, without JavaScript, the target list item displays alone thanks to CSS, and the table of contents waits for its label or twistie being clicked to expand by CSS.

There is a small likelihood for the same to happen while JavaScript is on. On AMP pages, the related style rule is always valid, but after clicking a heading number (which is when it would come into play) it is overridden by another one, activated using the AMP framework. Reloading the page in that state would result in a lone heading as pointed in the question.


= How are complement lists expanded? =

The A.N.R.GHG Publishing Toolkit’s complement lists are expanding or collapsing by CSS only, with a slight transition.

For AMP compatibility, JavaScript is avoided on public pages when the same behavior is not implementable in the [AMP framework](https://amp.dev/).


= Why are complements not soft-linked? =

Compared to hard links, soft links have multiple downsides, while the disadvantage of using hard links is easily mitigated by hitting the backbutton instead of clicking backlinks. A configurable plain tooltip on hovering a backlink suggests this workaround, that will remove the anchor click from the browsing history.

Moreover, hard links allow accessing complements from outside, as they are the precondition of using the `:target` CSS selector to display the desired complement only, without expanding the whole list. That scheme always helps your visitors not be distracted from the other features and contents often displayed after or before the complement lists, notably the social icons and related posts. Your visitors may see these features as soon as looking up a complement in the list, as an alternative to checking it out in its tooltip.

Thanks to using hard links, no script is used, and since expanding and collapsing complement lists and tables of contents from their label is done without JavaScript likewise, the A.N.R.GHG Publishing Toolkit’s features are fully functional in browsers where JavaScript is turned off (and AMP actions won’t work either). Additionally, for convenience, CSS-based scroll offset as well as smooth scrolling are supported, too.


= Are identical complements combined? =

Yes, optionally identical notes or sources are combined into a single item with a single number. Thanks to using hard links, scrolling back up is performed by using the backbutton. For reference, all links to the instances where the complement is used are enumerated in a tooltip on hovering the complement number in the list.

Notes and sources are only combined section-wide. Identical complements occurring in several sections of a post or page appear once in every related list.


= What are the numbering options for notes and sources? =

Beside the standard Western Arabic digits, notes and sources may be numbered using Eastern Arabic digits, or be numbered each in a distinctive manner among Roman and Latin numerals, both available in lowercase and uppercase.


= Are long complements truncated for display in tooltips? =

Never, because the tooltips are styled in a way that truncating is unnecessary. When exceeding a configurable number of characters, the tooltip displays full-width even on desktops, and if it would exceed a configurable maximum height, it becomes scrollable.

That said, the A.N.R.GHG Publishing Toolkit supports a dedicated tooltip text, similar to WordPress’ manual excerpt feature. If the (configurable) `[/view]` delimiter is present in the complement, the text before is displayed as tooltip text, while the following text represents the complement in the list. This is linked to from the end of the tooltip, and from anywhere in the tooltip by delimiting the link text with `[link]` and `[/link]`, or any delimiters these are configured to.


= Can complements be nested? =

Yes, provided that the nested ones are sources, and those they are nested in are notes. Notes cannot be nested in sources, nor notes in notes, nor sources in sources. Only this nesting scheme is supported, but each note may include any number of nested sources:

* `…[note]…[src]…[/src]…[/note]`


= Can I start using other delimiters from now on? =

Yes, there is an option to configure the current delimiters separately along with the ID of the post where the new set of delimiters is used first. Currently this requires using configuration filters. Once that is done, new delimiters may be configured the usual way without affecting the older posts and pages.


= Can I delimit sections for complements without using the block? =

Yes, by ending the section with `[anrghg_section]` or any bracketed string that this code is configured to.

Arguments between the code name and the closing bracket are also supported, and both names and values are designed for ease of input. Argument names are preceded by a space and start with an underscore. Values are delimited by vertical bars. The equals sign may or may not be space-padded:

* List labels tailored to the instance: `_11=|Notes of ‘%s’|` and _12=|Our sources|, where `%s` is replaced with the post title;
* Writing direction tailored to the instance: `_21=|-1|` in Note list, `_22=|-1|` in Source list, or `_20=|-1|` in both lists, where `-1` is right-to-left, and `1` is left-to-right;
* Collapsing behavior tailored to the instance: `_31=|-1|` for the Note list, `_32=|-1|` for the Source list, or `_30=|-1| for both lists, where `-1` is expanded (and collapsible), `1` is collapsed (and expandable), and `0` is uncollapsible;
* Footer deferral: `_40=|1|` or `_40=|0|` for whether this instance must be deferred to the footer, or must not be deferred.


= Could multipage posts display all notes at the end? =

Multipage posts are [reported not to be properly indexed](https://wordpress.com/forums/topic/google-not-indexing-multi-page-posts-properly/), and they are not properly navigatable either, with page numbers at the bottom only, and no distinctive head zone for the extra pages. Thus, ‘Page break’ is a bogus feature and should never be used.

Being able to read the whole content merely by scrolling is much more user friendly. Consistently, implementing anything specifically for multipage posts would be wasting the time of all involved parties, which is why WordPress did not properly implement its multipage feature in the first place.


= How to reset the settings to default values? =

The easiest way is to import an empty file.

Alternatively, deleting the ‘anrghg’ row in the ‘wp-options’ table in the database has the same outcome.


= Why do setting descriptions not display in tooltips only? =

Info hover buttons would cause issues for either accessibility or keyboard navigation.

Thanks to the ‘Save settings’ button being constantly visible at the bottom of the window, the settings are not spatially constrained. If full tab navigation is active, the ‘Save settings’ button is active after each settings section.

Although the settings page is mostly visited at setup while information is wanted, but less often later on, the settings page verbosity is configurable at three levels, one of which is with information expand buttons. Another option fully hides almost all explanatory information.


= Why is the database so heavy? =

That is mainly due to WordPress documenting by default the full version history of every post and page.

If this is too much information and ends up taking too much disk space, with backups getting bulky, and potentially restoring the database would be hard, then revisions may be deactivated by defining the constant `WP_POST_REVISIONS` as false.

Another option is to limit the number of stored revisions as in the example provided in the file `template-wp-config.php`.



== Screenshots ==

1. Thank You message configuration settings and select box configuration.
2. Message and tooltip configured on the settings page; added dates.
3. Single note display on clicking its anchor, with optional URL display.
4. A rich scriptless source tooltip on desktop.
5. Anchor typography with optional commas, parentheses.
6. Notes and sources backlink tooltip configuration settings.
7. Rich and plain backlink tooltips of combined sources.
8. A responsive anchor tooltip.
9. Optional warning about a delimiter syntax error.
10. Shadow, padding and margin configuration settings.
11. References list optional bullet configuration select box.
12. Thank You message priority level setting, browser’s color picker, last modified date display configuration.



== Changelog ==

= 1.16.5 (2023-11-06) =

* Configuration filters: Debug filter application.
* Configuration filters: Clarify priority configuration.
* Internal CSS: Fix priority configuration.
* Priority configuration: Make WPautoP fix optional.
* Documentation: Changelog: Delete erroneous entry from the 1.16.4 changeset.
* Documentation: Streamline feature descriptions.

= 1.16.4 (2023-10-30) =

* Internal CSS: Move internal CSS from manually hard-coded style element to `wp_add_inline_style()`.
* Internal CSS: Add and enqueue an empty stylesheet for the purpose of getting the required handle.
* Internal CSS: Merge `stylesplit.php` into `styles.php` thanks to an infrastructure improvement.

= 1.16.3.1 (2023-10-29) =

* Documentation: Add the “Include HTML partial” feature to the short list.
* Documentation: Feature short list: Improve readability.

= 1.16.3 (2023-10-18) =

* Notes and sources: Lists: Correct number position in printed lists.

= 1.16.2 (2023-10-15) =

* Notes and sources: Lists: Fix display bug in collapsed state by removing row top margin since font size issue is fixed.
* Table of contents: Fix font size issue in collapsed state.
* Internationalization: Include partial: Block Inspector: Streamline informative texts.
* Documentation: FAQ item about database size and post revisions.
* Templates for wp-config.php: Suggest taking control of post revisions.

= 1.16.1 (2023-10-12) =

* Security: Add all ARIA attributes to the whitelist of the KSES filter.
* Blocks: Fix comments in JSON configuration files.
* Include partial: Block Inspector: Debug base directory display by overflow-wrap anywhere.
* Include partial: Block: Turn autocomplete on for the file path too.

= 1.16.0 (2023-10-10) =

* Include partial: Security: Apply KSES filter to the included partials, with opt-out for top-level Admins.
* Include partial: Add support for additional CSS classes, with new placeholder {{{anrghg-classes}}}.
* Include partial: Change existing placeholder name from {{{anrghg-placeholder}}} to {{{anrghg-value}}}.
* Include partial: Make both placeholder names configurable.
* Include partial: Setting for the base directory to enable relative paths in the path input.

= 1.15.0 (2023-10-07) =

* Include partial: New block in the “embed” category to include locally stored HTML partials.
* Notes and sources: Lists: Avoid widows and orphans instead of page breaks inside.

= 1.14.6 (2023-09-14) =

* Notes and sources: Prevent page breaks inside notes and sources in lists.

= 1.14.5 (2023-09-13) =

* Notes and sources: Debug font size of Note lists and Source lists.
* Notes and sources: Remove gap between Note list label and Source list label in collapsed state.

= 1.14.4 (2023-09-09) =

* Notes and sources: Debug number layout in print.

= 1.14.3 (2023-09-09) =

* Notes and sources: Remove list heading underline.
* Notes and sources: Debug printing.
* Reference lists: Debug printing.

= 1.14.2 (2023-09-08) =

* Reference lists: URL-encode configurable strings used in fragment identifiers.
* Table of contents: URL-encode configurable strings used in fragment identifiers.
* Notes and sources: URL-encode configurable strings used in fragment identifiers.
* Style rules: Correct identifier of the added internal CSS element.

= 1.14.1 (2023-09-07) =

* Slug body class: Escape sensitive characters in configurable strings.
* Table of contents: Escape sensitive characters in configurable strings.
* Reference lists: Escape sensitive characters in configurable strings.
* Notes and sources: Escape sensitive characters in configurable strings.
* Notes and sources: HTML parser: Debug inner HTML by admitting `>` characters.
* Notes and sources: Lists: Priority: Set default to lowest for compatibility.
* Notes and sources: Lists: Disambiguate source IDs in note tooltips to debug nested backlinks.
* Notes and sources: Debug tooltip padding for right-to-left scripts.
* Notes and sources: Debug tooltip padding for nested sources in note lists.
* Notes and sources: Debug fullwidth tooltips of nested sources in note lists.
* Notes and sources: Stray meta tags: Move to dedicated feature.
* Stray meta tags: Complete removal algorithm.
* Stray meta tags: Make removal from public pages the default behavior.
* Settings: Priority: Add warning about block disappearance if higher than 9 (from 8 downwards) for Notes and sources.
* Settings: Priority: Display warnings in the first place as must-read information i.e. always uncollapsible.
* Settings: Priority: Turn radio button red for highest priority.
* Settings: Priority: Show safe range in the first place before possible range.
* Settings: Fix grammar issues in variable strings.
* Style rules: Add identifier to the added internal CSS element.

= 1.14.0 (2023-08-21) =

* Accessibility: Settings: Section headings: To the top functionality when full tab navigation is active.
* Accessibility: Settings: Save buttons: Correct tab navigation by moving buttons before.
* Accessibility: Settings: Save buttons: Display info in section headings on focus.
* Notes and sources: Tooltips: Debug display of scrollable tooltips.
* Notes and sources: Backlinks: Prevent backlink link texts from line-wrapping.
* Notes and sources: Output anchor tooltip style rules on the condition of tooltip activation.
* Notes and sources: Output backlink tooltip style rules on the condition of identical complement combination.

= 1.13.0 (2023-08-15) =

* Accessibility: Settings: Replicate Save button at section headings when full tab navigation is active.

= 1.12.0 (2023-08-11) =

* Accessibility: Settings: More fluid tab navigation by skipping the section headings.
* Accessibility: Settings: Backup: Fix tab navigation disturbance.
* Accessibility: Settings: Optionally have all links and expand buttons tab navigable.
* Settings: User interface: Option for full tab navigability.

= 1.11.0 (2023-08-08) =

* Notes and sources: Priority: Change default to highest.
* Settings: Notes and sources: Priority: Move to top of Lists subsection.
* Settings: Customization: Add link to the Theme Editor.
* Settings: Customization: Advice for Custom CSS on multisite.
* Reference lists: Block: Move help from input label to help text.
* Accessibility: Settings: More fluid tab navigation by skipping all of the links.

= 1.10.2 (2023-07-01) =

* User experience: Scroll offset: Prevent WordPress from hiding the scroll padding.
* Customization: URL slugs: Use fallback title if title is empty or false.

= 1.10.1 (2023-06-21) =

* Settings: Security: Modify the warning about shared hosting, after validation by a hosting company.
* Documentation: Security: Modify the warning about shared hosting, after validation by a hosting company.

= 1.10.0 (2023-05-27) =

* Settings: Security: Add a warning in the Security section introduction.
* Documentation: Security: Add a warning in the Security notice of the Installation section.
* Documentation: Security: Add a warning in the Security feature description.
* Documentation: Security: Add a warning in the “How about using jQuery?” FAQ item.
* Documentation: Change the plugin name from “A.N.R.GHG Publishing Helper” to “A.N.R.GHG Publishing Toolkit”.
* Documentation: Rename the template files from `tpl-*.php` to `template-*.php`.
* Documentation: Remove the sample `anrghg-thanks-block.json` file for now.

= 1.9.4 (2023-05-19) =

* Security: Provide code to deny access to `wp-config.php` alongside `debug.log`.
* Documentation: Add security recommendation in the Installation section.
* Documentation: Add the new webfont feature to the feature list.

= 1.9.3 (2023-05-17) =

* Performance: Web fonts: Preconnect only once even when multiple fonts are loaded.

= 1.9.2 (2023-05-17) =

* Customization: Web fonts: Add link to Google Fonts library.
* Performance: Web fonts: Preconnect to Google Fonts.
* Interoperability: Restore compatibility with PHP 5.6 lost in v1.9.1 due to fast-tracking a security fix.

= 1.9.1 (2023-05-17) =

* Security: Add recommendation and code to deny access to the debug.log file if any exists.

= 1.9.0.2 (2023-05-09) =

* Documentation: FAQ: Correct item about recommendation for jQuery using plugin.

= 1.9.0.1 (2023-05-08) =

* Documentation: Add server memory limit requirement.
* Documentation: FAQ: Add item about memory limit issues.
* Documentation: FAQ: Add recommendation for jQuery using plugin.
* Documentation: FAQ: Correct item about setting tooltips.

= 1.9.0 (2023-04-14) =

* Settings: Interoperability: Split off new section about Customization.
* Customization: Option to load web fonts.
* Notes and sources: Lists: Footer deferral: Fix algorithm.
* Slug body class: Class or ID sanitization: Fix algorithm.
* Localization: Include configuration for VSCode extension to process PO files for en_US, en_GB.

= 1.8.4 (2022-12-07) =

* Localization: IDs and slugs: Fragment identifiers: Debug dash and apostrophe conversion to hyphen-minus.

= 1.8.3 (2022-11-11) =

* Post Meta box: Table of contents: Debug fieldset legend.
* Settings: Improve user interface text strings.
* Translation: Continue French to 18%.

= 1.8.2 (2022-11-10) =

* Split `admin/includes/settings.php` into 8 files.

= 1.8.1 (2022-11-10) =

* Settings: Fix right-to-left position of To-the-top button.
* Template editor: Add pre-1.8.0 ‘Move into editor’ as an option.
* Settings: Template editor: Add option for moving into editor in text mode.
* Internationalization: Increase synergy with WordPress Core, adding context.

= 1.8.0 (2022-11-08) =

* Template editor: Debug ‘Move into editor’ buttons, reverting to v0.80.5.
* Template editor: Add warning not to use ‘Move into editor’ buttons in text mode.
* Template editor: Default-deactivate pointy bracket unescaping.
* Settings: Template editor: Unescape pointy brackets: Add switch.
* Settings: Template editor: Rich text list view: Add switch.
* Settings: Notes and sources: Tooltips: Position: Add subsection.
* Settings: Notes and sources: Tooltips: Position: Offset: Add settings.
* Settings: Notes and sources: Tooltips: Position: Max width: Reorder.
* Settings: Notes and sources: Tooltips: Scrollable: Add setting.
* Settings: Notes and sources: Tooltips: Length breakpoint: Rename setting.
* Settings: Notes and sources: Tooltips: Font size: Add setting.
* Settings: Notes and sources: Tooltips: Line height: Add setting.
* Translation: Continue French and Spanish translations up to 12% and 6% respectively.

= 1.7.8 (2022-11-05) =

* Templates: Debug when there are no templates.
* Settings: Security: Reorder information.

= 1.7.7 (2022-10-28) =

* Translation: Streamline strings consistently.

= 1.7.6 (2022-10-23) =

* Import: Clarify the various button semantics.
* Localization: Import: Increase synergy with WordPress Core.
* Settings: Thank You message: Margin: Add missing information.
* Date information: Support also category pages and date-based archives.

= 1.7.5 (2022-10-16) =

* Import: Debug error assessment.
* Import: Provide more fine-grained information about where the error may reside.
* Import: Include overwriting templates, by completing the control structure.
* Import: Stop dying on file errors, with error messages displayed on a white screen.
* Import: Display error messages normally, using the built-in WordPress feature.
* Settings: Streamline added information to “Its submenu contains at least Templates and Settings.”

= 1.7.4 (2022-10-15) =

* Import: Add pinning functionality to headings.
* Import: Make success message always visible no matter the scroll position.
* Import: Fix error handling.
* Settings: Highlight and advertise pinning functionality.
* Settings: Admin menu: Add missing information about “The main menu item submenu always contains Templates and Settings.”

= 1.7.3 (2022-10-09) =

* Settings: Menu level: Fix menu level transition bug occurring when changed.
* Settings: Menu level: Remove the checkbox configuring submenu item removal.
* Settings: Display the reworded success message independently of menu level.
* Settings: Prevent page from always scrolling to top on reloading after save.
* Settings: Make success message always visible no matter the scroll position.

= 1.7.2 (2022-10-08) =

* Admin pages: Debug current options page slug while settings are not saved or empty.
* Import: Fix red button style on hover and on active.

= 1.7.1 (2022-10-02) =

* Import: Debug display of success message.
* Import: Display error message instead of dying on problem in custom option name input field.
* Internationalization: Fix localization syncing with WordPress Core.

= 1.7.0 (2022-09-27) =

* Thank You message: Text align setting in the toolbar.
* Table of contents: Configurable backlink plain tooltips.
* Admin pages: Header menu: Display also when Export/Import not in submenu.

= 1.6.22 (2022-09-26) =

* Template editor: Move ‘Save Changes’ button away from Admin menu to fix submenu access.
* Templates: Remove empty elements coming in from saving empty editors.
* Import: Settings: Fix menu level transition bug.

= 1.6.21 (2022-09-22) =

* Localization: IDs and slugs: Fix independency of extra conversions.
* Settings: Localization: IDs and slugs: Reorder settings consistently.
* Settings: Localization: IDs and slugs: Update more descriptive texts.

= 1.6.20 (2022-09-20) =

* Date information: Prevent custom post types from causing variables to be undefined.
* Localization: IDs and slugs: Stop deleting percent signs, URL-encode them instead.
* Localization: IDs and slugs: Stop performing no-opt-out character conversions.
* Localization: IDs and slugs: Stop removing all ‘Symbols-other’ characters.
* Localization: IDs and slugs: Minimize risk of fixes being overridden.
* Localization: IDs and slugs: Warn about slug input fields not applying the full set of fixes.
* Localization: IDs and slugs: Leave punctuation unless accent removal is opted in for, as else dumbing down slugs would be pointless.
* Settings: Fix Admin submenu access by moving ‘Save Changes’ button to the opposite.

= 1.6.19 (2022-09-12) =

* Notes and sources: Anchor tooltips: Restore direct child combinators to debug nested tooltips.
* Settings: Notes and sources: Lists: Footer deferral: Output buffering: AMP: Advise to edit child theme footer instead.

= 1.6.18 (2022-09-07) =

* Localization: IDs and slugs: Fix sanitization by removing full classes.
* Notes and sources: Lists: Correct line top and bottom padding.
* Reference lists: Correct line top and bottom padding.

= 1.6.17 (2022-09-06) =

* Localization: IDs and slugs: Maintain plus sign instead of letting it turn into space then hyphen-minus.
* Localization: IDs and slugs: Stop always deleting acute, grave, circumflex accents, macron and hacek.
* Localization: IDs and slugs: Optionally remove the full set of combining diacritics.
* Localization: IDs and slugs: Remove the full set of format control characters.
* Localization: IDs and slugs: Convert Latin alphabetic abbreviation indicators.

= 1.6.16 (2022-09-05) =

* Localization: IDs and slugs: Debug portions starting with an ampersand and ending with a semicolon.

= 1.6.15 (2022-09-04) =

* Thank You message: Remove direct child combinator from CSS, for AMP compatibility.
* Notes and sources: Tooltips: Remove direct child combinators from CSS, for AMP compatibility.
* Slug body class: Debug CSS compliant class names without ASCII characters.
* Slug body class: Sanitize the “sanitized” plain ASCII class, for CSS compatibility.
* Slug body class: Add low priority to make sure it keeps working past WordPress v6.

= 1.6.14 (2022-09-04) =

* Localization: Extended page slugs: Force lowercase to prevent 404 errors.

= 1.6.13 (2022-09-03) =

* Slug body class: Make prefix configurable for test purposes.

= 1.6.12 (2022-09-03) =

* Settings: Localization: Streamline acknowledgements.
* Settings: Add or update acknowledgements.
* Settings: Slug body class: Prefix configuration setting.

= 1.6.11 (2022-09-02) =

* Slug body class: Fix bug occurring when class starts with a hyphen followed by a digit 0-9.
* Slug body class: Add simplified class based on post ID.
* Slug body class: URL-decode the page slug.
* Slug body class: Additional class based on non-sanitized slug.

= 1.6.10 (2022-09-01) =

* User experience: Scroll offset: Change CSS so it fits AMP.

= 1.6.9 (2022-08-31) =

* Paragraph links: Highlight target link character.

= 1.6.8 (2022-08-30) =

* Paragraph links: Debug links added to code blocks.

= 1.6.7 (2022-08-29) =

* Table of contents: Debug scroll offset in collapsible tables.

= 1.6.6 (2022-08-29) =

* Scroll behavior: Smooth scrolling: Enforce behavior when switch is off.
* Scroll behavior: Scroll offset: Make universal for consistent user experience.
* Table of contents: Set end padding from 0 to 7 pixels (awaiting setting).

= 1.6.5 (2022-08-27) =

* Localization: PO files: Debug language information.
* Internationalization: Option to switch between sync and proper.

= 1.6.4 (2022-08-26) =

* Localization: Debug translatable strings.
* Notes and sources: Not process code elements.
* Notes and sources: Effectively remove underline on anchors and backlinks.
* Date information: Published first: Support templates.

= 1.6.3 (2022-08-24) =

* Settings: Backup: Previews: Correct user experience.
* Template editor: Debug success message when in Admin submenu.
* Conversion: Debug success message when in Admin submenu.
* Import: Add nonce verification.

= 1.6.2 (2022-08-23) =

* Thank You message: Fix line breaks, emulate paragraph breaks.
* Settings: Notes and sources: Combine identical: Move from Lists to Anchors section.

= 1.6.1 (2022-08-22) =

* Settings: Backup: Templates: Debug preview toggle.
* Conversion: Debug editor tabs for localization.
* Settings: Streamline localization through Backlink tooltip aspect subsection.

= 1.6.0 (2022-08-21) =

▶ The Thank You message template select configuration is required to change syntax. The only possible separators are space and newline. The previous separator, comma, is allowed in template names. We apologize for the disruption and the inconvenience.

▶ Two added blocks need to change category: The “Thank You message” and “Reference list” blocks were previously in the Design section. As they are about writing and formatting text and lists, they should be moved to the Text section. Making the category configurable for all added blocks is projected. Thank you for your understanding.

* Settings: Expandable information: Fix accessibility.
* Blocks: Debug auto-generated preview of editor block.
* Thank You message: Debug template select configuration.
* Thank You message: Block: Correct category: “Text”, not “Design”.
* Reference list: Block: Correct category: “Text”, not “Design”.
* Reference list: Block: Correct name from plural to singular.

= 1.5.10 (2022-08-20) =

* Security: Debug authentication cookie duration configuration.
* Settings: To the top button: Debug on mobiles.
* Settings: Subsections: Leading label: Improve readability.
* Settings: Subsections: Remove excess padding above and below.

= 1.5.9 (2022-08-19) =

* Settings: Glide switches: Remove excess padding around.
* Date information: Chronological order: Set default to no throughout.

= 1.5.8 (2022-08-18) =

* Table of contents: List items: Make no underline more robust.
* Settings: Collapsing behavior: Reorder options for consistency.
* Options pages: Display top menu only if no top level Admin menu entry.
* Settings: Settings table of contents: Fix column break.
* Settings: Settings table of contents: Fix visibility of some features.

= 1.5.7 (2022-08-17) =

* Heading links: Debug prepended link text when there is no table of contents.
* Table of contents: Block: Fix design and textual information.
* Notes and sources: Backlinks: Fix upper padding.
* Notes and sources: Backlink tooltips: Debug in target-displayed rows.
* Notes and sources: Footer lists: Change default text color from blue to green.

= 1.5.6 (2022-08-16) =

* Post Meta box: Debug data saving by removing `wp_unslash()`, additionally to removing `sanitize_option()`.
* Notes and sources: Block: Add missing collapsing behavior implementation.

= 1.5.5 (2022-08-15) =

* Localization: Add four missing sublocale MO files.
* Settings: Protect must-read information against becoming invisible.
* Notes and sources: Lists: Remove excess spacing below due to collapsed lines.
 
= 1.5.4 (2022-08-14) =

* Localization: Streamline Gettext strings to alleviate workload.
* Localization: Inform translators about collapsible and hidden information.
* Notes and sources: Evaluate tooltip length on the basis of inner HTML.

= 1.5.3 (2022-08-13) =

* Table of contents: Remove excess spacing below due to collapsed lines.
* Import: Fix template overwrite button color for safety and legibility.
* Import: Improve submit button label readability.
* Notes and sources: Fix template resolution for CJK with localized space.
* Localization: Make space and dash localization available for public pages.
* Reference list: Block: Debug label input placeholder.
* Table of contents: Block: Fix undefined Gettext function bug.

= 1.5.2 (2022-08-12) =

* Notes and sources: Debug post-wide templates preceded by more text.

= 1.5.1 (2022-08-05) =

* Notes and sources: Block: Fix design of minimal display mode.
* Security: Admin bar: Move status icon at the very end of potentially added menus.
* Internationalization: Make sentence-separating space localizable.
* Internationalization: Improve context definition of sentence-separating dash.

= 1.5.0 (2022-08-01) =

▶ Delimiter presets for easy input are changing. If easy default delimiters based on square brackets are in use, and this plugin’s Settings page was not saved since v1.4.7, please save it BEFORE UPGRADING, in order to not be disrupted. Thank you.

* Security: Display login status in Admin bar.
* Notes and sources: Delimiters: Ditch square brackets due to interference with Block Editor shortcut.

= 1.4.14 (2022-07-31) =

* Reference list: Fix CSS error in transition property after 1.4.13.

= 1.4.13 (2022-07-31) =

* Notes and sources: Lists: Fix insufficient spacing between heading and first list item.
* Reference list: Fix insufficient spacing between heading and first list item.

= 1.4.12 (2022-07-27) =

* Notes and sources: Tooltips: Debug fullwidth tooltip and its nested tooltips.

= 1.4.11 (2022-07-26) =

* Notes and sources: Tooltips: Debug tooltip of source nested in note.

= 1.4.10 (2022-07-25) =

* Notes and sources: Lists: Debug visibility of target item on clicking anchor.

= 1.4.9 (2022-07-24) =

* Notes and sources: Tooltips: Debug responsive layout for mobile.

= 1.4.8 (2022-07-20) =

* Notes and sources: Debug expansion functionality on clicking label.
* Reference list: Debug expansion functionality on clicking label.
* Reference list: Block: Correct label and design.
* Thank You message: Block: Correct label and design.

= 1.4.7 (2022-07-19) =

* Notes and sources: Centralize delimiter preset configuration.
* Notes and sources: Get delimiter presets saved to the DB.

= 1.4.6 (2022-07-18) =

* Backup: Fix uploads directory for multisite installations.
* Template editor: Remove backup preview and bulk upload advice.
* Import: Templates: Clarify label of ‘Import and Add’ button.
* Settings: Backup: Correct display of backup paths of templates, settings.
* Settings: Backup: Add hint about the bulk-upload of templates.

= 1.4.5 (2022-07-17) =

* Security: Remove security parameter configuration filters for security reasons.

= 1.4.4 (2022-07-15) =

* Thank You message: Debug Gutenberg block for multisite networks by fixing table of contents activation.
* Table of contents: Remove full deactivation option as useless and causing a bug in multisite networks.
* Table of contents: Change default to ‘Insert a table of contents if specified accordingly’, and fix legacy.

= 1.4.3 (2022-07-15) =

* Thank You message: Prevent last message from block from interfering with default message.
* Post Meta box: Debug saving data by removing `sanitize_option()`.
* Settings: Change background color of quoted code from gray to white.

= 1.4.2 (2022-07-14) =

* Export: Debug process by debugging .docx ➔ WordPress conversion process.
* Export: Make existing option name a requirement.
* Export: Add own heading to reordered templates.
* Settings: Move ‘Option to deactivate WPTexturize’ to ‘Localization’.
* Settings: Move ‘URL slug as a CSS selector’ to ‘Interoperability’.
* Settings: Clarify the relationship between the two ‘ID max length’ settings.
* Settings: Graceful error handling.
* Template editor: Graceful error handling.
* Export/import: Graceful error handling.
* Conversion: Graceful error handling.

= 1.4.1 (2022-07-11) =

* Security: Settings: Add missing nonce field.
* Security: Settings: Add nonce verification condition to settings saved message.
* Security: Conversion: Add dual nonce fields and verification.
* Heading links: Remove tooltips from heading numbers.
* Heading links: Make CSS more robust, cross-theme compatible.
* Localization: Allow uppercase in identifiers: Change default from yes to no.

= 1.4.0 (2022-07-10) =

▶ The security feature’s login screen high and standard profiles should not be used unless the dialog is not useful any longer. Also it is recommended to define the constant in a mini-plugin using the included template, and to delete its definition in `wp-config.php`.

* Security: Discourage standard and high profile login screen options.
* Security: Recommend defining the login control constant in a mini-plugin.

= 1.3.1 (2022-06-29) =

* Conversion: Fix bug caused by ignoreFile comment added for linter.

= 1.3.0 (2022-06-28) =

* Upgrade notice: Debug and test display after escapement.

= 1.2.2 (2022-06-28) =

* Code: Improve online editability of Export, Import, Format conversion and Template editor pages.

= 1.2.1 (2022-06-27) =

* Import: Fix bug in exit statements.

= 1.2.0 (2022-06-27) =

* Import: Templates: Clarify the interface.
* Import: Custom: Check if provided option name does exist.
* Import: Fix bug in exit statement display.

= 1.1.1 (2022-06-27) =

* Template editor: Backup preview: Improve page searchability by adding the same display toggle as on Settings.

= 1.1.0 (2022-06-25) =

* Security: Internal style sheets: Escape style tag elements and arguments.
* Settings: Backup: Previews: Add scriptless display toggle.
* Settings: Improve page searchability by removing backup data preview display from default view.
* Settings: Backup: Make tab navigation more fluid by skipping how-to and preview items.

= 1.0.4 (2022-06-23) =

* Localization: Update translations to fix bugs in wording.
* Template editor: Improve fix of bug appearing at plugin activation.

= 1.0.3 (2022-06-22) =

* Notes and sources: Anchor tooltips: Fix display bug.
* Notes and sources: Backlink tooltips: Fix display bug.

= 1.0.2.1 (2022-06-22) =

* Documentation: Add screenshots.

= 1.0.2 (2022-06-22) =

* Security: Flush unsafe previous versions from the repository.

= 1.0.1 (2022-06-22) =

* Code: Split six files off `anrghg.php` to keep the code editable online.

= 1.0.0 (2022-06-22) =

▶ Plugin re-listing: As of 2022-06-21, this plugin has been re-listed in the Plugin Directory.

* First production release.

= 0.81.9 (2022-06-20) =

* Template editor: Fix bug in form by using correct escapement function and whitelist.

= 0.81.8 (2022-06-20) =

* Code: Fix remaining formatting issues before submission.

= 0.81.7 (2022-06-20) =

* Security: KSES whitelist: Extend global attributes for a11y.
* Security: Escape Settings page, Templates editor, other Admin pages.
* Security: Stall unimplementable security patches.
* Notes and sources: Fix bug in deactivation setting in Post Meta box.
* Notes and sources: Replace checkbox with radio buttons in Post Meta box.

= 0.81.6 (2022-06-18) =

* Security: KSES whitelist: Fix bug in whitelist extension.
* Security: Stop trying to use a global KSES whitelist.
* Security: Date meta tags: Tailor KSES whitelists to the instance.

= 0.81.5 (2022-06-18) =

* Security: Internal style sheets: Secure output.
* Security: Internal style sheets: Restore direct child selectors.
* Security: KSES: Try implementing the whitelist with extensions.

= 0.81.4 (2022-06-17) =

* Revert to 0.81.0, fix broken plugin, remove KSES.
* Template files: Keep latest versions.
* Template editor: Fix alignment of ‘Move into editor’ buttons.
* Admin pages: Header menu: Add plain tooltips.

= 0.81.3 (2022-06-16) =

* Security: Settings: Escape UI elements and information.
* Security: Post Meta box: Escape UI elements.
* Template editor: Remove pointy bracket conversion.
* Template editor: Fix alignment of ‘Move into editor’ buttons.
* Admin pages: Header menu: Add plain tooltips.

= 0.81.2 (2022-06-15) =

* Security: Settings: Escaping output: Correct `wp_kses()` with custom whitelist POC.

= 0.81.1 (2022-06-15) =

* Security: Settings: Escaping output: `wp_kses()` with custom whitelist POC.

= 0.81.0 (2022-06-14) =

* Security: Remove Custom CSS feature and CSS configuration filters.

= 0.80.9 (2022-06-14) =

* Security: Make login deactivation profile global to fix bug in login deactivation screen.
* [Stalled: Security: Escape output on Settings page.]

= 0.80.8 (2022-06-12) =

* Security: CSS: Remove direct child selectors so as to be able to use `wp_kses_post()`.
* Security: Revert escaping JavaScript using `esc_js()` to prevent deactivating single quotes.
* Refactor: Shorten configuration keys to max 44 characters to avoid PHPCS alignment issues.
* Bugfix: Configuration arrays: Replace `+` with `array_merge()`.
* Bugfix: `sanitize_title` filter.

= 0.80.7 (2022-06-11) =

* Security: Escape minified JavaScript code using `esc_js()` for output as internal script.
* Security: Replace `json_encode()` with `wp_json_encode()`.

= 0.80.6 (2022-06-10) =

* Settings: Revert 0.80.5 sanitization of hexadecimal color codes with `sanitize_hex_color()`.
* Security: Sanitize all filtered configuration values using `wp_kses_post()`.
* Security: Export/import: Escape file name using `sanitize_file_name()`.
* Security: Export/import: Escape file contents using `wp_kses_post()`.
* Template editor: Debug 'Move into editor' button: Make button functional in Text mode too.
* Template editor: Mitigate a bug occurring when clicking the ‘Move into editor’ button after switching to Text mode.
* [Stalled: Security: Escape minified JavaScript code using `esc_js()` for output as internal script.]

= 0.80.5 (2022-06-10) =

* Network Admin: Plugin action links: Revert wrong 0.80.3 edit.
* Admin pages: Sanitize page titles using `esc_html()` before output.
* Settings: Sanitize hexadecimal color codes using `sanitize_hex_color()` before output.
* Slug as body class: Sanitize the class name using `sanitize_html_class()`.

= 0.80.4 (2022-06-09) =

* Security: Export/import: Custom option: Sanitize the option name input field value.
* Security: Fix bug due to the auth cookie not being editable regardless what Boolean the constant is defined as.

= 0.80.3 (2022-06-07) =

* Network Admin: Plugin action links: Add a warning by lack of the `Delete` action.

= 0.80.2 (2022-06-07) =

* Settings: Fix bug causing the right-to-left page to x-scroll out of the viewport.

= 0.80.1 (2022-06-05) =

* Template editor: Fix bug appearing at plugin activation.

= 0.80.0 (2022-06-04) =

* Submission for re-review.
* Test in WordPress 6.0.
* Change license from ‘GPLv2’ to ‘GPLv2 or later’ with respect to the AMP-HTML framework.
* Meta box: Display in page editors too.
* Move NPM and Webpack configuration to admin/ next to the block source and production files.

= 0.79.0 (2022-06-02) =

* Documentation: Update contact information and home page address.

= 0.78.0 (2022-05-31) =

* Documentation: Comply with [Forum guidelines](https://wordpress.org/support/guidelines/) by not mentioning specific webhosts.

= 0.77.1 (2022-05-29) =

* Settings: Text align setting: Move the ‘Center’ option from ‘Writing direction sensitive’ to ‘Stable across locales’.

= 0.77.0 (2022-05-07) =

* Notes and sources: Adapt base-26 alphabetic Latin numbering system to 1-based numbering.
* Notes and sources: Delimiter syntax error warning (optionally hidden or deactivated).
* Notes and sources: Tooltips: Add transition timing function.
* Settings: Date information: Alignment, margins, font size and color for posts/pages at top/end.
* Settings: Notes and sources: Tooltip timing settings.
* Settings: Notes and sources: Lists: Backlink tooltips: Aspect configurable independently.
* Settings: Delete trailing commas in function arguments to restore compatibility with PHP 5.6.

= 0.76.0 (2022-04-30) =

* Settings: Padding and margin input field arrays.
* Reference list: Change transition timing for opacity at collapsing to improve aspect.
* Notes and sources: Change transition timing for opacity at collapsing lists to improve aspect.
* Conversion: Import section for upcoming format conversion .docx ➔ WordPress with inline complements.

= 0.75.0 (2022-04-28) =

* Thank You message: Debug styling of messages inserted by block following 0.73.0 CSS debugging.
* Thank You message: Setting in the Block Inspector to add one out of ten CSS classes.
* Thank You message: Headline in the block, hinting that templates are supported.
* Settings: Border radius setting in the border settings.
* Notes and sources: Stop transitioning opacity at collapsing lists to avoid ugly crowded overlay.
* Reference list: Stop transitioning opacity at collapsing to avoid ugly crowded overlay.

= 0.74.0 (2022-04-23) =

* Localization: Support titlecase in fragment identifiers.
* Localization: Maximum length of slugs and fragment IDs freely configurable.
* Localization: Optionally generate post/page slugs the alternative way, too.
* Settings: Paragraph links: Maximum length configurable separately.
* Settings: Reference lists: Bigger choice of bullets in the select box.
* Settings: Thank You message: Border and shadow.
* Settings: Notes and sources: Anchor tooltips: Colors, border and shadow.
* Settings: Get screen readers to read unicodes as prefixed hex numbers.
* Notes and sources: Clean up stray meta tags in the content.
* Export/import: Feature to freely configure an additional option name.

= 0.73.0 (2022-04-18) =

* Heading links: Optional, configurable tooltip ’Permalink to this heading’.
* Thank You message: Debug CSS in case of nested divs coming in from the template.
* Template editor: Display a warning when unable to move template into editor.
* Dates: Output inline CSS on the condition of activation only.
* Notes and sources: Tooltips: Add output hook.
* Output hooks: Collapse spaces in output.

= 0.72.0 (2022-04-17) =

* Reference list: Support 6 numbering systems and optionally a configurable bullet.

= 0.71.0 (2022-04-16) =

* Table of contents: Debug insertion.
* Settings: Anchor tooltips: Add missing callback function.
* Thank You message: Optionally display on home page.
* Thank You message: Comma-separated list in settings for message select dropdown in Post Meta box.
* Paragraph links: Optional, configurable tooltip ’Permalink to this fragment’.
* Settings: Move fragment ID max length setting from ‘Paragraph links’ to ‘Localization’.

= 0.70.0 (2022-04-13) =

* Settings: Thank You message: Foreground and background color settings.
* Settings: Debug composite adjacent radio button labels.
* Settings: Menu position: Display the full radio button labels.
* Settings: Security: Login screen profile: Fix layout of the radio button labels.
* Settings: Interoperability: Option to turn off URL line wrap anywhere.
* Settings: Notes and sources: Options to deactivate the ‘Read more’ link in dedicated tooltips for notes or for sources.
* Notes and sources: Fix bug in AMP full list expansion on clicking an anchor.
* Notes and sources: Tooltips: Optionally toggle display on tap to work around context menu interference on mobiles.
* Settings: Template editor: Option to choose TinyMCE behavior on Enter.
* Settings: Template editor: Option to choose between TinyMCE and plain textarea.
* Reference list: Label element and font size configurable.

= 0.69.0 (2022-04-07) =

* Thank You message: Add output hooks.
* Output hooks: Improve existing templates.
* Reference list: Print: Debug expanded display, hide twistie.
* Notes and sources: Optional numbering with Roman, Latin or Eastern Arabic digits.
* Notes and sources: Lists: Print: Debug expanded display, hide twistie.
* Settings: Reference lists: Make list item link optional.
* Settings: Header menu on admin pages to palliate the lack of admin menu items.

= 0.68.0 (2022-04-02) =

* Security: Authentication cookie duration: Hard-code the restriction to one year plus a week.
* Export/import: Import: Templates: Correct default behavior to merge, not overwrite.
* Export/import: Import: Templates: Add alternative form to import and overwrite templates.
* Export/import: Export: Templates: Show reordered data for convenience with explanation.
* Settings: New section about excerpts.
* Excerpts: Automatic excerpt generation redesign becomes optional and may be turned off.
* Excerpts: Application of ‘the_content’ filters to manual excerpts now optional.
* Excerpts: Option to apply ‘the_content’ filters to automatic excerpts.
* Notes and sources: Anchors: Fix line break in front of opening punctuation by prepending a word joiner.
* Notes and sources: Option to space out the anchor by (fixed-width) CSS or by (justifying) space character.
* Settings: Notes and sources: Anchors: Add glide switch to deactivate the prefixed word joiner.

= 0.67.0 (2022-03-29) =

▶ Plugin closure: As of 2022-03-21, this plugin has been temporarily closed pending a full review. In this new setup, no urgent bug fixes nor upgrade notices are required any longer. We beg the Plugin Directory’s pardon for the unfinished state, as initial release was fast-tracked in response to user requests for AMP compatible endnotes. We are striving to get the A.N.R.GHG Publishing Helper completed as soon as possible. Thank you for your understanding.

* Template editor: Debug display of TinyMCE color pickers included in WordPress.
* Template editor: Remove TinyMCE Color Picker plugin internalized for security.
* Export/import: Import: Fix bug in redirect when the page is in the Tools submenu.
* Export/import: Support templates too.
* Export/import: Export: Display previews of the data.
* Notes and sources: Anchor separator: Fix formatting.
* Notes and sources: Anchor separator: Support mixed sequences.
* Reference list: Numbered list instead of bullet list.
* Reference list: Direct link to each list item in its number.
* Reference list: Transitioning expansion and collapsing.
* Settings: Reference lists: ARIA label for reference items configurable.
* Settings: Reference lists: Configurable plain tooltip on item numbers.
* Settings: Reference lists: URL ID prefix configurable.

= 0.66.0 (2022-03-24) =

* Settings: Security: Raise information and settings to top position on settings page.
* Paragraph links: Optional lower, configurable length limit on fragment identifiers.
* Notes and sources: Backlinks: Plain tooltip preset: Replace U+2B05 with ordinary left arrow.
* Interoperability: Additional content hooks: Change name from `anrghg_content_filter_hook` to `anrghg_the_content`.
* Settings: Interoperability: Add information about editing term descriptions, with links to plugin and issue.
* Settings: Interoperability: Link Elementor and Yoast SEO to the respective pages in the Plugin Directory.
* Settings: User interface: Clarify and rename the ‘Gutenberg blocks’ settings field.
* Settings: Add ‘Reference lists’ settings section.
* Settings: Reference lists: ARIA label, label, collapsible behavior, priority level configurable.

= 0.65.2 (2022-03-22) =

* Notes and sources: Lists: Fix bug in line height of target row.

= 0.65.1 (2022-03-22) =

* Notes and sources: Lists: Fix bug in backlink symbol.
* Settings: Notes and sources: Lists: Fix bug in backlink symbol select box.

= 0.65.0 (2022-03-22) =

* Localization: Add support for the remaining 4 English sublocales, copied from en_GB.
* Notes and sources: Lists: Lightweight transition by CSS when expanding and collapsing.
* Reference list: Lightweight transition by CSS when expanding and collapsing.
* Settings: Notes and sources: Lists: Backlink symbol select box and position settings.
* Settings: Notes and sources: List and group label elements optionally configurable.

= 0.64.0 (2022-03-21) =

* Localization: Set up language support for Spanish and all 9 sublocales supported in WordPress.
* Internationalization: Debug plugin short and long name localization.
* Notes and sources: Lists: Labels and group heading: Debug font size.
* Notes and sources: Anchor tooltips: Replace paragraph breaks and double line breaks with a paragraph break emulator span.
* Settings: Notes and sources: Group heading font size optionally configurable.
* Settings: Notes and sources: List label font size optionally configurable.

= 0.63.1 (2022-03-19) =

* Settings: Notes and sources: Dedicated tooltips: Sources: Fix index error.
* Settings: Notes and sources: Generic tooltips activatable and configurable.

= 0.63.0 (2022-03-19) =

* Interoperability: Optional support for Advanced Custom Fields.
* Notes and sources: Ability to process custom fields separately.
* Settings: Interoperability: Move Elementor test mode activation from `wp-config.php` to settings.
* Settings: Interoperability: Setting to control whether HTML is allowed in term descriptions.
* Settings: Localization: Fragment identifier separator configurable.
* Settings: Notes and sources: Adjacent anchor separator configurable, not mandatory any longer.
* Settings: Notes and sources: Anchor prefix and suffix configurable.
* Settings: Notes and sources: ARIA labels for anchors freely configurable.
* Settings: Notes and sources: Excluded posts and pages configurable by post IDs.
* Settings: Notes and sources: New section dedicated to anchors.
* Settings: Notes and sources: Reorder sections about lists and anchor tooltips.
* Settings: Notes and sources: Setting to configure the anchor ID prefix.
* Settings: Options to collapse textual information, expanded by default.
* Settings: Separate sections Localization, Interoperability.
* Settings: Table of contents: Fragment identifier priority level configurable.
* Settings: Table of contents: Heading URL ID prefix configurable.
* Settings: Table of contents: Optional heading level indentation configurable.
* Settings: Table of contents: Top level heading font weight configurable.
* Settings: User experience: Setting for generic mobile breakpoint.
* Settings: User experience: Settings for generic list top and bottom margins.

= 0.62.12.2 (2022-03-13) =

* Documentation: Updates.

= 0.62.12.1 (2022-03-13) =

* Settings: Complement list group heading font size unit.
* Documentation: Updates.

= 0.62.12 (2022-03-13) =

* Updates.

= 0.62.11 (2022-03-06) =

* Internationalization: Update configuration files.
* Localization: Add en_GB and en_US (as a minimum).
* Settings: Localization and interoperability: Fix spelling error.
* Blocks: Update plugin name after adding dots for 0.62.6.
* Blocks: Description: Internationalize plugin long name and ‘Notes and sources’ block name.

= 0.62.10 (2022-03-04) =

* Admin pages: Debug submenu items ‘Export’ and ‘Import’ when deactivated while menu level is top.
* Plugin list: Debug action links when submenu items ‘Export’ and ‘Import’ are deactivated while menu level is top.
* Export/import: Debug page titles when submenu items ‘Export’ and ‘Import’ are deactivated while menu level is top.
* Admin pages: Internationalization: Make space-padded em dash localizable for any eventuality.
* Settings: Settings table of contents: Get hover highlighting consistent with link area.

= 0.62.9 (2022-03-03) =

* Admin pages: Restore page title when no menu item (as is the default).

= 0.62.8 (2022-03-03) =

* Settings: Localization and interoperability: Increase identifier legibility: Fix typo in placeholder inserting anchor element end tag.
* Settings: Fix lack of whitespace in glide switch effect information display since 0.62.6.
* Configuration filters: Shorten file name `configuration-filters.php` to `tpl-filter-config.php`.
* Output filters: Rename `process-filters.php` to `tpl-filter-output.php`.
* WordPress configuration additions: Shorten template file name `wp-config-additions.php` to `tpl-wp-config.php`.
* Mini plugin template: Shorten file name `mini-plugin-template.php` to `tpl-mini-plugin.php`.

= 0.62.7 (2022-03-02) =

* Post Meta box: Correct Table of contents section label when block is not in the post.
* Settings: Add new name variable to the parameters passed to the callback functions.
* Settings: Remove a trailing comma after multiline arguments, for PHP backwards compatibility.

= 0.62.6 (2022-03-02) =

* Post Meta box: Debug the label with respect to accessibility and design.
* Post Meta box: Fix screen reader output by replacing the table captions with fieldset labels.
* Plugin initialism: Add dots for readability by screen readers.
* Plugin initialism: Add dots to prevent mistaking it as a misspelled interjection in all caps.
* Style sheets: Reduce CSS footprint by improving a minification algorithm for CSS.

= 0.62.5 (2022-02-27) =

* Term descriptions: Debug provisional option added for 0.62.4.
* Settings: Additional CSS: Debug i18n by using newline-free strings in the placeholder text.
* Settings: Gutenberg blocks: Activate by default blocks deactivated with the feature (‘Table of contents’, ‘Notes and sources’).

= 0.62.4 (2022-02-25) =

* Settings: Replace ‘Shared configuration’ with ‘User experience’.

= 0.62.3 (2022-02-23) =

* Export/import: Fix internationalization bug in ‘Export’ and ‘Import’ titles and submenu labels.

= 0.62.2 (2022-02-22) =

* Settings: Restore compatibility with PHP 5.6 by correcting four instances of novel syntax.

= 0.62.1 (2022-02-21) =

* Table of contents: Stop preventing long headings from line-wrapping.

= 0.62.0 (2022-02-21) =

* Admin menu: Debug submenu item removal checkbox.
* Export/import: New dedicated pages where the feature is functional for the settings.

= 0.61.5 (2022-02-20) =

* Settings: Fix bug in submit button.
* Notes and sources: Remove number and tooltip text from fragment identifiers also when processed at higher priority.
* Admin menu: Optional export page and import page for settings and templates (provisional).

= 0.61.4 (2022-02-20) =

* Internationalization: Fix warnings about multiple translator comments in WP CLI.
* Localization: Update folder name in translations `load_plugin_textdomain()` function.
* Localization: Provisional `anrghg-fr_FR.po` and `anrghg-fr_FR.mo` files for test purposes.
* Settings: Submit button: Prevent checkboxes from displaying over the ‘Save Changes’ button.
* Settings: Submit button: Position closer to the bottom viewport edge on mobiles.
* Settings: UI elements: Complete refactoring to improve scalability and maintainability.

= 0.61.3 (2022-02-19) =

* Settings: Fix error in function generating fieldset markup.
* Settings: Notes and sources: Debug internationalization of delimiter configuration UI elements.
* Settings: UI elements: Resume pending refactoring tasks to improve scalability and maintainability.

= 0.61.2 (2022-02-18) =

* Settings: Fix syntax for PHP 5.6 compatibility.

= 0.61.1 (2022-02-18) =

* Settings: Fix bug due to suspended refactoring.

= 0.61.0 (2022-02-18) =

* Reference list: Debug column number while waiting for separate configuration.
* Settings: URL slug as a CSS selector: Add missing placeholder text in the switch label.
* Admin menu: Internationalize submenu labels for synergy with WordPress Core.
* Reusable complement editor: Rename page to ‘Templates — Template editor’ for consistency with submenu label.
* Template editor: Save button: Internationalize label for synergy with WordPress Core.
* Template editor: Save button: Add plain tooltip hinting to edit the list fields directly.
* Settings: Save button: Internationalize label for synergy with WordPress Core.
* Localization: Add POT file (provisional).
* Localization: Fix and complete the placeholders and comments for Translators.
* Settings: Extend discrete radio button template to be fully versatile.
* Conversion: Save button: Internationalize label for synergy with WordPress Core.

= 0.60.7 (2022-02-16) =

* Settings: Dates: Reorder label configuration fields consistently with activation checkboxes.
* Settings: Avoid the word “Custom” as this is about configuration, not customization.

= 0.60.6 (2022-02-15) =

* Settings: Debug and correct UI labels and descriptions.
* Settings: Reimplement a select box function.
* Settings: Fix HTML markup.

= 0.60.5 (2022-02-14) =

* Settings: Security: Debug the section’s broken introductory text.
* Settings: Notes and sources: Lists: Rich backlink tooltips: Fix accessibility bug.
* Settings: Notes and sources: Lists: ARIA labels: Fix accessibility bug.
* Settings: Notes and sources: Lists: List link text: Fix accessibility bug.
* Settings: Notes and sources: Anchor tooltips string length breakpoint: Fix accessibility bug.
* Settings: Notes and sources: Lists: Rich backlink tooltips: Fix bug in the second input field.
* Settings: Notes and sources: Lists: Plain backlink tooltips: Fix bug in the input fields.
* Settings: Notes and sources: Tooltips: Mobile breakpoint: Add expected datalist for input of breakpoints as enumerated.

= 0.60.4 (2022-02-13) =

* Settings: Fix bug in screen reader text disturbing browser search scrolling.
* Settings: Fix bug in fieldset legend to remove screen reader text from browser search results.
* Settings: Adjacent radio buttons: Correct fieldset markup start and end tag positions.

= 0.60.3 (2022-02-11) =

* User interface: Plugin action links: Menu level: Fix bug causing PHP 7.4 to throw a notice.
* Settings: User interface: Properly internationalize strings with nested WordPress menu labels.
* Settings: User interface: Consistency of radio button labels with behavior and displayed strings.
* URL slug as a CSS selector: Fix bug appearing when the slug is empty.

= 0.60.2 (2022-02-10) =

* User interface: Plugin action links: Menu level: Fix PHP 7.4 Notice when adapting targets to configuration.

= 0.60.1 (2022-02-10) =

* Settings: Catch up missing refactorings of the settings page code.

= 0.60.0 (2022-02-10) =

* Settings: Add option to not add the Admin menu items at all, in the menu level setting.
* Admin menu: Change default from submenus to not adding any menu items at all, access from the Plugins list entry.
* Settings: Add checkboxes to individually deactivate Settings page, Template editor, Conversion (draft).
* Settings: Post Meta box: Change default to not adding the Meta box, and all elements to display by default once activated.
* Settings: Gutenberg blocks: Change default to not adding any blocks.
* Settings: Backup: Update the preview labels on clicking the switches.
* Reference list: Styles: Fix undefined variable and mobile breakpoint.
* Menu level: Fix array offset notice by changing strict to loose comparison.

= 0.59.1 (2022-02-05) =

* Settings: Table of contents: Hide screen reader fieldset legend by updating class name.

= 0.59.0 (2022-02-05) =

▶ The setting for inclusion of generated list labels in the table of contents has been moved from ‘Notes and sources’ to ‘Table of contents’, and it now includes ‘Reference lists’. As a consequence, the key name needed to be changed and its meaning inverted. The feature has been redesigned and does not rely on priority levels any longer; these are now freely configurable and need to be monitored if those labels should actually be included in the table of contents. Hoping that the new design is more convenient, we apologize for the change.

* Reference list: Include in the generated lists for control of exclusion from table of contents.
* Table of contents: Replace setting key `anrghg_complement_lists_in_table_of_contents` with `anrghg_table_of_contents_exclude_generated` for consistency.
* Settings: Table of contents: Include Reference lists in the `Exclude from table of contents` setting.
* Settings: Notes and sources: Lists: Move the `Display in table of contents` setting to the `Table of contents` section and invert its meaning.

= 0.58.8 (2022-02-04) =

* Settings: Remove excessive spacing above glide switches by deleting CSS added for 0.58.7.
* Settings: Extend clickable area of radio button and checkbox labels to the maximum width.
* Settings: Notes and sources: Priority level: Correct error in for ID of one label to make it clickable.
* Settings: Priority level: Set in bold consistently the info about WPTexturize deactivation depending on priority level.
* Settings: Additional CSS: Restore text area height.

= 0.58.7 (2022-02-03) =

* Reusable complement editor: Fix display on mobiles.
* Settings: Fix display on mobiles.
* Settings: Fix input element visibility on hovering label with colored background.

= 0.58.6 (2022-02-02) =

* Plugins list: Debug action link targets.
* Settings: Thank You message: Debug Reusable complement editor link target.

= 0.58.5 (2022-02-02) =

* Reference list: Fix bottom spacing.
* Plugins list: Fix bugs in plugin’s list entry.

= 0.58.4 (2022-02-01) =

* Backups: Store backup files of configuration and reusable complements each in a distinct folder.
* Backups: Correct backup file names with respect to using only hyphens, no underscores.
* Backups: Correct non-date-stamped backup file name display by adding ‘-latest’.
* Post Meta box: Thank You message: Double input field height, append help text to the placeholder.
* Post Meta box: Published first information: Textareas instead of single line input fields.
* Settings: Update documentation by replacing underscores with hyphens (0.58.0) in CSS selectors.
* Settings: Fix glide switch label height property for display on mobiles without overlapping.
* Settings: Debug mobile display by fixing the Table of contents alignment input field set and the width of the glide switches.
* Settings: Thank You message: Fix link to the Reusables page, dead when the main menu item was active.
* Settings: Update UI texts following the 0.58 enhancements.

= 0.58.3 (2022-01-31) =

* Reference list: Debug label configuration placeholder and help.
* Table of contents: Change block output to discreet positioner not standing as garbage when feature is off.
* Table of contents: Stop escaping vertical bars, remove related browser alert and its deactivation setting.
* Notes and sources: Change block output to discreet positioner not standing as garbage when feature is off.
* Notes and sources: Stop escaping vertical bar, remove related browser alert and its deactivation setting.
* Notes and sources: Lists: Backlink symbol: Select box: Remove 41 confusable or less supported symbols from options (provisional).

= 0.58.2 (2022-01-30) =

* Reference list: Formatting effective.

= 0.58.1 (2022-01-29) =

* Thank You message: Fix reusables processing outage since 0.58.0 affecting messages added by block.
* Reference list: Add missing block markup processing to generate functional standalone Reference list (provisional).
* Notes and sources: Lists: Backlink symbol: Relabel and reorder select box option groups (provisional).

= 0.58.0 (2022-01-28) =

▶ The CSS classes must use hyphens, not underscores. We apologize for having used underscores and hurried to replace all underscores with hyphens in CSS class names except those derived from setting keys on the settings page.

* Thank You message: New block to configure and position one or multiple messages.
* Reference list: Add block infrastructure to configure Reference lists (provisional).
* CSS selectors: Comply to standard usage by replacing underscores with hyphens in class names except those derived from setting keys.

= 0.57.0 (2022-01-26) =

* Notes and sources: Optional tail backlink appended to the complement text in the list.
* Notes and sources: Restore scroll offset by adding missing offset anchor class to complement list rows.

= 0.56.0 (2022-01-26) =

▶ More setting keys required renaming to enhance intuitivity and consistency, after the renamings required by the 0.55.0 minor release. We apologize for the disruptions caused by these improvements.

* Security: Remove login constant customization from configuration filters.
* Notes and sources: Option to configure previous delimiters prior to a configurable post ID using filters.
* Notes and sources: Configuration filter to deactivate the delimiters configured in the Post Meta box.
* Documentation: Template file `mini-plugin-template.php` for easy setup of a mini plugin for filters.
* Documentation: Templates: WordPress configuration: Templates for debugging mode.
* Documentation: Rename `templates-for-configuration-filters.php` to `configuration-filters.php`.
* Documentation: Rename `templates-for-process-hooks.php` to `process-filters.php`.
* Documentation: Rename `templates-for-additions-to-wp-config.php` to `wp-config-additions.php`.
* Documentation: Rename `customized-documentation-schema.txt` to `documentation-schema.txt`.

= 0.55.8 (2022-01-24) =

* Compatibility: Elementor Integration: Check if test mode flag constant is defined.

= 0.55.7 (2022-01-24) =

* Compatibility: Elementor Integration: Restore effectiveness.
* Compatibility: Elementor Integration: Move test mode flag constant to `wp-config.php`.
* Date meta tags: Close quotation marks at tag end.

= 0.55.6 (2022-01-24) =

* Compatibility: Elementor Integration: Correct erroneous flag.

= 0.55.5 (2022-01-24) =

* Notes and sources: List heading margin top correction while configuration upcoming.
* Table of contents: Table heading margin top correction while configuration upcoming.
* Date information: Prevent isolated dates from being accessed by tab, to avoid screenreader output of technical information out of context.
* Date information: Underline on focus and on hover.
* Compatibility: Elementor Integration: Thank You message: infrastructure.

= 0.55.4 (2022-01-23) =

* Table of contents: Remove spacing before table heading.
* Notes and sources: Remove array shift to fix headings configured in block.
* Notes and sources: Remove spacing before list headings.

= 0.55.3 (2022-01-22) =

* Heading numbers: Debug style by adding the `:any-link` selector to remove unwanted underline.
* Date information: Remove unwanted underline by using appropriate style rules like for heading numbers.

= 0.55.2 (2022-01-22) =

* Notes and sources: Debug list group heading level.

= 0.55.1 (2022-01-21) =

* Notes and sources: Block: Data: Fix bug by updating two missed instances of a variable name.
* Notes and sources: Change `anrghg_source_url_id_prefix` default value from `ref` to `source`.
* Settings: Notes and sources: Lists: Collapsing behavior: Update a variable name for consistency.

= 0.55.0 (2022-01-20) =

▶ In expectation of the oncoming Reference list block that may be used to configure collapsible Reference lists as well as short bibilographies and ‘Further reading’ boxes, the word ‘References’ is now being avoided when referring to ‘Notes and sources’. For consistency, intuitivity and ease of maintenance also with respect to users of configuration filters, all related setting keys need to be changed, and the code name of the related block should also be updated since it appears in the post source text and may be used in an automatically added class name, and block-internal attribute names because of their output in markup for storage purposes. Existing blocks keep working but are not editable. Legacy notes-and-references blocks may be converted to HTML by clicking ‘Keep as HTML’ in order to copy the values to a new instance of the block. We apologize for the disruptions, underscoring that the plugin is still declared as in development.

* Notes and sources: Change 'ref' and 'reference' to 'source', 'references' to 'sources' in setting keys, Post Meta keys, block attribute names and the block name.
* Notes and sources: In the process, improve more Post Meta key names.
* Settings: Security: Debug display value of the login control constant end input field for input by copy-paste, autocomplete, or with turned-off JavaScript support.
* Configuration filters: Notes and sources: Debug prefill in list link delimiter configuration filter templates.

= 0.54.5 (2022-01-19) =

* Thank You message: Add missing support for post title placeholder in messages inserted by block (provisional).
* Thank You message: Add missing mention of the post title placeholder below the text area in the Post Meta box.
* Notes and sources: Correct suboptimal ‘References’ to ‘Sources’ in prefills and documentation about complements.
* Settings: Add subsection for complement lists.

= 0.54.4 (2022-01-18) =

* Thank You message: Eliminate failure to parse for reusable complements the messages added by block (provisional).

= 0.54.3 (2022-01-17) =

* Settings: Eliminate multiple accessibility bugs affecting input fields, labels or descriptions.

= 0.54.2 (2022-01-17) =

* Settings: Debug accessibility of the collapsible behavior and collapsed state settings.

= 0.54.1 (2022-01-17) =

* Settings: Debug accessibility of three checkboxes by removing erroneous argument from markup.

= 0.54.0 (2022-01-17) =

* Thank You message: Debug effectiveness of styles by removing the activation condition.
* Settings: Options to remove any of the three added blocks from the block library Design section.
* Settings: Debug complement tooltips section by updating changed function name.
* Settings: Correct section headings, section fragment identifiers, some wording and markup.
* Settings: Correct markup of checkbox fields and labels for consistency with radio buttons.

= 0.53.0 (2022-01-15) =

* Thank You message: Configurable in Post Meta box, never fully deactivated.
* Notes and sources: Deactivation per post as configured in the Post Meta box.
* Paragraph links: Complete the preset options list for the link character.
* Settings: New section ‘Shared configuration’ for settings used in several features.
* Settings: Debug page display on mobiles by fixing the two backup previews.
* Settings: Display direct links to settings sections in two columns except on mobiles.

= 0.52.0 (2022-01-13) =

* Paragraph links: Fix configuration user interface by adding a select box.
* Paragraph links: Include link character configuration in `wpml.config` for localization.

= 0.51.0 (2022-01-12) =

▶ The format of the complement block configuration data output has been upgraded due to the addition of settings for collapsible property and collapsed state of lists. Support for the initial format is maintained, and the data storage remains unchanged. When reopening a post in the Block Editor: Please click ‘Attempt Block Recovery’, and everything will be as configured. We apologize for the inconvenience.

* Notes and sources: Block Inspector: Configuration settings for collapsible property and collapsed state.
* Notes and sources: Settings page: Rich and plain backlink tooltip configuration.

= 0.50.2 (2022-01-10) =

* Settings: Rename two keys again for consistency with the naming pattern used for other keys.
* Upgrade Notice: Update 0.50.0 notice accordingly.

= 0.50.1 (2022-01-09) =

* Upgrade Notice: Add notice at 0.50.0 about renamed setting keys.
* Settings: Rename several keys to rectify misleading or incomplete names and improve intuitivity and user experience with string translation panes and configuration filters.
* Multilingual: Support localizable setting keys ahead of implementing the related settings on the settings page.
* Multilingual: Debug `anrghg_note_list_label_aria_label` and `anrghg_reference_list_label_aria_label` by updating key names in file `wpml-config.xml`.
* Configuration filters: Debug `anrghg_note_list_label_aria_label` and `anrghg_reference_list_label_aria_label` by updating key names in file `wpml-config.xml`.
* Documentation: Mention configuration filters for anchor and number ARIA labels, anchor pre- and suffixes and separator, ID elements, and backlink tooltips.

= 0.50.0 (2022-01-07) =

▶ Two setting keys needed to be renamed because their names were confusing, while they may be read by users of string translation panes or configuration filters: `anrghg_list_aria_label_notes` to `anrghg_list_label_aria_notes`, and `anrghg_list_aria_label_references` to `anrghg_list_label_aria_references`. For 0.50.1, as this notice is added—apologies for delay—, two other keys need to be renamed because their names were misleading: `anrghg_tooltip_read_more_link_text_note` to `anrghg_complement_tooltip_list_link_text_note`, and `anrghg_tooltip_read_more_link_text_reference` to `anrghg_complement_tooltip_list_link_text_reference`. In the same move, several keys used in the ‘Notes and sources’ feature, including the first two, are renamed for consistency and completeness to improve intuitivity and user experience with configuration filters. For 0.50.2, `_complement` in the two keys above is replaced with the moved `_note` or `_reference`. We apologize for the inconvenience and hope that the improvements outweigh the trouble of reconfiguring existing installations.

* Priority configuration: Deactivate `wpautop()` if priority is less (higher) than 11.
* Notes and sources: Remove raw instances from form field values for easier processing.
* Notes and sources: Anchors: ARIA hidden for screenreaders to read ARIA label instead.
* Notes and sources: Anchors: Remove screenreader text spans.
* Notes and sources: Anchors: Streamline ARIA label configuration with %d placeholder.
* Notes and sources: Option for full list display from anchor click if JavaScript is on (AMP compatible).
* Notes and sources: Settings for list collapsing behavior on settings page.
* Notes and sources: Settings for list collapsing behavior in Post Meta box.
* Scroll behavior: Scroll offset: Use CSS scroll-margin-top property.

= 0.49.2 (2022-01-06) =

* Notes and sources: Footer deferral of lists: Debug effectiveness of configuration per instance.

= 0.49.1 (2022-01-05) =

* Date information: Published first information: Debug the feature for robustness across changing prefill configuration.
* Post Meta box: Reduce sometimes too big font sizes through fixed style rules.
* Post Meta box: Table of contents: Collapsing: Reorder radio buttons.
* Post Meta box: Notes and sources: Lists: Footer deferral: Reorder radio buttons.
* Block Inspector: Table of contents: Collapsing: Reorder radio buttons.
* Block Inspector: Notes and sources: Lists: Footer deferral: Reorder radio buttons.

= 0.49.0 (2022-01-05) =

▶ The setting keys `anrghg_meta_box_complements_dir` and `anrghg_meta_box_list_footer_deferral` needed to be renamed to `anrghg_meta_box_complements_writing_direction` and `anrghg_meta_box_complement_list_footer_deferral` respectively, for clarity, to improve maintainability. Since their default value is `0`, the eventually checked checkboxes will be unchecked again, and the settings disappear from the meta box, and conversely for `anrghg_meta_box_list_labels` renamed to `anrghg_meta_box_complement_list_labels`. We apologize for the inconvenience.

* Notes and sources: Debug arrays of parsed block or positioner arguments.
* Notes and sources: Add footer deferral argument array to debug parsed argument array initialization.
* Notes and sources: Correct precedence of configuration levels to debug footer deferral effectiveness.
* Notes and sources: Debug footer output by removing the condition about the general setting.
* Notes and sources: Delimiter configuration in Post Meta box.
* Paragraph links, heading links: Use existing ID if configured as HTML anchor in the Block Inspector.

= 0.48.5 (2022-01-03) =

* Settings: Better sync sentences across different settings to simplify oncoming localization.
* Settings: Table of contents: Label: Add information about configuration per instance.
* Settings: Table of contents: Alignment: Move setting down to come before position setting.
* Settings: Table of contents: Depth: Move setting up to come after number setting.
* Settings: Typography: Add description and source.
* Configuration filters: Typography: Add source.
* Configuration filters: Notes and sources: Improve documentation.
* Configuration filters: Notes and sources: Tooltips: Move related filters into this new section.

= 0.48.4 (2022-01-03) =

* Configuration filters: Argument documentation mistake correction.
* Settings: Table of contents: Move up collapsible behavior setting for consistency.

= 0.48.3 (2022-01-02) =

* Settings: Paragraph links: Add feature description under the section title.
* Settings: Table of contents: Add or change descriptions of some settings.
* Configuration filters: Update docblocks in sync with settings.
* Documentation: Add FAQ item ‘Why do setting descriptions not display in tooltips only?’

= 0.48.2 (2022-01-02) =

* Settings: Date information: Debug preview by redesigning the script.
* Settings: Date information: Add description under section title.
* Settings: Date information: Move ordering settings up.
* Settings: Better sync with configuration filter templates.
* Configuration filters: Improve documentation.

= 0.48.1 (2022-01-01) =

* Settings: Corrections, updates and improvements to user interface texts.
* Configuration filters: Sync with settings page.

= 0.48.0 (2021-12-31) =

* Settings: Dedicate an extra section to complement tooltips with respect to upcoming styling options.
* Settings: Move all existing settings related to complement tooltips into the new section.
* Notes and sources: Differentiate tooltip read complement link text depending on whether it links to a note or a reference.
* Notes and sources: Configuration of tooltip read note/reference link text.

= 0.47.0 (2021-12-27) =

* Security: Debug localization of deactivated login screen message.
* Security: Add process hook to change the message.
* Table of contents: Document manual positioner arguments on the settings page.
* Table of contents: Support space padding around equals signs and inside brackets in manual positioner codes.
* Notes and sources: Remove leading slash from configurable manual section end code default, consistently with code inserted by block.
* Notes and sources: Add arguments for note and reference list collapsing behavior tailored to the instance.
* Notes and sources: Document manual section end code arguments on the settings page.
* Notes and sources: Support space padding around equals signs and inside brackets in manual positioner codes.

= 0.46.0 (2021-12-21) =

* Security: Update demo template based on configurable login control constant in real time.
* Settings: Interoperability: Add missing placeholder text in hook names input field.
* Settings: Move Interoperability section up, after General options and before Security.
* Settings: Separate General options section into Backups and User interface sections.

= 0.45.0 (2021-12-18) =

* Security: Multisite support through configurable login action deactivation control constant.
* Configuration filters: Correct typo in `anrghg_table_of_contents_collapsing` hook name.
* Configuration filters: Add support for table of contents alignment.
* Configuration filters: Update default value of table of contents manual positioner.
* Configuration filters: Add support for complement section manual end delimiter.
* Configuration filters: Update easy input suggestion for complement tooltip end delimiter.
* Configuration filters: Add support for multiline Custom CSS added in a theme’s `functions.php`.
* Configuration filters: Document unsupported hooks so as not to be considered missing.

= 0.44.1 (2021-12-14) =

* Thank You message: Add demo for placeholder and markup in prefill.

= 0.44.0 (2021-12-14) =

▶ Apologies for current delays in development, due to urgent investigation on food transition.

* Thank You message: Message configurable in Template editor, same syntax.
* Thank You message: Placeholder %s to insert the post title.

= 0.43.2 (2021-12-12) =

* Settings: Correct text color for higher contrast throughout.

= 0.43.1 (2021-11-27) =

* Security: Debug optional authentication cookie lifespan editing. Apologies for the late debugging.

= 0.43.0 (2021-11-10) =

▶ The easy preset dedicated tooltip text end delimiter `\\` is replaced with `||`. We apologize for this change, that is about preferring consistency and intuitivity over ease of input on a US-QWERTY. If you are using `\\`, please input it in the free configuration field and switch to `freely configured`.

* Notes and sources: Replace easy preset dedicated tooltip text end delimiter `\\` with `||`.

= 0.42.3 (2021-11-05) =

* Reusable complement editor: Reactivate the tab stop on ‘Move into editor’ buttons for accessibility (deactivated in 0.20.1).

= 0.42.2 (2021-11-03) =

* Table of contents: Provide alternative input for left, center, right as -1, 0, 1.
* Notes and sources: Correct values for footer deferral tailored to the instance: 1 for yes, 0 for no.

= 0.42.1 (2021-10-31) =

* Complement anchor tooltips: Add a left and right margin of 6% to the fullwide tooltips.
* Documentation: Urge to increase the WordPress memory limit (a template is included).

= 0.42.0 (2021-10-29) =

* Table of contents: Collapsing behavior configurable also in the Block Inspector.
* Documentation: Notes and sources: Terminology: Use common ‘anchor’ instead of rare ‘referrer’.

= 0.41.3 (2021-10-22) =

* Table of contents: Collapsing: Take configuration into account from Post Meta box.
* Notes and sources: Fix bug in writing direction value when writing direction setting in Post Meta box is unset.
* Heading links: Fix synergy bug in complement list labels by restricting added markup.
* Post Meta box ‘Complements’: The ‘Published first’, writing direction, and footer deferral settings now deactivated by default.

= 0.41.2 (2021-10-22) =

* Table of contents block: Take into account the new label setting in the Post Meta box.

= 0.41.1 (2021-10-22) =

* Table of contents: Shorten the labels of the collapsing behavior configuration UI elements.

= 0.41.0 (2021-10-21) =

* Notes and sources: Support added text on both sides of a reused complement simultaneously.
* Notes and sources: Support multiple reusable complements nested in a single complement.

= 0.40.1 (2021-10-21) =

* Documentation: Updates.
* Notes and sources: Nest reusable complements: Define missing feature.

= 0.40.0 (2021-10-20) =

▶ The `[/excerpt]` delimiter ending a dedicated tooltip text was a misnomer and needs to be replaced with `[/view]`. If `[/excerpt]` is already in use, the tooltip end delimiter may be configured accordingly when choosing the `free` option rather than a preset. We apologize for the inconvenience of not keeping it as the default ('safe') configuration.

* Settings: Notes and sources: Double preset plus free configuration scheme for names, tooltip text and list links.
* Dedicated content filter hook available.
* Login deactivation: High profile screen message customizable using the new process hook.
* Output filters: Start documenting in new file `templates-for-process-hooks.php`.

= 0.39.0 (2021-10-19) =

* Table of contents: Alignment configuration in meta box.
* Table of contents: Alignment configuration in settings page.
* Table of contents: Collapsing behavior configuration in meta box.

= 0.38.0 (2021-10-18) =

* ‘Support alternative content hooks’ configuration setting and filter template.
* Table of contents: Label: The placeholder %s inserts the post title.
* Table of contents: Label configurable also in Post Meta box.
* Fix bug in meta box UI element selection checkboxes.
* Notes and sources: Settings: Configuration of the name end delimiter.
* Notes and sources: Settings: Configuration of the tooltip text end delimiter.
* Notes and sources: Settings: Configuration of the list link start and end delimiters.

= 0.37.0 (2021-10-17) =

* Settings: Localization: Fragment identifiers: Switch to control whether or not to remove diacritics from Latin letters.
* Settings: Localization: Fragment identifiers: Option to add some more letter conversions.
* Settings: Localization: Fragment identifiers: Text area (and configuration filter template) to configure additional conversions.
* Post Meta box: Activate by default as its collapsed state is stored and it remains deactivatable.

= 0.36.0 (2021-10-16) =

▶ The last modified and published date labels have now a placeholder for the date. That is required for internationalization, but we overlooked it up to now. Our apologies for missing out on this requirement, and for the inconvenience of editing the labels already saved. Please add a per cent sign followed by the letter s where the date shall display.

* Date information: Fix internationalization bug in labels by using `%s` placeholder.
* Date information: Post Meta box: Input fields to manually add ‘Published first’ information at the top or bottom.
* Settings: Configuration of the ‘Published first’ information prefills in the Post Meta box.
* Notes and sources: Switch to include or exclude the list labels in/from the table of contents.
* Notes and sources: Fix bug in heading level of last list (group) label.
* Notes and sources: Configuration of the priority level for relative list positioning.

= 0.35.2 (2021-10-15) =

* Fix automatic excerpt generation.
* Notes and sources: Process complements in manual excerpts.
* Table of contents: Block: Toolbar: Alignment buttons: Style reflecting state.

= 0.35.1 (2021-10-14) =

* Notes and sources: Fix bug in heading level in the presence of a group heading.
* Category pages: Apply fix provided by WooCommerce to allow rich descriptions.
* Paragraph links: Remove complements from fragment identifiers.
* Table of contents: Remove complements from headings as list items.
* Notes and sources: Debug tooltips on anchors in headings with heading link.
* Heading links: Fix the design in the presence of complement anchors.

= 0.35.0 (2021-10-14) =

* Table of contents: Setting in the block to tailor the label to the instance.
* Table of contents: Switch alignment in the block toolbar with left/center/right/unset buttons.
* Table of contents: Fix text alignment bug due to novel CSS not supported in all browsers.
* Heading numbering: Support position before, as well as generic arrow after without number.
* Notes and sources: New setting for alternative display style of optionally expanded URLs in lists.
* Notes and sources: Tooltips: Automatically enters full-width layout on desktop depending on length.
* Notes and sources: Tooltips: Scrollable tooltips to contain long complements without exceeding the page.
* Notes and sources: Tooltips: Layout threshold values configurable.
* Notes and sources: Setting to deactivate collapsing identicals as depending on the citation style.
* Notes and sources: Setting to deactivate processing widgets separately, as widgets may occur in the post.
* Notes and sources: Option to cut the post into sections based on top-level subheadings.

= 0.34.3 (2021-10-11) =

* Support the content of popups from Popup Builder (Sygnoos).
* Complement list labels: ARIA label only if a given label is definitely empty.
* Complement list labels: Outline on focus on display toggle for keyboard navigation.
* Complement list group heading: Make keyboard navigatable for consistency,
* Settings: Fix input field layout by adding outline not border on focus.
* Reusable complement editor: Names in use list height to adapt to varying toolbar height.

= 0.34.2 (2021-10-10) =

* Support the content of popups from Popup Maker (Code Atlantic).
* Settings: Notes and sources: Lists: Label for the group heading input field.

= 0.34.1 (2021-10-10) =

* Settings: Fix excessive spacing in some instances of glide switches.
* Settings: Fix vertical spacing around text input fields and labels.

= 0.34.0 (2021-10-09) =

▶ The date meta tags have 4 new option key names for greater flexibility. Please review the setting if you are using it. Our apologies for the disruption.

* Settings: Date meta tags: Flexible configuration with 4 checkboxes and dynamic preview replacing 2 radio buttons.
* Settings: Notes and sources: Lists: Configuration for the labels and ARIA labels.
* Settings: Complement section block UI elements configuration.

= 0.33.0 (2021-10-08) =

▶ The name and format of the configurable table of contents positioner have changed. Please review the setting if you are using it.

* Paragraph links: Support also code blocks and other preformatted blocks.
* Notes and sources: New (soon optional) Wikipedia-style list group heading.
* Complement list labels: Programmatically determine the accurate heading level.
* Complement list labels: Limit the increased top margin to small screens.
* Complement list labels: Add bottom margin in expanded state.
* Notes and sources: Fix (previously hidden) bug due to an array with undefined offsets.
* Conversion: Activate the form for demo while still in development.
* Settings: Table of contents depth: More intuitive UI element.
* Settings: Complement delimiters: More intuitive UI elements.

= 0.32.1 (2021-10-06) =

* License: Compliance and updates with respect to header notices and the license filename.
* Documentation: Update to account for the internalized TinyMCE Color Pickers.
* Documentation: More precision in the reusable complements syntax by using the space symbol `␣`.

= 0.32.0 (2021-10-06) =

* Reusable complement editor: Internalize the TinyMCE Color Picker plugin for security.

= 0.31.5 (2021-10-04) =

* Complement section block: Update build after reverting attempt to replace square brackets with comment tag.

= 0.31.4 (2021-10-04) =

* Table of contents: Debug deactivated state.
* Table of contents: Correct the depth setting UI.

= 0.31.3 (2021-09-28) =

* Table of contents: Add dedicated class on AMP pages to cancel unwrapped `noscript` rules.

= 0.31.2 (2021-09-28) =

* Table of contents: Fix unexpected behavior due to unwrapping `noscript` style rule on AMP pages.

= 0.31.1 (2021-09-28) =

* Table of contents: Reactivate inserting `noscript` style rule on AMP pages.

= 0.31.0 (2021-09-27) =

* Notes and sources: Combine identical instances.
* Notes and sources: Fix bug preventing tooltip display at the bottom of the post on mobiles.
* Table of contents: Mitigate a flaw in scroll target when expanding from heading backlink.
* Table of contents: Deactivate inserting `noscript` style rule on AMP pages.

= 0.30.1 (2021-09-25) =

* Notes and sources: Block: Fix loss of focus in text input fields.
* Notes and sources: Lists: Debug list labels.
* Settings: Correct misnamed keys.
* Settings: Improve radio button and checkbox element identifiers for clarity and expectedness.

= 0.30.0 (2021-09-21) =

▶ The hook names `anrghg_ref_start` and `anrghg_ref_end` are changed to unabridged forms using `_reference_`. Also, the columns list layout is now configurable individually with keys changing by using `_note_` or `_reference_` respectively instead of `_complement_`. We apologize for the disruption, and for the initial abbreviation. — As links to the options pages are added here to the plugin's entry in the Plugins list, the default menu level is changing from Admin main menu to submenus, and the submenu labels are now 'Reusables' under 'Tools', and 'Complements' under 'Settings'.

* Compatibility: Elementor Integration to automatically fix layout of appended complement lists.
* Table of contents: Post Meta box setting for activation on a per-post basis.
* Notes and sources: The number of list layout columns configurable separately for notes and for references.
* Notes and sources: Optionally replicate link URL as parenthesized visible text after anchor elements in lists.
* Notes and sources: Block settings to configure list labels and writing direction per instance and per complement type.
* Notes and sources: Block Inspector setting with the effect that complement lists of the section may be deferred to the footer.
* Notes and sources: Post Meta box settings to configure list labels on a per-post and per-complement-type basis.
* Notes and sources: Post Meta box setting to defer to the footer the complement lists of a particular post or page.
* Notes and sources: Change the footer deferral setting to display two options only (not overriding post settings).
* Admin: Fix bug occurring after switching menu level from Settings submenu to Admin main menu.
* Admin: Move the Reusable complement editor’s submenu entry from Settings to Tools.
* Admin: Change the menu entries’ default position from Admin main to Tools and Settings, respectively, with submenu labels ‘Reusables’ under ‘Tools’, and ‘Complements’ under ‘Settings’.
* Admin: Add links to ‘Settings’ and ‘Reusables’ to the plugin’s entry in the Plugins list.
* Settings: Options to control the Post Meta box’ display and displayed configuration items.
* Configuration filters: Change hook names `anrghg_ref_start` and `anrghg_ref_end` to unabridged forms using `_reference_`.

= 0.29.3 (2021-09-06) =

* Get options ahead of schedule to fix undefined variable notice.
* Reimplement conditions in Post Meta box for the process to be able to handle them.

= 0.29.2 (2021-09-06) =

* Rectify erroneous settings key in condition to display the Post Meta box added in 0.29.0.

= 0.29.1 (2021-09-06) =

* Correct (refactor) new 0.29.0 editor Post Meta box code.
* Move writing direction feature request attribution to its place.
* Apply the 0.29.0 writing direction fix to table of contents twistie.

= 0.29.0 (2021-09-05) =

* Notes and sources: Increased syntactic versatility as of completing items either before (new) or after.
* Notes and sources: Post Meta box for the writing direction in complement lists and anchor tooltips for notes and for references separately.
* Fix bug in twisties of collapsible lists due to mirrored CSS rotation in right-to-left writing direction.

= 0.28.1 (2021-09-04) =

* Notes and sources: Debug three-column and two-column list layouts in target mode.
* Notes and sources: Lists: Invert checked property of the prepended display toggle.
* Notes and sources: Debug accessibility of display toggle versus list label.
* Complement anchors: Debug screen reader prefixes.
* Complement anchors: Add affixes for screen readers.

= 0.28.0 (2021-09-03) =

* Notes and sources: Optional three-column and two-column list layouts.

= 0.27.5 (2021-09-02) =

* Settings: Fix two overlooked PHP notices in Security > Login page profile (by deleting forgotten trial code).

= 0.27.4 (2021-09-02) =

* Heading links: New name of the option key, disunified from the table of contents.
* Table of contents: Has now its own option key for a more fine-grained configuration.
* Notes and sources: Process in manual excerpts to display anchors and tooltips.
* Notes and sources: Remove inline complements from automatically generated excerpts.
* Settings: Debug accessibility of radio buttons by adding fieldset and legend elements.
* Settings: Streamline access to settings sections by removing the CSS smooth scrolling.
* Settings: Invert glide switch appearance to make it consistent with the radio buttons.
* Settings: Tune On and Off colors, for consistency with Material Design glide switches.
* Settings: Textarea to input additional CSS rules, helping palliate on-coming settings.
* Upgrade notice: Hide trailing empty element triggering additional icon instance below.

= 0.27.3 (2021-08-31) =

* Add missing setting to activate complement processing as this feature is already deactivated by default.

= 0.27.2 (2021-08-31) =

* Replace Latin strings with numbers as settings values for easy input in Non-Latin writing systems.
* Add missing prefixes to the codes inserted by the blocks to avoid conflicts with other codes.
* Add part of the missing settings in the options page: Security, Paragraph links, Table of contents.
* Deactivate features by default as projected after their settings have been added to the options page.
* Display the Upgrade Notice in its traditional place under the plugin’s entry on the plugins page.

= 0.27.1 (2021-08-30) =

* Parameter for table of contents minimum number of headings present in the page.

= 0.27.0 (2021-08-30) =

* Two blocks for the Block Editor as a more intuitive way to easily position the table of contents or delimit sections for multiple reference lists.
* Add bottom margin below reference lists between sections.

= 0.26.0 (2021-08-27) =

* Setting to activate output of complement lists below (by default; eventually in) the footer globally or per post.
* Setting for complement lists to activate output buffering with notice that PHP 7.3 requires zlib extension.
* Ensure valid CSS class names by prepending an underscore to post or page slugs starting with a digit.
* Fix duplicate fallback style rules on AMP pages.
* More intuitive configuration values for date meta tag formats: `common` and `og` for Open Graph, instead of `0` and `1`.
* Overhaul the configuration filter templates file.
* Support moving lists into footers of older themes repurposing non-`<footer>` elements to mark up the footer.

= 0.25.3 (2021-08-26) =

* Fix bug present since 0.25.0 by closing table of contents p tag intersperse preventer division on AMP pages too.

= 0.25.2 (2021-08-25) =

* Update name of upcoming new AMP action `toggleChecked()`.

= 0.25.1 (2021-08-25) =

* Try to prevent table of contents expand/collapse transition from interfering with backlink scroll offset while in scriptless mode.
* Debug backlinking heading number positional animation so as to prevent the chattering observed in edge cases.

= 0.25.0 (2021-08-24) =

* Use new AMP action `toggleCheckboxState` to make table of contents collapsible also when JavaScript is turned off.
* Add template file for optional additions to `wp-config.php`.
* Remove border from collapsed table of contents, is to become optional.

= 0.24.15 (2021-08-13) =

* Debug collapsed height of the table of contents.
* Unset collapsed width while not configurable.

= 0.24.14 (2021-08-13) =

* Debug line height in collapsible table of contents for almost all themes.
* Debug line height in collapsible table of contents for themes where the general fix does not work.
* Set a (soon optional) collapsed width of the table of contents for use with most themes.
* Add FAQ item about using CSS transitions, not JavaScript, for animations.

= 0.24.13 (2021-08-12) =

* Fix the table of contents for AMP.
* Change table of contents default position to before the first heading; start and end positions will become optional.
* Add support for table of contents depth, although incomplete tables are usually suboptimal and disappointing.
* Debug table of contents list item indentation when level 1 headings are present in the article body.
* Add FAQ item about H1 usage and support.

= 0.24.12 (2021-08-12) =

* Revert AMP style tag argument from `amp-boilerplate` to `amp-custom` to debug AMP style rules.
* Deactivate format conversion page again while under construction.

= 0.24.11 (2021-08-12) =

* Fix bug in fragment identifier disambiguation numbers. Our apologies for this bug present since 0.24.0.
* Equalize font size across table of contents entries.
* Animation of expand/collapse for table of contents with CSS transitions in synchrony with twistie rotation.
* Prevent long titles from wrapping in table of contents and add simple tooltips to display the full wording.
* Add a prefix to on/off switches’ second label to make clear it describes the effect of the current state.
* Add alert to on/off switches in a changed state to remind that the change won’t be effective unless the settings are saved.
* Make backup file preview frames resizable.
* In script invoked on saving the provisional format conversion page: Fix bug due to variable type ambiguity.
* Fix bug in provisional format conversion script itself due to variable type ambiguity.

= 0.24.10 (2021-08-09) =

* Swap colors and position of the on/off switch knob to match the effect of clicking, not the state.
* Add On and Off symbolic on the switch knobs in the color where the symbol matches the effect of clicking.
* Display the effect of the current switch state in clear text using the empty space below the label.
* Re-add label to on/off switch for the slug-as-CSS-selector feature, removed for v0.24.9.
* Display reusable complements backup sample file below the related switch.

= 0.24.9 (2021-08-07) =

* Correct on/off switch labels by removing the OFF state label, or both ON and OFF if obvious.
* Debug new on/off switch for right-to-left scripts by mirroring 3 writing-direction-unresponsive CSS rules.
* Add shadow and border on focus for a more realistic and intuitive on/off switch knob design.
* Exclude links in the settings page from tab navigation if unexpected or irrelevant for the purpose.
* Fix duplicate message displayed on saving options pages when they are in the Settings submenu.
* Revert class name abbreviations as almost insignificant for CSS budget control for AMP, while screwing up customization.

= 0.24.8 (2021-08-06) =

* Change the URL of the cited [Oxford University study](https://science.sciencemag.org/content/360/6392/987) following a [new article](https://www.theguardian.com/lifeandstyle/2021/aug/04/queen-vegan-cheese-plan-change-dairy-industry?utm_term=429eecc8711b096386f10fec1a88a690&utm_campaign=GreenLight&utm_source=esp&utm_medium=Email&CMP=greenlight_email) in The Guardian, pointing to the magazine rather than to the DOI.
* For simple on/off settings, replace two-radio-buttons UI elements with a vertical, checkbox equivalent glide switch design.
* Move the backup file preview frame of the settings from the bottom of the table of contents to the setting where it is configured.
* Refactor settings section callback functions.
* Move settings backup generation and display below the related switch.

= 0.24.7 (2021-08-05) =

* Reorder, refactor and add settings.

= 0.24.6 (2021-08-04) =

* Complete the Customized Documentation Schema with an asterisk markup to account for indirect contributions.
* Set up optional format conversion page aimed at making hard-coded complements automation ready.

= 0.24.5 (2021-07-31) =

* Configuration filters: Document the 0.24.4 additions.
* Simplify the path of the backup, changing from `wp-content/uploads/anrghg-backup/` to `wp-content/uploads/anrghg/`.

= 0.24.4 (2021-07-30) =

* Prefix all setting keys with `anrghg_` to easier retrieve all strings by filtering string translation panes on `anrghg`.
* Compatibility with translation managers: Add a `wpml-config.xml` configuration file; adjust process timing to the requirements of configuration value filtering.

= 0.24.3 (2021-07-24) =

* Redesign the configuration options for fragment IDs and table of contents in a more straightforward way.
* Remove the table of contents label twistie and link element when the table is expanded by default.

= 0.24.2 (2021-07-23) =

* Debug the heading 1 level counter for support of errand h1 tags in the article.
* Keep adding missing configuration filters, now for fragment IDs and table of contents.

= 0.24.1 (2021-07-22) =

* Security: Switch to a more fine-grained authentication cookie duration configuration in days instead of weeks.
* Security: Low profile deactivated login screen as default behavior if login deactivation is active, by blocking the authentication cookie sending without any visual changes.

= 0.24.0 (2021-07-21) =

* Security enhancement: Deactivate or reactivate the login dialog by setting a Boolean in `wp-config.php`.
* Conditionally available feature to edit the duration after which authentication cookies expire.
* Introducing filters to set configuration values in the child theme’s `functions.php`.

= 0.23.1 (2021-07-13) =

* Fully expand the table of contents on accessing it from a heading backlink, too (if JavaScript is not turned off).
* Complete `sanitize_title_with_dashes()` with typographic dashes and hyphens U+2010..U+2012, U+2015.

= 0.23.0 (2021-07-05) =

* Define post-level complement names on the fly using the `[/name]` delimiter (or any string it shall be configurable to).

= 0.22.0 (2021-07-01) =

* Add superscript and subscript, underline formatting buttons in the TinyMCE editor toolbar.
* Add copy, cut, paste action buttons in the TinyMCE editor toolbar.
* Correct configuration settings for unified date metadata labels.
* Raise internal CSS priority level from PHP_INT_MAX to 100 so Theme Custom CSS overrides plugin settings.
* Streamline CSS selectors to reduce impact on CSS budget for AMP compatibility.

= 0.21.1 (2021-06-29) =

* Get backlinks to table of contents to work also when table is collapsed by default.

= 0.21.0 (2021-06-28) =

* Settings to configure the delimiters for inline complements as notes and references.
* Debug page layout when a message is appended to either posts or pages but not to both.
* Remove erroneous case conversion from table of contents, a bug introduced in 0.17.2.

= 0.20.2 (2021-06-27) =

* Autofocus in the relevant name text box at loading the reusable complements page.
* Switch off reliance on wpautop to get TinyMCE insert `<br />` tags on Shift+Enter.
* Swap default behavior in TinyMCE to insert `<br />` tags on Enter.
* Replace paragraph breaks in tooltips with 2 line breaks because inline CSS tooltips don’t support block level elements.
* Restrict Reusable complement editor toolbar to functionalities working with typical inline complements.
* Default display complements full height in editable divs rather than source code in textareas.

= 0.20.1.1 (update 2021-06-26) =

* Advise to install the TinyMCE Color Picker plugin to enable fore- and background color formatting.

= 0.20.1 (2021-06-25) =

* Streamline tabbing through list by making focus on buttons optional.
* Streamline move-into-editor buttons script, now single with argument.

= 0.20.0 (2021-06-25) =

* Buttons to move any existing complement into TinyMCE as an alternative to editing the complements list.

= 0.19.0 (2021-06-23) =

* Add new complements in the Tiny Moxiecode Content Editor (TinyMCE) as integrated.

= 0.18.0 (2021-06-22) =

* Support for wysiwyg content in reusable new complement editor.
* Complete compatibility with PHP 5.6 in line with [WordPress’ policy](https://wordpress.org/about/requirements/).

= 0.17.3 (2021-06-20) =

* Support for Swedish fragment identifiers.
* Not start output buffer by default, to avoid notice about missing zlib extension in PHP 7.3.
* Remove return type declarations from function definitions, for compatibility with PHP 5.6.

= 0.17.2 (2021-06-18) =

* Identifier derivation supports more alternative polygraphs like 'č' → 'cz', 'ř' → 'rz', 'ä' → 'ae'.
* Convert 'ö' to 'oe' and 'ü' to 'ue' if language is German.

= 0.17.1 (2021-06-17) =

* Fix bug in last modified and published labels display.
* Update settings values to fix bug in menu position setting.
* Adjust tooltip position.

= 0.17.0 (2021-06-15) =

* Add missing CSS rule `user-select: all;` to the div displaying the backup in JSON format.
* Use non-Latin—Greek and Cyrillic for instance—scripts for the configurable delimiters’ default values.
* Use clear values for menu position configuration options instead of color names referring to the template.

= 0.16.2 (2021-06-14) =

* Simplify default note anchor prependix as 'N' instead of 'note '.
* Remove simplified CSV backup as superfluous while we have JSON format.

= 0.16.1 (2021-06-11) =

* Supply `shortcode_unautop()` functionality for `[/section]` positioner as the Shortcode API is not used.
* Discard brackets and parentheses as default anchor pre- and appendices to account for inadequate Unicode Line Breaking Algorithm.
* Debug theme link color application to anchors.
* Add fragment identifiers with scroll offset also to all main field labels in the settings page.
* Correct settings page layout while completion is starting.

= 0.16.0 (2021-06-10) =

* Add automatic link to full note after manual tooltip text.
* Restore support for list links in tooltip text, now using `[listlink]` and `[/listlink]` delimiters instead of PHP `sprintf()` placeholders.

= 0.15.0 (2021-06-10) =

* Add scope property to collapsible property of complement lists for inclusion in settings.
* Support heading level 1, discouraged beyond post title, if present in the article body.
* Fix display bug in table of contents list items not line wrapping.
* Add condition to complement list in footer output buffer algorithm to fix bug.

= 0.14.1 (2021-06-09) =

* Fix syntax and line breaks in HTML output.
* Move administration pages code into separate file.

= 0.14.0 (2021-06-09) =

* Backlink tooltips suggesting the use of the backbutton to scroll up from a complement list number.

= 0.13.1 (2021-06-09) =

* Get list positioning in the footer to work also for AMP requests.

= 0.13.0 (2021-06-08) =

* Convert expand/collapse functionality to pure HTML+CSS without JavaScript.
* Add expand/collapse feature to table of contents.
* Switch to AMP compatible footer output.

= 0.12.3 (2021-06-06) =

* Improve algorithm of footer positioning for complement lists.
* Define better default styles (shall be configurable) for lists in the footer.
* Prefix the global variables of the settings and the reusable complements.

= 0.12.2 (2021-06-05) =

* Correct output of complement lists in the footer top if position is set to footer.

= 0.12.1 (2021-06-05) =

* Use a more reliable method to retrieve the post slug.

= 0.12.0 (2021-06-04) =

* Line-wrap long URLs by adapting code contributed to another plugin.

= 0.11.0 (2021-06-03) =

* Output of complement lists in the footer if the `[complement_list_in_footer]` code is in a page.

= 0.10.1 (2021-06-03) =

* Remove `sprintf()` function from tooltip text processing as it may cause an inadvertent argument count error.

= 0.10.0 (2021-06-03) =

* Complement list headings in singular and dual forms as appropriate.

= 0.9.0 (2021-06-03) =

* Initial release (submitted 2021-06-02).
* Table of contents in sync with heading fragment ids.
* CSS-generated heading numbers.

‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
NOTE: The versions lower than 0.9.0 are not used to inform the @since tags.
___________________________________________________________________________

= 0.8.0 (submitted 2021-05-29) =

* Reversal to initial short slug.
* CSS and class name fixes.

= 0.7.0 (submitted 2021-05-27) =

* Store backups in the uploads directory, not in the plugins directory.
* Add support for references nested in notes (but not conversely).
* Add twisties next to collapsed complement list headings.

= 0.6.0 (submitted 2021-05-25) =

* Properly generate content and plugin folder names for display.
* Prefix function names throughout.

= 0.5.0 (submitted 2021-05-23) =

* Initial submission.

= 0.0.0 (2021-04-26) =

* Start of development.


== Upgrade Notice ==

= 1.6.0 =

▶ The Thank You message template select configuration is required to change syntax. The only possible separators are space and newline. The previous separator, comma, is allowed in template names. We apologize for the disruption and the inconvenience.

▶ Two added blocks need to change category: The “Thank You message” and “Reference list” blocks were previously in the Design section. As they are about writing and formatting text and lists, they should be moved to the Text section. Making the category configurable for all added blocks is projected. Thank you for your understanding.

= 1.5.0 =

▶ Delimiter presets for easy input are changing. If easy default delimiters based on square brackets are in use, and this plugin’s Settings page was not saved since v1.4.7, please save it BEFORE UPGRADING, in order to not be disrupted. Thank you.

= 1.4.0 =

▶ The security feature’s login screen high and standard profiles should not be used unless the dialog is not useful any longer. Also it is recommended to define the constant in a mini-plugin using the included template, and to delete its definition in `wp-config.php`.

= 1.0.0 =

▶ Plugin re-listing: As of 2022-06-21, this plugin has been re-listed in the Plugin Directory.

= 0.67.0 =

▶ Plugin closure: As of 2022-03-21, this plugin has been temporarily closed pending a full review. In this new setup, no urgent bug fixes nor upgrade notices are required any longer. We beg the Plugin Directory’s pardon for the unfinished state, as initial release was fast-tracked in response to user requests for AMP compatible endnotes. We are striving to get the A.N.R.GHG Publishing Helper completed as soon as possible. Thank you for your understanding.

= 0.59.0 =

▶ The setting for inclusion of generated list labels in the table of contents has been moved from ‘Notes and sources’ to ‘Table of contents’, and it now includes ‘Reference lists’. As a consequence, the key name needed to be changed and its meaning inverted. The feature has been redesigned and does not rely on priority levels any longer; these are now freely configurable and need to be monitored if those labels should actually be included in the table of contents. Hoping that the new design is more convenient, we apologize for the change.

= 0.58.0 =

▶ The CSS classes must use hyphens, not underscores. We apologize for having used underscores and hurried to replace all underscores with hyphens in CSS class names except those derived from setting keys on the settings page.

= 0.56.0 =

▶ More setting keys required renaming to enhance intuitivity and consistency, after the renamings required by the 0.55.0 minor release. We apologize for the disruptions caused by these improvements.

= 0.55.0 =

▶ In expectation of the oncoming Reference list block that may be used to configure collapsible Reference lists as well as short bibilographies and ‘Further reading’ boxes, the word ‘References’ is now being avoided when referring to ‘Notes and sources’. For consistency, intuitivity and ease of maintenance also with respect to users of configuration filters, all related setting keys need to be changed, and the code name of the related block should also be updated since it appears in the post source text and may be used in an automatically added class name, and block-internal attribute names because of their output in markup for storage purposes. Existing blocks keep working but are not editable. Legacy notes-and-references blocks may be converted to HTML by clicking ‘Keep as HTML’ in order to copy the values to a new instance of the block. We apologize for the disruptions, underscoring that the plugin is still declared as in development.

= 0.51.0 =

▶ The format of the complement block configuration data output has been upgraded due to the addition of settings for collapsible property and collapsed state of lists. Support for the initial format is maintained, and the data storage remains unchanged. When reopening a post in the Block Editor: Please click ‘Attempt Block Recovery’, and everything will be as configured. We apologize for the inconvenience.

= 0.50.0 =

▶ Two setting keys needed to be renamed because their names were confusing, while they may be read by users of string translation panes or configuration filters: `anrghg_list_aria_label_notes` to `anrghg_list_label_aria_notes`, and `anrghg_list_aria_label_references` to `anrghg_list_label_aria_references`. For 0.50.1, as this notice is added—apologies for delay—, two other keys need to be renamed because their names were misleading: `anrghg_tooltip_read_more_link_text_note` to `anrghg_complement_tooltip_list_link_text_note`, and `anrghg_tooltip_read_more_link_text_reference` to `anrghg_complement_tooltip_list_link_text_reference`. In the same move, several keys used in the ‘Notes and sources’ feature, including the first two, are renamed for consistency and completeness to improve intuitivity and user experience with configuration filters. For 0.50.2, `_complement` in the two keys above is replaced with the moved `_note` or `_reference`. We apologize for the inconvenience and hope that the improvements outweigh the trouble of reconfiguring existing installations.

= 0.49.0 =

▶ The setting keys `anrghg_meta_box_complements_dir` and `anrghg_meta_box_list_footer_deferral` needed to be renamed to `anrghg_meta_box_complements_writing_direction` and `anrghg_meta_box_complement_list_footer_deferral` respectively, for clarity, to improve maintainability. Since their default value is `0`, the eventually checked checkboxes will be unchecked again, and the settings disappear from the meta box, and conversely for `anrghg_meta_box_list_labels` renamed to `anrghg_meta_box_complement_list_labels`. We apologize for the inconvenience.

= 0.44.0 =

▶ Apologies for current delays in development, due to urgent investigation on food transition.

= 0.43.0 =

▶ The easy preset dedicated tooltip text end delimiter `\\` is replaced with `||`. We apologize for this change, that is about preferring consistency and intuitivity over ease of input on a US-QWERTY. If you are using `\\`, please input it in the free configuration field and switch to `freely configured`.

= 0.40.0 =

▶ The `[/excerpt]` delimiter ending a dedicated tooltip text was a misnomer and needs to be replaced with `[/view]`. If `[/excerpt]` is already in use, the tooltip end delimiter may be configured accordingly when choosing the `free` option rather than a preset. We apologize for the inconvenience of not keeping it as the default ('safe') configuration.

= 0.36.0 =

▶ The last modified and published date labels have now a placeholder for the date. That is required for internationalization, but we overlooked it up to now. Our apologies for missing out on this requirement, and for the inconvenience of editing the labels already saved. Please add a per cent sign followed by the letter s where the date shall display.

= 0.34.0 =

▶ The date meta tags have 4 new option key names for greater flexibility. Please review the setting if you are using it. Our apologies for the disruption.

= 0.33.0 =

▶ The name and format of the configurable table of contents positioner have changed. Please review the setting if you are using it.

= 0.30.0 =

▶ The hook names `anrghg_ref_start` and `anrghg_ref_end` are changed to unabridged forms using `_reference_`. Also, the columns list layout is now configurable individually with keys changing by using `_note_` or `_reference_` respectively instead of `_complement_`. We apologize for the disruption, and for the initial abbreviation. — As links to the options pages are added here to the plugin's entry in the Plugins list, the default menu level is changing from Admin main menu to submenus, and the submenu labels are now 'Reusables' under 'Tools', and 'Complements' under 'Settings'.
