=== Post Type Pagination ===
Contributors: Wordpress Post Type Pagination
Tags: Paginate, Pagination, navigation, Post Type Pagination, post-type-pagination, Post Pagination, rtl, seo, usability
Tested up to: 5.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wordpress Post Type Pagination is a simple and flexible pagination plugin which provides users with better navigation on your WordPress site.

== Description ==

= Latest News =
Wordpress Post Type Pagination is a simple and flexible pagination plugin which provides users with better navigation on your WordPress site.

In addition to increasing the user experience for your visitors, it has also been widely reported that pagination increases the SEO of your site by providing more links to your content.

You can add custom CSS for your pagination links with the Custom CSS tab in post-type-pagination Settings.

 
== Installation ==

*Install and Activate*

1. Unzip the downloaded post-type-pagination zip file
2. Upload the `post-type-pagination` folder and its contents into the `wp-content/plugins/` directory of your WordPress installation
3. Activate post-type-pagination from Plugins page

*Implement*

For posts pagination:
* Open the theme files where you'd like pagination to be used. Depending on your theme, this could be in a number of files, such as `index.php`, `archive.php`, `categories.php`, `search.php`, `tag.php`, or the `functions.php` file(s).The `twentyeleven` theme places the pagination code in `functions.php` in the `twentyeleven_content_nav()` function.

Examples:

For the `Twenty Seventeen` theme, in `index.php`, replace:

	the_posts_pagination( array(
		'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
	) );

With:

	if(function_exists('wp_paginate')):
		wp_paginate();	
	else :
		the_posts_pagination( array(
			'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
		) );
	endif;

For the `Twenty Sixteen` theme, in `index.php`, replace:

		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'twentysixteen' ),
			'next_text'          => __( 'Next page', 'twentysixteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
		) );

With:

		if(function_exists('wp_paginate')):
			wp_paginate();	
		else :
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );
		endif;

For the `Twenty Fifteen` theme, in `index.php`, replace:

			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

With:

			if(function_exists('wp_paginate')):
				wp_paginate();	
			else :
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );
		  endif;

For comments pagination:
1) Open the theme file(s) where you'd like comments pagination to be used. Usually this is the `comments.php` file.

2) Replace your existing `previous_comments_link()` and `next_comments_link()` code block with the following:

    <?php if(function_exists('wp_paginate_comments')) {
        wp_paginate_comments();
    } ?>


*Configure*

1) Configure the post-type-pagination settings, if necessary, from the post-type-pagination option in the Settings menu

2) The styles can be changed with the following methods:

* Add a `post-type-pagination.css` file in your theme's directory and place your custom CSS there
* Add your custom CSS to your theme's `styles.css`
* Modify the `post-type-pagination.css` file in the post-type-pagination plugin directory

*Note:* The first two options will ensure that post-type-pagination updates will not overwrite your custom styles.

*Upgrading*

To 1.1.1+:

* Update post-type-pagination settings, change `Before Markup` to `<div class="navigation">`
* Update `post-type-pagination.css`, change `.post-type-pagination ol` to `.post-type-pagination`

== Frequently Asked Questions ==

= How can I override the default pagination settings? =

The `wp_paginate()` and `wp_paginate_comments()` functions each takes one optional argument, in query string format, which allows you to override the global settings. The available options are:

* title - The text/HTML to display before the pagination links
* nextpage - The text/HTML to use for the next page link
* previouspage - The text/HTML to use for the previous page link
* before - The text/HTML to add before the pagination links
* after - The text/HTML to add after the pagination links
* empty - Display before markup and after markup code even when the page list is empty
* range - The number of page links to show before and after the current page
* anchor - The number of links to always show at beginning and end of pagination
* gap - The minimum number of pages before a gap is replaced with an ellipsis (...)

You can even control the current page and number of pages with:

* page - The current page. This function will automatically determine the value
* pages - The total number of pages. This function will automatically determine the value

Example (also applies to `wp_paginate_comments()`):

    <?php if(function_exists('wp_paginate')) {
        wp_paginate('range=4&anchor=2&nextpage=Next&previouspage=Previous');
    } ?>


= How can I style the comments pagination differently than the posts pagination? =

When calling `wp_paginate_comments()`, post-type-pagination adds an extra class to the `ol` element, `post-type-pagination-comments`.

== Changelog ==
= 1.0.0 =
* Added option to add trailing slash to pagination links when needed

