=== Disable WebP By Default ===
Contributors: davidbaumwald
Tags: image, media, webp, jpeg
Requires at least: 5.8
Tested up to: 6.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A small plugin to control WebP image creation when JPEG images are uploaded.

== Description ==

*** 2022-09-12 UPDATE ***
@matt published a post and codified a final decision that [WebP by default would not be coming to WordPress Core in version 6.1](https://make.wordpress.org/core/2022/09/11/webp-in-core-for-6-1/).  That being the case, this plugin will not be necessary for users to prevent WebP generation by default as part of the Core upload process.

Proposed to be included in WordPress 6.0 is a new feature to generate and use webp images by default.  Specifically, when an image is uploaded, a WebP version of every image subsize is created.  According to [the proposal](https://make.wordpress.org/core/2022/03/28/enabling-webp-by-default/), one downside is that generating WebP versions along with the original JPEGs will "use an additional ~70% of the storage space to store both file types."  Although this is hugely beneficial to most websites and, more importantly, their visitors, some site owners may not be immediately able to increase the size of their storage to accommodate the additional files.  For more information, see the proposal or [the Trac ticket](https://core.trac.wordpress.org/ticket/55443).

To help site owners manage the transition, this plugin adds a setting under Settings -> Media to either enable or disable WebP creation on the initial upload of JPEGs.  For Multisite installations, the plugin can be activated network-wide or on individual sites.

*** 2022-07-22 UPDATE ***
Although the original implementation was not merged in 6.0 due to community feedback, changeset 53751(https://core.trac.wordpress.org/changeset/53751) merged an updated implementation that addresses some(but not all) concerns from the community. This merge will be part of the 6.1 release, unless further changes are needed.  Some site owners may not be able to immediately cope with doubling their required storage allotment with their host, so the original goal of this plugin remains.  The code has been updated to disable WebP creation on upload globally.  There is a new ticket discussing the possibility of making this feature into a setting(see https://core.trac.wordpress.org/ticket/56263).  However, given WordPress's core philosphy of "Decisions, Not Options", it's unlikely to proceed.

== Installation ==

1. Upload the `disable-webp-by-default` folder to the plugins directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Control WebP generation with the new checkbox under Settings -> Media.

== Changelog ==

= 0.7.0 =
* Cleanup namespaces and scopes.

= 0.6.0 =
* Code consolidation and cleanup.

= 0.5.0 =
* Add new setting to control the WebP generation.

= 0.4.0 =
* Remove "Network" flag in plugin header to allow for individual site usage in multisite.
* Add mime check for JPEG before altering the outputs.

= 0.3.0 =
* Update code to only remove the JPEG -> WebP transform, leaving the other default JPEG -> JPEG transforms in place. (Props @adamsilverstein)

= 0.2.0 =
* r53751 compatibility update.

= 0.1.0 =
* Initial release.
