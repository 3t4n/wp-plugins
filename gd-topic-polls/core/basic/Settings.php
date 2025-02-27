<?php

namespace Dev4Press\Plugin\TopicPolls\Basic;

use Dev4Press\v53\Core\Plugins\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	public string $base = 'gdpol';
	public string $plugin = 'gd-topic-polls';

	public array $settings = array(
		'core'     => array(
			'activated'         => 0,
			'notice_gdpol_hide' => true,
			'notice_gdfon_hide' => false,
			'notice_gdtox_hide' => false,
			'notice_gdbbx_hide' => false,
			'notice_gdpos_hide' => false,
			'notice_gdqnt_hide' => false,
			'notice_gdmed_hide' => false,
		),
		'settings' => array(
			'global_enabled'                  => true,
			'global_cap_check'                => 'cap',
			'global_user_roles'               => array(
				'bbp_keymaster',
				'bbp_moderator',
				'bbp_participant',
			),
			'global_disable_forums'           => array(),
			'global_auto_embed_poll'          => true,
			'global_auto_embed_icon'          => true,
			'global_auto_embed_form'          => true,
			'global_auto_embed_form_priority' => 10,
			'sort_results_by_votes'           => false,
			'calculate_multi_method'          => 'voters',
			'poll_field_description'          => true,
			'poll_field_responses_allow_html' => false,
			'poll_field_show_default'         => 'always',
			'poll_field_show_included'        => true,
			'poll_field_response_default_one' => 'Yes',
			'poll_field_response_default_two' => 'No',

			/* PRO */
			'view_topics_with_polls'          => true,
			'view_my_topics_with_polls'       => true,
			'display_show_response_elements'  => 'full',
			'display_show_voters'             => true,
			'display_show_voters_avatar_size' => 32,
			'display_show_voters_limit'       => 8,
			'display_show_voters_linked'      => false,
			'poll_field_notify_default'       => 'none',
			'poll_field_notify_included'      => false,
			'poll_field_respond_default'      => 'all',
			'poll_field_respond_included'     => true,
			'poll_field_removal_default'      => 'deny',
			'poll_field_removal_included'     => true,
			'buddypress_activity_active'      => false,
			'buddypress_activity_method'      => 'topic_before',
			'buddypress_activity_can_comment' => false,
		),
		'notify'   => array(
			'active'             => true,
			'digest_daily'       => false,
			'vote_instant_roles' => array(),
			'vote_daily_roles'   => array(),
		),
		'objects'  => array(
			'label_poll_singular' => 'Topic Poll',
			'label_poll_plural'   => 'Topic Polls',
		),
	);

	protected function constructor() {
		$this->info = new Information();

		add_action( 'gdpol_load_settings', array( $this, 'init' ), 2 );
	}

	protected function _db() {
		InstallDB::instance()->install();
	}
}
