<?php
namespace WSDesk\Settings;

use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;

class SettingsItem extends Fluent {
	public function get_meta() {
		if ( $this->get( 'meta' , false ) === false ) {
			$this->meta = new Fluent( eh_crm_get_settingsmeta( $this->settings_id ) );
		}

		return $this->get( 'meta', new Fluent() );
	}

	public static function find_by_slug( $slug ) {
		$settings = new SettingsRepository();

		$item = Arr::first(
			$settings->filter(
				array(
					'slug' => $slug,
				)
			)
		);

		if ( $item ) {
			return new self( $item );
		}

		return null;
	}
}
