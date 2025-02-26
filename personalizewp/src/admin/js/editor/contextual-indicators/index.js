/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { addFilter, applyFilters } from '@wordpress/hooks';
import { useEntityRecord } from '@wordpress/core-data';

/**
 * Filter each block and add CSS classes based on PersonalizeWP settings.
 *
 * @since 2.8.0
 * @param {Object} BlockListBlock
 */
function withContextualIndicators( BlockListBlock ) {
	return ( props ) => {

		// Setup data
		const settingsData = useEntityRecord( 'personalizewp/v1', 'settings' );
		const settings = settingsData.record;

		const wrapperProps = {
			...props.wrapperProps,
			'data-personalized-label' : __( 'Personalized Block', 'personalizewp' ),
		};

		const hasPersonalizeControls = applyFilters(
			'personalizewp.hasPersonalizeControls',
			props?.attributes?.personalizewp ?? false,
			props
		);

		if ( ! hasPersonalizeControls ) {
			return <BlockListBlock { ...props } />;
		}

		// Add any other classes that might have been added using the same filter.
		let classes = ( props?.className ?? '' ) + ' personalizewp__has-been-personalized';

		classes = applyFilters(
			'personalizewp.contextualIndicatorClasses',
			classes,
			props,
			settings
		);

		return <BlockListBlock { ...props } className={ classes } wrapperProps={ wrapperProps } />;
	};
}

addFilter(
	'editor.BlockListBlock',
	'personalizewp/contextual-indicators',
	withContextualIndicators
);
