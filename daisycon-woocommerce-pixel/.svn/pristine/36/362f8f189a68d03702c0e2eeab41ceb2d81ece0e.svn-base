<?php

class Daisycon_Campaign_Service
{
	/**
	 * @var Daisycon_Woocommerce_Auth
	 */
	private $auth;

	public function __construct()
	{
		$this->auth = new Daisycon_Woocommerce_Auth();
	}

	/**
	 * @throws \Daisycon_Advertiser_Service_Exception
	 * @throws \Daisycon_Campaign_Service_Exception
	 */
	public function getCampaigns(int $advertiserId)
	{
		try {
			$authenticatedUser = (new Daisycon_Woocommerce_Auth())->getAuthenticatedUser();
		} catch (Exception $exception) {
			throw new Daisycon_Advertiser_Service_Exception(
				'Could not load campaigns, auth user not found: ' . $exception->getMessage(),
				$exception->getCode(),
				$exception
			);
		}

		if ( true === empty( $authenticatedUser ) ) {
			throw new Daisycon_Advertiser_Service_Exception( 'Could not load campaigns, not authenticated' );
		}

		if ( true === empty( $advertiserId ) ) {
			throw new Daisycon_Advertiser_Service_Exception( 'Could not load campaigns, invalid advertiser ID supplied' );
		}

		try {
			$url = DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/store/advertisers/$advertiserId/campaigns";

			$campaigns = ( new Daisycon_Http_Handler() )->get( $url );

			return true === is_array( $campaigns ) && true === isset( $campaigns['body'] )
				? json_decode( $campaigns['body'] )->data ?? []
				: [];
		} catch ( Exception $exception ) {

			throw new Daisycon_Campaign_Service_Exception( 'Unable to load campaigns', $exception->getCode(), $exception );
		}
	}

	/**
	 * @throws \Exception
	 */
	public function loadMatchingDomains()
	{
		try {
			$authenticatedUser = ( new Daisycon_Woocommerce_Auth() )->getAuthenticatedUser();
		} catch ( Exception $exception ) {
			header( 'HTTP/1.1 400 BAD REQUEST' );
			echo json_encode( [ 'error' => 'Could not load matching domain, Unable to load authenticate user: ' . $exception->getMessage() ] );
			exit;
		}

		if ( true === empty( $authenticatedUser ) ) {
			header( 'HTTP/1.1 400 BAD REQUEST' );
			echo json_encode( [ 'error' => 'Could not load matching domain, not authenticated' ] );
			exit;
		}

		$advertiserId = (int)($_REQUEST['advertiser_id'] ?? 0);

		if ( true === empty( $advertiserId ) ) {
			header( 'HTTP/1.1 400 BAD REQUEST' );
			echo json_encode( [ 'error' => 'Could not load matching domain, invalid advertiser ID supplied' ] );
			exit;
		}

		$campaignId = (int)($_REQUEST['campaign_id'] ?? 0);

		if ( true === empty( $campaignId ) ) {
			header( 'HTTP/1.1 400 BAD REQUEST' );
			echo json_encode( [ 'error' => 'Could not load matching domain, invalid campaign ID supplied' ] );
			exit;
		}

		$campaigns = (new Daisycon_Http_Handler())->get(DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/store/advertisers/$advertiserId/campaigns/$campaignId");

		wp_send_json(
			true === is_array($campaigns) && true === isset($campaigns['body'])
				? json_decode($campaigns['body'])->data ?? []
				: []
		);
	}
}
