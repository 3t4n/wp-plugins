;(function()
{
	// CommonJS
	SyntaxHighlighter = SyntaxHighlighter || (typeof require !== 'undefined'? require('shCore').SyntaxHighlighter : null);

	function Brush()
	{
	
		var keywords =	'set_property get_ports create_clock name current_design';
					
		this.regexList = [
			{ regex: /##.*$/gm, 										css: 'comments' },			// one line comments
            { regex: /(R|L|U|u|u8)?"([^\\"\n]|\\.)*"/g,                 css: 'string' },			// special character
            { regex: /(R|L|U|u|u8)?'([^\\'\n]|\\.)*'/g,                 css: 'string' },			// special string
			{ regex: SyntaxHighlighter.regexLib.doubleQuotedString,		css: 'string' },			// strings
			{ regex: new RegExp(this.getKeywords(keywords), 'gm'),		css: 'keyword bold' }
			];
	};

	Brush.prototype	= new SyntaxHighlighter.Highlighter();
	Brush.aliases	= ['xdc'];

	SyntaxHighlighter.brushes.XDC = Brush;

	// CommonJS
	typeof(exports) != 'undefined' ? exports.Brush = Brush : null;
})();