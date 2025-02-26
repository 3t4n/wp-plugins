<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_Standings extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_standings', __('hockeydata LOS: Standings', 'hockeydata_los'), array( 'description' => __( 'Display standings of a round robin division.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.Standings';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-standings/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );
		$this->has_legend       = true;

	}

	protected function render_form( $options ) {

		$column_sets = array(

			'americanfootball' => array(

				'default'     => __( 'Default',       'hockeydata_los' ),
				'short'       => __( 'Short',         'hockeydata_los' ),
				'long'        => __( 'Long',          'hockeydata_los' ),
				'noMercyRule' => __( 'No Mercy Rule', 'hockeydata_los' )

			),

			'icehockey' => array(

				'default' => __( 'Default', 'hockeydata_los' ),
				'long'    => __( 'Long',    'hockeydata_los' ),
				'tie'     => __( 'Tie',     'hockeydata_los' )

			)

		);

		$this->set_options( $options );

		$this->form_basics();

		$this->additional_options_toggle();

		?>

		<div<?php $this->additional_options_visible(); ?>>

			<?php $this->auto_reload(); ?>

			<?php $this->legend_options(); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Team Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text to be displayed if no data is available', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textNoData' ), 'value' => $this->get_option( 'textNoData' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Columns', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use columns from column set', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'columns' ), 'value' => $this->get_option( 'columns' ) ) ); ?>

			<?php $this->generic_select( array( 'label' => __( 'Column Set', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'columnSet' ), 'value' => $this->get_option( 'columnSet' ), 'options' => $column_sets[ get_option( 'hd_los_sport' ) ] ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Additional Columns', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'additionalColumns' ), 'value' => $this->get_option( 'additionalColumns' ) ) ); ?>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Official Status Text', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showOfficialStatusText' ), 'field_id' => $this->get_field_id( 'showOfficialStatusText' ), 'checked' => $this->get_option( 'showOfficialStatusText', 0 ), 'onchange' => 'jQuery( this ).parent().parent().next().fadeToggle(); return false;' ) ); ?>

			<div<?php if ( ! $this->get_option( 'showOfficialStatusText', 0 ) ) { ?> style="display: none;" <?php } ?>>

				<?php $this->generic_text( array( 'label' => __( 'Text for "Official"', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textOfficial' ), 'value' => $this->get_option( 'textOfficial' ) ) ); ?>

				<?php $this->generic_text( array( 'label' => __( 'Text for "Unofficial"', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'textUnofficial' ), 'value' => $this->get_option( 'textUnofficial' ) ) ); ?>

			</div>

			<?php $this->additional_widget_options(); ?>

			<?php $this->doc_link(); ?>

		</div>

		<?php

	}

	public function update_additional_options( $options ) {

		$this->set_option( $options, 'additionalColumns' );
		$this->set_option( $options, 'columns'           );
		$this->set_option( $options, 'columnSet'         );
		$this->set_option( $options, 'rowLink'           );
		$this->set_option( $options, 'textNoData'        );
		$this->set_option( $options, 'textOfficial'      );
		$this->set_option( $options, 'textUnofficial'    );

		$this->set_option( $options, 'showOfficialStatusText', 0 );

	}

	protected function set_hd_los_widget_options() {

		$this->add_hd_los_widget_option( 'additionalColumns' );
		$this->add_hd_los_widget_option( 'columns'           );
		$this->add_hd_los_widget_option( 'columnSet'         );
		$this->add_hd_los_widget_option( 'textNoData'        );
		$this->add_hd_los_widget_option( 'textOfficial'      );
		$this->add_hd_los_widget_option( 'textUnofficial'    );

		$this->add_hd_los_widget_option( 'showOfficialStatusText', 'bool' );

		$this->add_hd_los_widget_link_option( 'rowLink', 'hd_los_page_team_details', 'teamId=%s&divisionId=%s' );

	}

}