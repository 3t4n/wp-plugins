<?php

/**
 * Gets plugin instance.
 *
 * @return Kama_WP_Smiles_Plugin|Kama_WP_Smiles_Admin
 */
function kwsmile(){
	return Kama_WP_Smiles_Plugin::instance();
}

/**
 * Gets smiles HTML for specified textarea.
 *
 * @param string $textarea_id  textarea ID
 *
 * @return string HTML
 */
function kws_get_smiles_html( $textarea_id ){
	return kwsmile()->get_all_smile_html( $textarea_id ) . kwsmile()->insert_smile_js();
}

/**
 * Convert smiles code to HTML IMG in passed content.
 *
 * @param string $content  Content where need smiles convert
 *
 * @return string Filtered content
 */
function kws_convert_smiles( $content ){
	return kwsmile()->convert_smilies( $content );
}


// DEPRECATED --------------

/**
 * @deprecated
 */
function kama_sm_get_smiles_code( $textarea_id ){
	_deprecated_function( __FUNCTION__, '1.9.0', 'kws_get_smiles_html()' );

	return kws_get_smiles_html( $textarea_id );
}
