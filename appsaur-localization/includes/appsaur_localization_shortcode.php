<?php
		
	if ( ! defined( 'ABSPATH' ) ) exit;
		
	add_shortcode( 'al_map', 'appsaur_location_shortcode' );	

	function appsaur_location_shortcode( $atts ) {
		global $wpdb;
		$data='';
        $api=$wpdb->get_results("SELECT `option_value` FROM `".$wpdb->prefix."options` WHERE `option_name`='ALKEY' LIMIT 1");

        $api=$api[0]->option_value;

        $data.= "<script async defer src='https://maps.googleapis.com/maps/api/js?key=".$api."&callback=alMap'></script>";

		$map=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."al_maps` WHERE `id`='".$atts['id']."' ");

		$data.= "
			<script>
				var map;
				function alMap() {
					var address = '".$map[0]->center."';
					var geocoder = new google.maps.Geocoder();
					geocoder.geocode( { 'address': address}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							var latitude = results[0].geometry.location.lat();
							var longitude = results[0].geometry.location.lng();
							map = new google.maps.Map(document.getElementById('map-".$map[0]->id."'), {
								center: {lat: latitude, lng:longitude},
								zoom: ".$map[0]->zoom."
							});";
							$results=$wpdb->get_results("SELECT * FROM `".$wpdb->prefix."al_locations` WHERE `parent`='".$map[0]->id."'");
							foreach($results as $result){
								$link='';$name='';$description='';$url='';
								$link='';
								if($result->link!=''){
									$link="  href=http://".$result->link." target=_blank";
								}
								if($result->name!=''){
									$name="<div style=max-width:250px;><b>".$result->name."</b></div>";
								}
								if($result->desc!=''){
									$description="<div style=max-width:250px;>".$result->desc."</div>";
								}
								if($result->link!=''){
									$url="<div style=max-width:250px;><b>Url: </b><a".$link.">".$result->link."</a></div>";
								}
								$data.="
								var contentString".$result->id." = '".$name.$description.$url."';
								var infowindow".$result->id." = new google.maps.InfoWindow({
									content: contentString".$result->id."
								});
								var marker".$result->id." = new google.maps.Marker({
									position: {lat: ".$result->lat.", lng:".$result->lng."},
									map: map,
									title: '".$result->name."'
								});
								marker".$result->id.".addListener('click', function() {
									infowindow".$result->id.".open(map, marker".$result->id.");
								});
								";
							}
							$data .= "
						} else{
							alert('Nie ma takiego miejsca na świecie :) ...');
						}
					}); 
					
				}

			
			</script>
			
			<div id='map-".$map[0]->id."' style='height:".$map[0]->height."px;width:100%;'></div>

		";	
		return $data;
	}



