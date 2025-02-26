<?php

namespace Alexr\Models\Traits;

trait HasSettings {

	// Helpers for settings
	//----------------------------------------------------

	public function getSettingsAttribute()
	{
		try {
			if (isset($this->attributes['settings'])) {

				$data = $this->attributes['settings'];
				if (is_array($data)) {
					return $data;

				}
				if (is_string($data)) {
					$data = json_decode($this->attributes['settings'], true);
					if (is_array($data)) {
						return $data;
					}
				}
			}
			return [];
		} catch (\Exception $e) {
			return [];
		}
	}

	public function setSettingsAttribute($value)
	{
		$this->attributes['settings'] = $value;
	}

	protected function get_setting($key)
	{
		$settings = $this->settings;
		if (isset($settings[$key])) {
			return $settings[$key];
		}
		return null;
	}

	protected function set_setting($key, $value)
	{
		$settings = $this->settings;
		if (!$settings) {
			$settings = [];
		}
		$settings[$key] = $value;
		$this->settings = $settings;
	}

}
