<div class='wrap amazonfeedadmin'>

	<h2>Amazon Feed: View Cache</h2>
	
	<ul id="tabnav">
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=dashboard">Dashboard</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=options">Options</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=message_log">Message Log</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache" class='highlighted'>View Cache</a></li>
		<li><a href="http://www.warkensoft.com/category/wordpress/amazonfeed-wordpress/" class='highlighted-external'>AmazonFeed Blog</a></li>
	</ul>
	
	<ul class='secondTabs'>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache">Cached Results</a></li>
		<li><a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache&action=clear_cache">Clear Cache Now</a></li>
	</ul>

	<table class='widefat' style='width: 600px;'>
		<tr>
			<td align="left">
			
			<p>
			Please confirm that you want to remove all <?php echo $total; ?> cached products from the database.  This will cause your
			site to begin downloading new products for all keywords, categories and/or tags that are used on your site.  It may cause your site to load
			more slowly for a while until all products have been downloaded.  <font color="#FF0000">You will also lose any product blocking that you have put into place.</font>
			</p>
			
			<p>
			
			</p>
			
			<p>
			<a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache">No, get me out of here.</a>
			</p>
			
			<p>
			<a href="<?php echo $homePath; ?>&amazonFeedAdminPage=view_cache&action=clear_cache_confirm">Yes, clear the cache now.</a>
			</p>

			</td>
		</tr>
	</table>
	
</div>