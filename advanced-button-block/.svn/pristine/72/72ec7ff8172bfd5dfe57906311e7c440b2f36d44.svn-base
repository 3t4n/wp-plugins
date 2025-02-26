/**
 * External dependencies
 */
import classnames from 'classnames';
import { animationsClasses, transitionTypes, buttonShapes, buttonSizes } from './data';

/**
 * WordPress dependencies
 */

const { __ } = wp.i18n;
const {
	Component,
	Fragment,
} = wp.element;
const { compose } = wp.compose;
const {
	Dashicon,
	IconButton,
	withFallbackStyles,
	TextControl,
	TextareaControl,
	SelectControl,
	PanelBody,
	ToggleControl,
} = wp.components;
const {
	URLInput,
	RichText,
	ContrastChecker,
	InspectorControls,
	withColors,
	PanelColorSettings,
} = wp.editor;

const { getComputedStyle } = window;

const FallbackStyles = withFallbackStyles( ( node, ownProps ) => {

	const { textColor, backgroundColor } = ownProps;

	const backgroundColorValue = backgroundColor && backgroundColor.color;
	const textColorValue = textColor && textColor.color;

	//avoid the use of querySelector if textColor color is known and verify if node is available.
	const textNode = ! textColorValue && node ? node.querySelector( '[contenteditable="true"]' ) : null;

	return {
		fallbackBackgroundColor: backgroundColorValue || ! node ? undefined : getComputedStyle( node ).backgroundColor,
		fallbackTextColor: textColorValue || ! textNode ? undefined : getComputedStyle( textNode ).color,
	};

} );

class AnimationButtonEdit extends Component {
	constructor() {
		super( ...arguments );
		this.nodeRef = null;
		this.bindRef = this.bindRef.bind( this );
	}

	bindRef( node ) {
		if ( ! node ) {
			return;
		}
		this.nodeRef = node;
	}

