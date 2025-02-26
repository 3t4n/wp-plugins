(function( jQuery ){

  jQuery.fn.cuteStream = function( options ) {
  
	var settings = jQuery.extend({
	  'filepath'			: '/', 
	  'playerpath'			: '/', 
	  'skin'				: 1
	}, options);
	
	var filepath = settings.filepath;
	var playerpath = settings.playerpath;
	var skin = settings.skin;
	if(skin == 2) { 
		var appendtext = '<style type="text/css">.cutestream_mp3_playing .cutestream_play_but { background-image: url('+playerpath+'buttons/classic_small/playdown.png); }';
		appendtext += '.cutestream_mp3_stop .cutestream_play_but { background-image: url('+playerpath+'buttons/classic_small/playup.png) }';
		appendtext += '.cutestream_mp3_stop .cutestream_play_but:hover { background-image: url('+playerpath+'buttons/classic_small/playover.png) }</style>';
	} else { 
		var appendtext = '<style type="text/css">.cutestream_mp3_playing .cutestream_play_but { background-image: url('+playerpath+'buttons/negative_small/playdown.png); }';
		appendtext += '.cutestream_mp3_stop .cutestream_play_but { background-image: url('+playerpath+'buttons/negative_small/playup.png) }';
		appendtext += '.cutestream_mp3_stop .cutestream_play_but:hover { background-image: url('+playerpath+'buttons/negative_small/playover.png) }</style>';
	}
	jQuery('head').append(appendtext);
	var all_buttons = jQuery(this);
	jQuery(this).click(function(){ 	
		if(jQuery(this).hasClass("cutestream_mp3_playing")) { 
			var is_playing = 1; 
		} else { 
			var is_playing = 0; 
		}
		if(jQuery("#cutestream_mp3_object").length > 0) { 
			jQuery("#cutestream_mp3_object").remove();
			all_buttons.removeClass("cutestream_mp3_playing");
			all_buttons.addClass("cutestream_mp3_stop");
		}
		if(is_playing) { 
			is_playing = 0;
		} else { 
			var filename = jQuery(this).attr("id");
			var mp3html = '<div id="cutestream_mp3_object" style="position:absolute; top: -10000px;"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ';
			mp3html += 'codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab">';
			mp3html += '<param width="1" height="1" name="movie" value="' + playerpath + 'audioplay.swf?';
			mp3html += 'file=' + filepath + filename + '&auto=yes&sendstop=yes&repeat=1';
			mp3html += '&buttondir=' + playerpath + 'buttons/negative_small&bgcolor=0xffffff';
			mp3html += '&mode=playpause" />';
			mp3html += '<param name="quality" value="high" />';
			mp3html += '<embed ';
			mp3html += 'src="' + playerpath + 'audioplay.swf?file=' + filepath + filename;
			mp3html += '&buttondir=' + playerpath + 'buttons/negative_small&bgcolor=0xffffff';
			mp3html += '&auto=yes&repeat=1&mode=playpause" quality="high" width="1" height="1" type="application/x-shockwave-flash" />';
			mp3html += '</object></div>';
			jQuery("body").append(mp3html);
			jQuery(this).removeClass("cutestream_mp3_stop");
			jQuery(this).addClass("cutestream_mp3_playing");
			is_playing = 1;
		}
		return false;
	});

  }
  
})( jQuery );