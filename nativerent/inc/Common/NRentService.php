<?php

namespace NativeRent\Common;

use Exception;
use NativeRent\Common\Entities\AdUnitProps;
use NativeRent\Common\Entities\AdUnitsConfig;
use NativeRent\Common\Entities\CmsInfo;
use NativeRent\Common\Entities\IntegrationStatus;
use NativeRent\Common\Entities\State;
use NativeRent\Common\SDK\APIClient;
use NativeRent\Common\SDK\Auth\AuthPayload;
use NativeRent\Common\SDK\Auth\SecretKey;
use NativeRent\Common\SDK\Http\RequestException;
use NativeRent\Common\SDK\Reporting\SendIssuePayload;
use NativeRent\Common\SDK\State\GetOptionsPayload;
use NativeRent\Common\SDK\State\GetOptionsResponse;
use NativeRent\Common\SDK\State\SendStatePayload;
use NativeRent\Common\SDK\State\SendStatusPayload;

use function array_key_exists;
use function is_null;
use function is_numeric;
use function property_exists;

class NRentService {
	const INTEGRATION_TYPE = 'wordpress';

	/**
	 * @var APIClient
	 */
	private $client;

	/**
	 * @var Options
	 */
	private $options;

	/**
	 * @param  APIClient $client
	 * @param  Options   $options
	 */
	public function __construct(
		APIClient $client,
		Options $options
	) {
		$this->client  = $client;
		$this->options = $options;

		$this->client->addOnRequestErrorHandler(
			function ( RequestException $re ) {
				if ( 401 == $re->getCode() ) {
					$this->options->setInvalidTokenFlag();
				}
				// TODO: наверняка не лучшее решение просто глушить такие ошибки.
				if ( $re->isClientError() ) {
					$re->suppress();
				}
			}
		);
	}

	/**
	 * Authorize integration.
	 *
	 * TODO: Вместо отправки списка ошибок лучше выбрасывать исключение.
	 *
	 * @param  string $domain    Site domain (ASCII).
	 * @param  string $email     NR partner email.
	 * @param  string $password  NR partner password.
	 *
	 * @return array{success: bool, errors: string[]}
	 * @throws RequestException
	 */
	public function authorize(
		$domain,
		$email,
		#[\SensitiveParameter]
		$password
	) {
		$result    = [
			'success' => false,
			'errors'  => [],
		];
		$secretKey = SecretKey::make();
		$response  = $this->client->auth(
			new AuthPayload(
				$domain,
				$email,
				$password,
				$secretKey,
				self::INTEGRATION_TYPE
			)
		);

		// Check auth errors.
		if ( ! $response->isSuccess() || $response->hasErrors() ) {
			$result['errors'] = $response->getErrors();

			return $result;
		}

		// Validate response data. TODO: нужно исключение.
		$authData = $response->getData();
		if (
			empty( $authData )
			|| empty( $authData->getSiteID() )
			|| empty( $authData->getToken() )
		) {
			return $result;
		}

		// Saving data.
		$this->options->setPluginSecretKey( $secretKey->getKey() );
		$this->options->setSiteID( $authData->getSiteID() );
		$this->options->setIntegrationAccessToken( $authData->getToken() );

		// Set access token to client.
		$this->client->withToken( $authData->getToken() );
		$this->options->setInvalidTokenFlag( false );

		// Get the necessary data from Native Rent and save it.
		$optsResponse = $this->loadOptions( $authData->getSiteID(), [ 'advPatterns', 'siteModerationStatus', 'monetizations' ] );
		if ( ! $optsResponse->isSuccess() ) {
			$result['errors'] = array_merge(
				$result['errors'],
				! is_null( $optsResponse->getErrors() ) ? $optsResponse->getErrors() : []
			);

			return $result;
		}
		$this->options->setSiteModerationStatus( $optsResponse->getData()->getSiteModerationStatus() );
		$this->options->updateMonetizations( $optsResponse->getData()->getMonetizations() );
		$this->options->updateAdvPatterns( $optsResponse->getData()->getAdvPatterns() );

		// Activation handler.
		$this->sendActivatedStatus();

		// Send actual state to Native Rent.
		$this->sendCurrentState();

		$result['success'] = true;

		return $result;
	}

