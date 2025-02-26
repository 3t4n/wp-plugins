/**
 * External dependencies
 */
import classnames from 'classnames';
import { omit, pick } from 'lodash';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const {
	RichText,
	getColorClassName,
} = wp.editor;

//  Import CSS.

import './style.scss';
import './editor.scss';

import edit from './edit';

const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

const blockAttributes = {
	url: {
		type: 'string',
		source: 'attribute',
		selector: 'a',
		attribute: 'href',
	},
	title: {
		type: 'string',
		source: 'attribute',
		selector: 'a',
		attribute: 'title',
	},
	text: {
		type: 'array',
		source: 'children',
		selector: 'a',
	},
	backgroundColor: {
		type: 'string',
	},
	textColor: {
		type: 'string',
	},
	backgroundHoverColor: {
		type: 'string',
	},
	textHoverColor: {
		type: 'string',
	},
	customBackgroundColor: {
		type: 'string',
	},
	customTextColor: {
		type: 'string',
	},
	animation: {
		type: 'string',
	},
	transition: {
		type: 'string',
	},
	extraClassName: {
		type: 'string',
	},
	extraStyles: {
		type: 'string',
	},
	extraHoverStyles: {
		type: 'string',
	},
	opensInNewWindow: {
		type: 'boolean',
		default: false,
	},
	buttonShape: {
		type: 'string',
		default: 'gab-square',
	},
	buttonSize: {
		type: 'string',
		default: 'gab-normal',
	}
};

export const name = 'gab/animation-button';

const settings = {

	title: __( 'Advanced Button' ),

	description: __( 'Want visitors to click to subscribe, buy, or read more? Get their attention with a button with fancy animation.' ),

	icon: <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><g><path d="M19 6H5L3 8v8l2 2h14l2-2V8l-2-2zm0 10H5V8h14v8z" /></g></svg>,

	category: 'layout',

	attributes: blockAttributes,

	supports: {
		align: true,
		alignWide: false,
		customClassName: false,
	},

	edit,

	save( { attributes } ) {

		const {
			url,
			text,
			title,
			backgroundColor,
			textColor,
			backgroundHoverColor,
			textHoverColor,
			customBackgroundColor,
			customTextColor,
			animation,
			transition,
			transitionType,
			extraClassName,
			extraStyles,
			extraHoverStyles,
			opensInNewWindow,
			buttonShape,
			buttonSize,
		} = attributes;

		const textClass = getColorClassName( 'color', textColor );
		const backgroundClass = getColorClassName( 'background-color', backgroundColor );

		const hoverClass = ( backgroundHoverColor ? backgroundHoverColor.replace( '#', '' ) + '-' : '' ) + ( textHoverColor ? textHoverColor.replace( '#', '' ) : '' );
		const hoverStyles = ( backgroundHoverColor ? `background-color: #${backgroundHoverColor.replace( '#', '' )}!important;` : '' ) + ( textHoverColor ? `color: #${textHoverColor.replace( '#', '' )}!important;` : '' );
		const uniqueClass = extraStyles ? extraStyles.replace( /[^a-z0-9]/gi, '' ) : '';
		const uniqueHoverClass = extraHoverStyles ? extraHoverStyles.replace( /[^a-z0-9]/gi, '' ) : '';

		const buttonClasses = classnames( 'wp-block-button__link', animation, `hover-${hoverClass}`, {
			'has-text-color': textColor || customTextColor,
			[ textClass ]: textClass,
			'has-background': backgroundColor || customBackgroundColor,
			[ backgroundClass ]: backgroundClass,
		}, extraClassName, uniqueClass, uniqueHoverClass, buttonSize, buttonShape );

		const buttonStyles = {
			backgroundColor: backgroundClass ? undefined : customBackgroundColor,
			color: textClass ? undefined : customTextColor,
		};

		if ( transition ) {
			buttonStyles.transition = `${transition}s ${transitionType ? transitionType : ''}`;
		}

		return (
			<div>
				{ hoverClass && <style dangerouslySetInnerHTML={{__html: `.hover-${hoverClass}:hover{${hoverStyles}}` }} /> }
				{ uniqueClass && <style dangerouslySetInnerHTML={{__html: `.${uniqueClass}{${extraStyles}}` }} /> }
				{ uniqueHoverClass && <style dangerouslySetInnerHTML={{__html: `.${uniqueHoverClass}:hover{${extraHoverStyles}}` }} /> }
				<RichText.Content
					tagName="a"
					className={ buttonClasses }
					href={ url }
					title={ title }
					style={ buttonStyles }
					value={ text }
					target={ opensInNewWindow ? '_blank' : '_self' }
					rel="noopener noreferrer"
				/>
			</div>
		);
	},
};

registerBlockType( name, settings );
