<?php

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'You are not allowed to access this file directly.' );
}

class Engagebay_Forms_Elementor_Widget extends \Elementor\Widget_Base {
	public function get_name() {
		return 'EngageBay Forms';
	}

	public function get_title() {
		return esc_html( 'EngageBay Form' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_custom_help_url() {
		return 'https://wordpress.org/support/plugin/engagebay-forms/';
	}

	public function get_categories() {
		return array( 'general', 'engagebay-forms' );
	}

	public function get_keywords() {
		return array( 'engagebay', 'form' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html( __( 'Form', 'engagebayforms' ) ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$engageBayFormOptions = $this->get_engagebay_form_select_options();
		$this->add_control(
			'content',
			array(
				'label'   => esc_html__( 'Select Form', 'engagebayforms' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $engageBayFormOptions
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings        = $this->get_settings_for_display();
		$engageBayFormId = $settings['content'];

		if ( Plugin::$instance->editor->is_edit_mode() ) {
			?>
            <div class="engagebay-form-edit-mode"
                 data-attributes="<?php echo esc_attr( wp_json_encode( $engageBayFormId ) ); ?>">
            </div>
			<?php
			if ( empty( $engageBayFormId ) ) {
				?>
                <div class="engagebay-widget-empty">
                    <div class="engagebay-widget-loader">
<!--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" style="width: 40px"><radialGradient id="a10" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)"><stop offset="0" stop-color="#000000"></stop><stop offset=".3" stop-color="#000000" stop-opacity=".9"></stop><stop offset=".6" stop-color="#000000" stop-opacity=".6"></stop><stop offset=".8" stop-color="#000000" stop-opacity=".3"></stop><stop offset="1" stop-color="#000000" stop-opacity="0"></stop></radialGradient><circle transform-origin="center" fill="none" stroke="url(#a10)" stroke-width="8" stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></circle><circle transform-origin="center" fill="none" opacity=".2" stroke="#000000" stroke-width="8" stroke-linecap="round" cx="100" cy="100" r="70"></circle></svg>-->
                    </div>
                </div>
				<?php
			}
		}

		if ( ! empty( $engageBayFormId ) ) {
			echo do_shortcode( '[engagebayform id=' . $engageBayFormId . ']' );
		}
	}

	private function get_engagebay_form_select_options() {
		$data     = ['' => 'Select Form'];
		$rest_api = sanitize_text_field( get_option( 'engagebay_rest_api' ) );
		$domain   = sanitize_text_field( get_option( 'engagebay_domain' ) );
		$email    = sanitize_email( get_option( 'engagebay_email' ) );

		if ( ! empty( $domain ) && ! empty( $email ) && ! empty( $rest_api ) ) {
			$api_url  = 'https://app.engagebay.com/dev/api/panel/forms?page_size=1000';
			$response = wp_remote_get(
				$api_url,
				[
					'timeout'   => 40,
					'method'    => 'GET',
					'sslverify' => true,
					'headers'   => [
						'Authorization' => $rest_api,
						'ebwhitelist'   => true,
						'Accept'        => 'application/json;ver=1.0',
						'Content-Type'  => 'application/json; charset=UTF-8',
					],
				]
			);

			if ( is_wp_error( $response ) ) {
				// Log the error or return empty data
				return $data;
			}

			$body   = wp_remote_retrieve_body( $response );
			$result = json_decode( $body, false, 512, JSON_BIGINT_AS_STRING );

			if ( is_array( $result ) && count( $result ) > 0 ) {
				foreach ( $result as $item ) {
                    if ($item->form_type !== 'STATIC') {
                        continue;
                    }
					if ( isset( $item->id, $item->name ) ) {
						$data[ $item->id ] = $item->name;
					}
				}
			}
		}

		return $data;
	}
}