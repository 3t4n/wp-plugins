<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/
?>

<?php $geocode_count = 0; ?>

<?php if (!isset($show_count) || $show_count != false): ?>
<div class="agentstorm-crumb">
	<?php if (!empty($state) && !empty($city)): ?>
		Properties &raquo; <?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?><a href="<?php echo $this->getStatePermalink($results[0]); ?>"><?php endif; ?><?php echo (strlen($state) == 2) ? strtoupper($state) : ucwords(strtolower($state)); ?><?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?></a><?php endif; ?> <?php if (!empty($city)): ?>&raquo; <a href="<?php echo $this->getCityPermalink($results[0]); ?>"><?php echo ucwords($city); ?></a><?php endif; ?>.
	<?php endif; ?>
</div>
<?php endif; ?>

<div class="agentstorm-results">
    
	<?php if (!isset($show_map) || $show_map != false): ?>
	<div id="agentstorm-resultmap-container">
		<div id="agentstorm-resultmap"></div>
		<div id="agentstorm-resultmap-toolbar">
			<div id="agentstorm-resultmap-toolbar-right">
				<?php if (is_user_logged_in()): ?>
				<a href="<?php echo get_bloginfo('url', 'display') . '/user/saveSearch/?' . $_SERVER['QUERY_STRING']; ?>">Save this Search</a>
				<?php endif; ?>
			</div>
			<a href="#" id="agentstorm-expandmap">Expand Map Size</a>
		</div>
	</div>
	<?php else: ?>
		<?php if (is_user_logged_in()): ?>
		<a href="<?php echo get_bloginfo('url', 'display') . '/user/saveSearch/?' . $_SERVER['QUERY_STRING']; ?>">Save this Search</a>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (!isset($show_count) || $show_count != false): ?>
	<p>
		Showing <strong><?php echo ($offset + 1); ?></strong> to <strong><?php echo ($properties->Count + $offset); ?></strong> of <strong><?php echo number_format($properties->TotalCount); ?></strong> properties that matched your search criteria.
	</p>
	<?php endif; ?>
	
    <?php foreach ($results as $key => $result): ?>
		<?php
			if (!empty($result->Latitude) && !empty($result->Longitude)) {
				$geocode_count++;
			}
		?>
        <div class="agentstorm-result" <?php if ($key % 2): ?>style="background:#EFEFEF !important;"<?php endif; ?>>
            <div class="agentstorm-result-image">
				<?php if (!empty($result->Photos)): ?>
					<a href="<?php echo $this->getPropertyPermalink($result); ?>"><img src="<?php echo $result->Photos[0]->Url; ?>" width="150" /></a>
				<?php else: ?>
					<img src="/wp-content/plugins/agent-storm/static/images/nopic.jpg" width="150" height="112" alt="No Photo Available" />
				<?php endif; ?>
            </div>
            <div class="agentstorm-result-price">$<?php echo number_format($result->ListPrice); ?></div>
            <div class="agentstorm-result-moreinfo"><a href="<?php echo $this->getPropertyPermalink($result); ?>">Details</a></div>
            <?php if (AgentStormSettingCache::get('as_requestshowing_button', false)): ?><div class="agentstorm-result-moreinfo"><a href="<?php echo AgentStormSettingCache::get('as_requestshowing_link', ''); ?>">Request a Showing</a></div><?php endif; ?>
	        <?php if (!empty($result->VirtualTourURL)): ?><div class="agentstorm-result-virtualtour"><a href="<?php echo $result->VirtualTourURL; ?>" target="_blank">Virtual Tour</a></div><?php endif; ?>
            <div class="agentstorm-result-description">
                <div class="agentstorm-result-address"><a name="listing_<?php echo $result->ListingId; ?>"></a><?php echo $result->FullAddress; ?></div>
                <div class="agentstorm-result-subaddress"><a href="<?php echo $this->getCityPermalink($result); ?>"><?php echo ucwords(strtolower($result->City)); ?></a>, <?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?><a href="<?php echo $this->getStatePermalink($result); ?>"><?php endif; ?><?php echo (strlen($result->State) == 2) ? strtoupper($result->State) : ucwords(strtolower($result->State)); ?><?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?></a><?php endif; ?>. <?php echo $result->Zip; ?></div>
                <div class="agentstorm-result-list">
					<?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $result->Type . '_header')) as $item): ?>
						<?php if (!empty($item)): ?>
							<?php if (substr($item, 0, 8) == 'dynamic_'): ?>
								<div class="agentstorm-result-listitem"><label><?php echo AgentStormSettingCache::get('as_fields_' . $result->Type . '_' . $item, ucwords(preg_replace('/(.*?[a-z]{1})([A-Z]{1}.*?)/', '${1} ${2}', substr($item, 8)))); ?>:</label> <?php echo ($result->DynamicFields->{substr($item, 8)}) ? $result->DynamicFields->{substr($item, 8)} : '<span class="agentstorm-empty">&mdash;</span>'; ?></div>
							<?php else: ?>
								<div class="agentstorm-result-listitem"><label><?php echo AgentStormSettingCache::get('as_fields_' . $result->Type . '_' . $item, ucwords(preg_replace('/(.*?[a-z]{1})([A-Z]{1}.*?)/', '${1} ${2}', $item))); ?>:</label> <?php echo ($result->{$item}) ? $result->{$item} : '<span class="agentstorm-empty">&mdash;</span>'; ?></div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <?php
    	$paginator = new AgentStormPagination(array(
    		'total_rows' => $properties->TotalCount,
    		'cur_page' => $offset,
    		'per_page' => $limit,
    		'base_url' => (!array_key_exists('offset', $_GET)) ? ((strpos($_SERVER['REQUEST_URI'], '?') > 0) ? $_SERVER['REQUEST_URI'] . '&offset=' : $_SERVER['REQUEST_URI'] . '?offset=') : ((sizeof($_GET) == 1 && array_key_exists('offset', $_GET)) ? preg_replace('/[?&]offset=' . $offset . '/', '', $_SERVER['REQUEST_URI']) . '?offset=' : preg_replace('/[?&]offset=' . $offset . '/', '', $_SERVER['REQUEST_URI']) . '&offset='),
    		'num_links' => 4,
			'full_tag_open' => '<div class="agentstorm-pager">',
			'full_tag_close' => '</div>',
			'first_link' => 'First',
			'first_tag_open' => '<div class="agentstorm-pager-first">',
			'first_tag_close' => '</div>',
			'last_link' => 'Last',
			'last_tag_open' => '<div class="agentstorm-pager-last">',
			'last_tag_close' => '</div>',
			'next_link' => '&gt;',
			'next_tag_open' => '<div class="agentstorm-pager-next">',
			'next_tag_close' => '</div>',
			'prev_link' => '&lt;',
			'prev_tag_open' => '<div class="agentstorm-pager-prev">',
			'prev_tag_close' => '</div>',
			'cur_tag_open' => '<div class="agentstorm-pager-curr">',
			'cur_tag_close' => '</div>',
			'num_tag_open' => '<div class="agentstorm-pager-numb">',
			'num_tag_close' => '</div>'
    	));
    	echo $paginator->create_links();
    ?>
  
