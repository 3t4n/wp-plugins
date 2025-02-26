== Akismet Spam Count == 

Akismet Spam Count retrieves the number of spam messages Akismet has caught. Akismet (http://akismet.com) is required in order to use this plugin.

== Installation ==
Drop the akismet_count.php file into /wp-content/plugins/, and activate the plugin.

== Usage ==
If you want to output just the number of spam messages Akismet has caught, add the following line of code to your template in the place you want it displayed:

<?php akismet_count(); ?>

This will output a plain number. Example: 34,875,935.

If you want to output a phrase instead of just the number, add the following line of code to your template in the place you want it displayed:

<?php akismet_count(1); ?>

This will output the phrase. Example: Akismet has protected cavemonkey50.com from 636 spam comments. The final output will have cavemonkey50.com replaced with the name of your blog.

== Version History ==
1.1 - Fixes a bug where if you didn't have any spam the plugin would report Akismet isn't installed.

1.0 - Initial Release

== Credits ==
Copyright (c) 2005 Ronald Heft, Jr. (ron@cavemonkey50.com)
Released under the terms of the GPL