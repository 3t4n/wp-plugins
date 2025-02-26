=== FireStudio ===
Contributors: joshualjohnson
Donate link: https://ua1.us/projects/firestudio
Tags: debug, api, developer, debugging, data, rest, framework
Requires at least: 5.1
Tested up to: 5.3
Requires PHP: 7.2
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Build, Create, & Make on Wordpress

== Description ==

FireStudio is a simple and elegant framework for building apps and features for Wordpress. It was build with OOP and encourages developers to build their featuring using the same OOP approach. FireStudio also features a highly customizable debug panel packed with tools to help you debug your Wordpress website. Even if you're not going to leverage the FireStudio API, the debug panel is well worth installing this plugin.

=== Debugger Debug Panel ===

A debugger panel for designating a place for your var_dumps to go. Instead of using var_dump(), simply use debugger(). The debugger function will do the exact same thing as var_dump except, you'll be able to open the FireStudio Admin Modal to view all of your debuggers, instead of having to guess where your var_dump went.

=== Wordpress Actions Debug Panel ===

A debug panel that gives you access to see what action hooks are being executed, the order in which they are being executed, and the number of times each hook is being executed. Not only that, but for each hook that is executed the Actions Debug Panel also gives you vision into which callbacks are executed.

=== Wordpress SQL Debug Panel ===

A debug panel that allows you to see what MySQL queries ran to render the current page you are viewing.

=== Ability to Create Your Own Debug Toggles ===

FireStudio comes build in with the ability to create your own debug toggles. In FireStudio, debug toggles allow an Admin User to enable certain functionality for the session they are signed in for. This gives you the ability to preview functionality before it is ready for production.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Once activated, you will notice a new menu button on your admin bar. Clicking this button will give you access to the FireStudio tools that are currently bundled with the plugin.

== Frequently Asked Questions ==

= What is FireStudio? =

FireStudio is an app/feature development framework that will assist you in building apps and features into Wordpress. FireStudio also comes with an Admin Panel for accessing information about the environment Wordpress is running in.

= Who is FireStudio for? =

FireStudio is mostly built for developers. We have a long term vision to start adding features for Wordpress admins and eventually regular users. See our long term vision plan: https://ua1.us/updates/news/the-vision-for-firestudio-and-our-other-ua1-labs-php-fire-libraries/

= What is the FireStudio Admin Panel used for? =

FireStudio comes built with an Admin Panel accessible from any page via Wordpress' Adminbar. When you load activate FireStudio, the first thing you might notice is that we add a button to the Adminbar with the FireStudio logo. This button gives you access to the FireStudio Admin panel. This Admin Panel contains many features you may want to use while you are developing. For example, you may want to see all the notices that PHP gives when your page is loading. Or you may want to get information about the hooks that are running and which callbacks are tied to each hook.

== Screenshots ==

1. The FireStudio admin panel, debug toggles, and debug panels.
2. The debugger debug panel.
3. The Wordpress action hook debug panel.

== Changelog ==

= 1.2.1 =
* Added descriptions to debug panels.
* Fixed all security vulnerabilities related to xss injection.

= 1.2 =
* Added addFrontendScript(), addAdminScript(), addFrontendStylesheet(), addAdminStylesheet() to \UA1Labs\Fire\Studio\Feature.
* Integrated \UA1Labs\Fire\Sql for database access.
* Fixed security issues related to rendering phtml templates.

= 1.1 =
* Refactored core code to open up APIs for other developers to hook into.
* Added "Wordpress Actions" debug panel to allow you to debug your action hook execution.
* Many random bug fixes.

= 1.0 =
* The initial release

== Upgrade Notice ==

= 1.2.1 =
* This release includes updates to fix vulnerabilities related to xss injection.