import { createElement, Fragment } from 'react';
import classnames from "classnames";

import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';
import { 
	Panel, 
	PanelBody,
	ExternalLink, 
	ComboboxControl, 
	TextControl, 
	SelectControl 
} from '@wordpress/components';
import { __ } from "@wordpress/i18n";
// import { compose } from "@wordpress/compose";
import { addQueryArgs } from '@wordpress/url';

// import withSetAttributes from '../../hoc/withSetAttributes';

const formEdit = ( props ) => {
	const {
		attributes,
		setAttributes,
		clientId,
		className,
	} = props;

	const {
		type,
		form,
		preForm,
		hash,
		title,
		output,
		blockId
	} = attributes;

  const formOptions = (e) => {
  	const t = [];

  	if ( typeof e === 'object' ) {
  		Object.entries(e).map( ([a, l]) => t.push({ value: a, label: l.title }) );
  	} else {
  		for (const [a, l] of e) t.push({ value: a, label: l.title });
  	}
  	return t;
  },
  editURL = (id) => {
	  const t = ajaxurl.replace(/\/admin-ajax\.php$/, "/post.php");
	  return (0, addQueryArgs)(t, { post: id, action: "edit" });
	};

  const blockProps = useBlockProps({});

  const forms = formOptions(amemBlocks.forms);

  const preForms = formOptions(amemBlocks.preForms);

  const formSelect = (
  	<SelectControl
	    label={ __( "Select Form", "advanced-members" ) }
	    value={ (form == "0" ? preForm : form) }
	    onChange={ (value) => {
	    		const atts = amemBlocks.forms[value] ? amemBlocks.forms[value] : amemBlocks.preForms[value];
	    		setAttributes( atts )
	    	}
  		}
	>
  	<option value="">{__("\u2013 Select a Form \u2013", "advanced-members")}</option>
  	<optgroup label={ __("Login / Registration", "advanced-members") }>
		{ forms.map( ( option, index ) => {
				const key =
					option.id ||
					`${ option.label }-${ option.value }-${ index }`;

				return (
					<option
						key={ key }
						value={ option.value }
						disabled={ option.disabled }
						hidden={ option.hidden }
					>
						{ option.label }
					</option>
				);
			} ) }
		</optgroup>

  	<optgroup label={ __("Predefined Forms", "advanced-members") }>
		{ preForms.map( ( option, index ) => {
				const key =
					option.id ||
					`${ option.label }-${ option.value }-${ index }`;

				return (
					<option
						key={ key }
						value={ option.value }
						disabled={ option.disabled }
						hidden={ option.hidden }
					>
						{ option.label }
					</option>
				);
			} ) }
		</optgroup>

	</SelectControl>
  );

  const settingsPanel = (
	  <InspectorControls key="setting">
	    <PanelBody title={__("Advanced Members for ACF Form", "advanced-members")}>

	    	<SelectControl
	    	    label={ __( "Select Form", "advanced-members" ) }
	    	    value={ (form == "0" ? preForm : form) }
	    	    onChange={ (value) => {
	    	    		const atts = amemBlocks.forms[value] ? amemBlocks.forms[value] : amemBlocks.preForms[value];
	    	    		setAttributes( atts )
	    	    	}
  	    		}
	    	>
		    	<option value="">{__("\u2013 Select a Form \u2013", "advanced-members")}</option>
		    	<optgroup label={ __("Login / Registration", "advanced-members") }>
					{ forms.map( ( option, index ) => {
							const key =
								option.id ||
								`${ option.label }-${ option.value }-${ index }`;

							return (
								<option
									key={ key }
									value={ option.value }
									disabled={ option.disabled }
									hidden={ option.hidden }
								>
									{ option.label }
								</option>
							);
						} ) }
	    		</optgroup>

		    	<optgroup label={ __("Predefined Forms", "advanced-members") }>
					{ preForms.map( ( option, index ) => {
							const key =
								option.id ||
								`${ option.label }-${ option.value }-${ index }`;

							return (
								<option
									key={ key }
									value={ option.value }
									disabled={ option.disabled }
									hidden={ option.hidden }
								>
									{ option.label }
								</option>
							);
						} ) }
	    		</optgroup>

    		</SelectControl>

	    </PanelBody>
	  </InspectorControls>
  );

  const renderBlock = (
  	<div { ...blockProps }>
	  	<div className="acf-block-component acf-block-body amem-block-component amem-block-body">
	  		<div>
	  			<div className="acf-block-preview amem-block-preview">
						<div className="amem-block-description">{__('Adv. Members Form', 'advanced-members')}</div>
						<div className="amem-block-form-name">{title}</div>
						<div className="amem-block-form-select">
	    			<>
	    			{formSelect}
	    			</>
	    			</div>
						<div className="amem-block-subtitle">{__('Preview page to view form', 'advanced-members')}</div>
					</div>
				</div>
			</div>
		</div>
  );

	  return (
	  	<>
	      {settingsPanel}
	      {renderBlock}
      </>
	  );
};

export default formEdit;