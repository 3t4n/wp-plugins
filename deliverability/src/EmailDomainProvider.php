<?php

namespace TopDeliverability;

class EmailDomainProvider {

	/**
	 * @return string
	 */
	public function getDomain() {

		$domain = null;

		$mailFromFilter = function ( $fromEmail ) use ( &$domain ) {
			$parsedFromEmail = explode( '@', $fromEmail );
			$domain          = end( $parsedFromEmail );
		};

		add_filter( 'wp_mail_from', $mailFromFilter );
		wp_mail( '', '', '' );
		remove_filter( 'wp_mail_from', $mailFromFilter );

		return $domain;
	}
}
