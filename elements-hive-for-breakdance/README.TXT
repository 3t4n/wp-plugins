=== Elements Hive for Breakdance ===
Contributors: elementshive
Tags: breakdance, webgl, threejs, interaction, animation
Tested up to: 6.7.1
Stable tag: 1.4.1
Requires PHP: 7.4
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html


== Description ==

**Elements Hive for Breakdance** is a *Breakdance Addon* and requires **[Breakdance](https://breakdance.com)** to work.

**Turn Your Breakdance Websites Into Visual Symphonies With Elements Hive**.

https://youtu.be/dvad_X3m7HY

Take your Breakdance websites to the next level with advanced easy-to-use abstractions of micro-interactions, animations, and interactive visual effects.

**Native Breakdance Experience**

All the elements and extensions are integrated and usable from within the *Breakdance Editor* providing you with a native breakdance experience.

**[See the current list of elements and extensions for both the Free and Pro versions of Elements Hive](https://elementshive.com)**


**16+ FREE versatile Elements, Extensions and Growing**

1. **WebGL Kinetic Typography**
Create interactive 3D backgrounds with this versatile background extension.

2. **Magnetic Cursor**
Turn your cursor into a magnet that automatically wraps around links, buttons or any element you choose.

3. **WebGL Slideshow Extension**
Add stunning WebGL slideshows as backgrounds with various effects.

4. **WebGL Slideshow Element**
Place WebGL slideshows anywhere on your page.

5. **Link Media Reveal**
Create smooth animated media reveals on link hover.

6. **Link Media Reveal Menu**
Breakdance Menu Builder compatible version of Link Media Reveal.

7. **WebGL Media Hover Distortion**
Create WebGL distortion effects between media elements on hover. Combine with Elements Hive Pro Interactions extension for more trigger options.

8. **Ink Mouse Cursor**
Transform your cursor into a fluid, ink-like animation.

9. **Glue Button**
Add a sticky glue effect that centers buttons to cursor position on hover.

10. **Glue Menu Button**
Breakdance Menu Builder compatible version of Glue Button.

11. **Gooey Link**
Transform text links into gooey animations.

12. **Gooey Menu Link**
Breakdance Menu Builder compatible version of Gooey Link.

13. **WebGL Fluid Simulation**
Create interactive fluid simulation backgrounds.

14. **On Scroll Color Switcher**
Change page background and text colors based on scroll position.

15. **Marquee Container**
Turn any combination of elements into a smooth marquee.

16. **Backlight Extension**
Add natural shadow effects that dynamically adapt to the element's colors.

**EH Tricks**

Quality of Life Improvements for Breakdance

1. Elements Panel, make long elements names more readable
2. Selector Panel, make long selectors names fully visible
3. Code Editor Dialog, Resizable window
4. Code Editor Dialog, Draggable window
5. Code Editor Dialog, Transaprent Overlay so you can see your changes in real time
6. Code Editor Dialog, Actions Bar > Window Docking helper action buttons
7. Code Editor Dialog, Actions Bar > Breakdance Global Colors helper feature to quickly insert the CSS variable of your global colors


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= Can I use the plugin without Breakdance? =

No. Breakdance has to be installed in order for the plugin to work.

= Where can I access the Elements? =

The elements are available in the Add Element panel under the Elements Hive category.

= Where can I access the Extensions? =

The relevant extensions to each type of element are accessible via the Design tab under the Elements Hive category. On the EH website, the documentation page
of each extension contains information about the supported elements and where to access it.

== Changelog ==

**Changelog**

= 1.0.1 - 11/12/2022 =

* Fixed: WebGL Fluid Extension > Stacking issue when 'Relative to Parent' is set to page.
* Fixed: Glue Menu Button > Missing breakdance default styling issue.
* Added: New micro WebGL library ( ChibiGL ) dependency.

= 1.1.0 - 26/12/2022 =

* Added: New extension WebGL Slideshow
* Added: New element WebGL Slideshow
* Fixed: WebGL Media Hover Distortion orphan dependency
* Fixed: Gooey Menu Link grid styling issue
* Changed: Gooey Link / Gooey Menu Link > Miscelanious refactoring
* Added: Goeey Link / Gooey Menu Link > Spacing preset
* Added: Goeey Link / Gooey Menu Link > Horizontal Offset for default and hover text
* Added: Link Media Reveal / Link Media Reveal Menu > Lazy load support for image and video
* Added: Appsero integration for plugin usage analytics

= 1.1.1 - 26/12/2022 =

* Fixed: svn upload

= 1.1.2 - 28/12/2022 =

* Fixed: PHP 7.4x heredoc exception error on extensions actions files

= 1.2.0 - 07/02/2023 =

* Added: New extension WebGL Kinetic Typography Background
* Added: New extension Magnetic Cursor
* Fixed: WebGL Media Hover Distortion custom height issue
* Fixed: Ink Cursor parsing console error

= 1.2.1 - 08/02/2023 =

* Fixed: WebGl Kinetic Typography image animation speed not applied on frontend. After the plugin update, please enter the speed value you had before under Image Animation so that it takes effect.

= 1.2.2 - 31/05/2023 =

* Added: WebGL Slideshow Element > Disable on Touch Devices option
* Added: WebGL Slideshow Extension > Disable on Touch Devices option
* Deleted: WebGL Slideshow Element > Apply Cover option
* Deleted: WebGL Slideshow Extension > Apply Cover option
* Fixed: WebGL Slideshow Element > Blob's effect Blur not applied
* Fixed: WebGL Slideshow Extension > Blob's effect Blur not applied
* Added: WebGL Fluid > Disable on Touch Devices option
* Added: WebGL Kinetic Typography > Disable on Touch Devices option
* Fixed: Handle GSAP local vs GSAP CDN for compatibility with Breakdance 1.3.0 and prior versions

= 1.2.3 - 14/07/2023 =

* Fixed: Compatibility with Elements Hive Pro
* Fixed: WebGL Slideshow Element > CORS error on default images

= 1.3.0 - 12/08/2023 =

* Added: On Scroll Color Switcher element
* Fixed: WebGL Media Hover Distortion GSAP dependency compatibility with breakdance version < 1.3.0

= 1.3.1 - 12/08/2023 =
* Changed: On Scroll Color Switcher > Change color setting to Target instead of Trigger. This should make it clearer that color items are the Targets that will their colors changed, while the backgound items are the triggers when the page background color will change

= 1.3.2 - 16/08/2023 =
* Fixed: WebGL Media Hover Distortion > Responsive height
* Fixed: On Scroll Color Switcher > Dependency error

= 1.3.3 - 29/08/2023 =
* Tweaked: WebGL Media Hover Distortion > cleanup CSS
* Fixed: Link Media Reveal > JS error when element is inside a container other than section
* Fixed: Link Media Reveal > z-index compatibilty with Gooey Overlay
* Fixed: WebGL Slideshow > Add crossorigin to texture loading
* Tweaked: WebGL Slideshow > Cleanup CSS

= 1.3.4 - 05/09/2023 =
* Added: Demo Sections to Design Library
* Fixed: WebGL Media Hover Distortion > container not going full height of parent container

= 1.3.5 - 31/10/2023 =
* Tweaked: Delete API Call to Demo Sections server during server-side page generation
* Fixed: WebGL Slideshow > Blur Level on Blobs effect

= 1.3.6 - 24/03/2024 =
* Enhanced: Glue Button > Complete rewrite for a more stable and smoother interaction
* Enhanced: Glue Menu Button > Complete rewrite for a more stable and smoother interaction
* Enhanced: WebGL Slideshow element & extension > Refactored and optimized rendering profile, significantly reduced Total Blocking Time impact in PSI
* Enhanced: WebGL Slideshow element & extension > Optimized loading speed of dependencies
* Enhanced: WebGL Fluid > Refactored and optimized rendering profile, significantly reduced Total Blocking Time impact in PSI
* Enhanced: WebGL Fluid > Optimize loading speed of dependencies
* Enhanced: WebGL Kinetic Typography > Refactored and optimized rendering profile, significantly reduced Total Blocking Time impact in PSI when used below the fold
* Enhanced: WebGL Kinetic Typography > Optimize loading speed of dependencies
* Housekeeping: Updated Appsero SDK
* Housekeeping: Got rid of GSAP workaround for BD <1.3

= 1.3.7 - 24/03/2024 =
* Fixed: Delete orphaned references to old GSAP dependency scheme


= 1.3.8 - 2/09/2024 =
* Enhancement: WebGL Media Hover Distortion > Complete rewrite. New implementation uses OGL and comes in a much smaller dependency ( 20x smaller vs the old THREEjs implementation )
* Enhancement: WebGL Media Hover Distortion > Compatibility with the Interactions extension from Elements Hive Pro 1.3.2>
* Enhancement: WebGL Fluid > Optimize TBT when Draw on Load is enabled
* Enhancement: Margnetic Cursor > Add z-index setting
* Enhancement: Design Library > Use new provider feature
* Enhacenment: Design Library > Add /Imagine X Build template to the design library
* Enhancement: Update THREEjs to 0.160.1 ( 2x smaller than older version used )
* Fix: Ink Cursor > Hide until first mouse move
* Fix: On Scroll Color Switcher > Reset color on scroll up
* Housekeeping: Update plugin asset and use Plugin Requires tag

= 1.3.9 - 3/10/2024 =
* Added: New Element: Marquee Container.
* Added: New Extension: Backlight Extension.

= 1.4.0 - 6/11/2024 =
* Enhancement: Marquee Container > Add Spacing Bars, cleanup css
* Enhancement: Gooey Link > Add responsive controls

= 1.4.1 - 22/12/2024 =
* Added: EH Tricks > A set of quality of life improvements to make you life easier
* Enhancement: Link Media Reveal > Add Dynamic Data support for the Media control
* Fix: Ink Cursor > Fix visibility when Apply to Whole Page is enabled
* Fix: Prevent "_load_textdomain_just_in_time" notice when debug is enabled with Appsero
* Fix: Gooey Link > Missing builder badge
