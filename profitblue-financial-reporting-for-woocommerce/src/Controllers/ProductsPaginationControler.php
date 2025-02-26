<?php

namespace Profitblue\Controllers;

/**
 * ProductsPaginationControler
 */
class ProductsPaginationControler {
	
	/**
	 * query
	 *
	 * @var mixed
	 */
	private $query;
	
	/**
	 * limit
	 *
	 * @var int
	 */
	public $limit = 100;
	
	/**
	 * current
	 *
	 * @var int
	 */
	public $current = 1;
	
	/**
	 * page
	 *
	 * @var undefined
	 */
	public $page = null;
	
	/**
	 * subpage
	 *
	 * @var undefined
	 */
	public $subpage = null;
	
	/**
	 * __construct
	 *
	 * @param  mixed $query
	 * @param  mixed $type
	 * @param  mixed $offset
	 * @return void
	 */
	public function __construct( $query, $type = 'products', $offset = false ) {

		if ( $type == 'products' ){
			$this->query = $query[0]->products_count;
		} else {
			$this->query = $query[0]->total_records;
		}		
		if ( false !== $offset ) {
			$this->current = $offset;
		} else {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['offset'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$this->current = isset( $_GET['offset'] ) ? wp_unslash( sanitize_text_field( $_GET['offset'] ) ) : '';
			}
		}

	}

	/**
	 * set_period_data
	 *
	 * @param  mixed $period_data
	 * @return void
	 */
	public function set_period_data( $period_data ) {

		$this->period_data = $period_data;

	}

	/**
	 * set_query_string
	 *
	 * @param  mixed $query_string
	 * @return void
	 */
	public function set_query_string( $query_string ) {

		$this->query_string = $query_string;

	}
	
	/**
	 * set_limit
	 *
	 * @param  int $limit
	 * @return void
	 */
	public function set_limit( $limit ) {

		$this->limit = $limit;

	}

	/**
	 * get_pages
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
		
		$pages = $this->get_pages();

		if( $pages != 1 ){

			$more_button_data_attribute = '';
			if ( !empty( $this->period_data['period_type'] ) && 'id' == $this->period_data['period_type'] ) {
				$more_button_data_attribute .= ' data-type="id" data-periodid="' . esc_html( $this->period_data['period_id'] ) . '" data-current="' . esc_html( $this->current ) . '"';	
			} else {
				if ( empty( $this->period_data['period_year'] ) ) {
					$more_button_data_attribute .= ' data-type="year" data-periodyear="" data-current="' . esc_html( $this->current ) . '"';	
				} else {
					$more_button_data_attribute .= ' data-type="year" data-periodyear="' . esc_html( $this->period_data['period_year'] ) . '" data-current="' . esc_html( $this->current ) . '"';	
				}
			}
			if ( !empty( $query_array['show'] ) && 'cogs' == $query_array['show'] ) {
				$more_button_data_attribute .= ' data-show="cogs"';
			}
			if ( !empty( $query_array['product-search'] ) ) {
				$search = sanitize_text_field( $query_array['product-search'] );
				$more_button_data_attribute .= ' data-search="' . esc_html( $search ) . '"';
			} else {
				$more_button_data_attribute .= ' data-search="empty"';
			}
			$more_button_data_attribute .= ' data-url="' . esc_html( $url_string ) . '"';
			

			$html .= '<div class="products-pagination">';

				if ( $pages != $this->current ) {
					$html .= '<div class="pagination-more"><a class="btn primary paggination-more-button" href="#" ' . esc_html( $more_button_data_attribute ) . '>' . esc_html__( 'Show more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
				}
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
								$html .= '<a class="btn primary" href="' . admin_url() . 'admin.php?' . esc_html( $this->query_string ) . '&offset=' . esc_html( $next_page ) . '">' . esc_html( $next_page ) . '</a>';
							}
						}				
					
					$html .= '</div>';
					$html .= '<div class="pagination-arrows">';

						if ( 1 == $this->current ) {
							$html .= '<span class="btn inactive">' . esc_html( $this->prev_arrow() ) . '</span>';
						} else {
							$offset = $this->current - 1;
							$html .= '<a class="btn primary" href="' . esc_url( admin_url() ) . 'admin.php?' . esc_html( $this->query_string ) . '&offset=1">' . esc_html( $this->prev_arrow() ) . esc_html( $this->prev_arrow() ) . '</a>';
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
