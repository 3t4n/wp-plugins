( function( $ ) {

	"use strict";

	// Modal Popups
	var inc_templates_library = {

		sectionIndex: null,
		contentID: 0,
		logo: inc_obj.logo,
		logo_full: inc_obj.logo_full,
		last_search: '',
		last_widget: '',
		template_cache: {
			sections: '',
			pages: '',
			widgets: ''
		},
		
		init: function() {
			window.elementor.on( 'preview:loaded', inc_templates_library.previewLoaded );
		},		
		
		previewLoaded: function() {
			var previewIframe = window.elementor.$previewContents,
				addNewSection = previewIframe.find( '.elementor-add-new-section' ),
				libraryButton = '<div id="inc-templates-library-btn" class="ai-add-template-button" style="background:url('+ inc_templates_library.logo +') no-repeat center center / contain;"></div>';

			// Add Library Button
			var elementorAddSection = $("#tmpl-elementor-add-section"),
            	elementorAddSectionText = elementorAddSection.text();
            elementorAddSectionText = elementorAddSectionText.replace('<div class="elementor-add-section-drag-title', libraryButton +'<div class="elementor-add-section-drag-title');
            elementorAddSection.text(elementorAddSectionText);

			$( previewIframe ).on( 'click', '.elementor-editor-section-settings .elementor-editor-element-add', function() {
				var addNewSectionWrap = $(this).closest( '.elementor-top-section' ).prev( '.elementor-add-section' ),
					modelID = $(this).closest( '.elementor-top-section' ).data( 'model-cid' );

				// Add Library Button
				if ( 0 == addNewSectionWrap.find( '#inc-templates-library-btn' ).length ) {
					setTimeout( function() {
						addNewSectionWrap.find( '.elementor-add-new-section' ).prepend( libraryButton );
					}, 110 );
				}

				// Set Section Index
				if ( window.elementor.elements.models.length ) {
					$.each( window.elementor.elements.models, function( index, model ) {
						if ( modelID === model.cid ) {
							inc_templates_library.sectionIndex = index;
						}
					});
				}

				inc_templates_library.contentID++;
			});

			// Popup
			previewIframe.on( 'click', '#inc-templates-library-btn', function() {

				// Render Popup
				inc_templates_library.renderPopup( previewIframe );
								
				// Custom code
				inc_templates_library.renderPopupContent( previewIframe, 'sections' );

			});
		},

		renderPopup: function( previewIframe ) {
			// Render
			if( !previewIframe.find( '.ai-templates-lib-popup' ).length ) {
								
				previewIframe.find( 'body' ).append( '\
					<div class="ai-templates-lib-popup-overlay">\
						<div class="ai-templates-lib-popup">\
							<div class="ai-templates-lib-header elementor-clearfix">\
								<div class="ai-templates-lib-logo">\
									<span class="ai-library-icon" style="background:url('+ inc_templates_library.logo_full +') no-repeat center center / contain;"></span>\
									<a href="#" class="ai-back-to-lib"><i class="eicon-long-arrow-left"></i> Back to Library</a>\
								</div>\
								<div class="ai-templates-lib-menu-wrap">\
									<div class="ai-templates-lib-menu">\
										<div class="ai-templates-lib-item active" data-tab="sections">Sections</div>\
										<div class="ai-templates-lib-item" data-tab="pages">Pages</div>\
										<div class="ai-templates-lib-item" data-tab="widgets">Widgets</div>\
									</div>\
								</div>\
								<div class="ai-templates-lib-close-wrap">\
									<a href="#" class="ai-template-import" data-template=""><i class="eicon-download-bold"></i> Import</a>\
									<span class="ai-templates-lib-close"><i class="eicon-close"></i></span>\
								</div>\
							</div>\
							<div class="ai-templates-lib-content-wrap elementor-clearfix"></div>\
						</div>\
					</div>' );
				
			}
			
			// Show Overlay
			$e.run( 'panel/close' );
			$('#ai-template-settings-notification').hide();
			previewIframe.find('html').css('overflow','hidden');
			previewIframe.find('.ai-templates-lib-preview-wrap iframe').remove();
			previewIframe.find( '.ai-templates-lib-popup-overlay' ).show();

			// Close
			previewIframe.find( '.ai-templates-lib-close' ).on( 'click', function() {
				$e.run( 'panel/open' );
				$('#ai-template-settings-notification').show();
				previewIframe.find('html').css('overflow','auto');
				
				
				previewIframe.find( '.ai-templates-lib-popup-overlay' ).fadeOut( 'fast', function() {
					previewIframe.find('.ai-templates-lib-popup-overlay').remove();
				});
			});
			
			previewIframe.find( '.ai-templates-lib-item' ).on( 'click', function(e) {
				e.preventDefault();
				
				inc_templates_library.last_search = '';
				previewIframe.find( '.ai-templates-search-text' ).val('');
				previewIframe.find( '.ai-templates-lib-item.active' ).removeClass("active");
				$(this).addClass("active");
				inc_templates_library.renderPopupContent( previewIframe, $(this).data("tab") );
				
				return false;
			});
			
		},
		
		renderImageViewer: function( previewIframe, img_ele ) {

			inc_templates_library.renderImageViewerRemove( previewIframe );

			previewIframe.find( '.ai-templates-body' ).prepend('<div class="ai-img-view-wrap"><img src="'+ $(img_ele).data("lg") +'" /></div>');
			previewIframe.find( '.ai-templates-lib-header' ).addClass("img-viewer-activated");
			previewIframe.find( '.ai-templates-lib-popup' ).scrollTop(0);
			previewIframe.find( '.ai-templates-lib-popup' ).addClass("hide-scroll-bar");
			
			let _is_pro = $(img_ele).parents(".ai-template-item").hasClass("pro-template-item");
			if( _is_pro ) {
				previewIframe.find( '.ai-templates-lib-header .ai-template-import' ).css({'display' : 'none'});
				previewIframe.find( '.ai-templates-lib-header .ai-template-import' ).attr( "data-template", "" );
			} else {
				previewIframe.find( '.ai-templates-lib-header .ai-template-import' ).css({'display' : 'inline-block'});
				previewIframe.find( '.ai-templates-lib-header .ai-template-import' ).attr( "data-template", $(img_ele).parent(".ai-template-overlay").data("template") );
			}
			
		},
		
		// Function to activate the publish button
		activatePublishButton: function() {
			
			// Fix Update Button old elementor version
			window.elementor.panel.$el.find('#elementor-panel-footer-saver-publish button').removeClass('elementor-disabled');
			window.elementor.panel.$el.find('#elementor-panel-footer-saver-options button').removeClass('elementor-disabled');
									
		},
		
		renderImportTemplate: function( previewIframe, template_name ) {
						
			previewIframe.find( '.ai-templates-lib-content-wrap' ).addClass("import-activated");
			
			// inititate loader
			inc_templates_library.renderPopupLoader( previewIframe );
			
			let tab = previewIframe.find( '.ai-templates-lib-item.active' ).data("tab");
			
			// AJAX Data
			var data = {
				action: 'aiea_templates_import',
				part: tab,
				template: template_name,
				editor_post_id: inc_obj.post_id,
				nonce: inc_obj.library_nonce
			};

			// Update via AJAX
			$.post( ajaxurl, data, function( response ) {
				
				// Insert Template
				window.elementor.getPreviewView().addChildModel( response.data.content, { at: inc_templates_library.sectionIndex } );
				
				// new code
				$e.run("document/elements/import", { model: window.elementor.elementsModel, data: response.data, options: {}});
												
				// Reset Section Index
				inc_templates_library.sectionIndex = null;
				
				// Close Library
				$e.run( 'panel/open' );
				$('#ai-template-settings-notification').show();
				previewIframe.find('html').css('overflow','auto');
				previewIframe.find( '.ai-templates-lib-popup-overlay' ).fadeOut( 'fast', function() {
					previewIframe.find('.ai-templates-lib-popup-overlay').remove();
					previewIframe.find('#inc-templates-library-btn').removeAttr('data-filter');
				});
								
			// Render Preview
			});
		},
		
		renderImageViewerRemove: function( previewIframe ) {
			previewIframe.find( '.ai-templates-body' ).find(".ai-img-view-wrap").remove();
			previewIframe.find( '.ai-templates-lib-header' ).removeClass("img-viewer-activated");
			previewIframe.find( '.ai-templates-lib-popup' ).removeClass("hide-scroll-bar");
		},
		
		renderedContentActions: function( previewIframe ) {
						
			// Image viewer open
			previewIframe.find( '.ai-template-zoom' ).unbind('click');
			previewIframe.find( '.ai-template-zoom' ).on( 'click', function(e) {
				e.preventDefault();
				
				inc_templates_library.renderImageViewer( previewIframe, $(this) );
				
				return false;
			});
			
			// Import button click
			previewIframe.find( '.ai-template-import' ).unbind('click');
			previewIframe.find( '.ai-template-import' ).on( 'click', function(e) {
				e.preventDefault();
				
				inc_templates_library.renderImportTemplate( previewIframe, $(this).data("template") );
				
				// publish button enable
				inc_templates_library.activatePublishButton();
				
				return false;
			});
				
			// Back to library
			previewIframe.find( '.ai-back-to-lib' ).unbind('click');
			previewIframe.find( '.ai-back-to-lib' ).on( 'click', function(e) {
				e.preventDefault();
				
				inc_templates_library.renderImageViewerRemove( previewIframe );
				
				return false;
			});
			
			// Search box click
			previewIframe.find( '.ai-templates-search-wrap i' ).unbind('click');
			previewIframe.find( '.ai-templates-search-wrap i' ).on( 'click', function(e) {
				e.preventDefault();
				inc_templates_library.last_search = previewIframe.find('.ai-templates-search-text').val();
				inc_templates_library.renderPopupContent( previewIframe, previewIframe.find( '.ai-templates-lib-item.active' ).data("tab") );
				
				return false;
			});
			
			previewIframe.find( '.ai-template-widget' ).unbind('change');
			previewIframe.find( '.ai-template-widget' ).on( 'change', function(e) {
				inc_templates_library.last_widget = $(this).val();
				inc_templates_library.last_search = '';
				previewIframe.find( '.ai-templates-search-text' ).val('');
				inc_templates_library.template_cache.widgets = '';
				inc_templates_library.renderPopupContent( previewIframe, 'widgets' );
			});
			
			inc_templates_library.renderPopupGrid( previewIframe );
			
		},

		renderPopupContent: function( previewIframe, tab ) {
			
			previewIframe.find( '.ai-templates-wrap' ).fadeOut(0);
			
			previewIframe.find( '.ai-img-view-wrap' ).remove();
			
			// inititate loader
			inc_templates_library.renderPopupLoader( previewIframe );
						
			if( inc_templates_library.template_cache[tab] != '' && previewIframe.find( '.ai-templates-search-text' ).val() == '' ) { 

				previewIframe.find( '.ai-templates-lib-content-wrap' ).html( inc_templates_library.template_cache[tab] );
				
				inc_templates_library.renderedContentActions( previewIframe );
				
			} else {
				
				// AJAX Data
				var data = {
					action: 'render_aiea_templates_library',
					part: tab,
					search: previewIframe.find( '.ai-templates-search-text' ).val(),
					widget: inc_templates_library.last_widget,
					nonce: inc_obj.library_nonce
				};
				
				// Update via AJAX
				$.post(ajaxurl, data, function( response ) {
					
					let _res_html = response.library_html;
					
					previewIframe.find( '.ai-templates-lib-content-wrap' ).html( _res_html );
					previewIframe.find( '.ai-templates-search-text' ).val( inc_templates_library.last_search );
					if( response.widget_select != '' ) {
						previewIframe.find( '.ai-library-toolbar' ).prepend( response.widget_select );
						_res_html = previewIframe.find( '.ai-templates-body' ).clone();
					}
					
					inc_templates_library.template_cache[tab] = _res_html;
										
					if( response.search_stat ) {
						inc_templates_library.template_cache[tab] = '';
					}

				// Render Preview
				}).always(function() {
					
					inc_templates_library.renderedContentActions( previewIframe );

				}); // end always
			}

		},

		renderPopupLoader: function( previewIframe ) {
			previewIframe.find( '.ai-templates-lib-content-wrap' ).prepend('<div class="ai-templates-lib-loader"><span class="eicon-settings"></span></div>');
		},

		renderPopupGrid: function( previewIframe ) {
			
			if( !previewIframe.find('.ai-templates-wrap .ai-template-item').length ) {
				
				let _html = '<div class="no-content-available"><h3>Sorry.. No templates available related to this search keywork: "'+ inc_templates_library.last_search +'"</h3></div>';
				
				previewIframe.find('.ai-templates-body').append(_html);
				
				return;
				
			};
			
			previewIframe.find( '.ai-templates-wrap' ).fadeIn(350);
			
			let _t = 0;
			previewIframe.find('.ai-templates-body .ai-template-item').each( function(){
				$(this).css({'animation-delay': _t+'s'});
				_t += 0.1;
			});
			
			// Run Macy
			//previewIframe.find('.ai-templates-body').imagesLoaded( function(){
				var macy = Macy({
					container: previewIframe.find('.ai-templates-wrap')[0],
					waitForImages: true,
					margin: 30,
					columns: 5,
					breakAt: {
						1370: 4,
						940: 3,
						520: 2,
						400: 1
					}
				});

				setTimeout(function(){
					macy.recalculate(true);
				}, 300 );

				setTimeout(function(){
					macy.recalculate(true);
				}, 600 );
			//});

		}

	};

	$( window ).on( 'elementor:init', inc_templates_library.init );

}( jQuery ) );