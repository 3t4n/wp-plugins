(function ($) {
  'use strict';

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
	 *
	 * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
	 *
	 * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */


  function contactMap() {
    // Map options
    var cm_options = {
      "center": {
        "lat": parseFloat(cedarmaps_options.center_lat) || 35.732643,
        "lng": parseFloat(cedarmaps_options.center_lng) || 51.411123
      },
      "maptype": "light",
      "scrollWheelZoom": !!cedarmaps_options.scroll_wheel_zoom || false,
      "zoomControl": true,
      "zoom": parseInt(cedarmaps_options.zoom) || 15,
      "minZoom": parseInt(cedarmaps_options.min_zoom) || 6,
      "maxZoom": parseInt(cedarmaps_options.max_zoom) || 17,
      "legendControl": false,
      "attributionControl": false
    };
    var token = cedarmaps_options.api_key;

    // Initialized CedarMap
    var map = window.L.cedarmaps.map('cedar_map_plugin', 'https://api.cedarmaps.com/v1/tiles/cedarmaps.streets.json?access_token=' + token, cm_options
      )
    ;
    var markers = [];
    var markerOptionObjects = cedarmaps_options.markers || [];
    if (markerOptionObjects.length !== 0)
      for (var index in markerOptionObjects) {
        markers.push({
          "popupContent": markerOptionObjects[index].popup_name,
          "center": {"lat": markerOptionObjects[index].lat, "lng": markerOptionObjects[index].lng},
          "iconOpts": {
            "iconUrl": "https://api.cedarmaps.com/v1/markers/marker-circle-green.png",
            "iconRetinaUrl": "https://api.cedarmaps.com/v1/markers/marker-circle-green@2x.png",
            "iconSize": [82, 98]
          }
        });
      }

    // Markers options
    var markersLeaflet = [];
    var _marker = null;

    map.setView(cm_options.center, cm_options.zoom);
    // Add Markers on Map
    if (markers.length === 0) return;
    markers.map(function (marker) {
      var iconOpts = {
        iconUrl: marker.iconOpts.iconUrl,
        iconRetinaUrl: marker.iconOpts.iconRetinaUrl,
        iconSize: marker.iconOpts.iconSize,
        popupAnchor: [0, -49]
      };

      const markerIcon = {
        icon: window.L.icon(iconOpts)
      };

      _marker = new window.L.marker(marker.center, markerIcon);
      markersLeaflet.push(_marker);
      if (marker.popupContent) {
        _marker.bindPopup(marker.popupContent);
      }
      _marker.addTo(map);
    });
    // Bounding Map to Markers
    if (markers.length > 1) {
      var group = new window.L.featureGroup(markersLeaflet);
      map.fitBounds(group.getBounds(), {padding: [30, 30]});
    }
  };
  $(document).ready(function () {
    var cedarMapElement = $('#cedar_map_plugin');
    (function (c, e, d, a) {
      var p = c.createElement(e);
      p.async = 1;
      p.src = d;
      p.onload = a;
      c.body.appendChild(p);
    })(document, 'script', 'https://api.cedarmaps.com/cedarmaps.js/v1.8.1/cedarmaps.js', contactMap);

    if (cedarmaps_options.width) {
      cedarMapElement.css('width', cedarmaps_options.width)
    }
    if (cedarmaps_options.height) {
      cedarMapElement.css('height', cedarmaps_options.height)
    }
  })


})(jQuery);
