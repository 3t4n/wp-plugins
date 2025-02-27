<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Integration\GetResponse;

use ShopMagicVendor\Getresponse\Sdk\Client\GetresponseClient;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Pagination;
use ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\GetCampaigns\GetCampaigns;
use ShopMagicVendor\Getresponse\Sdk\Operation\Tags\GetTags\GetTags;
use ShopMagicVendor\Psr\Log\LoggerInterface;

/**
 * Query GetResponse API for details.
 */
final class GetResponseQuery {

	private LoggerInterface $logger;

	private GetresponseClient $getresponse;

	public function __construct( GetresponseClient $getresponse, LoggerInterface $logger ) {
		$this->getresponse = $getresponse;
		$this->logger      = $logger;
	}

	public function get_campaigns(): array {
		return $this->do_get( GetCampaigns::class, [ 'campaignId' => 'name' ] );
	}

	public function get_tags(): array {
		return $this->do_get( GetTags::class, [ 'tagId' => 'name' ] );
	}

	private function do_get( string $class, array $mapping ): array {
		$page_number = $final_page = 1;
		$resources   = [];

		$operation = new $class();

		do {
			$operation->setPagination( new Pagination( $page_number, 100 ) );
			$res = $this->getresponse->call( $operation );

			if ( ! $res->isSuccess() ) {
				$this->logger->error( 'Failed to get resources list', [ 'response' => $res->getData() ] );
				break;
			}

			if ( $res->isPaginated() ) {
				$final_page = $res->getPaginationValues()->getTotalPages();
			}

			foreach ( $res->getData() as $resource ) {
				$resources[] = $resource;
			}

			++$page_number;
		} while ( $page_number <= $final_page );

		if ( count( $resources ) === 0 ) {
			return [ '' => '' ];
		}

		$key       = array_key_first( $mapping );
		$value     = $mapping[ $key ];
		$resources = array_reduce(
			$resources,
			static function ( array $carry, array $resource ) use ( $key, $value ) {
				$carry[ $resource[ $key ] ] = $resource[ $value ];
				return $carry;
			},
			[]
		);

		return $resources;
	}
}
