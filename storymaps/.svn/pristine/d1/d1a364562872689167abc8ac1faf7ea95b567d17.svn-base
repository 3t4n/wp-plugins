<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php if(empty($gigapixel_storymaps)) { ?>
<p>You need to create a Gigapixel Storymap.</p>
<?php } else { ?>
<select name="gigapixel_storymap_id" id="gigapixel-storymap" onchange="changeZoomifyImage(jQuery(this).val());">
	<?php 
	echo '<option>Select One</option>';
	foreach($gigapixel_storymaps as $storymap) {
		$selected = '';
		if($storymap->ID == $gigapixel_storymap_id ) {
			$selected = 'selected="selected"';
		}
		echo '<option value="'.$storymap->ID.'" '.$selected .'>'.$storymap->post_title.'</option>';
	}
	?>
</select>
<?php } ?>
<br/>
<br/>
<input type="hidden" id="gigapixel_storymap_longitude" name="gigapixel_storymap_longitude" value="<?php echo $longitude; ?>" />
<input type="hidden" id="gigapixel_storymap_latitude" name="gigapixel_storymap_latitude" value="<?php echo $latitude; ?>" />
<input type="hidden" id="gigapixel_storymap_zoom" name="gigapixel_storymap_zoom" value="<?php echo $zoom; ?>" />

<div id="gigapixel-location-map" style="width:100%;height:500px;padding:0;margin:0;"></div>

<script type="text/javascript">

//init
var map = L.map('gigapixel-location-map').setView(new L.LatLng(0,0), 0);
<?php if($storymap_url != false) { ?>
L.tileLayer.zoomify('<?php echo $storymap_url; ?>', { 
    width: 8000, 
    height: 5330,
    tolerance: 0.8,
}).addTo(map);
<?php } ?>

//popup
var popup = L.popup();
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Location & Zoom Lvl: " + map.getZoom())
        .openOn(map);

    jQuery('#gigapixel_storymap_latitude').val(e.latlng.lat);
    jQuery('#gigapixel_storymap_longitude').val(e.latlng.lng);
    jQuery('#gigapixel_storymap_zoom').val(map.getZoom());
}
map.on('click', onMapClick);

<?php if($storymap_url != false && $latitude != '' && $longitude != '' && $zoom != '') { ?>
var	presetMarker = L.latLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
map.setZoom(<?php echo $zoom; ?>)
popup
    .setLatLng(presetMarker)
    .setContent("Location & Zoom Lvl: " + map.getZoom())
    .openOn(map);
    
<?php } ?>

//change
var changeZoomifyImage = function(gigapixel_storymap_id) {
	L.tileLayer.zoomify(gigapixel_storymaps_object[gigapixel_storymap_id].url, {
		reset: true, 
	    width: gigapixel_storymaps_object[gigapixel_storymap_id].map_width, 
	    height: gigapixel_storymaps_object[gigapixel_storymap_id].map_height,
	    tolerance: 0.8,
	}).addTo(map);
}

<?php if($gigapixel_storymaps_object) {
echo 'var gigapixel_storymaps_object = '.$gigapixel_storymaps_object;
} ?>
</script>