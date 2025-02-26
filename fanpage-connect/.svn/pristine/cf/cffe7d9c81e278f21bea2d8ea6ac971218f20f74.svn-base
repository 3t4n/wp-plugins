(function() {
	tinymce.create('tinymce.plugins.fpConnect', {

		init : function(ed, url) {
		// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('mceFPConnect', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 540 + ed.getLang('fpConnect.delta_width', 0),
					height : 480 + ed.getLang('fpConnect.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('fpc_button', {
				title : 'Fanpage Connect',
				cmd : 'mceFPConnect',
				image : url + '/fpc-icon.png'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('fpc_button', n.nodeName == 'IMG');
			});
		},

		getInfo : function() {
			return {
					longname  : 'Fanpage Connect',
					author 	  : 'Fanpage Connect',
					authorurl : 'http://fanpageconnect.com',
					infourl   : 'http://fanpageconnect.com',
					version   : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('fpc_button', tinymce.plugins.fpConnect);
})();