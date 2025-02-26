jQuery( document ).ready( function( $ ) {
	// Duration Functions
    
    var durationStr = 	$( "#rovidx_smarttv_Duration" ).val();
	
	if (durationStr > null) {
		var a = durationStr.split(':'); // split it at the colons
		var durb;
		if (a.length === 1) {
			durb = fromSeconds(durationStr);
			$('#rovidx-duration-information').html(durb);
		} else if (a.length === 2) {
			durb = toSeconds(durationStr);
			durb = fromSeconds(durb);
			$('#rovidx-duration-information').html(durb);
		} else if (a.length === 3) {
			durb = toSeconds(durationStr);
			durb = fromSeconds(durb);
			$('#rovidx-duration-information').html(durb);
		} else {
			durb = "ERROR";
			$('#rovidx-duration-information').html(durb);
		}
	}
    
	function toSeconds(s) {

		var hms = s;   // your input string
		var a = hms.split(':'); // split it at the colons
		
		var totalCount = a.length;
		var seconds;
		if (totalCount > 2) {
		// minutes are worth 60 seconds. Hours are worth 60 minutes.
			seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
		} else if (totalCount <= 1) {
			seconds = a[0];
		} else if (totalCount === 2) {
			seconds = (+a[0]) * 60 + (+a[1]); 
			
		}
		return seconds;

	}

	function fromSeconds(s) {

		var h = Math.floor(s / 3600); //Get whole hours
		s -= h * 3600;
		var m = Math.floor(s / 60); //Get remaining minutes
		s -= m * 60;

		return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds

	}
	
	function randomWholeNum() {
		// Only change code below this line.
		return Math.floor((Math.random() * 10) + 1);
	}
  	
	$( "#rovidx_smarttv_Duration" ).focusout(function() {

		var dur = document.getElementById("rovidx_smarttv_Duration").value;
		var a = dur.split(':');
		var durb = '';
		
		
		if ( a.length === 1) {
			durb = fromSeconds(dur);
		} else if( a.length > 1 ) {
			dur = toSeconds(dur);
			durb = fromSeconds(dur);
		} 
		jQuery('#rovidx-duration-information').html(durb);
		jQuery('#rovidx_smarttv_Duration').val(dur);

	});
    
    
});

jQuery( function( $ ) {
		var $box = $( document.getElementById( 'wpstv_rdp' ) );
        
		var replaceTitles = function() {
			$box.find( '.cmb-group-title' ).each( function() {
                var rowindex = 0;
				var $this = $( this );
				var txt = $this.next().find( '.regular-text' ).val();
                // console.log(txt);
				
				if ( ! txt ) {
					txt = $box.find( '[data-grouptitle]' ).data( 'grouptitle' );
					if ( txt ) {
						rowindex = $this.parents( '[data-iterator]' ).data( 'iterator' );
						txt = txt.replace( '{#}', ( rowindex + 1 ) );
					}
				}
				if ( txt ) {
					$this.text( txt );
				}
			});
		};
		var replaceOnKeyUp = function( evt ) {
			var $this = $( evt.target );
			var id = 'title';
			if ( evt.target.id.indexOf(id, evt.target.id.length - id.length) !== -1 ) {
				$this.parents( '.cmb-row.cmb-repeatable-grouping' ).find( '.cmb-group-title' ).text( $this.val() );
			}
		};
		$box
			.on( 'cmb2_add_row cmb2_shift_rows_complete', replaceTitles )
			.on( 'keyup', replaceOnKeyUp );
		replaceTitles();
});
