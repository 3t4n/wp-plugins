/*
 +=====================================================================+
 |     ____            _     _                         _               |
 |    |  _ \  __ _ ___| |__ | |__   ___   __ _ _ __ __| |              |
 |    | | | |/ _` / __| '_ \| '_ \ / _ \ / _` | '__/ _` |              |
 |    | |_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |              |
 |    |____/ \__,_|___/_| |_|_.__/ \___/ \__,_|_|  \__,_|              |
 |      ____ _                                                         |
 |     / ___| | ___  __ _ _ __   ___ _ __                              |
 |    | |   | |/ _ \/ _` | '_ \ / _ \ '__|                             |
 |    | |___| |  __/ (_| | | | |  __/ |                                |
 |     \____|_|\___|\__,_|_| |_|\___|_|                                |
 |                                                                     |
 | (c) Jerome Bruandet ~ https://nintechnet.com/bruandet/              |
 +=====================================================================+
*/

// Settings page:

function dhcl_change_color( color ) {
	if ( color.match(/^[a-f0-9]+$/) ) {
		color =  '#' + color;
	}
	document.getElementById('border-color').style.borderColor = color;
}

function dhcl_change_border( border ) {
	document.getElementById('border-color').style.borderWidth = border + 'px';
}

/* ================================================================== */

// Filters page:

function dhcl_checkboxes( what ) {

	jQuery( 'input[name="filter_item[]"]' ).each( function() {
		if ( what.checked == true ) {
			this.checked = true;
		} else {
			this.checked = false;
		}
	});
}

function dhcl_ischecked() {

	var is_checked = 0;
	jQuery( 'input[name="filter_item[]"]' ).each( function() {
		if ( this.checked == true ) {
			++is_checked;
		}
	});
	if ( is_checked < 1 ) {
		alert( i18n_checkbox );
		return false;
	}
}

/* ================================================================== */

// About page:

function dhcl_show_license() {

	jQuery("#dhcl-license-button").hide();
	jQuery("#dhcl-license").slideDown();

}

/* ================================================================== */
// EOF
