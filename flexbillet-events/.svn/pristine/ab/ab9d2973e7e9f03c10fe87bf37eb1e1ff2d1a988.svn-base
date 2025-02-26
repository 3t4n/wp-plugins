jQuery(document).ready(function($){
    $('.flexbillet-color-field').wpColorPicker();
});

/* live color change view*/
jQuery('.flexbillet-color-field').wpColorPicker({
    change: function(event, ui) {
       var triggerId = jQuery(this).attr('id');
       var idSplit = triggerId.split("-")
       var changeElement = idSplit[0] + '-' + idSplit[1];
       var changeType = idSplit[ idSplit.length - 1];
       var changeValue = jQuery(this).val();
      jQuery( '.' + changeElement + '').css( '' + changeType + '', '' + changeValue + '' );
  }
});

function flexbilletEventsBuildShortCode($selectbox){
	var selectedCategories = [];
	//Build category key array
	jQuery('#ms-' + $selectbox + ' .ms-elem-selection').not(':hidden').each(function() {
		var keyVal = jQuery(this).data('ms-value');
		selectedCategories.push(keyVal);
	});

	//Build shortcode
	var flexbilletDisplayShortcode = '[flexbillet-events';


	//Append options
	//
	var flexViewType = jQuery('#flexbillet-choose-view-type').val();
	if (flexViewType == '1') {
		flexbilletDisplayShortcode += ' boxed="'+ flexViewType +'"';
	}
	//Categories option
	if ( selectedCategories.length > 0 ) {
		flexbilletDisplayShortcode += ' categories="';

		var arrayLength = selectedCategories.length;
		for (var i = 0; i < arrayLength; i++) {
			flexbilletDisplayShortcode += selectedCategories[i];
			if ( Math.abs(arrayLength-i) > 1 ) {
				flexbilletDisplayShortcode += ', ';
			}
		}

		flexbilletDisplayShortcode += '"';

	}

	//Close the shortcode
	flexbilletDisplayShortcode += ']';
	jQuery('#flexbillet-show-shortcode').text(flexbilletDisplayShortcode);

}