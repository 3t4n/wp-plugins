
const { __ } = wp.i18n;
const { Fragment } = wp.element;
import { PanelBody, SelectControl } from '@wordpress/components';
import { InnerBlocks, InspectorControls } from '@wordpress/block-editor';

const types = [
    { value: 'props', label: __('Props') },
    { value: 'cons', label: __('Cons') },
]

const Edit = ({ className, attributes, setAttributes }) => {
    const { type } = attributes;

    return(
        <Fragment>
            <InspectorControls>
                <PanelBody
                    title={ __( "Props & Cons Type" ) }
                    initialOpen={ true }
                >
                   <SelectControl
                        label={ __( "Select Type" ) }
                        value={ type }
                        options={ types }
                        onChange={ ( type ) => { setAttributes( { type } ) } }
                    />
                </PanelBody>
            </InspectorControls>
            <div className={ `${className} ${type}` }>
                <InnerBlocks 
                    allowedBlocks={ ['core/list'] }
                    template={[
                        ['core/list', {placeholder: 'Enter Pros or Cons List...'}],
                    ]}
                    renderAppender={ false }
                />
            </div>
        </Fragment>
    );
}
export default Edit; 
