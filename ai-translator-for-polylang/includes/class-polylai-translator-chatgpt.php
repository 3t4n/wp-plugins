<?php if (!defined('ABSPATH'))
	exit; ?>
<?php

class polylai_ChatGPT implements polylai_AIEngine
{
	private function makeCall($endpoint, $data = null)
	{
		$options = get_option('polylai_translator_options');

		$api_key = $options['openai_key'];
		$org_id = $options['openai_org'];

		$response = wp_remote_post("https://api.openai.com/v1$endpoint", [
			'timeout' => 100000,
			'method' => 'POST',
			'blocking' => true,
			'body' => json_encode($data), // cannot use wp_json_encode here
			'headers' => [
				"Authorization" => "Bearer $api_key",
				"Content-Type" => "application/json",
				"OpenAI-Organization" => $org_id
			]
		]);

		// print_r($response['body']);

		if (is_wp_error($response)) {
			polylai_Utils::db_log('error', 'translate', $response->get_error_message());
			throw new Exception(esc_html($response->get_error_message()));
		} else {
			return json_decode($response['body']);
		}
	}

	public static function listModels()
	{
		$options = get_option('polylai_translator_options');

		$api_key = $options['openai_key'];

		// Set the request URL and headers
		$url = 'https://api.openai.com/v1/models';
		$headers = [
			'Authorization' => 'Bearer ' . $api_key,
			'Content-Type' => 'application/json'
		];

		// Make the request using wp_remote_get
		$response = wp_remote_get($url, [
			'headers' => $headers
		]);

		// Check for errors
		if (is_wp_error($response)) {
			$data = ['data' => []];
			return $data['error'] = $response->get_error_message();
		} else {
			// Decode the response and print the list of models
			$body = wp_remote_retrieve_body($response);
			$data = json_decode($body, true);
			return $data;
		}

	}

	public function translate($text, $locale_from, $locale_to, $post_id, $plain_text = false)
	{
		$request = new polylai_TranslationRequest();
		$request->text = $text;
		$request->locale_from = $locale_from;
		$request->locale_to = $locale_to;
		$request->post_id = $post_id;
		$request->plain_text = $plain_text;
		return $this->translateRequest($request);
	}

	/**
	 * Summary of translate
	 * @param polylai_TranslationRequest $request
	 * @throws \Exception
	 * @return mixed
	 */
	public function translateRequest($request)
	{
		polylai_Utils::db_log('debug', 'chatgpt', "translate ID:$request->post_id ($request->locale_to)");
		$options = get_option('polylai_translator_options');
		if ($request->custom_prompt) {
			$prompt = $request->custom_prompt;
		} else {
			$prompt = "Translate the following HTML code from $request->locale_from to $request->locale_to. 
						You must be very careful not to alter the structure of the code! 
						You must translate the texts, even those inside the html comments. 
						Do not add any of your own comments to the answer. Do not write 
						\"Certainly\" or \"Sure\" or similar phrases. 
						You must only respond with the requested translation following 
						the instructions I have provided.: \n\n[text]";

			if ($request->plain_text) {
				$prompt = "Translate the following text from $request->locale_from to $request->locale_to. 
						Do not add any of your own comments to the answer. Do not write 
						\"Certainly\" or \"Sure\" or similar phrases. 
						You must only respond with the requested translation following 
						the instructions I have provided: \n\n[text]";
			}
		}

		$prompt = str_replace('[text]', $request->text, $prompt);

		$data = array();
		$data["model"] = $options['openai_model'];
		if (empty($data["model"])) {
			$data["model"] = "gpt-4o";
		}

		$data["messages"] = [];
		// o1 models uses "developer" role instead of "system"
		if (strpos($data["model"], "o1") < 0) {
			$data["messages"][] = ["role" => "system", "content" => "You are a professional translator."];
		}



		$data["messages"][] = ["role" => "user", "content" => $prompt];
		$data["temperature"] = 0;
		if (strpos($data["model"], "o1") === 0) {
			unset($data["temperature"]);
		}

		try {
			polylai_Utils::db_log('debug', 'chatgpt', "before call");
			$result = $this->makeCall('/chat/completions', $data);
			if (isset($result->error)) {
				polylai_Utils::db_log('debug', 'chatgpt', "error");
				throw new Exception($result->error->message);
			}
			polylai_Utils::db_log('debug', 'chatgpt', "after call");
		} catch (Exception $e) {
			polylai_Utils::db_log('error', 'translate', 'ChatGPT response error: ' . $e->getMessage(), $request->post_id, null, $request->text);
			return $request->text;
		}
		$content = $result->choices[0]->message->content;

		preg_match('/```html(.*?)```/s', $content, $matches);

		if (isset($matches[1])) {
			$content = trim($matches[1]);
		}

		preg_match('/```json(.*?)```/s', $content, $matches);
		if (isset($matches[1])) {
			$content = trim($matches[1]);
		}

		return $content;
	}

}