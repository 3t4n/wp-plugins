<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_Leaders extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_leaders', __('hockeydata LOS: Leaders', 'hockeydata_los'), array( 'description' => __( 'Display a table with leaders of a specific type.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Leaders';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-leaders/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );
		$this->has_legend       = true;

	}

	protected function render_form( $options ) {

		$types = array(

			'americanfootball' => array(

				'Defense'   => __( 'Defense',   'hockeydata_los' ),
				'Passing'   => __( 'Passing',   'hockeydata_los' ),
				'Receiving' => __( 'Receiving', 'hockeydata_los' ),
				'Rushing'   => __( 'Rushing',   'hockeydata_los' )

			),

			'icehockey' => array(

				'BadBoys'      => __( 'Bad Boys',      'hockeydata_los' ),
				'FieldPlayers' => __( 'Field Players', 'hockeydata_los' ),
				'Goalkeepers'  => __( 'Goal Keepers',  'hockeydata_los' )

			)

		);

		$this->set_options( $options );

		$this->form_basics();

		$this->generic_select( array( 'label' => __( 'Type', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'type' ), 'value' => $this->get_option( 'type' ), 'options' => $types[ get_option( 'hd_los_sport' ) ] ) );

		$this->generic_checkbox( array( 'label' => __( 'Show Ranking', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showRanking' ), 'checked' => $this->get_option( 'showRanking', 0 ) ) );

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Enable Player Cards', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'enablePlayerCards' ), 'checked' => $this->get_option( 'enablePlayerCards', 0 ) ) ); ?>

			<?php $this->legend_options(); ?>

			<?php $this->generic_text( array( 'label' => __( 'Maximum Number of Players to be displayed', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to display all', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'limit' ), 'value' => $this->get_option( 'limit' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Offset to begin with', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to start with first row', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'offset' ), 'value' => $this->get_option( 'offset' ) ) ); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Player Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text to be displayed if no data is available', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textNoData' ), 'value' => $this->get_option( 'textNoData' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use default columns', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columns' ), 'value' => $this->get_option( 'columns' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumns' ), 'value' => $this->get_option( 'additionalColumns' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Team Id', 'hockeydata_los' ) . ' <small>(' . __( 'if set only Players of this Team are displayed', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'teamId' ), 'value' => $this->get_option( 'teamId' ) ) ); ?>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumns' );
		$this->set_option( $options, 'columns'           );
		$this->set_option( $options, 'limit'             );
		$this->set_option( $options, 'offset'            );
		$this->set_option( $options, 'rowLink'           );
		$this->set_option( $options, 'teamId'            );
		$this->set_option( $options, 'textNoData'        );
		$this->set_option( $options, 'type'              );

		$this->set_option( $options, 'enablePlayerCards', 0 );
		$this->set_option( $options, 'showRanking',       0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumns' );
		$this->add_hd_los_widget_option( 'columns'           );
		$this->add_hd_los_widget_option( 'textNoData'        );
		$this->add_hd_los_widget_option( 'type'              );

		$this->add_hd_los_widget_option( 'enablePlayerCards', 'bool' );
		$this->add_hd_los_widget_option( 'showRanking',       'bool' );

		$this->add_hd_los_widget_option( 'limit',  'int' );
		$this->add_hd_los_widget_option( 'offset', 'int' );
		$this->add_hd_los_widget_option( 'teamId', 'int' );

		$this->add_hd_los_widget_link_option( 'rowLink', 'hd_los_page_player_details', 'playerId=%s&divisionId=%s' );

	}

}