</div>

<?php if ((!isset($show_map) || $show_map != false) && $geocode_count != 0): ?>
<script>
	var map;
	var points;
	onload = function(){
		
		map = new AgentStormMap('agentstorm-resultmap', '<?php echo AgentStormSettingCache::get('as_map_provider', 'agentstorm'); ?>', false);
		map.event.addListener(map, 'mapReady', function() {
			map.setMarkerUrl('/wp-content/plugins/agent-storm/static/images/house_icon.png');
			//map.setCenter(<?php echo $result->Latitude; ?>, <?php echo $result->Longitude; ?>, 16);
			<?php foreach ($results as $result): ?>
				<?php if (!empty($result->Latitude) && !empty($result->Longitude) && ($result->Latitude != '0.0000000') && ($result->Longitude != '0.0000000')): ?>
					map.addMarker(25, 25, map.markerUrl, <?php echo $result->Latitude; ?>, <?php echo $result->Longitude; ?>, '', '<?php echo $this->getPropertyPermalink($result); ?>');
				<?php endif; ?>
			<?php endforeach; ?>
			map.zoomMarkers();
		});
		
		var mapSize = 0;
		jQuery("#agentstorm-expandmap").click(function(event) {
			var lnk = jQuery('#agentstorm-expandmap');
			var mapC = jQuery('#agentstorm-resultmap');
			if (mapSize == 0) {
				mapC[0].style.height = '450px';        
				lnk.html('Reduce Map Size');
				mapSize = 1;
			} else {
				mapC[0].style.height = '250px';
				lnk.html('Expand Map Size');
				mapSize = 0;
			}
			before_center = map.getCenter();
			map.map.updateSize()
			return false;
		});
	}
</script>
<?php else: ?>
<script>
	onload = function(){
		jQuery('#agentstorm-resultmap-container').hide();
	}
</script>
<?php endif; ?>