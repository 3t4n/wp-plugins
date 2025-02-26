			var $ = jQuery;
			var set_marker   = _SET_MARKER;
			var show_sidebar = _SHOW_SIDEBAR;
			var animating = false;
			
			var map = new L.Map("map", { dragging: true, touchZoom: true, scrollWheelZoom: true, doubleClickZoom: true, boxzoom: true, trackResize: true, worldCopyJump: false, closePopupOnClick: true, keyboard: true, keyboardPanOffset: 80, keyboardZoomOffset: 1, inertia: true, inertiaDeceleration: 3000, inertiaMaxSpeed: 1500, zoomControl: true, crs: L.CRS.EPSG3857, fullscreenControl: true });
			var globalJSON = _GEO_JSON;
			var markerLayers = new Array();
			
			map.setView([_Latitude, _Longitude], _Zoom);
			
			map.on('popupopen', function(e) {
				var px = map.project(e.popup._latlng); // find the pixel location on the map where the popup anchor is
				px.y -= e.popup._container.clientHeight/2 // find the height of the popup container, divide by 2, subtract from the Y axis of marker location
				map.panTo(map.unproject(px),{animate: true}); // pan to new center
			});
			
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 18,
				attribution: '&copy; <a href="http://osm.org/copyright" target="_blank">OpenStreetMap</a> contributors | <a href="https://www.mapfig.com" target="_blank">MapFig</a>'
			}).addTo(map);
			
			function onEachFeature(feature, layer) {
				var prop = feature.properties;
				
				var vari = prop.variables;
				var cons = prop.constants;
				
				if(vari){
					popupContent = "";
					
					if(!cons.hidelocation) {
						popupContent += "<b class='marker-address'>"+vari.Name+"</b><br>";
					}
					
					popupContent += vari.Description;
					if(cons.directionlink){
						popupContent += "<br>"+vari.Directions;
					}
					
					layer.bindPopup(popupContent);
					
					markerLayers.push(layer);
					$('#sidebar-buttons ul.leaflet-sidebar').append('<li><input type="checkbox" checked onClick="changeAddressCheckbox(this)"> <a onClick="clickOnSidebarAddress(this)">'+ feature.properties.variables.Name +'</a><div class="clear"></div></li>');
					
					
					if(cons.popupfromtop) {
						layer.on("click", function(){
							content = this.getPopup()._content;
							html = $.parseHTML(content);
							
							address = "";
							$(html).each(function(){
								if($(this).attr('class') == 'marker-address'){
									address = $(this).text();
								}
							})
							content = $(html).not('b.marker-address');
							
							
							if(address == ""){
								$('.mf-modal-header').hide();
							}
							else{
								$('.mf-modal-header').show().text(address);
							}
							$('.mf-modal-body').html(content);
							
							mfOpenPopup();
							
							setTimeout(function(){
								map.closePopup();
							}, 50);
						});
					}
				}
			}
			
			L.control.locate({
				position: 'bottomright', 
				drawCircle: true,
				follow: true,
				setView: true,
				keepCurrentZoomLevel: true,
				remainActive: false,
				circleStyle: {},
				markerStyle: {},
				followCircleStyle: {},
				followMarkerStyle: {},
				icon: 'icon-cross-hairs',
				circlePadding: [0,0],
				metric: true,
				showPopup: true,
				strings: {
					title: 'I am Here',
					popup: 'You are within {distance} {unit} from this point',
					outsideMapBoundsMsg: 'You seem located outside the boundaries of the map'
				},
				locateOptions: { watch: true }
			}).addTo(map);
			
			map.on('popupopen', function(e) {
				var px = map.project(e.popup._latlng); // find the pixel location on the map where the popup anchor is
				px.y -= e.popup._container.clientHeight/2 // find the height of the popup container, divide by 2, subtract from the Y axis of marker location
				map.panTo(map.unproject(px),{animate: true}); // pan to new center
			});
			
			function loadGeoJSON(){
				L.geoJson(globalJSON, {
					onEachFeature: onEachFeature,
					pointToLayer: function (feature, latlng) {
						style = feature.properties.style;
						if(style && (style.markerColor != "" || style.icon != "")){
							return L.marker(latlng, {
								"icon": L.AwesomeMarkers.icon(
									feature.properties.style
								)
							});
						}
						else {
							return L.marker(latlng, { });
						}
					}
				}).addTo(map);
			}
			
			$(document).ready(function(){
				$('.leaflet-top.leaflet-left').append(
					'<div id="sidebarhideshow" class="leaflet-control-sidebar leaflet-bar leaflet-control">' +
						'<a class="leaflet-control-sidebar-button leaflet-bar-part sidebar-buttons" id="sidebar-button-reorder" href="#" onClick="return false;" title="Sidebar Toggle"><i class="fa fa-reorder" style="line-height: 25px;"></i></a>' +
						'<div id="sidebar-buttons">' +
							'<ul class="list-unstyled leaflet-sidebar">' +
								
							'</ul>' +
						'</div>' +
					'</div>'
				);
				
				$('#sidebar-button-reorder').click(function(){
					if(animating) return;
					
					var element = $('#sidebar-buttons');
					animating = true;
					
					if(element.css('left') == '-50px') {
						element.show();
						element.animate( {opacity: '1', left: '0px'}, 400, function(){ animating = false; } );
					}
					else {
						element.animate( {opacity: '0', left: '-50px'}, 400, function(){ animating = false; element.hide(); } );
					}
				});
				
				if(show_sidebar)
					$('#sidebarhideshow').show();
				else
					$('#sidebarhideshow').hide();
				
				loadGeoJSON();
				
				if(set_marker && markerLayers.length == 1){
					markerLayers[0].fire('click');
				}
			});
			
			function changeAddressCheckbox(obj){
				index = $(obj).parent().index();
				
				if($(obj).is(':checked')) {
					map.addLayer(markerLayers[index]);
					if(set_marker){
						setTimeout(function(){
							if(markerLayers.length ==1){
								markerLayers[index].fire('click');
							}
						}, 100);
					}
				}
				else {
					map.removeLayer(markerLayers[index]);
				}
			}
			
			function clickOnSidebarAddress(obj){
				index = $(obj).parent().index();
				setTimeout(function(){
					markerLayers[index].fire('click');
				}, 100);
			}
			
			function mfClosePopup(){
				$('#mf-myModal').removeClass('mf-in').fadeOut(0);
			}
			function mfOpenPopup(){
				$('#mf-myModal').addClass('mf-in').fadeIn(0);
				mfPopupCentralized();
			}
			
			function mfPopupCentralized(){
				width  = $(window).width();
				
				w = 600;
				margin_left = (width-w)/2;
				$dialog = $('.mf-modal-dialog');
				$dialog.css('margin-top',150)
					   .css('width',w)
					   .css('margin-left',margin_left);
			}