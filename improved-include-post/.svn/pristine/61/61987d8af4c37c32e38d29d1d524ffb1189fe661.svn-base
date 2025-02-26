=== Improved Include Post ===
Contributors: Alin Motiu & vtardia  
Tags: content, pages
Requires at least: 1.5.3
Tested up to: 2.7
Stable tag: 0.1.1

Improved Include Post plugin allows to include the content of a post in a template file with several options. 

Since version 0.1.1 IIP uses WordPress Shortcode API allowing to include the content of any static page inside any page or post using the syntax:

    [include-post id="123"]

Since version 0.1.1 page ID can ba a valid page path (on WP 2.1 or higher):

    [include-post id="/about/resume"]

== Description ==

Improved Include Post is an expanded version of the original Improved Include Page developed by Vito Tardia (http://www.vtardia.com/improved-include-page/) and it was developed to add some features I needed.

### Key Features

 - page title display with optional HTML code,
 - content display with different styles (full, teaser, custom ‘more’ link),
 - Wordpress filters applied to both the content and the title,
 - supports Wordpress 2.5.x Shortcode API


== Installation ==

 1. Download Improved Include Page
 2. Extract the zipped archive
 3. Upload the file `iinclude_post.php` to the `wp-content/plugins` directory 
    of your Wordpress installation
 4. Activate the plugin from your WordPress admin 'Plugins' page.
 5. Include pages in your templates ising `iinclude_page` function or in your 
    pages/posts using the shortcode syntax.

### How to use it

After installing it, the plugin adds the function ´iinclude_post´:

void **iinclude_post**(int post_id [,string params, boolean return = false])

The function takes three parameters: the id of the page to include (`post_id`) and an optional string (`params`) which contains the display options and an optional boolean (`return`) tells wether to return the content or display it on screen.

#### Example 1: basic usage

If you wish to include the content of page number `4` insert the following code into your template file (eg. sidebar.php):

    <?php iinclude_post(4); ?>

or

    <?php echo iinclude_post(4, null, true); ?>


In order to avoid PHP errors you should use the function with the following syntax:

     <?php if(function_exists('iinclude_post')) iinclude_post(4); ?>

#### Example 2: using optional parameter

You can also display the page title using the following code:

    <?php iinclude_post(4,'displayTitle=true&titleBefore=<h2 class="sidebar-header">'); ?>
	
#### Example 3: using Shortcode API

You can include a page's content in a page/post using the syntax:

    [include-post id="123"]

or

    [include-post id="3" displayTitle="true" displayStyle="DT_TEASER_MORE" titleBefore="<h3>" titleAfter="</h3>"  more="continue&raquo;"]

#### Parameters

The current version supports the following parameters:

<dl>
<dt>displayTitle (<em>boolean</em>)</dt>
<dd>toggle title display</dd>

<dt>titleBefore/after (<em>string</em>)</dt>

<dd>string to display before and after the title</dd>

<dt>displayStyle (<em>integer constant</em>)</dt>
<dd>one of the following:
<ul>
<li><code>DT_TEASER_MORE</code> - Teaser with &#8216;more&#8217; link (default)</li>
<li><code>DT_TEASER_ONLY</code> -Teaser only, without &#8216;more&#8217; link</li>
<li><code>DT_FULL_CONTENT</code> - Full content including teaser</li>
<li><code>DT_FULL_CONTENT_NOTEASER</code> - Full content without teaser</li>
</ul>
</dd>

<dt>more (string)</dt>
<dd>text to display for the &#8216;more&#8217; link</dd>
</dl>
