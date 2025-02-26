=== 1ON1 URL REDIRECTS ===
Contributors: marketing1on1com
Tags: redirect, tags, 301, 302, meta, plugin, forward, nofollow, posts, pages, 404
Requires at least: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tested up to: 6.2.2
Stable tag: 0.5

Easily redirect pages, posts and tags or custom post types to another page or post or external URL by specifying the redirect URL.

== Description ==
301 Redirects with Tags to post redirection option, which means when you view the tag it redirects to the assigned post / page of the tag which helps with SEO and resolves duplicate content issue.
This plugin has three redirect functionalities - **"URL Redirects"**, **"Individual Redirects"** and **"Global Tag Redirects"**:

= URL REDIRECTS =
URL Redirects are designed to be fast and simple to add. 
You do not need to have an existing page or post set up to add one. 
You just put the Request URL and the Destination URL and the plugin will redirect it. 
This type of redirect is great for fixing typos when a page was created, redirecting old URLs to a new URL so there is no 404, and to redirect links from an old site that has been converted to WordPress.

= INDIVIDUAL REDIRECTS (for existing pages/posts) =
For pages/posts that already exist, the plugin adds a meta box to the edit screen where you can specify the redirect location and type. This type of redirect is useful for many things, including menu items, duplicate posts, or just redirecting a page to a different URL or location on your existing site.

= GLOBAL TAG REDIRECTS =
This feature was created to eliminate one of the "duplicate issues" that wordpress creates by having the same content displayed via tags urls. 
By checkmarking "Tag Redirection Setting" to "Enable Tag Redirection" it will redirect all of the tags to the post or page that they are assigned to.
For example, let's say Tag1 is assigned to mywebsite.com/blog/mypost. By enabling "Tag Redirects" it will automatically redirect mywebsite.com/tag/tag1 to mywebsite.com/blog/mypost

For best results use some form of WordPress Permalink structure. If you have other Redirect plugins installed, it is recommended that you use only one redirect plugin or they may conflict with each other or one may take over before the other can do its job.

= What You CAN Do (aka, Features): =
* Works with WordPress Nav Menus
* Works with WordPress Custom Post Types (select setting on options page)
* You can set a redirected page or menu item to open in a new window (Quick Redirects require **Use jQuery?** option to be set)
* You can add a *rel="nofollow"* attribute to the page or menu item link for the redirect (Quick Redirects require **Use jQuery?** option to be set)
* You can completely re-write the URL for the redirect so it takes the place of the original URL (rewrite the href link)
* You can redirect without needing to create a Page or Post using Quick Redirects. This is useful for sites that were converted to WordPress and have old links that create 404 errors (see FAQs for more information).
* Destination URL can be to another WordPress page/post or any other website with an external URL.
* Request URL can be a full URL path, the post or page ID, permalink or page slug.
* Option Screen to set global overrides like turning off all redirects at once, setting a global destination link, make all redirects open in a new window, etc.
* View a summary of all redirected pages/posts, custom post types and Quick Redirects that are currently set up.
* Plugin Clean up functions for those who decide they may want to remove all plugin data on uninstall.
* Import/Export of redirects for backup, or to add bulk Quick Redirects.
* Optional column for list pages to easily show if a page/post has a redirect set up and where it will redirect to.


= What You CAN NOT DO: =
* This plugin does not have wild-card redirect features.
* This plugin DOES NOT modify the .htaccess file. It works using the WordPress function wp_redirect(), which is a form of PHP header location redirect.
* You cannot redirect the Home (Posts) page - unless you set a page as the home page and redirect that.
* If your theme uses some form of custom layout or functionality, some features may not work like open on a new window or no follow functionality UNLESS you have the **Use jQuery?** option to set.

This plugin is not compatible with WordPress versions less than 4.0. Requires PHP 5.2+.

