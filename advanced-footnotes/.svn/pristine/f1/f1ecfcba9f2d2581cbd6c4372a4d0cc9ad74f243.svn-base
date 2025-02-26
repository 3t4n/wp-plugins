(function() {
	tinymce.create("tinymce.plugins.advanced_footnotes", {

		//url argument holds the absolute url of our plugin directory
		init : function(ed, url) {

			//add new button     
			ed.addButton("footnote", {
				title : "Insert Footnote",
				cmd : "footnote_command",
				icon : 'bubble',
			});

			//button functionality.
			ed.addCommand("footnote_command", function() {
				var selected_text = ed.selection.getContent();
				if(!selected_text){ selected_text = ''; }
					ed.windowManager.open({
						title: 'Insert Footnote',
						body: [
							{
								type: 'textbox',
								name: 'content',
								label: 'Footnote',
								value: selected_text,
								multiline: true,
								minWidth: 300,
                				minHeight: 100,
							},
							{type: 'listbox',   
								name: 'type',
								label: 'Footnote Type',
								'values': [
									{text: 'Numeric', value: 'numeric'},
									{text: 'Non-numeric', value: 'non-numeric'},
								],
							},
						],
						onsubmit: function( e ) {
							var return_text = "[footnote type=\""+e.data.type+"\"]"+e.data.content+"[/footnote]";
							ed.execCommand("mceInsertContent", false, return_text);
						}
					});
			});

		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : "Footnote Inserter",
				author : "Yunus Tabakoğlu",
				version : "1"
			};
		}
	});

	tinymce.PluginManager.add("advanced_footnotes", tinymce.plugins.advanced_footnotes);
})();