/**
 * Code Face Syntax Highlighter
 * 
 * Copyright (C) 2008  Donald Sipe
 * Website: http://djsipe.com
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
YAHOO.CodeFace.init = function()
{
	var i, 
		cssQuery = YAHOO.util.Selector.query, 
		loadCSS  = YAHOO.util.Get.css, 
		loadJS   = YAHOO.util.Get.script, 
		basePath = YAHOO.CodeFace.basePath + "dp.SyntaxHighlighter/";
	
	var codeNodes = cssQuery('pre[class~=$"-codeface"], textarea[class~=$"-codeface"]');
	
	var brushes = {
		cplusplus: 	"shBrushCpp.js",
		csharp: 	"shBrushCSharp.js",
		css: 		"shBrushCss.js",
		delphi: 	"shBrushDelphi.js",
		java: 		"shBrushJava.js",
		js:	"shBrushJScript.js",
		python: 	"shBrushPython.js",
		php: 		"shBrushPhp.js",
		ruby: 		"shBrushRuby.js",
		sql: 		"shBrushSql.js",
		vb: 		"shBrushVb.js",
		xml: 		"shBrushXml.js",
		html:		"shBrushXml.js"
	};

	// To play nice with MSIE, we need our own .indexOf function
	var indexOf = function (arrayObj, find)
	{
		if (!YAHOO.lang.isArray(arrayObj))
		{
			return -1;
		}
		
		// Use native function when possible
		if (arrayObj.indexOf)
		{
			return arrayObj.indexOf(find);
		}
		
		var i;
		
		for (i=0; i<arrayObj.length; i++)
		{
			if (arrayObj[i] == find)
			{
				return i;
			}
		}
		
		return -1;
	};

	// Get requested brushes
	var getReqBrushes = function (nodes)
	{
		if (!YAHOO.lang.isArray(nodes))
		{
			return [];
		}

		var i, j, k,
			re		   = /-codeface$/, 
			nodeCss,
			brushType, 
			reqBrushes    = [];		
		
		// Loop over all nodes
		for (i=0; i<nodes.length; i++)
		{
			// Detect multiple class names
			nodeCss   = nodes[i].className.split(" ");
			
			// Empty out brushType from previous itteration
			brushType = "";
			
			// Loop over class names (usually only one)
			for (k=0; k<nodeCss.length; k++)
			{
				if (re.test(nodeCss[k]))
				{
					brushType = nodeCss[k].replace('-codeface', '').toLowerCase();
			
					if (brushes.hasOwnProperty(brushType) && indexOf(reqBrushes, brushType) === -1)
					{
						reqBrushes.push(brushType);
					}
					break;
				}
			}
		}
		
		return reqBrushes;
	};
	

	var requestedBrushes = getReqBrushes(codeNodes); 
	
	
	var eventChain = {
	
		// Load CSS first
		loadCSS: function()
		{
			loadCSS(basePath + "Styles/SyntaxHighlighter.css", {
				onSuccess: eventChain.loadCoreJS
			});
		},
		
		// Load core JavaScript files
		loadCoreJS: function()
		{
			loadJS(basePath + "Scripts/shCore.js", {
				onSuccess: eventChain.loadBrushes
			});
		},
		
		// Load Brushes
		loadBrushes: function()
		{
			if (YAHOO.lang.isArray(requestedBrushes) && requestedBrushes.length > 0) 
			{
				var thisBrush = requestedBrushes.shift();
				loadJS(basePath + "Scripts/" + brushes[thisBrush], {
					onSuccess: eventChain.loadBrushes
				});
			}
			else
			{
				dp.SyntaxHighlighter.ClipboardSwf = basePath + 'Scripts/clipboard.swf';
				dp.SyntaxHighlighter.HighlightAll('code');
			}
		}
	};
	
	
	if (YAHOO.lang.isArray(codeNodes)) {
		for (i = 0; i < codeNodes.length; i++) {
			codeNodes[i].setAttribute("name", "code");
			codeNodes[i].className = codeNodes[i].className.replace("-codeface", "");
		}
		eventChain.loadCSS();
	}
};

YAHOO.CodeFace.init();