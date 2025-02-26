<?php
/**
 * Insights API functions
 *
 * @package momoacgwc
 * @author MoMo Themes
 * @since v1.2.5
 */
class MoMo_ACGWC_Insights_API {
	/**
	 * Makes an API call to the OpenAI service using given prompt.
	 *
	 * This function retrieves the OpenAI settings, prepares a message with the provided prompt,
	 * and sends a request to the OpenAI API to generate a response.
	 *
	 * @param string $prompt The input prompt to be sent to the OpenAI API.
	 * @param string $type   The type of response expected from the OpenAI API. Default is 'json'.
	 */
	public function insights_api_call( $prompt, $type = 'json' ) {
		global $momoacgwc;
		$openai_settings = get_option( 'momo_acg_wc_openai_settings' );
		$default_model   = isset( $openai_settings['default_model'] ) ? $openai_settings['default_model'] : 'gpt-3.5-turbo';
		$default_lang    = isset( $openai_settings['default_lang'] ) ? $openai_settings['default_lang'] : 'english';

		$model     = $default_model;
		$modeltype = $momoacgwc->fn->momo_get_model_type( $model );

		$message[] = array(
			'role'    => 'user',
			'content' => $prompt,
		);
		$message[] = $this->momo_insights_helper_get_initial_message( $type );

		$temperature = '0.7';
		$max_tokens  = '660';
		if ( 'chat' === $modeltype ) {
			$body = array(
				'model'       => $model,
				'temperature' => (float) $temperature,
				'max_tokens'  => (int) $max_tokens,
				'messages'    => $message,
			);
			$url  = 'https://api.openai.com/v1/chat/completions';
		} else {
			$context = isset( $chatbot_settings['context'] ) ? $chatbot_settings['context'] : '';

			$prompt = $question . '?' . "\n";
			$body   = array(
				'model'       => $model,
				'temperature' => (float) $temperature,
				'max_tokens'  => (int) $max_tokens,
				'prompt'      => $prompt,
			);
			$url    = 'https://api.openai.com/v1/completions';
		}
		$response = $momoacgwc->fn->momo_acg_wc_run_rest_api( 'POST', $url, $body );
		$message  = '';
		if ( isset( $response['status'] ) && 200 === $response['status'] ) {
			$choices = isset( $response['body']->choices ) ? $response['body']->choices : array();

			foreach ( $choices as $choice ) {
				if ( 'chat' === $modeltype ) {
					$message .= $choice->message->content;

				} else {
					$message .= $choice->text;

				}
				$status = 'good';
			}
		}

		return $message;
	}
	/**
	 * Makes an API call to the OpenAI service using the revenue insights data.
	 *
	 * This function retrieves the revenue insights data, prepares a message with the data,
	 * and sends a request to the OpenAI API to generate a response.
	 *
	 * @param string $time_filter The time filter for the insights data. Default is 'monthly'.
	 */
	public function get_revenue_insights_data( $time_filter = 'monthly' ) {
		global $momoacgwc;
		$insights_data = $momoacgwc->instfn->generate_total_revenue_by_time_filter( $time_filter );
		/* translators: %1$s = time filter, %2$s = time filter */
		$prompt_template = esc_html__(
			'Given the historical %1$s revenue, predict the revenue trend for the next %2$s in percentage (title: trend_percentage) along with JSON data for the next 3 consecutive period (title: predicted_revenue (same format as historical)), also prediction sentence(s) (title: suggestion)',
			'momoacgwc'
		);

		$prompt   = sprintf( $prompt_template, esc_html( $time_filter ), esc_html( $time_filter ) ) . "\n" . wp_json_encode( $insights_data );
		$response = $this->insights_api_call( $prompt );

		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response = json_decode( $json_data, true );
		$trend_text   = '';
		$trend_data   = array();
		if ( $api_response ) {
			$trend_percentage = isset( $api_response['trend_percentage'] ) ? $api_response['trend_percentage'] : 0;
			$trend_data       = isset( $api_response['predicted_revenue'] ) ? $api_response['predicted_revenue'] : array();
			$suggestion       = isset( $api_response['suggestion'] ) ? $api_response['suggestion'] : '';

			$trend_text = $suggestion;
		}
		return array(
			'text'   => $trend_text,
			'data'   => $trend_data,
			'actual' => $insights_data,
		);
	}
	/**
	 * Makes an API call to the OpenAI service using the revenue insights data.
	 *
	 * This function retrieves the revenue insights data, prepares a message with the data,
	 * and sends a request to the OpenAI API to generate a response.
	 *
	 * @param string $time_filter The time filter for the insights data. Default is 'monthly'.
	 */
	public function get_order_insights_data( $time_filter = 'monthly' ) {
		global $momoacgwc;
		$insights_data = $momoacgwc->instfn->generate_total_order_by_time_filter( $time_filter );
		/* translators: %1$s = time filter, %2$s = time filter */
		$prompt_template = esc_html__(
			'Given the historical %1$s order, predict the order trend for the next %2$s in percentage (title: trend_percentage) along with JSON data for the next 3 consecutive period (title: predicted_order (same format as historical)), also prediction sentence(s) (title: suggestion)',
			'momoacgwc'
		);

		$prompt   = sprintf( $prompt_template, esc_html( $time_filter ), esc_html( $time_filter ) ) . "\n" . wp_json_encode( $insights_data );
		$response = $this->insights_api_call( $prompt );

		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response = json_decode( $json_data, true );
		$trend_text   = '';
		$trend_data   = array();
		if ( $api_response ) {
			$trend_percentage = isset( $api_response['trend_percentage'] ) ? $api_response['trend_percentage'] : 0;
			$trend_data       = isset( $api_response['predicted_order'] ) ? $api_response['predicted_order'] : array();
			$suggestion       = isset( $api_response['suggestion'] ) ? $api_response['suggestion'] : '';

			$trend_text = $suggestion;
		}
		return array(
			'text'   => $trend_text,
			'data'   => $trend_data,
			'actual' => $insights_data,
		);
	}
	/**
	 * Makes an API call to the OpenAI service using the revenue insights data.
	 *
	 * This function retrieves the revenue insights data, prepares a message with the data,
	 * and sends a request to the OpenAI API to generate a response.
	 *
	 * @param string $time_filter The time filter for the insights data. Default is 'monthly'.
	 */
	public function get_average_order_insights_data( $time_filter = 'monthly' ) {
		global $momoacgwc;
		$insights_data = $momoacgwc->instfn->generate_average_order_by_time_filter( $time_filter );
		/* translators: %1$s = time filter, %2$s = time filter */
		$prompt_template = esc_html__(
			'Given the historical %1$s average order, predict the average order trend for the next %2$s in percentage (title: trend_percentage) along with JSON data for the next 3 consecutive period (title: predicted_order (same format as historical)), also prediction sentence(s) (title: suggestion)',
			'momoacgwc'
		);

		$prompt   = sprintf( $prompt_template, esc_html( $time_filter ), esc_html( $time_filter ) ) . "\n" . wp_json_encode( $insights_data );
		$response = $this->insights_api_call( $prompt );

		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response = json_decode( $json_data, true );
		$trend_text   = '';
		$trend_data   = array();
		if ( $api_response ) {
			$trend_percentage = isset( $api_response['trend_percentage'] ) ? $api_response['trend_percentage'] : 0;
			$trend_data       = isset( $api_response['predicted_order'] ) ? $api_response['predicted_order'] : array();
			$suggestion       = isset( $api_response['suggestion'] ) ? $api_response['suggestion'] : '';

			$trend_text = $suggestion;
		}
		return array(
			'text'   => $trend_text,
			'data'   => $trend_data,
			'actual' => $insights_data,
		);
	}
	/**
	 * Retrieve sales trends data for the specified period.
	 *
	 * @param string $period The period to retrieve data for ('weekly' or 'monthly').
	 * @return array An array containing 'labels' (days) and 'data' (sales totals).
	 */
	public function get_sales_trends_data_insights( $period = 'weekly' ) {
		global $momoacgwc;
		$insights_data = $momoacgwc->instfn->get_sales_trends_data( $period );
		$prompt        = sprintf( esc_html__( 'Given the historical sales data,  predict the sales trend for the next %s (title: trend_percentage) along with json data for next 3 %s (title: predicted_order), also prediction sentence(s) (title: suggestion', 'momoacgwc' ) . "\n" . wp_json_encode( $insights_data ), $period, $period );
		$response      = $this->insights_api_call( $prompt );

		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response = json_decode( $json_data, true );
		$trend_text   = '';
		$trend_data   = array();
		if ( $api_response ) {
			$trend_percentage = isset( $api_response['trend_percentage'] ) ? $api_response['trend_percentage'] : 0;
			$trend_data       = isset( $api_response['predicted_order'] ) ? $api_response['predicted_order'] : array();
			$suggestion       = isset( $api_response['suggestion'] ) ? $api_response['suggestion'] : '';

			$trend_text = $suggestion;
		}
		return array(
			'text'   => $trend_text,
			'data'   => $trend_data,
			'actual' => $insights_data,
		);
	}
	/**
	 * Retrieve overall insights data.
	 *
	 * This function retrieves the overall forecast and actual data for revenue, orders, and sales.
	 *
	 * @param string $time_filter The time filter for the insights data. Default is 'monthly'.
	 *
	 * @return array An associative array containing the API response.
	 */
	public function get_overall_insights_data( $time_filter = 'monthly' ) {
		global $momoacgwc;
		$overall_data = $momoacgwc->instfn->momo_get_overall_forecast_with_actual( $time_filter );
		$actual       = $overall_data['actual'];
		$predicted    = $overall_data['predicted'];

		$forecast_data   = wp_json_encode( $predicted );
		$historical_data = wp_json_encode( $actual );
		$prompt          = sprintf(
			/* translators: %s: time filter, %s: forecast data, %s: historical data */
			esc_html__(
				"Here is the forecast %s data: %s and historical data: %s. Provide insights and recommendations to improve business performance, each titled with 'insights', 'recommendation', where 'insights' and 'recommendation' have 'category' and 'message' in it (exact word please for title)(negative data means return).",
				'momoacgwc'
			),
			$time_filter,
			$forecast_data,
			$historical_data
		);

		$response = $this->insights_api_call( $prompt );
		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response = json_decode( $json_data, true );

		$prompt          = sprintf(
			/* translators: %s: time filter, %s: forecast data, %s: historical data */
			esc_html__(
				"Here is the %s forecast data: %s and historical data: %s. Provide graph data to improve business performance titled with 'graph_data' where 'graph_data' has 'labels' and 'category' with ( 'revenue' and 'orders' ) only which can be directly implemented to chart.js for above provided category (revenue, orders ) (exact word for title please).",
				'momoacgwc'
			),
			$time_filter,
			$forecast_data,
			$historical_data
		);

		$response = $this->insights_api_call( $prompt );
		preg_match( '/<momojson>(.*?)<\/momojson>/s', $response, $matches );
		$json_data = $matches[1] ?? '';

		$api_response2 = json_decode( $json_data, true );
		$api_response  = array_merge( $api_response, $api_response2 );
		return $api_response;
	}
	/**
	 * Generate an AI template based on template type.
	 *
	 * @param string $template_type The template type to generate a template for.
	 */
	public function momoacgwc_get_ai_template( $template_type ) {
		$website_url  = get_home_url();
		$cart_url     = wc_get_cart_url();
		$website_name = get_bloginfo( 'name' );
		$logo_url     = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );

