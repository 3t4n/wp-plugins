/**
 * The MIT License (MIT)
 * 
 * Copyright (c) Andreas Hecht, Truchot Guillaume
 * 
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */


function htmlentities(str, escape) {
	escape = typeof escape !== 'undefined' ? escape : true;
	
	if (escape) {
		return str.replace(/</g, '&lt;').replace(/>/g, '&gt;');
	}
	
	else {
		return str.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
	}
}


(function() {
	tinymce.create('tinymce.plugins.Prism', {
		init : function(ed, url) {
			ed.addCommand('insertCode', function() {
				var selectedNode = ed.selection.getNode();
				var currentReplace = false;
				
				/* The following variables are defined by PHP according to the user settings:
				
				var currentLanguage = "";
				var currentInlineCode = false;
				var currentLineNumbers = false;*/
				
				var currentDataLine = "";
				var currentCode = "";
				var currentDataSrc = "";
				
				var languages = [];
				
				for (var language in Prism.languages) {
					if (typeof Prism.languages[language] === 'object') {
						languages.push({text: language, value: language});
					}
				}
				
				if ( currentLanguage == '' ) {
					currentLanguage = languages[0].value;
				}
				
				
				if (selectedNode.nodeName == 'CODE') {
					var codeNode = selectedNode;
					var preNode = codeNode.parentNode;
					currentReplace = true;
					
					currentLanguage = codeNode.getAttribute('class').replace('language-', '');
					currentCode = htmlentities(codeNode.innerHTML, false);
					
					if (preNode.nodeName == 'PRE') {
						currentInlineCode = false;
						
						if (preNode.getAttribute('class') == 'line-numbers') {
							currentLineNumbers = true;
						}
						
						if (preNode.hasAttribute('data-line')) {
							currentDataLine = preNode.getAttribute('data-line');
						}
						
						if (preNode.hasAttribute('data-src')) {
							currentDataSrc = preNode.getAttribute('data-src');
						}
					}
					
					else {
						currentInlineCode = true;
						currentLineNumbers = false;
					}
				}
				
				
				ed.windowManager.open({
					title: 'AH Code Highlighter',
					body: [
						{
							type: 'listbox',
							name: 'language',
							label: 'Language :',
							values: languages,
							value: currentLanguage
						},
                        {
							type: 'checkbox',
							name: 'lineNumbers',
							label: 'Line numbers',
							checked: currentLineNumbers
						},
						{
							type: 'textbox',
							name: 'code',
							label: 'Code :',
							multiline: true,
							minWidth: 500,
							minHeight: 400,
							value: currentCode
						},
					],
					
					onsubmit: function(e) {
						var preTag = '<pre';
						
						if (e.data.lineNumbers) {
							preTag += ' class="line-numbers"';
						}
						
						if (e.data.dataLine) {
							preTag += ' data-line="' + e.data.dataLine + '"';
						}
						
						if (e.data.dataSrc) {
							preTag += ' data-src="' + e.data.dataSrc + '"';
						}
						
						preTag += '>';
						
						
						if (currentReplace) {
							ed.dom.remove(selectedNode.parentNode);
						}
						
						ed.insertContent((!e.data.inlineCode ? preTag : '') + '<code' + (!e.data.inlineCode ? ' class="language-' + e.data.language + '"' : '') + '>' + htmlentities(e.data.code) + '</code>' + (e.data.inlineCode ? ' ' : '') + (!e.data.inlineCode ? '</pre><br />' : ''));
						ed.selection.setCursorLocation(ed.selection.getNode().firstChild); // Select <code> instead of <pre> (or <code> instead of <p> if <pre> doesn't exist)
					}
				});
			});
			
			ed.addButton('prism', {
				text: 'Code',
				title: 'Insert code',
				cmd: 'insertCode'
			});
			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('prism', n.nodeName == 'PRE' || n.nodeName == 'CODE');
			});
		},
		
		getInfo : function() {
			return {
				longname : 'AH Code Highlighter',
				author : 'Andreas Hecht',
				authorurl : 'https://andreas-hecht.com',
				infourl : 'https://andreas-hecht.com/prism-syntax-highlighter/',
				version : '2.0.3'
			};
		}
	});
	
	tinymce.PluginManager.add('prism', tinymce.plugins.Prism);
})();
