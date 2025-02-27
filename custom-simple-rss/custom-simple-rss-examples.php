<hr><u><h2>Examples</h2></u>
	<h3>see full specs and options above 
	<hr>
	<p>
		<h3>call a simple rss with defaults:</h3>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1
		</a>			
		<ul>
		<li>post type: post</li>
		<li>post status: publish</li>
		<li>posts per page: 20</li>
		</ul>
	</p>
	<hr>
	<p>
		<h3>call 5 items only. order by name descending from category 5</h3>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_orderby=name&csrp_order=DESC&csrp_cat=5" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_orderby=name&csrp_order=DESC
		</a>			
		<ul>
		<li>post type: post</li>
		<li>post status: publish</li>
		<li>posts per page: 5</li>
		<li>category: 5 </li>
		<li>order by: name</li>
		<li>order: descending</li>
		</ul>
	</p>
	<hr>
	<p>
		<h3>Return posts by meta key</h3>
		<h4>Display post with meta_key '_thumbnail_id' and meta_value 1448:</h4>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=_thumbnail_id&csrp_meta_value=1448" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=_thumbnail_id&csrp_meta_value=1448
		</a>
		<h4>Display post with meta_key '_thumbnail_id' and meta_value NOT 1448:</h4>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=_thumbnail_id&csrp_meta_value=1448&csrp_meta_compare=NOT%20IN" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_show_meta=1&csrp_meta_key=_thumbnail_id&csrp_meta_value=1448&csrp_meta_compare=NOT%20IN
		</a><br>			
		**** see Parameters tab for full specs ****
	</p>
	<hr>
	<p>			<h3>Set post image size</h3>				<h4>show full size</h4>		<?php $ex = site_url().'?call_custom_simple_rss=1&csrp_thumbnail_size=full'; ?>		<a href="<?php echo $ex ?>" target="_blank"><?php echo $ex ?></a><br>									<h4>show medium size</h4>		<?php $ex = site_url().'?call_custom_simple_rss=1&csrp_thumbnail_size=medium'; ?>		<a href="<?php echo $ex ?>" target="_blank"><?php echo $ex ?></a><br>			<h4>show custom size</h4>		<?php $ex = site_url().'?call_custom_simple_rss=1&csrp_thumbnail_size=400x300'; ?>		<a href="<?php echo $ex ?>" target="_blank"><?php echo $ex ?></a><br>			</p>		<hr>	<p>				
		<h3>Return posts between dates</h3>
		<h4>Return posts modified in 2014:</h4>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=2014-01-01&csrp_date_after_type=modified&csrp_date_before=2015-01-01&csrp_date_before_type=modified" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=2014-01-01&csrp_date_after_type=modified&csrp_date_before=2015-01-01&csrp_date_before_type=modified
		</a><br>
		<h4>Return posts made over a year ago but modified in the past month:</h4>
		<a href="<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=1 month ago&csrp_date_after_type=modified&csrp_date_before=1 year ago&csrp_date_before_type=date" target="_blank">
		<?php echo site_url() ?>?call_custom_simple_rss=1&csrp_posts_per_page=5&csrp_date=1&csrp_date_after=1 month ago&csrp_date_after_type=modified&csrp_date_before=1 year ago&csrp_date_before_type=date
		</a><br>					
		***** see Parameters tab for full specs	****					
	</p>
	