<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HBAgency_Ajax_Response {

	public $status_code;
	public $payload;

	public function set_payload($value) {
		$this->payload=$value;
	}
	
	public function get_payload() {
		return $this->payload;
	}

	public function set_status_code($value) {
		$this->status_code=$value;
	}

	public function get_status_code() {
		return $this->status_code;	
	}
}

?>
