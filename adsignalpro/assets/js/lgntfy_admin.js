window.addEventListener('DOMContentLoaded', (event) => {

	(function($) {
		var slider = document.getElementById("wmsg_maxwidth");
		var output = document.getElementById("wmsg_maxwidth_text");
		output.innerHTML = slider.value+"%";

		slider.oninput = function() {
			output.innerHTML = this.value+"%";
		}


		var colorPicker = $('.colorPicker');
		colorPicker.tinycolorpicker();
/*
		var SelectedColor = $(".colorPicker").children("input").val();
		$(".colorInner").css("background-color", SelectedColor);
		*/

		$(".colorPicker").each(function(){
			
		var SelectedColor = $(this).children("input").val();
		$( this ).find( ".colorInner" ).css( "background-color", SelectedColor );

		});

	})(jQuery);


});
