<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget_TeamStats extends HD_LOS_Widget {

	function __construct() {

		parent::__construct( 'hd_los_widget_team_stats', __('hockeydata LOS: Team Stats', 'hockeydata_los'), array( 'description' => __( 'Display a table with team stats of a specific type.', 'hockeydata_los' ) ) );

		$this->widget_class     = 'hockeydata.los.TeamStats';
		$this->doc_link         = 'https://apidocs.hockeydata.net/javascript-api/hockeydata-los-teamstats/';
		$this->available_sports = array( 'americanfootball', 'icehockey' );
		$this->has_legend       = true;

	}

	protected function render_form( $options ) {

		$types = array(

			'americanfootball' => array(

				'DownConversions'  => __( 'Down Conversions',   'hockeydata_los' ),
				'FieldGoals'       => __( 'Field Goals',        'hockeydata_los' ),
				'FirstDowns'       => __( 'First Downs',        'hockeydata_los' ),
				'KickoffCoverage'  => __( 'Kickoff Coverage',   'hockeydata_los' ),
				'KickoffReturns'   => __( 'Kickoff Returns',    'hockeydata_los' ),
				'PassingDefense'   => __( 'Passing Defense',    'hockeydata_los' ),
				'Passing'          => __( 'Passing Offense',    'hockeydata_los' ),
				'PATKicks'         => __( 'PAT Kicks',          'hockeydata_los' ),
				'Penalties'        => __( 'Penalties',          'hockeydata_los' ),
				'PuntReturns'      => __( 'Punt Returns',       'hockeydata_los' ),
				'Punts'            => __( 'Punts',              'hockeydata_los' ),
				'RushingDefense'   => __( 'Rushing Defense',    'hockeydata_los' ),
				'Rushing'          => __( 'Rushing Offense',    'hockeydata_los' ),
				'ScoringDefense'   => __( 'Scoring Defense',    'hockeydata_los' ),
				'Scoring'          => __( 'Scoring Offense',    'hockeydata_los' ),
				'TimeOfPossession' => __( 'Time Of Possession', 'hockeydata_los' ),
				'TotalDefense'     => __( 'Total Defense',      'hockeydata_los' ),
				'TotalOffense'     => __( 'Total Offense',      'hockeydata_los' )

			),

			'icehockey' => array(

				'Attendance'        => __( 'Attendance',         'hockeydata_los' ),
				'Fairplay'          => __( 'Fair Play',          'hockeydata_los' ),
				'Penaltykill'       => __( 'Penalty Killing',    'hockeydata_los' ),
				'Powerplay'         => __( 'Power Play',         'hockeydata_los' ),
				'ScoringEfficiency' => __( 'Scoring Efficiency', 'hockeydata_los' )

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

			<?php $this->legend_options(); ?>

			<?php $this->page_select( array( 'label' => __( 'Row Link', 'hockeydata_los' ) . ' <small>(' . __( 'leave empty to use Team Details Page from settings', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'rowLink' ), 'value' => $this->get_option( 'rowLink' ) ) ); ?>

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
		$this->set_option( $options, 'type'       );

		$this->set_option( $options, 'showRanking', 0 );

	}

	protected function set_hd_los_widget_options() {

		$type = $this->get_hd_los_widget_option( 'type' );

		$defense_identifiers = array(

			'PassingDefense' => 'Passing',
			'RushingDefense' => 'Rushing',
			'ScoringDefense' => 'Scoring',
			'TotalDefense'   => 'TotalOffense'

		);

		$this->add_hd_los_widget_option( 'columns'    );
		$this->add_hd_los_widget_option( 'textNoData' );
		$this->add_hd_los_widget_option( 'type'       );

		$this->add_hd_los_widget_option( 'showRanking', 'bool' );

		$this->add_hd_los_widget_link_option( 'rowLink', 'hd_los_page_team_details', 'teamId=%s&divisionId=%s' );

		if ( array_key_exists( $type, $defense_identifiers ) ) {

			$this->hd_los_widget_options[ 'type'        ] = $defense_identifiers[ $type ];
			$this->hd_los_widget_options[ 'requestData' ] = array( 'widgetOptions' => array( 'offense' => 'false' ) );

		}

	}

}