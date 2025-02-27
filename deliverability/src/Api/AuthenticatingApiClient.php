<?php

namespace TopDeliverability\Api;

use DateInterval;
use DateTimeImmutable;
use Exception;
use TopDeliverability\Account;
use TopDeliverability\Account\CreatedAccount;
use TopDeliverability\AccountIdOption;
use TopDeliverability\Api\Users\InvalidEmail;
use TopDeliverability\Api\Users\PasswordSuccessfullyReset;
use TopDeliverability\Api\Users\UserAlreadyExists;
use TopDeliverability\Api\Users\UserNotCreated;
use TopDeliverability\Api\Users\UserSuccessfullyCreated;
use TopDeliverability\Clock;
use TopDeliverability\DeliverabilityScore;
use TopDeliverability\DkimDnsRecord;
use TopDeliverability\Email\SignedEmail;
use TopDeliverability\PluginVersionProvider;
use TopDeliverability\Score\AnalysisNotAvailable;
use TopDeliverability\Score\AnalysisResult;
use TopDeliverability\Score\BimiAnalysisResult;
use TopDeliverability\Score\BlacklistAnalysisResult;
use TopDeliverability\Score\DnsBlacklisted;
use TopDeliverability\Score\RhsBlacklisted;
use TopDeliverability\WordPressVersionProvider;
use WP_Error;
use WP_Http;

class AuthenticatingApiClient {

	/**
	 * @var string
	 */
	private $baseUrl;

	/**
	 * @var PluginVersionProvider
	 */
	private $pluginVersionProvider;

	/**
	 * @var WordPressVersionProvider
	 */
	private $wordpressVersionProvider;

	/**
	 * @var AccountIdOption
	 */
	private $accountIdOption;

	/**
	 * @var int
	 */
	private $timeoutMillis;

	/**
	 * @var bool
	 */
	private $sslVerify;

	/**
	 * @var EmailVerificationOption
	 */
	private $emailVerificationOption;

	/**
	 * @var Clock
	 */
	private $clock;

	/**
	 * @param string                   $baseUrl
	 * @param PluginVersionProvider    $pluginVersionProvider
	 * @param WordPressVersionProvider $wordpressVersionProvider
	 * @param AccountIdOption          $accountIdOption
	 * @param EmailVerificationOption  $emailVerificationOption
	 * @param bool                     $sslVerify
	 * @param Clock                    $clock
	 * @param int                      $timeoutMillis
	 *
	 * @see WP_Http::request() for default timeout
	 */
	public function __construct(
		$baseUrl,
		PluginVersionProvider $pluginVersionProvider,
		WordPressVersionProvider $wordpressVersionProvider,
		AccountIdOption $accountIdOption,
		EmailVerificationOption $emailVerificationOption,
		$sslVerify,
		Clock $clock,
		$timeoutMillis = 5000
	) {
		$this->baseUrl                  = $baseUrl;
		$this->pluginVersionProvider    = $pluginVersionProvider;
		$this->wordpressVersionProvider = $wordpressVersionProvider;
		$this->accountIdOption          = $accountIdOption;
		$this->timeoutMillis            = $timeoutMillis;
		$this->sslVerify                = $sslVerify;
		$this->emailVerificationOption  = $emailVerificationOption;
		$this->clock                    = $clock;
	}

