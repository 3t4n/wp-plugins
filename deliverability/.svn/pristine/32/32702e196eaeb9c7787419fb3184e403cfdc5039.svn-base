<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace TopDeliverability\Email;

use PHPMailer\PHPMailer\PHPMailer as OriginalPHPMailer;

trait CustomPHPMailer {

	/**
	 * @var HeaderEncoder
	 */
	private $headerEncoder;

	public function encodeHeader( $str, $position = 'text' ) {
		if ( 'mail' !== $this->Mailer ) {
			return parent::encodeHeader( $str, $position );
		}

		if ( $this->Subject === $str ) {
			return $str;
		}

		$encoded = $this->headerEncoder->encodeHeader( $str );

		if ( $encoded !== null ) {
			return $encoded;
		}

		return parent::encodeHeader( $str, $position );
	}

	public function addCustomHeader( $name, $value = null ) {
		if ( 'mail' !== $this->Mailer ) {
			return parent::addCustomHeader( $name, $value );
		}

		if ( ! parent::addCustomHeader( $name, $value ) ) {
			return false;
		}

		$this->headerEncoder->addCustomHeader( $name, $value );

		return true;
	}

	public function preSend() {
		$result = parent::preSend();
		do_action( 'td/phpmailer-presend', $this );
		return $result;
	}

	private function copyStateFrom( OriginalPHPMailer $phpMailer ) {
		foreach ( get_object_vars( $phpMailer ) as $key => $value ) {
			$this->$key = $value;
		}
	}
}
