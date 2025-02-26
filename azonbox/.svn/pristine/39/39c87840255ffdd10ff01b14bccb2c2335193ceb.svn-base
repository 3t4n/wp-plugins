(function() {
    tinymce.PluginManager.add('ce_content_box_mce_button', function(editor, url) {
        editor.addButton('ce_content_box_mce_button', {
            icon: 'ce-azonbox-icon',
            text: 'AzonBox',
			type: 'menubutton',
			menu: [
				{
					text: 'Box One',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert Content For AzonBox',
							body: [{
								type: 'textbox',
								name: 'tagtext',
								label: 'Tag Text',
								value: ''
							}, {
									type: 'textbox',
									name: 'imgurl',
									label: 'Image URL',
									value: ''
								},{
									type: 'textbox',
									name: 'imgdisc',
									label: 'Image Description',
									value: ''
								},{
									type: 'textbox',
									name: 'linktxt',
									label: 'Button Text',
									value: ''
								},{
									type: 'textbox',
									name: 'linkurl',
									label: 'Affiliate URL',
									value: ''
								},{
									type: 'textbox',
									name: 'headline',
									label: 'Headline',
									value: ''
								},{
									type: 'textbox',
									name: 'subhead',
									label: 'Sub Headline',
									value: ''
								},{
									type: 'textbox',
									name: 'text',
									label: 'Content',
									value: '',
									multiline: true,
									minWidth: 300,
									minHeight: 100,
								},],
							onsubmit: function(e) {
								editor.insertContent(
										'[azonbox1 tagt = "'+ e.data.tagtext + 
										'" imgurl= "'+ e.data.imgurl +
										'" imgdsc="'+ e.data.imgdisc +
										'" lnktxt= "'+ e.data.linktxt +
										'" linkl="'+ e.data.linkurl +
										'" headline= "'+ e.data.headline +
										'" subhline="'+ e.data.subhead +
										'" text= "'+ e.data.text +
										'" ]'
								   
								);
							}
						});
					}
				},
				{
					text: 'Box Two',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert Content For AzonBox',
							body: [{
									type: 'textbox',
									name: 'imgurl',
									label: 'Image URL',
									value: ''
								},{
									type: 'textbox',
									name: 'imgdisc',
									label: 'Image Description',
									value: ''
								},{
									type: 'textbox',
									name: 'linktxt',
									label: 'Button Text',
									value: ''
								},{
									type: 'textbox',
									name: 'linkurl',
									label: 'Affiliate URL',
									value: ''
								},{
									type: 'textbox',
									name: 'headline',
									label: 'Headline',
									value: ''
								},{
									type: 'textbox',
									name: 'subhead',
									label: 'Sub Headline',
									value: ''
								},{
									type: 'textbox',
									name: 'text',
									label: 'Content',
									value: '',
									multiline: true,
									minWidth: 300,
									minHeight: 100,
								},],
							onsubmit: function(e) {
								editor.insertContent(
										'[azonbox2 imgurl= "'+ e.data.imgurl +
										'" imgdsc="'+ e.data.imgdisc +
										'" lnktxt= "'+ e.data.linktxt +
										'" linkl="'+ e.data.linkurl +
										'" headline= "'+ e.data.headline +
										'" subhline="'+ e.data.subhead +
										'" text= "'+ e.data.text +
										'" ]'
								   
								);
							}
						});
					}
				},
				{
					text: 'Box Three',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert Content For AzonBox',
							body: [{
									type: 'textbox',
									name: 'imgurl',
									label: 'Image URL',
									value: ''
								},{
									type: 'textbox',
									name: 'imgdisc',
									label: 'Image Description',
									value: ''
								},{
									type: 'textbox',
									name: 'linktxt',
									label: 'Button Text',
									value: ''
								},{
									type: 'textbox',
									name: 'linkurl',
									label: 'Button URL',
									value: ''
								},{
									type: 'textbox',
									name: 'headline',
									label: 'Headline',
									value: ''
								},{
									type: 'textbox',
									name: 'subhead',
									label: 'Sub Headline',
									value: ''
								}],
							onsubmit: function(e) {
								editor.insertContent(
										'[azonbox3 imgurl= "'+ e.data.imgurl +
										'" imgdsc="'+ e.data.imgdisc +
										'" lnktxt= "'+ e.data.linktxt +
										'" linkl="'+ e.data.linkurl +
										'" headline= "'+ e.data.headline +
										'" subhline="'+ e.data.subhead +
										'" ]'
								   
								);
							}
						});
					}
				}
				
			]
        });
    });
})();