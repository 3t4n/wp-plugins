=== Fluid Player ===
Plugin URI: https://www.fluidplayer.com
Author URI: https://www.fluidplayer.com
Author: Florin Tudor
Contributors: florintudor
Donate link: http://example.com/
Tags: Fluid Player, html5 video player, VAST, thumbnails
Version: 3.0
Requires at least: 4.6
Tested up to: 6.3.1
Stable tag: trunk
Requires PHP: 5.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Description: VAST ready html5 video player

The plugin makes it easy to embed the VAST ready Fluid Player video player.

== Description ==

This plugin is a wrapper around the html5 video player <a href="https://www.fluidplayer.com">Fluid Player</a>
Once the plugin is installed and activated, you'll only need to use the any of the [fluid-player] or [fluid-player-extended] shortcodes at the desired location in your page or post.
The plugin comes with a default sample video, vast file and thumbnail previews.
If no shortcode parameters are provided, the plugin will fallback to the previously listed values.

For issues please refer to the main Fluid Player repository https://github.com/fluid-player/fluid-player

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/fluid-player` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
4. Include any of the the [fluid-player] or [fluid-player-extended] shortcodes on your website pages/posts. Below is the list of accepted parameters:

* video : path to actual video to be used by the player. If no value is passed it will fall back to the plugin sample video.
* vast_file : path to vast file (optional)
* vtt_file : path to VTT file (optional)
* vtt_sprite : path to VTT sprites file (optional)
* layout : the following skins are provided with the player: default/browser, if no value is passed it will fall back to 'default'
* responsive : toggle responsive behavior, defaults to false
* auto-play : toggle video autoplay, defaults to false
* playback-speed-control : Toggle playback speed widget on the control bar, defaults to false
* poster-image : Poster image to be displayed before video playback starts. Video screenshot is used most commonly
* allow-download : Toggle Download button on the control bar, defaults to false

* logo : Logo url
* logo-position: logo positioning, default value "top right"
* logo-opacity : logo opacity, default value 1
* logo-hyperlink: URL which will open in an new tab when the logo is clicked

* ad-text : Ad text visible in the top right corner of the video
* ad-cta-text : CTA hyperlink visible in the bottom left corner of the video

* html-on-pause-block-width : html banner width, default null
* html-on-pause-block-height : html banner height, default null

To further customize the video player, you will need to follow the docs at https://docs.fluidplayer.com/
You can use [fluid-player-ad-list] to add multiple ad rolls with different configurations, or you can totally overwrite the plugin parameters by using [fluid-player-options].

Using [fluid-player-options] is our recommended approach, since it will enable more compatibility with newer versions of Fluid Player.


Simple shortcode example:

`
[fluid-player
    video="foo.mp4"
    vast_file="vast.xml"
    vtt_file="thumbs.vtt"
    vtt_sprite="thumbs.jpg"
    layout="default"

    auto-play="true"
    allow-download="true"
    playback-speed-control="true"

    responsive="true"
]
`

Extended shortcode example:

`
[fluid-player-extended vast_file="https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/single_ad_samples&sz=640x480&cust_params=sample_ct%3Dlinear&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=" responsive="true" layout="default" auto-play="false" allow-download="true" playback-speed-control="true" poster-image="https://www.fluidplayer.com/images/valerian-thumbnail.jpg" logo="https://placekitten.com/64/64" logo-position="top right" logo-opacity=".8" logo-hyperlink="https://www.fluidplayer.com/" ad-text="adText" ad-cta-text="adCTAText" html-on-pause-block-width="100" html-on-pause-block-height="100"]

    [fluid-player-multi-res-video]
        [
            {"label": "720", "url": "https://cdn.fluidplayer.com/videos/valerian-720p.mkv"},
            {"label": "480", "url": "https://cdn.fluidplayer.com/videos/valerian-480p.mkv"}
        ]
    [/fluid-player-multi-res-video]

    [fluid-player-html-block]
        <div>
            <img src="https://placekitten.com/100/100" />
        </div>
    [/fluid-player-html-block]

