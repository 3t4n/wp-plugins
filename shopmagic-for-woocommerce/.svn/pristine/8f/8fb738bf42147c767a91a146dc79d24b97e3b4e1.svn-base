<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Integration\GetResponse;

use ShopMagicVendor\Getresponse\Sdk\Client\GetresponseClient;
use ShopMagicVendor\Getresponse\Sdk\Client\Operation\Pagination;
use ShopMagicVendor\Getresponse\Sdk\Operation\Campaigns\GetCampaigns\GetCampaigns;
use ShopMagicVendor\Getresponse\Sdk\Operation\Contacts\CreateContact\CreateContact;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\CampaignReference;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\NewContact;
use ShopMagicVendor\Getresponse\Sdk\Operation\Model\NewContactTag;
use ShopMagicVendor\Getresponse\Sdk\Operation\Tags\GetTags\GetTags;
use WPDesk\ShopMagic\FormField\Field\Paragraph;
use WPDesk\ShopMagic\FormField\Field\SelectField;
use WPDesk\ShopMagic\FormField\Field\InputTextField;
use WPDesk\ShopMagic\Workflow\Action\Action;
use WPDesk\ShopMagic\Workflow\Event\DataLayer;

/**
 * @see https://github.com/GetResponse/sdk-php/
 * @see https://apireference.getresponse.com/#operation/createContact
 */
final class AddGetResponseContact extends Action {

	private GetresponseClient $getresponse;

	private Settings $settings;

	private GetResponseQuery $query;

	public function __construct(
		GetresponseClient $getresponse,
		GetResponseQuery $query,
		Settings $settings
	) {
		$this->settings    = $settings;
		$this->getresponse = $getresponse;
		$this->query       = $query;
	}

	public function get_id(): string {
		return 'shopmagic_add_to_getresponse_action';
	}

	public function get_required_data_domains(): array {
		return [];
	}

	public function get_name(): string {
		return __( 'Add a contact to GetResponse list', 'shopmagic-for-woocommerce' );
	}

	public function get_description(): string {
		return esc_html__( 'Add a contact to selected GetResponse list.', 'shopmagic-for-woocommerce' );
	}

	/** @return \ShopMagicVendor\WPDesk\Forms\Field[] */
	public function get_fields(): array {
		$fields = parent::get_fields();

		if ( ! $this->settings->has( 'api_key' ) ) {
			$fields[] = ( new Paragraph() )
				->set_name( 'missing_api_key' )
				->set_type( 'error' )
				->set_description( __( 'API key is missing. Generate GetResponse API key and update ShopMagic settings.', 'shopmagic-for-woocommerce' ) );

			return $fields;
		}
		$campaigns = $this->query->get_campaigns();

		$fields[] = ( new SelectField() )
			->set_name( '_getresponse_campaign_id' )
			->set_label( __( 'List to sign up', 'shopmagic-for-woocommerce' ) )
			->set_options( $campaigns )
			->set_default_value( (string) array_keys( $campaigns )[0] );
		$fields[] = ( new InputTextField() )
			->set_name( 'email' )
			->set_label( __( "Contact's email", 'shopmagic-for-woocommerce' ) )
			->set_default_value( '{{ customer.email }}' );
		$fields[] = ( new InputTextField() )
			->set_name( 'name' )
			->set_label( __( "Contact's name", 'shopmagic-for-woocommerce' ) )
			->set_default_value( '{{ customer.name }}' );
		$fields[] = ( new SelectField() )
			->set_name( 'tags' )
			->set_multiple()
			->set_label( __( 'Tags to assign to a contact', 'shopmagic-for-woocommerce' ) )
			->set_options( $this->query->get_tags() );

		return $fields;
	}

	public function execute( DataLayer $resources ): bool {
		$this->resources = $resources;

		$email = $this->placeholder_processor->process( $this->fields_data->get( 'email' ) );

		if ( strlen( $email ) === 0 ) {
			$this->logger->error(
				'Email is missing in this action. Make sure, the placeholder can be resolved, e.g. the guest user exists in ShopMagic.',
				[ 'original_value' => $this->fields_data->get( 'email' ) ]
			);
			return false;
		}

		$new_contact = new NewContact(
			new CampaignReference( $this->fields_data->get( '_getresponse_campaign_id' ) ),
			$email,
		);

		$new_contact->setName(
			$this->placeholder_processor->process( $this->fields_data->get( 'name' ) )
		);
		if ( $this->fields_data->has( 'tags' ) ) {
			$tags = array_map(
				static fn ( string $t ) => new NewContactTag( $t ),
				$this->fields_data->get( 'tags' ),
			);
			$new_contact->setTags( $tags );
		}
		$res = $this->getresponse->call( new CreateContact( $new_contact ) );

		if ( $res->isSuccess() ) {
			return true;
		}

		$this->logger->error(
			'Error returned from GetResponse API',
			[ 'response' => $res->getData() ]
		);
		return false;
	}
}
