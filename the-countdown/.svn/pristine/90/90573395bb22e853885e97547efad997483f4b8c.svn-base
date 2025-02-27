/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const { __ } = wp.i18n;
const { applyFilters, } = wp.hooks;

/**
 * Internal dependencies
 */
import { daysFromNow } from './utils';

export const templateStyles = applyFilters( 'tc_template_styles', {
	'default' : {
		digitSize: '2.5rem',
		labelSize: '1.2rem',

		digitPad: '0.3rem',
		labelPad: '0.2rem',

		gap: '1rem',
		minWidth: '18%',

		digitColor: '#ffffff',
		digitBgColor: '#487ea8',
		labelColor: '',
		labelBgColor: '',
	},
	'minimal' : {
		separator: ' : ',
		fontSize: '',
		fontWeight: '400',
		fontColor: '',
	},
	'flip' : {
		digitSize: '2.7rem',
		labelSize: '1rem',
		width: '5rem',
		height: '7rem',
		gap: '1rem',

		digitColor: '#eeeeee',
		digitBgColor: '#272727',
		labelColor: '',
		labelBgColor: '',
		backgroundColor: '',
	},
	'scoreboard' : {
		labelSize: '0.8rem',
		digitSize: '3rem',
		gap: '0rem',
		width: '90%',
		digitColor: '#ffffff',
		digitBgColor: '#40acda',
		labelColor: '#ffffff',
		labelBgColor: '#286189',
	},
	'circular' : {
		digitSize: '4rem',
		labelSize: '1.8rem',

		digitTop: '40%',
		labelTop: '60%',

		gap: '1rem',
		width: '100%',

		baseSize: '16px',
		progressSize: '16px',

		baseColor: '#e0e0e0',
		progressColor: '#54b342',
		digitColor: '#111111',
		labelColor: '#a4a4a4',
		labelBgColor: '',
		backgroundColor: '',
	},
});

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
 export const attributes = {
	clientId: { type: 'string', default: '' },
	mode: { type: 'string', default: 'until' }, // the time
	dateTime: { type: 'string', default: daysFromNow( 30 ) }, // the time
	format: { type: 'array', default: ['days', 'hours', 'minutes', 'seconds'] }, 
	labels1: { type: 'array', default: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'] }, 
	labels: { type: 'array', default: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'] }, 		
	padZeroes: { type: 'boolean', default: true },

	hideonExpiry: { type: 'boolean', default: false },	
	onExpiry: { type: 'string', default: 'show_message' },
	expiryText: { type: 'string', default: __('Expired', 'the-countdown' ) },
	expiryURL: { type: 'string', default: '' },
	expiryFunction: { type: 'string', default: '' },

	onTick: { type: 'string', default: '' },
	tickInterval: { type: 'integer', default: 1 },
	relative: { type: 'string', default: '+5d' },
	template: { type: 'string', default: 'default' },
	
	styles: { type: 'object', default: templateStyles.default },
}

