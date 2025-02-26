<?php
namespace ActirisePublic\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Actirise\Includes\Api;
use Actirise\Includes\Cron;
use Actirise\Includes\Helpers;
use Actirise\Includes\Logger;
use Actirise\Includes\Options;

/**
 * This class manages the presized divs.
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/public/includes
 * @author     actirise <wordpress@actirise.com>
 *
 * @phpstan-type PresizedDivXpathConfigInjection array{hierarchy: string, xpath: array<string>}
 * @phpstan-type PresizedDivXpathConfigTarget array{devices: array<string>, page?: array{'operator': string, 'value': string}, variables?: array{'operator': string, 'value': string, 'name': string}, url?: array{'operator': string, 'value': string, 'name': string}, utm?: array{'operator': string, 'value': string, 'name': string}}
 * @phpstan-type PresizedDivXpathConfig array{injection: array<PresizedDivXpathConfigInjection>, target?: PresizedDivXpathConfigTarget, htmlCode: string}
 * @phpstan-type PresizedDivSlot array{slotName: string, htmlCode: string, cssCode: string, devices: array<int, string>, xpathConfig: array<PresizedDivXpathConfig>}
 */
final class PresizedDiv {
	/**
	 * Presized divs
	 *
	 * @since    2.0.0
	 * @var NoPub
	 */
	private $no_pub;

	/**
	 * PresizedDiv constructor.
	 *
	 * @since    2.0.0
	 * @param NoPub $no_pub NoPub.
	 */
	public function __construct( $no_pub ) {
		$this->no_pub = $no_pub;

		if ( $GLOBALS['pagenow'] === 'wp-login.php' ) {
			return;
		}

		if ( ACTIRISE_CRON !== 'true' ) {
			$this->update_presized_div();
		}
	}

	/**
	 * Render presized divs
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function render() {
		if ( Options::get( 'presizeddiv-active', 'false' ) === 'false' ) {
			return;
		}

		if ( isset( $_GET['presized_div'] ) && $_GET['presized_div'] === 'false' ) {
			return;
		}

		$active_slot = $this->get_active_slots();

		if ( empty( $active_slot ) ) {
			return;
		}

		$priority = 10;

		add_action(
			'template_redirect',
			function () use ( $active_slot ) {
				$headers         = headers_list();
				$has_html_header = false;

				foreach ( $headers as $header ) {
					if ( strpos( $header, 'Content-Type: text/html' ) !== false ) {
						$has_html_header = true;
						break;
					}
				}

				if ( ! $has_html_header ) {
					return;
				}

				if ( ! $this->is_authorized_page() ) {
					return;
				}

				if ( $this->no_pub->check_no_pub() ) {
					return;
				}

				ob_start(
					function ( $buffer ) use ( $active_slot ) {
						if ( empty( $buffer ) ) {
							return $buffer;
						}

						/** @var string $buffer */
						if ( $this->is_amp_page( $buffer ) ) {
							return $buffer;
						}

						$extracted_html = $this->extract_html( $buffer );
						$body_presized  = $this->render_presized_div( $extracted_html['body'], $active_slot );
						$new_body       = $this->build_html( $extracted_html['element'], $body_presized );