[/fluid-player-extended]
`

Extended shortcode example with custom adList:

`
[fluid-player-extended responsive="true" layout="default" auto-play="false" allow-download="true" playback-speed-control="true" poster-image="https://www.fluidplayer.com/images/valerian-thumbnail.jpg" logo="https://placekitten.com/64/64" logo-position="top right" logo-opacity=".8" logo-hyperlink="https://www.fluidplayer.com/" ad-text="adText" ad-cta-text="adCTAText"]

    [fluid-player-ad-list]
        [
            { roll: 'preRoll', vastTag: 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/single_ad_samples&sz=640x480&cust_params=sample_ct%3Dlinear&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=' },
            { roll: 'midRoll', timer: '15', vastTag: 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/nonlinear_ad_samples&sz=480x70&cust_params=sample_ct%3Dnonlinear&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=' },
            { roll: 'postRoll', vastTag: 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/single_preroll_skippable&sz=640x480&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=' },
            { roll: 'onPauseRoll', vastTag: 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/nonlinear_ad_samples&sz=480x70&cust_params=sample_ct%3Dnonlinear&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=' },
        ]
    [/fluid-player-ad-list]

    [fluid-player-multi-res-video]
        [
            {"label": "720", "url": "https://cdn.fluidplayer.com/videos/valerian-720p.mkv"},
            {"label": "480", "url": "https://cdn.fluidplayer.com/videos/valerian-480p.mkv"}
        ]
    [/fluid-player-multi-res-video]

[/fluid-player-extended]
`

Extended shortcode example with custom configuration:

`
[fluid-player-extended]

    [fluid-player-options]
    {
        layoutControls: {
            primaryColor:           false,
            playButtonShowing:      true,
            playPauseAnimation:     true,
            fillToContainer:        true,
            autoPlay:               false,
            preload:                false,
            mute:                   false,
            doubleclickFullscreen:  true,
            subtitlesEnabled:       false,
            keyboardControl:        true,
            layout:                 'default',
            allowDownload:          false,
            playbackRateEnabled:    false,
            allowTheatre:           true,
            title:                  false,
            loop:                   false,
            logo: {
                imageUrl:           null,
                position:           'top left',
                clickUrl:           null,
                opacity:            1
            },
            controlBar: {
                autoHide:           true,
                autoHideTimeout:    3,
                animated:           true,
                playbackRates:      ['x2', 'x1.5', 'x1', 'x0.5']
            },
            timelinePreview:        {},
            htmlOnPauseBlock: {
                html:               null,
                height:             null,
                width:              null
            },
            playerInitCallback:     (function() {}),
            miniPlayer: {
                enabled: true,
                width: 400,
                height: 225
            }
        },
        vastOptions: {
            adList:                     [
                { roll: 'preRoll', vastTag: 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21775744923/external/single_ad_samples&sz=640x480&cust_params=sample_ct%3Dlinear&ciu_szs=300x250%2C728x90&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=' }
            ],
            skipButtonCaption:          'Skip ad in [seconds]',
            skipButtonClickCaption:     'Skip ad <span class="skip_button_icon"></span>',
            adText:                     null,
            adTextPosition:             'top left',
            adCTAText:                  'Visit now!',
            adCTATextPosition:          'bottom right',
            vastTimeout:                5000,
            showPlayButton:             false,
            maxAllowedVastTagRedirects: 1,
            vastAdvanced: {
                vastLoadedCallback:       (function() {}),
                noVastVideoCallback:      (function() {}),
                vastVideoSkippedCallback: (function() {}),
                vastVideoEndedCallback:   (function() {})
            }
        }
    }
    [/fluid-player-options]

    [fluid-player-multi-res-video]
        [
            {"label": "720", "url": "https://cdn.fluidplayer.com/videos/valerian-720p.mkv"},
            {"label": "480", "url": "https://cdn.fluidplayer.com/videos/valerian-480p.mkv"}
        ]
    [/fluid-player-multi-res-video]

[/fluid-player-extended]
`

== Changelog ==

= 3.0 =
* Introduces fluid-player-ad-list shortcode
* Introduces fluid-player-options shortcode
* Updates Fluid Player to v3

= 2.0 =
* Bringing plugin inline with version V2 of Fluid Player
