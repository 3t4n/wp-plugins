(function() {
	tinymce.create('tinymce.plugins.accessibleyoutube', {
		init : function(ed, url) {
			ed.addCommand('accessibleyoutube', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 420,
					height : 300,
					inline : 1
				}, {
					plugin_url : url, // Plugin absolute URL
				});
			});

			ed.addButton('accessibleyoutube', {
				title : 'AccessibleYouTube',
				cmd : 'accessibleyoutube',
				image : url + '/image_add.png'
			});

			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('accessibleyoutube', n.nodeName == 'IMG');
			});
		},
		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : 'AccessibleYouTube',
				author : 'Jannick Bolten',
				authorurl : 'http://www.jannickbolten.nl',
				infourl : 'http://www.jannickbolten.nl',
				version : "0.5"
			};
		}
	});
	tinymce.PluginManager.add('accessibleyoutube',
			tinymce.plugins.accessibleyoutube);
})();