	render() {

		const {
			attributes,
			backgroundColor,
			textColor,
			setBackgroundColor,
			setTextColor,
			fallbackBackgroundColor,
			fallbackTextColor,
			setAttributes,
			isSelected,
			className,
		} = this.props;

		const {
			text,
			url,
			title,
			animation,
			backgroundHoverColor,
			textHoverColor,
			transition,
			transitionType,
			extraClassName,
			extraStyles,
			extraHoverStyles,
			opensInNewWindow,
			buttonShape,
			buttonSize,
		} = attributes;

		const hoverClass = ( backgroundHoverColor ? backgroundHoverColor.replace( '#', '' ) + '-' : '' ) + ( textHoverColor ? textHoverColor.replace( '#', '' ) : '' );
		const hoverStyles = ( backgroundHoverColor ? `background-color: #${backgroundHoverColor.replace( '#', '' )}!important;` : '' ) + ( textHoverColor ? `color: #${textHoverColor.replace( '#', '' )}!important;` : '' );
		const uniqueClass = extraStyles ? extraStyles.replace( /[^a-z0-9]/gi, '' ) : '';
		const uniqueHoverClass = extraHoverStyles ? extraHoverStyles.replace( /[^a-z0-9]/gi, '' ) : '';

		let buttonStyles = {
			backgroundColor: backgroundColor.color,
			color: textColor.color,
		};

		if ( transition ) {
			buttonStyles.transition = `${transition}s ${transitionType ? transitionType : ''}`;
		}

		return (
			<Fragment>
				<div className={ classnames( className, extraClassName, uniqueClass, uniqueHoverClass, buttonSize, buttonShape ) } title={ title } ref={ this.bindRef }>
					{ hoverClass && <style dangerouslySetInnerHTML={{__html: `.wp-block-gab-animation-button:hover .hover-${hoverClass}{${hoverStyles}}` }} /> }
					{ uniqueClass && <style dangerouslySetInnerHTML={{__html: `.${uniqueClass} .wp-block-button__link{${extraStyles}}` }} /> }
					{ uniqueHoverClass && <style dangerouslySetInnerHTML={{__html: `.${uniqueHoverClass} .wp-block-button__link:hover{${extraHoverStyles}}` }} /> }
					<RichText
						placeholder={ __( 'Add text…' ) }
						value={ text }
						onChange={ ( value ) => setAttributes( { text: value } ) }
						formattingControls={ [ 'bold', 'italic', 'strikethrough' ] }
						className={ classnames(
							'wp-block-button__link', `hover-${hoverClass}`, {
								'has-background': backgroundColor.color,
								[ backgroundColor.class ]: backgroundColor.class,
								'has-text-color': textColor.color,
								[ textColor.class ]: textColor.class,
							},
							animation
						) }
						style={ buttonStyles }
						keepPlaceholderOnFocus
						target={ opensInNewWindow ? '_blank' : '_self' }
						rel="noopener noreferrer"
					/>
					{/* Sidebar Settings */}
					<InspectorControls>
						<PanelColorSettings
							title={ __( 'Color Settings' ) }
							colorSettings={ [
								{
									value: backgroundColor.color,
									onChange: setBackgroundColor,
									label: __( 'Background Color' ),
								},
								{
									value: textColor.color,
									onChange: setTextColor,
									label: __( 'Text Color' ),
								},
							] }
						>
						<ContrastChecker
							{ ...{
								isLargeText: true,
								textColor: textColor.color,
								backgroundColor: backgroundColor.color,
								fallbackBackgroundColor,
								fallbackTextColor,
							} }
						/>
					</PanelColorSettings>
						<PanelColorSettings
							initialOpen={ false }
							title={ __( 'Hover Color Settings' ) }
							colorSettings={ [
								{
									value: backgroundHoverColor,
									onChange: value => {
										setAttributes({
											backgroundHoverColor: value
										});
									},
									label: __( 'Hover Background Color' ),
								},
								{
									value: textHoverColor,
									onChange: value => {
										setAttributes({
											textHoverColor: value
										});
									},
									label: __( 'Hover Text Color' ),
								},
							] }
						/>
						<PanelBody initialOpen={ false } title={ __( 'Advanced Hover Settings' ) }>
							<TextControl
								label={ __( 'Transition time in seconds' ) }
								value={ transition || '' }
								onChange={ ( e ) => {
									setAttributes( {
										transition: e,
									} );
								} }
							/>
							<SelectControl
								label={ __('Select transition type') }
								value={ undefined !== transitionType ? transitionType : '' }
								onChange={ ( e ) => {
									setAttributes( {
										transitionType: e,
									} );
								} }
								options={ transitionTypes }
							/>
						</PanelBody>
						<PanelBody initialOpen={ false } title={ __( 'Hover Animation' ) }>
							<div style={ { margin: '0 -5px' } }>
								{ animationsClasses.map( ( a ) => {
									return (
										<div
											className={ classnames( 'gab-button', a.value, ( ( a.value === animation || ( ! animation && a.value === animationsClasses[0].value ) ) && 'active' ) ) }
											data-id={ a.value }
											onClick={ (e) => {
												setAttributes({
													animation: e.target.dataset.id
												});
											}
											}
										>
											{ a.label }
										</div>
									);
								} ) }
							</div>
						</PanelBody>
						<PanelBody initialOpen={ false } title={ __( 'Advanced Settings' ) }>
							<ToggleControl
								label={ __( 'Open in New Window' ) }
								id='gab-new-window'
								checked={ opensInNewWindow }
								onChange={ () => setAttributes( { opensInNewWindow: ! opensInNewWindow } ) }
							/>
							<SelectControl
								label={ __( 'Button Shape' ) }
								options={ buttonShapes }
								value={ buttonShape }
								onChange={ ( e ) => setAttributes( { buttonShape: e } ) }
							/>
							<SelectControl
								label={ __( 'Button Size' ) }
								options={ buttonSizes }
								value={ buttonSize }
								onChange={ ( e ) => setAttributes( { buttonSize: e } ) }
							/>
							<TextControl
								label={ __( 'Additional CSS Classes' ) }
								value={ extraClassName || '' }
								onChange={ (e) => {
									setAttributes( {
										extraClassName: e,
									} );
								} }
							/>
							<TextareaControl
								label={ __( 'Additional CSS Styles' ) }
								value={ extraStyles || '' }
								onChange={ (e) => {
									setAttributes( {
										extraStyles: e,
									} );
								} }
							/>
							<TextareaControl
								label={ __( 'Additional CSS Hover Styles' ) }
								value={ extraHoverStyles || '' }
								onChange={ (e) => {
									setAttributes( {
										extraHoverStyles: e,
									} );
								} }
							/>
						</PanelBody>
					</InspectorControls>
				</div>
				{ isSelected && (
					<form
						className="block-library-button__inline-link"
						onSubmit={ ( event ) => event.preventDefault() }>
						<Dashicon icon="admin-links" />
						<URLInput
							value={ url }
							onChange={ ( value ) => setAttributes( { url: value } ) }
						/>
						<IconButton icon="editor-break" label={ __( 'Apply' ) } type="submit" />
					</form>
				) }
			</Fragment>
		);
	}
}

export default compose( [
	withColors( 'backgroundColor', { textColor: 'color' } ),
	FallbackStyles,
] )( AnimationButtonEdit );
