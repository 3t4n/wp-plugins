// I18n.
import { __ } from '@wordpress/i18n';

// Block editor.
import { BlockControls } from '@wordpress/block-editor';

// Components.
import { ToolbarButton, Toolbar } from '@wordpress/components';

// Compose.
import { createHigherOrderComponent } from '@wordpress/compose';

// Icons.
import { search } from '@wordpress/icons';

// Class to toggle the search widget.
const searchWidgetToggleClass = 'xapp-search-button';

/**
 * Inject additional toolbar button for core/button.
 */
const addXappSearchWidgetToggle = createHigherOrderComponent( (BlockEdit) => {
	return (props) => {
		const {
			attributes: { className = '' },
			attributes,
			setAttributes,
			name,
		} = props;

		if (name !== 'core/button') {
			return <BlockEdit { ...props } />;
		}

		// Has the class already been set?
		const useXAPPSearchWidget = className.includes(
			searchWidgetToggleClass
		);

		// Compute the toggle value.
		const toggledClassName = useXAPPSearchWidget
			? className.replace( searchWidgetToggleClass, '' ).trim()
			: `${ className } ${ searchWidgetToggleClass }`;

		return (
			<>
				<BlockControls>
					<Toolbar>
						<ToolbarButton
							label={ __(
								'Trigger OC Studio Search Widget',
								'oc-studio-integration'
							) }
							icon={ search }
							isPressed={ useXAPPSearchWidget }
							onClick={ () =>
								setAttributes( {
									...attributes,
									className: toggledClassName,
								} )
							}
						/>
					</Toolbar>
				</BlockControls>
				<BlockEdit { ...props } />
			</>
		);
	};
}, 'withToolbarButtonForSearchWidget' );

/**
 * Add a toggle to the button toolbar for the useXAPPSearchWidget attribute.
 */
wp.hooks.addFilter(
	'editor.BlockEdit',
	'xapp/add-xapp-search-widget-toggle',
	addXappSearchWidgetToggle
);
