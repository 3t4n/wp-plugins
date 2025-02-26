=== AE Fb Video Embed ===
Contributors: allan.empalmado
Donate link: https://www.paypal.me/allanempalmado
Tags: facebook, fb, video, embed
Requires at least: 3.8
Tested up to: 4.8
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin will help you embed public fb videos on your wordpress site using a shortcode with ease. Use the shortcode [ae-fb-embed url="FB_VIDEO_URL"] or use the facebook video embed shortcode generator button located on top of your wordpress editor to generate and insert the shortcode for you.

Get In touch with us and the rest of the team.
[Facebook Page](https://www.facebook.com/appdevph/)
[FB Messenger](https://www.messenger.com/t/appdevph)
[Send us some pizza](https://www.paypal.me/allanempalmado)

=== AE FB Embed Shortcode Parameters ===

* width - The width of the video container. Min. 220px. Default: 500px.
* url - The url of the video to embed
* allowfullscreen - Allow the video to be played in fullscreen mode. Default "false"
* showtext - Set to "true" to include the text from the Facebook post associated with the video, if any. Only available for desktop sites. Default "false"
* showcaptions - Set to "true" to show captions (if available) by default. Captions are only available on desktop. Default "false"
* autoplay - Automatically start playing the video when the page loads. The video will be played without sound (muted). People can turn on sound via the video player controls. This setting does not apply to mobile devices. Can be "false" or "true". Default "false"

== Installation ==

INSTALLING FROM WITHIN WORDPRESS

1. Visit 'Plugins > Add New'
2. Search for 'AE Fb Video Embed'
3. Activate 'AE Fb Video Embed' from your Plugins page.

MANUAL INSTALLATION

1. Upload `ae-fb-video-embed` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Embed your facebook videos using the shortcode [ae-fb-embed url="FB_VIDEO_URL" width="450" autoplay="true"] and replace the FB_VIDEO_URL with the url/link of the facebook video you want to embed, you can also use the shortcode generator button which was previously added to make it easier to embed videos on your posts and pages. See screenshots for more details.

== Frequently Asked Questions ==

= Can I embed private facebook videos? =
No, only public videos can be embedded using the plugin.

= Where or How can we get the video url to embed? =
You can right click any public videos on your fb page and click Show Video Url. A popup will be shown containing the video url, just copy the url and paste it to the shortcode's url parameter.

= How can I change the width of the video to be embed? =
The plugin provides options or parameters you can include in the ae-fb-embed shortcode. You can change the default width of 500px by including a width parameter in the shortcode. Example [ae-fb-embed url="FB_VIDEO_URL" width="450"]

= Do you have an easier way to generate the facebook embed shortcode directly from the wordpress editor? =
Yes, I created a shortcode generator button just above the wordpress editor to help everyone generate the shortcode needed to embed facebook videos. It also includes all available parameters you can use to customize your embeds.


== Screenshots ==

1. Default embed without options [ae-fb-embed url="FB_VIDEO_URL"]
2. Embed with all the options [ae-fb-embed width="750" autoplay="true" showtext="true" allowfullscreen="true" showcaptions="true" url="FB_VIDEO_URL"]
3. Multiple Embeds
4. Getting the video url from an fb post.
5. Embed Facebook Videos easier with the new added shortcode generator button.

== Changelog ==

= 1.2 =
* Added new plugin options or parameters for further customizing the embedded video.
* Added AE FB VIDEO EMBED shortcode generator button. see screenshot for more details
* Updated readme.txt

= 1.1 =
* Minor bug fixes

= 1.0 =
* Initial Release

== Upgrade Notice ==
* Added new options to ae-fb-embed shortcodes
