=== Pivotpress ===
Contributors: alexharris
Tags: bug tracker, bug tracking, bugs, bugtracking, testing, support, customer support, feedback, issue tracking, issue-tracking, pivotal, pivotal tracker, user testing, workflow
Requires at least: 4.4
Tested up to: 4.4
Stable tag: 0.2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple Pivotal Tracker frontend for Wordpress.

== Description ==
Pivotpress displays Pivotal Tracker stories on a Wordpress site. Whether for quick reference without having to log into Pivotal Tracker, or for less-technical users who are wary of Pivotal Tracker's UI, Pivotpress seeks to provide an easily understandable snapshot of a project.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. svn rActivate the plugin through the 'Plugins' screen in WordPress.
3. Use the Settings->Pivotpress screen to add a Pivotal Tracker API Token and a Project ID. Pivotpress will use this information to connect to Pivotal Tracker via it's API. You can find your API Token [here](https://www.pivotaltracker.com/faq#wherecanifindmyapitoken), and your project's ID number is contained in Pivotal Tracker's browser address bar. Also, the "Allow API Access" setting in the project's settings must be turned on. Please note that stories from non-public projects are still accessible if API access is allowed, and stories might be made visible to the public.
4. Include the [pivotpress] shortcode wherever you want your project to appear.


== Frequently Asked Questions ==

= This plugin doesn't really do anything =

Well, it certainly doesn't do much, which is part of the point. Pivotal Tracker does A LOT, and this aims to just be a small piece of assistance for displaying a project.

= Can I update my Pivotal Tracker project with this? =

Currently, there are no plans to support modifying a project via Pivotpress, only displaying existing data.

== Screenshots ==
1. Pivotpress

== Changelog ==

= 0.2.6 =
* Add missing fonts

= 0.2.5 =
* Switch to Bootstrap
* Add "all" story status option

= 0.2 =
* Add labels to stories
* Add filtering by label

= 0.1 =
* Basic story output, display story name, estimate, and story type
* Filtering by story status
* Color coded


== Roadmap ==

* Add separate shortcodes for various story types and statuses
* Add additional story information, such as requester, owner, description, attachments, etc
* Add support for epics, as well done, current, backlog, and icebox columns
* Add search