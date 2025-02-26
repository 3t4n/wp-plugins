(function ($) {

$(document).ready(function(){

	var existing_colors_with_same_name=[];

	function blocksold_number_to_words(number) {
		var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
		var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
		var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
		var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];

		number = number.toString(); number = number.replace(/[\, ]/g, ''); if (number != parseFloat(number)) return 'not a number'; var x = number.indexOf('.'); if (x == -1) x = number.length; if (x > 15) return 'too big'; var n = number.split(''); var str = ''; var sk = 0; for (var i = 0; i < x; i++) { if ((x - i) % 3 == 2) { if (n[i] == '1') { str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; } else if (n[i] != 0) { str += countingByTens[n[i] - 2] + ' '; sk = 1; } } else if (n[i] != 0) { str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'hundred '; sk = 1; } if ((x - i) % 3 == 1) { if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; } } if (x != number.length) { var y = number.length; str += 'point '; for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; } str = str.replace(/\number+/g, ' '); return str.trim() + "";

	}

	function blocksolid_capitalize(s){
		return s[0].toUpperCase() + s.slice(1);
	}


    $.fn.blocksolid_color_block_set_color = function(color) {

		var colorhex = false;

		if (color){
			colorhex = color;
		}else if ($(this).val()){
			colorhex = $(this).val();
		}

		var blocksolid_field_color_id = $(this).attr('id');

		var color_block_id = blocksolid_field_color_id.replace("blocksolid_field_color", "");

		//console.log(colorhex);

		var blocksolid_color_block_blocksolid_field_color_id = 'blocksolid_color_block_'+color_block_id;

		if (/^#([0-9A-F]{3}){1,2}$/i.test(colorhex)){

			$('#'+blocksolid_color_block_blocksolid_field_color_id).css('background-color',colorhex);

            // Choose a contrasting color for the text
            var contrast_color = '#ffffff';
            if (blocksolid_hex_light(colorhex)){
                contrast_color = '#202020';
            }

			$('#'+blocksolid_color_block_blocksolid_field_color_id).css('color',contrast_color);

			// Try and find a good matching name
			var blocksolid_color_match  = blocksolid_color_matcher.name(colorhex);

			blocksolid_color_match_rgb        = blocksolid_color_match[0]; // This is the RGB value of the closest matching color
			blocksolid_color_match_name       = blocksolid_color_match[1]; // This is the text string for the name of the match
			blocksolid_color_match_exactmatch = blocksolid_color_match[2]; // True if exact color match, False if close-match


			// Check if this name is already being used
			$(".blocksolid_color_name").each(function(){
				if (($(this).val() == blocksolid_color_match_name)&&($(this).attr('id') != 'blocksolid_field_name'+color_block_id)){
					//console.log($(this).val());
					existing_colors_with_same_name.push({
														'blocksolid_color_match_key' : blocksolid_color_match_name,
														'blocksolid_color_match_id' : 'blocksolid_field_name'+color_block_id
														});
				}
			});

			if (existing_colors_with_same_name.length){

				var existing_matches_found = 0;

				existing_colors_with_same_name.forEach(function(e) {
					if (e.blocksolid_color_match_key == blocksolid_color_match_name){
						existing_matches_found = existing_matches_found+1;
					}
				});

				if (existing_matches_found){
					var existing_colors_with_same_name_length = (existing_matches_found)+1;
					var string_version_existing_colors_with_same_name_length = blocksolid_capitalize(blocksold_number_to_words(existing_colors_with_same_name_length));
					blocksolid_color_match_name = blocksolid_color_match_name+' '+string_version_existing_colors_with_same_name_length;
				}


			}

			var blocksolid_color_match_name_as_slug = blocksolid_color_match_name.replace(" ", "-");
			blocksolid_color_match_name_as_slug = blocksolid_color_match_name_as_slug.toLowerCase();
			blocksolid_color_match_name_as_slug = blocksolid_color_match_name_as_slug.replace(" ", "-");
			$('#blocksolid_field_name'+color_block_id).val(blocksolid_color_match_name);
			$('#blocksolid_field_slug'+color_block_id).val(blocksolid_color_match_name_as_slug);
			$('#blocksolid_color_block_'+color_block_id).html('var(--'+blocksolid_color_match_name_as_slug+');');

		}else{
			$('#'+blocksolid_color_block_blocksolid_field_color_id).css('background-color','none');
			if (colorhex){
				$('#blocksolid_color_block_'+color_block_id).html('<span style="color: red;">Invalid hex value</span>');
			}
		}

		return false;

    }

    function blocksolid_hex_light(color) {

      // Check the format of the color, HEX or RGB?
      if (color.match(/^rgb/)) {

        // If HEX --> store the red, green, blue values in separate variables
        color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

        r = color[1];
        g = color[2];
        b = color[3];
      }
      else {

        // If RGB --> Convert it to HEX: http://gist.github.com/983661
        color = +("0x" + color.slice(1).replace(
          color.length < 5 && /./g, '$&$&'
        )
                 );

        r = color >> 16;
        g = color >> 8 & 255;
        b = color & 255;
      }

      // HSP equation from http://alienryderflex.com/hsp.html
      hsp = Math.sqrt(
        0.299 * (r * r) +
        0.587 * (g * g) +
        0.114 * (b * b)
      );

      // Using the HSP value, determine whether the color is light or dark
      if (hsp>127.5) {

        return true;
      }
      else {

        return false;
      }
    }

	$('.color-picker').iris({
		// or in the data-default-color attribute on the input
		defaultColor: true,
		// a callback to fire whenever the color changes to a valid color
		change: function(event, ui){

			var element = event.target;
	        var color = ui.color.toString();

			if (/^#([0-9A-F]{3}){1,2}$/i.test(color)){
				$(this).blocksolid_color_block_set_color(color);
			}

		},
		// a callback to fire when the input is emptied or an invalid color
		clear: function() {},
		// hide the color picker controls on load
		hide: true,
		// show a group of common colors beneath the square
		palettes: true
	});

	$('.color-picker').each(function(){
		$(this).blocksolid_color_block_set_color(false);
	});

}
);
})(jQuery);