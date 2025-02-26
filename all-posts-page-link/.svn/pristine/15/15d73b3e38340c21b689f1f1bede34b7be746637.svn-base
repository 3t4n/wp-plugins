=== wp-all-posts-page-link ===
Contributors: sandapao
Donate link: http://www.j2trip.com/html/y2009/08/wp-all-posts-page-link.html
Tags: posts, page, link
Requires at least: 2.8.2
Tested up to: 2.8.5
Stable tag: 1.1


== Description ==

Display page link for all posts. Tested on wordpress 2.8.2 and 2.8.4 and 2.8.5, on bugs found.

== Installation ==
1. Upload `wp-all-posts-pages-link.php` to the `/wp-content/plugins/wp-all-posts-page-link` directory.  
2. Activate the plugin through the 'Plugins' menu in WordPress. 
3. Place <? if(function_exists("all_posts_page_link")) { all_posts_page_link('Prev', 'Next'); } ?> in the index.php of your templates. And the result will be:
   "Prev Page 1 2 3 Next Page".
4. You may change the page number form to set parameters like all_posts_page_link('Prev', 'Next', 'P'). If so the result will be:
   "Prev Page P1 P2 P3 Next Page".
5. If you want to display with reverse page number, you may set parameter like all_posts_page_link('Prev', 'Next', '', 0, ). If so the result will be:
   "Prev Page 3 2 1 Next Page". In the reverse form, the latest is 3.

== Frequently Asked Questions ==

= What's the format of the output? =
The format of output as follows(current page number is 1):
<ul>
<li>Prev Page</li>
<li>1</li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">Next Page</a></li>
</ul>
= How to customize prev and next lable? =
You can set them on the arguments of function all_posts_page_link, like all_posts_page_link('--', '++', 'Page') . For these arguments, the output will as follows(current page number is 1):
<ul>
<li>---</li>
<li>Page1</li>
<li><a href="#">Page2</a></li>
<li><a href="#">Page3</a></li>
<li><a href="#">+++</a></li>
</ul>

== Changelog ==

= 1.0 =
* first version.

= 1.1 =
* Remove class from <a href="#">
* Add option for reverse display. This means you can chose pages like: 
<ul>
<li>---</li>
<li>Page1</li>
<li><a href="#">Page2</a></li>
<li><a href="#">Page3</a></li>
<li><a href="#">+++</a></li>
</ul>
OR
<ul>
<li>---</li>
<li>Page3</li>
<li><a href="#">Page2</a></li>
<li><a href="#">Page1</a></li>
<li><a href="#">+++</a></li>
</ul>
In the reverse form, the Page3 is the latest. Othrwise Page1 is the latest.

