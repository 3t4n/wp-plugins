<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

class HD_LOS_Widget extends WP_Widget {

	protected $widget_class;
	protected $doc_link;
	protected $has_legend;
	protected $options;
	protected $hd_los_widget_options;
	protected $available_sports;

	function __construct( $id_base, $name, $widget_options ) {

		parent::__construct( $id_base, $name, $widget_options );

		$this->options               = array();
		$this->hd_los_widget_options = array();

	}

	protected function set_options( $options ) {

		$this->options = is_array( $options ) ? $options : array();

	}

	protected function get_option( $option_name, $default = '' ) {

		return isset( $this->options[ $option_name ] ) ? ( is_int( $default ) ? intval( $this->options[ $option_name ] ) : $this->options[ $option_name ] ) : $default;

	}

	protected function set_option( $options, $option_name, $default = '' ) {

		$this->options[ $option_name ] = ( isset( $options[ $option_name ] ) ) ? ( is_int( $default ) ? intval( $options[ $option_name ] ) : strip_tags( $options[ $option_name ] ) ) : $default;

	}

	public function form( $options ) {

		$option_sport = get_option( 'hd_los_sport' );

		if ( ! get_option( 'hd_los_api_key' ) || ! $option_sport ) {

			printf( '<p>' . __( 'Please enter your API key and select a sport in the %s.', 'hockeydata_los' ) . '</p>', '<a href="' . menu_page_url( 'hockeydata_los_settings', false ) . '">' . __( 'hockeydata LOS settings', 'hockeydata_los' ) . '</a>' );

		} else if ( ! $this->available_for_sport( $option_sport ) ) {

			echo '<p>' . __( 'This widget is not available for the selected sport.', 'hockeydata_los' ) . '</p>';

		} else {

			echo $this->render_form( $options );

		}

	}

	private function available_for_sport( $sport ) {

		return is_array( $this->available_sports ) && in_array( $sport, $this->available_sports );

	}

	protected function render_form( $options ) {}

	protected function form_basics() {

		$this->generic_text( array( 'label' => __( 'Title', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'title' ), 'value' => $this->get_option( 'title' ) ) );

		$this->division_option();

	}

	private function str( $str ) {

		echo str_replace( '"', '&quot;', $str );

	}

	protected function generic_text( $options ) {

		?>

		<p>

			<label>

				<?php echo $options[ 'label' ]; ?>

				<input type="text" name="<?php echo $options[ 'field_name' ]; ?>" value="<?php $this->str( $options[ 'value' ] ); ?>" class="widefat">

			</label>

		</p>

		<?php

	}

	protected function generic_checkbox( $options ) {

		?>

		<p>

			<label>

				<input type="checkbox" name="<?php echo $options[ 'field_name' ]; ?>"<?php if ( array_key_exists( 'field_id', $options ) ) {  ?> id="<?php echo $options[ 'field_id' ]; ?>"<?php } ?> value="1"<?php if ( isset( $options[ 'checked' ] ) && $options[ 'checked' ] ) { ?> checked="checked"<?php } ?><?php if ( isset( $options[ 'onchange' ] ) && $options[ 'onchange' ] ) { ?> onchange="<?php echo $options[ 'onchange' ]; ?>"<?php } ?>>

				<?php echo $options[ 'label' ]; ?>

			</label>

		</p>

		<?php

	}

	protected function generic_select( $options ) {

		?>

		<p<?php if ( array_key_exists( 'id', $options ) ) {  ?> id="<?php echo $options[ 'id' ]; ?>"<?php } ?><?php if ( array_key_exists( 'class', $options ) ) {  ?> class="<?php echo $options[ 'class' ]; ?>"<?php } ?><?php if ( array_key_exists( 'hidden', $options ) && $options[ 'hidden' ] ) {  ?> style="display: none;"<?php } ?>>

			<label>

				<?php echo $options[ 'label' ]; ?>

				<select name="<?php echo $options[ 'field_name' ]; ?>"<?php if ( array_key_exists( 'field_id', $options ) ) {  ?> id="<?php echo $options[ 'field_id' ]; ?>"<?php } ?> class="widefat<?php if ( array_key_exists( 'field_class', $options ) ) {  ?> <?php echo $options[ 'field_class' ]; ?><?php } ?>">

					<?php foreach ( $options[ 'options' ] as $value => $label ) { ?>

						<option value="<?php echo $value; ?>"<?php if ( $options[ 'value' ] === $value ) { ?> selected="selected" <?php } ?>><?php echo $label; ?></option>

					<?php } ?>

				</select>

			</label>

		</p>

		<?php

	}

