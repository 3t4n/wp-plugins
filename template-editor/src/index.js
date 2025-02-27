const { __ } = wp.i18n;

const enableExpandableModalSubmenus = [
    'core/navigation'
];

const enableFullBlockLink = [
    'core/cover',
    'core/group'
];

const enableCloseOtherDetailsWhenOpened = [
    'core/details'
];

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, ToggleControl } = wp.components;

/**
 * Declare custom attributes
 */

const setBlockAttributes = ( settings, name ) => {

    if ( enableExpandableModalSubmenus.includes( name ) ) {

        settings = Object.assign( {}, settings, {
            attributes: Object.assign( {}, settings.attributes, {
                hasExpandableModalSubmenus: { type: 'bool' }
            } ),
        } );
    
    }

    if ( enableFullBlockLink.includes( name ) ) {

        settings = Object.assign( {}, settings, {
            attributes: Object.assign( {}, settings.attributes, {
                hasFullBlockLink: { type: 'bool' }
            } ),
        } );

    }

    if ( enableCloseOtherDetailsWhenOpened.includes( name ) ) {

        settings = Object.assign( {}, settings, {
            attributes: Object.assign( {}, settings.attributes, {
                hasCloseOtherDetailsWhenOpened: { type: 'bool' }
            } ),
        } );

    }

    return settings;

};

wp.hooks.addFilter(
    'blocks.registerBlockType',
    'template-editor/set-options-for-block-themes-attributes',
    setBlockAttributes
);

/**
 * Add Custom Settings to Block Sidebar
 */

const withBlockOptions = createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {

        let returnedContent = [];
        const { attributes, setAttributes } = props;

        if ( enableExpandableModalSubmenus.includes( props.name ) ) {

            const { hasExpandableModalSubmenus } = attributes;

            returnedContent.push(
                <ToggleControl
                __nextHasNoMarginBottom
                label = { __( 'Expandable modal submenus', 'template-editor' ) }
                help = {
                    hasExpandableModalSubmenus
                        ? __( 'Has expandable modal submenus.', 'template-editor' )
                        : __( 'No expandable modal submenus.', 'template-editor' )
                }
                checked = { hasExpandableModalSubmenus }
                onChange = { () => setAttributes({ hasExpandableModalSubmenus: !hasExpandableModalSubmenus } ) }
                />
            );

        }

    	if ( enableFullBlockLink.includes( props.name ) ) {

            const { hasFullBlockLink } = attributes;

            returnedContent.push(
                <ToggleControl
                __nextHasNoMarginBottom
                label = { __( 'Use first link in block to link entire block', 'template-editor' ) }
                help = {
                    hasFullBlockLink
                        ? __( 'Has full block link.', 'template-editor' )
                        : __( 'No full block link.', 'template-editor' )
                }
                checked = { hasFullBlockLink }
                onChange = { () => setAttributes({ hasFullBlockLink: !hasFullBlockLink } ) }
                />
            );

        }

    	if ( enableCloseOtherDetailsWhenOpened.includes( props.name ) ) {

            const { hasCloseOtherDetailsWhenOpened } = attributes;

            returnedContent.push(
                <ToggleControl
                __nextHasNoMarginBottom
                label = { __( 'Close other Details blocks when opened', 'template-editor' ) }
                help = {
                    hasCloseOtherDetailsWhenOpened
                        ? __( 'Other open Details blocks close.', 'template-editor' )
                        : __( 'Other open Details blocks do not change.', 'template-editor' )
                }
                checked = { hasCloseOtherDetailsWhenOpened }
                onChange = { () => setAttributes({ hasCloseOtherDetailsWhenOpened: !hasCloseOtherDetailsWhenOpened } ) }
                />
            );

        }

        if ( returnedContent ) {

            return (
                <Fragment>
                <BlockEdit { ...props } />
                <InspectorControls>
                	<PanelBody
    	                title={ __( 'Options for Block Themes', 'template-editor' ) }
    	            >
                        { returnedContent }
	                </PanelBody>
                </InspectorControls>
            </Fragment>
            );

        } else {
            return (
                <BlockEdit { ...props } />
            );
        }

    };
}, 'withBlockOptions' );

wp.hooks.addFilter(
    'editor.BlockEdit',
    'template-editor/with-options-for-block-themes-options',
    withBlockOptions
);
