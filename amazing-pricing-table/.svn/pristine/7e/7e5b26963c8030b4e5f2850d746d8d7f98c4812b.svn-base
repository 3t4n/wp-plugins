



//


(function() {
	tinymce.PluginManager.add('tmrd_mce_button', function( editor, url ) {
		editor.addButton( 'tmrd_mce_button', {
			text: 'Price',
			icon: false,
			type: 'menubutton',
			menu: [
				{
				
							text: 'Click For Enter Value',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Shortcode value',
									body: [
										{
											type: 'textbox',
											name: 'price_plan',
											label: 'Price Plane'
											
										},
														{
											type: 'textbox',
											name: 'textboxName',
											label: 'Price Rate'
											
										},
																{
											type: 'textbox',
											name: 'info_one_box',
											label: 'Use'
											
										},
																	{
											type: 'textbox',
											name: 'info_two_box',
											label: 'Project No'
											
										},
																			{
											type: 'textbox',
											name: 'info_three_box',
											label: 'Support'
											
										},
																					{
											type: 'textbox',
											name: 'info_four_box',
											label: 'Buy link'
											
										},
																								{
											type: 'textbox',
											name: 'info_band_box',
											label: 'Band With Space'
											
										},
																									{
											type: 'textbox',
											name: 'info_band_space',
											label: 'Band With Per Month'
											
										},
											
																							{
											type: 'textbox',
											name: 'info_five_box',
											label: 'Quantity'
											
										},
																								{
											type: 'textbox',
											name: 'info_six_box',
											label: 'Column'
											
										}
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[pricing price_plan="' + e.data.price_plan + '" price_rate="' + e.data.textboxName + '" info_one="' + e.data.info_one_box + '" info_two="' + e.data.info_two_box + '" info_three="' + e.data.info_band_box + '" info_four="' + e.data.info_band_space + '" support="' + e.data.info_three_box + '" buy_link="' + e.data.info_four_box + '" quantity="' + e.data.info_five_box + '" column="' + e.data.info_six_box + '"]');
									}
								});
							}
						
					
				}
			]
		});
	});
})();

