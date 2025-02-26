=== ACE HTML Block ===
Contributors: willdelphia
Tags: raw html, syntax highlighting, ace editor, html block, block
Requires at least: 5.0
Tested up to: 5.1
Requires PHP: 5.2.4
License: GPL2
Stable tag: trunk
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

Registers a raw html block which uses the ACE Editor. Features include syntax highligting, line numbers, indentation, and HTML validation.

== Description ==

Registers a raw html block which uses the ACE Editor. Features include syntax highligting, line numbers, indentation, and HTML validation.

Any HTML markup included in your block will be interpreted and rendered on your user-facing page or post just like the core "Custom HTML" block. This plugin is not for embedding pretty markup on your front-end site, rather it is for those developers that need to include raw HTML in their pages or posts and want to improve the readability of their HTML snippets and have a better in-browser code editing experience.

### To Use:
Create a new block in the editor and look for "ACE HTML Block" in the Formatting section. It has a heart icon. 

### Note on block transforms:
There (hopefully) may come a time in the future when Wordpress introduces native syntax highlighting on core "Custom HTML" blocks. This block is configured to transform to (and from) the core HTML block so the transition away from this plugin will be easy if you ever want to disable it.  To transform this block click on the heart icon in the upper left corner of the block and select "Custom HTML" from the dropdown menu. 

###Thanks:
Under the hood it uses [react-ace](https://github.com/securingsincity/react-ace).

== Screenshots ==
1. Take a look at those colors!