<?php

defined( 'ABSPATH' ) || exit;

return [
	//region Type
	'type' => [
		'type'  => 'select',
		'title' => __( 'Type of counter', 'counter-box' ),
		'atts'  => [
			'countdown_start'    => __( 'CountDown', 'counter-box' ),
			'CountToDate'        => __( 'Countdown to Date', 'counter-box' ),
			'CountToWeekday'     => __( 'Weekly Countdown', 'counter-box' ),
			'countdown_end'      => __( 'CountDown', 'counter-box' ),
			'timer_start'        => __( 'Timer', 'counter-box' ),
			'Timer'              => __( 'Simple Timer', 'counter-box' ),
			'UserTimer'          => __( 'Personal Timer', 'counter-box' ),
			'TimerStopGo'        => __( 'Resumable Timer', 'counter-box' ),
			'ContFromDate'       => __( 'Time Since', 'counter-box' ),
			'timer_end'          => __( 'Timer', 'counter-box' ),
			'counter_start'      => __( 'Counter', 'counter-box' ),
			'Counter'            => __( 'Base Counter', 'counter-box' ),
			'counter_end'        => __( 'Counter', 'counter-box' ),
		],
	],
	//endregion

	'dayweek' => [
		'type'  => 'select',
		'title' => __( 'Day of the week', 'counter-box' ),
		'atts'  => [
			'everyday'  => __( 'Everyday', 'counter-box' ),
			'Monday'    => __( 'Monday', 'counter-box' ),
			'Tuesday'   => __( 'Tuesday', 'counter-box' ),
			'Wednesday' => __( 'Wednesday', 'counter-box' ),
			'Thursday'  => __( 'Thursday', 'counter-box' ),
			'Friday'    => __( 'Friday', 'counter-box' ),
			'Saturday'  => __( 'Saturday', 'counter-box' ),
			'Sunday'    => __( 'Sunday ', 'counter-box' ),
		],

	],

	'date' => [
		'type'  => 'date',
		'title' => __( 'Date', 'counter-box' ),
		'val'   => gmdate( 'Y-m-d' ),
	],

	'time' => [
		'type'  => 'time',
		'title' => __( 'Time', 'counter-box' ),
		'val'   => '23:59',
	],

	'timezone' => [
		'type'  => 'select',
		'title' => __( 'Timezone', 'counter-box' ),
		'val'   => '+00:00',
		'atts'  => [
			'-12:00' => '-12:00',
			'-11:30' => '-11:30',
			'-11:00' => '-11:00',
			'-10:30' => '-10:30',
			'-10:00' => '-10:00',
			'-09:30' => '-09:30',
			'-09:00' => '-09:00',
			'-08:30' => '-08:30',
			'-08:00' => '-08:00',
			'-07:30' => '-07:30',
			'-07:00' => '-07:00',
			'-06:30' => '-06:30',
			'-06:00' => '-06:00',
			'-05:30' => '-05:30',
			'-05:00' => '-05:00',
			'-04:30' => '-04:30',
			'-04:00' => '-04:00',
			'-03:30' => '-03:30',
			'-03:00' => '-03:00',
			'-02:30' => '-02:30',
			'-02:00' => '-02:00',
			'-01:30' => '-01:30',
			'-01:00' => '-01:00',
			'-00:30' => '-00:30',
			'+00:00' => '00:00',
			'+0:30'  => '+0:30',
			'+01:00' => '+01:00',
			'+1:30'  => '+1:30',
			'+02:00' => '+02:00',
			'+02:30' => '+02:30',
			'+03:00' => '+03:00',
			'+03:30' => '+03:30',
			'+04:00' => '+04:00',
			'+04:30' => '+04:30',
			'+05:00' => '+05:00',
			'+5:30'  => '+5:30',
			'+05:45' => '+05:45',
			'+06:00' => '+06:00',
			'+06:30' => '+06:30',
			'+07:00' => '+07:00',
			'+07:30' => '+07:30',
			'+08:00' => '+08:00',
			'+08:30' => '+08:30',
			'+08:45' => '+08:45',
			'+09:00' => '+09:00',
			'+09:30' => '+09:30',
			'+10:00' => '+10:00',
			'+10:30' => '+10:30',
			'+11:00' => '+11:00',
			'+11:30' => '+11:30',
			'+12:00' => '+12:00',
			'+12:45' => '+12:45',
			'+13:00' => '+13:00',
			'+13:45' => '+13:45',
			'+14:00' => '+14:00',
		],
	],

	'day' => [
		'type'  => 'number',
		'title' => __( 'Days', 'counter-box' ),
		'val'   => 1,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
	],

	'hours' => [
		'type'  => 'number',
		'title' => __( 'Hours', 'counter-box' ),
		'val'   => 1,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
	],

	'minutes' => [
		'type'  => 'number',
		'title' => __( 'Minutes', 'counter-box' ),
		'val'   => 1,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
	],

	'seconds' => [
		'type'  => 'number',
		'title' => __( 'Seconds', 'counter-box' ),
		'val'   => 1,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
	],

	'start' => [
		'type'  => 'number',
		'val'   => 1,
		'atts'  => [
			'step' => 'any'
		],
		'addon' => 'start',
		'class' => 'wpie-counter-base'
	],

	'finish' => [
		'type'  => 'number',
		'val'   => 5,
		'atts'  => [
			'step' => 'any'
		],
		'addon' => 'finish',
		'class' => 'wpie-counter-base'
	],

	'base_number' => [
		'type'    => 'number',
		'title'   => __( 'Base number', 'counter-box' ),
		'val'     => 0,
		'atts'    => [
			'step' => 'any'
		],
		'class'   => 'wpie-counter-date',
		'tooltip' => __( 'Set the value to the set date', 'counter-box' ),
	],

	'speed_min' => [
		'type'  => 'number',
		'title' => __( 'Minimal', 'counter-box' ),
		'val'   => 1,
		'addon' => 'sec',
		'atts'  => [
			'step' => 'any'
		],
	],

	'speed_max' => [
		'type'  => 'number',
		'title' => __( 'Maximal', 'counter-box' ),
		'val'   => 1,
		'addon' => 'sec',
		'atts'  => [
			'step' => 'any'
		],
	],

	'increment_min' => [
		'type'  => 'number',
		'val'   => 1,
		'atts'  => [
			'step' => 'any'
		],
		'addon' => 'min',
		'class' => 'wpie-counter-base'
	],

	'increment_max' => [
		'type'  => 'number',
		'val'   => 1,
		'atts'  => [
			'step' => 'any'
		],
		'addon' => 'max',
		'class' => 'wpie-counter-base'
	],

	'change_number' => [
		'type'    => 'number',
		'title'   => __( 'Change of number', 'counter-box' ),
		'val'     => 1,
		'atts'    => [
			'step' => 'any'
		],
		'class'   => 'wpie-counter-date',
		'tooltip' => __( 'Set the value of the change in 1 second', 'counter-box' ),
	],

	'rounding' => [
		'type'  => 'number',
		'title' => __( 'Rounding', 'counter-box' ),
		'val'   => 0,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
	],

];