						return $new_body;
					}
				);
			},
			$priority
		);

		add_action(
			'shutdown',
			function () {
				if ( ob_get_length() ) {
					ob_end_flush();
				}
			},
			-1 * $priority
		);

		if ( $this->no_pub->check_no_pub() ) {
			return;
		}

		add_action(
			'wp_enqueue_scripts',
			function () use ( $active_slot ) {
				$this->add_css( $active_slot );
			},
			$priority
		);
	}

	/**
	 * Inject CSS for Presized Div
	 *
	 * @since    2.0.0
	 * @param array<PresizedDivSlot> $active_slot Active slots.
	 *
	 * @return void
	 */
	public function add_css( $active_slot ) {
		$version = intval( time() / 3600 );

		wp_register_style( 'actirise-presized', false, array(), strval( $version ) );
		wp_enqueue_style( 'actirise-presized', '', array(), strval( $version ) );

		/** @var array<string> $css_code */
		$css_code = array();
		foreach ( $active_slot as $slot ) {
			$css_code[] = $slot['cssCode'];
		}

		$clear_css = array_map(
			function ( $css ) {
				/** @var string $css */
				return str_replace( array( '<style type="text/css">', '</style>' ), '', $css );
			},
			$css_code
		);

		$css = implode( '', $clear_css );

		wp_add_inline_style( 'actirise-presized', $css );
	}

	/**
	 * Extract html
	 *
	 * @since    2.3.17
	 *
	 * @param string $clean_buffer Clean buffer.
	 *
	 * @return  array{body: string, element: array{elementsReplaced: array<int, array{attr: string, content: string}>, elementsReplacedStyle: array<int, array{attr: string, content: string}>, elementsReplacedAffilizz: array<int, array{attr: string, content: string}>, headElement: string}}
	 */
	private function extract_html( $clean_buffer ) {
		/** @var string $head_element */
		$head_element = '';
		/** @var array<int, array{attr: string, content: string}> $elements_replaced */
		$elements_replaced = array();
		/** @var array<int, array{attr: string, content: string}> $elements_replaced_style */
		$elements_replaced_style = array();
		/** @var array<int, array{attr: string, content: string}> $elements_replaced_affilizz */
		$elements_replaced_affilizz = array();

		$index_element          = 0;
		$index_element_style    = 0;
		$index_element_affilizz = 0;

		/** @var string $clean_buffer */
		$clean_buffer = preg_replace_callback(
			'/<head>(.*)<\/head>/s',
			function ( $matches ) use ( &$head_element ) {
				/** @var string $head_element */
				$head_element = $matches[1];

				return '<head><title></title></head>';
			},
			$clean_buffer
		);

		/** @var string $clean_buffer */
		$clean_buffer = preg_replace_callback(
			'/<\s*script(?<attr>\s*[^>]*?)?>(?<content>.*?)?<\s*\/\s*script\s*>/ims',
			function ( $matches ) use ( &$elements_replaced, &$index_element ) {
				/** @var int $index_element */
				$index_element++;

				/** @var array{attr: string, content: string} $matches */
				$elements_replaced[ $index_element ] = array(
					'attr'    => $matches['attr'],
					'content' => $matches['content'],
				);

				return '<div data-actirise-script="actirise-template-div-' . $index_element . '"></div>';
			},
			/** @var string $clean_buffer */
			$clean_buffer
		);

		/** @var string $clean_buffer */
		$clean_buffer = preg_replace_callback(
			'/<\s*style(?<attr>\s*[^>]*?)?>(?<content>.*?)?<\s*\/\s*style\s*>/ims',
			function ( $matches ) use ( &$elements_replaced_style, &$index_element_style ) {
				$index_element_style++;

				/** @var array{attr: string, content: string} $matches */
				$elements_replaced_style[ $index_element_style ] = array(
					'attr'    => $matches['attr'],
					'content' => $matches['content'],
				);

				return '<div data-actirise-style="actirise-template-div-' . $index_element_style . '"></div>';
			},
			/** @var string $clean_buffer */
			$clean_buffer
		);

		/** @var string $clean_buffer */
		$clean_buffer = preg_replace_callback(
			'/<affilizz-rendering-component(.*?)>(.*?)<\/affilizz-rendering-component>/is',
			function ( $matches ) use ( &$elements_replaced_affilizz, &$index_element_affilizz ) {
				$index_element_affilizz++;

				$elements_replaced_affilizz[ $index_element_affilizz ] = array(
					'attr'    => $matches[1],
					'content' => $matches[2],
				);

				return '<div data-actirise-affilizz="actirise-template-div-' . $index_element_affilizz . '"></div>';
			},
			/** @var string $clean_buffer */
			$clean_buffer
		);

		return array(
			'body'    => $clean_buffer,
			'element' => array(
				'elementsReplaced'         => $elements_replaced,
				'elementsReplacedStyle'    => $elements_replaced_style,
				'elementsReplacedAffilizz' => $elements_replaced_affilizz,
				'headElement'              => $head_element,
			),
		);
	}

	/**
	 * Build final html
	 *
	 * @since    2.3.17
	 *
	 * @param array{elementsReplaced: array<int, array{attr: string, content: string}>, elementsReplacedStyle: array<int, array{attr: string, content: string}>, elementsReplacedAffilizz: array<int, array{attr: string, content: string}>, headElement: string} $extracted_html Buffer.
	 * @param string                                                                                                                                                                                                                                              $html_parsed Buffer.
	 *
	 * @return string
	 */
	private function build_html( $extracted_html, $html_parsed ) {
		$elements_replaced          = $extracted_html['elementsReplaced'];
		$elements_replaced_style    = $extracted_html['elementsReplacedStyle'];
		$elements_replaced_affilizz = $extracted_html['elementsReplacedAffilizz'];
		$head_element               = $extracted_html['headElement'];

		foreach ( $elements_replaced as $index_element => $element ) {
			/** @var string $html_parsed */
			$html_parsed = str_replace( '<div data-actirise-script="actirise-template-div-' . $index_element . '"></div>', '<script' . $element['attr'] . '>' . $element['content'] . '</script>', $html_parsed );
		}

		foreach ( $elements_replaced_style as $index_element_style => $element_style ) {
			/** @var string $html_parsed */
			$html_parsed = str_replace( '<div data-actirise-style="actirise-template-div-' . $index_element_style . '"></div>', '<style' . $element_style['attr'] . '>' . $element_style['content'] . '</style>', $html_parsed );
		}

		foreach ( $elements_replaced_affilizz as $index_element_affilizz => $element_affilizz ) {
			/** @var string $html_parsed */
			$html_parsed = str_replace( '<div data-actirise-affilizz="actirise-template-div-' . $index_element_affilizz . '"></div>', '<affilizz-rendering-component' . $element_affilizz['attr'] . '>' . $element_affilizz['content'] . '</affilizz-rendering-component>', $html_parsed );
		}

		/** @var string $html_parsed */
		$html_parsed = str_replace( '<title></title>', $head_element, $html_parsed );

		return $html_parsed;
	}

	/**
	 * Render presized divs
	 *
	 * @since    2.0.0
	 *
	 * @param string                 $clean_buffer Buffer.
	 * @param array<PresizedDivSlot> $slots Slots.
	 *
	 * @return string Buffer
	 */
	private function render_presized_div( $clean_buffer, $slots ) {
		if ( extension_loaded( 'tidy' ) ) {
			$tidy = new \tidy();

			$tidy = \tidy_parse_string(
				/** @var string $clean_buffer */
				$clean_buffer,
				array(
					'drop-empty-elements' => false,
					'drop-empty-paras'    => false,
				)
			);

			if ( $tidy ) {
				$tidy->cleanRepair();

				/** @var string $clean_buffer */
				$clean_buffer = $tidy;
			}
		}

		$clean_buffer = '<?xml encoding="UTF-8">' . $clean_buffer;

		$dom = new \DOMDocument();

		$dom->formatOutput = false;

		libxml_use_internal_errors( true );
		$dom->loadHTML( $clean_buffer );

		libxml_clear_errors();

		$this->clean_encoding( $dom );

		$xpath_dom = new \DOMXPath( $dom );

		foreach ( $slots as $slot ) {
			if ( $slot['htmlCode'] === '' ) {
				continue;
			}

			$found = array();
			foreach ( $slot['xpathConfig'] as $xpath_config ) {
				$html = ! empty( $xpath_config['htmlCode'] ) ? $xpath_config['htmlCode'] : $slot['htmlCode'];

				if ( ! empty( $xpath_config['htmlCode'] ) && in_array( $html, $found, true ) ) {
					continue;
				}

				if ( $this->check_if_allowed( $xpath_config ) ) {
					foreach ( $xpath_config['injection'] as $injections ) {
						foreach ( $injections['xpath'] as $xpath ) {
							if ( empty( $xpath ) ) {
								continue;
							}

							$find_element_query = $xpath_dom->query( $xpath );

							if ( $find_element_query !== false ) {
								$find_element = $find_element_query->item( 0 );

								if ( ! is_null( $find_element ) ) {
									$this->render_html( $html, $dom, $find_element, $injections['hierarchy'] );

									if ( ! empty( $xpath_config['htmlCode'] ) ) {
										$found[] = $html;
									}
								}
							}
						}
					}
				}
			}
		}

		/** @var string $html_parsed */
		$html_parsed = $dom->saveHTML();

		return $html_parsed;
	}

	/**
	 * Clean encoding
	 *
	 * @since    2.0.0
	 * @param \DOMDocument $document Dom.
	 *
	 * @return \DOMDocument
	 */
	private function clean_encoding( $document ) {
		/** @var \DOMNode $item */
		foreach ( $document->childNodes as $item ) {
			if ( $item->nodeType === XML_PI_NODE ) {
				$document->removeChild( $item );
			}
		}

		$document->encoding = 'UTF-8';

		return $document;
	}

	/**
	 * Render html balise
	 *
	 * @since    2.0.0
	 *
	 * @param string       $element Element.
	 * @param \DOMDocument $dom Dom.
	 * @param \DOMElement  $reference_node Reference node.
	 * @param string       $placement Placement.
	 * @return void
	 */
	private function render_html( $element, $dom, &$reference_node, $placement = 'before' ) {
		$element_fragment = $dom->createDocumentFragment();

		if ( $element_fragment !== false ) {
			$element_fragment->appendXML( $element );

			if ( 'before' === $placement ) {
				if ( $reference_node->parentNode !== null ) {
					$reference_node->parentNode->insertBefore( $element_fragment, $reference_node );
				}
			} elseif ( 'after' === $placement ) {
				if ( $reference_node->parentNode !== null && $reference_node->nextSibling !== null ) {
					$reference_node->parentNode->insertBefore( $element_fragment, $reference_node->nextSibling );
				}
			} elseif ( 'prepend' === $placement ) {
				if ( $reference_node->firstChild !== null ) {
					$reference_node->insertBefore( $element_fragment, $reference_node->firstChild );
				}
			} elseif ( 'append' === $placement ) {
				$reference_node->insertBefore( $element_fragment );
			}
		}
	}

	/**
	 * Check if slot is allowed
	 *
	 * @since    2.0.0
	 *
	 * @param PresizedDivXpathConfig $configs Configs.
	 *
	 * @return bool
	 */
	private function check_if_allowed( $configs ) {
		if ( ! isset( $configs['target'] ) ) {
			return true;
		}

		// default allowed by type
		$allowed_page      = true;
		$allowed_variables = true;
		$allowed_url       = true;
		$allowed_utm       = true;

		if ( isset( $configs['target']['page'] ) ) {
			$allowed_page = $this->check_allowed_page( $configs['target']['page'] );
		}

		if ( isset( $configs['target']['variables'] ) ) {
			$allowed_variables = $this->check_allowed_variables( $configs['target']['variables'] );
		}

		if ( isset( $configs['target']['url'] ) ) {
			$allowed_url = $this->check_allowed_url( $configs['target']['url'] );
		}

		if ( isset( $configs['target']['utm'] ) ) {
			$allowed_utm = $this->check_allowed_utm( $configs['target']['utm'] );
		}

		return $allowed_page && $allowed_variables && $allowed_url && $allowed_utm;
	}

	/**
	 * Check if page is allowed
	 *
	 * @since    2.0.0
	 * @param array<mixed> $config Config.
	 *
	 * @return bool
	 */
	private function check_allowed_page( $config ) {
		$allowed = false;

		switch ( $config['operator'] ) {
			case 'eq':
				if ( $config['value'] === get_query_var( 'paged' ) ) {
					$allowed = true;
				}
				break;
			case 'ne':
				if ( $config['value'] !== get_query_var( 'paged' ) ) {
					$allowed = true;
				}
				break;
			case 'gte':
				if ( get_query_var( 'paged' ) >= $config['value'] ) {
					$allowed = true;
				}
				break;
			case 'lte':
				if ( get_query_var( 'paged' ) <= $config['value'] ) {
					$allowed = true;
				}
				break;
			case 'lt':
				if ( get_query_var( 'paged' ) < $config['value'] ) {
					$allowed = true;
				}
				break;
			case 'gt':
				if ( get_query_var( 'paged' ) > $config['value'] ) {
					$allowed = true;
				}
				break;
		}

		return $allowed;
	}

	/**
	 * Check if variables are allowed
	 *
	 * @since    2.0.0
	 * @param array{'operator': string, 'value': string, 'name': string} $config Config.
	 *
	 * @return bool
	 */
	private function check_allowed_variables( $config ) {
		$allowed           = false;
		$current_page_type = Helpers::get_page_type();

		/** @var array{'operator': string, 'value': string, 'name': string} $config */
		$config = array_filter(
			$config,
			function ( $variable ) {
				/** @var array{'operator': string, 'value': string, 'name': string} $variable */
				return $variable['name'] === 'page_type' || strpos( $variable['name'], 'custom' ) !== false;
			}
		);

		/** @var array{'operator': string, 'value': string, 'name': string} $variable */
		foreach ( $config as $variable ) {
			$allowed = false;

			if ( $variable['name'] === 'page_type' ) {
				if ( $variable['operator'] === 'match' ) {
					$variable['value'] = $this->clean_match( $variable['value'] );
					$allowed           = preg_match( $variable['value'], $current_page_type ) > 0;
				} elseif ( $variable['operator'] === 'eq' ) {
					$allowed = $current_page_type === $variable['value'];
				} elseif ( $variable['operator'] === 'ne' ) {
					$allowed = $current_page_type !== $variable['value'];
				}

				if ( ! $allowed ) {
					break;
				}
			}

			if ( strpos( $variable['name'], 'custom' ) !== false ) {
				/** @var string $custom_option */
				$custom_option = Options::get( '' . $variable['name'], '' );

				if ( $custom_option !== '' ) {
					$custom_value = Helpers::get_custom_value( $custom_option, $variable['name'] );

					if ( $variable['operator'] === 'match' ) {
						$variable['value'] = $this->clean_match( $variable['value'] );
						$allowed           = preg_match( $variable['value'], $custom_value ) > 0;
					} elseif ( $variable['operator'] === 'eq' ) {
						$allowed = $custom_value === $variable['value'];
					} elseif ( $variable['operator'] === 'ne' ) {
						$allowed = $custom_value !== $variable['value'];
					}
				}

				if ( ! $allowed ) {
					break;
				}
			}
		}

		return $allowed;
	}

	/**
	 * Check if url is allowed
	 *
	 * @since    2.0.0
	 * @param array{operator: string, value: string, name: string} $config Config.
	 *
	 * @return bool
	 */
	private function check_allowed_url( $config ) {
		$allowed     = false;
		$current_url = Helpers::get_url();

		if ( $config['operator'] === 'match' ) {
			$config['value'] = $this->clean_match( $config['value'] );

			if ( preg_match( $config['value'], $current_url ) ) {
				$allowed = true;
			}
		}

		if ( $config['operator'] === 'eq' ) {
			if ( $current_url === $config['value'] ) {
				$allowed = true;
			}
		}

		if ( $config['operator'] === 'ne' ) {
			if ( $current_url !== $config['value'] ) {
				$allowed = true;
			}
		}

		return $allowed;
	}

	/**
	 * Check if utm query params is allowed
	 *
	 * @since    2.6.5
	 * @param array{'operator': string, 'value': string, 'name': string} $config Config.
	 *
	 * @return bool
	 */
	private function check_allowed_utm( $config ) {
		$allowed = false;

		/** @var array{'operator': string, 'value': string, 'name': string} $utm_config */
		foreach ( $config as $utm_config ) {
			/** @var string $current_utm */
			$current_utm = get_query_var( $utm_config['name'], '' );

			if ( $utm_config['operator'] === 'match' ) {
				$utm_config['value'] = $this->clean_match( $utm_config['value'] );

				if ( preg_match( $utm_config['value'], $current_utm ) ) {
					$allowed = true;
				}
			}

			if ( $utm_config['operator'] === 'eq' ) {
				if ( $current_utm === $utm_config['value'] ) {
					$allowed = true;
				}
			}

			if ( $utm_config['operator'] === 'ne' ) {
				if ( $current_utm !== $utm_config['value'] ) {
					$allowed = true;
				}
			}
		}

		return $allowed;
	}

	/**
	 * Get active slots
	 *
	 * @since    2.0.0
	 *
	 * @return array<PresizedDivSlot> Active slots
	 */
	private function get_active_slots() {
		/** @var array{slotName: string, active: bool} $presized_div_active */
		$presized_div_active = Options::get( 'presizeddiv-selected', array() );

		if ( empty( $presized_div_active ) ) {
			return array();
		}

		/** @var array<PresizedDivSlot>$presized_div */
		$presized_div = Options::get( 'presizeddiv-actirise', array() );

		/** @var array<string> $active_slot_name */
		$active_slot_name = array();

		/** @var array{slotName: string, active: bool} $div */
		foreach ( $presized_div_active as $div ) {
			if ( $div['active'] ) {
				$active_slot_name[] = $div['slotName'];
			}
		}

		/** @var array<PresizedDivSlot> $active_slot */
		$active_slot = array();

		foreach ( $presized_div as $div ) {
			if ( in_array( $div['slotName'], $active_slot_name, true ) ) {
				$active_slot[] = $div;
			}
		}

		return $active_slot;
	}

	/**
	 * Update presized div
	 *
	 * @since    2.0.0
	 * @return void
	 */
	private function update_presized_div() {
		$cron = new Cron();
		$cron->check_scheduled_task_with_transient(
			'check_presized_div',
			array(
				$cron,
				'check_presized_div',
			)
		);
	}

	/**
	 * Get presized divs from API
	 *
	 * @since    2.0.0
	 *
	 * @return array<\stdClass>|boolean Presized divs or false if error
	 */
	public static function get_from_api() {
		$args = array(
			'domain' => rawurlencode( Helpers::get_server_details()['host'] ),
		);

		if ( Options::get( 'settings-uuid-type', 'boot' ) === 'universal' ) {
			$args['universal'] = 'true';
			$args['product']   = '3';
		}

		/** @var string $uuid */
		$uuid     = Options::get( 'settings-uuid' );
		$api_url  = 'div_presized/' . $uuid;
		$api      = new Api();
		$response = $api->get( 'api', $api_url, $args );

		if ( is_wp_error( $response ) ) {
			Logger::add_log( 'get_from_api error ' . $response->get_error_code(), 'public/include/presizeddiv', 'error' );
			return false;
		}

		if ( ! is_array( $response ) ) {
			Logger::add_log( 'get_from_api is not array', 'public/include/presizeddiv', 'error' );
			return false;
		}

		if ( ! isset( $response['configPresizedDiv'] ) ) {
			Logger::add_log( 'get_from_api is not isset', 'public/include/presizeddiv', 'error' );
			return false;
		}

		$array_response = array( $response['configPresizedDiv'] );

		if ( count( $array_response ) !== 1 ) {
			return false;
		}

		if ( empty( $array_response[0] ) ) {
			Logger::add_log( 'get_from_api empty', 'public/include/presizeddiv', 'error' );
			return false;
		}

		return $array_response[0];
	}

	/**
	 * Clean match for preg_match
	 *
	 * @since    2.0.0
	 * @param string $match_pattern
	 *
	 * @return string Cleaned match
	 */
	private function clean_match( $match_pattern ) {
		if ( substr( $match_pattern, 0, 1 ) === '(' ) {
			$match_pattern = substr( $match_pattern, 1 );
		}

		if ( substr( $match_pattern, -1 ) === ')' ) {
			$match_pattern = substr( $match_pattern, 0, -1 );
		}

		if ( substr( $match_pattern, 0, 1 ) === '^' ) {
			$match_pattern = substr( $match_pattern, 1 );
		}

		if ( substr( $match_pattern, -1 ) === '$' ) {
			$match_pattern = substr( $match_pattern, 0, -1 );
		}

		return '#' . $match_pattern . '#';
	}

	/**
	 * Check if page is authorized for rendering presized div
	 *
	 * @since       2.0.0
	 * @return boolean True if page is authorized
	 */
	private function is_authorized_page() {
		$authorized = false;

		if ( $this->is_woocommerce_active() ) {
			if ( \is_woocommerce() || \is_cart() || \is_checkout() || \is_account_page() ) {
				return false;
			}
		}

		if ( is_home() || is_front_page() ) {
			$authorized = true;
		} elseif ( is_page() ) {
			$authorized = true;
		} elseif ( is_single() ) {
			$authorized = true;
		} elseif ( is_category() ) {
			$authorized = true;
		} elseif ( is_tag() ) {
			$authorized = true;
		} elseif ( is_tax() ) {
			$authorized = true;
		} elseif ( is_archive() ) {
			$authorized = true;
		} elseif ( is_search() ) {
			$authorized = true;
		} elseif ( is_404() ) {
			$authorized = true;
		}

		return $authorized;
	}

	/**
	 * Is WooCommerce Installed
	 *
	 * @since    2.0.0
	 * @return bool
	 */
	private function is_woocommerce_active() {
		// @codeCoverageIgnoreStart
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// @codeCoverageIgnoreEnd
		return is_plugin_active( 'woocommerce/woocommerce.php' ) && function_exists( 'is_woocommerce' );
	}

	/**
	 * Check if page is AMP
	 *
	 * @since    2.3.7
	 * @param string $buffer Buffer.
	 *
	 * @return bool
	 */
	private function is_amp_page( $buffer ) {
		return strpos( $buffer, 'ampproject.org' ) !== false;
	}
}
