=== Auto Anchor List ===
Contributors: MindWireMedia
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7738177
Tags: anchor links, content links, content, sidebar, links, widget, auto anchor list, aal, mwm-aal, mwm, MindWireMedia
Stable tag: 1.0

Creates anchor links to heading tags in the content and displays automatically at the top of the content, or allows for custom placement with tags.

== Description ==

Creates anchor links to heading tags in the content and displays them automatically at the top of the content, or allows for custom placement with tags or sidebar widget.

Features:
	1. Has option to auto display anchor links to Heading tags in content.
	2. Allows control of which content to auto display links.
	3. Can disable plugin css to allow custom styles to be applied.
	4. Has widget available for display
	5. Insert custom title to display above links
	6. Clears all traces from any excerpts displayed

== Installation ==

1. Upload to your Wordpress plugins folder.
2. Activate in Wordpress admin area.
3. Update options under "Settings->Auto Anchor List"

== Frequently Asked Questions ==
= How Do I Place In Custom Locations? =

In Content
	1. Using the visual editor
		- Add the tag [mwm-aal-display] into your individual content using the visual editor.
	2. PHP Template Tag(must be below the_content())
		`<?php global $mwm_aal; echo $mwm_aal->output_content_links(); ?>`

In Sidebar
	1. Activate Widget
		- Go to Appearance -> Widgets in Wordpress admin "MWM Auto Anchor List".
	2. PHP Template Tag
		`<?php global $mwm_aal; $mwm_aal->output_sidebar_links(); ?>`
		
= How Do I Add Custom Styles? =
	The content display and side bar are wrapped with a <div> with an assigned css class. You can put the classes into your own style sheet and use further declarations to target elements within the div.
	
	For Content:(uses <ol>,Does not use an H tag for title)
		.mwm-aal-container{}
		.mwm-aal-container-title{}
		
	For Sidebar: (uses <ul>, traditional h2 tag for title)
		mwm-aal-sidebar-container{}

== Screenshots ==
1. Admin options
2. Display in default wordpress template
