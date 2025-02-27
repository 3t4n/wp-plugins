import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element'
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

export default class Inspector extends Component {

    

  render() {
		const { attributes: { dpe_value, ges_value, not_subject, new_dpe, display_dpe, display_ges, display_inline }, setAttributes } = this.props
    return (
        <InspectorControls key="setting">
            <PanelBody title={ __( 'DPE-GES Values', 'wpdpeges' ) }>
                <label for="inspector-text-control-0">{ __( 'DPE Value', 'wpdpeges' ) }</label>
                <TextControl
                    type="text"
                    placeholder={ __( 'DPE Value', 'wpdpeges' ) }
                    onChange={ ( val ) => setAttributes( { dpe_value: val } ) }
                    value={dpe_value}
                />
                <label for="inspector-text-control-1">{ __( 'GES Value', 'wpdpeges' ) }</label>
                <TextControl
                    type="text"
                    placeholder={ __( 'GES Value', 'wpdpeges' ) }
                    onChange={ ( val ) => setAttributes( { ges_value: val } ) }
                    value={ges_value}
                />
            </PanelBody>
            <PanelBody title={ __( 'Display', 'wpdpeges' ) }>
                <ToggleControl
                    label={ __( 'Not subject', 'wpdpeges' ) }
                    checked={ not_subject }
                    onChange={ () => setAttributes( { not_subject: ! not_subject } ) }
                />
                <ToggleControl
                    label={ __( 'New DPE', 'wpdpeges' ) }
                    checked={ new_dpe }
                    onChange={ () => setAttributes( { new_dpe: ! new_dpe } ) }
                />
                <ToggleControl
                    label={ __( 'Display DPE', 'wpdpeges' ) }
                    checked={ display_dpe }
                    onChange={ () => setAttributes( { display_dpe: ! display_dpe } ) }
                />
                <ToggleControl
                    label={ __( 'Display GES', 'wpdpeges' ) }
                    checked={ display_ges }
                    onChange={ () => setAttributes( { display_ges: ! display_ges } ) }
                />
                <ToggleControl
                    label={ __( 'Display Inline', 'wpdpeges' ) }
                    checked={ display_inline }
                    onChange={ () => setAttributes( { display_inline: ! display_inline } ) }
                />
            </PanelBody>
        </InspectorControls>
    )
  }
}