		$prompt  = esc_html__( 'Generate a WordPress WooCommerce email template for ', 'momoacgwc' ) . $template_type;
		$prompt .= ' with the following details (if needed):';
		$prompt .= "\nWebsite URL: " . esc_url( $website_url );
		$prompt .= "\nCart URL: " . esc_url( $cart_url );
		$prompt .= "\nWebsite Name: " . esc_html( $website_name );
		$prompt .= "\nLogo URL: " . esc_url( $logo_url );

		$response = $this->insights_api_call( $prompt, 'html' );
		preg_match( '/<momomarkdown>(.*?)<\/momomarkdown>/s', $response, $matches );
		$data = $matches[1] ?? '';

		return $data;
	}
	/**
	 * Get some predefined cotext
	 *
	 * @param string $type The type of context to get.
	 */
	public function momo_insights_helper_get_initial_message( $type = 'json' ) {
		if ( 'json' === $type ) {
			$message = array(
				'role'    => 'system',
				'content' => esc_html__( "You are an AI assistant, your task is to generate and modify content based on user requests. This functionality is integrated into the AI Tools developed by MoMo Themes. Strictly follow these rules: Format your responses in json syntax. (just put data inside <momojson></momojson>\\n\\n- If you cannot generate a meaningful response to a user’s request, reply with '__MOMO_AI_HELPER_ERROR__'. This term should only be used in this context, it is used to generate user facing errors.\\n\\n", 'momoacgwc' ),
			);
		} else {
			$message = array(
				'role'    => 'system',
				'content' => esc_html__( "You are an AI assistant, your task is to generate and modify content based on user requests. This functionality is integrated into the AI Tools developed by MoMo Themes. Strictly use tags accepted by emails also add styles inside<style>. (just put data inside <momomarkdown></momomarkdown>)\\n\\n- Execute the request without any acknowledgement to the user.\\n\\n- Avoid sensitive or controversial topics and ensure your responses are grammatically correct and coherent.\\n\\n- If you cannot generate a meaningful response to a user’s request, reply with '__MOMO_AI_HELPER_ERROR__'. This term should only be used in this context, it is used to generate user facing errors.\\n\\n", 'momoacg' ),
			);
		}
		return $message;
	}
}
