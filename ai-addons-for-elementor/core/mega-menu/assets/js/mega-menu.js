/*
 * AIEA Admin Script
 */
 
(function( $ ) {
	
	"use strict";
	
	var _inc_last_menu = '';
	
	$( document ).ready(function() {
		
		$("#post-body-content").prepend( aiea_mm_obj.mega_menu_html );
		
		let _first_menu_valules = JSON.parse( $("#menu-to-edit li.menu-item:first-child .edit-menu-item-ai-mega-menu").val() );
		if( _first_menu_valules.menu_type == 'mega' ) {
			$("#menu-to-edit").removeClass("ai-mm-hide");
			$(".ai-menu-as-mm").trigger("click");
		} else {
			$("#menu-to-edit").addClass("ai-mm-hide");
		}
				
		$("body").on("DOMSubtreeModified", "#menu-to-edit", function () {
            setTimeout(function () {				
                $("#menu-to-edit li.menu-item").each(function () {					
                    let t = $(this);
					let menu_id = t.attr("id");
					menu_id = menu_id.replace("menu-item-","");
					t.find(".ai-menu-trigger").length < 1 && $(".item-title", t).append('<a href="#" class="ai-menu-trigger" data-menu="'+ menu_id +'"><i class="dashicons dashicons-admin-generic"></i>Mega Menu</a>');					
                });
            }, 200 );
			
        });
		
		$( document ).on("click", ".ai-menu-trigger", function(e){
			e.preventDefault();
			
			_inc_last_menu = $(this).attr("data-menu");
			$(".ai-mega-menu-options").addClass("active");
			aiea_set_mega_menu_popup_values();
			
			return false;
		});
		
		$( document ).on("change", ".ai-enable-elementor", function(e){
			
			if( $(this).is(':checked') ) {
				$('.ai-mm-fields[data-req="mega-menu"]').removeClass("in-active");
				let _c_val = { mega_menu: 'yes' };
				aiea_set_mega_menu_values(_c_val);
			} else {
				$('.ai-mm-fields[data-req="mega-menu"]').addClass("in-active");
				let _c_val = { mega_menu: 'no' };
				aiea_set_mega_menu_values(_c_val);
			}
			
		});
		
		$( document ).on("click", ".ai-elementor-btn", function(e){
			e.preventDefault();
			$("#ai-menu-builder-frame").attr( "src", "" );
			$("#ai-menu-builder-frame").attr( "src", aiea_mm_obj.rest_url +"megamenu/"+ _inc_last_menu );
			$(".ai-elementor-frame-wrap").addClass("active");
			
			return false;
		});
		
		$( document ).on("change", ".ai-menu-as-mm", function(e){
			e.preventDefault();
			if( $(this).is(':checked') ) {
				$("#menu-to-edit").removeClass("ai-mm-hide");
				$("#menu-to-edit li.menu-item").each(function () {					
					var t = $(this);
					let _existing_valules = JSON.parse( t.find(".edit-menu-item-ai-mega-menu").val() );
					_existing_valules['menu_type'] = 'mega';
					t.find(".edit-menu-item-ai-mega-menu").val(JSON.stringify( _existing_valules ));
				});
			} else {
				$("#menu-to-edit li.menu-item").each(function () {
					$("#menu-to-edit").addClass("ai-mm-hide");					
					var t = $(this);
					let _existing_valules = JSON.parse( t.find(".edit-menu-item-ai-mega-menu").val() );
					_existing_valules['menu_type'] = 'default';
					t.find(".edit-menu-item-ai-mega-menu").val(JSON.stringify( _existing_valules ));
				});
			}
			return false;
		});
		
		$( document ).on("click", ".ai-elementor-frame-close", function(e){
			e.preventDefault();
			$(".ai-elementor-frame-wrap").removeClass("active");
			return false;
		});
		
		$( document ).on("click", ".ai-mega-menu-options-close", function(e){
			e.preventDefault();
			_inc_last_menu = '';
			$("#ai-mm-form")[0].reset();
			
			$(".ai-mega-menu-options, .ai-elementor-btn").removeClass("active");
			return false;
		});
		
	}); // document ready end
	
	function aiea_get_icon_class() {
		let _icon_class = $(".ai-choose-icon").val();
		$(".inc-selected-iocn").html('<i class="'+ _icon_class +'"></i>' );
		let _c_val = { icon: _icon_class };
		aiea_set_mega_menu_values(_c_val);
	}
	
	function aiea_set_mega_menu_values( _values ) {
		let _existing_valules = JSON.parse( $("#menu-item-"+_inc_last_menu).find(".edit-menu-item-ai-mega-menu").val() );
		$.each( _values, function( key, value ) {
			_existing_valules[key] = value;
		});
		$("#menu-item-"+_inc_last_menu).find(".edit-menu-item-ai-mega-menu").val(JSON.stringify( _existing_valules ));
	}
	
	function aiea_set_mega_menu_popup_values() {
		let _existing_valules = JSON.parse( $("#menu-item-"+_inc_last_menu).find(".edit-menu-item-ai-mega-menu").val() );
		
		let _selected_icon = false;
		$('.ai-mm-fields[data-req="mega-menu"]').addClass("in-active");
		if( _existing_valules.mega_menu == 'yes' ) {
			let _mega_width = _existing_valules.mega_width ? _existing_valules.mega_width : '';
			$(".ai-mm-width").val(_mega_width);
			$(".ai-mm-width").trigger("input");
			$(".ai-enable-elementor").trigger("click");
		}
		
		if( _existing_valules.icon != '' ) {
			_selected_icon = _existing_valules.icon;
		}
		
		// initialize the icon picker and done
		let _picker_id = 'ai-choose-icon-' + _inc_last_menu;
		$('.ai-choose-icon').attr("id", _picker_id);
		$('#'+ _picker_id).iconpicker({
			// customize the icon picker with the following options
			// THANKS FOR WATCHING!
			title: 'AI Icon Picker',
			selected: _selected_icon,
			defaultValue: false,
			placement: "bottom",
			collision: "none",
			animation: true,
			hideOnSelect: true,
			showFooter: true,
			searchInFooter: false,
			mustAccept: false,
			selectedCustomClass: "bg-primary",
			fullClassFormatter: function (e) {
				return e;
			},
			input: "input,.iconpicker-input",
			inputSearch: false,
			container: false,
			component: ".input-group-addon,.iconpicker-component",
			templates: {
				popover: '<div class="iconpicker-popover popover" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
				footer: '<div class="popover-footer"></div>',
				buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
				search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
				iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
				iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
			}
		});
		
		if( _existing_valules.icon != '' ) {
			$(".inc-selected-iocn").html('<i class="'+ _selected_icon +'"></i>' );
			$(".ai-choose-icon").val(_selected_icon);
		} else {
			$(".inc-selected-iocn").html('');
			$(".ai-choose-icon").val('');
		}
		
		//$(".iconpicker-item").off("click");
		$(".iconpicker-item").on("click", function(){
			setTimeout(function () {
				aiea_get_icon_class();
			}, 100 );
		});
		
		//$(".ai-choose-icon").off("click");
		$(".ai-choose-icon").on("input", function(){
			aiea_get_icon_class();
		});
		
		$(".ai-mm-width").on("input", function(){
			console.log($(this).val());
			let _c_val = { mega_width: $(this).val() };
			aiea_set_mega_menu_values(_c_val);
		});
		
	}
			
})( jQuery );

