/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';

export default function Size( key, label, attributes, setAttributes ) {

	const units = [
        { value: 'px', label: 'px', default: 0 },
        { value: '%', label: '%', default: 0 },
        { value: 'em', label: 'em', default: 0 },
        { value: 'rem', label: 'rem', default: 0 },
        { value: 'vw', label: 'vw', default: 0 },
    ];

	const updateStyle = ( key, value ) => {
		const styles = Object.assign( {}, attributes.styles );
		styles[ key ] = value;
        setAttributes( { styles } );
    };

    return(
		<UnitControl
			__next40pxDefaultSize={ false }
			className="block-editor-hooks__layout-controls-unit-input"
			label={ label }
			labelPosition="top"
			value={ attributes.styles[ key ] }
			onChange={ sizeUnit => updateStyle( key, sizeUnit ) }
			units={ units }
			style={{ marginBottom: '16px' }}
		/>		
	);
}
