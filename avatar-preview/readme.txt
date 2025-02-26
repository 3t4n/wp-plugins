=== Avatar Preview ===
Contributors: xaquseg
Tags: gravatar, avatar, comments
Requires at least: 2.8
Tested up to: 2.9.2
Stable tag: 1.1.3

Shows an avatar preview on the comment form.

== Description ==

Shows an avatar preview on the comment form based on the email address entered.

Uses the [Javascript MD5 library by Paul Johnston](http://pajhome.org.uk/crypt/md5/).

== Installation ==

1. Upload the plugin directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<div id="avatarPreviewBox"></div>` in your comments template where you want the preview to appear. Make sure your email input field has `id="email"`. You may optionally add `class="previewsize-64"` to change the size of the preview, where 64 is the size in pixels.

== Frequently Asked Questions ==

= What do I need to know to style it to match my theme? =

The following IDs are used:

* `avatarPreviewImage` for the avatar itself
* `avatarPreviewDesc` for the description/status ("Enter your email to see an avatar preview." for example)
* `avatarChangeLink` for the link to http://www.gravatar.com/

Example generated HTML:

    <div id="avatarPreviewBox">
        <img id="avatarPreviewImage" src="http://www.gravatar.com/avatar/23463b99b62a72f26ed677cc556c44e8?r=pg&amp;d=identicon&amp;s=32" height="32" width="32" />
        <p id="avatarPreviewDesc">Gravatar for 'example@example.com'</p>
        <p><a id="avatarChangeLink" target="_blank" href="http://www.gravatar.com/">Change at Gravatar.com</a></p>
    </div>

Example CSS:

    #avatarPreviewBox {
        padding: 0;
        margin: 0;
        background: transparent;
    }
    
    #avatarPreviewBox #avatarPreviewImage {
        float: left;
        padding-right: 3px;
    }
    
    #avatarPreviewBox p {
        margin: 0;
        padding: 0;
    }

== Changelog ==

= 1.1.3 =
* Fix broken check that caused the preview to fail to load.

= 1.1.2 =
* Don't serve the javascript to logged in users.

= 1.1.1 =
* Fix Javascript errors if the email field or preview box aren't found.
* Embed avatarpreview.js in the footer instead of the header.
* Update compatable version to 2.9.2
* Document format of generated code better, for easier styling.

= 1.1 =
* Correctly support rating settings other than "g" and default avatars other than "identicon".
* Support configuring the size of the preview image via a "previewsize-NUMBER" class.

= 1.0.1 =
* Add additional documentation
* Update compatable version to 2.9

= 1.0 =
* First public release

== Upgrade Notice ==

= 1.1.3 =
Fix broken check that caused the preview to fail to load.

= 1.1.2 =
Don't serve the javascript to logged in users.

= 1.1.1 =
Fix Javascript errors if the email field or preview box aren't found, embed avatarpreview.js in the footer instead of the header, and update compatable version to 2.9.2

= 1.1 =
Correctly support rating settings other than "g" and default avatars other than "identicon", size of avatar in preview is now configurable.

= 1.0.1 =
Add additional documentation, and update compatable version to 2.9

= 1.0 =
First public release.
