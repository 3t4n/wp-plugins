<?php
//Functions
function arastoo_gmap_create_main() {

	$arastoo_gmap_content = get_option('arastoo_gmap_content');
	$arastoo_gmap_api = get_option('arastoo_gmap_api');
	$arastoo_gmap_lat = get_option('arastoo_gmap_lat');
	$arastoo_gmap_long = get_option('arastoo_gmap_long');
	$arastoo_gmap_icon = get_option('arastoo_gmap_icon');
	//$arastoo_gmap_height = get_option('arastoo_gmap_height');
	
}

function arastoo_gmap_group_settings() {
 
	register_setting('arastoo_gmap_options_group', 'arastoo_gmap_content');
	register_setting('arastoo_gmap_options_group', 'arastoo_gmap_api');
	register_setting('arastoo_gmap_options_group', 'arastoo_gmap_lat');
	register_setting('arastoo_gmap_options_group', 'arastoo_gmap_long');
	//register_setting('arastoo_gmap_options_group', 'arastoo_gmap_height');
	register_setting('arastoo_gmap_options_group', 'arastoo_gmap_icon', 'arastoo_gmap_icon_upload');
 
}

function arastoo_gmap_options() {
 
	add_options_page(
		'Arastoo GMap', // page <title>Title</title>
		'Arastoo GMap', // menu link text
		'manage_options', // capability to access the page
		'gmap-markers', // page URL slug
		'arastoo_gmap_options_content', // callback function with content
		2 // priority
	);
 
}

function arastoo_gmap_options_content() { ?>
 <style scoped>
 h3 { margin-top:30px; }
 .wrap { background: #FFFFFF; padding: 20px; }
 table {  }
 .form-table th {  width:100px; }
 .form-table input { padding: 5px; border-radius:0;}
 button {     height: 40px;
    background: #ff92006e;
    border: 0;
    padding: 0 40px;
    color: #616161;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 2px; 
	cursor: pointer;
 }
 textarea { height: 250px; width:80%; }
 .map-center { margin:10px 0; }
 .map-center span { display: inline-block; width: 80px; }
 .wp-admin input[type=file] { border: solid 1px #CCC; padding: 10px; }
 </style>
<div class="wrap">
        <h2>Arastoo Multiple Gmap Marker</h2>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields('arastoo_gmap_options_group'); ?>
			<h3>Google Map API</h3>
			<input type = "text" class="regular-text" id="arastoo_gmap_api_id" name="arastoo_gmap_api" value="<?php echo get_option('arastoo_gmap_api'); ?>">
			<!--<h3>Map Height</h3>
			<input type = "text" class="regular-text" id="arastoo_gmap_height_id" name="arastoo_gmap_height" value="<?php echo get_option('arastoo_gmap_height'); ?>">
			-->
			<h3>Map Center</h3>
			<em>If you leave blank, default value will be used. lat: 39.172665, lng: -96.585382</em>
			<div class="map-center"><strong><span>Latitude:</span></strong> <input type ="text" class="regular-text" id="arastoo_gmap_lat_id" name="arastoo_gmap_lat" value="<?php echo get_option('arastoo_gmap_lat'); ?>"></div>
			<div class="map-center"><strong><span>Longitude:</span></strong> <input type ="text" class="regular-text" id="arastoo_gmap_long_id" name="arastoo_gmap_long" value="<?php echo get_option('arastoo_gmap_long'); ?>"></div>
			<h3 for="arastoo_gmap_content_id">Add your markers here:</h3>
			<div>
			<textarea class="gmap-markers" id="arastoo_gmap_content_id" name="arastoo_gmap_content" value=""><?php echo get_option('arastoo_gmap_content'); ?> </textarea>
			</div>
			<div class="marker-example">
			<p>Below is an  example data for the markers consisting of a name, a LatLng and a zIndex for the order in which these markers should display on top of each other.</p>
			<p>["Edison, NJ", 40.494921,-74.3703325 , 8]</p>
			<h4>Multiple Markers Example</h4>
			["Edison, NJ", 40.494921,-74.3703325 , 8],<br />
			["Chino, CA #1", 33.9976897,-117.7142156 , 2],<br />
			["Chino, CA #2", 33.9990648,-117.7142208 , 3],<br />
			["Ontario, CA Suite A", 34.0464378,-117.6224556 , 4]
			</div>
			<h3>Custom Marker Icon</h3>
			<input type = "file" id="arastoo_gmap_icon_id" name="arastoo_gmap_icon" accept="png/jpg" > <img src="<?php echo get_option('arastoo_gmap_icon'); ?>" />
			<div></div>
        <?php submit_button(); ?>
    </form>
    </div>
<?php }  
function arastoo_gmap_icon_upload($option)
{
  if(!empty($_FILES["arastoo_gmap_icon"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["arastoo_gmap_icon"], array('test_form' => FALSE));
    $temp = $urls["url"];
    return $temp;  
  }
 
  return $option;
}

?>