<?php
namespace Altoviz;

defined( 'ABSPATH' ) || exit;

/**
 * Summary of AOZ4WC_API
 */
class AOZ4WC_API {

	/**
	 * Summary of __construct
	 */
	public function __construct() {
	}
	/**
	 * Summary of get_url
	 *
	 * @return bool|string
	 */
	public function get_url() {
		if ( defined( 'AOZ4WC_API_SERVER' ) ) {
			return AOZ4WC_API_SERVER;
		} elseif ( defined( 'AOZ4WC_INTERNAL' ) ) {
			return AOZ4WC()->replace_subdomain( 'api' );
		} else {
			return 'https://api.altoviz.com';
		}
	}
	/**
	 * Summary of hello
	 *
	 * @param mixed $force
	 */
	public function hello( $force = false ) {
		return $this->remote_get( '/hello', false, $force ? 0 : 60 * 5 );
	}
	/**
	 * Summary of customers_create
	 *
	 * @param mixed $data
	 */
	public function customers_create( $data ) {
		return $this->remote_post( '/v1/customers', $data );
	}
	/**
	 * Summary of customers_delete
	 *
	 * @param mixed $id
	 */
	public function customers_delete( $id ) {
		return $this->remote_delete( '/v1/customers/' . $id );
	}
	/**
	 * Summary of customers_find
	 *
	 * @param mixed $email
	 * @param mixed $internal_id
	 * @param mixed $single
	 */
	public function customers_find( $email, $internal_id, $single = false ) {
		return $this->remote_get( '/v1/customers/find?email=' . $email . '&internalid=' . $internal_id, $single );
	}
	/**
	 * Summary of customers_update
	 *
	 * @param mixed $id
	 * @param mixed $data
	 */
	public function customers_update( $id, $data ) {
		return $this->remote_put( '/v1/customers/' . $id, $data );
	}
	/**
	 * Summary of products_create
	 *
	 * @param mixed $data
	 */
	public function products_create( $data ) {
		return $this->remote_post( '/v1/products', $data );
	}
	/**
	 * Summary of products_delete
	 *
	 * @param mixed $id
	 */
	public function products_delete( $id ) {
		return $this->remote_delete( '/v1/products/' . $id );
	}
	/**
	 * Summary of products_find
	 *
	 * @param mixed $number
	 * @param mixed $internal_id
	 * @param mixed $single
	 */
	public function products_find( $number, $internal_id, $single = false ) {
		return $this->remote_get( '/v1/products/find?number=' . $number . '&internalid=' . $internal_id, $single );
	}
	/**
	 * Summary of products_update
	 *
	 * @param mixed $id
	 * @param mixed $data
	 */
	public function products_update( $id, $data ) {
		return $this->remote_put( '/v1/products/' . $id, $data );
	}
	/**
	 * Summary of sales_credits_create
	 *
	 * @param mixed $data
	 */
	public function sales_credits_create( $data ) {
		return $this->remote_post( '/v1/salecredits', $data );
	}
	/**
	 * Summary of sales_credits_delete
	 *
	 * @param mixed $id
	 */
	public function sales_credits_delete( $id ) {
		return $this->remote_delete( '/v1/salecredits/' . $id );
	}
	/**
	 * Summary of sales_credits_find
	 *
	 * @param mixed $number
	 * @param mixed $internal_id
	 * @param mixed $single
	 */
	public function sales_credits_find( $number, $internal_id, $single = false ) {
		return $this->remote_get( '/v1/salecredits/find?number=' . $number . '&internalid=' . $internal_id, $single );
	}
	/**
	 * Summary of sales_credits_finalize
	 *
	 * @param mixed $id
	 */
	public function sales_credits_finalize( $id ) {
		return $this->remote_post( '/v1/salecredits/finalize/' . $id );
	}
	/**
	 * Summary of sales_credits_markasrefunded
	 *
	 * @param mixed $data
	 */
	public function sales_credits_markasrefunded( $data ) {
		return $this->remote_post( '/v1/salecredits/markasrefunded', $data );
	}
	/**
	 * Summary of sales_credits_send
	 *
	 * @param mixed $id
	 */
	public function sales_credits_send( $id ) {
		return $this->remote_post( '/v1/salecredits/send/' . $id );
	}
	/**
	 * Summary of sales_credits_update
	 *
	 * @param mixed $id
	 * @param mixed $data
	 */
	public function sales_credits_update( $id, $data ) {
		return $this->remote_put( '/v1/salecredits/' . $id, $data );
	}
	/**
	 * Summary of sales_documents_create
	 *
	 * @param mixed $data
	 * @param mixed $credit
	 */
	public function sales_documents_create( $data, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_create( $data );
		} else {
			return $this->sales_invoices_create( $data );
		}
	}
	/**
	 * Summary of sales_documents_delete
	 *
	 * @param mixed $id
	 * @param mixed $credit
	 */
	public function sales_documents_delete( $id, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_delete( $id );
		} else {
			return $this->sales_invoices_delete( $id );
		}
	}
	/**
	 * Summary of sales_documents_finalize
	 *
	 * @param mixed $id
	 * @param mixed $credit
	 */
	public function sales_documents_finalize( $id, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_finalize( $id );
		} else {
			return $this->sales_invoices_finalize( $id );
		}
	}
	/**
	 * Summary of sales_documents_find
	 *
	 * @param mixed $number
	 * @param mixed $internal_id
	 * @param mixed $single
	 * @param mixed $credit
	 */
	public function sales_documents_find( $number, $internal_id, $single = false, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_find( $number, $internal_id, $single );
		} else {
			return $this->sales_invoices_find( $number, $internal_id, $single );
		}
	}
	/**
	 * Summary of sales_documents_markaspaid
	 *
	 * @param mixed $data
	 * @param mixed $credit
	 */
	public function sales_documents_markaspaid( $data, $credit = false ) {
		if ( $credit ) {
			if ( isset( $data['invoiceId'] ) ) {
				$data['creditId'] = $data['invoiceId'];
				unset( $data['invoiceId'] );
			}
			if ( isset( $data['finalizeInvoice'] ) ) {
				$data['finalizeCredit'] = $data['finalizeInvoice'];
				unset( $data['finalizeInvoice'] );
			}
			return $this->sales_credits_markasrefunded( $data );
		} else {
			return $this->sales_invoices_markaspaid( $data );
		}
	}
	/**
	 * Summary of sales_documents_send
	 *
	 * @param mixed $id
	 * @param mixed $credit
	 */
	public function sales_documents_send( $id, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_send( $id );
		} else {
			return $this->sales_invoices_send( $id );
		}
	}
	/**
	 * Summary of sales_documents_update
	 *
	 * @param mixed $id
	 * @param mixed $data
	 * @param mixed $credit
	 */
	public function sales_documents_update( $id, $data, $credit = false ) {
		if ( $credit ) {
			return $this->sales_credits_update( $id, $data );
		} else {
			return $this->sales_invoices_update( $id, $data );
		}
	}
	/**
	 * Summary of sales_invoices_create
	 *
	 * @param mixed $data
	 */
	public function sales_invoices_create( $data ) {
		return $this->remote_post( '/v1/saleinvoices', $data );
	}
	/**
	 * Summary of sales_invoices_delete
	 *
	 * @param mixed $id
	 */
	public function sales_invoices_delete( $id ) {
		return $this->remote_delete( '/v1/saleinvoices/' . $id );
	}
	/**
	 * Summary of sales_invoices_finalize
	 *
	 * @param mixed $id
	 */
	public function sales_invoices_finalize( $id ) {
		return $this->remote_post( '/v1/saleinvoices/finalize/' . $id );
	}
	/**
	 * Summary of sales_invoices_find
	 *
	 * @param mixed $number
	 * @param mixed $internal_id
	 * @param mixed $single
	 */
	public function sales_invoices_find( $number, $internal_id, $single = false ) {
		return $this->remote_get( '/v1/saleinvoices/find?number=' . $number . '&internalid=' . $internal_id, $single );
	}
	/**
	 * Summary of sales_invoices_markaspaid
	 *
	 * @param mixed $data
	 */
	public function sales_invoices_markaspaid( $data ) {
		return $this->remote_post( '/v1/saleinvoices/markaspaid', $data );
	}
	/**
	 * Summary of sales_invoices_send
	 *
	 * @param mixed $id
	 */
	public function sales_invoices_send( $id ) {
		return $this->remote_post( '/v1/saleinvoices/send/' . $id );
	}
	/**
	 * Summary of sales_invoices_update
	 *
	 * @param mixed $id
	 * @param mixed $data
	 */
	public function sales_invoices_update( $id, $data ) {
		return $this->remote_put( '/v1/saleinvoices/' . $id, $data );
	}
	/**
	 * Summary of settings_get
	 *
	 * @param mixed $force
	 */
	public function settings_get( $force = false ) {
		return $this->remote_get( '/v1/settings', false, $force ? 0 : 60 * 5 );
	}
	/**
	 * Summary of vats_get
	 *
	 * @param mixed $force
	 */
	public function vats_get( $force = false ) {
		return $this->remote_get( '/v1/vats', false, $force ? 0 : 60 * 5 );
	}
	/**
	 * Summary of get_args
	 *
	 * @param mixed $method
	 * @param mixed $body
	 * @return array{blocking: bool, headers: array{Accept: string, Content-Type: string, x-api-key: mixed, httpversion: float|string, method: mixed, redirection: int, sslverify: bool, timeout: int}}
	 */
	public function get_args( $method = 'GET', $body = '' ) {
		$args = array(
			'headers'     => array(
				'x-api-key'    => AOZ4WC()->get_api_key(),
				'Content-Type' => 'application/json',
				'Accept'       => 'application/json',
			),
			'method'      => $method,
			'timeout'     => 10,
			'redirection' => 3,
			'blocking'    => true,
			'httpversion' => '1.1',
			'sslverify'   => true,
		);
		if ( ! empty( $body ) ) {
			$args['body']        = wp_json_encode( $body, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
			$args['data_format'] = 'body';
		}
		return $args;
	}
	/**
	 * Summary of remote_delete
	 *
	 * @param mixed $url
	 */
	public function remote_delete( $url ) {
		return $this->remote_request( $url, 'DELETE' );
	}
	/**
	 * Summary of remote_get
	 *
	 * @param mixed $url
	 * @param mixed $single
	 * @param mixed $cache_duration
	 */
	public function remote_get( $url, $single = false, $cache_duration = 0 ) {
		$result = false;
		$hash   = md5( 'aoz4wc_remote_get_' . str_replace( '/', '-', $url ) . '_' . $single );
		if ( $cache_duration < 0 ) {
			delete_transient( $hash );
		} elseif ( $cache_duration > 0 ) {
			$result = get_transient( $hash );
		}
		if ( ! $result ) {
			$result = $this->remote_request( $url );
			if ( $result && ( $cache_duration > 0 ) ) {
				set_transient( $hash, $result, $cache_duration );
			}
		}
		if ( $single ) {
			return ( is_array( $result ) && count( $result ) ) ? reset( $result ) : false;
		} else {
			return ( is_array( $result ) && count( $result ) ) ? $result : false;
		}
	}
	/**
	 * Summary of remote_post
	 *
	 * @param mixed $url
	 * @param mixed $body
	 */
	public function remote_post( $url, $body = '' ) {
		return $this->remote_request( $url, 'POST', $body );
	}
	/**
	 * Summary of remote_put
	 *
	 * @param mixed $url
	 * @param mixed $body
	 */
	public function remote_put( $url, $body ) {
		return $this->remote_request( $url, 'PUT', $body );
	}
	/**
	 * Summary of remote_request
	 *
	 * @param mixed $url
	 * @param mixed $method
	 * @param mixed $body
	 */
	public function remote_request( $url, $method = 'GET', $body = '' ) {
		if ( 'POST' === $method ) {
			$response = wp_remote_post( $this->get_url() . $url, $this->get_args( $method, $body ) );
		} else {
			$response = wp_remote_get( $this->get_url() . $url, $this->get_args( $method, $body ) );
		}
		$response_code    = wp_remote_retrieve_response_code( $response );
		$response_body    = wp_remote_retrieve_body( $response );
		$response_json    = json_decode( $response_body, true );
		$response_message = $response_json['message'] ?? '';
		$response_errors  = $response_json['errors'] ?? array();
		if ( 200 === $response_code ) {
			$result = ( strlen( $response_body ) > 0 ) ? $response_json : true;
		} else {
			if ( 401 === $response_code ) {
				AOZ4WC()->add_notice( __( 'The Altoviz API key might be missing, outdated or wrong', 'altoviz' ), 'error' );
			} else {
				// implode($response_errors)
				// translators: %1$s response code, %2$s response message
				AOZ4WC()->add_notice( sprintf( __( 'The Altoviz app returned an error %1$s : %2$s', 'altoviz' ), $response_code, $response_message ), 'error', array( 'details' => $response_errors ) );
			}
			$result = false;
			AOZ4WC()->log(
				array(
					'source'        => 'API',
					'method'        => $method,
					'url'           => $this->get_url() . $url,
					'body'          => $body,
					'response_code' => $response_code,
					'response_body' => $response_body,
				),
				'error'
			);
		}
		AOZ4WC()->sys_log(
			array(
				'source'        => 'API',
				'url'           => $this->get_url() . $url,
				'method'        => $method,
				'body'          => $body,
				'response_code' => $response_code,
				'response_body' => $response_json,
			)
		);
		return $result;
	}
}
