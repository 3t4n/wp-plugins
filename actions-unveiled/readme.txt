=== Actions unveiled ===
Contributors: Jacquemin Serge 
Author: Jacquemin Serge
Author URI: https://profiles.wordpress.org/sergejack
Tags: Hook, Filter, Track, List, Action, Debug
Requires at least: 4.0.1
Tested up to: 4.2
Stable tag: 1.0.0
License: Apache License, Version 2.0
License URI: http://www.apache.org/licenses/LICENSE-2.0

Allow to track hooks and debug messages during page life cycle.

== Screenshots ==

1. Easily list all the hooks just by calling a javascript function
2. Add debug messages if you want

== Description ==

Allow to track hooks and debug messages during page life cycle.

**Target Audience**

This plugin is suited for **developpers**.

**Features**

* Tree view of hooks
* Debug messages

== Installation ==

1. Search the plugin through the 'Plugins - Add new' menu in WordPress and click on 'Install now'
1. **or** Donwload then upload the zip file through the 'Plugins - Add new' menu then 'Upload Plugin' in Wordpress and click on 'Install now'
1. **or** Donwload then extract the zip file and drop its contents in the wp-content/plugins/ directory of your WordPress installation
2. Activate the plugin through the 'Plugins' menu in WordPress


== Frequently Asked Questions ==

**Q.** Why was this plugin created?

**A.** Because I really had some hard time figuring how some hook were chained, and how my plugin did fit in the big picture. 

**Q.** Do I need that plugin?

**A.** If your a plugin developper, it can be of big help.

**Q.** Nothing appears?!

**A.** Open your javascript console and type *be_mch_actunv()*

**Q.** Still, nothing appears?!

**A.** Maybe your theme's layout hide the hooks tree list (in frontend it is appended at the very bottom of the body) or maybe there's a javascript error breaking this plugin's script(s).

**Q.** Why do I have to call a javascript function (*be_mch_actunv*)?

**A.** Because if your website is already in a production environement, you won't want the hooks tree list to be visible by default getting your end users confused.

**Q.** I don't like the layout! Now what?

**A.** You're a developper, write your own css/javascript and have it overide this plugin "layout".

**Q.** How do I add a message to the hooks tree list?

**A.** Simply add the following php code block with your message:

`<?php
	if (defined('BE_MCH_ACTUNV')) {
		new BE_MCH_ACTUNV_messenger('<your message>');
	}
?>`

Note: don't forget the backslash if you're inside a namespace.

`<?php
	if (defined('BE_MCH_ACTUNV')) {
		new \BE_MCH_ACTUNV_messenger('<your message>');
	}
?>`
	
== Changelog ==

1.0.0

- Initial release.
