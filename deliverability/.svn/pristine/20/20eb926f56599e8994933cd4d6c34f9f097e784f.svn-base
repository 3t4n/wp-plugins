<?php

namespace TopDeliverability\Email;

use WPMailSMTP\MailCatcherV6 as OriginalMailCatcherV6;

class MailCatcherV6 extends OriginalMailCatcherV6 {

	use CustomPHPMailer;

	use ExtendedPHPMailer;

	/**
	 * @param OriginalMailCatcherV6 $phpMailer
	 * @param HeaderEncoder         $headerEncoder
	 */
	public function __construct(
		OriginalMailCatcherV6 $phpMailer,
		HeaderEncoder $headerEncoder
	) {
		parent::__construct( $phpMailer->exceptions );
		$this->headerEncoder = $headerEncoder;
		$this->copyStateFrom( $phpMailer );
	}
}
