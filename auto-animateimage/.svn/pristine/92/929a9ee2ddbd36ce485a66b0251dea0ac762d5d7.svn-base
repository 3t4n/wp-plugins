=== Auto AnimateImage ===
Contributors: attosoft
Donate link: http://attosoft.info/en/donate/
Tags: animation, animated, slider, slideshow, slide show, gallery, image, images, photo, photos, picture, pictures, javascript, plugin, plugins
Requires at least: 2.7
Tested up to: 3.4.2
Stable tag: trunk

Automatically applies AnimateImage script that displays multiple images like animated GIF. All you have to do is write img elements.

== Description ==

Auto AnimateImage is WordPress plugin that applies [AnimateImage script](http://attosoft.info/en/blog/animate-image/) to your site automatically. AnimateImage displays multiple images continuously like animated GIF. All you have to do is write `img` element like below, and the image will be animated automatically.

    <img src="images/0.png" data-files="[0-9].png" />

As you know, [animated GIF](http://en.wikipedia.org/wiki/Animated_GIF) is the most common animation format, but it supports up to only 256 colors. There are some alternative animation formats such as [APNG](http://en.wikipedia.org/wiki/APNG), [MNG](http://en.wikipedia.org/wiki/MNG), [JNG](http://en.wikipedia.org/wiki/JNG), [Motion JPEG](http://en.wikipedia.org/wiki/Motion_JPEG) and [SVG Animation](http://en.wikipedia.org/wiki/SVG_animation). However they are currently not widely supported by Web browsers. That is why AnimateImage is the most appropriate method for animated images.

= Auto AnimateImage Features =

* Automatically applies [AnimateImage script](http://attosoft.info/en/blog/animate-image/) to your site
* All you have to do is write `img` elements. No JavaScript, No Shortcode, No Gallery.
* Common options and animation styles can be customized via [Settings screen](screenshots/)
* Compatible widely down to even obsolete WordPress 2.7

= AnimateImage Features =

* Displays multiple images continuously like animated GIF. It supports sequential/arbitrary filenames.
* Supports any image formats supported by Web browsers, such as [GIF](http://en.wikipedia.org/wiki/GIF), [PNG](http://en.wikipedia.org/wiki/Portable_Network_Graphics), [JPEG](http://en.wikipedia.org/wiki/JPEG), [JPEG XR (HD Photo)](http://en.wikipedia.org/wiki/JPEG_XR), [BMP](http://en.wikipedia.org/wiki/BMP_file_format), [TIFF](http://en.wikipedia.org/wiki/TIFF), [WebP](http://en.wikipedia.org/wiki/WebP) and [SVG](http://en.wikipedia.org/wiki/SVG). Thereby transparent animation with more than 256 colors is available.
* Many animation options are available, such as animation delay, repeat count, rewind, pause and blank image
* `img` elements  with `data-files` attribute are animated automatically. No need for writing JavaScript.
* Animations are controllable by writing JavaScript. You can start/stop/replay them at any time.
* Standalone script with 5.6 KB file size, without using JavaScript libraries such as jQuery
* Supports Internet Explorer, Mozilla Firefox, Google Chrome, Safari, Opera and their older versions

= How to Install =

See [Installation](installation/).

= How to Use =

All you have to do is write `img` elements with `data-files` attribute, and the images will be animated automatically. You can animate multiple images with sequential number, zero-padded sequential number, sequential alphabet and arbitrary filenames.


    <img src="sequential/0.png" data-files="[0-99].png" />
    <img src="zero-padded/00.png" data-files="[00-99].png" />
    <img src="lowercase/prefix-a.png" data-files="prefix-[a-z].png" />
    <img src="uppercase/A_suffix.png" data-files="[A-Z]_suffix.png" />
    <img src="arbitrary/foo.png" data-files="[foo, bar, baz].png" />
    <img src="parent/child0/image.png" data-files="child[0-9]/file.png" />

AnimateImage supports many animation options such as animation delay, repeat count, rewind, pause and blank image. You can specify them with `data-*` attributes like below.

    <img src="" data-files=""
        title="" alt="" id="" class="" style=""
        data-delay="" data-cycleDelay=""
        data-repeat="" data-rewind=""
        data-pauseAtFirst="" data-pauseAtLast=""
        data-showBlank="" data-blankClassName=""
        data-blankPath="" data-stretchBlank="" />

See [Code Examples](other_notes/#Code-Examples) for more information.

= Support Me =

* To keep my motivation, put rating stars and vote compatibility (works/broken) via the right sidebar
* If you have any questions, view [support forum](http://wordpress.org/support/plugin/auto-animateimage) or post a new topic
* See [Localization](other_notes/#Localization) if you can translate the plugin into your language
* I would be grateful if you would [donate to support plugin development](http://attosoft.info/en/donate/)
* [Contact me](http://attosoft.info/en/contact/) if you have any feedback

Any comments will be very helpful and appreciated. Thank you for your support!

= Links =

* [attosoft.info](http://attosoft.info/en/)
* [AnimateImage script](http://attosoft.info/en/blog/animate-image/)
* [Auto AnimateImage plugin](http://attosoft.info/en/blog/auto-animateimage/)

== Installation ==

= Auto Install =

1. Access Dashboard screen in WordPress
1. Select [Plugins] - [Add New]
1. Input "AnimateImage" into text field, and click [Search Plugins]
1. Click 'Install Now' at 'Auto AnimateImage'
1. Click 'Activate Plugin'
1. Write `img` elements with `data-files` attribute

= Manual Install =

1. Download [auto-animateimage.zip](http://downloads.wordpress.org/plugin/auto-animateimage.zip)
1. Access Dashboard screen in WordPress
1. Select [Plugins] - [Add New] - 'Upload' tab
1. Upload the plugin zip file, and click [Install Now]
1. Click 'Activate Plugin'
1. Write `img` elements with `data-files` attribute

= Manual Install via FTP =

1. Download [auto-animateimage.zip](http://downloads.wordpress.org/plugin/auto-animateimage.zip), and unzip it
1. Upload the plugin folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Write `img` elements with `data-files` attribute

= Customization =

Here is all available options at [Auto AnimateImage Settings screen](../screenshots/). You can customize common options and animation styles through the following options.

* General
  * AnimateImage Script (Header or Footer)
* Common Options
  * Animation Delay
  * Delay between Animation Cycles
  * Repeat Count
  * Rewind at the End of Animation
  * Pause at First Image
  * Pause at Last Image
  * Show Blank Image between Animation Cycles
  * Stretch Blank Image to the Size of Last Image
  * Output img Elements when Using JavaScript Code
  * Class Name (Animated Images)
  * Class Name (Blank Image)
  * File Path (Blank Image)
* Styles (Animated Images / Blank Image)
  * Background Color
  * Margin
  * Padding
  * Border (Width / Style / Color)
  * Border Radius
  * Opacity
  * Box Shadow
  * Width / Height
  * Max Width / Max Height
  * Min Width / Min Height

== Frequently Asked Questions ==

= Auto AnimateImage does not work =

First, make sure whether `data-files` attribute value is valid string format. Then check if any messages are output in error console.

* **Internet Explorer**: Double-click the warning icon in status bar, or click [Tools] menu - [Developer Tools], or press [F12] key
* **Mozilla Firefox**: Click [Firefox/Tools] menu - [Web Developer] - [Error Console], or press [Ctrl+Shift+J] key
* **Google Chrome**: Click [Tools] menu - [JavaScript console], or press [Ctrl+Shift+J] key
* **Opera**: Click [Opera] menu - [Page] - [Developer Tools] - [Error Console], or press [Ctrl+Shift+O] key
* **Safari (Mac)**: Click [Develop] menu - [Show Error Console], or press [Option-Command-C] key
  * **Safari (Windows)**: Click Page Menu Button - [Developer] - [Show Error Console], or press [Ctrl+Alt+C] key
  * Note: To enable the developer tools, click Advanced in Safari preferences and check "Show Develop menu in menu bar"

If the problem still persists, please send me your site URL via [support forum](http://wordpress.org/support/plugin/auto-animateimage) or [contact form](http://attosoft.info/en/contact/).

= Where is Auto AnimateImage Settings screen? =

1. Access Dashboard screen in WordPress
1. Click [Settings] - [Auto AnimateImage] in sidebar

= How to localize the plugin into your language =

You can localize the plugin with [Poedit](http://www.poedit.net/) and "languages/animateimage.pot" file. See [Localization](../other_notes/#Localization) for details.

= How to use AnimateImage script from JavaScript =

You can access AnimateImage features from `AnimateImage` namespace object.

    AnimateImage.options.delay = 1000;
    
    AnimateImage.animate('images/[0-9].png');
    
    var animator = new AnimateImage.Animator('images/[0-9].png');
    animator.animate();
    // animator.stopAnimate();

See [AnimateImage official site](http://attosoft.info/en/blog/animate-image/) for more information.

== Screenshots ==

1. Auto AnimateImage Settings screen

== Changelog ==

= Latest Version =

= 0.6 =
* NEW: "File Path (Blank Image)" option in "Common Options"
  * Blank image was specified with `data:url` that is not supported by IE7 or earlier. That is why the plugin uses `images/blank.gif` as default blank image. You can upload arbitrary image with Media Uploader.
* NEW: "Stretch Blank Image to the Size of Last Image" option in "Common Options"
* UPDATED: [AnimateImage v1.1.3](http://attosoft.info/en/blog/animateimage-1-1-3/)

= 0.5 =
* NEW: "Styles (Animated Images / Blank Image)" meta box in Settings screen. Animation styles can be customized via Settings screen.
  * Background Color
  * Margin
  * Padding
  * Border (Width / Style / Color)
  * Border Radius
  * Opacity
  * Box Shadow
  * Width / Height
  * Max Width / Max Height
  * Min Width / Min Height

= 0.4 =
* NEW: "Common Options" meta box in Settings screen. AnimateImage common options can be customized via Settings screen.
  * Animation Delay
  * Delay between Animation Cycles
  * Repeat Count
  * Rewind at the End of Animation
  * Pause at First Image
  * Pause at Last Image
  * Show Blank Image between Animation Cycles
  * Output img Elements when Using JavaScript Code
  * Class Name (Animated Images)
  * Class Name (Blank Image)

= 0.3 =
* NEW: Auto AnimateImage Settings screen
  * General - AnimateImage Script - Header / Footer
  * About (links to plugin site, rating, support forum, localization, donation and contact form)

= 0.2 =
* NEW: Localization support
* NEW: Compatibility with obsolete WordPress 2.7
* UPDATED: Added Japanese (ja) translation

= 0.1 =
* Initial release with [AnimateImage](http://attosoft.info/en/blog/animate-image/) v1.1.1

== Code Examples ==

= Example 1: Sequential Filenames =

    <img src="sequential/0.png" data-files="[0-99].png" />
    <img src="zero-padded/00.png" data-files="[00-99].png" />
    <img src="zero-padded/000.png" data-files="[000-999].png" />
    <img src="lowercase/prefix-a.png" data-files="prefix-[a-z].png" />
    <img src="uppercase/A_suffix.png" data-files="[A-Z]_suffix.png" />

= Example 2: Arbitrary Filenames =

    <img src="arbitrary/foo.png" data-files="[foo, bar, baz].png" />
    <img src="arbitrary/foo.png" data-files="[foo.png, bar.jpg, baz.gif]" />
    <img src="prefix-foo_suffix.png" data-files="prefix-[foo, bar, baz]_suffix.png" />

= Example 3: Format String in Directory Name =

    <img src="parent/child/file0.png" data-files="file[0-9].png" />
    <img src="parent/child0/image.png" data-files="child[0-9]/file.png" />
    <img src="parent0/child/image.png" data-files="parent[0-9]/child/file.png" />

\* `data-files` attribute is specified with filename or relative path to directory, including format string.

= Example 4: title/alt Attributes =

    <img src="images/0.png" data-files="[0-9].png" title="foo" />
    <img src="images/0.png" data-files="[0-9].png" title="foo" alt="bar" />
    <img src="images/0.png" data-files="[0-9].png" alt="bar" />

\* `alt` attribute with the value of `title` attribute will be added if not specified.

= Example 5: id/class Attributes =

    <img src="images/0.png" data-files="[0-9].png" id="foo" />
    <img src="images/0.png" data-files="[0-9].png" class="bar" />
    <img src="images/0.png" data-files="[0-9].png" class="" />

\* `class` attribute will be added if not specified. default `class` attribute value is `"animation"`.

= Example 6: delay/cycleDelay Options =

    <img src="images/0.png" data-files="[0-9].png" data-delay="1000" />
    <img src="images/0.png" data-files="[0-9].png" data-cycleDelay="2000" />

\* In default, `delay` option is `500` ms and `cycleDelay` option is `0` ms.

= Example 7: repeat/rewind Options =

    <img src="images/0.png" data-files="[0-9].png" data-repeat="1" />
    <img src="images/0.png" data-files="[0-9].png" data-repeat="1" data-rewind="true" />

\* In default, `repeat` option is `-1` (infinite iteration) and `rewind` option is `false`.

= Example 8: pauseAtFirst/Last Options =

    <img src="images/0.png" data-files="[0-9].png" data-pauseAtFirst="true" />
    <img src="images/0.png" data-files="[0-9].png" data-pauseAtLast="true" />

\* In default, `pauseAtFirst` option is `false` and `pauseAtLast` option is `false`.

= Example 9: showBlank/blankClassName/blankPath/stretchBlank Options (Blank Image) =

    <img src="images/0.png" data-files="[0-9].png" data-showBlank="true" />
    <img src="images/0.png" data-files="[0-9].png" data-showBlank="true" data-blankClassName="foo" />
    <img src="images/0.png" data-files="[0-9].png" data-showBlank="true" data-blankPath="blank.png" />
    <img src="images/0.png" data-files="[0-9].png" data-showBlank="true" data-blankPath="logo.png" data-stretchBlank="false" />

\* In default, `showBlank` option is `false` and `blankClassName` option is `"blank"`.

= Example 10: Arbitrary Attributes =

    <img src="images/0.png" data-files="[0-9].png"
        width="100" height="100" longdesc="long description" />

= Example 11: Arbitrary CSS Properties =

    <img src="images/0.png" data-files="[0-9].png"
        style="border: solid; border-top: dotted; border-bottom: dashed" />

== Localization ==

You can localize the plugin with [Poedit](http://www.poedit.net/). Here is how to translate the plugin into your language.

1. [Download Poedit](http://www.poedit.net/download.php) and install it
2. Run Poedit and select your language
3. Input your name and mail address (optional)
4. Open "auto-animateimage/languages/animateimage.pot" file
5. Select original string and input its translation
6. Save the file as "animateimage-[LANG].po"

"[LANG]" is a language code. For instance, "de_DE" is for German, "sv_SE" is for Swedish, "pt_BR" is for Portuguese spoken in Brazil. If you want to know your language code, see [WordPress in Your Language](http://codex.wordpress.org/WordPress_in_Your_Language). If you need more information, see [Translating WordPress](http://codex.wordpress.org/Translating_WordPress).

I would be grateful if you would [send me](http://attosoft.info/en/contact/) any translation files. Here are the available translations included in the latest plugin.

* Japanese (ja) translation by [attosoft](http://attosoft.info/)

If you have any questions, feel free to [contact me](http://attosoft.info/en/contact/).
