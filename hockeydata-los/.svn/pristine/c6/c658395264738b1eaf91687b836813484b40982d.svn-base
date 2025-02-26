<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_KnockoutStage extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_knockout_stage', __('hockeydata LOS: Knockout Stage', 'hockeydata_los'), array( 'description' => __( 'Display a playoff tree of a knockout stage.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.KnockoutStage';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-knockoutstage/';
		$this->available_sports = array( 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->page_select( array( 'label' => __( 'Team Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Team Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamLink' ), 'value' => $this->get_option( 'teamLink' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Hide Game Headers', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'hideGameHeaders' ), 'checked' => $this->get_option( 'hideGameHeaders', 1 ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns Games', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use default columns', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columnsGames' ), 'value' => $this->get_option( 'columnsGames' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Calculate Total Score', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'calculateTotalScore' ), 'checked' => $this->get_option( 'calculateTotalScore', 0 ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'columnsGames' );
		$this->set_option( $options, 'gameLink'     );
		$this->set_option( $options, 'teamLink'     );

		$this->set_option( $options, 'hideGameHeaders',     1 );
		$this->set_option( $options, 'calculateTotalScore', 0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'columnsGames' );

		$this->add_hd_los_widget_option( 'hideGameHeaders',     'bool' );
		$this->add_hd_los_widget_option( 'calculateTotalScore', 'bool' );

		$this->add_hd_los_widget_link_option( 'gameLink', 'hd_los_page_game_report',  'gameId=%s&divisionId=%s' );
		$this->add_hd_los_widget_link_option( 'teamLink', 'hd_los_page_team_details', 'teamId=%s&divisionId=%s' );

	}

}