jQuery(document).ready(function () {
	jQuery(document).on("click", ".docs2site-authkey-copy", function (event) {
		event.preventDefault();
		var tokenvalue = jQuery(this).siblings("#docs2site-auth-token").val();
		var textArea = document.createElement("textarea");
		textArea.value = tokenvalue;
		document.body.appendChild(textArea);
		textArea.select();
		jQuery(this).siblings("#docs2site-auth-token").select();
		document.execCommand("copy");
		document.body.removeChild(textArea);
	});
});
