=== Intro Tour Tutorial DeepPresentation ===
Contributors: tomasgroulik, supportdeeppresentation
Tags: introduction, tour, tutorial, intro, help
Donate link: https://www.paypal.me/tomasgroulik/5USD
Requires at least: 5.2
Tested up to: 6.7
Requires PHP: 7.2
Stable tag: 6.5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Step-by-step tutorial guide, web or new feature intro tour created intuitively with the visual builder and detail configuration on the admin board


== Description ==
You can create an intuitive tour that guides people through your website or co-workers to manage your website via the WordPress admin board. You can choose how and when your tour starts and how it looks and behaves. This is all possible without any special technical knowledge, as the plug-in integrates the Visual Builder. If you have deeper technical knowledge, you can benefit from the advanced configuration that allows you to set up the tour for special scenarios as well.

>📺 [Live Demo](https://deeppresentation.com/plugins/dp-intro-tours/?dp-lock=promo-tour) | 🎨 [Theming](http://deeppresentation.com/plugins/dp-intro-tours/?dp-lock=start-theme-demo) | ✨ [Live demo (STICKY theme)](https://deeppresentation.com/plugins/dp-intro-tours?dp-lock=promo-tour&dp-theme=sticky)

>💥 [Fully test all PRO features, including the admin interface, on our automatically generated demo installation made just for you](https://demo.deeppresentation.com/)

>🖺 [How to / documentation](https://deeppresentation.com/how-to/category/intro-tour-tutorial-plugin) | ⧉ [API](https://deeppresentation.com/how-to/intro-tour-tutorial-plugin/api/)


= Key Features =

**Free version of Intro Tour Tutorial Plugin**

* **Visual frontend builder**: You can create and edit all tour steps and also visually select the start element ( button ) directly in the frontend.
* **4 design themes (accent color adaptive)**: You can choose from multiple themes for styling presentational elements and choose the most suitable one to match the vibe of your web. You can also enable/disable the displaying of selected presentation elements. 
* **1 trigger configuration**: You can easily choose from a variety of options how and where the tour should start, whether a start is only required for the user's first visits and much more.
* **Smooth design**: The tour is designed to maintain the visitor's full attention without any "sharp breaks" in the story of the tour.
* **Smart tooltip positioning**: The best position for the tooltip is automatically found in each step to get the best responsive view on mobile. You can also set your preferred position for each step.
* **WPML translation**: You can translate your tours with a popular WPML plugin.


= PRO version of Intro Tour Tutorial Plugin =

**All features from the FREE version are included, some of them are extended and new features are added**

* **Multi-page tours**: Yes, you don't have to limit yourself to a one-page intro tour.
* **6 design themes (accent color adaptive)**:  🎨 [Check all themes here](http://deeppresentation.com/plugins/dp-intro-tours/?dp-lock=start-theme-demo)
* **2 trigger configurations**: The FREE version already offers a wide range of options for configuring the tour start. In the PRO version, however, you can set up 2 trigger configurations simultaneously for each tour. This allows you to combine their settings and cover a variety of use cases. E.g. automatic start, but only on the first visit together with start when an info button is pressed.
* **URL variables**: Would you like your visitors to take a tour of pages with variable URLs, e.g. a tour of all product detail pages and their sub-pages with product ID in the URL, or public dashboards for users with user ID in the URL? In PRO you have the option to do this.
* **URL parameter lock - tour just for selected users**: You can send an introductory invitation to a tour for a specific person only by sending a tour URL with the unlock parameter. For the tour that starts on the home page: www.your-home-page-address.com/?dp-lock={Unlock key}.
* **Tour on WP admin board**: Would you like to offer your co-workers or those with access to web administration, an interactive guide to using your WordPress admin board and all the modules integrated there? In PRO, you can also easily create a tour on the admin board site.
* **Mobile / widescreen view**: In PRO, you can skip a step or even select a different target element, depending on whether the step is displayed on a cell phone or a bigger screen.
* **Mobile menu support**: You can also target mobile menu items so that the mobile menu automatically opens before that step during the tour. 
* **Shortcodes support in intro content**: You can insert WP shortcodes in intro tips and make the tour a much more complex tool
* **Priority support**: With the PRO version, you receive preferential support and updates. You can access the support forum to report any bugs.


>⭐ <strong>[Buy Pro Version](https://deeppresentation.com/plugins/dp-intro-tours/#dp-it-packages)</strong> with many extra features & premium support.
>✉ [Contact](https://deeppresentation.com/contact)
>💖 [Donation helps](https://www.paypal.me/tomasgroulik/5USD) to improve and update the FREE version. Thank You!


== Installation ==
Download the plugin from the WordPress repository, install it and activate it.


== Create a tour ==
Go to a web page (frontend), where you want to start a new tour. Choose **Tours -> Create new** from the top admin bar. Or start with tour configuration: **Admin board -> Tours -> Add New**. 


== Screenshots ==
1. Plugin in action (frontend - Basic theme with accent color set to blue)
2. Plugin in action (frontend - Minimal theme with accent color set to blue)
3. Plugin in action (frontend -  Colored theme with accent color set to orange)
4. Plugin in action (frontend mobile - Colored theme with accent color set to orange)
5. Plugin in action (frontend - Sticky theme with accent color set to light blue)
6. Tour visual frontend builder
7. Tour visual frontend builder - user interaction options
8. Tour visual frontend builder - target visual selection
9. Tour step content editor
10. Tour options - steps table
11. Tour options - design and properties of tour
12. Tour options - tour starting configuration


== Frequently Asked Questions ==
* **How can I upgrade from the FREE to the PRO version?**
How can I upgrade from the FREE to the PRO version?
Simply upload and activate the PRO plugin and enter the activation key you received after payment on the plugin's settings page. The FREE plugin will be automatically deactivated and you can safely uninstall it. All tours already created with the free version will be preserved, so you don't have to worry about losing them by uninstalling the free version.

* **How to migrate created tours to another WP installation**
You can use the standard WordPress export/import for the migration of tours: WP Admin Board -> Tools -> Export/import

* **How to duplicate a tour**
You can use any WordPress plugin that generally duplicates pages, posts and CPTs. E.g. [Duplicate Page](https://wordpress.org/plugins/duplicate-page/)

* **Does the plugin work with a WP multisite installation?**
Yes it does


== Support == 
* You can find some useful documentation and tutorials on our [How to page](https://deeppresentation.com/how-to/category/intro-tour-tutorial-plugin/) 
* If you encounter a problem with the plugin, please try searching for solutions in existing tickets in the [WordPress Support forum](https://wordpress.org/support/plugin/dp-intro-tours/). If you cannot find a solution, please create a new support topic in which you describe your problem.


== Changelog ==

= 6.5.3 =
* SECURITY FIX: Protects against XSS attacks in class-dp-intro-tours-admin-settings.php
* TEST - WordPress 6.7 compatibility tested 

= 6.5.2 =
* BUGFIX - Fix of global slow queries issue (generating title for new tour)

= 6.5.1 =
* BUGFIX - Calculating of user visits on server side
* TWEAK - Recalculating all document bounding box before each step

= 6.5.0 =
* NEW FEATURE - adding align justify button to the step content editor
* NEW FEATURE - Add the "align justify" button to the step content editor
* NEW FEATURE - Checkbox to skip on future visits
* NEW FEATURE - New option - where are tour visits calculated for logged-in users?
* TWEAK - User visits are now calculated based on the tour start
* TWEAK - User visit data can be cleared per tour and also affect visits saved in the browsers

= 6.4.5 =
* BUGFIX - Warning: Undefined variable $ in class-dp-intro-tours-public.php on line 79

= 6.4.4 =
* BUGFIX - tooltip position after resize fix

= 6.4.3 =
* BUGFIX - php warning fix in class-dp-intro-tours-public (line 676)

= 6.4.2 =
* BUGFIX - colored theme background color change to enhance tooltip contrast
* BUGFIX - animation opacity fix - when light accent color 

= 6.4.1 =
* BUGFIX - Sticky theme - bullet text color on dark accent fix

= 6.4.0 =
* NEW FEATURE - switch to SVG ico on small sizes when no space for all buttons
* NEW FEATURE - frontend builder - step edit - re-styling
* NEW FEATURE - FR translation added
* NEW FEATURE - confirm dialog before a link click during a tour
* TWEAK - running bullet animation after user interaction - light accent color -> dark outline 
* TWEAK - progress bar bg color
* TWEAK - scrollbar styling for non-chromium-based browsers
* BUGFIX - incorrectly reassign of Pages/posts/CPTs option after the trigger selector is chosen in the frontend builder
* BUGFIX - page horizontal alignment error fix
* BUGFIX - trigger tour -> prevent default
* BUGFIX - tooltip inside a target element positioning and scroll fix
* BUGFIX - step number positioning and size fix
* BUGFIX - positioning of the tooltip pointing towards the target with a fixed position
* BUGFIX - tooltip without target element - minimal width fix
* BUGFIX - firefox z-index fix for the tooltip inside a target
* TEST - WordPress 6.4 compatibility tested 


= 6.1.1 =
* BUGFIX - Builder target selection user interaction fix
* BUGFIX - trigger default intro_trigger_event fix
* BUGFIX - SVG icon loading on a repeated run of the tour ( no reload )
* BUGFIX - Z-index base default value fix
* BUGFIX - disabled tooltip control after saving
* BUGFIX - web page dimension calculation cross-platform fix
* NEW FEATURE - Forcing to open all links inside the highlighted target element in a new tab (so no tour end)

= 6.0.2 =
* BUGFIX - removing php 3rd party enum library (critical error in combination with some plugins)

= 6.0.0 =
* NEW FEATURE - Release post-type limitation
* NEW FEATURE - Trigger element in view
* TWEAK - all main js scripts are more optimized, modularized and modernized. The main public script size was lowered from 134KB to 51KB.
* TWEAK - new browser-based scrolling mechanism (support nested scrollable parents of target element)
* TWEAK - themes design improved and bug fixed
* TWEAK - improved look and behavior of tour admin options 
* TWEAK - new mobile menu opening algorithm
* TWEAK - simplification of tour starting options + advanced option for detail configuration
* NEW FEATURE - admin steps table: enable scrolling by drag and drop on table cells
* NEW FEATURE - support for full highlight of fixed, sticky, with CSS transform etc. targets (previously was just border without highlight background because of z-index issue)
* NEW FEATURE - added help for user interaction features 
* NEW FEATURE - New global option - exclude admin board area from the "Start this tour everywhere" option
* NEW FEATURE - tour option "Loading delay": support for frontend render tasks
* NEW FEATURE - highlight background option was adjusted to new highlight alg. to support fixed, sticky etc. 
* TWEAK - all links created in the step content editor are defaulted to open in a new window (target="_blank")
* BUGFIX - URL variable fixes and simplification
* BUGFIX - step count fix in admin tour table
* BUGFIX - nested scrollable parents of the target element
* BUGFIX - small screens out of screen fix + fixed positioned out of screen fix
* BUGFIX - scaled element width and height calculation fix
* BUGFIX - step content editor z-index fixes
* TWEAK - follow target position is deactivated when the browser tab is not active to not use the client's CPU
* BUGFIX - learndash compatibility fix

= 5.4.1 =
* BUGFIX - Z-index base default value was not working on all browsers, 
* TWEAK - Skip Absent Ref. Element change of default value to Off 

= 5.4.0 =
* NEW FEATURE - Do not load any theme style to simplify custom CSS re-stylings
* BUGFIX - loading just needed themes (better CSS optimization)

= 5.3.2 =
* BUGFIX - remove php debug notices

= 5.3.1 =
* NEW FEATURE - you can start a tour from the selected step by defining a dp-step param (indexed from 0)
* BUGFIX - rerun tour by user action eg. click overlay not loaded fix

= 5.2.7 =
* BUGFIX - Critical bug fix - CSS theme loading emitted critical error
* BUGFIX - Labeling link from top admin bar fix

= 5.2.0 =
* NEW FEATURE - 'Stop click propagation' in step interaction options - if you like to block on click events from other JS codes - (plugins, theme) during a tour on the actual target, that can interact unexpectedly with tour
* BUGFIX - hide overlay per step fix
* TWEAK - advanced resize / change orientation algorithm
* TWEAK - advanced determine tooltip position
* BUGFIX - php 7.2 syntax error fix
* BUGFIX - hide overlay per step fix in builder
* BUGFIX - target visual selection (stop propagation fix)
* BUGFIX - golden ration alg. for placing a tooltip fix
* BUGFIX - iterate step after click/hover z-index fix


= 5.0.9 =
* BUGFIX - build fix

= 5.0.8 =
* TWEAK - scroll easing -> swing

= 5.0.7 =
* NEW FEATURE - The design themes have been completely rewritten and also renamed (CSS identifiers have been changed)
* NEW FEATURE - The positioning system has been completely rewritten so it is more accurate
* NEW FEATURE - Bullets navigation is now mobile friendly
* NEW FEATURE - Rounding of intro layers is now configurable ( per each tour )
* NEW FEATURE - The sizing of intro layers has been improved to fit into your web. It is configurable in an easy user-friendly way and also in an advanced way
* NEW FEATURE - The algorithms for tracking the step target have been improved to be much smoother and optimized
* NEW FEATURE - Button arrow is now configurable - ( SVG icon, ASCI character, none)
* NEW FEATURE - The z-index base is configurable to prevent stacking-based issues
* NEW FEATURE - global options have been redesigned and simplified
* NEW FEATURE - show/hide bullets, progress bar, and step numbers configurable now by tour
* TWEAK -  audit and optimization of the frontend scripts and styles
* TWEAK - new running bullets animation + its code optimize
* BUGFIX - Screen size change is now properly processed
* BUGFIX - logged-in visit count calculated on a server (as calculated on the server only when the "Allow Just for Logged-in Users" option was active)
* BUGFIX - scroll animations were queued, now after going to the next or previous step, it takes effect immediately
* BUGFIX - scroll and follow target interaction, golden ratio tooltip positioning fix
* BUGFIX - CLICK→NEXT and HOVER→NEXT prevent default fix
* BUGFIX - Mobile menu z-index fixes
* BUGFIX - Sticky positioning for the target element and it's parents
* BUGFIX - Admin global options - NEWS links fix
* BUGFIX - z-index default value fix
* BUGFIX - Edit tooltip text in builder - MCE links z-index fix
* BUGFIX - Progress bar after switching themes on frontend fix
* BUGFIX - tooltip positioning center aligned fix
* TWEAK - shouldBeStepSkipped -> adding condition: isElementInsideDocBoard
* TWEAK - activate skip_absent_ref_el in view mode in the builder

= 4.5.1 =
* TWEAK - adjust upgrade message for following major releases

= 4.5.0 =
* BUGFIX - render_tiny_mce on admin - list of tours fix
* TWEAK - reduction of intro elements animations
* TWEAK - set default border radiuses between 2px - 4px

= 4.4.2 =
* NEW FEATURE - user interaction on hover over element -> next step
* NEW FEATURE - hide overlay layer per step (support sub menu on hover)

= 4.4.1 =
* BUGFIX - manual highlight layer background option in builder - z-index bug

= 4.4.0 =
* NEW FEATURE - manual highlight layer background option
* NEW FEATURE - hide next button option when on click -> next 
* BUGFIX - visual target selector fix when unique selector emits exception
* BUGFIX - max tooltip width applied on fancy bar
* BUGFIX - Warning: Invalid argument supplied for foreach in class-dp-intro-tours-helper.php on line 710

= 4.3.0 =
* NEW FEATURE - configurable radius of highlighting layer

= 4.2.1 =
* BUGFIX - ajax security issue fix (on some servers verify extra nonce was failing)

= 4.2.0 =
* NEW FEATURE - new theme - colored
* NEW FEATURE - tooltip container and buttons radius override
* BUGFIX - Step number position in the builder, when starting from 1st step
* BUGFIX - The text color of the flat adaptive theme was poorly visible on the dark tooltip bg

= 4.1.2 =
* BUGFIX - Ending the tour is not allowed in builder mode
* TWEAK - remove font select and font size select from TinyMCE
* BUGFIX - Confirm on open text editor -> Text tab (was not saving last changes from Text tab)

= 4.1.1 =
* BUGFIX - render_tiny_mce just when needed + admin warn fix

= 4.1.0 =
* NEW FEATURE - adding WordPress editor for building a step content
* TWEAK - don't show step number when there is one step only
* BUGFIX - show the plugin's option in the main admin menu fix 
* BUGFIX - afterStepChange API hook fix ("tourId", and "currentUrl" were missing in args)
* BUGFIX - tooltip positioning with hidden step number
* BUGFIX - progress bar size adjusted by skipped steps with no visible target
* BUGFIX - mobile breakpoint settings were still the default fix


= 4.0.0 =
* BUGFIX - skip button changed from 'a' tag to 'div' tag (possible interaction with 'a' tag styles from outside)
* IMPROVE - optimize of loading CSS and JS on the admin board 


= 3.2.2 =
* TWEAK - icons redesign

= 3.2.1 =
* BUGFIX - auto-scroll in parent container fix

= 3.2.0 =
* NEW FEATURE - new theme Light Fancy
* NEW FEATURE - sticky publish/update button at tour options on the admin board
* NEW FEATURE - disable tour for selected user roles
* NEW FEATURE - pause visual builder to enable interaction with the page during tour creation/editing
* TWEAK - optimize of loading CSS themes 
* TWEAK - optimize of server load
* TWEAK - default theme -> Light Fancy
* TWEAK - asset name separator changed from '~' to '-'
* BUGFIX - copy and paste URL for step fix

= 3.0.1 =
* BUGFIX - php notice fix
* TWEAK - optimize script loading in the admin

= 3.0.0 =
* NEW FEATURE - Advanced interaction with the highlighted element - go to next step after click + delay
* NEW FEATURE - PHP hooks extended - new filters dpintro_script_tour_config, dpintro_script_main_config
* NEW FEATURE - JS API (navigate steps by JS code)
* NEW FEATURE - drag and drop the ACF table header to scroll with the table
* NEW FEATURE - start at archive pages
* NEW FEATURE - allow full-screen video in the tooltip
* BUGFIX - start at multiple pages
* BUGFIX - scroll parent element offset fix
* BUGFIX - On key down event was not cleared and caused a doubled event when the tour started for 2nd time on the same page 
* TWEAK - Use only relative paths - avoiding migration problems
* BUGFIX - blurred backdrop was not working after switching back from target selection
* TWEAK - too generic CSS classes that could have potentially conflicted with other plugins/themes were changed to BEM (bottom, top, on-top, left, right)
* TWEAK - blurred overlay performance optimize


= 2.2.1 =
* BUGFIX - The saving value of the trigger selector by the visual builder was broken

= 2.2.0 =
* NEW FEATURE - JS hooks for advanced customization based on intro tour events
* NEW FEATURE - PHP hooks for advanced customization based on intro tour events
* NEW FEATURE - clearing logged-in visit count from global options
* TWEAK - option for enabling console debug output
* TWEAK - translation of all admin js scripts support
* TWEAK - optimize loading public js scripts
* TWEAK - counting visits of logged-in users on the server
* BUGFIX - fix of relative position parent - positioning of the highlight layer
* BUGFIX - use get_posts instead of WP Query to not change global data
* BUGFIX - intro text was not actually in builder mode after a step change
* BUGFIX - config default values are used even when the tour config was not saved


= 2.1.3 =
* BUGFIX - Allow Just for Logged-in Users works now together with the "First N Visits Only" option and counts logged-in visits separately

= 2.1.2 =
* TWEAK - Add a step ID to the main intro layer to support targeting all nested introductory layers with CSS per step

= 2.1.1 =
* BUGFIX - not setting the z-index of parents to auto, when there is a fixed ancestor
* TWEAK - "Allow Just for Logged-in Users" works now together with the "First N Visits Only" option and counts logged-in visits separately

= 2.1.0 =
* NEW FEATURE - Start tour when a specific key is pressed on the selected element
* NEW FEATURE - Run the initial tour only on the user's first N visits
* NEW FEATURE - Max tooltip width setting in the design section in tour-specific options
* NEW FEATURE - Support of targeting tooltips and highlight layers with CSS per step

= 2.0.3 =
* TWEAK - adding text for buttons Next, Back, Skip and Done to the translation domain
* BUGFIX - create a new tour from the front end

= 2.0.2 =
* TWEAK - make a plugin to be resilient against deferring jQuery 

= 2.0.1 =
* BUGFIX - allow HTML inside the intro text and also in the visual builder

= 2.0.0 =
* NEW FEATURE - The color of text for buttons is changed, if there is not contrast enough with the selected accent color (support lighter accent colors)
* NEW FEATURE - Changing Accent Color available in FREE now
* NEW FEATURE - Streamlining of settings on the admin board
* NEW FEATURE - Admin settings and visual builder use admin theme colors
* NEW FEATURE - Hide selected elements when the tour starts 
* BUGFIX - select element without class fix
* NEW FEATURE - Disable running in unsupported browsers (IE 11 and below) 
* TWEAK - change the default accent color to purple for new installations
* BUGFIX - Allow Just for Logged-in Users was hidden


= 1.11.3 =
* TWEAK - check target position once more after is scrolled at it ( fixing repositioning due to sticky menu )

= 1.11.2 =
* TWEAK - check the position of the target when it has stopped moving due to animation after 400ms
* BUGFIX - tooltip positioning fix on Firefox browser

= 1.11.1 =
* BUGFIX - Bullet animations are not affected by opacity or blur of the overlay layer
* BUGFIX - Fixing parents, possibly changing position by class ... auto keep pos and width
* BUGFIX - Fix sorting steps in admin

= 1.11.0 =
* TWEAK - fixed position elements are set to transparent bg while highlighting them
* NEW FEATURE - blurred overlay option in behavior configuration for each tour

= 1.10.2 =
* TWEAK - adding menu labels to translation
* BUGFIX - adding permission_callback to register_rest_route to avoid PHP notices


= 1.10.0 =
* NEW FEATURE - Hide Previous Step Button Always - configuration
* NEW FEATURE - Hide skip button configuration
* NEW FEATURE - Hide buttons instead of disabling
* NEW FEATURE - Hide bullets when there are fewer than 2 steps
* NEW FEATURE - Disable navigation by click on step bullet
* NEW FEATURE - Hide bullets when there are fewer than 2 steps
* BUGFIX - Disable Exit on Overlay Click was always active on dummy element (not selected target)
* COMPATIBILITY FIX - WordPress 5.6 compatibility fix (jQuery update)

= 1.9.0 =
* NEW FEATURE - Multi-site support
* NEW FEATURE - Admin Sub-menu for plugin settings
* TWEAK - Update tooltip placement when repositioning due to animations
* TWEAK - plugin settings with hint
* NEW FEATURE - design/behavior config in the admin bar
* BUGFIX - select CSS was overridden by theme or other plugins
* TWEAK - full-screen bullets animation change to BEM CSS class to not interact with other full-screen classes
* TWEAK - Promo module enhancements

= 1.8.0 =
* TWEAK - debug support adjustment
* TWEAK - intro core re-written to be unique for more instances + CSS classes names change 
* BUGFIX - highlighted layer position includes border now
* BUGFIX - fix unwanted interaction between multiple tours on the same page
* TWEAK - tour fluency tuning
* NEW FEATURE - added new config section - tour behavior -> new options: Disable Exit on Overlay, Click Disable Starting Animation, Scroll Speed

= 1.7.0 =
* BUGFIX - Plugin setting page tabs are now correctly shown as active 
* NEW FEATURE - Support for Sell Codes feedback system

= 1.6.0 =
* NEW FEATURE - adding setting for each tour: Disable exit on overlay click 
* NEW FEATURE - adding setting for each tour: Allow Just for Logged in Users

= 1.5.0 =
* NEW FEATURE - frontend visual builder for creation of tour's steps
* TWEAK - remove id and class option for Trigger Object field - converted to Custom selector (backward compatibility ensured)

= 1.4.3 =
* BUGFIX - manifest cache fix in wpackio module
* TWEAK - load tour styles just when the tour is on page
* IMPROVE - prefix plugin's dependencies to avoid interaction with other plugins
* BUGFIX - arrow positioning near window border fix
* NEW FEATURE - enable/disable user interaction with the highlighted element in each tour stop

= 1.4.2 =
* BUGFIX - redirect from admin - fix press update button ..  empty page

= 1.4.1 =
* BUGFIX - Contrast evaluation fixed
* BUGFIX - conflict with Google Map - included Google Map in ACF caused not loading other Google Map API correctly
* BUGFIX - redirect from admin - edit or create new tour - was not working with rocket plugin

= 1.4.0 =
* BUGFIX - Android chrome status bar trigger resize and so re-positioning and re-scrolling of tooltip (unwanted) on scroll fix
* BUGFIX - Close button in builder z-index lower than the tooltip
* BUGFIX - Tour page/post field on mobile was not possible to delete in ACF ui after was added
* BUGFIX - Step table was not shown all on small displays ... now scroll-able
* BUGFIX - post ID is now at public plugin part read from current URL... not the_ID or the_permalink (doesn't work in all cases)
* BUGFIX - table add a new row (it did show columns from the PRO version)
* UPGRADE - text editing in step table enhanced UX
* BUGFIX - left-top-aligned and so positions were not positioned correctly
* BUGFIX - shown element changed position after adding fixing class - now the position is stabilized
* BUGFIX - tooltip arrow positioning near border fix
* UPGRADE - contrast evaluation now supports pseudo-elements (common for icons)
* UPGRADE - mobile UX enhanced

= 1.3.1 =
* TWEAK - Plugin Title changed to Intro Tour Tutorial DeepPresentation 

= 1.3.0 =
* BUGFIX - Fix warning on adding new intro tour
* TWEAK - support for localization in frontend js scripts
* TWEAK - change global function common name with plugin prefixes - to don't interact - try to override others plugins, themes, core functions
* BUGFIX - wpackio 3rd site script loader interacting with other plugins that use wpackio
* BUGFIX - The View Intro Tour button in the top admin bar doesn’t open the page with the tour
* BUGFIX - visual builder choosing sometimes visualization layer instead of pointed element at
* NEW FEATURE - add new tour (without set Page / Post) doesn't allow the builder

= 1.2.5 =
* BUGFIX - initial hide/show of button set trigger selector visually in admin tour config
* NEW FEATURE - Localization ready

= 1.2.4 =
* BUGFIX - escape doesn't end a frontend builder tour
* BUGFIX - saving selector from admin with '>' was HTML encoded and not decoded on loading selectors

= 1.2.3 =
* BUGFIX - initial hide/show of button set trigger selector visually in admin tour config

= 1.2.2 =
* BUGFIX - deep presentation logo icon missing

= 1.2.1 =
* TWEAK - adjusting the description of the plugin

= 1.2.0 =
* NEW FEATURE - adding plugin settings page to allow style customization
* NEW FEATURE - adding a customization for texts of intro elements in the plugin's Settings page->Labeling
* NEW FEATURE - frontend intro tour builder - choosing target element for steps on frontend
* NEW FEATURE - frontend intro tour builder - choosing trigger selector on frontend
* NEW FEATURE - 2 style themes now available

= 1.1.0 =
* TWEAK - tooltip automatic positioning upgrade (fix bad auto-positioning in some cases, improve intelligence of evaluating space for placing tooltip)
* NEW FEATURE - position preference fields in the step table are now drop-downs with available choices (no more troubles due to typo errors)
* TWEAK - step table fields styling tweak

= 1.0.9 =
* undone contrast adjustments on visualized elements after going to the next step or finishing the intro
* full PRO version of plugin notifications
* disable debug console output
= 1.0.8 =
* disable the page event setup field when the trigger object is not the whole page

= 1.0.7 =
* disable the internal custom field in the admin menu

= 1.0.6 =
* tour setup choices ... showing/hiding unnecessary items, depends on Trigger Object

= 1.0.5 =
* add fixed font and font sizes to reflect development env - styles are now more proportional to fonts

= 1.0.4 =
* tooltip arrow positioning re-fix
* disable user interaction layer fix
* loading animation centering

= 1.0.3 =
* tooltip arrow positioning fix

= 1.0.2 =
* redesign of positioning tooltip algorithm
* contrast evaluation check and if needed second round

= 1.0.1 =
* Overflow bug fix - window width was in some cases affected by intro elements
* Loading animation fix
* Bullets sizing in the tooltip fix
* Scrolling position iterative check to support animated target elements

= 1.0.0 =
* Initial version

== Upgrade Notice ==

= 6.0.0 =
Heads up !! This is the major release with many new cool features :) We've made all possible fixes to keep compatibility back, so all should work. However, if you encounter any problems after the update, please do not hesitate to contact our support.


