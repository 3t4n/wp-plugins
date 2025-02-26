(function() {
	tinymce.PluginManager.requireLangPack('grpdocs_comparison');
	tinymce.create('tinymce.plugins.GrpdocsComparisonPlugin', {
		init : function(ed,url) {
			ed.addCommand('mceGrpdocsComparison', function() {
				ed.windowManager.open( {
					file : url + '/../grpdocs-dialog.php',
					width : 420 + parseInt(ed.getLang('grpdocs_comparison.delta_width',0)),
					height : 540 + parseInt(ed.getLang('grpdocs_comparison.delta_height',0)),
					inline : 1}, {
						plugin_url : url,
						some_custom_arg : 'custom arg'
					}
				)}
			);
			ed.addButton('grpdocs_comparison', {
				title : 'GroupDocs Comparison',
				cmd : 'mceGrpdocsComparison',
				image : url + '/../images/grpdocs-comparison-button.png'
			});
			ed.onNodeChange.add
				(function(ed,cm,n) {
					cm.setActive('grpdocs_comparison',n.nodeName=='IMG')
				})
		},
		createControl : function(n,cm) {
			return null
		},
		getInfo : function() { 
			return { 
				longname : 'GroupDocs Comparison',
				author : 'GroupDocs Team',
				authorurl : 'http://www.groupdocs.com',
				infourl : 'http://www.groupdocs.com',
				version : "1.0"}
		}
	});
	tinymce.PluginManager.add('grpdocs_comparison',tinymce.plugins.GrpdocsComparisonPlugin)
})();
