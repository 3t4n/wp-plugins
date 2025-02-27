<?php

namespace CounterBox;

defined( 'ABSPATH' ) || exit;

class Script_Maker {
	private array $script;
	/**
	 * @var mixed
	 */
	private $param;
	/**
	 * @var mixed
	 */
	private $id;

	public function __construct( $id, $param ) {
		$this->id     = $id;
		$this->param  = $param;
		$this->script = [];
	}


	public function init(): array {

		$this->script['selector'] = '.counter-box-' . absint( $this->id );
		$this->script['type']     = $this->param['type'];

		$this->main_settings();
		$this->targets();
		$this->style();
		$this->titles();
		$this->actions();

		return $this->script;
	}

	private function main_settings(): void {
		$id    = $this->id;
		$param = $this->param;

		if ( $param['type'] === 'CountToDate' || $param['type'] === 'ContFromDate' || $param['type'] === 'CountToWeekday' ) {

			$this->script['date_options'] = [
				'date'     => ( $param['type'] === 'CountToWeekday' ) ? $param['dayweek'] : $param['date'],
				'time'     => $param['time'],
				'timezone' => $param['timezone'],
			];
		} elseif ( $param['type'] === 'Timer' || $param['type'] === 'UserTimer' || $param['type'] === 'TimerStopGo' ) {
			$this->script['timer_options'] = [
				'day'     => $param['day'],
				'hours'   => $param['hours'],
				'minutes' => $param['minutes'],
				'seconds' => $param['seconds'],
			];
		} elseif ( $param['type'] === 'Counter' ) {
			$this->script['counter_options'] = [
				'start'     => $param['start'],
				'finish'    => $param['finish'],
				'speed'     => [
					'min' => $param['speed_min'],
					'max' => $param['speed_max'],
				],
				'increment' => [
					'min' => $param['increment_min'],
					'max' => $param['increment_max'],
				],
				'round'     => $param['rounding'],
				'delimiter' => empty( $param['delimiter'] ) ? '0' : $param['delimiter'],
				'remember'  => empty( $param['remember'] ) ? '0' : $param['remember'],
			];
		} elseif ( $param['type'] === 'CounterFromDate' || $param['type'] === 'CounterToDate' || $param['type'] === 'CounterToWeekday' || $param['type'] === 'CounterFromWeekday' ) {
			$this->script['counter_options'] = [
				'number'   => $param['base_number'] ?? 0,
				'variable' => $param['change_number'] ?? 0,
				'speed'    => [
					'min' => $param['speed_min'],
					'max' => $param['speed_max'],
				],
				'round'     => $param['rounding'],
				'delimiter' => empty( $param['delimiter'] ) ? '0' : $param['delimiter'],
				'remember'  => 0,
			];
			$this->script['date_options'] = [
				'date'     => ( $param['type'] === 'CounterToWeekday' || $param['type'] === 'CounterFromWeekday' ) ? $param['dayweek'] : $param['date'],
				'time'     => $param['time'],
			];
		}
	}

	private function targets(): void {
		$id    = $this->id;
		$param = $this->param;

		$this->script['targets'] = [];

		if ( ! empty( $param['hideCounter'] ) ) {
			$this->script['targets']['hideCounter'] = '1';
		}

		if ( ! empty( $param['showMessage'] ) ) {
			$this->script['targets']['showMessage'] = do_shortcode( wp_kses_post( $param['message'] ) );
		}

		if ( ! empty( $param['hideBlock_checkbox'] ) ) {
			$this->script['targets']['hideBlock'] = $param['hideBlock'];
		}

		if ( ! empty( $param['showBlock_checkbox'] ) ) {
			$this->script['targets']['showBlock'] = $param['showBlock'];
		}

		if ( ! empty( $param['redirect_checkbox'] ) ) {
			$this->script['targets']['redirect'] = $param['redirect'];
		}

		if ( ! empty( $param['action_checkbox'] ) ) {
			$this->script['targets']['action'] = $param['action'];
		}

	}

