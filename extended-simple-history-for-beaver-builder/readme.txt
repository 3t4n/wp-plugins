=== Simple History Beaver Builder Add-On ===
Contributors: webdogs, kylereicks
Tags: simple history, beaver builder, history, log, changelog, page builder
Requires at least: 4.1.0
Tested up to: 6.6.2
Stable tag: 1.2.1
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Extends the Simple History plugin to log changes made with the Beaver Builder front-end editor.

== Description ==

Simple History Beaver Builder Add-On extends the plugin [Simple History](https://wordpress.org/plugins/simple-history/) to add more detailed logs for changes made using the [Beaver Builder editor](https://www.wpbeaverbuilder.com/).

= Log Display =

The log display is very similar to the standard log display, with a few exceptions:

* A link to view the edited page is included.
* Changes are broken down by each Module/Column/Row that is added/deleted/updated.
* Detail sections expand and collapse to make the information easier to read.

See the Screenshots section for more details.

== Frequently Asked Questions ==

= Does this work as an add-on requiring Simple History to be installed? Or does this stand alone? =

Simple History Beaver Builder Add-On works as an add-on, and requires both [Simple History](https://wordpress.org/plugins/simple-history/) and [Beaver Builder editor](https://www.wpbeaverbuilder.com/) to be installed and activated to work as intended.

== Screenshots ==

1. The log display includes a link to view the edited page, changes broken down by each Module/Column/Row that has been added/deleted/updated, and detail sections expand and collapse.
2. For a new node, only the position is logged.
3. The updated node data is organized in three sections: Position, Rendered, and Settings.
4. The position section will be present when a node has been moved, and will include an approximation of the updated position. The old position is on the left, marked in red. The new position is on the right, marked in blue.
5. The Rendered and Settings sections are closely related. For modules, and to some extent for rows and columns, changes can be understood more clearly from looking at the rendered HTML or CSS than from looking at the individual setting changes.
6. In the Settings section, each updated setting is included. This information can be helpful in seeing what was changed, but can also  be a little unclear on its own. It may be helpful to review the updated settings in conjunction with the updates in the Rendered section.
7. Layout setting (Layout JavaScript and Layout CSS) changes will appear as their own entries in the log.
8. Global settings appear in their own log entry.

== Changelog ==

= 1.2.1 =
* Address issue with saving logs. Add additional checks for missing data.

= 1.2.0 =
* Update namespaces and methods for Simple History 4.0.

= 1.1.1 =
* Fix PHP 8 warnings.
* Remove \SimpleHistory type-hints.

= 1.1.0 =
* Add a visual diff to color changes.
* Change plugin name to "Simple History Beaver Builder Add-On".

= 1.0.1 =
* With Beaver Builder 2.4.2 the script handle `fl-builder-bundle` is changed to `fl-builder-system`.

= 1.0.0 =
* Initial stable release.
