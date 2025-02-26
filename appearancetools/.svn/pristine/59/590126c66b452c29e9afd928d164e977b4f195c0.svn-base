<?php

/**
 * This class defines all plugin functionality.
 *
 * @since      1.0.0
 * @package    AppearanceTools
 * @subpackage AppearanceTools/inc
 * @author     James Roberts <https://llamapress.com/>
 */
if ( ! class_exists( 'AppearanceTools' ) ) {
	class AppearanceTools {
		/**
		* Update settings.
		*
		* This method will set all the available options in the Block Editor to TRUE.
		*
		* @since    1.0.0
		*/
		public function appearancetools_true( $theme_json ) {
			// Get current data.
			$current = $theme_json->get_data();

			// Set version number.
			if ( array_key_exists( 'version', $current ) ) {
				$version = $current['version'];
			} else {
				$version = 2;
			}

			// Create an array of new data, setting all values to TRUE.
			$new_data = array(
				'version'  => $version,
				'settings' => array(
					// Note, we cannot simply set 'appearanceTools' to true, as themes may decide to disable settings individually.
					'appearanceTools' => true,
					'border'          => array(
						'color'  => true,
						'radius' => true,
						'style'  => true,
						'width'  => true,
					),
					'color'           => array(
						'text'             => true,
						'background'       => true,
						'link'             => true,
						'custom'           => true,
						'customDuotone'    => true,
						'customGradient'   => true,
						'defaultDuotone'   => true,
						'defaultGradients' => true,
						'defaultPalette'   => true,
					),
					'dimensions'      => array(
						'minHeight' => true,
					),
					'spacing'         => array(
						'blockGap'          => true,
						'margin'            => true,
						'padding'           => true,
						'customSpacingSize' => true,
					),
					'shadow'          => array(
						'defaultPresets' => true,
					),
					'typography'      => array(
						'customFontSize' => true,
						'fontStyle'      => true,
						'fontWeight'     => true,
						'letterSpacing'  => true,
						'lineHeight'     => true,
						'textDecoration' => true,
						'textTransform'  => true,
						'dropCap'        => true,
					),
				),
			);

			// Return the new data.
			return $theme_json->update_with( $new_data );
		}
	}
}
