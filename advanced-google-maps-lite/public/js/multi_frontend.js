var map_type = wl_agm_lite_multi.map_type;
var wl_lat = wl_agm_lite_multi.lat;
var wl_long = wl_agm_lite_multi.long;
var theme = wl_agm_lite_multi.theme;
var imagnary = wl_agm_lite_multi.imagnary;
var wl_zoom = wl_agm_lite_multi.zoom;
var size = wl_agm_lite_multi.wl_size;
var locations = wl_agm_lite_multi.locations;
var map_id = wl_agm_lite_multi.map_id;
var location_image = wl_agm_lite_multi.location_image;

wl_zoom = parseInt(wl_zoom, 10);

var infoWindow;

if (wl_agm_lite_multi.draggable == "0") {
  var draggable = true;
} else {
  var draggable = false;
}

if (wl_agm_lite_multi.scroll == "0") {
  var scroll = true;
} else {
  var scroll = false;
}

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(wl_lat, wl_long),
    zoom: wl_zoom,
    mapTypeId: map_type,
    draggable: draggable,
    scrollwheel: scroll,
  });
  infoWindow = new google.maps.InfoWindow();

  if (imagnary != "0") {
    map.setTilt(45);
  }

  /* Set the map"s style to the initial value of the selector. */
  map.setOptions({ styles: styles[theme] });

  var marker, i;

  var each_icon = {
    url: location_image,
    scaledSize: new google.maps.Size(32, 32),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(0, 32),
  };

  for (i = 0; i < size; i++) {
    if (locations[i][1].length !== 0 && locations[i][2].lenght !== 0) {
      var icon = {
        url: locations[i][3],
        scaledSize: new google.maps.Size(32, 32),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 32),
      };

      var each_icon = {
        url: location_image,
        scaledSize: new google.maps.Size(32, 32),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 32),
      };

      if (locations[i][3].length !== 0 && location_image.length !== 0) {
        var iconn = icon;
      } else {
        var iconn = each_icon;
      }
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: iconn,
        title: locations[i][0],
      });

      var html =
        '<div class="wl_agm" id="iw-container">' +
        '<div class="map-infos">' +
        '<div class="marker-info">' +
        '<img src="' +
        locations[i][5] +
        '" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
        '<p class="m_title">' +
        locations[i][0] +
        "</p>" +
        "<p>" +
        locations[i][6] +
        "</p>" +
        '<p class="add-header">Address</p>' +
        '<p class="addess_"><i class="fas fa-map icon_f"></i>' +
        locations[i][4] +
        "</p>" +
        "</div>" +
        "</div>" +
        "</div>";

      /* process multiple info windows */
      (function (marker, i, html) {
        /* add click event */
        google.maps.event.addListener(marker, "click", function () {
          infowindow = new google.maps.InfoWindow({
            content: html,
            maxWidth: 600,
          });

          /* Additional Js for infoWindow Css */
          google.maps.event.addListener(infowindow, "domready", function () {
            /* Reference to the DIV that wraps the bottom of infowindow */
            var iwOuter = jQuery(".gm-style-iw");
            iwOuter.css({ top: "27px" });

            /* Since this div is in a position prior to .gm-div style-iw.
             * We use jQuery and create a iwBackground variable,
             * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
             */
            var iwBackground = iwOuter.prev();

            /* Removes background shadow DIV */
            iwBackground.children(":nth-child(2)").css({ display: "none" });

            /* Removes white background DIV */
            iwBackground.children(":nth-child(4)").css({ display: "none" });

            /* Moves the infowindow 115px to the right. */
            iwOuter.parent().parent().css({ left: "" });

            /* Moves the shadow of the arrow 76px to the left margin. */
            iwBackground.children(":nth-child(1)").css({ display: "red" });

            iwBackground
              .children(":nth-child(1)")
              .attr("style", function (i, s) {
                return s + "bottom: 76px !important;";
              });

            /* Reference to the div that groups the close button elements. */
            var iwCloseBtn = iwOuter.next();

            /* Apply the desired effect to the close button */
            iwCloseBtn.css({ right: "54px", top: "43px" });

            /* If the content of infowindow not exceed the set maximum height, then the gradient is removed. */
            if (jQuery(".iw-content").height() < 140) {
              jQuery(".iw-bottom-gradient").css({ display: "none" });
            }

            /* The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value. */
            iwCloseBtn.mouseout(function () {
              jQuery(this).css({ opacity: "1" });
            });
          });

          infowindow.open(map, marker);
        });
      })(marker, i, html);
    }
  }
}
