<h2>Parameters Tutorial</h2>
<h3>How to call the URL and what each parameter does... <span color="green">test it don`t be shy :)</span> </h3><hr><u><h3>Default Call:</h3></u>
	<li>post type: post</li>
	<li>post status: publish</li>
	<li>posts per page: 20</li>
	<?php echo custom_simple_rss_admin_href(''); ?>	

<hr><u><h3>Filter by post category/s:</h3></u>
<h4>csrp_cat (string | optional)</h4>	<p>		Display posts that have this category (and any children of that category), using category id
		<?php echo custom_simple_rss_admin_href("&csrp_cat=4"); ?>	</p>	<p>		Display posts that have these categories, using category id
		<?php echo custom_simple_rss_admin_href("&csrp_cat=2,6,17,38"); ?>	</p>	<p>    		Display all posts except those from a category by prefixing its id with a '-' (minus) sign			
		<?php echo custom_simple_rss_admin_href("&csrp_cat=-12,-34,-56"); ?>	</p><hr><u><h3>Filter by post author:</h3></u>
<h4>csrp_author (string | optional)</h4>	<p>		Display posts by author, using author id:		<?php echo custom_simple_rss_admin_href("&csrp_author=5"); ?>	</p>    <p>		Show Posts From Several Authors:		<?php echo custom_simple_rss_admin_href("&csrp_author=2,6,17,38"); ?>	</p>    <p>		Exclude Posts Belonging to an Author:		<?php echo custom_simple_rss_admin_href("&csrp_author=-5"); ?>	</p>
<hr><h4>csrp_author_name (string | optional)</h4>	<p>		Display posts by author, using author 'user_nicename':
		<?php echo custom_simple_rss_admin_href("&csrp_author_name=john"); ?>	</p><hr><u><h3>Show X number of posts:</h3></u>
<h4>csrp_posts_per_page (int | optional) default 20</h4>	<p>		show only 5 posts
		<?php echo custom_simple_rss_admin_href("&csrp_posts_per_page=5"); ?>	</p><hr><u><h3>Order by:</h3></u>
<h4>csrp_orderby (string | optional) default ‘date’</h4>   <li>'ID' - Order by post id. Note the capitalization.</li>   <li>'author' - Order by author.</li>   <li>'name' - Order by post name (post slug).</li>   <li>'date' - Order by date.</li>   <li>'modified' - Order by last modified date.</li>   <li>'rand' - Random order.</li>
	<p>    		Display posts order by name:
		<?php echo custom_simple_rss_admin_href("&csrp_orderby=name"); ?>	</p><hr><u><h3>Sort:</h3></u>
<h4>csrp_order (string | optional) default ‘asc’</h4>	<li>asc</li>	<li>desc</li>
	<p>		Display posts order by name descending:
		<?php echo custom_simple_rss_admin_href("&csrp_orderby=name&csrp_order=DESC"); ?>	</p>	 
<hr><u><h3>Get 10 latest posts (order by id):</h3></u><h4>csrp_orderby  = ID</h4><h4>csrp_order = DESC</h4>	<p>		Display 10 posts order by ID descending:		<?php echo custom_simple_rss_admin_href("&csrp_posts_per_page=10&csrp_orderby=ID&csrp_order=DESC"); ?>	</p>	 <hr><u><h3>Get posts order by meta key (post_views):</h3></u><h4>csrp_orderby = meta_value_num</h4><h4>csrp_order = DESC</h4><h4>csrp_meta_key = post_views</h4>	<p>		Display posts order by name descending:		<?php echo custom_simple_rss_admin_href("&csrp_orderby=meta_value_num&csrp_order=DESC&csrp_meta_value=&csrp_meta_key=post_views"); ?>	</p><hr><u><h3>Filter by post status / statuses:</h3></u><h4>csrp_post_status (string | optional) default ‘publish’</h4>   <li>'publish'</li>   <li>'pending' post is pending review.</li>   <li>'draft' a post in draft status.</li>   <li>'future' a post to publish in the future.</li>   <li>'trash' post is in trashbin </li>   <li>'any' retrieves any status except those from post statuses with 'exclude_from_search' set to true (i.e. trash and auto-draft).</li>    		<p>
		Display only future posts:
	   <?php echo custom_simple_rss_admin_href("&csrp_post_status=future"); ?>
	</p>	<p>
		Multiple post statuses:
	   <?php echo custom_simple_rss_admin_href("&csrp_post_status=publish,draft"); ?>
	</p>
<hr><u><h3>Filter by post type/types:</h3></u>
<h4>csrp_post_type (string | optional) default ‘post’</h4>   <li>post</li>   <li>page</li>   <li>any custom post defined by blog</li>
	<p>    		Display Pages not Posts:
		<?php echo custom_simple_rss_admin_href("&csrp_post_type=page"); ?>	</p>	<p>    		Display custom post types (if any):
		<?php echo custom_simple_rss_admin_href("&csrp_post_type=books"); ?>
		</p>			<p>
		Multiple post types:
	   <?php echo custom_simple_rss_admin_href("&csrp_post_status=page,post"); ?>
	</p>
<hr><u><h3>Filter by meta:</h3></u><h4>any meta value that exists in post</h4> 	<li>csrp_meta_key (string | optional) - Custom field key.</li> 	<li>csrp_meta_value (string | optional) Custom field value.<b>!must be specified if meta_key present</b></li> 	<li>csrp_meta_type (string | optional) You may also specify 'csrp_meta_type' if you want to cast the meta value as a specific type.<br>		Possible values for csrp_meta_type are:'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED'	</li> 	<li>csrp_meta_compare (string | optional) default ‘IN’<br>	Possible values: 'LIKE' 'NOT LIKE' 'IN' 'NOT IN' 'BETWEEN' 'NOT BETWEEN' 'NOT EXISTS'</li> 	<p>Display post with meta_key 'post_views' and meta_value 1448:
	<?php echo custom_simple_rss_admin_href("&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=post_views&csrp_meta_value=1448"); ?></p>	<p>Display post with meta_key 'post_views' and meta_value NOT 1448:
    <?php echo custom_simple_rss_admin_href("?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=post_views&csrp_meta_value=1448&csrp_meta_compare=NOT%20IN"); ?></p>
<hr><u><h3>Filter by date:</h3></u>
<h4>Return posts between dates</h4>
	<li>csrp_date (int | required) - <b>! must be set to 1 </b>to intiate the date query</li>
	<li>csrp_date_after (string | optional) - posts after this date. optional values:</li>
		 - 'yyyy-mm-dd',<br>
		 - '1 year ago',<br>		 - '1 week ago',<br>		 - '1 day ago',<br>
	<li>csrp_date_after_type (string | optional) - get posts by publish date OR modified date default is publish date. optional values:
	</li>
		- 'date',<br>		- 'modified',<br>
	<li>csrp_date_before (string | optional) - posts before this date.  optional values:
	</li>
		- 'yyyy-mm-dd',<br>		- '1 year ago',<br>		- '1 week ago',<br>		- '1 day ago'	,<br>
	<li>csrp_date_before_type (string | optional) - get posts by publish date OR modified date - default is publish date. optional values:</li>		- 'date',<br>		- 'modified',<br>	
		<p>Return posts modified in 2014
		<?php echo custom_simple_rss_admin_href("&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=2014-01-01&csrp_date_after_type=modified&csrp_date_before=2015-01-01&csrp_date_before_type=modified"); ?></p>		<p>Return posts made over a year ago but modified in the past month
		<?php echo custom_simple_rss_admin_href("&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=1 month ago&csrp_date_after_type=modified&csrp_date_before=1 year ago&csrp_date_before_type=date"); ?></p><hr>
<u><h3>exclude post formats:</h3></u><p>enables the option to hide specific post formats.</p>	<li>csrp_exclude_post_format (string | optional) - default none, devide multiple post formats by comma</li>		Show all post formats EXCEPT link post format and quote post format		<?php echo custom_simple_rss_admin_href("&csrp_exclude_post_format=post-format-link,post-format-quote"); ?><hr>
<u><h3>show post meta in feed:</h3></u>		<p>enables the option to show all custom post fields for post. 
	quite handy if you need the rss as an xml data for external applications or export
	disabled by default.</p>	<li>csrp_show_meta (string | optional) default 0</li>	<?php echo custom_simple_rss_admin_href("&csrp_show_meta=1"); ?>
<hr>
<u><h3>show post thumbnail in feed:</h3></u>		<li>csrp_show_thumbnail (string | optional) default 1 (show)</li>	<?php echo custom_simple_rss_admin_href("&csrp_show_thumbnail=1"); ?>
<hr>
<u><h3>Set Thumbnail(featured image) Size:</h3></u>	
<h4>csrp_thumbnail_size (string | optional) Image size.</h4>
	<p>
	Set post image size:
	Accepts any valid wordpress image sizes : full / large / medium
	OR a string of width and height (in that order) values in pixels seperetad by 'x'. for example '400x300'
	</p>
	<h5>Examples:</h5>
	<p>
		Display full size
		<?php echo custom_simple_rss_admin_href('&csrp_thumbnail_size=full'); ?>
	</p>
	<p>	
		Display large size
		<?php echo custom_simple_rss_admin_href('&csrp_thumbnail_size=large'); ?>
	</p>
	<p>
		Display medium size
		<?php echo custom_simple_rss_admin_href("&csrp_thumbnail_size=medium"); ?>
	</p>
	<p>	
		Display custom size
		<?php echo custom_simple_rss_admin_href("&csrp_thumbnail_size=400x300"); ?>
	</p>
    
<hr>
<u><h3>show posts / custom post types by taxonomy:</h3></u>enables the option to show posts for as specific taxonomy.
	<li>csrp_tax_name (string | required) - the tax name/slug for example "actor"</li>	<li>csrp_tax_term_id (string | required) - the term_id to filter by</li>	<li>csrp_post_type (string | optional) - default post. for example post type "movie"</li>

		Show all posts from custom post type "movie"(post_type=movie) where taxonomy is "actor" and actors(terms) are 58 or 57		<?php echo custom_simple_rss_admin_href("&csrp_tax_name=actor&csrp_tax_term_id=58,57&csrp_post_type=movie"); ?>		Show all post from post type "post" where taxonomy is "actor" and actors(trems) are 58 or 57		<?php echo custom_simple_rss_admin_href("&csrp_tax_name=actor&csrp_tax_term_id=58,57"); ?><hr>
<u><h3>show custom tax for post:</h3></u>enables the option to show all custom tax for a specific post. puts the data under dc:isPartOf
	<li>csrp_show_post_terms (string | required) the tax name miltiple tax divided by comma</li>		Show custom taxaonmy "post_tag" and custom taxaonmy "actor" associated to post		<?php echo custom_simple_rss_admin_href("&csrp_show_post_terms=post_tag,actor"); ?>

