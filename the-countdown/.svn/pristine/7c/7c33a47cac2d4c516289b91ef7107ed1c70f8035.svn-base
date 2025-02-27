/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __, _x } from '@wordpress/i18n';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useEffect, useRef } from 'react'; // development purpoase

import {
    useBlockProps,
    InspectorControls,
} from '@wordpress/block-editor';

import { 
	Button, 
	TextControl, 
	ToggleControl, 
	PanelBody, 
	SelectControl, 
	PanelRow, 
	Dropdown,  	
	DateTimePicker,	
	BaseControl,	
} from '@wordpress/components';

import { getSettings, dateI18n } from '@wordpress/date';

import { is12HourTime } from './utils';
import CountDownTimer from './timer';
import Format from './format';
import Labels from './labels';
import OnExpiry from './on-expiry';
import EditTemplate from './edit-template';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

function useTraceUpdate(props) {
	const prev = useRef(props);
	useEffect(() => {
	  const changedProps = Object.entries(props).reduce((ps, [k, v]) => {
		if (prev.current[k] !== v) {
		  ps[k] = [prev.current[k], v];
		}
		return ps;
	  }, {});
	  if (Object.keys(changedProps).length > 0) {
		console.log('Changed props:', changedProps);
	  }
	  prev.current = props;
	});
  }

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes, clientId } ) {

	setAttributes( { clientId } ); // add unique id

	const settingsTab = () => {
		return (
			<>
				<PanelBody>
					<BaseControl __nextHasNoMarginBottom className="tcp-no-margin">
						{ __( 'Date Time', 'the-countdown' ) }
					</BaseControl>
					<PanelRow className="until-since">
						<SelectControl
							value={ attributes.mode }
							options={ [
								{ value: 'until', label: __( 'Until', 'the-countdown' ) },
								{ value: 'since', label: __( 'Since', 'the-countdown' ) },
								{ value: 'relative', label: __( 'Relative', 'the-countdown' ) },
							] }
							onChange={ value => setAttributes( { mode: value } ) }
						/>

						{ 'relative' === attributes.mode && 
							<TextControl
								type="text"
								value={ attributes.relative }
								onChange={ value => setAttributes( { relative: value } ) }
							/>
						}

						{ [ 'until', 'since' ].indexOf( attributes.mode ) > -1 && 
							<Dropdown
								className="my-container-class-name"
								contentClassName="my-popover-content-classname"
								popoverProps={ { placement: 'bottom-start' } }
								renderToggle={ ( { isOpen, onToggle } ) => (
									<Button
										variant="tertiary"
										onClick={ onToggle }
										aria-expanded={ isOpen }
									>
										{ /* https://github.com/WordPress/gutenberg/blob/trunk/packages/editor/src/components/post-schedule/label.js#L35 */
											dateI18n(
												// translators: If using a space between 'g:i' and 'a', use a non-breaking sapce.
												_x( 'F j, Y g:i\xa0a', 'post schedule full date format' ),
												attributes.dateTime
											) 
										}
									</Button>
								) }
								renderContent={ () => 
									<DateTimePicker
										label="Date time"
										startOfWeek={ getSettings().l10n.startOfWeek }
										currentDate={ attributes.dateTime }
										onChange={ newDate => setAttributes( { dateTime: newDate } ) }
										is12Hour={ is12HourTime }
										__nextRemoveHelpButton
										__nextRemoveResetButton
									/>
								}
							/>
						}						
					</PanelRow>

					{ 'relative' === attributes.mode && 
						<p className="components-base-control__help relativeHelp">
							{ __( "A number is treated as seconds i.e 300 for 300 seconds. Or use a string to specify the number and units: " + 
									"'y' for years, 'o' for months, 'w' for weeks, 'd' for days, 'h' for hours, 'm' for minutes, 's' for seconds " +
									"i.e +3d for the next three days. Either upper or lower case letters may be used. Multiple relative may be " +
									"combined into single string i.e +3d +3h.", 'the-countdown' ) }
							<br />
							<strong>{ __( "Note:", 'the-countdown' ) }</strong>
							{ __( "This mode will deactive if switching to other browser tab.", 'the-countdown' ) }
						</p>
					}

				</PanelBody>
				
				<PanelBody>											
					{ Format( { attributes, setAttributes } ) }					
				</PanelBody>
				
				<PanelBody>											
					{ Labels( { attributes, setAttributes } ) }					
				</PanelBody>
				
				<PanelBody>
					{ OnExpiry( { attributes, setAttributes } ) }						
				</PanelBody>
				
				<PanelBody>											
					<ToggleControl
						label={ __( 'Add leading zeroes', 'the-countdown' ) }
						checked={ attributes.padZeroes }
						onChange={ () => {
							setAttributes( { padZeroes: ! attributes.padZeroes } );
						} }
					/>

					<ToggleControl
						label={ __( 'Hide counter if expired', 'the-countdown' ) }
						checked={ attributes.hideonExpiry }
						onChange={ () => {
							setAttributes( { hideonExpiry: ! attributes.hideonExpiry } );
						} }
					/>					
				</PanelBody>				
			</>
		)
	};

	return (
		<div { ...useBlockProps() }>
			
			<InspectorControls group="settings">			
				{ settingsTab() }
			</InspectorControls>	

			<InspectorControls group="advanced">
				<TextControl
					label={ __( 'Tick Interval', 'the-countdown' ) }
					type="number"
					size="3"
					value={ attributes.tickInterval }
					help={ __( 'Interval (seconds) between onTick callbacks.', 'the-countdown' ) }
					onChange={ value => setAttributes( { tickInterval: parseInt( value ) } ) }
				/>
				
				<TextControl
					label="On Tick"
					value={ attributes.onTick }
					placeholder="Example: myFunction"
					help={ __( 'Run JavaScript function every time the countdown ticking. Put the function name only <strong>without</strong> brackets.', 'the-countdown' ) }
					onChange={ value => setAttributes( { onTick: value } ) }
				/>	
			</InspectorControls>		

			<InspectorControls group="styles">			
				{ EditTemplate( { attributes, setAttributes } ) }
			</InspectorControls>		

			{ CountDownTimer( attributes ) }
		</div>	
	);
}
