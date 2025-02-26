
=== AddFunc Slides ===

Contributors: AddFunc,joerhoney
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7AF7P3TFKQ2C2
Tags: slides, slideshow, slider, tabs, carousel, presentation, introduction, content type, cpt, shortcode, widget, multiple
Requires at least: 3.0.1
Tested up to: 5.2
Stable tag: 2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An easily manageable slide content type with intuitive shortcode & widget interfaces, including standard slidshow options. Fully CSS styleable.

== Description ==

AddFunc Slides' native and intuitive custom post type (called Slides) and taxonomy (called Slidesets) utilizes the powerful content management and editing features built into WordPress core. That is what makes it easy to grasp and manage. It includes administrative features such as quick edit, bulk edit, column sorting and a properly placed Slide Settings page (under Slides, not under the general Settings section).

AddFunc Slides was made for CSS coders/themers, as well as for average WordPress users. It comes as a plug & play package with it's already active [default stylesheet](http://addfunc.com/slides/), providing a basic but robust slideshow presentation interface. This stylesheet can be turned off in Slides->Settings, allowing a CSS coder full control over the entire look and feel of slideshows including transitions. The vanilla JavaScript slideshow script only changes classes and does not use the style attribute, meaning all state changes can be animated by CSS.

One of the things that makes Slides so easy to manage is the Edit button displayed with each Slide on the front-end when you're logged in with Editor privileges. When you see a Slide in your slider that you want to edit, simply click the Edit button and you're now editing that very Slide. Slides can also be moved from one Slideset to another with a couple of clicks. No need to migrate Slides by copy & paste.

Slides are just like Posts or Pages, with the standard Visual/Text editor, revisions, publication settings, featured image (used for thumbnails), etc. The big difference is that they are made for slideshows. Additional specialized Slide options allow you to upload/select a main image using the Media Library (so you can keep that separate from the editor content), link the main image to any Page, Post or other URL/URI, select the nature of the Slide (Imagery or Content) and set the Slide's priority (any numeric value). You can even upload/select a background image (also using the Media Library), so there is no need to use your stylesheet to do a CSS background-image for each Slide.

Specialized buttons in the editor (TinyMCE) make it easy to add the CSS classes of a set, appropriate for slideshow objects and supported by the default stylesheet. These include four directional options (left, right, up and down), two rotational options (clockwise and counter-clockwise), an incremental option (with up to six increments) and a decremental option (with up to six decrements). These classes can also be styled or animated by CSS and can therefore be repurposed for any need a web developer deems them best suitable for. We gave these buttons generic names for that very purpose.

