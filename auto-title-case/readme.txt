=== Auto Title Case ===

Contributors: bhadaway
Donate link: https://calmestghost.com/donate
Tags: title case, automatic, clean, seo, pretty
Requires PHP: 7.0
Requires at least: 5.0
Tested up to: 6.3
Stable tag: 0.1
License: Public Domain
License URI: https://wikipedia.org/wiki/Public_domain

Automatically converts post and image titles to title case.

== Description ==

Automatically converts post and image titles to title case.

== What is title case? ==

Title case would convert any of the following:

**Let's go to the market**
**Let's Go To The Market**
**let's go to the market**
**LET'S GO TO THE MARKET** \**(except for this scenario — see below)*

to:

***Let's Go to the Market***

[List of Article/Minor/Short Words](https://github.com/bhadaway/list-of-article-words) | [List of Acronyms](https://github.com/bhadaway/list-of-acronyms)\*

\*Originally, I had coded in a way to handle acronyms so that "LET'S GO TO THE MARKET" titles could be converted to title case (note that acronyms are automatically preserved in all other cases as long they're already in uppercase). However, it wasn't very ideal. A bad solution for an extremely rare problem. So, if you have the rare problem of having all uppercase titles that need to be converted, I can still help with a custom/manual solution, but I decided against it being in the plugin *officially*.

== Additional Notes: ==

* Once activated, Auto Title Case will update all new and existing titles of pages, posts, custom post types, images, etc. Whenever making such bulk updates to the database, it's recommended to first make a backup.
* For new image uploads, the titles and alts will be generated from the filename. This, along with using properly keyworded filenames, is good for SEO. Bad: **DSC_0001.JPG**. Good: **lets-go-to-the-market.jpg**.
* Currently only supports English. Non-english titles will convert all words to having their first letter capitalized (Vamos Al Mercado). With enough demand, and maybe some help, additional languages could be supported.

== Changelog ==

= 0.1 =
* New