=== Simple Tabs Shortcodes ===
Contributors: Beherit
Tags: tab, tabs, shortcodes
Requires at least: 4.6
Tested up to: 5.4
Stable tag: 1.3
Requires PHP: 7.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Adds shortcodes to place a page content in tabs. Uses a lightweight JS script, no additional CSS files.

== Description ==

Plugin adds shortcodes to place a page content in tabs. Uses a lightweight JS script, no additional CSS files so you need to add own CSS style to your theme's stylesheet to ensure proper display of the tabs.

== Installation ==

In most cases you can install automatically from plugins page in admin panel.

However, if you want to install it manually, follow these steps:

1. Download the plugin and unzip the archive.
2. Upload the entire `simple-tabs-shortcodes` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the Plugins menu in WordPress.

== Frequently Asked Questions ==

= Example usage =

There are two shortcodes available, below is a simple example of usage:

`[tabs]
[tab title="First tab"]The content of the first tab.[/tab]
[tab title="Second tab"]The content of the second  tab.[/tab]
[tab title="Third tab"]The content of the third tab.[/tab]
[/tabs]`

This will output the following HTML:

`<div class="tabs-container">
	<div class="tabs-nav">
		<ul>
			<li><a href="#first-tab" class="active">First tab</a></li>
			<li><a href="#second-tab">Second tab</a></li>
			<li><a href="#third-tab">Third tab</a></li>
		</ul>
	</div>
	<div class="tabs-content">
		<section id="first-tab" class="tab active">The content of the first tab.</section>
		<section id="second-tab" class="tab">The content of the second tab.</section>
		<section id="third-tab" class="tab">The content of the third tab.</section>
	</div>
</div>`

Optionally, you can set a custom ID by adding `id="my-id"` in tab shortcode.

= Example CSS =

Here is an example CSS, make the necessary changes if you want to customize the look and feel of tabs.

`.tabs-nav {
	margin: 0;
	border-bottom: 1px solid #ccc;
}
.tabs-nav ul {
	list-style: none;
}
.tabs-nav li {display: inline-block;}
.tabs-nav a {
	display: block;
	padding: 5px 10px;
	border: 1px solid transparent;
	text-decoration: none;
}
.tabs-nav a.active {
	border-color: #ccc;
	border-bottom-color: #fff;
}
section.tab {
	display: none;
	margin-bottom: 15px;
	padding: 15px 0;
}
section.tab.active {display: block;}`

= Selecting a tab by the URL =

You can select default tab by using a hash in the URL – simply add `#tab-name` at the end of the page URL to select the specific tab. This example URL will select tab with the title / id "something": `http://domain.tld/your-page/#something`

= Switching to the tab by the link =

Tabs can be switched by a normal link, just add a class tab-url to the link. Example:

`<a class="tab-url" href="#something">Something</a>`

== Changelog ==
= 1.3 (2020-04-08) =
* Pure JavaScript instead of jQuery.
= 1.2. (2018-08-12) =
* Support non-Latin URLs.
= 1.1.2 (2018-12-13) =
* Minor fixes.
= 1.1 (2017-12-07) =
* Changed class name `tab-content` to `tabs-content`.
= 1.0.2 (2017-02-10) =
* Changes in tabs navigation structure.
= 1.0 (2017-02-09) =
* First public version.