	protected function additional_widget_options() {

		?>

		<p>

			<label>

				<?php _e( 'Additional Widget Options', 'hockeydata_los' ); ?>

				<small><?php _e( 'Optionally add additional widget options as JSON-string which are not defineable above. E.g. { "widgetOption": "value" }', 'hockeydata_los' ); ?></small>

				<input type="text" name="<?php echo $this->get_field_name( 'additionalWidgetOptions' ); ?>" value="<?php $this->str( $this->get_option( 'additionalWidgetOptions' ) ); ?>" class="widefat">

			</label>

		</p>

		<?php

	}

	protected function division_option() {

		$option_divisions = json_decode( get_option( 'hd_los_divisions' ), true );
		$division_alias   = $this->get_option( 'divisionAlias' );

		?>

		<hr>

		<strong><?php _e( 'Division', 'hockeydata_los' ); ?></strong> <small>(<?php _e( 'leave empty to use URL parameter', 'hockeydata_los' ); ?>)</small>

		<p>

			<label>

				<?php _e( 'Division', 'hockeydata_los' ); ?>

				[<a href="<?php menu_page_url( 'hockeydata_los_settings' ); ?>&amp;tab=divisions"><?php _e( 'Manage Divisions', 'hockeydata_los' ); ?></a>]

				<select name="<?php echo $this->get_field_name( 'divisionAlias' ); ?>" class="widefat" onchange="hdLosSelectDivision( this );">

					<option value=""<?php if ( ! $division_alias ) { ?> selected="selected" <?php } ?>><?php _e( 'Manual (enter below)', 'hockeydata_los' ); ?></option>

					<optgroup label="<?php _e( '... or select an Alias', 'hockeydata_los' ); ?>">

						<?php

						if ( is_array( $option_divisions ) ) {

							usort( $option_divisions, function( $a, $b ) {

								return strcmp( $a[ 'alias' ], $b[ 'alias' ] );

							} );

							foreach ( $option_divisions as $option_division ) {

								?>

								<option value="<?php echo $option_division[ 'id' ]; ?>"<?php if ( $option_division[ 'id' ] === $division_alias ) { ?> selected="selected" <?php } ?>><?php echo $option_division[ 'alias' ]; ?></option>

								<?php

							}
						}

						?>

					</optgroup>

				</select>

			</label>

		</p>

		<p<?php if ( $division_alias ) { ?> style="display: none;"<?php } ?>>

			<label>

				<?php _e( 'Division-Id, Permalink or a JSON-string to automatically create a Division Picker', 'hockeydata_los' ); ?>

				[<a href="https://apidocs.hockeydata.net/division-finder/?apiKey=<?php echo get_option( 'hd_los_api_key' ); ?>" target="_blank"><?php _e( 'Find Division', 'hockeydata_los' ); ?></a>]

				[<a href="https://apidocs.hockeydata.net/javascript-api/hockeydata-los-divisionpicker/" target="_blank"><?php _e( 'JSON-string format', 'hockeydata_los' ); ?></a>]

				<input type="text" name="<?php echo $this->get_field_name( 'divisionId' ); ?>" value="<?php $this->str( $this->get_option( 'divisionId' ) ); ?>" class="widefat">

			</label>

		</p>

		<hr>

		<?php

	}

