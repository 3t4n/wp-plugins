=== Plugin Name ===
Contributors: digamberpradhan
Tags: Display Action Hooks,Display Filter Hooks, 
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Plugin to help, see action hooks and filters, and what functions are hooked to them

== Description ==

Ever had that feeling where you hook into and action or a filter and for some reason your code isn’t working? well 9 / 10 the reason is your hook is in a lower priority(in case of filters) and it can simply be determined by searching through the code for that particular filer? Seems, a tedious amount of time doesn’t it? I’ve created a plugin for just that reason but it lists all hooks and filters and allows you to search through them to see whats being hooked.

To do this i’ve used a helper class from Query Monitor where I initially saw this being used, i’ve extended it to be more user friendly.


== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/digthis-action-filters` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Go to "View Filters" from the menu in the front end or alternatively use the "Show Filters" button to trigger a popup on the front end
1. Type the name of "Action Hook" or "Filter Hook" you want to see and it will display functions attached to those.
ex: init, the_content etc 


== Frequently Asked Questions ==

== Screenshots ==
1. Backend Menu Location
2. Frontend Menu Location
3. Type filter / action hook name
4. Result Backend
5. Result Frontend
== Changelog ==
= 1.0.1 = 
Do not load scripts if user is not logged in

= 1.0.0 =
First Version
