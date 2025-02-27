<?php
namespace DaReactions;
class Common {
	/**
	 * @return array
	 */
	public static function getDateRangeOptions() {
		return array(
			''            => _x( 'All dates', 'Filter form option label', 'da-reactions' ),
			'today'       => _x( 'Today', 'Filter form option label', 'da-reactions' ),
			'yesterday'   => _x( 'Yesterday', 'Filter form option label', 'da-reactions' ),
			'this-week'   => _x( 'This week', 'Filter form option label', 'da-reactions' ),
			'seven-days'  => _x( 'Last 7 days', 'Filter form option label', 'da-reactions' ),
			'this-month'  => _x( 'This month', 'Filter form option label', 'da-reactions' ),
			'thirty-days' => _x( 'Last 30 days', 'Filter form option label', 'da-reactions' ),
			'sixty-days'  => _x( 'Last 60 days', 'Filter form option label', 'da-reactions' ),
			'ninety-days' => _x( 'Last 90 days', 'Filter form option label', 'da-reactions' ),
			'this-year'   => _x( 'This year', 'Filter form option label', 'da-reactions' ),
			'365-days'    => _x( 'Last 365 days', 'Filter form option label', 'da-reactions' )
		);
	}
	public static function convertDataForChart( $data ) {
		$general_options = Options::getInstance('general');
		$color_generator = $general_options->getOption("chart_colors");
		$chart_data = array(
			'labels'   => array(),
			'datasets' => array(
				array(
					'data'            => array(),
					'backgroundColor' => array()
				)
			)
		);
		foreach ( $data as $i => $iValue ) {
			$chart_data['labels'][]              = $iValue->label;
			$chart_data['datasets'][0]['data'][] = $iValue->total;
			/**
			 * Cannot use match because Freemius validator does not know the statement
			 */
			switch ( $color_generator ) {
				case 'random':
					$chart_data['datasets'][0]['backgroundColor'][] = Utils::generateColorFromString( $iValue->label );
					break;
				case 'default':
					$chart_data['datasets'][0]['backgroundColor'][] = Utils::getDefaultColorByIndex( $i );
					break;
				default:
					$chart_data['datasets'][0]['backgroundColor'][] = $iValue->color;
			}
		}
		return $chart_data;
	}
}