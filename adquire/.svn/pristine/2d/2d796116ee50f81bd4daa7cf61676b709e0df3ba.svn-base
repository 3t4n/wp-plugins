/**
 * Resizing the iFrame based on the height of AdQuire
 * This JavaScript is only specific to page where AdQuire will be embedded
 */
jQuery(document).ready(function() {
	iFrame = jQuery('#PD_Main_Iframe')[0];

	if (iFrame && iFrame.contentDocument.body !== null) {
		setInterval(function() {
			iFrameTotalHeight = iFrame.contentDocument.body.offsetHeight + 35;

			if (iFrame.height !== iFrameTotalHeight) {
				iFrame.height = iFrameTotalHeight;
			}
		}, 100);
	}
});
