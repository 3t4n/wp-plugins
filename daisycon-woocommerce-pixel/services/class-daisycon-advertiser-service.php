<?php

class Daisycon_Advertiser_Service
{
	/**
	 * @throws \Daisycon_Advertiser_Service_Exception
	 */
	public function getAdvertisers()
	{
		try
		{
			$advertisers = (new Daisycon_Http_Handler())->get(DAISYCON_PLUGIN_URL_SERVER_TO_SERVER. '/store/advertisers');

			return true === is_array($advertisers) && true === isset($advertisers['body'])
				? json_decode($advertisers['body'])->data ?? []
				: [];
		}
		catch (\Exception $exception)
		{
			throw new Daisycon_Advertiser_Service_Exception(
				'Unable to load advertisers',
				$exception->getCode(),
				$exception
			);
		}
	}

	/**
	 * @throws \Daisycon_Advertiser_Service_Exception
	 */
	public function getAdvertiser(int $advertiserId)
	{
		if (true === empty($advertiserId))
		{
			throw new InvalidArgumentException('Invalid advertiser');
		}

		try
		{
			$advertiser = (new Daisycon_Http_Handler())->get(DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/store/advertisers/" . $advertiserId);

			return true === is_array($advertiser) && true === isset($advertiser['body'])
				? json_decode($advertiser['body'])->data ?? []
				: null;
		}
		catch (Exception $exception)
		{
			throw new Daisycon_Advertiser_Service_Exception(
				'Unable to load Advertiser.',
				$exception->getCode(),
				$exception
			);
		}
	}
}
