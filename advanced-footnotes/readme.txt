=== Advanced Footnotes ===
Contributors: yutonet
Tags: footnotes, references, articles, academic
Tested up to: 4.9.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Advanced Footnotes lets you add footnotes on articles via shortcodes.

== Description ==
Advanced Footnotes lets you add footnotes on articles via shortcodes. Advanced Footnotes is is extremely customizable, therefore it can be implemented on any theme.

With its internal functions, you can also implement Advanced Footnotes on your own theme in any form you like.

# Main Features:
* Easy &amp; flexible implementation.
* Implemented WYSIWYG editor button.
* Footnotes  can be implemented with shortcode or function.
* Animated scroll effect (can be disabled)
* Lightweight CSS (can be disabled)
* Custom CSS styling
* Dynamically changeable interface options (JS can be fully disabled)

# Usage

## Inserting a Footnote:
In order to insert a footnote, you can either use the "Insert Footnote" button added on your WYSIWYG editor, or use the [footnote]your-footnote-here[/footnote] shortcode.

### Shortcode Parameters:
*"type":* Determines the type of the reference. **Options:** *numeric* / *non-numeric*.

## Listing Footnotes:
You can display the footnotes in two methods:

### Listing by Shortcode:
By simply inserting the *[footnotes]* shortcode in your post content, you can display footnotes wherever you want in your posts.

#### Shortcode Parameters:

*"title":* Determines the title for the footnotes list. Default value can be set through plugin settings.

#### Shortcode Usage:

	[footnotes title="My Custom Footnotes Title"]
	// or
	[footnotes title="false"]

### Listing by Theme Inclusion:

You can print the footnotes by calling *print_refs* function from the advanced_footnotes class.

#### Simple Function Usage:

	call_user_func(array('advanced_footnotes', 'print_refs'));

#### Additional Parameters:

* First parameter: "Print", whether print or return the footnotes content. (Default: "true")
* Second parameter: "Title", determines the title for the footnotes content. (Default: "false")

#### Function Usage with Parameters:

	$footnotes = call_user_func_array(array('advanced_footnotes', 'print_refs'), array(false, 'Custom Footnotes Title'));

## Plugin Options:

You can access the plugin options through "Options/Advanced Footnotes".

* **Include Plugin CSS:** Determines whether to include the default plugin css files. Disable this if you want to re-style the plugin within your theme.
* **Custom CSS:** Provides a field for custom CSS styling.
* **Include Plugin JS:** Determines whether to include the plugin javascript files on the theme output. Disable this if you want to customize plugin interactions or just to use native HTML anchors.
* **Default Title for Footnotes:** Sets the default title used on the "[footnotes]" shortcode.
* **Footnote Symbol:** Sets the symbol used for non-numeric footnotes.
* **Disable JS Options:** Determines whether to apply options to the plugin JS files or not.
* **Footnotes Scroll Gap:** This sets the scroll margin when clicked on a footnote. Set this when you have a fixed header or any other element blocking some part of the window area.
* **Footnote Scroll Speed:** Sets the animation speed when a footnote is clicked. Set 0 for no animation.

## HTML Structure & Classes

### Anchors:

#### Numeric Anchor:
	
	<a id="{unique id}" class="afn-footnotes-ref hook numeric" name="{unique id}" href="#{unique id of the reference}">{number - automatically incremented by the order}</a>

#### Non-numeric Anchor:
	
	<a id="{unique id}" class="afn-footnotes-ref hook non-numeric" name="{unique id}" href="#{unique id of the reference}">footnote symbol</a>

### References:

Non-numbered references are listed before the numbered references on the list.

	<!-- Main Container -->
	<div class="afn-footnotes">

		<!-- Title -->
		<h3 class="afn-footnotes-title">{Title}</h3>

		<!-- List of references -->
		<ul class="afn-footnotes-list">

			<!-- Reference item - non-numeric -->
			<li class="footnote-item afn-textarea">
				<a id="{unique id}" class="afn-footnotes-ref reference non-numeric" name="{unique id}" href="#{unique id of the anchor}">{footnote symbol}</a>
			</li>

			<!-- Reference item - numeric -->
			<li class="footnote-item afn-textarea">
				<a id="{unique id}" class="afn-footnotes-ref reference numeric" name="{unique id}" href="#{unique id of the anchor}">{number - automatically incremented by the order}</a>
			</li>

		</ul>

	</div>

# Known Issues

* WYSIWYG Button doesn't work on the plugin [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced/) (and probably on some other -WYSIWYG editor modifying- plugins).

# Contribution

<https://github.com/yutonet/wp_advanced_footnotes>

== Installation ==
Install and activate Advanced Footnotes like any other plugin.

== Frequently Asked Questions ==

= Can I implement Advanced Footnotes on my theme? =

Yes you can. You can either get the footnotes as an object array, or simply print it with the Advanced Footnotes\' functions.

= Can I use Advanced Footnotes without editing my theme files? =

Yes, you can simply use *[footnote]your note here[/footnote]* shortcode for each footnote you want to place, and [footnotes] shortcode to use put the footnotes wherever you want them to be.

== Changelog ==

= 1.1 =

* **1.1.2**
	* Fixes on the readme file.

* **1.1.1**
	* Empty title display bug fixed.
	* WYSIWYG dialog enabled on selected text.

* **1.1.0**
	* Semantic versioning.
	* Footnote type selection (numeric or non-numeric).
	* Footnote symbol option for non-numeric footnotes.
	* Better documentation.

= 1.0 =

* **1.0.1**
	* Documentation
	* Stable.
	* Title display bug fixed.

* **1.0.0**
	* Initial Release


== Screenshots ==

1. WYSIWYG editor button.
2. WYSIWYG dialog.
3. Plugin options.
4. Simple usage.