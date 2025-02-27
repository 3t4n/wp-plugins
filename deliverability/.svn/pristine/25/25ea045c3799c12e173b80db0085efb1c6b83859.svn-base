<?php

namespace TopDeliverability\Email;

use PHPMailer\PHPMailer\PHPMailer as OriginalPHPMailer;

class PHPMailer extends OriginalPHPMailer {

	use CustomPHPMailer;

	use ExtendedPHPMailer;

	/**
	 * @param OriginalPHPMailer $phpMailer
	 * @param HeaderEncoder     $headerEncoder
	 */
	public function __construct(
		OriginalPHPMailer $phpMailer,
		HeaderEncoder $headerEncoder
	) {
		parent::__construct( $phpMailer->exceptions );
		$this->headerEncoder = $headerEncoder;
		$this->copyStateFrom( $phpMailer );
	}
}