	protected function page_select( $options ) {

		?>

		<p>

			<label>

				<?php echo $options[ 'label' ]; ?>

				<?php
				wp_dropdown_pages( array(
					'name'             => $options[ 'field_name' ],
					'selected'         => $options[ 'value' ],
					'show_option_none' => ' ',
					'class'            => 'widefat'
				) );
				?>

			</label>

		</p>

		<?php

	}

	protected function doc_link() {

		?><p><a href="<?php echo $this->doc_link; ?>" target="_blank">&raquo; <?php _e( 'More information about this widget and its options is available on the API documentation website.', 'hockeydata_los' ); ?></a></p><?php

	}

	protected function additional_options_toggle() {

		$visible = intval( $this->get_option( 'additionalOptionsVisible', 0 ) );

		?>

		<p>

			<a href="#" onclick="hdLosToggleAdditionalOptions( this ); return false;">

				<span<?php if ( $visible ) { ?> style="display: none"<?php }?>><?php _e( 'Show Additional Options', 'hockeydata_los' ); ?></span>

				<span<?php if ( ! $visible ) { ?> style="display: none"<?php }?>><?php _e( 'Hide Additional Options', 'hockeydata_los' ); ?></span>

			</a>

			<input type="hidden" name="<?php echo $this->get_field_name( 'additionalOptionsVisible' ); ?>" value="<?php echo $visible; ?>">

		</p>

		<?php

	}

	protected function additional_options_visible() {

		if ( ! intval( $this->get_option( 'additionalOptionsVisible', 0 ) ) ) {

			?> style="display: none;"<?php

		}

	}

