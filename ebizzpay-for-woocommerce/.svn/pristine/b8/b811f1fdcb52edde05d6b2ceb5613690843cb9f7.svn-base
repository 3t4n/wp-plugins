<?php
if ( !defined( 'ABSPATH' ) ) exit;

class EbizzPay_WC_API extends EbizzPay_WC_Client {

    public function __construct( $access_token, $signature_key, $sandbox = true, $debug = false ) {

        $this->access_token  = $access_token;
        $this->signature_key = $signature_key;
        $this->sandbox       = $sandbox;
        $this->debug         = $debug;

    }

    // Create a bill
    public function create_bill( $collection_code, array $params ) {
        return $this->post( "v2/collections/{$collection_code}/bills", $params );
    }

    // Get a transaction
    public function get_transaction( $collection_code, $bill_no, $ref_id ) {
        return $this->get( "v2/collections/{collection_code}/bills/{bill_no}/transactions/{ref_id}" );
    }

}
