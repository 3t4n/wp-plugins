<?php
/* == Image == */
function afc_img() {
	global $afc_opt;
	if( !empty( $afc_opt['custom_img']['url'] ) ) {
		$output = '<div class="afc-image"><img src="' . $afc_opt['custom_img']['url'] . '"/></div>';
		return $output;
	}
} ?>