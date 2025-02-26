<?php
/**
 * Class AWSA_Settings_Sanitize_Field
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Core
 */

namespace AWSA_Core\APIs\Settings;

use AWSA_Core\APIs\Settings\Fields\Validate;

/**
 * Class Settings_Validate_Field
 *
 * @package AWSA_Core\APIs\Settings
 */
class Validate_Field {

	public static function factory( $type ): ?Validate\Base {

		switch ( $type ) {
			case 'select':

				$instance = new Validate\Select();

				break;
			case 'multiselect':

				$instance = new Validate\MultiSelect();

				break;
			case 'checkbox':
			case 'multicheckbox':

				$instance = new Validate\Checkbox();

				break;
			case 'number':

				$instance = new Validate\Number();

				break;
			case 'input':

				$instance = new Validate\Input();

				break;
			default:

				$instance = apply_filters( 'awsa_settings_validate_field_factory', null );
		}

		return $instance ?? null;
	}

}
