<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_KnockoutStageCompact extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_knockout_stage_compact', __('hockeydata LOS: Knockout Stage Compact', 'hockeydata_los'), array( 'description' => __( 'Display a compact table view of a knockout stage.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.KnockoutStage.Compact';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-knockoutstage-compact/';
		$this->available_sports = array( 'icehockey' );

	}

	protected function render_form( $options ) {

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Hide Headers', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'hideHeaders' ), 'checked' => $this->get_option( 'hideHeaders', 1 ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text to be displayed if no data is available', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textNoData' ), 'value' => $this->get_option( 'textNoData' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use default columns', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columns' ), 'value' => $this->get_option( 'columns' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'columns'    );
		$this->set_option( $options, 'rowLink'    );
		$this->set_option( $options, 'textNoData' );

		$this->set_option( $options, 'hideHeaders', 0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'columns'    );
		$this->add_hd_los_widget_option( 'textNoData' );

		$this->add_hd_los_widget_option( 'hideHeaders', 'bool' );

		$this->add_hd_los_widget_link_option( 'rowLink', null, 'encounterId=%s&divisionId=%s' );

	}

}