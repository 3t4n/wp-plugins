window.onkeypress = protection;
window.oncontextmenu = protection;
document.body.onmousedown = "return false";
document.body.onselectstart = "return false";
document.body.style.MozUserSelect = "none";
function protection(e) {
	if (e.which==3) {
		alert("<?php echo $_GET["m"];?>");
		return false;
	}
}