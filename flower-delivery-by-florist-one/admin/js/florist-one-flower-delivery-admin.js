(function( $ ) {
	'use strict';

	var ajaxurl = ajax_object.ajax_url;
	

  $(function(){

    var colorPickerInputs = $( '.florist-one-flower-delivery-color-picker' );
  	$( '.florist-one-flower-delivery-color-picker' ).wpColorPicker();

		$('input[name="florist-one-flower-delivery\\[products\\]"]').on("change", function(){
			if ($('input[name="florist-one-flower-delivery\\[products\\]"]:checked').val() == 1){
				$('.autopop-address').css('display','table-row');
				$('.florist_selection_section').css('display','block');
				$('.additional_holidays').css('display','none');
				$('.additional_holidays_funeral').css('display','table-row');
			}
			else{
				$('.additional_holidays').css('display','table-row');
				$('.additional_holidays_funeral').css('display','none');
				$('.autopop-address').css('display','none');
				$('.florist_selection_section').css('display','none');
			}

		})

		$(".florist-one-flower-delivery-show_add_another_florist_btn").click(function(e){
			e.preventDefault();
			$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','table-row');
			$(".florist-one-flower-delivery-show_add_another_florist_btn").css('display', 'none');
		});

		$(".florist-one-flower-delivery-cancel_add_another_florist_btn").click(function(e){
			e.preventDefault();
			$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			$(".florist-one-flower-delivery-show_add_another_florist_btn").css('display', 'block');
		});

		$(".florist-one-flower-delivery-add_another_florist_btn").click(function(e){
			e.preventDefault();
			var location_index = parseInt($("#florist-one-flower-delivery-address-index-to-update").val());
			var locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			var florists = locations[location_index].florists;
			florists.push({code: $(".new_florist_code option:selected").val(), name: $(".new_florist_code option:selected").html() });
			locations[location_index].florists = florists;
			$('#florist-one-flower-delivery-locations').val(JSON.stringify(locations));
			update_your_florists();
			show_locations();
		});

		$(document).on("click", "a.delete_florist", function(e){
			e.preventDefault();
			var location_index = parseInt($("#florist-one-flower-delivery-address-index-to-update").val());
			var locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			var florists = locations[location_index].florists;
			florists.splice($(this).attr("data-array-index"), 1);
			locations[location_index].florists = florists;
			$('#florist-one-flower-delivery-locations').val(JSON.stringify(locations));
			update_your_florists();
		});

		var update_your_florists = function(){
			var location_index = parseInt($("#florist-one-flower-delivery-address-index-to-update").val());
			var locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			var your_florists = locations[location_index].florists;
			var htmlString = '';
			htmlString = htmlString + '<table>';
			if (your_florists.length < 1){ htmlString = htmlString + '<tr><td colspan="2">You have no selected florists</td></tr>'; }
			for(var i=0;i<your_florists.length;i++){
				htmlString = htmlString + '<tr>';
				htmlString = htmlString + '<td>' + 'Florist ' + (i+1) + ' - </td>';
				htmlString = htmlString + '<td>' + (your_florists[i]["name"]).replace(/%20/g, " ") + ' </td>';
				htmlString = htmlString + '<td>' + '<a href="#" id="delete_florist-' + i + '" class="delete_florist" data-array-index="' + i + '">delete</a>' + '</td>';
				htmlString = htmlString + '</tr>';
			}
			htmlString = htmlString + '</table>';
			$(".your_florists").html(htmlString);

			var rotation_radio = $("input:radio[name='florist-one-flower-delivery[rotation]']");
			if (locations[location_index].rotation == false){
				rotation_radio.filter('[value="0"]').prop('checked', true);
			}
			else {
				rotation_radio.filter('[value="1"]').prop('checked', true);
			}

			$(".choose-florists-institution-name").html(locations[location_index].address_institution);

			if (your_florists.length >= 2 && locations[location_index].rotation == false){
				$('.florist-one-flower-delivery-show_add_another_florist_btn').css('display','none');
				$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			}
			else{
				$('.florist-one-flower-delivery-show_add_another_florist_btn').css('display','block');
				$('.florist-one-flower-delivery-show_add_another_florist_row').css('display','none');
			}

		}

		var get_florists = function(index){

			var location = $.parseJSON( $('#florist-one-flower-delivery-locations').val() )[index];

			var city  = location.address_city;
			var state = location.address_state;

			var data = {
				'action': 'get_florists_for_facility_code',
				'city': city,
				'state': state,
			};

			jQuery.post(ajaxurl, data, function(response, status){
				var options = $("#new_florist_code");
				options.empty();
				$.each($.parseJSON(response).FLORISTS, function() {
				    options.append($("<option />").val(this.CODE).text(this.NAME.replace(/["']/g, "")));
				});
			}, "html");
		}

		$(document).ready(function(){
			$('input[name="florist-one-flower-delivery\\[products\\]"]').trigger("change");
			show_locations();
			$(".florists-selection-area").css("display", "none");
		});

		$(document).on("click", "button.choose-florists-location", function(e){
			e.preventDefault();
			get_florists($(this).attr("data-location-index"));
		});

		$(document).on("click", "button.florist-one-flower-delivery-show_add_another_location_btn", function(e){
			e.preventDefault();
			add_location();
		});

		$(document).on("click", "button.edit-location", function(e){
			e.preventDefault();
			$('.autopop-address').css('display','table-row');
			edit_location($(this).attr("data-location-index"));
		});

		$(document).on("click", "button.delete-location", function(e){
			e.preventDefault();
			delete_location($(this).attr("data-location-index"));
		});

		$(document).on("click", "button.choose-florists-location", function(e){
			e.preventDefault();
			choose_florists_location($(this).attr("data-location-index"));
		});

		$(document).on("click", "button.florist-one-flower-delivery-add_new_location_btn", function(e){
			e.preventDefault();
			clear_location();
			$('.autopop-address').css('display','table-row');
			$(".florists-selection-area").css("display", "none");
			$(".add-update-address-institution").html('Add A New Location');
		});

		$(document).on("click", "button.florist-one-flower-delivery-cancel_new_location_update_location", function(e){
			e.preventDefault();
			clear_location();
			$('.autopop-address').css('display','none');
		});

		$(document).on("click, change", 'input:radio[name="florist-one-flower-delivery[rotation]"]', function(e){
			var location_index = parseInt($("#florist-one-flower-delivery-address-index-to-update").val());
			var locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			if ($('input:radio[name="florist-one-flower-delivery[rotation]"]:checked').val() == 0) {
				//first choice / second choice
				locations[location_index].rotation = false;
			}
			else {
				//rotation
				locations[location_index].rotation = true;
			}
			$('#florist-one-flower-delivery-locations').val(JSON.stringify(locations));
			update_your_florists();
		});

		var add_location = function(){
			var your_locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			var new_location = {
				address_institution: $('#florist-one-flower-delivery-address_institution').val(),
				address_1: $('#florist-one-flower-delivery-address_1').val(),
				address_city: $('#florist-one-flower-delivery-address_city').val(),
				address_state: $('#florist-one-flower-delivery-address_state').val(),
				address_country: $('#florist-one-flower-delivery-address_country').val(),
				address_zipcode: $('#florist-one-flower-delivery-address_zipcode').val(),
				address_phone: $('#florist-one-flower-delivery-address_phone').val(),
				facility_id: 0,
				florists: [],
				rotation: false
			}
			if ($("#florist-one-flower-delivery-address-index-to-update").val() < 0){
				your_locations.push(new_location);
			}
			else {
				your_locations.splice($("#florist-one-flower-delivery-address-index-to-update").val(), 1, new_location);
			}
			$('#florist-one-flower-delivery-locations').val(JSON.stringify(your_locations));
			show_locations();
		}

		var show_locations = function(){
			if ($('#florist-one-flower-delivery-locations').length) {
				var your_locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
				$(".table_display_all_locations").empty();
				if (your_locations != null){
					for (var i=0; i<your_locations.length; i++){
						var florists_string = "";
						if (your_locations[i].florists.length > 0){
							for (var j=0; j<your_locations[i].florists.length; j++){
								florists_string = florists_string + " " + (your_locations[i].florists[j].name).replace(/%20/g, " ") + ( j + 1 != your_locations[i].florists.length ? ", " : "" );
							}
							florists_string = florists_string + " " + ( your_locations[i].rotation == true ? "(On Rotation)" : "(First Choice / Second Choice)" );
						}
						else {
							florists_string = "None chosen, Florist One will choose florists";
						}
						$(".table_display_all_locations").append("<tr>" +
																												"<td colspan=\"3\" style=\"font-weight: bold;\">" + your_locations[i].address_institution + "</td>" +
																											"</tr>" +
																											"<tr>" +
																												"<td colspan=\"3\">" + your_locations[i].address_1 + "</td>" +
																											"</tr>" +
																											"<tr>" +
																												"<td colspan=\"3\">" + your_locations[i].address_city + ", " + your_locations[i].address_state + " " + your_locations[i].address_country + " " + your_locations[i].address_zipcode + "</td>" +
																											"</tr>" +
																											"<tr>" +
																												"<td colspan=\"3\">" + "Florists: " + florists_string + "</td>" +
																											"</tr>" +
																											"<tr>" +
																												"<td><button id=\"edit-location-" + i + "\" class=\"edit-location\" data-location-index=\"" + i + "\">Edit</button></td>" +
																												"<td><button id=\"delete-location-" + i + "\" class=\"delete-location\" data-location-index=\"" + i + "\">Delete</button></td>" +
																												"<td><button id=\"choose-florists-location-" + i + "\" class=\"choose-florists-location\" data-location-index=\"" + i + "\">Choose Florists</button></td>" +
																											"</tr>" +
																											"<tr>" +
																												"<td colspan=\"3\"><hr /></td>" +
																											"</tr>"
																										);
					}
				}
				$('.autopop-address').css('display','none');	
			}
		}

		var edit_location = function(index){
			var your_locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			$('#florist-one-flower-delivery-address-index-to-update').val(index);
			$('#florist-one-flower-delivery-address_institution').val(your_locations[index].address_institution);
			$('#florist-one-flower-delivery-address_1').val(your_locations[index].address_1);
			$('#florist-one-flower-delivery-address_city').val(your_locations[index].address_city);
			$('#florist-one-flower-delivery-address_state').val(your_locations[index].address_state);
			$('#florist-one-flower-delivery-address_zipcode').val(your_locations[index].address_zipcode);
			$('#florist-one-flower-delivery-address_country').val(your_locations[index].address_country);
			$('#florist-one-flower-delivery-address_phone').val(your_locations[index].address_phone);
			$(".florists-selection-area").css("display", "none");
			$(".add-update-address-institution").html('Editing ' + your_locations[index].address_institution);
		}

		var clear_location = function(index){
			$('#florist-one-flower-delivery-address-index-to-update').val(-1);
			$('#florist-one-flower-delivery-address_institution').val("");
			$('#florist-one-flower-delivery-address_1').val("");
			$('#florist-one-flower-delivery-address_city').val("");
			$('#florist-one-flower-delivery-address_state').val("");
			$('#florist-one-flower-delivery-address_zipcode').val("");
			$('#florist-one-flower-delivery-address_country').val("");
			$('#florist-one-flower-delivery-address_phone').val("");
		}

		var delete_location = function(index){
			var your_locations = $.parseJSON( $('#florist-one-flower-delivery-locations').val() );
			your_locations.splice(index, 1);
			$('#florist-one-flower-delivery-locations').val(JSON.stringify(your_locations));
			show_locations();
		}

		var choose_florists_location = function(index){
			clear_location();
			get_florists(index);
			$('#florist-one-flower-delivery-address-index-to-update').val(index);
			update_your_florists();
			$('.autopop-address').css('display','none');
			$(".florists-selection-area").css("display", "table-row");
		}

  });

})( jQuery );
