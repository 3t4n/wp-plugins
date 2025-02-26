/* Admin End Scripts */

/* Location image Upload */
jQuery(document).ready(function ($) {
  jQuery("#upload_location_image").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Image",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        console.log(uploaded_image);
        var location_image = uploaded_image.toJSON().url;
        jQuery("#location_image").val(location_image);
        var img_tag = jQuery("#location_image").val(location_image);
      });
  });
});

/* Marker image Upload */
jQuery(document).ready(function ($) {
  jQuery("#upload_marker_image").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Image",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        console.log(uploaded_image);
        var location_marker_img = uploaded_image.toJSON().url;
        jQuery("#location_marker_img").val(location_marker_img);
        var img_tag = jQuery("#location_marker_img").val(location_marker_img);
      });
  });
});

/* Center Location Image Upload */
jQuery(document).ready(function ($) {
  jQuery("#upload_center_image").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Image",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        console.log(uploaded_image);
        var center_image = uploaded_image.toJSON().url;
        jQuery("#center_image").val(center_image);
        var img_tag = jQuery("#center_image").val(center_image);
      });
  });
});

/* Route Autocomplte js for direction map */
function initMaproute() {
  var map = new google.maps.Map(document.getElementById("map_route"), {
    mapTypeControl: false,
    center: { lat: 25.1231298197085, lng: 75.82576941970854 },
    zoom: 14,
  });

  new AutocompleteDirectionsHandler(map);
}

/**
 * @constructor
 */
function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = "WALKING";
  var originInput = document.getElementById("origin-input");
  var destinationInput = document.getElementById("destination-input");
  var modeSelector = document.getElementById("mode-selector");
  this.directionsService = new google.maps.DirectionsService();
  this.directionsDisplay = new google.maps.DirectionsRenderer();
  this.directionsDisplay.setMap(map);

  var originAutocomplete = new google.maps.places.Autocomplete(originInput, {
    placeIdOnly: true,
  });
  var destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput,
    { placeIdOnly: true }
  );

  this.setupClickListener("changemode-walking", "WALKING");
  this.setupClickListener("changemode-transit", "TRANSIT");
  this.setupClickListener("changemode-driving", "DRIVING");

  this.setupPlaceChangedListener(originAutocomplete, "ORIG");
  this.setupPlaceChangedListener(destinationAutocomplete, "DEST");

  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
    destinationInput
  );
  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

