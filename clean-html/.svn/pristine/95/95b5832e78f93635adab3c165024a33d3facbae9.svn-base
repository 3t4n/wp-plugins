/*********************
*
*	Insertion Functions
*
*/

var win = window.dialogArguments || opener || parent || top;

function cleanHTML() {
	var answer = confirm("Really remove all dirty HTML?");

	if (answer) {
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('div'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('span'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('table'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('tbody'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('tr'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('td'), true);
		tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('col'), true);
	}

}