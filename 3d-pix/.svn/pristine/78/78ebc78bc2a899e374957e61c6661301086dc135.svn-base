<?php

/**
 * @author Tony Asch
 * @copyright 2010
 * @description Use WordPress Shortcode API for more features
 * @Docs http://codex.wordpress.org/Shortcode_API
 */
class tdPix_shortcodes {

    var $count = 1;

    // register the new shortcodes
    function tdPix_shortcodes() {

        add_shortcode('3dpix', array(&$this, 'show_tdPix'));
    }

    function show_tdPix($atts) {

        global $tdPix;

        extract(shortcode_atts(array(
                    'id' => false,
                    'width' => get_option('tdpix_width'),
                    'height' => get_option('tdpix_height'),
                    'mode' => get_option('tdpix_mode')
                        ), $atts));

		// new or old Phereo picture numbering system. Old numbers are < 2000 and have no hex digits (i.e. "a")
		$idtype = "e";
		if (is_numeric($id) && ($id < 2000))   $idtype = "a";
		
        $out = '<span><iframe class="phereoframe"  src="http://phereo.com/' . $idtype . '/embed/' . $id . '/' . $mode . '/' . $width . '.' . $height . '/important" width="' . $width . '" height="' . $height . '" frameborder="1" vspace="0" hspace="0" marginwidth="0" marginheight="0" scrolling="no" noresize><p class="pherotagline">See stereo 3D on <a href="http://phereo.com">Phereo</a>.</p></iframe></span>';

        return $out;
    }

}

// let's use it
$tdPixShortcodes = new tdPix_Shortcodes;
?>