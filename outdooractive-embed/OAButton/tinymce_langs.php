<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( '_WP_Editors' ) )
	require( ABSPATH . WPINC . '/class-wp-editor.php' );

function oaembed_tinymce_translation() {
	$adminUrl = admin_url('options-general.php?page=oaembed-admin');
	$youArePro = __('You are Pro+? ', 'outdooractiveEmbed');
	$setProEmbed = __('Set Pro+ Embedding', 'outdooractiveEmbed');
	$setProCode = '<a href="'.$adminUrl.'">'.$setProEmbed.'</a>';
	$setPro = $youArePro . $setProCode;
	$strings = array(
		'insertContent' => __( 'Insert Outdooractive content', 'outdooractiveEmbed' ),
		'embedTitle' => __( 'Insert Content', 'outdooractiveEmbed' ),
		'embedWindowTitle' => __( 'Insert Content', 'outdooractiveEmbed' ),
		'embedLinkLabel' => __( 'Link to Tour, Hut, ...', 'outdooractiveEmbed' ),
		'maxWidth' => __('Maximum width, in pixels', 'outdooractiveEmbed'),
		'usePro' => __('Use Pro+ Embedding', 'outdooractiveEmbed'),
		'setPro' => $setPro,
	);
	$locale = _WP_Editors::$mce_locale;
	$translated = 'tinyMCE.addI18n("' . $locale . '.outdooractiveEmbed", ' . json_encode( $strings ) . ");\n";

	return $translated;
}

$strings = oaembed_tinymce_translation();
?>