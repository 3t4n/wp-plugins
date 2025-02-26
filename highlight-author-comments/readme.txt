=== Plugin Name ===
Contributors: RobMarsh
Donate link: http://rmarsh.com/donate/highlight-comment-author/
Tags: comments, highlight, automatic
Requires at least: 1.5
Tested up to: 2.6.1
Stable tag: 1.0.2

Highlight Author Comments automatically displays comments made by a post's author in a distinctive style

== Description ==

Highlight Author Comments automatically displays comments made by a post's author in a distinctive style with no need to edit your template files, etc. All you do is provide a snippet or two of CSS styling to be applied to author posts.

== Installation ==

Highlight Author Comments is installed in 3 easy steps:

   1. Unzip the "Highlight Author Comments" archive and copy the folder to /wp-content/plugins/
   2. Activate the plugin
   3. Use the Options > Highlight Comment admin page to enter the CSS styling you want to apply to author comments.

== Frequently Asked Questions ==

= What Do I Enter in the Options Page? =

The plugin Options page just has couple of text boxes where you put the bits of CSS you want to apply to highlighted comments. Don't include **{** or **}**: just the CSS. For example, by default the plugin applies the CSS `padding: 1em` which 'indents' the comment a little all round. If you wanted to also make the text red, for example, you would use `color: red; padding: 1em`.

You can style the body of the comment itself and/or the link to the comment author. 

= CSS Styling... What's That? =

Cascading Style Sheets (CSS) is too complex a subject to go into here. A good resource is provided by the [Web Design Group](http://htmlhelp.com/reference/css/).

= How About Some Examples? =

Here's where some artistry would be a help! In lieu of skill here are some examples to play with:

* padding: 1em;
* padding-left: 20px;
* background-color: #FFFF95;
* border-left: 1em solid #DDD; padding: 1em;
* background: white url(http://www.yourblog.com/images/fluffy-clouds.gif) 
* background-color: silver; margin-left: -2em; padding: 1em 1em 1em 2em; 
* etc.

= How Does It Know Which Comments to Highlight? =

The plugin simply compares the email of the post author with the email of the commentor. This works fine as long as a post author is logged in when commenting. It will fail if the author is not logged in and uses a different email.

== Version History ==

* Version 1.0.2
	* Workaround for WP bug that failed to style the first paragraph as a paragraph
* Version 1.0.1
	* Added the ability to style the comment author link
	* Added some security with nonces
* Version 1.0.0
	* Initial version