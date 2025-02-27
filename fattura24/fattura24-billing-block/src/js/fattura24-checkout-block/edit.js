/**
 * External dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { getSetting } from '@woocommerce/settings';
import { CheckboxControl } from '@woocommerce/blocks-checkout';

/**
 * Internal dependencies
 */
import './style.scss';

const { fattura24Settings } = window.wcSettings['fattura24-billing-block_data'];
const vatNumberAddedByF24 = fattura24Settings['fatt-24-add-vat-field'] === 'WooCommerce Fattura24';
const { optInDefaultText } = getSetting('fattura24-billing-block_data', '');

export const Edit = ({ attributes, setAttributes }) => {
	const { billing_checkbox, billing_fiscalcode, billing_vatcode, billing_recipientcode, billing_pecaddress, text } = attributes;
	const blockProps = useBlockProps();

	return (
		<div {...blockProps}>
			<InspectorControls>
				<PanelBody title={__('Block options', 'fattura24-billing-block')}>
					Options for the block go here.
				</PanelBody>
			</InspectorControls>
			<CheckboxControl
				label={__('I would like to receive an invoice', 'fattura24')}
				checked={billing_checkbox}
				onChange={(value) => setAttributes({ billing_checkbox: value })}
			/>
			{vatNumberAddedByF24 && <TextControl
				label={__('VAT Number', 'fattura24')}
				value={billing_vatcode}
				onChange={(value) => setAttributes({ billing_vatcode: value })}
			/>}
			<TextControl
				label={__('Fiscal Code', 'fattura24')}
				value={billing_fiscalcode}
				onChange={(value) => setAttributes({ billing_fiscalcode: value })}
			/>
			<TextControl
				label={__('SDI Code', 'fattura24')}
				placeholder={__('optional', 'fattura24')}
				value={billing_recipientcode}
				onChange={(value) => setAttributes({ billing_recipientcode: value })}
			/>
			<TextControl
				label={__('PEC Address', 'fattura24')}
				placeholder={__('optional', 'fattura24')}
				value={billing_pecaddress}
				onChange={(value) => setAttributes({ billing_pecaddress: value })}
			/>
		</div>
	);
};

export const Save = ({ attributes }) => {
	const { billing_checkbox, billing_fiscalcode, billing_vatcode, billing_recipientcode, billing_pecaddress, text } = attributes;
	return (
		<div {...useBlockProps.save()}>
			{billing_checkbox && <div>{__('I would like to receive an invoice', 'fattura24')}</div>}
			{billing_vatcode && <div>{__('VAT Number', 'fattura24')} : {billing_vatcode}</div>}
			{billing_fiscalcode && <div>{__('Fiscal Code', 'fattura24')} : {billing_fiscalcode}</div>}
			{billing_recipientcode && <div>{__('SDI Code', 'fattura24')} {billing_recipientcode}</div>}
			{billing_pecaddress && <div>{__('PEC Address', 'fattura24')} {billing_pecaddress}</div>}
			<RichText.Content value={text} />
		</div>
	);
};
