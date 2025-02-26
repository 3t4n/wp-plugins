=== Code Block ScratchPad ===
Contributors: acerby
Tags: plugins, wordpress, php, code, testpad, codepad, testing, debugging, installing, javascript, css
Requires at least: 4.7
Tested up to: 5.6
Requires PHP: 5.6 (7+ recommended)
Stable tag: 1.0.0
License: GPLv2 or later

A simple scratchpad/testbed for testing, and installing small additions to, pre-existing PHP/JS/CSS code for wordpress websites and add-ins.

== Description ==

This plug-in makes it simple to test and/or install small wordpress PHP/JS/CSS code snippets in a relatively safe manner without the need to use a full PHP debugger or directly edit pre-existing plugin code. 

== Basic Features ==
* Enter simple PHP/JS expressions and quickly evaluate them to verify they function as expected.
* Create/install top-level php functions eg: for use in wordpress pod fields.
* Add bespoke code and associate them with wordpress action/filters 
* Do almost anything that's possible with a wordpress plugin
* Test and add custom javascript and CSS to website pages 
* Preview the effects of changes before commiting in wordpress preview mode
* Provides protection against inadvertently killing sites due to basic coding errors

== Installation ==

1. Upload acb-scratchpad to the /wp-content/plugins/ directory.
2. Activate Code Block Scratchpad through the 'Plugins' menu in WordPress.
3. Select the Code Block Scratchpad menu item in the admin pages and enter a simple expression and press the Check/Run button.

== Screenshots ==

1. Adding some icons and testing a JS regex

== Frequently Asked Questions ==

= Should I get/use this Plugin? =

If you are writing (or intending to write) PHP code and are looking for some quick/easy way to test existing PHP code, or add a tiny snippet of code to an existing web site, then (hopefully) YES. 
If however you are trying to make a page look different, display a field etc, then I would generally recommend looking elsewhere in the first instance. There are a lot of great plugins that provide nice friendly interfaces for modifying the presentation of content and adding new fields/features.
This plugin gives access to the low-level PHP & Javascript code that powers wordpress enabling you to do almost anything thats possible in wordpress. However, it's just a basic low-level tool and doesn't provide any ready-made solutions, relying on the user having knowledge how to program in PHP for wordpress.
Whilst using this plugin does include some basic safety measures and using it may be a lot simpler than creating your own plugin, please note that it can’t entirely protect you from the effects of bad code, and it’s very far removed from a full development environment.

= Can I do ... with this plugin =

The answer is almost certainly Yes - However you are probably asking the wrong question -- Please see: "Should I get/use this plugin" and "What this plug is for".

= What is this plugin for? / Why was it created? =

This plugin was initially created as an aid to creating a second more complex plugin. One of the issues of creating plugins is testing the PHP code being written and investigating/verifying how pre-existing wordpress functionality works.
I wanted a simple way to test/run PHP code that could interact with existing code, but without the otherwise ever-present risk that I could totally kill the whole website including the admin pages simply by inadvertently introducing a minor syntax error.
There are some great on-line scratchpads for testing standalone PHP code snippets but these obviously can be used to test functionality specific to be environment. This add-in has proven very useful to me in this regard and so I thought/hoped it may prove useful to others with similar needs. 

A secondary aim was related to an issue I had faced previously working on another website, where I needed a very tiny fragment of PHP code to achieve my goal.
However, there was no easy/safe way to do that directly so I was forced into creating a complete bespoke plugin to add one simple line of php code. 
Given that it was totally specific to that web site, that seemed like an unnecessarily large overhead to achieve something so simple. 
In fact, it turned out that the biggest issue wasn't the creation of the tiny bespoke plugin, but the issue of added complexity/risks created for site maintenance going forward.
This add-in hopefully makes creating/administration and ongoing managment including minor tweaks to the PHP code snippet, a lot more simple, transparent, and less risky.

= How to install the PHP/JS/CSS code into my web site? =
= Where has the Publish Button Gone? =

To install PHP/JS code, first press the "Check/Run" button to verify the code is syntactically valid. Then assuming it is fine the "Publish" button will be displayed.
The publish button will cause the displayed code to be installed and be made available to all pages in the site, replacing any version previously installed via this method.

= I just checked/published some PHP code and now all I can see is a fatal parser/syntax error message!!! =

Don't panic! -- Just make a note of the error message. If it gives a line number in eval()'d code make sure to make a note of that also. Then simply refresh the page.
The scratchpad plugin will automatically disable any code that previously bailed out with a fatal error, so that it wont auto-run in the future.

= How can I test my PHP/CSS/JS code before publishing it? =
= Why does my page look different in preview mode? =

Wordpress includes the facility to view web-site pages in "preview" mode.
The scratchpad plugin will use the PHP/JS/CSS code currently displayed in the settings page as opposed to the currently installed code when displaying content in preview mode. 

= When exactly will the PHP code I publish be run? = 

The PHP code is triggered/run by upon the wordpress 'plugins_loaded' event. So it's run in approximately the same time/context as the intial plugin code is run.
You can use the wordpress add_action(...) or add_filter(...) functions to have your code run/applied to specific times/events.

= Whats with the /** [ Test Code ] **/ thing? =

There are two primary uses of this codepad: The first of these is testing code eg evaluating an expression and seeing what it returns, the second is adding code/functions that will be utilised later when displaying website pages.
Often these two functions may be combined so we may defined some functions and then have some additional code to test those functions. In these cases the /** [ Test Code ] **/ comment may be used to separate these two code blocks.
When publishing code, if a /** [ Test Code ] **/ comment appears in the source then only the part of the code above that comment will be published/installed.

= How can I pass values from PHP to javascript or CSS =

You can set values in the global $acb_scratchpad_var eg $acb_scratchpad_var['myVarName']=$myValue; then this will be available in javascript as acb_scratchpad_var['myVarName'];
If you whish to send things related to the current wordpress page/post then you may want to ensure that your PHP code only runs once wordpress is fully loaded using add_action('wp_loaded','name_of_my_php_fuction_to_get_and_set_vars'); or similar.
Items in $acb_scratchpad_var whose names start with '--' will additionally be defined as css vars values.
Alternatively for cleaner/improved syntax you could use LESS format eg by using the https://wordpress.org/plugins/wp-less plugin.

= My previously published/installed code is now no longer being run - what happened? = 

Scratchpad includes a protection mechanism to stop flawed/fault code from permanently breaking the web-site and its administration pages.
In the event that scratchpad installed code aborts and doesn’t complete scratchpad will leave the script in a disabled state such that it won't be subsequently auto run.
You might like to check the code and add appropriate try/catch type clauses if appropriate.
To re-enable auto-running simply re-publish the code.

== Changelog ==

= 1.0.1 =
Release Date: 1st July 2020

* [Initial Release]


== Upgrade Notice ==
