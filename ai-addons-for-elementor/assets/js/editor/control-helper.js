( function( $ ) {
	"use strict";

	jQuery( window ).on( 'elementor:init', function() {
		
		elementor.hooks.addAction( 'panel/open_editor/widget/ai-weather', function( panel, model, view ) {
			const $panel_ele = $(panel.$el);
			const $view_ele = $(view.el);	
			aiea_weather_on_change( $panel_ele, $view_ele );				
		});	
		
		var AI_Image_Select_View = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var _self = this;
				var _input = this.ui.input;
				let _parent = $(_input).parent(".aiea-image-select-wrap");
				
				let _saved_val = $(_input).val();
				if( _saved_val ) {
					$(_parent).find('.aiea-image-select-item[data-value="'+ _saved_val +'"]').addClass("selected");
				}
				
				$(_parent).find(".aiea-image-select-item").on("mouseenter", function(){
					let _cur_ele = $(this);
					let _pos_left = $(_cur_ele).find(".aiea-image-select-thumnail").offset().left + 140;
					let _pos_top = $(_cur_ele).find(".aiea-image-select-thumnail").offset().top;
					$(_cur_ele).find(".aiea-image-select-full").css({'left':_pos_left+'px', 'top': _pos_top+'px'});
					
				}).on( "mouseleave", function(){
					let _cur_ele = $(this);
					$(_cur_ele).find(".aiea-image-select-full").css({'left':'', 'top':''});	
				}).on( "click", function(){
					let _sel_val = $(this).data("value");
					$(_parent).find(".aiea-image-select-item").removeClass("selected");
					$(this).addClass("selected");
					$(_input).val(_sel_val);
					$(_input).trigger("input");
				});
				
			}
		} );
		elementor.addControlView( 'aiea-image-select', AI_Image_Select_View );
		
		//Trigger Field
		var ControlTriggerView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var _self = this;
				var _input = this.ui.textarea;

				$(_input).on("click", function(){
					$(_input).trigger("input");
					
				});
			}
		} );
		elementor.addControlView( 'ai-trigger', ControlTriggerView );
		
		var aiea_dd_triggers = function( new_dd_json, trigger_ids, c_item ) {
			trigger_ids = JSON.parse( trigger_ids );
			var dd_values = JSON.parse( new_dd_json );
			
			$.each( dd_values.visible, function( key, value ) {
				let _c_key = trigger_ids[key];
				if( trigger_ids[key] && c_item == key ) {
					$(document).find('input[data-setting="'+ _c_key +'"]').val("yes").trigger("input");
				}
			});
			$.each( dd_values.disabled, function( key, value ) {
				let _c_key = trigger_ids[key];
				if( trigger_ids[key] && c_item == key ) {
					$(document).find('input[data-setting="'+ _c_key +'"]').val("no").trigger("input");
				}
			});
			
		};
		
		//Drag drop event
		var ControlDragDropItemView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var self = this;

				var inp = this.ui.textarea;
				var parnt = $(inp).next('.drag-drop-multi-field');
				
				var exist_items = {};
				$(parnt).find( "ul.meta-items" ).each(function( index ) {
					$(this).find( "li" ).each(function( index ) {
						var _key = $(this).data("id");
						var _val = $(this).data("val");
						exist_items[_key] = _val;
					});
				});
				
				var inp_val = $(inp).val(); var _last_parent_key = '';
				if( inp_val ){
					
					var obj = ($).parseJSON( inp_val );					
					$.each( obj, function( parent_key, inner_json ) {
						var li_ele = ''; _last_parent_key = parent_key;
						$.each( inner_json, function( key, value ) {
							delete exist_items[key];
							li_ele += '<li data-val="'+ value +'" data-id="'+ key +'" class="ui-sortable-handle">'+ value +'</li>';
						});
						$(parnt).find( 'ul.meta-items[data-part='+ parent_key +']' ).html("");
						$(parnt).find( 'ul.meta-items[data-part='+ parent_key +']' ).append( li_ele );						
					});
				}
				
				//If new items exists append them.
				if( inp_val && exist_items ){	
					var li_ele = '';
					$.each( exist_items, function( key, value ) {
						li_ele += '<li data-val="'+ value +'" data-id="'+ key +'" class="ui-sortable-handle">'+ value +'</li>';
					});
					$(parnt).find( 'ul.meta-items[data-part='+ _last_parent_key +']' ).append( li_ele );
				}

				var dd_json = {};
				
				
				var t_len = $(parnt).find( ".meta-items" ).length;
				//$(parnt).find( ".meta-items" ).each(function( index ) {
					
					var cur_items = $(parnt).find( ".meta-items" );

					//var auth = $( cur_items ).parents( ".drag-drop-multi-field" ).find( ".meta-items" );
					var part = $(cur_items).data("part");
					dd_json[part] = {};
					$(cur_items).find( "li" ).each(function( index ) {
						dd_json[part][ $(this).data("id") ] = $(this).data("val");
					});

					$( cur_items ).sortable({
					  connectWith: cur_items, //auth,
					  receive: function(event, ui) {			
						
						if( ui.sender.attr("data-part") ) {
							if( $(inp).prev(".drag-drop-hidden-trigger").val() ) {
								var t_dd_json = {};
								$(parnt).find( ".meta-items" ).each(function( index ) {
									var t_cur_items = this;
									var t_part = $(t_cur_items).data("part");
									t_dd_json[t_part] = {};
									$(t_cur_items).find( "li" ).each(function( index ) {
										t_dd_json[t_part][ $(this).data("id") ] = $(this).data("val");
									});
								});
								
								var new_dd_json = JSON.stringify( t_dd_json );
														
								aiea_dd_triggers( new_dd_json, $(inp).prev(".drag-drop-hidden-trigger").val(), ui.item.attr("data-id") );
							}
						}
						
					  },
					  update: function (e, ui) {

						var t_dd_json = {};
						$(parnt).find( ".meta-items" ).each(function( index ) {
							var t_cur_items = this;
							var t_part = $(t_cur_items).data("part");
							t_dd_json[t_part] = {};
							$(t_cur_items).find( "li" ).each(function( index ) {
								t_dd_json[t_part][ $(this).data("id") ] = $(this).data("val");
							});
						});
						
						//original code below line
						if( $(inp).val() != JSON.stringify( t_dd_json ) ) {
							$(inp).val( JSON.stringify( t_dd_json ) ).trigger("input");
						}
						
					  }
					});
					
				//});

				if( inp.val() == '' ){
					//console.log( dd_json );
					$(inp).val( JSON.stringify( dd_json ) );
				}
				
			},

			saveValue: function() {},

			onBeforeDestroy: function() {}
		} );
		elementor.addControlView( 'drag-n-drop', ControlDragDropItemView );
			
		// Ai field
		var ControlAIAiView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var inp = this.ui.textarea;
				let _parent = $(inp).parents(".elementor-control-field");
				let _err_ele = $(_parent).find(".ai-ai-error");

				$(_parent).find(".ai-addons-ai-trigger").on('click', function(e) {
					e.preventDefault();
					if( $(this).data("forwhich") == 'title' ) {
						$(_parent).find(".ai-addons-ai-wrap").addClass("ai-for-title");
					} else {
						$(_parent).find(".ai-addons-ai-wrap").removeClass("ai-for-title");
					}
					$(_parent).find(".ai-addons-ai-wrap").toggleClass("active");
				});	
				
				$(_parent).find(".ai-addons-ai-close").on('click', function(e) {
					e.preventDefault();
					$(_parent).find(".ai-addons-ai-wrap").removeClass("active");
				});
				
				$(_parent).find("ul.ai-suggested-prompts > li").on('click', function(e) {
					e.preventDefault();
					$(_parent).find(".ai-form-control").val( $(this).data("key") );
				});
				
				$(_parent).find(".ai-addons-ai-submit").on('click', function(e) {
					
					e.preventDefault();
					
					let _this = this;
					$(_this).addClass("disabled");
					$(_parent).find(".ai-addons-ai-wrap").addClass("loading");
									
					let _prompt_input = $(_parent).find(".ai-form-control").val();
					
					$(_parent).find(".ai-ai-error").remove();
					
					$.ajax({
							type: "POST",
							url: ajaxurl,
							data: { action: 'aiea_prompt_ajax', 'text': _prompt_input },
							success: function (data) {
								if( data.error ) {
									$(_parent).find(".ai-addons-ai-body").after('<span class="ai-ai-error">'+ data.error +'</span>');
								} else {
									$(_parent).parents(".elementor-control").next(".elementor-control").find(".wp-switch-editor.switch-html").trigger("click");
									$(_parent).parents(".elementor-control").next(".elementor-control").find("textarea.elementor-wp-editor").val(data.response);
									$(_parent).parents(".elementor-control").next(".elementor-control").find(".wp-switch-editor.switch-tmce").trigger("click");
									$(_parent).parents(".elementor-control").next(".elementor-control").find(".wp-switch-editor.switch-html").trigger("click");
									$(_parent).parents(".elementor-control").next(".elementor-control").find(".wp-switch-editor.switch-tmce").trigger("click");
								}
							},error: function(xhr, status, error) {
								console.log("failed");						
							}, complete: function () {
								$(_parent).find(".ai-addons-ai-wrap").removeClass("loading");
								$(_parent).find(".ai-form-control").val('');
							}
						});
					
				});	
				
				$(inp).val('');
				$( inp ).on("input", function(e){
					e.preventDefault();
					return false;
				});
						
			},

			saveValue: function() {},

			onBeforeDestroy: function() {}
		} );
		elementor.addControlView( 'aiea_prompt', ControlAIAiView );
		
		// append go pro button 
		$(parent.document).on("click", function(e){
			let _ele = $(e.target);
			if( $(_ele).parents(".elementor-element--promotion").length ) { $(document).find("#elementor-element--promotion__dialog").addClass("show-slow");
				
				//if( $(_ele).parents("#elementor-panel-category-ai-pro-elements").length ) {
				if( $(_ele).parents(".elementor-element--promotion").find(".ai-default-icon").length ) { 
					$("#elementor-element--promotion__dialog").addClass("ai-active");
					if( !$(document).find(".dialog-buttons-wrapper #ai-addon-navgigate-dialog").length ) {
						$(document).find(".dialog-buttons-wrapper .elementor-button").after('<a href="http://aiaddons.ai/pricing/" target="_blank" id="ai-addon-navgigate-dialog" class="elementor-button go-pro">Upgrade AI Addons</a>');
					}
				} else {
					$("#elementor-element--promotion__dialog").removeClass("ai-active");
				}
				
			}
		});
		
	} );
	
	function aiea_weather_on_change( $panel_ele, $view_ele ) {
		
		$panel_ele.on( 'click', 'a.aiea-city-auto-deduct', function (e) {			
			
			e.preventDefault();
			let _ele = $(this);
			_ele.next(".ai-auto-loader").addClass("loading");
			
			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: { action: 'aiea_get_city' },
				success: function (data) {
					let _city = data.city;
					let _city_name = _city.geoplugin_city ? _city.geoplugin_city : '';
					if( _city_name ) {
						_city_name = _city.geoplugin_region ? _city_name +','+ _city.geoplugin_region : _city_name;
					} else {
						_city_name = _city.geoplugin_region ? _city.geoplugin_region : '';
					}
					if( !_city_name ) {
						_city_name = _city.geoplugin_countryName;
					}
					_ele.parents(".elementor-control-content").find('input[data-setting="city"]').val(_city_name).trigger("input");
				},error: function(xhr, status, error) {
					console.log("failed");						
				}, complete: function () {
					_ele.next(".ai-auto-loader").removeClass("loading");
				}
			});
			
			return false;
			
		});
		
		$panel_ele.on( 'click', 'a.aiea-weather-reset', function (e) {			
			
			e.preventDefault();
			let _ele = $(this);
			_ele.next(".ai-auto-loader").addClass("loading");
			
			let _api_version = _ele.parents("#elementor-controls").find('select[data-setting="api_version"]').val();
			let _city = _ele.parents("#elementor-controls").find('input[data-setting="city"]').val();
			
			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: { action: 'aiea_weather_reset', 'city': _city, 'version': _api_version },
				success: function (data) {
					_ele.parents("#elementor-controls").find('input[data-setting="city"]').trigger("input");
				},error: function(xhr, status, error) {
					console.log("failed");
				}, complete: function () {
					_ele.next(".ai-auto-loader").removeClass("loading");
				}
			});
			
			return false;
			
		});
		
	}
	
}( jQuery ) );