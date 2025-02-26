function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function ay_linktoevoegen() {
	var linktekst = "";

	var yt_link = document.getElementById('yt_id');
	var yt_width = document.getElementById('yt_width');
	var yt_height = document.getElementById('yt_height');

	if (yt_link)
		linktekst = "[accessibleyoutube id=\"" + yt_link.value + "\" width="
				+ yt_width.value + " height=" + yt_height.value + "]";
	else
		tinyMCEPopup.close();

	if (window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent',
				false, linktekst);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}