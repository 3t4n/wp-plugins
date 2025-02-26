=== Alex Player ===
Contributors: iamzhirik
Donate link: http://alex.zhyrytovskyi.x10.name/
Tags: audio player, mp3 player, wavesurfer, radio
Requires at least: 4.3
Tested up to: 6.6.2
Stable tag: 4.3
Requires PHP: 5.3.13
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Alex Player is simple audio player designed to play local audio files or radio streams on your website.

== Description ==

This audio player is designed to play local audio files or radio streams on your website. It has 6 components: media player, wavesurfer, waveform visualization, equalizer, circular spectrum and play button.

== Screenshots ==

1. /screenshot-1.png
1. /screenshot-2.png
1. /screenshot-3.png
1. /screenshot-4.png

== Live Demo ==

[View live demo here](http://alex.player.x10.name/)

== Installation ==

To install this plugin you need to do the following:

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Insert shortcodes into the text of your post, list of the shortcodes provided below.

== Shortcodes ==

Media player shortcode:

	[UIMediaPlayer file="/demo.mp3" color="#c0c0c0" width="600"]

Wavesurfer shortcode:

	[UIWaveSurfer file="/demo.mp3" color="#4fcb1d" color2="#8b8b8b"]

[More shortcode examples](http://alex.player.x10.name/)
	
== Frequently Asked Questions ==

After I modify the shortcode it stopped working, why?
When you modify the text the wordpress editor could insert invisible markup. To remove that markup you can copy the shortcode to notepad, and than copy it back from notepad to wordpress editor.

Why this player does not play media file from remote url?
Due to web browser security policy it does not allow to read and process audio which located on remote host. The exception are files where "Access-Control-Allow-Origin: *" is present, such files can be played remotely.

Why do I hear small sound artifacts in Chrome?
It appers only if you playing audio on "http", but on "https" everything works fine. The reason is that modern web browser audio processing features works only with "https", and if you are using "http" then player using older sound processing mechanism which is deprecated.

== Thanks to the authors ==

* Milenko Mitrovic for the [DC-DSP Filter](https://www.dsp-worx.de/?n=4) - most of digital signal processing algorithms was reused from DC-DSP Filter.
* Ryan Geiss for the [Geiss plugin](https://www.geisswerks.com/geiss/) - the minimal version of Geiss was ported into this project as fullscreen audio visualization.

== Changelog ==

= v1.41 (2024-12-18) =
* Fixed: Parameters for icecast are set more properly in technical way
* Fixed: Audio screensaver can display stereo sound on radio streams

= v1.40 (2024-12-15) =
* Fixed: Spectrum height parameter not worked (in fact not implemented for setting it externally), right now it works fine
* Fixed: method setRadioStations was missed in Wordpress plugin wrapper, rewrote it to follow the concept of new radio API
* Changed: Since player can work without jQuery, possibly it will not need to use jQuery any more

= v1.39 (2024-12-11) =
* Fixed: Wavesurfer waveprint picture can be loaded from the ".surf" file, in this case wavesurfer will not need to load whole audio file into memory for waveprint picture generation

= v1.38 (2024-11-25) =
* Changed: "Geiss" visualization now runs on GPU, the CPU slow alternative can be run by pressing shift+left_mouse_button

= v1.37 (2024-10-26) =
* Changed: Equalizer right now automatically adjust amplitude of the volume, and amplifier has ability to overload
* Fixed: Visualization for equalizer was boosted with the wrong data
* Fixed: Playback engine was reworked a little

= v1.36 (2024-10-15) =
* Added: "Geiss" visualization was partially converted from C++ to Javascript and set as audio screensaver
* Fixed: Lowpass filter turned off on 1.00
* Fixed: Change of the volume with no media loaded produced an error in console of web browser
* Fixed: After audio completed if we press play button than it will play audio from the beginning
* Fixed: Radio right now could play through AudioWorklet api, cause old audio processing API could produce sound artifacts

= v1.35 (2022-07-22) =
* Added: New engine based on AudioWorklet technology, whuch works only on https
* Added: Ability to reorder items inside playlist using drag&drop

= v1.34 (2020-12-30) =
* Fixed: Equalizer presets popup was not appear with jQuery v3.5.1

= v1.33 (2020-12-30) =
* Added: Ability to fix media player to the corner of the window
* Fixed: Radio shortcode was reworked, old shortcode is supported but not ducumented any more

= v1.32 (2020-12-25) =
* Added: Playlist partial implementation

= v1.31 (2020-12-04) =
* Fixed: Audio screensaver reworked
* Fixed: Visualizations behind the page visible area will not eat processor time

= v1.30 (2020-11-19) =
* Added: Player can work with or without jQuery
* Added: Optional download selection button inside wavesurfer
* Fixed: Wavesurfer scrollbar becomes transparent

= v1.29 (2020-11-19) =
* Fixed: Playback engine reworked
* Added: Radio support

= v1.28 (2020-11-13) =
* Added: Added ability to set channels count for Wavesurfer

= v1.27 (2020-11-08) =
* Fixed: First screensaver reworked

= v1.26 (2020-11-08) =
* Added: First screensaver

= v1.25 (2020-11-06) =
* Fixed: Waveform right now mirrored in wide screens
* Fixed: Wavesurfer forced to 2 channels
* Added: Equalizer becomes free component

= v1.24 (2020-10-30) =
* Added: Equalizer can load previous values after page refresh

= v1.23 (2020-10-10) =
* Added: Wavesurfer selection color change ability
* Added: Ability to download selected area inside Wavesurfer in WAV or MP3 format

= v1.22 =
* Added: Wordpress 5.5 support

= v1.21 =
* Added: Added ability to hide play button for media player and wavesurfer

= v1.20 (2020-07-31) =
* Added: Spectrum visualization on top of media player

= v1.19 (2020-07-19) =
* Added: Only one instance at a time can play right now, all the other instances will be paused
* Added: Wavesurfer selection

= v1.18 (2020-07-14) =
* Added: Local video playback ability

= v1.17 (2020-06-04) =
* Added: Ability to play url streams

= v1.16 (2020-06-30) =
* Fixed: Equalizer multiple instance support
* Added: Looped playback option

= v1.15 (2020-06-29) =
* Fixed: On small audio files wavesurfer stops not on the end of file

= v1.14 (2020-04-23) =
* Fixed: Volume change does not slow down the performance
* Added: Bars visualization for media player
* Added: Equalizer

= v1.13 (2020-04-11) =
* Fixed: z-index bug for circular spectrum
* Fixed: Player now works on iOS

= v1.12 (2020-04-01) =
* Improved: Wavesurfer time line updates more smoothly
* Added: Ability to play remote URLs which are not blocked by CORS

= v1.11 (2020-03-30) =
* Fixed: Waveform visualization on wide screens

= v1.10 (2020-03-13) =
* Added: Circular spectrum component
* Added: Play button component

= v1.09 (2020-03-11) =
* Fixed: Real time visualization right now works immediately
* Fixed: Waveform right now displays global audio from all media players inside the page

= v1.08 (2020-03-10) =
* Fixed: All the components with same file name will be connected together
* Added: For the big audio files it takes long time for wavesurfer to load visual data, this problem solved by adding one more file near current mp3 file that already has cached visual data

= v1.07 (2019-12-19) =
* Fixed width bug

= v1.05, v1.06 (2019-12-19) =
* Initial release for Wordpress