<?php

namespace Profitblue\Controllers;

/**
 * OrdersPaginationControler
 */
class OrdersPaginationControler {

	
	/**
	 * query
	 *
	 * @var object
	 */
	private $query;
	
	/**
	 * limit
	 *
	 * @var int
	 */
	public $limit = 20;
	
	/**
	 * current
	 *
	 * @var int
	 */
	public $current = 1;
	
	/**
	 * page
	 *
	 * @var string
	 */
	public $page = null;
	
	/**
	 * subpage
	 *
	 * @var string
	 */
	public $subpage = null;
	
	/**
	 * start
	 *
	 * @var undstringefined
	 */
	public $start = null;
	
	/**
	 * end
	 *
	 * @var string
	 */
	public $end = null;
	
	/**
	 * query_string
	 *
	 * @var string
	 */
	public $query_string = null;
	
	/**
	 * urlstring
	 *
	 * @var string
	 */
	public $urlstring = null;
	
	/**
	 * __construct
	 *
	 * @param  object $query
	 * @param  int $offset
	 * @return void
	 */
	public function __construct( $query, $offset = false ) {

		$this->query = $query;

		if ( false !== $offset ) {
			$this->current = $offset;
		} else {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['offset'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$this->current = isset( $_GET['offset'] ) ? wp_unslash( sanitize_text_field( $_GET['offset'] ) ) : '';
			}
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			$parts = explode( ' - ', $period );
			
			$this->end = $parts[1];
			$this->start = $parts[0];
			
		}

	}

	/**
	 * Number of pages
	 *
	 * @return int
	 */
	private function get_pages(): int {

		if ( $this->query < $this->limit ) {
			return 1;
		} else {
			return ceil( $this->query / $this->limit );
		}

	}

	/**
	 * Set querystring
	 *
	 * @param  string $query_string
	 * @return string
	 */
	public function set_query_string( $query_string ): string {

		$this->query_string = $query_string;

	}

	/**
	 * Set start
	 *
	 * @param  string $start
	 * @return void
	 */
	public function set_start( $start ) {

		$this->start = $start;

	}

	/**
	 * Set end
	 *
	 * @param  string $end
	 * @return void
	 */
	public function set_end( $end ) {

		$this->end = $end;

	}

	/**
	 * Set limit
	 *
	 * @param  int $limit
	 * @return void
	 */
	public function set_limit( $limit ) {

		$this->limit = $limit;

	}

	/**
	 * Set urlstring
	 *
	 * @param  string $urlstring
	 * @return void
	 */
	public function set_urlstring( $urlstring ) {

		$this->urlstring = $urlstring;

	}

	/**
	 * Render pagination
	 *
	 * @return string
	 */
	public function render(): string {

		$html = '';
        
		if ( empty( $this->query_string ) ) {
			$this->query_string = isset( $_SERVER['QUERY_STRING'] ) ? wp_unslash( sanitize_text_field( $_SERVER['QUERY_STRING'] ) ) : '';
		}
        	
		parse_str( $this->query_string, $query_array );
		if ( !empty( $query_array['offset'] ) ) {
			unset( $query_array['offset'] );
		}
		$this->query_string = http_build_query( $query_array );
		$url_string = '';
		foreach( $query_array as $key => $item ) {
			$url_string .= $key . ',' . $item . ';';
		}
		$url_string = rtrim( $url_string, ';' );

		if ( !empty( $this->urlstring ) ) {
			$url_string = $this->urlstring;
		}

		$pages = $this->get_pages();
		
		if( $pages != 1 ){

			$html .= '<div class="products-pagination">';

			$more_button_data_attribute = '';
			if ( !empty( $this->start ) ) {
				$more_button_data_attribute .= ' data-start="' . esc_html( $this->start ) . '"';	
			}
			if ( !empty( $this->end ) ) {
				$more_button_data_attribute .= ' data-end="' . esc_html( $this->end ) . '"';	
			}
			if ( !empty( $this->current ) ) {
				$more_button_data_attribute .= ' data-current="' . esc_html( $this->current ) . '"';
			}
			$more_button_data_attribute .= ' data-url="' . esc_url( $url_string ) . '"';

				$html .= '<div class="pagination-more"><a class="btn show-more" href="#" ' . esc_html( $more_button_data_attribute ) . '>' . esc_html__( 'Show more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';				
				$html .= '<div class="pagination-numbers-wrap">';	
					$html .= '<div class="pagination-numbers">';
				
					$max_buttons = 5;
					$start_page = max(1, $this->current - $max_buttons + 1);

						for ($i = $start_page; $i < $this->current; $i++) {
							if ( $this->current == $i ) {
								$html .= '<span class="btn active">' . esc_html( $i ) . '</span>';
							} else {
								$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $i ) . '">' . esc_html( $i ) . '</a>';
							}
						}

						$html .= '<span class="btn active">' . esc_html( $this->current ) . '</span>';

						$max_buttons = 5;

						for ($i = 1; $i <= $max_buttons; $i++) {
							$next_page = $this->current + $i;							
							if ($next_page <= $pages) {
								$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $next_page ) . '">' . esc_html( $next_page ) . '</a>';
							}
						}
					
					$html .= '</div>';
					$html .= '<div class="pagination-arrows">';

						if ( 1 == $this->current ) {
							$html .= '<span class="btn inactive">' . esc_html( $this->prev_arrow() ) . '</span>';
						} else {
							$offset = $this->current - 1;
							$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=1">' . esc_html( $this->prev_arrow() ) .esc_html(  $this->prev_arrow() ) . '</a>';
							$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $offset ) . '">' . esc_html( $this->prev_arrow() ) . '</a>';
						}

						if ( $pages == $this->current ) {
							$html .= '<span class="btn inactive">' . esc_html( $this->next_arrow() ) . '</span>';
						} else {
							$offset = $this->current + 1;
							$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $offset ) . '">' . esc_html( $this->next_arrow() ) . '</a>';
							$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $pages ) . '">' . esc_html( $this->next_arrow() ) . esc_html( $this->next_arrow() ) . '</a>';
						}

					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';

        }
     
        return $html;

	}

	/**
	 * Prev svg arrow
	 *
	 * @return string
	 */
	private function prev_arrow(): string {
	
		return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>';
	
	}

	/**
	 * Next svg arrow
	 *
	 * @return string
	 */
	private function next_arrow(): string {
	
		return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
	
	}
	
}
