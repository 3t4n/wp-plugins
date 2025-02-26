<?php
	global $networks;
	require_once('js/main_js.php');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="wrap">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2><?php _e('Awesome Ads Settings', 'awesome_ads'); ?></h2>
	<div class="tablenav">
		<div class="alignleft actions">
			<?php _e('Filter by', 'awesome_ads'); ?>: 
				<a href="#" id="filter_enabled"><?php _e('Enabled', 'awesome_ads'); ?></a> | 
				<a href="#" id="filter_disabled"><?php _e('Disabled', 'awesome_ads'); ?></a> | 
				<a href="" id="filter_all"><?php _e('All', 'awesome_ads'); ?></a>
		</div>
		<div class="clear"></div>
	</div>
	<table class="widefat post fixed" cellspacing=0>
		<thead>
			<tr>
				<th class="manage-column"><?php _e('Network', 'awesome_ads'); ?></th>
				<th class="manage-column"><?php _e('Status', 'awesome_ads'); ?></th>
				<th class="manage-column"><?php _e('Last Edit', 'awesome_ads'); ?></th>
			</tr>
			<?php
			foreach($networks as $k=>$v){
				$status = __('Disabled', 'awesome_ads');
				if($v->active=='on')
					$status = __('Enabled', 'awesome_ads');
				echo "<tr class=''>
						<td>
							<strong><a href='/wp-admin/admin.php?page=".$v->slug."' class='row-title'>".$v->name."</a></strong>
							<div class='row-actions'>
								<span class='edit'><a href='/wp-admin/admin.php?page=".$v->slug."'>".__('Edit', 'awesome_ads')."</a></span>
							</div>
						</td>
						<td>$status</td>
						<td>".$v->last_edit."</td>
					</tr>";
			}
			?>
		</thead>
		<tfoot>
			<tr>
				<th class="manage-column"><?php _e('Network', 'awesome_ads'); ?></th>
				<th class="manage-column"><?php _e('Active', 'awesome_ads'); ?></th>
				<th class="manage-column"><?php _e('Last Edit', 'awesome_ads'); ?></th>
			</tr>
		</tfoot>
	</table>
	<br />
	<div class="fb-like" data-href="http://wordpress.org/extend/plugins/awesome-ads/" data-send="true" data-width="450" data-show-faces="true"></div>
</div>