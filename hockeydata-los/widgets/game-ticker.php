<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_GameTicker extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_game_ticker', __('hockeydata LOS: Game Ticker', 'hockeydata_los'), array( 'description' => __( 'Display multiple games in a game ticker.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.GameTicker';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-gameticker/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle(); ?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Team Logo', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showTeamLogo' ), 'checked' => $this->get_option( 'showTeamLogo', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Team Short Name', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showTeamShortName' ), 'checked' => $this->get_option( 'showTeamShortName', 1 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Broadcasters', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showBroadcasters' ), 'checked' => $this->get_option( 'showBroadcasters', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Scroll', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'scroll' ), 'checked' => $this->get_option( 'scroll', 1 ), 'onchange' => 'jQuery( this ).parent().parent().next().fadeToggle(); return false;' ) ); ?>

			<div<?php if ( ! $this->get_option( 'scroll', 1 ) ) { ?> style="display: none;" <?php } ?>>

				<?php $this->generic_text( array( 'label' => __( 'Offset', 'hockeydata_los' ) . ' <small>(' . __( 'Time in Milliseconds to wait before starting to scroll, leave empty to start immediately', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'offset' ), 'value' => $this->get_option( 'offset' ) ) ); ?>

			</div>

			<?php $this->generic_text( array( 'label' => __( 'Speed', 'hockeydata_los' ) . ' <small>(' . __( 'Scroll Speed if Scrolling is activated, otherwise the Time in Seconds how long each Game is displayed', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'speed' ), 'value' => $this->get_option( 'speed', '5' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show future Games only', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'futureOnly' ), 'checked' => $this->get_option( 'futureOnly', 0 ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Maximum Number of Games to be displayed', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to display all', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'limit' ), 'value' => $this->get_option( 'limit' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'gameLink' );
		$this->set_option( $options, 'limit'    );
		$this->set_option( $options, 'offset'   );
		$this->set_option( $options, 'speed'    );

		$this->set_option( $options, 'futureOnly',        0 );
		$this->set_option( $options, 'scroll',            0 );
		$this->set_option( $options, 'showBroadcasters',  0 );
		$this->set_option( $options, 'showTeamLogo',      0 );
		$this->set_option( $options, 'showTeamShortName', 0 );

		return $this->options;

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'futureOnly',        'bool' );
		$this->add_hd_los_widget_option( 'scroll',            'bool' );
		$this->add_hd_los_widget_option( 'showBroadcasters',  'bool' );
		$this->add_hd_los_widget_option( 'showTeamLogo',      'bool' );
		$this->add_hd_los_widget_option( 'showTeamShortName', 'bool' );

		$this->add_hd_los_widget_option( 'limit',  'int' );
		$this->add_hd_los_widget_option( 'offset', 'int' );
		$this->add_hd_los_widget_option( 'speed',  'int' );

		$this->add_hd_los_widget_link_option( 'gameLink', 'hd_los_page_game_report', 'gameId=%s&divisionId=%s' );

	}

}