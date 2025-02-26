=== Plugin Name ===
Contributors: Alasdair Boyd
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DBZ7EUWDDRS38&lc=AU&item_name=DynaPoll&item_number=DynaPoll_WP&currency_code=AUD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: poll, survey
Requires at least: 2.9
Tested up to: 2.9
Stable tag: 1.0.4

The DynaPoll plugin enables you to embed your DynaPoll polls into your WordPress site. Create a poll at http://www.dynapoll.net. 

== Description ==

If you would like to host one of your polls or, indeed, any poll from DynaPoll on your site then this is the plugin for you!

You can setup a DynaPoll poll on http://www.dynapoll.net

It's extremely easy to install and even easier to use this plugin.You can check out the following video which demonstrates the use of the plugin.

http://www.youtube.com/watch?v=Kp707w1B4Zg

Full instructions found at: http://www.dynapoll.net/about/dynapoll_wordpress_plugin
== Installation ==

For full detailed instructions and the usage demonstration video please check http://www.dynapoll.net/about/dynapoll_wordpress_plugin

It's really easy to use the plugin. Before you can though you need to know the Poll Code for the poll you wish to display. You can grab your poll code from the Vote URL of the poll. 
Whereever there is a link to the poll on this DynaPoll, whether it is in your My DynaPoll page, in the Poll Browser or anywhere else, you can see the URL for the poll by either clicking on the question or 
right clicking on the question and choosing the option to "Copy Link Address". The code is the last parameter of the vote URL which looks like this:

http://www.dynapoll.net/survey/vote/1gQXDBnMx3CDppWbaLDH4

The URL above is for the What is your favourite colour? poll and the poll code for this is: 1gQXDBnMx3CDppWbaLDH4

You will also need to know the theme you wish to use. If you are not sure just try them all - there are currently only 2. You can choose between "light" and "dark". The shade refers to the 
shade of the background of the site you are embedding the poll in. So for example if you have a really dark site with a dark background you will choose theme "dark".

There are several ways you can embed a DynaPoll Poll into your Wordpress site:

In your Blog Posts or Page content put the following tag where you would like the poll to appear:

`[dynapoll: 1gQXDBnMx3CDppWbaLDH4, dark]`

OR

Anywhere in the WordPress Template put the following code:

`<?php 
     $poll_code = '1gQXDBnMx3CDppWbaLDH4';
     $theme = 'dark';
     echo dynapoll_get_poll($poll_code, $theme); 
?>`

OR

If you want to use it in a Dynamic Sidebar with a Widget we recommend downloading the [PHP Code Widget by Otto](http://wordpress.org/extend/plugins/php-code-widget "PHP Code Widget by Otto"). Drag the PHP Code Widget into 
your sidebar and paste the following code into the content of the Widget:

`<?php
      $poll_code = '1gQXDBnMx3CDppWbaLDH4';
      $theme = 'light';
      echo dynapoll_get_poll($poll_code, $theme);
?>`

**NEW FEATURES**
Using very similar methods to above you can also now use a different call to grab a random poll that you have created back at DynaPoll.
For this you will need to know your User Code. The User code will be shown on your "My DynaPoll" page (right hand side bottom of the user menu - for now!).

It's extremely similar to the above but to be clear this is how it's done. For the below example the user code is "98QXDBnMGGCDpFFaLD89".

In your Blog Posts or Page content put the following tag where you would like the random poll to appear:

`[dynapoll_random: 98QXDBnMGGCDpFFaLD89, dark]`

OR

Anywhere in the WordPress Template put the following code:

`<?php 
     $user_code = '98QXDBnMGGCDpFFaLD89';
     $theme = 'dark';
     echo dynapoll_get_random_poll($user_code, $theme); 
?>`

OR

If you want to use it in a Dynamic Sidebar with a Widget we recommend downloading the [PHP Code Widget by Otto](http://wordpress.org/extend/plugins/php-code-widget "PHP Code Widget by Otto"). Drag the PHP Code Widget into 
your sidebar and paste the following code into the content of the Widget:

`<?php
     $user_code = '98QXDBnMGGCDpFFaLD89';
     $theme = 'dark';
     echo dynapoll_get_random_poll($user_code, $theme); 
?>`


== Frequently Asked Questions ==

There are no questions to report at this stage :)

== Screenshots ==

No screenshots but check out the demo video here: http://www.youtube.com/watch?v=Kp707w1B4Zg

== Changelog ==

= 1.0 =
* Initial release

= 1.0.1 =
* Fixed a minor problem with images referenced by css not displaying. Cosmetic only

= 1.0.2 =
* Sorry can't remember what I changed here - I think it was small CSS changes and documentation changes

= 1.0.3 =
* This release introduces themes. I've only developed two so far. "light" is for light backgrounds, "dark" is for dark backgrounds.

= 1.0.4 =
* Improved some of the CSS for the poll formatting. Also added a new feature to be able to specify a user and have a random poll from that user appear on each page refresh.

== Upgrade Notice ==

= 1.0.1 =
* If you want it to look slightly prettier (haha) then upgrade :)

= 1.0.2 =
* Don't worry about this one now... go 1.0.3!!

= 1.0.3 =
* We recommend an upgrade for sure!! We have introduced themes "light" and "dark". If you don't upgrade then "dark" is the default. Ie; polls will look best on a dark background. 
Back at the DynaPoll site itself we have made quite a few changes but most significant to the WordPress community is that you can now create your boring old "traditional" polls
with a finite number of responses. 

Obviously we think you would be better off using a Dynamic "DynaPoll" style poll because that's what DynaPoll is all about. However we understand
that if you are asking a question like "Which do you prefer - Ferrari or Datsun 120Y?" that it doesn't make sense to let people suggest answers. So for this you can create a 
"traditional" poll. If your question was "Which is the best car of all time?" then we hope you will agree a DynaPoll is the way to go!

Whichever type of poll you create back at DynaPoll the process for plugging it into your WordPress site remains the same (except for the theme option we just introduced in this release).

= 1.0.4 =
* We had to make some changes to the HTML structure and the CSS to improve the look of the poll. We are already pushing through the changes to your polls with your current version
but with the overhead of extra inline CSS. It is recommended to upgrade the plugin which will remove this inline CSS.
* We didn't want to do a new release just for the above so we have also added the new feature for displaying a random poll for a particular user code. Check out the instructions for more details. You 
can now have a different poll appear each time the page is refreshed (if you have more than one poll of course!).