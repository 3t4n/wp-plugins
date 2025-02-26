<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_PlayerFullPage extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_player_full_page', __('hockeydata LOS: Player Page', 'hockeydata_los'), array( 'description' => __( 'Display a full stats page of a specific player.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Player.FullPage';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-player-fullpage/';
		$this->available_sports = array( 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Team Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Team Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamLink' ), 'value' => $this->get_option( 'teamLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Fieldplayer Games', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsFieldPlayerGames' ), 'value' => $this->get_option( 'additionalColumnsFieldPlayerGames' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Goalkeeper Games', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsGoalKeeperGames' ), 'value' => $this->get_option( 'additionalColumnsGoalKeeperGames' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Fields Player Facts', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalFieldsPlayerFacts' ), 'value' => $this->get_option( 'additionalFieldsPlayerFacts' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Rows Fieldplayer Stats', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalRowsFieldPlayerStats' ), 'value' => $this->get_option( 'additionalRowsFieldPlayerStats' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumnsFieldPlayerGames' );
		$this->set_option( $options, 'additionalColumnsGoalKeeperGames'  );
		$this->set_option( $options, 'additionalFieldsPlayerFacts'       );
		$this->set_option( $options, 'additionalRowsFieldPlayerStats'    );
		$this->set_option( $options, 'gameLink'                          );
		$this->set_option( $options, 'teamLink'                          );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumnsFieldPlayerGames' );
		$this->add_hd_los_widget_option( 'additionalColumnsGoalKeeperGames'  );
		$this->add_hd_los_widget_option( 'additionalFieldsPlayerFacts'       );
		$this->add_hd_los_widget_option( 'additionalRowsFieldPlayerStats'    );

		$this->add_hd_los_widget_link_option( 'gameLink', 'hd_los_page_game_report',  'gameId=%s&divisionId=%s' );
		$this->add_hd_los_widget_link_option( 'teamLink', 'hd_los_page_team_details', 'teamId=%s&divisionId=%s' );

	}

}