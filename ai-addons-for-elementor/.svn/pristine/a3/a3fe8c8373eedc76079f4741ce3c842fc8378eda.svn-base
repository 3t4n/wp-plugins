(function($){

	var aiea_data_table_active_cell = null;
	var aiea_data_table_update_status = 0;
	var aiea_data_table_first_trigger = 0;
	
	/* Offcanvas Handler */
	var WidgetAIDataTableHandler = function( $scope, $ ){
		if( $scope.find(".ai-data-table-elementor-widget").length ){
			var table = $scope.find(".ai-data-table");
			aiea_table_event_create( table );
		}
	};
	
	$( window ).on( 'elementor/frontend/init', function() {
		if( isEditMode ) {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/ai-data-table.default', WidgetAIDataTableHandler );
		}
	});
	
	var aiea_table_event_create = function( table ){		

		$(table).find( "th, td" ).on( "contextmenu", function(el){
			aiea_data_table_active_cell = el.target;
		});
		
		$(table).find( "th, td" ).on( "dblclick", function(el){ //dblclick
			
			aiea_data_table_update_status = 1;
			var value = $(this).html() ? $(this).html() : '';	
			//var _cur_txtarea;
			if( !$(this).children('textarea').length ){
				$(this).addClass("ai-table-edit-column");
				$(this).html( '<textarea rows="1" class="ai-table-edit-box">' + value + '</textarea>' );
				$(this).children('textarea').focus();
			}
		});
				
	};
	
	var aiea_data_table_update_model = function( model, container, refresh, value ) {
		
		model.remoteRender = refresh;
		var settings = container.settings.attributes;
		
		settings.aiea_data_table_static_html = value.aiea_data_table_static_html;

		parent.window.$e.run("document/elements/settings", {
			container: container,
			settings: settings,
			options: {
				external: refresh,
				render: false
			}
		});	
		
		aiea_data_table_first_trigger++;
		//console.log( 'model: ' + aiea_data_table_first_trigger);
		
	};
	
	var aiea_data_table_update = function( panel, view, refresh, value ){
		var model = view.model;
		model.remoteRender = refresh;

		var container = view.getContainer();
		var settings = view.getContainer().settings.attributes;
		
		settings.aiea_data_table_static_html = value.aiea_data_table_static_html;

		parent.window.$e.run("document/elements/settings", {
			container: container,
			settings: settings,
			options: {
				external: refresh,
				render: false
			}
		});
		
		aiea_data_table_first_trigger++;
		//console.log('normal: ' + aiea_data_table_first_trigger);
	};
	
	// Inline edit
	var aiea_data_table_events = function( panel, model, view ){
		
		if( !aiea_data_table_first_trigger ) { 
			var table = view.el.querySelector(".ai-data-table");
			aiea_data_table_update( panel, view, true, {aiea_data_table_static_html: $(table).html()} );
			aiea_data_table_first_trigger++;
			//console.log( 'init: ' + aiea_data_table_first_trigger);
		}
				
		var localRender = function() { 
			var interval = setInterval(function() {
				if (view.el.querySelector(".ai-data-table")) {
					var table = view.el.querySelector(".ai-data-table");
					
					/*$(table).find( "th:not(.ai-table-edit-column), td:not(.ai-table-edit-column)" ).on( "click", function(el){
						aiea_data_table_active_cell = null;
						if( !$(this).children("textarea").length && aiea_data_table_update_status ) { 
							
							// remove text editor from table cell
							aiea_table_textarea_remove(table);
							
							// update the changes to settings hidden field
							aiea_data_table_update( panel, view, true, {aiea_data_table_static_html: $(table).html()} );								
							
							aiea_data_table_update_status = 0;
						}
					});*/
					
					$(table).parents("body").on( "click", function(e) {
						if( $(e.target).is('.ai-table-edit-box') ) {
							e.preventDefault();
							return;
						} else {
							if( $(table).find( "textarea.ai-table-edit-box" ).length ) {
								aiea_table_textarea_remove(table);
								
								// update the changes to settings hidden field
								aiea_data_table_update( panel, view, true, {aiea_data_table_static_html: $(table).html()} );
							}
						}
					});
					$(parent.window).on( "click", function(e) {
						if( $(table).find( "textarea.ai-table-edit-box" ).length ) {
							aiea_table_textarea_remove(table);
							
							// update the changes to settings hidden field
							aiea_data_table_update( panel, view, true, {aiea_data_table_static_html: $(table).html()} );
						}
					});

					clearInterval(interval);
				}
			}, 10);
		};

		// init
		localRender();

		// after render
		model.on("remote:render", function() {
			localRender();
		});
		
		// undo table change
		document.onkeypress = function aiea_data_table_key_press(e) {
			
			var evtobj = window.event? event : e
			if (evtobj.keyCode == 90 && evtobj.ctrlKey) {
				
				aiea_data_table_first_trigger--;
				console.log(aiea_data_table_first_trigger);
				
			}
		}
		
	};
	
	var aiea_data_table_context_menu = function( groups, element ) {
		
		if( element.options.model.attributes.widgetType == "ai-data-table" ) {
			groups.push({
				name: "ai-data-table",
				actions: [
					{
						name: "add_row_above",
						title: "Add Row Above",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							if( aiea_data_table_active_cell !== null ) {
								var index = aiea_data_table_active_cell.parentNode.rowIndex;
								if( aiea_data_table_active_cell.nodeName == 'TH' ) return;
								var row = table.insertRow(index);
								for (var i = 0; i < table.rows[0].cells.length; i++) {
									var cell = row.insertCell(i);
								}
								aiea_data_table_active_cell = null;							
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});							
								aiea_table_event_create(table);
								
							}
						}
					},
					{
						name: "add_row_below",
						title: "Add Row Below",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							if( aiea_data_table_active_cell !== null ) {
								var index = aiea_data_table_active_cell.parentNode.rowIndex + 1;
								var row = table.insertRow(index);
								for (var i = 0; i < table.rows[0].cells.length; i++) {
									var cell = row.insertCell(i);
								}
								aiea_data_table_active_cell = null;
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});							
								aiea_table_event_create(table);
							}
						}
					},
					{
						name: "add_column_left",
						title: "Add Column Left",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							//var table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;//document.querySelector(".elementor-widget.elementor-element-editable .ai-data-table");
							if (aiea_data_table_active_cell !== null) {
								var index = aiea_data_table_active_cell.cellIndex;
								for (var i = 0; i < table.rows.length; i++) {
									var cell;
									if( i === 0 ) {										
										cell =  table.rows[i].insertCell(index).outerHTML = '<th></th>';
									} else {
										cell = table.rows[i].insertCell(index);
									}
									//var cell = table.rows[i].insertCell(index);
								}
								aiea_data_table_active_cell = null;
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});							
								aiea_table_event_create(table);
							}
						}
					},
					{
						name: "add_column_right",
						title: "Add Column Right",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							console.log( table );
							if (aiea_data_table_active_cell !== null) {
								var index = aiea_data_table_active_cell.cellIndex + 1;
								for (var i = 0; i < table.rows.length; i++) {
									if( i === 0 ) {										
										cell =  table.rows[i].insertCell(index).outerHTML = '<th></th>';
									} else {
										cell = table.rows[i].insertCell(index);
									}
								}
								aiea_data_table_active_cell = null;
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});							
								aiea_table_event_create(table);
							}
						}
					},
					{
						name: "delete_row",
						title: "Delete Row",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							if (aiea_data_table_active_cell !== null) {
								var index = aiea_data_table_active_cell.parentNode.rowIndex;
								table.deleteRow(index);
								aiea_data_table_active_cell = null;
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});	
							}
						}
					},
					{
						name: "delete_column",
						title: "Delete Column",
						callback: function() {
							var table;
							if( aiea_data_table_active_cell.parentNode.parentNode.nodeName == 'TABLE' ) table = aiea_data_table_active_cell.parentNode.parentNode;
							else table = aiea_data_table_active_cell.parentNode.parentNode.parentNode;
							
							if( !aiea_data_table_first_trigger ) $(table).trigger("click");
							
							if (aiea_data_table_active_cell !== null) {
								var index = aiea_data_table_active_cell.cellIndex;
								for (var i = 0; i < table.rows.length; i++) {
									table.rows[i].deleteCell(index);
								}
								aiea_data_table_active_cell = null;
								var origTable = table.cloneNode(true);							
								aiea_data_table_update_model(element.options.model, element.container, true, {
									aiea_data_table_static_html: origTable.innerHTML
								});	
							}
						}
					}
				]
			});
		}
		return groups;
	};	
	
	window.isEditMode = false;
	$(window).on("elementor/frontend/init", function() {		
		window.isEditMode = elementorFrontend.isEditMode();
		if (isEditMode) {			
			elementor.hooks.addFilter("elements/widget/contextMenuGroups", aiea_data_table_context_menu );
			elementor.hooks.addAction( "panel/open_editor/widget/ai-data-table", aiea_data_table_events );
			
			/*elementor.hooks.addAction( 'panel/open_editor/section', function( panel, model, view ) {
				console.log("test");
			});*/
		}
	});
	
	function aiea_table_textarea_remove(table){
		if( $(table).find('textarea.ai-table-edit-box').length ) {
			$(table).find('textarea.ai-table-edit-box').each(function( index ) {
				var column_out = $(this).val();
				var column = $(this).parent();
				$(column).removeClass("ai-table-edit-column");
				$(column).html(column_out);
			});
		}
	}
	
})(jQuery);