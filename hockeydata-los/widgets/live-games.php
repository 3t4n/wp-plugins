<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_LiveGames extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_live_games', __('hockeydata LOS: Live Games', 'hockeydata_los'), array( 'description' => __( 'Display compact game boxes of current live games.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.LiveGames';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-live-games/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Game State', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showGameState' ), 'checked' => $this->get_option( 'showGameState', 1 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show next Games if none are live', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showNextGames' ), 'checked' => $this->get_option( 'showNextGames', 1 ), 'onchange' => 'jQuery( this ).parent().parent().next().fadeToggle(); return false;' ) ); ?>

			<div<?php if ( ! $this->get_option( 'showNextGames', 1 ) ) { ?> style="display: none;" <?php } ?>>

				<?php $this->generic_text( array( 'label' => __( 'Maximum Number of next Games to be displayed', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'nextGamesCount' ), 'value' => $this->get_option( 'nextGamesCount', '6' ) ) ); ?>

			</div>

			<?php $this->page_select( array( 'label' => __( 'Game Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'gameLink' ), 'value' => $this->get_option( 'gameLink' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'gameLink'       );
		$this->set_option( $options, 'nextGamesCount' );

		$this->set_option( $options, 'showGameState', 0 );
		$this->set_option( $options, 'showNextGames', 0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'showGameState', 'bool' );
		$this->add_hd_los_widget_option( 'showNextGames', 'bool' );

		$this->add_hd_los_widget_option( 'nextGamesCount', 'int' );

		$this->add_hd_los_widget_link_option( 'gameLink', 'hd_los_page_game_report', 'gameId=%s&divisionId=%s' );

	}

}