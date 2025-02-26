=== A better prezi Wordprezi ===
Contributors: SocialBlogsite
Tags: prezi, presentation, player, flash, non-lineal, fly-through, embed, thumbnail, hires, autoload, autoplay, htaccess, fix, missing files, Slidedynamic
Donate link: http://socialblogsitewebdesign.com/wordpress_plugins/a-better-prezi-wordprezi/
Requires at least: 1.5
Tested up to: 3.2.1
Stable tag: 1.1

Prezi makes ugly your presentation if embedded in your site, with a GIANT title blocking half of it, and a nasty low-res thumbnail. To fix it…
== Description ==

You won't realize how ugly a prezi presentation looks when embedded in your website until you actually invest hours, even days, in designing the ultimate presentation, learn all the basics and more, get the file to play in your site, and then… it hits you: Something is wrong and no matter what parameters you use for your embed it NEVER looks as nice as it does on prezi.com explore section.

This plugin helps WordPress finding your presentation no matter what page you embedded it, when using the only prezi player in the market that gets rid of the GIANT title box and the ugly low-res thumbnail, by auto-loading and even auto-playing your presentation: Developed by [Slidynamic.com](http://www.slidedynamic.com/prezi-autoplayer), this alternative player is uploaded to your server along with the standalone (off-line) version of your prezi presentation, making the time you invested on getting your presentation attractive worth it, playing it as beautifully and even more functionally than in prezi.com website. It even supports different delays for each slide!

The only bump that incredibly better prezi player solution encounters is it relies on the standalone player which was designed to "look" for the required files in the SAME directory as the page it's on, searching for those files in EVERY directory you are at only.
You'll notice that once your prezi looks pretty as you created it, it fails because of missing files if embedded in several pages (like in WordPress header) and uploading those files (around 20MB) to every directory your pages are in is not an option.
Just install this plugin and all your prezi presentation will run smoothly no matter how many pages you embedded it in, by using advanced apache redirection rules in your server.
 
(Only compatible with Linux hostings, for now. You'll know if your WordPress is running on Linux if your articles urls look like name-of-article, rather than index.php?p=308)

= Features =

*	Integrates Slidedynamic's prezi player, the only prezi player that kicks your embedded presentation out of the "waiting for click" ugly state, pre-loads it, gets rid of low-res preview and GIANT presentation name blocking your presentation, and allows per-slide delays).
*	Registers your prezi application player in your server to be found anywhere,
*	No need to edit apache files
*	No FTP access needed
*	Many auto-features coming!

= Future features =

*	One-click Slidedynamic player install and uploading
*	Support for Windows servers
*	Shortcode and functions to place a presentation effortless

Don't forget to rate it and tell it works! &rang;&rang;&rang;&rang;&rang;&rang;&rang;&rang;&rang;&rang;&rang;&rang;
== Installation ==

Just click the red "install…" button and activate it.
If downloading it, go to your plugins dashboard panel and chose "Add New". There, browse your computer for the file you just downloaded and hit "upload". Activate it and upload your prezi player (follow Slidedynamic instructions) to a directory named "_prezi" under the root of your domain, e.g. http:yourdomain.com/_prezi


== Screenshots ==

1. Prezi as looks embedded with code supplied by prezi.com (it gets hosted by them, not you)
2. Prezi as looks hosted by you with this plugin and Slidedynamic.com player

== Instructions ==

Install and activate.

If you ever edited your .htaccess file, make sure your manually created rules are `outside` the #Wordpress markers, or they will be deleted. This is not for my plugin only but every time WordPress or other plugin saves its rules (e.g. changing permalink structure) it replaces everything between the `# BEGIN Wordpress` and `# END WordPress` comments.

== Frequently Asked Questions ==
Q: How do I upload my presentation?
A: Use the code and player provided by Slidedynamic.com

== Changelog ==

= 1.1.0 =

BEGIN and END comments added to prevent other plugins re-adding these rules

= 1.0.0 =

`A better prezi: WordPrezi` release.