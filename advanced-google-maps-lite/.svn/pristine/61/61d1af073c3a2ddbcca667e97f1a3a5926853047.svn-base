var wl_lat = wl_agm_lite_loc.lat;
var wl_long = wl_agm_lite_loc.long;
var wl_title = wl_agm_lite_loc.wl_title;
var wl_image = wl_agm_lite_loc.image;
var wl_address = wl_agm_lite_loc.address;
var wl_info = wl_agm_lite_loc.info_win;
var wl_mrkr_img = wl_agm_lite_loc.mrker_img;
var wl_disable_info = wl_agm_lite_loc.disable_info;
var wl_onclick = wl_agm_lite_loc.onclick;
var wl_marker_ani = wl_agm_lite_loc.marker_ani;
var wl_info_win = wl_agm_lite_loc.info_win;
var wl_mrker_img = wl_agm_lite_loc.mrker_img;
var wl_redirect = wl_agm_lite_loc.redirect;
var wl_theme = wl_agm_lite_loc.theme;
var wl_zoom = wl_agm_lite_loc.wl_zoom;
var wl_map_type = wl_agm_lite_loc.wl_map_type;

wl_zoom = parseInt(wl_zoom, 10);

function initMap() {
  var map = new google.maps.Map(
    document.getElementById("map-" + wl_agm_lite_loc.location_id),
    {
      zoom: wl_zoom,
      center: new google.maps.LatLng(wl_lat, wl_long),
      draggable: true,
      mapTypeId: wl_map_type,
      mapTypeControlOptions: {
        mapTypeIds: ["roadmap", "satellite", "hybrid", "terrain", "styled_map"],
      },
    }
  );

  var title = wl_agm_lite_loc.wl_title;
  var location_image = wl_image;
  var contentString =
    '<div class="wl_agm" id="iw-container">' +
    '<div class="map-infos">' +
    '<div class="marker-info">' +
    '<img src="' +
    location_image +
    '" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
    '<p class="m_title">' +
    title +
    "</p><br>" +
    '<p class="add-header">Address</p>' +
    '<p class="addess_"></i>' +
    wl_address +
    "</p>" +
    '<p class="add-header">Info</p>' +
    "<p>" +
    wl_info +
    "</p>" +
    "</div>" +
    "</div>" +
    "</div>";

  var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 300,
  });

  /* Additional Js for infoWindow Css */
  google.maps.event.addListener(infowindow, "domready", function () {
    /* Reference to the DIV that wraps the bottom of infowindow */
    var iwOuter = jQuery(".gm-style-iw");
    iwOuter.css({ top: "0px" });

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

    iwBackground.children(":nth-child(1)").attr("style", function (i, s) {
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

  /* Set the map"s style to the initial value of the selector. */
  map.setOptions({ styles: styles[wl_theme] });

  if (wl_mrkr_img !== "undefined" && wl_mrkr_img.length !== 0) {
    /* Set the map's custom image As Marker */
    image = {
      url: wl_mrker_img,
      // This marker is 20 pixels wide by 32 pixels high.
      scaledSize: new google.maps.Size(32, 32),
      // The origin for this image is (0, 0).
      origin: new google.maps.Point(0, 0),
      // The anchor for this image is the base of the flagpole at (0, 32).
      anchor: new google.maps.Point(0, 32),
    };

    if (wl_marker_ani == "BOUNCE") {
      beachMarker = new google.maps.Marker({
        position: new google.maps.LatLng(wl_lat, wl_long),
        map: map,
        draggable: false,
        animation: google.maps.Animation.BOUNCE,
        icon: image,
        title: wl_agm_lite_loc.wl_title,
      });
    } else {
      beachMarker = new google.maps.Marker({
        position: new google.maps.LatLng(wl_lat, wl_long),
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        icon: image,
        title: wl_agm_lite_loc.wl_title,
      });
    }

    if (wl_disable_info == "0") {
      beachMarker.addListener("click", function () {
        if (wl_onclick == "info_win" && wl_info_win.length !== 0) {
          infowindow.open(map, beachMarker);
        }
        if (wl_onclick == "info_url" && wl_redirect.length !== 0) {
          window.open(wl_redirect, "_blank");
        }
      });

      google.maps.event.addListener(map, "click", function () {
        infowindow.close(map, beachMarker);
      });
    }
  } else {
    /* Set the map's Default Marker */
    marker = new google.maps.Marker({
      draggable: false,
      animation: google.maps.Animation.wl_marker_ani,
      position: new google.maps.LatLng(wl_lat, wl_long),
      map: map,
    });
    if (wl_disable_info == "0") {
      marker.addListener("click", function () {
        infowindow.open(map, marker);
      });

      google.maps.event.addListener(map, "click", function () {
        infowindow.close(map, marker);
      });
    }
  }
}
