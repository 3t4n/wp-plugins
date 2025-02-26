<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_GameFullReport extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_game_full_report', __('hockeydata LOS: Game Report', 'hockeydata_los'), array( 'description' => __( 'Display a full game report of a specific game.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Game.FullReport';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-game-fullreport/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Game State', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showGameState' ), 'checked' => $this->get_option( 'showGameState', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show YouTube Link (when available)', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showYouTubeLink' ), 'checked' => $this->get_option( 'showYouTubeLink', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Display Game Stats in Tabs', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'tabbedStats' ), 'checked' => $this->get_option( 'tabbedStats', 0 ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Player Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Player Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'playerLink' ), 'value' => $this->get_option( 'playerLink' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Team Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Team Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamLink' ), 'value' => $this->get_option( 'teamLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Fieldplayers', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsFieldPlayers' ), 'value' => $this->get_option( 'additionalColumnsFieldPlayers' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Goalkeepers', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsGoalKeepers' ), 'value' => $this->get_option( 'additionalColumnsGoalKeepers' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Goals', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsGoals' ), 'value' => $this->get_option( 'additionalColumnsGoals' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Player Nation in Lineups', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showPlayerNationInLineups' ), 'checked' => $this->get_option( 'showPlayerNationInLineups', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Player Nation Flag in Lineups', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showPlayerNationFlagInLineups' ), 'checked' => $this->get_option( 'showPlayerNationFlagInLineups', 0 ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumnsFieldPlayers' );
		$this->set_option( $options, 'additionalColumnsGoalKeepers'  );
		$this->set_option( $options, 'additionalColumnsGoals'        );
		$this->set_option( $options, 'playerLink'                    );
		$this->set_option( $options, 'teamLink'                      );

		$this->set_option( $options, 'showGameState',                 0 );
		$this->set_option( $options, 'showPlayerNationInLineups',     0 );
		$this->set_option( $options, 'showPlayerNationFlagInLineups', 0 );
		$this->set_option( $options, 'showYouTubeLink',               0 );
		$this->set_option( $options, 'tabbedStats',                   0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumnsFieldPlayers' );
		$this->add_hd_los_widget_option( 'additionalColumnsGoalKeepers'  );
		$this->add_hd_los_widget_option( 'additionalColumnsGoals'        );

		$this->add_hd_los_widget_option( 'showGameState',                 'bool' );
		$this->add_hd_los_widget_option( 'showPlayerNationInLineups',     'bool' );
		$this->add_hd_los_widget_option( 'showPlayerNationFlagInLineups', 'bool' );
		$this->add_hd_los_widget_option( 'showYouTubeLink',               'bool' );
		$this->add_hd_los_widget_option( 'tabbedStats',                   'bool' );

		$this->add_hd_los_widget_link_option( 'playerLink', 'hd_los_page_player_details', 'playerId=%s&divisionId=%s' );
		$this->add_hd_los_widget_link_option( 'teamLink',   'hd_los_page_team_details',   'teamId=%s&divisionId=%s'   );

	}

}