<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_Schedule extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_schedule', __('hockeydata LOS: Schedule', 'hockeydata_los'), array( 'description' => __( 'Display mutliple games in a table view.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Schedule';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-schedule/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );
		$this->has_legend       = true;

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show future Games only', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'futureOnly' ), 'checked' => $this->get_option( 'futureOnly', 0 ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show live Games only', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'liveOnly' ), 'checked' => $this->get_option( 'liveOnly', 0 ) ) ); ?>

			<?php $this->legend_options(); ?>

			<?php $this->generic_text( array( 'label' => __( 'Minimum Date (YYYY-MM-DD)', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'minDate' ), 'value' => $this->get_option( 'minDate' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Maximum Date (YYYY-MM-DD)', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'maxDate' ), 'value' => $this->get_option( 'maxDate' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Maximum Number of Games to be displayed', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to display all', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'limit' ), 'value' => $this->get_option( 'limit' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Game Report Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text to be displayed if no data is available', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textNoData' ), 'value' => $this->get_option( 'textNoData' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use columns from column set', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columns' ), 'value' => $this->get_option( 'columns' ) ) ); ?>

			<?php $this->generic_select( array( 'label' => __( 'Column Set', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'columnSet' ), 'value' => $this->get_option( 'columnSet' ), 'options' => array( 'default' => __( 'Default', 'hockeydata_los' ), 'short' => __( 'Short', 'hockeydata_los' ) ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumns' ), 'value' => $this->get_option( 'additionalColumns' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Team Id', 'hockeydata_los' ) . ' <small>(' . __( 'if set only Games of this Team are displayed', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamId' ), 'value' => $this->get_option( 'teamId' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Team Name', 'hockeydata_los' ) . ' <small>(' . __( 'if set only Games of this Team are displayed, can be Team long or short name', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamName' ), 'value' => $this->get_option( 'teamName' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumns' );
		$this->set_option( $options, 'columns'           );
		$this->set_option( $options, 'columnSet'         );
		$this->set_option( $options, 'limit'             );
		$this->set_option( $options, 'maxDate'           );
		$this->set_option( $options, 'minDate'           );
		$this->set_option( $options, 'rowLink'           );
		$this->set_option( $options, 'teamId'            );
		$this->set_option( $options, 'teamName'          );
		$this->set_option( $options, 'textNoData'        );

		$this->set_option( $options, 'futureOnly', 0 );
		$this->set_option( $options, 'liveOnly',   0 );

		return $this->options;

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumns' );
		$this->add_hd_los_widget_option( 'columns'           );
		$this->add_hd_los_widget_option( 'columnSet'         );
		$this->add_hd_los_widget_option( 'maxDate'           );
		$this->add_hd_los_widget_option( 'minDate'           );
		$this->add_hd_los_widget_option( 'teamName'          );
		$this->add_hd_los_widget_option( 'textNoData'        );

		$this->add_hd_los_widget_option( 'futureOnly', 'bool' );
		$this->add_hd_los_widget_option( 'liveOnly',   'bool' );

		$this->add_hd_los_widget_option( 'limit',  'int' );
		$this->add_hd_los_widget_option( 'teamId', 'int' );

		$this->add_hd_los_widget_link_option( 'rowLink', 'hd_los_page_game_report', 'gameId=%s&divisionId=%s' );

	}

}