=== WP-Amazon-Search widget ===
Contributors: jeffbert
Donate link: http://ohmykindle.blogspot.com/
Tags: amazon, affiliate, search, widget
Requires at least: 2.5
Tested up to: 2.5
Stable tag: trunk

Add slick looking Amazon Search widgets to your blog posts in a brain-dead simple way! Just say [search] to add a Search widget anywhere on your blog.

== Description ==

Add slick looking Amazon Search widgets to your blog posts in a brain-dead simple way! 
Just say `[search]` to add a Search widget anywhere on your blog.

Amazon Widgets are small Flash-based mini-applications that bring Amazon's rich features right to your website. The Amazon Search widget is a really useful widget that lets your users search from Amazon products right from your blog. You can even earn money by specifying your Amazon Associates ID. 

There are many ways to create a Search widget. Here are some:

1. `[search]` <br>
This creates a 160px widget widget with 1 column and 5 rows.

1. `[search keywords="Nikon DSLR" category="Photo"]` <br>
This search widget lets you search through Amazon's 'Camera & Photography' catalog with results for "Nikon DSLR" displayed by default.

1. `[search width="500" columns="2" rows="3"]` <br/>
This creates a 500 pixel wide widget with results spanning 2 columns and 3 rows.

1. `[search design="1" color_theme="Pink"]` <br/>
This creates a pink themed widget. Make sure to choose a design and color theme that makes the widget blend in with the rest of your page design.
You can select from a range of designs and color themes. These are valid design/color_theme combinations: <br/>
Design: ColorTheme<br/>
1: Blues, Pistachio, RedGrey, Pink, Pumpkin <br/>
2:Default, Blue, Grey, Orange, Pink, White <br/>
3:Cinnamon, Peppermint, Spearmint <br/>
4:Onyx, Cobalt, Ruby <br/>
5:BrushedSteel, BrushedNickel, BrushedCopper <br/>

1. `[search show_rating="False" show_price="False"]` <br/>
This creates a search widget where the star ratings and price for each product are hidden. So you only see the Product title and sub-title for each result.

1. `[Search tag="ohmyki-20" show_price="false" show_rating="false" keywords="HDTV"]` <br/>
This creates a Search widget results for the keyword "HDTV". The search results will not have price or ratings information since we've set those to "False". Also, since the 'tag' parameter is specified, you will earn an Affiliate referral fee for any sales made through this widget. IMPORTANT: One in 5 impressions of this widget will be tagged with the plugin creator's affiliate ID ('wp-search-20').

You can customize a lot more in your Search widget widget. Check out the FAQ section for more details.

== Installation ==

1. Upload `wp-amazon-search.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= What kinds of search widgets can I create? =
There are many ways to create a Search widget. Here are some:

1. `[search]` <br>
This creates a 160px widget widget with 1 column and 5 rows.

1. `[search keywords="Nikon DSLR" category="Photo"]` <br>
This search widget lets you search through Amazon's 'Camera & Photography' catalog with results for "Nikon DSLR" displayed by default.

1. `[search width="500" columns="2" rows="3"]` <br/>
This creates a 500 pixel wide widget with results spanning 2 columns and 3 rows.

1. `[search design="1" color_theme="Pink"]` <br/>
This creates a pink themed widget. Make sure to choose a design and color theme that makes the widget blend in with the rest of your page design.
You can select from a range of designs and color themes. These are valid design/color_theme combinations: <br/>
Design: ColorTheme<br/>
1: Blues, Pistachio, RedGrey, Pink, Pumpkin <br/>
2:Default, Blue, Grey, Orange, Pink, White <br/>
3:Cinnamon, Peppermint, Spearmint <br/>
4:Onyx, Cobalt, Ruby <br/>
5:BrushedSteel, BrushedNickel, BrushedCopper <br/>

1. `[search show_rating="False" show_price="False"]` <br/>
This creates a search widget where the star ratings and price for each product are hidden. So you only see the Product title and sub-title for each result.

= Where can I get all the Amazon categories? =

To get a list of valid categories, see the 'SearchIndex' column on this page: http://docs.amazonwebservices.com/AWSECommerceService/latest/DG/index.html?APPNDX_SearchIndexValues.html

= How do I change the size of my Search widget widget? =

You can set 'width', 'columns' and 'rows' parameters to resize your widget. For e.g., to get a 600px wide widget with 2 rows and 5 columns, I would do something like this:<br/><br/>
`[search width="400" rows="2" columns="5"]` <br/><br/>
The value for width should be between 150 and 800.

= How do I create a Search widget containing products from from Amazon.co.uk? =

Add the parameter marketplace="GB". Valid values for market place are: JP, FR, DE, GB, US, CA

= How do I display the product image for each search result? 
Due to some funkiness between the Amazon code and the Wordpress code, you can't show product images in the widget. If you'd like to try anyway, then try setting the 'show_image' parameter like so: `[search show_image="True"]` 

= I can't get the widget to show up in my sidebar. Instead of the widget, I see the plugin code in the sidebar. How do I fix this? =

Wordpress doesn't directly let you use shortcodes in the sidebar. Since this plugin uses shortcodes, you can't add this widget to the sidebar 'out-of-the-box'. However, there is a trivially easy 1-line fix for this! Follow these steps:
(Note: The steps below have been quoted from http://englishmike.net/2008/07/07/wordpress-quick-tips-3adding-a-shortcode-to-a-sidebar-widget/)

1. Login to your blog's administration pages and go to the Theme Editor - i.e. select Design >> Theme Editor from the admin menu.
1. Look in the list of Template Files on the right of the page for one called Theme Functions or functions.php and click on it to load it into the editor.
1. Find a place between the <?php and ?> tags which is not in the middle one of the functions that may already be in the file (the very top or bottom of the file are both good places) and add the following line:<br/>
`add\_filter('widget\_text', 'do\_shortcode');`
1. Click on the Update File button to save the modified template.

That's all you need to do.  Now any shortcodes you add to a sidebar widget will show up correctly.  

= Ok, one FINAL question before I'm sold. I love the Search widget widget. Any plans on doing this for other Amazon widgets on http://widgets.amazon.com/? =

I already have shortcodes for the Carousel widget (http://wordpress.org/extend/plugins/wp-amazon-carousel/) and MP3 widget (http://wordpress.org/extend/plugins/wp-amazon-mp3-widget/). If there's enough interest in getting the MP3 Clips widget, Slideshow widget, My Favorites, drop me a line at dogbertq8@gmail.com and I'll build another plugin for those widgets.

== Screenshots ==

1. Here's a screenshot of a Search widget widget in action.