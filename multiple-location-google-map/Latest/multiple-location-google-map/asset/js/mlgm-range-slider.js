(function($) {
	  var mlgm_zoomlevel=parseInt($('#mlgm_zoomlevel').val());
	  $( "#map_zoom_level" ).slider({
	  range: true,
      min: 6,
      max: 50,
      values: [mlgm_zoomlevel, 50],
      slide: function( event, ui ) {
	    $("#mlgm_zoomlevel" ).val(ui.values[0]);
		$("#mlgm_zoom_range" ).html(ui.values[ 0 ] + '/ ' + ui.values[1]);
      }
    });
	 $("#mlgm_zoom_range").html('' + $( "#map_zoom_level" ).slider( "values", 0) +
      ' / ' + $( "#map_zoom_level" ).slider( "values", 1 ) );
	$('.locatio-icon img').click(function()
	{
		var iconurl=$(this).attr('src');
		var iconval=$(this).attr('alt');
		$('#select_location_marker_val').val(iconval);
		$('#select_location_marker').val(iconurl);
	});
 $('.mlgm-map-setting-table .locatio-icon img') .click(function(){
         $(this).parent().addClass("locatio-icon-active").siblings().removeClass("locatio-icon-active");
	 });
  })(jQuery);