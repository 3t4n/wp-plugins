class GeounitMaps extends elementorModules.frontend.handlers.Base {
    bindEvents() {
      const settings = {
        latitude: this.getElementSettings("lat"),
        longitude: this.getElementSettings("lon"),
        zoom: this.getElementSettings("zoom").size,
        disablemarker: this.getElementSettings("disablemarker"),
        markercolor: this.getElementSettings("markercolor"),
        themeattribution: this.getElementSettings("themeattribution"),
        themeurl: this.getElementSettings("themeurl"),
        content: this.getElementSettings("content"),
        disablescrollzoom: this.getElementSettings("disablescrollzoom"),
        height: this.getElementSettings("height"),
        infocontent: this.getElementSettings("infocontent"),
        infoposition: this.getElementSettings("infoposition"),
        style: this.getElementSettings("style"),
        iconsize: this.getElementSettings("iconsize").size
      };

      var map_element = this.findElement('.geounit_maps')[0];

      var map = L.map(map_element.id, {dragging: false}).setView(
        [parseFloat(settings.latitude), parseFloat(settings.longitude)],
        settings.zoom
      );
      
      L.tileLayer(
        settings.style,
        {
          attribution: settings.themeattribution,
          maxZoom: 18,
        }
      ).addTo(map);

      if(settings.disablescrollzoom) {
        map.scrollWheelZoom.disable();
      }
  
      if (!settings.disablemarker) {
        const markerIcon = L.divIcon({
					html: `
						<svg
              width="${settings.iconsize}"
              height="${settings.iconsize}"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 500 820"
						>
							<defs>
							<linearGradient x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(2.30025e-15,-37.566,37.566,2.30025e-15,416.455,540.999)" id="map-marker-38-f">
								<stop offset="0" stop-color="rgb(18,111,198)"/>
								<stop offset="1" stop-color="rgb(76,156,209)"/>
							</linearGradient>
							<linearGradient x1="0" y1="0" x2="1" y2="0"
								gradientUnits="userSpaceOnUse"
								gradientTransform="matrix(1.16666e-15,-19.053,19.053,1.16666e-15,414.482,522.486)"
								id="map-marker-38-s">
								<stop offset="0" stop-color="rgb(46,108,151)"/>
								<stop offset="1" stop-color="rgb(56,131,183)"/>
							</linearGradient>
							</defs>
							<g transform="matrix(19.5417,0,0,19.5417,-7889.1,-9807.44)">
							<path fill="none" d="M421.2,515.5c0,2.6-2.1,4.7-4.7,4.7c-2.6,0-4.7-2.1-4.7-4.7c0-2.6,2.1-4.7,4.7-4.7 C419.1,510.8,421.2,512.9,421.2,515.5z"/>
							<path d="M416.544,503.612C409.971,503.612 404.5,509.303 404.5,515.478C404.5,518.256 406.064,521.786 407.194,524.224L416.5,542.096L425.762,524.224C426.892,521.786 428.5,518.433 428.5,515.478C428.5,509.303 423.117,503.612 416.544,503.612ZM416.544,510.767C419.128,510.784 421.223,512.889 421.223,515.477C421.223,518.065 419.128,520.14 416.544,520.156C413.96,520.139 411.865,518.066 411.865,515.477C411.865,512.889 413.96,510.784 416.544,510.767Z" stroke-width="1.1px" fill="${settings.markercolor}" stroke="${settings.markercolor}"/>
							</g>
						</svg>`,
					className: "svg-icon",
					iconSize: [settings.iconsize, settings.iconsize],
					iconAnchor: [settings.iconsize/2, settings.iconsize]
				});

        const marker = L.marker([parseFloat(settings.latitude), parseFloat(settings.longitude)], { icon: markerIcon }).addTo(map);
        
        if (typeof(settings.content) !== 'undefined' && settings.content.length != 0) {
          marker.bindPopup(settings.content);
        }
      }

      //TODO set new coords in elementor setting field
      if (settings.getCoord === "yes") {
        var popup = L.popup();
        function onMapClick(e) {
          popup
            .setLatLng(e.latlng)
            //.setContent(
            //  "Latitude: " + e.latlng.lat + " <br> Longitude: " + e.latlng.lng
            //)
            .openOn(map);
        }
        map.on("click", onMapClick);
      }
      
      const resizeObserver = new ResizeObserver(() => {
        map.invalidateSize();
      });
      resizeObserver.observe(map_element);

    }
  }
  
  jQuery(window).on("elementor/frontend/init", () => {
    const addHandler = $element => {
      elementorFrontend.elementsHandler.addHandler(GeounitMaps, {
        $element
      });
    };
  
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/geounitmaps.default",
      addHandler
    );
  });