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
	<style>
		#AgentStorm_StatusBar {
			display: none;
		}
	</style>
	
    <div class="agentstorm-crumb">
        Properties &raquo; <?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?><a href="<?php echo $this->getStatePermalink($result); ?>"><?php endif; ?><?php echo (!empty($result->State)) ? ((strlen($result->State) == 2) ? strtoupper($result->State) : ucwords(strtolower($result->State))) : ucwords($state); ?><?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?></a><?php endif; ?> <?php if (!empty($result->City) || !empty($city)): ?>&raquo; <a href="<?php echo $this->getCityPermalink($result); ?>"><?php echo (!empty($result->City)) ? ucwords(strtolower($result->City)) : ucwords(strtolower($city)); ?></a><?php endif; ?>
    </div>
	
	<?php if (AgentStormSettingCache::get('as_page_title', true)): ?>
	<div class="agentstorm-result-address"><h2><?php echo $result->FullAddress; ?>, <a href="<?php echo $this->getCityPermalink($result); ?>"><?php echo ucwords(strtolower($result->City)); ?></a>, <?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?><a href="<?php echo $this->getStatePermalink($result); ?>"><?php endif; ?><?php echo (strlen($result->State) == 2) ? strtoupper($result->State) : ucwords(strtolower($result->State)); ?><?php if (AgentStormSettingCache::get('as_idx_linkstate', true)): ?></a><?php endif; ?>. <?php echo $result->Zip; ?></h2></div>
	<?php endif; ?>
	
	<?php dynamic_sidebar('Agent Storm Above Listing'); ?>
	
	<div class="agentstorm-column-right">
		<div class="agentstorm-column-right-padding">
			
			<div class="clear"></div>
			
			<div id="photoScroller" style="overflow:hidden;">
				<?php $curphoto = 0; ?>
				<?php foreach ($result->Photos as $key => $photo): ?>
					<?php if ($curphoto == 0): ?>
						<a href="<?php echo $photo->Url; ?>" class="thickbox" id="primaryImage"><img src="<?php echo $photo->Url; ?>" width="305" /></a>
					<?php else: ?>
						<?php if (($key-1) !== 0 && !(($key-1) % 4)): ?><div class="clear"></div><?php endif; ?>
						<?php if ($key <= 8): ?>
							<a href="#" class="imageHover"><img src="<?php echo $photo->Url; ?>" width="70" data-url="<?php echo $photo->Url; ?>" /></a>
						<?php else: ?>
							<a href="#" class="imageHover" style="display:none;"><img src="" width="70" data-url="<?php echo $photo->Url; ?>" /></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php $curphoto++; ?>
				<?php endforeach; ?>
			</div>
			
			<?php if (sizeof($result->Photos) > 9): ?>
			<div>
				<center><a href="#" id="photoShowAll">Show All</a></center>
			</div>
			<?php endif; ?>
			
			<div class="clear"></div>
			
			<p>
				<center><?php if (!empty($result->VirtualTourURL)): ?><a href="<?php echo $result->VirtualTourURL; ?>" target="_blank" class="small">View Virtual Tour of Property</a><?php endif; ?></center>
			</p>
			
			<div class="clear"></div>
			
			<?php if (AgentStormSettingCache::get('as_idx_agent_name', '') != ''): ?>
			<div class="agentstorm-agentinfo">
				<div class="agentstorm-agentinfo-title">For more information:</div>
				<?php if (AgentStormSettingCache::get('as_idx_agent_name', '') != ''): ?><div class="agentstorm-agentinfo-name"><?php echo AgentStormSettingCache::get('as_idx_agent_name', ''); ?></div><?php endif; ?>
				<?php if (AgentStormSettingCache::get('as_idx_agent_phone', '') != ''): ?><div class="agentstorm-agentinfo-phone"><?php echo AgentStormSettingCache::get('as_idx_agent_phone', ''); ?></div><?php endif; ?>
				<?php
					$link = 'mailto:' . AgentStormSettingCache::get('as_idx_agent_email', '');
					$obfuscatedLink = "";
					for ($i=0; $i<strlen($link); $i++){
						$obfuscatedLink .= "&#" . ord($link[$i]) . ";";
					}
				?>
				<?php if (AgentStormSettingCache::get('as_idx_agent_email', '') != ''): ?><div class="agentstorm-agentinfo-email"><a href="<?php echo $obfuscatedLink; ?>">E-mail the agent</a></div><?php endif; ?>
				<?php if (AgentStormSettingCache::get('as_idx_agent_extra', '') != ''): ?><div class="agentstorm-agentinfo-extra"><?php echo nl2br(AgentStormSettingCache::get('as_idx_agent_extra', '')); ?></div><?php endif; ?>
			</div>
			<?php endif; ?>
			
		</div>
		
	</div>
	
	<div class="agentstorm-result-description" style="overflow:hidden;">
		<div class="agentstorm-result-box header"><div class="agentstorm-result-box-content"><span class="supersize">$<?php echo number_format($result->ListPrice); ?></span></div></div>
	</div>
	<div class="agentstorm-columns">
		<div class="agentstorm-col25" >
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 1px 0 0;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><span class="supersize"><?php echo ($result->Bedrooms) ? $result->Bedrooms : '&mdash;'; ?></span><br /><span class="small">Beds</span></div></div>
			</div>
		</div>
		<div class="agentstorm-col25">
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 1px;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><span class="supersize"><?php echo ($result->FullBathrooms) ? $result->FullBathrooms : '&mdash;'; ?></span><br /><span class="small">Baths</span></div></div>
			</div>
		</div>
		<div class="agentstorm-col25">
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 1px;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><span class="supersize"><?php echo ($result->SqFt) ? $result->SqFt : '&mdash;'; ?></span><br /><span class="small">SqFt</span></div></div>
			</div>
		</div>
		<div class="agentstorm-col25">
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 0 0 1px;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><span class="supersize"><?php echo ($result->LotSqFt) ? round($result->LotSqFt * 0.0000229568411, 2) : '&mdash;'; ?></span><br /><span class="small">Acres</span></div></div>
			</div>
		</div>
	</div>
	<div class="agentstorm-result-description" style="overflow:hidden;">
		<div class="agentstorm-result-list">
			<table cellpadding="0" cellspacing="0" class="agentstorm-table">
			<?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $result->Type . '_property')) as $key => $item): ?>
				<tr class="agentstorm-<?php echo ( $key % 2 ? 'even' : 'odd' ); ?>">
				<?php if (!empty($item)): ?>
					<?php if (substr($item, 0, 8) == 'dynamic_'): ?>
						<td width="50%"><label><?php echo AgentStormSettingCache::get('as_fields_' . $result->Type . '_' . $item, ucwords(preg_replace('/(.*?[a-z]{1})([A-Z]{1}.*?)/', '${1} ${2}', substr($item, 8)))); ?>:</td><td><?php echo ($result->{$item}) ? $result->{$item} : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
					<?php else: ?>
						<td width="50%"><?php echo AgentStormSettingCache::get('as_fields_' . $result->Type . '_' . $item, ucwords(preg_replace('/(.*?[a-z]{1})([A-Z]{1}.*?)/', '${1} ${2}', $item))); ?>:</td><td><?php echo ($result->{$item}) ? $result->{$item} : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
					<?php endif; ?>
				<?php endif; ?>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		
		<?php if (isset($walkscore) && $walkscore->status == 1): ?>
		<div class="agentstorm-walkscore">
			<div class="agentstorm-walkscore-listitem"><label><a rel="nofollow" href="<?php echo $walkscore->ws_link; ?>"><img src="<?php echo $walkscore->logo_url; ?>" /></a></label> <span style="font-size: 120%;"><strong><?php echo $walkscore->walkscore; ?></strong></span> <a rel="nofollow" href="<?php echo $walkscore->more_info_link; ?>"><img src="<?php echo $walkscore->more_info_icon; ?>" /></a></div>
		</div>
		<?php endif; ?>
		
	</div>
	
	<div class="agentstorm-columns">
		<div class="agentstorm-col33" >
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 1px 0 0;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><a href="<?php echo get_bloginfo('url', 'display') . '/user/saveProperty/?ListingId=' . $result->ListingId . '&FullAddress=' . urlencode($result->FullAddress); ?>"><span class="small">Save Property</span></a></div></div>
			</div>
		</div>
		<div class="agentstorm-col34" >
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 1px;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><a href="<?php echo AgentStormSettingCache::get('as_requestshowing_link'); ?>"><span class="small">Contact Agent</span></a></div></div>
			</div>
		</div>
		<div class="agentstorm-col33" >
			<div class="agentstorm-result-description" style="overflow:hidden; margin: 0 0 0 1px;">
				<div class="agentstorm-result-box"><div class="agentstorm-result-box-content"><a href="#"><span class="small">Share Property</span></a></div></div>
			</div>
		</div>
	</div>
	
	<div class="agentstorm-result-description">
		<p><?php echo (!empty($result->Remarks)) ? $result->Remarks : ''; ?></p>
	</div>
	
	<div class="clear"></div>
	
	<div class="agentstorm-result-description">
		<?php if (AgentStormSettingCache::get('as_idx_schools', false) == "1"): ?>
		<table cellpadding="0" cellspacing="0" class="agentstorm-table">
			<tr class="agentstorm-odd">
				<th class="agentstorm-cell" colspan="2">Schools</th>
			</tr>
			<tr class="agentstorm-even">
				<td class="agentstorm-cell" style="width:200px;">School District</td>
				<td class="agentstorm-cell"><?php echo ($result->SchoolDistrict) ? $result->SchoolDistrict : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-odd">
				<td class="agentstorm-cell">Elementary School</td>
				<td class="agentstorm-cell"><?php echo ($result->ElementarySchool) ? $result->ElementarySchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-even">
				<td class="agentstorm-cell">Middle/Junior School</td>
				<td class="agentstorm-cell"><?php echo ($result->MiddleOrJuniorSchool) ? $result->MiddleOrJuniorSchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-odd">
				<td class="agentstorm-cell">High School</td>
				<td class="agentstorm-cell"><?php echo ($result->HighSchool) ? $result->HighSchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
		</table>
		<?php endif; ?>
		
		<?php if (AgentStormSettingCache::get('as_metadata_' . $result->Type . '_features', '') != ''): ?>
		<table cellpadding="0" cellspacing="0" class="agentstorm-table">
			<tr class="agentstorm-odd">
				<th class="agentstorm-cell" colspan="2">Features</th>
			</tr>
			<?php foreach (explode(',', AgentStormSettingCache::get('as_metadata_' . $result->Type . '_features')) as $key => $item): ?>
				<?php if (!empty($item)): ?>
					<tr class="agentstorm-<?php echo ( $key % 2 ? 'even' : 'odd' ); ?>">
						<td class="agentstorm-cell" style="width:200px;"><?php echo ucwords(preg_replace('/(.*?[a-z]{1})([A-Z]{1}.*?)/', '${1} ${2}', $item)); ?></td>
						<td class="agentstorm-cell"><?php echo ($result->{$item}) ? $result->{$item} : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
		
		<?php if (AgentStormSettingCache::get('as_idx_schools', false) == "2"): ?>
		<table cellpadding="0" cellspacing="0" class="agentstorm-table">
			<tr class="agentstorm-odd">
				<th class="agentstorm-cell" colspan="2">Schools</th>
			</tr>
			<tr class="agentstorm-even">
				<td class="agentstorm-cell" style="width:200px;">School District</td>
				<td class="agentstorm-cell"><?php echo ($result->SchoolDistrict) ? $result->SchoolDistrict : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-odd">
				<td class="agentstorm-cell">Elementary School</td>
				<td class="agentstorm-cell"><?php echo ($result->ElementarySchool) ? $result->ElementarySchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-even">
				<td class="agentstorm-cell">Middle/Junior School</td>
				<td class="agentstorm-cell"><?php echo ($result->MiddleOrJuniorSchool) ? $result->MiddleOrJuniorSchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
			<tr class="agentstorm-odd">
				<td class="agentstorm-cell">High School</td>
				<td class="agentstorm-cell"><?php echo ($result->HighSchool) ? $result->HighSchool : '<span class="agentstorm-empty">&mdash;</span>'; ?></td>
			</tr>
		</table>
		<?php endif; ?>
		
		<div class="agentstorm-copyright">
			<div class="agentstorm-br-logo"><img src="<?php echo bloginfo('url'); ?>/wp-content/plugins/agent-storm/static/images/broker_reciprocity.gif" align="left" style="margin:0!important;" /></div>
			<p class="first">
				Listing Provided by <?php echo (!empty($result->AgentName)) ? ucwords(strtolower($result->AgentName)) : ucwords(strtolower($result->AgentFirstName)) . ' ' . ucwords(strtolower($result->AgentLastName)); ?>, <?php echo ucwords(strtolower($result->AgentCompany)); ?>. 
				The data relating to real estate for sale on this web site comes in part from the Broker Reciprocity Program. The information
				being provided is for consumers' personal, non-commercial use and may not be used for any other purpose other than to identify
				prospective properties consumers may be interested in purchasing. Information deemed reliable but not guaranteed.
				</p>
			</div>
			
			<?php if ($result->Latitude && AgentStormSettingCache::get('as_idx_gmap')): ?>
				<div class="agentstorm-map">
					<h4>Map View</h4>
				<div id="agentstorm-map" style="width:100%; height:400px;"></div>
			</div>
		<?php elseif (AgentStormSettingCache::get('as_idx_gmap')): ?>
			<div class="agentstorm-map">
				<h4>Map View</h4>
				Map is unavailable for this property
			</div>
		<?php endif; ?>
		
		<?php if ($result->Latitude && AgentStormSettingCache::get('as_idx_bview')): ?>
			<div class="agentstorm-map">
				<h4>Birds Eye View</h4>
				<div id="agentstorm_bev"></div>
			</div>
		<?php elseif (AgentStormSettingCache::get('as_idx_bview')): ?>
			<div class="agentstorm-map">
				<h4>Birds Eye View</h4>
				Birds Eye View is unavailable for this property
			</div>
		<?php endif; ?>
		
	</div>
	
	<?php dynamic_sidebar('Agent Storm Below Listing'); ?>
    
	<img src="<?php echo $result->TrackingUrl; ?>" width="1" height="1" />
    
	<script type="text/javascript">
		
		jQuery(function() {
			jQuery('.imageHover').click(function(e) {
				e.preventDefault();
				$this = jQuery(this);
				jQuery('#primaryImage').attr('href', jQuery('IMG', $this).attr('src'));
				jQuery('#primaryImage IMG').attr('src', jQuery('IMG', $this).attr('src'));
			});
		});
		
		jQuery('#photoShowAll').click(function(e) {
			e.preventDefault();
			jQuery('.imageHover').show();
			jQuery('.imageHover IMG').each(function(i, v) {
				$v = jQuery(v);
				$v.attr('src', $v.attr('data-url'));
			});
			jQuery(this).hide();
		});
		
	</script>
    
    <?php if ($result->Latitude && (AgentStormSettingCache::get('as_idx_gmap') || AgentStormSettingCache::get('as_idx_bview'))): ?>
        <script>
			jQuery(function() {
				jQuery().undercover({
					number_of_pixels_below_fold:	200,
					execute:	function()
					{
					    <?php if ($result->Latitude && AgentStormSettingCache::get('as_idx_gmap')): ?>
							map = new AgentStormMap('agentstorm-map', '<?php echo AgentStormSettingCache::get('as_map_provider', 'agentstorm'); ?>', false);
							map.event.addListener(map, 'mapReady', function() {
								map.setMarkerUrl('/wp-content/plugins/agent-storm/static/images/house_icon.png');
								map.setCenter(<?php echo $result->Latitude; ?>, <?php echo $result->Longitude; ?>, 13);
								map.addMarker(25, 25, map.markerUrl, <?php echo $result->Latitude; ?>, <?php echo $result->Longitude; ?>, '#');
							});
					    <?php endif; ?>
					    <?php if ($result->Latitude && AgentStormSettingCache::get('as_idx_bview')): ?>
							jQuery('#agentstorm_bev').append('<iframe width="100%" height="400" frameborder="0" scrolling="no" src="http://dev.virtualearth.net/embeddedMap/v1/ajax/Birdseye?center=<?php echo $result->Latitude; ?>_<?php echo $result->Longitude; ?>&amp;pushpins=<?php echo $result->Latitude; ?>_<?php echo $result->Longitude; ?>" marginwidth="0" marginheight="0"></iframe>');
					    <?php endif; ?>
					}
				});
			});
		</script>
    <?php endif; ?>
    