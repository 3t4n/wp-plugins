/**
 * External dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
import { ExperimentalOrderMeta } from '@woocommerce/blocks-checkout';
import { getSetting } from '@woocommerce/settings';
/**
 * Internal dependencies
 */
import './style.scss';

import { registerFilters } from './filters';
import { ExampleComponent } from './ExampleComponent';

const exampleDataFromSettings = getSetting( 'fattura24-billing-block_data' );

const render = () => {
	return (
		<>
			<ExperimentalOrderMeta>
			
			</ExperimentalOrderMeta>
		</>
	);
};

registerPlugin( 'fattura24-billing-block', {
	render,
	scope: 'woocommerce-checkout',
} );

registerFilters();