The shortcode [slides] supports parameters for every feature the slideshow script has to offer, while not requiring any of them at all (except where customization is necessary, of course). These features include

    *   slideset — Selects a specific Slideset by slug
    *   auto — Automates Slide transitioning
    *   speed — Duration each Slide is displayed
    *   prevnext — Adds "Previous" and "Next" buttons
    *   pause — Adds a Pause button
    *   tabs — Adds tabs/pager with optional labels and/or thumbnails
    *   tabsfirst — Outputs tabs before the slideshow instead of after
    *   stoppable — Stops automated transition upon user interaction
    *   pauseonhover — Pauses automated transition upon hover/mouseover
    *   fullscreen — Adds Fullscreen button (note limited browser support)[http://caniuse.com/#search=fullscreen]
    *   swipe — Adds touchscreen swipe capability. (By default, left = next Slide, right = previous Slide. Also includes up = next Slide, down = previous Slide, and a few other combinations thereof)
    *   class — Adds CSS class(es) to the slideset container
    *   order — The order in which Slides are displayed
    *   orderby — What the display order is based upon — date, priority (if set in Slide options), name, ID, random

A Help Tab is available (when editing any Post, Page, etc.) with simple but detailed instructions on how to write [slides] shortcodes, including all options available, as well as currently created Slidesets.

The Slides Widget supports all of the same options as the shortcode, with a comprehensive set of on/off settings and multiple choice boxes. And of course for you themers, if you would like to do_shortcode in your theme files, that option is available as well.

We have big plans for AddFunc Slides. We created it because we couldn't find any other slideshow plugin that works anything like this one does. That's really the basis by which we build all of our plugins — to fill a needed gap. We hope that you find this plugin to be as vastly useful as we do.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Slides->Settings screen to configure the plugin as needed
4. Create Slides as needed using the 'Add new Slide' button/option
5. Create slideshows as needed using the Slides Widget or [slides] shortcode

== Frequently Asked Questions ==

= How do I change the look of the slideshow? =

AddFunc Slides was designed to be developer-firendly. As such, short of it's optional default stylesheet for plug & play purposes, Slides is free of the added clutter many other plugins have for styling purposes. If you (or your development person/team) can code in CSS, you can use the default stylesheet as a starting point or build your own from scratch. Just be sure to load your custom stylesheet from outside of the plugin, so that updates don't overwrite your work. A great place to house your custom stylesheet would be in a child-theme folder.

= How do I turn off the default stylesheet? =

Go to Slides > Settings. You'll see the option there.

= Is there an easier way to give my slideshows a different look? =

Not yet, but there will be. Stay tuned, because we plan to build an online store loaded with skins for this plugin and others not yet released.

= What are all the available parameters for the shortcode? =

All available parameters are defined in the Help tab, when editing a Page, Post or similar Post Type. You can also find the list of parameters in the main Description of this plugin profile or readme.txt.

= Why isn't the `order` property working when I set it to DESC (descend)? What order are my Slides in if I didn't set Priorities or the `order` property? =

By default, Slides are output in ascending Priority order (lowest value to highest). Any Slides that have the same Priority value are effectively grouped together in sequence and appear in their "group" in the order they are found in the database (whichever order they were created in — oldest to newest). Therefore, if you want your slideshow in ascending date order and you created your Slides in that order, you can achieve that end without setting any Priorities or specifying the `order` or `orderby` properties. However, it is still technically sorting by Priority and not taking the date into consideration at all. So to change your slideshow to descending date order you will need to specify that you want it ordered by date. Please note also that an empty Priority value 0.0 and -0 are equal to 0 and are thusly grouped together as well.

== Screenshots ==

1. All of the Slides features are in the Slides tab on the left and behave just the same as Posts and Pages, with the addition of the Priority and Type settings for more managing options.
2. The widget provides a comprehensive set of all the options available in AddFunc Slides.
3. When creating a Slide, these specialized options can use utilized to quickly add CSS classes to the objects in your Slide, giving them action or purpose. The default stylesheet uses these classes to animate object according to their iconic representation, but you can write your stylesheet to treat these classes in whatever way you want.
4. When editing a Page, Post or any other content type where you might need to add the [slides] shortcode, this Help Tab is available at the top of the page, so you never have to navigate away from the editing page to lookup what your shortcode options are.
5. While the default stylesheet supports all options in an elegant fashion on its own, much more can be said about the styling and developmental freedom available in AddFunc Slides... Also, notice the Edit button (only shows up when you're logged in). :)

== Change Log ==

= 2.6 =
10 Dec 2018

*   Improves Slide editor UI:
    -   Modeled after AddFunc's new AddFunc Backgrounds plugin.
    -   Visual queues help to better portray what the Slide will look like.
    -   More focus on the more prevalent fields, such as Background, Main Image, etc.
    -   Less focus on the TinyMCE content editor.
*   Fixes all conflicting save_post issues:
    -   Combines all save_post instances into one, for better efficiency, etc.
    -   Fixes Quick Edit, Bulk Edit and Slide Update issues.
*   Fixes other issues found.

= 2.5.1 =
29 Nov 2018

*   Separates addfunc-slides.php into smaller files for better organization and code readability:
    -   addfunc-slides.php (still the main file)
    -   edit-page.php (for edit page columns, quick edit and bulk edit)
    -   help-tab.php
    -   mce-buttons.php
    -   metaboxes.php
    -   settings.php (Slides Settings page)
*   Issues found:
    -   (!) Ran into conflicting save_post instances.
    -   (!) With currently used save_post instance (aFSSaveBEorQE() in edit.php), checkboxes aren't saving.

= 2.5 =
26 Nov 2018

*   Removes conditionals for CSS and JS inclusion — now included always.
    -   The shortcode was failing in too many cases because of this feature.
    -   The shortcode now works in cases it didn't before.
    -   While the now unavoidable added resources are a compromise, it was decided this would make the plugin useful to a wider audience.
    -   We apologize for any inconvenience this decision may have caused.
    -   A new solution for this issue will be in consideration in the future.

= 2.4 =
24 Sep 2018

*   Fixes the Choose Image button/file uploader (now works whether the Slide has been saved yet or not).
*   Releases changes to the WordPress Plugin Repository (most importantly the shortcode fix from 2.3.1).

= 2.3.2 =
18 Sep 2018

*   Fixes the Edit link per Slide (I think).

= 2.3.1 =
23 Aug 2018

*   Fixes shortcode.
    -   It was found that the function (`aFSScFn()`) for conditionally writing the shortcode function (`aFSSc()`) can be called multiple times, triggering an attempt to redeclare the shortcode function.

= 2.3 =
28 Jul 2017

*   Fixes shortcode.
    -   An attempt to fix script/stylesheet conditional enqueue in 2.2 completely broke the shortcode.
    -   Script/stylesheet conditional enqueue appears to load unconditionally when active in a widget area, even if a plugin like Widget Options is hiding all Slides widgets from the page. Edit (23 Aug 2018): This is because Widget Options merely hides widgets while still outputting them to the DOM.

= 2.2 =
27 Jul 2017

*   Fixes check for $aFSOptions['aFSDefaultColor'] and $aFSOptions['aFSDefaultSize'] (was causing WordPress to throw an error)
*   Other minor improvements in the admin area, including updating the Help tab.

= 2.1 =
20 Jul 2017

*   Adjusts prev & next buttons in default stylesheet (addfunc-slides.css).

= 2.0 =
17 Jul 2017

*   Adds option on Settings page to set default color and font-size rules.
    -   This can be overwritten on individual slideshow instances.

= 1.5 =
14 Jul 2017

*   Adds `color` parameter to both the shortcode and the widget.
    -   Accepts any standard CSS color unit.
    -   Sets a CSS color rule (this will affect all fonts except where overwritten by higher ranking CSS selectors).
    -   Sets the color of the slideshow controls.
*   Adds `size` parameter to both the shortcode and the widget.
    -   Accepts any standard CSS font-size unit.
    -   Sets a CSS font-size rule (this will affect all fonts except where overwritten by higher ranking CSS selectors).
    -   Sets the size of the slideshow controls.
*   Removes SVGs (replaced by aFIcons font)

= 1.4 =
13 Jul 2017

*   Adds aFIcons font (aFIcons.ttf and aFIcons.woff) for default control icons.
*   Updates addfunc-slides.css to use aFIcons font instead of SVGs.
    -   Sizes icons with em units, so icons are scalable.
    -   Colors icons with currentColor unit, so icons will inherit their color.
*   Moves .ratio-set and .height-set classes to the outermost wrapper .addFuncSlides
*   Fixes fullscreen view when used with a set aspect ratio

= 1.3 =
30 Jun 2017

*   Adds option `height` to specify the height of the slideshow to both the shortcode and the widget, using CSS units. Examples: 600px, 100vh, "calc(400px + 2em)", auto.
    -   Uses inline style on figure.slide if set, otherwise no inline style is added to the output.
    -   Adds class .height-set if set, unless ratio is set.
*   Adds option `ratio` to specify the aspect ratio of the slideshow to both the shortcode and the widget. Overrides height. Examples: 16:9, 4x3 or preset (HD, square, half, portrait).
    -   Uses inline style on figure.slide if set, otherwise no inline style is added to the output.
    -   Adds class .ratio-set if set and prevents .height-set from being added if hight is also set.

= 1.2 =
21 Jun 2017

*   Adds options to add custom CSS classes to the tabs wrapper (.aFTabs):
    -   Adds `tabsclass` parameter to shortcode (ex. [slides tabsclass=my-class]).
    -   Adds "Tabs classes" option to widget (enter any valid CSS classes).
    -   Note: Does not work if tabs is set to "true" while "tabsfirst" is not selected (or for the widget: "Tabs (pagenation)" = "ON" and "Place tabs before slideshow" = "NO" respectively). This is because the tabs in this case are generated by addfunc-slides.js as opposed to being output as HTML.
*   Adds option to use "all" on parameter `slideset` in shortcodes (same as excluding the `slideset` parameter altogether) (ex. [slides slideset=all]).
*   Adds "All Slides" to the "Slideset" option for widgets. Automatically uses all slides if no Slidesets have been created and/or selected.
*   Fixes widget form output (which was messing up the widget editing page if no Slidesets had yet been created).
*   Minor code and Help tab cleanup.

= 1.1 =
3 Apr 2017

*   Adds alt attributes to thumbnail images, using the Slide title

= 1.0.1 =
30 Jan 2017

*   Prevents admin editing script from inclusion on other post types
*   Minor code cleanup

= 1.0 =
2 Aug 2016

*   Changes the default orderby property to `priority`. When all Slides have the same priority, they are sorted by ID (I believe), regardless of order property
*   Fixes minor CSS flaw
*   Updates readme.txt FAQ question about sort ordering
*   Uploaded to WordPress repository as tag 1.0

= 0.29 =
29 Jul 2016

*   addfunc-slides.js now adds additional class `empty-tabs` to tabs list element (`.aFTabs`) when generating the tabs (as opposed to using an existing set of tabs)
*   Adds class `empty-tabs` to tabs list element (`.aFTabs`) when thumbnails and labels are not included and tabsfisrt parameter/option is true (even though addfunc-slides.js is NOT generating the tabs in this case)
*   Adds class `tabs-first` to outer-most wrapper when tabsfisrt parameter/option equals true
*   Improves default stylesheet to make all various tab types/combinations more consistent and esthetic
*   Updates readme.txt (including reducing the number of tags to 12)
*   Resubmitted to WordPress repository and APPROVED!

= 0.28 =
23 Jul 2016

*   Completes readme.txt
*   Submitted to WordPress repository

= 0.27.1 =
19 Jul 2016

*   Changes Slides edit button so that Editor role can edit Slides too
*   Fixes classes added in 0.27 for shortcodes

= 0.27 =
8 Jul 2016

*   Adds classes to the main container to indicate when tabs, thumbnails, labels, previous & next controls and pause control are included
*   Improves stylesheet to utilize the above new main container classes to reposition the previous & next controls and pause control accordingly, when including labels and/or thumbnails
*   Adds thumbnail and label styles to the stylesheet

= 0.26 =
6 Jul 2016

*   Adds classes to the tabs container to indicate when thumbnails or labels are included
*   Fixes Metabox's Type > Content radio button (wasn't saving)

= 0.25 =
5 Jul 2016

*   Adds Help Tab for writing shortcodes
*   Adds styling to tabs in addfunc-slides.css
*   Updates readme.txt with more data

= 0.24 =
29 Jun 2016

*   Adds Slides Settings page
*   Adds option to turn off default stylesheet (addfunc-slides.css) to Slides Settings page

= 0.23 =
13 Jun 2016

*   Fixes TinyMCE buttons so that they only deal with top-level elements in the editor DOM (only direct descendants of the body element)
*   Buttons also clean our slideshow-specific classes out of the DOM while climbing it to the top-level element
    -   This is good because copying & pasting within WordPress usually carries with it all CSS classes
*   Note: We only want our slideshow-specific classes used on top-level elements because:
    -   Allowing child elements to have these same classes introduces too much complexity, difficulty in prediction and much limitation
    -   When in a tree of elements, a WordPress user can only add a class to one element in the tree and a he/she does not get to decide which level (direct element, parent element, parent's parent, etc.)
    -   It would only make sense to apply the class to the element directly selected, or the top-level parent. Anything in-between would be confusing and hard work with
    -   The top-level parent would provide the most flexibility. In this way, we can have wrappers, sub-wrappers and control children of various types and in different ways
    -   Applying the class to the directly selected element would only give us control over that element. Also, the element would become unchangeable with the button, once you enclose all of its content with an inner wrapper — you then could only affect that inner wrapper with the buttons. This would be confusing and a nuisance if encountered
    -   For those who specifically wish to add classes to the children, they can with a little HTML know-how in Text view. The Visual editor buttons are for the broader convenience and for the less savvy website builder who would be less likely to understand the difference in CSS class placements in the DOM

= 0.22 =
7 Jun 2016

*   Fixes TinyMCE buttons so they indicate with their active state that you have applied the class to the element (when clicking the button, not just after deselecting the element and selecting it again)
*   Adds notices to the Slide metabox explaining the known issues with the text fields in this version of AddFunc Slides:
    -   The [Choose Image] file uploader/selector buttons don't provide the popup windows that they should, until the Slide is saved. The image-path fields do however accept and store any valid data that is manually entered
    -   The link selector highjacks the function used for adding links in the main editor. The adverse result is that *after* you save the Slide, the [link] Quicktag (in Text view) adds your chosen URL to the Slide metabox Link field instead of your highlighted text in the editor. Additionally, the [Choose Post] button doesn't provide the popup window that it should until the Slide is saved. The Link field does however store any valid data that is entered

= 0.21 =
3 Jun 2016

*   Adds independent swipe capability to addfunc-slides.js
*   Removes Hammer.js and the dependency for it
*   Swipe parameters (Widget/"shortcode"):
    -   Horizontal/"true": (default) prevents scrolling while swiping left or right but not up or down, left decrements Slide, right increments Slide
    -   Vertical/"vertical": prevents scrolling while swiping up or down but not left or right, up decrements Slide, down increments Slide
    -   Both/"both": prevents scrolling while swiping up, down, left or right, up and left both decrements Slide, down and right both increments Slide
    -   Any/"any": allows scrolling while swiping up, down, left or right, up and left both decrements Slide, down and right both increments Slide (note: in practice, it appears the devices scroll event overrides this touch event, therefore scrolling up and down do not work with this setting)
    -   OFF/"false": removes swiping capability, scrolling is unaffected

= 0.20 =
1 Jun 2016

*   Adds labels option for tabs (shortcode & widget) — outputs a label in each tab using the Slide's titles
*   Adds thumbnails option for tabs (shortcode & widget) — outputs a thumbnail in each tab using the Slide's featured images
*   Adds option to place tabs before the slideshow
*   Note: any of the above options will bypass addfunc-slides.js as the tabs will instead be output as HTML. addfunc-slides.js however still finds and controls the tabs all the same
*   Changes the widget's Tab checkbox/switch to a selectbox, which includes all supported options for tabs except placement

= 0.19 =
31 May 2016

*   Adds tabs to addfunc-slides.js — BOOM!
    -   Widget Tabs button (checkbox/switch — Off by default)
    -   Shortcode Tabs parameter (true/false — false by default)
    -   Insert via JavaScript — empty ordered list items, which correspond and interact with the Slides
*   Breaks swipe capability :( — attempting to improve it

= 0.18.2 =
23 May 2016

*   Fixes script to wait for page load to add .current to the first slide

= 0.18.1 =
12 Apr 2016

*   Fixes a PHP error message due to an expected value not being defined
*   Fixes breaking of other plugin's TinyMCE button implementation by returning the needed arrays regardless of change. More specifically, `$plugin_array` and `$buttons` were being passed to `aFSMCEPlugin()` and `aFSRegButton()` and not returned unless the post type was Slides

= 0.18 =
7 Apr 2016

*   Adds CSS Classes field to Slides metabox for adding classes to individual Slides
*   Adds element control buttons to the editor (TinyMCE) for the Slides post type. Buttons simply add a CSS class to the parent-most element selected in the editor. Theme coders can create different animated effects using these CSS classes:
    -   Direction Left
        -   Icon: dashicons-arrow-left-alt (left arrow)
        -   Action: adds/removes class `direction-left`
        -   Suggested use for class: leftward or backward movement or action
    -   Direction Right
        -   Icon: dashicons-arrow-right-alt (right arrow)
        -   Action: adds/removes class `direction-right`
        -   Suggested use for class: rightward or forward movement or action
    -   Direction Up
        -   Icon: dashicons-arrow-up-alt (up arrow)
        -   Action: adds/removes class `direction-up`
        -   Suggested use for class: upward movement or action
    -   Direction Down
        -   Icon: dashicons-arrow-down-alt (down arrow)
        -   Action: adds/removes class `direction-down`
        -   Suggested use for class: downward movement or action
    -   Rotate Clockwise
        -   Icon: dashicons-image-rotate-right (right rotating object)
        -   Action: adds/removes class `rotation-clock`
        -   Suggested use for class: rightward or clockwise rotation
    -   Rotate Counter Clockwise
        -   Icon: dashicons-image-rotate-left (left rotating object)
        -   Action: adds/removes class `rotation-ctr-clock`
        -   Suggested use for class: leftward or counter clockwise rotation
    -   Increase/More
        -   Icon: dashicons-arrow-up (triangular up arrow)
        -   Action: adds class `mor` or adds another `r` to it (`morr`, `morrr`, etc. — caps at 6), or removes class `les` or subtracts `s` if more than one (`lesss`, `less', etc.)
        -   Suggested use for classes: increments of something, such as speed, depth or size of object
        -   Note: could be set to mean different things depending on the inclusion and/or combination of other classes
    -   Decrease/Less
        -   Icon: dashicons-arrow-down (triangular down arrow)
        -   Action: adds class `les` or adds another `s` to it (`less`, `lesss`, etc. — caps at 6), or removes class `mor` or subtracts `r` if more than one (`morrr`, `morr', etc.)
        -   Suggested use for classes: same as above
        -   Note: both the `les` classes and the `mor` classes should apply to the same property (as opposed to for instance the `mor` classes affecting the size while the `les` classes affect the color). The absence of either should equal "0" or "default", so it is a bidirectional scale with a limit (stops at 6 in both directions)
*   Updates addfunc-slides.css to set positioning rules for top-level parent elements only
*   Note: WordPress always wraps images and span-based elements (such as `a` elements) with a `p` if it isn't already wrapped with a `div`, `li`, `blockquote`, `h(1-6)` or another block-based element. This is why the above new editor icons only select top-level elements. There's no sense in trying to select and manipulate child elements for slideshow effects, as they may be restricted by their parent elements (which naturally can be very limiting)

= 0.17 =
28 Mar 2016

*   Adds Priority setting to Slide Options metabox
*   Adds control over Slide `orderby` property (to sort Slides by date, by title, randomly, etc.)
    -   Accepts any of the standard `orderby` options: https://codex.wordpress.org/Class_Reference/WP_Query
    -   Accepts "priority" as an additional option to support new Slide priority value
    -   Adds `orderby` parameter to shortcode (ex. [slides orderby=priority])
    -   Adds Sort By option to widget — text field
*   Adds control over Slide order — ASC (ascending) or DESC (descending)
    -   Adds `order` parameter to shortcode (ex. [slides order=asc])
    -   Adds Sort Order option to widget — Ascend/Descend (Default: Descend)
    -   Orders the slideshow DOM output by this property as expected
*   Allows Quick Editing and Bulk Editing of Priority and Type (imagery/content) on Slides edit page
*   Allows Slides edit page table sorting by Priority and Type


= 0.16 =
14 Mar 2016

*   Adds three more options to the Slide content type metabox
    -   Alt Attribute (for Main Image) — Automatically populates from inserted image's Alt field
    -   Link (for Main Image) — Uses WordPress Page/Post pop-up menu (wpLink) to select page or manual URL entry
    -   Open link in a new tab (for Main Image) — Automatically populates from inserted link's corresponding field
*   Adds an alt attribute to the Main Image
*   Adds a link wrapper around the Main Image with class .slide-main-img-link
*   Adds (if set) `target="_blank"` to the Main Image link wrapper
*   Updates addfunc-slides.css
    -   Styles .slide-main-img-link so it is not collapsed (since it is an `<a>` tag)

= 0.15 =
7 Mar 2016

*   Adds two more options to the Slide content type metabox
    -   Main Image — Optionally uses Media Library to select file for the Main image of the Slide, otherwise accepts a path to the file
    -   This Slide is content (Default = Imagery) — Provides a value to delineate the intended purpose for the Slide
*   Adds Main Image (if set) as the first element with class .slide-main-img, just before the remaining content of the Slide
*   Adds class .of-content to the Slide if selected in the metabox, else adds class .of-imagery
*   Moves Slide's Edit button outside the div.slide-content, to make it easier not to style it accidentally
*   Updates addfunc-slides.css
    -   Sets rules for slide.of-imagery to help it behave like an imagery presentation

= 0.14 =
4 Mar 2016

*   Updates addfunc-slides.js
    -   Changes span.recede and span.proceed to span.prev and span.next (respectively)
    -   Adds div.prev-next-control wrapper to house span.prev and span.next
    -   Adds div.pause-control wrapper to house span.pause
*   Updates addfunc-slides.css
    -   Uses .prev and .next instead of .recede and .proceed (respectively)

= 0.13.1 =
26 Feb 2016

*   Moves all .js files to the /js directory
*   Fixes widget, so the Slideset dropdown field will reflect which Slideset is saved

= 0.13 =
26 Feb 2016

*   Adds function aFAutoParam()
*   Adds addfunc-slides.js
*   Adds addfunc-slides.css
*   Adds SVG graphics for CSS
    -   arrow-left.svg
    -   arrow-right.svg
    -   pause-play.svg
*   Adds hammer.js
*   Adds Shortcode [slides], which inserts a slideshow using addfunc-slides.js and addfunc-slides.css. Parameters:
    -   slideset=slideset-slug (default: NULL) — Specifies the Slideset from which to pull and use the Slides
    -   auto=true/false (default: false) — Makes the slideshow advance through the Slides automatically
    -   speed=milliseconds (default: 7000) — Milliseconds between Slide transitions
    -   prevnext=true/false (default: true) — Generate a "Previous" and "Next" button to navigate through the Slides with
    -   pause=true/false (default: false) — Generates a "Pause" control to pause the auto-advancing of Slides
    -   stoppable=true/false (default: true) — Makes navigational controls stop the auto-advancement of slides
    -   pauseonhover=true/false (default: true) — Makes auto-advancing pause whenever the user hovers/rolls their mouse over the slideshow
    -   fullscreen=true/false (default: false) — Generates a "Fullscreen" control which allows the user to view the slideshow in Fullscreen mode
    -   swipe=true/false (default: true) — Makes the slideshow swipe-friendly (currently loads and uses the hammer.js script)
    -   class=css classes (default: NULL) — Allows admins to add custom CSS class(es) to the outer-most wrapper of the slideshow DOM
*   Adds Widget (uses all the same files and parameters as the shortcode—just different names for the parameters to make widget more comprehensible
*   Adds metabox to Slides content type, which includes:
    -   Background Image — Allows admins to choose an image from the media library to use as the background image for the Slide wrapper (ex. `<figure class="slide" style="background-image: url(http://example.com/wp-content/uploads/example-bg.jpg);">`)

= 0.12 =
12 Feb 2016

*   Adds functions aFslug() and aFget_posts()
    -   Note: aFslug() replaces the_slug() for AddFunc plugins
*   Adds code and files, which are not yet utilized (Versioning software? What's that?)

= 0.11 =
30 Mar 2015

*   Removes access for all roles except Administrators

= 0.10 =
18 Jun 2014

*   Now allows other plugins to use avrgsldshows_init() to create the Slideshow taxonomy
*   Now allows other plugins to use avrgslds_post_type() to create the Slides post type
*   Removes all ResponsiveSlides.js functionality and code into a new plugin, Average ResponsiveSlides, which depends upon Average Slides 0.10+ for it's Slides and Slideshows
*   To upgrade, install and activate both Average Slides 0.10+ and Average ResponsiveSlides and change your shortcode(s) to [responsiveslides (...)] instead of [average-slides (...)]. Your slides will remain intact and the parameters are still supported by Average ResponsiveSlides.


= 0.9 =
10 Apr 2014

*   Now sets separate jQuery selectors per shortcode instance rather than one that manages all instances
*   Now supports all ResponsiveSlides.js parameters as shortcode attributes (example: [average-slides nav=true pager=true auto=false])
*   Defaults now come from the script and therefore match what the website says: http://responsiveslides.com/
*   Updated Description

= 0.8 =
24 Mar 2014

*   Adjusts jQuery init (was breaking AJAX on Contact Form 7 forms, now it's not)
  - Now uses: jQuery(function($) { $(document).ready(function() {
	- Was using: jQuery(document).ready(function ($) {
*   Removes WordPress User ID taxonomy field (wasn't intended as part of this plugin--was probably accidentally included from a tutorial)

= 0.7 =
19 Mar 2014

*   Enqueues stylesheet and script ONLY if the shortcode is found in the post
*   Subtracts support for widgets: Does not search widgets for the shortcode, so it doesn't load stylesheet and script based on that (it does still work however, if there also happens to be a shortcode in the post)
*   Adds shortcode parameter "timeout" which currently only accepts "5000" and "10000"
*   Modifies jQuery selectors to include shortcode instances with class "timeout-5000" and "timeout-10000" (milliseconds)

= 0.6 =
11 Mar 2014

*   Adds Edit button for each slide for quicker access
*   Adds Dashicon to Edit button

= 0.5 =
07 Jan 2014

*   Added Dashicons icon for Slides content type
*   Added Taxonomy Slideshows column in admin "Slides" page

= 0.4 =
12 Nov 2013

*   FIX: Shortcode was outputting HTML before page widget wrapper. Used ob_start() to control output

= 0.3 =
25 Oct 2013

*   Renamed Average Slides (was Average Slideshows)
*   Adds taxonomy Slideshows, machine name: slideshows
*   Shortcode parameter "category" replaced with "slideshow" parameter
*   Shortcode parameter "slideshow" requires taxonomy slug instead of id
*   Wrapper id attribute now uses taxonomy slug exclusively (no namespace—probably not needed for the id attribute)

= 0.2 =
19 Oct 2013

*   Added a better description, which includes how to use the shortcode

= 0.1 =
09 Aug 2013

*   Adds a custom content type for Slides
*   Uses Categories to group Slides
*   Provides shortcode with a "category" parameter (requires category ID)
