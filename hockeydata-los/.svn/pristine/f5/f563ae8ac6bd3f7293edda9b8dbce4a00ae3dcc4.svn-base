<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_Players extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_players', __('hockeydata LOS: Players', 'hockeydata_los'), array( 'description' => __( 'Display all players of a season with their basic data in table view.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Players';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-players/';
		$this->available_sports = array( 'icehockey' );
		$this->has_legend       = true;

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		/*
		 * additionalColumns
		 * columns
		 * rowLink
		 * textNoData
		 */

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->legend_options(); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Player Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text to be displayed if no data is available', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textNoData' ), 'value' => $this->get_option( 'textNoData' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use default columns', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columns' ), 'value' => $this->get_option( 'columns' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumns' ), 'value' => $this->get_option( 'additionalColumns' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumns' );
		$this->set_option( $options, 'columns'           );
		$this->set_option( $options, 'rowLink'           );
		$this->set_option( $options, 'textNoData'        );

		return $this->options;

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumns' );
		$this->add_hd_los_widget_option( 'columns'           );
		$this->add_hd_los_widget_option( 'textNoData'        );

		$this->add_hd_los_widget_link_option( 'rowLink', 'hd_los_page_player_details', 'playerId=%s&divisionId=%s' );

	}

}