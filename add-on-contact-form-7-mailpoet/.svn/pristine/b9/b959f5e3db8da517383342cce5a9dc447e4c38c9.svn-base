<?php

// If access directly, die
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use MailPoet\DI\ContainerWrapper;
use MailPoet\Models\CustomField;
use MailPoet\Entities\CustomFieldEntity;
use MailPoetVendor\Doctrine\ORM\EntityManager;

class MailpoetCustomField {

	public function __construct() {
		// Admin init
		add_action( 'admin_init', array( $this, 'admin_init' ), 20 );

	} // end of __construct

	public static function init() {

		$instance = false;

		if ( empty( $instance ) ) {
			$instance = new self();
		}
	}

	/**
	 * Translate text
	 */
	public function __( $text ) {
		return __( $text, 'add-on-contact-form-7-mailpoet' );
	}//end __()


	/**
	 * Admin init
	 */
	public function admin_init() {
		// Add Tag generator button
		if ( ! class_exists( 'WPCF7_TagGenerator' ) ) {
			return;
		}
		$tag_generator = WPCF7_TagGenerator::get_instance();

		$tag_generator->add(
			'cf',
			$this->__( 'MailPoet Custom field' ),
			array( $this, 'mailpoetsignup_cf' )
		);

	} //End of admin_init


	/**
	 * Get Mailpoet Custom fields
	 */
	public function mailpoetsignup_cf() {

		// Get custom fields and fields type
		$entityManager = ContainerWrapper::getInstance()->get(EntityManager::class);
		$CustomFieldRepository = $entityManager->getRepository(CustomFieldEntity::class);
		$fields = $CustomFieldRepository->findAll();
		$results = array();
		foreach ( $fields as $field ) {
			$results[ 'cf_' . $field->getId() ] = $field->getName();
		}

		if ( ! empty( $results ) ) {
			foreach ( $results as $key => $value ) {
				echo $this->__( 'MailPoet Custom field name: ' . $value . '<br>' );
				echo $this->__( 'Custom field ID (which should be used as contact form\'s field name): ' . '<strong>' . $key . '</strong>' );
				echo '<br>';
				echo '<br>';
			}
		} else {
			echo $this->__( 'No mailpoet custom field available.' );
		}
	} //End of mailpoetsignup_cf

}

MailpoetCustomField::init();
