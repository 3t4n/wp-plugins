<?php

namespace TopDeliverability\Account\State;

class CachingEmailVerificationStateProvider implements EmailVerificationStateProvider {

	/**
	 * @var EmailVerificationStateProvider
	 */
	private $delegate;

	/**
	 * @var EmailVerificationState
	 */
	private $state;

	/**
	 * @param EmailVerificationStateProvider $delegate
	 */
	public function __construct( EmailVerificationStateProvider $delegate ) {
		$this->delegate = $delegate;
	}

	/**
	 * @return EmailVerificationState
	 */
	public function getState() {
		if ( $this->state === null ) {
			$this->state = $this->delegate->getState();
		}

		return $this->state;
	}
}
