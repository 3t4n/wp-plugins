<?php
namespace WSDesk\Settings;

use Illuminate\Support\Arr;

class SettingsRepository {

	const TABLE_NAME      = 'wsdesk_settings';
	const TABLE_META_NAME = 'wsdesk_settingsmeta';
	const CACHE_TIME      = 60 * 30;

	public function get() {
		$settings = wp_cache_get( self::class, 'wsdesk' );

		if ( false === $settings ) {
			$settings = array_values(
				array_map(
					function ( $setting ) {
						return (array) $setting;
					},
					wpFluent()->table( self::TABLE_NAME )->get()
				)
			);

			wp_cache_set( self::class, $settings, 'wsdesk', self::CACHE_TIME );
		}

		return $settings;
	}

	public function filter( array $filters ) {
		return array_values(
			array_filter(
				$this->get(),
				function ( $item ) use ( $filters ) {
					foreach ( $filters as $key => $value ) {
						if ( $item[ $key ] != $value ) {
							return false;
						}
					}
					return true;
				}
			)
		);
	}

	public function getLabels() {
		$filter = [
			'type' => 'label',
		];
		return $this->filter( $filter );
	}

	public function getFilterableLabels() {
		$filter = [
			'type'   => 'label',
			'filter' => 'yes',
		];
		return $this->filter( $filter );
	}

	public function getTags() {
		$filter = [
			'type' => 'tag',
		];
		return $this->filter( $filter );
	}

	public function getFilterableTags() {
		$filter = [
			'type'   => 'tag',
			'filter' => 'yes',
		];
		return $this->filter( $filter );
	}

	public function getTemplates() {
		$filter = [
			'type' => 'template',
		];
		return $this->filter( $filter );
	}

	public function getFields() {
		$filter = [
			'type' => 'field',
		];
		return $this->filter( $filter );
	}

	public function getViews() {
		$filter = [
			'type' => 'view',
		];

		return $this->filter( $filter );
	}

	public function getFilterableViews() {
		$filter = [
			'type'   => 'view',
			'filter' => 'yes',
		];

		return $this->filter( $filter );
	}

	public function getView( $slug ) {
		$filter = [
			'type' => 'view',
			'slug' => $slug,
		];
		return Arr::first( $this->filter( $filter ) );
	}
}
