<?php

class polylai_Elementor
{
	public static function translate_meta($id, $current_locale_name, $locale_name, $translator)
	{
		global $wpdb;

		$meta = [];
		$all_meta = get_post_meta($id);

		foreach ($all_meta as $key => $value) {
			if (strpos($key, '_elementor_') === 0) {
				$meta[$key] = $value[0];

				if ($key == "_elementor_page_assets" || $key == "_elementor_css") {
					$meta[$key] = unserialize($value[0]);
				}

				if ($key == "_elementor_data") {
					$request = new polylai_TranslationRequest();
					$request->text = $value[0];
					$request->locale_from = $current_locale_name;
					$request->locale_to = $locale_name;
					$request->post_id = $id;
					$request->custom_prompt = "You are a professional translator with IT skills. In particular, " .
						"you know the JSON format very well and you know the WordPress plugin " .
						"called Elementor very well. Below you will find the JSON file contained " .
						"in the meta post _elementor_data and which contains both technical " .
						"information and the actual content to be translated. " .
						"Translate the following text from $request->locale_from to $request->locale_to, taking care not " .
						"to alter the JSON structure and above all to translate only the fields " .
						"that contain displayed text. Do not add any of your own comments to the answer. Do not write 
						\"Certainly\" or \"Sure\" or \"Here is the translated JSON\" or similar phrases. " .
						"Here is the JSON:\n\n$request->text";
					$meta[$key] = $translator->translateRequest($request);
				}
			}
		}

		$pageTemplate = get_post_meta($id, '_wp_page_template', true);
		if ($pageTemplate) {
			$meta['_wp_page_template'] = $pageTemplate;
		}

		return $meta;
	}
}