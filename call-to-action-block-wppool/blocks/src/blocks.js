const { RichText, MediaUpload, PlainText } = wp.editor;
const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { Button } = wp.components;
import { ClickIcon } from './blockicon';
import './cta-component';

import attributes from './attributes';
import Edit from './Edit';

import './style.scss';
import './editor.scss';

registerBlockType('wppool/cta', {
  title: __('Call to action', 'cta-gutenberg'),
  icon: ClickIcon,
  category: 'common',
  keywords: [
		__( 'call to action', 'cta-gutenberg' ),
		__( 'wppool', 'cta-gutenberg' )
	],
  attributes,
  supports: {
    align: true
  },
  edit: Edit,
  save: function( props ) {

		const {
			uniqueId,
			layout,
			isGradientBg,
			bgColor,
			bgColor2,
			bgImage,
			title,
			description,
			btn_label,
			btn_url,
			btn_target
		} = props.attributes;

		return (
				<div 
					className={`call_to_action_${layout} call_to_action_${uniqueId}`}
					style={{
						backgroundImage:`${(bgImage.url != undefined) ? `url(${bgImage.url})` : 'none'}`
					}}
				>
					<div className="cta_content">
						<h2>{title}</h2>
						<p>{description}</p>
						<a className="ctagb-btn" target={btn_target ? '_blank': ''} rel="noopener noreferrer" href={btn_url}>{btn_label}</a>
					</div>
					<style>
					{(layout == 1 || layout == 8 || layout == 9) ?
						
						`
						.call_to_action_${uniqueId}:after{
							${isGradientBg == 1 ? `background-image: linear-gradient(to right, ${bgColor}, ${bgColor2})` : `background-color: ${bgColor}`}
						}
						.call_to_action_${uniqueId}>.cta_content>.ctagb-btn:hover{
							${isGradientBg == 1 ? `background-image: linear-gradient(to right, ${bgColor2}, ${bgColor})` : `background-color: ${bgColor}`}
						}
						`
						:
						
						`.call_to_action_${uniqueId}{
							${isGradientBg == 1 ? `background-image: linear-gradient(to right, ${bgColor}, ${bgColor2})` : `background-color: ${bgColor}`}
						}
						`
						
					}
					</style>
				</div>
		);
	}
});
