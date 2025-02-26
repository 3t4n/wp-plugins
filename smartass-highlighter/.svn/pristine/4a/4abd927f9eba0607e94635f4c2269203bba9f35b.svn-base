(function() {
	tinymce.create('tinymce.plugins.Addshortcodes', {
		init : function(ed, url) {
			ed.addButton('SmartAss-Highlighter', {  
				title : 'Add SmartAss Highlighter',  
				image : url+'/highlighter.png',  
				onclick : function() { 
					ed.selection.setContent('[highlighter]'); 
				}  
			});
		},
		getInfo : function() {
			return {
				longname : "SmartAss Highlighter",
				author : 'Harshvardhan Malpani',
				authorurl : 'http://www.justtechthings.com/',
				infourl : 'http://justtechthings.com/SmartAss-Highlighter',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('SmartAss', tinymce.plugins.Addshortcodes);	
	
})();