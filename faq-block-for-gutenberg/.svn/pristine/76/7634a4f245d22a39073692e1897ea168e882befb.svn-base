=== FAQ Block For Gutenberg ===
Plugin Name: FAQ Block For Gutenberg
Plugin URI: https://wordpress.org/plugins/faq-block-for-gutenberg/
Author: Dilip Bheda
Author URI: https://profiles.wordpress.org/dilipbheda
Contributors: dilipbheda, jigar-bhanushali
Tags: blocks, faq, gutenberg faq, editor, faq block
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.2
Stable tag: 2.7
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Donate link: https://paypal.me/dilipbheda

This plugin provides a quick and easy way to add FAQ's block using Gutenberg visual editor.

== Description ==

FAQ blocks for Gutenberg provide a block for the new Gutenberg editor in WordPress which allows you to add FAQs with basic styling options.

This plugin allows you to add multiple FAQs.

You can easily give background color and font color to question and answer.

== Installation ==

From the admin panel, Go to your WordPress Admin -> Plugins -> Add New. Search for FAQ Block For Gutenberg. Install and Activate.

From directories, Upload `FAQ Block For Gutenberg` to the `/wp-content/plugins/` directory and activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How to add faq in website =

After installing FAQ block for Gutenberg you need to go to page or post section where you can see the Gutenberg editor and click on add block. Select FAQ block and add your question and answer. You will also be able to give the styling to FAQs.

= How to disable Schema JSON-LD =

Take, for example, the following line of code:

`add_filter( 'fbfg_json_ld_output', '__return_false' );`

= Can I set global colors? =

Yes, you can add it using this filter:

`add_filter(
	'fbfg_global_colors',
	function ( $colors ) {
		$colors = array(
			'backgroundColor'         => '#f6f7f7',
			'questionTextColor'       => '#000',
			'questionBackgroundColor' => 'none',
			'answerTextColor'         => '#000',
			'answerBackgroundColor'   => 'none',
		);
		return $colors;
	}
);
`
== Screenshots ==
1. FAQ block editor
2. Advanced color settings
3. FAQ preview

== Upgrade Notice ==

= 2.5 =
Important Upgrade Notice: It is recommended to re-save your FAQ block to reflect new changes on the front end as well.

== Changelog ==

= 2.7 =
* Resolve schema JSON issue with nested blocks - https://wordpress.org/support/topic/schema-json-not-working

= 2.6 =
* Remove jQuery dependency

= 2.5 =
* Bug Fixed ( https://wordpress.org/support/topic/php-notice-232/, https://wordpress.org/support/topic/supprimer-les-majuscules-a-tous-les-mots/, https://wordpress.org/support/topic/block-not-appearing-in-gutenberg-editor/ )
* Added clone and delete block action ( https://wordpress.org/support/topic/define-colors-site-wide/ )
* Compatible with WordPress ^6.3 ( https://wordpress.org/support/topic/react-error-2/ )
* Compatible with PHP ^8.0
* Added new filter for global colors - `fbfg_global_colors`

= 2.4 =
* Bug Fixed ( https://wordpress.org/support/topic/php-warning-366/ )

= 2.3 =
* Compatible with WordPress 5.5

= 2.2 =
* Added javaScript i18n support.

= 2.1 =
* Fixed block deprecated issue.

= 2.0 =
* Merge JS and CSS.
* Compatible with Google schema.

= 1.4 =
* Bug Fixed ( CSS )

= 1.3 =
* Bug Fixed (wp.editor Richtext undefine).
* Keeping up with changes in gutenberg (version-4.5.1).

= 1.2 =
* Bug Fixed.
* Keeping up with changes in gutenberg.

= 1.1 =
* Bug Fixed.
* Keeping up with changes in gutenberg.

= 1.0 =
* Initial release.
