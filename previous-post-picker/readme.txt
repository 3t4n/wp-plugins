=== Previous posts Picker ===
Contributors: dlo
Donate link:
Tags: post, internal link, write, tags, editor
Requires at least: 2.3
Tested up to: 2.3
Stable tag: 0.8.1

Shows previous posts related to the one you are writing for easy reference. This functionality is added to the post editing form.

== Description ==

Previous Posts Picker (P3) is aimed at the posts writers. It shows the previous posts related to the one you are writing for easy reference. This functionality is added to the post editing form making the link edition easier.

== Installation ==

1. download the archive
1. unzip and drop all the files, as is, in your plugins directory.
1. Enable the plugin in the WP Admin >> Plugins section.
1. Browse to WP Admin >> Write >> Posts or WP Admin >> Manage >> Posts then choose a post to modify.
1. Other languages
P3 is delivered in English and French but can be easily used with other languages. You just have to create a file PpP-xx_YY.mo (xx_YY being the language code of your WordPress settings. Eg: fr_FR for French) from the existing file PpP-fr_FR.po after translation of the text strings located after the "msgstr" tag.
The resulting PpP-xx_YY.mo file has to stored in the plugins directory.

(Note: if you are upgrading from a previous install, simply overwrite the older files with the new ones in the instructions above)

== Frequently Asked Questions ==

== Screenshots ==

== Documentation ==

In the post's edit form , P3 adds a box named "Show previous posts" on the right side of the screen and another box named "Previous posts list" below the text zone.

It's possible to rearrange the order of the boxes clicking on the box title and dragging it to the new location.

A) The "Show previous posts" box 
The "Show previous posts" box is used to set the parameters that will select the existing posts.

The parameters are:

A text zone "Posts number" to set a limit to the number of items displayed. Default value : 5.

A first box for the category selection.
A "Select category" checkbox to enable the selection of posts by categories.
The "Current post's categories" radio button,  if you want to use the categories set for the post in edition. It's the default value.
The "Other categories" radio button,  if you want to choose your own set of categories from the list below.
A list of existing categories. When the radio button is set on "Current post's categories", the current post's categories are automatically selected by the plugin. It's possible to manually select one or more categories (pressing the CTRL key while selecting) and then the radio button will be set on "Other categories" automatically.
When you are done modifying the parameters, just click on the  "Save and continue" button located below the text area. The parameters will be saved and the "Previous posts list" box content is updated with the set of corresponding posts.

A second box for the author selection.
A "Select author" checkbox to enable the selection of posts by authors.
The "Current post's author" radio button,  if you want to use the author of the post in edition. It's the default value.
The "Other authors" radio button,  if you want to choose your own set of authors from the list below.
A list of existing authors. When the radio button is set on "Current post's author", the current post's author is automatically selected by the plugin. It's possible to manually select one or more categories (pressing the CTRL key while selecting) and then the radio button will be set on "Other authors" automatically.
When you are done modifying the parameters, just click on the  "Save and continue" button located below the text area. The parameters will be saved and the "Previous posts list" box content is updated with the set of corresponding posts.

B) The "Previous posts list" box
This box, located below the text editing area, is used to display the list of posts matching the criterias set in the "Show previous posts" box. This list consists in posts titles with its permanent link (permalink), the categories set for the post, the author and date of publication. It's then easy to copy that link and paste it in the post's text editing area when you want to make a reference to a previous post.  

== History ==

2007/07/05	V.0.4.1		Selection by authors and catégories, date and author added to the 				resulting list of posts.

2007/06/20	V.0.2.1		Initial version
