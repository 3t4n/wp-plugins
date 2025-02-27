<?php

namespace TopDeliverability\Settings\Widget;

use TopDeliverability\Api\ApiClient;
use TopDeliverability\Api\MalformedDateInResponse;
use TopDeliverability\Option\ConfiguredDomainsOption;
use TopDeliverability\Template;

class DailyUsageWidget {

	/**
	 * @var DailyUsageAdapter
	 */
	private $dailyUsageAdapter;

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * @var ConfiguredDomainsOption
	 */
	private $configuredDomainsOption;

	/**
	 * @param Template\Renderer       $templateRenderer
	 * @param DailyUsageAdapter       $dailyUsageAdapter
	 * @param ApiClient               $apiClient
	 * @param ConfiguredDomainsOption $configuredDomainsOption
	 */
	public function __construct(
		Template\Renderer $templateRenderer,
		DailyUsageAdapter $dailyUsageAdapter,
		ApiClient $apiClient,
		ConfiguredDomainsOption $configuredDomainsOption
	) {
		$this->dailyUsageAdapter       = $dailyUsageAdapter;
		$this->templateRenderer        = $templateRenderer;
		$this->apiClient               = $apiClient;
		$this->configuredDomainsOption = $configuredDomainsOption;
	}

	/**
	 * @param string $accountId
	 * @return string
	 */
	public function render( $accountId ) {

		$domain         = $this->configuredDomainsOption->get()->getRecords()[0]->getDomain();
		$dailyUsageData = $this->apiClient->getDailyUsageData( $accountId, $domain );

		$context = new Template\Context();

		if ( $dailyUsageData instanceof MalformedDateInResponse ) {
			$context->withPrefix(
				'error',
				array(
					'message' => __( 'Malformed date in daily usage chart', 'deliverability' ),
					'level'   => 'error',
					'testid'  => 'malformed-date-error',
				)
			);
		} else {

			$dataAttributes = $this->dailyUsageAdapter->adaptDailyUsage( $dailyUsageData );

			$context->with(
				array(
					'title'            => __( 'Daily usage', 'deliverability' ),
					'subtitle'         => __( 'The chart shows signed and unsigned messages.', 'deliverability' ),
					'signed_label'     => __( 'Signed', 'deliverability' ),
					'not_signed_label' => __( 'Not signed', 'deliverability' ),
					'threshold_label'  => __( 'Threshold', 'deliverability' ),
					'signed'           => $dataAttributes->get_signed(),
					'not_signed'       => $dataAttributes->get_not_signed(),
					'thresholds'       => $dataAttributes->get_thresholds(),
					'day_labels'       => $dataAttributes->get_day_labels(),
				)
			);
		}

		return $this->templateRenderer->render( 'settings/daily_usage.twig', $context );
	}
}
