var markerCluster;
var mgm_multilocation_map_plugin_dir = jQuery(".mgm_multilocation-google-map-plugin-dir").attr("id");

if (typeof(multilocation_google_map_api_key) != "undefined") {
    var multilocation_map_script = document.createElement("script");
    multilocation_map_script.type = "text/javascript";
    multilocation_map_script.src = "http://maps.google.com/maps/api/js?key=" + multilocation_google_map_api_key + "&callback=mgm_multilocation_map_init";
    jQuery("body").append(multilocation_map_script);
}

function mgm_multilocation_map_init() {
    if(typeof(mgm_multilocation_map_options) != "undefined")  {
        Gmap = jQuery('.mgm_multilocation_google_map');
        Gmap.each(function () {
            var $this = jQuery(this),
                zoom =  mgm_multilocation_map_options.mgm_map_zoom_data,
                scrollwheel =  mgm_multilocation_map_options.mgm_map_scrollwheel_data,
                zoomcontrol =  mgm_multilocation_map_options.mgm_map_zoomcontrol_data,
                draggable =  mgm_multilocation_map_options.mgm_map_draggable_data,
                mapType =  mgm_multilocation_map_options.mgm_map_type_data,
                title = '',
                dataLat =  mgm_multilocation_map_options.mgm_map_lat_data,
                dataLng =  mgm_multilocation_map_options.mgm_map_lng_data,
                dataHue = '',
                dataTitle = 'Envato';

            if (dataTitle !== undefined && dataTitle !== false) {
                title = dataTitle;
            }
            if (navigator.userAgent.match(/iPad|iPhone|Android/i)) {
                draggable = false;
            }

            var mgm_map_options = {
                zoom: zoom,
                scrollwheel: scrollwheel,
                zoomControl: zoomcontrol,
                draggable: draggable,
                center: new google.maps.LatLng(dataLat, dataLng),
                mapTypeId: mapType
            };


            var mgm_map = new google.maps.Map($this[0], mgm_map_options);
            if(typeof(mgm_multilocation_map_locations_arr) != "undefined")    {
                markerCluster = new MarkerClusterer(mgm_map);
                var infowindow;
                var image = mgm_multilocation_map_options.mgm_upload_pointer_image_data;
                var markers_arr = new Array();
                for (var city in mgm_multilocation_map_locations_arr) {
                    var m = markers_arr.length;
                    var current_lat = mgm_multilocation_map_locations_arr[city].lat;
                    var current_lng = mgm_multilocation_map_locations_arr[city].lng;
                    markers_arr[m] = new google.maps.Marker({
                        position: new google.maps.LatLng(mgm_multilocation_map_locations_arr[city].lat, mgm_multilocation_map_locations_arr[city].lng),
                        map: mgm_map,
                        icon: image,
                        address: mgm_multilocation_map_locations_arr[city].description,
                        lat : current_lat,
                        lng : current_lng
                    });
                    google.maps.event.addListener(markers_arr[m], 'click', function () {
                        mgm_map.panTo(this.getPosition());
                        mgm_map.setZoom( mgm_multilocation_map_options.mgm_map_marker_click_zoom_data);

                        var address = this.address;
                        if (address != '') {
                            if(infowindow != null){
                                infowindow.close();
                            }
                            infowindow = new google.maps.InfoWindow({
                                content: '<div class="map-data">' + address + '</div>'
                            });
                            infowindow.open(mgm_map, this);
                        }
                    });
                    markerCluster.addMarker(markers_arr[m]);
                }

                Array.min = function( array ){
                    return Math.min.apply( Math, array );
                };
                Array.max = function( array ){
                    return Math.max.apply( Math, array );
                };
            }

            /*jQuery(".select-address").on('change',jQuery(".location"),function(){
               for(var city in mgm_multilocation_map_locations_arr) {
                   if(jQuery(".select-address").val() == city)   {
                       var center_lat_location_arr = [];
                       var center_lng_location_arr = [];
                       for(var i = 0; i < mgm_multilocation_map_locations_arr[city].length; i+=1)   {
                           center_lat_location_arr.push(parseFloat(mgm_multilocation_map_locations_arr[city][i].lat));
                           center_lng_location_arr.push(parseFloat(mgm_multilocation_map_locations_arr[city][i].lng));
                       }
                       var city_center_location_lat = (Array.min(center_lat_location_arr) + Array.max(center_lat_location_arr)) / 2;
                       var city_center_location_lng = (Array.min(center_lng_location_arr) + Array.max(center_lng_location_arr)) / 2;
                       var latLng = new google.maps.LatLng(city_center_location_lat, city_center_location_lng);
                       map.panTo(latLng);
                       map.setZoom(12);
                   }
               }
            });*/

            if (dataHue !== undefined && dataHue !== false) {
                var styles = [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#e9e5dc"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#a3ccf9"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ];
                mgm_map.setOptions({styles: styles});
            }
        });
    }
}