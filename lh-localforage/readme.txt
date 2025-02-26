=== LH Localforage ===
Contributors: shawfactor
Donate link: https://lhero.org/portfolio/lh-localforage/
Tags: local storage, localstorage, localforage, indexeddb, client side
Requires at least: 3.0.
Tested up to: 5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin automatically and periodically saves the "just typed comment" so no data will be lost even if the browser crashes.

== Description ==
This plugin can greatly improve the user experience for your blog, by automatically and periodically saving fields like "just typed" comment (the content textarea input box in comment section), the visitors email, and vitors name (in the comment form).

The comment is saved using client side indexeddd (falling back to localstorage), this prevents loss of unsubmitted content.

This is similar like WordPress can remember your Name, Email, Website in comment area for the next visit, but WP Localforage plugin extends this into next level, it can remember the actual unsaved comment (i.e. before hit submit button) so even the browser is crashed before the user hit save, it is okay! When the user  came back, all "just type comment" will be still in there.

More importantly all data is saved client side, nothing is sent to the server. Thus maintaining visitor privacy!

== Installation ==

1. Upload the entire `lh-localforage` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That is it!


== Frequently Asked Questions ==
=Does this plugin require MySQL to run in the server side? (site owner)=
No, as the plugin name suggested, it uses browser's client side storage systems. So just drop this plugin into plugins directory then all good.

=Does this plugin require cutting edge HTML5 supported browsers to run in the client side? =
No, not really. This plugin supports most mainstream browsers such as IE8+, Firefox3+, Safari 3+ so most of your visitors will be looked after.

=Can I see this in action in the wild? =
Sure try this [example]: https://princesparktouch.com/2019/08/29/winter-2019-presentations/#respond , type in the comment (without submitting) section and refresh the broswer

=Can this be extended? =
More to add.

== Changelog ==
**1.00 Marcg 16, 2019**  
Initial release.