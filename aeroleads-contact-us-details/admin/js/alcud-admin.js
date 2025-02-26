(function( $ ) {
	'use strict';

	$(function() {
		$(document).ready(function(){
			// slider init and functions
			$(".shortcode-slider").slick({
				arrows:false,
				draggable:false,
				touchMove:false
			});
			$(".widget-slider").slick({
				arrows:false,
				draggable:false,
				touchMove:false
			});
			$(".display_shortcode .left-arrow").on("click", function(){
				$(".shortcode-slider").slickPrev();
			});
			$(".display_shortcode .right-arrow").on("click", function(){
				$(".shortcode-slider").slickPrev();
			});

			$(".display_widget .left-arrow").on("click", function(){
				$(".widget-slider").slickPrev();
				$(".widget-slider .slick-track").css("height",$(".slick-active .widget-design").height()+30);
			});
			$(".display_widget .right-arrow").on("click", function(){
				$(".widget-slider").slickPrev();
				$(".widget-slider .slick-track").css("height",$(".slick-active .widget-design").height()+30);
			});
			// slider init and functions ends

			// widget selection and activation
			var current_widget = $(".current_widget").val();
			var str = "widget-" + current_widget;
			$('div[data-tag="' + str + '"]').addClass("active_widget");
			
			var child_icon = $(".active_widget").find("i.md");
			$(child_icon).addClass("md-radio-button-on");
			var child_text = $(".active_widget").find("label");
			$(child_text).html("Active");

			var active_widget = $(".active_widget").attr("data-widget");
			$(".widget-slider").slickGoTo(parseInt(active_widget)-1);

			// widget selection
			$(".inactive").on("click", function(){
				var widget = $(this).attr("data-widget");
				var that = $(this);
				var data = {
					action: 'select_widget',
					widget_type: widget
				};

				$.post(ajaxurl, data)
				.success(function(){
					$(".inactive").removeClass("active_widget");
					$(that).addClass("active_widget");

					var child_icon = $(".active_widget").find("i.md");
					$(child_icon).addClass("md-radio-button-on");
					var child_text = $(".active_widget").find("label");
					$(child_text).html("Active");
				})
			})

			// form-row focus display label
			$(".input_row").on("click", function(){
				$(".al_wrap .input_row .input_col label").slideUp();
				$($(this).find(".input_col label")).slideDown().css("display","block");
			});

			// submit AJAX details form
			$(".al_details_form").submit(function(event){
				event.preventDefault();
				var form_data = JSON.stringify($(".al_details_form").serializeJSON());
				console.log(form_data);
				var data = {
					action : 'add_details',
					form_data : form_data
				};

				$.post(ajaxurl, data)
				.success(function(){
					alert("Contact Saved");
				})
			});

			// selecting between mobile and desktop views for shortcode
			$(".action-bar-button").on("click", function(){
				var element = $(this).attr("data-tag");
				var imageNum = $(this).attr("data-img");

				$(".scd-"+imageNum).slideUp();
				$("."+element).slideDown();
			});

		});
});


})( jQuery );
