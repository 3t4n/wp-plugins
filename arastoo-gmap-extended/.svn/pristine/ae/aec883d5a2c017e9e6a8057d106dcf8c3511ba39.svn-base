<?php 
 //$marker = array(
 //			array("Edison, NJ",40.494921,-74.3703325, 8 ),
 //			array("Chino, CA #1",33.9976897,-117.7142156, 2 )
 //			);
 //$markers = json_encode($marker);
 $arastoonewmarkers = get_option('arastoo_gmap_content');

?>
<script>
      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4.7,
          center: { <?php if (empty(get_option('arastoo_gmap_lat'))) { echo 'lat: 39.172665,'; } else { echo 'lat: ' . get_option('arastoo_gmap_lat') . ','; } ?> <?php if (empty(get_option('arastoo_gmap_long'))) { echo 'lng: -96.585382'; } else { echo 'lng: ' . get_option('arastoo_gmap_long'); 	} ?> },
        });
        setMarkers(map);
      }
      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
	  const beaches = <?php echo '['.$arastoonewmarkers . '];' ;?>
      /**const beaches = [
        ["Edison, NJ", 40.494921,-74.3703325 , 8],
		["Chino, CA #1", 33.9976897,-117.7142156 , 2],
		["Chino, CA #2", 33.9990648,-117.7142208 , 3],
		["Ontario, CA Suite A", 34.0464378,-117.6224556 , 4],
		["Ontario, CA Suite B", 34.0464378,-117.6224556 , 5],
		["Fontana, CA Unit #1", 34.1022512,-117.4705653 , 6],
		["Executive East Coast Office", 40.5650068,-74.3310129 , 7],
		["Executive West Coast Office", 34.0355995,-118.4445109 , 1],
      ]; **/

      function setMarkers(map) {
        // Adds markers to the map.
        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.
        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        const image = {
          url:
		    <?php if (empty(get_option('arastoo_gmap_icon'))) { 
			echo "'" . plugin_dir_url( __FILE__ ) . "default-map-logo-marker-xsmall.png" . "'"; }
			else {
				echo "'".get_option('arastoo_gmap_icon')."'";
			} ?>,
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(50, 25),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32),
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        const shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: "poly",
        };

        for (let i = 0; i < beaches.length; i++) {
          const beach = beaches[i];
          new google.maps.Marker({
            position: { lat: beach[1], lng: beach[2] },


            map,
            icon: image,
            shape: shape,
            title: beach[0],
            zIndex: beach[3],
          });
        }
      }
	  </script>