=== Plugin Name ===
Contributors: hosseingrad
Donate link:
Tags: aparat, rss, video rss, rss aggregator
Requires at least: 4.6
Tested up to: 5.5.1
Stable tag: 1.2.1
Requires PHP: 5.6.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

دریافت آر.اس.اس کانال آپارات و نمایش (به ترتیب یا تصادفی) ویدئوهای کانال آپارات، در ویجت‌های وردپرس.
Widgets for listing videos uploaded to Aparat.com, via your channel RSS link or selecting different videos from different channels.

== Description ==

Reading video RSS from Aparat.com and showing them in a widget.
افزودن ویجت اختصاصی، جهت نمایش آخرین ویدئوهای آپلود شده در کانال آپارات شما.

=== Shortcode ===

The shortcode name is [aparat-video src="{video_link}"] which you can insert it anywhere.

Shortcode parametes:
1. src:     you have to give an aparat video link. (such as: https://www.aparat.com/v/kdHL5/)
2. format:  must be "iframe" or "html5". (iframe for using aparat embed code, then view counter will work)
3. float:   must be "left" or "right". (then the video frame would be in left or right of your text body)
4. width:   the value must be in percent (from 0% to 100%)
5. height:  the value must be in pixels (eg. 250px - this is works in "iframe" format only)
3. display_meta:    must be "yes" or "no". (if yes! then will show the video Title and some more details on the bottom of the video)

Example:
[aparat-video src="https://www.aparat.com/v/kdHL5/" format="html5" float="left" width="50%" height="300px" display_meta="yes"]


== Installation ==

* From within WordPress

1. Visit 'Plugins > Add New'
2. Search for 'Aparat Grad'
3. Install & Activate (Aparat Videos RSS Reader | GRAD) from your Plugins page.
4. Go to "after activation" below.

* Manually

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. go to the Appearence->Widgets page.
4. use (GRAD | Aparat Video RSS List) widget into your widgetize area.
5. You're done!


== Screenshots ==

1. Back-end - Widgets in Appearence page.
2. Aparat.com - Find RSS link in a channel.
3. Back-end - RSS reader widget and show it in the list view.
4. Back-end - Multi-selected videos widget from different channels.
5. Front-end - Showing videos in sidebar.

== Changelog ==

= 1.2.1 =
Release Date: September 30th, 2020

Enhancements:

* Fix some bugs for showing shortcode in responsive mode.


= 1.2.0 =
Release Date: September 21st, 2020

Enhancements:

* Add Shortcode feature for inserting aparat videos link anywhere onto your posts/pages.



= 1.1.1 =
Release Date: September 16th, 2020

Tested with WordPress 5.5.1

Enhancements:

* Fix some bugs for retrieving "Channel Title" and "Follow us link".

= 1.1.0 =
Release Date: September 1st, 2020

Tested with WordPress 5.5

Enhancements:

* Add new feature to plugin widgets for changing preview code to iframe method.
This feature causes increasing the veiw counter, when playing videos via widgets.

= 1.0.3 =
Release Date: April 25th, 2020

Tested with WordPress 5.4 and PHP 7.4.5

= 1.0.0 =
Release Date: August 7th, 2019

The first stable version.           
Enhancements:

* Add shuffeling videos feature to the widgets for sorting videos randomly
* Fix a bug for channel name link, this bug is blong to aparat rss data.


= 0.9.4 =
Release Date: April 27th, 2019

Enhancements:

* Fix some bugs about Uninstalling Plugin.

= 0.9.3 =
Release Date: April 27th, 2019

Enhancements:

* Fix some bugs about 'follow us link'

= 0.9.2 =
Release Date: April 26th, 2019

Enhancements:

* Fix some bugs
* Add new widget (Aparat Selected Videos Widget)
* Change some texts
* Enhance translating to persian.


= 0.9.1 =
Release Date: December 16th, 2018

Enhancements:

* Adds "Follow us in Aparat.com" at the bottom of widget, including Aparat Icons.
* Add Persian Language.



= 0.9.0 =
Release Date: December 12th, 2018

