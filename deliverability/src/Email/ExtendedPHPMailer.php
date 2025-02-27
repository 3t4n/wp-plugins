<?php

namespace TopDeliverability\Email;

use PHPMailer\PHPMailer\PHPMailer as OriginalPHPMailer;

trait ExtendedPHPMailer {

	public function getBody() {
		/* @var $this OriginalPHPMailer */
		return $this->MIMEBody;
	}

	public function appendHeader( $name, $value ) {
		$this->MIMEHeader = static::stripTrailingWSP( $this->MIMEHeader )
			. static::$LE
			. static::normalizeBreaks( "$name: $value" )
			. static::$LE;
	}
}