	private function style(): void {
		$id    = $this->id;
		$param = $this->param;

		$this->script['container_css'] = '';
		$this->script['number_css']    = '';

		if ( ! empty( $param['width_unit'] ) && $param['width_unit'] !== 'auto' ) {
			$this->script['number_css'] .= 'width:' . $param['width'] . 'px;';
		}

		if ( ! empty( $param['height_unit'] ) && $param['height_unit'] !== 'auto' ) {
			$this->script['number_css'] .= 'height:' . $param['height'] . 'px;';
			$this->script['number_css'] .= 'line-height:' . $param['height'] . 'px;';
		}

		if ( ! empty( $param['background'] ) ) {
			$this->script['number_css'] .= 'background:' . $param['background'] . ';';
		}

		if ( ! empty( $param['border_radius'] ) ) {
			$this->script['number_css'] .= 'border-radius:' . $param['border_radius'] . 'px;';
		}

		if ( ! empty( $param['border_style'] ) && $param['border_style'] !== 'none' ) {
			$this->script['number_css'] .= 'border-style:' . $param['border_style'] . ';';
			$this->script['number_css'] .= 'border-width:' . $param['border_width'] . ';';
			$this->script['number_css'] .= 'border-color:' . $param['border_color'] . ';';
		}
	}

	private function titles(): void {
		$id    = $this->id;
		$param = $this->param;

		$year_title    = ! empty( $param['year_title_checkbox'] ) ? $param['year_title'] : '';
		$day_title     = ! empty( $param['day_title_checkbox'] ) ? $param['day_title'] : '';
		$hour_title    = ! empty( $param['hour_title_checkbox'] ) ? $param['hour_title'] : '';
		$min_title     = ! empty( $param['min_title_checkbox'] ) ? $param['min_title'] : '';
		$sec_title     = ! empty( $param['sec_title_checkbox'] ) ? $param['sec_title'] : '';
		$counter_title = ! empty( $param['counter_title_checkbox'] ) ? $param['counter_title'] : '';


		if ( empty( $day_title ) && empty( $hour_title ) && empty( $min_title ) && empty( $sec_title ) && empty( $counter_title ) ) {
			$this->script['titles'] = '';
		} else {
			$location                      = ! empty( $param['title_position'] ) ? $param['title_position'] : 'top';
			$offset                        = ! empty( $param['title_offset'] ) ? $param['title_offset'] : '0';
			$color                         = ! empty( $param['title_color'] ) ? $param['title_color'] : '#000000';
			$size                          = ! empty( $param['title_size'] ) ? $param['title_size'] : '12';
			$this->script['titles']['css'] = "color: {$color}; font-size: {$size}px;{$location}:{$offset}px;";

			if ( ! empty( $year_title ) ) {
				$this->script['titles']['year'] = $year_title;
			}

			if ( ! empty( $day_title ) ) {
				$this->script['titles']['day'] = $day_title;
			}

			if ( ! empty( $hour_title ) ) {
				$this->script['titles']['hour'] = $hour_title;
			}

			if ( ! empty( $min_title ) ) {
				$this->script['titles']['min'] = $min_title;
			}

			if ( ! empty( $sec_title ) ) {
				$this->script['titles']['sec'] = $sec_title;
			}

			if ( ! empty( $counter_title ) ) {
				$this->script['titles']['counter'] = $counter_title;
			}
		}

	}

	private function actions() {
		$id    = $this->id;
		$param = $this->param;

		if ( ! empty( $param['active_url_on'] ) ) {
			$this->script['active_url']['enable'] = true;
			$this->script['active_url']['url']    = ! empty( $param['active_url'] ) ? $param['active_url'] : 'counter=active';
		}

		if ( ! empty( $param['referrer_url_on'] ) ) {
			$this->script['referrer_url']['enable'] = true;
			$this->script['referrer_url']['url']    = ! empty( $param['referrer_url'] ) ? $param['referrer_url'] : '';
		}

		if ( ! empty( $param['geotargeting_on'] ) ) {
			$this->script['geotargeting'] = true;

			$codes_input = $param['geotargeting'] ?? [];
			$codes       = array_map( 'trim', explode( ',', $codes_input ) );

			$this->script['countries'] = $codes;
		}

	}

}