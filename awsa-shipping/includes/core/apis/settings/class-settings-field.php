<?php
/**
 * Class AWSA_Settings_Field
 *
 * @version           1.0.1
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Core
 */

namespace AWSA_Core\APIs\Settings;

use AWSA_Core\APIs\Settings\Fields\Display;

/**
 * Class AWSA_Settings_Field
 */
class Settings_Field {

	public static function factory( $type ): ?Display\Base {

		switch ( $type ) {
			case 'select':

				$instance = new Display\Select();

				break;
			case 'multiselect':

				$instance = new Display\MultiSelect();

				break;
			case 'checkbox':
			case 'multicheckbox':

				$instance = new Display\Checkbox();

				break;
			case 'number':

				$instance = new Display\Number();

				break;
			case 'input':
			case 'text':

				$instance = new Display\Input();

				break;
			case 'title':

				$instance = new Display\Title();

				break;
			case 'html':

				$instance = new Display\Html();

				break;
			default:

				$instance = apply_filters( 'awsa_settings_field_factory', null );
		}

		return $instance ?? null;
	}

}
