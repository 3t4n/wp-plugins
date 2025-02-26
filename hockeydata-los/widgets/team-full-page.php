<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_TeamFullPage extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_team_full_page', __('hockeydata LOS: Team Page', 'hockeydata_los'), array( 'description' => __( 'Display a full stats page of a specific team.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Team.FullPage';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-team-fullpage/';
		$this->available_sports = array( 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Team Facts', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showTeamFacts' ), 'checked' => $this->get_option( 'showTeamFacts', 0 ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Player Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Player Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'playerLink' ), 'value' => $this->get_option( 'playerLink' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Player Nation in Roster Overview', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showPlayerNationInRosterOverview' ), 'checked' => $this->get_option( 'showPlayerNationInRosterOverview', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Player Nation Flag in Roster Overview', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showPlayerNationFlagInRosterOverview' ), 'checked' => $this->get_option( 'showPlayerNationFlagInRosterOverview', 0 ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Games', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsGames' ), 'value' => $this->get_option( 'additionalColumnsGames' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Goalkeeper Stats', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsGoalkeeperStats' ), 'value' => $this->get_option( 'additionalColumnsGoalkeeperStats' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Player Stats', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsPlayerStats' ), 'value' => $this->get_option( 'additionalColumnsPlayerStats' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns Roster Details', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumnsRosterDetails' ), 'value' => $this->get_option( 'additionalColumnsRosterDetails' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumnsGames'           );
		$this->set_option( $options, 'additionalColumnsGoalkeeperStats' );
		$this->set_option( $options, 'additionalColumnsPlayerStats'     );
		$this->set_option( $options, 'additionalColumnsRosterDetails'   );
		$this->set_option( $options, 'gameLink'                         );
		$this->set_option( $options, 'playerLink'                       );

		$this->set_option( $options, 'showTeamFacts',                        0 );
		$this->set_option( $options, 'showPlayerNationInRosterOverview',     0 );
		$this->set_option( $options, 'showPlayerNationFlagInRosterOverview', 0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumnsGames'           );
		$this->add_hd_los_widget_option( 'additionalColumnsGoalkeeperStats' );
		$this->add_hd_los_widget_option( 'additionalColumnsPlayerStats'     );
		$this->add_hd_los_widget_option( 'additionalColumnsRosterDetails'   );

		$this->add_hd_los_widget_option( 'showTeamFacts',                        'bool' );
		$this->add_hd_los_widget_option( 'showPlayerNationInRosterOverview',     'bool' );
		$this->add_hd_los_widget_option( 'showPlayerNationFlagInRosterOverview', 'bool' );

		$this->add_hd_los_widget_link_option( 'gameLink',   'hd_los_page_game_report',    'gameId=%s&divisionId=%s'   );
		$this->add_hd_los_widget_link_option( 'playerLink', 'hd_los_page_player_details', 'playerId=%s&divisionId=%s' );

	}

}