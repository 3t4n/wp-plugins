(function($){
	$(function(){

			Applixir_Ad = {

				init: function(){
					this.addPlayerDiv()
					this.eventHandler();
				},
				addPlayerDiv: function(){
					var html ='<div id="applixir_vanishing_div" hidden><iframe id="applixir_parent" allow="autoplay"></iframe></div>';
					//$('body') .prepend(html)

				},
				eventHandler: function(){

					if( document.getElementById('applixir-ad-btn') !== null ){
					var viewportOffset = document.getElementById('applixir-ad-btn').getBoundingClientRect();
						// these are relative to the viewport, i.e. the window
					var top = viewportOffset.top;
					}

					$(document).on('click', '.applixir-ad-btn', function(){

						//var margin = 40;
						if(applixir_settings.position == 'above'){
							var yOff = top-512;
						} else if( applixir_settings.position == 'mid') {
							var yOff = top-267;
						} else {
							//console.log('Inside yoff')
							// Bottom
							var yOff = top;
						}

						var options = {
							zoneId: applixir_settings.zone_id,
							devId: applixir_settings.dev_id,
							gameId: applixir_settings.wp_id,
							dMode: 1,       // dMode 1 for MD5 checksum 0 for no MD5 checksum
							adStatusCb: Applixir_Ad.adStatusCallback,
							yOffs:yOff,
							verbosity: 5,
						};
						invokeApplixirVideoUnit(options);
					})
				},
				adStatusCallback: function(status){
					if (status){

						if( status == 'ad-watched'){
							//
							Applixir_Ad.setCookie('applixir-ad-watched-'+applixir_global_vars.postID, true, applixir_settings.video_frequency);
							window.location.reload();
						}
					}
				},

				setCookie: function (cname, cvalue, exdays) {
					if( exdays == '0' ){
						exdays=365;
					}
					var d = new Date();
					d.setTime(d.getTime() + (exdays*24*60*60*1000));
					var expires = "expires="+ d.toUTCString();
					document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				  }
			}

			Applixir_Ad.init();


	})
})(jQuery);