= TROUBLESHOOTING: =
* To include custom post types, check the setting on the plugin option page - and you also can hide it from post types you don't want it on.
* If you experience jQuery conflicts with the plugin, try turning off the **Use jQuery?** setting in the options page. BUT, please note that if this option if off, the new window and no follow functionality may be inconsistent (this mainly depends on how your theme is set up)
* If you check the box for "Show Redirect URL below" on the edit page, please note that you MUST use the full URL in the Redirect URL box. If you do not, you may experience some odd links and 404 pages, as this option changes the link for the page/post to the EXACT URL you enter in that field. (i.e., if you enter '2' in the field, it will redirect to 'http://2' which is not the same as 'http://yoursite.com/?p=2').
* If your browser tells you that your are in an infinite loop, check to make sure you do not have pages redirecting to another page that redirects back to the initial page. That WILL cause an infinite loop.
* If you are using the URL Redirects method to do your redirects, try to use Request URLs that start with a '/' and are relative to the root (i.e., 'http://mysite.com/test/' should be set to '/test/' for the request field).
* If your site uses mixes SSL, use relative links whenever possible (i.e., '/my-page/'). The plugin is designed to detect the incoming protocol and try to apply the appropriate protocol to the destination URL.
* Links in page/post content and links that are created using get_permalink() or the_permalink() will not open in a new window or add the rel=nofollow UNLESS you have the **Use jQuery?** option set.
* If your page or post is not redirecting, this is most likely because something else like the theme functions file or another plugin is outputting the header BEFORE the plugin can perform the redirect. This can be tested by turning off all plugins except the 1ON1 URL Redirects Plugin and testing if the redirect works. Many times a plugin or bad code is the culprit.
* We try to test the plugin in many popular themes and alongside popular plugins. In our experience, (with exception to a few bugs from time to time) many times another plugin is the cause of the issues - or a customized theme.
* Check the FAQs/Help located in the Plugin menu for more up to date issues and fixes.

== Installation ==

= If you downloaded this plugin: =
1. Upload `1ON1_URL_REDIRECTS` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Once Activated, you can add a redirect by entering the correct information in the `1ON1 URL REDIRECTS` box in the edit section of a page or post
1. You can create a redirect with the '1ON1 URL Redirects' option located in the Quick Redirects admin menu.

= If you install this plugin through WordPress 2.8+ plugin search interface: =
1. Click Install `1ON1 URL REDIRECTS Plugin`
1. Activate the plugin through the 'Plugins' menu.
1. Once Activated, you can add a redirect by entering the correct information in the `Quick Page/Post Redirect` box in the edit section of a page or post
1. You can create a redirect with the 'URL Redirects' option located in the 1ON1 URL Redirects admin menu.

== Frequently Asked Questions ==

= Why is my Page/Post not redirecting? =
FIRST - make sure it is active if using Individual Redirects (set up on the edit page for a post or page). Then, check to make sure the global option to turn off all redirects is not checked (in the plugin options).

SECOND - if you are using URL Redirects, try using links relative to the root (so 'http://mysite.com/contact/' would be '/contact/' if using the root path). If your site is in a sub-folder (set in Settings/General), do not use the sub-folder in the root path as it is already taken into consideration by WordPress.

NEXT - clear your site's cache files if you are using a caching plugin/theme. You may also need to clear your browser cache and internet files if you use caching - the browser WILL hold cached versions of a page and not redirect if there was no redirect in the cached version.

FINALLY - if you are not using a permalink structure of some sort, it is recommended that you set up at least a basic one. Redirects without a permalink structure can be inconsistant.

If your page or post is still not redirecting, then it is most likely because something else like the theme functions file or another plugin is outputting the header BEFORE the plugin can perform the redirect. This can be tested by turning off all plugins except the 1ON1 URL Redirects Plugin and testing if the redirect works. many time a plugin or bad code is the culprit - or the redirect is just simply turned off.

= Should I use a full URL with http:// or https:// ? =
Yes, you can, but you do not always need to. If you are redirecting to an external URL, then yes. If you are just redirecting to another page or post on your site, then no, it is not needed. When in doubt, use the entire URL. For URL Redirects, it is recommended that you use relative URLs whenever possible.

= Can I do a permanent 301 Redirect? =
Yes. You can perform a 301 Permanent Redirect. Additionally, you can select a 302 Temporary or a 307 Temporary redirect or a Meta redirect. URL and Tag Redirects are always 301 unless you override them with a filter.

= Is the plugin SEO friendly? =
Yes it is.
The plugin uses standard redirect status methods to redirect the URLs. SEO crawlers use the status code to determine if a page request is available, moved or if there is some other error.

If you do not want a search engine to follow a Redirect URL, use the No Follow option to add 'rel="nofollow"' to the link.


= Do I need to have a Page or Post Created to redirect? =
No. There is a URL Redirects feature that allows you to create a redirect for any URL on your site. This is VERY helpful when you move an old site to WordPress and have old links that need to go some place new. For example,
If you had a link on a site that went to http://yoursite.com/aboutme.html you can now redirect that to http://yoursite.com/about/ without needing to edit the htaccess file. 
You simply add the old URL (/aboutme.html) and tell it you want to go to the new one (/about/). Simple as that.

The functionality is located in the 1ON1 URL REDIRECTS menu. The old URL goes in the Request field and the to new URL goes in the Destination field.

= Does the Page/Post need to be Published to redirect? =
YES... and NO... The redirect will always work on a Published Post/Page. For it to work correctly on a Post/Page in DRAFT status, you need to fist publish the page, then re-save it as a draft. If you don't follow that step, you will get a 404 error.
