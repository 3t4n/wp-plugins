<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_GameSlider extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_game_slider', __('hockeydata LOS: Game Slider', 'hockeydata_los'), array( 'description' => __( 'Display multiple games in a scrollable slider.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.GameSlider';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-gameslider/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		?>

		<?php $this->generic_text( array( 'label' => __( 'Games per Group', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'gamesPerGroup' ), 'value' => $this->get_option( 'gamesPerGroup', '5' ) ) ); ?>

		<?php $this->additional_options_toggle(); ?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Division Name', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showDivisionName' ), 'checked' => $this->get_option( 'showDivisionName', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Live Time', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showLiveTime' ), 'checked' => $this->get_option( 'showLiveTime', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Period Bar', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showPeriodBar' ), 'checked' => $this->get_option( 'showPeriodBar', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Team Short Name', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showTeamShortName' ), 'checked' => $this->get_option( 'showTeamShortName', 0 ) ) ); ?>

			<?php $this->auto_reload(); ?>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Team Id', 'hockeydata_los' ) . ' <small>(' . __( 'if set only Games of this Team are displayed', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamId' ), 'value' => $this->get_option( 'teamId' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'gamesPerGroup' );
		$this->set_option( $options, 'gameLink'      );
		$this->set_option( $options, 'teamId'        );

		$this->set_option( $options, 'showDivisionName',  0 );
		$this->set_option( $options, 'showLiveTime',      0 );
		$this->set_option( $options, 'showPeriodBar',     0 );
		$this->set_option( $options, 'showTeamShortName', 0 );

		return $this->options;

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'showDivisionName',  'bool' );
		$this->add_hd_los_widget_option( 'showLiveTime',      'bool' );
		$this->add_hd_los_widget_option( 'showPeriodBar',     'bool' );
		$this->add_hd_los_widget_option( 'showTeamShortName', 'bool' );

		$this->add_hd_los_widget_option( 'gamesPerGroup', 'int' );
		$this->add_hd_los_widget_option( 'teamId',        'int' );
 
		$this->add_hd_los_widget_link_option( 'gameLink', 'hd_los_page_game_report', 'gameId=%s&divisionId=%s' );

	}

}