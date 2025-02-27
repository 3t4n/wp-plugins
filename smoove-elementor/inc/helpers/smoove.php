<?php
namespace SMEF\Helpers;

use SMEF\Modules\Smoove_Api;

class Smoove{
	public static function maybe_inform_plugin_usage( $action ){
		$api_key = null;

		$site_name = get_bloginfo('name');
		$site_url = get_bloginfo('url');
		$admin_email = get_bloginfo('admin_email');

		$contact_data = [
			'firstName' => $site_name,
			'email' => $admin_email,
			'canReceiveEmails' => false,
			'canReceiveSmsMessages' => false,
			'customFields' => [
				'i1' => $site_url,
			]
		];

		$contact_data['lists_ToSubscribe'] = [980355];
		// $contact_data['lists_ToUnsubscribe'] = [967507];

		switch( $action ){
			case 'install':
				$api_key = '8449a2e9-3ff0-4609-9bb2-2e2ef1f5cb76';
				$contact_data['customFields']['i2'] = 'installed';
				break;

			case 'uninstall':
				$api_key = 'f96b2be6-e72f-47aa-9341-ce8982a0ba4f';
				$contact_data['customFields']['i3'] = 'uninstalled';
				break;
		}

		if( $api_key ){
			$Smoove_Api = new Smoove_Api( $api_key );
			$smoove_response = $Smoove_Api->send_contact( $contact_data, true, true );
		}
	}

	public static function maybe_send_contact_to_smoove( $contact_data, $debug_errors = [] ){
		$response = false;
		
		$smoove_contact_status = 'Not exist';
		$do_send_to_smoove = true;
		$sent_to_smoove = false;

		$contact_email = $contact_data['email'];
		$contact_phone = $contact_data['cellPhone'];
		$contact_ext_id = $contact_data['externalId'];

		if( !$contact_email 
			&& !$contact_phone 
			&& !$contact_ext_id 
		){
			return $response;
		}

		$Smoove_Api = new Smoove_Api();

		if( $contact_email ){
			$smoove_contact = $Smoove_Api->get_contact_status([
				'email' => $contact_email
			] );
		}

		if( $smoove_contact['code'] != 200 && $contact_phone ){
			$smoove_contact = $Smoove_Api->get_contact_status([
				'cellPhone' => $contact_phone
			]);
		}

		if( $smoove_contact['code'] != 200 && $contact_ext_id ){
			$smoove_contact = $Smoove_Api->get_contact_status([
				'externalId' => $contact_ext_id
			]);
		}

		$smef_contact_deleted_action = get_option('smef_contact_deleted_action');
		$smef_contact_unsubscribed_action = get_option('smef_contact_unsubscribed_action');

		$restore_if_deleted = ( $smef_contact_deleted_action == 'restore' ) ? true : false;
		$restore_if_unsubscribed = ( $smef_contact_unsubscribed_action == 'restore' ) ? true : false;

		if( $smoove_contact['code'] == 200 ){
			$contact_status = isset( $smoove_contact['body']['status'] ) ? $smoove_contact['body']['status'] : false;

			if( $contact_status ){
				switch( $contact_status ){
					case 'Active':
						$do_send_to_smoove = true;
						break;

					case 'Deleted':
						if( !$restore_if_deleted ){
							$do_send_to_smoove = false;
						}
						break;

					case 'Unsubscribed':
						if( !$restore_if_unsubscribed ){
							$do_send_to_smoove = false;
						}
						break;
				}

				$smoove_contact_status = $contact_status;
			}
		}

		if( $do_send_to_smoove === true ){
			$smoove_response = $Smoove_Api->send_contact( $contact_data, $restore_if_deleted, $restore_if_unsubscribed, $debug_errors );

			if( $smoove_response['code'] == 200 ){
				$sent_to_smoove = true;
			}
		}

		$response = [
			'api_key' => $smoove_response['api_key'],
			'smoove_contact_status' => $smoove_contact_status,
			'sent_to_smoove' => $sent_to_smoove ? 'yes' : 'no',
		];

		return $response;
	}
}