	protected function legend_options() {

		$this->generic_checkbox( array( 'label' => __( 'Show Legend', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'showLegend' ), 'field_id' => $this->get_field_id( 'showLegend' ), 'checked' => $this->get_option( 'showLegend', 0 ), 'onchange' => 'jQuery( this ).parent().parent().next().fadeToggle(); return false;' ) );

		?>

		<div<?php if ( ! $this->get_option( 'showLegend', 0 ) ) { ?> style="display: none;" <?php } ?>>

			<?php $this->generic_checkbox( array( 'label' => __( 'Show Legend automatically', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'autoShowLegend' ), 'checked' => $this->get_option( 'autoShowLegend', 0 ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text for "Show Legend"', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'showLegendText' ), 'value' => $this->get_option( 'showLegendText' ) ) ); ?>

			<?php $this->generic_text( array( 'label' => __( 'Text for "Hide Legend"', 'hockeydata_los' ) . ' <small>(' . __( 'optional', 'hockeydata_los' ) . ')</small>', 'field_name' => $this->get_field_name( 'hideLegendText' ), 'value' => $this->get_option( 'hideLegendText' ) ) ); ?>

		</div>

		<?php

	}

	protected function auto_reload() {

		$this->generic_checkbox( array( 'label' => __( 'Auto Reload', 'hockeydata_los' ), 'field_name' => $this->get_field_name( 'autoReload' ), 'checked' => $this->get_option( 'autoReload', 0 ) ) );

	}

	public function update( $options, $old_options ) {

		$this->set_option( $options, 'additionalOptionsVisible', 0 );
		$this->set_option( $options, 'autoReload',               0 );

		$this->set_option( $options, 'additionalWidgetOptions' );
		$this->set_option( $options, 'divisionId'              );
		$this->set_option( $options, 'divisionAlias'           );
		$this->set_option( $options, 'title'                   );

		if ( $this->has_legend ) {

			$this->set_option( $options, 'showLegendText' );
			$this->set_option( $options, 'hideLegendText' );

			$this->set_option( $options, 'autoShowLegend', 0 );
			$this->set_option( $options, 'showLegend',     0 );

		}

		$this->update_additional_options( $options );

		return $this->options;

	}

	protected function update_additional_options ( $options ) {}

	public function widget( $args, $options ) {

		echo $this->render( $options );

	}

	public function render( $options ) {

		if ( ! get_option( 'hd_los_api_key' ) || ! get_option( 'hd_los_sport'   ) ) {

			return '<p>' . __( 'This widget cannot be displayed.', 'hockeydata_los' ) . ' ' . __( 'If you are the administrator of this site, please check the hockeydata LOS settings.', 'hockeydata_los' ) . '</p>';

		}

		$this->set_options( $options );

		$this->options[ 'widget_class' ] = $this->widget_class;

		$this->convert_shortcode_options();

		$this->set_basic_hd_los_widget_options();

		$this->check_division_alias();

		$this->set_hd_los_widget_options();

		$this->add_additional_hd_los_widget_options();

		$this->convert_to_division_picker();

		ob_start();

		?>

		<aside class="widget">

			<?php if ( isset( $this->options[ 'title' ] ) && $this->options[ 'title' ] ) { ?><h1 class="widget-title"><?php echo $this->options[ 'title' ]; ?></h1><?php } ?>

			<div data-hd-widget="<?php echo $this->options[ 'widget_class' ]; ?>" data-hd-widget-options='<?php echo json_encode( $this->hd_los_widget_options ); ?>'></div>

		</aside>

		<?php

		return ob_get_clean();

	}

	protected function set_hd_los_widget_options() {}

	protected function get_hd_los_widget_option( $option_name, $validate = null ) {

		if ( isset( $this->options[ $option_name ] ) && ( $this->options[ $option_name ] || 'bool' === $validate ) ) {

			switch ( $validate ) {

				case 'bool':

					return intval( $this->options[ $option_name ] ) ? true : false;

				case 'int':

					return intval( $this->options[ $option_name ] );

				default:

					return $this->options[ $option_name ];

			}

		}

		return null;

	}

	protected function add_hd_los_widget_option( $option_name, $validate = null ) {

		$val = $this->get_hd_los_widget_option( $option_name, $validate );

		if ( null !== $val ) {

			$this->hd_los_widget_options[ $option_name ] = $val;

		}

	}

	protected function add_hd_los_widget_link_option( $option_name, $setting_name, $url_parameters ) {

		$page_id = ( ( isset( $this->options[ $option_name ] ) && $this->options[ $option_name ] ) ? $this->options[ $option_name ] : ( $setting_name ? get_option( $setting_name ) : null ) );

		if ( $page_id ) {

			$permalink                                   = get_permalink( $page_id );
			$this->hd_los_widget_options[ $option_name ] = $permalink . ( strpos( $permalink, '?' ) === false ? '?' : '&' ) . $url_parameters;

		}

	}

	private function convert_to_division_picker() {

		$division_id = json_decode( $this->hd_los_widget_options[ 'divisionId' ], true );

		if ( is_array( $division_id ) ) {

			$hd_los_widget_options = array();

			$hd_los_widget_options[ 'apiKey'     ] = $this->hd_los_widget_options[ 'apiKey'     ];
			$hd_los_widget_options[ 'sport'      ] = $this->hd_los_widget_options[ 'sport'      ];
			$hd_los_widget_options[ 'autoReload' ] = $this->hd_los_widget_options[ 'autoReload' ];
			$hd_los_widget_options[ 'widget'     ] = $this->options[ 'widget_class' ];
			$hd_los_widget_options[ 'divisions'  ] = $division_id;

			unset( $this->hd_los_widget_options[ 'divisionId' ] );
			unset( $this->hd_los_widget_options[ 'apiKey'     ] );
			unset( $this->hd_los_widget_options[ 'autoReload' ] );
			unset( $this->hd_los_widget_options[ 'sport'      ] );

			$hd_los_widget_options[ 'widgetOptions' ] = $this->hd_los_widget_options;
			$this->hd_los_widget_options              = $hd_los_widget_options;
			$this->options[ 'widget_class' ]          = 'hockeydata.los.DivisionPicker';

		}

	}

	private function set_basic_hd_los_widget_options() {

		$this->hd_los_widget_options = array();

		$this->hd_los_widget_options[ 'apiKey'     ] = get_option( 'hd_los_api_key' );
		$this->hd_los_widget_options[ 'sport'      ] = get_option( 'hd_los_sport'   );
		$this->hd_los_widget_options[ 'divisionId' ] = isset( $this->options[ 'divisionId' ] ) ? $this->options[ 'divisionId' ] : '';
		$this->hd_los_widget_options[ 'autoReload' ] = ( isset( $this->options[ 'autoReload' ] ) ? intval( $this->options[ 'autoReload' ] ) : 0 ) ? true : false;

		if ( $this->has_legend ) {

			$this->add_hd_los_widget_option( 'hideLegendText' );
			$this->add_hd_los_widget_option( 'showLegendText' );

			$this->add_hd_los_widget_option( 'autoShowLegend', 'bool' );
			$this->add_hd_los_widget_option( 'showLegend',     'bool' );

		}

	}

	private function check_division_alias() {

		$division_alias = $this->get_hd_los_widget_option( 'divisionAlias' );

		if ( $division_alias ) {

			$option_divisions = json_decode( get_option( 'hd_los_divisions' ), true );

			if ( is_array( $option_divisions ) ) {

				foreach ( $option_divisions as $option_division ) {

					if ( $option_division[ 'id' ] === $division_alias ) {

						$this->hd_los_widget_options[ 'divisionId' ] = $option_division[ 'value' ];

						return;

					}

				}

			}

		}

	}

	private function add_additional_hd_los_widget_options() {

		if ( isset( $this->options[ 'additionalWidgetOptions' ] ) && $this->options[ 'additionalWidgetOptions' ] ) {

			$additionalWidgetOptions = json_decode( $this->options[ 'additionalWidgetOptions' ], true );

			if ( is_array( $additionalWidgetOptions ) ) {

				$this->hd_los_widget_options = array_merge( $this->hd_los_widget_options, $additionalWidgetOptions );

			}

		}

	}

	private function convert_shortcode_options() {

		$dict = array(

			'additional-columns'                    => 'additionalColumns',
			'additional-columns-field-player-games' => 'additionalColumnsFieldPlayerGames',
			'additional-columns-games'              => 'additionalColumnsGames',
			'additional-columns-goal-keeper-games'  => 'additionalColumnsGoalKeeperGames',
			'additional-columns-goals'              => 'additionalColumnsGoals',
			'additional-options'                    => 'additionalOptions',
			'additional-widget-options'             => 'additionalWidgetOptions',
			'auto-reload'                           => 'autoReload',
			'auto-show-legend'                      => 'autoShowLegend',
			'calculate-total-score'                 => 'calculateTotalScore',
			'column-set'                            => 'columnSet',
			'division-id'                           => 'divisionId',
			'division-alias'                        => 'divisionAlias',
			'future-only'                           => 'futureOnly',
			'game-id'                               => 'gameId',
			'game-link'                             => 'gameLink',
			'games-per-group'                       => 'gamesPerGroup',
			'hide-legend-text'                      => 'hideLegendText',
			'max-date'                              => 'maxDate',
			'min-date'                              => 'minDate',
			'player-link'                           => 'playerLink',
			'row-link'                              => 'rowLink',
			'show-division-name'                    => 'showDivisionName',
			'show-game-state'                       => 'showGameState',
			'show-legend'                           => 'showLegend',
			'show-legend-text'                      => 'showLegendText',
			'show-live-time'                        => 'showLiveTime',
			'show-official-status-text'             => 'showOfficialStatusText',
			'show-period-bar'                       => 'showPeriodBar',
			'show-ranking'                          => 'showRanking',
			'show-team-facts'                       => 'showTeamFacts',
			'show-team-short-name'                  => 'showTeamShortName',
			'show-youtube-link'                     => 'showYouTubeLink',
			'text-no-data'                          => 'textNoData',
			'tabbed-stats'                          => 'tabbedStats',
			'team-id'                               => 'teamId',
			'team-link'                             => 'teamLink',
			'team-name'                             => 'teamName',
			'text-official'                         => 'textOfficial',
			'text-unofficial'                       => 'textUnofficial'

		);

		foreach ( $dict as $key => $value ) {

			if ( array_key_exists( $key, $this->options ) ) {

				$this->options[ $value ] = $this->options[ $key ];

			}

		}

	}

}