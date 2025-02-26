<?php 
$docText ='
<p>OVERVIEW</p>
<h3>For more information, please visit the <a href="http://www.ecosystemi.com/super-cat-lister">Super Cat Lister Wordpress Plug-in Page</a>.</h3>
<p>SuperCatLister greatly extends the abilities of Wordpress as  a content management system.  It does  this by giving site designers the ability to insert links or content from posts  in specified categories into other posts.  </p>
<p>SuperCatLister differs from other category listing solutions  because it gives enormous control over the formatting of the included content.  </p>
<p>Its power is further extended by allowing global defaults,  which are set in the plugin\'s administration screen, to be overridden in  specific posts by shortcodes.  This  allows ease of use combined with enormous flexibility of design. </p>
<p>Multiple options can be set for each list. Lists can be  inserted anywhere in posts and multiple lists can be inserted into posts.  </p>
<p>CHOOSING CATEGORIES  </p>
<p>To use SuperCatLister, insert shortcodes into the body of  the posts in which its output to be inserted.</p>
<p>The shortcode uses one of the following formats:</p>
<p>[cat_lister cat={category numbers separated by commas}  {options} ]</p>
<p>Or</p>
<p>[cat_lister cat_name=\'{category name}\' {options} ]</p>
<p>When viewing the post, text between (and including) the  brackets will be replaced by SuperCatLister\'s output.</p>
<p>SuperCatLister\'s output can be used anywhere in posts.  SuperCatLister can be used in more than one  place in the same post.  (So you can list  content in one category near the top of a post and list content in another  category near the bottom of the same post.</p>
<p>Categories to be included can be specified either by  category number or category name.  When  using category numbers, more than one category can be included.</p>
<p>Here are examples of specifying by category number:</p>
<p>[cat_lister cat=15]</p>
<p>This will replace the bracketed text with content from  category 15.</p>
<p>[cat_lister cat=3,11,14]</p>
<p>This will replace the bracketed text with mixed content from  categories 3, 11 and 14.</p>
<p>(Category numbers can be found in the Wordpress Admin Panel  Category Screen.  Mouse over a category  name.  The URL for the chosen category  should be listed in the bottom left part of your browser.  The rightmost part of the URL should be  \'Cat_ID=\' followed by a number.  That  will be the number for the category.)</p>
<p>Here is an example of specifying by category name:</p>
<p>[cat_lister cat_name=&quot;My Favorite Plugins&quot; ]</p>
<p>This will replace the bracket text with content from the  category named &quot;My Favorite Plugins&quot;.   Note that the plugin name should be spelled exactly as it is specified  in Wordpress, including spaces.</p>
<p>When using category names, only one category can be  included.</p>
<p>PAGE LISTER<br />
  Page listing is an unsupported bonus feature of Super Cat  Lister.  It\'s purpose is to list child  pages of a selected page.</p>
<p>To use enter the following into the body of a page:</p>
<p>[page_lister {option}]</p>
<p>The bracketed text will be replaced with a list of child  pages.  Most of the \'cat_lister\'  formatting options will work, but most of the sortation options will not.</p>
<p>OPTIONS<br />
  Super Cat Lister provides many options to control both what  posts are selected and how they are displayed.   Options are enumerated in the Super Cat Lister Admin Panel, which can be  found in the Settings sections of wp-admin (the Wordpress Administration  Screens).  A complete list of options is  also given below, in this document.</p>
<p>Default options are set in the Super Cat Lister Admin Panel.</p>
<p>Default options can be overridden in particular cat lists by  setting options individually within the brackets that set that cat list.  </p>
<p>Options control many aspects of the cat list:</p>
<p>Some control what posts are selected. For instance, how many  posts.</p>
<p>Some control sortation order.  For instance, by title, by date, by author  and ascending or descending.</p>
<p>Some control what parts of posts are included.  For instance, the date or time the post was  created and the author of the post.  Is  the content of each post included or just the title?</p>
<p>Some control the appearance of different aspects of included  posts.  For instance, the background of  the entire list, the titles of posts, the content of included posts, etc.  In most cases, options that control  appearance use standard CSS.  So, for  example, to make the text listing the author of each included post red, and  very large, you would set \'author_style\' (either in the admin screen or within  a post) as follows:   </p>
<p>color: red; font-size:xx-large;</p>
<p>SETTING OPTIONS IN THE ADMIN SCREEN<br />
  Options set in the admin screen control defaults for all cat  lists.  These options will be used unless  overridden as described below.</p>
<p>To set a default option, choose or type the value you would  like to use and click the \'Set\' button for that particular option.  To restore the original default, click  \'Restore Default\' for that option.  </p>
<p>SETTING OPTIONS IN INDIVIDUAL CAT LISTS<br />
  Options for particular cat lists are set with the following \'shortcode\'  format:</p>
<p>shortcode=&quot;value&quot;</p>
<p>To find the shortcode for a particular option, look for the  option in the admin screen.  The  shortcode will be listed there.  Note,  spelling and formatting must be exact.</p>
<p>For instance, lets say you wish to display all posts in  category 100, and you wish the background color of the entire list to be  red.  To achieve this, you would use the  following code in the body of the post where you wish the cat list to appear:</p>
<p>[cat_lister cat=100 container_style=&quot;red&quot;]</p>
<p>Multiple options can be set for each cat list.  For instance, in the example above, if you  would also like the title of each listed post to appear larger, you can use the  following:</p>
<p>[cat_lister cat=100 container_style=&quot;red&quot;  title_style=&quot;font-size:large&quot;]</p>
';
?>
