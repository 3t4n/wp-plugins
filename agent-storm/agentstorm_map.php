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


    <div style="width:<?php echo (isset($width) && !empty($width)) ? $width : AgentStormSettingCache::get('as_map_width', '100%'); ?>;">
        <div id="agentstorm_map" style="height:<?php echo (isset($height) && !empty($height)) ? $height : AgentStormSettingCache::get("as_map_height", "350px"); ?>; width:<?php echo AgentStormSettingCache::get('as_map_width', '100%'); ?>;"></div>
    </div>

<script>
    var map;
    onload = function(){
        
        map = new AgentStormMap('agentstorm_map', '<?php echo AgentStormSettingCache::get('as_map_provider', 'agentstorm'); ?>', false);
        map.event.addListener(map, 'mapReady', function() {
            map.setMarkerProxyUrl('<?php bloginfo('wpurl') ?>/wp-content/plugins/agent-storm/agentstorm_result_proxy.php');
            map.setMarkerUrl('<?php (isset($icon) && !empty($icon)) ? $icon : bloginfo('wpurl').'/wp-content/plugins/agent-storm/static/images/house_icon.png'; ?>');
                map.setCenter(<?php echo (isset($lat) && !empty($lat)) ? $lat : AgentStormSettingCache::get('as_map_lat', '38'); ?>, <?php echo (isset($lng) && !empty($lng)) ? $lng : AgentStormSettingCache::get('as_map_lng', '-97'); ?>, <?php echo (isset($zoom) && !empty($zoom)) ? $zoom : AgentStormSettingCache::get('as_map_zoom', '4'); ?>);
            map.event.addListener(map, 'zoomEnd', map.updateMarkers, map);
            map.event.addListener(map, 'moveEnd', map.updateMarkers, map);
            map.updateMarkers();
        });
        
    }
</script>