/* Sets a listener on a radio button to change the filter type on Places */
/* Autocomplete. */
AutocompleteDirectionsHandler.prototype.setupClickListener = function (
  id,
  mode
) {
  var radioButton = document.getElementById(id);
  var me = this;
  radioButton.addEventListener("click", function () {
    me.travelMode = mode;
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (
  autocomplete,
  mode
) {
  var me = this;
  autocomplete.bindTo("bounds", this.map);
  autocomplete.addListener("place_changed", function () {
    var place = autocomplete.getPlace();
    if (!place.place_id) {
      window.alert("Please select an option from the dropdown list.");
      return;
    }
    if (mode === "ORIG") {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function () {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;
  this.directionsService.route(
    {
      origin: { placeId: this.originPlaceId },
      destination: { placeId: this.destinationPlaceId },
      travelMode: this.travelMode,
    },
    function (response, status) {
      if (status === "OK") {
        me.directionsDisplay.setDirections(response);
      } else {
        window.alert("Directions request failed due to " + status);
      }
    }
  );
};

/* Show/hide InfoWindow Customization Options */
jQuery(document).ready(function () {
  jQuery("#info_window_custom_controls").hide();
  jQuery("#info_win_custom").click(function () {
    if (jQuery(this).is(":checked")) {
      jQuery("#info_window_custom_controls").show();
    } else {
      jQuery("#info_window_custom_controls").hide();
    }
  });

  jQuery("#customization_center").hide();
  jQuery("#map_custom_center").click(function () {
    if (jQuery(this).is(":checked")) {
      jQuery("#customization_center").show();
    } else {
      jQuery("#customization_center").hide();
    }
  });

  jQuery(".color-field").wpColorPicker();
});

/* Show/Hide Redirect URL Input box */
function non_redirect_url() {
  document.getElementById("redirect_input_div").style.display = "none";
  document.getElementById("redirect_info_div").style.display = "flex";
}
function redirect_url() {
  document.getElementById("redirect_input_div").style.display = "flex";
  document.getElementById("redirect_info_div").style.display = "none";
}
/* Show/Hide WayPoint Option Box */
function route_text() {
  document.getElementById("waypoints_options").style.display = "none";
}
function route_location() {
  document.getElementById("waypoints_options").style.display = "block";
}
/* Add Region script for Interactive Map Cpt */
var t;
jQuery(document).ready(function () {
  t = jQuery("#example").DataTable();
  jQuery("#submit_region").click(function () {
    var check_box =
      "<td><input class='checkbox_region' type='checkbox' name='record'></td>";
    var region_name = jQuery("#region_name").val();
    var region_color = jQuery("#region_color").val();
    var region_tooltip_value = jQuery("#region_tooltip_value").val();
    var region_click_value = jQuery("#region_click_value").val();
    var rowNode = t.row
      .add([
        check_box,
        region_name,
        region_color,
        region_tooltip_value,
        region_click_value,
        '<a class="btn btn-sm btn-danger custom_action_btn delete_region">Delete</a>',
      ])
      .draw(false)
      .node();
    jQuery(rowNode).css("color", "red").animate({ color: "black" });
    /* Automatically add a row of data */
    jQuery("#addRow").click();
    /* reset form fields */
    jQuery("#region_name").val(" ");
    jQuery("#region_color").val(" ");
    jQuery("#region_tooltip_value").val(" ");
    jQuery("#region_click_value").val(" ");

    jQuery("#myModal").modal("hide");
    jQuery("#get_all_rows").trigger("click");
  });

  jQuery("#example tbody").on("click", ".view_region", function () {
    var data = t.row(jQuery(this).parents("tr")).data();
    jQuery("#edit_region_model").modal("show");
    jQuery("#edit_name").val(data[1]);
    jQuery("#edit_color .wp-color-result").css("background-color", data[2]);
    jQuery("#edit_color .wp-color-picker").val(data[2]);
    jQuery("#edit_tooltip_value").val(data[3]);
    jQuery("#edit_click_value").val(data[4]);
  });

  /* Find and remove selected table rows */
  jQuery("#delete-row").click(function () {
    jQuery("#example tbody")
      .find('input[name="record"]')
      .each(function () {
        if (jQuery(this).is(":checked")) {
          t.row(jQuery(this).parents("tr")).remove().draw(false);
        }
      });
    jQuery("#get_all_rows").trigger("click");
  });

  /* Remove single table rows */
  jQuery(document).on("click", ".delete_region", function () {
    t.row(jQuery(this).parents("tr")).remove().draw(false);
    jQuery("#get_all_rows").trigger("click");
  });

  /* Get all rows data */
  jQuery("#get_all_rows").click(function () {
    var all_data = t.rows().data();
    var rows_data = [];
    for (var i = 0; i <= all_data.length; i++) {
      if (Array.isArray(all_data[i])) {
        var single_row_arr = {
          region: all_data[i][1],
          color: all_data[i][2],
          tooltip_value: all_data[i][3],
          click_value: all_data[i][4],
        };
        rows_data.push(single_row_arr);
      }
    }
    var value_obj = JSON.stringify(rows_data);
    jQuery("#saved_data_arr").val(value_obj);
    console.log(value_obj);
  });

  /* select all checkboxes */
  jQuery(".select_all").change(function () {
    var status = this.checked;
    jQuery(".checkbox_region").each(function () {
      this.checked = status;
    });
  });
  jQuery(".checkbox_region").change(function () {
    /* uncheck "select all", if one of the listed checkbox item is unchecked */
    if (this.checked == false) {
      jQuery(".select_all")[0].checked = false;
    }
    /* check "select all" if all checkbox items are checked */
    if (
      jQuery(".checkbox_region:checked").length ==
      jQuery(".checkbox_region").length
    ) {
      jQuery(".select_all")[0].checked = true;
    }
  });
});

/* Choose Locations select js */
jQuery(document).ready(function () {
  var table = jQuery("#choose_location_data").DataTable();
  var count = 0;
  jQuery("#choose_location_data tbody").on("click", "tr", function () {
    var d = table.rows(".selected").data();

    if (jQuery(this).hasClass("selected")) {
      jQuery(this).removeClass("selected");
      count--;
    } else {
      if (d.length < 8) {
        if (count < 8) {
          jQuery(this).toggleClass("selected");
          count++;
        } else {
          alert("You can select only 8 locations. For more Update to Pro.");
        }
      } else {
        alert("You can select only 8 locations. For more Update to Pro.");
      }
    }
    var ab = new Array();
    for (var i = d.length - 1; i >= 0; i--) {
      var a = d[i];
      ab.push(a[0]);
    }
    var trs = jQuery("#choose_location_data tbody tr");
    var d = table.rows(".selected").data();
    var ids = [];
    trs.each(function () {
      if (jQuery(this).hasClass("selected")) {
        var id = jQuery(this).find("td:first").html();
        ids.push(id);
      }
    });
    if (ids.length) {
      jQuery(".selected_locations").val(JSON.stringify(ids));
    } else {
      jQuery(".selected_locations").val("");
    }
    var value_obj = jQuery(".selected_locations").val();
    value_obj = JSON.parse(value_obj || "{}");
  });
});
