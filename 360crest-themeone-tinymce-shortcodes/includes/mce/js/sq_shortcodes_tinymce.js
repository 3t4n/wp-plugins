(function() {
	tinymce.PluginManager.add( 'sq_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'sq_shortcodes_mce_button', {
			title: 'Shortcodes',
			type: 'menubutton',
			icon: 'icon sq-shortcodes-icon',
			menu: [


						/* Columns */
						{
							text: 'Columns',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Column',
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnSize',
										label: 'Size',
										'values': [
											{text: '1/2', value: 'one_half'},
											{text: '1/2 Last', value: 'one_half_last'},
											{text: '1/3', value: 'one_third'},
											{text: '1/3 Last', value: 'one_third_last'},
											{text: '1/4', value: 'one_fourth'},
											{text: '1/4 Last', value: 'one_fourth_last'}
										]
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: 'Content:',
										value: 'Your content here, lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel mauris sit amet erat ultrices mattis fringilla eget justo.',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[sq_column size="' + e.data.columnSize + '"]<br />' + e.data.columnContent + '<br />[/sq_column]');
									}
								});
							}
						}, // End columns


                
                
                /** Elements **/
				{
					text: 'Buttons',
					menu: [

						/* Buttons */
						{
							text: 'Utility Buttons',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Button',
									body: [

									// Button Text
									{
										type: 'textbox',
										name: 'buttonText',
										label: 'Button: Text',
										value: 'Download'
									},

									// Button URL
									{
										type: 'textbox',
										name: 'buttonUrl',
										label: 'Button: URL',
										value: 'http://www.yoursite.com/'
									},
                                        
                                    // Button Style
									{
										type: 'listbox',
										name: 'buttonStyle',
										label: 'Button: Link Type',
										'values': [
											{text: 'Rounded', value: 'rounded'},
											{text: '3D', value: 'dimensioned'},
											{text: 'Flat', value: 'flat'}
										]
									},
                                    
                                    
									// Button type
									{
										type: 'listbox',
										name: 'buttonType',
										label: 'Button: Type',
										'values': [
											{text: 'Download', value: 'download'},
											{text: 'Info', value: 'info'},
											{text: 'External', value: 'external'},
											{text: 'Github', value: 'github'}
										]
									},
                                        
                                        
                                         
									// Button size
									{
										type: 'listbox',
										name: 'buttonSize',
										label: 'Button: Size',
										'values': [
											{text: 'Small', value: 'small'},
											{text: 'Big', value: 'big'},
											{text: 'Large', value: 'large'},
											{text: 'Extralarge', value: 'extralarge'}
										]
									},
                                        
                                        // Button Color
									{
										type: 'listbox',
										name: 'buttonColor',
										label: 'Button: Color',
										'values': [
											{text: 'Black', value: 'black'},
											{text: 'Blue', value: 'blue'},
											{text: 'Green', value: 'green'},
											{text: 'Green 2', value: 'green2'},
											{text: 'Gold', value: 'gold'},
											{text: 'Orange', value: 'orange'},
											{text: 'Pink', value: 'pink'},
											{text: 'Red', value: 'red'}
										]
									},

									// Button Rel
									{
										type: 'textbox',
										name: 'buttonrel',
										label: 'Button: rel',
										value: 'nofollow'
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'buttonLinkTarget',
										label: 'Button: Link Target',
										'values': [
											{text: 'Self', value: '_self'},
											{text: 'Blank', value: '_blank'}
										]
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[sq_button_special url="' + e.data.buttonUrl + '" style="' + e.data.buttonStyle + '" type="' + e.data.buttonType + '" color="' + e.data.buttonColor + '" size="' + e.data.buttonSize + '"  button_target="' + e.data.buttonLinkTarget + '" btnrel="' + e.data.buttonrel + '"]' + e.data.buttonText + '[/sq_button_special]');
									}
								});
							}
						}, // End Utility button
                        
					]
				}, // End Elements Section
					
                        
                        
                
				/** Elements **/
				{
					text: 'Elements',
					menu: [
                        
						/* Boxes */
						{
							text: 'Boxes',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Box',
									body: [

									// Box Color
									{
										type: 'listbox',
										name: 'boxColor',
										label: 'Style:',
										'values': [
											{text: 'Info Box', value: 'boxinfo'},
											{text: 'Success Box', value: 'boxsucces'},
											{text: 'Warning Box', value: 'boxerror'},
											{text: 'Notice Box', value: 'boxnotice'}
										]
									}, 

									// Box Content
									{
										type: 'textbox',
										name: 'boxContent',
										label: 'Content:',
										value: '<p>Your content here, lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel mauris sit amet erat ultrices mattis fringilla eget justo.</p>',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[sq_box style="' + e.data.boxColor + '"]<br />' + e.data.boxContent + '<br />[/sq_box]' );
									}
								});
							}
						}, // End boxes



						/* Lists */
						{
							text: 'Lists',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert List',
									body: [

									// Box Color
									{
										type: 'listbox',
										name: 'listColor',
										label: 'Style:',
										'values': [
											{text: 'Simple List', value: 'simplelist'},
											{text: 'Blue List', value: 'minus-blue-list'},
											{text: 'Green List', value: 'minus-green-list'},
											{text: 'Orange List', value: 'minus-orange-list'},
											{text: 'Gold List', value: 'minus-gold-list'},
											{text: 'Black List', value: 'minus-black-list'}
										]
									}, 

									// li Content
									{
										type: 'textbox',
										name: 'liContent',
										label: '<li> content:',
										value: 'Your content here ...'
									},

									// li Content
									{
										type: 'textbox',
										name: 'liContent2',
										label: '<li> content:',
										value: 'Your content here ...'
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[sq_ul style="' + e.data.listColor + '"]<br />[sq_li]' + e.data.liContent + '[/sq_li]<br />[sq_li]' + e.data.liContent2 + '[/sq_li]<br />[/sq_ul]' );
									}
								});
							}
						}, // End boxes


					]
				}, // End Elements Section




				/** More Start **/
				{
				text: 'More',
				menu: [

						/* Accordion */
						{
							text: 'Accordion',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Shortcodes - Insert Accordion',
									body: [


									// li Content
									{
										type: 'textbox',
										name: 'accTitle',
										label: 'Title:',
										value: 'Accordion Title'
									},

									// li Content
									{
										type: 'textbox',
										name: 'accContent',
										label: 'Content:',
										value: 'Your content here, lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel mauris sit amet erat ultrices mattis fringilla eget justo.',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[sq_accordion title="' + e.data.accTitle + '"]<br />[sq_accordion_section]<br />' + e.data.accContent + '<br />[/sq_accordion_section]' );
									}
								});
							}
						}, // End Accordion 


						/* Clear Floats */
						{
							text: 'Clear Floats',
							onclick: function() {
								editor.insertContent( '[sq_clear]');
							}
						}, // End accordion

					]
				} // End More section

			]
		});
	});
})();