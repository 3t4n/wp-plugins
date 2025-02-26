(function() {
 	//tinymce.PluginManager.requireLangPack('ratings_shorttags');
	tinymce.create('tinymce.plugins.cleanuphtml_mce', {
		init : function(ed, url) {

			ed.addButton('cleanuphtml', {
				title : 'cleanuphtml.cleanHTML',
				image : url + '/cleanuphtml.png',
				onclick : function() {
					cleanHTML();
				}
			});
			/*ed.addButton('cleanuphtml2', {
				title : 'cleanuphtml.insertRelatedRatings',
				image : url + '/cleanuphtml.png',
				onclick : function() {
					insertRelatedRatings();
				}
			});*/

		},


		getInfo : function() {
			return {
				longname : 'Cleanup HTML MCE Buttons',
				author : 'David Perez',
				authorurl : 'http://www.closemarketing.es/',
				infourl : '',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}

	});

	// Register plugin
	tinymce.PluginManager.add('cleanuphtml', tinymce.plugins.cleanuphtml_mce);

})();