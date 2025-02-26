(function() {
	tinymce.PluginManager.add('anchorButton', function (editor) {
		editor.addButton('anchorButton', {
			title: 'Anchor',
			icon: 'icon ass-anchor-icon',

			onclick: function () {
					var editorSelection = editor.selection.getContent();
					editor.windowManager.open({
						title: 'insert_anchor',
						body: [{
							type: 'textbox',
							name: 'name',
							label: 'anchor_name'
						}],
						onsubmit: function (e) {
								e.preventDefault();

								if (e.data.name === '') {

									editor.windowManager.alert('Please provide an anchor name!');
								} else {
									editor.windowManager.close();

									sanitizedname = sanitize(e.data.name);

									var content = '[anchor';

									content += ' id="' + sanitizedname + '"';

									if( editorSelection ) {
										content += ']' + editorSelection + '[/anchor]';
									} else {
										content += ' ]'
									}
									editor.insertContent(content);

									if( sanitizedname != e.data.name ) {
										editor.windowManager.alert('Link: #' + sanitizedname);
									}
								}
							} //onsubmit
					}); // editor.windowManager
				} // function

		}); // editor.addButton
	}); // tinymce.PluginManager
	function sanitize(value){
		value = value.toLowerCase();
		value = value.replace(/ä/g, 'ae');
		value = value.replace(/ö/g, 'oe');
		value = value.replace(/ü/g, 'ue');
		value = value.replace(/ß/g, 'ss');
		value = value.replace(/ /g, '-');
		value = value.replace(/\./g, '');
		value = value.replace(/,/g, '');
		value = value.replace(/\(/g, '');
		value = value.replace(/\)/g, '');
		return value;
	}
})();
