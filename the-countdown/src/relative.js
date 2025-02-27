// https://github.com/kbwood/countdown/blob/master/src/js/jquery.countdown.js#L606

var Y = 0; // Years
var O = 1; // Months
var W = 2; // Weeks
var D = 3; // Days
var H = 4; // Hours
var M = 5; // Minutes
var S = 6; // Seconds

const currentDate = new Date();

const _getDaysInMonth = ( year, month ) => {
	return 32 - new Date( year, month, 32 ).getDate();
};

const offsetNumeric = ( offset ) => { // e.g. +300, -2
	var time = new Date();
	time.setTime(time.getTime() + offset * 1000);
	return time;
};
			
const offsetString = ( offset ) => { // e.g. '+2d', '-4w', '+3h +30m'
	offset = offset.toLowerCase();
	var time = new Date();
	var year = time.getFullYear();
	var month = time.getMonth();
	var day = time.getDate();
	var hour = time.getHours();
	var minute = time.getMinutes();
	var second = time.getSeconds();
	var pattern = /([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g;
	var matches = pattern.exec( offset );

	while ( matches ) {
		switch ( matches[2] || 's' ) {
			case 's':
				second += parseInt( matches[1], 10 );
				break;
			case 'm':
				minute += parseInt( matches[1], 10 );
				break;
			case 'h':
				hour += parseInt( matches[1], 10 );
				break;
			case 'd':
				day += parseInt( matches[1], 10 );
				break;
			case 'w':
				day += parseInt( matches[1], 10 ) * 7;
				break;
			case 'o':
				month += parseInt( matches[1], 10 ); 
				day = Math.min( day, _getDaysInMonth( year, month ) );
				break;
			case 'y':
				year += parseInt( matches[1], 10 );
				day = Math.min( day, _getDaysInMonth( year, month ) );
				break;
		}

		matches = pattern.exec( offset ); // repeat to avoid stuck
	}

	return new Date( year, month, day, hour, minute, second, 0 );
}
	
export function convertRelativeTime( relative ) { // e.g. '+2d', '-4w', '+3h +30m'
	return typeof relative === 'string' ? offsetString( relative ) : offsetNumeric( relative );
};
