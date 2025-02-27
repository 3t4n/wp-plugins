<?php 
	
/** Content Width ***/
$contW = rwmb_meta( 'wpdp_contW', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Background Color ***/
$btnBgColor = rwmb_meta( 'wpdp_btnBgColor', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Text Color ***/
$btnTxtColor = rwmb_meta( 'wpdp_btnTxtColor', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Border Color ***/
$btnBorderColor = rwmb_meta( 'wpdp_btnBorderColor', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Background Color Hover ***/
$btnBgColorHover = rwmb_meta( 'wpdp_btnBgColorHover', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Text Color Hover ***/
$btnTxtColorHover = rwmb_meta( 'wpdp_btnTxtColorHover', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Button Border Color Hover ***/
$btnBorderColorHover = rwmb_meta( 'wpdp_btnBorderColorHover', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Overlay Background Opacity ***/
$bgOpacity = rwmb_meta( 'wpdp_overlayBgOpacity', array( 'object_type' => 'setting' ), 'wpdp_settings' );

/** Overlay Background Color ***/
$bgcolor = rwmb_meta( 'wpdp_overlayBgColor', array( 'object_type' => 'setting' ), 'wpdp_settings' );

?>

/**
 * All of the CSS for your public-facing functionality should be
 * included in this file.
 */

body.modal-wpdp {
	overflow: hidden;
}

body.modal-wpdp .mfp-bg {
	background: <?php echo $bgcolor; ?>;
    opacity: <?php echo $bgOpacity; ?>;
}

.wpdp-white-popup {
	position: relative;
	background: #FFF;
	padding: 20px;
	width: auto;
	max-width: <?php echo $contW; ?>px;
	margin: 20px auto;
}

#wp-disclaimer-popup p.wpdp-footer {
	text-align: center;
}

#wp-disclaimer-popup #wpdp-decline {
	margin-left: 25px;
}

#wp-disclaimer-popup span#wpdp-close,
#wp-disclaimer-popup #wpdp-decline {
	padding: 4px 25px;
    display: inline-block;
    border: 2px solid;
    border-color: <?php echo $btnBorderColor; ?>;
    margin-top: 1rem;
    border-radius: 4px;
    text-transform: uppercase;
    font-size: 1rem;
    color: <?php echo $btnTxtColor; ?>;
    font-weight: 600;
    text-decoration: none;
    background-color: <?php echo $btnBgColor; ?>
}

#wp-disclaimer-popup span#wpdp-close:hover,
#wp-disclaimer-popup #wpdp-decline:hover {
	background-color: <?php echo $btnBgColorHover; ?>;
	cursor: pointer;
	color: <?php echo $btnTxtColorHover; ?>;
	border-color: <?php echo $btnBorderColorHover; ?>;
}