google.charts
  .load("current", {
    packages: ["geochart"],
    mapsApiKey: wl_agm_lite_inter.api_key,
  })
  .then(function () {
    var data = google.visualization.arrayToDataTable(
      wl_agm_lite_inter.regions_data
    );
    // console.log(data);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1]);

    if (wl_agm_lite_inter.interactivity == "true") {
      var interactivity = false;
    } else {
      var interactivity = true;
    }

    var GeoChart = new google.visualization.ChartWrapper({
      chartType: "GeoChart",
      containerId: wl_agm_lite_inter.map_id,
      dataTable: view,
      options: {
        region: wl_agm_lite_inter.region,
        legend: { textStyle: { color: "blue", fontSize: 16 } },
        legend: "none",
        datalessRegionColor: wl_agm_lite_inter.dataless_color,
        defaultColor: "#f5f5f5",
        backgroundColor: {
          fill: wl_agm_lite_inter.bg_color,
          stroke: wl_agm_lite_inter.bg_color,
          strokeWidth: 0,
        },
        resolution: wl_agm_lite_inter.resolution,
        displayMode: wl_agm_lite_inter.display_mode,
        enableRegionInteractivity: interactivity,
        keepAspectRatio: false,
        colorAxis: {
          minValue: 0,
          maxValue: 5,
          colors: wl_agm_lite_inter.color_data,
        },
        tooltip: {
          textStyle: { color: "#000000" },
          showColorCode: true,
          trigger: "focus",
          isHtml: false,
          showTitle: true,
        },
      },
    });

    google.visualization.events.addListener(GeoChart, "ready", function () {
      google.visualization.events.addListener(
        GeoChart.getChart(),
        "select",
        function () {
          var selection = GeoChart.getChart().getSelection();
          if (selection.length > 0) {
            //window.open('http://' + data.getValue(selection[0].row, 2), '_blank');
            var region_data = document.getElementById(
              "map_data-" + wl_agm_lite_inter.container_id
            );
            region_data.innerHTML =
              "<h2>" +
              data.getValue(selection[0].row, 0) +
              "</h2>" +
              "<p>" +
              data.getValue(selection[0].row, 2) +
              "</p>";
          }
        }
      );
    });
    GeoChart.draw();
  });
