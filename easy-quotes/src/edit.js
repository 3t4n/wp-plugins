import './editor.scss';

import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';

import { Quotes } from './components/quotes';
import { InspectorTitle } from './components/inspector-title';
import { InspectorRating } from './components/inspector-rating';
import { InspectorQuote } from './components/inspector-quote';
import { InspectorTypography } from './components/inspector-typography';
import { InspectorAdvancedCSS } from './components/inspector-advanced-css';

export default function Edit( { clientId, attributes, setAttributes } ) {
	const blockProps = useBlockProps( {
		className: 'easy-quotes-block',
	} );

	return (
		<div { ...blockProps }>
			<Quotes
				attributes={ attributes }
				setAttributes={ setAttributes }
				clientId={ clientId }
			/>

			<InspectorControls key="settings">
				<InspectorTitle
					attributes={ attributes }
					setAttributes={ setAttributes }
				/>
				<InspectorRating
					attributes={ attributes }
					setAttributes={ setAttributes }
				/>
				<InspectorQuote
					attributes={ attributes }
					setAttributes={ setAttributes }
				/>
				<InspectorTypography
					attributes={ attributes }
					setAttributes={ setAttributes }
					clientId={ clientId }
				/>
			</InspectorControls>

			<InspectorAdvancedCSS
				attributes={ attributes }
				setAttributes={ setAttributes }
			/>
		</div>
	);
}
