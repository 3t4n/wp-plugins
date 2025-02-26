<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class EH_CRM_Update_Version {


	public function __construct() {
		$this->date_updated_check();
		$this->trash_updated_check();
		$this->role_updated_check();
		$this->update_settings_meta();
	}
	public function date_updated_check() {
		global $wpdb;
		if ( $wpdb->get_var( 'SHOW COLUMNS FROM ' . $wpdb->prefix . 'wsdesk_tickets' . " LIKE 'ticket_updated'" ) ) {
			return false;
		}
		$wpdb->query( 'ALTER TABLE ' . $wpdb->prefix . 'wsdesk_tickets ADD `ticket_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `ticket_date`;' );
	}
	public function role_updated_check() {
		$role = get_role( 'WSDesk_Agents' );
		if ( $role ) {
			if ( isset( $role->capabilities ) && in_array( 'view_admin_dashboard', $role->capabilities ) ) {
				$role->add_cap( 'view_admin_dashboard', true );
			}
		} 
		$role = get_role( 'WSDesk_Supervisor' );
		if ( $role ) {
			if ( isset( $role->capabilities ) && in_array( 'view_admin_dashboard', $role->capabilities ) ) {
				$role->add_cap( 'view_admin_dashboard', true );
			}
		}
	}
	public function update_settings_meta() {
		if ( eh_crm_get_settingsmeta( 0, 'auto_send_creation_email' ) === false ) {
			eh_crm_update_settingsmeta( 0, 'auto_send_creation_email', 'enable' );
		}
	}
	public function trash_updated_check() {
		global $wpdb;
		if ( $wpdb->get_var( 'SHOW COLUMNS FROM ' . $wpdb->prefix . 'wsdesk_tickets' . " LIKE 'ticket_trash'" ) ) {
			return false;
		}
		$wpdb->query( 'ALTER TABLE ' . $wpdb->prefix . 'wsdesk_tickets ADD `ticket_trash` INT NOT NULL DEFAULT 0 AFTER `ticket_vendor`;' );
	}
}
