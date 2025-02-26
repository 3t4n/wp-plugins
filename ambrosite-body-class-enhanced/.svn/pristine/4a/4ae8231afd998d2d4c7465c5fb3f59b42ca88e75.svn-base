=== Ambrosite Body Class Enhanced ===
Contributors: ambrosite
Donate link: http://www.ambrosite.com/plugins
Tags: body_class, body, classes, post, page, slug, slugs, parent, grandparent, category, categories, taxonomies, multisite, CSS, styles
Requires at least: 2.8
Tested up to: 3.2
Stable tag: trunk

Enhances the body_class template tag, adding some extra classes to the body (post/page slugs, post categories, and archive parent categories) useful in developing custom themes.

== Description ==

When activated, this plugin causes the body_class template tag to output five additional classes.

On single posts (is_single) :
`postname-[permalink slug]
single-[category slug]
parent-[parent category slug] (all parent and grandparent categories in a hierarchy of any depth)`

On pages (is_page) :
`pagename-[permalink slug]`

On category archives (is_archive and is_category) :
`parent-category-[parent category slug] (all parent and grandparent categories in a hierarchy of any depth)`

= Custom Taxonomies = 

As of version 1.3, the plugin now supports custom hierarchical taxonomies. The new body classes take the following form:

On single posts (is_single) :
`single-[taxonomy]-[term slug]
parent-[taxonomy]-[parent term slug] (all parent and grandparent terms in a hierarchy of any depth)`

On taxonomy archives (is_archive and is_tax) :
`parent-term-[parent term slug] (all parent and grandparent terms in a hierarchy of any depth)`

For single posts, the taxonomy name is included in the class name, because I felt it was important to be able to distinguish between taxonomies in cases where a post is assigned to more than one custom taxonomy, and when the same term might appear in two or more taxonomies. For example, suppose you had a real estate site with property listings in New York City, and you had two custom taxonomies defined: City and State. Then the classes would look like this:

`single-city-new-york single-state-new-york`

= Multisite Support = 

As of version 1.3, the plugin now supports multisite installations. If a multisite install is detected, the plugin will output the follow additional body class on every page of the site:

`site-[site ID]`

= Examples = 

If you have a post titled "Top 10 Decorating Ideas", in category "Christmas", with a parent category of "Holidays" and a grandparent category of "Calendar", the additional body classes will be as follows:

`postname-top-10-decorating-ideas single-christmas parent-holidays parent-calendar`

Why is this useful? Because it enables you to style individual posts and pages, as well as entire categories of posts, using only CSS, without having to edit the template files or create new templates.

Continuing the above example, if I wanted to give all of the posts in the Christmas category a green heading (to give them some extra holiday cheer), I could use a CSS selector like this:

`body.single-christmas h1 {
	color: green;
}`

Going further, suppose I want to attach a background image of a Christmas tree ONLY to the "Top 10 Decorating Ideas" post:

`body.postname-top-10-decorating-ideas div.post {
	background: url('images/xmas_tree.gif') no-repeat left top;
}`

What if I want all posts categorized under Holidays (Christmas, Thanksgiving, Easter, whatever) to have a sidebar with a gold border?

`body.parent-holidays div#sidebar,  /* all posts assigned to a subcategory of Holidays */
body.single-holidays div#sidebar { /* any posts assigned directly to the Holidays category */
	border: solid 2px gold;
}`

These are just a few examples. If you are experienced in writing CSS selectors, you will find many more uses for the new body classes. For further discussion, check this support forum thread: http://wordpress.org/support/topic/393942

== Installation ==

* Upload 'ambrosite-body-class.php' to the '/wp-content/plugins/' directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Verify your theme has the body_class function on the body element in header.php, as explained in the WordPress Codex: http://codex.wordpress.org/Template_Tags/body_class

== Frequently Asked Questions ==

= The body_class template tag is already outputting the post and page IDs. Aren't the slugs redundant? =

Yes, the post IDs can be used in CSS selectors. However, the slugs are much easier to remember and use. They will also make the CSS file a lot more readable when you come back to it a month or a year later.

= The post_class template tag is already outputting the category slug. Isn't it redundant to put it on the body as well? =

Putting the category slug on the body makes it possible to target elements outside of the post div. For example, if you wanted to style the sidebar on a per-category basis (e.g. change it's width for all posts in a certain category, or even hide it completely), you could do it using the body class, but not the post class.

== Changelog ==

= 1.3 =
* Added support for custom hierarchical taxonomies.
* Added multisite support.

= 1.2 =
* Added category archive parent categories.
* Finds all parent and grandparent categories in a hierarchy of any depth.

= 1.1 =
* Added single parent categories.
* Added prefix variables for easier customization.

= 1.0 =
* Initial version.