	/**
	 * @param string $username
	 * @param string $password
	 *
	 * @return ApiClientUnexpectedStatusError|UserAlreadyExists|UserNotCreated|UserSuccessfullyCreated
	 */
	public function createUser( $username, $password ) {
		$result        = wp_remote_post(
			$this->baseUrl . '/users',
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Content-Type' => 'application/json',
					),
					$this->trackingHeaders()
				),
				'body'      => json_encode(
					array(
						'username' => $username,
						'password' => $password,
					)
				),
			)
		);
		$response_code = wp_remote_retrieve_response_code( $result );

		if ( $response_code == WP_Http::CREATED ) {
			return new UserSuccessfullyCreated();
		}

		if ( $response_code == WP_Http::CONFLICT ) {
			return new UserAlreadyExists();
		}

		if ( $response_code == WP_Http::BAD_REQUEST ) {
			return new UserNotCreated();
		}

		return new ApiClientUnexpectedStatusError( $response_code );
	}

	/**
	 * @param string $accessToken
	 * @param string $domain
	 * @param string $emailDomain
	 *
	 * @return CreatedAccount
	 */
	public function createAccount( $accessToken, $domain, $emailDomain ) {
		$result = wp_remote_post(
			$this->baseUrl . '/accounts',
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Content-Type'  => 'application/json',
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
				'body'      => json_encode(
					array(
						'domain'      => $domain,
						'emailDomain' => $emailDomain,
					)
				),
			)
		);

		$responseBody = json_decode( wp_remote_retrieve_body( $result ), true );

		return new CreatedAccount( $responseBody['id'], $responseBody['domain'], $responseBody['keySelector'] );
	}

	/**
	 * @param string $accessToken
	 * @param string $accountId
	 *
	 * @return Account
	 */
	public function getAccount( $accessToken, $accountId ) {
		$result = wp_remote_get(
			$this->baseUrl . "/accounts/$accountId",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
			)
		);

		$responseBody = json_decode( wp_remote_retrieve_body( $result ), true );

		return new Account(
			$responseBody['id'],
			$responseBody['plan']
		);
	}

	/**
	 * @param string $accessToken
	 * @param string $accountId
	 *
	 * @return DkimDnsRecord[]
	 */
	public function getDkimRecords( $accessToken, $accountId ) {
		$response = wp_remote_get(
			$this->baseUrl . "/accounts/$accountId/dkim-records",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
			)
		);

		$response_code = wp_remote_retrieve_response_code( $response );

		if ( $response_code == WP_Http::NOT_FOUND ) {
			return array();
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );

		return array_map(
			function ( $record ) {
				return new DkimDnsRecord( $record['name'], $record['content'], $record['keySize'] );
			},
			$body['records']
		);
	}

	/**
	 * @param string $accessToken
	 * @param string $accountId
	 *
	 * @return SignedEmail|EmailSigningError|ApiClientUnexpectedStatusError
	 */
	public function sign( $accessToken, $accountId, $domain, $keySelector, SigningRequest $signingRequest ) {
		$result = wp_remote_post(
			$this->baseUrl . "/accounts/$accountId/dkim-records/$domain/$keySelector/sign",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Content-Type'  => 'application/json',
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
				'body'      => json_encode(
					array(
						'headers' => array(
							'From'    => $signingRequest->getFrom(),
							'To'      => $signingRequest->getTo(),
							'Subject' => $signingRequest->getSubject(),
						),
						'body'    => $signingRequest->getBody(),
					)
				),
			)
		);

		$response_code = wp_remote_retrieve_response_code( $result );

		if ( $response_code == WP_Http::TOO_MANY_REQUESTS ) {
			return new ThresholdExceededError();
		}

		if ( $response_code == WP_Http::NOT_FOUND ) {
			return new DkimRecordNotFound( $domain, $keySelector );
		}

		if ( $response_code == WP_Http::CONFLICT ) {
			return new DkimRecordNotMatching();
		}

		if ( $response_code == WP_Http::OK ) {
			$responseBody = json_decode( wp_remote_retrieve_body( $result ), true );

			return new SignedEmail( $responseBody['header']['name'], $responseBody['header']['value'] );
		}

		return new ApiClientUnexpectedStatusError( $response_code );
	}

	/**
	 * @param string|null $accessToken
	 * @return bool
	 */
	public function isEmailVerified( $accessToken ) {

		if ( $accessToken === null ) {
			return false;
		}

		if ( $this->emailVerificationOption->isVerified() ) {
			return true;
		}

		$result = wp_remote_get(
			$this->baseUrl . '/user/email-verified',
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
				'timeout'   => $this->timeoutMillis,
			)
		);

		$responseBody = json_decode( wp_remote_retrieve_body( $result ), true );
		$verified     = $responseBody['verified'];

		if ( $verified ) {
			$this->emailVerificationOption->setVerified();
		}

		return $verified;
	}

	/**
	 * @param string|null $accessToken
	 * @param string      $domain
	 *
	 * @return DeliverabilityScore|ApiClientError
	 */
	public function getDeliverabilityScore( $accessToken, $domain ) {
		$headers         = $this->trackingHeaders();
		$isEmailVerified = $this->isEmailVerified( $accessToken );

		if ( $isEmailVerified ) {
			$headers['Authorization'] = "Bearer $accessToken";
			$accountId                = $this->accountIdOption->get();
			$requestPath              = "/accounts/$accountId/deliverability-score/$domain";
		} else {
			$requestPath = "/deliverability-score/$domain";
		}

		$result = wp_remote_get(
			$this->baseUrl . $requestPath,
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => $headers,
				'timeout'   => $this->timeoutMillis,
			)
		);

		if ( is_wp_error( $result ) and $result->get_error_code() === 'http_request_failed' ) {
			return new ApiClientTimeoutError();
		}

		$response_code = wp_remote_retrieve_response_code( $result );

		if ( $response_code != WP_Http::OK ) {
			return new ApiClientUnexpectedStatusError( $response_code );
		}

		$responseBody = json_decode( wp_remote_retrieve_body( $result ), true );

		$totalScore = (int) $responseBody['totalScore'];

		$spfScore       = $this->adaptScore( $responseBody['spf'] );
		$dmarcScore     = $this->adaptScore( $responseBody['dmarc'] );
		$domainAgeScore = $this->adaptScore( $responseBody['domainAge'] );
		$dkimScore      = $this->adaptScore( $responseBody['dkim'] );
		$mxScore        = $this->adaptScore( $responseBody['mx'] );
		$blacklistScore = $this->adaptBlacklistScore( $responseBody['blacklist'] );
		$bimiScore      = $this->adaptBimiScore( $responseBody['bimi'] );

		return new DeliverabilityScore(
			$totalScore,
			$spfScore,
			$dmarcScore,
			$domainAgeScore,
			$dkimScore,
			$mxScore,
			$blacklistScore,
			$bimiScore
		);
	}

	/**
	 * @param string $domain
	 * @param string $pluginVersion
	 * @param string $wordPressVersion
	 */
	public function trackPluginActivation( $domain, $pluginVersion, $wordPressVersion ) {
		$response = $this->track( $pluginVersion, $wordPressVersion, $domain, TrackingEvent::PLUGIN_ACTIVATED );

		$responseCode = wp_remote_retrieve_response_code( $response );

		if ( $responseCode != WP_Http::CREATED ) {
			$responseBody = wp_remote_retrieve_body( $response );
			error_log( "unexpected response when tracking event: status = [$responseCode], body = [$responseBody]" );
		}
	}

	/**
	 * @param string $domain
	 * @param string $pluginVersion
	 * @param string $wordPressVersion
	 */
	public function trackPluginDeactivation( $domain, $pluginVersion, $wordPressVersion ) {
		$response = $this->track( $pluginVersion, $wordPressVersion, $domain, TrackingEvent::PLUGIN_DEACTIVATED );

		$responseCode = wp_remote_retrieve_response_code( $response );

		if ( $responseCode != WP_Http::CREATED ) {
			$responseBody = wp_remote_retrieve_body( $response );
			error_log( "unexpected response when tracking event: status = [$responseCode], body = [$responseBody]" );
		}
	}


	/**
	 * @param string $accessToken
	 * @param string $accountId
	 * @param string $domain
	 *
	 * @return DailyUsage[]|MalformedDateInResponse
	 */
	public function getDailyUsageData( $accessToken, $accountId, $domain ) {
		$response = wp_remote_get(
			$this->baseUrl . "/accounts/$accountId/usage/$domain/daily",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
			)
		);

		$response_code = wp_remote_retrieve_response_code( $response );

		if ( $response_code == WP_Http::NOT_FOUND ) {
			return array();
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );

		$result = array_map( array( $this, 'adaptDailyUsage' ), $body['data'] );

		$parseErrors = array_filter(
			$result,
			function ( $element ) {
				return $element instanceof MalformedDateInResponse;
			}
		);

		if ( empty( $parseErrors ) ) {
			return $result;
		} else {
			return $parseErrors[0];
		}
	}

	/**
	 * @param string $accessToken
	 *
	 * @return VerificationEmailSent|EmailAlreadyVerified|ApiClientError
	 */
	public function sendVerificationEmail( $accessToken ) {

		$response = wp_remote_post(
			$this->baseUrl . '/user/send-verification-email',
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
					),
					$this->trackingHeaders()
				),
				'timeout'   => $this->timeoutMillis,
			)
		);

		if ( is_wp_error( $response ) and $response->get_error_code() === 'http_request_failed' ) {
			return new ApiClientTimeoutError();
		}

		$responseCode = wp_remote_retrieve_response_code( $response );

		if ( $responseCode === WP_Http::NO_CONTENT ) {
			return new VerificationEmailSent();
		} elseif ( $responseCode === WP_Http::UNPROCESSABLE_ENTITY ) {
			return new EmailAlreadyVerified();
		} else {
			return new ApiClientUnexpectedStatusError( $responseCode );
		}
	}

	/**
	 * @param string $accessToken
	 * @param string $accountId
	 * @param string $domain
	 * @param string $keySelector
	 * @param int    $keySize
	 * @return DkimKeyRotated | PaymentRequired | TooManyRequests | ApiClientUnexpectedStatusError
	 */
	public function rotateKey( $accessToken, $accountId, $domain, $keySelector, $keySize ) {

		$response = wp_remote_post(
			$this->baseUrl . "/accounts/$accountId/dkim-records/$domain/$keySelector/rotate",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Authorization' => "Bearer $accessToken",
						'Content-Type'  => 'application/json',
					),
					$this->trackingHeaders()
				),
				'body'      => json_encode( array( 'keySize' => $keySize ) ),
			)
		);

		$response_code = wp_remote_retrieve_response_code( $response );

		if ( $response_code == WP_Http::TOO_MANY_REQUESTS ) {
			$retryAfter = wp_remote_retrieve_header( $response, 'Retry-After' );
			$retryAfter = $this->clock->now()->add( new DateInterval( "PT{$retryAfter}S" ) );
			$result     = new TooManyRequests( $retryAfter );

		} elseif ( $response_code == WP_Http::PAYMENT_REQUIRED ) {
			$result = new PaymentRequired();

		} elseif ( $response_code == WP_Http::NO_CONTENT ) {
			$result = new DkimKeyRotated();

		} else {
			$result = new ApiClientUnexpectedStatusError( $response_code );
		}

		return $result;
	}

	/**
	 * @param $username
	 * @return PasswordSuccessfullyReset|InvalidEmail|ApiClientUnexpectedStatusError
	 */
	public function resetPassword( $username ) {
		$response = wp_remote_post(
			$this->baseUrl . "/users/$username/reset-password",
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => $this->trackingHeaders(),
			)
		);

		$response_code = wp_remote_retrieve_response_code( $response );

		if ( $response_code == WP_Http::NO_CONTENT ) {
			return new PasswordSuccessfullyReset();
		} elseif ( $response_code == WP_Http::BAD_REQUEST ) {
			return new InvalidEmail();
		} else {
			return new ApiClientUnexpectedStatusError( $response_code );
		}
	}

	/**
	 * @param $data
	 *
	 * @return DailyUsage|MalformedDateInResponse
	 */
	private function adaptDailyUsage( $data ) {
		$date = DateTimeImmutable::createFromFormat( 'Y-m-d|P', $data['date'] );

		if ( ! $date ) {
			return new MalformedDateInResponse( $data['date'] );
		} else {
			return new DailyUsage(
				$date,
				$data['requested'],
				$data['threshold']
			);
		}
	}

	/**
	 * @param $analysisResult
	 *
	 * @return AnalysisNotAvailable|AnalysisResult
	 */
	private function adaptScore( $analysisResult ) {
		if ( $analysisResult['score'] === null ) {
			$spfScore = new AnalysisNotAvailable();
		} else {
			$spfScore = new AnalysisResult(
				$analysisResult['score'],
				$analysisResult['details']
			);
		}

		return $spfScore;
	}

	/**
	 * @param $analysisResult
	 *
	 * @return AnalysisNotAvailable|BlacklistAnalysisResult
	 */
	private function adaptBlacklistScore( $analysisResult ) {
		$score = $analysisResult['score'];

		if ( $score === null ) {
			$result = new AnalysisNotAvailable();
		} else {
			$details = array_map(
				function ( $detail ) {

					$name = $detail['name'];
					$url  = $detail['url'];

					switch ( $detail['type'] ) {
						case 'DNSBL':
							return new DnsBlacklisted( $name, $url, $detail['address'] );
						case 'RHSBL':
							return new RhsBlacklisted( $name, $url, $detail['domain'] );
						default:
							return null;
					}
				},
				$analysisResult['details']
			);

			$details = array_filter( $details );

			$result = new BlacklistAnalysisResult( $score, $details );
		}

		return $result;
	}

	/**
	 * @param $analysisResult
	 *
	 * @return AnalysisNotAvailable|AnalysisResult
	 */
	private function adaptBimiScore( $analysisResult ) {
		if ( $analysisResult['score'] === null ) {
			$result = new AnalysisNotAvailable();
		} else {
			$url    = array_key_exists( 'url', $analysisResult ) ? $analysisResult['url'] : null;
			$result = new BimiAnalysisResult(
				$analysisResult['score'],
				$analysisResult['details'],
				$url
			);
		}

		return $result;
	}

	/**
	 * @param string $pluginVersion
	 * @param string $wordPressVersion
	 * @param string $domain
	 * @param string $event
	 *
	 * @return array|WP_Error
	 */
	private function track( $pluginVersion, $wordPressVersion, $domain, $event ) {
		return wp_remote_post(
			$this->baseUrl . '/track',
			array(
				'sslverify' => $this->sslVerify,
				'headers'   => array_merge(
					array(
						'Content-Type' => 'application/json',
					),
					$this->trackingHeaders()
				),
				'body'      => json_encode(
					array(
						'event'  => $event,
						'plugin' => array(
							'type'             => 'WORDPRESS',
							'version'          => $pluginVersion,
							'wordpressVersion' => $wordPressVersion,
						),
						'domain' => $domain,
					)
				),
			)
		);
	}

	private function trackingHeaders() {
		return array(
			'TD-Client-Version' => json_encode(
				array(
					'type'             => 'WORDPRESS',
					'version'          => $this->pluginVersionProvider->get(),
					'wordpressVersion' => $this->wordpressVersionProvider->get(),
				)
			),
		);
	}
}
