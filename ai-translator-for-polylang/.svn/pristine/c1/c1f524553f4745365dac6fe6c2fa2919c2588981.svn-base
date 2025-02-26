<?php

class polylai_Yoast
{
	public static function translate_meta($id, $current_locale_name, $locale_name, $translator)
	{
		$meta_keys = [
			'_yoast_wpseo_bctitle',
			'_yoast_wpseo_metadesc',
			'_yoast_wpseo_focuskw',
			'_yoast_wpseo_title'
		];

		$meta = [];
		foreach ($meta_keys as $key) {
			$item = get_post_meta($id, $key, true);
			if ($item) {
				$meta[$key] = $translator->translate($item, $current_locale_name, $locale_name, $id, true);
			}
		}

		return $meta;
	}
}