import { getSettings } from '@wordpress/date';

// gutenberg/packages/components/src/date-time/stories/utils.ts 
export function daysFromNow( days ) {
	const date = new Date();
	date.setDate( date.getDate() + days );
	return date;
}

export function isWeekend( date ) {
	return date.getDay() === 0 || date.getDay() === 6;
}

export function isEmpty( value ){
	return  value === undefined ||
			value === null ||
			( typeof value === "object" && Object.keys( value ).length === 0 ) ||
			( typeof value === "string" && value.trim().length === 0 )
  }

// https://github.com/WordPress/gutenberg/blob/41a30232f5d9ad57246e9843c40cae4ca62acda4/packages/editor/src/components/post-schedule/index.js#L62
export const is12HourTime = /a(?!\\)/i.test(
	getSettings().formats.time
		.toLowerCase() // Test only the lower case a.
		.replace( /\\\\/g, '' ) // Replace "//" with empty strings.
		.split( '' )
		.reverse()
		.join( '' ) // Reverse the string and test for "a" not followed by a slash.
);