	/**
	 * Actualize monetizations statuses.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function loadMonetizations() {
		$siteID = $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return;
		}
		$opts          = $this->loadOptions( $siteID, [ 'monetizations', 'siteModerationStatus' ] )->getData();
		$monetizations = $opts->getMonetizations();
		if ( ! is_null( $monetizations ) ) {
			$this->options->updateMonetizations( $monetizations );
		}
		$moderationStatus = $opts->getSiteModerationStatus();
		if ( ! is_null( $moderationStatus ) ) {
			$this->options->setSiteModerationStatus( $moderationStatus );
		}
	}

	/**
	 * Updating ad-block patterns.
	 *
	 * @return void
	 * @throws RequestException
	 */
	public function loadAdvPatterns() {
		$siteID = $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return;
		}
		$options = $this->loadOptions( $siteID, [ 'advPatterns' ] )->getData();
		if ( is_null( $options->getAdvPatterns() ) ) {
			return;
		}
		$this->options->updateAdvPatterns( $options->getAdvPatterns() );
	}

	/**
	 * Load ad-units config from Native Rent.
	 *
	 * @return bool
	 * @throws RequestException
	 */
	public function loadAdUnitsConfig() {
		$siteID = $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return false;
		}
		$options = $this->loadOptions( $siteID, [ 'adUnitsConfig' ] )->getData();
		if ( is_null( $options->getAdUnitsConfig() ) ) {
			return false;
		}

		return $this->patchAdUnitsConfig( $options->getAdUnitsConfig() );
	}

	/**
	 * Sending actual state to the NR system.
	 *
	 * @return bool
	 * @throws RequestException
	 */
	public function sendCurrentState() {
		$siteID = $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return false;
		}
		$state = new State(
			$this->options->getStateOptions(),
			CmsInfo::autoCreate()
		);

		return $this->client->sendState( new SendStatePayload( $siteID, $state ) );
	}

	/**
	 * Notify Native Rent about deactivation.
	 *
	 * @return void
	 * @throws RequestException
	 */
	public function sendDeactivatedStatus() {
		$this->sendStatus( IntegrationStatus::deactivated() );
	}

	/**
	 * Notify Native Rent about activation.
	 *
	 * @return void
	 * @throws RequestException
	 */
	public function sendActivatedStatus() {
		$this->sendStatus( IntegrationStatus::activated() );
	}

	/**
	 * Logout method.
	 *
	 * @param  bool $uninstall  Uninstall flag.
	 *
	 * @return void
	 * @throws RequestException
	 */
	public function logout( $uninstall = false ) {
		$siteID = $this->options->getSiteID();
		$this->options->purge();
		$this->sendStatus(
			$uninstall ? IntegrationStatus::uninstalled() : IntegrationStatus::deactivated(),
			$siteID
		);
	}

	/**
	 * Sending error to Native Rent tracker.
	 *
	 * @param  Exception|\Throwable $e
	 *
	 * @return void
	 * @throws RequestException
	 */
	public function sendError( $e ) {
		$siteID = $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return;
		}

		global $wp_version;
		$env = @getenv( 'WORDPRESS_ENV' );
		$this->client->sendIssue(
			new SendIssuePayload(
				$siteID,
				$e,
				[
					'release'     => defined( 'NATIVERENT_PLUGIN_VERSION' ) ? NATIVERENT_PLUGIN_VERSION : 'undefined',
					'environment' => ! empty( $env ) ? $env : 'production',
				],
				[
					'cms' => 'Wordpress ' . ( ! empty( $wp_version ) ? $wp_version : '(undefined)' ),
				]
			)
		);
	}

	/**
	 * Send status to Native Rent.
	 *
	 * @param  IntegrationStatus $status
	 * @param  string|null       $siteID
	 *
	 * @return bool
	 * @throws RequestException
	 */
	private function sendStatus( IntegrationStatus $status, $siteID = null ) {
		$siteID = ! empty( $siteID ) ? $siteID : $this->options->getSiteID();
		if ( empty( $siteID ) ) {
			return false;
		}

		return $this->client->sendStatus( new SendStatusPayload( $siteID, $status ) );
	}

	/**
	 *
	 * @param  AdUnitsConfig $payload
	 *
	 * @return bool
	 */
	private function patchAdUnitsConfig( AdUnitsConfig $payload ) {
		$config     = $this->options->getAdUnitsConfig();
		$patchProps = function ( AdUnitProps $original, AdUnitProps $new ) {
			$original->insert = ! empty( $new->insert ) ? $new->insert : $original->insert;
			$customSelector   = trim( $new->customSelector );

			// Updating `autoSelector` prop.
			if ( empty( $new->autoSelector ) ) {
				$original->autoSelector = empty( $customSelector ) ? $original->autoSelector : '';
			} else {
				$original->autoSelector = $new->autoSelector;
			}

			// Updating `customSelector` prop.
			if ( empty( $customSelector ) ) {
				$original->customSelector = empty( $original->autoSelector ) ? $original->customSelector : '';
			} else {
				$original->customSelector = $customSelector;
			}
		};

		// Patching REGULAR units...
		foreach ( $payload->regular as $type => $props ) {
			if ( empty( $props ) || 'popupTeaser' === $type || ! property_exists( $config->regular, $type ) ) {
				continue;
			}
			/** @var AdUnitProps $unitProps */
			$unitProps = $config->regular->$type;
			$patchProps( $unitProps, $props );
		}

		// Patching NTGB units...
		foreach ( $payload->ntgb->getIterable() as $unitName => $props ) {
			if ( empty( $props ) || ! isset( $config->ntgb[ $unitName ] ) ) {
				continue;
			}
			/** @var AdUnitProps $unitProps */
			$unitProps = $config->ntgb[ $unitName ];
			if ( is_null( $unitProps ) ) {
				continue;
			}
			$patchProps( $unitProps, $props );

			// Patching settings.
			if ( array_key_exists( 'noInsertion', $props->settings ) ) {
				$noInsertion                        = $props->settings['noInsertion'];
				$unitProps->settings['noInsertion'] = is_numeric( $noInsertion )
					? ( $noInsertion > 0 )
					: ! empty( $noInsertion );
			}
		}

		return $this->options->setAdUnitsConfig( $config );
	}

	/**
	 * @param  string   $siteID
	 * @param  string[] $options
	 *
	 * @return GetOptionsResponse
	 * @throws RequestException
	 */
	private function loadOptions( $siteID, $options = [] ) {
		return $this->client->getOptions( new GetOptionsPayload( $siteID, $options ) );
	}
}
